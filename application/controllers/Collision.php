<?php

class Collision extends MY_Controller {


	function __construct()
		{
			parent::__construct();
			//$this->load->helper('pdf_helper');
			//$this->load->model("collision_model");
			$this->load->model("driver_model");
			$this->load->model("collision_model");
			$this->load->model("trailer_model");
			$this->load->model("truck_model");
			//$this->load->helper('sendemail');

		}
//------------------------ collision List ------------------------//
	public function datatable_json()
	{

		$Records = $this->collision_model->GetAll($this->company_id);
		


        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{

			$data[]= array(
				$count++,
                $r['collision_date'],
				$this->getDriverName($r['driver_id']),
				$r['claim_no'],
				$r['status'],
				getTruckUnit($r['truck']),
				getTrailerUnit($r['trailer']),
				$r['location'],
				unserialize($r['adjustor_all_data'])['adjustor_name'],
				get_table_remarks($r['remarks']),

				'<a class="btn btn-xs btn-success" href="'.base_url('collision/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('collision/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>',
			);
        }


		// $Records['data']=$data;
  //       echo json_encode($Records);
        echo json_encode($data);
	}
	//------------------------ collision List ------------------------//
	public function search()
	{
		$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
	}
	//------------------------ collision List ------------------------//
	//------------------------ collision List ------------------------//
	public function index()
		{
			$this->session->unset_userdata('user_search_type');

			$data['title'] = 'Collision List : TDMA';
			$data['view']  = 'company/collision/collision_list';
			$this->load->view('company/layout', $data);
		}



	//------------------------ collision View ------------------------//

	//------------------------ collision Add ------------------------//
//------------------------ collision Add ------------------------//
	public function add($id=0)
	{
			// var_dump($this->input->post());
			// var_dump($_FILES);
			// // echo $this->input->post('accident_des');

			// die();

			if($id!=0)
			    valid_company('collision','company_id',$id);

			$this->form_validation->set_rules($this->citFormVali($this->input->post()));


			if($this->form_validation->run() ==  False){
				if(!empty($id) && NULL !== $this->input->post('update')){

					$data['collision_detail'] =  $this->collision_model->getcollisionByID($id);

		        	$data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
		        	$data['gettrailer'] =  $this->trailer_model->gettrailer($this->company_id);
					$data['gettruck'] =  $this->truck_model->gettruck($this->company_id);
					$data['driver_name'] = $this->getDriverName($data['collision_detail']['driver_id']);

					$data['title'] = 'collision List : TDMA';
					$data['view']  = 'company/collision/collision_add';
					$this->load->view('company/layout', $data);
	        	}else{

	        	$data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
	        	$data['gettrailer'] =  $this->trailer_model->gettrailer($this->company_id);
				$data['gettruck'] =  $this->truck_model->gettruck($this->company_id);
				$data['title'] = 'collision Add : TDMA';
				$data['view']  = 'company/collision/collision_add';
				$this->load->view('company/layout', $data);
				}
			}
			else{

			$data= array(
				'company_id' 				=> 	$this->company_id,
				'cita_loc' 					=> 	$this->input->post('cita_loc'),
				'driver_id' 				=> 	$this->input->post('driver_id'),
				'temp_driver' 				=> 	$this->input->post('temp_driver'),
				'insurrance_info' 			=> 	$this->input->post('insurrance_info'),
				'claim_no' 					=> 	$this->input->post('claim_no'),
				'truck' 					=> 	$this->input->post('truck'),
				'trailer' 					=> 	$this->input->post('trailer'),
				'cargo_cond' 				=> 	$this->input->post('cargo_cond'),
				'location' 					=> 	$this->input->post('location'),
				'city' 						=> 	$this->input->post('city'),
				'state' 					=> 	$this->input->post('state'),
				'other_state' 				=> 	$this->input->post('other_state'),
				'collision_date' 			=> 	$this->input->post('collision_date'),
				'collision_time' 			=> 	$this->input->post('collision_time'),
				'fatality' 					=> 	$this->input->post('fatality'),
				'fatality_no' 				=> 	$this->input->post('fatality_no'),
				'accident_des' 				=> 	$this->input->post('accident_des'),
				'acci_des_detail' 			=> 	$this->input->post('acci_des_detail'),
				'injp_no_vehi' 				=> 	$this->input->post('injp_no_vehi'),
				'is_fault' 					=> 	$this->input->post('is_fault'),
				'is_prvable' 				=> 	$this->input->post('is_prvable'),
				'weather_con' 				=>  serialize($this->input->post('weather_con')),
				'settlement_form' 			=> 	$this->input->post('settlement_form'),
				'statement' 				=> 	$this->input->post('statement'),
				'match_log' 				=> 	$this->input->post('match_log'),
				'repare_at' 				=> 	$this->input->post('repare_at'),
				'warning_letter' 			=> 	$this->input->post('warning_letter'),
				'status' 				=> 	$this->input->post('status'),
				'remarks' 				=> 	taginput_date($this->input->post('remarks')),

				'created_date' 			=>	date('Y-m-d')
			);


			//------------------------------ owner_ship PDF Upload------------------------------//
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
				$config['max_size']	= '100000000';
				$config['max_width']  = '100000';
				$config['max_height']  = '100000';
				$config['encrypt_name'] = TRUE;

			$files = [
				'bill_of_lading',
				'commercial_inv',
				'towing_bill_file',
				'appraisal_file',
				'pcitation_file',
				'police_report_file',
				'settlement_form_file',
				'statement_file',
				'match_log_file',
				'repare_at_file',
				'training_file',
				'train_comp_file',
				'warning_letter_file',
			];
			//------------------------------ owner_ship PDF Upload------------------------------//
			$temp_files = array();
			for($i=0;$i<count($files);$i++){

				$get_image = image_upload($files[$i],$config,$id,'collision');
				if($get_image !== NULL){
					$data[$files[$i]] = $get_image;
				}
			}

			$uploadData = array();
	        if(!empty($_FILES['userFiles']['name'])){
	            $filesCount = count($_FILES['userFiles']['name']);
	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
	                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
	                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
	                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
	                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

	                $uploadPath = './uploads/files/';
	                $config['upload_path'] = $uploadPath;
	                $config['encrypt_name'] = TRUE;
	                // $config['allowed_types'] = 'gif|jpg|png';

	                // $this->load->library('upload', $config);
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if($this->upload->do_upload('userFile')){
	                    $fileData = $this->upload->data();
	                    $uploadData[$i] = $fileData['file_name'];
	                }
	            }
	        }
	        $rclaim_images = $this->input->post('removedimages');
	        if(!empty($uploadData) || (!empty($rclaim_images && $rclaim_images != '[]'))){



        		if($this->input->post('update') && $id != 0){
	        		$getDbImage = $this->db->query("SELECT `claim_images` from `collision` where id = '".$id."'")->row_array();
	        		$getDbImage = unserialize($getDbImage['claim_images']);
	        		$uploadData = array_merge($uploadData,$getDbImage);

		        	if(!empty($rclaim_images && $rclaim_images != '[]')){


		        	$rclaim_images = json_decode($rclaim_images);
		        	$uploadData = remove_duplicated_values($uploadData,$rclaim_images);

		        	}
        		}


                $data["claim_images"] = serialize($uploadData);

            }



			//------------------------------ contract PDF Upload------------------------------//

			// injuried person addition
			$injuriedp_no 				= 	$this->input->post('injuriedp_no');
			$data['injuriedp_no'] =  $injuriedp_no;
			if($injuriedp_no > 0){
				for($i=1;$i<=$injuriedp_no;$i++){

					$injuries_name['injuries_name_'.$i] = $this->input->post('injuries_name_'.$i);
					$injuries_phone['injuries_phone_'.$i] = $this->input->post('injuries_phone_'.$i);
					$injuries_type['injuries_type_'.$i] = $this->input->post('injuries_type_'.$i);


				}
					$temp_data = '';
					$temp_data['injuries_name'] = serialize($injuries_name);
					$temp_data['injuries_phone'] = serialize($injuries_phone);
					$temp_data['injuries_type'] = serialize($injuries_type);

					$data['injuriedp_no_all_data'] = serialize($temp_data);
			}
			//end

			// injuried person addition
			$thirdp_no 				= 	$this->input->post('thirdp_no');
			$data['thirdp_no'] =  $thirdp_no;

			$uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
		    $this->upload->initialize($config);

			if($thirdp_no > 0){
				$tp_ins_query = $this->db->query("SELECT `thirdp_no_all_data` FROM `collision` where `id` = '".$id."'")->row_array();
				if(count($tp_ins_query) > 0){
					$pre_tp_files = unserialize($tp_ins_query['thirdp_no_all_data']);
					if(isset($pre_tp_files['tp_insurrance_file'])){
						$pre_tp_files = unserialize($pre_tp_files['tp_insurrance_file']);
					}
				}

				for($i=1;$i<=$thirdp_no;$i++){

							//$get_image = image_upload('tp_insurrance_file_'.$i,$config,$id,'collision');
					if(!empty($_FILES['tp_insurrance_file_'.$i]['name'])){
		                if($this->upload->do_upload('tp_insurrance_file_'.$i)){
		                    $fileData = $this->upload->data();

		                    if(isset($pre_tp_files['tp_insurrance_file_'.$i])){
		            		$img = './uploads/'.basename($pre_tp_files['tp_insurrance_file_'.$i]);

			            		if(is_file($img)){
									unlink($img);
								}
		            		}

		                    $tp_insurrance_file['tp_insurrance_file_'.$i] = $fileData['file_name'];
		                }
		            }else if(!is_array($_FILES['tp_insurrance_file_'.$i])){

		            	if(isset($pre_tp_files['tp_insurrance_file_'.$i])){
		            		$img = './uploads/'.basename($pre_tp_files['tp_insurrance_file_'.$i]);

		            		if(is_file($img)){
								unlink($img);
							}
		            	}
					}else if(isset($pre_tp_files['tp_insurrance_file_'.$i])){
		            		$tp_insurrance_file['tp_insurrance_file_'.$i] = $pre_tp_files['tp_insurrance_file_'.$i];

		            }

					$tp_driver_name['tp_driver_name_'.$i] = $this->input->post('tp_driver_name_'.$i);
					$tp_license_no['tp_license_no_'.$i] = $this->input->post('tp_license_no_'.$i);
					$tp_phone_no['tp_phone_no_'.$i] = $this->input->post('tp_phone_no_'.$i);
					$tp_insurrance_name['tp_insurrance_name_'.$i] = $this->input->post('tp_insurrance_name_'.$i);
					$tp_policy_no['tp_policy_no_'.$i] = $this->input->post('tp_policy_no_'.$i);
					$thirdp_company['thirdp_company_'.$i] = $this->input->post('thirdp_company_'.$i);
					$tp_company_name['tp_company_name_'.$i] = $this->input->post('tp_company_name_'.$i);
					$tp_c_phone['tp_c_phone_'.$i] = $this->input->post('tp_c_phone_'.$i);
					$tp_email['tp_email_'.$i] = $this->input->post('tp_email_'.$i);
					$tp_fax['tp_fax_'.$i] = $this->input->post('tp_fax_'.$i);
					$tp_c_person['tp_c_person_'.$i] = $this->input->post('tp_c_person_'.$i);


				}
					$temp_data = '';
					$temp_data['tp_driver_name']			 = serialize($tp_driver_name);
					$temp_data['tp_license_no']			 = serialize($tp_license_no);
					$temp_data['tp_phone_no']			 = serialize($tp_phone_no);
					$temp_data['tp_insurrance_name']			 = serialize($tp_insurrance_name);
					$temp_data['tp_policy_no']			 = serialize($tp_policy_no);
					$temp_data['thirdp_company']			 = serialize($thirdp_company);
					$temp_data['tp_company_name']			 = serialize($tp_company_name);
					$temp_data['tp_c_phone']			 = serialize($tp_c_phone);
					$temp_data['tp_email']			 = serialize($tp_email);
					$temp_data['tp_fax']			 = serialize($tp_fax);
					$temp_data['tp_c_person']			 = serialize($tp_c_person);
					if(!empty($tp_insurrance_file)){
						//die('die');
						$temp_data['tp_insurrance_file']			 = serialize($tp_insurrance_file);
					}

					$data['thirdp_no_all_data'] = serialize($temp_data);
			}
			//end

			// injuried person addition
			$witness_no 				= 	$this->input->post('witness_no');
			$data['witness_no'] =  $witness_no;
			if($witness_no > 0){
				for($i=1;$i<=$witness_no;$i++){

					$witness_type['witness_type_'.$i] = $this->input->post('witness_type_'.$i);
					$witness_name['witness_name_'.$i] = $this->input->post('witness_name_'.$i);
					$witness_phone_no['witness_phone_no_'.$i] = $this->input->post('witness_phone_no_'.$i);
					$witness_email['witness_email_'.$i] = $this->input->post('witness_email_'.$i);
					$witness_address['witness_address_'.$i] = $this->input->post('witness_address_'.$i);


				}
					$temp_data = '';
					$temp_data['witness_type'] = serialize($witness_type);
					$temp_data['witness_name'] = serialize($witness_name);
					$temp_data['witness_phone_no'] = serialize($witness_phone_no);
					$temp_data['witness_email'] = serialize($witness_email);
					$temp_data['witness_address'] = serialize($witness_address);

					$data['witness_no_all_data'] = serialize($temp_data);
			}
			//end
			// adjustor  Info
			$data['adjustor_info']				= $this->input->post('adjustor_info');

			if($data['adjustor_info'] == 'on'){
				$temp_data = '';
				$temp_data['adjustor_name']		= $this->input->post('adjustor_name');
				$temp_data['adjustor_phone_no'] = $this->input->post('adjustor_phone_no');
				$temp_data['adjustor_email'] 	= $this->input->post('adjustor_email');
				$temp_data['adjustor_fax'] 		= $this->input->post('adjustor_fax');

				$data['adjustor_all_data'] 		= serialize($temp_data);
			}else{
				$data['adjustor_all_data'] = $data['adjustor_info'] = '';
			}

			//end

			// appraisal  Info
			$data['appraisal_info']				= $this->input->post('appraisal_info');

			if($data['appraisal_info'] == 'on'){

				$temp_data = '';
				$temp_data['appraisal_name']		= $this->input->post('appraisal_name');
				$temp_data['appraisal_phone_no'] 	= $this->input->post('appraisal_phone_no');
				$temp_data['appraisal_email'] 		= $this->input->post('appraisal_email');
				$temp_data['appraisal_fax'] 		= $this->input->post('appraisal_fax');

				$data['appraisal_all_data'] 		= serialize($temp_data);
			}else{
				$data['appraisal_all_data'] = $data['appraisal_info'] = '';
			}

			//end
			// towing  Info
			$data['towing_info']				= $this->input->post('towing_info');

			if($data['towing_info'] == 'on'){
				$temp_data = '';
				$temp_data['towing_company_name']	= $this->input->post('towing_company_name');
				$temp_data['towing_phone_no'] 		= $this->input->post('towing_phone_no');
				$temp_data['towing_email'] 			= $this->input->post('towing_email');
				$temp_data['towing_fax'] 			= $this->input->post('towing_fax');
				$temp_data['towing_location'] 		= $this->input->post('towing_location');
				$temp_data['towing_city'] 			= $this->input->post('towing_city');
				$temp_data['towing_state'] 			= $this->input->post('towing_state');
				$temp_data['towing_bill'] 			= $this->input->post('towing_bill');
				// $temp_data['towing_bill_file'] 		= @$temp_files['towing_bill'];
				// if($temp_data['towing_bill'] == 'on'){
				// // $data['towing_bill_file'] 			= @$temp_files['towing_bill_file'];
				// }


				$data['towing_all_data'] 			= serialize($temp_data);
			}else{
				$data['towing_all_data'] = $data['towing_info'] = '';
			}

			//end

			// police report  Info
			$data['police_report']				= $this->input->post('police_report');

			if($data['police_report'] == 'on'){
				$temp_data = '';
				$temp_data['officer_name_1']		= $this->input->post('officer_name_1');
				$temp_data['badge_num_1'] 		= $this->input->post('badge_num_1');
				$temp_data['officer_name_2'] 			= $this->input->post('officer_name_2');
				$temp_data['badge_num_2'] 			= $this->input->post('badge_num_2');
				$temp_data['police_phone_no'] 		= $this->input->post('police_phone_no');
				$temp_data['preport_no'] 			= $this->input->post('preport_no');
				$temp_data['pincident_no'] 			= $this->input->post('pincident_no');
				$temp_data['police_ticket'] 			= $this->input->post('police_ticket');
				$temp_data['ptissue_whom'] 			= $this->input->post('ptissue_whom');
				$temp_data['police_charge'] 			= $this->input->post('police_charge');
				// $temp_data['pcitation_file'] 			= @$temp_files['pcitation_file'];
				// $temp_data['police_report_file'] 			= @$temp_files['police_report_file'];

				$data['police_report_all_data'] 			= serialize($temp_data);
			}else{
				$data['police_report_all_data'] = $data['police_report'] = '';
			}

			//end

			// police report  Info
			$data['test_drug']				= $this->input->post('test_drug');

			if($data['test_drug'] == 'on'){
				$temp_data = '';
				$temp_data['test_drug_com']		= $this->input->post('test_drug_com');
				$temp_data['test_drug_detail'] 		= $this->input->post('test_drug_detail');

				$data['test_drug_all_data'] 			= serialize($temp_data);
			}else{
				$data['test_drug_all_data'] = $data['test_drug'] = '';
			}

			//end

			// training_req  Info
			$data['training_req']				= $this->input->post('training_req');

			if($data['training_req'] == 'on'){
				$temp_data = '';
				$temp_data['training_type']		= $this->input->post('training_type');
				$temp_data['train_text'] 		= $this->input->post('train_text');
				$temp_data['training_completed'] 		= $this->input->post('training_completed');
				$temp_data['training_date'] 		= $this->input->post('training_date');
				// $temp_data['training_file'] 		= @$temp_files['training_file'];
				// $temp_data['train_comp_file'] 		= @$temp_files['train_comp_file'];

				$data['training_req_all_data'] 			= serialize($temp_data);
			}else{
				$data['training_req_all_data'] = $data['training_req'] = '';
			}


			if($this->input->post('submit'))
				{
					$result = $this->collision_model->insertcollision($data);

					if($result)
						{

							$historydata = [
								'company_id'	=>	$this->get_company_id(),
								'user_id'		=>	$this->get_user_id(),
								'action_id'		=>	$this->db->insert_id(),
								'action'		=>	'Add',
								'action_on'		=>	getDriverFullName($data['driver_id']),
								'action_place'	=>	'Collision',
							];
							history($historydata);
							$this->session->set_flashdata('success', 'Collision Inserted Successfully');
						}
					else
						{
							$this->session->set_flashdata('error','Error Into Insert collision');
						}
					redirect('collision');
				}

			if($this->input->post('update'))
				{
					$result =  $this->collision_model->updatecollision($data, $id);

					if($result)
						{
							
							$historydata = [
								'company_id'	=>	$this->get_company_id(),
								'user_id'		=>	$this->get_user_id(),
								'action_id'		=>	$id,
								'action'		=>	'Add',
								'action_on'		=>	getDriverFullName($data['driver_id']),
								'action_place'	=>	'Collision',
							];
							history($historydata);
							$this->session->set_flashdata('success', 'Collision Updated Successfully');
						}
					redirect('collision');
				}


		}//form_valid else
	}

