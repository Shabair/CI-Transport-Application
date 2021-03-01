<?php
class Drug_model extends MY_Model
{	
	var $CI = null;
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
	}
	//-----------------------------------------------------
		//-----------------------------------------------------
	function GetAll($id_login,$column = null)
    {	
    	
		$wh =array();
		
		// if($this->session->userdata('user_search_type')!=''){
		// 	if($this->session->userdata('user_search_type')!='all'){
		// 		$wh[]=" `cita_loc` = '".$this->session->userdata('user_search_type')."'";
		// 	}
		// }
		if($column !== null){
			$SQL ='SELECT '.$column.' FROM drug';
		}else{
			$SQL ='SELECT * FROM drug';
		}

		
		
		if($id_login != '')
		{
			$wh[]=" company_id = '".$id_login."'";
			$wh[]=" quarter = '".$this->CI->current_quarter."'";
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE,'','ORDER BY created_date DESC LIMIT 1');
		}
		else if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
    }
	
	//-----------------------------------------------------
	function getLatestQuarter($company_id){
		$sql = "SELECT * FROM drug where company_id = '".$company_id."' AND quarter = '".$this->CI->current_quarter."'";
		return $this->db->query($sql)->row_array();

	}
	//-----------------------------------------------------
	function insertdrug($data)
	{
		$this->db->insert('drug', $data);

		if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
		}else{
			return false;
		}
		
	}

	//-----------------------------------------------------
	function getdrugByID($id)
	{
		return $this->db->get_where('drug', array(
			'id' => $id
		))->row_array();
	}
	//-----------------------------------------------------
	function updatedrug($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update('drug', $data);
		
		if($this->db->affected_rows() > 0){
			return $id;
		}else{
			return false;
		}
		
	}
	
	//-----------------------------------------------------

}
	
?>