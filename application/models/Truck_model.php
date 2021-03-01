<?php
class Truck_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	function GetAll($id_login)
    {
		$wh =array();

		if($this->session->userdata('user_search_type')!=''){
			if($this->session->userdata('user_search_type')!='all'){
				$wh[]=" `deactive` = '".$this->session->userdata('user_search_type')."'";
			}
		}else{
			$wh[] =" `deactive` = '0' ";
		}
		
		$SQL ='SELECT * FROM truck';

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
	function insertTruck($data)
	{
		
		$this->db->insert('truck', $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//-----------------------------------------------------
	function getTruckByID($id)
	{
		return $this->db->get_where('truck', array(
			'id' => $id
		))->row_array();
	}
	//-----------------------------------------------------
	function updateTruck($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update('truck', $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
	
	//-----------------------------------------------------
	function deleteTruck($id)
	{

		$this->db->query("UPDATE `truck` SET `deactive` = '1' WHERE id='" . $id . "'");

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function excelSave($data){
		// var_dump($data);
		// die();
		for ($i=0; $i < count($data); $i++) {
			if($data[$i]['leased_owned'] == 'Owned'){
				$data[$i]['owner_leased'] = 'Own';
			}else{
				$data[$i]['owner_leased'] = 'Leased';
				$data[$i]['ownership_name'] = $data[$i]['leased_owned'];
			}
			unset($data[$i]['leased_owned']);
			/*Status*/
			if($data[$i]['status'] != 'COMPANY'){
				$driverId = get_from('driver_detail','id',['emp_license_no'=>$data[$i]['driver_license']]);
				if(!empty($driverId)){
					$data[$i]['owner'] = 'driver';
					$data[$i]['owner_name'] = $driverId;
				}else{
					$data[$i]['owner'] = 'other';
					$data[$i]['owner_name'] = $data[$i]['status'];
				}
				$data[$i]['status'] = 'OWNER';
			}else{
				$data[$i]['status'] = 'COMPANY';
			}
			unset($data[$i]['driver_license']);
			/*Status end*/
			$existTruck = get_from('truck','id,remark',['vin_no'=>$data[$i]['vin_no']]);
			$id = $existTruck['id'];
			/*Remarks*/
			$data[$i]['remark'] = $existTruck['remark'].','.$data[$i]['remark'];
			$data[$i]['remark'] = implode(',', array_unique(explode(',', $data[$i]['remark'])));

			/*Remarks End*/

			if($id !== null){
				$action = 'Update';
				$this->updateTruck($data[$i],$id);
			}else{
				$action = 'Add';
				$this->insertTruck($data[$i]);
			}
			// $driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$id]);
			// $data = [
			// 		'company_id'	=>	$this->get_company_id(),
			// 		'user_id'		=>	$this->get_user_id(),
			// 		'action_id'		=>	$id,
			// 		'action'		=>	$action.' through Excel File',
			// 		'action_on'		=>	implode(' ', $driver_name),
			// 		/*$driver_name['first_name'].' '.$driver_name['middle_name'].' '.$driver_name['last_name']*/
			// 		'action_place'	=>	'Driver',
			// ];
			// history($data);
		}
		return true;
	}

	function activeTruck($id)
	{

		$this->db->query("UPDATE `truck` SET `deactive` = '0' WHERE id='" . $id . "'");

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function getDriver($company_id)
	{

		$query = $this->db->query("SELECT  `id`,`first_name`,`middle_name`,`last_name` FROM `drivers` where company_id = '".$company_id."' AND `deactive` = '0' ");
    	return $query->result();
		
	}



	function gettruck($company_id)
	{

		$query = $this->db->query("SELECT  `id`,`unit_no` FROM `truck` where company_id = '".$company_id."' AND `deactive` = '0' ");
    	return $query->result();
		
		
	}


}
	
?>