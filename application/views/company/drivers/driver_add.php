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



    /*checkbox style*/
    .material-switch > input[type="checkbox"] {
        display: none;   
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative; 
        width: 40px;  
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
    .free-mode{
        margin-top:10px;
    }
    .free-mode .free-mode-text{
        margin-right:10px;
    }
    .free-mode .material-switch{
        margin-top: 6px;
        margin-right: 10px;
    }
    /*checkbox style end*/
    /*free Mode Msg Container*/
    #free_mode_msg_container{
        position: fixed;
        top: 0;
        z-index: 1005;
        text-align: center;
        width: 20%;
        left: 42%;
    }

    #free_mode_msg_container p{
        padding: 10px 20px;
        font-size: 15px;
        font-weight: bold;
        color:#ffffff;    
        border-bottom-right-radius: 10px;
        background-color: rgba(76, 76, 76, 0.4);
        border-bottom-left-radius: 10px;
    }
    .fadeInDown {
        -webkit-animation-name: fadeInDown;
        animation-name: fadeInDown;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
          }
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
    .fadeOutUp {
        -webkit-animation-name: fadeOutUp;
        animation-name: fadeOutUp;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
    @-webkit-keyframes fadeOutUp {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
    }
    @keyframes fadeOutUp {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
        }
    } 
    /*free Mode Msg Container End*/
</style>

<?php 

if(isset($driver['id'])){
    $id=$driver['id'];

    if(!set_value('submit')):
        $previous_address       = unserialize($driver['previous_address']);
        $previous_street        = unserialize($driver['previous_street']);
        $previous_city          = unserialize($driver['previous_city']);
        $previous_province      = unserialize($driver['previous_province']);
        $previous_postal_code   = unserialize($driver['previous_postal_code']);
        $previous_duration      = unserialize($driver['previous_duration']);

        for($i =1 ;$i <= $driver['prv_add_no'] ; $i++){
            $driver['previous_address_'.$i]     = isset($previous_address[$i-1])?$previous_address[$i-1]:null;
            $driver['previous_street_'.$i]      = isset($previous_street[$i-1])?$previous_street[$i-1]:null;
            $driver['previous_city_'.$i]        = isset($previous_city[$i-1])?$previous_city[$i-1]:null;
            $driver['previous_province_'.$i]    = isset($previous_province[$i-1])?$previous_province[$i-1]:null;
            $driver['previous_postal_code_'.$i] = isset($previous_postal_code[$i-1])?$previous_postal_code[$i-1]:null;
            $driver['previous_duration_'.$i]    = isset($previous_duration[$i-1])?$previous_duration[$i-1]:null;
        }
    endif;
    

    /////////////////////////////////////////////1 previous address end
    ///////////////////////////////////////////////Employment detail


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
        $position_held_other = unserialize($driver['position_held_other']);
        $salary_wage = unserialize($driver['salary_wage']);
        $employment_fron_date = unserialize($driver['employment_fron_date']);
        $employment_to_date = unserialize($driver['employment_to_date']);
        $employer_leaving_reason = unserialize($driver['employer_leaving_reason']);
        $fmcsr_status = unserialize($driver['fmcsr_status']);
        $safety_sensitive_status = unserialize($driver['safety_sensitive_status']);


        for($i =1 ;$i <= $driver['prv_empl_his_no'] ; $i++){

            $driver['is_employed'.$i]              = isset($is_employed[$i-1])?$is_employed[$i-1]:null;
            $driver['fax_no'.$i]                   = isset($fax_no[$i-1])?$fax_no[$i-1]:null;
            $driver['employer_email'.$i]           = isset($employer_email[$i-1])?$employer_email[$i-1]:null;
            $driver['employer_company_name'.$i]    = isset($employer_company_name[$i-1])?$employer_company_name[$i-1]:null;
            $driver['employer_name'.$i]            = isset($employer_name[$i-1])?$employer_name[$i-1]:null;
            $driver['employer_address'.$i]         = isset($employer_address[$i-1])?$employer_address[$i-1]:null;
            $driver['employer_number'.$i]          = isset($employer_number[$i-1])?$employer_number[$i-1]:null;
            $driver['employer_city'.$i]            = isset($employer_city[$i-1])?$employer_city[$i-1]:null;
            $driver['employer_province'.$i]        = isset($employer_province[$i-1])?$employer_province[$i-1]:null;
            $driver['emplyer_zip'.$i]              = isset($emplyer_zip[$i-1])?$emplyer_zip[$i-1]:null;
            $driver['position_held'.$i]            = isset($position_held[$i-1])?$position_held[$i-1]:null;
            $driver['position_held_other'.$i]      = isset($position_held_other[$i-1])?$position_held_other[$i-1]:null;
            $driver['salary_wage'.$i]              = isset($salary_wage[$i-1])?$salary_wage[$i-1]:null;
            $driver['employment_fron_date'.$i]     = isset($employment_fron_date[$i-1])?$employment_fron_date[$i-1]:null;
            $driver['employment_to_date'.$i]       = isset($employment_to_date[$i-1])?$employment_to_date[$i-1]:null;
            $driver['employer_leaving_reason'.$i]  = isset($employer_leaving_reason[$i-1])?$employer_leaving_reason[$i-1]:null;
            $driver['fmcsr_status'.$i]             = isset($fmcsr_status[$i-1])?$fmcsr_status[$i-1]:null;
            $driver['safety_sensitive_status'.$i]  = isset($safety_sensitive_status[$i-1])?$safety_sensitive_status[$i-1]:null;
        }

    endif;

    ///////////////////////////////////////////////Employment detail end



    if(!set_value('submit')):
        $accident_date = unserialize($driver['accident_date']);
        $accident_nature = unserialize($driver['accident_nature']);
        $accident_fatalities = unserialize($driver['accident_fatalities']);
        $accident_injuries = unserialize($driver['accident_injuries']);
        $accident_hazardous = unserialize($driver['accident_hazardous']);

        for($i =1 ;$i <= $driver['prv_acc_his_no'] ; $i++){
            $driver['accident_date_'.$i]  = isset($accident_date[$i-1])?$accident_date[$i-1]:null;
            $driver['accident_nature_'.$i]  = isset($accident_nature[$i-1])?$accident_nature[$i-1]:null;
            $driver['accident_fatalities_'.$i]  = isset($accident_fatalities[$i-1])?$accident_fatalities[$i-1]:null;
            $driver['accident_injuries_'.$i]  = isset($accident_injuries[$i-1])?$accident_injuries[$i-1]:null;
            $driver['accident_hazardous_'.$i]  = isset($accident_hazardous[$i-1])?$accident_hazardous[$i-1]:null;
        }

    endif;

    /////////////////////////////////////////////1 Accident History end



    if(!set_value('submit')):
        $traf_conviv_date = unserialize($driver['traf_conviv_date']);
        $traf_conviv_loc = unserialize($driver['traf_conviv_loc']);
        $traf_conviv_chrg = unserialize($driver['traf_conviv_chrg']);
        $traf_conviv_pen = unserialize($driver['traf_conviv_pen']);
        // $accident_hazardous = unserialize($driver['accident_hazardous']);
        for($i =1 ;$i <= $driver['prv_traffic_conviv_no'] ; $i++){
            $driver['traf_conviv_date_'.$i]  = isset($traf_conviv_date[$i-1])?$traf_conviv_date[$i-1]:null;
            $driver['traf_conviv_loc_'.$i]  = isset($traf_conviv_loc[$i-1])?$traf_conviv_loc[$i-1]:null;
            $driver['traf_conviv_chrg_'.$i]  = isset($traf_conviv_chrg[$i-1])?$traf_conviv_chrg[$i-1]:null;
            $driver['traf_conviv_pen_'.$i]  = isset($traf_conviv_pen[$i-1])?$traf_conviv_pen[$i-1]:null;
        }

    endif;


    /////////////////////////////////////////////1 Traffic Convivtions end


    if(!set_value('submit')):
        $emp_drug_test_type = unserialize($driver['emp_drug_test_type']);
        $emp_drug_test_date = unserialize($driver['emp_drug_test_date']);
        $emp_drug_test_status_yn = unserialize($driver['emp_drug_test_status_yn']);

        // var_dump($driver['emp_drug_test_status_yn']);

        for($i =1 ;$i <= $driver['emp_drug_test_his_no'] ; $i++){
            $driver['emp_drug_test_type_'.$i]  = isset($emp_drug_test_type[$i-1])?$emp_drug_test_type[$i-1]:null;
            $driver['emp_drug_test_date_'.$i]  = isset($emp_drug_test_date[$i-1])?$emp_drug_test_date[$i-1]:null;
            $driver['emp_drug_test_status_yn_'.$i]  = isset($emp_drug_test_status_yn[$i-1])?$emp_drug_test_status_yn[$i-1]:null;
        }
    endif;

    /////////////////////////////////////////////1 Driver Drug Detail end

        /*Driving Experience start */

    if(!set_value('submit')):
        $status_de = unserialize($driver['status_de']);
        $driver['status_de'] = $status_de;
        $type_de = unserialize($driver['type_de']);
        $from_de = unserialize($driver['from_de']);
        $to_de = unserialize($driver['to_de']);
        $miles_de = unserialize($driver['miles_de']);

        for($i =1 ;$i <= 7 ; $i++){
            $driver['status_de'.$i]     = isset($status_de[$i-1])?$status_de[$i-1]:null;
            $driver['type_de'.$i]       = isset($type_de[$i-1])?$type_de[$i-1]:null;
            $driver['from_de'.$i]       = isset($from_de[$i-1])?$from_de[$i-1]:null;
            $driver['to_de'.$i]         = isset($to_de[$i-1])?$to_de[$i-1]:null;
            $driver['miles_de'.$i]      = isset($miles_de[$i-1])?$miles_de[$i-1]:null;
        }

    endif;


    $hours_worked = unserialize($driver['hours_worked']);
    $work_date = unserialize($driver['work_date']);

    for($i =1 ;$i <= 14 ; $i++){
        $driver['hours_worked_'.$i]     = (isset($hours_worked[$i-1]))?$hours_worked[$i-1]:null;
        $driver['work_date_'.$i]     = (isset($work_date[$i-1]))?$work_date[$i-1]:null;
    }

    set_data($driver);
     
}else{
    $id='';
}
    
