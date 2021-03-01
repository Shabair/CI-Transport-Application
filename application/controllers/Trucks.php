<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
class Trucks extends MY_Controller {
	
	function __construct()
		{
			parent::__construct();
			$this->load->helper('pdf_helper');
			$this->load->model("truck_model");
			$this->load->model("driver_model");
		}
	
	//------------------------ Truck List ------------------------//
	public function datatable_json()
	{				   					   

		$Records = $this->truck_model->GetAll($this->get_company_id());
		
        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r) 
		{  
			$AS_R = $this->getAnSafetyNRemark($r['annual_safety_due'],$r['remark']);

			if($this->session->userdata('user_search_type') != '1'){
				$M1 = $AS_R;
				$M2 = $r['status']."<br />".$this->getDriverName($r['owner_name']);
				$M3 = $r['ownership_name'];
				$M4 =  getDateFromDB($r['addition']);
				
			}else{
				
				$M1 = $r['status']."<br />".$this->getDriverName($r['owner_name']);
				$M2 = $r['ownership_name'];
				$M3 =  getDateFromDB($r['addition']);
				$M4 = $AS_R;
			}	

			$ext=($r['deactive']==0)?'<button class="btn btn-xs btn-danger" onclick="showDetails(this)" data-deleted-id="'.$r["id"].'" data-toggle="modal" data-target=".bs-example-modal-sm" ><i class="fa fa-trash-o"></i></button>':'<a class="btn btn-xs btn-success" title="Activate" href="'.base_url('trucks/active/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';

			$data[]= array(
				$count++,
                $r['unit_no'],
				$r['license_plate'],
				$r['vin_no'],
				$r['make'],
				$r['year'],
				$M1,
				$M2,
				$M3,
				$M4,
				$r['rfid_tag_no'],				
				
				'<a class="btn btn-xs btn-success" href="'.base_url('trucks/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('trucks/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				 '.$ext,
			);
        }
		
		
		// $Records['data']=$data;
  //       echo json_encode($Records);	
        echo json_encode($data);					   
	}	
	//------------------------ Truck Add ------------------------//
	
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
	
	//------------------------ Truck Add ------------------------//
	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}
	//------------------------ Truck Add ------------------------//

	public function index()
	{
		$this->session->unset_userdata('user_search_type');
		$AllCounts = $this->truck_model->count('truck');
		/*All Ites Count*/
		$this->viewData += $AllCounts;
		/*End of Counts*/
		$this->viewData['title'] = 'Truck List : TDMA';
		$this->viewData['view']  = 'company/truck/truck_list';
		$this->load->view('company/layout', $this->viewData);	
	}
		

	//------------------------ Truck Add ------------------------//

	public function add(){
		
		$this->actionType = 'add';
		$this->viewData['title'] = 'Add Truck : TDMA';
		$this->add_truck();

		
	}

