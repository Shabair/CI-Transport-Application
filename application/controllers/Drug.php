<?php

class Drug extends MY_Controller {
	

	function __construct()
	{
		parent::__construct();
		$this->load->model("driver_model");
		$this->load->model("drug_model");
		
	}

//------------------------ collision List ------------------------//


	// public function current_quarter($CurrentQuarterMonth){
	// 	echo $this->get_quarter(date('m'));
	// }

	public function datatable_json()
	{	

		$Records = $this->drug_model->GetAll($this->company_id,NULL);

		
        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r) 
		{ 
			//$driversIds = unserialize($r['driver_id']);
			$perDrug = $this->perDrugData($r);
			$data[]= array(
				$count++,
                $perDrug['driversNames'],
                $perDrug['drugAlcohol'],
                $perDrug['drugTestCmplt'],
                $perDrug['drugTestCDate'],
                $perDrug['testResult'],
                $perDrug['sapfuther'],
                $perDrug['drugTestFile'],

				'<a class="btn btn-xs btn-success" href="'.base_url('drug/view/'.$r['id']).'"> <i class="fa fa-eye"></i></a>
				<a class="btn btn-xs btn-info" href="'.base_url('drug/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>',
			);
        }
		
		
		// $Records['data']=$data;
		//echo json_encode($Records);		
  		echo json_encode($data);				   
	}	
	//------------------------ get data in table List ------------------------//
	function tableDriverNames($driversIds){
		$str = [];
		for($i = 0; $i<count($driversIds) ; $i++){ //getDriverFullName
			$str[] = getDriverFullName($driversIds[$i]);
		}

		return implode('<br ><hr>',$str);
	}

	function perDrugData($data){

		$driversIds = unserialize($data['driver_id']);
		$datar = unserialize($data['dtestdata']);
		$sapdata = unserialize($data['sapdata']);
		//var_dump($sapdata);
		$driversNames = [];
		for($i = 0; $i<count($driversIds) ; $i++){ //getDriverFullName
			$driversNames[] = getDriverFullName($driversIds[$i]);
			// drug/alcohol
			if(isset($datar['is_dna_'.$driversIds[$i]])){
				
				switch ($datar['is_dna_'.$driversIds[$i]]) {
					case 'alcohol':
						$drugAlcohol[] = 'Alcohol';
						break;
					case 'drug':
						$drugAlcohol[] = 'Drug';
						break;
					case 'both':
						$drugAlcohol[] = 'Drug/Alcohol';
						break;
				}
			}else{
				$drugAlcohol[] = 'Empty';
			}
			// drug/alcohol end
			// Drug Test Completed
			if(isset($datar['dtest_cmplt_'.$driversIds[$i]])){
				$drugTestCmplt[] = "<span style='color:Green'>Yes</span>";
			}else{
				$drugTestCmplt[] = "<span style='color:Red'>NO</span>";
			}
			// Drug Test Completed End
			// Date
			if(isset($datar['dtest_cmplt_date_'.$driversIds[$i]])){
				$drugTestCDate[] = $datar['dtest_cmplt_date_'.$driversIds[$i]];
			}else{
				$drugTestCDate[] = 'Empty';
			}
			//result
			if(isset($datar['dtest_cmplt_r_'.$driversIds[$i]])){
				
				switch ($datar['dtest_cmplt_r_'.$driversIds[$i]]) {
					case 'pos':
						$testResult[] = 'Positive';
						break;
					case 'neg':
						$testResult[] = 'Negative';
						break;
				}
					// for futher instructions 
				
				
			}else{
				$testResult[] = 'Empty';
			}
			if(!empty($datar['dtest_cmplt_r_'.$driversIds[$i]])):
				if($datar['dtest_cmplt_r_'.$driversIds[$i]] == 'pos'){
					/**/
					$rtddata 	= unserialize($data['rtddata']);
					if(@$rtddata['rtd_cmplt_r_'.$driversIds[$i]] != 'pos' && (@$rtddata['rtd_cmplt_r_'.$driversIds[$i]] != '')){

						$fupdata 	= unserialize($data['fupdata']);
						if(is_array($fupdata)){	
							end($fupdata);
							$fupid = explode('_', key($fupdata));
							$fupcount = $fupid[count($fupid)-1];
							if(@$fupdata['fup_dtcmplt'.'_'.$driversIds[$i].'_'.$fupcount] == 'on'){
								if(!empty($fupdata['fup_dt_cr'.'_'.$driversIds[$i].'_'.$fupcount])){
									if($fupdata['fup_dt_cr'.'_'.$driversIds[$i].'_'.$fupcount] == 'neg'){
										//echo $driversIds[$i].'_'.$fupcount.':driver End'. $fupQuery[$i]['id'];
										$sapfuther[] = 'Completed';
									}else{
										$sapfuther[] = 'In Process';
									}
								}else{
									$sapfuther[] = 'In Process';
								}
							}else{
								$sapfuther[] = 'In Process';
							}
						}else{
								$sapfuther[] = 'In Process';
						}
					}else{
						if(@$sapdata['sap_finst_'.$driversIds[$i]] == 'on'){
							$sapnote = $sapdata['sap_fi_note_'.$driversIds[$i]];
							$sapfuther[] = substr($sapnote, 0,50).((strlen($sapnote) > 20)?'...':'');
						}else{
								$sapfuther[] = 'In Process';
						}
					}
				}else{
					$sapfuther[] = 'Sap Empty';
				}
			else:
				$sapfuther[] = 'Sap Empty';
			endif;
			// Date End 
			// file
			if(isset($datar['dtest_cmplt_file_'.$driversIds[$i]])){
				// $drugTestFile[] = $datar['dtest_cmplt_file_'.$driversIds[$i]];
				$drugTestFile[] = "<a href='".base_url('drug/file_download').'/'.basename($datar['dtest_cmplt_file_'.$driversIds[$i]]).'/'.getDriverFullName($driversIds[$i]).' Drug Test'."'>Download</a>";
			}else{
				$drugTestFile[] = 'No File';
			}
			// file End 
		}

		$rdata['driversNames'] =   implode('<br ><hr>',$driversNames);
		// drug/alcohol
		if(!empty($drugAlcohol)){
			// $drugAlcohol[] = $datar['is_dna_'.$driversIds[$i]];
			$rdata['drugAlcohol'] =   implode('<br ><hr>',$drugAlcohol);
		}else{
			$rdata['drugAlcohol'] = '';
		}
		// drug/alcohol end

		$rdata['drugTestCmplt'] =   implode('<br ><hr>',$drugTestCmplt);
		//Date
		if(!empty($drugTestCDate)){
			
			$rdata['drugTestCDate'] =   implode('<br ><hr>',$drugTestCDate);
		}else{
			$rdata['drugTestCDate'] =   '';
			
		}
		//Result
		if(!empty($testResult)){
			
			$rdata['testResult'] =   implode('<br ><hr>',$testResult);
		}else{
			$rdata['testResult'] =   '';
			
		}
		//sapResult
		if(!empty($sapfuther)){
			
			$rdata['sapfuther'] =   implode('<br ><hr>',$sapfuther);
		}else{
			$rdata['sapfuther'] =   '';
			
		}
		//file
		if(!empty($drugTestFile)){
			
			$rdata['drugTestFile'] =   implode('<br ><hr>',$drugTestFile);
		}else{
			$rdata['drugTestFile'] =   '';
			
		}



		return $rdata;
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

		$data['getsapof'] = $this->getSapOf();
		$this->db->select('id,quarter')->where('company_id',$this->get_company_id());
		$data['quarters'] =$this->db->get('drug')->result_array();
		$data['latest_quarter'] = $this->drug_model->getLatestQuarter($this->get_company_id());
		$data['S_FUIds'] = $this->drug_model->getSapAndFollowUpIds();
		$data['current_quarter'] = $this->current_quarter;
		$data['title'] = 'Drug Test List : TDMA';
		$data['view']  = 'company/drug/drug_list';
		$this->load->view('company/layout', $data);	
	}


		
	//------------------------ collision View ------------------------//
	function getSapOf($sapId = NULL){ //`driver_id`,`sapdata`,`rtddata`,`fupdata`
		if($sapId !== NULL){
			$fupQuery =  $this->db->query("SELECT * FROM `drug` WHERE `id` = '".$sapId."' AND company_id = '".$this->company_id."'")->result_array();
		}else{
			$fupQuery =  $this->db->query("SELECT * FROM `drug` WHERE company_id = '".$this->company_id."'")->result_array();
		}
		
		$driverCount = 0;
		$reqSapOf = array();
		// var_dump(unserialize($fupQuery[0]['sapdata']));
		// die();
		for($i = 0;$i < count($fupQuery);$i++){
			$fupId = $fupQuery[$i]['id'];
			$driversIds = unserialize($fupQuery[$i]['driver_id']);
			// var_dump(unserialize($fupQuery[$i]['sapdata']));
			// die();
			for($di = 0;$di <count($driversIds);$di++){
					$sDriver = $driversIds[$di];
				if(isDriverActive($sDriver)){
					$dtestdata = unserialize($fupQuery[$i]['dtestdata']);
					$sapdata = unserialize($fupQuery[$i]['sapdata']);
					//var_dump();
					$isSap = false;
					if(!empty($dtestdata['dtest_cmplt_r_'.$sDriver])):
						$dCmpltR = $dtestdata['dtest_cmplt_r_'.$sDriver];
						if($dCmpltR == 'pos' && @$sapdata['sap_letter_'.$sDriver] == 'on'){
							$rtddata = unserialize($fupQuery[$i]['rtddata']);
							$isSap = true;
							
							if(@$rtddata['rtd_cmplt_r_'.$sDriver] != 'pos'){
								$fupdata 	= unserialize($fupQuery[$i]['fupdata']);
								if(is_array($fupdata)){	
									end($fupdata);
									$fupid = explode('_', key($fupdata));
									$fupcount = $fupid[count($fupid)-1];
									if(@$fupdata['fup_dtcmplt'.'_'.$sDriver.'_'.$fupcount] == 'on'){
										if(!empty($fupdata['fup_dt_cr'.'_'.$sDriver.'_'.$fupcount])){
											if($fupdata['fup_dt_cr'.'_'.$sDriver.'_'.$fupcount] == 'pos'){
												//echo $sDriver.'_'.$fupcount.':driver End'. $fupQuery[$i]['id'];
												$isSap = true;
											}else{
												$isSap = false;
											}
										}
									}else{
										$isSap = true;
									}
								}
							}else{
								$isSap = false;
							}//rtd_cmplt_r_

						}//dCmpltR
					endif;
					if($isSap){
						$reqSapOf[$driverCount]['id'] = $fupId;
						$reqSapOf[$driverCount]['fupDriverId']= $sDriver;
						$driverCount++;	
					}
				}//isDriverActive
			}//driversIds loop end
		}//for end of $fupQuery
		// var_dump($reqSapOf);
		return $reqSapOf;
	}
	//------------------------ collision View ------------------------//

	//------------------------ collision Add ------------------------//
	function getTotalNoFromArray($array,$match_string,$indexOf = 2){
		$newArr = array();
		foreach($array as $key => $value) {
		   if(strpos($key, $match_string) !== false) {
		       $newArr[] = $key;
		   }
		}
		if(!empty($newArr)){
			$max = max(array_values($newArr));
			$totalNo = explode('_', $max);
			return $totalNo[$indexOf];
		}else{
			return 0;
		}
	}

