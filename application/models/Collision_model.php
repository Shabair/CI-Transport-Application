<?php
class Collision_model extends MY_Model
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

		$SQL ='SELECT * FROM collision';

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
	function insertcollision($data)
	{
		$this->db->insert('collision', $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//-----------------------------------------------------
	function getcollisionByID($id)
	{
		return $this->db->get_where('collision', array(
			'id' => $id
		))->row_array();
	}
	//-----------------------------------------------------
	function updatecollision($data, $id){

		$this->db->where('id', $id);
		$this->db->update('collision', $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	//-----------------------------------------------------

}

?>
