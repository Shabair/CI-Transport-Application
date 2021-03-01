<?php

class Inspection extends MY_Controller {


	function __construct()
		{
			parent::__construct();
			$this->load->model("inspection_model");
			$this->load->model("driver_model");
			$this->load->model("trailer_model");
			$this->load->model("truck_model");
			$this->load->helper('sendemail');

		}
	//------------------------ Inspection List ------------------------//
	public function datatable_json()
	{

		$Records = $this->inspection_model->GetAll($this->get_company_id());
		


        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{ 	if($r['trailer'] ==  'other'){
				$trailer = 'other'."<br />".$r['trailer_detail'];
			}else{
				$trailer =$this->getTrailerUnit($r['trailer']);
			}

			$data[]= array(
				$count++,
                date("j/M/Y",strtotime($r['insp_date'])),
				getDriverFullName($r['driver_id']),
				implode(' , ',unserialize($r['defects'])),
				$r['level'],
				$r['time_insp'],
				$r['location'],
				$this->getTruckUnit($r['truck']),
				$trailer,
				$r['status'],
				$r['remarks'],

				'<a class="btn btn-xs btn-success" href="'.base_url('inspection/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('inspection/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				 ',
			);
        }


		//$Records['data']=$data;
		// $Records['data']=$data;
        echo json_encode($data);
        // echo json_encode($Records);	
        // echo $endData2;
	}
	//------------------------ Inspection List ------------------------//
	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}
	//------------------------ Inspection List ------------------------//
	public function index()
		{
			$this->session->unset_userdata('user_search_type');
			/*All Ites Count*/
			$this->viewData += $this->inspection_model->count();
			/*End of Counts*/
			$this->viewData['title'] = 'inspection List : TDMA';
			$this->viewData['view']  = 'company/inspection/inspection_list';
			$this->load->view('company/layout', $this->viewData);
		}