?>

<!-- start: page -->
<div class="row">
    <div class="col-xs-12">
        <section class="panel form-wizard" id="w4">
        	<header class="panel-heading">
				<?php if(!isset($driver['id'])){?>
                    <h4 class="head3" style="display:inline-block">Add New Driver</h4>
                <?php } else {?>
                    <h4 class="head3" style="display:inline-block">Update Driver</h4>
                <?php }?>
                <?php 
                if (get_from('drivers','is_proved',['id'=>get_data('id')]) === '0') { ?>
                    <span class="free-mode" id="sup_approval_div">
                        <span class="material-switch ">
                            <span class="free-mode-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( Approval For Sign Up?</span>
                            <span class="free-mode-text">No</span>
                            <input id="sup-approval" name="sup-approval" type="checkbox"/>
                            <label for="sup-approval" class="label-success"></label>
                            <span class="free-mode-text">Yes )</span>
                        </span>
                    </span>
                <?php } ?>
                <a href="<?php echo site_url('driver') ?>" class="btn btn-primary fa fa-eye pull-right"> View Drivers List</a>
                <span class="free-mode">
                        <div class="material-switch pull-right">
                            <span class="free-mode-text">Free Mode </span>
                            <input id="free_mode_button" name="free_mode_button" type="checkbox"/>
                            <label for="free_mode_button" class="label-info"></label>
                        </div>
                </span>
			</header>
            <div class="panel-body">
                <div class="wizard-progress wizard-progress-lg">
                    <div class="steps-progress">
                        <div class="progress-indicator"></div>
                    </div>
                    <ul class="wizard-steps">
                        <li class="active" >
                        	<a href="#w6-profile" data-toggle="tab"><span>1</span>Basic Info</a>
                        </li>
                        <li>
                        	<a href="#w6-application" data-toggle="tab"><span>2</span>Application Info</a>
                        </li>
                        <li>
                        	<a href="#w6-employment_history" data-toggle="tab"><span>3</span>Employment <br/>History</a>
                        </li>
                        <li>
                        	<a href="#w6-acc_trff_rcd" data-toggle="tab"><span>4</span>Traffic<br/> Convictions</a>
                        </li>
                        <li>
                        	<a href="#w6-drv_exp" data-toggle="tab"><span>5</span>Qualifications &amp; Driving <br/>Experience</a>
                        </li>
                        <li>
                        	<a href="#w6-emp_duty_drg_details" data-toggle="tab"><span>6</span>On-Duty Hours &amp; Drug Tests <br/>Details</a>
                        </li>
                        <li>
                        	<a href="#w6-emp_profile" data-toggle="tab"><span>7</span>Add Claim<br/> Details</a>
                        </li>
                    </ul>
                </div>
                <form class="form-horizontal" id="driver_add_form" action="<?php echo site_url('driver/'.((!empty($id))?'edit':'add').'/'.$id); ?>" method="post" novalidate enctype="multipart/form-data">
                    <input type="hidden" name="action_token" value="<?php echo $action_token; ?>">
                    <div class="tab-content">
                        <div id="w6-profile" class="tab-pane active">
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-position_applied">Position Applied for</label>
                                <div class="col-sm-3">
                                	<select class="form-control" name="position_applied" id="w6-position_applied" required>
                                        <option value="">Select Position</option>
                                        <option value="local" <?php echo (get_data('position_applied') == 'local')?'Selected':null;?> >City Driver</option>
                                        <option value="long_haul" <?php echo (get_data('position_applied') == 'long_haul')?'Selected':null;?> >long haul</option>
                                        <option value="owner_operator" <?php echo (get_data('position_applied') == 'owner_operator')?'Selected':null;?> >Owner Operator</option>
                                        <option value="driver_of_owner" <?php echo (get_data('position_applied') == 'driver_of_owner')?'Selected':null;?> >Driver Of Owner Operator</option>
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
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-cvor_date" value="<?php echo getDateFromDB(get_data('cvor_date'));?>" name="cvor_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-passport">Passport</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="passport_yes" name="passport" type="radio" <?php echo (get_data('passport') == 'Yes')?'checked':null;?> value="Yes" required="" class="valid">
                                        <label for="passport_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="passport_no" name="passport" type="radio" <?php echo (get_data('passport') == 'No')?'checked':null;?> value="No" class="valid">
                                        <label for="passport_no">No</label>
                                    </div>
                                </div>
                                <div id="passport_detail" style="margin-bottom:15px;"></div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-2 control-label" for="w6-road_test">Road Test</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="road_test_yes" name="road_test" type="radio" <?php echo (get_data('road_test') == 'Yes')?'checked':null;?> value="Yes" required="" class="valid">
                                        <label for="road_test_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="road_test_no" name="road_test" type="radio" <?php echo (get_data('road_test') == 'No')?'checked':null;?> value="No" class="valid">
                                        <label for="road_test_no">No</label>
                                    </div>
                                </div>
                            	<label class="col-sm-2 control-label" for="w6-police_report">Police Report</label>
                                <div class="col-sm-1">
                                    <div class="radio-custom radio-info">
                                        <input id="police_report_yes" name="police_report" type="radio" <?php echo (get_data('police_report') == 'Yes')?'checked':null;?> value="Yes" required="" class="valid">
                                        <label for="police_report_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="police_report_no" name="police_report" type="radio" <?php echo (get_data('police_report') == 'No')?'checked':null;?> value="No" class="valid">
                                        <label for="police_report_no">No</label>
                                    </div>
                                </div>
                                <div id="police_report_date" style="margin-bottom: 15px;"></div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-first_name">First Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="first_name" value="<?php echo get_data('first_name')?>" id="w6-first_name" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-middle_name">Middle Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="middle_name" id="w6-middle_name" value="<?php echo get_data('middle_name');?>" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-last_name">Last Name</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="last_name" id="w6-last_name" value="<?php echo get_data('last_name');?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-email">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" id="w6-email" value="<?php echo get_data('email');?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-phonenumber">Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control phone_number" name="phonenumber" value="<?php echo get_data('phonenumber')?>" id="w6-phonenumber" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-homenumber">Home No</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control home_no" name="homenumber" value="<?php echo get_data('homenumber');?>" id="w6-homenumber" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-emergency_relation">Emergency Contact Name &amp; relationship</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="emg_contact" value="<?php echo get_data('emg_contact');?>" id="w6-emergency_relation" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label class="col-sm-2 control-label" for="w6-emg_contact_number">Emergency contact Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control phone_number" name="emg_contact_number" value="<?php echo get_data('emg_contact_number');?>" id="w6-emg_contact_number" autocomplete="off">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-phonenumber">Alternate Phone(US)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control phone_number" name="alternative_phone" value="<?php echo get_data('alternative_phone')?>" id="w6-alternative_phone" placeholder="CAN/US Contact Number" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-sin">Social Security Number</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control ss_no" name="sin" id="w6-sin" value="<?php echo get_data('sin');?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">License Details</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_no">License Number</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_license_no" id="w6-emp_license_no" value="<?php echo get_data('emp_license_no');?>" autocomplete="off" required="" style="text-transform:uppercase">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_state">State</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_license_state" id="w6-emp_license_state" required>
                                        <option value="">Select State</option>
                                        <option value="AB" <?php echo (get_data('emp_license_state')=='AB')?'Selected':null;?> >Alberta</option>
                                        <option value="BC" <?php echo (get_data('emp_license_state')=='BC')?'Selected':null;?> >British Columbia</option>
                                        <option value="MB" <?php echo (get_data('emp_license_state')=='MB')?'Selected':null;?> >Manitoba</option>
                                        <option value="NB" <?php echo (get_data('emp_license_state')=='NB')?'Selected':null;?> >New Brunswick</option>
                                        <option value="NL" <?php echo (get_data('emp_license_state')=='NL')?'Selected':null;?> >Newfoundland and Labrador</option>
                                        <option value="NT" <?php echo (get_data('emp_license_state')=='NT')?'Selected':null;?> >Northwest Territories</option>
                                        <option value="NS" <?php echo (get_data('emp_license_state')=='NS')?'Selected':null;?> >Nova Scotia</option>
                                        <option value="NU" <?php echo (get_data('emp_license_state')=='NU')?'Selected':null;?> >Nunavut</option>
                                        <option value="ON" <?php echo (get_data('emp_license_state')=='ON')?'Selected':null;?> >Ontario</option>
                                        <option value="PE" <?php echo (get_data('emp_license_state')=='PE')?'Selected':null;?> >Prince Edward Island</option>
                                        <option value="QC" <?php echo (get_data('emp_license_state')=='QC')?'Selected':null;?> >Quebec</option>
                                        <option value="SK" <?php echo (get_data('emp_license_state')=='SK')?'Selected':null;?> >Saskatchewan</option>
                                        <option value="YT" <?php echo (get_data('emp_license_state')=='YT')?'Selected':null;?> >Yukon Territory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="emp_license_org_date">Date of Obtaining License</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('emp_license_org_date'));?>" id="emp_license_org_date" name="emp_license_org_date" required="">
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="emp_license_exp_date">Expiry Date</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="emp_license_exp_date" value="<?php echo getDateFromDB(get_data('emp_license_exp_date'));?>" name="emp_license_exp_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_class">License Class</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_license_class" id="w6-emp_license_class" required>
                                        <option value="">Select Class</option>
                                        <option value="C-Class" <?php echo (get_data('emp_license_class') == 'C-Class')?'Selected':null;?> >C-Class</option>
                                        <option value="AZ" <?php echo (get_data('emp_license_class') == 'AZ')?'Selected':null;?> >AZ</option>
                                        <option value="DZ" <?php echo (get_data('emp_license_class') == 'DZ')?'Selected':null;?> >DZ</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_restrictions">Restrictions</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_license_restrictions" value="<?php echo get_data('emp_license_restrictions');?>" id="w6-emp_license_restrictions" autocomplete="off" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_license_endrosments">License Endorsements</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_license_endrosments" id="w6-emp_license_endrosments" value="<?php echo get_data('emp_license_endrosments');?>" autocomplete="off" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-addresses">Provide your residency for last 3 years</label>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-crt-add">Current Address Details</label>
                                    <input type="hidden" id="prv_add_no" name="prv_add_no" value="<?php echo get_data('prv_add_no')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-current_address">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="current_address" id="w6-current_address" value="<?php echo get_data('current_address')?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-current_city">City</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_city" id="w6-current_city" value="<?php echo get_data('current_city')?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-current_province">Province</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="current_province" id="w6-current_province" required>
                                        <option value="">Select State</option>
                                        <option value="AB" <?php echo (get_data('current_province')=='AB')?'Selected':null;?> >Alberta</option>
                                        <option value="BC" <?php echo (get_data('current_province')=='BC')?'Selected':null;?> >British Columbia</option>
                                        <option value="MB" <?php echo (get_data('current_province')=='MB')?'Selected':null;?> >Manitoba</option>
                                        <option value="NB" <?php echo (get_data('current_province')=='NB')?'Selected':null;?> >New Brunswick</option>
                                        <option value="NL" <?php echo (get_data('current_province')=='NL')?'Selected':null;?> >Newfoundland and Labrador</option>
                                        <option value="NT" <?php echo (get_data('current_province')=='NT')?'Selected':null;?> >Northwest Territories</option>
                                        <option value="NS" <?php echo (get_data('current_province')=='NS')?'Selected':null;?> >Nova Scotia</option>
                                        <option value="NU" <?php echo (get_data('current_province')=='NU')?'Selected':null;?> >Nunavut</option>
                                        <option value="ON" <?php echo (get_data('current_province')=='ON')?'Selected':null;?> >Ontario</option>
                                        <option value="PE" <?php echo (get_data('current_province')=='PE')?'Selected':null;?> >Prince Edward Island</option>
                                        <option value="QC" <?php echo (get_data('current_province')=='QC')?'Selected':null;?> >Quebec</option>
                                        <option value="SK" <?php echo (get_data('current_province')=='SK')?'Selected':null;?> >Saskatchewan</option>
                                        <option value="YT" <?php echo (get_data('current_province')=='YT')?'Selected':null;?> >Yukon Territory</option>
                                	</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-current_postal_code">Postal Code</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_postal_code" id="w6-current_postal_code" value="<?php echo get_data('current_postal_code')?>" data-plugin-maxlength="" maxlength="15 autocomplete="off" required="" style="text-transform:uppercase">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-current_duration">How Long? (years/months)</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="current_duration" id="w6-current_duration" value="<?php echo get_data('current_duration');?>" autocomplete="off" required="">
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
                        	
                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-witness_name">Witness Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="witness_name" value="<?php echo get_data('witness_name');?>" id="w6-witness_name" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-2 control-label" for="w6-topic">Topic</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="topic" id="w6-topic" value="<?php echo get_data('topic');?>" autocomplete="off" required="">
                                </div>
                            </div> -->
                            <div class="form-group">
                            	
                                <label class="col-sm-2 control-label" for="w6-medical_due">Medical Due Date</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control default-date-picker" id="w6-medical_due" value="<?php echo getDateFromDB(get_data('medical_due'));?>" name="medical_due" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="w6-defensive_driving">Defensive Driving?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="defensive_driving_yes" name="defensive_driving" type="radio" <?php echo (get_data('defensive_driving')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="defensive_driving_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="defensive_driving_no" name="defensive_driving" type="radio" <?php echo (get_data('defensive_driving')=='No')?'checked':null?> value="No">
                                        <label for="defensive_driving_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label" for="w6-road_evalution">Road Evalution?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="road_evalution_yes" name="road_evalution" type="radio" <?php echo (get_data('road_evalution')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="road_evalution_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="road_evalution_no" name="road_evalution" type="radio" <?php echo (get_data('road_evalution')=='No')?'checked':null?> value="No">
                                        <label for="road_evalution_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-3 control-label" for="w6-province_insurance">Out of Province Insurance?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="province_insurance_yes" name="province_insurance" type="radio" <?php echo (get_data('province_insurance')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="province_insurance_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="province_insurance_no" name="province_insurance" type="radio" <?php echo (get_data('province_insurance')=='No')?'checked':null?> value="No">
                                        <label for="province_insurance_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-legal_right">Do you have the legal right to work in United State?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="legal_right_yes" name="legal_right" type="radio"  <?php echo (get_data('legal_right')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="legal_right_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="legal_right_no" name="legal_right" type="radio" <?php echo (get_data('legal_right')=='No')?'checked':null?> value="No">
                                        <label for="legal_right_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="dob">Date of Birth</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="dob" value="<?php echo getDateFromDB(get_data('dob'));?>" name="dob" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-provide_age_proof">Can you provide proof of age?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="provide_age_proof_yes" name="provide_age_proof" <?php echo (get_data('provide_age_proof')=='Yes')?'checked':null?> type="radio" value="Yes" required="">
                                        <label for="provide_age_proof_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="provide_age_proof_no" name="provide_age_proof" <?php echo (get_data('provide_age_proof')=='No')?'checked':null?> type="radio" value="No">
                                        <label for="provide_age_proof_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-worked_before">Have you worked for this company before?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="worked_before_yes" name="worked_before" <?php echo (get_data('worked_before')=='Yes')?'checked':null?> type="radio" value="Yes" required="">
                                        <label for="worked_before_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="worked_before" name="worked_before" <?php echo (get_data('worked_before')=='No')?'checked':null?> type="radio" value="No">
                                        <label for="worked_before">No</label>
                                    </div>
                                </div>
                            </div>
                            <div id="wrk_div" style="margin-bottom: 15px;"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-employment_status">Are you now employed?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="employment_status_yes" name="employment_status" <?php echo (get_data('employment_status')=='Yes')?'checked':null?> type="radio" value="Yes" required="">
                                        <label for="employment_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="employment_status_no" name="employment_status" <?php echo (get_data('employment_status')=='No')?'checked':null?> type="radio" value="No">
                                        <label for="employment_status_no">No</label>
                                    </div>
                                </div>
                                <div id="emply_status"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-who_referred">Who referred you?</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="who_referred" id="w6-who_referred" value="<?php echo get_data('who_referred')?>" autocomplete="off" required="">
                                </div>
                                <label class="col-sm-3 control-label" for="w6-pay_rate_expected">Rate of Pay Expected</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="pay_rate_expected" id="w6-pay_rate_expected" value="<?php echo get_data('pay_rate_expected')?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-bond_status">Have you ever been bonded?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="bond_yes" name="bond_status" type="radio" <?php echo (get_data('bond_status')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="bond_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="bond_no" name="bond_status" type="radio" <?php echo (get_data('bond_status')=='No')?'checked':null?> value="No">
                                        <label for="bond_no">No</label>
                                    </div>
                                </div>
                                <div id="bond_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-felony_status">Have you ever been convicted of a felony?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="felony_yes" name="felony_status" <?php echo (get_data('felony_status')=='Yes')?'checked':null?> type="radio" value="Yes" required="">
                                        <label for="felony_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="felony_no" name="felony_status" <?php echo (get_data('felony_status')=='No')?'checked':null?> type="radio" value="No">
                                        <label for="felony_no">No</label>
                                    </div>
                                </div>
                                <div id="felony_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-performance_status">Is there any reason you might be unable to perform the functions of the job which you have applied for [as described in the attached job description]</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="performance_status_yes" name="performance_status" <?php echo (get_data('performance_status')=='Yes')?'checked':null?> type="radio" value="Yes" required="">
                                        <label for="performance_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="performance_status_no" name="performance_status" <?php echo (get_data('performance_status')=='No')?'checked':null?> type="radio" value="No">
                                        <label for="performance_status_no">No</label>
                                    </div>
                                </div>
                                <div id="performance_status"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-fast_driver_status">Are you a FAST approved driver?</label>
                                <div class="col-sm-3">
                                    <div class="radio-custom radio-info">
                                        <input id="fast_driver_status_yes" name="fast_driver_status" type="radio" <?php echo (get_data('fast_driver_status')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="fast_driver_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="fast_driver_status_no" name="fast_driver_status" type="radio" <?php echo (get_data('fast_driver_status')=='No')?'checked':null?> value="No">
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
                                        <option value="1" <?php echo (get_data('emp_highest_grade') == '1')?'Selected':null;?> >1</option>
                                        <option value="2" <?php echo (get_data('emp_highest_grade') == '2')?'Selected':null;?> >2</option>
                                        <option value="3" <?php echo (get_data('emp_highest_grade') == '3')?'Selected':null;?> >3</option>
                                        <option value="4" <?php echo (get_data('emp_highest_grade') == '4')?'Selected':null;?> >4</option>
                                        <option value="5" <?php echo (get_data('emp_highest_grade') == '5')?'Selected':null;?> >5</option>
                                        <option value="6" <?php echo (get_data('emp_highest_grade') == '6')?'Selected':null;?> >6</option>
                                        <option value="7" <?php echo (get_data('emp_highest_grade') == '7')?'Selected':null;?> >7</option>
                                        <option value="8" <?php echo (get_data('emp_highest_grade') == '8')?'Selected':null;?> >8</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_high_school">High School</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_high_school" id="w6-emp_high_school" required>
                                        <option value="">Select High School</option>
                                        <option value="1" <?php echo (get_data('emp_high_school') == '1')?'Selected':null;?> >1</option>
                                        <option value="2" <?php echo (get_data('emp_high_school') == '2')?'Selected':null;?> >2</option>
                                        <option value="3" <?php echo (get_data('emp_high_school') == '3')?'Selected':null;?> >3</option>
                                        <option value="4" <?php echo (get_data('emp_high_school') == '4')?'Selected':null;?> >4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_college">College</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="emp_college" id="w6-emp_college" required>
                                        <option value="">Select College</option>
                                        <option value="1" <?php echo (get_data('emp_college') == '1')?'Selected':null;?> >1</option>
                                        <option value="2" <?php echo (get_data('emp_college') == '2')?'Selected':null;?> >2</option>
                                        <option value="3" <?php echo (get_data('emp_college') == '3')?'Selected':null;?> >3</option>
                                        <option value="4" <?php echo (get_data('emp_college') == '4')?'Selected':null;?> >4</option>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_last_school">Name of Last School Attended</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="emp_last_school" value="<?php echo get_data('emp_last_school')?>" id="w6-emp_last_school" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_skl_complete_address">Last School's Complete Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_skl_complete_address" value="<?php echo get_data('emp_skl_complete_address')?>" id="w6-emp_skl_complete_address" autocomplete="off" required="">
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
                                                                    <input id="de1" class="de" name="status_de1" <?php echo (get_data('status_de1')=='Yes')?'checked':null?>  type="radio" value="Yes" required="">
                                                                    <label for="status_de1">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de1" class="de" name="status_de1" <?php echo (get_data('status_de1')=='No')?'checked':null?> type="radio" value="No">
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
                                                                    <input id="de2" class="de" name="status_de2" type="radio" <?php echo (get_data('status_de2')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de2">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de2" class="de" name="status_de2" type="radio" <?php echo (get_data('status_de2')=='No')?'checked':null?> value="No">
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
                                                                    <input id="de3" class="de" name="status_de3" type="radio" <?php echo (get_data('status_de3')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de3">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de3" class="de" name="status_de3" type="radio" <?php echo (get_data('status_de3')=='No')?'checked':null?> value="No">
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
                                                                    <input id="de4" class="de" name="status_de4" type="radio" <?php echo (get_data('status_de4')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de4">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de4" class="de" name="status_de4" type="radio" <?php echo (get_data('status_de4')=='No')?'checked':null?> value="No">
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
                                                                    <input id="de5" class="de" name="status_de5" type="radio" <?php echo (get_data('status_de5')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de5">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de5" class="de" name="status_de5" type="radio" <?php echo (get_data('status_de5')=='No')?'checked':null?> value="No">
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
                                                                    <input id="de6" class="de" name="status_de6" type="radio" <?php echo (get_data('status_de6')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de6">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de6" class="de" name="status_de6" type="radio" <?php echo (get_data('status_de6')=='No')?'checked':null?> value="No">
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
                                                                    <input id="de7" class="de" name="status_de7" type="radio" <?php echo (get_data('status_de7')=='Yes')?'checked':null?> value="Yes" required="">
                                                                    <label for="status_de7">Yes</label>
                                                                </div>
                                                                <div class="radio-custom radio-info">
                                                                    <input id="de7" class="de" name="status_de7" type="radio" <?php echo (get_data('status_de7')=='No')?'checked':null?> value="No">
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
                                <label class="col-sm-3 control-label" for="w6-emp_pro_state_list">Driver's Experience:</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" name="emp_experience_year" value="<?php echo get_data('emp_experience_year')?>" id="emp_experience_year" autocomplete="off" required="" min='0' max="40">
                                </div>
                                <div class="col-sm-1"><label class="control-label" for="emp_experience_year">Year(s)</label></div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" name="emp_experience_month" value="<?php echo get_data('emp_experience_month')?>" id="emp_experience_month" autocomplete="off" required="" min='0' max="12"></div>
                                <div class="col-sm-1"><label class="control-label" for="emp_experience_month">Month(s)</label></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_pro_state_list">List Provinces &amp; States Operated in Last 5 Years</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_pro_state_list" value="<?php echo get_data('emp_pro_state_list')?>" id="w6-emp_pro_state_list" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_spl_cor">Show special Courses or Training that will help you as a driver</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_spl_cor" id="w6-emp_spl_cor" value="<?php echo get_data('emp_spl_cor')?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_awards">Which safe driving awards do you hold and from whom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_awards" id="w6-emp_awards" value="<?php echo get_data('emp_awards')?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_den_license"> <b>A)</b> Have you ever been denied a license, permit or privilege to operate a motor vehicle?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_den_license_yes" name="emp_den_license" type="radio" <?php echo (get_data('emp_den_license')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="emp_den_license_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_den_license_no" name="emp_den_license" type="radio" <?php echo (get_data('emp_den_license')=='No')?'checked':null?> value="No">
                                        <label for="emp_den_license_no">No</label>
                                    </div>
                                </div>
                                <label class="col-sm-3 control-label" for="w6-emp_license_per"> <b>B)</b> Has any license, permit or privilege ever been suspended or revoked?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_license_per_yes" name="emp_license_per" type="radio" <?php echo (get_data('emp_license_per')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="emp_license_per_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_license_per_no" name="emp_license_per" type="radio" <?php echo (get_data('emp_license_per')=='No')?'checked':null?> value="No">
                                        <label for="emp_license_per_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="emp_exp_us_commercial_div">
                                <label class="col-sm-3 control-label" for="w6-emp_exp_us_commercial">IF THE ANSWER TO EITHER A OR B YES, GIVE DETAILS?</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_exp_us_commercial" id="w6-emp_exp_us_commercials" value="<?php echo get_data('emp_exp_us_commercial')?>" autocomplete="off" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label" style="text-align: center !important; font-weight: bold !important;" for="w6-emp_drv_exp-others">Experience - Others</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_other_trk_exp">Show any trucking, transportation or other experience that may help your work for this company</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_other_trk_exp" id="w6-emp_other_trk_exp" value="<?php echo get_data('emp_other_trk_exp')?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_cor_tra_list">List courses and training other then as shown elsewhere in this application</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_cor_tra_list" id="w6-emp_cor_tra_list" value="<?php echo get_data('emp_cor_tra_list')?>" autocomplete="off" required>
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-emp_spl_equ_list">List special equipment or technical materials you can work with (Other than those already shown)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="emp_spl_equ_list" id="w6-emp_spl_equ_list" value="<?php echo get_data('emp_spl_equ_list')?>" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label" for="w6-emp_drug_test_status">Have you ever tested positive, or refused to test, on any pre-employment drug or alcohol test administrated by an employer to which the employee applied for, but did not obtain safety-sensitive transportation work covered by DOT agency drug and alcohol testing rules during the past three years?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_drug_test_status_yes" name="emp_drug_test_status" type="radio" <?php echo (get_data('emp_drug_test_status')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="emp_drug_test_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_drug_test_status_no" name="emp_drug_test_status" type="radio" <?php echo (get_data('emp_drug_test_status')=='No')?'checked':null?> value="No">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_1'))?>" id="work_date_1" name="work_date_1" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_1" value="<?php echo get_data('hours_worked_1')?>" id="w6-hours_worked_1" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_2'))?>" id="work_date_2" name="work_date_2" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_2" id="w6-hours_worked_2" value="<?php echo get_data('hours_worked_2')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker"  value="<?php echo getDateFromDB(get_data('work_date_3'))?>" id="work_date_3" name="work_date_3" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_3" id="w6-hours_worked_3" value="<?php echo get_data('hours_worked_3')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_4'))?>" id="work_date_4" name="work_date_4" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_4" id="w6-hours_worked_4" value="<?php echo get_data('hours_worked_4')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_5'))?>" id="work_date_5" name="work_date_5" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_5" id="w6-hours_worked_5" value="<?php echo get_data('hours_worked_5')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_6'))?>" id="work_date_6" name="work_date_6" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_6" id="w6-hours_worked_6" value="<?php echo get_data('hours_worked_6')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_7'))?>" id="work_date_7" name="work_date_7" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_7" id="w6-hours_worked_7" value="<?php echo get_data('hours_worked_7')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_8'))?>" id="work_date_8" name="work_date_8" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_8" id="w6-hours_worked_8" value="<?php echo get_data('hours_worked_8')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_9'))?>" id="work_date_9" name="work_date_9" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_9" id="w6-hours_worked_9" value="<?php echo get_data('hours_worked_9')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_10'))?>" id="work_date_10" name="work_date_10" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_10" id="w6-hours_worked_10" value="<?php echo get_data('hours_worked_10')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_11'))?>" id="work_date_11" name="work_date_11" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_11" id="w6-hours_worked_11" value="<?php echo get_data('hours_worked_11')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_12'))?>" id="work_date_12" name="work_date_12" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_12" id="w6-hours_worked_12" value="<?php echo get_data('hours_worked_12')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_13'))?>" id="work_date_13" name="work_date_13" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_13" id="w6-hours_worked_13" value="<?php echo get_data('hours_worked_13')?>" autocomplete="off" required="">
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
                                                                <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('work_date_14'))?>" id="work_date_14" name="work_date_14" required="">
                                                            </div>
                                                        </td>
                                                        <td data-title="Hours Worked">
                                                            <input type="text" class="form-control" name="hours_worked_14" id="w6-hours_worked_14" value="<?php echo get_data('hours_worked_14')?>" autocomplete="off" required="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-title="Day" class="center" colspan="2">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td data-title="Total Worked Hours" colspan="1">
                                                            <input type="text" class="form-control" name="total_working_hours" id="total_working_hours"  autocomplete="off">
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
                            <!-- <div class="form-group">
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
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-dob">On</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('emp_last_reliev_on'))?>" id="emp_last_reliev_on" name="emp_last_reliev_on" required="">
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
                                        <input id="emp_curr_work_status_yes" name="emp_curr_work_status" type="radio" <?php echo (get_data('emp_curr_work_status')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="emp_curr_work_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_curr_work_status_no" name="emp_curr_work_status" type="radio" <?php echo (get_data('emp_curr_work_status')=='No')?'checked':null?> value="No">
                                        <label for="emp_curr_work_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label" for="w6-emp_another_emply_status">At this time do you intend to work for another employer while still employed by this company?</label>
                                <div class="col-sm-2">
                                    <div class="radio-custom radio-info">
                                        <input id="emp_another_emply_status_yes" name="emp_another_emply_status" type="radio" <?php echo (get_data('emp_another_emply_status')=='Yes')?'checked':null?> value="Yes" required="">
                                        <label for="emp_another_emply_status_yes">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-info">
                                        <input id="emp_another_emply_status_no" name="emp_another_emply_status" type="radio" <?php echo (get_data('emp_another_emply_status')=='No')?'checked':null?> value="No">
                                        <label for="emp_another_emply_status_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer" style="background-color: #FFFFFF;">
                        <ul class="pager">
                            <li class="previous disabled">
                                <a><i class="fa fa-angle-left"></i> Previous</a>
                            </li>
                            <li class="updateAndClose pull-right" >
                                <input type="submit" name="submit" value="Update & Finish" class="submit-style">
                            </li>
                            <li class="finish hidden pull-right">
                            <?php if(!get_data('id')): ?>
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
<script src="<?php echo base_url();?>public/assets/masked-input/masked-input.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('focus', ".postal_code", function() {
            $(".postal_code").mask("***-***?***");
        });
        $(document).on('focus', ".phone_number", function() {
            $(".phone_number").mask("(999) 999-9999");
        });
        $(document).on('focus', ".home_no", function() {
            $(".home_no").mask("(999) 999-9999");
        });
        $(document).on('focus', ".ss_no", function() {
            $(".ss_no").mask("999-999-999");
        });

    });
