<?php
class Driver extends CI_Controller
{

	public 		$data 			=	NULL;

	function __construct()
	{
		parent::__construct();
		// $this->load->helper('pdf_helper');
		$this->load->model("driver_model");
		// $this->load->helper('sendemail');
	}


	//------------------------------------------------
	public function add($id=0){

		if($this->input->post('is_agree') !== 'on'){
			$data = [
				'title'	=>	'Sorry Url Expired',
				'msg'	=>	'Please First Agree The Term And Conditions',
				'view'	=>	'company/drivers/external/error'
			];
		}else if(!get_from('extra_data','tbl_name',['tbl_item_id'=>$this->input->post('token')])){
			//check Company Id
			/*
				@tbl_col 	= for Token
				@tbl_name 	= for company Id
			*/
			$data = [
				'title'	=>	'Sorry Company Invalid',
				'msg'	=>	'Incorrect Company Identification',
				'view'	=>	'company/drivers/external/error'
			];
		}else{
			$data = [
				'title'	=>	'Welcome to '.config_item('default_site_title'),
				'view'	=>	'company/drivers/external/driver_add'
			];
			$data['driver']['isFree'] = 'True';
			$data['driver']['token'] = $this->input->post('token');
		}

		$this->load->view('company/drivers/external/layout', $data);	
		
	}

	public function is_agree($url){
		/*
			@tbl_item_id => this is the randum and unique url for driver
			@tbl_name => this is the company id
			@tbl_col => token
			@tbl_val => tbl_col value mean time for expiry of url

		*/
		$url = filter_var($url,FILTER_SANITIZE_STRING);
		$currentDateTime = date('Y-m-d H:i:s');
		$urlData = get_from('extra_data','tbl_val,tbl_col',['tbl_item_id'=>$url]);


		// $tbl_nameData = explode('@::@', $urlData['tbl_name']);
		// $company = $tbl_nameData[0];
		// $user = $tbl_nameData[1];
		// $url = $urlData['tbl_item_id'];
		$urlTime = $urlData['tbl_val'];
		$token = $url;

		$dateTimeDiff =  ((abs(strtotime($currentDateTime) - strtotime($urlTime)))/3600);
		if($dateTimeDiff > 24){
			$data = [
				'title'	=>	'Sorry Url Expired',
				'msg'	=>	'This Url has been Expired Please Contact For New Form.',
				'view'	=>	'company/drivers/external/error'
			];
		}else{
			$data = [
				'title'	=>	'Welcome to '.config_item('default_site_title'),
				'view'	=>	'company/drivers/external/info_window'
			];

			// $data['driver']['isFree'] = 'True';
			$data['driver']['token'] = $token;
		}

		$this->load->view('company/drivers/external/layout',$data);
	}
	
