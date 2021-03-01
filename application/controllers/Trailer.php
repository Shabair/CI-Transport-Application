<?php

class Trailer extends MY_Controller {

	

	function __construct()
		{
			parent::__construct();
			$this->load->helper('pdf_helper');
			$this->load->model("trailer_model");
		}

	//------------------------ Truck List ------------------------//
	//------------------------ Truck List ------------------------//
	public function datatable_json()
	{


		$Records = $this->trailer_model->GetAll($this->get_company_id());
		

        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{
			$AS_R = $this->getAnSafetyNRemark($r['annual_safety_due'],$r['remarks']);

			if($this->session->userdata('user_search_type') != '1'){
				$M1 = $AS_R;
				$M2 = $r['ownership_name'];
				$M3 = getDateFromDB($r['addition']);
				$M4 = $r['status']."<br />".$r['owner_name'];
				$M5 = $r['reefer_dryvan'];

			}else{

				$M1 = $r['ownership_name'];
				$M2 = getDateFromDB($r['addition']);
				$M3 = $r['status']."<br />".$r['owner_name'];
				$M4 = $r['reefer_dryvan'];
				$M5 = $AS_R;
			}

			$ext=($r['deactive']==0)?'<button class="btn btn-xs btn-danger" onclick="showDetails(this)" data-deleted-id="'.$r["id"].'" data-toggle="modal" data-target=".bs-example-modal-sm" ><i class="fa fa-trash-o"></i></button>':'<a class="btn btn-xs btn-success" title="Activate" href="'.base_url('trailer/active/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';

			$data[]= array(
				$count++,
                $r['unit_no'],
				$r['vin_no'],
				$r['year'],
				$r['plate_no'],
				$r['make'],
				$M1,
				$M2,
				$M3,
				$M4,
				$M5,


				'<a class="btn btn-xs btn-success" href="'.base_url('trailer/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('trailer/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>

				 '.$ext,
			);
        }


		// $Records['data']=$data;
 		 //   echo json_encode($Records);
        echo json_encode($data);
	}
	//--------------------------------------------------
	public function getAnSafetyNRemark($annual_safety_due,$remarks){
		if($this->session->userdata('user_search_type') != '1'){
			return getDateFromDB($annual_safety_due);
		}else{
			$allRemarks = explode(',', $remarks);

			for($i=0;$i<count($allRemarks);$i++){
				if (strpos($allRemarks[$i], 'Deactivate:') !== false){
					return str_replace('Deactivate:', "", $allRemarks[$i]);
				}
			}

		}
	}

	//--------------------------------------------------


	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}

	public function index()
	{
		$this->session->unset_userdata('user_search_type');
		/*All Ites Count*/
		$this->viewData += $this->trailer_model->count('trailer');
		/*End of Counts*/
		$this->viewData['title'] = 'Trailer List';
		$this->viewData['view']  = 'company/trailer/trailer_list';
		$this->load->view('company/layout', $this->viewData);
	}

	//------------------------ Truck Add ------------------------//

	public function add(){
		
		$this->actionType = 'add';
		$this->viewData['title'] = 'Add Trailer';
		$this->add_trailer();
		
	}

	public function add_trailer($id=0)
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
		
		$this->form_validation->set_rules($this->driverFormVali($this->input->post()));

		//------------------------Extra Form Validation Rules ------------------------//
		if($this->form_validation->run() == FALSE){

			$this->errors[] = validation_errors();

		}
		else{

			$data= array(

				'unit_no' 				=> 	$this->input->post('unit_no'),
				'vin_no' 				=> 	strtoupper($this->input->post('vin_no')),
				'year' 					=> 	$this->input->post('year'),
				'addition' 				=> 	$this->input->post('addition'),
				'status' 				=> 	$this->input->post('status'),
				'owner_name' 			=> 	$this->input->post('owner_name'),
				'make' 					=> 	$this->input->post('make'),
				'reefer_dryvan' 		=> 	$this->input->post('reefer_dryvan'),
				'ownership_name' 		=> 	$this->input->post('ownership_name'),
				'owner_leased' 			=> 	$this->input->post('owner_leased'),
				'lease_end_date' 		=> 	$this->input->post('lease_end_date'),
				'annual_safety_due' 	=> 	setDateInDB($this->input->post('annual_safety_due')),
				'plate_no' 				=> 	strtoupper($this->input->post('plate_no')),
				'o_plate_no' 			=> 	strtoupper($this->input->post('o_plate_no')),
				'remarks' 				=> 	$this->input->post('remarks'),

			);

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']	= '100000000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';

			$files = [
				'owner_leased_pdf',
				'owner_ship_pdf',
				'annual_safety_pdf',
			];

			for($i=0;$i<count($files);$i++){
				$get_image = image_upload($files[$i],$config,$this->action_id,'trailer');
				if(!isset($get_image['errors']) && isset($get_image['image'])){
					$data[$files[$i]] = $get_image['image'];
				}else{
					$errors[] = $get_image['errors'];
				}
			}
			
			//------------------------------ Set admin r company and created date------------------------------//

		}//validation end

		if(!isset($this->errors)){
			if($this->actionType == 'add'){
				$data['created_date'] 		=	date('Y/m/d');
				$data['company_id'] = $this->get_company_id();
				$result = $this->trailer_model->insertTrailer($data);

				if($result)
				{
					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->db->insert_id(),
						'action'		=>	'Add',
						'action_on'		=>	$data['unit_no'],
						'action_place'	=>	'Trailer',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'Trailer Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert Trailer');
				}
				

			}else if($this->actionType == 'update'){
				$result =  $this->trailer_model->updateTrailer($data, $this->action_id);

				if($result){

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->action_id,
						'action'		=>	'Update',
						'action_on'		=>	$data['unit_no'],
						'action_place'	=>	'Trailer',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'Trailer Updated Successfully');
				}

			}else{
				$this->session->set_flashdata('errors', 'Trailer Not Added successfully.');
			}

