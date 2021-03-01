<?php
class Company_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	function login($data)
	{
		$result = $this->db->select('id, first_name, username , type, company_id')->where('username', $data['username'])->where('password', md5($data['password']))->where('deactive','0')->get('users');
		
		if ($result->num_rows() == 1) {

			return $result->row_array();
		} else{

			return false;
		}

	}
	//-----------------------------------------------------
	function GetAll()
    {
		$wh =array();
		// if($this->session->userdata('user_search_type')!=NULL)
		// 	$wh[]=" user_status = '".$this->session->userdata('user_search_type')."'";
		if($this->session->userdata('user_search_from')!='')
			$wh[]=" `created_date` >= '".date('Y-m-d', strtotime($this->session->userdata('user_search_from')))."'";
		if($this->session->userdata('user_search_to')!='')
			$wh[]=" `created_date` <= '".date('Y-m-d', strtotime($this->session->userdata('user_search_to')))."'";
		
		$SQL ='SELECT * FROM company';
		if(count($wh)>0)
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
	function insertCompany($data)
	{
		return $this->db->insert('company', $data);
	}
	//-----------------------------------------------------
	function insertrole($data)
	{
		return $this->db->insert('role', $data);
	}
	
	//-----------------------------------------------------
	function getCompanyByID($id)
	{
		$this->db->select('users.*,company.*');
		$this->db->join('company', 'users.id = company.company_id');
		$this->db->where('users.id',$id);
		return $this->db->get('users')->row_array();

		return $this->db->get_where('company', array(
			'id' => $id
		))->row_array();
	}
	//-----------------------------------------------------
	function updateCompany($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update('company', $data);
		
		return 1;
		
	}
	
	//-----------------------------------------------------
	function activeCompany($data,$id)
	{
		$this->db->query("UPDATE company SET active_inactive='active' WHERE id=" . $id . "");
		return $this->db->insert('role', $data);
	}
	//-----------------------------------------------------
	function inactiveCompany($data,$id)
	{
		$this->db->query("UPDATE company SET active_inactive='inactive' WHERE id=" . $id . "");
		return $this->db->insert('role', $data);
	}

}
	
?>