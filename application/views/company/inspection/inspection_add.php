<!-- page start-->
<?php 

    if(isset($inspection_detail['id'])){
        set_data($inspection_detail);
        $id=$inspection_detail['id'];
    }else{
        $id='';
    }

    if(!isset($driver_name)){
        $driver_name = '';
    }

?>
<style type="text/css">
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
        background-color: #FF5C5C;
        border-color: #39b2a9;
        color: #FFFFFF;
    }
    .fa-close{
        color: #FF0000;
        font-size: 13px;

    }
</style>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<?php if($id == ''){?>
				<h4 class="head3" style="display:inline-block">Add New Inspection</h4>
			<?php } else {?>
				<h4 class="head3" style="display:inline-block">Update Inspection</h4>
			<?php }?>
			
				<a href="<?php echo site_url('inspection') ?>" class="btn btn-primary pull-right">View Inspection List</a>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
				<div class=" form">
				
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('inspection/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Driver Name</label>
                                    <select class="form-control text-capitalize " data-live-search="true" name="driver_id" required>
                                    	<option disabled selected value>select driver name</option>
                                    	<?php 
											foreach($getDriver as $row)
											{ 
                                                $selected = (get_data('driver_id')==$row->id)?'selected':'';
											  echo "<option  ".$selected."  value='".$row->id."'>".$row->first_name.' '.$row->middle_name.' '.$row->last_name."</option>";
											}
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Defects</label>
                                    <div class="btn-row">
                                    <?php 
                                        $allDefects=array();

                                        function checkboxValue($arr,$val){
                                            if(is_array($arr)){
                                                return (in_array($val, $arr))?'checked':'';
                                            }else{
                                                return '';
                                            }

                                        }
                                        if($id && !set_value('submit')){
                                            $allDefects=unserialize(get_data('defects',false,false));
                                            $allVoil=unserialize(get_data('type_of_voil',false,false));
                                        }else{
                                            $allDefects = get_data('defects');
                                            $allVoil = get_data('type_of_voil');
                                        }

                                    ?>
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-primary <?php echo (checkboxValue($allDefects,'driver') != '')?'active':''; ?>">
                                              <input type="checkbox" name="defects[]" value="driver" <?php echo checkboxValue($allDefects,'driver') ?> >Driver
                                          </label>
                                          <label class="btn btn-primary <?php echo (checkboxValue($allDefects,'truck') != '')?'active':''; ?>">
                                              <input type="checkbox" name="defects[]" value="truck" <?php echo checkboxValue($allDefects,'truck') ?>>Truck
                                          </label>
                                          <label class="btn btn-primary <?php echo (checkboxValue($allDefects,'trailer') != '')?'active':''; ?>">
                                              <input type="checkbox" name="defects[]" value="trailer" <?php echo checkboxValue($allDefects,'trailer') ?>>Trailer
                                          </label>
                                          <label class="btn btn-primary <?php echo (checkboxValue($allDefects,'other') != '')?'active':''; ?>">
                                              <input type="checkbox" id="defects_check" name="defects[]" value="other" <?php echo checkboxValue($allDefects,'other') ?>>Other
                                          </label>
                                        </div>
                              		</div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Type Of Voilation</label>
                                    <div class="btn-row">
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-primary <?php echo (checkboxValue($allVoil,'maintinance') != '')?'active':''; ?>">
                                              <input type="checkbox" id="maintinance_check" value="maintinance" name="type_of_voil[]" <?php echo checkboxValue($allVoil,'maintinance') ?> >Maintinance
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'hos') != '')?'active':''; ?>">
                                              <input type="checkbox" id="hos_check" value="hos" name="type_of_voil[]"  <?php echo checkboxValue($allVoil,'hos') ?>>Hour Of Service
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'unsafe') != '')?'active':''; ?>">
                                              <input type="checkbox" id="unsafe_check" value="unsafe" name="type_of_voil[]" <?php echo checkboxValue($allVoil,'unsafe') ?>>Unsafe
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'CTPAT') != '')?'active':''; ?>">
                                              <input type="checkbox" id="CTPAT_check" value="CTPAT" name="type_of_voil[]" <?php echo checkboxValue($allVoil,'CTPAT') ?>>CTPAT
                                          </label>
                                        </div>
                              		</div>
                                </div>
                            </div>
                            <div id="other_div">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Inspection Location</label>
                                    <select class="form-control  m-bot15" name="Insp_loc" required>
                                        <option value="" disabled selected value>Select State</option>
                                        <option value="can" <?php echo (get_data('Insp_loc')=='can')?'selected':''; ?>>Canadian Inspection</option>
                                        <option value="us" <?php echo (get_data('Insp_loc')=='us')?'selected':''; ?>>US Inspection</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Level</label>
                                    <select class="form-control m-bot15" name="level" required>
                                        <option value="" disabled selected value>Select Level</option>
                                        <option value="1" <?php echo (get_data('level')=='1')?'selected':''; ?>>Level 1</option>
                                        <option value="2" <?php echo (get_data('level')=='2')?'selected':''; ?>>Level 2</option>
                                        <option value="3" <?php echo (get_data('level')=='3')?'selected':''; ?>>Level 3</option>
                                        <option value="warning" <?php echo (get_data('level')=='warning')?'selected':''; ?>>Warning</option>
                                        <option value="other" <?php echo (get_data('level')=='other')?'selected':''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Date</label>
                                    <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('insp_date') ?>" name="insp_date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Time</label>
                                    <input class=" form-control input-sm" id="time_insp" name="time_insp" minlength="2" type="text" required value="<?php echo get_data('time_insp') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Location</label>
                                    <input class="form-control input-sm" id="location" name="location" minlength="2" type="text" required value="<?php echo get_data('location') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Truck</label>
                                    <select class="form-control text-capitalize " data-live-search="true" id="truck" name="truck" required>
                                        <option disabled selected value>select Truck</option>
                                        <?php 
                                            foreach($gettruck as $row)
                                            { $selected = (get_data('truck')==$row->id)?'selected':'';
                                              echo '<option value="'.$row->id.'" '.$selected.' >'.$row->unit_no.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Trailer</label>
                                    <select class="form-control text-capitalize " data-live-search="true" id="trailer_select" name="trailer" required>
                                        <option disabled selected value>select Trailer</option>
                                        <?php 
                                            foreach($gettrailer as $row)
                                            { $selected = (get_data('trailer')==$row->id)?'selected':'';
                                              echo '<option value="'.$row->id.'" '.$selected.'>'.$row->unit_no.'</option>';
                                            }
                                        ?>
                                        <option value="other" <?php echo (get_data('trailer')=='other')?'selected':''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div id="trailer_div"></div>
                        </div>
                        <div class="row" >   	
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Warning letter</label>
                                    <input class=" form-control input-sm" id="warning_letter" name="warning_letter" minlength="2" type="text" value="<?php echo get_data('warning_letter') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('warning_letter_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('warning_letter_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="warning_letter_file" name="warning_letter_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('warning_letter_file',true)).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('warning_letter_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Status</label>
                                    <select class="form-control m-bot15" name="status" required>
                                        <option value disabled selected>Select Status</option>
                                        <option value="pending" <?php echo (get_data('status')=='pending')?'selected':''; ?>>Pending</option>
                                        <option value="filed" <?php echo (get_data('status')=='filed')?'selected':''; ?>>Filed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1"></div><!-- 
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Remarks</label>
                                    <input class=" form-control input-sm" id="general_limit" name="general_limit" maxlength="9" type="text" required value="<?php echo isset($company_detail['general_limit'])?$company_detail['general_limit']: '';  ?>"/>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                                                        <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Repair Bill</label>
                                    <div class="form-group ">
                                    <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" id="repair_bill" name="repair_bill" <?php echo (get_data('repair_bill')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div id="repair_bill_box"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('repair_bill_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('repair_bill_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="repair_bill_file" name="repair_bill_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('repair_bill_file',true)).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('repair_bill_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Statement</label>
                                    <div class="form-group ">
                                    <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" name="statement" <?php echo (get_data('statement')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('statement_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('statement_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="statement_file" name="statement_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('statement_file',true)).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('statement_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #eff2f7;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Out Of Service</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  name="out_of_service" <?php echo (get_data('out_of_service')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Match With Log Book</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  name="match_logbook" <?php echo (get_data('match_logbook')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Remarks</label>
                                    <input class=" form-control tagsinput" id="remarks" name="remarks" minlength="2" type="text" value="<?php echo get_data('remarks') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                 <?php if($id == ''){
                                     echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 			  
                                  }
                                    else{
                                        echo '<button type="submit" name="submit" value="update"  class="btn btn-primary" > Update</button>';
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script> --> 
<script src="<?php echo base_url(); ?>public/js/bootstrap-timepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    <?php if(checkboxValue($allDefects,'other')=='checked'): ?>
        defectCheck(true);
    <?php endif; ?>

    <?php if(get_data('trailer') == 'other'): ?>
        trailerSelect('other');
    <?php endif; ?>

    <?php if(get_data('repair_bill') == 'on'): ?>
        repairBill(true);
    <?php endif; ?>
});

