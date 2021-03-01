<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            <a href="<?php echo base_url('admin/admins/edit/'.get_data('id'))?>" class="btn btn-primary pull-right">Edit Details</a>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <div class="form-horizontal ">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >First Name</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo get_data('first_name')?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Middle Name</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo (get_data('middle_name'))? get_data('middle_name'): "<div class='text-danger'><i>Empty</i></div>"?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Last Name</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo (get_data('last_name'))? get_data('last_name'): "<div class='text-danger'><i>Empty</i></div>"?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Username</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo get_data('username')?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" id="password" value="***********" autocomplete="off" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Email</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo get_data('email')?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Gender</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo ucfirst(get_data('gender'))?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Address</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo (get_data('address'))? get_data('address'): "<div class='text-danger'><i>Empty</i></div>"?>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Contact No</label>
                            <div class="col-sm-8">
                            	<div class="form-control">
                                	<?php echo (get_data('contact_no'))? get_data('contact_no'): "<div class='text-danger'><i>Empty</i></div>"?>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>



