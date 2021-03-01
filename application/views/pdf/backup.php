<?php /* ?><link rel="stylesheet" href="<?php echo base_url() ?>public/css/theme.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>public/css/default.css" /><?php */ ?>
<style>
	html .wizard-progress.wizard-progress-lg, html.dark .wizard-progress.wizard-progress-lg {
    margin: 0 auto 30px;
    /*width: 80%;*/
}
html .wizard-progress.wizard-progress-lg .steps-progress, html.dark .wizard-progress.wizard-progress-lg .steps-progress {
    margin: 0 52px;
    height: 4px;
    top: 34px;
}
html .wizard-progress .steps-progress, html.dark .wizard-progress .steps-progress {
    height: 2px;
    margin: 0 38px;
    position: relative;
    top: 15px;
    background: #cccccc;
}
/*default*/
html .wizard-progress .steps-progress .progress-indicator, html.dark .wizard-progress .steps-progress .progress-indicator {
	height:100%;
    background: #0088cc;
}
html .wizard-progress.wizard-progress-lg .wizard-steps, html.dark .wizard-progress.wizard-progress-lg .wizard-steps {
    padding-top: 30px;
}
html .wizard-progress .wizard-steps, html.dark .wizard-progress .wizard-steps {
    list-style: none;
    margin: 0;
    padding: 15px 0 0;
    display: inline-block;
    width: 100%;
    font-size: 0;
    text-align: justify;
    -ms-text-justify: distribute-all-lines;
}
html .wizard-progress.wizard-progress-lg ul li, html.dark .wizard-progress.wizard-progress-lg ul li {
    max-width: 135px;
}
html .wizard-progress .wizard-steps li, html.dark .wizard-progress .wizard-steps li {
    display: inline-block;
    vertical-align: top;
    min-width: 50px;
    max-width: 100px;
}
html .wizard-progress.wizard-progress-lg ul li a, html.dark .wizard-progress.wizard-progress-lg ul li a {
    padding-top: 40px;
    font-size: 14px;
}
html .wizard-progress .wizard-steps li a, html.dark .wizard-progress .wizard-steps li a {
    position: relative;
    display: block;
    padding: 25px 8px 0;
    font-size: 11px;
    color: #33333f;
    font-weight: bold;
    line-height: 1;
    text-align: center;
    text-decoration: none;
    word-break: break-all;
}
/*default*/
.wizard-steps > li.active a, .wizard-steps > li.active a:hover, .wizard-steps > li.active a:focus {
    border-top-color: #0088cc;
}

html .wizard-progress .wizard-steps li.active a span, html.dark .wizard-progress .wizard-steps li.active a span {
    background: white;
    color: #cccccc;
    border-color: #cccccc;
}
/*default*/
html .wizard-progress .wizard-steps li.active a span, html.dark .wizard-progress .wizard-steps li.active a span {
    color: #0088cc;
    border-color: #0088cc;
}
html .wizard-progress .wizard-steps:after, html.dark .wizard-progress .wizard-steps:after {
    display: inline-block;
    width: 100%;
    content: '.';
    font-size: 0;
    height: 0;
    line-height: 0;
    visibility: hidden;
}
html .wizard-progress.wizard-progress-lg ul li a span, html.dark .wizard-progress.wizard-progress-lg ul li a span {
    width: 60px;
    height: 60px;
    margin-top: -30px;
    margin-left: -30px;
    border-radius: 60px;
    line-height: 52px;
    font-size: 22px;
    border-width: 4px;
}
.submit-style{
    background-color: #357ebd !important;
    border: 1px solid #357ebd !important;
    color: white !important;
    cursor: pointer;
    border-radius: 15px;
    padding: 5px 14px;
}
html .wizard-progress .wizard-steps li a span, html.dark .wizard-progress .wizard-steps li a span {
    position: absolute;
    top: 0;
    left: 50%;
    display: block;
    background: #cccccc;
    color: white;
    line-height: 26px;
    text-align: center;
    margin-top: -15px;
    margin-left: -15px;
    width: 30px;
    height: 30px;
    border-radius: 35px;
    font-size: 13px;
    text-indent: -1px;
    border: 2px solid #cccccc;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
}

html .wizard-progress .wizard-steps li.completed a span, html.dark .wizard-progress .wizard-steps li.completed a span {
    background: #cccccc;
    color: white;
}
html .wizard-progress .wizard-steps li.completed a span, html.dark .wizard-progress .wizard-steps li.completed a span {
    border-color: #0088cc;
    background: #0088cc;
}
.has-error .form-control:focus {
    border-color: #843534;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;
}
input:focus:invalid:focus, textarea:focus:invalid:focus, select:focus:invalid:focus, .cmxform .form-group input.error, .cmxform .form-group textarea.error {
    border-color: #B94A48 !important;
}
.form-control:focus {
    border-color: #33bbff;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(0, 136, 204, 0.3);
}
label.error {
    color: #C10000;
    font-size: 0.9em;
    margin-top: -5px;
    padding: 0;
}
label {
    font-weight: normal;
}
label.error {
    color: #B94A48;
    margin-top: 2px;
}
.form-wizard ul.pager .next a, .form-wizard ul.pager .previous a, .form-wizard ul.pager .first a, .form-wizard ul.pager .last a, .form-wizard ul.pager .finish a {
    background-color: #357ebd !important;
    border: 1px solid #357ebd !important;
    color: white !important;
}
.form-wizard ul.pager .next a, .form-wizard ul.pager .previous a, .form-wizard ul.pager .first a, .form-wizard ul.pager .last a, .form-wizard ul.pager .finish a {
    cursor: pointer;
}
</style>


<?php 

if(isset($driver_update)){
// echo $driver_update;
// var_dump($driver);
$form_target = "driver/add_driver/{$driver_update}";

}else{
    $form_target = 'driver/add_driver';
}
?>

<?php 

///////////////////////////////////////qualification_check
$qualCheck = unserialize($driver['qualification_check']);

$qual_check_1 = (set_value('qual_check_1'))?set_value('qual_check_1'):(($qualCheck[1])?$qualCheck[1]:'');
$qual_check_2 = (set_value('qual_check_2'))?set_value('qual_check_2'):(($qualCheck[2])?$qualCheck[2]:'');
$qual_check_3 = (set_value('qual_check_3'))?set_value('qual_check_3'):(($qualCheck[3])?$qualCheck[3]:'');
$qual_check_4 = (set_value('qual_check_4'))?set_value('qual_check_4'):(($qualCheck[4])?$qualCheck[4]:'');
$qual_check_5 = (set_value('qual_check_5'))?set_value('qual_check_5'):(($qualCheck[5])?$qualCheck[5]:'');
$qual_check_6 = (set_value('qual_check_6'))?set_value('qual_check_6'):(($qualCheck[6])?$qualCheck[6]:'');
$qual_check_7 = (set_value('qual_check_7'))?set_value('qual_check_7'):(($qualCheck[7])?$qualCheck[7]:'');
$qual_check_8 = (set_value('qual_check_8'))?set_value('qual_check_8'):(($qualCheck[8])?$qualCheck[8]:'');
$qual_check_9 = (set_value('qual_check_9'))?set_value('qual_check_9'):(($qualCheck[9])?$qualCheck[9]:'');
$qual_check_10 = (set_value('qual_check_10'))?set_value('qual_check_10'):(($qualCheck[10])?$qualCheck[10]:'');
$qual_check_11 = (set_value('qual_check_11'))?set_value('qual_check_11'):(($qualCheck[11])?$qualCheck[11]:'');
$qual_check_12 = (set_value('qual_check_12'))?set_value('qual_check_12'):(($qualCheck[12])?$qualCheck[12]:'');
$qual_check_13 = (set_value('qual_check_13'))?set_value('qual_check_13'):(($qualCheck[13])?$qualCheck[13]:'');
$qual_check_14 = (set_value('qual_check_14'))?set_value('qual_check_14'):(($qualCheck[14])?$qualCheck[14]:'');
$qual_check_15 = (set_value('qual_check_15'))?set_value('qual_check_15'):(($qualCheck[15])?$qualCheck[15]:'');
$qual_check_16 = (set_value('qual_check_16'))?set_value('qual_check_16'):(($qualCheck[16])?$qualCheck[16]:'');
$qual_check_17 = (set_value('qual_check_17'))?set_value('qual_check_17'):(($qualCheck[17])?$qualCheck[17]:'');
$qual_check_18 = (set_value('qual_check_18'))?set_value('qual_check_18'):(($qualCheck[18])?$qualCheck[18]:'');
$qual_check_19 = (set_value('qual_check_19'))?set_value('qual_check_19'):(($qualCheck[19])?$qualCheck[19]:'');
$qual_check_20 = (set_value('qual_check_20'))?set_value('qual_check_20'):(($qualCheck[20])?$qualCheck[20]:'');
$qual_check_21 = (set_value('qual_check_21'))?set_value('qual_check_21'):(($qualCheck[21])?$qualCheck[21]:'');
$qual_check_22 = (set_value('qual_check_22'))?set_value('qual_check_22'):(($qualCheck[22])?$qualCheck[22]:'');
$qual_check_23 = (set_value('qual_check_23'))?set_value('qual_check_23'):(($qualCheck[23])?$qualCheck[23]:'');
$qual_check_24 = (set_value('qual_check_24'))?set_value('qual_check_24'):(($qualCheck[24])?$qualCheck[24]:'');
$qual_check_25 = (set_value('qual_check_25'))?set_value('qual_check_25'):(($qualCheck[25])?$qualCheck[25]:'');
$qual_check_26 = (set_value('qual_check_26'))?set_value('qual_check_26'):(($qualCheck[26])?$qualCheck[26]:'');
$qual_check_27 = (set_value('qual_check_27'))?set_value('qual_check_27'):(($qualCheck[27])?$qualCheck[27]:'');
$qual_check_28 = (set_value('qual_check_28'))?set_value('qual_check_28'):(($qualCheck[28])?$qualCheck[28]:'');
$qual_check_29 = (set_value('qual_check_29'))?set_value('qual_check_29'):(($qualCheck[29])?$qualCheck[29]:'');
$qual_check_30 = (set_value('qual_check_30'))?set_value('qual_check_30'):(($qualCheck[30])?$qualCheck[30]:'');
$qual_check_31 = (set_value('qual_check_31'))?set_value('qual_check_31'):(($qualCheck[31])?$qualCheck[31]:'');
$qual_check_32 = (set_value('qual_check_32'))?set_value('qual_check_32'):(($qualCheck[32])?$qualCheck[32]:'');
$qual_check_33 = (set_value('qual_check_33'))?set_value('qual_check_33'):(($qualCheck[33])?$qualCheck[33]:'');



$qual_check_15_s = (set_value('qual_check_15_s'))?set_value('qual_check_15_s'):((isset($qual_check_15[0]))?$qual_check_15[0]:'');
$qual_check_16_s = (set_value('qual_check_16_s'))?set_value('qual_check_16_s'):((isset($qual_check_16[0]))?$qual_check_16[0]:'');
$qual_check_17_s = (set_value('qual_check_17_s'))?set_value('qual_check_17_s'):((isset($qual_check_17[0]))?$qual_check_17[0]:'');
$qual_check_18_s = (set_value('qual_check_18_s'))?set_value('qual_check_18_s'):((isset($qual_check_18[0]))?$qual_check_18[0]:'');
$qual_check_19_s = (set_value('qual_check_19_s'))?set_value('qual_check_19_s'):((isset($qual_check_19[0]))?$qual_check_19[0]:'');
$qual_check_20_s = (set_value('qual_check_20_s'))?set_value('qual_check_20_s'):((isset($qual_check_20[0]))?$qual_check_20[0]:'');



$position_applied = (set_value('position_applied'))?set_value('position_applied'):((isset($driver['position_applied']))?$driver['position_applied']:'');
$wsib_no = (set_value('wsib_no'))?set_value('wsib_no'):((isset($driver['wsib_no']))?$driver['wsib_no']:'');
$cvor_date = (set_value('cvor_date'))?set_value('cvor_date'):((isset($driver['cvor_date']))?$driver['cvor_date']:'');
$passport = (set_value('passport'))?set_value('passport'):((isset($driver['passport']))?$driver['passport']:'');
$road_test = (set_value('road_test'))?set_value('road_test'):((isset($driver['road_test']))?$driver['road_test']:'');
$police_report = (set_value('police_report'))?set_value('police_report'):((isset($driver['police_report']))?$driver['police_report']:'');
$police_report_date = (set_value('police_report_date'))?set_value('police_report_date'):((isset($driver['police_report_date']))?$driver['police_report_date']:'');
$first_name = (set_value('first_name'))?set_value('first_name'):((isset($driver['firstname']))?$driver['firstname']:'');
$middle_name = (set_value('middle_name'))?set_value('middle_name'):((isset($driver['middlename']))?$driver['middlename']:'');
$last_name = (set_value('last_name'))?set_value('last_name'):((isset($driver['lastname']))?$driver['lastname']:'');
$email = (set_value('email'))?set_value('email'):((isset($driver['email']))?$driver['email']:'');
$sin = (set_value('sin'))?set_value('sin'):((isset($driver['sin_no']))?$driver['sin_no']:'');
$social_sec_no = (set_value('social_sec_no'))?set_value('social_sec_no'):((isset($driver['social_sec_no']))?$driver['social_sec_no']:'');
$emp_license_no = (set_value('emp_license_no'))?set_value('emp_license_no'):((isset($driver['emp_license_no']))?$driver['emp_license_no']:'');
$emp_license_state = (set_value('emp_license_state'))?set_value('emp_license_state'):((isset($driver['emp_license_state']))?$driver['emp_license_state']:'');
$emp_license_org_date = (set_value('emp_license_org_date'))?set_value('emp_license_org_date'):((isset($driver['emp_license_org_date']))?$driver['emp_license_org_date']:'');
$emp_license_exp_date = (set_value('emp_license_exp_date'))?set_value('emp_license_exp_date'):((isset($driver['emp_license_exp_date']))?$driver['emp_license_exp_date']:'');
$emp_license_class = (set_value('emp_license_class'))?set_value('emp_license_class'):((isset($driver['emp_license_class']))?$driver['emp_license_class']:'');
$emp_license_restrictions = (set_value('emp_license_restrictions'))?set_value('emp_license_restrictions'):((isset($driver['emp_license_restrictions']))?$driver['emp_license_restrictions']:'');
$emp_license_endrosments = (set_value('emp_license_endrosments'))?set_value('emp_license_endrosments'):((isset($driver['emp_license_endrosments']))?$driver['emp_license_endrosments']:'');
$current_address = (set_value('current_address'))?set_value('current_address'):((isset($driver['address']))?$driver['address']:'');
$current_street = (set_value('current_street'))?set_value('current_street'):((isset($driver['street']))?$driver['street']:'');
$current_city = (set_value('current_city'))?set_value('current_city'):((isset($driver['city']))?$driver['city']:'');
$current_province = (set_value('current_province'))?set_value('current_province'):((isset($driver['province']))?$driver['province']:'');
$current_postal_code = (set_value('current_postal_code'))?set_value('current_postal_code'):((isset($driver['postalcode']))?$driver['postalcode']:'');
$current_duration = (set_value('current_duration'))?set_value('current_duration'):((isset($driver['duration']))?$driver['duration']:'');
/////////////////////////////////////////////1 previous address

$prv_add_no = (set_value('prv_add_no'))?set_value('prv_add_no'):((isset($driver['prv_add_no']))?$driver['prv_add_no']:'');


