<?php
class Citation_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
		//-----------------------------------------------------
	function GetAll($id_login)
    {
		$wh =array();
		
		if($this->session->userdata('user_search_type')!=''){
			if($this->session->userdata('user_search_type')!='all'){
				$wh[]=" `cita_loc` = '".$this->session->userdata('user_search_type')."'";
			}
		}

		$SQL ='SELECT * FROM citation';
		
		if($id_login != '')
		{
			$wh[]=" company_id = '".$id_login."'";
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
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
	function insert($data)
	{
		$this->db->insert('citation', $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//-----------------------------------------------------
	function getCitationByID($id)
	{
		return $this->db->get_where('citation', array(
			'id' => $id
		))->row_array();
	}
	//-----------------------------------------------------
	function update($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update('citation', $data);
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}

	//-----------------------------------------------------
	function count($table = 'citation'){
		$CI = &get_instance();
		/*City Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->from($table);
		$AllDrivers['all']=$CI->db->count_all_results();
		/*Long  Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('cita_loc', 'can');
		$CI->db->from($table);
		$AllDrivers['can']=$CI->db->count_all_results();
		/*City Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('cita_loc', 'us');
		$CI->db->from($table);
		$AllDrivers['us']=$CI->db->count_all_results();

		return $AllDrivers;
	}
	//-----------------------------------------------------
	
}
	
?>