			return redirect('trailer');
		}else{
			$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
			
			$this->viewData['action_token'] = $cipher;

			$this->viewData['view']  = 'company/trailer/trailer_add';
			$this->load->view('company/layout', $this->viewData);

		}

	}
	//------------------------ Is Unit No duplicate ------------------------//

    function unit_check($str)
    {
    	$sql = "SELECT id from trailer where company_id = '".$this->get_company_id()."' AND unit_no = '".$str."' AND id != '".$this->action_id."' ";
    	$result =  $this->db->query($sql);
    	if($result->num_rows()> 0){
    		$this->form_validation->set_message('unit_check', 'The {field} can\'t duplicate as per company');
        	return false;
    	}else{
    		return true;
    	}
    }

	//------------------------ Is VIN  No duplicate ------------------------//

    function vin_check($str)
    {
    	$sql = "SELECT id from trailer where  vin_no = '".$str."' AND id != '".$this->action_id."' ";
    	$result =  $this->db->query($sql);
    	if($result->num_rows()> 0){
    		$this->form_validation->set_message('vin_check', 'The {field} can\'t duplicate.');
        	return false;
    	}else{
    		return true;
    	}
    }

	//------------------------ Is plate No duplicate ------------------------//

    function plate_no_check($str)
    {
    	$sql = "SELECT id from trailer where  plate_no = '".$str."' AND id != '".$this->action_id."' ";

    	$result =  $this->db->query($sql);
    	if($result->num_rows()> 0){
    		$this->form_validation->set_message('plate_no_check', 'The {field} can\'t duplicate.');
        	return false;
    	}else{
    		return true;
    	}
    }

	//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{
		valid_company('trailer','company_id',$id);
		$this->viewData['trailer_detail'] =  $this->trailer_model->getTrailerByID($id);
		$this->viewData['title'] = 'Detail Trailer';
		$this->viewData['view']  = 'company/trailer/trailer_view';
		$this->load->view('company/layout', $this->viewData);

	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{
		valid_company('trailer','company_id',$id);
		$this->action_id = $id;
		$this->viewData['trailer_detail'] =  $this->trailer_model->getTrailerByID($this->action_id);
		$this->actionType = 'update';
		$this->viewData['title'] = 'Edit Trailer';
		$this->add_trailer();
	}


	//------------------------ Trailer delete Function ------------------------//
	public function delete(){


		$remark = $this->input->get('remark');
		$id = $this->input->get('id');

		valid_company('trailer','company_id',$id);

		if(!empty($remark)){

			$getRemark = $this->db->query("SELECT `remarks` FROM `trailer` where `id` = '".$id."'")->row()->remarks;


			$this->db->query("UPDATE `trailer` SET `remarks`= '".$getRemark.',Deactivate:'.$remark."' where `id` = '".$id."'");
		}

		if($this->trailer_model->deleteTrailer($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Deactivate',
				'action_on'		=>	get_from('trailer','unit_no',['id'=>$id]),
				'action_place'	=>	'Trailer',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Trailer deleted Successfully');
		}else{
			$this->session->set_flashdata('error', 'Trailer Not deleted Successfully');
			
		}


		return redirect('trailer');

	}

/*Excel Import Start*/


	function import(){
		$config['upload_path']          = './uploads/excel_files';
        $config['allowed_types']        = 'xlsx|csv|xls';
        $config['max_size']             = 5048 ;
        $config['encrypt_name']         = true ;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('excel_file'))
        {
                //$error = array('error' => $this->upload->display_errors());

                // $this->load->view('company/drivers/excel_upload', $error);
                $this->session->set_flashdata('error', $this->upload->display_errors());

				return redirect('trailer');
        }
        else
        {	
    		require(APPPATH.'libraries/excel/excel_reader2.php');
			require(APPPATH.'libraries/excel/SpreadsheetReader.php');

            $data = array('upload_data' => $this->upload->data());
			$Filepath = $data['upload_data']['full_path'];
				// $string = read_file($data['upload_data']['full_path']);
				// var_dump($string );
					// Excel reader from http://code.google.com/p/php-excel-reader/

			try
			{
				$Spreadsheet = new SpreadsheetReader($Filepath);

				$Sheets = $Spreadsheet -> Sheets();
				$indexsOfexcel  = null;
				$allExcelData = array();
				$singleRowExcel = null;
				$rowCount = 0;
				foreach ($Sheets as $Index => $Name)
				{

					$Spreadsheet -> ChangeSheet($Index);

					foreach ($Spreadsheet as $Row)
					{
						if ($rowCount != 0)
						{
							$singleRowExcel = ($Row);

							array_walk($singleRowExcel,array($this, 'removeExcelSpaces'));

							$allExcelData[] = array_combine($indexsOfexcel,$singleRowExcel);
						}else{
							$indexsOfexcel = ($Row);

							array_walk($indexsOfexcel,array($this, 'removeExcelSpaces'));
							
						}
						$rowCount++;
					}
					break;
				}

			}
			catch (Exception $E)
			{
				echo $E -> getMessage();
			}

			array_walk($allExcelData,array($this, 'excelExtraFilterfunc'));
			
			$returnMsg = $this->checktheexceldata($allExcelData);
						
			if($returnMsg !== true){
				
				$this->session->set_flashdata('error', $returnMsg);
			}else{
				$this->session->set_flashdata('success', 'Driver\'s Imported Successfully.');
				
			}
				return redirect('trailer');
        }
	}


	function excelExtraFilterfunc(&$item){

		if(!empty($item['AnnualSafety(DUE)'])){

			$item['AnnualSafety(DUE)'] = DateTime::createFromFormat('d-M-Y', $item['AnnualSafety(DUE)'])->format('Y-m-d');
		}
		if(!empty($item['Addition'])){

			$item['Addition'] = DateTime::createFromFormat('d-M-Y', $item['Addition'])->format('Y-m-d');
		}
	}

	function removeExcelSpaces(&$item,&$key){
		$item = trim(filter_var($item,FILTER_SANITIZE_STRING));//trim($item);
		$key = trim(filter_var($key,FILTER_SANITIZE_STRING));//trim($key);
	}

	function checktheexceldata($data){
		$indexes = [
			'UNIT #' => 'unit_no',
			'VIN #' => 'vin_no',
			'Plate #' => 'plate_no',
			'MAKE' => 'make',
			'YEAR' => 'year',
			'A.Safety Due' => 'annual_safety_due',
			'Owner/Leased' => 'leased_owned',
			'Reefer/Dry Van' => 'reefer_dryvan', //REEFER , DRYVAN
			'Status' => 'status',
			'License No#' => 'driver_license',
			'Remark' => 'remarks',
			// 'Contracts Due' => 'emp_license_class',
			// 'Leased/Owned' => 'medical_due',
			'Addition' => 'addition',
			// 'Remark' => 'current_city',
		];

		foreach ($data as $singleRowExcel) {
			unset($singleRowExcel['Sr.No']);
			// if(count($singleRowExcel) !== 24){
			// 	return 'Missing Columns';
			// }

			/*(optional)This func to check wrong or extra index in excel*/
			$returnMsg = $this->arrayExcelIndex($singleRowExcel,$indexes);

			if($returnMsg !== true){
				return $returnMsg;
			}else{
				foreach ($singleRowExcel as $key => $value) {
					$array2[$indexes[$key]] = $value;
				}
				$array2['company_id'] = $this->get_company_id();
				$array3[] = $array2;
			}
		}

		$returnMsg = $this->trailer_model->excelSave($array3);
		if($returnMsg !== true){
			return $returnMsg;
		}
		return true;
	}

	function arrayExcelIndex($data,$indexes){
		foreach($data as $key => $value){
			if(!array_key_exists($key,$indexes)){
				return $key.' Is Not a correct column name';
			}
		}

		return true;
	}

