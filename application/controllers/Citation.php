<?php

class Citation extends MY_Controller {


	function __construct()
		{
			parent::__construct();
			//$this->load->helper('pdf_helper');
			//$this->load->model("citation_model");
			$this->load->model("driver_model");
			$this->load->model("citation_model");
			//$this->load->helper('sendemail');

		}
//------------------------ citation List ------------------------//
	public function datatable_json()
	{				   					   

		$Records = $this->citation_model->GetAll($this->get_company_id());
		
		
		
        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r) 
		{ 
			
			$data[]= array(
				$count++,
                $r['insp_date'],
				$this->getDriverName($r['driver_id']),
				$r['offence'],
				$r['Location'],
				$r['cita_loc'],
				$r['Plenty'],
				$r['court_date'],
				$r['fu_date'],
				$r['status'],
				get_table_remarks($r['remarks']),				
				
				'<a class="btn btn-xs btn-success" href="'.base_url('citation/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('citation/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				 ',
			);
        }
		
		
		// $Records['data']=$data;
  //       echo json_encode($Records);
  // var_dump($data);	
  		echo json_encode($data);					   
	}	
	//------------------------ citation List ------------------------//
	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}	
	//------------------------ citation List ------------------------//
	//------------------------ Citation List ------------------------//	
	public function index()
	{
		$this->session->unset_userdata('user_search_type');

		/*All Ites Count*/
		$this->viewData += $this->citation_model->count('citation');
		/*End of Counts*/

		$this->viewData['title'] = 'Citation List';
		$this->viewData['view']  = 'company/citation/citation_list';
		$this->load->view('company/layout', $this->viewData);	
	}


		
	//------------------------ Citation add ------------------------//
	public function add(){

		$this->actionType = 'add';
		$this->viewData['title'] = 'Add Citation';
		$this->add_citation();
	}
	//------------------------ Citation Add ------------------------//
