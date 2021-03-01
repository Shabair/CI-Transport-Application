<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-04 07:04:34 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 07:49:17 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 07:49:20 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 07:50:54 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 08:38:25 --> Severity: Notice --> Undefined property: stdClass::$current_quarter C:\wamp\www\truck\application\models\CronJob_model.php 81
ERROR - 2018-04-04 08:39:34 --> Severity: Notice --> Undefined property: stdClass::$current_quarter C:\wamp\www\truck\application\controllers\Cronjobs.php 37
ERROR - 2018-04-04 08:40:16 --> Severity: Notice --> Undefined property: stdClass::$current_quarter C:\wamp\www\truck\application\controllers\Cronjobs.php 37
ERROR - 2018-04-04 09:12:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') 
				END

			as 'completed_date' 


				FROM pending_works as p 
					LEFT JOI' at line 39 - Invalid query: SELECT 

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
						WHEN  dd.`emp_license_exp_date` > '2018-05-04' THEN dd.`emp_license_exp_date`
						ELSE p.`completed_date`
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '2018-05-04' THEN d1.`medical_due` ELSE p.`completed_date` END)
				WHEN 'driver_annual_review' THEN  (CASE  WHEN dex.`last_annual_review_date` > '2018-05-04' THEN dex.`last_annual_review_date` ELSE p.`completed_date` END) 
				WHEN 'truck_annual_due' THEN  (CASE  WHEN tk.`annual_safety_due` > '2018-05-04' THEN tk.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'trailer_annual_due' THEN  (CASE  WHEN tr.`annual_safety_due` > '2018-05-04' THEN tr.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'drug_test' THEN  p.`completed_date` END) 
				END

			as 'completed_date' 


				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN driver_experience as dex ON(p.`action_on_id` = dex.`id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.`emp_license_exp_date`
						WHEN 'medical_expiry' 		THEN 	d1.`medical_due`
					END
					<= '2018-05-04' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL)) AND p.`id` IN (
																							    SELECT MAX(pp.`id`)
																							    FROM pending_works as pp
																							    GROUP BY pp.`action_on_id`,pp.`p_type`
																							)  order by p.`id` DESC
ERROR - 2018-04-04 09:13:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as 'completed_date' 


				FROM pending_works as p 
					LEFT JOIN drivers as d1' at line 42 - Invalid query: SELECT 

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
						WHEN  dd.`emp_license_exp_date` > '2018-05-04' THEN dd.`emp_license_exp_date`
						ELSE p.`completed_date`
						END
					) 
				WHEN 'medical_expiry' THEN  (CASE  WHEN d1.`medical_due` > '2018-05-04' THEN d1.`medical_due` ELSE p.`completed_date` END)
				WHEN 'driver_annual_review' THEN  (CASE  WHEN dex.`last_annual_review_date` > '2018-05-04' THEN dex.`last_annual_review_date` ELSE p.`completed_date` END) 
				WHEN 'truck_annual_due' THEN  (CASE  WHEN tk.`annual_safety_due` > '2018-05-04' THEN tk.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'trailer_annual_due' THEN  (CASE  WHEN tr.`annual_safety_due` > '2018-05-04' THEN tr.`annual_safety_due` ELSE p.`completed_date` END) 
				WHEN 'drug_test' THEN  p.`completed_date` END 
				END

			as 'completed_date' 


				FROM pending_works as p 
					LEFT JOIN drivers as d1 ON(p.`action_on_id` = d1.`id`)
					LEFT JOIN driver_detail as dd ON(p.`action_on_id` = dd.`driver_id`)
					LEFT JOIN driver_experience as dex ON(p.`action_on_id` = dex.`id`)
					LEFT JOIN truck as tk ON(p.`action_on_id` = tk.`id`)
					LEFT JOIN trailer as tr ON(p.`action_on_id` = tr.`id`)

				WHERE (p.`company_id` = 'J1VVIQ2') AND ((
					
					CASE p.`p_type`
						WHEN 'license' 				THEN 	dd.`emp_license_exp_date`
						WHEN 'medical_expiry' 		THEN 	d1.`medical_due`
					END
					<= '2018-05-04' )

				 OR ( p.`is_completed` != 'yes' OR p.`is_completed` is NULL)) AND p.`id` IN (
																							    SELECT MAX(pp.`id`)
																							    FROM pending_works as pp
																							    GROUP BY pp.`action_on_id`,pp.`p_type`
																							)  order by p.`id` DESC
ERROR - 2018-04-04 10:21:04 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1012
ERROR - 2018-04-04 10:21:39 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1013
ERROR - 2018-04-04 10:21:59 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1014
ERROR - 2018-04-04 10:26:46 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1540
ERROR - 2018-04-04 10:27:06 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1539
ERROR - 2018-04-04 10:29:07 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 10:37:10 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1005
ERROR - 2018-04-04 10:37:10 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:37:10 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:40:26 --> Severity: Parsing Error --> syntax error, unexpected ')', expecting ',' or ';' C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1018
ERROR - 2018-04-04 10:41:02 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1005
ERROR - 2018-04-04 10:41:02 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:41:02 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:41:15 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1005
ERROR - 2018-04-04 10:41:15 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:41:15 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:41:22 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1005
ERROR - 2018-04-04 10:41:22 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:41:22 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:12 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:13 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:14 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:14 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:19 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:42:19 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 10:44:21 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:21 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:21 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:21 --> Severity: Notice --> Undefined offset: 3 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:44 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:44 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:44 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:44 --> Severity: Notice --> Undefined offset: 3 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:44:50 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 10:46:24 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:46:24 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:46:24 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 10:46:24 --> Severity: Notice --> Undefined offset: 3 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1024
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1526
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1527
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1529
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1537
ERROR - 2018-04-04 11:05:47 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1545
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1526
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1527
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1529
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1530
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1537
ERROR - 2018-04-04 11:05:59 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1545
ERROR - 2018-04-04 11:07:21 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1627
ERROR - 2018-04-04 11:07:23 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1627
ERROR - 2018-04-04 11:15:28 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 11:15:28 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 11:15:35 --> Severity: Notice --> Undefined property: Dashboard::$driver_model C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 11:15:36 --> Severity: Error --> Call to a member function getDriverName() on a non-object C:\wamp\www\truck\application\helpers\data_helper.php 52
ERROR - 2018-04-04 21:19:10 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 21:19:15 --> 404 Page Not Found: Public/assets
ERROR - 2018-04-04 21:19:50 --> 404 Page Not Found: Public/assets
ERROR - 2018-04-04 21:20:10 --> 404 Page Not Found: Public/assets
ERROR - 2018-04-04 22:21:06 --> Severity: Notice --> Undefined variable: value C:\wamp\www\truck\application\views\company\drug\drug_list.php 301
ERROR - 2018-04-04 22:53:53 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\controllers\Drug.php 809
ERROR - 2018-04-04 22:54:11 --> Severity: Notice --> unserialize(): Error at offset 0 of 1 bytes C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1000
ERROR - 2018-04-04 22:54:27 --> Severity: Notice --> unserialize(): Error at offset 0 of 1 bytes C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1000
ERROR - 2018-04-04 22:56:56 --> Severity: Notice --> unserialize(): Error at offset 0 of 1 bytes C:\wamp\www\truck\application\controllers\Drug.php 799
ERROR - 2018-04-04 22:56:56 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\controllers\Drug.php 809
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:21 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 22:57:36 --> Severity: Notice --> Undefined variable: table C:\wamp\www\truck\application\controllers\Drug.php 484
ERROR - 2018-04-04 22:57:36 --> Severity: Notice --> Undefined variable: column C:\wamp\www\truck\application\controllers\Drug.php 484
ERROR - 2018-04-04 22:57:36 --> Severity: Notice --> Undefined variable: tbl_item_id C:\wamp\www\truck\application\controllers\Drug.php 484
ERROR - 2018-04-04 23:00:47 --> Severity: Notice --> Undefined variable: current_drug_test C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 998
ERROR - 2018-04-04 23:00:47 --> Severity: Notice --> Undefined variable: current_drug_test C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 999
ERROR - 2018-04-04 23:00:47 --> Severity: Notice --> Undefined variable: current_drug_test C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1000
ERROR - 2018-04-04 23:00:47 --> Severity: Notice --> Undefined variable: current_drug_test C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1004
ERROR - 2018-04-04 23:01:14 --> Severity: Warning --> unserialize() expects parameter 1 to be string, array given C:\wamp\www\truck\application\controllers\Drug.php 809
ERROR - 2018-04-04 23:01:27 --> Severity: Notice --> unserialize(): Error at offset 0 of 1 bytes C:\wamp\www\truck\application\views\company\dashboard\dashboard.php 1000
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:26 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:27 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given C:\wamp\www\truck\application\views\company\drug\drug_add.php 170
ERROR - 2018-04-04 23:02:41 --> Severity: Notice --> Undefined variable: table C:\wamp\www\truck\application\controllers\Drug.php 484
ERROR - 2018-04-04 23:02:41 --> Severity: Notice --> Undefined variable: column C:\wamp\www\truck\application\controllers\Drug.php 484
ERROR - 2018-04-04 23:02:41 --> Severity: Notice --> Undefined variable: tbl_item_id C:\wamp\www\truck\application\controllers\Drug.php 484
