<!-- page start-->
<!-- page start-->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<?php 

    if(isset($collision_detail['id'])){

        $temp_arr = unserialize($collision_detail['adjustor_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize($collision_detail['appraisal_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize($collision_detail['towing_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize($collision_detail['police_report_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize($collision_detail['test_drug_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize($collision_detail['training_req_all_data']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }

        $temp_arr = unserialize(unserialize($collision_detail['injuriedp_no_all_data'])['injuries_name']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['injuriedp_no_all_data'])['injuries_phone']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['injuriedp_no_all_data'])['injuries_type']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }

        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_driver_name']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_license_no']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_phone_no']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_insurrance_name']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_policy_no']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['thirdp_company']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_company_name']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_c_phone']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_email']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_fax']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }
        $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_c_person']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }

        if(isset(unserialize($collision_detail['thirdp_no_all_data'])['tp_insurrance_file'])){

            $temp_arr = unserialize(unserialize($collision_detail['thirdp_no_all_data'])['tp_insurrance_file']);
            if(is_array($temp_arr)){
                $collision_detail=array_merge($collision_detail,$temp_arr);
            }
        
        }

        $temp_arr = unserialize(unserialize($collision_detail['witness_no_all_data'])['witness_type']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }        
        $temp_arr = unserialize(unserialize($collision_detail['witness_no_all_data'])['witness_name']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }        
        $temp_arr = unserialize(unserialize($collision_detail['witness_no_all_data'])['witness_phone_no']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }        
        $temp_arr = unserialize(unserialize($collision_detail['witness_no_all_data'])['witness_email']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }        
        $temp_arr = unserialize(unserialize($collision_detail['witness_no_all_data'])['witness_address']);
        if(is_array($temp_arr)){
            $collision_detail=array_merge($collision_detail,$temp_arr);
        }

        set_data($collision_detail);
        $id=$collision_detail['id'];
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
    .multi-button{
        background: #41CAC0 !important;
        border-color: #49BDB5;
    }

    .multi-button:hover{
        background: #39B2A9 !important;
        border-color: #39B2A9;
    }
    div#back_result{
        
        width:100%;
        margin: 0 auto;
        border: 2px solid #dce4ec;
        border-radius: 5px;
        display: none;
        background-color: #fff;
    }

    .suggesions{
        list-style: none;
    }

    .fa-close{
        color: #FF0000;
        font-size: 13px;

    }

    .form-control {
        height: 34px;
    }

    .bottom-border{
        border-bottom: 1px solid #eff2f7;
        margin-bottom:10px;
    }

    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }

    .image-close-item{

    }

    .image-close{
        position: absolute;
        top: -18px;
        right: -5px;
        width: 36px;
        height: 36px;
        cursor: pointer;
        background-image: url(<?php echo base_url().'/public/img/remove.png'?>);
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
  
</script>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            <?php if($id == ''){?>
                <h4 class="head3" style="display:inline-block">Add New Collision</h4>
            <?php } else {?>
                <h4 class="head3" style="display:inline-block">Update Collision</h4>
            <?php }?>
            
                <a href="<?php echo site_url('collision') ?>" class="btn btn-primary pull-right">View Collision List</a>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" method="post" enctype="multipart/form-data" action="<?php echo site_url('collision/add/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cita_loc" class="control-label">Collision Location</label>
                                    <select class="form-control  m-bot15" name="cita_loc" id="cita_loc">
                                        <option value="" disabled selected value>Select State</option>
                                        <option value="can" <?php echo (get_data('cita_loc')=='can')?'selected':''; ?>>Canadian Collision</option>
                                        <option value="us" <?php echo (get_data('cita_loc')=='us')?'selected':''; ?>>US Collision</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="driver_id" class="control-label">Driver Name</label>
                                    <select class="form-control text-capitalize " data-live-search="true" name="driver_id" id="driver_id" >
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
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="temp_driver" class="control-label">Co. Driver</label>
                                    <select class="form-control text-capitalize " data-live-search="true" name="temp_driver" id="temp_driver" >
                                        <option disabled selected value>select driver name</option>
                                        <?php 
                                            foreach($getDriver as $row)
                                            { 
                                                $selected = (get_data('temp_driver')==$row->id)?'selected':'';
                                              echo "<option  ".$selected."  value='".$row->id."'>".$row->first_name.' '.$row->middle_name.' '.$row->last_name."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="insurrance_info" class="control-label">Insurrance Info</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  name="insurrance_info" id="insurrance_info" <?php echo (get_data('insurrance_info')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group " style="display: none;" id="claim_no">
                                    <label for="claim_no" class="control-label">Claim No</label>
                                    <input class="form-control input-sm" id="claim_no" name="claim_no"  type="text" value="<?php echo get_data('claim_no') ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Truck</label>
                                    <select class="form-control text-capitalize " data-live-search="true" id="truck" name="truck" >
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
                                    <select class="form-control text-capitalize " data-live-search="true" id="trailer_select" name="trailer" >
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
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cargo_cond" class="control-label">Cargo</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="cargo_cond"  name="cargo_cond" <?php echo (get_data('cargo_cond')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cargo_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bill_of_lading" class="control-label">Bill Of Lading</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('bill_of_lading') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('bill_of_lading') != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="bill_of_lading" name="bill_of_lading">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('bill_of_lading')).'/Cargo File'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('bill_of_lading') != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="commercial_inv" class="control-label">Commercial Invoice</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('commercial_inv') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('commercial_inv') != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="commercial_inv" name="commercial_inv">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('commercial_inv')).'/Commercial Invoice'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('commercial_inv') != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="location" class="control-label">Accident Location</label>
                                    <input class="form-control input-sm" id="location" name="location"  type="text"  value="<?php echo get_data('location') ?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="city" class="control-label">City</label>
                                    <input class="form-control input-sm" id="city" name="city" autocomplete="off" type="text" value="<?php echo get_data('city') ?>" />
                                    <div id='back_result'></div>
                                </div>
                            </div>
                            <div class="col-md-3" id="state_div" style="display: none;">
                                
                            </div>
                            <div class="col-md-3" id="us_state_div" style="display: none;">
                                
                            </div>
                            <div class="col-md-3" id="other_state_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="other_state" class="control-label">Other State</label>
                                    <input class=" form-control input-sm" id="other_state" name="other_state"  type="text" value="<?php echo get_data('other_state') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="collision_date" class="control-label">Date</label>
                                    <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('collision_date') ?>" name="collision_date" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="collision_time" class="control-label">Time</label>
                                    <input class=" form-control input-sm" id="collision_time" name="collision_time"  type="text"  value="<?php echo get_data('collision_time') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="panel-heading text-center" style="border-bottom:0px;">
                                    <h4 class="head3">Accident Description</h4>
                            </div>
                            <ol>
                                <div id="sel_acc_des" style="display: none;">
                                    
                                </div>
                            </ol>
                                <div class="container-fluid" id="accident_des_div" style="display: none;">
                                    <div class="table-responsive">   
                                        <table class="table table-bordered text-center" id="accident_des_table">
                                            <input type="hidden" name="accident_des" id="accident_des" value='<?php echo get_data("accident_des")?>'>
                                                    <tbody>
                                                      <tr>
                                                            <td>Claimant First Notice</td>
                                                            <td>Baggage Lost or Damaged</td>
                                                            <td>Baggage Fell</td>
                                                            <td>Backing</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Dumping-Upset</td>
                                                            <td>Forced Off Road</td>
                                                            <td>Hit Animal</td>
                                                            <td>Struck Animal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Struck While Parked</td>
                                                            <td>Struck Overpass</td>
                                                            <td>Struck Object</td>
                                                            <td>Struck Motorist</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Struck Cyclist</td>
                                                            <td>Struck While Parked</td>
                                                            <td>Struck Pedestrian</td>
                                                            <td>Struck Parked Car</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Struck Parked Vehicle</td>
                                                            <td>Lost Control-Struck Guardrail</td>
                                                            <td>Parking Lot Accident</td>
                                                            <td>Improperly Parked</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Backing-Struck Vehicle</td>
                                                            <td>Backing-Struck Object</td>
                                                            <td>Fire</td>
                                                            <td>Fire-Tractor/Vehicle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fire-Trailer</td>
                                                            <td>Hit Object</td>
                                                            <td>Head On Collision</td>
                                                            <td>Mechanical Defect</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Single Vehicle Accident</td>
                                                            <td>Rollover</td>
                                                            <td>Jackknife</td>
                                                            <td>Rear End Collision</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rear-ended by another Vehicle</td>
                                                            <td>Rear end Collision</td>
                                                            <td>Passenger Caught in Door</td>
                                                            <td>Passenger Fell</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Theft</td>
                                                            <td>Theft-Tractor/Vehicle</td>
                                                            <td>Theft-Trailer</td>
                                                            <td>Theft-Tractor & Trailer</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Theft-in Transit</td>
                                                            <td>Theft-Hijacked</td>
                                                            <td>Theft-Terminal</td>
                                                            <td>Railway Accident</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Skid</td>
                                                            <td>Contamination</td>
                                                            <td>Fire</td>
                                                            <td>Sides wipe-Overtaking</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Side wipe-Opposing</td>
                                                            <td>Side wipe-Overtaking or Passing</td>
                                                            <td>Side wipe-Changing Lines</td>
                                                            <td>Side wipe-Opposite Direction</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Intersection Collision Straight Through</td>
                                                            <td>Intersection Collision Right Turn</td>
                                                            <td>Intersection Collision Left Turn</td>
                                                            <td>Intersection through Red Light</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Intersection Right Turn</td>
                                                            <td>Intersection Left Turn</td>
                                                            <td>Entering Highway</td>
                                                            <td>Break in</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vandalism</td>
                                                            <td>Glass Break</td>
                                                            <td>Falling Object/Missile</td>
                                                            <td>Spill</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Freezing</td>
                                                            <td>Contamination</td>
                                                            <td>Improper Loading</td>
                                                            <td>Load Shift- Improper Loading</td>
                                                        <tr>
                                                        </tr>
                                                            <td>Load Shift-Driver Error</td>
                                                            <td>Shortage</td>
                                                            <td>Water Damage-Improper Trapping</td>
                                                            <td>Water Damage-Poor Equipment</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Reefer Malfunction</td>
                                                            <td>Reefer Temperature Not set Properly</td>
                                                            <td>Cargo Refused Due to Temperature Issue</td>
                                                            <td>Spoilage</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Collision Damage</td>
                                                            <td>Load Transfer Damage</td>
                                                            <td>Catastrophe</td>
                                                            <td>Third Party Notice Insufficient Information</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Statement from Driver</td>
                                                            <td>Insufficient Information</td>
                                                            <td>Act of God</td>
                                                            <td>Miscellaneous</td>
                                                      </tr>
                                                    </tbody>
                                        </table>
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="accident_des_btn" class="btn btn-primary multi-button" >Add Accident Description</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group " >
                                    <label for="acci_des_detail" class="control-label">Accident Detail</label>
                                    <textarea class="form-control input-sm" id="acci_des_detail" name="acci_des_detail"><?php echo get_data('acci_des_detail');?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="fatality" class="control-label">Fatality</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="fatality"  name="fatality" <?php echo (get_data('fatality')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group " id="fatality_no_div" style="display: none;">
                                    <label for="fatality_no" class="control-label">Fatality No</label>
                                    <input class=" form-control input-sm" id="fatality_no" name="fatality_no"  type="text"  value="<?php echo get_data('fatality_no') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;padding-bottom: 15px;">
                            <div class="panel-heading text-center" style="border-bottom:0px;">
                                    <h4 class="head3">Injuries Info</h4>
                            </div>
                            <div class="col-md-4" style="display: none;" id="injuriedp_no_div">
                                <div class="form-group">
                                    <label for="injp_no_vehi" class="control-label">Number of Persons In Vehicle</label>
                                    <input class="form-control " id="injp_no_vehi" name="injp_no_vehi" type="text" value="<?php echo get_data('injp_no_vehi') ?>" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" id="injuriedp_no" name="injuriedp_no">
                            <div id="injuriedp_div" style="margin-bottom: 15px;">
                                
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="injuriedp_add" class="btn btn-primary multi-button" >Add Another Injuried Person Details</button>
                                        <button type="button" id="injuriedp_dlt" class="btn btn-primary multi-button" style="display: none;">Delete Injuried Person Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;padding-bottom: 15px;">
                            <div class="panel-heading text-center" style="border-bottom:0px;">
                                    <h4 class="head3">Third Party Info</h4>
                            </div>
                            <input type="hidden" id="thirdp_no" name="thirdp_no">
                            <div id="thirdp_div" style="margin-bottom: 15px;">
                                
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="thirdp_add" class="btn btn-primary multi-button" >Add Third Party Info Details</button>
                                        <button type="button" id="thirdp_dlt" class="btn btn-primary multi-button" style=" display: none;">Delete Third Party Info Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="adjustor_info_div" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 10px;padding-top: 10px;margin-bottom: 15px;display: none;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="adjustor_info" class="control-label">Adjustor Info</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="adjustor_info"  name="adjustor_info" <?php echo (get_data('adjustor_info')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div  id="adjustor_info_dep_div" style="/*border-bottom: 1px solid #FF5C5C;*/padding-bottom: 15px;margin-bottom: 15px; display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_name" class="control-label">Name</label>
                                        <input class="form-control" id="adjustor_name" name="adjustor_name" type="text" value="<?php echo get_data('adjustor_name') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_phone_no" class="control-label">Phone No</label>
                                        <input class="form-control phone_number" id="adjustor_phone_no" name="adjustor_phone_no"  type="text" value="<?php echo get_data('adjustor_phone_no') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_email" class="control-label">Email</label>
                                        <input class="form-control" id="adjustor_email" name="adjustor_email"  type="email" value="<?php echo get_data('adjustor_email') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_fax" class="control-label">Fax No</label>
                                        <input class="form-control phone_number" id="adjustor_fax" name="adjustor_fax"  type="text" value="<?php echo get_data('adjustor_fax') ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="appraisal_info_div" style="padding-bottom: 15px;margin-bottom: 15px;display: none;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="appraisal_info" class="control-label">Appraisal Info</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="appraisal_info"  name="appraisal_info" <?php echo (get_data('appraisal_info')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="appraisal_info_dep_div" style="padding-bottom: 15px;margin-bottom: 15px; display: none;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_name" class="control-label">Name</label>
                                    <input class="form-control" id="appraisal_name" name="appraisal_name" type="text" value="<?php echo get_data('appraisal_name') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_phone_no" class="control-label">Phone No</label>
                                    <input class="form-control phone_number" id="appraisal_phone_no" name="appraisal_phone_no"  type="text" value="<?php echo get_data('appraisal_phone_no') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_email" class="control-label">Email</label>
                                    <input class="form-control" id="appraisal_email" name="appraisal_email"  type="email" value="<?php echo get_data('appraisal_email') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_fax" class="control-label">Fax No</label>
                                    <input class="form-control phone_number" id="appraisal_fax" name="appraisal_fax"  type="text" value="<?php echo get_data('appraisal_fax') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="appraisal_file" class="control-label">Appraisal File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('appraisal_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('appraisal_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="appraisal_file" name="appraisal_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('appraisal_file',true)).'/Appraisal File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('appraisal_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 10px;padding-top: 10px;margin-bottom: 15px;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="towing_info" class="control-label">Towing Company Info</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="towing_info"  name="towing_info" <?php echo (get_data('towing_info')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div id="towing_info_div" style="padding-bottom: 15px;margin-bottom: 15px; display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_company_name" class="control-label">Company Name</label>
                                        <input class="form-control" id="towing_company_name" name="towing_company_name" type="text" value="<?php echo get_data('towing_company_name') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_phone_no" class="control-label">Phone No</label>
                                        <input class="form-control phone_number" id="towing_phone_no" name="towing_phone_no"  type="text" value="<?php echo get_data('towing_phone_no') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_email" class="control-label">Email</label>
                                        <input class="form-control" id="towing_email" name="towing_email"  type="email" value="<?php echo get_data('towing_email') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_fax" class="control-label">Fax No</label>
                                        <input class="form-control phone_number" id="towing_fax" name="towing_fax"  type="text" value="<?php echo get_data('towing_fax') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label for="towing_location" class="control-label">Location</label>
                                        <input class="form-control input-sm" id="towing_location" name="towing_location"  type="text"  value="<?php echo get_data('towing_location') ?>" />
                            
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_city" class="control-label">City</label>
                                        <input class="form-control input-sm" id="towing_city" name="towing_city" autocomplete="off" type="text" value="<?php echo get_data('towing_city') ?>" />
                                        <div id='back_result'></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_state" class="control-label">Other State</label>
                                        <input class=" form-control input-sm" id="towing_state" name="towing_state"  type="text" value="<?php echo get_data('towing_state') ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="towing_bill" class="control-label">Bill</label>
                                        <div class="form-group ">
                                            <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                                <input type="checkbox" id="towing_bill"  name="towing_bill" <?php echo (get_data('towing_bill')=='on')?'checked':''; ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="display: none;" id="towing_bill_file_div">
                                    <div class="form-group">
                                        <label for="towing_bill_file" class="control-label">Bill File</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('towing_bill_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('towing_bill_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="towing_bill_file" name="towing_bill_file">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('towing_bill_file',true)).'/Towing Bill File'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('towing_bill_file',true) != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="police_report" class="control-label">Police Report</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="police_report"  name="police_report" <?php echo (get_data('police_report')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" id="police_report_file_div">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="officer_name_1" class="control-label">Officer #1 Name</label>
                                        <input class="form-control" id="officer_name_1" name="officer_name_1" type="text" value="<?php echo get_data('officer_name_1') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="badge_num_1" class="control-label">Badge Number</label>
                                        <input class="form-control" id="badge_num_1" name="badge_num_1" type="text" value="<?php echo get_data('badge_num_1') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="officer_name_2" class="control-label">Officer #2 Name</label>
                                        <input class="form-control" id="officer_name_2" name="officer_name_2" type="text" value="<?php echo get_data('officer_name_2') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="badge_num_2" class="control-label">Badge Number</label>
                                        <input class="form-control" id="badge_num_2" name="badge_num_2" type="text" value="<?php echo get_data('badge_num_2') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="police_phone_no" class="control-label">Phone No</label>
                                        <input class="form-control phone_number" id="police_phone_no" name="police_phone_no" type="text" value="<?php echo get_data('police_phone_no') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="preport_no" class="control-label">Report No#</label>
                                        <input class="form-control" id="preport_no" name="preport_no" type="text" value="<?php echo get_data('preport_no') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="pincident_no" class="control-label">Incident No#</label>
                                        <input class="form-control" id="pincident_no" name="pincident_no" type="text" value="<?php echo get_data('pincident_no') ?>" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="police_ticket" class="control-label">Citation Issue</label>
                                        <div class="form-group ">
                                            <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                                <input type="checkbox" id="police_ticket"  name="police_ticket" <?php echo (get_data('police_ticket')=='on')?'checked':''; ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group " id="ptissue_whom_div" style="display: none;">
                                        <label for="ptissue_whom" class="control-label">To Whom</label>
                                        <input class="form-control" id="ptissue_whom" name="ptissue_whom" type="text" value="<?php echo get_data('ptissue_whom') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group" id="pcitation_file_div" style="display: none;">
                                        <label for="pcitation_file" class="control-label">Citation File</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('pcitation_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('pcitation_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="pcitation_file" name="pcitation_file">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('pcitation_file',true)).'/Citation File'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('pcitation_file',true) != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="police_charge" class="control-label">Charge</label>
                                        <input class="form-control" id="police_charge" name="police_charge" type="text" value="<?php echo get_data('police_charge') ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label for="police_report_file" class="control-label">Police Report File</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('police_report_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('police_report_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="police_report_file" name="police_report_file">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('police_report_file',true)).'/Police Report'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('police_report_file',true) != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="panel-heading text-center" style="border-bottom:0px;">
                                    <h4 class="head3">Witness Info</h4>
                            </div>
                            <input type="hidden" id="witness_no" name="witness_no">
                            <div id="witness_div" style="margin-bottom: 15px;">
                                
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div style="text-align: center">
                                        <button type="button" id="witness_add" class="btn btn-primary multi-button" >Add Witness Details</button>
                                        <button type="button" id="witness_dlt" class="btn btn-primary" style=" display: none;">Delete Witness Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="is_fault" class="control-label">Fault/Not at Fault</label>
                                    <select class="form-control  m-bot15" name="is_fault" id="is_fault">
                                        <option value="" disabled selected value>Select State</option>
                                        <option value="yes" <?php echo (get_data('is_fault')=='yes')?'selected':''; ?>>Fault</option>
                                        <option value="no" <?php echo (get_data('is_fault')=='no')?'selected':''; ?>>Not at Fault</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="is_prvable" class="control-label">Preventable/Not Preventable</label>
                                    <select class="form-control  m-bot15" name="is_prvable" id="is_prvable">
                                        <option value="" disabled selected value>Select State</option>
                                        <option value="yes" <?php echo (get_data('is_prvable')=='yes')?'selected':''; ?>>Preventable</option>
                                        <option value="no" <?php echo (get_data('is_prvable')=='no')?'selected':''; ?>>Not Preventable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="drug_test_div" style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 15px;margin-bottom: 15px;">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="test_drug" class="control-label">Drug Test</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="test_drug"  name="test_drug" <?php echo (get_data('test_drug')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="test_drug_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label for="test_drug_com" class="control-label">Drug Test Completed Within</label>
                                        <select class="form-control  m-bot15" name="test_drug_com" id="test_drug_com">
                                            <option value="" disabled selected value>Select Hours</option>
                                            <option value="8" <?php echo (get_data('test_drug_com')=='8')?'selected':''; ?>>With In 8 Hours</option>
                                            <option value="32" <?php echo (get_data('test_drug_com')=='32')?'selected':''; ?>>With In 32 Hours</option>
                                            <option value="a_32" <?php echo (get_data('test_drug_com')=='a_32')?'selected':''; ?>>After 32 Hours</option>
                                            <option value="none" <?php echo (get_data('test_drug_com')=='none')?'selected':''; ?>>None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="test_drug_detail" class="control-label">Detail</label>
                                        <input class="form-control" id="test_drug_detail" name="test_drug_detail" type="text" value="<?php echo get_data('test_drug_detail') ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <?php 
                                    $allDefects=array();

                                    function checkboxValue($arr,$val){
                                        if(is_array($arr)){
                                            return (in_array($val, $arr))?'checked':'';
                                        }else{
                                            return '';
                                        }

                                    }
                                    if($id!='' && get_data('update')==''){
                                        
                                        $allVoil=unserialize(get_data('weather_con',false,false));
                                    }else{
                                        
                                        $allVoil = get_data('weather_con');
                                    }

                                ?>
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Weather Conditions</label>
                                    <div class="btn-row">
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-primary <?php echo (checkboxValue($allVoil,'clear') != '')?'active':''; ?>">
                                              <input type="checkbox" id="clear_check" value="clear" name="weather_con[]" <?php echo checkboxValue($allVoil,'clear') ?> >Clear
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'snow') != '')?'active':''; ?>">
                                              <input type="checkbox" id="snow_check" value="snow" name="weather_con[]"  <?php echo checkboxValue($allVoil,'snow') ?>>Snow
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'fog') != '')?'active':''; ?>">
                                              <input type="checkbox" id="fog_check" value="fog" name="weather_con[]" <?php echo checkboxValue($allVoil,'fog') ?>>Fog
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'rain') != '')?'active':''; ?>">
                                              <input type="checkbox" id="rain_check" value="rain" name="weather_con[]" <?php echo checkboxValue($allVoil,'rain') ?>>Rain
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'sleet') != '')?'active':''; ?>">
                                              <input type="checkbox" id="sleet_check" value="sleet" name="weather_con[]" <?php echo checkboxValue($allVoil,'sleet') ?>>Sleet
                                          </label>
                                          <label class="btn btn-primary  <?php echo (checkboxValue($allVoil,'wind') != '')?'active':''; ?>">
                                              <input type="checkbox" id="wind_check" value="wind" name="weather_con[]" <?php echo checkboxValue($allVoil,'wind') ?>>Wind
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="settlement_form" class="control-label">Release Form</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="settlement_form"  name="settlement_form" <?php echo (get_data('settlement_form')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="display: none;" id="settlement_form_file_div">
                                    <label for="settlement_form_file" class="control-label">Release File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('settlement_form_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('settlement_form_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="settlement_form_file" name="settlement_form_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('settlement_form_file',true)).'/Release Form'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('settlement_form_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Statement</label>
                                    <div class="form-group ">
                                    <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" id="statement" name="statement" <?php echo (get_data('statement')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="statement_file" style="display: none;">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('statement_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('statement_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="statement_file" name="statement_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('statement_file',true)).'/Statement File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('statement_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="match_log" class="control-label">Match With Log Book</label>
                                    <div class="form-group ">
                                    <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" id="match_log" name="match_log" <?php echo (get_data('match_log')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="match_log_file_div" style="display: none;">
                                    <label for="cname" class="control-label">Log Book File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('match_log_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('match_log_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="match_log_file" name="match_log_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('match_log_file',true)).'/Log Book'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('match_log_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="repare_at" class="control-label">Repare</label>
                                    <div class="form-group ">
                                    <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" id="repare_at" name="repare_at" <?php echo (get_data('repare_at')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="repare_at_file_div" style="display: none;">
                                    <label for="cname" class="control-label">Repare File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('repare_at_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('repare_at_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="repare_at_file" name="repare_at_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('repare_at_file',true)).'/Reapre File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('repare_at_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 10px;margin-bottom: 15px;">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="training_req" class="control-label">Training Required</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  id="training_req" name="training_req" <?php echo (get_data('training_req')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group" id="training_type_div" style="display:none">
                                    <label for="cname" class="control-label">Training Type</label>
                                    <select class="form-control text-capitalize " data-live-search="true" name="training_type" id="training_type" >
                                        <option disabled selected value>Select Training</option>
                                        <option value="def_driv" <?php echo (get_data('training_type')=='def_driv')?'selected':''; ?> >Defensive Driving</option>
                                        <option value="road_eva" <?php echo (get_data('training_type')=='road_eva')?'selected':''; ?>>Road Evalution</option>
                                        <option value="log_book_train"  <?php echo (get_data('training_type')=='log_book_train')?'selected':''; ?>>Log Book Traning</option>
                                        <option value="Haz_dang" <?php echo (get_data('training_type')=='Haz_dang')?'selected':''; ?>>Hazmat / Dangerous Goods</option>
                                        <option value="wint_drive" <?php echo (get_data('training_type')=='wint_drive')?'selected':''; ?>>Winter Driving</option>
                                        <option value="other" <?php echo (get_data('training_type')=='other')?'selected':''; ?>>other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="training_text_div"  style="display:none">
                                <div class="form-group " >
                                    <label for="train_text" class="control-label">Name</label>
                                    <input class="form-control" id="train_text" name="train_text"  type="text" value="<?php echo get_data('train_text') ?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3" id="training_file_div" style="display:none">
                                <div class="form-group" >
                                    <label for="training_file" class="control-label">Training File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('training_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('training_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="training_file" name="training_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('training_file',true)).'/Training File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('training_file',true) != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-2" style="display: none;" id="training_completed_div">
                                <div class="form-group ">
                                    <label for="training_completed" class="control-label">Training Completed</label>
                                    <div class="form-group ">
                                        <div class="My-switch" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  id="training_completed" name="training_completed" <?php echo (get_data('training_completed')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="train_comp_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="training_date" class="control-label">Date</label>
                                        <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('training_date') ?>" name="training_date" >
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label for="cname" class="control-label">Training Completed File</label>
                                        <div class="controls">
                                            <div class="fileupload <?php if(get_data('train_comp_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('train_comp_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="train_comp_file" name="train_comp_file">
                                                </span>
                                                <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('train_comp_file',true)).'/Training Completed File'?>" id="download-a">
                                                <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('train_comp_file',true) != '')echo "Download"; ?></span>
                                            </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Warning letter</label>
                                    <input class=" form-control input-sm" id="warning_letter" name="warning_letter"  type="text" value="<?php echo get_data('warning_letter') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Warning File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('warning_letter_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('warning_letter_file',true) != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="warning_letter_file" name="warning_letter_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('warning_letter_file',true)).'/Warning Letter'?>" id="download-a">
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
                                    <select class="form-control m-bot15" name="status" >
                                        <option value disabled selected>Select Status</option>
                                        <option value="open" <?php echo (get_data('status')=='open')?'selected':''; ?>>Open</option>
                                        <option value="close" <?php echo (get_data('status')=='close')?'selected':''; ?>>Close</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                            <!-- <form enctype="multipart/form-data" action="" method="post"> -->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="userFiles" class="control-label">Choose Images</label>
                                    <input type="file" class="form-control" id="userFiles" name="userFiles[]" multiple/>
                                </div>   
                            </div>                         <!-- </form> -->
                        </div>
                        <div class="row">
                            <ul class="gallery">
                                <?php if(!empty($files)): foreach($files as $file): ?>
                                <li class="item">
                                    <img src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" alt="" >
                                    <p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p>
                                </li>
                                <?php endforeach;  ?>
                                
                                <?php endif; ?>
                            </ul>
                        </div>
                        
                        <div class="container">
                            <div class="row"> <!-- https://bootsnipp.com/snippets/featured/image-gallery-with-fancybox -->
                                <div class='list-group gallery'>
                                <?php if(!empty(get_data('claim_images'))): ?>
                                    <input type="hidden" id="removedimages" name="removedimages" value="">
                                <?php $images = unserialize(get_data('claim_images')); ?>
                                <?php for($i=0;$i<count($images);$i++): ?>
                                    <div class="col-xs-5" style="width: 175px;height: 175px; ">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo  base_url().'/uploads/files/'.$images[$i]?>">
                                            <img class="img-responsive" alt="" src="<?php echo  base_url().'/uploads/files/'.$images[$i]?>" />
                                            <!-- <div class='text-right'>
                                                <small class='text-muted text-danger' style="color: red">Image Title</small>
                                            </div> --> 
                                        </a>
                                        <span title="Close" value='asda' class="image-close-item image-close span-class" onclick="removeImage('<?php echo  $images[$i]?>')"></span>
                                    </div> 
                                <?php endfor; ?>
                                <?php endif; ?>
                                </div> 
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="remarks" class="control-label">Remarks</label>
                                    <input class=" form-control tagsinput" id="remarks" name="remarks"  type="text" value="<?php echo (get_data('submit') || get_data('update'))?get_data('remarks',false,false):get_date_taginput(get_data('remarks',false,false)) ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                 <?php if($id == ''){
                                     echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>';             
                                  }
                                    else{
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>  -->
<script src="<?php echo base_url(); ?>public/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url();?>public/assets/masked-input/masked-input.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
        $(document).on('focus', ".phone_number", function() {
            $(".phone_number").mask("(999) 999-9999");
        });
});


function removeImage(image){
    //console.log(image);
    var  is_json = true;
    var allimages = [];
    getimage = $("#removedimages").val();


    try {
            JSON.parse(getimage);
            
        } catch (e) {
            
            is_json = false;

        }

    if(is_json == true){
            
            // get_val=JSON.parse(save_val);
            allimages=JSON.parse(getimage);

            allimages.push(image);
            json_value = JSON.stringify(allimages);
            $('#removedimages').val(json_value);
            
            

        }else{
            allimages.push(image);
            json_value = JSON.stringify(allimages);
            $('#removedimages').val(json_value);
        }
        
    // $(this).text('asdas');
    // console.log($.val());

}

$(".span-class").click(function(){
    $(this).closest(".col-xs-5").remove();
});

    function statement_func(value){
        if(value){
        $("#statement_file").fadeIn(200);
        
        }else{
            $("#statement_file").fadeOut(200);

        }
    }

        function training_req_func(value){
            if(value){
                $("#training_type_div").fadeIn(200);
                $("#training_completed_div").fadeIn(200);
                $("#training_file_div").fadeIn(200);
                if($("#training_type").val() == 'other'){
                    $("#training_text_div").fadeIn(200);
                }
                if($("#training_completed").is(":checked") == true){
                    $("#train_comp_div").fadeIn(200);
                }
            }else{
                $("#training_type_div").fadeOut(200);
                $("#training_completed_div").fadeOut(200);
                $("#training_text_div").fadeOut(200);
                $("#training_file_div").fadeOut(200);
                $("#train_comp_div").fadeOut(200);

            }
        }

        function insurrance_info_func(value){
            if(value){
                $("#claim_no").fadeIn(200);
                $("#adjustor_info_div").fadeIn(200);
                $("#appraisal_info_div").fadeIn(200);
            }else{
                $("#claim_no").fadeOut(200);
                $("#adjustor_info_div").fadeOut(200);
                $("#adjustor_info_dep_div").fadeOut(200);
                $("#appraisal_info_div").fadeOut(200);
                $("#appraisal_info_dep_div").fadeOut(200);
            }
        }

        function appraisal_info_func(value){
            if(value){
                $("#appraisal_info_dep_div").fadeIn(200);
            }else{
                $("#appraisal_info_dep_div").fadeOut(200);
            }
        }

        function adjustor_info_func(value){
            if(value){
                $("#adjustor_info_dep_div").fadeIn(200);
            }else{
                $("#adjustor_info_dep_div").fadeOut(200);
            }
        }

        function fatality_func(value){
            if(value){
                $("#fatality_no_div").fadeIn(200);
            }else{
                $("#fatality_no_div").fadeOut(200);
            }
        }

        function cargo_cond_func(value){
            if(value){
                $("#cargo_div").fadeIn(200);
            }else{
                $("#cargo_div").fadeOut(200);
            }
        }

/*        function injuries_func(value){
            if(value){
                $("#injuries_no_div").fadeIn(200);
            }else{
                $("#injuries_no_div").fadeOut(200);
            }
        }*/

        function tp_info_func(value){
            if(value){
                $("#tp_info_div").fadeIn(200);
            }else{
                $("#tp_info_div").fadeOut(200);
            }
        }

        function towing_info_func(value){
            if(value){
                $("#towing_info_div").fadeIn(200);
            }else{
                $("#towing_info_div").fadeOut(200);
            }
        }

        function towing_bill_func(value){
            if(value){
                $("#towing_bill_file_div").fadeIn(200);
            }else{
                $("#towing_bill_file_div").fadeOut(200);
            }
        }

        function police_report_func(value){
            if(value){
                $("#police_report_file_div").fadeIn(200);
            }else{
                $("#police_report_file_div").fadeOut(200);
            }
        }

        function settlement_form_func(value){
            if(value){
                $("#settlement_form_file_div").fadeIn(200);
            }else{
                $("#settlement_form_file_div").fadeOut(200);
            }
        }

        function police_ticket_func(value){
            if(value){
                $("#ptissue_whom_div").fadeIn(200);
                $("#pcitation_file_div").fadeIn(200);
            }else{
                $("#ptissue_whom_div").fadeOut(200);
                $("#pcitation_file_div").fadeOut(200);
            }
        }

        function match_log_func(value){
            if(value){
                $("#match_log_file_div").fadeIn(200);
            }else{
                $("#match_log_file_div").fadeOut(200);
            }
        }

        function repare_at_func(value){
            if(value){
                $("#repare_at_file_div").fadeIn(200);
            }else{
                $("#repare_at_file_div").fadeOut(200);
            }
        }

        function test_drug_func(value){
            if(value){
                $("#test_drug_div").fadeIn(200);
            }else{
                $("#test_drug_div").fadeOut(200);
            }
        }

        function training_completed_func(value){
            if(value){
                $("#train_comp_div").fadeIn(200);
            }else{
                $("#train_comp_div").fadeOut(200);
            }
        }

        function thirdp_company_func(value,num){
            if(value){
                $("#thirdp_hidden_div_"+num).fadeIn(200);
            }else{
                $("#thirdp_hidden_div_"+num).fadeOut(200);
            }
        }

    function ticket_fight_func(value){
        if(value){
        $("#laywer_div").fadeIn(200);
        $("#outcome_div").fadeIn(200);
        }else{
            $("#laywer_div").fadeOut(200);
            $("#outcome_div").fadeOut(200);

        }
    }

    function training_type_func(value){

        if(value == 'other'){
            $("#training_text_div").fadeIn(200);
        }else{
            $("#training_text_div").fadeOut(200);
        }
    }

    function state_func(value){

        if(value == 'other'){
            $("#other_state_div").fadeIn(200);
        }else{
            $("#other_state_div").fadeOut(200);
        }
    }

    function trailerSelect(value){
        if(value == 'other'){
            $("#trailer_div").append('<div class="col-md-2" style="padding-left:0px;"><div class="form-group "><label for="cname" class="control-label">Details</label><input class=" form-control input-sm" id="trailer_detail" name="trailer_detail" minlength="2" type="text"  value="<?php echo get_data('trailer_detail') ?>"/></div></div>');
        }else{
            $("#trailer_div").empty();
            $("#trailer_detail").val(null);
        }
    }

    function com_drug_test(){
        inj = $("#injp_no_vehi").val();
        towing = $("#towing_info").is(":checked");
        ptick =  $("#police_ticket").is(":checked")
        if(inj  != 0 || towing == true || ptick == true){
            $("#drug_test_div").css({ "background-color":"#FF9F9F" });
        }else{
            $("#drug_test_div").css({ "background-color":"#FFF" });
        }
        
    }

    function cita_loc_func(value){
        if(value == 'can'){
            $("#cvor_point_div").fadeIn(200);
            $("#demerit_div").fadeIn(200);
            $("#state_div").fadeIn(200);
            $("#other_state_div").fadeOut(200);
            $("#save_stat_div").fadeOut(200);
            $("#state_div").empty();
            $("#state_div").append('<div class="form-group "> <label for="state" class="control-label">State</label> <select class="form-control" name="state" id="state"> <option value selected disabled>Select State</option> <option value="AB" <?php echo (get_data("state")=="AB")?"selected":""; ?> >Alberta</option> <option value="BC" <?php echo (get_data("state")=="BC")?"selected":""; ?> >British Columbia</option> <option value="MB" <?php echo (get_data("state")=="MB")?"selected":""; ?> >Manitoba</option> <option value="NB" <?php echo (get_data("state")=="NB")?"selected":""; ?> >New Brunswick</option> <option value="NL" <?php echo (get_data("state")=="NL")?"selected":""; ?> >Newfoundland and Labrador</option> <option value="NT" <?php echo (get_data("state")=="NT")?"selected":""; ?> >Northwest Territories</option> <option value="NS" <?php echo (get_data("state")=="NS")?"selected":""; ?> >Nova Scotia</option> <option value="NU" <?php echo (get_data("state")=="NU")?"selected":""; ?> >Nunavut</option> <option value="ON" <?php echo (get_data("state")=="ON")?"selected":""; ?> >Ontario</option> <option value="PE" <?php echo (get_data("state")=="PE")?"selected":""; ?> >Prince Edward Island</option> <option value="QC" <?php echo (get_data("state")=="QC")?"selected":""; ?> >Quebec</option> <option value="SK" <?php echo (get_data("state")=="SK")?"selected":""; ?> >Saskatchewan</option> <option value="YT" <?php echo (get_data("state")=="YT")?"selected":""; ?> >Yukon Territory</option> </select> </div>');
            
            
        }else{
            $("#cvor_point_div").fadeOut(200);
            $("#demerit_div").fadeOut(200);
            $("#state_div").fadeIn(200);
            
            $("#save_stat_div").fadeIn(200);
            $("#state_div").empty();
            $("#state_div").append('<div class="form-group "> <label for="state" class="control-label">State</label> <select class="form-control" name="state" id="state"> <option value selected disabled>Select State</option> <option value="AL" <?php echo (get_data("state")=="AL")?"selected":""; ?> >Alabama</option> <option value="AK" <?php echo (get_data("state")=="AK")?"selected":"";?> > Alaska</option> <option value="AZ" <?php echo (get_data("state")=="AZ")?"selected":"";?> > Arizona</option> <option value="AR" <?php echo (get_data("state")=="AR")?"selected":"";?> > Arkansas</option> <option value="CA" <?php echo (get_data("state")=="CA")?"selected":"";?> > California</option> <option value="CO" <?php echo (get_data("state")=="CO")?"selected":"";?> > Colorado</option> <option value="CT" <?php echo (get_data("state")=="CT")?"selected":"";?> > Connecticut</option> <option value="DE" <?php echo (get_data("state")=="DE")?"selected":"";?> > Delaware</option> <option value="FL" <?php echo (get_data("state")=="FL")?"selected":"";?> > Florida</option> <option value="GA" <?php echo (get_data("state")=="GA")?"selected":"";?> > Georgia</option> <option value="HI" <?php echo (get_data("state")=="HI")?"selected":"";?> > Hawaii</option> <option value="ID" <?php echo (get_data("state")=="ID")?"selected":"";?> > Idaho</option> <option value="IL" <?php echo (get_data("state")=="IL")?"selected":"";?> > Illinois</option> <option value="IN" <?php echo (get_data("state")=="IN")?"selected":"";?> > Indiana</option> <option value="IA" <?php echo (get_data("state")=="IA")?"selected":"";?> > Iowa</option> <option value="KS" <?php echo (get_data("state")=="KS")?"selected":"";?> > Kansas</option> <option value="KY" <?php echo (get_data("state")=="KY")?"selected":"";?> > Kentucky</option> <option value="LA" <?php echo (get_data("state")=="LA")?"selected":"";?> > Louisiana</option> <option value="ME" <?php echo (get_data("state")=="ME")?"selected":"";?> > Maine</option> <option value="MD" <?php echo (get_data("state")=="MD")?"selected":"";?> > Maryland</option> <option value="MA" <?php echo (get_data("state")=="MA")?"selected":"";?> > Massachusetts</option> <option value="MI" <?php echo (get_data("state")=="MI")?"selected":"";?> > Michigan</option> <option value="MN" <?php echo (get_data("state")=="MN")?"selected":"";?> > Minnesota</option> <option value="MS" <?php echo (get_data("state")=="MS")?"selected":"";?> > Mississippi</option> <option value="MO" <?php echo (get_data("state")=="MO")?"selected":"";?> > Missouri</option> <option value="MT" <?php echo (get_data("state")=="MT")?"selected":"";?> > Montana</option> <option value="NE" <?php echo (get_data("state")=="NE")?"selected":"";?> > Nebraska</option> <option value="NV" <?php echo (get_data("state")=="NV")?"selected":"";?> > Nevada Carson</option> <option value="NH" <?php echo (get_data("state")=="NH")?"selected":"";?> > New Hampshire</option> <option value="NJ" <?php echo (get_data("state")=="NJ")?"selected":"";?> > New Jersey</option> <option value="NM" <?php echo (get_data("state")=="NM")?"selected":"";?> > New Mexico</option> <option value="NY" <?php echo (get_data("state")=="NY")?"selected":"";?> > New York</option> <option value="NC" <?php echo (get_data("state")=="NC")?"selected":"";?> > North Carolina</option> <option value="ND" <?php echo (get_data("state")=="ND")?"selected":"";?> > North Dakota</option> <option value="OH" <?php echo (get_data("state")=="OH")?"selected":"";?> > Ohio</option> <option value="OK" <?php echo (get_data("state")=="OK")?"selected":"";?> > Oklahoma</option> <option value="OR" <?php echo (get_data("state")=="OR")?"selected":"";?> > Oregon</option> <option value="PA" <?php echo (get_data("state")=="PA")?"selected":"";?> > Pennsylvania</option> <option value="RI" <?php echo (get_data("state")=="RI")?"selected":"";?> > Rhode Island</option> <option value="SC" <?php echo (get_data("state")=="SC")?"selected":"";?> > South Carolina</option> <option value="SD" <?php echo (get_data("state")=="SD")?"selected":"";?> > South Dakota</option> <option value="TN" <?php echo (get_data("state")=="TN")?"selected":"";?> > Tennessee</option> <option value="TX" <?php echo (get_data("state")=="TX")?"selected":"";?> > Texas</option> <option value="UT" <?php echo (get_data("state")=="UT")?"selected":"";?> > Utah</option> <option value="VT" <?php echo (get_data("state")=="VT")?"selected":"";?> > Vermont</option> <option value="VA" <?php echo (get_data("state")=="VA")?"selected":"";?> > Virginia</option> <option value="WA" <?php echo (get_data("state")=="WA")?"selected":"";?> > Washington</option> <option value="WV" <?php echo (get_data("state")=="WV")?"selected":"";?> > West Virginia</option> <option value="WI" <?php echo (get_data("state")=="WI")?"selected":"";?> > Wisconsin</option> <option value="WY" <?php echo (get_data("state")=="WY")?"selected":"";?> > Wyoming</option> <option value="other" <?php echo (get_data("state")=="other")?"selected":"";?> > Other</option> </select> </div>');
            
        }
    }

    function driver_id_func(value){

         $("#temp_driver option[value='" + value + "']").attr('disabled','disabled').siblings().removeAttr('disabled');
    }
</script>
<script type="text/javascript">

$(document).ready(function(){


    //injuriedp_no
    <?php if(get_data('injuriedp_no') > 0 && get_data('injuriedp_no') != ''): ?>
        $(function(){
            com_drug_test();
            <?php for($count =1; $count<=get_data('injuriedp_no') ; $count++): ?>
                var count = <?php echo $count;?>;


                $("#injuriedp_div").append('<div id="injuriedp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_' + count + '" class="control-label text-center"></label></div></div><div class="col-md-11"><div class="col-md-4"><div class="form-group "> <label for="injuries_name_' + count + '" class="control-label">Injuries Name</label> <input class=" form-control input-sm" id="injuries_name_' + count + '" name="injuries_name_' + count + '" type="text"  value="<?php echo get_data("injuries_name_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="injuries_phone_' + count + '" class="control-label">Injuries Phone</label> <input class=" form-control input-sm phone_number" id="injuries_phone_' + count + '" name="injuries_phone_' + count + '" type="text"  value="<?php echo get_data("injuries_phone_$count") ?>"/></div></div><div class="col-md-4"><div class="form-group "> <label for="injuries_type_' + count + '" class="control-label">Injuries Type</label> <input class=" form-control input-sm" id="injuries_type_' + count + '" name="injuries_type_' + count + '" type="text"  value="<?php echo get_data("injuries_type_$count") ?>"/></div></div></div><div class="clearfix"></div></div>');
                $("#count_injp_" + count  ).text(count);
                if (count >= 1) {
                    $("#injuriedp_dlt").show();
                }
                if (count == 1) {
                    $("#injuriedp_no_div").fadeIn(100);
                }
                $("#injuriedp_no").val(count);
                $(this).attr("disabled", false);

                
            <?php endfor; ?>
        });
    <?php endif; ?>

    //witness_no
    <?php if(get_data('witness_no') > 0 && get_data('witness_no') != ''): ?>
        $(function(){
            
            <?php for($count =1; $count<=get_data('witness_no') ; $count++): ?>
                var count = <?php echo $count;?>;


                $("#witness_div").append('<div id="witness_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_witness_' + count + '" class="control-label"></label></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="witness_type_' + count + '" class="control-label">Select Witness Type</label> <select class="form-control m-bot15" name="witness_type_' + count + '" id="witness_type_' + count + '"><option value="" disabled selected value>Select Type</option><option value="type_pass_veh" <?php echo (get_data("witness_type_$count")=='type_pass_veh')?'selected':''; ?>>Passenger of Other Vehicle</option><option value="type_pass" <?php echo (get_data("witness_type_$count")=='type_pass')?'selected':''; ?>>Passenger</option><option value="type_other" <?php echo (get_data("witness_type_$count")=='type_other')?'selected':''; ?>>Other Driver</option><option value="type_wit" <?php echo (get_data("witness_type_$count")=='type_wit')?'selected':''; ?>>Witness</option> </select></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_name_' + count + '" class="control-label">Name</label> <input class="form-control" id="witness_name_' + count + '" name="witness_name_' + count + '" type="text" value="<?php echo get_data("witness_name_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control phone_number" id="witness_phone_no_' + count + '" name="witness_phone_no_' + count + '" type="text" value="<?php echo get_data("witness_phone_no_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="witness_email_' + count + '" name="witness_email_' + count + '" type="email" value="<?php echo get_data("witness_email_$count") ?>" /></div></div><div class="col-md-6"><div class="form-group "> <label for="witness_address_' + count + '" class="control-label">Address</label> <input class="form-control" id="witness_address_' + count + '" name="witness_address_' + count + '" type="text" value="<?php echo get_data("witness_address_$count") ?>" /></div></div></div></div><div class="clearfix"></div>');
                $("#count_witness_" + count  ).text(count);
                if (count >= 1) {
                    $("#witness_dlt").show();
                }
                $("#witness_no").val(count);
                $(this).attr("disabled", false);


            <?php endfor; ?>
        });
    <?php endif; ?>


    //witness_no
    <?php if(get_data('thirdp_no') > 0 && get_data('thirdp_no') != ''): ?>
        $(function(){
            
            <?php for($count =1; $count<=get_data('thirdp_no') ; $count++): ?>
                var count = <?php echo $count;?>;


                $("#thirdp_div").append('<div id="thirdp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_thirdp_' + count + '" class="control-label"></label></h4></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="tp_driver_name_' + count + '" class="control-label">Driver Name</label> <input class="form-control" id="tp_driver_name_' + count + '" name="tp_driver_name_' + count + '" type="text" value="<?php echo get_data("tp_driver_name_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_license_no_' + count + '" class="control-label">Driver License No</label> <input class="form-control" id="tp_license_no_' + count + '" name="tp_license_no_' + count + '" type="text" value="<?php echo get_data("tp_license_no_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control phone_number" id="tp_phone_no_' + count + '" name="tp_phone_no_' + count + '" type="text" value="<?php echo get_data("tp_phone_no_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_insurrance_name_' + count + '" class="control-label">Insurrance Name</label> <input class="form-control" id="tp_insurrance_name_' + count + '" name="tp_insurrance_name_' + count + '" type="text" value="<?php echo get_data("tp_insurrance_name_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_policy_no_' + count + '" class="control-label">Policy No#</label> <input class="form-control" id="tp_policy_no_' + count + '" name="tp_policy_no_' + count + '" type="text" value="<?php echo get_data("tp_policy_no_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group"> <label for="tp_insurrance_file_' + count + '" class="control-label">Insurrance File</label><div class="controls"><div class="fileupload <?php if(get_data("tp_insurrance_file_$count",true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data("'tp_insurrance_file_$count",true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="tp_insurrance_file_' + count + '" name="tp_insurrance_file_' + count + '"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data("tp_insurrance_file_$count",true)).'/Third Party Insurrance Company'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data("tp_insurrance_file_$count",true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="thirdp_company_' + count + '" class="control-label">Company Detail</label><div class="form-group "><div class="second_switch_' + count + ' switch-square" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="thirdp_company_' + count + '" name="thirdp_company_' + count + '"   <?php echo (get_data("thirdp_company_$count")=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="clearfix"></div><div id="thirdp_hidden_div_' + count + '" style="display: none;"><div class="col-md-3"><div class="form-group "> <label for="tp_company_name_' + count + '" class="control-label">Company Name</label> <input class="form-control" id="tp_company_name_' + count + '" name="tp_company_name_' + count + '" type="text" value="<?php echo get_data("tp_company_name_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_phone_' + count + '" class="control-label">Contact Phone</label> <input class="form-control" id="tp_c_phone_' + count + '" name="tp_c_phone_' + count + '" type="text" value="<?php echo get_data("tp_c_phone_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="tp_email_' + count + '" name="tp_email_' + count + '" type="email" value="<?php echo get_data("tp_email_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_fax_' + count + '" class="control-label">Fax No</label> <input class="form-control phone_number" id="tp_fax_' + count + '" name="tp_fax_' + count + '" type="text" value="<?php echo get_data("tp_fax_$count") ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_person_' + count + '" class="control-label">Contact Person</label> <input class="form-control" id="tp_c_person_' + count + '" name="tp_c_person_' + count + '" type="text" value="<?php echo get_data("tp_c_person_$count") ?>" /></div></div></div></div><div class="clearfix"></div> <br /><div class="clearfix"></div></div>');
                $("#count_thirdp_" + count  ).text(count);
                if (count >= 1) {
                    $("#thirdp_dlt").show();
                }
                $("#thirdp_no").val(count);
                $(this).attr("disabled", false);
                thirdp_company_func( <?php echo (get_data("thirdp_company_$count") == 'on')?'true':'false'?>,<?php echo $count;?>);
                
                $('.second_switch_'+<?php echo $count;?>)['bootstrapSwitch']();
            <?php endfor; ?>
        });
    <?php endif; ?>











    $("#injuriedp_add").click(function() {              com_drug_test();
        $(this).attr("disabled", true);
        var count = $("#injuriedp_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#injuriedp_div").append('<div id="injuriedp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_' + count + '" class="control-label text-center"></label></div></div><div class="col-md-11"><div class="col-md-4"><div class="form-group "> <label for="injuries_name_' + count + '" class="control-label">Injuries Name</label> <input class=" form-control input-sm" id="injuries_name_' + count + '" name="injuries_name_' + count + '" type="text"  value="<?php echo get_data(" injuries_name") ?>"/></div></div><div class="col-md-3"><div class="form-group "> <label for="injuries_phone_' + count + '" class="control-label">Injuries Phone</label> <input class=" form-control input-sm phone_number" id="injuries_phone_' + count + '" name="injuries_phone_' + count + '" type="text"  value="<?php echo get_data(" injuries_phone ") ?>"/></div></div><div class="col-md-4"><div class="form-group "> <label for="injuries_type_' + count + '" class="control-label">Injuries Type</label> <input class=" form-control input-sm" id="injuries_type_' + count + '" name="injuries_type_' + count + '" type="text"  value="<?php echo get_data(" injuries_type ") ?>"/></div></div></div><div class="clearfix"></div></div>');
        $("#count_injp_" + count  ).text(count);
        if (count >= 1) {
            $("#injuriedp_dlt").show();
        }
        if (count == 1) {
            $("#injuriedp_no_div").fadeIn(100);
        }
        $("#injuriedp_no").val(count);
        $(this).attr("disabled", false);
    });
    //Delete Provide your employment history for last 3 to 7 years (if any)
    $("#injuriedp_dlt").click(function() {              com_drug_test();
        $(this).attr("disabled", true);
        $("#injuriedp_add").attr("disabled", true);
        var count = $("#injuriedp_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#injuriedp_count_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#injuriedp_dlt").hide();
            $("#injuriedp_no_div").fadeOut(100);
        }
        $("#injuriedp_no").val(count);
        $(this).attr("disabled", false);
        $("#injuriedp_add").attr("disabled", false);
    });


    $("#witness_add").click(function() {
        $(this).attr("disabled", true);
        var count = $("#witness_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#witness_div").append('<div id="witness_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_witness_' + count + '" class="control-label"></label></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="witness_type_' + count + '" class="control-label">Select Witness Type</label> <select class="form-control m-bot15" name="witness_type_' + count + '" id="witness_type_' + count + '"><option value="" disabled selected value>Select Type</option><option value="type_pass_veh" <?php echo (get_data('witness_type')=='type_pass_veh')?'selected':''; ?>>Passenger of Other Vehicle</option><option value="type_pass" <?php echo (get_data('witness_type')=='type_pass')?'selected':''; ?>>Passenger</option><option value="type_other" <?php echo (get_data('witness_type')=='type_other')?'selected':''; ?>>Other Driver</option><option value="type_wit" <?php echo (get_data('witness_type')=='type_wit')?'selected':''; ?>>Witness</option> </select></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_name_' + count + '" class="control-label">Name</label> <input class="form-control" id="witness_name_' + count + '" name="witness_name_' + count + '" type="text" value="<?php echo get_data('witness_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control phone_number" id="witness_phone_no_' + count + '" name="witness_phone_no_' + count + '" type="text" value="<?php echo get_data('witness_phone_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="witness_email_' + count + '" name="witness_email_' + count + '" type="email" value="<?php echo get_data('witness_email') ?>" /></div></div><div class="col-md-6"><div class="form-group "> <label for="witness_address_' + count + '" class="control-label">Address</label> <input class="form-control" id="witness_address_' + count + '" name="witness_address_' + count + '" type="text" value="<?php echo get_data('witness_address') ?>" /></div></div></div></div><div class="clearfix"></div>');
        $("#count_witness_" + count  ).text(count);
        if (count >= 1) {
            $("#witness_dlt").show();
        }
        $("#witness_no").val(count);
        $(this).attr("disabled", false);
    });
    //Delete Provide your employment history for last 3 to 7 years (if any)
    $("#witness_dlt").click(function() {
        $(this).attr("disabled", true);
        $("#witness_add").attr("disabled", true);
        var count = $("#witness_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#witness_count_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#witness_dlt").hide();
        }
        $("#witness_no").val(count);
        $(this).attr("disabled", false);
        $("#witness_add").attr("disabled", false);
    });



    $("#thirdp_add").click(function() {
        $(this).attr("disabled", true);
        var count = $("#thirdp_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        count = ++count;
        $("#thirdp_div").append('<div id="thirdp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_thirdp_' + count + '" class="control-label"></label></h4></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="tp_driver_name_' + count + '" class="control-label">Driver Name</label> <input class="form-control" id="tp_driver_name_' + count + '" name="tp_driver_name_' + count + '" type="text" value="<?php echo get_data('tp_driver_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_license_no_' + count + '" class="control-label">Driver License No</label> <input class="form-control" id="tp_license_no_' + count + '" name="tp_license_no_' + count + '" type="text" value="<?php echo get_data('tp_license_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control phone_number" id="tp_phone_no_' + count + '" name="tp_phone_no_' + count + '" type="text" value="<?php echo get_data('tp_phone_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_insurrance_name_' + count + '" class="control-label">Insurrance Name</label> <input class="form-control" id="tp_insurrance_name_' + count + '" name="tp_insurrance_name_' + count + '" type="text" value="<?php echo get_data('tp_insurrance_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_policy_no_' + count + '" class="control-label">Policy No#</label> <input class="form-control" id="tp_policy_no_' + count + '" name="tp_policy_no_' + count + '" type="text" value="<?php echo get_data('tp_policy_no') ?>" /></div></div><div class="col-md-3"><div class="form-group"> <label for="tp_insurrance_file_' + count + '" class="control-label">Insurrance File</label><div class="controls"><div class="fileupload <?php if(get_data('tp_insurrance_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'tp_insurrance_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="tp_insurrance_file_' + count + '" name="tp_insurrance_file_' + count + '"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('tp_insurrance_file',true)).'/Third Party Insurrance Company'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('tp_insurrance_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="thirdp_company_' + count + '" class="control-label">Company Detail</label><div class="form-group "><div class="second_switch_' + count + ' switch-square" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="thirdp_company_' + count + '" name="thirdp_company_' + count + '" <?php echo (get_data( 'thirdp_company')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="clearfix"></div><div id="thirdp_hidden_div_' + count + '" style="display: none;"><div class="col-md-3"><div class="form-group "> <label for="tp_company_name_' + count + '" class="control-label">Company Name</label> <input class="form-control" id="tp_company_name_' + count + '" name="tp_company_name_' + count + '" type="text" value="<?php echo get_data('tp_company_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_phone_' + count + '" class="control-label">Contact Phone</label> <input class="form-control" id="tp_c_phone_' + count + '" name="tp_c_phone_' + count + '" type="text" value="<?php echo get_data('tp_c_phone') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="tp_email_' + count + '" name="tp_email_' + count + '" type="email" value="<?php echo get_data('tp_email') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_fax_' + count + '" class="control-label">Fax No</label> <input class="form-control phone_number" id="tp_fax_' + count + '" name="tp_fax_' + count + '" type="text" value="<?php echo get_data('tp_fax') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_person_' + count + '" class="control-label">Contact Person</label> <input class="form-control" id="tp_c_person_' + count + '" name="tp_c_person_' + count + '" type="text" value="<?php echo get_data('tp_c_person') ?>" /></div></div></div></div><div class="clearfix"></div> <br /><div class="clearfix"></div></div>');
        $("#count_thirdp_" + count  ).text(count);
        if (count >= 1) {
            $("#thirdp_dlt").show();
        }
        $("#thirdp_no").val(count);
        $(this).attr("disabled", false);
    });
    //Delete Provide your employment history for last 3 to 7 years (if any)
    $("#thirdp_dlt").click(function() {
        $(this).attr("disabled", true);
        $("#thirdp_add").attr("disabled", true);
        var count = $("#thirdp_no").val();
        if (count === "" || count === null) {
            count = 0;
        }
        $("#thirdp_count_" + count + "").remove();
        count = --count;
        if (count <= 0) {
            $("#thirdp_dlt").hide();
        }
        $("#thirdp_no").val(count);
        $(this).attr("disabled", false);
        $("#thirdp_add").attr("disabled", false);
    });

    <?php if(get_data('trailer') == 'other'): ?>
        trailerSelect('other');
    <?php endif; ?>

<?php 

    if (get_data('statement') == 'on') {

        ?>
            statement_func(true);
        <?php 
    }

        if (get_data('training_req') == 'on') {

            ?>
                training_req_func(true);
            <?php 
        }

        if (get_data('insurrance_info') == 'on') {

            ?>
                insurrance_info_func(true);
            <?php 
        }

        if (get_data('appraisal_info') == 'on') {

            ?>
                appraisal_info_func(true);
            <?php 
        }

        if (get_data('adjustor_info') == 'on') {

            ?>
                adjustor_info_func(true);
            <?php 
        }

        if (get_data('fatality') == 'on') {

            ?>
                fatality_func(true);
            <?php 
        }

        if (get_data('cargo_cond') == 'on') {

            ?>
                cargo_cond_func(true);
            <?php 
        }


        if (get_data('tp_info') == 'on') {

            ?>
                tp_info_func(true);
            <?php 
        }

        if (get_data('towing_info') == 'on') {

            ?>
                towing_info_func(true);
            <?php 
        }

        if (get_data('towing_bill') == 'on') {

            ?>
                towing_bill_func(true);
            <?php 
        }

        if (get_data('police_report') == 'on') {

            ?>
                police_report_func(true);
            <?php 
        }

        if (get_data('settlement_form') == 'on') {

            ?>
                settlement_form_func(true);
            <?php 
        }

        if (get_data('police_ticket') == 'on') {

            ?>
                police_ticket_func(true);
            <?php 
        }

        if (get_data('match_log') == 'on') {

            ?>
                match_log_func(true);
            <?php 
        }

        if (get_data('repare_at') == 'on') {

            ?>
                repare_at_func(true);
            <?php 
        }

        if (get_data('test_drug') == 'on') {

            ?>
                test_drug_func(true);
            <?php 
        }

        if (get_data('training_completed') == 'on') {

            ?>
                training_completed_func(true);
            <?php 
        }

        if (get_data('thirdp_company') == 'on') {

            ?>
                thirdp_company_func(true);
            <?php 
        }

    if (get_data('ticket_fight') == 'on') {

        ?>
            ticket_fight_func(true);
        <?php 
    }

    if (get_data('training_type') == 'other') {

        ?>
            training_type_func('other');
        <?php 
    }

    if (get_data('cita_loc') != '') {

        ?>
            cita_loc_func("<?php echo get_data('cita_loc'); ?>");
        <?php 
    }

    if (get_data('driver_id') != '') {

        ?>
            driver_id_func("<?php echo get_data('driver_id'); ?>");
        <?php 
    }

    if (get_data('state') != '') {

        ?>
            state_func("<?php echo get_data('state'); ?>");
        <?php 
    }

    if(get_data('accident_des') && get_data('accident_des') != '[]'){ ?>

    
        $("#accident_des_div").show();

        // $('#accident_des_btn').text("Delete Accident Description");

        //acci_des_btn();

        var tds = $("#accident_des_table").children('tbody').children('tr').children('td').length;
        // var text = text.replace(/&quot;/g, '\\"');
        var rtext = '<?php echo get_data('accident_des');?>';
        rtext = rtext.replace(/&quot;/g, '\"');
        // console.log(rtext);
        var values = JSON.parse(rtext);
        arr_len = values.length;
        for(var i = 0;  i < arr_len ; i++){
            single_value = values.pop();

                $('#accident_des_table td').each(function() {
                    match_str = $(this).html();

                    if(match_str == single_value){
                        
                        $(this).css({'background-color':'#BDC3C7'});
                    } 

                });
        }
        // acci_des_btn();
        $("#accident_des_div").hide();
        $("#sel_acc_des").show();
        extra_text = '<?php echo get_data('accident_des');?>';
        json_to_list(extra_text.replace(/&quot;/g, '\"'));
    <?php
    
    }


?>


});

    $("#training_req").change(function(){
        training_req_func(this.checked == true);

    });

    $("#insurrance_info").change(function(){
        insurrance_info_func(this.checked == true);
    });

    $("#appraisal_info").change(function(){
        appraisal_info_func(this.checked == true);
    });

    $("#adjustor_info").change(function(){
        adjustor_info_func(this.checked == true);
    });

    $("#fatality").change(function(){
        fatality_func(this.checked == true);
    });

    $("#cargo_cond").change(function(){
        cargo_cond_func(this.checked == true);
    });

/*    $("#injuries").change(function(){
        injuries_func(this.checked == true);
    });*/

    $("#tp_info").change(function(){
        tp_info_func(this.checked == true);
    });

    $("#towing_info").change(function(){
        com_drug_test();
        towing_info_func(this.checked == true);
    });

    $("#towing_bill").change(function(){
        towing_bill_func(this.checked == true);
    });

    $("#police_report").change(function(){
        police_report_func(this.checked == true);
    });

    $("#settlement_form").change(function(){
        settlement_form_func(this.checked == true);
    });

    $("#police_ticket").change(function(){
        com_drug_test();
        police_ticket_func(this.checked == true);
    });

    $("#match_log").change(function(){
        match_log_func(this.checked == true);
    });

    $("#repare_at").change(function(){
        repare_at_func(this.checked == true);
    });

    $("#test_drug").change(function(){
        test_drug_func(this.checked == true);
    });

    $("#training_completed").change(function(){
        training_completed_func(this.checked == true);
    });

    $("#accident_des_btn").click(function(){
        $("#accident_des_div").slideToggle();
        acci_des_btn();
    });

    function acci_des_btn(){
        var text = $('#accident_des_btn').text();

        if(text == "Add Accident Description"){
            text = "Update Accident Description";
            $("#sel_acc_des").fadeOut(200);
        }else{
            text = "Add Accident Description";
            $("#sel_acc_des").fadeIn(200);
        }

        $('#accident_des_btn').text(
            text
        );


    }

         $("#injp_no_vehi").keyup(function(){
            com_drug_test();
         });

        $('#trailer_select').on('change',function(){
            var value = $('#trailer_select').val();
            trailerSelect(value);

    });



$("#statement").change(function(){

    statement_func(this.checked);

});

$("#ticket_fight").change(function(){
    ticket_fight_func(this.checked == true);

});

$('#collision_time').timepicker({
        defaultTime: "<?php echo get_data('collision_time') ?>",
});


$("#training_type").on('change',function(){
        training_type_func($(this).val());

});

$("#cita_loc").on('change',function(){
        cita_loc_func($(this).val());

});

$("#driver_id").on('change',function(){
        driver_id_func($(this).val());

});
// 
$(document).on('click','#state', function(e){

        state_func($(this).val());

});



$(document).ready(function(){
    $('#accident_des_div td').click(function(e) {
        var value = e.target.innerText;
        //$(this).addClass('selected').siblings().removeClass('selected');


        var get_val = [];
        var save_val = $('#accident_des').val();
        var is_json = true;
        var json_value = '';

        try {
                JSON.parse(save_val);
                
            } catch (e) {
                
                is_json = false;

            }

        if(is_json == true){
            
            get_val=JSON.parse(save_val);
            var index =   $.inArray(value, get_val);
            if(index != -1){
                get_val.splice($.inArray(value, get_val),1);
                json_value = JSON.stringify(get_val);
                $('#accident_des').val(json_value);

                $(this).css({'background-color':'#fff'});

            }else{
                get_val.push(value);
                json_value = JSON.stringify(get_val);
                $('#accident_des').val(json_value);
                $(this).css({'background-color':'#BDC3C7'});
            }

        }else{
            get_val.push(value);
            json_value = JSON.stringify(get_val);
            $('#accident_des').val(json_value);
            $(this).css({'background-color':'#BDC3C7'});
        }

        // acci_des_btn();
        json_to_list(json_value);

    });
});


function json_to_list(json_value){
    arr = JSON.parse(json_value);
    json_value2 = $.map(arr , function( a ) {
          return '<li>'+ a +'</li>';
        });
    $("#sel_acc_des").html(json_value2);
}

</script>
<script type="text/javascript">

    $(document).on('change','input[type=checkbox]',function(){
                // console.log();
                if(this.id.slice(0,14) == 'thirdp_company'){
                    arr = this.id.split('_');
                    thirdp_company_func(this.checked == true,arr[arr.length - 1]);
                }
                
    });
        $(document).ready(function(){
            $("#city").keyup(function(){
                var search = $(this).val();
                $.post("<?=base_url().'citation/city_suggestion'?>",{'search':search},function(data){

                    // $("div#back_result").css({'display':'block'});
                    if(data != ''){
                        $("div#back_result").css({
                        display: "block",
                        position: "absolute",
                        top: (this.offsetTop + this.offsetHeight) + "px",
                        left: this.offsetLeft + "px",
                        width:$(".col-md-3").width()
                        });
                        $('div#back_result').html(data);
                    }else{
                        $("div#back_result").css({'display':'none'});
                    }
                    

                });
            });

            $(function() {
                $("body").click(function(e) {
                    if (e.target.id != "back_result" || $(e.target).parents("#back_result").size() ||e.target.id != "city" || $(e.target).parents("#city").size() ) { 
                        $("#back_result").fadeOut(100);
                    }
                    
                });
            });

        });


        $(document).on('click', '.suggesions', function(event) {
            $("#city").val($(this).text());
             $("#back_result").fadeOut(50);
        });
</script>