	public function add_driver($update = NULL){

		$actionByUser = 'add';
		$urlData = get_from('extra_data','tbl_item_id,tbl_name,tbl_col,tbl_val',['tbl_item_id'=>$this->input->post('token')]);
		if(is_array($urlData)){
			$tbl_nameData = explode('@::@', $urlData['tbl_name']);
			$company = $tbl_nameData[0];
			$user = $tbl_nameData[1];
			$url = $urlData['tbl_item_id'];
			$urlTime = $urlData['tbl_val'];
			$token = $urlData['tbl_col'];
		}
		
		if(!empty($company)){

			$this->load->helper(array('form', 'url'));

	        $this->load->library('form_validation');

	        $this->form_validation->set_rules($this->driverFormValiFree($this->input->post()));

	        if ($this->form_validation->run() == FALSE)
	        { 
	        	if($actionByUser == 'update'){

	        		//return redirect("driver/edit/{$update}",200);
					$data['title'] = 'Edit Driver : DMS';
					$data['view']  = 'company/drivers/driver_add';
					$data['driver'] = $this->driver_model->getDriverData($update)->row_array();
					$data['driver_id'] = $update;
					$this->load->view('company/layout', $data);
	        	}else{

		       		$data['title'] = 'Add Driver: DMS';
					$data['view']  = 'company/drivers/driver_add';
					$this->load->view('company/layout', $data);
				}
	        }
	        else
	        {

				//driver_detail
				$driver_detail = [
						'emp_license_no' 				=> $this->input->post('emp_license_no'),
						'emp_license_state' 			=> $this->input->post('emp_license_state'),
						'emp_license_org_date' 			=> date("Y-m-d",strtotime($this->input->post('emp_license_org_date'))),
						'emp_license_exp_date' 			=> date("Y-m-d",strtotime($this->input->post('emp_license_exp_date'))),
						'emp_license_class' 			=> $this->input->post('emp_license_class'),
						'emp_license_restrictions' 		=> $this->input->post('emp_license_restrictions'),
						'emp_license_endrosments' 		=> $this->input->post('emp_license_endrosments'),
						'performance_reason' 			=> $this->input->post('performance_reason'),
						'fast_card_no' 					=> $this->input->post('fast_card_no'),
						'fast_card_expiry'	 			=> $this->input->post('fast_card_expiry'),
				];

				if(isset($_POST['passport']) && $this->input->post('passport')=='Yes' ){
					$driver_detail['passport_number']					= $this->input->post('passport_number');
					$driver_detail['passport_date']						= $this->input->post('passport_date');
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
					$driver_detail['b_from_date']						= $this->input->post('b_from_date');
					$driver_detail['b_to_date']							= $this->input->post('b_to_date');
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
					$driver_detail['police_report_date']				= $this->input->post('police_report_date');
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
					'dob' 								=> $this->input->post('dob'),
					// 'witnessname' 						=> $this->input->post('witness_name'),
					'medical_due' 						=> date("Y-m-d",strtotime($this->input->post('medical_due'))),
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
					'cvor_date' 						=> $this->input->post('cvor_date'),
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
					'is_proved'							=> 0,
				];


				if($actionByUser != 'update'){
						$driver_table['company_id'] = $company;
				}


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
						

						$accident_date[] = $this->input->post('accident_date_'.$i);
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
						$emp_drug_test_date[] = $this->input->post('emp_drug_test_date_'.$i);
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
						$employment_fron_date[] = $this->input->post('employment_fron_date_'.$i);
						$employment_to_date[] 	= $this->input->post('employment_to_date_'.$i);

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
					$from_de[]		 = $this->input->post('from_de'.$i);
					$to_de[]		 = $this->input->post('to_de'.$i);
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
					'emp_pro_state_list'		=>	$this->input->post('emp_pro_state_list'),
					'emp_spl_cor'				=>	$this->input->post('emp_spl_cor'),
					'emp_awards'				=>	$this->input->post('emp_awards'),
					'emp_den_license'			=>	$this->input->post('emp_den_license'),
					'emp_exp_us_commercial'		=>	$this->input->post('emp_exp_us_commercial'),
					'emp_license_per'			=>	$this->input->post('emp_license_per'),
					'emp_other_trk_exp'			=>	$this->input->post('emp_other_trk_exp'),
					'emp_cor_tra_list'			=>	$this->input->post('emp_cor_tra_list'),
					'emp_spl_equ_list'			=>	$this->input->post('emp_spl_equ_list'),
					'emp_drug_test_status'		=>	$this->input->post('emp_drug_test_status'),
					'emp_last_reliev_on'		=>	$this->input->post('emp_last_reliev_on'),
					'emp_curr_work_status'		=>	$this->input->post('emp_curr_work_status'),
					'emp_another_emply_status'		=>	$this->input->post('emp_another_emply_status'),
					'qualification_check'		=>	serialize($qualification_check_arr),
				];




				for($i=1;$i<=14;$i++){
					$work_date[] = $this->input->post('work_date_'.$i);
					$hours_worked[] = $this->input->post('hours_worked_'.$i);
				} 
				$driver_experience['work_date'] = serialize($work_date);
				$driver_experience['hours_worked'] = serialize($hours_worked);
				
						//$this->db->insert('drivers',$driver_table);
				$this->load->model('Driver_Model','DM');
						// die();

				if($actionByUser == 'update'){

					        // var_dump($driver_table);
	        	
						$table1 = $this->DM->updateinsertDriver($driver_table,$update);
						$table1update = $this->db->affected_rows();
							// die($table1update);
						$table2 = $this->DM->updateinsertDriverDetail($driver_detail,$update);
						$table2update = $this->db->affected_rows();

						$table3 = $this->DM->updateinsertEmployerHistory($employer_history,$update);
						$table3update = $this->db->affected_rows();

						$table4 = $this->DM->updateinserDriverExperience($driver_experience,$update);
						$table4update = $this->db->affected_rows();

					if($table1 && $table2 && $table3 && $table4){
							if( $table1update > 0 || $table2update > 0 || $table3update > 0 ||$table4update > 0){
								/*($table,$column,$where = null,$notSingle = false)*/
								$driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$update]);

								$data = [
									'company_id'	=>	$company,
									'user_id'		=>	$user,
									'action_id'		=>	$update,
									'action'		=>	'Update',
									'action_on'		=>	implode(' ', $driver_name),
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
					
				}else if($actionByUser == 'add'){

					$driver_table['created_date'] 		= date('Y/m/d');
					$driver_table['witnessname'] 		= $user;
					
					$this->DM->insertDriver($driver_table);
					$driver_id = $this->db->insert_id();
					$driver_detail['driver_id']		= $driver_detail['id'] = $driver_id;
					$this->DM->insertDriverDetail($driver_detail);

					$employer_history['driver_id']  = $employer_history['id'] = $driver_id;
					$this->DM->insertEmployerHistory($employer_history);

					$driver_experience['driver_id'] = $driver_experience['id'] = $driver_id;
					$this->DM->inserDriverExperience($driver_experience);			




					$data = [
						'company_id'	=>	$company,
						'user_id'		=>	$user,
						'action_id'		=>	$driver_id,
						'action'		=>	'Add by Url',
						'action_on'		=>	$driver_table['first_name'].' '.$driver_table['middle_name'].' '.$driver_table['last_name'],
						'action_place'	=>	'Driver',
					];
					history($data);
					/**/
					
					// delete_action_token($this->session->userdata('action_token'));
					$this->db->where('tbl_col', $token);
					$this->db->delete('extra_data');

					return redirect('external/driver/success');
					

				}else{
					$this->session->set_flashdata('error', 'Driver Not Added successfully.');
					return redirect('external/driver/error');
				}

			}//end of form valid check
		}//end of token check
		var_dump($urlData);
	}

	public function success(){
		$data = [
			'title'	=>	'Success Message',
			'view'	=>	'company/drivers/external/success'
		];

		$this->load->view('company/drivers/external/layout',$data);
	}
	function driverFormValiFree($driverUpdate){

		$config = array(


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
	
}


?>