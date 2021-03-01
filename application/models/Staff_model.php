<?php
	
	
	class Staff_Model extends CI_Model
	{
		
		
		//get all the staff detail
		function getStaffDetail()
		{
			$query= $this->db->get('admin1');
			return $query->result_array();
							
		}
		
		
		
		// get staff detail by ID
		function getStaffDetailById($id)
		{
			$result=  $this->db->get_where('admin1', array('id' => $id));
			
			if($result->num_rows() > 0){
				
				return $result->result_array();
			}
			else{
				
				return false;
			}
		}
		
		
		// get staff roles
		function getStaffRoles(){
			
			$query= $this->db->get('roles');
			return $query->result_array();
		}
		
		//get staff permissions
		function getStaffPermissions()
		{
			$query= $this->db->get('permissions');
			return $query->result_array();
			
		}
		
		// insert staff detail
		function insertStaffDetail($staffData){
			
			return $this->db->insert('admin1', $staffData);
			echo $this->db->last_query();
		}
		
		//update staff detail
		function updateStaffDetail($staffData, $id){
			
			$this->db->where('id', $id);
			return $this->db->update('admin1', $staffData);
			
			echo $this->db->last_query();
		}
		
		
		// get total posted jobs by id
		function getTotalPostedJobsById($id){
			$this->db->where('admin_id', $id);
			$this->db->from('employer_job_post');
			return $this->db->count_all_results();	
		}
		
		// get total pending jobs by id
		function getPendingJobsById($id){
			$this->db->where('admin_id', $id);
			$this->db->where('status', 'pending');
			$this->db->from('employer_job_post');
			return $this->db->count_all_results();
		}
		
		// get approved jobs by id
		function getApprovedJobsById($id){
			$this->db->where('admin_id', $id);
			$this->db->where('status', 'approved');
			$this->db->from('employer_job_post');
			return $this->db->count_all_results();
			
		}
		
		// get Decliend Jobs by id
		function getDecliendJobsById($id){
			$this->db->where('admin_id', $id);
			$this->db->where('status', 'disabled');
			$this->db->from('employer_job_post');
			return $this->db->count_all_results();
		}
		
		
		
                
		function getSearchedUsers($start_date, $end_date)
		{
			$this->db->from(users);
			$this->db->where('date >=', $start_date);
			$this->db->where('date <=', $end_date);
			$this->db->order_by("user_id", "desc");
			$query = $this->db->get(); 
			return $query->result();
					
		}
		
		
		
		
		
		
	}
?>