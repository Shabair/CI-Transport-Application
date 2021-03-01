
<!-- page start-->
<style type="text/css">

  .fa-close{
      color: #FF0000;
      font-size: 13px;
  }
  .pro-title {
    margin-top: 5px;
  }
  .axty{
      margin-right: 10px;
  }
  .table tbody > tr > td,.table tbody > tr > td > span{
    vertical-align: middle;
  }
  .table-bordered>thead>tr>td {
      border-bottom-width: 0px; 
  }
  .table-bordered>tbody>tr:first-child >td {
      border-top-width: 3px; 
  }
  thead,.headings {
    color: #DA3A3A;
  }
  #DOBdiff {
    font-size: 10px;
    font-style: italic;
    color: #9e9e9e;
    float:right;
  }

</style>

<?php 
error_reporting(0);
/*TRAINING SCHEDULE FOR DRIVERS / OWNER OPERATORS*/
$traindateArr = unserialize($driver['traindate']);
$trainopArr = unserialize($driver['trainop']);
$trainnameArr = unserialize($driver['trainname']);

for($i=1;$i<=16;$i++){
 
$driver['traindate'.$i] =  $traindate[$i] = (set_value('traindate'.$i))?set_value('traindate'.$i):((isset($traindateArr[$i-1]))?$traindateArr[$i-1]:'');

$driver['trainop'.$i] = $trainop[$i]=(set_value('trainop'.$i))?set_value('trainop'.$i):((isset($trainopArr[$i-1]))?$trainopArr[$i-1]:'');

$driver['trainname'.$i] = $trainname[$i]=(set_value('trainname'.$i))?set_value('trainname'.$i):((isset($trainnameArr[$i-1]))?$trainnameArr[$i-1]:'');
}

if(isset($driver['id'])){
  $id=$driver['id'];
  set_data($driver);
}else{
   $id='';
}  

function DriverData($name){
  return (get_data($name))?get_data($name):null;
}
/*TRAINING SCHEDULE FOR DRIVERS / OWNER OPERATORS END*/
?>
<div class="row">
    <div class="col-lg-12">
    
        <?php if ($this->session->flashdata('success')) :?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?=$this->session->flashdata('success')?></strong> 
        </div>
        <?php endif;?>
        <section class="panel">
            <div class="panel-body">
                
                <div class="tab-content">
                    <div  class="tab-pane fade in active">
                   
                      <div class="row">
                        <div class="col-md-12">
                          <h4 class="pro-title">Basic Info Of Driver</h4>
                        </div><!--col-md-12 close-->

