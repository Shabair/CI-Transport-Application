<!-- page start-->
<style type="text/css">

.fa-close{
    color: #FF0000;
    font-size: 13px;

}
.driver_select{
    position: absolute;
    right: 15px;
    top: 1px;
    margin-left: 15px;
    height: 24px;
    padding: 0px 11px;
    background-color: #f0ad4e;
    border-color: #f0ad4e;
}
.driver_select.btn-primary:active:hover,.driver_select.btn-primary:hover{
    background-color: #e88d1d;
    border-color: #e88d1d;
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

<?php 
    if(isset($truck_detail['id'])){
        $id=$truck_detail['id'];
        set_data($truck_detail);
    }else{
        $id='';
    } 

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
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('trucks/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
                        <input type="hidden" name="action_token" value="<?php echo $action_token; ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Unit #</label>
                                    <input class="form-control input-sm" id="unit_no" name="unit_no" minlength="2" type="text" required value="<?php echo get_data('unit_no');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">VIN #</label>
                                    <input class="form-control input-sm" id="vin_no" name="vin_no" minlength="2" type="text" required style="text-transform:uppercase" value="<?php echo get_data('vin_no');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Year</label>
                                    <input class="form-control input-sm datepickeryear" id="year" name="year" type="text" required value="<?php echo get_data('year');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Addition</label>
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="addition" name="addition" type="text" required value="<?php echo get_data('addition');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Make</label>
                                    <input class="form-control input-sm" id="make" name="make" minlength="2" type="text" required value="<?php echo get_data('make');  ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Licence plate #</label>
                                    <input class="form-control input-lg" id="license_plate" name="license_plate" minlength="2" type="text" required style="text-transform:uppercase" value="<?php echo get_data('license_plate');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Old Licence plate #</label>
                                    <input class="form-control tagsinput" id="o_lic_plate" name="o_lic_plate" minlength="2" value="<?php echo get_data('o_lic_plate');  ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Own/Leased</label>
                                    <select class="form-control input-sm m-bot15" id="owner_leased" name="owner_leased">
                                        <?php if(get_data('owner_leased') == ''){?>
                                        <option disabled selected>Select Make</option>
                                        <?php } ?>
                                        <option value="Own" <?php if(get_data('owner_leased') == 'Own')echo 'selected'?>>Own</option>
                                        <option value="Leased" <?php if(get_data('owner_leased') == 'Leased')echo 'selected'?>>Leased</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 leased" <?php echo (get_data('owner_leased') == 'Leased')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Lease End Date</label>
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="lease_end_date" name="lease_end_date" type="text" value="<?php echo get_data('lease_end_date');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4 own" <?php echo (get_data('owner_leased') == 'Leased')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group">
                                    <label for="cname" class="control-label">Own/Leased Paper</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('owner_leased_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('owner_leased_pdf',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="owner_leased_pdf" name="owner_leased_pdf">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('owner_leased_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('owner_leased_pdf',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Name On Ownership</label>
                                    <input class="form-control input-sm" id="ownership_name" name="ownership_name" minlength="2" type="text" required value="<?php echo get_data('ownership_name');  ?>"/>
                                </div>
                            </div>
                        	<div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">Owner Ship</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('owner_ship_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block !important;">
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="owner_ship_pdf" name="owner_ship_pdf" />
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('owner_ship_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('owner_ship_pdf',true) != '')echo "Download"; ?></span>
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
                                    <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="annual_safety_due" name="annual_safety_due" type="text" required value="<?php echo getDateFromDB(get_data('annual_safety_due'));  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Annual Safety</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('annual_safety_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block  !important;">
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="annual_safety_pdf" name="annual_safety_pdf">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('annual_safety_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('annual_safety_pdf',true) != '')echo "Download"; ?></span></span>
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
                                    	<?php if(get_data('status') == ''){?>
                                    	<option disabled selected value="">Select Make</option>
                                        <?php } ?>
                                        <option value="COMPANY" <?php if(get_data('status') == 'COMPANY')echo 'selected'?>>COMPANY</option>
                                        <option value="OWNER" <?php if(get_data('status') == 'OWNER')echo 'selected'?>>OWNER OPERATOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div id="status_div"></div>
                            </div>
                            <div class="col-md-4 driver_name nc_show">
                                <div id="driver_div"></div>
                            </div>
                            <div class="col-md-2 ">
                                <div id="contract_div"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group cont_owner">
                                    <label for="cname" class="control-label">Contract</label>
                                    <div class="form-group ">
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if(get_data('contract_pdf',true) != '')echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div class="form-group cont_owner">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('contract_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('contract_pdf',true) != ''){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="contract_pdf" name="contract_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('contract_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('contract_pdf',true) != '')echo "Download"; ?></span>
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
                                    <label for="cname" class="control-label">Ambassador Brige</label>
                                    <div class="form-group ">
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="ambassadorbrige" name="ambassadorbrige" <?php if(get_data('ambassadorbrige') == 'on') echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group fileupload" id="rfid_tag_no_parent">
                                    <label for="cname" class="control-label">RFID Tag No</label>
                                    <input class=" form-control input-sm" id="rfid_tag_no" name="rfid_tag_no" minlength="2" type="text" value="<?php echo get_data('rfid_tag_no');  ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Kenty Key</label>
                                    <div class="form-group ">
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="kentykey" name="kentykey" <?php if(get_data('kentykey') == 'on')echo 'checked'; ?> />
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
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" name="orgen_permit" <?php if(get_data('orgen_permit_pdf',true))echo 'checked'; ?>/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('orgen_permit_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('orgen_permit_pdf',true)){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="orgen_permit_pdf" name="orgen_permit_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('orgen_permit_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('orgen_permit_pdf',true))echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	<div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">New Maxico Permit</label>
                                    <div class="form-group ">
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if(get_data('maxico_permit_pdf',true))echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('maxico_permit_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('maxico_permit_pdf',true)){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="maxico_permit_pdf" name="maxico_permit_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('maxico_permit_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('maxico_permit_pdf',true))echo "Download"; ?></span>
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
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if(get_data('newyork_pdf',true))echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('newyork_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('newyork_pdf',true)){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="newyork_pdf" name="newyork_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('newyork_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('newyork_pdf',true))echo "Download"; ?></span>
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
                                        <div class="My-switch h_s" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" <?php if(get_data('transponder_pdf',true))echo 'checked'; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                	<label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('transponder_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('transponder_pdf',true)){echo 'style="display:block;"'; }?>>
                                        	<span class="btn btn-white btn-file">
                                        		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                        		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        		<input type="file" class="default" id="transponder_pdf" name="transponder_pdf">
                                        	</span>
                                        	<span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trucks/file_download').'/'.(get_data('transponder_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('transponder_pdf',true))echo "Download"; ?></span>
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
                                    <input class=" form-control tagsinput" id="remark" name="remark" minlength="2" type="text" value="<?php echo get_data('remark');  ?>"/>
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
function status_div(value){
    
    if(value == "OWNER"){
            $("#status_div").empty().append('<div class="form-group"> <label for="cname" class="control-label">Driver/Other</label> <div> <label class="radio-inline"> <input type="radio" name="owner" <?php echo(get_data("owner")=="driver")? "checked":""; ?> value="driver">Driver </label> <label class="radio-inline"> <input type="radio" name="owner" value="other" <?php echo(get_data("owner")=="other")? "checked":""; ?>>Other </label> </div></div>');
            driver_div("<?php echo get_data('owner') ?>");
            $(".cont_owner").show();

       }else{
            $("#status_div").empty();
            $("#driver_div").empty();
            $("#contract_div").empty();
       }
}
function driver_div(value){
    classofbuttton = "driver_select btn btn-primary  ";
    buttonDriverView = '<button class=\''+classofbuttton+'\'>view</button>';
    if(value == 'driver'){
        $("#driver_div").empty().append('<div class="form-group"><label for="cname" class="control-label">Owner Name</label><br /><select class="form-control input-sm text-capitalize selectpicker" id="owner_name" name="owner_name" data-style="btn-primary" data-width="100%"  data-live-search="true"><option disabled selected>Select owner name</option><?php foreach($getDriver as $row){ ?><option value="<?php echo $row->id; ?>" <?php echo (get_data("owner_name") == $row->id)?"Selected":""; ?> data-subtext="'+buttonDriverView+'" ><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name; ?></option><?php } ?></select></div>');
        $('#owner_name').selectpicker('refresh');

            
    }else if(value == 'other'){

        $("#driver_div").empty().append('<div class="form-group"> <label for="cname" class="control-label">Owner Name</label> <input class=" form-control input-sm" id="owner_name_other" name="owner_name" minlength="2" type="text" list="owner_name" value="<?php echo get_data('owner_name'); ?>"/> </div>'); 
    }
    if(value != ''){

        $("#contract_div").empty().append('<div class="form-group"> <label for="contract_due" class="control-label">Contract Due</label> <input  class=" form-control input-sm default-date-picker" id="contract_due" name="contract_due" type="text" value="<?php echo getDateFromDB(get_data('contract_due')); ?>"> </div>');
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
    $('#rfid_tag_no').val(null);//.prop('checked') == true
});


$(document).ready(function(){
    $("#owner_leased").change(function() {
        if($("#owner_leased").val() == "Leased")
        {
            $(".leased").show(250);
            $(".own").show(250);
        }
        if($("#owner_leased").val() == "Own")
        {
            $(".leased").hide(250);
            $(".own").hide(250);
            
        }
    });
/*swicth*/

    <?php if(get_data('ambassadorbrige')): ?>
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
        if(value == 'Leased'){
            // $("#leased_file").css("display","block");
            
            $("#lease_end_date").css("display","block");
            $("#leased_file").css("display","block");
            
        }
    });
    
    var driver_var = "<?php echo get_data('status') ?>";
    status_div(driver_var);

    $(".h_s").change(function(e) {
        if($(this).find('.switch-on').length !== 0){
            $(this).parentsUntil(".row").next().find(".fileupload").fadeIn(250);
        }else{
            $(this).parentsUntil(".row").next().find(".fileupload").fadeOut(250);
        }
    });
});



var selected_driver_id = null;
$(document).on('change',"#owner_name",function(){
        selected_driver_id = $(this).val();
});

$(document).on('click','.driver_select',function(){
    window.open('<?php echo base_url("driver/view")?>/'+selected_driver_id, '_blank');
});
</script>