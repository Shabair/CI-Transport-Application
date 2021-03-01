<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/hideShowPassword-master/css/example.wink.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/jquery-entropizer-master/dist/css/jquery-entropizer.min.css">
<style type="text/css">
    label.error{
        color: red;
        font-weight:normal;
    } 

    .form-horizontal .control-label{
        font-weight: 600;   
    }

    label.error {
        background: url(<?php echo base_url('public/img/unchecked.gif')?>) no-repeat;
        padding-left: 16px;
        margin-left: .3em;
        margin-top: 3px;
    }

/*    label.valid {
        background: url(<?php echo base_url('public/img/checked.gif')?>) no-repeat;
        display: block;
        width: 16px;
        height: 16px;
        margin-top: 3px;

    }*/
    #meter2 .entropizer-track {
    background-color: #e8e8e8;
    border-radius: 2px;
    height: 4px;
    }
    #meter2 .entropizer-bar {
        height: 4px;
    }
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<?php if(!get_data('update')){?>
				<h4 class="head3" style="display:inline-block">Add New company</h4>
			<?php } else {?>
				<h4 class="head3" style="display:inline-block">Update company</h4>
			<?php }?>
			<?php if($this->user_type == 'admin'){ ?>
				<a href="<?php echo site_url('admin/companies') ?>" class="btn btn-primary pull-right">View Companys List</a>
            <?php } ?>
			</header>
			<div class="panel-body">
				<div class=" form">
                    <?php if($this->user_type == 'admin'){
                        $action = 'admin/companies/add/'.get_data('update');
                    }else if($this->user_type == 'company'){
                        $action = 'company/add/'.get_data('update');
                    } ?>

                	<form class="cmxform tasi-form" id="frmvalidate" method="post" action="<?php echo site_url($action); ?>">
                        <?php if(get_data('update')){
                            echo "<input type='hidden' name='update' value='".get_data('update')."'>";
                        } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="first_name" class="control-label">Company Name <span style="color:red;">*</span></label>
                                    <input class="form-control input-sm" id="first_name" name="first_name" minlength="3" type="text" value="<?php echo get_data('first_name')?>" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="email" class="control-label">Email <span style="color:red;">*</span></label>
                                    <input class="form-control input-sm" id="email" name="email" minlength="2" type="email" required value="<?php echo get_data('email')?>" />
                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="contact_no" class="control-label">Phone Number <span style="color:red;">*</span></label>
                                    <input class="form-control input-sm phone_number" id="contact_no" name="contact_no" minlength="2" type="text" required value="<?php echo get_data('contact_no')?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cell" class="control-label">Cell Number</label>
                                    <input class="form-control input-sm phone_number" id="cell" name="cell" minlength="5" type="text" value="<?php echo get_data('cell')?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="fax" class="control-label">Fax Number</label>
                                    <input class=" form-control input-sm phone_number" id="fax" name="fax" minlength="2" type="text" value="<?php echo get_data('fax')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="address" class="control-label">Physical Address <span style="color:red;">*</span></label>
                                    <input class=" form-control input-sm" id="address" name="address" minlength="2" type="text" required value="<?php echo get_data('address')?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="mailing_address" class="control-label">Mailing Address <span style="color:red;">*</span></label>
                                    <input class=" form-control input-sm" id="mailing_address" name="mailing_address" minlength="2" type="text" required value="<?php echo get_data('mailing_address')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="city" class="control-label">City <span style="color:red;">*</span></label>
                                    <input class="form-control input-sm" id="city" name="city" minlength="2" type="text" required value="<?php echo get_data('city')?>"/>
                                </div>
                            </div>		
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="state" class="control-label">State <span style="color:red;">*</span></label>
                                    <input class=" form-control input-sm" id="state" name="state" minlength="2" type="text" required value="<?php echo get_data('state')?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="postal_code" class="control-label">Postal Code <span style="color:red;">*</span></label>
                                    <input class=" form-control input-sm postal_code" id="postal_code" name="postal_code" minlength="2" type="text" required value="<?php echo get_data('postal_code')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="dot_no" class="control-label">DOT NO.</label>
                                    <input class="form-control input-sm" id="dot_no" name="dot_no" maxlength="10" type="text" value="<?php echo get_data('dot_no')?>"/>
                                </div>
                            </div>		
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="mc_no" class="control-label">MC NO.</label>
                                    <input class=" form-control input-sm" id="mc_no" name="mc_no" maxlength="10" type="text" value="<?php echo get_data('mc_no')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cvor_no" class="control-label">CVOR NO.</label>
                                    <input class=" form-control input-sm" id="cvor_no" name="cvor_no" maxlength="12" type="text" value="<?php echo get_data('cvor_no')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cvor_exp" class="control-label">CVOR Expire Date</label>
                                    <input class="form-control form-control-inline input-sm default-date-picker" id="cvor_exp" name="cvor_exp" type="text" value="<?php echo get_data('cvor_exp')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                                <div class="form-group ">
                                    <label for="ins_company" class="control-label">Insurance Company</label>
                                    <input class=" form-control input-sm" id="ins_company" name="ins_company" maxlength="40" type="text" value="<?php echo get_data('ins_company')?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="ins_no" class="control-label">Insurance Policy NO.</label>
                                    <input class=" form-control input-sm" id="ins_no" name="ins_no" maxlength="40" type="text" value="<?php echo get_data('ins_no')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ins_exp" class="control-label">Insurance Expires Date</label>
                                    <input class="form-control form-control-inline input-sm default-date-picker" id="ins_exp" name="ins_exp" type="text" value="<?php echo get_data('ins_exp')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="broker_name" class="control-label">Insurance Broker Name</label>
                                    <input class=" form-control input-sm" id="broker_name" name="broker_name" maxlength="40" type="text" value="<?php echo get_data('broker_name')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="broker_phone" class="control-label">Broker Phone Number</label>
                                    <input class=" form-control input-sm" id="broker_phone" name="broker_phone" maxlength="20" type="text" value="<?php echo get_data('broker_phone')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="broker_fax" class="control-label">Broker Fax Number</label>
                                    <input class=" form-control input-sm" id="broker_fax" name="broker_fax" maxlength="20" type="text" value="<?php echo get_data('broker_fax')?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="broker_email" class="control-label">Broker E-mail</label>
                                    <input class=" form-control input-sm" id="broker_email" name="broker_email" type="email" value="<?php echo get_data('broker_email')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="general_limit" class="control-label">General Liabilities Limit</label>
                                    <input class=" form-control input-sm" id="general_limit" name="general_limit" maxlength="9" type="text" value="<?php echo get_data('general_limit')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cargo_limit" class="control-label">Cargo Liabilities Limit</label>
                                    <input class=" form-control input-sm" id="cargo_limit" name="cargo_limit" maxlength="9" type="text" value="<?php echo get_data('cargo_limit')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="accident_limit" class="control-label">Accident Limits</label>
                                    <input class=" form-control input-sm" id="accident_limit" name="accident_limit" maxlength="9" type="text" value="<?php echo get_data('accident_limit')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="deductable_cargo" class="control-label">Deductable Cargo</label>
                                    <input class=" form-control input-sm" id="deductable_cargo" name="deductable_cargo" maxlength="9" type="text" value="<?php echo get_data('deductable_cargo')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="dedicatable_accident" class="control-label">Dedicatable Accident</label>
                                    <input class=" form-control input-sm" id="dedicatable_accident" name="dedicatable_accident" maxlength="9" type="text" value="<?php echo get_data('dedicatable_accident')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="drug_test" class="control-label">Drug Test Consortium</label>
                                    <input class=" form-control input-sm" id="drug_test" name="drug_test" type="text" value="<?php echo get_data('drug_test')?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="drug_test_dot" class="control-label">Drug Test DOT</label>
                                    <input class=" form-control input-sm" id="drug_test_dot" name="drug_test_dot" type="text" value="<?php echo get_data('drug_test_dot')?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="drug_test_ndot" class="control-label">Drug Test Non-DOT</label>
                                    <input class=" form-control input-sm" id="drug_test_ndot" name="drug_test_ndot" type="text" value="<?php echo get_data('drug_test_ndot')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="prepass_account" class="control-label">PREPASS Account NO.</label>
                                    <input class=" form-control input-sm" id="prepass_account" name="prepass_account" maxlength="15" type="text" value="<?php echo get_data('prepass_account')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_scacode" class="control-label">NMFTA/Scaccode</label>
                                    	<input class=" form-control input-sm" id="nmfta_scacode" name="nmfta_scacode" maxlength="12" type="text" value="<?php echo get_data('nmfta_scacode')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_exp" class="control-label">NMFTA Expire</label>
                                    	<input class="form-control form-control-inline input-sm default-date-picker" id="nmfta_exp" name="nmfta_exp" maxlength="12" type="text" value="<?php echo get_data('nmfta_exp')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_scacode2" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="nmfta_scacode2" name="nmfta_scacode2" maxlength="10" type="text" value="<?php echo get_data('nmfta_scacode2')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ifta" class="control-label">IFTA A/C NO.</label>
                                    <input class=" form-control input-sm" id="ifta" name="ifta" maxlength="15" type="text" value="<?php echo get_data('ifta')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta2" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="ifta2" name="ifta2" maxlength="12" type="text" value="<?php echo get_data('ifta2')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta3" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="ifta3" name="ifta3" maxlength="12" type="text" value="<?php echo get_data('ifta3')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta4" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="ifta4" name="ifta4" maxlength="12" type="text" value="<?php echo get_data('ifta4')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta5" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="ifta5" name="ifta5" maxlength="12" type="text" value="<?php echo get_data('ifta5')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="new_mexico" class="control-label">New Mexico #</label>
                                    <input class="form-control input-sm" id="new_mexico" name="new_mexico" maxlength="15" type="text" value="<?php echo get_data('new_mexico')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="mexico_exp" class="control-label">Expries</label>
                                    <input class="form-control form-control-inline input-sm default-date-picker" id="mexico_exp" name="mexico_exp" minlength="2" type="text" value="<?php echo get_data('mexico_exp')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="orgen" class="control-label">Orgen #</label>
                                    <input class=" form-control input-sm" id="orgen" name="orgen" maxlength="15" type="text" value="<?php echo get_data('orgen')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="orgen_exp" class="control-label">Expries</label>
                                    <input class="form-control form-control-inline input-sm default-date-picker" id="orgen_exp" name="orgen_exp" type="text" value="<?php echo get_data('orgen_exp')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="msc" class="control-label">Msc 90.</label>
                                    <input class=" form-control input-sm" id="msc" name="msc" maxlength="15" type="text" value="<?php echo get_data('msc')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ambassador_bridge" class="control-label">Ambassador Bridge</label>
                                    <input class=" form-control input-sm" id="ambassador_bridge" name="ambassador_bridge" maxlength="15" type="text" value="<?php echo get_data('ambassador_bridge')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="transponder" class="control-label">Transponder</label>
                                    <input class=" form-control input-sm" id="transponder" name="transponder" maxlength="15" type="text" value="<?php echo get_data('transponder')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="transponder_exp" class="control-label">Expries</label>
                                    <input class="form-control form-control-inline input-medium default-date-picker" id="transponder_exp" name="transponder_exp" type="text" value="<?php echo get_data('transponder_exp')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ucr_exp" class="control-label">UCR Expire</label>
                                    <input class="form-control form-control-inline input-sm default-date-picker" id="ucr_exp" name="ucr_exp" maxlength="16" type="text" value="<?php echo get_data('ucr_exp')?>"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="quebec_form" class="control-label">Quebec Form</label>
                                    <input class=" form-control input-sm" id="quebec_form" name="quebec_form" type="text" value="<?php echo get_data('quebec_form')?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cali_air_res" class="control-label">California Air Resource Board</label>
                                    <input class=" form-control input-sm" id="cali_air_res" name="cali_air_res" maxlength="20" type="text" value="<?php echo get_data('cali_air_res')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="wsib" class="control-label">WSIB A/C #</label>
                                    <input class=" form-control input-sm" id="wsib" name="wsib" maxlength="20" type="text" value="<?php echo get_data('wsib')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky" class="control-label">Kentucky</label>
                                    <input class=" form-control input-sm" id="kentucky" name="kentucky" maxlength="15" type="text" value="<?php echo get_data('kentucky')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky2" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="kentucky2" name="kentucky2" maxlength="15" type="text" value="<?php echo get_data('kentucky2')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky3" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="kentucky3" name="kentucky3" maxlength="15" type="text" value="<?php echo get_data('kentucky3')?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky4" class="control-label">&nbsp;</label>
                                    <input class=" form-control input-sm" id="kentucky4" name="kentucky4" maxlength="15" type="text" value="<?php echo get_data('kentucky4')?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 2px solid #FF6C60;padding-top: 15px;margin-top: 15px;">
                        	<div class="col-md-3">
                            </div>
                        	<div class="col-md-3">
                                <div class="form-group ">
                                    <label for="username" class="control-label">Username <span style="color:red;width:100%">*</span>
                                        <?php if(empty(get_data('update'))){ ?>
                                    <span class="control-label "  id="username_warning" style="display: none;color: red;font-weight: 300;float:right;">Username Not Changeable</span>
                                        <?php } ?>
                                    </label>
                                    <input type="text" class="form-control" name="username" id="username"  autocomplete="off" required <?php if(!empty(get_data('update'))){echo 'disabled  value="'.get_username_by_id(get_data('update')).'"';}else{echo 'value="'.get_data('username').'"';} ?> onfocus="$('#username_warning').fadeIn(200)" onfocusout="$('#username_warning').fadeOut(200)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="password" class="control-label">Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" minlength="4" autocomplete="off" required <?php if(!empty(get_data('update'))){echo 'disabled value="***********"';} ?>>


                            <div class="">
                                <?php if(get_data('update')){?>
                                <label class="control-label"><a href="javascript:;" onclick="$('input[name=password]').attr('disabled',false).val('');$('input[name=password_changed]').attr('disabled',false)">Reset Password</a></label>
                                <input type="hidden" name="password_changed" value="true" disabled>
                                <?php }?>
                            </div>
                                </div>
                                <div id="meter2"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" name="submit" value="add"  class="btn btn-primary" > <?php echo (!get_data('update'))?'Save':'Update'; ?></button> 
                            </div>
                        </div>
                    </form>
			    </div>
			</div>
		</section>
	</div>
