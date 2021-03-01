<?php
class Cronjobs extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('CronJob_model','CJ');
	}

	public function pending_works(){

		if($result = $this->CJ->get_pending_license()){
			$this->CJ->add_pending_works('pending_works',$result);
		}

		if($result = $this->CJ->get_pending_medical()){
			$this->CJ->add_pending_works('pending_works',$result);
		}

		if($result = $this->CJ->get_pending_truck_annual()){
			$this->CJ->add_pending_works('pending_works',$result);
		}

		if($result = $this->CJ->get_pending_trailer_annual()){
			$this->CJ->add_pending_works('pending_works',$result);
		}


		if($result = $this->CJ->get_pending_driver_annual_review()){
			$this->CJ->add_pending_works('pending_works',$result);
		}	
		
	}

	public function sapofAndFollowUps(){

		$fupQuery =  $this->db->query("SELECT * FROM `drug` ")->result_array();
		// var_dump($fupQuery);
		$allSapOfs = array(); 
		$allFollowUps = array();
			$reqSapOf = array();
			$storeSapOf = array();
			$storeFollowUp = array();
		// var_dump(unserialize($fupQuery[0]['sapdata']));
		// die();
		for($i = 0;$i < count($fupQuery);$i++){


			$drugTestId = $fupQuery[$i]['id'];
			$company_id = $fupQuery[$i]['company_id'];
			$driversIds = unserialize($fupQuery[$i]['driver_id']);
			// var_dump(unserialize($fupQuery[$i]['sapdata']));
			// die();
			for($di = 0;$di <count($driversIds);$di++){
				$isFollowUp = false;
				$sDriver = $driversIds[$di];
				if(isDriverActive($sDriver)){
					$dtestdata = unserialize($fupQuery[$i]['dtestdata']);
					
					//var_dump();
					$isSap = false;
					if(!empty($dtestdata['dtest_cmplt_r_'.$sDriver])):
						$dCmpltR = $dtestdata['dtest_cmplt_r_'.$sDriver];
						if($dCmpltR == 'pos' ){
							$sapdata = unserialize($fupQuery[$i]['sapdata']);
							$rtddata = unserialize($fupQuery[$i]['rtddata']);
							$is_sap_completed = unserialize($fupQuery[$i]['is_sap_completed']);
							$is_follow_up_completed = unserialize($fupQuery[$i]['is_follow_up_completed']);
							// if($rtddata['rtd_cmplt_r_'.$sDriver] != 'pos'){
							// 	$storeSapOf[$sDriver] =  $drugTestId;
							// }
							$isSap = true;

							if($sapdata['sap_letter_'.$sDriver] == 'on'){
								if(@$rtddata['rtd_cmplt_r_'.$sDriver] != 'pos'){
									$isFollowUp = true;
									$fupdata 	= unserialize($fupQuery[$i]['fupdata']);
									$isFollowUpResult = true;
									if(is_array($fupdata)){	
										// var_dump($fupdata);
										// end($fupdata);
										$fupkey = max(array_keys($fupdata)); 
										$fupid = explode('_',$fupkey);
										// var_dump($fupid);
										$fupcount = $fupid[count($fupid)-1];
										for($fc = 1; $fc <= $fupcount ;$fc++):
											if(empty($fupdata['fup_dt_cr'.'_'.$sDriver.'_'.$fc])){
												$isFollowUpResult = false;
												// break;
											}
											if(empty($fupdata['fup_dt_cr'.'_'.$sDriver.'_'.$fc])){
												$isFollowUpResultPositive = true;
												// break;
											}
										endfor;//($fc = 0; $fc < $fupcount ;$fc++)
										
									}
									if(($isFollowUpResult && @$is_follow_up_completed['is_follow_up_completed_'.$sDriver] == 'on') || (isset($isFollowUpResultPositive) && @$is_follow_up_completed['is_follow_up_completed_'.$sDriver] == 'on') ){
											$isFollowUp = false;
											$isSap = false;
									}
								}else{
									if($is_sap_completed['is_sap_completed_'.$sDriver] == 'on'){
										$isSap = false;
									}
								}//rtd_cmplt_r_
							}//sap_letter_
						}//dCmpltR
					endif;
					if($isSap){
						$storeSapOf[$sDriver] =  $drugTestId;
					}
					if($isFollowUp){
						$storeFollowUp[$sDriver] =  $drugTestId;
					}

				}//isDriverActive
			}//driversIds loop end
			$where = [
				'tbl_item_id' => $company_id,
				'tbl_name' => 'drug_test',
				'tbl_col' => 'sap_ofs'
			];
			// var_dump($storeSapOf);
			// var_dump($storeFollowUp);
			$this->CJ->add_sapof_followup($where,serialize($storeSapOf));
			$where['tbl_col']='follow_ups';
			// $where['tbl_val']=serialize($storeFollowUp);
			$this->CJ->add_sapof_followup($where,serialize($storeFollowUp));

		}//for end of $fupQuery
		// var_dump($reqSapOf);
		// return $reqSapOf;
		
	}

	function testing(){

	}

}
?>