<?php
class Driver_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//-----------------------------------------------------
	function GetAll($id_login)
    {
		$wh =array();
		
		switch ($this->session->userdata('activation_status')) {
			case '0':
				$wh[] =" `deactive` = '0' ";
				$wh[] ="(`is_proved` IS NULL OR `is_proved` = '1')";
				break;

			case '1':
				$wh[]=" `deactive` = '1'";
				break;

			case 'is_proved':
				$wh[]=" `is_proved` = '0'";
				break;
			
		}
		if($this->session->userdata('user_search_type')!='')
			$wh[]=" position_applied = '".$this->session->userdata('user_search_type')."'";
		if($this->session->userdata('user_search_from')!='')
			$wh[]=" `created_date` >= '".date('Y/m/d', strtotime($this->session->userdata('user_search_from')))."'";
		if($this->session->userdata('user_search_to')!='')
			$wh[]=" `created_date` <= '".date('Y/m/d', strtotime($this->session->userdata('user_search_to')))."'";
		
		$SQL ='SELECT * FROM drivers';
		if($id_login != '')
		{
			$wh[]=" company_id = '".$id_login."'";
			$WHERE = implode(' and ',$wh);
			// die($WHERE);

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
	function count($table= ''){
		$CI = &get_instance();
		$AllDrivers = parent::count('drivers');
		/*City Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('position_applied', 'long_haul');
		$CI->db->from($table);
		$AllDrivers['long_haul']=$CI->db->count_all_results();
		/*Long  Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('position_applied', 'owner_operator');
		$CI->db->from($table);
		$AllDrivers['owner_operator']=$CI->db->count_all_results();
		/*City Items*/
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('position_applied', 'driver_of_owner');
		$CI->db->from($table);
		$AllDrivers['driver_of_owner']=$CI->db->count_all_results();
		/*Owner Operator */
		$CI->db->where('company_id', $CI->get_company_id());
		$CI->db->where('position_applied', 'local');
		$CI->db->from($table);
		$AllDrivers['local']=$CI->db->count_all_results();
		return $AllDrivers;
	}
	//-----------------------------------------------------

    function excelDriverSave($data){
    	$CI = &get_instance();
    	// var_dump($data);
    	// die();
    	foreach ($data as $key => $value) {
			$driver_detail[] = [
				'emp_license_no' =>  isset($value['emp_license_no'])?$value['emp_license_no']:null,
				'emp_license_state' =>  isset($value['emp_license_state'])?$value['emp_license_state']:null,
				'emp_license_exp_date' =>  isset($value['emp_license_exp_date'])?$value['emp_license_exp_date']:null,
				'emp_license_class' =>  isset($value['emp_license_class'])?$value['emp_license_class']:null,
				'contract_date' =>  isset($value['contract_date'])?$value['contract_date']:null,
				'incorporation_name' =>  isset($value['incorporation_name'])?$value['incorporation_name']:null,
				'h_s_t' =>  isset($value['h_s_t'])?$value['h_s_t']:null,
				'p_s_p' =>  isset($value['p_s_p'])?$value['p_s_p']:null,
				'criminal_record_date' =>  isset($value['criminal_record_date'])?$value['criminal_record_date']:null,
			];

			$driver_experience[] = [
				
				'last_annual_review_date' =>  isset($value['last_annual_review_date'])?$value['last_annual_review_date']:null,
			];

			if(isset($value['last_annual_review_date'])){

				unset($value['last_annual_review_date']);
			}
			if(isset($value['emp_license_no'])){

				unset($value['emp_license_no']);
			}
			if(isset($value['emp_license_state'])){

				unset($value['emp_license_state']);
			}
			if(isset($value['emp_license_exp_date'])){

				unset($value['emp_license_exp_date']);
			}
			if(isset($value['emp_license_class'])){

				unset($value['emp_license_class']);
			}
			if(isset($value['contract_date'])){

				unset($value['contract_date']);
			}
			if(isset($value['incorporation_name'])){

				unset($value['incorporation_name']);
			}
			if(isset($value['h_s_t'])){

				unset($value['h_s_t']);
			}
			if(isset($value['p_s_p'])){
				unset($value['p_s_p']);
			}
			if(isset($value['criminal_record_date'])){
				unset($value['criminal_record_date']);
			}
			if(isset($value['position_applied'])){
                            
                switch ($value['position_applied']){
                    case 'City':
                        $value['position_applied'] = 'local';
                        break;
                    case 'Owner Operator':
                        $value['position_applied'] = 'owner_operator';
                        break;
                    case 'Driver for':
                        $value['position_applied'] = 'driver_of_owner';
                        break;
                    default :
                        $value['position_applied'] = 'long_haul';
                        break;
                }
			}
                        /*
			if(empty($value['sin'])){
				$value['sin'] = null;
			}*/
			if(!empty($value['email']) && !filter_var($value['email'],FILTER_VALIDATE_EMAIL)){
				return 'Invalid Email of '.$value['first_name'].' '.$value['middle_name'].' '.$value['last_name'];
			}
			$drivers[] = $value;
		}
		// var_dump($drivers);die();
		for ($i=0; $i < count($drivers); $i++) {
			// $id = get_from('drivers','id',['sin'=>$drivers[$i]['sin']]);
			/*Select driver on the base of license or sin no*/
				$this->db->select('drivers.id as id ')
					->from('drivers')
					->join('driver_detail','drivers.id = driver_detail.driver_id');
					
					if(!empty($driver_detail[$i]['emp_license_no'])){
						$this->db->where('driver_detail.emp_license_no',$driver_detail[$i]['emp_license_no'])->where('driver_detail.emp_license_no !=',null);
					}
					
					if(!empty($drivers[$i]['sin'])){
						$this->db->or_where('drivers.sin',$drivers[$i]['sin'])->where('drivers.sin !=',null);
					}
				/*if both license and sin not given*/	
					if(empty($drivers[$i]['sin']) && empty($driver_detail[$i]['emp_license_no'])){
						return 'Sin No Or License No Required.';
					}
				/*if both license and sin not given end*/

				$id =$this->db->limit(1)->get();
			/*Select driver on the base of license or sin no end*/
			if($id->num_rows() == 0){

				$id = null;
			}else{
				$id = $id->row()->id;
			}
			if($id !== null){

				$action = 'Update';
				$this->updateinsertDriver($drivers[$i],$id);
				$this->updateinsertDriverDetail($driver_detail[$i],$id);
				$this->updateinserDriverExperience($driver_experience[$i],$id);
			}else{
				$action = 'Add';
				$drivers[$i]['created_date'] = date('Y/m/d');
				$this->insertDriver($drivers[$i]);
				$driver_detail[$i]['driver_id'] = $id =$this->db->insert_id();
				$driver_detail[$i]['id'] = $id =$this->db->insert_id();
				$this->insertDriverDetail($driver_detail[$i]);
				$this->insertEmployerHistory(['driver_id'=>$id,'id'=>$id]);
				$driver_experience[$i]['driver_id'] = $id ;
				$driver_experience[$i]['id'] = $id ;
				$this->inserDriverExperience($driver_experience[$i]);
			}
			$driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$id]);
			$data = [
					'company_id'	=>	$CI->get_company_id(),
					'user_id'		=>	$CI->get_user_id(),
					'action_id'		=>	$id,
					'action'		=>	$action.' through Excel File',
					'action_on'		=>	implode(' ', $driver_name),
					/*$driver_name['first_name'].' '.$driver_name['middle_name'].' '.$driver_name['last_name']*/
					'action_place'	=>	'Driver',
			];
			history($data);
		}

		return true;
    }

	function getDriver($company_id = NULL)
	{
		if($company_id == 1){
			$query = $this->db->query("SELECT  `id`,`first_name`,`middle_name`,`last_name` FROM drivers where `deactive` = '0'");
        	return $query->result();
		}else{
			$query = $this->db->query("SELECT  `id`,`first_name`,`middle_name`,`last_name` FROM `drivers` where company_id = '".$company_id."' AND `deactive` = '0' ");
        	return $query->result();
		}
	}

	function getDriverName($id){
		$result = $this->db->query("SELECT `first_name`,`middle_name`,`last_name` From `drivers` WHERE id='".$id."'");
		if($result->num_rows() > 0){
			$result =$result->row();
		return $result->first_name.' '.$result->middle_name.' '.$result->last_name;
		}
	}

	function isDriverActive($id){
		$result = $this->db->query("SELECT `id` From `drivers` WHERE id='".$id."' AND `deactive` = '0'  ");
		
		if($result->num_rows() > 0){
			return true;
		}

		return false;
	}

	
	//-----------------------------------------------------

	function insertDriver($data)
	{
		return $this->db->insert('drivers', $data);
	}

	function insertDriverDetail($data)
	{
		return $this->db->insert('driver_detail', $data);
	}

	function insertEmployerHistory($data)
	{
		return $this->db->insert('employer_history', $data);
	}

	function inserDriverExperience($data)
	{
		return $this->db->insert('driver_experience', $data);
	}


	//-----------------------------------------------------
	//-----------------------------------------------------
	function updateinsertDriver($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('drivers', $data);
	}

	function updateinsertDriverDetail($data,$id)
	{
		$this->db->where('driver_id',$id);
		return $this->db->update('driver_detail', $data);
	}

	function updateinsertEmployerHistory($data,$id)
	{
		$this->db->where('driver_id',$id);
		return $this->db->update('employer_history', $data);
	}

	function updateinserDriverExperience($data,$id)
	{
		$this->db->where('driver_id',$id);
		return $this->db->update('driver_experience', $data);
	}



	//-----------------------------------------------------

	function get_drivers($column,$table,$where = NULL){

		if($where != NULL){
			$query = $this->db->select($column)
							  ->where($where)
							  ->get($table);
		}
		else{
			$query = $this->db->select($column)
							  ->get($table);
		}
		return $query->result();
	}

	//-----------------------------------------------------
	function getDriverByID($id)
	{
		return $this->db->get_where('drivers', array(
			'id' => $id
		))->row_array();
	}

	// function getDriverData($id){
	// 	$sql = "SELECT a.*,':',b.*,':',c.*,':',d.*,':',a.`id` as 'id' FROM `drivers` as a,`driver_detail` as b,`driver_experience` as c,`employer_history` as d where b.`driver_id` = a.`id` and c.`driver_id`=a.`id` and d.`driver_id` = a.`id` and a.`id` ='" .$id."'";
	// 	// return $this->db->query($sql)->row_array();
	// 	return $this->db->query($sql);
	// }

	function getDriverData($id){
		
		$this->db->select('*,drivers.id as id');
		$this->db->from('drivers');
		$this->db->join('driver_detail', 'drivers.id = driver_detail.driver_id');
		$this->db->join('driver_experience', 'drivers.id = driver_experience.driver_id');
		$this->db->join('employer_history', 'drivers.id = employer_history.driver_id');
		$this->db->where('drivers.id',$id);
		// return $this->db->query($sql)->row_array();

		return $this->db->get();
	}
	//-----------------------------------------------------
	function updateDriver($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update('drivers', $data);
		
		return 1;
		
	}
	
	//-----------------------------------------------------

	function deleteDriver($id){
		$this->db->query("UPDATE `drivers` SET `deactive` = '1' WHERE id='" . $id . "'");

		return 1;
	}

	function activeDriver($id)
	{

		$this->db->query("UPDATE `drivers` SET `deactive` = '0' WHERE id='" . $id . "'");

		return 1;
	}

	function Insertfiles($data,$id){
		$this->db->where('driver_id', $id);
		$this->db->update('driver_experience', $data);
		
		return 1;
	}

}
	
?>