</script>

<script>

function test( value ){
    //var value = t;
        if(value === "Yes") {
            $("#passport_detail").empty().append('<label class="col-sm-2 control-label" for="w6-passport_number">Passport Number</label><div class="col-sm-2"><input type="text" class="form-control" name="passport_number" value="<?php echo get_data('passport_number');?>" id="w6-passport_number" autocomplete="off" required="" style="text-transform:uppercase"></div><label class="col-sm-2 control-label" for="w6-passport_date">Passport Expire</label><div class="col-sm-2"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-passport_date" value="<?php echo getDateFromDB(get_data('passport_date'));?>" name="passport_date" required=""></div></div>');
        } else {
            $("#passport_detail").empty().append('');
        }
}        
        //var_dump($driver['emp_last_reliev_to']);
        //var_dump($driver['emp_last_reliev_from']);

function policeReportDate(value){
        if(value === "Yes") {
            $("#police_report_date").empty().append('<label class="col-sm-2 control-label" for="w6-police_report_date">POLICE REPORT DATE</label><div class="col-sm-2"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-police_report_date" name="police_report_date" value="<?php echo getDateFromDB(get_data('police_report_date'));?>" required=""></div></div>');
        } else {
            $("#police_report_date").empty().append('');
        }
}

function workedBefore(value){
        if (value === "Yes"){
            $("#wrk_div").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-worked_when">When?</label><div class="col-sm-3"><input type="text" class="form-control" name="b_worked_when" value="<?php echo get_data('b_worked_when')?>" id="w6-worked_when" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-b_pay_rate">Rate of Pay</label><div class="col-sm-3"><input type="text" class="form-control" name="b_pay_rate" value="<?php echo get_data('b_pay_rate')?>" id="w6-b_pay_rate"  autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="from_date">From</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="from_date" name="b_from_date" value="<?php echo getDateFromDB(get_data('b_from_date'))?>" required></div></div><label class="col-sm-3 control-label" for="b_to_date">To</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="b_to_date" name="b_to_date" value="<?php echo getDateFromDB(get_data('b_to_date'))?>" required></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-b_work_position">Position</label><div class="col-sm-3"><input type="text" class="form-control" name="b_work_position" value="<?php echo get_data('b_work_position')?>" id="w6-b_work_position" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-b_leaving_reason">Reason for Leaving?</label><div class="col-sm-3"><input type="text" class="form-control" name="b_leaving_reason" value="<?php echo get_data('b_leaving_reason')?>" id="w6-b_leaving_reason" autocomplete="off" required></div></div>');
        } else {
            $("#wrk_div").empty().append('');
        }
}

