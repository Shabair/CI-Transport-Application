<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-03-11 00:00:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`m' at line 29 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  (CASE dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 AND ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL) )
ERROR - 2018-03-11 00:00:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`m' at line 29 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  (CASE dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 AND ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL) )
ERROR - 2018-03-11 00:00:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`m' at line 29 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  (CASE dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 AND ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL) )
ERROR - 2018-03-11 00:00:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`m' at line 29 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  (CASE dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 AND ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL) )
ERROR - 2018-03-11 00:01:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`m' at line 29 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  (CASE dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date` END) 
				WHEN 'medical_expiry' THEN  (CASE d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 AND ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL) )
ERROR - 2018-03-11 07:50:56 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 07:50:57 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 07:50:57 --> 404 Page Not Found: Img/favicon.png
ERROR - 2018-03-11 08:01:24 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 08:01:25 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 08:03:16 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 08:03:16 --> 404 Page Not Found: Public/js
ERROR - 2018-03-11 10:18:44 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\controllers\Dashboard.php 257
ERROR - 2018-03-11 10:45:49 --> Severity: Error --> Call to a member function format() on a non-object C:\wamp\www\truck\application\helpers\custom_helper.php 381
ERROR - 2018-03-11 10:48:00 --> Severity: Error --> Call to a member function format() on a non-object C:\wamp\www\truck\application\helpers\custom_helper.php 381
ERROR - 2018-03-11 11:31:54 --> Severity: Notice --> Undefined variable: action_on_id C:\wamp\www\truck\application\controllers\Driver.php 147
ERROR - 2018-03-11 11:33:05 --> Severity: Notice --> Undefined variable: action_on_id C:\wamp\www\truck\application\controllers\Driver.php 147
ERROR - 2018-03-11 12:00:54 --> Severity: Error --> Call to undefined method stdClass::resut() C:\wamp\www\truck\application\core\MY_Controller.php 193
ERROR - 2018-03-11 12:01:02 --> Severity: Error --> Call to undefined method stdClass::resut() C:\wamp\www\truck\application\core\MY_Controller.php 193
ERROR - 2018-03-11 12:36:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Group by p.`action_on_id`' at line 59 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  
					(CASE 
						WHEN p.`completed_date` IS NOT NULL  THEN p.`completed_date`
						WHEN dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date`  
						ELSE null
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` ELSE p.`completed_date` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.emp_license_exp_date
						WHEN 'medical_expiry' 		THEN 	d1.medical_due
					END
					<= '2019-01-11' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL)) order by p.`id` ASC Group by p.`action_on_id`
ERROR - 2018-03-11 12:41:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by p.`id` DESC' at line 59 - Invalid query: SELECT 

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  
					(CASE 
						WHEN p.`completed_date` IS NOT NULL  THEN p.`completed_date`
						WHEN dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date`  
						ELSE null
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` ELSE p.`completed_date` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.`emp_license_exp_date`
						WHEN 'medical_expiry' 		THEN 	d1.`medical_due`
					END
					<= '2019-01-11' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL))  Group by p.`id`, order by p.`id` DESC
ERROR - 2018-03-11 12:50:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'p.`action_on_id`),

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_na' at line 1 - Invalid query: SELECT MAX(p.`id`,p.`action_on_id`),

			if(p.`p_type` = 'license',
				concat(IFNULL(d1.`first_name`,''),' ',IFNULL(concat(d1.`middle_name`,' '),''),IFNULL(d1.`last_name`,'')),
				if(p.`p_type` = 'annual_review',
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
			if(p.`p_type` = 'license' OR p.`p_type` = 'medical_expiry' OR p.`p_type` = 'annual_review',d1.`phonenumber`,'') as `phonenumber`,


			p.*,

			CASE p.`p_type`
				WHEN 'license' THEN  
					(CASE 
						WHEN p.`completed_date` IS NOT NULL  THEN p.`completed_date`
						WHEN dd.`emp_license_exp_date` > '2019-01-11' THEN dd.`emp_license_exp_date`  
						ELSE null
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '2019-01-11' THEN d1.`medical_due` ELSE p.`completed_date` END) 
				END



			as 'completed_date' 



				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.`emp_license_exp_date`
						WHEN 'medical_expiry' 		THEN 	d1.`medical_due`
					END
					<= '2019-01-11' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL)) AND p.`id` IN (
																							    SELECT MAX(p.`id`)
																							    FROM pending_works
																							    GROUP BY p.`action_on_id`
																							)  order by p.`id` DESC
