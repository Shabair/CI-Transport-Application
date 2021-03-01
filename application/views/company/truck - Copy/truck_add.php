<!-- page start-->
<style type="text/css">

.fa-close{
    color: #FF0000;
    font-size: 13px;

}


</style>


<!-- page start-->
<?php 
if(set_value('update') && set_value('truck_id')){
//array_merge
    valid_company('truck','company_id',set_value('truck_id'));
    $truck_detail = $this->truck_model->getTruckByID(set_value('truck_id'));

}


?>


<?php isset($truck_detail['id'])? $id=$truck_detail['id']:  $id='';  ?>



<?php 

$truck_detail['unit_no'] = (set_value('unit_no'))?set_value('unit_no'):((isset($truck_detail['unit_no']))?$truck_detail['unit_no']:'');
$truck_detail['vin_no'] = (set_value('vin_no'))?set_value('vin_no'):((isset($truck_detail['vin_no']))?$truck_detail['vin_no']:'');
$truck_detail['year'] = (set_value('year'))?set_value('year'):((isset($truck_detail['year']))?$truck_detail['year']:'');
$truck_detail['addition'] = (set_value('addition'))?set_value('addition'):((isset($truck_detail['addition']))?$truck_detail['addition']:'');
$truck_detail['status'] = (set_value('status'))?set_value('status'):((isset($truck_detail['status']))?$truck_detail['status']:'');
$truck_detail['owner_name'] = (set_value('owner_name'))?set_value('owner_name'):((isset($truck_detail['owner_name']))?$truck_detail['owner_name']:'');
$truck_detail['make'] = (set_value('make'))?set_value('make'):((isset($truck_detail['make']))?$truck_detail['make']:'');
$truck_detail['rfid_tag_no'] = (set_value('rfid_tag_no'))?set_value('rfid_tag_no'):((isset($truck_detail['rfid_tag_no']))?$truck_detail['rfid_tag_no']:'');
$truck_detail['ownership_name'] = (set_value('ownership_name'))?set_value('ownership_name'):((isset($truck_detail['ownership_name']))?$truck_detail['ownership_name']:'');
$truck_detail['owner_leased'] = (set_value('owner_leased'))?set_value('owner_leased'):((isset($truck_detail['owner_leased']))?$truck_detail['owner_leased']:'');
$truck_detail['lease_end_date'] = (set_value('lease_end_date'))?set_value('lease_end_date'):((isset($truck_detail['lease_end_date']))?$truck_detail['lease_end_date']:'');
$truck_detail['annual_safety_due'] = (set_value('annual_safety_due'))?set_value('annual_safety_due'):((isset($truck_detail['annual_safety_due']))?$truck_detail['annual_safety_due']:'');
$truck_detail['license_plate'] = (set_value('license_plate'))?set_value('license_plate'):((isset($truck_detail['license_plate']))?$truck_detail['license_plate']:'');
$truck_detail['o_lic_plate'] = (set_value('o_lic_plate'))?set_value('o_lic_plate'):((isset($truck_detail['o_lic_plate']))?$truck_detail['o_lic_plate']:'');
$truck_detail['remark'] = (set_value('remark'))?set_value('remark'):((isset($truck_detail['remark']))?$truck_detail['remark']:'');
$truck_detail['owner'] = (set_value('owner'))?set_value('owner'):((isset($truck_detail['owner']))?$truck_detail['owner']:'');