function employmentStatus(value){
    
        if (value === "No") {
            
            $("#emply_status").empty().append('<label class="col-sm-3 control-label" for="w6-last_employment">If not, how long since leaving last employment?</label><div class="col-sm-3"><input type="text" class="form-control" name="last_employment" value="<?php echo get_data('last_employment')?>" id="w6-last_employment" autocomplete="off" required></div>');
        } else {
           
            $("#emply_status").empty().append('');
        }
}

function bondStatus(value){
        if (value === "Yes") {
            $("#bond_status").empty().append('<label class="col-sm-3 control-label" for="w6-bonding_company">Name of Bonding Company</label><div class="col-sm-3"><input type="text" class="form-control" name="bonding_company" value="<?php echo get_data('bonding_company')?>" id="w6-bonding_company" autocomplete="off" required></div>');
        } else {
            $("#bond_status").empty().append('');
        }
}

function felonyStatus(value){
        if (value === "Yes") {
            $("#felony_status").empty().append('<label class="col-sm-4 control-label" for="w6-conviction_crime">Please explain fully on a separate sheet of paper. Conviction of a crime is not an automatic bar to employment-all circumstances will be considered</label><div class="col-sm-3"><input type="text" class="form-control" name="conviction_crime" value="<?php echo get_data('conviction_crime');?>" id="w6-conviction_crime" autocomplete="off" required></div>');
        } else {
            $("#felony_status").empty().append('');
        }
}

