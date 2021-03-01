<!-- page start-->
<style type="text/css">

.fa-close{
    color: #FF0000;
    font-size: 13px;

}


</style>

<?php 

    // if(set_value('update') && set_value('trailer_id')){
    // //array_merge
    //     valid_company('trailer','company_id',set_value('trailer_id'));
    //     $trailer_detail = $this->trailer_model->getTrailerByID(set_value('trailer_id'));

    // }

?>

<?php 
    if(isset($trailer_detail['id'])){
        $id=$trailer_detail['id'];
        set_data($trailer_detail);
    }else{
        $id='';
    } 

?>
<style>
	.fileupload{
		display:none;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<?php if($id == ''){?>
				<h4 class="head3" style="display:inline-block">Add New Trailer</h4>
			<?php } else {?>
				<h4 class="head3" style="display:inline-block">Update Trailer</h4>
			<?php }?>
			
				<a href="<?php echo site_url('trailer') ?>" class="btn btn-primary pull-right">View Trailer List</a>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
				<div class=" form">
                	<form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('trailer/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
                        <input type="hidden" name="action_token" value="<?php echo $action_token; ?>">
                        <header class="panel-heading tab-bg-dark-navy-blue " <?php echo  (get_data('deactive') == 1)?"style='background:#ED5252;'":'';?> >
                        	<ul class="nav nav-tabs" style="height: 42px">

                        	</ul>
                        </header>
                        <div class="panel-body">
                        	<style>
								.tab-pane {
									min-height:400px;
								}
                            </style>
                        	<div class="tab-content">
                                <div id="general" class="tab-pane active">
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
                                                <input class="form-control input-sm" id="vin_no" name="vin_no" minlength="2" type="text" required value="<?php echo get_data('vin_no');  ?>"/>
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
                                                <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="addition" name="addition" type="text" value="<?php echo get_data('addition');  ?>" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Status</label>
                                                <select class="form-control input-sm m-bot15" id="status" name="status" required>
                                                    <?php if(get_data('status')){?>
                                                    <option disabled selected value="">Select Make</option>
                                                    <?php } ?>
                                                    <option value="COMPANY" <?php if(get_data('status') == 'COMPANY')echo 'selected'?>>COMPANY</option>
                                                    <option value="OWNER" <?php if(get_data('status')== 'OWNER')echo 'selected'?>>OWNER OPERATOR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group owner" style="opacity: 0.5;">
                                                <label for="cname" class="control-label">Owner Name</label>
                                                <input class=" form-control input-sm" id="owner_name" name="owner_name" minlength="2" type="text" readonly value="<?php echo get_data('owner_name');  ?>"/>
                                            </div>
                                        </div>
                                	</div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Make</label>
                                                <input class="form-control input-sm" id="make" name="make" minlength="2" type="text" required value="<?php echo get_data('make');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Reefer/Dryvan</label>
                                                <select class="form-control input-sm m-bot15" id="reefer_dryvan" name="reefer_dryvan" required="true">
                                                    <?php if(get_data('reefer_dryvan')){?>
                                                    <option disabled selected>Select Make</option>
                                                    <?php } ?>
                                                    <option value="REEFER" <?php if(get_data('reefer_dryvan') == 'REEFER')echo 'selected'?>>REEFER</option>
                                                    <option value="DRYVAN" <?php if(get_data('reefer_dryvan') == 'DRYVAN')echo 'selected'?>>DRYVAN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Own/Leased</label>
                                                <select class="form-control input-sm m-bot15" id="owner_leased" name="owner_leased" required>
                                                    <?php if(get_data('owner_leased')){?>
                                                    <option disabled selected>Select Make</option>
                                                    <?php } ?>
                                                    <option value="Own" <?php if(get_data('owner_leased') == 'Own')echo 'selected'?>>Own</option>
                                                    <option value="Leased" <?php if(get_data('owner_leased') == 'Leased')echo 'selected'?>>Leased</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 leased" id="leased_date" style="display:none;">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Lease End Date</label>
                                                <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="lease_end_date" name="lease_end_date" type="text" value="<?php echo get_data('lease_end_date');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 own" id="leased_file" style="display:none;">
                                            <div class="form-group">
                                                <label for="cname" class="control-label">Own/Leased Paper</label>
                                                <div class="controls">
                                                    <div class="fileupload <?php if(get_data('owner_leased_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block !important;">
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="default" id="owner_leased_pdf" name="owner_leased_pdf">
                                                        </span>
                                                        <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trailer/file_download').'/'.(get_data('owner_leased_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                                        <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('owner_leased_pdf',true))echo "Download"; ?></span>
                                                    </a></span>
                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Name On Ownership
                                                </label>
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
                                                            <input type="file" class="default" id="owner_ship_pdf" name="owner_ship_pdf">
                                                        </span>
                                                        <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trailer/file_download').'/'.(get_data('owner_ship_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                                        <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('owner_ship_pdf',true))echo "Download"; ?></span>
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
                                                <label for="cname" class="control-label">Annual Safety Due</label>
                                                <input data-plugin-datepicker   data-date-format="mm/dd/yyyy" class="form-control input-sm default-date-picker" id="annual_safety_due" name="annual_safety_due" type="text" required value="<?php echo getDateFromDB(get_data('annual_safety_due'));  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cname" class="control-label">Annual Safety</label>
                                                <div class="controls">
                                                    <div class="fileupload <?php if(get_data('annual_safety_pdf',true)){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" style="display:block !important;">
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="default" id="annual_safety_pdf" name="annual_safety_pdf">
                                                        </span>
                                                        <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('trailer/file_download').'/'.(get_data('annual_safety_pdf',true)).'/'.get_data('unit_no');?>" id="download-a">
                                                        <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('annual_safety_pdf',true))echo "Download"; ?></span>
                                                    </a></span>
                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Licence plate #</label>
                                                <input class="form-control input-lg" id="plate_no" name="plate_no" minlength="2" type="text" required style="text-transform:uppercase"s value="<?php echo get_data('plate_no');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Old Licence plate #</label>
                                                <input class="form-control tagsinput" id="o_plate_no" name="o_plate_no" minlength="2" value="<?php echo get_data('o_plate_no');  ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Remark</label>
                                                <input class="form-control tagsinput" id="remarks" name="remarks" minlength="2"  value="<?php echo get_data('remarks');  ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        	</div>
                        </div>
                        <div class="row">
                                    <div class="col-md-12 text-right">
                                        
                                         <?php if($id == ''){
                                             echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 			  
                                          }else{
                                                echo "<input type='hidden' name='trailer_id'  value='".$id."'>";
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


<script type="text/javascript">
    
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

    $('#owner_leased').on('change',function(){
        var value = $('#owner_leased').val();
        if(value == 'Own'){
            $("#lease_end_date").val(null);
        }

    });

    $(function(){
        var value = $('#owner_leased').val();
        if(value == 'Leased'){
            $("#leased_date").css("display","block");
            $("#leased_file").css("display","block");
        }
    });

});



</script> 