<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-02-05 01:25:04 --> Severity: Compile Error --> Cannot use isset() on the result of a function call (you can use "null !== func()" instead) C:\wamp\www\truck\application\views\company\drivers\driver_add.php 1514
ERROR - 2018-02-05 01:29:06 --> 404 Page Not Found: Driver/img
ERROR - 2018-02-05 01:43:26 --> Query error: Unknown column 'a.id' in 'field list' - Invalid query: SELECT a.*,':',b.*,':',c.*,':',d.*,':',`a.id` as 'id' FROM `drivers` as a,`driver_detail` as b,`driver_experience` as c,`employer_history` as d where b.`driver_id` = a.`id` and c.`driver_id`=a.`id` and d.`driver_id` = a.`id` and a.`id` ='739'
ERROR - 2018-02-05 02:54:08 --> Severity: Parsing Error --> syntax error, unexpected ':', expecting ',' or ';' C:\wamp\www\truck\application\views\company\drivers\driver_add.php 1684
ERROR - 2018-02-05 03:10:27 --> Severity: Parsing Error --> syntax error, unexpected 'prv_acc_his_no' (T_STRING) C:\wamp\www\truck\application\views\company\drivers\driver_add.php 343
