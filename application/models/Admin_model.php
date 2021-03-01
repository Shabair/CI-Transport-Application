<?php
class Admin_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	//-----------------------------------------------------
	function login($data)
	{
		$result = $this->db->select('id, first_name, last_name, email, password')->where('email', $data['email'])->where('password', $data['password'])->get('admin');
		
		if ($result->num_rows() == 1) {
			return $result->row_array();
		} else {
			return false;
		}
	}
	//-----------------------------------------------------
	function getUserEducation($user_id)
	{
		$result = $this->db->get_where('education', array(
			'user_id' => $user_id
		));
		
		if ($result->num_rows() > 0) {
			
			return $result->result_array();
		} else {
			
			return false;
		}
	}
	//-----------------------------------------------------
	function getUserExperience($user_id)
	{
		$result = $this->db->get_where('experience', array(
			'user_id' => $user_id
		));
		
		if ($result->num_rows() > 0) {
			
			return $result->result_array();
		} else {
			
			return false;
		}
	}
	//-----------------------------------------------------
	function getUserById($user_id)
	{
		return $this->db->get_where('users', array(
			'user_id' => $user_id
		))->row();
	}
	//-----------------------------------------------------
	function insertActivityLog($data)
	{
		$this->db->insert('user_activity_log', $data);
		
	}
	//-----------------------------------------------------
	function getUserActivityLog($user_id)
	{
		$query = $this->db->select('*')->from('user_activity_log')->where('user_id', $user_id)->get();
		
		return $query->result_array();
		
		
	}
	//-----------------------------------------------------
	function insertService($data)
	{
		
		$this->db->insert('user_services', $data);
		
	}
	//-----------------------------------------------------
	function getUserService($user_id)
	{
		
		$query = $this->db->select('plan_id')->from('user_services')->where('user_id', $user_id)->get();
		
		if ($query->num_rows() > 0) {
			$plan_id = $query->result_array(); // get the plan id form the user services table
			
			foreach ($plan_id as $id) {
				$this->db->where('plan_id', $id['plan_id']); // get the plan detail again the plan id
				$query          = $this->db->get('plans');
				$plan_details[] = $query->row_array();
				
			}
			
			return $plan_details;
			
		}
		
		else {
			return false;
		}		
	}
	//-----------------------------------------------------
	function getPaypalPaymentDetail($user_id)
	{
		$this->db->select('*');
		$this->db->from('paypal_transection');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	
	//-----------------------------------------------------
	// check user payment exist or not
	function checkPaymentExist()
    {
		$this->db->from('invoice_detail');
		$this->db->where('customer_id',$this->input->post('user_id'));
		$query=$this->db->get();
		if($query->num_rows() >0)
			return true;
		else 
	    	return false;
    }
	
	
	
	
	
	
	//-----------------------------------------------------
	//Payment By ID
	function getPaymentByID($id){
		
		$this->db->select('invoice_detail.id, invoice_detail.invoice_no, invoice_detail.service_id, invoice_detail.service, invoice_detail.amount, invoice_detail.method, invoice_detail.payment_status, invoice_detail.total, invoice_detail.discount, invoice_detail.date, users.first_name, users.last_name, users.email, users.city, users.country');
		$this->db->from('invoice_detail');
		$this->db->join('users','users.user_id=invoice_detail.customer_id','Left');	
		$this->db->where('invoice_detail.customer_id' , $id);
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}		
	}//Payment By ID END...
	
	//-----------------------------------------------------
	function deleteUser($id)
	{
		$this->db->query("DELETE FROM `users` WHERE user_id=" . $id . "");
		return 1;
	}
	//-----------------------------------------------------
	function insert_user($data)
	{
		return $this->db->insert('users', $data);
	}
}
?>