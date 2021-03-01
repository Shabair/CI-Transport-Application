<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="head3" style="display:inline-block"><?php echo get_data('first_name') ?></h4>
                <?php if($this->user_type == 'admin'){ ?>
                    <a href="<?php echo base_url('admin/companies/edit/'.get_data('id'))?>" class="btn btn-primary pull-right">Edit Details</a>

                <?php }else if($this->user_type == 'company'){ ?>
                    <a href="<?php echo base_url('company/edit/')?>" class="btn btn-primary pull-right">Edit Details</a>
                <?php } ?>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
					<div class=" form">
                    	<div class="cmxform tasi-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="first_name" class="control-label">Company Name</label>
                                    <div class="form-control">
                                    <?php echo get_data('first_name') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="email" class="control-label">Email</label>
                                    <div class="form-control">
                                    <?php echo get_data('email') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="contact_no" class="control-label">Phone Number</label>
                                    <div class="form-control">
                                    <?php echo get_data('contact_no') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cell" class="control-label">Cell Number</label>
                                    <div class="form-control">
                                    <?php echo get_data('cell') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="fax" class="control-label">Fax Number</label>
                                    <div class="form-control">
                                    <?php echo get_data('fax') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="address" class="control-label">Physical Address</label>
                                    <div class="form-control">
                                    <?php echo get_data('address') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="mailing_address" class="control-label">Mailing Address</label>
                                    <div class="form-control">
                                    <?php echo get_data('mailing_address') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="city" class="control-label">City</label>
                                    <div class="form-control">
                                    <?php echo get_data('city') ?>
                                    </div>
                                </div>
                            </div>		
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="state" class="control-label">State</label>
                                    <div class="form-control">
                                    <?php echo get_data('state') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="postal_code" class="control-label">Postal Code</label>
                                    <div class="form-control">
                                    <?php echo get_data('postal_code') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="dot_no" class="control-label">DOT NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('dot_no') ?>
                                    </div>
                                </div>
                            </div>		
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="mc_no" class="control-label">MC NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('mc_no') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cvor_no" class="control-label">CVOR NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('cvor_no') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cvor_exp" class="control-label">CVOR Expiry</label>
                                    <div class="form-control">
                                    <?php echo get_data('cvor_exp') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                                <div class="form-group ">
                                    <label for="ins_company" class="control-label">Insurance Company</label>
                                    <div class="form-control">
                                    <?php echo get_data('ins_company') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="ins_no" class="control-label">Insurance Policy NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('ins_no') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ins_exp" class="control-label">Insurance Expires Date</label>
                                    <div class="form-control">
                                    <?php echo get_data('ins_exp') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row hr-bottom">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="broker_name" class="control-label">Insurance Broker Name</label>
                                    <div class="form-control">
                                    <?php echo get_data('broker_name') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="broker_phone" class="control-label">Broker Phone Number</label>
                                    <div class="form-control">
                                    <?php echo get_data('broker_phone') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="broker_fax" class="control-label">Broker Fax Number</label>
                                    <div class="form-control">
                                    <?php echo get_data('broker_fax') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="broker_email" class="control-label">Broker E-mail</label>
                                    <div class="form-control">
                                    <?php echo get_data('broker_email') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="general_limit" class="control-label">General Liabilities Limit</label>
                                    <div class="form-control">
                                    <?php echo get_data('general_limit') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cargo_limit" class="control-label">Cargo Liabilities Limit</label>
                                    <div class="form-control">
                                    <?php echo get_data('cargo_limit') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="accident_limit" class="control-label">Accident Limits</label>
                                    <div class="form-control">
                                    <?php echo get_data('accident_limit') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="deductable_cargo" class="control-label">Deductable Cargo</label>
                                    <div class="form-control">
                                    <?php echo get_data('deductable_cargo') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="dedicatable_accident" class="control-label">Dedicatable Accident</label>
                                    <div class="form-control">
                                    <?php echo get_data('dedicatable_accident') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="drug_test" class="control-label">Drug Test Consortium</label>
                                    <div class="form-control">
                                    <?php echo get_data('drug_test') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="drug_test_dot" class="control-label">Drug Test DOT</label>
                                    <div class="form-control">
                                    <?php echo get_data('drug_test_dot') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="drug_test_ndot" class="control-label">Drug Test Non-DOT</label>
                                    <div class="form-control">
                                    <?php echo get_data('drug_test_ndot') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="prepass_account" class="control-label">PREPASS Account NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('prepass_account') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_scacode" class="control-label">NMFTA/Scaccode</label>
                                    <div class="form-control">
                                    <?php echo get_data('nmfta_scacode') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_exp" class="control-label">NMFTA Expire</label>
                                    <div class="form-control">
                                    <?php echo get_data('nmfta_exp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="nmfta_scacode2" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('nmfta_scacode2') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ifta" class="control-label">IFTA A/C NO.</label>
                                    <div class="form-control">
                                    <?php echo get_data('ifta') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta2" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('ifta2') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta3" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('ifta3') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta4" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('ifta4') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                	<label for="ifta5" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('ifta5') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="new_mexico" class="control-label">New Mexico #</label>
                                    <div class="form-control">
                                    <?php echo get_data('new_mexico') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="mexico_exp" class="control-label">Expries</label>
                                    <div class="form-control">
                                    <?php echo get_data('mexico_exp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="orgen" class="control-label">Orgen #</label>
                                    <div class="form-control">
                                    <?php echo get_data('orgen') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="orgen_exp" class="control-label">Expries</label>
                                    <div class="form-control">
                                    <?php echo get_data('orgen_exp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="msc" class="control-label">Msc 90.</label>
                                    <div class="form-control">
                                    <?php echo get_data('msc') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ambassador_bridge" class="control-label">Ambassador Bridge</label>
                                    <div class="form-control">
                                    <?php echo get_data('ambassador_bridge') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="transponder" class="control-label">Transponder</label>
                                    <div class="form-control">
                                    <?php echo get_data('transponder') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="transponder_exp" class="control-label">Expries</label>
                                    <div class="form-control">
                                    <?php echo get_data('transponder_exp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="ucr_exp" class="control-label">UCR Expire</label>
                                    <div class="form-control">
                                    <?php echo get_data('ucr_exp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="quebec_form" class="control-label">Quebec Form</label>
                                    <div class="form-control">
                                    <?php echo get_data('quebec_form') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cali_air_res" class="control-label">California Air Resource Board</label>
                                    <div class="form-control">
                                    <?php echo get_data('cali_air_res') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="wsib" class="control-label">WSIB A/C #</label>
                                    <div class="form-control">
                                    <?php echo get_data('wsib') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky" class="control-label">Kentucky</label>
                                    <div class="form-control">
                                    <?php echo get_data('kentucky') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky2" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('kentucky2') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky3" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('kentucky3') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="kentucky4" class="control-label">&nbsp;</label>
                                    <div class="form-control">
                                    <?php echo get_data('kentucky4') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($this->user_type !== 'user'): ?>
                        <div class="row" style="border-top: 2px solid #FF6C60;padding-top: 15px;margin-top: 15px;">
                        	<div class="col-md-4">
                            </div>
                        	<div class="col-md-2">
                                <div class="form-group ">
                                    <label for="username" class="control-label">Username</label>
                                    <div class="form-control">
                                    <?php echo get_username_by_id(get_data('id')) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="opacity: 0.5;">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Password</label>
                                    <div class="form-control" readonly>
                                    ************
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
				</div>
			</div>
		</section>
	</div>
</div>