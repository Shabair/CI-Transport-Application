<?php
class Users_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	public function insert($data){
		$this->db->insert('users',$data);
		return $this->db->affected_rows();
	}	

	public function update($data,$id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return $this->db->affected_rows();
	}

	public function activate($id){
		$this->db->where('id', $id);
		$this->db->update('users', ['deactive'=>'0']);
		return $this->db->affected_rows();
	}


	public function delete($id){
		$this->db->update('users', ['deactive'=>'1'], "id = '".$id."'");
		return $this->db->affected_rows();
	}

	public function GetAll($id_login)
    {
		$wh =array();

		if($this->session->userdata('user_search_type')!=''){
			if($this->session->userdata('user_search_type')!='all'){
				$wh[]=" `deactive` = '".$this->session->userdata('user_search_type')."'";
			}
		}

		$SQL ='SELECT id,first_name,middle_name,last_name,username,email,deactive FROM users';

		if($id_login != '')
		{
			$wh[]=" company_id = '".$id_login."'";
			$wh[]=" type = 'user'";			
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
    }


    public function getUserById($id = 0){
    	$this->db->where('id',$id);
    	return $this->db->get('users')->row_array();
    }

}//end of class