if(!set_value('submit')):
    $previous_address = unserialize($driver['previous_address']);
    $previous_street = unserialize($driver['previous_street']);
    $previous_city = unserialize($driver['previous_city']);
    $previous_province = unserialize($driver['previous_province']);
    $previous_postal_code = unserialize($driver['previous_postal_code']);
    $previous_duration = unserialize($driver['previous_duration']);

endif;


    for($i =1 ;$i <= set_value('prv_add_no') ; $i++){
        $previous_address[] = (set_value('previous_address_'.$i))?set_value('previous_address_'.$i):((isset($previous_address[$i-1]))?$previous_address[$i-1]:'');
        $previous_street[] = (set_value('previous_street_'.$i))?set_value('previous_street_'.$i):((isset($previous_street[$i-1]))?$previous_street[$i-1]:'');
        $previous_city[] = (set_value('previous_city_'.$i))?set_value('previous_city_'.$i):((isset($previous_city[$i-1]))?$previous_city[$i-1]:'');
        $previous_province[] = (set_value('previous_province_'.$i))?set_value('previous_province_'.$i):((isset($previous_province[$i-1]))?$previous_province[$i-1]:'');
        $previous_postal_code[] = (set_value('previous_postal_code_'.$i))?set_value('previous_postal_code_'.$i):((isset($previous_postal_code[$i-1]))?$previous_postal_code[$i-1]:'');
        $previous_duration[] = (set_value('previous_duration_'.$i))?set_value('previous_duration_'.$i):((isset($previous_duration[$i-1]))?$previous_duration[$i-1]:'');
        
    }


/////////////////////////////////////////////1 previous address end
///////////////////////////////////////////////Employment detail
$prv_empl_his_no = (set_value('prv_empl_his_no'))?set_value('prv_empl_his_no'):((isset($driver['prv_empl_his_no']))?$driver['prv_empl_his_no']:'');


if(!set_value('submit')):
    $is_employed = unserialize($driver['is_employed']);
    $fax_no = unserialize($driver['fax_no']);
    $employer_email = unserialize($driver['employer_email']);
    $employer_company_name = unserialize($driver['employer_company_name']);
    $employer_name = unserialize($driver['employer_name']);
    $employer_address = unserialize($driver['employer_address']);
    $employer_number = unserialize($driver['employer_number']);
    $employer_city = unserialize($driver['employer_city']);
    $employer_province = unserialize($driver['employer_province']);
    $emplyer_zip = unserialize($driver['emplyer_zip']);
    $position_held = unserialize($driver['position_held']);
    $salary_wage = unserialize($driver['salary_wage']);
    $employment_fron_date = unserialize($driver['employment_fron_date']);
    $employment_to_date = unserialize($driver['employment_to_date']);
    $employer_leaving_reason = unserialize($driver['employer_leaving_reason']);
    $fmcsr_status = unserialize($driver['fmcsr_status']);
    $safety_sensitive_status = unserialize($driver['safety_sensitive_status']);


endif;


    for($i =1 ;$i <= set_value('prv_empl_his_no') ; $i++){

        $is_employed[] = (set_value('is_employed_'.$i))?set_value('is_employed_'.$i):((isset($is_employed[$i-1]))?$is_employed[$i-1]:'');

        $fax_no[] = (set_value('fax_no_'.$i))?set_value('fax_no_'.$i):((isset($fax_no[$i-1]))?$fax_no[$i-1]:'');

        $employer_company_name[] = (set_value('employer_company_name_'.$i))?set_value('employer_company_name_'.$i):((isset($employer_company_name[$i-1]))?$employer_company_name[$i-1]:'');

        $employer_name[] = (set_value('employer_name_'.$i))?set_value('employer_name_'.$i):((isset($employer_name[$i-1]))?$employer_name[$i-1]:'');
        $employer_address[] = (set_value('employer_address_'.$i))?set_value('employer_address_'.$i):((isset($employer_address[$i-1]))?$employer_address[$i-1]:'');
        $employer_number[] = (set_value('employer_number_'.$i))?set_value('employer_number_'.$i):((isset($employer_number[$i-1]))?$employer_number[$i-1]:'');
        $employer_city[] = (set_value('employer_city_'.$i))?set_value('employer_city_'.$i):((isset($employer_city[$i-1]))?$employer_city[$i-1]:'');
        $employer_province[] = (set_value('employer_province_'.$i))?set_value('employer_province_'.$i):((isset($employer_province[$i-1]))?$employer_province[$i-1]:'');
        $emplyer_zip[] = (set_value('emplyer_zip_'.$i))?set_value('emplyer_zip_'.$i):((isset($emplyer_zip[$i-1]))?$emplyer_zip[$i-1]:'');
        $position_held[] = (set_value('position_held_'.$i))?set_value('position_held_'.$i):((isset($position_held[$i-1]))?$position_held[$i-1]:'');
        $salary_wage[] = (set_value('salary_wage_'.$i))?set_value('salary_wage_'.$i):((isset($salary_wage[$i-1]))?$salary_wage[$i-1]:'');
        $employment_fron_date[] = (set_value('employment_fron_date_'.$i))?set_value('employment_fron_date_'.$i):((isset($employment_fron_date[$i-1]))?$employment_fron_date[$i-1]:'');
        $employment_to_date[] = (set_value('employment_to_date_'.$i))?set_value('employment_to_date_'.$i):((isset($employment_to_date[$i-1]))?$employment_to_date[$i-1]:'');
        $employer_leaving_reason[] = (set_value('employer_leaving_reason_'.$i))?set_value('employer_leaving_reason_'.$i):((isset($employer_leaving_reason[$i-1]))?$employer_leaving_reason[$i-1]:'');
        $fmcsr_status[] = (set_value('fmcsr_status_'.$i))?set_value('fmcsr_status_'.$i):((isset($fmcsr_status[$i-1]))?$fmcsr_status[$i-1]:'');
        $safety_sensitive_status[] = (set_value('safety_sensitive_status_'.$i))?set_value('safety_sensitive_status_'.$i):((isset($safety_sensitive_status[$i-1]))?$safety_sensitive_status[$i-1]:'');

        
    }

///////////////////////////////////////////////Employment detail end

/////////////////////////////////////////////1 Accident History

$prv_acc_his_no = (set_value('prv_acc_his_no'))?set_value('prv_acc_his_no'):((isset($driver['prv_acc_his_no']))?$driver['prv_acc_his_no']:'');


if(!set_value('submit')):
    $accident_date = unserialize($driver['accident_date']);
    $accident_nature = unserialize($driver['accident_nature']);
    $accident_fatalities = unserialize($driver['accident_fatalities']);
    $accident_injuries = unserialize($driver['accident_injuries']);
    $accident_hazardous = unserialize($driver['accident_hazardous']);


endif;


    for($i =1 ;$i <= set_value('prv_acc_his_no') ; $i++){
        $accident_date[] = (set_value('accident_date_'.$i))?set_value('accident_date_'.$i):((isset($accident_date[$i-1]))?$accident_date[$i-1]:'');
        $accident_nature[] = (set_value('accident_nature_'.$i))?set_value('accident_nature_'.$i):((isset($accident_nature[$i-1]))?$accident_nature[$i-1]:'');
        $accident_fatalities[] = (set_value('accident_fatalities_'.$i))?set_value('accident_fatalities_'.$i):((isset($accident_fatalities[$i-1]))?$accident_fatalities[$i-1]:'');
        $accident_injuries[] = (set_value('accident_injuries_'.$i))?set_value('accident_injuries_'.$i):((isset($accident_injuries[$i-1]))?$accident_injuries[$i-1]:'');
        $accident_hazardous[] = (set_value('accident_hazardous_'.$i))?set_value('accident_hazardous_'.$i):((isset($accident_hazardous[$i-1]))?$accident_hazardous[$i-1]:'');

        
    }


/////////////////////////////////////////////1 Accident History end



/////////////////////////////////////////////1 Traffic Convivtions

$prv_traffic_conviv_no = (set_value('prv_traffic_conviv_no'))?set_value('prv_traffic_conviv_no'):((isset($driver['prv_traffic_conviv_no']))?$driver['prv_traffic_conviv_no']:'');


if(!set_value('submit')):
    $traf_conviv_date = unserialize($driver['traf_conviv_date']);
    $traf_conviv_loc = unserialize($driver['traf_conviv_loc']);
    $traf_conviv_chrg = unserialize($driver['traf_conviv_chrg']);
    $traf_conviv_pen = unserialize($driver['traf_conviv_pen']);
    // $accident_hazardous = unserialize($driver['accident_hazardous']);


endif;


    for($i =1 ;$i <= set_value('prv_traffic_conviv_no') ; $i++){
        $traf_conviv_date[] = (set_value('traf_conviv_date_'.$i))?set_value('traf_conviv_date_'.$i):((isset($traf_conviv_date[$i-1]))?$traf_conviv_date[$i-1]:'');
        $traf_conviv_loc[] = (set_value('traf_conviv_loc_'.$i))?set_value('traf_conviv_loc_'.$i):((isset($traf_conviv_loc[$i-1]))?$traf_conviv_loc[$i-1]:'');
        $traf_conviv_chrg[] = (set_value('traf_conviv_chrg_'.$i))?set_value('traf_conviv_chrg_'.$i):((isset($traf_conviv_chrg[$i-1]))?$traf_conviv_chrg[$i-1]:'');
        $traf_conviv_pen[] = (set_value('traf_conviv_pen_'.$i))?set_value('traf_conviv_pen_'.$i):((isset($traf_conviv_pen[$i-1]))?$traf_conviv_pen[$i-1]:'');


        
    }



/////////////////////////////////////////////1 Traffic Convivtions end


/////////////////////////////////////////////1 Driver Drug Detail

$emp_drug_test_his_no = (set_value('emp_drug_test_his_no'))?set_value('emp_drug_test_his_no'):((isset($driver['emp_drug_test_his_no']))?$driver['emp_drug_test_his_no']:'');


if(!set_value('submit')):
    $emp_drug_test_type = unserialize($driver['emp_drug_test_type']);
    $emp_drug_test_date = unserialize($driver['emp_drug_test_date']);
    $emp_drug_test_status_yn = unserialize($driver['emp_drug_test_status_yn']);

// var_dump($driver['emp_drug_test_status_yn']);
endif;


    for($i =1 ;$i <= set_value('emp_drug_test_his_no') ; $i++){
        $emp_drug_test_type[] = (set_value('emp_drug_test_type_'.$i))?set_value('emp_drug_test_type_'.$i):((isset($emp_drug_test_type[$i-1]))?$emp_drug_test_type[$i-1]:'');
        $emp_drug_test_date[] = (set_value('emp_drug_test_date_'.$i))?set_value('emp_drug_test_date_'.$i):((isset($emp_drug_test_date[$i-1]))?$emp_drug_test_date[$i-1]:'');
        $emp_drug_test_status_yn[] = (set_value('emp_drug_test_status_yn_'.$i))?set_value('emp_drug_test_status_yn_'.$i):((isset($emp_drug_test_status_yn[$i-1]))?$emp_drug_test_status_yn[$i-1]:'');

    }
// var_dump($emp_drug_test_status_yn);

/////////////////////////////////////////////1 Driver Drug Detail end



////////////////////////////////////////////3



$current_phone = (set_value('current_phone'))?set_value('current_phone'):((isset($driver['phonenumber']))?$driver['phonenumber']:'');
$home_phone = (set_value('home_phone'))?set_value('home_phone'):((isset($driver['homenumber']))?$driver['homenumber']:'');
$emergency_contact_relation = (set_value('emergency_contact_relation'))?set_value('emergency_contact_relation'):((isset($driver['emg_contact']))?$driver['emg_contact']:'');
$emergency_contact_phone = (set_value('emergency_contact_phone'))?set_value('emergency_contact_phone'):((isset($driver['emg_contact_number']))?$driver['emg_contact_number']:'');
$witness_name = (set_value('witness_name'))?set_value('witness_name'):((isset($driver['witnessname']))?$driver['witnessname']:'');
$topic = (set_value('topic'))?set_value('topic'):((isset($driver['topic']))?$driver['topic']:'');
$medical_due_date = (set_value('medical_due_date'))?set_value('medical_due_date'):((isset($driver['medical_due']))?$driver['medical_due']:'');
$defensive_driving = (set_value('defensive_driving'))?set_value('defensive_driving'):((isset($driver['defensive_driving']))?$driver['defensive_driving']:'');
$road_evalution = (set_value('road_evalution'))?set_value('road_evalution'):((isset($driver['road_evalution']))?$driver['road_evalution']:'');
$province_insurance = (set_value('province_insurance'))?set_value('province_insurance'):((isset($driver['province_insurance']))?$driver['province_insurance']:'');
$legal_right = (set_value('legal_right'))?set_value('legal_right'):((isset($driver['legal_right']))?$driver['legal_right']:'');
$dob = (set_value('dob'))?set_value('dob'):((isset($driver['dob']))?$driver['dob']:'');
$provide_age_proof = (set_value('provide_age_proof'))?set_value('provide_age_proof'):((isset($driver['provide_age_proof']))?$driver['provide_age_proof']:'');

$worked_before = (set_value('worked_before'))?set_value('worked_before'):((isset($driver['worked_before']))?$driver['worked_before']:'');
$worked_when = (set_value('worked_when'))?set_value('worked_when'):((isset($driver['b_worked_when']))?$driver['b_worked_when']:'');
$pay_rate = (set_value('pay_rate'))?set_value('pay_rate'):((isset($driver['b_pay_rate']))?$driver['b_pay_rate']:'');
$fron_date = (set_value('fron_date'))?set_value('fron_date'):((isset($driver['b_from_date']))?$driver['b_from_date']:'');
$to_date = (set_value('to_date'))?set_value('to_date'):((isset($driver['b_to_date']))?$driver['b_to_date']:'');
$work_position = (set_value('work_position'))?set_value('work_position'):((isset($driver['b_work_position']))?$driver['b_work_position']:'');
$leaving_reason = (set_value('leaving_reason'))?set_value('leaving_reason'):((isset($driver['b_leaving_reason']))?$driver['b_leaving_reason']:'');

$employment_status = (set_value('employment_status'))?set_value('employment_status'):((isset($driver['employment_status']))?$driver['employment_status']:'');
$last_employment = (set_value('last_employment'))?set_value('last_employment'):((isset($driver['last_employment']))?$driver['last_employment']:'');
$who_referred = (set_value('who_referred'))?set_value('who_referred'):((isset($driver['who_referred']))?$driver['who_referred']:'');
$pay_rate_expected = (set_value('pay_rate_expected'))?set_value('pay_rate_expected'):((isset($driver['pay_rate_expected']))?$driver['pay_rate_expected']:'');
$bond_status = (set_value('bond_status'))?set_value('bond_status'):((isset($driver['bond_status']))?$driver['bond_status']:'');
$bonding_company = (set_value('bonding_company'))?set_value('bonding_company'):((isset($driver['bonding_company']))?$driver['bonding_company']:'');
$felony_status = (set_value('felony_status'))?set_value('felony_status'):((isset($driver['felony_status']))?$driver['felony_status']:'');
$conviction_crime = (set_value('conviction_crime'))?set_value('conviction_crime'):((isset($driver['conviction_crime']))?$driver['conviction_crime']:'');
$performance_status = (set_value('performance_status'))?set_value('performance_status'):((isset($driver['performance_status']))?$driver['performance_status']:'');
$performance_reason = (set_value('performance_reason'))?set_value('performance_reason'):((isset($driver['performance_reason']))?$driver['performance_reason']:'');
$fast_driver_status = (set_value('fast_driver_status'))?set_value('fast_driver_status'):((isset($driver['fast_driver_status']))?$driver['fast_driver_status']:'');
$fast_card_no = (set_value('fast_card_no'))?set_value('fast_card_no'):((isset($driver['fast_card_no']))?$driver['fast_card_no']:'');
$fast_card_expiry = (set_value('fast_card_expiry'))?set_value('fast_card_expiry'):((isset($driver['fast_card_expiry']))?$driver['fast_card_expiry']:'');
$not_willing_status = (set_value('not_willing_status'))?set_value('not_willing_status'):((isset($driver['not_willing_status']))?$driver['not_willing_status']:'');
$willing_status_rdo = (set_value('willing_status_rdo'))?set_value('willing_status_rdo'):((isset($driver['willing_status_rdo']))?$driver['willing_status_rdo']:'');