	//------------------------ Truck Add ------------------------//
	public function add_truck()
	{

		//this will work only for when we editing the driver
        if($this->input->post('action_token')){
        	$actionByUser = check_action_token('action_token');
        	if(empty($actionByUser)){
        		$this->errors[] = 'Invalid Truck Identification.';
        	}else if(!empty($actionByUser->action_on) && $this->action_id != $actionByUser->action_on){
        		$this->errors[] = 'Invalid Truck Identification.';
        	}
        }

		$this->form_validation->set_rules($this->truckFormVali($this->input->post()));

		if($this->form_validation->run() ==  False){

			$this->errors[] = validation_errors();

		}
		else{
			
			$data= array(
				'unit_no' 				=> 	$this->input->post('unit_no'),
				'vin_no' 				=> 	strtoupper($this->input->post('vin_no')),
				'make' 					=> 	$this->input->post('make'),
				'year' 					=> 	$this->input->post('year'),
				'addition' 				=> 	setDateInDB($this->input->post('addition')),
				'license_plate' 		=> 	strtoupper($this->input->post('license_plate')),
				'o_lic_plate' 			=> 	strtoupper($this->input->post('o_lic_plate')),
				'ambassadorbrige' 		=> 	$this->input->post('ambassadorbrige'),
				'rfid_tag_no' 			=> 	$this->input->post('rfid_tag_no'),
				'kentykey' 				=> 	$this->input->post('kentykey'),
				'ownership_name' 		=> 	$this->input->post('ownership_name'),
				'annual_safety_due' 	=> 	setDateInDB($this->input->post('annual_safety_due')),
				'status' 				=> 	$this->input->post('status'),
				'owner' 				=> 	$this->input->post('owner'),
				'owner_name'			=>  $this->input->post('owner_name'),
				'contract_due'			=>  setDateInDB($this->input->post('contract_due')),
				'owner_leased'			=>	$this->input->post('owner_leased'),
				'lease_end_date'		=>	$this->input->post('lease_end_date'),
				'remark'				=>	$this->input->post('remark')
			); 

			


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']	= '100000000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';

			$files = [
				'owner_ship_pdf',
				'contract_pdf',
				'owner_leased_pdf',
				'annual_safety_pdf',
				'orgen_permit_pdf',
				'maxico_permit_pdf',
				'newyork_pdf',
				'transponder_pdf',
			];

			for($i=0;$i<count($files);$i++){
				$get_image = image_upload($files[$i],$config,$this->action_id,'truck');
				if(!isset($get_image['errors']) && isset($get_image['image'])){
					$data[$files[$i]] = $get_image['image'];
				}else{
					$errors[] = $get_image['errors'];
				}
			}
			
			//------------------------------ transponder PDF Upload------------------------------//

			if($this->actionType == 'add'){

					$data['company_id'] = $this->get_company_id();
			}
		}// form_validation else
			//------------------------------ transponder PDF Upload------------------------------//
		
		if(!isset($this->errors))
		{	
			if($this->actionType == 'add'){
				$data['created_date']  = date('Y/m/d');

				$result = $this->truck_model->insertTruck($data);
	
				if($result)
				{
					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->db->insert_id(),
						'action'		=>	'Add',
						'action_on'		=>	$data['unit_no'],
						'action_place'	=>	'Truck',
					];
					history($historydata);

					$this->session->set_flashdata('success', 'Truck Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert Truck');
				}
			}else if($this->actionType == 'update'){
				$result =  $this->truck_model->updateTruck($data, $this->action_id);
			
				if($result)
				{	

					$historydata = [
						'company_id'	=>	$this->get_company_id(),
						'user_id'		=>	$this->get_user_id(),
						'action_id'		=>	$this->action_id,
						'action'		=>	'Update',
						'action_on'		=>	$data['unit_no'],
						'action_place'	=>	'Truck',
					];
					history($historydata);
					$this->session->set_flashdata('success', 'Truck Updated Successfully');
				}
			}else{
				$this->session->set_flashdata('errors', 'Updating Not Added successfully.');
			}
			
			return redirect('trucks');
		}else{

			$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
			
			$this->viewData['action_token'] = $cipher;
			$this->viewData['getDriver'] =  $this->truck_model->getDriver($this->get_company_id());

			$this->viewData['view']  = 'company/truck/truck_add';
			$this->load->view('company/layout', $this->viewData);

		}


	}
	//------------------------ Is Unit No duplicate ------------------------//

        function unit_check($str)
        {
        	$sql = "SELECT id from truck where company_id = '".$this->get_company_id()."' AND unit_no = '".$str."' AND id != '".$this->action_id."' ";
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
        	$sql = "SELECT id from truck where company_id = '".$this->get_company_id()."' AND  vin_no = '".$str."' AND id != '".$this->action_id."' ";
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
        	$sql = "SELECT id from truck where company_id = '".$this->get_company_id()."' AND  license_plate = '".$str."' AND id != '".$this->action_id."' ";

        	$result =  $this->db->query($sql);
        	if($result->num_rows()> 0){
        		$this->form_validation->set_message('plate_no_check', 'The {field} can\'t duplicate.');
            	return false;
        	}else{
        		return true;
        	}
        }

		
	//------------------------ Truck Edit Function ------------------------//
	public function edit($id=0)
	{
		valid_company('truck','company_id',$id);
		$this->action_id = $id;
		$this->viewData['truck_detail'] =  $this->truck_model->getTruckByID($id);
		$this->actionType = 'update';
		$this->viewData['title'] = 'Edit Truck';
		$this->add_truck();
	}
	//------------------------ Truck Active/Inactive Function ------------------------//
	public function role($id=0)
	{

		$result = $this->company_model->deletecompany($id);
		if ($result) 
		{
			$this->session->set_flashdata('success', 'company has been deleted successfully.');
			redirect('company');
		} 
	}
	//------------------------ Truck Detail Function ------------------------//
	public function view($id=0)
	{   
		valid_company('truck','company_id',$id);

		$data['getDriver'] =  $this->truck_model->getDriver($this->get_company_id());
		$data['truck_detail'] =  $this->truck_model->getTruckByID($id);
		$data['title'] = 'Detail Truck : TDMA';
		$data['view']  = 'company/truck/truck_view';
		$this->load->view('company/layout', $data);
		
	}
		
	//------------------------ Truck Detail Function ------------------------//