</script>
<script>

function defectCheck(value) {
    if(value== true){
        $("#other_div").append('<div class="col-md-6"><div class="form-group "><label for="cname" class="control-label">Detail of Vehicul</label><input class=" form-control input-sm" id="other_detail" name="other_detail" minlength="2" type="text" required value="<?php echo get_data('other_detail') ?>"/></div></div>');
    }else{
        $("#other_div").empty();
    }
}

function trailerSelect(value){
    if(value == 'other'){
        $("#trailer_div").append('<div class="col-md-4" style="padding-left:0px;"><div class="form-group "><label for="cname" class="control-label">Details</label><input class=" form-control input-sm" id="trailer_detail" name="trailer_detail" minlength="2" type="text" required value="<?php echo get_data('trailer_detail') ?>"/></div></div>');
    }else{
        $("#trailer_div").empty();
        $("#trailer_detail").val(null);
    }
}

function repairBill(value) {
    if(value== true){
        $("#repair_bill_box").append('<div class="col-md-2" style="padding-left:0px;"><div class="form-group "><label for="cname" class="control-label">Details</label><input class=" form-control input-sm" id="repair_bill_detail" name="repair_bill_detail" minlength="2" type="text" value="<?php echo get_data('repair_bill_detail') ?>"/></div></div>');
    }else{
        $("#repair_bill_box").empty();
    }
}

// $("#maintinance_check").change(function(){

//     if(this.checked== true){
//         $("#repair_bill").attr('required',true);
//     }else{
//         $("#repair_bill").attr('required',false);
//     }

// });



$("#defects_check").change(function(){
    defectCheck(this.checked);
});



$("#repair_bill").change(function(){
// controls
    repairBill(this.checked);

});

$('#trailer_select').on('change',function(){
    var value = $('#trailer_select').val();
    trailerSelect(value);

});

$('#time_insp').timepicker({
        defaultTime: "<?php echo get_data('time_insp') ?>",
});

</script>