	//------------------------ Truck Edit Function ------------------------//
	//------------------------ collision View ------------------------//
		public function view($id=0)
		{
			valid_company('collision','company_id',$id);

			$data['collision_detail'] =  $this->collision_model->getcollisionByID($id);

		    // $data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
			$data['driver_name'] = $this->getDriverName($data['collision_detail']['driver_id']);
			$data['codriver_name'] = $this->getDriverName($data['collision_detail']['temp_driver']);
			$data['trailer_unit'] = getTrailerUnit($data['collision_detail']['trailer']);
			$data['truck_unit'] = getTruckUnit($data['collision_detail']['truck']);


			$data['title'] = 'collision View : TDMA';
			$data['view']  = 'company/collision/collision_view';
			$this->load->view('company/layout', $data);

		}

		public function edit($id){
			valid_company('collision','company_id',$id);

			$data['collision_detail'] =  $this->collision_model->getcollisionByID($id);

		    $data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
			$data['driver_name'] = $this->getDriverName($data['collision_detail']['driver_id']);
			$data['gettrailer'] =  $this->trailer_model->gettrailer($this->company_id);
			$data['gettruck'] =  $this->truck_model->gettruck($this->company_id);

			$data['title'] = 'Edit collision : DMS';
			$data['view']  = 'company/collision/collision_add';
			$this->load->view('company/layout', $data);
		}
	//------------------------ collision Add ------------------------//

