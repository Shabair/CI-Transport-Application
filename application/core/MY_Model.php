<?php

/**
* 
*/
class MY_Model extends CI_Model
{

	public 		$currentWith1Mth 	= 	NULL;

	function __construct()
	{

		parent::__construct();

		$CRNTdate = new DateTime(date('Y-m-d'));//date('Y-m-d')
      	$CRNTdate->add(new DateInterval('P1M'));
      	$this->currentWith1Mth = $CRNTdate->format('Y-m-d');

		
	}


	//-----------------------------------------------------
	public function count($table = ''){
		$CI = &get_instance();
		/*All Ites Count*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->from($table);
		$Data['all']=$CI->db->count_all_results();
		/*Active Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('deactive', 0);
		$CI->db->from($table);
		$Data['active']=$CI->db->count_all_results();
		/*Deactive Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('deactive', 1);
		$CI->db->from($table);
		$Data['deactive']=$CI->db->count_all_results();
		/*End of Counts*/
		return $Data;
	}

	public function getSapAndFollowUpIds($isFilterIds = true){
		$CI = &get_instance();
		$sapOfIds = get_from('extra_data','tbl_val',['tbl_item_id'=>$CI->company_id,'tbl_name'=>'drug_test','tbl_col'=>'sap_ofs']);

		$followUpIds = get_from('extra_data','tbl_val',['tbl_item_id'=>$CI->company_id,'tbl_name'=>'drug_test','tbl_col'=>'follow_ups']);
		
		if($isFilterIds){

			if(!empty($sapOfIds)){
				$sapOfIds = unserialize($sapOfIds);
				$sapOfIds = implode(',', array_keys($sapOfIds));
			}
			if(!empty($followUpIds)){
				$followUpIds = unserialize($followUpIds);
				$followUpIds = implode(',', array_keys($followUpIds));
			}
			if(empty($sapOfIds)){
				$sapOfIds = 00000;
			}
			if(empty($followUpIds)){
				$followUpIds = 00000;
			}
		}

		return ['sapOfIds'=>$sapOfIds,'followUpIds'=>$followUpIds];
	}

}//class end
    

    

?>