//------------------------ citation Add ------------------------//
	public function add_citation($id=0)
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

		$this->form_validation->set_rules($this->citFormVali($this->input->post()));


		if($this->form_validation->run() ==  False){
			$this->errors[] = validation_errors();
		}
		else{

			$data= array(
				'company_id' 			=> 	$this->get_company_id(),
				'cita_loc' 				=> 	$this->input->post('cita_loc'),
				'driver_id' 			=> 	$this->input->post('driver_id'),
				'offence' 				=> 	$this->input->post('offence'),
				'insp_date' 			=> 	$this->input->post('insp_date'),
				'offence_time' 			=> 	$this->input->post('offence_time'),
				'Location' 				=> 	$this->input->post('Location'),
				'city' 					=> 	$this->input->post('city'),
				'state' 				=> 	$this->input->post('state'),
				'fu_date' 				=> 	$this->input->post('fu_date'),
				'Plenty' 				=> 	$this->input->post('Plenty'),
				'moving_voilation' 		=> 	$this->input->post('moving_voilation'),
				'match_logbook' 		=> 	$this->input->post('match_logbook'),
				'statement' 			=> 	$this->input->post('statement'),
				'training_req' 			=> 	$this->input->post('training_req'),
				'warning_letter' 		=> 	$this->input->post('warning_letter'),
				'status' 				=> 	$this->input->post('status'),
				'p_unp' 				=> 	$this->input->post('p_unp'),
				'ticket_fight' 			=> 	$this->input->post('ticket_fight'),
				'comment' 				=> 	taginput_date($this->input->post('comment')),
				'remarks' 				=> 	taginput_date($this->input->post('remarks')),
			);  

			if($this->input->post('cita_loc') == 'can'){
				$data['cvor_point'] = $this->input->post('cvor_point');
				$data['demerit'] = $this->input->post('demerit');
				$data['save_stat'] = '';
			}else{
				$data['save_stat'] = $this->input->post('save_stat');
				$data['cvor_point'] = '';
				$data['demerit'] = '';
			}

			if($this->input->post('state') == 'other'){
				$data['other_state'] = $this->input->post('other_state');
			}else{
				$data['other_state'] = '';
			}

			if($this->input->post('training_req') == 'on'){
				$data['training_type'] = serialize($this->input->post('training_type'));
				$data['training_completed'] 	= 	$this->input->post('training_completed');
				if(is_array($this->input->post('training_type')) && in_array('other',$this->input->post('training_type'))){
					$data['train_text'] = $this->input->post('train_text');
				}else{
					$data['train_text'] = '';

				}
			}else{
				$data['training_completed'] = '';
				$data['training_type'] = '';
				$data['other_state'] = '';
			}

			if($this->input->post('ticket_fight') == 'on'){
				$data['outcome'] 				=   $this->input->post('outcome');
				$data['lawyer_name'] 			= 	$this->input->post('lawyer_name');
				$data['lawyer_phone'] 			= 	$this->input->post('lawyer_phone');
				$data['lawyer_email'] 			= 	$this->input->post('lawyer_email');
				$data['lawyer_fee'] 			= 	$this->input->post('lawyer_fee');
				$data['lawyer_rtc'] 			= 	$this->input->post('lawyer_rtc');
				
				$data['court_date'] 			= 	$this->input->post('court_date');
				
			}else{
				$data['outcome'] 				= 	'';
				$data['lawyer_name'] 			= 	'';
				$data['lawyer_phone'] 			= 	'';
				$data['lawyer_email'] 			= 	'';
				$data['lawyer_fee'] 			= 	'';
				$data['lawyer_rtc'] 			= 	'';
				
				$data['court_date'] 			= 	'';
			}

			if($this->input->post('lawyer_rtc') == 'on'){
				$data['lawyer_as_per'] 			= 	$this->input->post('lawyer_as_per');
			}else{
				$data['lawyer_as_per'] 			= 	'';
			}



			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']	= '100000000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';

			$files = [
				'statement_file',
				'training_file',
				'warning_letter_file'
			];

			for($i=0;$i<count($files);$i++){
				$get_image = image_upload($files[$i],$config,$this->action_id,'citation');
				if(!isset($get_image['errors']) && isset($get_image['image'])){
					$data[$files[$i]] = $get_image['image'];
				}else{
					$errors[] = $get_image['errors'];
				}
			}

			if($this->input->post('statement') != 'on'){
				$data['statement_file'] = '';
			}
			if($this->input->post('training_req') != 'on'){
				$data['training_file'] = '';

			}
				 //------------------------------ contract PDF Upload------------------------------//
			
		}//form_valid else
		if(!isset($this->errors)){

			if($this->actionType == 'add')
			{	
				$data['created_date'] 		=	date('Y/m/d');
				$result = $this->citation_model->insert($data);
		
				if($result)
				{

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->db->insert_id(),
						'action'		=>	'Add',
						'action_on'		=>	getDriverFullName($data['driver_id']),
						'action_place'	=>	'Citation',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'Citation Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert Citation');
				}
				redirect('citation');
			}else if($this->actionType == 'update')
			{	
				$result =  $this->citation_model->update($data, $this->action_id);
				
				if($result)
				{
					$driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$data['driver_id']]);

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->action_id,
						'action'		=>	'Update',
						'action_on'		=>	getDriverFullName($data['driver_id']),
						'action_place'	=>	'Citation',
					];

					history($historydata);
					$this->session->set_flashdata('success', 'Citation Updated Successfully');
				}
				redirect('citation');
			}else{
				$this->session->set_flashdata('errors', 'Citation Not Added successfully.');
			}
		}else{
			$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
			
			$this->viewData['action_token'] = $cipher;

	        $this->viewData['getDriver'] =  $this->driver_model->getDriver($this->get_company_id());
			$this->viewData['view']  = 'company/citation/citation_add';
			$this->load->view('company/layout', $this->viewData);

		}
	}	
		
	//------------------------ Truck Edit Function ------------------------//
	//------------------------ Citation View ------------------------//
		public function view($id=0)
		{   
			valid_company('citation','company_id',$id);

			$data['citation_detail'] =  $this->citation_model->getCitationByID($id);
					
		    $data['getDriver'] =  $this->driver_model->getDriver($this->get_company_id());
			$data['driver_name'] = $this->getDriverName($data['citation_detail']['driver_id']);

			$data['title'] = 'Citation View : TDMA';
			$data['view']  = 'company/citation/citation_view';
			$this->load->view('company/layout', $data);
			
		}

		public function edit($id){
			valid_company('citation','company_id',$id);
			$this->action_id = $id;
			$this->actionType = 'update';
			$this->viewData['citation_detail'] =  $this->citation_model->getCitationByID($this->action_id);
					
			$this->viewData['driver_name'] = $this->getDriverName($this->viewData['citation_detail']['driver_id']);

			$this->viewData['title'] = 'Edit Citation';
			$this->add_citation();
		}
	//------------------------ Citation Add ------------------------//

	function getDriverName($id){
		$result = $this->db->query("SELECT `first_name`,`middle_name`,`last_name` From `drivers` WHERE id='".$id."'");
		if($result->num_rows() > 0){
			$result = $result->row();
			return $result->first_name.' '.$result->middle_name.' '.$result->last_name;
		}else{
			return null;
		}
	}
	function city_suggestion(){
		$search = $this->input->post('search');
		
		$result = $this->db->query("SELECT DISTINCT city from citation where `city` LIKE '%$search%'")->result();
		$str ='';
		foreach($result as $data){
			$str .= "<li class='suggesions'>".$data->city."</li>";
		}
		echo $str;
	}
	
	function citFormVali($InspData){
		$rulesArr = array(
                                    array(
                                            'field' => 'action_token',
                                            'label' => 'Invalid Form',
                                            'rules' => 'required',
                                            'errors' => array(
											                        'required' => 'Invalid Form.',
											                )
                                         ),
                                    array(
                                            'field' => 'cita_loc',
                                            'label' => 'Which Country',
                                            'rules' => 'required|trim|htmlspecialchars|in_list[can,us]'
                                         ),
                                    array(
                                            'field' => 'insp_date',
                                            'label' => 'Offence Date',
                                            'rules' => 'required|trim|htmlspecialchars'
                                         ),     
                                    array(
                                            'field' => 'offence',
                                            'label' => 'Out Of Service',
                                            'rules' => 'trim|htmlspecialchars'
                                         ),
                                    array(
                                            'field' => 'offence_time',
                                            'label' => 'Offence Time',
                                            'rules' => 'required|trim|htmlspecialchars'
                                        ),
                                    array(
                                            'field' => 'Location',
                                            'label' => 'Location',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'fu_date',
                                            'label' => 'Fine Date',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'Plenty',
                                            'label' => 'Plenty',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'match_logbook',
                                            'label' => 'Log Book Match',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'statement',
                                            'label' => 'Statement',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'training_req',
                                            'label' => 'Training Required',
                                            'rules' => 'trim|htmlspecialchars'
                                    )/*,
                                    array(
                                            'field' => 'training_type',
                                            'label' => 'Training Type',
                                            'rules' => 'trim|htmlspecialchars|in_list[def_driv,road_eva,log_book_train,Haz_dang,wint_drive,other]',
                                            'errors' => array(
						                        'in_list' => 'You must provide a valid %s.',
						                					),
                                    )*/,
                                    array(
                                            'field' => 'warning_letter',
                                            'label' => 'Warning letter',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'status',
                                            'label' => 'Status',
                                            'rules' => 'trim|htmlspecialchars'
                                    ),
                                    array(
                                            'field' => 'p_unp',
                                            'label' => 'Warning letter',
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


			if(isset($InspData['ticket_fight']) && $InspData['ticket_fight'] == 'yes'){
				$rulesArr[] =  array(
                                            'field' => 'lawyer_name',
                                            'label' => 'Lawyer Name',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
				$rulesArr[] =  array(
                                            'field' => 'lawyer_phone',
                                            'label' => 'Lawyer Phone No',
                                            'rules' => 'trim|htmlspecialchars'
                                    );
				$rulesArr[] =  array(
                                            'field' => 'lawyer_email',
                                            'label' => 'Lawyer Email',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
				$rulesArr[] =  array(
                                            'field' => 'lawyer_fee',
                                            'label' => 'Lawyer Fee',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
				$rulesArr[] =  array(
                                            'field' => 'court_date',
                                            'label' => 'Court Date',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
			}
			if(isset($InspData['training_type']) && in_array('other',$InspData['training_type'])){
				$rulesArr[] =  array(
                                            'field' => 'train_text',
                                            'label' => 'Training Name',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
			}


		return $rulesArr;
	}//inspFormVali End
}//class end
?>