<!-- <form id="file_form" enctype="multipart/form-data" method="post" action="<?php //echo site_url('driver/add_files/'.get_data('id')); ?>"> -->
                        <div class="col-md-6">
                          <div class="table-responsive responsiv-table">
                            <table class="table bio-table table-bordered table-hover panel panel-primary">
                              <thead class="panel-heading">
                                <tr>
                                  <td colspan="2"><h4>Employee Name, Address & Phone <a class="update btn btn-xs btn-primary pull-right" id="enable1" style="margin-right:10px;"><i class="fa fa-pencil-square-o"></i></a><a class="update btn btn-xs btn-danger pull-right fa fa-minus axty"></a></h4></td>
                                </tr>
                              </thead>
                                <tbody class="panel-body">
                                  <tr>      
                                    <td>First Name</td>
                                    <td><a  data-name="first_name" data-type="text" data-pk="<?php echo $id?>" data-title="Enter first_name" class="editable1"><?php echo DriverData('first_name')?></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>Middle Name</td>
                                    <td><a  data-name="middle_name" data-type="text" data-pk="<?php echo $id?>" data-title="Enter middle_name" class="editable1"><?php echo DriverData('middle_name')?></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>Last Name</td>
                                    <td><a  data-name="last_name" data-type="text" data-pk="<?php echo $id?>" data-title="Enter last_name" class="editable1"><?php echo DriverData('last_name')?></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>Address</td>
                                    <td><a  data-name="address" data-type="text" data-pk="<?php echo $id?>" data-title="Enter address" class="editable1"><?php echo DriverData('address')?></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>City</td>
                                    <td><a  data-name="city" data-type="text" data-pk="<?php echo $id?>" data-title="Enter city" class="editable1"><?php echo DriverData('city')?></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>State</td>
                                    <td><a  data-name="province" id="state" data-type="select" data-pk="<?php echo $id?>" data-title="Enter Province"></a></td> 
                                  </tr>
                                  <tr>      
                                    <td>Postal Code</td>
                                    <td><a  data-name="postalcode" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Postal Code" data-inputclass="postal_code" class="editable1"><?php echo DriverData('postalcode')?></a></td> 
                                  </tr>
                                  <tr>    
                                    <td>Phone Number</td>
                                    <td><a  data-name="phonenumber" data-inputclass="phone_number" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Phonenumber" class="editable1"><?php echo DriverData('phonenumber')?></a></td>       
                                  </tr>
                                  <tr>    
                                    <td>Alternate Phone(US)</td>
                                    <td><a  data-name="phonenumber" data-inputclass="phone_number" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Phonenumber" class="editable1"><?php echo DriverData('alternative_phone')?></a></td>       
                                  </tr>
                                  <tr>    
                                    <td>Home No</td>
                                    <td><a  data-name="homenumber" data-inputclass="home_no" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Home Number" class="editable1"><?php echo DriverData('homenumber')?></a></td>       
                                  </tr>
                                  <tr>    
                                    <td>Emergency contact<br /> Phone</td>
                                    <td><a  data-name="emg_contact_number" data-inputclass="em_con_no" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Emergency contact Phone" class="editable1"><?php echo DriverData('emg_contact_number')?></a></td>       
                                  </tr>
                                  <tr>    
                                    <td>Emergency Contact<br /> Name & relationship</td>
                                    <td><a  data-name="emg_contact" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Emergency Contact Name & relationship" class="editable1"><?php echo DriverData('emg_contact')?></a></td>       
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td><a  data-name="email" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Email" class="editable1"><?php echo DriverData('email')?></a></td> 
                                  </tr>
                              </tbody>
                            </table>
                          </div><!--table-responsive close-->
                          <div class="table-responsive responsiv-table">
                            <table class="table bio-table table-bordered table-hover panel panel-primary">
                              <thead class="panel-heading">
                                <tr>
                                  <td colspan="2"><h4>License Information <a class="update btn btn-xs btn-primary pull-right" id="enable2" style="margin-right:10px;"><i class="fa fa-pencil-square-o"></i></a><a class="update btn btn-xs btn-danger pull-right fa fa-minus axty" ></a></h4></td>
                                </tr>
                              </thead>
                                <tbody class="panel-body">
                                  <tr>
                                      <td>License No</td>
                                      <td><span style="float:left;"><a  data-name="emp_license_no" data-type="text" data-pk="<?php echo $id?>" data-title="Enter License No" class="editable2"><?php echo DriverData('emp_license_no')?></a></span></td> 
                                   </tr>
                                   <tr>  
                                      <td>Licese Class</td>
                                      <td><a  data-name="emp_license_class" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Licese Class" class="editable2"><?php echo DriverData('emp_license_class')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Issue Date</td>
                                      <td><a  data-name="emp_license_org_date" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Enter Issue Date" class="editable2"><?php echo DriverData('emp_license_org_date')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Expire Date</td>
                                      <td><a  data-name="emp_license_exp_date" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Enter Expire Date" class="editable2"><?php echo getDateFromDB(DriverData('emp_license_exp_date'))?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Restriction</td>
                                      <td><a  data-name="emp_license_restrictions" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Restriction" class="editable2"><?php echo DriverData('emp_license_restrictions')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Endorsements</td>
                                      <td><a  data-name="emp_license_endrosments" data-type="text" data-pk="<?php echo $id?>" data-title="Enter Endorsements" class="editable2"><?php echo DriverData('emp_license_endrosments')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Issue State</td>
                                      <td><a  data-name="emp_license_state" data-type="select" id="license_issue" data-pk="<?php echo $id?>" data-title="Enter Issue State" ></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Medical Expire</td>
                                      <td><a  data-name="medical_due" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Enter Medical Expire" class="editable2"><?php echo getDateFromDB(DriverData('medical_due'))?></a></td> 
                                   </tr>
                              </tbody>
                            </table>
                          </div><!--table-responsive close-->
                        </div><!--col-md-6 close-->




                        <div class="col-md-6">
                          <div class="table-responsive responsiv-table">
                            <table class="table bio-table table-bordered table-hover panel panel-primary">
                              <thead class="panel-heading">
                                <tr>
                                  <td colspan="2"><h4>Job /Organization Info <a class="update btn btn-xs btn-primary pull-right" id="enable4" style="margin-right:10px;"><i class="fa fa-pencil-square-o"></i></a><a class="update btn btn-xs btn-danger pull-right fa fa-minus axty"></a></h4></td>
                                </tr>
                              </thead>
                                <tbody class="panel-body">
                                   <tr>  
                                      <td>Position Applied For</td>
                                      <td><a  data-name="position_applied" id="selectposition" data-type="select"  data-pk="<?php echo get_data('id')?>" data-title="Position Applied For">
                                            <?php echo getposition(DriverData('position_applied'))?>
                                          </a>
                                      </td> 
                                   </tr>
                                   <?php if(DriverData('driver_for_o_p') !== null): ?>
                                   <tr>  
                                      <td>Driver For</td>
                                      <td><a  data-name="driver_for_o_p" data-type="text" data-pk="<?php echo $id?>" data-title="Driver For" class="editable4"><?php echo DriverData('driver_for_o_p')?></a></td> 
                                   </tr>
                                 <?php endif; ?>
                                   <tr>  
                                      <td>Application Date</td>
                                      <td><a  data-name="emp_spl_equ_list" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Application Date" class="editable4"><?php echo getDateFromDB(DriverData('application_date'))?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Hire Date</td>
                                      <td><a  data-name="sin_no" data-type="text" data-pk="<?php echo $id?>" data-title="Hire Date" class="editable4"><?php echo getDateFromDB(DriverData('hire_date'))?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Border Cross Date</td>
                                      <td><a  data-name="border_cross_date" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Border Cross Date" class="editable4"><?php echo getDateFromDB(DriverData('border_cross_date'))?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Abstract Points</td>
                                      <td><a  data-name="abstract_points" id="abstract_points" data-type="select"  data-pk="<?php echo $id?>" data-title="Abstract Points"><?php echo DriverData('abstract_points')?DriverData('abstract_points'):0;?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Convictions on Abstract</td>
                                      <td><a  data-name="convictions_abstract" id="convictions_abstract"   data-type="select"  data-pk="<?php echo $id?>" data-title="Convictions on Abstract"><?php echo DriverData('convictions_abstract')?DriverData('convictions_abstract'):0;?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Police Report Date</td>
                                      <td><a  data-name="police_report_date" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Police Report Date" class="editable4"><?php echo getDateFromDB(DriverData('police_report_date'))?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Out of Province Insurance</td>
                                      <td><a  data-name="province_insurance" data-type="text" data-pk="<?php echo $id?>" data-title="Out of Province Insurance" class="editable4"><?php echo (DriverData('province_insurance') == 'yes')?'Yes':'No';?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Road Test</td>
                                      <td><a  data-name="road_test" data-type="text" data-pk="<?php echo $id?>" data-title="Road Test" class="editable4"><?php echo DriverData('road_test')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Road Test Examiner Name*</td>
                                      <td><a  data-name="road_test_examiner" data-type="text" data-pk="<?php echo $id?>" data-title="Road Test Examiner Name" class="editable4"><?php echo DriverData('road_test_examiner')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>PSP (Pre-Employment Screening Program)</td>
                                      <td><a  data-name="medical_due" data-type="text" data-pk="<?php echo $id?>" data-title="PSP (Pre-Employment Screening Program)" class="editable4"><?php echo (DriverData('p_s_p') == 'yes')?'Yes':'No';?></a></td> 
                                   </tr>
    <!-- second method for annual review -->
    <?php 
      $oldAnnualReview = get_data('last_annual_review_date');

      $CRNTdate = new DateTime(date('Y-m-d'));//date('Y-m-d')
      $CRNTdate->add(new DateInterval('P1M'));
      $currentWith1Mth = $CRNTdate->format('Y-m-d');
      if(empty($oldAnnualReview)){
        $ARdate = new DateTime(get_data('application_date'));
        $ARdate->add(new DateInterval('P1Y'));
        $oldAnnualReview = $ARdate->format('Y-m-d');
      }
      if($currentWith1Mth >= $oldAnnualReview)
         $true = true;
    ?>
    <!-- second method for annual review end -->

                                   <tr style="<?php echo($true)?'background-color: #ff827d;':''; ?>">  
                                      <td>Annual Review
                                      <!-- list of annual reviews --> 
                                        <?php 
                                          if(get_data('annual_reviews') !== null):
                                          // second para to disable to switch and thrid for disable filteration of text
                                              $annual_reviews = unserialize(get_data('annual_reviews',false,false)); 
                                        ?>
                                        <select name="annual_reviews" onchange="window.open(this.value, '_blank');" class="pull-right">
                                          <option value="" disabled="" selected="">Annual Reviews</option>
                                          <?php foreach($annual_reviews as $year => $annual_review): ?>
                                          <option value="<?php echo base_url().'/uploads/annual_reviews/'.$annual_review ?>"><?php echo $year?></option>
                                          <?php endforeach; ?>
                                        </select>
                                          <?php endif; ?>
                                      <!-- list of annual review end -->

                                      </td>
                                      <td>
                                        <a  data-name="medical_due" data-type="text" data-pk="<?php echo $id?>" data-title="PSP (Pre-Employment Screening Program)" class="editable4"><?php echo (($true)?'Due Date: ':''),getDateFromDB(DriverData('last_annual_review_date'));?></a><br />
                                        <?php if($true): ?>
                                          <form method="post" action="<?php echo base_url('driver/get_annual_review_pdf/')?>">
                                            <input type="hidden" name="driver_id" value="<?php echo get_data('id'); ?>">
                                            <input type="Submit" value="Generate Annual Review" name="submit" class="btn btn-xs btn-info pull-right" style="margin-top: 5px;">
                                          </form>
                                        <?php endif; ?>
                                      </td> 
                                   </tr>
                                   <tr>  
                                      <td>Contract</td>
                                      <td><?php echo get_data('contract_date'); ?><a class="view btn btn-xs btn-info pull-right" style="margin-right:10px;" href="<?php echo base_url('driver/get_contract_pdf/'.get_data('id'))?>">  <i title="Contract File" class="fa fa-file"></i></a></td> 
                                   </tr>
                              </tbody>
                            </table>
                          </div><!--table-responsive close-->
                          <div class="table-responsive responsiv-table">
                            <table class="table bio-table table-bordered table-hover panel panel-primary">
                              <thead class="panel-heading">
                                <tr>
                                  <td colspan="2"><h4>Personal Information <a class="update btn btn-xs btn-primary pull-right" id="enable3" style="margin-right:10px;"><i class="fa fa-pencil-square-o"></i></a><a class="update btn btn-xs btn-danger pull-right fa fa-minus axty"></a></h4></td>
                                </tr>
                              </thead>
                                <tbody class="panel-body">
                                  <!-- DOB Diff From Current Date -->
                                  <?php 
                                  $DOBdiff = '';
                                  if(!empty(DriverData('dob'))){
                                    $date1=date_create(DriverData('dob'));
                                    $date2=date_create("now");
                                    $diff=date_diff($date1,$date2);
                                    $DOBMonths = $diff->format("%M"); //DateInterval::format
                                    // $DOBDays = $diff->format("%D");
                                    $DOBYears = $diff->format("%Y");
                  
                                    $DOBdiff = (($DOBYears!= '00')?"$DOBYears Years":'').(($DOBMonths!= '00')?", $DOBMonths Months":'')/*.(($DOBDays!= '00')?", $DOBDays Days":'')*/;
                                  }
                                    
                                  ?>
                                  <!-- DOB diff end -->
                                   <tr>  
                                      <td>Date of Birth</td>
                                      <td><a  data-name="dob" data-type="text" data-inputclass='default-date-picker' data-pk="<?php echo $id?>" data-title="Date of Birth" class="editable3"><?php echo getDateFromDB(DriverData('dob'))?></a> <span id="DOBdiff"><?php echo $DOBdiff;?></span></td> 
                                   </tr>
                                   <tr>  
                                      <td>Material Status</td>
                                      <td><a  data-name="mateial_status" id="mateial_status" data-type="select" data-pk="<?php echo $id?>" data-title="Material Status"></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Social Security No</td>
                                      <td><a  data-name="sin_no" data-type="text" data-inputclass="ss_no" data-pk="<?php echo $id?>" data-title="Social Security No" class="editable3"><?php echo DriverData('sin')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Driver's Experience</td>
                                      <td>
                                          <a  data-name="emp_experience_year" data-type="number"  data-pk="<?php echo $id?>" data-title="Experience's Year(s)" data-min='0' data-max='40' class="editable3"><?php echo (DriverData('emp_experience_year'))?DriverData('emp_experience_year'):0?></a>
                                          Year(s)
                                          <a  data-name="emp_experience_month" data-type="number"  data-pk="<?php echo $id?>" data-title="Experience's Month(s)" data-min='0' data-max='12' class="editable3"><?php echo (DriverData('emp_experience_month'))?DriverData('emp_experience_month'):0?></a>
                                          Month(s)
                                      </td> 
                                   </tr>
                                   <tr>  
                                      <td>Passport No</td>
                                      <td><a  data-name="passport_number" data-type="text" data-pk="<?php echo $id?>" data-title="Passport No" class="editable3"><?php echo DriverData('passport_number')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Passport Expire</td>
                                      <td><a  data-name="passport_date" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Passport Expire" class="editable3"><?php echo DriverData('passport_date')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Fast Card no</td>
                                      <td><a  data-name="fast_card_no" data-type="text" data-pk="<?php echo $id?>" data-title="Fast Card no" class="editable3"><?php echo DriverData('fast_card_no')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Fast Card Expire</td>
                                      <td><a  data-name="fast_card_expiry" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $id?>" data-title="Fast Card Expire" class="editable3"><?php echo DriverData('fast_card_expiry')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Incorporation Name</td>
                                      <td><a  data-name="medical_due" data-type="text" data-pk="<?php echo $id?>" data-title="Entdcsdcsdcdcscdpire" class="editable3"><?php echo DriverData('incorporation_name')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>HST no</td>
                                      <td><a  data-name="medical_due" data-type="text" data-pk="<?php echo $id?>" data-title="Entdcsdcsdcdcscdpire" class="editable3"><?php echo DriverData('h_s_t')?></a></td> 
                                   </tr>
                                   <tr>  
                                      <td>Criminal Record Date</td>
                                      <td><a  data-name="medical_due" data-type="text" data-pk="<?php echo $id?>" data-title="Entdcsdcsdcdcscdpire" class="editable3"><?php echo DriverData('criminal_record_date')?></a></td> 
                                   </tr>
                              </tbody>
                            </table>
                          </div><!--table-responsive close-->
                        </div><!--col-md-6 close-->
                        

                      </div><!--row close-->         
                      <div class="row" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;">
                        <div class="col-md-12">
                          <h4 class="headings">Issue Cards
                          <span class="btn btn-xs btn-success pull-right" id="issue_card_btn"><!-- <i id="issue_card_icon" class="fa fa-plus"></i> -->ADD Card</span></h4>
                          <input type="hidden" id="issue_card_count" name="issue_card_count" data-last-issue="0" value="<?php echo get_data('issue_card_count')?>">
                        </div><!--col-md-12 close-->
                        <div class="clearfix"></div>
                        <!--  -->
                        <div id="issue_card_container"></div>                        <!--  -->
                      </div>
                      <div class="row btmbstyle" id="if_paf_ownop" style="display: none;">
                        <div class="col-md-12" >
                          <h4 class="headings" >Owner-Operator (WSIB No)<span class="btn btn-xs btn-success pull-right" id="owner_op_btn"><i id="owner_op_icon" class="fa fa-plus"></i></span></h4>
                        </div><!--col-md-12 close-->
                        <div class="clearfix"></div>
                        <div id="owner_op_div" style="display: none;/*border-top: 1px solid #ddd;*/padding-top: 10px;/*border-top-width: 80%;padding-right:20px;*/ ">
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="owner_op_wsib_no" class="control-label">Owner-Operator (WSIB No)</label>
                              <input class="form-control input-sm" id="owner_op_wsib_no" name="owner_op_wsib_no" type="text" value="<?php echo get_data('owner_op_wsib_no') ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="iowc_submit" class="control-label">IOWC Submitted</label>
                              <input class="form-control input-sm" id="iowc_submit" name="iowc_submit" type="text" value="<?php echo get_data('iowc_submit') ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="clear_certific" class="control-label">Clearance Certificate</label>
                              <input class="form-control input-sm" id="clear_certific" name="clear_certific" type="text" value="<?php echo get_data('clear_certific') ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="iowc_return" class="control-label">IOWC Return</label>
                              <input class="form-control input-sm" id="iowc_return" name="iowc_return" type="text" value="<?php echo get_data('iowc_return') ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="clearance_certific" class="control-label">Clearance Certificate</label>
                              <input class="form-control input-sm" id="clearance_certific" name="clearance_certific" type="text" value="<?php echo get_data('clearance_certific') ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group ">
                              <label for="iowc_id_no" class="control-label">IOWC ID No</label>
                              <input class="form-control input-sm" id="iowc_id_no" name="iowc_id_no" type="text" value="<?php echo get_data('iowc_id_no') ?>" />
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group ">
                              <label for="if_paf_ownop_note" class="control-label">Notes</label>
                              <textarea class="form-control" rows="3" name="if_paf_ownop_note" id="if_paf_ownop_note"></textarea>
                            </div>
                          </div>
                          <!-- qualification chcek -->
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
                          <!--  -->
                        </div>
                      </div>

                      <?php 
                        $drug_tests = $this->db->query("SELECT `emp_drug_test_his_no`,`emp_drug_test_date`,`emp_drug_test_status_yn` FROM employer_history WHERE  driver_id = '".$id."'")->row();
                        $dtest_count = $drug_tests->emp_drug_test_his_no;
                        $dtestdate = unserialize($drug_tests->emp_drug_test_date);
                        $dtestresult = unserialize($drug_tests->emp_drug_test_status_yn);
                      ?>
                      <!-- sap start -->
                      <!-- sap end -->
                      <!-- Drug Test -->
                      <div class="row" style="padding-top: 15px;margin-top: 15px;">
                        <div class="col-md-12">
                          <h4 class="headings">Drug Test</h4>
                        </div>
                        <!-- Drug test Start -->
                        <div class="col-md-12">
                          <div class="col-md-3"><h4 class="pro-title">Drug Test</h4></div>  
                          <div class="col-md-7"><h4 class="pro-title"><?php echo (empty($dtest_count))?'<i class="text-danger">Empty</i>':''?></h4></div>
                          <div class="col-md-2" style="padding: 0px;">
                            <?php if(!empty($dtest_count)){ ?>
                              <div class="btn btn-xs btn-success pull-right" id="drug_test_btn"><i id="drug_test_icon" class="fa fa-plus"></i></div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="col-md-12" id="drug_test_div" style="display: none;">
                          <?php for($i =0; $i < $dtest_count; $i++): ?>
                            <div style="margin-top: 20px;">
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="w6-cvor_date">Pre-Employment Date</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control default-date-picker" id="p_emp_date" value="<?php echo $dtestdate[$i]?>" name="p_emp_date" required="">
                                    </div>
                                </div>
                              </div> 
                              <div class="form-group">
                                <label class="col-sm-3 control-label" for="p_emp_result">Result</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control " value="<?php echo $dtestresult[$i]?>" id="p_emp_result" name="p_emp_result" required="">
                                    </div>
                                </div>
                              </div>
                            </div>
                          <div class="clearfix"></div>
                          <!-- <div class="clearfix"></div> -->
                        <?php endfor; ?>
                        </div>
                        <!-- Drug test End -->
                        <!-- randum test Start -->
                        <script type="text/javascript">
  
                            function sap_app_func(value,num){
                                if(value){
                                    $("#sap_app_div_"+num).fadeIn(200);
                                }else{
                                    $("#sap_app_div_"+num).fadeOut(200);
                                }
                            }



                            function sap_finst_func(value,num){
                                if(value){
                                    $("#sap_fi_nite_div_"+num).fadeIn(200);
                                }else{
                                    $("#sap_fi_nite_div_"+num).fadeOut(200);
                                }
                            }



                            function sap_letter_func(value,num){
                                if(value){
                                    $("#sap_letter_file_div_"+num).fadeIn(200);
                                }else{
                                    $("#sap_letter_file_div_"+num).fadeOut(200);
                                }
                            }


                            function rtd_switch_func(value,num){
                                if(value){
                                    $("#rtd_cmplt_div_"+num).fadeIn(200);
                                }else{
                                    $('#follow_up_div_'+num).empty();
                                    $("#rtd_cmplt_div_"+num).fadeOut(200);
                                    //these things to reset if switch is off
                                    $('input[name="rtd_cmplt_date_'+num+'"]').val('');
                                    $('select[name="rtd_cmplt_r_'+num+'"] option:selected').removeAttr("selected");
                                    $('select[name="rtd_cmplt_r_'+num+'"] option:first').attr("selected", true);
                                }
                            }


                            function fup_dtcmplt_func(value,num,count){
                                //console.log('#fup_dcom_div_'+value+'_'+count);
                                if(value){
                                    $('#fup_dcom_div_'+num+'_'+count).fadeIn(200);
                                }else{

                                    $('#fup_dcom_div_'+num+'_'+count).fadeOut(200);

                                    //these things to reset if switch is off
                                    $('input[name="fup_dt_date_'+num+'_'+count+'"]').val('');
                                    $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:selected').removeAttr("selected");
                                    $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:first').attr("selected", true);
                                }
                            }

                            function dtest_cmplt_func(value,num){
                                if(value){
                                    $("#dtest_cmplt_div_"+num).fadeIn(200);
                                    //$('#sap_row_'+num).fadeIn(200);
                                    
                                }else{
                                    $("#dtest_cmplt_div_"+num).fadeOut(200);
                                    $('#sap_row_'+num).remove();
                                    // re set the Date and result also file
                                    // console.log('asd');
                                    $('input[name="dtest_cmplt_date_'+num+'"]').val('');
                                    $('select[name="dtest_cmplt_r_'+num+'"] option:selected').removeAttr("selected");
                                    $('select[name="dtest_cmplt_r_'+num+'"] option:first').attr("selected", true);
                                }
                            }
                        </script>
                          <?php 
                              $rand_sap = $this->db->query("SELECT * FROM drug Where company_id = '".$company_id."'")->result_array();
                              //var_dump($id);
                              foreach($rand_sap as $dt_data):
                              //var_dump($rand_sap->driver_id);
                                if(in_array($id, unserialize($dt_data['driver_id']))){
                                                                
                                      $dbfields=[

                                                  'sapdata',
                                                  'rtddata',
                                                  'fupdata',
                                                  'dtestdata',

                                      ];

                                      for($itemp = 0 ; $itemp<count($dbfields);$itemp++)://echo $itemp;
                                          if(isset($dt_data[$dbfields[$itemp]])){

                                              $temp_arr = unserialize($dt_data[$dbfields[$itemp]]);
                                              if(is_array($temp_arr)){
                                                  unset($dt_data[$dbfields[$itemp]]);
                                                  $dt_data=array_merge($dt_data,$temp_arr);
                                              }
                                          
                                          }
                                      endfor;

                                      set_data($dt_data);
                            
                                }
                              endforeach;
                            ?>
                        <div class="col-md-12">
                          <div class="col-md-3"><h4 class="pro-title">Random Test</h4></div>  
                          <div class="col-md-7"><h4 class="pro-title"><?php echo (empty(get_data( 'dtest_cmplt_'.$id)))?'<i class="text-danger">Empty</i>':''?></h4></div>
                          <div class="col-md-2" style="padding: 0px;">
                            <?php if(!empty(get_data( 'dtest_cmplt_'.$id))){ ?>
                              <div class="btn btn-xs btn-success pull-right" id="randum_test_btn"><i id="randum_test_icon" class="fa fa-plus"></i></div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="col-md-12" id="randum_test_div" style="display: none;">
                          <div class="col-md-2">
                            <div class="form-group ">
                              <label for="is_dna_<?php echo $id?>" class="control-label">Drug/Alcohol</label>
                              <div class="form-control">
                                <?php echo (get_data( 'is_dna_'.$id)=='drug' )? 'Drug': ''; ?>
                                <?php echo (get_data( 'is_dna_'.$id)=='alcohol' )? 'Alcohol': ''; ?>
                                <?php echo (get_data( 'is_dna_'.$id)=='both' )? 'Drug & Alcohol': ''; ?>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group ">
                              <label for="dtest_cmplt_<?php echo $id?>" class="control-label">Drug Test Completed</label>
                              <div class="form-group ">
                                <div class="form-control">
                                  <?php echo (get_data( 'dtest_cmplt_'.$id)=='on' )? 'Yes': 'No'; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="dtest_cmplt_div_<?php echo $id?>" style="display: none;">
                            <div class="col-md-2">
                              <div class="form-group ">
                                <label for="dtest_cmplt_date_<?php echo $id?>" class="control-label">Date</label>
                                <div class="form-control">
                                  <?php echo get_data( 'dtest_cmplt_date_'.$id) ?>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group ">
                                <label for="dtest_cmplt_r_<?php echo $id?>" class="control-label">Result</label>
                                <div class="form-control">
                                  <?php echo (get_data( 'dtest_cmplt_r_'.$id)=='pos' )? 'Positive': ''; ?>
                                  <?php echo (get_data( 'dtest_cmplt_r_'.$id)=='neg' )? 'Negative': ''; ?>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="dtest_cmplt_file_<?php echo $id?>" class="control-label">Bill Of Lading</label>
                                <div class="controls">
                                  <?php if (get_data( 'dtest_cmplt_file_'.$id,true) !='' ): ?>
                                  <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                    <a href="<?php echo base_url('drug/file_download').'/'.basename(get_data('dtest_cmplt_file_'.$id,true)).'/'.getDriverName($id).' Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_'.$id,true) != '')echo "Download"; ?></span> 
                                    </a>
                                  </div>
                                  <?php else: ?>
                                  <div class="form-control" readonly>
                                    <p><i>No Documents</i>
                                    </p>
                                  </div>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php 
                            if(get_data('dtest_cmplt_'.$id) == 'on'){
                          ?>
                          <script type="text/javascript">
                            dtest_cmplt_func(true,<?php echo $id?>);
                          </script>
                          <?php } ?>

                        </div>
                        <!-- sap of start -->
                        <div class="col-md-12">
                          <div class="col-md-3"><h4 class="pro-title">Sap Of</h4></div>  
                          <div class="col-md-7"><h4 class="pro-title"><?php echo (empty(get_data( 'sap_appoint_'.$id)))?'<i class="text-danger">Empty</i>':''?></h4></div>
                          <div class="col-md-2" style="padding: 0px;">
                            <?php if(!empty(get_data( 'sap_appoint_'.$id))){ ?>
                              <div class="btn btn-xs btn-success pull-right" id="sap_of_btn"><i id="sap_of_icon" class="fa fa-plus"></i></div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="col-md-12" id="sap_of_div" style="display: none;">
                              <div class="col-lg-12">
                                <div class="panel-body">
                                  <div class="col-md-2">
                                    <div class="form-group ">
                                      <label for="sap_appoint_<?php echo $id;?>" class="control-label">Appointment</label>
                                      <div class="form-group ">
                                        <div class="form-control">
                                          <?php echo (get_data( 'sap_appoint_'.$id)=='on' )? 'Yes': 'No'; ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="sap_app_div_<?php echo $id;?>" style="display: none;">
                                    <div class="col-md-2">
                                      <div class="form-group ">
                                        <label for="sap_app_date_<?php echo $id;?>" class="control-label">Date</label>
                                        <div class="form-control">
                                          <?php echo get_data( 'sap_app_date_'.$id) ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group ">
                                        <label for="sap_note_<?php echo $id;?>" class="control-label">Note</label>
                                        <div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;">
                                          <?php echo get_data( 'sap_note_'.$id) ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-md-2">
                                    <div class="form-group ">
                                      <label for="sap_letter_<?php echo $id;?>" class="control-label">Authorization Letter For Return To Duty</label>
                                      <div class="form-control">
                                        <?php echo (get_data( 'sap_letter_'.$id)=='on' )? 'Yes': 'No'; ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group" id="sap_letter_file_div_<?php echo $id;?>" style="display: none;">
                                      <label for="sap_letter_file_<?php echo $id;?>" class="control-label">Drug Test File</label>
                                      <div class="controls">
                                        <?php if (get_data( 'sap_letter_file_'.$id,true) !='' ): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                          <a href="<?php echo base_url('drug/file_download').'/'.basename(get_data('sap_letter_file_'.$id,true)).'/'.getDriverName($id).' Authorization File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('sap_letter_file_'.$id,true) != '')echo "Download"; ?></span> 
                                          </a>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-control" readonly>
                                          <p><i>No Documents</i>
                                          </p>
                                        </div>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group ">
                                      <label for="sap_finst_<?php echo $id;?>" class="control-label">Further Instructions</label>
                                      <div class="form-control">
                                        <?php echo (get_data( 'sap_finst_'.$id)=='on' )? 'Yes': 'No'; ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group" id="sap_fi_nite_div_<?php echo $id;?>" style="display: none;">
                                      <label for="sap_fi_note_<?php echo $id;?>" class="control-label">Note</label>
                                      <div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;">
                                        <?php echo get_data( 'sap_fi_note_'.$id); ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="rtd_div_<?php echo $id;?>"></div>
                                </div>
                              
                            
                            <?php 
                              if(get_data('sap_appoint_'.$id) == 'on'):
                            ?>
                                <script type="text/javascript"> sap_app_func(true,"<?php echo $id;?>");</script>
                            <?php
                                endif; 

                              if(get_data('sap_finst_'.$id) == 'on'):
                            ?>
                                <script type="text/javascript"> sap_finst_func(true,"<?php echo $id;?>");</script>
                            <?php
                                endif; 

                                if(get_data('sap_letter_'.$id) == 'on'){
                                      ?>
                                            <script type="text/javascript">  sap_letter_func(true,"<?php echo $id;?>");

                                              driver_name = "<?php echo getDriverName($id)?>";
                                            

                                             

                                                      $("#rtd_div_<?php echo $id;?>").append('<div class="clearfix"></div> <span id="rtd_row_<?php echo $id;?>"><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_<?php echo $id;?>" class="control-label">Return to Duty</label><div class="form-control"> <?php echo (get_data('rtd_switch_'.$id)=='drug' )? 'Drug': ''; ?> <?php echo (get_data('rtd_switch_'.$id)=='alcohol' )? 'Alcohol': ''; ?> <?php echo (get_data('rtd_switch_'.$id)=='both' )? 'Drug & Alcohol': ''; ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_<?php echo $id;?>" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_'.$id)=='on')?'Yes':'No'; ?></div></div></div><div id="rtd_cmplt_div_<?php echo $id;?>" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_<?php echo $id;?>" class="control-label">Date</label><div class="form-control"> <?php echo get_data('rtd_cmplt_date_'.$id) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_<?php echo $id;?>" class="control-label">Result</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_r_'.$id)=='pos')? 'Positive': ''; ?> <?php echo (get_data('rtd_cmplt_r_'.$id)=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_<?php echo $id;?>" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('rtd_cmplt_file_'.$id,true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file_'.$id,true)).'/'.getDriverName($id).' Return to Duty Test File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file_'.$id,true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div><div id="follow_up_div_<?php echo $id;?>"></div> </span>');
                                            </script>
                                            <?php

                                             if(get_data('rtd_cmplt_'.$id) == 'on'):
                                      ?>
                                                  <script type="text/javascript">
                                                    rtd_switch_func(true,"<?php echo $id;?>");
                                      <?php
                                                  if(get_data('rtd_cmplt_r_'.$id) == 'neg' && (get_data('fup_no_'.$id) !='')){

                                                  ?>
                                                      driver_name = "<?php echo getDriverName($id)?>";

                                                      $("#follow_up_div_<?php echo $id;?>").append('<div class="clearfix"></div><div style="border-top: 1px solid #FF5C5C;padding-bottom: 10px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class="head3">Follow Up</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_<?php echo $id;?>" name="fup_no_<?php echo $id;?>" value="<?php echo get_data('fup_no_'.$id) ?>"><div id="fup_div_<?php echo $id;?>" style="margin-bottom: 15px;"></div></div>');

                                                      <?php
                                                      for($fupi=1;$fupi<=get_data('fup_no_'.$id);$fupi++)://fup_no_  
                                                      ?>
                                                          count = <?php echo $fupi;?>;
                                                          $("#fup_div_<?php echo $id;?>").append('<div id="injuriedp_count_<?php echo $id;?>_'+count+'"><div class="col-xs-1" style="width:10px;vertical-align: middle;"><div class="form-group "><h4> <label id="count_injp_<?php echo $id;?>_'+count+'" class="control-label text-center"></label></h4></div></div><div class="col-md-11"> <span id="fup_row_<?php echo $id;?>_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_<?php echo $id;?>_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_cmplt_date_'.$id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_<?php echo $id;?>_'+count+'" class="control-label">Schedule Date</label><div class="form-control"> <?php echo get_data('fup_sche_c_date_'.$id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_<?php echo $id;?>_'+count+'" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data( 'fup_dtcmplt_'.$id.'_'.$fupi)=='on')?'Yes':'No'; ?></div></div></div><div id="fup_dcom_div_<?php echo $id;?>_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_<?php echo $id;?>_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_dt_date_'.$id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_<?php echo $id;?>_'+count+'" class="control-label">Result</label><div class="form-control"> <?php echo (get_data( 'fup_dt_cr_'.$id.'_'.$fupi)=='pos' )? 'Positive': ''; ?> <?php echo (get_data( 'fup_dt_cr_'.$id.'_'.$fupi)=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_<?php echo $id;?>_'+count+'" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('fup_cmplt_file_'.$id.'_'.$fupi,true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('fup_cmplt_file_'.$id.'_'.$fupi,true)).'/'.getDriverName($id).' Follow Up Test File '?>'+count+'" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('fup_cmplt_file_'.$id.'_'.$fupi,true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div> </span></div><div class="clearfix"></div></div>');
                              

                                                            $('#count_injp_<?php echo $id;?>_'+count ).text(count);

                                                            if (count >= 1) {
                                                                $("#fup_dlt_btn_<?php echo $id;?>").show();
                                                            }

                                                          <?php          
                                                              if(get_data('fup_dtcmplt_'.$id.'_'.$fupi) == 'on'):
                                                          ?>
                                                                  fup_dtcmplt_func(true,"<?php echo $id;?>",<?php echo $fupi?>);
                                                          <?php
                                                              endif;
                                                      // fup_dtcmplt_func
                                                      endfor;
                                                  }// rtd_cmplt_r_
                                                 ?> 
                                                 </script> 
                                                 <?php
                                            endif;
                                  } ?>
                          
                            
                        </div>

                        </div>
                        <!-- sap of end -->

                      </div>
                      <!-- Drug test End -->
                      <!-- performence -->
                      <div class="row" style="border-top: 1px solid #FF5C5C;padding-top: 15px;margin-top: 15px;">
                        <div class="col-md-12">
                          <h4 class="headings">Performance</h4>
                        </div><!--col-md-12 close-->
                        <!-- collision start -->
                        <div class="col-md-12">
                            <div class="col-md-3"><h4 class="pro-title">Collision</h4></div>  
                            <div class="col-md-2"><h4 class="pro-title">No Of Collisions:</h4></div>
                            <div class="col-md-5"><h4 class="pro-title"><?php echo count($collision)?></h4></div>
                            <div class="col-md-2" style="padding: 0px;">
                              <?php if(count($collision) > 0){ ?>
                                <div class="btn btn-xs btn-success pull-right" id="collision_btn"><i id="collision_icon" class="fa fa-plus"></i></div>
                              <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12" id="collision_div" style="display: none;">
                          <?php for( $i = 0; $i<count($collision) ; $i++ ){ ?>
                            <section class="light_section">
                              <div class="col-lg-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default" style="margin-bottom: 5px;">
                                    <div class="panel-heading proformance-panel-heading " style="background-color: #D4D4D4" role="tab" id="headingOne" data-collapse="<?php echo $i;?>" data-collapse-for="collision">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collision<?php echo $i;?>" aria-expanded="true" aria-controls="collapse1">
                                          
                                          Collision Date: <?php echo $collision[$i]['collision_date']?>
                                          
                                          <div class="pull-right">
                                            <i class="glyphicon glyphicon-plus"></i>
                                          </div>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collision<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                      <?php 
                                        $data['collision_detail'] =  $collision[$i];
                                          // $data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
                                        $data['driver_name'] = getDriverFullName($data['collision_detail']['driver_id']);
                                        $data['codriver_name'] = getDriverFullName($data['collision_detail']['temp_driver']);
                                        $data['trailer_unit'] = getTrailerUnit($data['collision_detail']['trailer']);
                                        $data['truck_unit'] = getTruckUnit($data['collision_detail']['truck']);
                                        $this->load->view('company/collision/collision_view', $data);
                                      ?>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </section>
                          <?php } ?>
                        </div>
                        <!-- collision end -->
                        <!-- collision start -->
                        <div class="col-md-12">
                            <div class="col-md-3"><h4 class="pro-title">Citation</h4></div>  
                            <div class="col-md-2"><h4 class="pro-title">No Of Citation:</h4></div>
                            <div class="col-md-5"><h4 class="pro-title"><?php echo count($citation)?></h4></div>
                            <div class="col-md-2" style="padding: 0px;">
                              <?php if(count($citation) > 0){ ?>
                                <div class="btn btn-xs btn-success pull-right" id="citation_btn"><i id="citation_icon" class="fa fa-plus"></i></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12" id="citation_div" style="display: none;">
                          <?php for( $i = 0; $i<count($citation) ; $i++ ){ ?>
                            <section class="light_section">
                              <div class="col-lg-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default" style="margin-bottom: 5px;">
                                    <div class="panel-heading proformance-panel-heading " style="background-color: #D4D4D4" role="tab" id="headingOne" data-collapse="<?php echo $i;?>" data-collapse-for="citation">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#citation<?php echo $i;?>" aria-expanded="true" aria-controls="collapse1">
                                          
                                          Citation Date: <?php echo $citation[$i]['insp_date']?>
                                          
                                          <div class="pull-right">
                                            <i class="glyphicon glyphicon-plus"></i>
                                          </div>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="citation<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                      <?php 
                                        $data['citation_detail'] =  $citation[$i];
          
                                        //$data['getDriver'] =  $this->driver_model->getDriver($this->company_id);
                                        $data['driver_name'] = getDriverFullName($data['citation_detail']['driver_id']);

                                        $this->load->view('company/citation/citation_view', $data);
                                      ?>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </section>
                          <?php } ?>
                        </div>
                        <!-- collision end -->
                        <!-- Inspection start -->
                        <div class="col-md-12">
                            <div class="col-md-3"><h4 class="pro-title">Inspection</h4></div>  
                            <div class="col-md-2" ><h4 class="pro-title">No Of Inspection:</h4></div>
                            <div class="col-md-5" ><h4 class="pro-title"><?php echo count($inspection)?></h4></div>
                            <div class="col-md-2" style="padding: 0px;">
                              <?php if(count($inspection) > 0){ ?>
                                <div class="btn btn-xs btn-success pull-right" id="inspection_btn"><i id="inspection_icon" class="fa fa-plus"></i></div>
                              <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12" id="inspection_div" style="display: none;">
                          <?php for( $i = 0; $i<count($inspection) ; $i++ ){ ?>
                            <section class="light_section">
                              <div class="col-lg-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default" style="margin-bottom: 5px;">
                                    <div class="panel-heading proformance-panel-heading " style="background-color: #D4D4D4" role="tab" id="headingOne" data-collapse="<?php echo $i;?>" data-collapse-for="inspection">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#inspection<?php echo $i;?>" aria-expanded="true" aria-controls="collapse1">
                                          
                                          inspection Date: <?php echo $inspection[$i]['insp_date']?>
                                          
                                          <div class="pull-right">
                                            <i class="glyphicon glyphicon-plus"></i>
                                          </div>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="inspection<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                      <?php 


                                        $data['inspection_detail'] =  $inspection[$i];

                                        $data['driver_name'] = getDriverFullName($data['inspection_detail']['driver_id']);
                                        $data['trailer_unit'] = getTrailerUnit($data['inspection_detail']['trailer']);
                                        $data['truck_unit'] = getTruckUnit($data['inspection_detail']['truck']);

                                        $this->load->view('company/inspection/inspection_view', $data);
                                      ?>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </section>
                          <?php } ?>
                        </div>
                        <!-- Inspection end -->
                      </div><!--row close-->
                      <!-- performence end -->
                      <div class="row" style="border-top: 1px solid #FF5C5C;padding-top: 15px;margin-top: 15px;">
                        <div class="col-md-12">
                          <h4 class="pro-title">TRAINING SCHEDULE FOR DRIVERS / OWNER OPERATORS</h4>
                          <div class="btn btn-xs btn-success pull-right" id="train_sch_btn"><i id="train_sch_icon" class="fa fa-plus"></i></div>
                        </div><!--col-md-12 close-->
                        <div class="col-md-12" id="train_sch_div" style="display: none;">
                          <div class="table-responsive responsiv-table">
                            <table class="table bio-table">
                                <tbody>
                               <tr> 
                                  <td >1</td>
                                  <td>Driver Contract & Acknowledgement</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate1') ?>" name="traindate1" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop1" required>
                                        <?php if(get_data('trainop1') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop1') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop1') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname1" value="<?php echo get_data('trainname1') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >2</td>
                                  <td>Company Disciplinary Policies</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate2') ?>" name="traindate2" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop2" required>
                                        <?php if(get_data('trainop2') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop2') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop2') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname2" value="<?php echo get_data('trainname2') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >3</td>
                                  <td>H.O.S (Log Books)</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate3') ?>" name="traindate3" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop3" required>
                                        <?php if(get_data('trainop3') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop3') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop3') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname3" value="<?php echo get_data('trainname3') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >4</td>
                                  <td>Pre/Post-Trip Inspection(Schedule 1)</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate4') ?>" name="traindate4" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop4" required>
                                        <?php if(get_data('trainop4') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop4') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop4') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname4" value="<?php echo get_data('trainname4') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >5</td>
                                  <td>Road-Side/Scale Inspections</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate5') ?>" name="traindate5" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop5" required>
                                        <?php if(get_data('trainop5') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop5') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop5') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname5" value="<?php echo get_data('trainname5') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >6</td>
                                  <td>CSA (Compliance Safety Accountability)</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate6') ?>" name="traindate6" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop6" required>
                                        <?php if(get_data('trainop6') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop6') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop6') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname6" value="<?php echo get_data('trainname6') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >7</td>
                                  <td>C-TPAT Training</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate7') ?>" name="traindate7" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop7" required>
                                        <?php if(get_data('trainop7') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop7') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop7') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname7" value="<?php echo get_data('trainname7') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >8</td>
                                  <td>Drug & Alcohol Policy</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate8') ?>" name="traindate8" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop8" required>
                                        <?php if(get_data('trainop8') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop8') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop8') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname8" value="<?php echo get_data('trainname8') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >9</td>
                                  <td>Accident Procedures</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate9') ?>" name="traindate9" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop9" required>
                                        <?php if(get_data('trainop9') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop9') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop9') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname9" value="<?php echo get_data('trainname9') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >10</td>
                                  <td>Axle Weight</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate10') ?>" name="traindate10" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop10" required>
                                        <?php if(get_data('trainop10') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop10') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop10') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname10" value="<?php echo get_data('trainname10') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >11</td>
                                  <td>Load/Cargo Security</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate11') ?>" name="traindate11" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop11" required>
                                        <?php if(get_data('trainop11') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop11') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop11') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname11" value="<?php echo get_data('trainname11') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >12</td>
                                  <td>Truck Binder Training</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate12') ?>" name="traindate12" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop12" required>
                                        <?php if(get_data('trainop12') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop12') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop12') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname12" value="<?php echo get_data('trainname12') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >13</td>
                                  <td>Health & Safety</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate13') ?>" name="traindate13" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop13" required>
                                        <?php if(get_data('trainop13') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop13') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop13') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname13" value="<?php echo get_data('trainname13') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >14</td>
                                  <td>Annual Review</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate14') ?>" name="traindate14" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop14" required>
                                        <?php if(get_data('trainop14') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop14') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop14') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname14" value="<?php echo get_data('trainname14') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >15</td>
                                  <td>Reefer Training</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate15') ?>" name="traindate15" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop15" required>
                                        <?php if(get_data('trainop15') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop15') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop15') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname15" value="<?php echo get_data('trainname15') ?>" autocomplete="off"></td> 
                               </tr>
                               <tr> 
                                  <td >16</td>
                                  <td>Additional Misc Trainings</td>
                                  <td>Date:</td> 
                                  <td><input type="text" data-plugin-datepicker="" class="form-control default-date-picker valid" value="<?php echo get_data('traindate16') ?>" name="traindate16" required=""></td> 
                                  <td class="text-center">Completed</td> 
                                  <td>
                                    <select class="form-control" name="trainop16" required>
                                        <?php if(get_data('trainop16') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Yes" <?php if(get_data('trainop16') == 'Yes')echo 'selected'?>>Yes</option>
                                        <option value="No" <?php if(get_data('trainop16') == 'No')echo 'selected'?>>No</option>
                                    </select>
                                  </td> 
                                  <td><input type="text" class="form-control valid" name="trainname16" value="<?php echo get_data('trainname16') ?>" autocomplete="off"></td> 
                               </tr>
                              </tbody>
                            </table>
                          </div><!--table-responsive close-->
                        </div><!--col-md-6 close-->
                      </div><!--row close-->
                    </div>
                </div><!-- tab content div end-->
            </div>
        </section>
    </div>
</div>

<!-- </form> -->

<!-- 


                                  <tr>  
                                    <td>Pandding Works</td>
                                    <td>
                              <?php $matchPandding = [

                                      'passport'             =>  'Passport',
                                      'road_test'            =>  'Road Test',
                                      'police_report'        =>  'Police Report',


                              ]; 
                                    
                              ?>
                              <?php for ($i = 0 ;$key_name = current($driver);$i++): ?>

                                <?php if(array_key_exists(key($driver), $matchPandding)): ?>
                                <?php //echo current($driver); ?>
                                  <?php if(current($driver) == 'No'): ?>
                                     
                                      
                                      <?php  ?> <a href="javascript:;" class="btn btn-danger pulsate-pending"><?php echo $matchPandding[key($driver)] ?></a>
                                
                                 <?php endif; ?>
                                     
                                   
                                 <?php endif; ?>
                                 <?php next($driver); ?>
                              <?php endfor; ?>
                                  </td>       
                                </tr>

 -->
<script type="text/javascript">

  $(document).ready(function(){
    $("#train_sch_btn").on('click',function(){
      $( "#train_sch_icon" ).toggleClass( function(){
        if ( $("#train_sch_icon").is( ".fa-plus" ) ) {
          $("#train_sch_icon").removeClass('fa-plus');
          $("#train_sch_btn").removeClass('btn-success').addClass('btn-danger');
          $("#train_sch_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#train_sch_div").fadeOut(200);
          $("#train_sch_btn").removeClass('btn-danger').addClass('btn-success');
          $("#train_sch_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#collision_btn").on('click',function(){
      $( "#collision_icon" ).toggleClass( function(){
        if ( $("#collision_icon").is( ".fa-plus" ) ) {
          $("#collision_icon").removeClass('fa-plus');
          $("#collision_btn").removeClass('btn-success').addClass('btn-danger');
          $("#collision_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#collision_div").fadeOut(200);
          $("#collision_btn").removeClass('btn-danger').addClass('btn-success');
          $("#collision_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#drug_test_btn").on('click',function(){
      $( "#drug_test_icon" ).toggleClass( function(){
        if ( $("#drug_test_icon").is( ".fa-plus" ) ) {
          $("#drug_test_icon").removeClass('fa-plus');
          $("#drug_test_btn").removeClass('btn-success').addClass('btn-danger');
          $("#drug_test_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#drug_test_div").fadeOut(200);
          $("#drug_test_btn").removeClass('btn-danger').addClass('btn-success');
          $("#drug_test_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#randum_test_btn").on('click',function(){
      $( "#randum_test_icon" ).toggleClass( function(){
        if ( $("#randum_test_icon").is( ".fa-plus" ) ) {
          $("#randum_test_icon").removeClass('fa-plus');
          $("#randum_test_btn").removeClass('btn-success').addClass('btn-danger');
          $("#randum_test_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#randum_test_div").fadeOut(200);
          $("#randum_test_btn").removeClass('btn-danger').addClass('btn-success');
          $("#randum_test_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#citation_btn").on('click',function(){
      $( "#citation_icon" ).toggleClass( function(){
        if ( $("#citation_icon").is( ".fa-plus" ) ) {
          $("#citation_icon").removeClass('fa-plus');
          $("#citation_btn").removeClass('btn-success').addClass('btn-danger');
          $("#citation_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#citation_div").fadeOut(200);
          $("#citation_btn").removeClass('btn-danger').addClass('btn-success');
          $("#citation_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });
    
    $("#inspection_btn").on('click',function(){
      $( "#inspection_icon" ).toggleClass( function(){
        if ( $("#inspection_icon").is( ".fa-plus" ) ) {
          $("#inspection_icon").removeClass('fa-plus');
          $("#inspection_btn").removeClass('btn-success').addClass('btn-danger');
          $("#inspection_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#inspection_div").fadeOut(200);
          $("#inspection_btn").removeClass('btn-danger').addClass('btn-success');
          $("#inspection_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#sap_of_btn").on('click',function(){
      $( "#sap_of_icon" ).toggleClass( function(){
        if ( $("#sap_of_icon").is( ".fa-plus" ) ) {
          $("#sap_of_icon").removeClass('fa-plus');
          $("#sap_of_btn").removeClass('btn-success').addClass('btn-danger');
          $("#sap_of_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#sap_of_div").fadeOut(200);
          $("#sap_of_btn").removeClass('btn-danger').addClass('btn-success');
          $("#sap_of_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });

    $("#owner_op_btn").on('click',function(){
      $( "#owner_op_icon" ).toggleClass( function(){
        if ( $("#owner_op_icon").is( ".fa-plus" ) ) {
          $("#owner_op_icon").removeClass('fa-plus');
          $("#owner_op_btn").removeClass('btn-success').addClass('btn-danger');
          $("#owner_op_div").fadeIn(200);
          return "fa-minus";
        } else {
          $("#owner_op_div").fadeOut(200);
          $("#owner_op_btn").removeClass('btn-danger').addClass('btn-success');
          $("#owner_op_icon").removeClass('fa-minus');
          return "fa-plus";
        }
      } );
    });



  $("#issue_card_btn").click(function() {
        var issue_last_div = $("#issue_card_count").attr('data-last-issue');
        console.log(issue_last_div);
        var count = $("#issue_card_count").val();
        if (count === "" || count === null) {
            count = 0;
        }// _' + count + '
        count = ++count;
        issue_last_div = ++issue_last_div;//$(html).hide().appendTo("#mycontent").fadeIn(1000);
        var data = '<div id="issue_card_div_' + issue_last_div + '"><div class="col-md-3"><div class="form-group "> <label for="claim_no_' + issue_last_div + '" class="control-label">Claim No</label> <input class="form-control input-sm" id="claim_no_' + issue_last_div + '" name="claim_no_' + issue_last_div + '" type="text" value="<?php echo get_data('claim_no') ?>" /></div></div><div class="col-md-2"><div class="form-group "> <label for="issue_date_' + issue_last_div + '" class="control-label">Issued Date</label> <input class="form-control input-sm default-date-picker valid" id="issue_date_' + issue_last_div + '" name="issue_date_' + issue_last_div + '" type="text" value="<?php echo get_data('issue_date') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="pin_issue_' + issue_last_div + '" class="control-label">PIN</label> <input class="form-control input-sm" id="pin_issue_' + issue_last_div + '" name="pin_issue_' + issue_last_div + '" type="text" value="<?php echo get_data('pin_issue') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="return_issue_' + issue_last_div + '" class="control-label">Return</label> <input class="form-control input-sm" id="return_issue_' + issue_last_div + '" name="return_issue_' + issue_last_div + '" type="text" value="<?php echo get_data('return_issue') ?>" /></div></div><div class="col-md-1" style="width: 75px;"><div class="form-group "> <label for="return_issue_' + issue_last_div + '" class="control-label">&nbsp;</label><div class="form-control input-sm btn btn-xs pull-right issue_dlt_btn" style="border: 0px;" dara-issue-cound="' + issue_last_div + '"><i id="" class="fa fa-times fa-lg text-danger"></i></div></div></div></div>';
        //$("#issue_card_container").append();
        $(data).hide().appendTo("#issue_card_container").fadeIn(250);
        // if (count >= 1) {
        //     $(".issue_dlt_btn").show();
        // }
        $("#issue_card_count").val(count);
        $("#issue_card_count").attr('data-last-issue',issue_last_div);
        // $(this).attr("disabled", false);
    });
  //Delete Previous Address
  $(document).on('click',".issue_dlt_btn",function(){

    target = $(this).attr("dara-issue-cound");
        // $("#issue_card_btn").attr("disabled", true);
        var count = $("#issue_card_count").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#issue_card_div_" + target + "").fadeOut(150,function(){
          $(this).remove();
        });
        count = --count;
        if (count <= 0) {
            $("#issue_card_count").attr('data-last-issue',0);
        }
        $("#issue_card_count").val(count);
        // $(this).attr("disabled", false);
        // $("#issue_card_btn").attr("disabled", false);
  });

    


<?php 
if($driver['position_applied'] =='owner_operator'){
  ?>
  $('#if_paf_ownop').fadeIn(100);
<?php
}

?>




  });



</script>


<script type="text/javascript">
  

/*
  $(document).on('click', '.panel-heading a.fa-plus,.panel-heading a.fa-minus', function(e){
    var $this = $(this);
  if(!$this.hasClass('panel-collapsed')) {
    $this.parents('table.panel').find('.panel-body').slideUp(10);
    $this.addClass('panel-collapsed');
    $this.removeClass('fa-minus').addClass('fa-plus');
  } else {
    $this.parents('table.panel').find('.panel-body').slideDown(10);
    $this.removeClass('panel-collapsed');
    $this.removeClass('fa-plus').addClass('fa-minus');
  }
});
*/
  $(document).on('click', '.panel-heading a.fa-plus,.panel-heading a.fa-minus', function(e){
    var $this = $(this);
    var pcookie = $this.parents('td').find('a:first-child').attr('id');
    if(!$this.hasClass('panel-collapsed')) {
      $this.parents('table.panel').find('.panel-body').slideUp(10);
      $this.addClass('panel-collapsed');
      $this.removeClass('fa-minus').addClass('fa-plus');
      if($.cookie('ispanelhide') != undefined){
        var getdata = JSON.parse($.cookie('ispanelhide'));
        getdata.push(pcookie);
        arr = JSON.stringify(getdata);
        $.cookie('ispanelhide', arr, { expires: 30, path: '/' });
      }else{
        //var arr = ;
        $.cookie('ispanelhide', JSON.stringify([pcookie]), { expires: 30, path: '/' });
      }
    } else {
      $this.parents('table.panel').find('.panel-body').slideDown(10);
      $this.removeClass('panel-collapsed');
      $this.removeClass('fa-plus').addClass('fa-minus');

      var getdata = JSON.parse($.cookie('ispanelhide'));
      var index = getdata.indexOf(pcookie);
      if (index > -1) {
          getdata.splice(index, 1);
      }

      if(getdata.length == 0 ){
        $.removeCookie('ispanelhide', { path: '/' });
      }else{
        arr = JSON.stringify(getdata);
        $.cookie('ispanelhide', arr, { expires: 30, path: '/' });
        
      }
      //$.removeCookie('ispanelhide', { path: '/' });
    }
  });


//enable1

  $(document).on('ready',function(){
      if($.cookie('ispanelhide') != undefined){
        var getdata = JSON.parse($.cookie('ispanelhide'));
        for(var i=0;i < getdata.length;i++){

          var $this = $("#"+getdata[i]);
          var $pthis = $this.parents('h4');
          if(!$pthis.find('a').hasClass('panel-collapsed')) {
            console.log($this);
            $this.parents('table.panel').find('.panel-body').slideUp(10);
            $pthis.find("a.fa-minus").addClass('panel-collapsed');
            $pthis.find("a.fa-minus").removeClass('fa-minus').addClass('fa-plus');
          } else {
            $this.parents('table.panel').find('.panel-body').slideDown(10);
            $this.removeClass('panel-collapsed');
            $this.removeClass('fa-plus').addClass('fa-minus');
          }


        }
      }
      // var $this = $(this);
      // var pcookie = $this.parents('td').find('a:first-child').attr('id');
      // if(!$this.hasClass('panel-collapsed')) {
      //   $this.parents('table.panel').find('.panel-body').slideUp(10);
      //   $this.addClass('panel-collapsed');
      //   $this.removeClass('fa-minus').addClass('fa-plus');
      //   $.cookie(pcookie, 'false', { expires: 30, path: '/' });
      // } else {
      //   $this.parents('table.panel').find('.panel-body').slideDown(10);
      //   $this.removeClass('panel-collapsed');
      //   $this.removeClass('fa-plus').addClass('fa-minus');
      //   $.removeCookie(pcookie, { path: '/' });
      // }
  });
</script>


            <script>
                $(document).ready(function(){
                    $(".proformance-panel-heading").click(function(){
                        var $this = $(this);
                        var id = $this.attr("data-collapse");
                        var collapse = $this.attr("data-collapse-for");
                        $this.find('i').toggleClass(function() {
                          if ( $( this ).is( ".glyphicon-plus" ) ) {
                            $( this ).removeClass("glyphicon-plus");
                            $('#'+collapse+id).slideDown();
                            return "glyphicon-minus";
                          } else {
                            $( this ).removeClass("glyphicon-minus");
                            $('#'+collapse+id).slideUp();
                            return "glyphicon-plus";
                          }
                        });
                    });
                    
                });
            </script>