$passport_number = (set_value('passport_number'))?set_value('passport_number'):((isset($driver['passport_number']))?$driver['passport_number']:'');
$passport_date = (set_value('passport_date'))?set_value('passport_date'):((isset($driver['passport_date']))?$driver['passport_date']:'');


$emp_license_org_date = (set_value('emp_license_org_date'))?set_value('emp_license_org_date'):((isset($driver['emp_license_org_date']))?$driver['emp_license_org_date']:'');

////////////////////////////////////////////3 end
////////////////////////////////////////////page 5 start


$emp_highest_grade = (set_value('emp_highest_grade'))?set_value('emp_highest_grade'):((isset($driver['emp_highest_grade']))?$driver['emp_highest_grade']:'');
$emp_high_school = (set_value('emp_high_school'))?set_value('emp_high_school'):((isset($driver['emp_high_school']))?$driver['emp_high_school']:'');
$emp_college = (set_value('emp_college'))?set_value('emp_college'):((isset($driver['emp_college']))?$driver['emp_college']:'');
$emp_last_school = (set_value('emp_last_school'))?set_value('emp_last_school'):((isset($driver['emp_last_school']))?$driver['emp_last_school']:'');
$emp_skl_complete_address = (set_value('emp_skl_complete_address'))?set_value('emp_skl_complete_address'):((isset($driver['emp_skl_complete_address']))?$driver['emp_skl_complete_address']:'');




/*Driving Experience start */




if(!set_value('submit')):
    $status_de = unserialize($driver['status_de']);
    $type_de = unserialize($driver['type_de']);
    $from_de = unserialize($driver['from_de']);
    $to_de = unserialize($driver['to_de']);
    $miles_de = unserialize($driver['miles_de']);


else:


    for($i =1 ;$i <= 7 ; $i++){
        $status_de[] = (set_value('status_de'.$i))?set_value('status_de'.$i):((isset($status_de[$i-1]))?$status_de[$i-1]:'');
        $type_de[] = (set_value('type_de'.$i))?set_value('type_de'.$i):((isset($type_de[$i-1]))?$type_de[$i-1]:'');
        $from_de[] = (set_value('from_de'.$i))?set_value('from_de'.$i):((isset($from_de[$i-1]))?$from_de[$i-1]:'');
        $to_de[] = (set_value('to_de'.$i))?set_value('to_de'.$i):((isset($to_de[$i-1]))?$to_de[$i-1]:'');
        $miles_de[] = (set_value('miles_de'.$i))?set_value('miles_de'.$i):((isset($miles_de[$i-1]))?$miles_de[$i-1]:'');

        
    }

endif;
/*Driving Experience End */


$emp_spl_cor = (set_value('emp_spl_cor'))?set_value('emp_spl_cor'):((isset($driver['emp_spl_cor']))?$driver['emp_spl_cor']:'');
$emp_awards = (set_value('emp_awards'))?set_value('emp_awards'):((isset($driver['emp_awards']))?$driver['emp_awards']:'');
$emp_den_license = (set_value('emp_den_license'))?set_value('emp_den_license'):((isset($driver['emp_den_license']))?$driver['emp_den_license']:'');
$emp_license_per = (set_value('emp_license_per'))?set_value('emp_license_per'):((isset($driver['emp_license_per']))?$driver['emp_license_per']:'');
$emp_exp_us_commercial = (set_value('emp_exp_us_commercial'))?set_value('emp_exp_us_commercial'):((isset($driver['emp_exp_us_commercial']))?$driver['emp_exp_us_commercial']:'');
$emp_other_trk_exp = (set_value('emp_other_trk_exp'))?set_value('emp_other_trk_exp'):((isset($driver['emp_other_trk_exp']))?$driver['emp_other_trk_exp']:'');
$emp_cor_tra_list = (set_value('emp_cor_tra_list'))?set_value('emp_cor_tra_list'):((isset($driver['emp_cor_tra_list']))?$driver['emp_cor_tra_list']:'');
$emp_spl_equ_list = (set_value('emp_spl_equ_list'))?set_value('emp_spl_equ_list'):((isset($driver['emp_spl_equ_list']))?$driver['emp_spl_equ_list']:'');
$emp_drug_test_status = (set_value('emp_drug_test_status'))?set_value('emp_drug_test_status'):((isset($driver['emp_drug_test_status']))?$driver['emp_drug_test_status']:'');
$emp_pro_state_list = (set_value('emp_pro_state_list'))?set_value('emp_pro_state_list'):((isset($driver['emp_pro_state_list']))?$driver['emp_pro_state_list']:'');







////////////////////////////////////////////// page 7
$hours_worked = unserialize($driver['hours_worked']);

$hours_worked1 = (set_value('hours_worked_1'))?set_value('hours_worked_1'):((isset($hours_worked[0]))?$hours_worked[0]:'');
$hours_worked2 = (set_value('hours_worked_2'))?set_value('hours_worked_2'):((isset($hours_worked[1]))?$hours_worked[1]:'');
$hours_worked3 = (set_value('hours_worked_3'))?set_value('hours_worked_3'):((isset($hours_worked[2]))?$hours_worked[2]:'');
$hours_worked4 = (set_value('hours_worked_4'))?set_value('hours_worked_4'):((isset($hours_worked[3]))?$hours_worked[3]:'');
$hours_worked5 = (set_value('hours_worked_5'))?set_value('hours_worked_5'):((isset($hours_worked[4]))?$hours_worked[4]:'');
$hours_worked6 = (set_value('hours_worked_6'))?set_value('hours_worked_6'):((isset($hours_worked[5]))?$hours_worked[5]:'');
$hours_worked7 = (set_value('hours_worked_7'))?set_value('hours_worked_7'):((isset($hours_worked[6]))?$hours_worked[6]:'');
$hours_worked8 = (set_value('hours_worked_8'))?set_value('hours_worked_8'):((isset($hours_worked[7]))?$hours_worked[7]:'');
$hours_worked9 = (set_value('hours_worked_9'))?set_value('hours_worked_9'):((isset($hours_worked[8]))?$hours_worked[8]:'');
$hours_worked10 = (set_value('hours_worked_10'))?set_value('hours_worked_10'):((isset($hours_worked[9]))?$hours_worked[9]:'');
$hours_worked11 = (set_value('hours_worked_11'))?set_value('hours_worked_11'):((isset($hours_worked[10]))?$hours_worked[10]:'');
$hours_worked12 = (set_value('hours_worked_12'))?set_value('hours_worked_12'):((isset($hours_worked[11]))?$hours_worked[11]:'');
$hours_worked13 = (set_value('hours_worked_13'))?set_value('hours_worked_13'):((isset($hours_worked[12]))?$hours_worked[12]:'');
$hours_worked14 = (set_value('hours_worked_14'))?set_value('hours_worked_14'):((isset($hours_worked[13]))?$hours_worked[13]:'');

$work_date = unserialize($driver['work_date']);

$work_date_1 = (set_value('work_date_1'))?set_value('work_date_1'):((isset($work_date[0]))?$work_date[0]:'');
$work_date_2 = (set_value('work_date_2'))?set_value('work_date_2'):((isset($work_date[1]))?$work_date[1]:'');
$work_date_3 = (set_value('work_date_3'))?set_value('work_date_3'):((isset($work_date[2]))?$work_date[2]:'');
$work_date_4 = (set_value('work_date_4'))?set_value('work_date_4'):((isset($work_date[3]))?$work_date[3]:'');
$work_date_5 = (set_value('work_date_5'))?set_value('work_date_5'):((isset($work_date[4]))?$work_date[4]:'');
$work_date_6 = (set_value('work_date_6'))?set_value('work_date_6'):((isset($work_date[5]))?$work_date[5]:'');
$work_date_7 = (set_value('work_date_7'))?set_value('work_date_7'):((isset($work_date[6]))?$work_date[6]:'');
$work_date_8 = (set_value('work_date_8'))?set_value('work_date_8'):((isset($work_date[7]))?$work_date[7]:'');
$work_date_9 = (set_value('work_date_9'))?set_value('work_date_9'):((isset($work_date[8]))?$work_date[8]:'');
$work_date_10 = (set_value('work_date_10'))?set_value('work_date_10'):((isset($work_date[9]))?$work_date[9]:'');
$work_date_11 = (set_value('work_date_11'))?set_value('work_date_11'):((isset($work_date[10]))?$work_date[10]:'');
$work_date_12 = (set_value('work_date_12'))?set_value('work_date_12'):((isset($work_date[11]))?$work_date[11]:'');
$work_date_13 = (set_value('work_date_13'))?set_value('work_date_13'):((isset($work_date[12]))?$work_date[12]:'');
$work_date_14 = (set_value('work_date_14'))?set_value('work_date_14'):((isset($work_date[13]))?$work_date[13]:'');

$emp_last_reliev_from = (set_value('emp_last_reliev_from'))?set_value('emp_last_reliev_from'):((isset($driver['emp_last_reliev_from']))?$driver['emp_last_reliev_from']:'');
$emp_last_reliev_to = (set_value('emp_last_reliev_to'))?set_value('emp_last_reliev_to'):((isset($driver['emp_last_reliev_to']))?$driver['emp_last_reliev_to']:'');
$emp_last_reliev_on = (set_value('emp_last_reliev_on'))?set_value('emp_last_reliev_on'):((isset($driver['emp_last_reliev_on']))?$driver['emp_last_reliev_on']:'');

$emp_curr_work_status = (set_value('emp_curr_work_status'))?set_value('emp_curr_work_status'):((isset($driver['emp_curr_work_status']))?$driver['emp_curr_work_status']:'');
$emp_another_emply_status = (set_value('emp_another_emply_status'))?set_value('emp_another_emply_status'):((isset($driver['emp_another_emply_status']))?$driver['emp_another_emply_status']:'');





?>