$truck_detail['owner_ship_pdf'] = (set_value('owner_ship_pdf'))?set_value('owner_ship_pdf'):((isset($truck_detail['owner_ship_pdf']))?$truck_detail['owner_ship_pdf']:'');
$truck_detail['contract_pdf'] = (set_value('contract_pdf'))?set_value('contract_pdf'):((isset($truck_detail['contract_pdf']))?$truck_detail['contract_pdf']:'');
$truck_detail['owner_leased_pdf'] = (set_value('owner_leased_pdf'))?set_value('owner_leased_pdf'):((isset($truck_detail['owner_leased_pdf']))?$truck_detail['owner_leased_pdf']:'');
$truck_detail['annual_safety_pdf'] = (set_value('annual_safety_pdf'))?set_value('annual_safety_pdf'):((isset($truck_detail['annual_safety_pdf']))?$truck_detail['annual_safety_pdf']:'');
$truck_detail['orgen_permit_pdf'] = (set_value('orgen_permit_pdf'))?set_value('orgen_permit_pdf'):((isset($truck_detail['orgen_permit_pdf']))?$truck_detail['orgen_permit_pdf']:'');
$truck_detail['maxico_permit_pdf'] = (set_value('maxico_permit_pdf'))?set_value('maxico_permit_pdf'):((isset($truck_detail['maxico_permit_pdf']))?$truck_detail['maxico_permit_pdf']:'');
$truck_detail['newyork_pdf'] = (set_value('newyork_pdf'))?set_value('newyork_pdf'):((isset($truck_detail['newyork_pdf']))?$truck_detail['newyork_pdf']:'');
$truck_detail['transponder_pdf'] = (set_value('transponder_pdf'))?set_value('transponder_pdf'):((isset($truck_detail['transponder_pdf']))?$truck_detail['transponder_pdf']:'');


?>