//------------------------ collision Add ------------------------//
	public function add($id=0)
	{
		// var_dump($this->input->post());
		// die($this->getTotalNoFromArray($this->input->post(),'sap_appoint_'));
		if($id!=0)
		    valid_company('drug','company_id',$id);

		$this->form_validation->set_rules($this->drugFormVali($this->input->post()));


		if($this->form_validation->run() ==  False){
			if(!empty($id) && NULL !== $this->input->post('update')){

				$data['drug_detail'] =  $this->drug_model->getDrugByID($id);

				$driver_ids = @unserialize($data['drug_detail']['driver_id']);
				$driver_ids = implode(',', $driver_ids);

	    		$data['getDriver'] =  $this->getDrivers($driver_ids);
				$data['title'] = 'Drug List : TDMA';
				$data['view']  = 'company/drug/drug_add';
				$this->load->view('company/layout', $data);

        	}else{

		    	$data['getDriver'] =  $this->getDrivers(null);
				$data['title'] = 'Drug Add : TDMA';
				$data['view']  = 'company/drug/drug_add';
				$this->load->view('company/layout', $data);

			}
		}
		else{

			if(!empty($this->input->post('quarter'))){
				$quarter = $this->input->post('quarter');
				//die($quarter);
			}
			$driver_id = $this->input->post('driver_id');
			$data= array(

				'driver_id'					=> 	serialize($driver_id)
				
			);  

			for(  $i = 0; $i < count($driver_id) ; $i++ ):
				$pDId = $driver_id[$i];
				
				$dtestdata['is_dna_'.$pDId] 				= $this->input->post('is_dna_'.$pDId);
				$dtestdata['dtest_cmplt_'.$pDId] 		= $this->input->post('dtest_cmplt_'.$pDId);

				if($dtestdata['dtest_cmplt_'.$pDId] == 'on'){
					$dtestdata['dtest_cmplt_date_'.$pDId] 	= $this->input->post('dtest_cmplt_date_'.$pDId);
					$dtestdata['dtest_cmplt_r_'.$pDId]		= $this->input->post('dtest_cmplt_r_'.$pDId);
					// dtest  file function

						$getFile = $this->file_upload('dtestdata',$id,'dtest_cmplt_file_'.$pDId);
						if($getFile !== NULL){
							$dtestdata['dtest_cmplt_file_'.$pDId] = $getFile;	
						}
						
					//file end
					if($dtestdata['dtest_cmplt_r_'.$pDId] == 'pos'){
						$totalSapOfNo = $this->getTotalNoFromArray($this->input->post(),'sap_appoint_');
					for($sapOfCount = 1; $sapOfCount <= $totalSapOfNo; $sapOfCount++):
						$sapdata['sap_appoint_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_appoint_'.$sapOfCount."_".$pDId); //Appointment
						$sapdata['sap_letter_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_letter_'.$sapOfCount."_".$pDId); //Authorization
						$sapdata['sap_finst_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_finst_'.$sapOfCount."_".$pDId); //Further Instructions

						if($sapdata['sap_appoint_'.$sapOfCount."_".$pDId] == 'on'){ // Appointment if on 727
							$sapdata['sap_app_date_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_app_date_'.$sapOfCount."_".$pDId);
							$sapdata['sap_note_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_note_'.$sapOfCount."_".$pDId);
						}

						if($sapdata['sap_finst_'.$sapOfCount."_".$pDId] == 'on'){//Further Instructions if on
							$sapdata['sap_fi_note_'.$sapOfCount."_".$pDId]		= $this->input->post('sap_fi_note_'.$sapOfCount."_".$pDId); 
						}

						if($sapdata['sap_letter_'.$sapOfCount."_".$pDId] == 'on'){ //Authorization if on
							$rtddata['rtd_switch_'.$sapOfCount."_".$pDId]		= $this->input->post('rtd_switch_'.$sapOfCount."_".$pDId); //Return to Duty
							$rtddata['rtd_cmplt_'.$sapOfCount."_".$pDId]		= $this->input->post('rtd_cmplt_'.$sapOfCount."_".$pDId); //Drug Test Completed
							/*Autho File*/
							$getFile = $this->file_upload('rtddata',$id,'sap_letter_file_'.$sapOfCount."_".$pDId);
							if($getFile !== NULL){
								$rtddata['sap_letter_file_'.$sapOfCount."_".$pDId] = $getFile;	
							}
							/*Autho File End*/

							if($rtddata['rtd_cmplt_'.$sapOfCount."_".$pDId] == 'on'){
								$rtddata['rtd_cmplt_date_'.$sapOfCount."_".$pDId]		= $this->input->post('rtd_cmplt_date_'.$sapOfCount."_".$pDId); //Drug Test Date
								$rtddata['rtd_cmplt_r_'.$sapOfCount."_".$pDId]		= $this->input->post('rtd_cmplt_r_'.$sapOfCount."_".$pDId); //Drug Test Result 
								/*Return To duty File*/
								$getFile = $this->file_upload('rtddata',$id,'rtd_cmplt_file_'.$sapOfCount."_".$pDId);
								if($getFile !== NULL){
									$rtddata['rtd_cmplt_file_'.$sapOfCount."_".$pDId] = $getFile;	
								}
								/*Return To duty File End*/

								if($rtddata['rtd_cmplt_r_'.$sapOfCount."_".$pDId] == 'neg'){
									//$fupdata['rtd_cmplt_r_'.$pDId]		= $this->input->post('rtd_cmplt_r_'.$pDId); //Drug Test Result
									$fupdata['fup_no_'.$sapOfCount."_".$pDId]		= $this->input->post('fup_no_'.$sapOfCount."_".$pDId); //fup count
									$is_follow_up_completed_result = true;
							$totalFollowUpNo = $this->getTotalNoFromArray($this->input->post(),'fup_cmplt_date_',3);
							die($totalFollowUpNo);
							for($FollowUpCount = 1; $FollowUpCount <= $totalFollowUpNo; $FollowUpCount++):
									for($fupi=1;$fupi<=$fupdata['fup_no_'.$FollowUpCount.'_'.$pDId];$fupi++){
										$fupdata['fup_cmplt_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi]		= $this->input->post('fup_cmplt_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi); //fup Date
										$fupdata['fup_sche_c_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi]		= $this->input->post('fup_sche_c_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi); //fup Schedule Date
										$fupdata['fup_dtcmplt_'.$FollowUpCount.'_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dtcmplt_'.$FollowUpCount.'_'.$pDId.'_'.$fupi); //Drug Test Completed
											if($fupdata['fup_dtcmplt_'.$FollowUpCount.'_'.$pDId.'_'.$fupi] =='on'){ //Drug Test Completed if on
												$fupdata['fup_dt_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dt_date_'.$FollowUpCount.'_'.$pDId.'_'.$fupi); //fup Schedule Date
												$fupdata['fup_dt_cr_'.$FollowUpCount.'_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dt_cr_'.$FollowUpCount.'_'.$pDId.'_'.$fupi); //fup Result
												/*Drug Test File*/
												$getFile = $this->file_upload('fupdata',$id,'fup_cmplt_file_'.$FollowUpCount.'_'.$pDId.'_'.$fupi);
												if($getFile !== NULL){
													$fupdata['fup_cmplt_file_'.$FollowUpCount.'_'.$pDId.'_'.$fupi] = $getFile;	
												}
												/*Drug Test File End*/


											}
										/*Check are all follow ups result not empty*/
										if($this->input->post('fup_dt_cr_'.$FollowUpCount.'_'.$pDId.'_'.$fupi) == null || $this->input->post('is_follow_up_completed_'.$FollowUpCount.'_'.$pDId)== null ){
											$is_follow_up_completed_result = false;
										}
										if($this->input->post('fup_dt_cr_'.$FollowUpCount.'_'.$pDId.'_'.$fupi) == 'pos'){
											$is_follow_up_positive = true;
										}
										/*Check are all follow ups result not empty end*/
									}
									if($is_follow_up_completed_result || isset($is_follow_up_positive)){
										$is_follow_up_completed['is_follow_up_completed_'.$FollowUpCount.'_'.$pDId]		= $this->input->post('is_follow_up_completed_'.$FollowUpCount.'_'.$pDId);
									}
							endfor;
								}else{
									$is_sap_completed['is_sap_completed_'.$sapOfCount."_".$pDId]		= $this->input->post('is_sap_completed_'.$sapOfCount."_".$pDId);
								}
								
							}

						}
					endfor; //for($sapOfCount = 1; $sapOfCount <= $totalSapOfNo; $sapOfCount++):
					}

				}


			endfor; // first driver loop


			if(!empty($dtestdata)){
				$data['dtestdata'] 		= serialize($dtestdata);

			}else{
				$data['dtestdata'] =	'';
			}
			if(!empty($sapdata)){
				$data['sapdata'] 		= serialize($sapdata);

			}else{
				$data['sapdata'] =	'';
			}
			
			if(!empty($rtddata)){
				$data['rtddata'] 		= serialize($rtddata);

			}else{
				$data['rtddata'] =	'';
			}
			
			if(!empty($is_sap_completed)){
				$data['is_sap_completed'] 		= serialize($is_sap_completed);

			}else{
				$data['is_sap_completed'] =	'';
			}
			
			if(!empty($fupdata)){
				$data['fupdata'] 		= serialize($fupdata);

			}else{
				$data['fupdata'] =	'';
			}	

			if(!empty($is_follow_up_completed)){
				$data['is_follow_up_completed'] 		= serialize($is_follow_up_completed);

			}else{
				$data['is_follow_up_completed'] =	'';
			}
			

			for($i = 0; $i<count($driver_id) ; $i++){ //getDriverFullName
				$driversNames[] = getDriverFullName($driver_id[$i]);
			}
			$driversNames =   implode('<br ><hr>',$driversNames);	

			if($this->input->post('submit'))
				{	
					$data['company_id'] 				= 	$this->company_id;
					$data['created_date'] 				=	date('Y-m-d');
					$data['quarter'] 				    =	(!empty($quarter))?$quarter:$this->current_quarter;

					$result = $this->drug_model->insertdrug($data);
			
					if($result)
					{	
						meta_data($table,$column,$tbl_item_id,$value=null);

						$historydata = [
							'company_id'	=>	$this->get_company_id(),
							'user_id'		=>	$this->get_user_id(),
							'action_id'		=>	$this->db->insert_id(),
							'action'		=>	'Add',
							'action_on'		=>	$driversNames,
							'action_place'	=>	'Drug',
						];
						
						history($historydata);

						$this->session->set_flashdata('success', 'Drug Inserted Successfully');
					}
					else
					{
						$this->session->set_flashdata('error','Error Into Insert drug');
					}
					
				}
				
			if($this->input->post('update'))
				{	
					$result =  $this->drug_model->updatedrug($data, $id);
					// die($result);
					if($result)
					{
						$historydata = [
							'company_id'	=>	$this->get_company_id(),
							'user_id'		=>	$this->get_user_id(),
							'action_id'		=>	$id,
							'action'		=>	'Update',
							'action_on'		=>	$driversNames,
							'action_place'	=>	'Drug',
						];
						history($historydata);
						$this->session->set_flashdata('success', 'Drug Updated Successfully');
					}
					
				}
			if($result){
				for($i = 0; $i<count($driver_id) ; $i++){ //getDriverFullName
					$tbl_val = array();
					$drugTestDate = $this->input->post('dtest_cmplt_date_'.$driver_id[$i]);
					$extraDataVal = get_from('extra_data','id,tbl_val,tbl_col',['tbl_item_id' => $driver_id[$i],'tbl_name'=>'getDrugTestId']);//$table,$column="*",$where=[]

					$where = [
						'id'=>null,
						'tbl_item_id'=>$driver_id[$i],
						'tbl_name'=>'getDrugTestId'
					];


					$quarter = get_from('drug','quarter',['id' => $result]);//$table,$column="*",$where=[]
					
					if(!empty($extraDataVal)){
						$where['id'] = $extraDataVal['id'];
						$tbl_val = unserialize($extraDataVal['tbl_val']);
					}
					$where['tbl_col'] = ($quarter == $this->current_quarter)?$drugTestDate:((!empty($extraDataVal['tbl_col']))?$extraDataVal['tbl_col']:$drugTestDate);


					$tbl_val[$quarter] = $result;
					$where['tbl_val'] = serialize($tbl_val);
					extra_data($where);
				}
			}
			redirect('drug');
			
		}//form_valid else


	}	


	public function add_single_drug(){
		$id = $this->input->post('drug_id');
		$singleDrugTest	= get_from('drug','*',['id'=>$id]);
		$driver_ids = unserialize($singleDrugTest['driver_id']);
		$dtestdata = unserialize($singleDrugTest['dtestdata']);
		$sapdata = unserialize($singleDrugTest['sapdata']);
		$rtddata = unserialize($singleDrugTest['rtddata']);
		$fupdata = unserialize($singleDrugTest['fupdata']);

		$pDId = $this->input->post('driver_id');
		
		$dtestdata['is_dna_'.$pDId] 				= $this->input->post('is_dna_'.$pDId);
		$dtestdata['dtest_cmplt_'.$pDId] 		= $this->input->post('dtest_cmplt_'.$pDId);

		if($dtestdata['dtest_cmplt_'.$pDId] == 'on'){
			$dtestdata['dtest_cmplt_date_'.$pDId] 	= $this->input->post('dtest_cmplt_date_'.$pDId);
			$dtestdata['dtest_cmplt_r_'.$pDId]		= $this->input->post('dtest_cmplt_r_'.$pDId);
			// dtest  file function

				$getFile = $this->file_upload('dtestdata',$id,'dtest_cmplt_file_'.$pDId);
				if($getFile !== NULL){
					$dtestdata['dtest_cmplt_file_'.$pDId] = $getFile;	
				}
				
			//file end
			if($dtestdata['dtest_cmplt_r_'.$pDId] == 'pos'){
				$sapdata['sap_appoint_'.$pDId]		= $this->input->post('sap_appoint_'.$pDId); //Appointment
				$sapdata['sap_letter_'.$pDId]		= $this->input->post('sap_letter_'.$pDId); //Authorization
				$sapdata['sap_finst_'.$pDId]		= $this->input->post('sap_finst_'.$pDId); //Further Instructions

				if($sapdata['sap_appoint_'.$pDId] == 'on'){ // Appointment if on 727
					$sapdata['sap_app_date_'.$pDId]		= $this->input->post('sap_app_date_'.$pDId);
					$sapdata['sap_note_'.$pDId]		= $this->input->post('sap_note_'.$pDId);
				}

				if($sapdata['sap_finst_'.$pDId] == 'on'){//Further Instructions if on
					$sapdata['sap_fi_note_'.$pDId]		= $this->input->post('sap_fi_note_'.$pDId); 
				}

				if($sapdata['sap_letter_'.$pDId] == 'on'){ //Authorization if on
					$rtddata['rtd_switch_'.$pDId]		= $this->input->post('rtd_switch_'.$pDId); //Return to Duty
					$rtddata['rtd_cmplt_'.$pDId]		= $this->input->post('rtd_cmplt_'.$pDId); //Drug Test Completed
					/*Autho File*/
					$getFile = $this->file_upload('rtddata',$id,'sap_letter_file_'.$pDId);
					if($getFile !== NULL){
						$rtddata['sap_letter_file_'.$pDId] = $getFile;	
					}
					/*Autho File End*/

					if($rtddata['rtd_cmplt_'.$pDId] == 'on'){
						$rtddata['rtd_cmplt_date_'.$pDId]		= $this->input->post('rtd_cmplt_date_'.$pDId); //Drug Test Date
						$rtddata['rtd_cmplt_r_'.$pDId]		= $this->input->post('rtd_cmplt_r_'.$pDId); //Drug Test Result 
						/*Return To duty File*/
						$getFile = $this->file_upload('rtddata',$id,'rtd_cmplt_file_'.$pDId);
						if($getFile !== NULL){
							$rtddata['rtd_cmplt_file_'.$pDId] = $getFile;	
						}
						/*Return To duty File End*/

						if($rtddata['rtd_cmplt_r_'.$pDId] == 'neg'){
							//$fupdata['rtd_cmplt_r_'.$pDId]		= $this->input->post('rtd_cmplt_r_'.$pDId); //Drug Test Result
							$fupdata['fup_no_'.$pDId]		= $this->input->post('fup_no_'.$pDId); //fup count
							$is_follow_up_completed_result = true;
							for($fupi=1;$fupi<=$fupdata['fup_no_'.$pDId];$fupi++){
								$fupdata['fup_cmplt_date_'.$pDId.'_'.$fupi]		= $this->input->post('fup_cmplt_date_'.$pDId.'_'.$fupi); //fup Date
								$fupdata['fup_sche_c_date_'.$pDId.'_'.$fupi]		= $this->input->post('fup_sche_c_date_'.$pDId.'_'.$fupi); //fup Schedule Date
								$fupdata['fup_dtcmplt_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dtcmplt_'.$pDId.'_'.$fupi); //Drug Test Completed
									if($fupdata['fup_dtcmplt_'.$pDId.'_'.$fupi] =='on'){ //Drug Test Completed if on
										$fupdata['fup_dt_date_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dt_date_'.$pDId.'_'.$fupi); //fup Schedule Date
										$fupdata['fup_dt_cr_'.$pDId.'_'.$fupi]		= $this->input->post('fup_dt_cr_'.$pDId.'_'.$fupi); //fup Result
										/*Drug Test File*/
										$getFile = $this->file_upload('fupdata',$id,'fup_cmplt_file_'.$pDId.'_'.$fupi);
										if($getFile !== NULL){
											$fupdata['fup_cmplt_file_'.$pDId.'_'.$fupi] = $getFile;	
										}
										/*Drug Test File End*/


									}
								/*Check are all follow ups result not empty*/
								if($this->input->post('fup_dt_cr_'.$pDId.'_'.$fupi) == null || $this->input->post('is_follow_up_completed_'.$pDId)== null ){
									$is_follow_up_completed_result = false;
								}
								if($this->input->post('fup_dt_cr_'.$pDId.'_'.$fupi) == 'pos'){
									$is_follow_up_positive = true;
								}
								/*Check are all follow ups result not empty end*/
							}
							
							if($is_follow_up_completed_result || isset($is_follow_up_positive)){
								$is_follow_up_completed['is_follow_up_completed_'.$pDId]		= $this->input->post('is_follow_up_completed_'.$pDId);
							}
							
						}else{
									$is_sap_completed['is_sap_completed_'.$pDId]		= $this->input->post('is_sap_completed_'.$pDId);
								}
						
					}

				}

			}

		}


			if(!empty($dtestdata)){
				$data['dtestdata'] 		= serialize($dtestdata);

			}else{
				$data['dtestdata'] =	'';
			}
			if(!empty($sapdata)){
				$data['sapdata'] 		= serialize($sapdata);

			}else{
				$data['sapdata'] =	'';
			}
			
			if(!empty($rtddata)){
				$data['rtddata'] 		= serialize($rtddata);

			}else{
				$data['rtddata'] =	'';
			}
			
			
			if(!empty($is_sap_completed)){
				$data['is_sap_completed'] 		= serialize($is_sap_completed);

			}else{
				$data['is_sap_completed'] =	'';
			}
			
			if(!empty($fupdata)){
				$data['fupdata'] 		= serialize($fupdata);

			}else{
				$data['fupdata'] =	'';
			}	

			if(!empty($is_follow_up_completed)){
				$data['is_follow_up_completed'] 		= serialize($is_follow_up_completed);

			}else{
				$data['is_follow_up_completed'] =	'';
			}


			$driversName = getDriverFullName($pDId);

	
			$result =  $this->drug_model->updatedrug($data, $id);
			// die($result);
			if($result)
			{
				$historydata = [
					'company_id'	=>	$this->get_company_id(),
					'user_id'		=>	$this->get_user_id(),
					'action_id'		=>	$id,
					'action'		=>	'Update',
					'action_on'		=>	$driversName,
					'action_place'	=>	'Drug',
				];
				history($historydata);
				$this->session->set_flashdata('success', 'Drug Updated Successfully');
			}
			
			return redirect('drug');
	}
	//------------------------ Truck Edit Function ------------------------//


	function file_upload($column,$id,$file){
		$tp_ins_query = $this->db->query("SELECT `".$column."` FROM `drug` where `id` = '".$id."'")->row_array();
		if(count($tp_ins_query) > 0){
			$pre_tp_files = unserialize($tp_ins_query[$column]);
		}

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
		$config['max_size']	= '100000000';
		$config['max_width']  = '100000';
		$config['max_height']  = '100000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!empty($_FILES[$file]['name'])){
            if($this->upload->do_upload($file)){
                $fileData = $this->upload->data();

                if(isset($pre_tp_files[$file])){
        		$img = './uploads/'.basename($pre_tp_files[$file]);

	        		if(is_file($img)){
						unlink($img);
					}
        		}	

                return $dtestdata[$file] = $fileData['file_name'];
            }
        }else if(!is_array($_FILES[$file])){

        	if(isset($pre_tp_files[$file])){
        		$img = './uploads/'.basename($pre_tp_files[$file]);

        		if(is_file($img)){
					unlink($img);
				}
        	}	

		}else if(isset($pre_tp_files[$file])){
        		return $dtestdata[$file] = $pre_tp_files[$file];

        }
        return NULL;
	}
	//------------------------ collision View ------------------------//
		public function view($id=0)
		{   
			valid_company('drug','company_id',$id);

			$data['drug_detail'] =  $this->drug_model->getDrugByID($id);
					
		    // $data['getDriver'] =  $this->driver_model->getDriver($this->company_id);


			$data['title'] = 'Drug View : TDMA';
			$data['view']  = 'company/drug/drug_view';
			$this->load->view('company/layout', $data);
			
		}

		public function edit($id){
			valid_company('drug','company_id',$id);

			$data['drug_detail'] =  $this->drug_model->getDrugByID($id);

			$driver_ids = @unserialize($data['drug_detail']['driver_id']);

			$driver_ids = implode(',', $driver_ids);

		    $data['getDriver'] =  $this->getDrivers($driver_ids);

			$data['title'] = 'Edit Drug : DMS';
			$data['view']  = 'company/drug/drug_add';
			$this->load->view('company/layout', $data);
		}

		public function getDrivers($saveDriverIds){
			$S_FUIds = $this->drug_model->getSapAndFollowUpIds();
			if(empty($saveDriverIds)){
				$saveDriverIds = 00000;
			}
			$sql = "SELECT id,first_name,middle_name,last_name,deactive FROM drivers WHERE (company_id='".$this->company_id."' AND deactive='0' AND id NOT IN (".$S_FUIds['sapOfIds'].") AND id NOT IN(".$S_FUIds['followUpIds'].")) OR id IN(".$saveDriverIds.")";
			// var_dump($sql);
			// die();
			$result = $this->db->query($sql)->result();
			return $result;

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
	//------------------------ drug Add ------------------------//

		public function dtestdataUpdate(){

			$drugtestId = $this->input->post('drug_test_id');
			$driver_id = $this->input->post('driver_id');

			$dtestdata = get_from('drug','dtestdata',['id'=>$drugtestId]);

			$dtestdata = unserialize($dtestdata);

			$dtestdata['is_dna_'.$driver_id] = $this->input->post('is_dna_'.$driver_id);
			$dtestdata['dtest_cmplt_'.$driver_id] = $this->input->post('dtest_cmplt_'.$driver_id);
			$dtestdata['dtest_cmplt_date_'.$driver_id] = $this->input->post('dtest_cmplt_date_'.$driver_id);
			$dtestdata['dtest_cmplt_r_'.$driver_id] = $this->input->post('dtest_cmplt_r_'.$driver_id);

			$data = array(
			        'dtestdata' => serialize($dtestdata)
			);

			$this->db->where('id', $drugtestId);
			$this->db->update('drug', $data);

			echo ($this->db->affected_rows())?'Random Test Updated Successfully':'Unfortunately there is an error!';

		}

		public function sapAndFollowUp(){

			$drugtestId = $this->input->post('drug_test_id');
			$driver_id = $this->input->post('driver_id');

			$data = get_from('drug','*',['id'=>$drugtestId]);
			var_dump($data);
			// $dtestdata = unserialize($dtestdata);

			// $dtestdata['is_dna_'.$driver_id] = $this->input->post('is_dna_'.$driver_id);
			// $dtestdata['dtest_cmplt_'.$driver_id] = $this->input->post('dtest_cmplt_'.$driver_id);
			// $dtestdata['dtest_cmplt_date_'.$driver_id] = $this->input->post('dtest_cmplt_date_'.$driver_id);
			// $dtestdata['dtest_cmplt_r_'.$driver_id] = $this->input->post('dtest_cmplt_r_'.$driver_id);

			// $data = array(
			//         'dtestdata' => serialize($dtestdata)
			// );

			// $this->db->where('id', $drugtestId);
			// $this->db->update('drug', $data);

			// echo ($this->db->affected_rows())?'Random Test Updated Successfully':'Unfortunately there is an error!';

		}

	//------------------------ drug Add ------------------------//

	function getTruckUnit($id){
		return $this->db->query("SELECT unit_no From `truck` WHERE id='".$id."'")->row()->unit_no;
	}

	function getTrailerUnit($id){
		return $this->db->query("SELECT unit_no From `trailer` WHERE id='".$id."'")->row()->unit_no;
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
	
	function drugFormVali($InspData){
		$rulesArr = array(
                                    array(
                                            'field' => 'cita_loc',
                                            'label' => 'Which Country',
                                            'rules' => 'trim|htmlspecialchars'
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