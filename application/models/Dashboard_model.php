<?php

	class Dashboard_model extends MY_Model
	{
		public $CI = NULL;
		function __construct(){
			parent::__construct();
		}
		
		function getTotalComapnys($Which_login)
		{
			if($Which_login == "admin")
			{
				return $this->db->count_all('company');	
			}
						
		}

		function getTotalDrivers($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('drivers');
			return $this->db->count_all_results();
		}

		function getTotalTrucks($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('truck');
			return $this->db->count_all_results();
						
		}

		function getTotalTrailers($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('trailer');
			return $this->db->count_all_results();
					
		}

		function getTotalInspections($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('inspection');
			return $this->db->count_all_results();
						
		}

		function getTotalCitations($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('citation');
			return $this->db->count_all_results();			
		}
		
		function getTotalCollisions($id_login)
		{
			$this->db->where('company_id', $id_login);
			$this->db->from('collision');
			return $this->db->count_all_results();			
		}
		//-----------------------------------------------------
		function insertrating($data)
		{
			return $this->db->insert('rating', $data);
		}
		//-----------------------------------------------------
		function getRatingByID($id)
		{
			return $this->db->get_where('rating', array(
				'company_id' => $id
			))->row_array();
		}	
		//-----------------------------------------------------
		function updaterating($data, $id){
			
			$this->db->where('company_id', $id);
			$this->db->update('rating', $data);
			
			return 1;
			
		}
		//-----------------------------------------------------
		function pending_works($set,$where){
			$this->db->set($set);
			$this->db->where($where);
			$this->db->update('pending_works');

			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		//-----------------------------------------------------

		function get_pending_works($company){

			$sql = "SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'driver_annual_review',
					concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
					if(p.`p_type` = 'medical_expiry',
						concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
						if(p.`p_type` = 'truck_annual_due',
							tk.`unit_no`,
							if(p.`p_type` = 'trailer_annual_due',
								tr.`unit_no`,
								if(p.`p_type` = 'drug_test',
									NULL,
									NULL
								)
							)
						)
					)
				) 
			)
			as `name_of_action`,
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'driver_annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  
					(CASE 
						WHEN  dd.`emp_license_exp_date` > '$this->currentWith1Mth' THEN dd.`emp_license_exp_date`
						ELSE p.`completed_date`
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '$this->currentWith1Mth' THEN d1.`medical_due` ELSE p.`completed_date` END)
				WHEN 'driver_annual_review' THEN  (CASE  WHEN dex.`last_annual_review_date` > '$this->currentWith1Mth' THEN dex.`last_annual_review_date` ELSE p.`completed_date` END) 
				WHEN 'truck_annual_due' THEN  (CASE  WHEN tk.`annual_safety_due` > '$this->currentWith1Mth' THEN tk.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'trailer_annual_due' THEN  (CASE  WHEN tr.`annual_safety_due` > '$this->currentWith1Mth' THEN tr.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'drug_test' THEN  p.`completed_date` 
				END

			as 'completed_date' 


				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN driver_experience as dex ON(p.`action_on_id` = dex.`id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = '$company') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.`emp_license_exp_date`
						WHEN 'medical_expiry' 		THEN 	d1.`medical_due`
						WHEN 'truck_annual_due' 		THEN 	tk.`annual_safety_due`
						WHEN 'trailer_annual_due' 		THEN 	tr.`annual_safety_due`
					END
					<= '$this->currentWith1Mth' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL)) AND p.`id` IN (
																							    SELECT MAX(pp.`id`)
																							    FROM pending_works as pp
																							    GROUP BY pp.`action_on_id`,pp.`p_type`
																							)  order by p.`id` DESC";

			return $this->db->query($sql)->result_array();
		}

		//-----------------------------------------------------

		function get_graph_data($company_id){
			$data = $this->db->select('date,value')->where('company_id',$company_id)->order_by('date', 'ASC')->get('graph')->result_array();
			return $data;

		}
					
	}
?>