</div>
<!-- page end--> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script> 
<script src="<?php echo base_url();?>public/assets/masked-input/masked-input.min.js"></script>
<script src="<?php echo base_url();?>public/assets/hideShowPassword-master/hideShowPassword.min.js"></script>
<script src="<?php echo base_url();?>public/assets/jquery-entropizer-master/lib/entropizer.js"></script>
<script src="<?php echo base_url();?>public/assets/jquery-entropizer-master/dist/js/jquery-entropizer.min.js"></script>


<script type="text/javascript">

    $(document).ready(function(){

        $(function(){
            $(".postal_code").mask("***-***?***");
            $(".phone_number").mask("(999) 999-9999");
            $(".home_no").mask("(999) 999-9999");
            $(".ss_no").mask("999-999-999");

            $('#password').hidePassword(true);
        });

        $('#meter2').entropizer({
            target: '#password',
            update: function(data, ui) {
                ui.bar.css({
                    'background-color': data.color,
                    'width': data.percent + '%'
                });
            }
        });
        // jQuery.validator.setDefaults({
        //   'debug': true,
        //   'success': "valid"
        // });
        <?php if($this->user_type == 'admin'){
            $action = base_url('admin/companies/check_email');
        }else if($this->user_type == 'company'){
            $action = base_url('company/check_email');
        } ?>
        $( "#frmvalidate" ).validate({
            'highlight': function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            'success': function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(element).closest('.error').remove();
            },
            'rules': {
                'first_name': {
                  'required': true
                },
                'email': {
                  'required': true,
                  'email': true,
                  'remote': {
                        'url': "<?php echo $action?>",
                        'type': "post",
                        'data': {
                          'email': function() {
                            return $( "input[name=email]" ).val();
                          }
                          <?php if(get_data('update')):?>
                          ,'userid':"<?php echo get_data('update') ?>"
                          <?php endif; ?>

                        }
                    }

                },
                'username': {
                  'required': true,
                  'remote': "<?php echo base_url('admin/companies/remote_username_check')?>"
                }
            },
            'messages': {
                'email': {
                    'remote': "This E-Mail Already Taken.",
                },
                'username': {
                    'remote': "This Username Already Taken.",
                }
            },
            'errorElement' : 'label',
            'errorLabelContainer': '.error',
            'validLabelContainer': '.valid'
        });
    });

</script>