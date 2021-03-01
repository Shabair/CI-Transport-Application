<?php
class Driver extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('pdf_helper');
		$this->load->model("driver_model");
		$this->load->helper('sendemail');
		$this->load->model('Driver_Model','DM');
	}
	
	//------------------------------------------------
	public function index()
	{
		
		$this->session->unset_userdata('activation_status');
		$this->session->unset_userdata('user_search_type');
		$this->session->unset_userdata('user_search_from');
		$this->session->unset_userdata('user_search_to');

		/*All Ites Count*/
		$AllCounts = $this->DM->count('drivers');
		$this->viewData += $AllCounts;
		/*End of Counts*/

        // $drivers = $this->DM->get_drivers('*' ,'drivers' ,['company_id'=>$this->get_company_id()]);
		

		$this->viewData['title'] = 'Drivers List : DMS';
		$this->viewData['view']  = 'company/drivers/drivers_list';
		// $this->viewData['drivers']  = $drivers;

		$this->load->view('company/layout', $this->viewData);	
	}
	//-----------------------------------------
	public function datatable_json()
	{				   					   
			
		$Records = $this->driver_model->GetAll($this->get_company_id());
		
        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r) 
		{  

			$ext=($r['deactive']==0)?'<button class="delete btn btn-xs btn-danger pull-right" onclick="showDetails(this)" style="margin-right:10px;" data-deleted-id="'.$r["id"].'" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-trash-o"></i></button>':'<a class="delete btn btn-xs btn-success pull-right" title="Activate" style="margin-right:10px;" href="'.base_url('driver/active/'.$r['id']).'"> <i class="fa fa-plus"></i></a>';

			$data[]= array(
				$count++,
                                '<a style="margin-right:10px;" href="'.base_url('driver/view/'.$r['id']).'">'.$r['first_name'].'</a>',
                                $r['middle_name'],
				$r['last_name'],
				$r['email'],
				$r['phonenumber'],
				$r['current_city'].' '.$r['current_province'],					
				$r['current_address'],
				$r['current_postal_code'],
				$r['email'],
				$r['sin'],
				$r['medical_due'],
				$r['cvor_date'],
				$r['created_date'],
				$this->pendingWorks($r['id']).
				'<div id="action_buttons_'.$count.'" style="display:none;"><a class="view btn btn-xs btn-info pull-right" style="margin-right:10px;" href="'.base_url('driver/get_driver_pdf/'.$r['id']).'" target="_blank">  <i title="Pdf" class="fa fa-file-text"></i></a>
				'.$ext.'
				 <a class="update btn btn-xs btn-primary pull-right" style="margin-right:10px;" href="'.base_url('driver/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o" title="Edit"></i></a>
				 <a class="view btn btn-xs btn-info pull-right" style="margin-right:10px;" href="'.base_url('driver/view/'.$r['id']).'"> <i class="fa fa-eye" title="View"></i></a></div>'.'<a id="balloon" class="balloon view btn btn-xs btn-info pull-right" style="margin-right:10px;" data-addoverlay="true" data-highlight="true" data-overlaycolor="linear-gradient(to left, rgb(224, 224, 224), rgb(177, 177, 177))" data-overlayopacity=".55" data-bgcolor="#f9f9f9" data-balloon= "{element} #action_buttons_'.$count.'" data-onlyonce="false" style="" href="javascript:;"> <i class="fa fa-bars" title="Actions"></i></a>',
			);
        }
		
		
		//$Records['data']=$data;
        // echo json_encode($Records);	
        echo json_encode($data);					   
	}
	//--------------------------------------------------
	function pendingWorks($driver_id){

		
		return '<a class=" pulsate-table view btn btn-xs btn-danger pull-right" style="margin-right:10px;" href="'.base_url('driver/get_driver_pdf/'.$driver_id).'">  <i title="Pdf" class="fa fa-exclamation-triangle" title="Delete"></i></a>';
	}
	//--------------------------------------------------
	public function search()
	{
		$this->session->set_userdata('activation_status',$this->input->post('activation_status'));
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
		$this->session->set_userdata('user_search_from',$this->input->post('user_search_from'));
		$this->session->set_userdata('user_search_to',$this->input->post('user_search_to'));
	}
	//------------------------------------------------
	public function add($id=0){

		$this->actionType = 'add';
		$this->viewData['title'] = 'Add Drivers';
		$this->add_driver();
		
	}
	
	function valid_user($id,$column){

		if(($this->db->select($column)->where('id',$id)->get('drivers')->row()->company_id != $this->get_company_id())){
			$this->session->set_flashdata('error', 'Error in Accessing.');
			return redirect('driver');
		}
		
	}
	
	public function edit($id=0){

		valid_company('drivers','company_id',$id);
		$this->action_id = $id;
		$this->viewData['driver'] =  $this->driver_model->getDriverData($this->action_id)->row_array();
		$this->actionType = 'update';
		$this->viewData['title'] = 'Edit Driver';
		$this->add_driver();

	}

	function view_edit(){



		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$id = $this->input->post('pk');

		//$query ="UPDATE `drivers` SET `".$name."` = '".$value."' WHERE `id` = '".$id."' ";
		$driver_detail=['emp_license_no','emp_license_class','emp_license_org_date','emp_license_exp_date','emp_license_restrictions','emp_license_endrosments','emp_license_state','passport_number','passport_date','fast_card_no','fast_card_expiry','police_report_date'];
		$driver_experience = ['emp_spl_equ_list','emp_spl_equ_list','road_test_examiner'];
		if(in_array($name, $driver_detail)){
			$query ="UPDATE `driver_detail` SET `".$name."` = '".$value."' WHERE `driver_id` = '".$id."' ";
		}else if(in_array($name, $driver_experience)){
			$query ="UPDATE `driver_experience` SET `".$name."` = '".$value."' WHERE `driver_id` = '".$id."' ";
		}else{
			$query ="UPDATE `drivers` SET `".$name."` = '".$value."' WHERE `id` = '".$id."' ";
		}

		$result = $this->db->query($query);

		if($this->db->affected_rows() == 0){
			if($result !== true){
				header('HTTP/1.0 400 Bad Request', true, 400);
	    		echo $result;
	    		return false;
			}
		}

	}
	
	function view($id){
		$this->valid_user($id,'company_id');
		$this->load->model('drug_model');

		$data['company_id'] = $this->get_company_id();
		$data['driver'] = $this->driver_model->getDriverData($id)->row_array();
		$data['collision'] = $this->db->query("SELECT * FROM `collision` WHERE `driver_id` = '".$id."' AND company_id = '".$this->get_company_id()."'")->result_array();
		$data['citation'] = $this->db->query("SELECT * FROM `citation` WHERE `driver_id` = '".$id."' AND company_id = '".$this->get_company_id()."'")->result_array();
		$data['inspection'] = $this->db->query("SELECT * FROM `inspection` WHERE `driver_id` = '".$id."' AND company_id = '".$this->get_company_id()."'")->result_array();
		$data['driver_trucks'] = $this->db->query("SELECT `unit_no`,`vin_no`,`addition`,`license_plate`,`annual_safety_due`,`contract_due` FROM `truck` WHERE `owner` = 'driver' AND owner_name = '".$id."' AND `deactive` = '0'")->result_array();



		$data['title'] = 'View Driver: DMS';
		$data['view']  = 'company/drivers/driver_view';
/**/	
		$drugTestData = get_from('extra_data','tbl_val',['tbl_item_id'=>$id,'tbl_name'=>'getDrugTestId']);
		if(!empty($drugTestData)){
			$drugTestData = unserialize($drugTestData);
		}
		$data['driverAllTests'] = $drugTestData;
		$data['driver_id'] = $id;
// 		var_dump($drugTestData);
// die();

		$this->load->view('company/layout', $data);

	}



		public function edit_sapof($id,$driver_id){
			valid_company('drug','company_id',$id);

		    //$data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
		    $data['drug_detail'] =  $this->drug_model->getDrugByID($id);
		    $data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
		    $data['driver_id'] = $driver_id;

			$data['title'] = 'Edit Drug : DMS';
			$data['view']  = 'company/drug/drug_sap_edit';
			$this->load->view('company/layout', $data);
		}
	
	public function add_driver($update = NULL){
		//this will work only for when we editing the driver
        if($this->input->post('action_token')){
        	$actionByUser = check_action_token('action_token');
        	if(empty($actionByUser)){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}else if(!empty($actionByUser->action_on) && $this->action_id != $actionByUser->action_on){
        		$this->errors[] = 'Invalid Trailer Identification.';
        	}
        }

		// $this->load->helper(array('form', 'url'));

        if($this->input->post('isFree') === 'True'){

        	$this->form_validation->set_rules($this->driverFormValiFree($this->input->post()));

        }else{

        	$this->form_validation->set_rules($this->driverFormVali($this->input->post()));
        }


        if ($this->form_validation->run() == FALSE)
        { 
        	$this->errors[] = validation_errors();
        	
        }
        else
        {


			//driver_detail
			$driver_detail = [
					'emp_license_no' 				=> $this->input->post('emp_license_no'),
					'emp_license_state' 			=> $this->input->post('emp_license_state'),
					'emp_license_org_date' 			=> setDateInDB($this->input->post('emp_license_org_date')),
					'emp_license_exp_date' 			=> setDateInDB($this->input->post('emp_license_exp_date')),
					'emp_license_class' 			=> $this->input->post('emp_license_class'),
					'emp_license_restrictions' 		=> $this->input->post('emp_license_restrictions'),
					'emp_license_endrosments' 		=> $this->input->post('emp_license_endrosments'),
					'performance_reason' 			=> $this->input->post('performance_reason'),
					'fast_card_no' 					=> $this->input->post('fast_card_no'),
					'fast_card_expiry'	 			=> $this->input->post('fast_card_expiry'),
			];

			if(isset($_POST['passport']) && $this->input->post('passport')=='Yes' ){
				$driver_detail['passport_number']					= $this->input->post('passport_number');
				$driver_detail['passport_date']						= setDateInDB($this->input->post('passport_date'));
			}else{
				$driver_detail['passport_number']					=NULL ;
				$driver_detail['passport_date']						=NULL ;			}

			if(isset($_POST['bond_status']) && $this->input->post('bond_status')=='Yes' ){
				$driver_detail['bonding_company']					= $this->input->post('bonding_company');
			}else{
				$driver_detail['bonding_company']					= NULL;
			}

			if(isset($_POST['performance_status']) && $this->input->post('performance_status')=='Yes' ){
				$driver_detail['performance_reason']				= $this->input->post('performance_reason');
			}else{
				$driver_detail['performance_reason']				= NULL;
			}

			if(isset($_POST['felony_status']) && $this->input->post('felony_status')=='Yes' ){
				$driver_detail['conviction_crime']					= $this->input->post('conviction_crime');
			}else{
				$driver_detail['conviction_crime']					= NULL;				
			}

			if($this->input->post('position_applied')=='owner_operator' ){
				$driver_detail['wsib_no']		= $this->input->post('wsib_no');
			}

			if(isset($_POST['employment_status']) && $this->input->post('employment_status')=='No' ){
				$driver_detail['last_employment']					= $this->input->post('last_employment');
			}else{
				$driver_detail['last_employment']					= NULL;
			}

			if(isset($_POST['fast_driver_status']) && $this->input->post('fast_driver_status')=='Yes' ){
				$driver_detail['fast_card_no']					= $this->input->post('fast_card_no');
				$driver_detail['fast_card_expiry']				= $this->input->post('fast_card_expiry');
			}

			if(isset($_POST['fast_driver_status']) && $this->input->post('fast_driver_status')=='No' ){
				$driver_detail['willing_status_rdo']		= $this->input->post('willing_status_rdo');
				if(isset($_POST['willing_status_rdo']) && $this->input->post('willing_status_rdo')=='No' ){
					$driver_detail['not_willing_status']		= $this->input->post('not_willing_status');
				}else{
					$driver_detail['not_willing_status']		= NULL;
				}
				
			}else{
				$driver_detail['willing_status_rdo']		= NULL;
				$driver_detail['not_willing_status']		= NULL;
			}

			if(isset($_POST['worked_before']) && $this->input->post('worked_before')=='Yes' ){
				$driver_detail['b_worked_when']						= $this->input->post('b_worked_when');
				$driver_detail['b_pay_rate']						= $this->input->post('b_pay_rate');
				$driver_detail['b_from_date']						= setDateInDB($this->input->post('b_from_date'));
				$driver_detail['b_to_date']							= setDateInDB($this->input->post('b_to_date'));
				$driver_detail['b_work_position']					= $this->input->post('b_work_position');
				$driver_detail['b_leaving_reason']					= $this->input->post('b_leaving_reason');
			}else{
				$driver_detail['b_worked_when']						= NULL;
				$driver_detail['b_pay_rate']						= NULL;
				$driver_detail['b_from_date']						= NULL;
				$driver_detail['b_to_date']							= NULL;
				$driver_detail['b_work_position']					= NULL;
				$driver_detail['b_leaving_reason']					= NULL;			
			}

			if($this->input->post('police_report') == 'Yes'){
				$driver_detail['police_report_date']				= setDateInDB($this->input->post('police_report_date'));
			}else{
				$driver_detail['police_report_date']				= NULL;
			}


			//driver_detail end
			$p_add = $p_str = $p_ci = $p_pro = $p_dur = $p_pos = '';
			$pre_count = $this->input->post('prv_add_no');
			$driver_detail2['prv_add_no'] =  $pre_count;
			if($pre_count > 0){
				for($i=1;$i<=$pre_count;$i++){
					// $driver_detail2['previous_address_'.$i] = $this->input->post('previous_address_'.$i);

					$previous_address[] = $this->input->post('previous_address_'.$i);
					$previous_street[] = $this->input->post('previous_street_'.$i);
					$previous_city[] = $this->input->post('previous_city_'.$i);
					$previous_province[] = $this->input->post('previous_province_'.$i);
					$previous_postal_code[] = $this->input->post('previous_postal_code_'.$i);
					$previous_duration[] = $this->input->post('previous_duration_'.$i);


				}
					$driver_detail['previous_address'] = serialize($previous_address);
					$driver_detail['previous_street'] = serialize($previous_street);
					$driver_detail['previous_city'] = serialize($previous_city);
					$driver_detail['previous_province'] = serialize($previous_province);
					$driver_detail['previous_postal_code'] = serialize($previous_postal_code);
					$driver_detail['previous_duration'] = serialize($previous_duration);
			}



			$driver_table = [
				'phonenumber'						=> $this->input->post('phonenumber'),
				'homenumber' 						=> $this->input->post('homenumber'),
				'emg_contact' 						=> $this->input->post('emg_contact'),
				'emg_contact_number' 				=> $this->input->post('emg_contact_number'),
				'alternative_phone' 				=> $this->input->post('alternative_phone'),
				'dob' 								=> setDateInDB($this->input->post('dob')),
				// 'witnessname' 						=> $this->input->post('witness_name'),
				'medical_due' 						=> setDateInDB($this->input->post('medical_due')),
				'topic' 							=> $this->input->post('topic'),
				'first_name' 						=> $this->input->post('first_name'),
				'middle_name' 						=> $this->input->post('middle_name'),
				'last_name' 						=> $this->input->post('last_name'),
				'email' 							=> $this->input->post('email'),
				'police_report' 					=> $this->input->post('police_report'),
				'current_address' 					=> $this->input->post('current_address'),	
				'current_city' 						=> $this->input->post('current_city'),	
				'current_province'					=> $this->input->post('current_province'),	
				'current_postal_code' 				=> $this->input->post('current_postal_code'),
				'current_duration'	 				=> $this->input->post('current_duration'),
				'passport' 							=> $this->input->post('passport'),
				'road_test' 						=> $this->input->post('road_test'),
				'sin' 								=> $this->input->post('sin'),
				'position_applied' 					=> $this->input->post('position_applied'),
				'cvor_date' 						=> setDateInDB($this->input->post('cvor_date')),
				'defensive_driving' 				=> $this->input->post('defensive_driving'),
				'road_evalution' 					=> $this->input->post('road_evalution'),
				'province_insurance' 				=> $this->input->post('province_insurance'),
				'legal_right' 						=> $this->input->post('legal_right'),
				'provide_age_proof' 				=> $this->input->post('provide_age_proof'),
				'worked_before' 					=> $this->input->post('worked_before'),
				'who_referred' 						=> $this->input->post('who_referred'),
				'pay_rate_expected' 				=> $this->input->post('pay_rate_expected'),
				'bond_status' 						=> $this->input->post('bond_status'),
				'performance_status' 				=> $this->input->post('performance_status'),
				'felony_status' 					=> $this->input->post('felony_status'),
				'employment_status' 				=> $this->input->post('employment_status'),
				'fast_driver_status' 				=> $this->input->post('fast_driver_status'),
				'prv_empl_his_no' 				    => $this->input->post('prv_empl_his_no'),
				'prv_acc_his_no' 				    => $this->input->post('prv_acc_his_no'),
				'prv_add_no' 				    	=> $this->input->post('prv_add_no'),
				

			];


			$employer_history = [

						'emp_highest_grade'=>$this->input->post('emp_highest_grade'),
						'emp_high_school'=>$this->input->post('emp_high_school'),
						'emp_college'=>$this->input->post('emp_college'),
						'emp_last_school'=>$this->input->post('emp_last_school'),
						'emp_skl_complete_address'=>$this->input->post('emp_skl_complete_address'),
						'prv_traffic_conviv_no'=>$this->input->post('prv_traffic_conviv_no'),
						'emp_drug_test_his_no'=>$this->input->post('emp_drug_test_his_no'),

			];



			$hCount=$this->input->post('prv_acc_his_no');
			if($hCount>0){

					$driver_detail2['prv_acc_his_no'] =$hCount;
				for($i=1;$i<=$hCount;$i++){

					$accident_date[] = setDateInDB($this->input->post('accident_date_'.$i));
					$accident_nature[] = $this->input->post('accident_nature_'.$i);
					$accident_fatalities[] = $this->input->post('accident_fatalities_'.$i);
					$accident_injuries[] = $this->input->post('accident_injuries_'.$i);
					$accident_hazardous[] = $this->input->post('accident_hazardous_'.$i);
				}

					$employer_history['accident_date'] =serialize($accident_date);
					$employer_history['accident_nature'] =serialize($accident_nature);
					$employer_history['accident_fatalities'] =serialize($accident_fatalities);
					$employer_history['accident_injuries'] =serialize($accident_injuries);
					$employer_history['accident_hazardous'] =serialize($accident_hazardous);
			}

			$hCount=$this->input->post('emp_drug_test_his_no');
			if($hCount>0){

				for($i=1;$i<=$hCount;$i++){
					

					$emp_drug_test_type[] = $this->input->post('emp_drug_test_type_'.$i);
					$emp_drug_test_date[] = setDateInDB($this->input->post('emp_drug_test_date_'.$i));
					$emp_drug_test_status_yn[] = $this->input->post('emp_drug_test_status_yn_'.$i);

				}

					$employer_history['emp_drug_test_type'] =serialize($emp_drug_test_type);
					$employer_history['emp_drug_test_date'] =serialize($emp_drug_test_date);
					$employer_history['emp_drug_test_status_yn'] =serialize($emp_drug_test_status_yn);

			}
			
			$no_pre_emp = $this->input->post('prv_empl_his_no');
			$driver_detail2['prv_empl_his_no'] = $no_pre_emp;
			if($no_pre_emp > 0){
				for($i=1;$i<=$no_pre_emp;$i++){
					
					
					$is_employed[] = $this->input->post('is_employed_'.$i);
					//if($this->input->post('is_employed_yes_'.$i) == 'Yes'){
						$employer_company_name[] = $this->input->post('employer_company_name_'.$i);
						$employer_name[] = $this->input->post('employer_name_'.$i);
						$position_held[] = $this->input->post('position_held_'.$i);
						$position_held_other[] = $this->input->post('position_held_other_'.$i);
						$salary_wage[] = $this->input->post('salary_wage_'.$i);
						$employer_leaving_reason[] = $this->input->post('employer_leaving_reason_'.$i);
						$fmcsr_status[] = $this->input->post('fmcsr_status_'.$i);
						$safety_sensitive_status[] = $this->input->post('safety_sensitive_status_'.$i);
					//}

					
					$employer_address[] 	= $this->input->post('employer_address_'.$i);
					$employer_number[] 		= $this->input->post('employer_number_'.$i);
					$employer_city[] 		= $this->input->post('employer_city_'.$i);
					$employer_province[] 	= $this->input->post('employer_province_'.$i);
					$emplyer_zip[] 			= $this->input->post('emplyer_zip_'.$i);
					$fax_no[] 				= $this->input->post('fax_no_'.$i);
					$employer_email[] 		= $this->input->post('employer_email_'.$i);
					$employment_fron_date[] = setDateInDB($this->input->post('employment_fron_date_'.$i));
					$employment_to_date[] 	= setDateInDB($this->input->post('employment_to_date_'.$i));

				}

					$employer_history['is_employed'] =	serialize($is_employed) ;
					$employer_history['employer_company_name'] =	serialize($employer_company_name) ;
					$employer_history['employer_name'] =	serialize($employer_name) ;
					$employer_history['employer_address'] =	serialize($employer_address) ;
					$employer_history['employer_number'] =	serialize($employer_number) ;
					$employer_history['employer_city'] =	serialize($employer_city) ;
					$employer_history['employer_province'] =serialize($employer_province) ;
					$employer_history['emplyer_zip'] =		serialize($emplyer_zip) ;
					$employer_history['fax_no'] =			serialize($fax_no) ;
					$employer_history['employer_email'] =	serialize($employer_email) ;
					$employer_history['position_held'] =	serialize($position_held) ;
					$employer_history['position_held_other'] =serialize($position_held_other) ;
					$employer_history['salary_wage'] =		serialize($salary_wage) ;
					$employer_history['employment_fron_date'] =serialize($employment_fron_date) ;
					$employer_history['employment_to_date'] =serialize($employment_to_date) ;
					$employer_history['employer_leaving_reason'] =serialize($employer_leaving_reason) ;
					$employer_history['fmcsr_status'] =		serialize($fmcsr_status) ;
					$employer_history['safety_sensitive_status'] =serialize($safety_sensitive_status) ;

			}
			$traf_conviv = $this->input->post('prv_traffic_conviv_no');
			if($traf_conviv>0){

				for($i=1;$i<=$traf_conviv;$i++){
					$traf_conviv_date[] = $this->input->post('traf_conviv_date_'.$i); 
	  				$traf_conviv_loc[] = $this->input->post('traf_conviv_loc_'.$i); 
	  				$traf_conviv_chrg[] = $this->input->post('traf_conviv_chrg_'.$i); 
	  				$traf_conviv_pen[] = $this->input->post('traf_conviv_pen_'.$i); 
				}

				$employer_history['traf_conviv_date'] = serialize($traf_conviv_date);
				$employer_history['traf_conviv_loc'] = serialize($traf_conviv_loc);
				$employer_history['traf_conviv_chrg'] = serialize($traf_conviv_chrg);
				$employer_history['traf_conviv_pen'] = serialize($traf_conviv_pen);

			}

			for($i=1;$i<=7;$i++){
				$status_de[]	 = $this->input->post('status_de'.$i);
				$type_de[]		 = $this->input->post('type_de'.$i);
				$from_de[]		 = setDateInDB($this->input->post('from_de'.$i));
				$to_de[]		 = setDateInDB($this->input->post('to_de'.$i));
				$miles_de[]		 = $this->input->post('miles_de'.$i);
			}
			
			for($i = 1; $i<=33 ; $i++){
				if($i == 15 ||$i == 16 ||$i == 17 ||$i == 18 ||$i == 19 ||$i == 20){
					$qualification_check_arr[$i] = [
								$this->input->post('qual_check_'.$i.'_s',true),
								$this->input->post('qual_check_'.$i,true),
					];

				}else{
					$qualification_check_arr[$i] = $this->input->post('qual_check_'.$i,true);//qualification_check
				}
			}

			$driver_experience = [
				'status_de'					=>	serialize($status_de),
				'type_de'					=>	serialize($type_de),
				'from_de'					=>	serialize($from_de),
				'to_de'						=>	serialize($to_de),
				'miles_de'					=>	serialize($miles_de),
				'emp_experience_year'                           =>	$this->input->post('emp_experience_year'),
				'emp_experience_month'                          =>	$this->input->post('emp_experience_month'),
				'emp_pro_state_list'                            =>	$this->input->post('emp_pro_state_list'),
				'emp_spl_cor'                                   =>	$this->input->post('emp_spl_cor'),
				'emp_awards'                                    =>	$this->input->post('emp_awards'),
				'emp_den_license'                               =>	$this->input->post('emp_den_license'),
				'emp_exp_us_commercial'                         =>	$this->input->post('emp_exp_us_commercial'),
				'emp_license_per'			=>	$this->input->post('emp_license_per'),
				'emp_other_trk_exp'			=>	$this->input->post('emp_other_trk_exp'),
				'emp_cor_tra_list'			=>	$this->input->post('emp_cor_tra_list'),
				'emp_spl_equ_list'			=>	$this->input->post('emp_spl_equ_list'),
				'emp_drug_test_status'		=>	$this->input->post('emp_drug_test_status'),
				'emp_last_reliev_on'		=>	setDateInDB($this->input->post('emp_last_reliev_on')),
				'emp_curr_work_status'		=>	$this->input->post('emp_curr_work_status'),
				'emp_another_emply_status'		=>	$this->input->post('emp_another_emply_status'),
				'qualification_check'		=>	serialize($qualification_check_arr),
			];




			for($i=1;$i<=14;$i++){
				$work_date[] = setDateInDB($this->input->post('work_date_'.$i));
				$hours_worked[] = $this->input->post('hours_worked_'.$i);
			} 
			$driver_experience['work_date'] = serialize($work_date);
			$driver_experience['hours_worked'] = serialize($hours_worked);

		}//end of form valid check

		if(!isset($this->errors)){
			if($this->actionType == 'update'){
					$table1 = $this->DM->updateinsertDriver($driver_table,$this->action_id);
					$table1update = $this->db->affected_rows();
						
					$table2 = $this->DM->updateinsertDriverDetail($driver_detail,$this->action_id);
					$table2update = $this->db->affected_rows();

					$table3 = $this->DM->updateinsertEmployerHistory($employer_history,$this->action_id);
					$table3update = $this->db->affected_rows();

					$table4 = $this->DM->updateinserDriverExperience($driver_experience,$this->action_id);
					$table4update = $this->db->affected_rows();

			 	if($table1 && $table2 && $table3 && $table4){
						if( $table1update > 0 || $table2update > 0 || $table3update > 0 ||$table4update > 0){
							/*($table,$column,$where = null,$notSingle = false)*/

							$data = [
								'company_id'	=>	$this->get_company_id(),
								'user_id'		=>	$this->get_user_id(),
								'action_id'		=>	$this->action_id,
								'action'		=>	'Update',
								'action_on'		=>	getDriverFullName($this->action_id),
								/*$driver_name['first_name'].' '.$driver_name['middle_name'].' '.$driver_name['last_name']*/
								'action_place'	=>	'Driver',
							];
							history($data);
							$this->session->set_flashdata('success', 'Driver has been Edit successfully.');

						}
						delete_action_token($this->session->userdata('action_token'));
						return redirect('driver');
				}else{
					$this->session->set_flashdata('error', 'Driver has not been Edit successfully.');
					return redirect('driver');
				}				
				
			}else if($this->actionType == 'add'){

				$driver_table['created_date'] 				= date('Y/m/d');
				$driver_table['application_date'] 			= $driver_table['created_date'];
				$driver_table['witnessname'] 				= $this->get_user_id();
				$driver_table['company_id'] 				= $this->get_company_id();

				$this->DM->insertDriver($driver_table);
				$driver_id = $this->db->insert_id();
				$driver_detail['driver_id']		= $driver_detail['id'] = $driver_id;
				$this->DM->insertDriverDetail($driver_detail);

				$employer_history['driver_id']  = $employer_history['id'] = $driver_id;
				  
				$this->DM->insertEmployerHistory($employer_history);
				
				$driver_experience['last_annual_review_date'] 	= $driver_table['created_date'];
				$driver_experience['driver_id'] = $driver_experience['id'] = $driver_id;
				$this->DM->inserDriverExperience($driver_experience);			

				$data = [
					'company_id'	=>	$this->get_company_id(),
					'user_id'		=>	$this->get_user_id(),
					'action_id'		=>	$driver_id,
					'action'		=>	'Add',
					'action_on'		=>	$driver_table['first_name'].' '.$driver_table['middle_name'].' '.$driver_table['last_name'],
					'action_place'	=>	'Driver',
				];
				history($data);
				/**/
				$this->session->set_flashdata('success', 'Driver has Added successfully.');
				delete_action_token($this->session->userdata('action_token'));
				return redirect('driver');
				

			}else{
				$this->session->set_flashdata('error', 'Driver Not Added successfully.');
			}
			
			return redirect('driver');

		}else{
			$cipher = (create_action_token($this->get_user_id(),$this->action_id,$this->actionType,url_generator(15)));
			
			$this->viewData['action_token'] = $cipher;

			$this->viewData['view']  = 'company/drivers/driver_add';
			$this->load->view('company/layout', $this->viewData);

		}

	}

	function import(){
		$config['upload_path']          = './uploads/excel_files';
        $config['allowed_types']        = 'xlsx|csv|xls';
        $config['max_size']             = 5048 ;
        $config['encrypt_name']         = true ;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('excel_file'))
        {
                //$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
				return redirect('driver');
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
				foreach ($Sheets as $Index => $Name)
				{

					$Spreadsheet -> ChangeSheet($Index);

					foreach ($Spreadsheet as $Key => $Row)
					{
						if ($Key != 0)
						{
							$singleRowExcel = ($Row);
							array_walk($singleRowExcel,array($this, 'removeExcelSpaces'));
                                                        
							$allExcelData[] = array_combine($indexsOfexcel,$singleRowExcel);
						}else{
							$indexsOfexcel = ($Row);
							array_walk($indexsOfexcel,array($this, 'removeExcelSpaces'));
							
						}
					}
					break;
				}

			}
			catch (Exception $E)
			{
				echo $E -> getMessage();
			}

			array_walk($allExcelData,array($this, 'changedrivernametempfunc'));
			
			$returnMsg = $this->checktheexceldata($allExcelData);
			if($returnMsg !== true){
				
				$this->session->set_flashdata('error', $returnMsg);
			}else{
				$this->session->set_flashdata('success', 'Driver\'s Imported Successfully.');
				
			}
				return redirect('driver');
        }
	}


	function changedrivernametempfunc(&$item){
		$fullName = $item['Driver Name'];
		$fullName = explode(',',$fullName);
		$item['Last Name'] = isset($fullName[0])?$fullName[0]:null;
		$halfName = explode(' ',trim($fullName[1]));
		$item['First Name'] = isset($halfName[0])?$halfName[0]:null;
		$item['Middle Name'] = isset($halfName[1])?$halfName[1]:null;

		if(!empty($item['Annual Review Due'])){

			$item['Annual Review Due'] = DateTime::createFromFormat('d-M-Y', $item['Annual Review Due'])->format('Y-m-d');
		}
		if(!empty($item['License Expiry'])){

			$item['License Expiry'] = DateTime::createFromFormat('d-M-Y', $item['License Expiry'])->format('Y-m-d');
		}
		if(!empty($item['Medical Expiry'])){

			$item['Medical Expiry'] = DateTime::createFromFormat('d-M-Y', $item['Medical Expiry'])->format('Y-m-d');
		}
		if(!empty($item['Date of Birth'])){

			$item['Date of Birth'] = DateTime::createFromFormat('d-M-Y', $item['Date of Birth'])->format('Y-m-d');
		}
		if(!empty($item['Date of hire (CDN)'])){

			$item['Date of hire (CDN)'] = DateTime::createFromFormat('d-M-Y', $item['Date of hire (CDN)'])->format('Y-m-d');
		}
		if(!empty($item['Date of Application'])){

			$item['Date of Application'] = DateTime::createFromFormat('d-M-Y', $item['Date of Application'])->format('Y-m-d');
		}
		if(!empty($item['Border Cross'])){

			$item['Border Cross'] = DateTime::createFromFormat('d-M-Y', $item['Border Cross'])->format('Y-m-d');
		}
		if(!empty($item['CVOR Date'])){

			$item['CVOR Date'] = DateTime::createFromFormat('d-M-Y', $item['CVOR Date'])->format('Y-m-d');
		}
		if(!empty($item['Contracts'])){
                        
                        if(DateTime::createFromFormat('d-M-Y', $item['Contracts'])){
                            
                            $item['Contracts'] = DateTime::createFromFormat('d-M-Y', $item['Contracts'])->format('Y-m-d');
                        }
		}
		unset($item['Driver Name']);
	}

	function removeExcelSpaces(&$item,&$key){
		$item = trim(filter_var($item,FILTER_SANITIZE_STRING));//trim($item);
		$key = trim(filter_var($key,FILTER_SANITIZE_STRING));//trim($key);
	}

	function checktheexceldata($data){
		$indexes = [
			'First Name' => 'first_name',
			'Middle Name' => 'middle_name',
			'Last Name' => 'last_name',
			'E-Mail' => 'email',
			'Cell Phone No' => 'phonenumber',
			'Home Phone No' => 'homenumber',
			'Emergency Contact Phone No' => 'emg_contact_number',
			'Alternative Phone No (US)' => 'alternative_phone',
			'SIN #' => 'sin',
				'Driver License' => 'emp_license_no',/*second table driver_detail*/
				'License State' => 'emp_license_state',
				'License Expiry' => 'emp_license_exp_date',
				'License class' => 'emp_license_class',
				'Annual Review Due' => 'last_annual_review_date',
			'Medical Expiry' => 'medical_due',
			'Address Street' => 'current_address',
			'City' => 'current_city',
			'State' => 'current_province',
			'postal code' => 'current_postal_code',
			'Email address' => 'email',
			'Cel phone' => 'phonenumber',
						'Alternate ph#' => 'first_name',
			'Home ph' => 'homenumber',
			'Emergency contact name and relationsip' => 'emg_contact',
			'Emergency ph' => 'emg_contact_number',
			'Date of Birth' => 'dob',
			'Date of Application' => 'application_date',
						'Date of hire (CDN)' => 'hire_date',
						'Border crossing' => 'first_name',
						'Drug test verification' => 'first_name',
			'CVOR Date' => 'cvor_date',
                        'Contracts' => 'contract_date',
                        'Incorporation Name' => 'incorporation_name',
                        'H.S.T' => 'h_s_t',
                        'PSP' => 'p_s_p',
                        'Out Of Province Insurance' => 'province_insurance',
                        'Criminal Record Check' => 'criminal_record_date',
                        'Status' => 'position_applied',
                        'Driver For' => 'driver_for_o_p',

						'Convictions on Abstract' => 'convictions_abstract',
						'Border Cross' => 'border_cross_date',
						'ABSTRACT POINTS' => 'abstract_points',
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
		$returnMsg = $this->DM->excelDriverSave($array3);
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

	
	function get_driver_pdf($id=NULL){
		valid_company('drivers','company_id',$id);
		$sql = "SELECT a.*,b.*,c.*,d.* FROM `drivers` as a,`driver_detail` as b,`driver_experience` as c,`employer_history` as d where b.`driver_id` = a.`id` and c.`driver_id`=a.`id` and d.`driver_id` = a.`id` and a.`id` ='" .$id."'";
		$query = $this->db->query($sql);
		$driver['driver'] = $query->result_array()[0];
		//var_dump(/*unserialize(*/$driver['driver']['work_date']/*)*/,true);

		$query = "Select * from company where id= '".$driver['driver']['company_id']."'";
		$company_r = $this->db->query($query);
		$driver['company'] = $company_r->row_array();

		//var_dump($driver['company']);
		$this->load->view('pdf/add_driver',$driver);
	}


	function get_annual_review_pdf($id=NULL){
		$id = (int)$this->input->post('driver_id');

		$id = filter_data($id,'int')? filter_data($id,'int'): redirect('driver');
		// $id = filter_data($id,'int') || redirect('driver');
		valid_company('drivers','company_id',$id);
		$this->load->library('mytcpdf');
		$data['driver'] = $this->driver_model->getDriverData($id)->row_array();
		
		$data['file_name'] = 'annual_review'.date('Y-m-d').$data['driver']['first_name'].'_'.$data['driver']['id'].'.pdf';
		$this->load->view('pdf/annual_review',$data);

		$oldAnnualReview = get_from('driver_experience','annual_reviews',['driver_id'=>$id]);

		if($oldAnnualReview !== null){
			$oldAnnualReview = unserialize($oldAnnualReview);
		}

		$oldAnnualReview[date('Y')] = $data['file_name'];

		$CRNTdate = new DateTime(date('Y-m-d'));//date('Y-m-d')
      	$CRNTdate->add(new DateInterval('P1Y'));
      	$currentWith1Year = $CRNTdate->format('Y-m-d');
		
		$data = array(
			'last_annual_review_date' => $currentWith1Year,
	        'annual_reviews' => serialize($oldAnnualReview),
		);

		$this->db->where('driver_id', $id);
		$this->db->update('driver_experience', $data);
		//return redirect('driver/view/'.$id);
	}

	function get_contract_pdf($id=NULL){
		valid_company('drivers','company_id',$id);
		$this->load->library('mytcpdf');
		$data['data'] = $this->driver_model->getDriverData($id)->row_array();
		
		$this->load->view('pdf/contract_file',$data);
	}

	public function url_generator(){
		/*
			@tbl_item_id => this is the randum and unique url for driver
			@tbl_name => this is the company id
			@tbl_col => token
			@tbl_val => tbl_col value mean time for expiry of url

		*/

		// $driverData = get_from('extra_data','tbl_item_id,tbl_val',['tbl_col'=>$this->session->userdata('action_token')]);

		// if(!empty($driverData)){
		// 	echo base_url().'external_driver/'.$driverData['tbl_item_id'];
		// 	die();
		// }(create_action_token($this->get_user_id(),$id,'add',url_generator(15),$datetime));

		//$randOfToken = url_generator(15);
		//$token = create_action_token($this->get_user_id(),$this->get_company_id(),'create',$randOfToken);

		$driverUrl = url_generator(7);

		meta_data($this->get_company_id()."@::@".$this->get_user_id(),'changeable',$driverUrl,date('Y-m-d'));

		echo base_url().'external_driver/'.$driverUrl;
	}


	public function del(){

		
		// $result =$this->driver_model->deleteDriver($id);

		// if ($result) 
		// {
		// 	$this->session->set_flashdata('success', 'Driver has been deleted successfully.');
		// 	return redirect('driver');
		// }else{
		// 	$this->session->set_flashdata('error', 'Driver has not been deleted successfully.');
		// 	return redirect('driver');
		// }



		$remark = $this->input->post('remark');
		$id = $this->input->post('id');
		
		valid_company('drivers','company_id',$id);

		if(!empty($remark)){

			$getRemark = $this->db->query("SELECT `remark` FROM `drivers` where `id` = '".$id."'")->row()->remark;

		
			$this->db->query("UPDATE `drivers` SET `remark`= '".$getRemark.',Deactivate:'.$remark."' where `id` = '".$id."'");
		}

		if($this->driver_model->deleteDriver($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Deactivate',
				'action_on'		=>	getDriverFullName($id),
				'action_place'	=>	'Driver',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Driver deleted Successfully');

		}else{
			$this->session->set_flashdata('error', 'Driver Not deleted Successfully');
		}


		return redirect('driver');
	}


	public function active($id=0){

		valid_company('drivers','company_id',$id);

		$getRemark = $this->db->query("SELECT `remark` FROM `drivers` where `id` = '".$id."'")->row()->remark;

		if(!empty($getRemark)){
			$remarks = explode(',', $getRemark);
			foreach ($remarks as $key => $value) {
				if (strpos($value, 'Deactivate:') !== false) {
			    	unset($remarks[$key]);
				}
			}
		}

		$this->db->query("UPDATE `drivers` SET `remark`= '".implode(',', $remarks)."' where `id` = '".$id."'");

		if($this->driver_model->activeDriver($id)){
			$historydata = [
				'company_id'	=>	$this->get_company_id(),
				'user_id'		=>	$this->get_user_id(),
				'action_id'		=>	$id,
				'action'		=>	'Activate',
				'action_on'		=>	getDriverFullName($id),
				'action_place'	=>	'Driver',
			];
			history($historydata);
			$this->session->set_flashdata('success', 'Driver Activated Successfully');

		}else{
			$this->session->set_flashdata('error', 'Driver Not Activated Successfully');
		}

		return redirect('driver');
	}

	public function add_files($id =0){

		
		if($this->input->post('add_files')):
			valid_company('drivers','company_id',$id);
			$data = array();

			for($i=1;$i<=16;$i++){
				$traindate[]=$this->input->post('traindate'.$i);
				$trainop[]=$this->input->post('trainop'.$i);
				$trainname[]=$this->input->post('trainname'.$i);
			}
			
			$data['traindate'] = serialize($traindate);
			$data['trainop'] = serialize($trainop);
			$data['trainname'] = serialize($trainname);



			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']	= '100000000';
			$config['max_width']  = '100000';
			$config['overwrite']  = TRUE;
			$config['max_height']  = '100000';

			$files = [
				'social_sec_pdf',
				'emp_license_pdf',
				'passport_number_pdf',
				'cvor_date_pdf',
				'police_report_date_pdf',
				'fast_driver_pdf',
			];

			
				//------------------------------ owner_ship PDF Upload------------------------------//
			for($i=0;$i<count($files);$i++){

				if(!empty($_FILES[$files[$i]]['name'])&&!empty($_FILES[$files[$i]]['size'])){

					$config['file_name']  = md5(microtime()).'_'.str_replace("_","",$files[$i]);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload($files[$i]))
						{
							$error = array('error' => $this->upload->display_errors()); 
						
					 	}
					 else 
					 	{ 
							if($id != 0 ){ // delete the file if update, data_helper
					 			delete_image('driver_experience',$files[$i],$id);
					 		}

						
							$imgdata = array('upload_data' => $this->upload->data());
							$owner_ship_pdf = base_url().'uploads/'.$imgdata['upload_data']['file_name'];
							
							$data[$files[$i]] 		= 	$owner_ship_pdf;
					 	}
				}
				
				if(!is_array($_FILES[$files[$i]])){
				 	delete_image('driver_experience',$files[$i],$id);
				 	$data[$files[$i]] = '';
				}
			}//end for
				 //------------------------------ contract PDF Upload------------------------------//
			
				if(!isset($error)){
					$result =  $this->driver_model->Insertfiles($data, $id);
				}
						if($result)
							{
								$this->session->set_flashdata('success', 'Driver Files Updated Successfully');
							}
						else
							{
								$this->session->set_flashdata('error','Error Into Updated Drivers');
							}
				return redirect('driver');
		endif;//add_files
		
	}


	function driverFormVali($driverUpdate){

		$config = array(
                            array(
                                    'field' => 'action_token',
                                    'label' => 'Invalid Form',
                                    'rules' => 'required',
                                    'errors' => array(
									                        'required' => 'Invalid Form.',
									                )
                                 ),
					        array(
					                'field' => 'position_applied',
					                'label' => 'Position Applied for',
					                'rules' => 'required|trim|htmlspecialchars'//|in_list[4587,4588]
					        ),
					        // array(
					        //         'field' => 'cvor_date',
					        //         'label' => 'CVOR Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'passport',
					        //         'label' => 'Passport',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'road_test',
					        //         'label' => 'Road Test',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'police_report',
					        //         'label' => 'Police Report',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'first_name',
					        //         'label' => 'First Name',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'middle_name',
					        //         'label' => 'Middle Name',
					        //         'rules' => 'trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'last_name',
					        //         'label' => 'Last Name',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'email',
					        //         'label' => 'Email',
					        //         'rules' => 'required|trim|htmlspecialchars|valid_email'
					        // ),
					        // array(
					        //         'field' => 'sin',
					        //         'label' => 'SIN',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_no',
					        //         'label' => 'License Number',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_state',
					        //         'label' => 'State',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_org_date',
					        //         'label' => 'Date of Obtaining License',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_exp_date',
					        //         'label' => 'Expiry Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_class',
					        //         'label' => 'License Class',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_restrictions',
					        //         'label' => 'Restrictions',
					        //         'rules' => 'trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_endrosments',
					        //         'label' => 'License Endorsements',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_address',
					        //         'label' => 'Address',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_street',
					        //         'label' => 'Street',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_city',
					        //         'label' => 'City',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_province',
					        //         'label' => 'Province',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_postal_code',
					        //         'label' => 'Postal Code',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_duration',
					        //         'label' => 'How Long? (years/months)',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),

					        // //page 3 validations
					        // array(
					        //         'field' => 'phonenumber',
					        //         'label' => 'Phone',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'witness_name',
					        //         'label' => 'Witness Name',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'topic',
					        //         'label' => 'Topic',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'medical_due',
					        //         'label' => 'Medical Due Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'defensive_driving',
					        //         'label' => 'Defensive Driving',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'road_evalution',
					        //         'label' => 'Road Evalution',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'province_insurance',
					        //         'label' => 'Out of Province Insurance',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'legal_right',
					        //         'label' => 'Work in United State',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'dob',
					        //         'label' => 'Date of Birth',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'provide_age_proof',
					        //         'label' => 'Age Proof',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'worked_before',
					        //         'label' => 'Company before',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'employment_status',
					        //         'label' => 'Are you now employed',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'who_referred',
					        //         'label' => 'Who referred you',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'pay_rate_expected',
					        //         'label' => 'Rate of Pay Expected',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'bond_status',
					        //         'label' => 'Ever been bonded',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'felony_status',
					        //         'label' => 'Convicted of a felony',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'performance_status',
					        //         'label' => 'Attached job description',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'fast_driver_status',
					        //         'label' => 'FAST approved driver',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),

					        // //page 4 validation


					        // array(
					        //         'field' => 'current_city',
					        //         'label' => 'City',
					        //         'rules' => 'trim|htmlspecialchars'
					        // ),

		);

		// if(isset($driverUpdate['fast_driver_status']) && $driverUpdate['fast_driver_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'fast_card_no',
		// 			                'label' => 'Fast Card Number',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'fast_card_expiry',
		// 			                'label' => 'Expiry Date',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }else{

		// 	$config[] = array(
		// 			                'field' => 'willing_status_rdo',
		// 			                'label' => 'Willing to apply for new one',
		// 			                'rules' => 'trim|htmlspecialchars'
		// 			        );	


		// 		if($driverUpdate['willing_status_rdo'] == 'No'){

		// 					$config[] = array(
		// 			                'field' => 'not_willing_status',
		// 			                'label' => 'Why Not willing status',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        			);
		// 		}

		// }


		// if(isset($driverUpdate['passport']) && $driverUpdate['passport']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'passport_number',
		// 			                'label' => 'Passport Number',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'passport_date',
		// 			                'label' => 'Passport Expire',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['police_report']) && $driverUpdate['police_report']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'police_report_date',
		// 			                'label' => 'POLICE REPORT DATE',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['employment_status']) && $driverUpdate['employment_status']=='No' ){

		// 	$config[] = array(
		// 			                'field' => 'last_employment',
		// 			                'label' => 'how long since leaving last employment',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['worked_before']) && $driverUpdate['worked_before']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'b_worked_when',
		// 			                'label' => 'When Work for this Company',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_pay_rate',
		// 			                'label' => 'Rate of Pay',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_from_date',
		// 			                'label' => 'From before Work',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_to_date',
		// 			                'label' => 'To',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_work_position',
		// 			                'label' => 'Position',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_leaving_reason',
		// 			                'label' => 'Reason for Leaving?',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }
		// // previous address
		// if($driverUpdate['prv_add_no'] > 0 && $driverUpdate['prv_add_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_add_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'previous_address_'.$i,
		// 						                'label' => 'Previous Address '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_street_'.$i,
		// 						                'label' => 'Previous Street '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_city_'.$i,
		// 						                'label' => 'Previous City'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_province_'.$i,
		// 						                'label' => 'Previous Province'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_postal_code_'.$i,
		// 						                'label' => 'Previous Postal Code'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_duration_'.$i,
		// 						                'label' => 'Previous Duration'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // previous address end


		
		// // Accident History

		// if($driverUpdate['prv_acc_his_no'] > 0 && $driverUpdate['prv_acc_his_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_acc_his_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'accident_date_'.$i,
		// 						                'label' => 'Accident Date '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_nature_'.$i,
		// 						                'label' => 'Nature of Accident '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_fatalities_'.$i,
		// 						                'label' => 'Accident Fatalities'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_injuries_'.$i,
		// 						                'label' => 'Accident Injuries'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_hazardous_'.$i,
		// 						                'label' => 'Accident Hazardous Material Spill'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		
		//employment history
	if(isset($driverUpdate['prv_empl_his_no'])):
		if($driverUpdate['prv_empl_his_no'] > 0 && $driverUpdate['prv_empl_his_no']  != '' ){
			for($i = 1 ; $i <= $driverUpdate['prv_empl_his_no'] ;	$i++):
				$param[0] = ((isset($driverUpdate["employment_fron_date_".($i-1)]))?$driverUpdate["employment_fron_date_".($i-1)]:false);
				$param[1]=$i;//
						$config[] = array(
								                'field' => 'employment_to_date_'.$i,
								                'label' => 'Accident Date '.$i,
								                'rules' => "required|trim|htmlspecialchars|callback_empl_his_date[$param[0],$param[1]]"
								        );
						$config[] = array(
								                'field' => 'employment_fron_date_'.$i,
								                'label' => 'Nature of Accident '.$i,
								                'rules' => "required|trim|htmlspecialchars"
								        );
			endfor;
			// var_dump($driverUpdate);
			//  die();

		}
	endif;
		// // Accident History end

		// // Traffic Convivtions

		// if($driverUpdate['prv_traffic_conviv_no'] > 0 && $driverUpdate['prv_traffic_conviv_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_traffic_conviv_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_date_'.$i,
		// 						                'label' => 'Traffic Convivtion Date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_loc_'.$i,
		// 						                'label' => 'Traffic Location '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_chrg_'.$i,
		// 						                'label' => 'Traffic Charge'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_pen_'.$i,
		// 						                'label' => 'Traffic Penalty'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // Traffic Convivtion end

		// // Employment Detail
		// if($driverUpdate['prv_empl_his_no'] > 0 && $driverUpdate['prv_empl_his_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_empl_his_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'employer_company_name_'.$i,
		// 						                'label' => 'Company Name'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_name_'.$i,
		// 						                'label' => 'Contact Person'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_address_'.$i,
		// 						                'label' => 'Emplyment Address'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_number_'.$i,
		// 						                'label' => 'Contact Number'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_city_'.$i,
		// 						                'label' => 'Previous Postal Code'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_province_'.$i,
		// 						                'label' => 'Employer Province'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'emplyer_zip_'.$i,
		// 						                'label' => 'Employer Zip'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'position_held_'.$i,
		// 						                'label' => 'Position Held'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'salary_wage_'.$i,
		// 						                'label' => 'Employer Salary Wage'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employment_fron_date_'.$i,
		// 						                'label' => 'Employment From Date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employment_to_date_'.$i,
		// 						                'label' => 'Employment To date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_leaving_reason_'.$i,
		// 						                'label' => 'Employer Leaving Reason'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'fmcsr_status_'.$i,
		// 						                'label' => 'FMCSRs** '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'safety_sensitive_status_'.$i,
		// 						                'label' => 'Employment safety-sensitive function'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // Employment detail end



		// if(isset($driverUpdate['bond_status']) && $driverUpdate['bond_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'bonding_company',
		// 			                'label' => 'Have you ever been bonded',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['felony_status']) && $driverUpdate['felony_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'conviction_crime',
		// 			                'label' => 'Conviction of a crime',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['performance_status']) && $driverUpdate['performance_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'performance_reason',
		// 			                'label' => 'Performance Reason',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

        


        return $config;

	}
	
	function driverFormValiFree($driverUpdate){

		$config = array(
                        array(
                                'field' => 'action_token',
                                'label' => 'Invalid Form',
                                'rules' => 'required',
                                'errors' => array(
								                        'required' => 'Invalid Form.',
								                )
                             ),


					        // array(
					        //         'field' => 'position_applied',
					        //         'label' => 'Position Applied for',
					        //         'rules' => 'trim|htmlspecialchars'//|in_list[4587,4588]
					        // ),
					        // array(
					        //         'field' => 'cvor_date',
					        //         'label' => 'CVOR Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'passport',
					        //         'label' => 'Passport',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'road_test',
					        //         'label' => 'Road Test',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'police_report',
					        //         'label' => 'Police Report',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        array(
					                'field' => 'first_name',
					                'label' => 'First Name',
					                'rules' => 'required|trim|htmlspecialchars'
					        ),
					        array(
					                'field' => 'middle_name',
					                'label' => 'Middle Name',
					                'rules' => 'trim|htmlspecialchars'
					        ),
					        array(
					                'field' => 'last_name',
					                'label' => 'Last Name',
					                'rules' => 'required|trim|htmlspecialchars'
					        ),
					        array(
					                'field' => 'email',
					                'label' => 'Email',
					                'rules' => 'required|trim|htmlspecialchars|valid_email'
					        ),
					        array(
					                'field' => 'sin',
					                'label' => 'SIN',
					                'rules' => 'required|trim|htmlspecialchars'
					        ),
					        // array(
					        //         'field' => 'emp_license_no',
					        //         'label' => 'License Number',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_state',
					        //         'label' => 'State',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_org_date',
					        //         'label' => 'Date of Obtaining License',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_exp_date',
					        //         'label' => 'Expiry Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_class',
					        //         'label' => 'License Class',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_restrictions',
					        //         'label' => 'Restrictions',
					        //         'rules' => 'trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_license_endrosments',
					        //         'label' => 'License Endorsements',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_address',
					        //         'label' => 'Address',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_street',
					        //         'label' => 'Street',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_city',
					        //         'label' => 'City',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_province',
					        //         'label' => 'Province',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_postal_code',
					        //         'label' => 'Postal Code',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'current_duration',
					        //         'label' => 'How Long? (years/months)',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),

					        // //page 3 validations
					        // array(
					        //         'field' => 'phonenumber',
					        //         'label' => 'Phone',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'witness_name',
					        //         'label' => 'Witness Name',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'topic',
					        //         'label' => 'Topic',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'medical_due',
					        //         'label' => 'Medical Due Date',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'defensive_driving',
					        //         'label' => 'Defensive Driving',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'road_evalution',
					        //         'label' => 'Road Evalution',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'province_insurance',
					        //         'label' => 'Out of Province Insurance',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'legal_right',
					        //         'label' => 'Work in United State',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'dob',
					        //         'label' => 'Date of Birth',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'provide_age_proof',
					        //         'label' => 'Age Proof',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'worked_before',
					        //         'label' => 'Company before',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'employment_status',
					        //         'label' => 'Are you now employed',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'who_referred',
					        //         'label' => 'Who referred you',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'pay_rate_expected',
					        //         'label' => 'Rate of Pay Expected',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'bond_status',
					        //         'label' => 'Ever been bonded',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'felony_status',
					        //         'label' => 'Convicted of a felony',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'performance_status',
					        //         'label' => 'Attached job description',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'fast_driver_status',
					        //         'label' => 'FAST approved driver',
					        //         'rules' => 'required|trim|htmlspecialchars'
					        // ),
					        // array(
					        //         'field' => 'emp_experience_year',
					        //         'label' => 'Driver\'s Experience Year(s)',
					        //         'rules' => 'trim|htmlspecialchars|numeric|greater_than_equal_to[0]|less_than_equal_to[40]'
					        // ),
					        // array(
					        //         'field' => 'emp_experience_month',
					        //         'label' => 'Driver\'s Experience Month(s)',
					        //         'rules' => 'trim|htmlspecialchars|numeric|greater_than_equal_to[0]|less_than_equal_to[12]'
					        // ),

					        // //page 4 validation


					        // array(
					        //         'field' => 'current_city',
					        //         'label' => 'City',
					        //         'rules' => 'trim|htmlspecialchars'
					        // ),

		);

		// if(isset($driverUpdate['fast_driver_status']) && $driverUpdate['fast_driver_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'fast_card_no',
		// 			                'label' => 'Fast Card Number',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'fast_card_expiry',
		// 			                'label' => 'Expiry Date',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }else{

		// 	$config[] = array(
		// 			                'field' => 'willing_status_rdo',
		// 			                'label' => 'Willing to apply for new one',
		// 			                'rules' => 'trim|htmlspecialchars'
		// 			        );	


		// 		if($driverUpdate['willing_status_rdo'] == 'No'){

		// 					$config[] = array(
		// 			                'field' => 'not_willing_status',
		// 			                'label' => 'Why Not willing status',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        			);
		// 		}

		// }


		// if(isset($driverUpdate['passport']) && $driverUpdate['passport']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'passport_number',
		// 			                'label' => 'Passport Number',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'passport_date',
		// 			                'label' => 'Passport Expire',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['police_report']) && $driverUpdate['police_report']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'police_report_date',
		// 			                'label' => 'POLICE REPORT DATE',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['employment_status']) && $driverUpdate['employment_status']=='No' ){

		// 	$config[] = array(
		// 			                'field' => 'last_employment',
		// 			                'label' => 'how long since leaving last employment',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['worked_before']) && $driverUpdate['worked_before']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'b_worked_when',
		// 			                'label' => 'When Work for this Company',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_pay_rate',
		// 			                'label' => 'Rate of Pay',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_from_date',
		// 			                'label' => 'From before Work',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_to_date',
		// 			                'label' => 'To',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_work_position',
		// 			                'label' => 'Position',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );
		// 	$config[] = array(
		// 			                'field' => 'b_leaving_reason',
		// 			                'label' => 'Reason for Leaving?',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }
		// // previous address
		// if($driverUpdate['prv_add_no'] > 0 && $driverUpdate['prv_add_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_add_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'previous_address_'.$i,
		// 						                'label' => 'Previous Address '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_street_'.$i,
		// 						                'label' => 'Previous Street '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_city_'.$i,
		// 						                'label' => 'Previous City'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_province_'.$i,
		// 						                'label' => 'Previous Province'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_postal_code_'.$i,
		// 						                'label' => 'Previous Postal Code'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'previous_duration_'.$i,
		// 						                'label' => 'Previous Duration'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // previous address end


		
		// // Accident History

		// if($driverUpdate['prv_acc_his_no'] > 0 && $driverUpdate['prv_acc_his_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_acc_his_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'accident_date_'.$i,
		// 						                'label' => 'Accident Date '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_nature_'.$i,
		// 						                'label' => 'Nature of Accident '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_fatalities_'.$i,
		// 						                'label' => 'Accident Fatalities'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_injuries_'.$i,
		// 						                'label' => 'Accident Injuries'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'accident_hazardous_'.$i,
		// 						                'label' => 'Accident Hazardous Material Spill'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		
		//employment history
	if(isset($driverUpdate['prv_empl_his_no'])):
		if($driverUpdate['prv_empl_his_no'] > 0 && $driverUpdate['prv_empl_his_no']  != '' ){
			for($i = 1 ; $i <= $driverUpdate['prv_empl_his_no'] ;	$i++):
				$param[0] = ((isset($driverUpdate["employment_fron_date_".($i-1)]))?$driverUpdate["employment_fron_date_".($i-1)]:false);
				$param[1]=$i;//
						$config[] = array(
								                'field' => 'employment_to_date_'.$i,
								                'label' => 'Accident Date '.$i,
								                'rules' => "required|trim|htmlspecialchars|callback_empl_his_date[$param[0],$param[1]]"
								        );
						$config[] = array(
								                'field' => 'employment_fron_date_'.$i,
								                'label' => 'Nature of Accident '.$i,
								                'rules' => "required|trim|htmlspecialchars"
								        );
			endfor;
			// var_dump($driverUpdate);
			//  die();

		}
	endif;
		// // Accident History end

		// // Traffic Convivtions

		// if($driverUpdate['prv_traffic_conviv_no'] > 0 && $driverUpdate['prv_traffic_conviv_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_traffic_conviv_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_date_'.$i,
		// 						                'label' => 'Traffic Convivtion Date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_loc_'.$i,
		// 						                'label' => 'Traffic Location '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_chrg_'.$i,
		// 						                'label' => 'Traffic Charge'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'traf_conviv_pen_'.$i,
		// 						                'label' => 'Traffic Penalty'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // Traffic Convivtion end

		// // Employment Detail
		// if($driverUpdate['prv_empl_his_no'] > 0 && $driverUpdate['prv_empl_his_no']  != '' ){
		// 	for($i = 1 ; $i <= $driverUpdate['prv_empl_his_no'] ;	$i++):

		// 				$config[] = array(
		// 						                'field' => 'employer_company_name_'.$i,
		// 						                'label' => 'Company Name'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_name_'.$i,
		// 						                'label' => 'Contact Person'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_address_'.$i,
		// 						                'label' => 'Emplyment Address'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_number_'.$i,
		// 						                'label' => 'Contact Number'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_city_'.$i,
		// 						                'label' => 'Previous Postal Code'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_province_'.$i,
		// 						                'label' => 'Employer Province'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'emplyer_zip_'.$i,
		// 						                'label' => 'Employer Zip'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'position_held_'.$i,
		// 						                'label' => 'Position Held'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'salary_wage_'.$i,
		// 						                'label' => 'Employer Salary Wage'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employment_fron_date_'.$i,
		// 						                'label' => 'Employment From Date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employment_to_date_'.$i,
		// 						                'label' => 'Employment To date'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'employer_leaving_reason_'.$i,
		// 						                'label' => 'Employer Leaving Reason'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'fmcsr_status_'.$i,
		// 						                'label' => 'FMCSRs** '.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 				$config[] = array(
		// 						                'field' => 'safety_sensitive_status_'.$i,
		// 						                'label' => 'Employment safety-sensitive function'.$i,
		// 						                'rules' => 'required|trim|htmlspecialchars'
		// 						        );
		// 	endfor;

		// }
		// // Employment detail end



		// if(isset($driverUpdate['bond_status']) && $driverUpdate['bond_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'bonding_company',
		// 			                'label' => 'Have you ever been bonded',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['felony_status']) && $driverUpdate['felony_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'conviction_crime',
		// 			                'label' => 'Conviction of a crime',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

		// if(isset($driverUpdate['performance_status']) && $driverUpdate['performance_status']=='Yes' ){

		// 	$config[] = array(
		// 			                'field' => 'performance_reason',
		// 			                'label' => 'Performance Reason',
		// 			                'rules' => 'required|trim|htmlspecialchars'
		// 			        );

		// }

        


        return $config;

	}


	function empl_his_date($nextDate,$secParam){
		$secParam = explode(',', $secParam);
		$preDate = $secParam[0];
		$i = $secParam[1];
		// die();
		if($preDate == false){return true;}

		$date1=date_create($nextDate);
		$date2=date_create($preDate);
		$diff=date_diff($date1,$date2);
		$diff = $diff->format("%R%a");
		if($diff >= 30 || $diff < 0){
			$this->form_validation->set_message('empl_his_date', "Please Correct the ".$i." No.Employment History To Date: ".$nextDate);
			return false;
		}

		return true;
	}

	public function signup_approval(){
		if($this->input->post('sup_approval')){
			$this->db->set('is_proved',1);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('drivers');
			if($this->db->affected_rows() > 0){
				echo 'true';
			}
		}
	}
	
}


?>