function performanceStatus(value){
        if (value === "Yes") {
            $("#performance_status").empty().append('<label class="col-sm-3 control-label" for="w6-performance_reason">Please explain the reason</label><div class="col-sm-3"><input type="text" class="form-control" name="performance_reason" value="<?php echo get_data('performance_reason')?>" id="w6-performance_reason" autocomplete="off" required></div>');
        } else {
            $("#performance_status").empty().append('');
        }
}

function fastDriverStatus(value){
        if (value === "Yes") {
            $("#fast_driver_status").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-performance_reason">Fast Card Number</label><div class="col-sm-3"><input type="text" class="form-control" name="fast_card_no" value="<?php echo get_data('fast_card_no')?>" id="w6-performance_reason" autocomplete="off" required></div><label class="col-sm-3 control-label" for="fast_card_expiry">Expiry Date</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="fast_card_expiry" name="fast_card_expiry" value="<?php echo get_data('fast_card_expiry');?>" required></div></div></div>');
        } else {
            $("#fast_driver_status").empty().append('<div class="form-group"><label class="col-sm-3 control-label" for="w6-willing_status_rdo">Are you willing to apply for new one?</label><div class="col-sm-3"><div class="radio-custom radio-info"><input id="willing_status_rdo_yes" name="willing_status_rdo" type="radio" <?php echo (get_data('willing_status_rdo')=="Yes")?"checked":"";?> value="Yes" required /><label for="willing_status_rdo_yes">Yes</label></div><div class="radio-custom radio-info"><input id="willing_status_rdo_no" name="willing_status_rdo" <?php echo (get_data('willing_status_rdo')=="No")?"checked":"";?> type="radio" value="No" /><label for="willing_status_rdo_no">No</label></div></div></div>');
        }
}

function willingStatusRdo(value){
        if (value === "No") {
            $("#will_status").html('<div class="form-group"><label class="col-sm-3 control-label" for="w6-not_willing_status">Why?</label><div class="col-sm-3"><input type="text" class="form-control" name="not_willing_status" value="<?php echo get_data('not_willing_status');?>" id="w6-not_willing_status" autocomplete="off" required></div></div>');
        } else {
            $("#will_status").html('');
        }
}

function positionHeldOther(element) {
    var count = element.dataset.count;
    if(element.value == 'other' ){
        $("#posheld_other_div_"+count).fadeIn(300);
    }else{
        $("#posheld_other_div_"+count).fadeOut(300);
        $("#position_held_other_"+count).val('');
    }
}


