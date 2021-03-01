<?php
class Companies_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function add($data){
		$this->db->insert('company',$data);
		return $this->db->affected_rows();
	}	

	public function addInUsers($data){
		$this->db->insert('users',$data);
		return $this->db->affected_rows();
	}

	public function update($data,$id){
		$this->db->where('company_id', $id);
		$this->db->update('company', $data);
		return $this->db->affected_rows();
	}

	public function updateUsers($data,$id){
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

	public function GetAll()
    {
		$wh =array();

		if($this->session->userdata('user_search_type')!=''){
			if($this->session->userdata('user_search_type')!='all'){
				$wh[]=" `deactive` = '".$this->session->userdata('user_search_type')."'";
			}
		}

		$SQL ='SELECT id,first_name,contact_no,username,email,deactive FROM users';


			$wh[]=" type = 'company'";
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		
    }

    public function getCompanyById($id){
    	$this->db->select('users.*,company.*,users.id as id');
		$this->db->from('company');
		$this->db->join('users', 'company.company_id = users.id ');
		$this->db->where('users.id',$id);
		return $this->db->get()->row_array();
    }

}//end of class