	//------------------------ Inspection Add ------------------------//
	public function add(){

		$this->actionType = 'add';
		$this->viewData['title'] = 'Add Inspection';
		$this->add_inspection();
	}
	//------------------------ Inspection Add ------------------------//
	public function add_inspection($id=0)
	{
		//this will work only for when we editing the driver
        if($this->input->post('action_token')){
        	$actionByUser = check_action_token('action_token');
        	if(empty($actionByUser)){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}else if(!empty($actionByUser->action_on) && $this->action_id != $actionByUser->action_on){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}
        }

		$this->form_validation->set_rules($this->inspFormVali($this->input->post()));


		if($this->form_validation->run() ==  False){
			$this->errors[] = validation_errors();
		}
		else{

			$data= array(
				'driver_id' 			=> 	$this->input->post('driver_id'),
				'company_id' 			=> 	$this->get_company_id(),
				'defects' 				=> 	serialize($this->input->post('defects')),
				'other_detail' 			=> 	$this->input->post('other_detail'),
				'type_of_voil' 			=> 	serialize($this->input->post('type_of_voil')),
				'out_of_service' 		=> 	$this->input->post('out_of_service'),
				'Insp_loc' 				=> 	$this->input->post('Insp_loc'),
				'level' 				=> 	$this->input->post('level'),
				'insp_date' 			=> 	$this->input->post('insp_date'),
				'time_insp' 			=> 	$this->input->post('time_insp'),
				'location' 				=> 	$this->input->post('location'),
				'truck' 				=> 	$this->input->post('truck'),
				'trailer_detail' 		=> 	$this->input->post('trailer_detail'),
				'trailer' 				=> 	$this->input->post('trailer'),
				'repair_bill' 			=> 	$this->input->post('repair_bill'),
				'repair_bill_detail' 	=> 	$this->input->post('repair_bill_detail'),
				'statement' 			=> 	$this->input->post('statement'),
				'warning_letter' 		=> 	$this->input->post('warning_letter'),
				'status' 				=> 	$this->input->post('status'),
				'match_logbook' 		=> 	$this->input->post('match_logbook'),
				'remarks' 				=> 	$this->input->post('remarks'),
			);

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
				$config['max_size']	= '100000000';
				$config['max_width']  = '100000';
				$config['max_height']  = '100000';

			$files = [
				'warning_letter_file',
				'statement_file',
				'repair_bill_file'
			];

			for($i=0;$i<count($files);$i++){
				$get_image = image_upload($files[$i],$config,$this->action_id,'inspection');
				if(!isset($get_image['errors']) && isset($get_image['image'])){
					$data[$files[$i]] = $get_image['image'];
				}else{
					$errors[] = $get_image['errors'];
				}
			}
		}//validation end
				 //------------------------------ contract PDF Upload------------------------------//
		if(!isset($this->errors)){
			if($this->actionType == 'add')
			{
				$data['created_date'] 		=	date('Y/m/d');
				$result = $this->inspection_model->insert($data);

				if($result)
				{
					$driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$data['driver_id']]);

					$historydata = [
							'company_id'	=>	$this->get_company_id(),
							'user_id'		=>	$this->get_user_id(),
							'action_id'		=>	$this->db->insert_id(),
							'action'		=>	'Add',
							'action_on'		=>	implode(' ', $driver_name),
							'action_place'	=>	'Inspection',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'Inspection Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert Inspection');
				}
			}else if($this->actionType == 'update'){
				$result =  $this->inspection_model->updateInspection($data, $this->action_id);

				if($result)
				{	
					$driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$data['driver_id']]);

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->action_id,
						'action'		=>	'Update',
						'action_on'		=>	implode(' ', $driver_name),
						'action_place'	=>	'Inspection',
					];

					history($historydata);
					$this->session->set_flashdata('success', 'Inspection Updated Successfully');
				}
			}else{
				$this->session->set_flashdata('errors', 'Inspection Not Added successfully.');
			}

			return redirect('inspection');
		}else{
			$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
			
			$this->viewData['action_token'] = $cipher;

        	$this->viewData['getDriver'] =  $this->driver_model->getDriver($this->get_company_id());
			$this->viewData['gettrailer'] =  $this->trailer_model->gettrailer($this->get_company_id());
			$this->viewData['gettruck'] =  $this->truck_model->gettruck($this->get_company_id());
			
			$this->viewData['view']  = 'company/inspection/inspection_add';
			$this->load->view('company/layout', $this->viewData);
		}

	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{
		valid_company('inspection','company_id',$id);
		$this->action_id = $id;
		$this->actionType = 'update';
		$this->viewData['title'] = 'Edit Inspection';
		$this->viewData['inspection_detail'] =  $this->inspection_model->getInspectionByID($id);
		$this->viewData['driver_name'] = getDriverFullName($this->viewData['inspection_detail']['driver_id']);
		$this->add_inspection();
	}
	//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{
		valid_company('inspection','company_id',$id);


		$data['inspection_detail'] =  $this->inspection_model->getInspectionByID($id);

		$data['driver_name'] = getDriverFullName($data['inspection_detail']['driver_id']);
		$data['trailer_unit'] = $this->getTrailerUnit($data['inspection_detail']['trailer']);
		$data['truck_unit'] = $this->getTruckUnit($data['inspection_detail']['truck']);

		$data['title'] = 'Inspection Detail: TDMA';
		$data['view']  = 'company/inspection/inspection_view';
		$this->load->view('company/layout', $data);

	}

	function getTruckUnit($id){
		$result = $this->db->query("SELECT unit_no From `truck` WHERE id='".$id."'");
		return ($result->num_rows()> 0)?$result->row()->unit_no:null;
	}
	
	function getTrailerUnit($id){
		$result =  $this->db->query("SELECT unit_no From `trailer` WHERE id='".$id."'");
		return ($result->num_rows()> 0)?$result->row()->unit_no:null;
	}

	function inspFormVali($InspData){
		$rulesArr = array(
                                    array(
                                            'field' => 'defects[]',
                                            'label' => 'Defects',
                                            'rules' => 'required|trim|htmlspecialchars'
                                         ),
                                    array(
                                            'field' => 'type_of_voil[]',
                                            'label' => 'Type Of Voilation',
                                            'rules' => 'required|trim|htmlspecialchars'
                                         ),
                                    array(
                                            'field' => 'out_of_service',
                                            'label' => 'Out Of Service',
                                            'rules' => 'trim|htmlspecialchars'
                                         ),
                                    array(
                                            'field' => 'Insp_loc',
                                            'label' => 'Inspection Location',
                                            'rules' => 'required|trim|htmlspecialchars|in_list[can,us]'
                                    ),
                                    array(
                                            'field' => 'level',
                                            'label' => 'Level',
                                            'rules' => 'required|trim|htmlspecialchars|in_list[1,2,3,warning,other]'
                                        ),
                                    array(
                                            'field' => 'time_insp',
                                            'label' => 'Time',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'insp_date',
                                            'label' => 'Date',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'location',
                                            'label' => 'Location',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'repair_bill',
                                            'label' => 'Repair Bill',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'statement',
                                            'label' => 'Statement',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'warning_letter',
                                            'label' => 'Warning Letter',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'status',
                                            'label' => 'Status',
                                            'rules' => 'required|trim|htmlspecialchars|in_list[pending,filed]'
                                    ),

                                    array(
                                            'field' => 'match_logbook',
                                            'label' => 'Match With Log Book',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'remarks',
                                            'label' => 'Remarks',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
			);


				/*--------------------------Drivers List---------------------------*/
			$allDrivers = $this->driver_model->getDriver($this->get_company_id());

			$extraArr=array();
			foreach ($allDrivers as $value) {
				$extraArr[] = $value->id;
			}

			$implodeDrivers=implode(',', $extraArr);

			$rulesArr[] =  array(
                                    'field' => 'driver_id',
                                    'label' => 'Driver Name',
                                    'rules' => 'trim|htmlspecialchars|required|in_list['.$implodeDrivers.']',
                                    'errors' => array(
						                        'required' => 'You must provide a  %s.',
						                        'in_list' => 'You must provide a valid %s.',
						                ),
                            );
				/*--------------------------Truck List---------------------------*/
			$allTrucks = $this->truck_model->gettruck($this->get_company_id());

			$extraArr=array();
			foreach ($allTrucks as $value) {
				$extraArr[] = $value->id;
			}

			$implodeTrucks=implode(',', $extraArr);

			$rulesArr[] =  array(
                                    'field' => 'truck',
                                    'label' => 'Truck',
                                    'rules' => 'trim|htmlspecialchars|required|in_list['.$implodeTrucks.']',
                                    'errors' => array(
						                        'required' => 'You must provide a %s.',
						                        'in_list' => 'You must provide a valid %s.',
						                ),
                            );
				/*--------------------------Truck List---------------------------*/
				$alltrailer = $this->trailer_model->gettrailer($this->get_company_id());

			$extraArr=array();
			foreach ($alltrailer as $value) {
				$extraArr[] = $value->id;
			}

			$implodetrailer=implode(',', $extraArr);
			$implodetrailer = $implodetrailer . ','.'other';
			$rulesArr[] =  array(
                                    'field' => 'trailer',
                                    'label' => 'Trailer',
                                    'rules' => 'trim|htmlspecialchars|required|in_list['.$implodetrailer.']',
                                    'errors' => array(
						                        'required' => 'You must provide a %s.',
						                        'in_list' => 'You must provide a valid %s.',
						                ),
                            );
				/*--------------------------Truck List---------------------------*/


		if(isset($InspData['defects'])):
			if($InspData['defects']){
				if(in_array('other', $InspData['defects'])){
					$rulesArr[] =  array(
	                                            'field' => 'other_detail',
	                                            'label' => 'Other detail of Defects',
	                                            'rules' => 'required|trim|htmlspecialchars'
	                                    );
				}
			}
		endif;
		if(isset($InspData['trailer'])):
			if($InspData['trailer'] == 'other'){

					$rulesArr[] =  array(
	                                            'field' => 'trailer_detail',
	                                            'label' => 'Trailer Detail',
	                                            'rules' => 'required|trim|htmlspecialchars'
	                                    );

			}
		endif;

		return $rulesArr;
	}//inspFormVali End

}//class end
?>