	function getDriverName($id){
		$result = $this->db->query("SELECT `first_name`,`middle_name`,`last_name` From `drivers` WHERE id='".$id."'");
		if($result->num_rows() > 0){
			$result =$result->row();
		return $result->first_name.' '.$result->middle_name.' '.$result->last_name;
		}
	}

	function city_suggestion(){
		$search = $this->input->post('search');

		$result = $this->db->query("SELECT DISTINCT city from collision where `city` LIKE '%$search%'")->result();
		$str ='';
		foreach($result as $data){
			$str .= "<li class='suggesions'>".$data->city."</li>";
		}
		echo $str;
	}

	function citFormVali($InspData){
		$rulesArr = array(
                                    array(
                                            'field' => 'cita_loc',
                                            'label' => 'Which Country',
                                            'rules' => 'required|trim|htmlspecialchars|in_list[can,us]'
                                         )/*,
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
                                    ),
                                    array(
                                            'field' => 'training_type',
                                            'label' => 'Training Type',
                                            'rules' => 'trim|htmlspecialchars|in_list[def_driv,road_eva,log_book_train,Haz_dang,wint_drive,other]',
                                            'errors' => array(
						                        'in_list' => 'You must provide a valid %s.',
						                					),
                                    ),
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
                                    ),*/
			);


				/*--------------------------Drivers List---------------------------*/
			/*$allDrivers = $this->driver_model->getDriver($this->company_id);

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
			if(isset($InspData['training_type']) && $InspData['training_type'] == 'other'){
				$rulesArr[] =  array(
                                            'field' => 'train_text',
                                            'label' => 'Training Name',
                                            'rules' => 'required|trim|htmlspecialchars'
                                    );
			}*/


		return $rulesArr;
	}//inspFormVali End
}//class end
?>