<!-- page start-->
<?php //echo isset($driver_detail['id'])? $id=$driver_detail['id']:  $id='';  ?>
<!-- start: page -->
<div class="row">
    <div class="col-xs-12">
        <section class="panel form-wizard" id="w4">
        	<header class="panel-heading">
				<?php if($id == ''){?>
                    <h4 class="head3" style="display:inline-block">Add New Driver</h4>
                <?php } else {?>
                    <h4 class="head3" style="display:inline-block">Update Driver</h4>
                <?php }?>
                <a href="<?php echo site_url('driver') ?>" class="btn btn-primary fa fa-eye pull-right"> View Drivers List</a>
			</header>
            <div class="panel-body">
                <div class="wizard-progress wizard-progress-lg">
                    <div class="steps-progress">
                        <div class="progress-indicator"></div>
                    </div>
                    <ul class="wizard-steps">
                        <li class="active" >
                            <a href="#w6-quali-check" data-toggle="tab"><span>0</span>Qualification Checklist</a>
                        </li>
                        <li >
                        	<a href="#w6-profile" data-toggle="tab"><span>1</span>Basic Info</a>
                        </li>
                        <li>
                        	<a href="#w6-application" data-toggle="tab"><span>2</span>Application Info</a>
                        </li>
                        <li>
                        	<a href="#w6-employment_history" data-toggle="tab"><span>3</span>Employment History</a>
                        </li>
                        <li>
                        	<a href="#w6-acc_trff_rcd" data-toggle="tab"><span>4</span>Traffic Convictions</a>
                        </li>
                        <li>
                        	<a href="#w6-drv_exp" data-toggle="tab"><span>5</span>Qualifications &amp; Driving Experience</a>
                        </li>
                        <li>
                        	<a href="#w6-emp_duty_drg_details" data-toggle="tab"><span>6</span>On-Duty Hours &amp; Drug Tests Details</a>
                        </li>
                        <li>
                        	<a href="#w6-emp_profile" data-toggle="tab"><span>7</span>Driver Profile</a>
                        </li>
                    </ul>
                </div>
                <!-- <?php  if(validation_errors()){ ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo validation_errors(); ?>
                        </div>
                <?php    }   ?> -->
                <form class="form-horizontal" action="<?php echo base_url($form_target)?>" method="post" novalidate enctype="multipart/form-data">
                    <div class="tab-content">
                        <?php if(isset($driver_update)){
                                    echo "<input type='hidden' value='true' name='driver_update'>";
                                    } ?>
                        <div id="w6-quali-check" class="tab-pane active">
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_1">Photocopy of current Driver's license</label>

                                <label class="col-sm-2 control-label" for="w6-qual_check_1">Expires</label>

                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="qual_check_1" value="<?php echo $qual_check_1?>" name="qual_check_1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_2">Application for Employment</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_2">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_2_yes" name="qual_check_2" type="radio" <?php echo ($qual_check_2 == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_2_no" name="qual_check_2" type="radio" <?php echo ($qual_check_2 == 'No')?'checked':'';?> value="No" class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_3">Employment References-(3 years)</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_3">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_3_yes" name="qual_check_3" type="radio" <?php echo ($qual_check_3 == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_3_no" name="qual_check_3" type="radio" <?php echo ($qual_check_3 == 'No')?'checked':'';?> value="No" class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_4">Photocopy of current driver's abstract</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_4">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_4_yes" name="qual_check_4" type="radio" <?php echo ($qual_check_4 == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_4_no" name="qual_check_4" type="radio" <?php echo ($qual_check_4 == 'No')?'checked':'';?> value="No" class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_5">Photocopy of current deiver's CVOR abstract</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_5">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_5_yes" name="qual_check_5" type="radio" <?php echo ($qual_check_5 == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_5_no" name="qual_check_5" type="radio" <?php echo ($qual_check_5 == 'No')?'checked':'';?> value="No" class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_6">Certification of Violations/Annual Review</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_6">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_6_yes" name="qual_check_6" type="radio" value="Yes" <?php echo ($qual_check_6 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_6_no" name="qual_check_6" type="radio" value="No" <?php echo ($qual_check_6 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_7">Driver's Statement of on-duty hours</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_7"></label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_7_yes" name="qual_check_7" type="radio" value="Yes" <?php echo ($qual_check_7 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_7_no" name="qual_check_7" type="radio" value="No" <?php echo ($qual_check_7 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_8">Driver's Medical Certification</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_8">Expires</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_8_yes" name="qual_check_8" type="radio" value="Yes" <?php echo ($qual_check_8 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_8_no" name="qual_check_8" type="radio" value="No" <?php echo ($qual_check_8 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_9">Road Test (copy on file)</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_9">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_9_yes" name="qual_check_9" type="radio" value="Yes" <?php echo ($qual_check_9 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_9_no" name="qual_check_9" type="radio" value="No" <?php echo ($qual_check_9 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_10">Driver Requirement(Ontario form)</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_10">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_10_yes" name="qual_check_10" type="radio" value="Yes" <?php echo ($qual_check_10 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_10_no" name="qual_check_10" type="radio" value="No" <?php echo ($qual_check_10 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_11">Certificate of compliance</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_11">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_11_yes" name="qual_check_11" type="radio" <?php echo ($qual_check_11 == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_11_no" name="qual_check_11" type="radio" <?php echo ($qual_check_11 == 'No')?'checked':'';?> value="No" class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_12">Photocopy of Police Criminal Search</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_12">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_12_yes" name="qual_check_12" type="radio" value="Yes" <?php echo ($qual_check_12 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_12_no" name="qual_check_12" type="radio" value="No" <?php echo ($qual_check_12 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_13"> Authorization Letter</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_13">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_13_yes" name="qual_check_13" type="radio" value="Yes" <?php echo ($qual_check_13 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_13_no" name="qual_check_13" type="radio" value="No" <?php echo ($qual_check_13 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_14">Security policy</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_14"></label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_14_yes" name="qual_check_14" type="radio" value="Yes" <?php echo ($qual_check_14 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_14_no" name="qual_check_14" type="radio" value="No" <?php echo ($qual_check_14 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Written Tests</label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_15">Security policy</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_15">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_15_s" id="w6-qual_check_15_s" autocomplete="off" value="<?php echo $qual_check_15_s;?>" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_15">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_15">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_15_yes" name="qual_check_15" type="radio" value="Yes" <?php echo (!is_array($qual_check_15))?(($qual_check_15 == 'Yes')?'checked':''):(($qual_check_15[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_15_no" name="qual_check_15" type="radio" value="No" <?php echo (!is_array($qual_check_15))?(($qual_check_15 == 'No')?'checked':''):(($qual_check_15[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_16">Dangerous Goods Test</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_16">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_16_s" id="w6-qual_check_16_s" value="<?php echo $qual_check_16_s;?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_16">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_16">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_16_yes" name="qual_check_16" type="radio" value="Yes" <?php echo (!is_array($qual_check_16))?(($qual_check_16 == 'Yes')?'checked':''):(($qual_check_16[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_16_no" name="qual_check_16" type="radio" value="No" <?php echo (!is_array($qual_check_16))?(($qual_check_16 == 'No')?'checked':''):(($qual_check_16[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_17"> Hours of Service</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_17">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_17_s" value="<?php echo $qual_check_17_s;?>" id="w6-qual_check_17_s" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_17">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_17">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_17_yes" name="qual_check_17" type="radio" value="Yes" <?php echo (!is_array($qual_check_17))?(($qual_check_17 == 'Yes')?'checked':''):(($qual_check_17[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_17_no" name="qual_check_17" type="radio" value="No" <?php echo (!is_array($qual_check_17))?(($qual_check_17 == 'No')?'checked':''):(($qual_check_17[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_18">Vehicle Inspection</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_18">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_18_s" id="w6-qual_check_18_s" value="<?php echo $qual_check_18_s;?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_18">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_18">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_18_yes" name="qual_check_18" type="radio" value="Yes" <?php echo (!is_array($qual_check_18))?(($qual_check_18 == 'Yes')?'checked':''):(($qual_check_18[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_18_no" name="qual_check_18" type="radio" value="No" <?php echo (!is_array($qual_check_18))?(($qual_check_18 == 'No')?'checked':''):(($qual_check_18[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_19">Load Security</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_19">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_19_s" value="<?php echo $qual_check_19_s;?>" id="w6-qual_check_19_s" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_19">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_19">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_19_yes" name="qual_check_19" type="radio" value="Yes" <?php echo (!is_array($qual_check_19))?(($qual_check_19 == 'Yes')?'checked':''):(($qual_check_19[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_19_no" name="qual_check_19" type="radio" value="No" <?php echo (!is_array($qual_check_19))?(($qual_check_19 == 'No')?'checked':''):(($qual_check_19[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-qual_check_20">Accident Reporting</label>
                                <label class="col-sm-1 control-label" for="w6-qual_check_20">Score:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qual_check_20_s" value="<?php echo $qual_check_20_s;?>" id="w6-qual_check_20_s" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-qual_check_20">%</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_20">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_20_yes" name="qual_check_20" type="radio" value="Yes" <?php echo (!is_array($qual_check_20))?(($qual_check_20 == 'Yes')?'checked':''):(($qual_check_20[1] == 'Yes')?'checked':'');?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_20_no" name="qual_check_20" type="radio" value="No" <?php echo (!is_array($qual_check_20))?(($qual_check_20 == 'No')?'checked':''):(($qual_check_20[1] == 'No')?'checked':'');?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Drug & Alcohol</label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_21">Pre-Employment Notification</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_21">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_21_yes" name="qual_check_21" type="radio" value="Yes" <?php echo ($qual_check_21 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_21_no" name="qual_check_21" type="radio" value="No" <?php echo ($qual_check_21 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_22">Drug & Alcohol Statement</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_22">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_22_yes" name="qual_check_22" type="radio" value="Yes" <?php echo ($qual_check_22 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_22_no" name="qual_check_22" type="radio" value="No" <?php echo ($qual_check_22 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_23">Drug & Alcohol Policy Receipt</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_23">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_23_yes" name="qual_check_23" type="radio" value="Yes" <?php echo ($qual_check_23 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_23_no" name="qual_check_23" type="radio" value="No" <?php echo ($qual_check_23 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_24">Drug & Alcohol Orientation</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_24">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_24_yes" name="qual_check_24" type="radio" value="Yes" <?php echo ($qual_check_24 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_24_no" name="qual_check_24" type="radio" value="No" <?php echo ($qual_check_24 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_25">Drug & Alcohol References-(3 years)</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_25">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_25_yes" name="qual_check_25" type="radio" value="Yes" <?php echo ($qual_check_25 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_25_no" name="qual_check_25" type="radio" value="No" <?php echo ($qual_check_25 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_26">Pre-Employment Drug Test</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_26">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_26_yes" name="qual_check_26" type="radio" value="Yes" <?php echo ($qual_check_26 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_26_no" name="qual_check_26" type="radio" value="No" <?php echo ($qual_check_26 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Owner Operator Checklist</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_27">Copy of Vehicle ownership</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_27">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_27_yes" name="qual_check_27" type="radio" value="Yes" <?php echo ($qual_check_27 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_27_no" name="qual_check_27" type="radio" value="No" <?php echo ($qual_check_27 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_28"> Copy of Vehicle Annual safety</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_28">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_28_yes" name="qual_check_28" type="radio" value="Yes" <?php echo ($qual_check_28 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_28_no" name="qual_check_28" type="radio" value="No" <?php echo ($qual_check_28 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_29">Copy of current emissions test</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_29">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_29_yes" name="qual_check_29" type="radio" value="Yes" <?php echo ($qual_check_29 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_29_no" name="qual_check_29" type="radio" value="No" <?php echo ($qual_check_29 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_30">Copy of bill of sale/lease agreement</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_30">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_30_yes" name="qual_check_30" type="radio" value="Yes" <?php echo ($qual_check_30 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_30_no" name="qual_check_30" type="radio" value="No" <?php echo ($qual_check_30 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_31">Copy of business/GST registration</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_31">Obtained</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_31_yes" name="qual_check_31" type="radio" value="Yes"  <?php echo ($qual_check_31 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_31_no" name="qual_check_31" type="radio" value="No" <?php echo ($qual_check_31 == 'No')?'checked':'';?>  class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_32">Copy of signed O/O Agreement/Contract</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_32">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_32_yes" name="qual_check_32" type="radio" value="Yes" <?php echo ($qual_check_32 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_32_no" name="qual_check_32" type="radio" value="No" <?php echo ($qual_check_32 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="w6-qual_check_33">WSIB Registration (Independent Operator)</label>
                                <label class="col-sm-2 control-label" for="w6-qual_check_33">Completed</label>
                                <div class="col-sm-4">
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_33_yes" name="qual_check_33" type="radio" value="Yes" <?php echo ($qual_check_33 == 'Yes')?'checked':'';?> required="" class="valid">
                                            <label for="w6-road_test">Yes</label>
                                        </div>
                                        <div class="radio-custom radio-info">
                                            <input id="qual_check_33_no" name="qual_check_33" type="radio" value="No" <?php echo ($qual_check_33 == 'No')?'checked':'';?> class="valid">
                                            <label for="w6-road_testo">No</label>
                                        </div>
                                </div>
                            </div>
                        </div> 

                        <div id="w6-profile" class="tab-pane">
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-position_applied">Position Applied for</label>
                                <div class="col-sm-3">
                                	<select class="form-control" name="position_applied" id="w6-position_applied" required>
                                        <option value="">Select Position</option>
                                        <option value="local" <?php echo ($position_applied == 'local')?'Selected':'';?> >City Driver</option>
                                        <option value="long_haul" <?php echo ($position_applied == 'long_haul')?'Selected':'';?> >long haul</option>
                                        <option value="owner_operator" <?php echo ($position_applied == 'owner_operator')?'Selected':'';?> >Owner Operator</option>
                                        <option value="driver_of_owner" <?php echo ($position_applied == 'driver_of_owner')?'Selected':'';?> >Driver Of Owner Operator</option>
                                    </select>
                            	</div>
                                <div id="owner_wsib" style="margin-bottom: 15px;"></div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-cvor_date">CVOR Date</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-cvor_date" value="<?php echo $cvor_date;?>" name="cvor_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-passport">Passport</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="passport_yes" name="passport" type="radio" <?php echo ($passport == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                        <label for="w6-road_test">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="passport_no" name="passport" type="radio" <?php echo ($passport == 'No')?'checked':'';?> value="No" class="valid">
                                        <label for="w6-road_testo">No</label>
                                    </div>
                                </div>
                                <div id="passport_detail" style="margin-bottom:15px;"></div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-road_test">Road Test</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="road_test_yes" name="road_test" type="radio" <?php echo ($road_test == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                        <label for="w6-road_test">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="road_test_no" name="road_test" type="radio" <?php echo ($road_test == 'No')?'checked':'';?> value="No" class="valid">
                                        <label for="w6-road_testo">No</label>
                                    </div>
                                </div>
                            	<label class="col-sm-2 control-label" for="w6-police_report">Police Report</label>
                                <div class="col-sm-1">
                                    <div class="radio-custom radio-info">
                                        <input id="police_report_yes" name="police_report" type="radio" <?php echo ($police_report == 'Yes')?'checked':'';?> value="Yes" required="" class="valid">
                                        <label for="legal_right_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="police_report_no" name="police_report" type="radio" <?php echo ($police_report == 'No')?'checked':'';?> value="No" class="valid">
                                        <label for="legal_right_no">No</label>
                                    </div>
                                </div>
                                <div id="police_report_date" style="margin-bottom: 15px;"></div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-first_name">First Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name?>" id="w6-first_name" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-middle_name">Middle Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="middle_name" id="w6-middle_name" value="<?php echo $middle_name;?>" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-last_name">Last Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="last_name" id="w6-last_name" value="<?php echo $last_name;?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-email">Email</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="email" id="w6-email" value="<?php echo $email;?>" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-sin">SIN</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="sin" id="w6-sin" value="<?php echo $sin;?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-social_sec_no">Social Security Number</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="social_sec_no" id="w6-social_sec_no" value="<?php echo $social_sec_no;?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">License Details</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_no">License Number</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_license_no" id="w6-emp_license_no" value="<?php echo $emp_license_no;?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_state">State</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_license_state" id="w6-emp_license_state" required>
                                        <option value="">Select State</option>
                                        <option value="AB" <?php echo ($emp_license_state=='AB')?'Selected':'';?> >Alberta</option>
                                        <option value="BC" <?php echo ($emp_license_state=='BC')?'Selected':'';?> >British Columbia</option>
                                        <option value="MB" <?php echo ($emp_license_state=='MB')?'Selected':'';?> >Manitoba</option>
                                        <option value="NB" <?php echo ($emp_license_state=='NB')?'Selected':'';?> >New Brunswick</option>
                                        <option value="NL" <?php echo ($emp_license_state=='NL')?'Selected':'';?> >Newfoundland and Labrador</option>
                                        <option value="NT" <?php echo ($emp_license_state=='NT')?'Selected':'';?> >Northwest Territories</option>
                                        <option value="NS" <?php echo ($emp_license_state=='NS')?'Selected':'';?> >Nova Scotia</option>
                                        <option value="NU" <?php echo ($emp_license_state=='NU')?'Selected':'';?> >Nunavut</option>
                                        <option value="ON" <?php echo ($emp_license_state=='ON')?'Selected':'';?> >Ontario</option>
                                        <option value="PE" <?php echo ($emp_license_state=='PE')?'Selected':'';?> >Prince Edward Island</option>
                                        <option value="QC" <?php echo ($emp_license_state=='QC')?'Selected':'';?> >Quebec</option>
                                        <option value="SK" <?php echo ($emp_license_state=='SK')?'Selected':'';?> >Saskatchewan</option>
                                        <option value="YT" <?php echo ($emp_license_state=='YT')?'Selected':'';?> >Yukon Territory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_org_date">Date of Obtaining License</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $emp_license_org_date;?>" id="emp_license_org_date" name="emp_license_org_date" required="">
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_exp_date">Expiry Date</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="emp_license_exp_date" value="<?php echo $emp_license_exp_date;?>" name="emp_license_exp_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_class">License Class</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_license_class" id="w6-emp_license_class" required>
                                        <option value="">Select Class</option>
                                        <option value="C-Class" <?php echo ($emp_license_class == 'C-Class')?'Selected':'';?> >C-Class</option>
                                        <option value="AZ" <?php echo ($emp_license_class == 'AZ')?'Selected':'';?> >AZ</option>
                                        <option value="DZ" <?php echo ($emp_license_class == 'DZ')?'Selected':'';?> >DZ</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_restrictions">Restrictions</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_license_restrictions" value="<?php echo $emp_license_restrictions;?>" id="w6-emp_license_restrictions" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_endrosments">License Endorsements</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_license_endrosments" id="w6-emp_license_endrosments" value="<?php echo $emp_license_endrosments;?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Provide your residency for last 3 years</label>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-crt-add">Current Address Details</label>
                                    <input type="hidden" id="prv_add_no" name="prv_add_no" value="<?php echo $prv_add_no?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label" for="w6-current_address">Address</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" name="current_address" id="w6-current_address" value="<?php echo $current_address?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label" for="w6-current_street">Street</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_street" id="w6-current_street" value="<?php echo $current_street?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-current_city">City</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_city" id="w6-current_city" value="<?php echo $current_city?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-1 control-label" for="w6-current_province">Province</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="current_province" id="w6-current_province" required>
                                        <option value="">Select State</option>
                                        <option value="AB" <?php echo ($current_province=='AB')?'Selected':'';?> >Alberta</option>
                                        <option value="BC" <?php echo ($current_province=='BC')?'Selected':'';?> >British Columbia</option>
                                        <option value="MB" <?php echo ($current_province=='MB')?'Selected':'';?> >Manitoba</option>
                                        <option value="NB" <?php echo ($current_province=='NB')?'Selected':'';?> >New Brunswick</option>
                                        <option value="NL" <?php echo ($current_province=='NL')?'Selected':'';?> >Newfoundland and Labrador</option>
                                        <option value="NT" <?php echo ($current_province=='NT')?'Selected':'';?> >Northwest Territories</option>
                                        <option value="NS" <?php echo ($current_province=='NS')?'Selected':'';?> >Nova Scotia</option>
                                        <option value="NU" <?php echo ($current_province=='NU')?'Selected':'';?> >Nunavut</option>
                                        <option value="ON" <?php echo ($current_province=='ON')?'Selected':'';?> >Ontario</option>
                                        <option value="PE" <?php echo ($current_province=='PE')?'Selected':'';?> >Prince Edward Island</option>
                                        <option value="QC" <?php echo ($current_province=='QC')?'Selected':'';?> >Quebec</option>
                                        <option value="SK" <?php echo ($current_province=='SK')?'Selected':'';?> >Saskatchewan</option>
                                        <option value="YT" <?php echo ($current_province=='YT')?'Selected':'';?> >Yukon Territory</option>
                                	</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-current_postal_code">Postal Code</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_postal_code" id="w6-current_postal_code" value="<?php echo $current_postal_code?>" data-plugin-maxlength="" maxlength="15 autocomplete="off" required="">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-current_duration">How Long? (years/months)</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_duration" id="w6-current_duration" value="<?php echo $current_duration;?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div id="prvs_add_div" style="margin-bottom: 15px;"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_prv_add_btn" class="btn btn-primary" style="background: #357ebd !important;">Add Previous Address</button>
                                        <button type="button" id="dlt_prv_add_btn" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Previous Address</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="w6-application" class="tab-pane ">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-current_phone">Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="current_phone" value="<?php echo $current_phone?>" id="w6-current_phone" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-home_phone">Home No</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="home_phone" value="<?php echo $home_phone;?>" id="w6-home_phone" autocomplete="off">
                                </div>
                            </div>
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-emergency_contact_relation">Emergency Contact Name &amp; relationship</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="emergency_contact_relation" value="<?php echo $emergency_contact_relation;?>" id="w6-emergency_relation" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-emergency_contact_phone">Emergency contact Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="emergency_contact_phone" value="<?php echo $emergency_contact_phone;?>" id="w6-emergency_contact_phone" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-witness_name">Witness Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="witness_name" value="<?php echo $witness_name;?>" id="w6-witness_name" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-topic">Topic</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="topic" id="w6-topic" value="<?php echo $topic;?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                            	
                                <label class="col-sm-2 control-label" for="w6-medical_due_date">Medical Due Date</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control default-date-picker" id="w6-medical_due_date" value="<?php echo $medical_due_date;?>" name="medical_due_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-defensive_driving">Defensive Driving?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="defensive_driving_yes" name="defensive_driving" type="radio" <?php echo ($defensive_driving=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="defensive_driving_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="defensive_driving_no" name="defensive_driving" type="radio" <?php echo ($defensive_driving=='No')?'checked':''?> value="No">
                                        <label for="defensive_driving_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label" for="w6-road_evalution">Road Evalution?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="road_evalution_yes" name="road_evalution" type="radio" <?php echo ($road_evalution=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="road_evalution_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="road_evalution_no" name="road_evalution" type="radio" <?php echo ($road_evalution=='No')?'checked':''?> value="No">
                                        <label for="road_evalution_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-3 control-label" for="w6-province_insurance">Out of Province Insurance?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="province_insurance_yes" name="province_insurance" type="radio" <?php echo ($province_insurance=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="province_insurance_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="province_insurance_no" name="province_insurance" type="radio" <?php echo ($province_insurance=='No')?'checked':''?> value="No">
                                        <label for="province_insurance_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-legal_right">Do you have the legal right to work in United State?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="legal_right_yes" name="legal_right" type="radio"  <?php echo ($legal_right=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="legal_right_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="legal_right_no" name="legal_right" type="radio" <?php echo ($legal_right=='No')?'checked':''?> value="No">
                                        <label for="legal_right_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-dob">Date of Birth</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="dob" value="<?php echo $dob;?>" name="dob" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-provide_age_proof">Can you provide proof of age?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="provide_age_proof_yes" name="provide_age_proof" <?php echo ($provide_age_proof=='Yes')?'checked':''?> type="radio" value="Yes" required="">
                                        <label for="provide_age_proof_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="provide_age_proof_no" name="provide_age_proof" <?php echo ($provide_age_proof=='No')?'checked':''?> type="radio" value="No">
                                        <label for="provide_age_proof_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-worked_before">Have you worked for this company before?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="worked_before_yes" name="worked_before" <?php echo ($worked_before=='Yes')?'checked':''?> type="radio" value="Yes" required="">
                                        <label for="worked_before_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="worked_before" name="worked_before" <?php echo ($worked_before=='No')?'checked':''?> type="radio" value="No">
                                        <label for="worked_before_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div id="wrk_div" style="margin-bottom: 15px;"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-employment_status">Are you now employed?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="employment_status_yes" name="employment_status" <?php echo ($employment_status=='Yes')?'checked':''?> type="radio" value="Yes" required="">
                                        <label for="employment_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="employment_status_no" name="employment_status" <?php echo ($employment_status=='No')?'checked':''?> type="radio" value="No">
                                        <label for="employment_status_no">No</label>
                                    </div>
                                </div>
                                <div id="emply_status"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-who_referred">Who referred you?</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="who_referred" id="w6-who_referred" value="<?php echo $who_referred?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-pay_rate_expected">Rate of Pay Expected</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="pay_rate_expected" id="w6-pay_rate_expected" value="<?php echo $pay_rate_expected?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-bond_status">Have you ever been bonded?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="bond_yes" name="bond_status" type="radio" <?php echo ($bond_status=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="bond_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="bond_no" name="bond_status" type="radio" <?php echo ($bond_status=='No')?'checked':''?> value="No">
                                        <label for="bond_no">No</label>
                                    </div>
                                </div>
                                <div id="bond_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-felony_status">Have you ever been convicted of a felony?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="felony_yes" name="felony_status" <?php echo ($felony_status=='Yes')?'checked':''?> type="radio" value="Yes" required="">
                                        <label for="felony_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="felony_no" name="felony_status" <?php echo ($felony_status=='No')?'checked':''?> type="radio" value="No">
                                        <label for="felony_no">No</label>
                                    </div>
                                </div>
                                <div id="felony_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-performance_status">Is there any reason you might be unable to perform the functions of the job which you have applied for [as described in the attached job description]</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="performance_status_yes" name="performance_status" <?php echo ($performance_status=='Yes')?'checked':''?> type="radio" value="Yes" required="">
                                        <label for="performance_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="performance_status_no" name="performance_status" <?php echo ($performance_status=='No')?'checked':''?> type="radio" value="No">
                                        <label for="performance_status_no">No</label>
                                    </div>
                                </div>
                                <div id="performance_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-fast_driver_status">Are you a FAST approved driver?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="fast_driver_status_yes" name="fast_driver_status" type="radio" <?php echo ($fast_driver_status=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="fast_driver_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="fast_driver_status_no" name="fast_driver_status" type="radio" <?php echo ($fast_driver_status=='No')?'checked':''?> value="No">
                                        <label for="fast_driver_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div id="fast_driver_status" style="margin-bottom: 15px;"></div>
                            <div id="will_status"></div>
                        </div>
                        <div id="w6-employment_history" class="tab-pane">
                            <input type="hidden" id="prv_empl_his_no" name="prv_empl_his_no">
                            <div id="empl_his_div" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Provide your employment history for last 3 to 7 years (if any)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_prv_emp_btn" class="btn btn-primary" style="background: #357ebd !important;">Add Employment Details</button>
                                        <button type="button" id="dlt_prv_emp_btn" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Employment Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w6-acc_trff_rcd" class="tab-pane">
                            <input type="hidden" id="prv_acc_his_no" name="prv_acc_his_no">
                            <input type="hidden" id="prv_traffic_conviv_no" name="prv_traffic_conviv_no">
                            <div id="acc_rcd_div" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Provide your accident history for last 3 years (if any)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_prv_acc_btn" class="btn btn-primary" style="background: #357ebd !important;">Add Accident Details</button>
                                        <button type="button" id="dlt_prv_acc_btn" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Accident Details</button>
                                    </div>
                                </div>
                            </div>
                            <div id="prv_traffic_conviv" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Provide your Traffic Convivtions for last 3 years (if any)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_prv_traffic_conviv" class="btn btn-primary" style="background: #357ebd !important;">Add Traffic Convivtions</button>
                                        <button type="button" id="dlt_prv_traffic_conviv" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Traffic Convivtions</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w6-drv_exp" class="tab-pane">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_edu_details">Education Details</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_highest_grade">Highest Grade Completed</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_highest_grade" id="w6-emp_highest_grade" required>
                                        <option value="">Select Highest Grade</option>
                                        <option value="1" <?php echo ($emp_highest_grade == '1')?'Selected':'';?> >1</option>
                                        <option value="2" <?php echo ($emp_highest_grade == '2')?'Selected':'';?> >2</option>
                                        <option value="3" <?php echo ($emp_highest_grade == '3')?'Selected':'';?> >3</option>
                                        <option value="4" <?php echo ($emp_highest_grade == '4')?'Selected':'';?> >4</option>
                                        <option value="5" <?php echo ($emp_highest_grade == '5')?'Selected':'';?> >5</option>
                                        <option value="6" <?php echo ($emp_highest_grade == '6')?'Selected':'';?> >6</option>
                                        <option value="7" <?php echo ($emp_highest_grade == '7')?'Selected':'';?> >7</option>
                                        <option value="8" <?php echo ($emp_highest_grade == '8')?'Selected':'';?> >8</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_high_school">High School</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_high_school" id="w6-emp_high_school" required>
                                        <option value="">Select High School</option>
                                        <option value="1" <?php echo ($emp_high_school == '1')?'Selected':'';?> >1</option>
                                        <option value="2" <?php echo ($emp_high_school == '2')?'Selected':'';?> >2</option>
                                        <option value="3" <?php echo ($emp_high_school == '3')?'Selected':'';?> >3</option>
                                        <option value="4" <?php echo ($emp_high_school == '4')?'Selected':'';?> >4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_college">College</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_college" id="w6-emp_college" required>
                                        <option value="">Select College</option>
                                        <option value="1" <?php echo ($emp_college == '1')?'Selected':'';?> >1</option>
                                        <option value="2" <?php echo ($emp_college == '2')?'Selected':'';?> >2</option>
                                        <option value="3" <?php echo ($emp_college == '3')?'Selected':'';?> >3</option>
                                        <option value="4" <?php echo ($emp_college == '4')?'Selected':'';?> >4</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_last_school">Name of Last School Attended</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_last_school" value="<?php echo $emp_last_school?>" id="w6-emp_last_school" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_skl_complete_address">Last School's Complete Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_skl_complete_address" value="<?php echo $emp_skl_complete_address?>" id="w6-emp_skl_complete_address" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_drv_exp">Driving Experience</label>
                            </div>
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-condensed mb-none">
                                            <thead>
                                                <tr>
                                                    <th style="width: 40%;">Class of Equipment</th>
                                                    <th style="width: 15%;">Type</th>
                                                    <th style="width: 15%;">From</th>
                                                    <th style="width: 15%;">To</th>
                                                    <th style="width: 15%;">Approx. Miles</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                                                        <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de1">Straight Truck</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de1" class="de" name="status_de1" <?php echo ($status_de[0]=='Yes')?'checked':''?>  type="radio" value="Yes" required="">
                                                                    <label for="status_de1">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de1" class="de" name="status_de1" <?php echo ($status_de[0]=='No')?'checked':''?> type="radio" value="No">
                                                                    <label for="status_de1">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de1"></td>
                                                        <td data-title="From" id="td_from_de1"></td>
                                                        <td data-title="To" id="td_to_de1"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de1"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de2">Tractor and Semi Trailer</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de2" class="de" name="status_de2" type="radio" <?php echo ($status_de[1]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de2">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de2" class="de" name="status_de2" type="radio" <?php echo ($status_de[1]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de2">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de2"></td>
                                                        <td data-title="From" id="td_from_de2"></td>
                                                        <td data-title="To" id="td_to_de2"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de2"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de3">Tractor Two Trailers</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de3" class="de" name="status_de3" type="radio" <?php echo ($status_de[2]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de3">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de3" class="de" name="status_de3" type="radio" <?php echo ($status_de[2]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de3">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de3"></td>
                                                        <td data-title="From" id="td_from_de3"></td>
                                                        <td data-title="To" id="td_to_de3"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de3"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de4">Tractor Three Trailers</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de4" class="de" name="status_de4" type="radio" <?php echo ($status_de[3]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de4">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de4" class="de" name="status_de4" type="radio" <?php echo ($status_de[3]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de4">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de4"></td>
                                                        <td data-title="From" id="td_from_de4"></td>
                                                        <td data-title="To" id="td_to_de4"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de4"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de5">Motorcoach School Bus (More than 8 Passengers)</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de5" class="de" name="status_de5" type="radio" <?php echo ($status_de[4]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de5">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de5" class="de" name="status_de5" type="radio" <?php echo ($status_de[4]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de5">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de5"></td>
                                                        <td data-title="From" id="td_from_de5"></td>
                                                        <td data-title="To" id="td_to_de5"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de5"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de6">Motorcoach School Bus (More than 15 Passengers)</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de6" class="de" name="status_de6" type="radio" <?php echo ($status_de[5]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de6">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de6" class="de" name="status_de6" type="radio" <?php echo ($status_de[5]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de6">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de6"></td>
                                                        <td data-title="From" id="td_from_de6"></td>
                                                        <td data-title="To" id="td_to_de6"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de6"></td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Class of Equipment">
                                                            <label class="col-sm-8 control-label" for="w6-status_de7">Other</label>
                                                            <div class="col-sm-4">
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de7" class="de" name="status_de7" type="radio" <?php echo ($status_de[6]=='Yes')?'checked':''?> value="Yes" required="">
                                                                    <label for="status_de7">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de7" class="de" name="status_de7" type="radio" <?php echo ($status_de[6]=='No')?'checked':''?> value="No">
                                                                    <label for="status_de7">No</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-title="Type" id="td_type_de7"></td>
                                                        <td data-title="From" id="td_from_de7"></td>
                                                        <td data-title="To" id="td_to_de7"></td>
                                                        <td data-title="Approx. Miles" id="td_miles_de7"></td>
                                                    </tr>
                                                                                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_pro_state_list">List Provinces &amp; States Operated in Last 5 Years</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_pro_state_list" value="<?php echo $emp_pro_state_list?>" id="w6-emp_pro_state_list" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_spl_cor">Show special Courses or Training that will help you as a driver</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_spl_cor" id="w6-emp_spl_cor" value="<?php echo $emp_spl_cor?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_awards">Which safe driving awards do you hold and from whom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_awards" id="w6-emp_awards" value="<?php echo $emp_awards?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_den_license"> A.Have you ever been denied a license, permit or privilege to operate a motor vehicle?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_den_license_yes" name="emp_den_license" type="radio" <?php echo ($emp_den_license=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="emp_den_license_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_den_license_no" name="emp_den_license" type="radio" <?php echo ($emp_den_license=='No')?'checked':''?> value="No">
                                        <label for="emp_den_license_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_per"> B.Has any license, permit or privilege ever been suspended or revoked?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_license_per_yes" name="emp_license_per" type="radio" <?php echo ($emp_license_per=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="emp_license_per_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_license_per_no" name="emp_license_per" type="radio" <?php echo ($emp_license_per=='No')?'checked':''?> value="No">
                                        <label for="emp_license_per_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_exp_us_commercial">IF THE ANSWER TO EITHER A OR B YES, GIVE DETAILS?</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_exp_us_commercial" id="w6-emp_exp_us_commercials" value="<?php echo $emp_exp_us_commercial?>" autocomplete="off" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_drv_exp-others">Experience - Others</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_other_trk_exp">Show any trucking, transportation or other experience that may help your work for this company</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_other_trk_exp" id="w6-emp_other_trk_exp" value="<?php echo $emp_other_trk_exp?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_cor_tra_list">List courses and training other then as shown elsewhere in this application</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_cor_tra_list" id="w6-emp_cor_tra_list" value="<?php echo $emp_cor_tra_list?>" autocomplete="off" required="">
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_spl_equ_list">List special equipment or technical materials you can work with (Other than those already shown)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_spl_equ_list" id="w6-emp_spl_equ_list" value="<?php echo $emp_spl_equ_list?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label" for="w6-emp_drug_test_status">Have you ever tested positive, or refused to test, on any pre-employment drug or alcohol test administrated by an employer to which the employee applied for, but did not obtain safety-sensitive transportation work covered by DOT agency drug and alcohol testing rules during the past three years?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_drug_test_status_yes" name="emp_drug_test_status" type="radio" <?php echo ($emp_drug_test_status=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="emp_drug_test_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_drug_test_status_no" name="emp_drug_test_status" type="radio" <?php echo ($emp_drug_test_status=='No')?'checked':''?> value="No">
                                        <label for="emp_drug_test_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w6-emp_duty_drg_details" class="tab-pane">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_drv_exp">Driving Experience</label>
                            </div>
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-condensed mb-none">
                                            <thead>
                                                <tr>
                                                    <th style="width: 33%;" class="center">Day</th>
                                                    <th style="width: 33%;" class="center">Date</th>
                                                    <th style="width: 33%;" class="center">Hours Worked</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                                                        <tr>
                                                        <td data-title="Day" class="center">
                                                            Yesterday                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_1?>" id="work_date_1" name="work_date_1" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_1" value="<?php echo $hours_worked1?>" id="w6-hours_worked_1" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            2                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_2?>" id="work_date_2" name="work_date_2" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_2" id="w6-hours_worked_2" value="<?php echo $hours_worked2?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            3                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker"  value="<?php echo $work_date_3?>" id="work_date_3" name="work_date_3" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_3" id="w6-hours_worked_3" value="<?php echo $hours_worked3?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            4                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_4?>" id="work_date_4" name="work_date_4" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_4" id="w6-hours_worked_4" value="<?php echo $hours_worked4?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            5                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_5?>" id="work_date_5" name="work_date_5" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_5" id="w6-hours_worked_5" value="<?php echo $hours_worked5?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            6                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_6?>" id="work_date_6" name="work_date_6" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_6" id="w6-hours_worked_6" value="<?php echo $hours_worked6?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            7                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_7?>" id="work_date_7" name="work_date_7" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_7" id="w6-hours_worked_7" value="<?php echo $hours_worked7?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            8                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_8?>" id="work_date_8" name="work_date_8" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_8" id="w6-hours_worked_8" value="<?php echo $hours_worked8?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            9                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_9?>" id="work_date_9" name="work_date_9" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_9" id="w6-hours_worked_9" value="<?php echo $hours_worked9?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            10                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_10?>" id="work_date_10" name="work_date_10" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_10" id="w6-hours_worked_10" value="<?php echo $hours_worked10?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            11                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_11?>" id="work_date_11" name="work_date_11" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_11" id="w6-hours_worked_11" value="<?php echo $hours_worked11?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            12                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_12?>" id="work_date_12" name="work_date_12" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_12" id="w6-hours_worked_12" value="<?php echo $hours_worked12?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            13                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_13?>" id="work_date_13" name="work_date_13" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_13" id="w6-hours_worked_13" value="<?php echo $hours_worked13?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                            <tr>
                                                        <td data-title="Day" class="center">
                                                            14                                                                            </td>
                                                        <td data-title="Date">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $work_date_14?>" id="work_date_14" name="work_date_14" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_14" id="w6-hours_worked_14" value="<?php echo $hours_worked14?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                                                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-reliev_details">Last relieved from work at</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">From</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                    	<span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                        <input type="text" class="form-control "  name="emp_last_reliev_from"  id="emp_last_reliev_from" required="">
                                    </div>
                                </div>
                                <label class="col-md-3 control-label">To</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                        <input type="text" class="form-control"  name="emp_last_reliev_to" id="emp_last_reliev_to" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-dob">On</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $emp_last_reliev_on?>" id="emp_last_reliev_on" name="emp_last_reliev_on" required="">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="emp_drug_test_his_no" name="emp_drug_test_his_no">
                            <div id="emp_drug_test_div" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_drug_test">DRUG &amp; ALCOHOL TEST RESULTS or any other violation (if any in last 6 months).</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_emp_drug_test_btn" class="btn btn-primary" style="background: #357ebd !important;">Add Drug &amp; Alcohol Test Details</button>
                                        <button type="button" id="dlt_emp_drug_test_btn" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Drug &amp; Alcohol Test Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w6-emp_profile" class="tab-pane">
                           
                            <input type="hidden" id="emp_claim_his_no" name="emp_claim_his_no">
                            <div id="emp_claim_div" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_emp_claim">Claims History (Please describe all accidents you were involved in for the last 3 years regardless of fault)</label>
                                </div>
                            </div>
                            <div class="form-group" id="emp_claim_comments_div" style="margin-bottom: 15px;"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="add_emp_claim_btn" class="btn btn-primary" style="background: #357ebd !important;">Add Claim Details</button>
                                        <button type="button" id="dlt_emp_claim_btn" class="btn btn-primary" style="background: #357ebd !important; display: none;">Delete Claim Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label" for="w6-emp_curr_work_status">Are you currently working for another employer?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_curr_work_status_yes" name="emp_curr_work_status" type="radio" <?php echo ($emp_curr_work_status=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="emp_curr_work_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_curr_work_status_no" name="emp_curr_work_status" type="radio" <?php echo ($emp_curr_work_status=='No')?'checked':''?> value="No">
                                        <label for="emp_curr_work_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label" for="w6-emp_another_emply_status">At this time do you intend to work for another employer while still employed by this company?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_another_emply_status_yes" name="emp_another_emply_status" type="radio" <?php echo ($emp_another_emply_status=='Yes')?'checked':''?> value="Yes" required="">
                                        <label for="emp_another_emply_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_another_emply_status_no" name="emp_another_emply_status" type="radio" <?php echo ($emp_another_emply_status=='No')?'checked':''?> value="No">
                                        <label for="emp_another_emply_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <?php if(!isset($driver_update)): ?>
                    <input type="submit" name="submit">
                    <?php else: ?>
                        <input type="submit" name="submit" value="Update">
                    <?php endif; ?> -->

                    <div class="panel-footer" style="background-color: #FFFFFF;">
                        <ul class="pager">
                            <li class="previous disabled">
                                <a><i class="fa fa-angle-left"></i> Previous</a>
                            </li>
                            <li class="finish hidden pull-right">
                            <?php if(!isset($driver_update)): ?>
                                <input type="submit" name="submit" value="Finish" class="submit-style">
                            <?php else: ?>
                                <input type="submit" name="submit" value="Update" class="submit-style">
                            <?php endif; ?>
                            </li>
                            <li class="next">
                                <a>Next <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
<!--             <div class="panel-footer">
                <ul class="pager">
                    <li class="previous disabled">
                        <a><i class="fa fa-angle-left"></i> Previous</a>
                    </li>
                    <li class="finish hidden pull-right">
                        <a>Finish</a>
                    </li>
                    <li class="next">
                        <a>Next <i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </div> -->
        </section>
    </div>
</div>
<!-- end: page -->
<!-- Specific Page Vendor -->
<script src="<?php echo base_url(); ?>public/assets/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>public/assets/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<!-- Examples -->
        <script src="<?php echo base_url(); ?>public/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>public/assets/forms/examples.wizard.js"></script>
<script>

function test( value ){
    //var value = t;
        if(value === "Yes") {
            $("#passport_detail").empty().append('<label class="col-sm-2 control-label" for="w6-passport_number">Passport Number</label><div class="col-sm-2"><input type="text" class="form-control" name="passport_number" value="<?php echo $passport_number;?>" id="w6-passport_number" autocomplete="off" required=""></div><label class="col-sm-2 control-label" for="w6-passport_date">Passport Expire</label><div class="col-sm-2"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-passport_date" value="<?php echo $passport_date;?>" name="passport_date" required=""></div></div>');
        } else {
            $("#passport_detail").empty().append('');
        }
}        
        //var_dump($driver['emp_last_reliev_to']);
        //var_dump($driver['emp_last_reliev_from']);

function policeReportDate(value){
        if(value === "Yes") {
            $("#police_report_date").empty().append('<label class="col-sm-2 control-label" for="w6-police_report_date">POLICE REPORT DATE</label><div class="col-sm-2"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-police_report_date" name="police_report_date" value="<?php echo $police_report_date;?>" required=""></div></div>');
        } else {
            $("#police_report_date").empty().append('');
        }
}

function workedBefore(value){
        if (value === "Yes") {
            $("#wrk_div").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-worked_when">When?</label><div class="col-sm-3"><input type="text" class="form-control" name="worked_when" value="<?php echo $worked_when?>" id="w6-worked_when" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-pay_rate">Rate of Pay</label><div class="col-sm-3"><input type="text" class="form-control" name="pay_rate" value="<?php echo $pay_rate?>" id="w6-pay_rate"  autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-fron_date">From</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="from_date" name="fron_date" value="<?php echo $fron_date?>" required></div></div><label class="col-sm-3 control-label" for="w6-to_date">To</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="to_date" name="to_date" value="<?php echo $to_date?>" required></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-work_position">Position</label><div class="col-sm-3"><input type="text" class="form-control" name="work_position" value="<?php echo $work_position?>" id="w6-work_position" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-leaving_reason">Reason for Leaving?</label><div class="col-sm-3"><input type="text" class="form-control" name="leaving_reason" value="<?php echo $leaving_reason?>" id="w6-leaving_reason" autocomplete="off" required></div></div>');
        } else {
            $("#wrk_div").empty().append('');
        }
}

function employmentStatus(value){
    
        if (value === "No") {
            
            $("#emply_status").empty().append('<label class="col-sm-3 control-label" for="w6-last_employment">If not, how long since leaving last employment?</label><div class="col-sm-3"><input type="text" class="form-control" name="last_employment" value="<?php echo $last_employment?>" id="w6-last_employment" autocomplete="off" required></div>');
        } else {
           
            $("#emply_status").empty().append('');
        }
}

function bondStatus(value){
        if (value === "Yes") {
            $("#bond_status").empty().append('<label class="col-sm-3 control-label" for="w6-bonding_company">Name of Bonding Company</label><div class="col-sm-3"><input type="text" class="form-control" name="bonding_company" value="<?php echo $bonding_company?>" id="w6-bonding_company" autocomplete="off" required></div>');
        } else {
            $("#bond_status").empty().append('');
        }
}

function felonyStatus(value){
        if (value === "Yes") {
            $("#felony_status").empty().append('<label class="col-sm-4 control-label" for="w6-conviction_crime">Please explain fully on a separate sheet of paper. Conviction of a crime is not an automatic bar to employment-all circumstances will be considered</label><div class="col-sm-3"><input type="text" class="form-control" name="conviction_crime" value="<?php echo $conviction_crime;?>" id="w6-conviction_crime" autocomplete="off" required></div>');
        } else {
            $("#felony_status").empty().append('');
        }
}

function performanceStatus(value){
        if (value === "Yes") {
            $("#performance_status").empty().append('<label class="col-sm-3 control-label" for="w6-performance_reason">Please explain the reason</label><div class="col-sm-3"><input type="text" class="form-control" name="performance_reason" value="<?php echo $performance_reason?>" id="w6-performance_reason" autocomplete="off" required></div>');
        } else {
            $("#performance_status").empty().append('');
        }
}

function fastDriverStatus(value){
        if (value === "Yes") {
            $("#fast_driver_status").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-fast_card_no">Fast Card Number</label><div class="col-sm-3"><input type="text" class="form-control" name="fast_card_no" value="<?php echo $fast_card_no?>" id="w6-performance_reason" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-to_date">Expiry Date</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="fast_card_expiry" name="fast_card_expiry" value="<?php echo $fast_card_expiry;?>" required></div></div></div>');
        } else {
            $("#fast_driver_status").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-willing_status_rdo">Are you willing to apply for new one?</label><div class="col-sm-3"><div class="radio-custom radio-info"><input id="willing_status_rdo_yes" name="willing_status_rdo" type="radio" <?php echo ($willing_status_rdo=="Yes")?"checked":"";?> value="Yes" required /><label for="willing_status_rdo_yes">Yes</label></div><div class="radio-custom radio-info"><input id="willing_status_rdo_no" name="willing_status_rdo" <?php echo ($willing_status_rdo=="No")?"checked":"";?> type="radio" value="No" /><label for="willing_status_rdo_no">No</label></div></div></div>');
        }
}

function willingStatusRdo(value){
        if (value === "No") {
            $("#will_status").html('<div class="form-group"><label class="col-sm-3 control-label" for="w6-not_willing_status">Why?</label><div class="col-sm-3"><input type="text" class="form-control" name="not_willing_status" value="<?php echo $not_willing_status;?>" id="w6-not_willing_status" autocomplete="off" required></div></div>');
        } else {
            $("#will_status").html('');
        }
}



$(document).ready(function() { 
    <?php if($passport == 'Yes'): ?>
        test($("input[name=passport]:radio").val());
    <?php endif; ?>

    <?php if($police_report == 'Yes'): ?>
        policeReportDate($("input[name=police_report]:radio").val());
    <?php endif; ?>

    <?php if($worked_before == 'Yes'): ?>
        workedBefore($("input[name=worked_before]:radio").val());
    <?php endif; ?>

    <?php if($employment_status == 'No'): ?>

        employmentStatus($("input[name=employment_status]:radio").val());
    <?php endif; ?>

    <?php if($bond_status == 'Yes'): ?>

        bondStatus($("input[name=bond_status]:radio").val());
    <?php endif; ?>

    <?php if($felony_status == 'Yes'): ?>

        felonyStatus($("input[name=felony_status]:radio").val());
    <?php endif; ?>

    <?php if($performance_status == 'Yes'): ?>

        performanceStatus($("input[name=performance_status]:radio").val());
    <?php endif; ?>

    <?php if($fast_driver_status == 'Yes'): ?>

        fastDriverStatus($("input[name=fast_driver_status]:radio").val());
    <?php endif; ?>

    <?php if($fast_driver_status == 'No'): ?>

        willingStatusRdo($("input[name=willing_status_rdo]:radio").val());
    <?php endif; ?>


    ///// working ours end

<?php 
        if(is_array($status_de) && $status_de !== NULL):
        $status_count = array_filter($status_de, function($value) { return $value !== 'No'; });

        foreach ($status_count as $key => $value){

    ?>
        $(function(){

            val = $("input[name=status_de<?php echo $key+1?>]:radio").val();
            ID = "de"+"<?php echo $key+1?>";
           
        if (val === "Yes") {
            if (ID === "de5" || ID === "de6" || ID === "de7") {
                $("#td_type_" + ID + "").html('<input type="text" class="form-control" value="<?php echo $type_de[$key]?>" name="type_' + ID + '" id="w6-type_' + ID + '" autocomplete="off" required>');
            } else {
                $("#td_type_" + ID + "").html('<select class="form-control" name="type_' + ID + '" id="w6-type_' + ID + '" required><option value="" selected>Select Type</option><option value="Dump" <?php echo ($type_de[$key]=="Dump")?"Selected":"";?>>Dump</option><option value="Flat" <?php echo ($type_de[$key]=="Flat")?"Selected":"";?> >Flat</option><option  value="Reefer" <?php echo ($type_de[$key]=="Reefer")?"Selected":"";?> >Reefer</option><option value="Tank" <?php echo ($type_de[$key]=="Tank")?"Selected":"";?>>Tank</option><option value="Van" <?php echo ($type_de[$key]=="Van")?"Selected":"";?> >Van</option></select>');
            }
            $("#td_from_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $from_de[$key]?>"  id="from_' + ID + '" name="from_' + ID + '" required=""></div>');
            $("#td_to_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo $to_de[$key]?>" id="to_' + ID + '" name="to_' + ID + '" required=""></div>');
            $("#td_miles_" + ID + "").html('<input type="text" class="form-control" value="<?php echo $miles_de[$key]?>" name="miles_' + ID + '" id="w6-miles_' + ID + '" autocomplete="off" required>');
        } else {
            $("#td_type_" + ID + "").html('');
            $("#td_from_" + ID + "").html('');
            $("#td_to_" + ID + "").html('');
            $("#td_miles_" + ID + "").html('');
        }



        });
            
    <?php

        }
        endif;

    ?>

    
    ///// working ours end
 



    // dynamic pre
    //fetch Add Previous Address from DB
    <?php if($prv_add_no > 0 && $prv_add_no != ''): ?>
        $(function(){
            // var count = <?php echo $prv_add_no?>;
            <?php for($count =1; $count<=$prv_add_no ; $count++): ?>
                var count = <?php echo $count;?>;
                
            $("#prvs_add_div").append('<div id="prvs_add_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Previous Address Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_address_' + count + '">Address</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo $previous_address[$count-1]?>" name="previous_address_' + count + '" id="w6-previous_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_street_' + count + '">Street</label><div class="col-sm-3"><input type="text" class="form-control" value="<?php echo $previous_street[$count-1]?>" name="previous_street_' + count + '" id="w6-previous_street_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-previous_city_' + count + '">City</label><div class="col-sm-3"><input type="text" class="form-control" value="<?php echo $previous_city[$count-1]?>" name="previous_city_' + count + '" id="w6-previous_city_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_province_' + count + '">Province</label><div class="col-sm-3"><input type="text" class="form-control" value="<?php echo $previous_province[$count-1]?>" name="previous_province_' + count + '" id="w6-previous_province_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-previous_postal_code_' + count + '">Postal Code</label><div class="col-sm-3"><input type="text" class="form-control" value="<?php echo $previous_postal_code[$count-1]?>"name="previous_postal_code_' + count + '" id="w6-previous_postal_code_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_duration_' + count + '">How Long? (years/months)</label><div class="col-sm-3"><input type="text" class="form-control" value="<?php echo $previous_duration[$count-1]?>" name="previous_duration_' + count + '" id="w6-previous_duration_1" autocomplete="off" required></div></div></div>');
            if (count >= 1) {
                $("#dlt_prv_add_btn").show();
            }
            $("#prv_add_no").val(count);
            $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

	//fetch Add Previous Address from DB End



    //fetch Employment detail from DB
    <?php if($prv_empl_his_no > 0 && $prv_empl_his_no != ''): ?>
        $(function(){
            // var count = <?php echo $prv_add_no?>;
            <?php for($count =1; $count<=$prv_empl_his_no ; $count++): ?>
                var count = <?php echo $count;?>;

            $("#empl_his_div").append('<div id="emp_his_' + count + '" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Employment Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-is_employed_' + count + '">Employed</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="is_employed_yes_' + count + '" <?php echo ($is_employed[$count -1]=="Yes" )? "checked": ""?> name="is_employed_' + count + '" type="radio" value="Yes" required /> <label for="is_employed_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="is_employed_no_' + count + '" <?php echo ($is_employed[$count -1]=="No" )? "checked": ""?> name="is_employed_' + count + '" type="radio" value="No" /> <label for="is_employed_no_' + count + '">No</label></div></div></div><div id="is_employed_div_' + count + '" style="display: block;"><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-employer_company_name_' + count + '">Company Name</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_company_name_' + count + '" id="w6-employer_company_name_' + count + '" value="<?php echo $employer_company_name[$count-1]?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_name_' + count + '">Contact Person</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_name_' + count + '" id="w6-employer_name_' + count + '" value="<?php echo $employer_name[$count-1]?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" name="employer_address_' + count + '" id="w6-employer_address_' + count + '" value="<?php echo $employer_address[$count-1]?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_city_' + count + '" id="w6-employer_city_' + count + '" value="<?php echo $employer_city[$count-1]?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_province_' + count + '">Province</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_province_' + count + '" id="w6-employer_province_' + count + '" value="<?php echo $employer_province[$count-1]?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-emplyer_zip_' + count + '">Zip/PostalCode</label><div class="col-sm-3"> <input type="text" class="form-control" name="emplyer_zip_' + count + '" id="w6-emplyer_zip_' + count + '" value="<?php echo $emplyer_zip[$count-1]?>" autocomplete="off" required></div> <label class="col-sm-3 control-label is_employed_div_no_' + count + '" for="w6-position_held_' + count + '">Position Held</label><div class="col-sm-3 is_employed_div_no_' + count + '"> <input type="text" class="form-control" name="position_held_' + count + '" id="w6-position_held_' + count + '" value="<?php echo $position_held[$count-1]?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_number_' + count + '">Contact Number</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_number_' + count + '" id="w6-employer_number_' + count + '" value="<?php echo $employer_number[$count-1]?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-fax_no_' + count + '">Fax No</label><div class="col-sm-3"> <input type="text" class="form-control" name="fax_no_' + count + '" id="w6-fax_no_' + count + '" autocomplete="off" value="<?php echo $fax_no[$count-1]?>" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employment_fron_date_' + count + '">From</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_fron_date_' + count + '" value="<?php echo $employment_fron_date[$count-1]?>" name="employment_fron_date_' + count + '" required></div></div> <label class="col-sm-3 control-label" for="w6-employment_to_date_' + count + '">To</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_to_date_' + count + '" value="<?php echo $employment_to_date[$count-1]?>" name="employment_to_date_' + count + '" required></div></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-salary_wage_' + count + '">Salary Wage</label><div class="col-sm-3"> <input type="text" class="form-control" name="salary_wage_' + count + '" id="w6-salary_wage_' + count + '" autocomplete="off" value="<?php echo $salary_wage[$count-1]?>" required></div> <label class="col-sm-3 control-label" for="w6-employer_leaving_reason_' + count + '">Reason for Leaving?</label><div class="col-sm-3"> <input type="text" class="form-control" value="<?php echo $employer_leaving_reason[$count-1]?>" name="employer_leaving_reason_' + count + '" id="w6-employer_leaving_reason_' + count + '" autocomplete="off" required></div></div><div class="form-group employer_email_div_' + count + '"><label class="col-sm-3 control-label" for="w6-employer_email_' + count + '">Email</label><div class="col-sm-3"> <input type="email" class="form-control" value="<?php echo $employer_email[$count-1]?>" name="employer_email_' + count + '" id="w6-employer_email_' + count + '" autocomplete="off" ></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-6 control-label" for="w6-fmcsr_status_' + count + '">Were you subject to the FMCSRs** while employed?</label><div class="col-sm-6"><div class="radio-custom radio-info"> <input id="fmcsr_status_yes_' + count + '" <?php echo ($fmcsr_status[$count-1]=="Yes" )? "checked": ""?> name="fmcsr_status_' + count + '" type="radio" value="Yes" required /> <label for="fmcsr_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="fmcsr_status_no' + count + '" <?php echo ($fmcsr_status[$count -1]=="No" )? "checked": ""?> name="fmcsr_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no_' + count + '">No</label></div></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-9 control-label" for="w6-safety_sensitive_status_' + count + '">Was your job designated as a safety-sensitive function in any dot-regulated mode subject to the drug and alcohol testing requirements of 49 CRF part 40?</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="safety_sensitive_status_yes_' + count + '" <?php echo ($safety_sensitive_status[$count -1]=="Yes" )? "checked": ""?> name="safety_sensitive_status_' + count + '" type="radio" value="Yes" required /> <label for="safety_sensitive_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="safety_sensitive_status_no_' + count + '" <?php echo ($safety_sensitive_status[$count -1]=="No" )? "checked": ""?> name="safety_sensitive_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no_' + count + '">No</label></div></div></div></div></div>');

                <?php if($is_employed[$count -1] =="No" ): ?>
                        //var id = '<?php echo $count?>';
                        
                        $(".is_employed_div_no_"+count).fadeOut(300);

                <?php endif; ?>

        if (count >= 1) {
            $("#dlt_prv_emp_btn").show();
        }
        $("#prv_empl_his_no").val(count);
        $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

    //fetch Employment detail from DB End

    //fetch Add Accident History from DB
    <?php if($prv_acc_his_no > 0 && $prv_acc_his_no != ''): ?>
        $(function(){
            // var count = <?php echo $prv_acc_his_no?>;
            <?php for($count =1; $count<=$prv_acc_his_no ; $count++): ?>
                var count = <?php echo $count;?>;
                
                   $("#acc_rcd_div").append('<div id="acc_rcd_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Accident Details</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-accident_date_'+count+'">Accident Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-accident_date_'+count+'" name="accident_date_'+count+'"  value="<?php echo $accident_date[$count-1]?>" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_nature_' + count + '">Nature of Accident</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_nature_' + count + '"  value="<?php echo $accident_nature[$count-1]?>" id="w6-accident_nature_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_fatalities_' + count + '">Fatalities</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo $accident_fatalities[$count-1]?>" name="accident_fatalities_' + count + '" id="w6-accident_fatalities_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_injuries_' + count + '">Injuries</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo $accident_injuries[$count-1]?>" name="accident_injuries_' + count + '" id="w6-accident_injuries_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_hazardous_' + count + '">Hazardous Material Spill</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo $accident_hazardous[$count-1]?>" name="accident_hazardous_' + count + '" id="w6-accident_hazardous_' + count + '" required></div></div></div>');
                    if (count >= 1) {
                        $("#dlt_prv_acc_btn").show();
                    }
                    $("#prv_acc_his_no").val(count);
                    $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

    //fetch Add Accident History from DB End



    //fetch Add Traffic Convivtions from DB
    <?php if($prv_traffic_conviv_no > 0 && $prv_traffic_conviv_no != ''): ?>
        $(function(){
            // var count = <?php echo $prv_traffic_conviv_no?>;
            <?php for($count =1; $count<=$prv_traffic_conviv_no ; $count++): ?>
                var count = <?php echo $count;?>;
                
                $("#prv_traffic_conviv").append('<div id="prv_traffic_conviv_rcd_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Traffic Convivtions</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-traf_conviv_date_'+count+'">Traffic Convivtion Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" value="<?php echo $traf_conviv_date[$count-1]?>"  data-plugin-datepicker="" class="form-control default-date-picker" id="w6-traf_conviv_date_'+count+'" name="traf_conviv_date_'+count+'" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_loc_' + count + '">Location</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo $traf_conviv_loc[$count-1]?>"  name="traf_conviv_loc_' + count + '" id="w6-traf_conviv_loc_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_chrg_' + count + '">Charge</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo $traf_conviv_chrg[$count-1]?>"  name="traf_conviv_chrg_' + count + '" id="w6-traf_conviv_chrg_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_pen_' + count + '">Penalty</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo $traf_conviv_pen[$count-1]?>"  name="traf_conviv_pen_' + count + '" id="w6-traf_conviv_pen_' + count + '" required></div></div>');
                if (count >= 1) {
                    $("#dlt_prv_traffic_conviv").show();
                }
                $("#prv_traffic_conviv_no").val(count);
                $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

    //fetch Add Traffic Convivtions from DB End

    <?php if($position_applied == 'owner_operator'){ ?>
        position_applied('owner_operator');
    <?php } ?>

    //fetch Add Drug & Alcohol Test Details from DB
    <?php if($emp_drug_test_his_no > 0 && $emp_drug_test_his_no != ''): ?>
        $(function(){
            // var count = <?php echo $emp_drug_test_his_no?>;
            <?php for($count =1; $count<=$emp_drug_test_his_no ; $count++): ?>
                var count = <?php echo $count;?>;
                
                $("#emp_drug_test_div").append('<div id="emp_drug_test_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-emp_drug_test_his_' + count + '">Drug & Alcohol Test Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_type_' + count + '">Type of Test</label><div class="col-sm-9"><input type="text" class="form-control" readonly value="<?php echo $emp_drug_test_type[$count-1]?>" name="emp_drug_test_type_' + count + '" id="w6-emp_drug_test_type_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_date_' + count + '">Date</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="emp_drug_test_date_' + count + '" value="<?php echo $emp_drug_test_date[$count-1]?>" name="emp_drug_test_date_' + count + '" required></div></div><label class="col-sm-3 control-label" for="w6-emp_drug_test_status_yn_' + count + '">Positive/Negative</label><div class="col-sm-3"><select class="form-control" name="emp_drug_test_status_yn_' + count + '" id="w6-emp_drug_test_status_yn_' + count + '" required><option value="">Select</option><option value="Positive" <?php echo($emp_drug_test_status_yn[$count-1]=="Positive")?"Selected":""?> >Positive</option><option value="Negative" <?php echo($emp_drug_test_status_yn[$count-1]=="Negative")?"Selected":""?> >Negative</option></select></div></div></div>');
                if (count >= 1) {
                    $("#dlt_emp_drug_test_btn").show();
                }
                $("#emp_drug_test_his_no").val(count);
                $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

    //fetch Add Drug & Alcohol Test Details from DB End

    function position_applied(value){
        if (value === "owner_operator") {
            $("#owner_wsib").empty().append('<label class="col-sm-1 control-label" for="w6-wsib_no">WSIB No</label><div class="col-sm-6"><input type="text" class="form-control" name="wsib_no" value="<?php echo $wsib_no?>" id="w6-wsib_no" autocomplete="off"></div>');
        } else {
            $("#owner_wsib").empty().append('');
        }
    }
	$("#w6-position_applied").change(function() {
		
        position_applied($(this).val());
	});
	//Police Report Date
	$("input[name=police_report]:radio").change(function() {
		var value = $(this).val();
		  policeReportDate(value);
		});
	//passport_detail


	$("input[name=passport]:radio").change(function(){ 
		var value = $(this).val();
             test(value);
		});


	//Add Previous Address 
	$("#add_prv_add_btn").click(function() {
        $(this).attr("disabled", true);
        var count = $("#prv_add_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#prvs_add_div").append('<div id="prvs_add_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Previous Address Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_address_' + count + '">Address</label><div class="col-sm-9"><input type="text" class="form-control" name="previous_address_' + count + '" id="w6-previous_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_street_' + count + '">Street</label><div class="col-sm-3"><input type="text" class="form-control" name="previous_street_' + count + '" id="w6-previous_street_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-previous_city_' + count + '">City</label><div class="col-sm-3"><input type="text" class="form-control" name="previous_city_' + count + '" id="w6-previous_city_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_province_' + count + '">Province</label><div class="col-sm-3"><input type="text" class="form-control" name="previous_province_' + count + '" id="w6-previous_province_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-previous_postal_code_' + count + '">Postal Code</label><div class="col-sm-3"><input type="text" class="form-control" name="previous_postal_code_' + count + '" id="w6-previous_postal_code_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-previous_duration_' + count + '">How Long? (years/months)</label><div class="col-sm-3"><input type="text" class="form-control" name="previous_duration_' + count + '" id="w6-previous_duration_1" autocomplete="off" required></div></div></div>');
        if (count >= 1) {
            $("#dlt_prv_add_btn").show();
        }
        $("#prv_add_no").val(count);
        $(this).attr("disabled", false);
    });
	//Delete Previous Address
	$("#dlt_prv_add_btn").click(function() {
        $(this).attr("disabled", true);
        $("#add_prv_add_btn").attr("disabled", true);
        var count = $("#prv_add_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#prvs_add_div_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_prv_add_btn").hide();
        }
        $("#prv_add_no").val(count);
        $(this).attr("disabled", false);
        $("#add_prv_add_btn").attr("disabled", false);
    });
	//Have you worked for this company before?
	$("input[name=worked_before]:radio").change(function() {
        var value = $(this).val();
        workedBefore(value);
    });
	//Are you now employed?
	$("input[name=employment_status]:radio").change(function() {
        var value = $(this).val();
        employmentStatus(value);
    });
	//Have you ever been bonded?
	$("input[name=bond_status]:radio").change(function() {
        var value = $(this).val();
        bondStatus(value);
    });
	//Have you ever been convicted of a felony?
	$("input[name=felony_status]:radio").change(function() {
        var value = $(this).val();
        felonyStatus(value);
    });
	//Is there any reason you might be unable to perform the functions of the job which you have applied for [as described in the attached job description]
	$("input[name=performance_status]:radio").change(function() {
        var value = $(this).val();
        performanceStatus(value);
    });
	//Are you a FAST approved driver?
	$("input[name=fast_driver_status]:radio").change(function() {
        var value = $(this).val();
        $("#will_status").html('');
        fastDriverStatus(value);
    });
	//Are you willing to apply for new one?
	$(document).on('change', 'input[name=willing_status_rdo]:radio', function() {
        var value = $(this).val();
        willingStatusRdo(value);
    });
	//Provide your employment history for last 3 to 7 years (if any)
	$("#add_prv_emp_btn").click(function() {
        $(this).attr("disabled", true);
        var count = $("#prv_empl_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#empl_his_div").append('<div id="emp_his_' + count + '" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Employment Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-is_employed_' + count + '">Employed</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="is_employed_yes_' + count + '" name="is_employed_' + count + '" type="radio" value="Yes" required /> <label for="is_employed_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="is_employed_no_' + count + '" name="is_employed_' + count + '" type="radio" value="No" /> <label for="is_employed_no_' + count + '">No</label></div></div></div><div id="is_employed_div_' + count + '" style="display: none;"><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-employer_company_name_' + count + '">Company Name</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_company_name_' + count + '" id="w6-employer_company_name_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_name_' + count + '">Contact Person</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_name_' + count + '" id="w6-employer_name_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" name="employer_address_' + count + '" id="w6-employer_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_city_' + count + '" id="w6-employer_city_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_province_' + count + '">Province</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_province_' + count + '" id="w6-employer_province_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-emplyer_zip_' + count + '">Zip/PostalCode</label><div class="col-sm-3"> <input type="text" class="form-control" name="emplyer_zip_' + count + '" id="w6-emplyer_zip_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label is_employed_div_no_' + count + '" for="w6-position_held_' + count + '">Position Held</label><div class="col-sm-3 is_employed_div_no_' + count + '"> <input type="text" class="form-control" name="position_held_' + count + '" id="w6-position_held_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_number_' + count + '">Contact Number</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_number_' + count + '" id="w6-employer_number_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-fax_no_' + count + '">Fax No</label><div class="col-sm-3"> <input type="text" class="form-control" name="fax_no_' + count + '" id="w6-fax_no_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employment_fron_date_' + count + '">From</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_fron_date_' + count + '" name="employment_fron_date_' + count + '" required></div></div> <label class="col-sm-3 control-label" for="w6-employment_to_date_' + count + '">To</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_to_date_' + count + '" name="employment_to_date_' + count + '" required></div></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-3 control-label" for="w6-salary_wage_' + count + '">Salary Wage</label><div class="col-sm-3"> <input type="text" class="form-control" name="salary_wage_' + count + '" id="w6-salary_wage_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_leaving_reason_' + count + '">Reason for Leaving?</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_leaving_reason_' + count + '" id="w6-employer_leaving_reason_' + count + '" autocomplete="off" required></div></div><div class="form-group employer_email_div_' + count + '"><label class="col-sm-3 control-label" for="w6-employer_email_' + count + '">Email</label><div class="col-sm-3"> <input type="email" class="form-control"  name="employer_email_' + count + '" id="w6-employer_email_' + count + '" autocomplete="off"></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-6 control-label" for="w6-fmcsr_status_' + count + '">Were you subject to the FMCSRs** while employed?</label><div class="col-sm-6"><div class="radio-custom radio-info"> <input id="fmcsr_status_yes_' + count + '" name="fmcsr_status_' + count + '" type="radio" value="Yes" required /> <label for="fmcsr_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="fmcsr_status_no' + count + '" name="fmcsr_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no_' + count + '">No</label></div></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-9 control-label" for="w6-safety_sensitive_status_' + count + '">Was your job designated as a safety-sensitive function in any dot-regulated mode subject to the drug and alcohol testing requirements of 49 CRF part 40?</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="safety_sensitive_status_yes_' + count + '" name="safety_sensitive_status_' + count + '" type="radio" value="Yes" required /> <label for="safety_sensitive_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="safety_sensitive_status_no_' + count + '" name="safety_sensitive_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no_' + count + '">No</label></div></div></div></div></div>');
        if (count >= 1) {
            $("#dlt_prv_emp_btn").show();
        }
        $("#prv_empl_his_no").val(count);
        $(this).attr("disabled", false);
    });
	//Delete Provide your employment history for last 3 to 7 years (if any)
	$("#dlt_prv_emp_btn").click(function() {
        $(this).attr("disabled", true);
        $("#add_prv_emp_btn").attr("disabled", true);
        var count = $("#prv_empl_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#emp_his_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_prv_emp_btn").hide();
        }
        $("#prv_empl_his_no").val(count);
        $(this).attr("disabled", false);
        $("#add_prv_emp_btn").attr("disabled", false);
    });
	//DRUG & ALCOHOL TEST RESULTS or any other violation (if any in last 6 months).
	$("#add_emp_drug_test_btn").click(function() {
        $(this).attr("disabled", true);
        var count = $("#emp_drug_test_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#emp_drug_test_div").append('<div id="emp_drug_test_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-emp_drug_test_his_' + count + '">Drug & Alcohol Test Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_type_' + count + '">Type of Test</label><div class="col-sm-9"><input type="text" class="form-control" name="emp_drug_test_type_' + count + '" id="w6-emp_drug_test_type_' + count + '" autocomplete="off" readonly value = "Pre Employment"></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_date_' + count + '">Date</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="emp_drug_test_date_' + count + '" name="emp_drug_test_date_' + count + '" required></div></div><label class="col-sm-3 control-label" for="w6-emp_drug_test_status_yn_' + count + '">Positive/Negative</label><div class="col-sm-3"><select class="form-control" name="emp_drug_test_status_yn_' + count + '" id="w6-emp_drug_test_status_yn_' + count + '" required><option value="">Select</option><option value="Positive">Positive</option><option value="Negative">Negative</option></select></div></div></div>');
        if (count >= 1) {
            $("#dlt_emp_drug_test_btn").show();
        }
        $("#emp_drug_test_his_no").val(count);
        $(this).attr("disabled", false);
    });
	//Delete DRUG & ALCOHOL TEST RESULTS or any other violation (if any in last 6 months).
    $("#dlt_emp_drug_test_btn").click(function() {
        $(this).attr("disabled", true);
        $("#add_emp_drug_test_btn").attr("disabled", true);
        var count = $("#emp_drug_test_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#emp_drug_test_div_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_emp_drug_test_btn").hide();
        }
        $("#emp_drug_test_his_no").val(count);
        $(this).attr("disabled", false);
        $("#add_emp_drug_test_btn").attr("disabled", false);
    });
	//Claims History (Please describe all accidents you were involved in for the last 3 years regardless of fault)
	$("#add_emp_claim_btn").click(function() {
        $(this).attr("disabled", true);
        var count = $("#emp_claim_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#emp_claim_div").append('<div id="emp_claim_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-emp_claim_his_' + count + '">Claim Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_date_' + count + '">Date of Accident</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control input_datepicker" id="emp_claim_date_' + count + '" name="emp_claim_date_' + count + '" required></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_desp_' + count + '">Description & Location of Accident</label><div class="col-sm-9"><input type="text" class="form-control" name="emp_claim_desp_' + count + '" id="w6-emp_claim_desp_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_fault_' + count + '">% Fault</label><div class="col-sm-3"><input type="text" class="form-control" name="emp_claim_fault_' + count + '" id="w6-emp_claim_fault_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-emp_claim_amount_">Total Amount Paid</label><div class="col-sm-3"><input type="text" class="form-control" name="emp_claim_amount_' + count + '" id="w6-emp_claim_amount_' + count + '" autocomplete="off" required></div></div></div>');

        if (count === 1) {
            $('#emp_claim_comments_div').html('<label class="col-sm-3 control-label" for="w6-emp_claim_comments">Comments if any</label><div class="col-sm-9"><input type="text" class="form-control" name="emp_claim_comments" id="w6-emp_claim_comments" autocomplete="off"></div>');
        }

        if (count >= 1) {
            $("#dlt_emp_claim_btn").show();
        } else {
            $("#emp_claim_comments_div").html('');
        }
        $("#emp_claim_his_no").val(count);
        $(this).attr("disabled", false);
    });
	//Delete Claims History (Please describe all accidents you were involved in for the last 3 years regardless of fault)
    $("#dlt_emp_claim_btn").click(function() {
        $(this).attr("disabled", true);
        $("#add_emp_claim_btn").attr("disabled", true);
        var count = $("#emp_claim_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#emp_claim_div_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_emp_claim_btn").hide();
            $("#emp_claim_comments_div").html('');
        }
        $("#emp_claim_his_no").val(count);
        $(this).attr("disabled", false);
        $("#add_emp_claim_btn").attr("disabled", false);
    });
    
    //Provide your accident history for last 3 years (if any)
    $("#add_prv_acc_btn").click(function() {
        $(this).attr("disabled", true);
        var count = $("#prv_acc_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#acc_rcd_div").append('<div id="acc_rcd_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Accident Details</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-accident_date_'+count+'">Accident Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-accident_date_'+count+'" name="accident_date_'+count+'" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_nature_' + count + '">Nature of Accident</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_nature_' + count + '" id="w6-accident_nature_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_fatalities_' + count + '">Fatalities</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_fatalities_' + count + '" id="w6-accident_fatalities_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_injuries_' + count + '">Injuries</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_injuries_' + count + '" id="w6-accident_injuries_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_hazardous_' + count + '">Hazardous Material Spill</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_hazardous_' + count + '" id="w6-accident_hazardous_' + count + '" required></div></div></div>');
        if (count >= 1) {
            $("#dlt_prv_acc_btn").show();
        }
        $("#prv_acc_his_no").val(count);
        $(this).attr("disabled", false);
    });
    //Delete Provide your accident history for last 3 years (if any)
    $("#dlt_prv_acc_btn").click(function() {
        $(this).attr("disabled", true);
        $("#add_prv_acc_btn").attr("disabled", true);
        var count = $("#prv_acc_his_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#acc_rcd_div_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_prv_acc_btn").hide();
        }
        $("#prv_acc_his_no").val(count);
        $(this).attr("disabled", false);
        $("#add_prv_acc_btn").attr("disabled", false);
    });	
	//Provide your accident history for last 3 years (if any)
	$("#add_prv_traffic_conviv").click(function() {
        $(this).attr("disabled", true);
        var count = $("#prv_traffic_conviv_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#prv_traffic_conviv").append('<div id="prv_traffic_conviv_rcd_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Traffic Convivtions</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-traf_conviv_date_'+count+'">Accident Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-traf_conviv_date_'+count+'" name="traf_conviv_date_'+count+'" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_loc_' + count + '">Location</label><div class="col-sm-9"><input type="text" class="form-control" name="traf_conviv_loc_' + count + '" id="w6-traf_conviv_loc_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_chrg_' + count + '">Charge</label><div class="col-sm-9"><input type="text" class="form-control" name="traf_conviv_chrg_' + count + '" id="w6-traf_conviv_chrg_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_pen_' + count + '">Penalty</label><div class="col-sm-9"><input type="text" class="form-control" name="traf_conviv_pen_' + count + '" id="w6-traf_conviv_pen_' + count + '" required></div></div>');
        if (count >= 1) {
            $("#dlt_prv_traffic_conviv").show();
        }
        $("#prv_traffic_conviv_no").val(count);
        $(this).attr("disabled", false);
    });
	//Delete Provide your accident history for last 3 years (if any)
    $("#dlt_prv_traffic_conviv").click(function() {
        $(this).attr("disabled", true);
        $("#add_prv_traffic_conviv").attr("disabled", true);
        var count = $("#prv_traffic_conviv_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#prv_traffic_conviv_rcd_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#dlt_prv_traffic_conviv").hide();
        }
        $("#prv_traffic_conviv_no").val(count);
        $(this).attr("disabled", false);
        $("#add_prv_traffic_conviv").attr("disabled", false);
    });
	//Driving Experience
    $(document).on('change', '.de', function() {
        var ID = $(this).attr('id');
        var val = $(this).val();
        if (val === "Yes") {
            if (ID === "de5" || ID === "de6" || ID === "de7") {
                $("#td_type_" + ID + "").html('<input type="text" class="form-control" name="type_' + ID + '" id="w6-type_' + ID + '" autocomplete="off" required>');
            } else {
                $("#td_type_" + ID + "").html('<select class="form-control" name="type_' + ID + '" id="w6-type_' + ID + '" required><option value="" selected>Select Type</option><option value="Dump">Dump</option><option value="Flat">Flat</option><option value="Reefer">Reefer</option><option value="Tank">Tank</option><option value="Van">Van</option></select>');
            }
            $("#td_from_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="from_' + ID + '" name="from_' + ID + '" required=""></div>');
            $("#td_to_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="to_' + ID + '" name="to_' + ID + '" required=""></div>');
            $("#td_miles_" + ID + "").html('<input type="text" class="form-control" name="miles_' + ID + '" id="w6-miles_' + ID + '" autocomplete="off" required>');
        } else {
            $("#td_type_" + ID + "").html('');
            $("#td_from_" + ID + "").html('');
            $("#td_to_" + ID + "").html('');
            $("#td_miles_" + ID + "").html('');
        }
    }); 
    //
    
                $('#emp_last_reliev_from').timepicker({
                    defaultTime: "<?php echo $driver['emp_last_reliev_from']?>",
                });    
                $('#emp_last_reliev_to').timepicker({
                    defaultTime: "<?php echo $driver['emp_last_reliev_to']?>",
                });


});

</script>


<script type="text/javascript">
    $(document).on('change','input[type=radio]',function(){
        //console.log(this.name.slice(0,11));
        if(this.name.slice(0,11) == 'is_employed'){
            console.log(this.name.slice(0,11));
            arr = this.id.split('_');
            id= arr[arr.length - 1];
            if($(this).val() == 'Yes'){
                $("#is_employed_div_"+id).fadeIn(300);
                $(".is_employed_div_no_"+id).fadeIn(300);
            }else{
                $("#is_employed_div_"+id).fadeIn(300);
                $(".is_employed_div_no_"+id).fadeOut(300);

            }
            //dtest_cmplt_func(this.checked == true,arr[arr.length - 1]);
        }   
    });
</script>