/*Excel Import End*/
	public function active($id=0){

		valid_company('trailer','company_id',$id);

		$getRemark = $this->db->query("SELECT `remarks` FROM `trailer` where `id` = '".$id."'")->row()->remarks;

		if(!empty($getRemark)){
			$remarks = explode(',', $getRemark);
			foreach ($remarks as $key => $value) {
				if (strpos($value, 'Deactivate:') !== false) {
			    	unset($remarks[$key]);
				}
			}
		}
		$this->db->query("UPDATE `trailer` SET `remarks`= '".implode(',', $remarks)."' where `id` = '".$id."'");


		if($this->trailer_model->activeTrailer($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Activate',
				'action_on'		=>	get_from('trailer','unit_no',['id'=>$id]),
				'action_place'	=>	'Trailer',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Trailer Activated Successfully');
		}else{
			$this->session->set_flashdata('error', 'Trailer Not Activated Successfully');
		}


		return redirect('trailer');
	}

	public function driverFormVali($trailerData){
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
                                            'field' => 'unit_no',
                                            'label' => 'UNIT NO',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[1]|max_length[20]|callback_unit_check'
                                         ),
                                    array(
                                            'field' => 'vin_no',
                                            'label' => 'VIN NO',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[10]|max_length[30]|alpha_numeric|callback_vin_check'
                                         ),
                                    array(
                                            'field' => 'year',
                                            'label' => 'Year ',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[1]|max_length[5]|numeric'
                                         ),
                                    array(
                                            'field' => 'addition',
                                            'label' => 'Addition',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[4]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'status',
                                            'label' => 'Status',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[5]|max_length[30]|in_list[COMPANY,OWNER]'
                                    ),
                                    array(
                                            'field' => 'make',
                                            'label' => 'Make',
                                            'rules' => 'required|trim|htmlspecialchars'
                                        ),

                                    array(
                                            'field' => 'reefer_dryvan',
                                            'label' => 'Reefer/Dryvan',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[5]|max_length[30]|in_list[REEFER,DRYVAN]'
                                    ),
                                    array(
                                            'field' => 'ownership_name',
                                            'label' => 'Name On Ownership',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[3]|max_length[150]'
                                    ),
                                    array(
                                            'field' => 'owner_leased',
                                            'label' => 'Own/Leased',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[3]|max_length[10]|in_list[Own,Leased]'
                                    ),
                                    array(
                                            'field' => 'annual_safety_due',
                                            'label' => 'Annual Safety Due',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[4]|max_length[20]'
                                    ),
                                    array(
                                            'field' => 'plate_no',
                                            'label' => 'Licence plate No',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[2]|max_length[20]|callback_plate_no_check'
                                    ),


                            );
		//------------------------Extra Form Validation Rules ------------------------//
			if(isset($trailerData['status'])):
				if(strtoupper($trailerData['status']) == 'OWNER'){
					//$this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|htmlspecialchars|required|alpha');
					$rulesArr[] = array(
	                                            'field' => 'owner_name',
	                                            'label' => 'Owner Name',
	                                            'rules' => 'trim|htmlspecialchars|required|alpha'
	                                    );
				}
			endif;
			if(isset($trailerData['owner_leased'])):
				if(strtoupper($trailerData['owner_leased']) == 'LEASED'){
					//$this->form_validation->set_rules('lease_end_date', 'Lease End Date', 'trim|required|htmlspecialchars');
					$rulesArr[] = array(
	                                            'field' => 'lease_end_date',
	                                            'label' => 'Lease End Date',
	                                            'rules' => 'trim|required|htmlspecialchars'
	                                    );
				}
			endif;
			return $rulesArr;
	}
}
?>