$(document).ready(function() { 
    <?php if(get_data('passport') == 'Yes'): ?>
        test($("input[name=passport]:radio").val());
    <?php endif; ?>

    <?php if(get_data('police_report') == 'Yes'): ?>
        policeReportDate($("input[name=police_report]:radio").val());
    <?php endif; ?>

    <?php if(get_data('worked_before') == 'Yes'): ?>
        workedBefore($("input[name=worked_before]:radio").val());
    <?php endif; ?>

    <?php if(get_data('employment_status') == 'No'): ?>

        employmentStatus($("input[name=employment_status]:radio").val());
    <?php endif; ?>

    <?php if(get_data('bond_status') == 'Yes'): ?>

        bondStatus($("input[name=bond_status]:radio").val());
    <?php endif; ?>

    <?php if(get_data('felony_status') == 'Yes'): ?>

        felonyStatus($("input[name=felony_status]:radio").val());
    <?php endif; ?>

    <?php if(get_data('performance_status') == 'Yes'): ?>

        performanceStatus($("input[name=performance_status]:radio").val());
    <?php endif; ?>

    <?php if(!empty(get_data('fast_driver_status'))): ?>

        fastDriverStatus("<?php echo get_data('fast_driver_status'); ?>");
    <?php endif; ?>

    <?php if(!empty(get_data('willing_status_rdo'))): ?>

        willingStatusRdo("<?php echo get_data('willing_status_rdo'); ?>");
    <?php endif; ?>


    ///// working ours end

<?php 
        if(is_array(get_data('status_de')) && get_data('status_de') !== NULL):
            $status_count = array_filter(get_data('status_de'), function($value) { return $value !== 'No'; });

        foreach ($status_count as $key => $value){

    ?>
        $(function(){

            // val = $("input[name=status_de<?php echo $key+1?>]:radio").val();
            val = "<?php echo get_data('status_de'.($key+1)); ?>";
            ID = "de"+"<?php echo $key+1?>";
           // console.log(val);
        if (val === "Yes") {
            if (ID === "de5" || ID === "de6" || ID === "de7") {
                $("#td_type_" + ID + "").html('<input type="text" class="form-control" value="'+"<?php echo get_data('type_de'.$key)?>"+'" name="type_' + ID + '" id="w6-type_' + ID + '" autocomplete="off" required>');
            } else {
                $("#td_type_" + ID + "").html('<select class="form-control" name="type_' + ID + '" id="w6-type_' + ID + '" required><option value="" selected>Select Type</option><option value="Dump" '+"<?php echo (get_data('type_de'.($key+1))=='Dump')?'Selected':null;?>"+'>Dump</option><option value="Flat" <?php echo (get_data('type_de'.($key+1))=="Flat")?"Selected":"";?> >Flat</option><option  value="Reefer" <?php echo (get_data('type_de'.($key+1))=="Reefer")?"Selected":"";?> >Reefer</option><option value="Tank" <?php echo (get_data('type_de'.($key+1))=="Tank")?"Selected":"";?>>Tank</option><option value="Van" <?php echo (get_data('type_de'.($key+1))=="Van")?"Selected":"";?> >Van</option></select>');
            }
            $("#td_from_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('from_de'.($key+1)))?>"  id="from_' + ID + '" name="from_' + ID + '" required=""></div>');
            $("#td_to_" + ID + "").html('<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" value="<?php echo getDateFromDB(get_data('to_de'.($key+1)))?>" id="to_' + ID + '" name="to_' + ID + '" required=""></div>');
            $("#td_miles_" + ID + "").html('<input type="text" class="form-control" value="<?php echo get_data('miles_de'.($key+1))?>" name="miles_' + ID + '" id="w6-miles_' + ID + '" autocomplete="off" required>');
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
    <?php if(get_data('prv_add_no') > 0 && get_data('prv_add_no') != null): ?>
        $(function(){

            <?php for($count =1; $count<=get_data('prv_add_no') ; $count++): ?>
                var count = <?php echo $count;?>;
                
            $("#prvs_add_div").append('<div id="prvs_add_div_' + count + '"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Previous Address Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" value="<?php echo get_data('previous_address_'.($count))?>" name="previous_address_' + count + '" id="w6-previous_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" value="<?php echo get_data('previous_city_'.($count))?>" name="previous_city_' + count + '" id="w6-previous_city_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-previous_province_' + count + '">Province</label><div class="col-sm-3"> <select class="form-control" name="previous_province_' + count + '" id="w6-previous_province_' + count + '" required><option value="">Select State</option><option value="AB" <?php echo (get_data('previous_province_'.($count))=='AB')?'Selected':null;?> >Alberta</option><option value="BC" <?php echo (get_data('previous_province_'.($count-1))=='BC')?'Selected':null;?> >British Columbia</option><option value="MB" <?php echo (get_data('previous_province_'.($count-1))=='MB')?'Selected':null;?> >Manitoba</option><option value="NB" <?php echo (get_data('previous_province_'.($count))=='NB')?'Selected':null;?> >New Brunswick</option><option value="NL" <?php echo (get_data('previous_province_'.($count-1))=='NL')?'Selected':null;?> >Newfoundland and Labrador</option><option value="NT" <?php echo (get_data('previous_province_'.($count))=='NT')?'Selected':null;?> >Northwest Territories</option><option value="NS" <?php echo (get_data('previous_province_'.($count))=='NS')?'Selected':null;?> >Nova Scotia</option><option value="NU" <?php echo (get_data('previous_province_'.($count))=='NU')?'Selected':null;?> >Nunavut</option><option value="ON" <?php echo (get_data('previous_province_'.($count))=='ON')?'Selected':null;?> >Ontario</option><option value="PE" <?php echo (get_data('previous_province_'.($count-1))=='PE')?'Selected':null;?> >Prince Edward Island</option><option value="QC" <?php echo (get_data('previous_province_'.($count))=='QC')?'Selected':null;?> >Quebec</option><option value="SK" <?php echo (get_data('previous_province_'.($count))=='SK')?'Selected':null;?> >Saskatchewan</option><option value="YT" <?php echo (get_data('previous_province_'.($count))=='YT')?'Selected':null;?> >Yukon Territory</option> </select></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_postal_code_' + count + '">Postal Code</label><div class="col-sm-3"> <input type="text" class="form-control" value="<?php echo get_data('previous_postal_code_'.($count))?>" name="previous_postal_code_' + count + '" id="w6-previous_postal_code_' + count + '" autocomplete="off" required style="text-transform:uppercase"></div> <label class="col-sm-3 control-label" for="w6-previous_duration_' + count + '">How Long? (years/months)</label><div class="col-sm-3"> <input type="text" class="form-control" value="<?php echo get_data('previous_duration_'.($count))?>" name="previous_duration_' + count + '" id="w6-previous_duration_' + count + '" autocomplete="off" required></div></div></div>');
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
    <?php if(get_data('prv_empl_his_no') > 0 && get_data('prv_empl_his_no') != null): ?>
        $(function(){
            <?php for($count =1; $count<=get_data('prv_empl_his_no') ; $count++): ?>
                var count = <?php echo $count;?>;

            $("#empl_his_div").append('<div id="emp_his_' + count + '" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Employment Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-is_employed_' + count + '">Employed</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="is_employed_yes_' + count + '" <?php echo (get_data('is_employed'.($count))=="Yes" )? "checked": ""?> name="is_employed_' + count + '" type="radio" value="Yes" required /> <label for="is_employed_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="is_employed_no_' + count + '" <?php echo (get_data('is_employed'.($count))=="No" )? "checked": ""?> name="is_employed_' + count + '" type="radio" value="No" /> <label for="is_employed_no_' + count + '">No</label></div></div></div><div id="is_employed_div_' + count + '" style="display: block;"><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-employer_company_name_' + count + '">Company Name</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_company_name_' + count + '" id="w6-employer_company_name_' + count + '" value="<?php echo get_data('employer_company_name'.($count))?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_name_' + count + '">Contact Person</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_name_' + count + '" id="w6-employer_name_' + count + '" value="<?php echo get_data('employer_name'.($count))?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" name="employer_address_' + count + '" id="w6-employer_address_' + count + '" value="<?php echo get_data('employer_address'.($count))?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_city_' + count + '" id="w6-employer_city_' + count + '" value="<?php echo get_data('employer_city'.($count))?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_province_' + count + '">Province</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_province_' + count + '" id="w6-employer_province_' + count + '" value="<?php echo get_data('employer_province'.($count))?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-emplyer_zip_' + count + '">Zip/PostalCode</label><div class="col-sm-3"> <input type="text" class="form-control" name="emplyer_zip_' + count + '" id="w6-emplyer_zip_' + count + '" value="<?php echo get_data('emplyer_zip'.($count))?>" autocomplete="off" required></div> <label class="col-sm-3 control-label is_employed_div_no_' + count + '" for="w6-position_held_' + count + '">Position Held</label><div class="col-sm-3 is_employed_div_no_' + count + '"> <select class="form-control" name="position_held_' + count + '" id="w6-position_held_' + count + '" required data-count="' + count + '" onchange="positionHeldOther(this)"><option selected disabled value>Select Class</option><option value="class-one" <?php echo (get_data('position_held'.($count)) == 'class-one')?'selected':null;?> >Class-One</option><option value="az" <?php echo (get_data('position_held'.($count)) == 'az')?'selected':null;?> >AZ</option><option value="dz" <?php echo (get_data('position_held'.($count)) == 'dz')?'selected':null;?> >DZ</option><option value="other" <?php echo (get_data('position_held'.($count)) == 'other')?'selected':null;?> >Other</option> </select></div></div><div class="form-group" id="posheld_other_div_' + count + '" style="display: none;"> <label class="col-sm-3 control-label" for="position_held_other_' + count + '">Other Position</label><div class="col-sm-9"> <input type="text" class="form-control" name="position_held_other_' + count + '" id="position_held_other_' + count + '" value="<?php echo get_data('position_held_other'.($count))?>" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_number_' + count + '">Contact Number</label><div class="col-sm-3"> <input type="text" class="form-control phone_number" name="employer_number_' + count + '" id="w6-employer_number_' + count + '" value="<?php echo get_data('employer_number'.($count))?>" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-fax_no_' + count + '">Fax No</label><div class="col-sm-3"> <input type="text" class="form-control phone_number" name="fax_no_' + count + '" id="w6-fax_no_' + count + '" autocomplete="off" value="<?php echo get_data('fax_no'.($count))?>" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="employment_fron_date_' + count + '">From</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_fron_date_' + count + '" value="<?php echo getDateFromDB(get_data('employment_fron_date'.($count)))?>" name="employment_fron_date_' + count + '" required></div></div> <label class="col-sm-3 control-label" for="employment_to_date_' + count + '">To</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_to_date_' + count + '" value="<?php echo getDateFromDB(get_data('employment_to_date'.($count)))?>" name="employment_to_date_' + count + '" required></div></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-salary_wage_' + count + '">Salary Wage</label><div class="col-sm-3"> <input type="text" class="form-control" name="salary_wage_' + count + '" id="w6-salary_wage_' + count + '" autocomplete="off" value="<?php echo get_data('salary_wage'.($count))?>" required></div> <label class="col-sm-3 control-label" for="w6-employer_leaving_reason_' + count + '">Reason for Leaving?</label><div class="col-sm-3"> <input type="text" class="form-control" value="<?php echo get_data('employer_leaving_reason'.($count))?>" name="employer_leaving_reason_' + count + '" id="w6-employer_leaving_reason_' + count + '" autocomplete="off" required></div></div><div class="form-group employer_email_div_' + count + '"><label class="col-sm-3 control-label" for="w6-employer_email' + count + '">Email</label><div class="col-sm-3"> <input type="email" class="form-control" value="<?php echo get_data('employer_email'.($count))?>" name="employer_email_' + count + '" id="w6-employer_email' + count + '" autocomplete="off" ></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-6 control-label" for="w6-fmcsr_status_' + count + '">Were you subject to the FMCSRs** while employed?</label><div class="col-sm-6"><div class="radio-custom radio-info"> <input id="fmcsr_status_yes_' + count + '" <?php echo (get_data('fmcsr_status'.($count))=="Yes" )? "checked": ""?> name="fmcsr_status_' + count + '" type="radio" value="Yes" required /> <label for="fmcsr_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="fmcsr_status_no' + count + '" <?php echo (get_data('fmcsr_status'.($count))=="No" )? "checked": ""?> name="fmcsr_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no' + count + '">No</label></div></div></div><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-9 control-label" for="w6-safety_sensitive_status_' + count + '">Was your job designated as a safety-sensitive function in any dot-regulated mode subject to the drug and alcohol testing requirements of 49 CRF part 40?</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="safety_sensitive_status_yes_' + count + '" <?php echo (get_data('safety_sensitive_status'.($count))=="Yes" )? "checked": ""?> name="safety_sensitive_status_' + count + '" type="radio" value="Yes" required /> <label for="safety_sensitive_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="safety_sensitive_status_no_' + count + '" <?php echo (get_data('safety_sensitive_status'.($count))=="No" )? "checked": ""?> name="safety_sensitive_status_' + count + '" type="radio" value="No" /> <label for="safety_sensitive_status_no_' + count + '">No</label></div></div></div></div></div>');

                <?php if(get_data('position_held'.($count)) == 'other'){ ?>
                    $("#posheld_other_div_"+count).fadeIn(300);
                <?php } ?>

                <?php if(get_data('is_employed'.($count)) =="No" ): ?>
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
    <?php if(get_data('prv_acc_his_no') > 0 && get_data('prv_acc_his_no') != null): ?>
        $(function(){
            <?php for($count =1; $count<=get_data('prv_acc_his_no') ; $count++): ?>
                var count = <?php echo $count;?>;
                   $("#acc_rcd_div").append('<div id="acc_rcd_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Accident Details</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-accident_date_'+count+'">Accident Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="w6-accident_date_'+count+'" name="accident_date_'+count+'"  value="<?php echo getDateFromDB(get_data('accident_date_'.($count)))?>" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_nature_' + count + '">Nature of Accident</label><div class="col-sm-9"><input type="text" class="form-control" name="accident_nature_' + count + '"  value="<?php echo get_data('accident_nature_'.($count))?>" id="w6-accident_nature_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_fatalities_' + count + '">Fatalities</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo get_data('accident_fatalities_'.($count))?>" name="accident_fatalities_' + count + '" id="w6-accident_fatalities_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_injuries_' + count + '">Injuries</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo get_data('accident_injuries_'.($count))?>" name="accident_injuries_' + count + '" id="w6-accident_injuries_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-accident_hazardous_' + count + '">Hazardous Material Spill</label><div class="col-sm-9"><input type="text" class="form-control"  value="<?php echo get_data('accident_hazardous_'.($count))?>" name="accident_hazardous_' + count + '" id="w6-accident_hazardous_' + count + '" required></div></div></div>');
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
    <?php if(get_data('prv_traffic_conviv_no') > 0 && get_data('prv_traffic_conviv_no') != null): ?>
        $(function(){
            <?php for($count =1; $count<=get_data('prv_traffic_conviv_no') ; $count++): ?>
                var count = <?php echo $count;?>;
                
                $("#prv_traffic_conviv").append('<div id="prv_traffic_conviv_rcd_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-acc_his_' + count + '">Traffic Convivtions</label></div><div class="form-group"><label class="col-sm-3" control-label" for="w6-traf_conviv_date_'+count+'">Traffic Convivtion Date</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" value="<?php echo get_data('traf_conviv_date_'.($count))?>"  data-plugin-datepicker="" class="form-control default-date-picker" id="w6-traf_conviv_date_'+count+'" name="traf_conviv_date_'+count+'" required=""></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_loc_' + count + '">Location</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo get_data('traf_conviv_loc_'.($count))?>"  name="traf_conviv_loc_' + count + '" id="w6-traf_conviv_loc_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_chrg_' + count + '">Charge</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo get_data('traf_conviv_chrg_'.($count))?>"  name="traf_conviv_chrg_' + count + '" id="w6-traf_conviv_chrg_' + count + '" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-traf_conviv_pen_' + count + '">Penalty</label><div class="col-sm-9"><input type="text" class="form-control" value="<?php echo get_data('traf_conviv_pen_'.($count))?>"  name="traf_conviv_pen_' + count + '" id="w6-traf_conviv_pen_' + count + '" required></div></div>');
                if (count >= 1) {
                    $("#dlt_prv_traffic_conviv").show();
                }
                $("#prv_traffic_conviv_no").val(count);
                $(this).attr("disabled", false);

            <?php endfor; ?>
        });
    <?php endif; ?>

    //fetch Add Traffic Convivtions from DB End

    <?php if(get_data('position_applied') == 'owner_operator'){ ?>
        position_applied('owner_operator');
    <?php } ?>

    //fetch Add Drug & Alcohol Test Details from DB
    <?php if(get_data('emp_drug_test_his_no') > 0 && get_data('emp_drug_test_his_no') != null): ?>
        $(function(){
            <?php for($count =1; $count<=get_data('emp_drug_test_his_no') ; $count++): ?>
                var count = <?php echo $count;?>;
                
                $("#emp_drug_test_div").append('<div id="emp_drug_test_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-emp_drug_test_his_' + count + '">Drug & Alcohol Test Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_type_' + count + '">Type of Test</label><div class="col-sm-9"><input type="text" class="form-control" readonly value="<?php echo get_data('emp_drug_test_type_'.($count))?>" name="emp_drug_test_type_' + count + '" id="w6-emp_drug_test_type_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_drug_test_date_' + count + '">Date</label><div class="col-sm-3"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control default-date-picker" id="emp_drug_test_date_' + count + '" value="<?php echo getDateFromDB(get_data('emp_drug_test_date_'.($count)))?>" name="emp_drug_test_date_' + count + '" required></div></div><label class="col-sm-3 control-label" for="w6-emp_drug_test_status_yn_' + count + '">Positive/Negative</label><div class="col-sm-3"><select class="form-control" name="emp_drug_test_status_yn_' + count + '" id="w6-emp_drug_test_status_yn_' + count + '" required><option value="">Select</option><option value="Positive" <?php echo(get_data('emp_drug_test_status_yn_'.($count))=="Positive")?"Selected":""?> >Positive</option><option value="Negative" <?php echo(get_data('emp_drug_test_status_yn_'.($count))=="Negative")?"Selected":""?> >Negative</option></select></div></div></div>');
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
            $("#owner_wsib").empty().append('<label class="col-sm-1 control-label" for="w6-wsib_no">WSIB No</label><div class="col-sm-6"><input type="text" class="form-control" name="wsib_no" value="<?php echo get_data('wsib_no')?>" id="w6-wsib_no" autocomplete="off" style="text-transform:uppercase"></div>');
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
        $("#prvs_add_div").append('<div id="prvs_add_div_' + count + '"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Previous Address Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" name="previous_address_' + count + '" id="w6-previous_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" name="previous_city_' + count + '" id="w6-previous_city_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-previous_province_' + count + '">Province</label><div class="col-sm-3"> <select class="form-control" name="previous_province_' + count + '" id="w6-previous_province_' + count + '" required><option value="">Select State</option><option value="AB" >Alberta</option><option value="BC" >British Columbia</option><option value="MB" >Manitoba</option><option value="NB" >New Brunswick</option><option value="NL" >Newfoundland and Labrador</option><option value="NT" >Northwest Territories</option><option value="NS" >Nova Scotia</option><option value="NU" >Nunavut</option><option value="ON" >Ontario</option><option value="PE" >Prince Edward Island</option><option value="QC" >Quebec</option><option value="SK" >Saskatchewan</option><option value="YT" >Yukon Territory</option> </select></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-previous_postal_code_' + count + '">Postal Code</label><div class="col-sm-3"> <input type="text" class="form-control" name="previous_postal_code_' + count + '" id="w6-previous_postal_code_' + count + '" autocomplete="off" required style="text-transform:uppercase"></div> <label class="col-sm-3 control-label" for="w6-previous_duration_' + count + '">How Long? (years/months)</label><div class="col-sm-3"> <input type="text" class="form-control" name="previous_duration_' + count + '" id="w6-previous_duration_' + count + '" autocomplete="off" required></div></div></div>');
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
        $("#empl_his_div").append('<div id="emp_his_' + count + '" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;"><div class="form-group"> <label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-prvs_' + count + '">Employment Details</label></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-is_employed_' + count + '">Employed</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="is_employed_yes_' + count + '" name="is_employed_' + count + '" type="radio" value="Yes" required /> <label for="is_employed_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="is_employed_no_' + count + '" name="is_employed_' + count + '" type="radio" value="No" /> <label for="is_employed_no_' + count + '">No</label></div></div></div><div id="is_employed_div_' + count + '" style="display: none;"><div class="form-group is_employed_div_no_' + count + '"> <label class="col-sm-3 control-label" for="w6-employer_company_name_' + count + '">Company Name</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_company_name_' + count + '" id="w6-employer_company_name_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_name_' + count + '">Contact Person</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_name_' + count + '" id="w6-employer_name_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_address_' + count + '">Address</label><div class="col-sm-9"> <input type="text" class="form-control" name="employer_address_' + count + '" id="w6-employer_address_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_city_' + count + '">City</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_city_' + count + '" id="w6-employer_city_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_province_' + count + '">Province</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_province_' + count + '" id="w6-employer_province_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-emplyer_zip_' + count + '">Zip/PostalCode</label><div class="col-sm-3"> <input type="text" class="form-control" name="emplyer_zip_' + count + '" id="w6-emplyer_zip_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label is_employed_div_no_' + count + '" for="w6-position_held_' + count + '">Position Held</label><div class="col-sm-3 is_employed_div_no_' + count + '"> <select class="form-control" name="position_held_' + count + '" id="w6-position_held_' + count + '" required data-count="' + count + '" onchange="positionHeldOther(this)"><option selected disabled value>Select Class</option><option value="class-one" >Class-One</option><option value="az" >AZ</option><option value="dz" >DZ</option><option value="other" >Other</option> </select></div></div><div class="form-group" id="posheld_other_div_' + count + '" style="display: none;"> <label class="col-sm-3 control-label" for="position_held_other_' + count + '">Other Position</label><div class="col-sm-9"> <input type="text" class="form-control" name="position_held_other_' + count + '" id="position_held_other_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="w6-employer_number_' + count + '">Contact Number</label><div class="col-sm-3"> <input type="text" class="form-control phone_number" name="employer_number_' + count + '" id="w6-employer_number_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-fax_no_' + count + '">Fax No</label><div class="col-sm-3"> <input type="text" class="form-control phone_number" name="fax_no_' + count + '" id="w6-fax_no_' + count + '" autocomplete="off" required></div></div><div class="form-group"> <label class="col-sm-3 control-label" for="employment_fron_date_' + count + '">From</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_fron_date_' + count + '" name="employment_fron_date_' + count + '" required></div></div> <label class="col-sm-3 control-label" for="employment_to_date_' + count + '">To</label><div class="col-sm-3"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> <input type="text" data-plugin-datepicker class="form-control default-date-picker" id="employment_to_date_' + count + '" name="employment_to_date_' + count + '" required></div></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-3 control-label" for="w6-salary_wage_' + count + '">Salary Wage</label><div class="col-sm-3"> <input type="text" class="form-control" name="salary_wage_' + count + '" id="w6-salary_wage_' + count + '" autocomplete="off" required></div> <label class="col-sm-3 control-label" for="w6-employer_leaving_reason_' + count + '">Reason for Leaving?</label><div class="col-sm-3"> <input type="text" class="form-control" name="employer_leaving_reason_' + count + '" id="w6-employer_leaving_reason_' + count + '" autocomplete="off" required></div></div><div class="form-group employer_email_div_' + count + '"><label class="col-sm-3 control-label" for="w6-employer_email_' + count + '">Email</label><div class="col-sm-3"> <input type="email" class="form-control" name="employer_email_' + count + '" id="w6-employer_email_' + count + '" autocomplete="off"></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-6 control-label" for="w6-fmcsr_status_' + count + '">Were you subject to the FMCSRs** while employed?</label><div class="col-sm-6"><div class="radio-custom radio-info"> <input id="fmcsr_status_yes_' + count + '" name="fmcsr_status_' + count + '" type="radio" value="Yes" required /> <label for="fmcsr_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="fmcsr_status_no' + count + '" name="fmcsr_status_' + count + '" type="radio" value="No" /> <label for="fmcsr_status_no' + count + '">No</label></div></div></div><div class="form-group is_employed_div_no_' + count + '" > <label class="col-sm-9 control-label" for="w6-safety_sensitive_status_' + count + '">Was your job designated as a safety-sensitive function in any dot-regulated mode subject to the drug and alcohol testing requirements of 49 CRF part 40?</label><div class="col-sm-3"><div class="radio-custom radio-info"> <input id="safety_sensitive_status_yes_' + count + '" name="safety_sensitive_status_' + count + '" type="radio" value="Yes" required /> <label for="safety_sensitive_status_yes_' + count + '">Yes</label></div><div class="radio-custom radio-info"> <input id="safety_sensitive_status_no_' + count + '" name="safety_sensitive_status_' + count + '" type="radio" value="No" /> <label for="safety_sensitive_status_no_' + count + '">No</label></div></div></div></div></div>');
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
        $("#emp_claim_div").append('<div id="emp_claim_div_' + count + '"><div class="form-group"><label class="col-sm-3 control-label" style="font-weight: bold !important;" for="w6-emp_claim_his_' + count + '">Claim Details</label></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_date_' + count + '">Date of Accident</label><div class="col-sm-9"><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" data-plugin-datepicker class="form-control form-control default-date-picker valid" id="emp_claim_date_' + count + '" name="emp_claim_date_' + count + '" required></div></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_desp_' + count + '">Description & Location of Accident</label><div class="col-sm-9"><input type="text" class="form-control" name="emp_claim_desp_' + count + '" id="w6-emp_claim_desp_' + count + '" autocomplete="off" required></div></div><div class="form-group"><label class="col-sm-3 control-label" for="w6-emp_claim_fault_' + count + '">% Fault</label><div class="col-sm-3"><input type="text" class="form-control" name="emp_claim_fault_' + count + '" id="w6-emp_claim_fault_' + count + '" autocomplete="off" required></div><label class="col-sm-3 control-label" for="w6-emp_claim_amount_">Total Amount Paid</label><div class="col-sm-3"><input type="text" class="form-control" name="emp_claim_amount_' + count + '" id="w6-emp_claim_amount_' + count + '" autocomplete="off" required></div></div></div>');

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
                    defaultTime: "<?php echo get_data('emp_last_reliev_from')?>",
                });    
                $('#emp_last_reliev_to').timepicker({
                    defaultTime: "<?php echo get_data('emp_last_reliev_to')?>",
                });


});

</script>


<script type="text/javascript">
    $(document).on('change','input[type=radio]',function(){
        if(this.name.slice(0,11) == 'is_employed'){
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

    $(document).ready(function(){
        total_working_hours();
        emp_den_license_checked();

        if($("").attr('value')=='___-___-___'){
            $("").removeAttr('value');
        }
    });
    var required_actioned_items = [];
    $(document).on('change','#free_mode_button',function(){
        var free_mode = $('input[name=free_mode_button]:checked').val();
        if(free_mode == 'on'){
            required_actioned_items = [];
            $("#driver_add_form").append("<input type='hidden' value='True' name='isFree' id='isFree'>");
            $("html").append('<div id="free_mode_msg_container" class="fadeInDown"><p>Free Mode Is Activated</p></div>');
            

            $("#free_mode_msg_container").addClass('fadeInDown');
            $("#free_mode_msg_container").removeClass('fadeOutUp');
            var count = 0;

            var requiredInputs = [ 'first_name','last_name','email','sin','emp_license_no' ];
            $("#driver_add_form input").each(function(){
                if(jQuery.inArray( $(this).attr('name'), requiredInputs ) == -1){
                    if($(this).attr('required') == 'required'){
                        required_actioned_items.push($(this));
                        $(this).removeAttr('required');
                        var parent = $(this).closest('.form-group');
                        parent.removeClass('has-error');
                        $(this).closest('.error').remove();
                        parent.find('.error').remove();
                    }

                }
            });

            var requiredSelect = [ 'select1','select2'];
            $("#driver_add_form select").each(function(){
                if(jQuery.inArray( $(this).attr('name'), requiredSelect ) == -1){
                    if($(this).attr('required') == 'required'){
                        required_actioned_items.push($(this));
                        $(this).removeAttr('required');
                        var parent = $(this).closest('.form-group');
                        parent.removeClass('has-error');
                        // $(this).closest('.error').remove();
                        // $(this).next('.error').remove();
                        // parent.find('.error').remove();
                        $('.error').each(function(){
                            $(this).remove();
                        });
                    }
                }
            });
        }else{
            $("#isFree").remove();
            $("#free_mode_msg_container").removeClass('fadeInDown');
            $("#free_mode_msg_container").addClass('fadeOutUp');
            setTimeout(function() {   //calls click event after a certain time
               $("#free_mode_msg_container").remove();
            }, 400);
            
            for (var i = required_actioned_items.length - 1; i >= 0; i--) {
                required_actioned_items[i].attr('required','true');
                // required_actioned_items.splice(i, 1);

            }
        }
    });


    $('input[name*=hours_worked]').focusout(function(){
        total_working_hours();
    });

    function total_working_hours(){
        var value = 0;
        $('input[name*=hours_worked]').each(function(){
            value +=  parseInt($(this).val());
        });      
        $('#total_working_hours').val(value);
    }  

    function emp_den_license_checked(){
        var emp_den_license = $('input[name=emp_den_license]:checked').val();
        var emp_license_per = $('input[name=emp_license_per]:checked').val();

        if(emp_den_license == 'No' && emp_license_per == 'No'){
            $('#emp_exp_us_commercial_div').fadeOut(100);
        }else{
            $('#emp_exp_us_commercial_div').fadeIn(100);
        }
    }

    $("input[name=emp_den_license],input[name=emp_license_per]").change(function(){
        emp_den_license_checked();
    });

    $(document).on('change','#sup-approval',function(){
        var sup_approval = $('input[name=sup-approval]:checked').val();
        if(sup_approval == 'on'){
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('driver/signup_approval')?>",
                data:{'sup_approval':sup_approval,'id':"<?php echo get_data('id')?>"},
                success:function(data){
                    if(data == 'true'){
                        $("html").append('<div id="free_mode_msg_container" class="fadeInDown"><p>Driver Application For Sign Up Has Been Approved</p></div>');
                        $("#free_mode_msg_container").addClass('fadeInDown');
                        $("#free_mode_msg_container").removeClass('fadeOutUp');

                        

                        setTimeout(function() {   //calls click event after a certain time
                           $("#free_mode_msg_container").removeClass('fadeInDown');
                           $("#free_mode_msg_container").addClass('fadeOutUp');
                        }, 2000);

                        setTimeout(function() {   //calls click event after a certain time
                           $("#free_mode_msg_container").remove();
                           $("#sup_approval_div").addClass('fadeOutUp');
                        }, 2400);
                        
                        setTimeout(function() {   //calls click event after a certain time
                           $('#sup_approval_div').remove();
                        }, 3000);
                    }
                },
                error: function(data){
                }
            }).done(function(data) {
            });
        }
    });
</script>