//------------------------ Truck delete Function ------------------------//
	public function delete(){


		$remark = $this->input->post('remark');
		$id = $this->input->post('id');
		
		valid_company('truck','company_id',$id);

		if(!empty($remark)){

			$getRemark = $this->db->query("SELECT `remark` FROM `truck` where `id` = '".$id."'")->row()->remark;

		
			$this->db->query("UPDATE `truck` SET `remark`= '".$getRemark.',Deactivate:'.$remark."' where `id` = '".$id."'");
		}

		if($this->truck_model->deleteTruck($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Deactivate',
				'action_on'		=>	get_from('truck','unit_no',['id'=>$id]),
				'action_place'	=>	'Truck',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Truck deleted Successfully');

		}else{
			$this->session->set_flashdata('error', 'Truck Not deleted Successfully');
		}


		return redirect('trucks');

	}


	public function active($id=0){
		valid_company('truck','company_id',$id);

		$getRemark = $this->db->query("SELECT `remark` FROM `truck` where `id` = '".$id."'")->row()->remark;

		if(!empty($getRemark)){
			$remarks = explode(',', $getRemark);
			foreach ($remarks as $key => $value) {
				if (strpos($value, 'Deactivate:') !== false) {
			    	unset($remarks[$key]);
				}
			}
		}

		$this->db->query("UPDATE `truck` SET `remark`= '".implode(',', $remarks)."' where `id` = '".$id."'");

		if($this->truck_model->activeTruck($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Activate',
				'action_on'		=>	get_from('truck','unit_no',['id'=>$id]),
				'action_place'	=>	'Truck',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Truck Activated Successfully');

		}else{
			$this->session->set_flashdata('error', 'Truck Not Activated Successfully');
		}

		return redirect('trucks');
	}

	function getDriverName($id){
		if(is_numeric($id)):

			$drivers=$this->truck_model->getDriver($this->get_company_id());
			$extraArr=array();
			foreach ($drivers as $value) {
				// $extraArr[] = $value->id;
				if($value->id == $id){
					return $value->first_name;
				}
			}

		else:
			return $id;
		endif;
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

				return redirect('trucks');
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

					foreach ($Spreadsheet as $Key => $Row)
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
			// var_dump($allExcelData);
			// 					die();
			array_walk($allExcelData,array($this, 'excelExtraFilterfunc'));
			
			$returnMsg = $this->checktheexceldata($allExcelData);
			if($returnMsg !== true){
				
				$this->session->set_flashdata('error', $returnMsg);
			}else{
				$this->session->set_flashdata('success', 'Trucks\'s Imported Successfully.');
				
			}
				return redirect('trucks');
        }
	}


	function excelExtraFilterfunc(&$item){

		if(!empty($item['AnnualSafety(DUE)'])){

			$item['AnnualSafety(DUE)'] = DateTime::createFromFormat('d-M-Y', $item['AnnualSafety(DUE)'])->format('Y-m-d');
		}
		if(!empty($item['Addition'])){

			$item['Addition'] = DateTime::createFromFormat('d-M-Y', $item['Addition'])->format('Y-m-d');
		}
		if(!empty($item['Contracts Due'])){

			$item['Contracts Due'] = setDateInDB($item['Contracts Due']); //DateTime::createFromFormat('d-M-Y', $item['Contracts Due'])->format('Y-m-d');
		}
	}

	function removeExcelSpaces(&$item,&$key){
		$item = trim(filter_var($item,FILTER_SANITIZE_STRING));//trim($item);
		$key = trim(filter_var($key,FILTER_SANITIZE_STRING));//trim($key);
	}

	function checktheexceldata($data){
		$indexes = [
			'UNIT #' => 'unit_no',
			'LICENCE PL#' => 'license_plate',
			'VIN #' => 'vin_no',
			'MAKE' => 'make',
			'YEAR' => 'year',
			'AnnualSafety(DUE)' => 'annual_safety_due',
			'Contracts Due' => 'contract_due',
			'Leased/Owned' => 'leased_owned',
			'Status' => 'status',
			'License No#' => 'driver_license',
			'Remark' => 'remark',
			// 'Status' => 'emp_license_exp_date',
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

		$returnMsg = $this->truck_model->excelSave($array3);
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








	public function truckFormVali($trailerData){
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
                                            'field' => 'license_plate',
                                            'label' => 'Licence plate No',
                                            'rules' => 'required|trim|htmlspecialchars|min_length[2]|max_length[20]|callback_plate_no_check'
                                    ),
			);

	//------------------------Extra Form Validation Rules ------------------------//
		if(isset($trailerData['status'])):
			if($trailerData['status'] == 'OWNER'){
				$rulesArr[] =  array(
                                            'field' => 'owner',
                                            'label' => 'Driver/Other',
                                            'rules' => 'trim|htmlspecialchars|required|in_list[driver,other]'
                                    );
					if(isset($trailerData['owner'])):
						if($trailerData['owner'] == 'driver'){
							$allDrivers = $this->truck_model->getDriver($this->get_company_id());

							$extraArr=array();
							foreach ($allDrivers as $value) {
								$extraArr[] = $value->id;
							}
							
							$implodeDrivers=implode(',', $extraArr);
						
							$rulesArr[] =  array(
		                                            'field' => 'owner_name',
		                                            'label' => 'Owner Name',
		                                            'rules' => 'trim|htmlspecialchars|required|in_list['.$implodeDrivers.']',
		                                            'errors' => array(
										                        'required' => 'You must provide a valid driver %s.',
										                ),
		                                    );
							
						}else{
							$rulesArr[] =  array(
		                                            'field' => 'owner_name',
		                                            'label' => 'Owner Name',
		                                            'rules' => 'trim|htmlspecialchars|required'
		                                    );
						}
					endif;
				}

		endif;
			if(isset($trailerData['owner_leased'])):
				if(strtoupper($trailerData['owner_leased']) == 'LEASED'){
					$rulesArr[] =  array(
	                                            'field' => 'lease_end_date',
	                                            'label' => 'Lease End Date',
	                                            'rules' => 'trim|required|htmlspecialchars'
	                                    );
				}
			endif;

	//------------------------Extra Form Validation Rules ------------------------//
		return $rulesArr;
	}



	public function extrafunc($id)
	{
		if(is_numeric($id)):

			$drivers=$this->truck_model->getDriver($this->get_company_id());
			$extraArr=array();
			foreach ($drivers as $value) {
				// $extraArr[] = $value->id;
				if($value->id == $id){
					return $value->first_name;
				}
			}

		else:
			return $id;

		endif;
		//var_dump($drivers);
		
	}





}//class end
?>