<?php 

class CronJob_model extends MY_Model{
	
	function __construct(){
		parent::__construct();
	}

	function add_pending_works($table,$result){
		// $table = "`".$table."`";
		
		
		foreach ($result as $data) {
			$fields = $values = $temp = array();
			$sql = '';
			foreach ($data as $field =>$value) {
				$fields[] = "`".$field."`";
				$values[] = "'".$value."'";
				$temp[] = '`'.$field.'` = \''.$value.'\'';
			}
			
			$sql = "INSERT INTO ".$table." (".implode(',',$fields).") SELECT * FROM (SELECT ".implode(",",$values)." ) AS tmp WHERE NOT EXISTS ( SELECT id FROM ".$table." WHERE ".implode(" AND ", $temp)." ) LIMIT 1";
			$this->db->query($sql);
		}
	}


	function add_sapof_followup($where,$data){
		// $table = "`".$table."`";
			$existId = get_from('extra_data','id',$where);
			$where['id'] = null;
			if($existId){
				$where['id'] = $existId;
			}
			$where['tbl_val'] = $data;
			extra_data($where);
			// $fields = $values = $temp = array();

			// foreach ($where as $field =>$value) {
			// 	$fields[] = "`".$field."`";
			// 	$values[] = "'".$value."'";
			// 	$temp[] = '`'.$field.'` = \''.$value.'\'';
			// }
			
			//$sql = "INSERT INTO `extra_data` (".implode(',',$fields).",tbl_val) SELECT * FROM (SELECT ".implode(",",$values).",'".$data."' ) AS tmp WHERE NOT EXISTS ( SELECT id FROM `extra_data` WHERE ".implode(" AND ", $temp)." ) LIMIT 1";
			// $this->db->query($sql);
			// echo $this->db->last_query();

	}
	/*

			foreach($result as $data){
				extract($data);
				$sql = "INSERT INTO `pending_works` (`p_type`, `action_on_id`, `expiry_date`,`company_id`) SELECT * FROM (SELECT '".$p_type."', '".$action_on_id."', '".$expiry_date."', '".$company_id."') AS tmp WHERE NOT EXISTS ( SELECT id FROM pending_works WHERE `p_type` = '".$p_type."' AND `action_on_id` = '".$action_on_id."' AND `expiry_date` = '".$expiry_date."' AND `company_id` = '".$company_id."') LIMIT 1";
				echo $sql."<br />";
				$this->db->query($sql);
			}



	*/
	function get_pending_license(){
		//$current_date = date('Y-m-d',strtotime("+1 months", strtotime(date('m/d/Y'))));
		$sql = "SELECT 'license' as 'p_type',a.`id` as 'action_on_id',a.`company_id` as 'company_id',b.`emp_license_exp_date` as 'expiry_date' from drivers as a ,`driver_detail` as b where (b.`driver_id` = a.`id`) AND b.`emp_license_exp_date`<= '".$this->currentWith1Mth."' " ;
		$result = $this->db->query($sql)->result_array();
		return (count($result))?$result:false;
	}

	function get_pending_medical(){
		$sql = "SELECT 'medical_expiry' as 'p_type',a.`id` as 'action_on_id',a.`company_id` as 'company_id',a.`medical_due` as 'expiry_date' from drivers as a  where  a.`medical_due`<= '".$this->currentWith1Mth."' " ;
		$result = $this->db->query($sql)->result_array();
		return (count($result))?$result:false;
	}

	function get_pending_truck_annual(){
		$sql = "SELECT if(a.`status` = 'COMPANY','Company',(if(a.`owner` = 'driver',CONCAT(b.`first_name`,' ',b.`middle_name`,' ',b.`last_name`),a.`owner_name`))) as `o_op_name`,'truck_annual_due' as 'p_type',a.`id` as 'action_on_id',a.`company_id` as 'company_id',a.`annual_safety_due` as 'expiry_date' from `truck` as a left join drivers as b on (a.`owner_name` = b.`id`) where a.`annual_safety_due`<= '".$this->currentWith1Mth."' ";
			
		$result = $this->db->query($sql)->result_array();
		return (count($result))?$result:false;
	}

	function get_pending_trailer_annual(){
		$sql = "SELECT if(a.`status` = 'COMPANY','Company',a.`owner_name`) as `o_op_name`,'trailer_annual_due' as 'p_type',a.`id` as 'action_on_id',a.`company_id` as 'company_id',a.`annual_safety_due` as 'expiry_date' from `trailer` as a where a.`annual_safety_due`<= '".$this->currentWith1Mth."' ";
			
		$result = $this->db->query($sql)->result_array();
		return (count($result))?$result:false;
	}

	function get_pending_driver_annual_review(){
		$CRNTdate = new DateTime(date('Y-m-d'));//date('Y-m-d')
	    $CRNTdate->add(new DateInterval('P1M'));
	    $currentWith1Mth = $CRNTdate->format('Y-m-d');
		
		$this->db->select("drivers.id as action_on_id ,'driver_annual_review' as p_type,drivers.company_id as company_id,if(driver_experience.last_annual_review_date = '',drivers.application_date,driver_experience.last_annual_review_date) as expiry_date ");
		$this->db->from('drivers');
		$this->db->join('driver_experience', 'drivers.id = driver_experience.driver_id');
		$this->db->where("if(driver_experience.last_annual_review_date = '',drivers.application_date,driver_experience.last_annual_review_date) <=",$this->currentWith1Mth);
		$result = $this->db->get()->result_array();

		return (count($result))?$result:false;
	}


}