<style>
	.fileupload, .cont_owner{
		display:none;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<?php if($id == ''){?>
				<h4 class="head3" style="display:inline-block">Add New Truck</h4>
			<?php } else {?>
				<h4 class="head3" style="display:inline-block">Update Truck</h4>
			<?php }?>
			
				<a href="<?php echo site_url('truck') ?>" class="btn btn-primary pull-right">View Truck List</a>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('trucks/add/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Unit #</label>
                                    <input class="form-control input-sm" id="unit_no" name="unit_no" minlength="2" type="text" required value="<?php echo isset($truck_detail['unit_no'])?$truck_detail['unit_no']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">VIN #</label>
                                    <input class="form-control input-sm" id="vin_no" name="vin_no" minlength="2" type="text" required value="<?php echo isset($truck_detail['vin_no'])?$truck_detail['vin_no']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Year</label>
                                    <input class="form-control input-sm datepickeryear" id="year" name="year" type="text" required value="<?php echo isset($truck_detail['year'])?$truck_detail['year']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Addition</label>
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="addition" name="addition" type="text" required value="<?php echo isset($truck_detail['addition'])?$truck_detail['addition']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Make</label>
                                    <input class="form-control input-sm" id="make" name="make" minlength="2" type="text" required value="<?php echo isset($truck_detail['make'])?$truck_detail['make']: '';  ?>"/>
                                    <?php /*?><select class="form-control input-sm m-bot15" id="make" name="make">
                                        <?php if($truck_detail['make'] == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="FRHT" <?php if($truck_detail['make'] == 'FRHT')echo 'selected'?>>FRHT</option>
                                        <option value="VOLV" <?php if($truck_detail['make'] == 'VOLV')echo 'selected'?>>VOLV </option>
                                    </select><?php */?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Licence plate #</label>
                                    <input class="form-control input-lg" id="license_plate" name="license_plate" minlength="2" type="text" required value="<?php echo isset($truck_detail['license_plate'])?$truck_detail['license_plate']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Old Licence plate #</label>
                                    <input class="form-control tagsinput" id="o_lic_plate" name="o_lic_plate" minlength="2" value="<?php echo isset($truck_detail['o_lic_plate'])?$truck_detail['o_lic_plate']: '';  ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Name On Ownership</label>
                                    <input class="form-control input-sm" id="ownership_name" name="ownership_name" minlength="2" type="text" required value="<?php echo isset($truck_detail['ownership_name'])?$truck_detail['ownership_name']: '';  ?>"/>
                                </div>
                            </div>
                        	<div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">Owner Ship</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['owner_ship_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block !important;">
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="owner_ship_pdf" name="owner_ship_pdf" />
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['owner_ship_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['owner_ship_pdf'] != '')echo "Download"; ?></span>
                                        </a></span>
                                        	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Annual Safe Due</label>
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="annual_safety_due" name="annual_safety_due" type="text" required value="<?php echo isset($truck_detail['annual_safety_due'])?date("m/d/Y",strtotime($truck_detail['annual_safety_due'])): '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Annual Safety</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['annual_safety_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block  !important;">
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="annual_safety_pdf" name="annual_safety_pdf">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['annual_safety_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['annual_safety_pdf'] != '')echo "Download"; ?></span></span>
                                        </a></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Status</label>
                                    <select class="form-control input-sm m-bot15" id="status" name="status" required>
                                    	<?php if($truck_detail['status'] == ''){?>
                                    	<option disabled selected value="">Select Make</option>
                                        <?php } ?>
                                        <option value="COMPANY" <?php if($truck_detail['status'] == 'COMPANY')echo 'selected'?>>COMPANY</option>
                                        <option value="OWNER" <?php if($truck_detail['status'] == 'OWNER')echo 'selected'?>>OWNER OPERATOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div id="status_div"></div>
                            </div>
                            <div class="col-md-2 driver_name nc_show">
                                <div id="driver_div"></div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group cont_owner">
                                    <label for="cname" class="control-label">Contract</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if($truck_detail['contract_pdf'] != '')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group cont_owner">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['contract_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if($truck_detail['contract_pdf'] != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="contract_pdf" name="contract_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['contract_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['contract_pdf'] != '')echo "Download"; ?></span>
                                        </a></span>
                                        	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Own/Leased</label>
                                    <select class="form-control input-sm m-bot15" id="owner_leased" name="owner_leased">
                                        <?php if($truck_detail['owner_leased'] == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Own" <?php if($truck_detail['owner_leased'] == 'Own')echo 'selected'?>>Own</option>
                                        <option value="Leased" <?php if($truck_detail['owner_leased'] == 'Leased')echo 'selected'?>>Leased</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 leased" <?php echo ($truck_detail['owner_leased'] == 'Leased')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Lease End Date</label>
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="lease_end_date" name="lease_end_date" type="text" value="<?php echo isset($truck_detail['lease_end_date'])?$truck_detail['lease_end_date']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4 own" <?php echo ($truck_detail['owner_leased'] != '')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group">
                                    <label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['owner_leased_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if($truck_detail['owner_leased_pdf'] != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="owner_leased_pdf" name="owner_leased_pdf">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['owner_leased_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['owner_leased_pdf'] != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Ambassador Brige</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="ambassadorbrige" name="ambassadorbrige" <?php if($truck_detail['ambassadorbrige'] == 'on')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group fileupload" id="rfid_tag_no_parent">
                                    <label for="cname" class="control-label">RFID Tag No</label>
                                    <input class=" form-control input-sm" id="rfid_tag_no" name="rfid_tag_no" minlength="2" type="text" value="<?php echo isset($truck_detail['rfid_tag_no'])?$truck_detail['rfid_tag_no']: '';  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Kenty Key</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="kentykey" name="kentykey" <?php if($truck_detail['kentykey'] == 'on')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Orgen Permit</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if($truck_detail['orgen_permit_pdf'] != '')echo 'checked'; ?>/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['orgen_permit_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if($truck_detail['orgen_permit_pdf'] != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="orgen_permit_pdf" name="orgen_permit_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['orgen_permit_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['orgen_permit_pdf'] != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	<div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">New Maxico Permit</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if($truck_detail['maxico_permit_pdf'] != '')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['maxico_permit_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if($truck_detail['maxico_permit_pdf'] != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="maxico_permit_pdf" name="maxico_permit_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['maxico_permit_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['maxico_permit_pdf'] != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       	</div>
                       	<div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">New York</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if($truck_detail['newyork_pdf'] != '')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['newyork_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if($truck_detail['newyork_pdf'] != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="newyork_pdf" name="newyork_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['newyork_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['newyork_pdf'] != '')echo "Download"; ?></span>
                                        </a></span>
                                        	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Transponder</label>
                                    <div class="form-group ">
                                        <div id="h_s" class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if($truck_detail['transponder_pdf'] != '')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if($truck_detail['transponder_pdf'] != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if($truck_detail['transponder_pdf'] != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="transponder_pdf" name="transponder_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['transponder_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if($truck_detail['transponder_pdf'] != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file" data-id="<?php echo $id;?>" data-file="transponder_pdf"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-12">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Remark</label>
                                    <input class=" form-control tagsinput" id="remark" name="remark" minlength="2" type="text" value="<?php echo isset($truck_detail['remark'])?$truck_detail['remark']: '';  ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                 <?php if($id == ''){
                                     echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 			  
                                  }
                                    else{
                                        echo "<input type='hidden' name='truck_id'  value='".$id."'>";
                                        echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                                    }
                                  ?>
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
<script>
/*	$('#frmvalidate').validate({
			highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			$(element).closest('.error').remove();
		},
		ignore:[],
		rules: {
				email: {
					required: true,
					remote: {
						url: "<?php echo base_url('calllist/Check_Email_Exist');?>", 
						type : "post"
					}
				}
		},
		messages: {
	
				email: {
					required: "Please Provide Email Address.",
					remote: "Email Address Already Exists"
				}
		}
		
		$('#frmvalidate').submit();
	});*/
function status_div(value){
    
    if(value == "OWNER"){
            $("#status_div").empty().append('<div class="form-group"> <label for="cname" class="control-label">Driver/Other</label> <div> <label class="radio-inline"> <input type="radio" name="owner" <?php echo($truck_detail["owner"]=="driver")? "checked":""; ?> value="driver">Driver </label> <label class="radio-inline"> <input type="radio" name="owner" value="other" <?php echo($truck_detail["owner"]=="other")? "checked":""; ?>>Other </label> </div></div>');
            driver_div("<?php echo $truck_detail['owner'] ?>");
            $(".cont_owner").show();

       }else{
            $("#status_div").empty();
            $("#driver_div").empty();
       }
}
function driver_div(value){

    if(value == 'driver'){
            $("#driver_div").empty().append('<div class="form-group"><label for="cname" class="control-label">Owner Name</label><select class="form-control input-sm text-capitalize " id="owner_name" name="owner_name"><option disabled selected>select owner name</option><?php foreach($getDriver as $row){ ?><option value="<?php echo $row->id; ?>" <?php echo ($truck_detail["owner_name"] == $row->id)?"Selected":""; ?> ><?php echo $row->first_name; ?></option><?php } ?></select></div>');

            
        }else if(value == 'other'){

            $("#driver_div").empty().append('<div class="form-group"> <label for="cname" class="control-label">Owner Name</label> <input class=" form-control input-sm" id="owner_name_other" name="owner_name" minlength="2" type="text" list="owner_name" value="<?php echo isset($truck_detail['owner_name'])?$truck_detail['owner_name']: ''; ?>"/> </div>'); 
        }
}
	
    $("#status").on('change',function(){
        var value = $(this).val();
                status_div(value);
    });



    $(document).on('change', "input[name=owner]:radio", function() {
        var value = $(this).val();
        driver_div(value);
        $('#owner_name_other').val('');
    });

$("#ambassadorbrige").change(function(){
    $(rfid_tag_no).val(null);
});


$(document).ready(function(){


/*switch*/
$(function() {
  var switchSelector = 'input[type="checkbox"].switch-square';
  
  // // Convert all checkboxes with className `bs-switch` to switches. 
  // $(switchSelector).bootstrapSwitch();

  // Attach `switchChange` event to all switches.
  $(switchSelector).on('switch-change.bootstrapSwitch', function(event, state) {
    console.log(this);  // DOM element
    console.log(event); // jQuery event
    console.log(state); // true | false

    // Get the information for the switch.
 /*   var info = {
      state : state,
      value : $(this).data(state ? 'onText' : 'offText'),
      data : $(this).attr('data')
    }*/
    
    // Show bootstrap info alert.
/*    if ($('div.alert').length === 0) {
      $('body').append($('<div>').addClass('alert alert-info'));
    }
    $('div.alert').text(JSON.stringify(info, undefined, '  '));*/
  });
});

/*swicth*/

    <?php if($truck_detail['rfid_tag_no'] != ''): ?>

    $("#rfid_tag_no").parent().css("display","block");

    <?php endif; ?>

    $('#owner_leased').on('change',function(){
        var value = $('#owner_leased').val();
        if(value == 'Own'){
            $("#lease_end_date").val(null);
        }

    });

    $(function(){
        var value = $('#owner_leased').val();
        if(value == 'Own'){
            $("#leased_file").css("display","block");
            
            
        }else{
            $("#leased_date").css("display","block");
            $("#leased_file").css("display","block");
        }
    });
    
    var driver_var = "<?php echo $truck_detail['status'] ?>";
    status_div(driver_var);
    
    
});
</script>