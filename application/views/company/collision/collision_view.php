<!-- page start-->
<!-- page start-->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<?php //error_reporting(0); ?>
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
    .disabled{
    background-color: #7D8387;
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

                <h4 class="head3" style="display:inline-block">Collision Detail</h4>

            
                <!-- <a href="<?php echo site_url('collision') ?>" class="btn btn-primary pull-right">View Collision List</a> -->
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" method="post" enctype="multipart/form-data" action="<?php echo site_url('collision/add/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cita_loc" class="control-label">Collision Location</label>
                                    <div class="form-control">
                                         <?php echo (get_data('cita_loc')=='can')?'Canadian Collision':''; ?>
                                         <?php echo (get_data('cita_loc')=='us')?'US Collision':''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="driver_id" class="control-label">Driver Name</label>
                                    <div class="form-control">
                                        <?php echo $driver_name; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="temp_driver" class="control-label">Co. Driver</label>
                                    <div class="form-control">
                                        <?php echo $codriver_name; ?>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="insurrance_info" class="control-label">Insurrance Info</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php echo (get_data('insurrance_info')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group " style="display: none;" id="claim_no">
                                    <label for="claim_no" class="control-label">Claim No</label>

                                    <div class="form-control">
                                        <?php echo get_data('claim_no') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Truck</label>
                                    <div class="form-control">
                                        <?php echo $truck_unit; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Trailer</label>
                                    <div class="form-control">
                                        <?php if(get_data('trailer')=='other'){
                                            echo 'Other';
                                        }else{
                                            echo $trailer_unit;
                                        } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="trailer_div"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cargo_cond" class="control-label">Cargo</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php echo (get_data('cargo_cond')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cargo_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bill_of_lading" class="control-label">Bill Of Lading</label>                       <div class="controls">
                                        <?php if (get_data('bill_of_lading') != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('bill_of_lading')).'/Bill Of Lading'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="commercial_inv" class="control-label">Commercial Invoice</label>
                                        <div class="controls">
                                        <?php if (get_data('commercial_inv') != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('commercial_inv')).'/Commercial Invoice'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="location" class="control-label">Accident Location</label>
                                    <div class="form-control">
                                        <?php echo get_data('location') ?>
                                    </div>                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="city" class="control-label">City</label>
                                    <div class="form-control">
                                        <?php echo get_data('city') ?>
                                    </div>
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
                                    <div class="form-control">
                                        <?php echo get_data('other_state') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="collision_date" class="control-label">Date</label>
                                    <div class="form-control">
                                        <?php echo get_data('collision_date') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="collision_time" class="control-label">Time</label>
                                    <div class="form-control">
                                        <?php echo get_data('collision_time') ?>
                                    </div>
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
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group " >
                                    <label for="acci_des_detail" class="control-label">Accident Detail</label>
                                    <div class="form-control">
                                        <?php echo get_data('acci_des_detail') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="fatality" class="control-label">Fatality</label>
                                    <div class="form-group ">
                                        
                                            <div class="form-control">
                                                    <?php echo (get_data('fatality')=='on')?'Yes':'No'; ?>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group " id="fatality_no_div" style="display: none;">
                                    <label for="fatality_no" class="control-label">Fatality No</label>
                                        <div class="form-control">
                                            <?php echo get_data('fatality_no') ?>
                                        </div> 
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
                                    <div class="form-control">
                                        <?php echo get_data('injp_no_vehi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="hidden" id="injuriedp_no" name="injuriedp_no">
                            <div id="injuriedp_div" style="margin-bottom: 15px;">
                                
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;padding-bottom: 15px;">
                            <div class="panel-heading text-center" style="border-bottom:0px;">
                                    <h4 class="head3">Third Party Info</h4>
                            </div>
                            <input type="hidden" id="thirdp_no" name="thirdp_no">
                            <div id="thirdp_div" style="margin-bottom: 15px;">
                                
                            </div>
                        </div>
                        <div class="row" id="adjustor_info_div" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 10px;padding-top: 10px;margin-bottom: 15px;display: none;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="adjustor_info" class="control-label">Adjustor Info</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                                <?php echo (get_data('adjustor_info')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div  id="adjustor_info_dep_div" style="/*border-bottom: 1px solid #FF5C5C;*/padding-bottom: 15px;margin-bottom: 15px; display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_name" class="control-label">Name</label>
                                        <div class="form-control">
                                            <?php echo get_data('adjustor_name') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_phone_no" class="control-label">Phone No</label>
                                        <div class="form-control">
                                            <?php echo get_data('adjustor_phone_no') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_email" class="control-label">Email</label>
                                        <div class="form-control">
                                            <?php echo get_data('adjustor_email') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="adjustor_fax" class="control-label">Fax No</label>
                                        <div class="form-control">
                                            <?php echo get_data('adjustor_fax') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="appraisal_info_div" style="padding-bottom: 15px;margin-bottom: 15px;display: none;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="appraisal_info" class="control-label">Appraisal Info</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                                <?php echo (get_data('appraisal_info')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="appraisal_info_dep_div" style="padding-bottom: 15px;margin-bottom: 15px; display: none;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_name" class="control-label">Name</label>
                                    <div class="form-control">
                                        <?php echo get_data('appraisal_name') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_phone_no" class="control-label">Phone No</label>
                                    <div class="form-control">
                                        <?php echo get_data('appraisal_phone_no') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_email" class="control-label">Email</label>
                                    <div class="form-control">
                                        <?php echo get_data('appraisal_email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="appraisal_fax" class="control-label">Fax No</label>
                                    <div class="form-control">
                                        <?php echo get_data('appraisal_fax') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="appraisal_file" class="control-label">Appraisal File</label>
                                    <div class="controls">
                                    <?php if (get_data('appraisal_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('appraisal_file',true)).'/Appraisal File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 10px;padding-top: 10px;margin-bottom: 15px;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="towing_info" class="control-label">Towing Company Info</label>
                                    <div class="form-control">
                                            <?php echo (get_data('towing_info')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div id="towing_info_div" style="padding-bottom: 15px;margin-bottom: 15px; display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_company_name" class="control-label">Company Name</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_company_name') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_phone_no" class="control-label">Phone No</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_phone_no') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_email" class="control-label">Email</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_email') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_fax" class="control-label">Fax No</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_fax') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label for="towing_location" class="control-label">Location</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_location') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_city" class="control-label">City</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_city') ?>
                                        </div>
                                        <div id='back_result'></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="towing_state" class="control-label">Other State</label>
                                        <div class="form-control">
                                            <?php echo get_data('towing_state') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="towing_bill" class="control-label">Bill</label>
                                        <div class="form-control">
                                                <?php echo (get_data('towing_bill')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="display: none;" id="towing_bill_file_div">
                                    <div class="form-group">
                                        <label for="towing_bill_file" class="control-label">Bill File</label>
                                        <div class="controls">
                                        <?php if (get_data('towing_bill_file',true) != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('towing_bill_file',true)).'/Bill File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="police_report" class="control-label">Police Report</label>
                                    <div class="form-control">
                                            <?php echo (get_data('police_report')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" id="police_report_file_div">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="officer_name_1" class="control-label">Officer #1 Name</label>
                                        <div class="form-control">
                                            <?php echo get_data('officer_name_1') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="badge_num_1" class="control-label">Badge Number</label>
                                        <div class="form-control">
                                            <?php echo get_data('badge_num_1') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="officer_name_2" class="control-label">Officer #2 Name</label>
                                        <div class="form-control">
                                            <?php echo get_data('officer_name_2') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="badge_num_2" class="control-label">Badge Number</label>
                                        <div class="form-control">
                                            <?php echo get_data('badge_num_2') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="police_phone_no" class="control-label">Phone No</label>
                                        <div class="form-control">
                                            <?php echo get_data('police_phone_no') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="preport_no" class="control-label">Report No#</label>
                                        <div class="form-control">
                                            <?php echo get_data('preport_no') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="pincident_no" class="control-label">Incident No#</label>
                                        <div class="form-control">
                                            <?php echo get_data('pincident_no') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="police_ticket" class="control-label">Citation Issue</label>
                                        <div class="form-control">
                                                <?php echo (get_data('police_ticket')=='on')?'Yes':'No'; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group " id="ptissue_whom_div" style="display: none;">
                                        <label for="ptissue_whom" class="control-label">To Whom</label>
                                        <div class="form-control">
                                            <?php echo get_data('ptissue_whom') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group" id="pcitation_file_div" style="display: none;">
                                        <label for="pcitation_file" class="control-label">Citation File</label>
                                        <div class="controls">
                                        <?php if (get_data('pcitation_file',true) != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('pcitation_file',true)).'/Citation File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="police_charge" class="control-label">Charge</label>
                                        <div class="form-control">
                                            <?php echo get_data('police_charge') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label for="police_report_file" class="control-label">Police Report File</label>
                                        <div class="controls">
                                        <?php if (get_data('police_report_file',true) != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('police_report_file',true)).'/Police Report File'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
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
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="is_fault" class="control-label">Fault/Not at Fault</label>
                                    <div class="form-control">
                                        <?php echo (get_data('is_fault')=='yes')?'Fault':''; ?>
                                        <?php echo (get_data('is_fault')=='no')?'Not at Fault':''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="is_prvable" class="control-label">Preventable/Not Preventable</label>
                                    <div class="form-control">
                                        <?php echo (get_data('is_prvable')=='yes')?'Preventable':''; ?>
                                        <?php echo (get_data('is_prvable')=='no')?'Not Preventable':''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="drug_test_div" style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 15px;margin-bottom: 15px;">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="test_drug" class="control-label">Drug Test</label>
                                    <div class="form-control">
                                            <?php echo (get_data('test_drug')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="test_drug_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label for="test_drug_com" class="control-label">Drug Test Completed Within</label>
                                        <div class="form-control">
                                            <?php echo (get_data('test_drug_com')=='8')?'With In 8 Hours':''; ?>
                                            <?php echo (get_data('test_drug_com')=='32')?'With In 32 Hours':''; ?>
                                            <?php echo (get_data('test_drug_com')=='a_32')?'After 32 Hours':''; ?>
                                            <?php echo (get_data('test_drug_com')=='none')?'None':''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="test_drug_detail" class="control-label">Detail</label>
                                        <div class="form-control">
                                            <?php echo get_data('test_drug_detail') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <?php 
                                    $allDefects=array();

                                    // function checkboxValue($arr,$val){
                                    //     if(is_array($arr)){
                                    //         return (in_array($val, $arr))?'checked':'';
                                    //     }else{
                                    //         return '';
                                    //     }

                                    // }
                                    if($id!='' && get_data('update')==''){
                                        
                                        $allDefects=unserialize(get_data('weather_con',false,false));
                                    }else{
                                        
                                        $allDefects = get_data('weather_con');
                                    }

                                ?>
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Weather Conditions</label>
                                    <div class="btn-row">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-<?php echo (in_array('clear', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('clear', $allDefects))?'checked':''; ?> value="clear" readonly>Clear
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('snow', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('snow', $allDefects))?'checked':''; ?> value="snow" readonly>Snow
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('fog', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('fog', $allDefects))?'checked':''; ?> value="fog">Fog
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('rain', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('rain', $allDefects))?'checked':''; ?> value="rain">Rain
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('sleet', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('sleet', $allDefects))?'checked':''; ?> value="sleet">Sleet
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('wind', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('wind', $allDefects))?'checked':''; ?> value="wind">Wind
                                              </label>
                                            <label class="btn btn-<?php echo (in_array('clear', $allDefects))?'primary active':'basic disabled'; ?> ">
                                                  <input type="checkbox" name="defects[]" <?php echo (in_array('clear', $allDefects))?'checked':''; ?> value="clear">Clear
                                              </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="settlement_form" class="control-label">Release Form</label>
                                    <div class="form-control">
                                            <?php echo (get_data('settlement_form')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="display: none;" id="settlement_form_file_div">
                                    <label for="settlement_form_file" class="control-label">Release File</label>
                                    <div class="controls">
                                    <?php if (get_data('settlement_form_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('settlement_form_file',true)).'/Commercial Invoice'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Statement</label>
                                    <div class="form-control">
                                            <?php echo (get_data('statement')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="statement_file" style="display: none;">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                    <?php if (get_data('statement_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('statement_file',true)).'/Statement File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="match_log" class="control-label">Match With Log Book</label>
                                    <div class="form-control">
                                            <?php echo (get_data('match_log')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="match_log_file_div" style="display: none;">
                                    <label for="cname" class="control-label">Log Book File</label>
                                    <div class="controls">
                                    <?php if (get_data('match_log_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('match_log_file',true)).'/Log Book File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="repare_at" class="control-label">Repare</label>
                                    <div class="form-control">
                                            <?php echo (get_data('repare_at')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="repare_at_file_div" style="display: none;">
                                    <label for="cname" class="control-label">Repare File</label>
                                    <div class="controls">
                                    <?php if (get_data('repare_at_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('repare_at_file',true)).'/Repare File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 10px;margin-bottom: 15px;">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="training_req" class="control-label">Training Required</label>
                                    <div class="form-control">
                                            <?php echo (get_data('training_req')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group" id="training_type_div" style="display:none">
                                    <label for="cname" class="control-label">Training Type</label>
                                    <div class="form-control">
                                        <?php echo (get_data('training_type')=='def_driv')?'Defensive Driving':''; ?>
                                        <?php echo (get_data('training_type')=='road_eva')?'Road Evalution':''; ?>
                                        <?php echo (get_data('training_type')=='log_book_train')?'Log Book Traning':''; ?>
                                        <?php echo (get_data('training_type')=='Haz_dang')?'Hazmat / Dangerous Goods':''; ?>
                                        <?php echo (get_data('training_type')=='wint_drive')?'Winter Driving':''; ?>
                                        <?php echo (get_data('training_type')=='other')?'other':''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="training_text_div"  style="display:none">
                                <div class="form-group " >
                                    <label for="train_text" class="control-label">Name</label>
                                    <div class="form-control">
                                        <?php echo get_data('train_text') ?>
                                    </div>                        
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3" id="training_file_div" style="display:none">
                                <div class="form-group" >
                                    <label for="training_file" class="control-label">Training File</label>
                                    <div class="controls">
                                    <?php if (get_data('training_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('training_file',true)).'/Training File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-2" style="display: none;" id="training_completed_div">
                                <div class="form-group ">
                                    <label for="training_completed" class="control-label">Training Completed</label>
                                    <div class="form-control">
                                            <?php echo (get_data('training_completed')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="train_comp_div" style="display: none;">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="training_date" class="control-label">Date</label>
                                        <div class="form-control">
                                            <?php echo get_data('training_date') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label for="cname" class="control-label">Training Completed File</label>
                                        <div class="controls">
                                        <?php if (get_data('train_comp_file',true) != ''): ?>
                                            <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                            <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('train_comp_file',true)).'/Commercial Invoice'?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                            </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-control" readonly>
                                                <p><i>No Documents</i></p>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Warning letter</label>
                                    <div class="form-control">
                                        <?php echo get_data('warning_letter') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Warning File</label>
                                    <div class="controls">
                                    <?php if (get_data('warning_letter_file',true) != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('warning_letter_file',true)).'/Warning File'?>" id="download-a">
                                        <span class="fileupload-preview" style="margin-left:5px;">Download</span>
                                        </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-control" readonly>
                                            <p><i>No Documents</i></p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Status</label>
                                    <div class="form-control">
                                        <?php echo (get_data('status')=='open')?'Open':''; ?>
                                        <?php echo (get_data('status')=='close')?'Close':''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                            <!-- <form enctype="multipart/form-data" action="" method="post"> -->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="userFiles" class="control-label">Collision Images</label>
                                </div>   
                            </div>                         <!-- </form> -->
                        </div>
                        <div class="container">
                            <div class="row"> <!-- https://bootsnipp.com/snippets/featured/image-gallery-with-fancybox -->
                                <div class='list-group gallery'>
                                <?php if(!empty(get_data('claim_images'))): ?>
                                    <input type="hidden" id="removedimages" name="removedimages" value="">
                                <?php $images = unserialize(get_data('claim_images',false,false)); ?>
                                <?php for($i=0;$i<count($images);$i++): ?>
                                    <div class="col-xs-5" style="width: 175px;height: 175px; ">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo  base_url().'/uploads/files/'.$images[$i]?>">
                                            <img class="img-responsive" alt="" src="<?php echo  base_url().'/uploads/files/'.$images[$i]?>" />
                                        </a>
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
                                    <div class="form-control" style="height: 100%;min-height:34px;">
                                        <?php 

                                          $remarks =  explode(',', get_date_taginput(get_data('remarks',false,false)));
                                          echo "<ul>";
                                          foreach ($remarks as $remark) {
                                              echo "<li>$remark</li>";
                                          }
                                          echo "</ul>";
                                        ?>
                                    </div>
                                </div>
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

<script type="text/javascript">

$(".span-class").click(function(){
    $(this).closest(".col-xs-5").remove();
});

<?php
 $currentLink = $this->uri->segment(2); 
 $controller = $this->uri->segment(1); 

 if($controller != 'driver' && $currentLink != 'view'){ ?>
    $(".btn").click(function() { return false; });
<?php } ?>
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
            $("#state_div").append('<div class="form-group "> <label for="state" class="control-label">State</label><div class="form-control"> <?php echo (get_data( "state")=="AB" )? "Alberta": ""; ?> <?php echo (get_data( "state")=="BC" )? "British Columbia": ""; ?> <?php echo (get_data( "state")=="MB" )? "Manitoba": ""; ?> <?php echo (get_data( "state")=="NB" )? "New Brunswick": ""; ?> <?php echo (get_data( "state")=="NL" )? "Newfoundland and Labrador": ""; ?> <?php echo (get_data( "state")=="NT" )? "Northwest Territories": ""; ?> <?php echo (get_data( "state")=="NS" )? "Nova Scotia": ""; ?> <?php echo (get_data( "state")=="NU" )? "Nunavut": ""; ?> <?php echo (get_data( "state")=="ON" )? "Ontario": ""; ?> <?php echo (get_data( "state")=="PE" )? "Prince Edward Island": ""; ?> <?php echo (get_data( "state")=="QC" )? "Quebec": ""; ?> <?php echo (get_data( "state")=="SK" )? "Saskatchewan": ""; ?> <?php echo (get_data( "state")=="YT" )? "Yukon Territory": ""; ?></div></div>');
            
            
        }else{
            $("#cvor_point_div").fadeOut(200);
            $("#demerit_div").fadeOut(200);
            $("#state_div").fadeIn(200);
            
            $("#save_stat_div").fadeIn(200);
            $("#state_div").empty();
            $("#state_div").append('<div class="form-group "> <label for="state" class="control-label">State</label><div class="form-control"> <?php echo (get_data( "state")=="AL" )? "Alabama": ""; ?> <?php echo (get_data( "state")=="AK" )? "Alaska": "";?> <?php echo (get_data( "state")=="AZ" )? "Arizona": "";?> <?php echo (get_data( "state")=="AR" )? "Arkansas": "";?> <?php echo (get_data( "state")=="CA" )? "California": "";?> <?php echo (get_data( "state")=="CO" )? "Colorado": "";?> <?php echo (get_data( "state")=="CT" )? "Connecticut": "";?> <?php echo (get_data( "state")=="DE" )? "Delaware": "";?> <?php echo (get_data( "state")=="FL" )? "Florida": "";?> <?php echo (get_data( "state")=="GA" )? "Georgia": "";?> <?php echo (get_data( "state")=="HI" )? "Hawaii": "";?> <?php echo (get_data( "state")=="ID" )? "Idaho": "";?> <?php echo (get_data( "state")=="IL" )? "Illinois": "";?> <?php echo (get_data( "state")=="IN" )? "Indiana": "";?> <?php echo (get_data( "state")=="IA" )? "Iowa": "";?> <?php echo (get_data( "state")=="KS" )? "Kansas": "";?> <?php echo (get_data( "state")=="KY" )? "Kentucky": "";?> <?php echo (get_data( "state")=="LA" )? "Louisiana": "";?> <?php echo (get_data( "state")=="ME" )? "Maine": "";?> <?php echo (get_data( "state")=="MD" )? "Maryland": "";?> <?php echo (get_data( "state")=="MA" )? "Massachusetts": "";?> <?php echo (get_data( "state")=="MI" )? "Michigan": "";?> <?php echo (get_data( "state")=="MN" )? "Minnesota": "";?> <?php echo (get_data( "state")=="MS" )? "Mississippi": "";?> <?php echo (get_data( "state")=="MO" )? "Missouri": "";?> <?php echo (get_data( "state")=="MT" )? "Montana": "";?> <?php echo (get_data( "state")=="NE" )? "Nebraska": "";?> <?php echo (get_data( "state")=="NV" )? "Nevada Carson": "";?> <?php echo (get_data( "state")=="NH" )? "New Hampshire": "";?> <?php echo (get_data( "state")=="NJ" )? "New Jersey": "";?> <?php echo (get_data( "state")=="NM" )? "New Mexico": "";?> <?php echo (get_data( "state")=="NY" )? "New York": "";?> <?php echo (get_data( "state")=="NC" )? "North Carolina": "";?> <?php echo (get_data( "state")=="ND" )? "North Dakota": "";?> <?php echo (get_data( "state")=="OH" )? "Ohio": "";?> <?php echo (get_data( "state")=="OK" )? "Oklahoma": "";?> <?php echo (get_data( "state")=="OR" )? "Oregon": "";?> <?php echo (get_data( "state")=="PA" )? "Pennsylvania": "";?> <?php echo (get_data( "state")=="RI" )? "Rhode Island": "";?> <?php echo (get_data( "state")=="SC" )? "South Carolina": "";?> <?php echo (get_data( "state")=="SD" )? "South Dakota": "";?> <?php echo (get_data( "state")=="TN" )? "Tennessee": "";?> <?php echo (get_data( "state")=="TX" )? "Texas": "";?> <?php echo (get_data( "state")=="UT" )? "Utah": "";?> <?php echo (get_data( "state")=="VT" )? "Vermont": "";?> <?php echo (get_data( "state")=="VA" )? "Virginia": "";?> <?php echo (get_data( "state")=="WA" )? "Washington": "";?> <?php echo (get_data( "state")=="WV" )? "West Virginia": "";?> <?php echo (get_data( "state")=="WI" )? "Wisconsin": "";?> <?php echo (get_data( "state")=="WY" )? "Wyoming": "";?> <?php echo (get_data( "state")=="other" )? "Other": "";?></div></div>');
            
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


                $("#injuriedp_div").append('<div id="injuriedp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_injp_' + count + '" class="control-label text-center"></label></h4></div></div><div class="col-md-11"><div class="col-md-4"><div class="form-group "> <label for="injuries_name_' + count + '" class="control-label">Injuries Name</label><div class="form-control"> <?php echo get_data("injuries_name_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="injuries_phone_' + count + '" class="control-label">Injuries Phone</label><div class="form-control"> <?php echo get_data("injuries_phone_$count") ?></div></div></div><div class="col-md-4"><div class="form-group "> <label for="injuries_type_' + count + '" class="control-label">Injuries Type</label><div class="form-control"> <?php echo get_data("injuries_type_$count") ?></div></div></div></div><div class="clearfix"></div></div>');
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


                $("#witness_div").append('<div id="witness_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_witness_' + count + '" class="control-label"></label></h4></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="witness_type_' + count + '" class="control-label">Select Witness Type</label><div class="form-control"> <?php echo (get_data( "witness_type_$count")=='type_pass_veh' )? 'Passenger of Other Vehicle': ''; ?> <?php echo (get_data( "witness_type_$count")=='type_pass' )? 'Passenger': ''; ?> <?php echo (get_data( "witness_type_$count")=='type_other' )? 'Other Driver': ''; ?> <?php echo (get_data( "witness_type_$count")=='type_wit' )? 'Witness': ''; ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_name_' + count + '" class="control-label">Name</label><div class="form-control"> <?php echo get_data("witness_name_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_phone_no_' + count + '" class="control-label">Phone No</label><div class="form-control"> <?php echo get_data("witness_phone_no_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_email_' + count + '" class="control-label">Email</label><div class="form-control"> <?php echo get_data("witness_email_$count") ?></div></div></div><div class="col-md-6"><div class="form-group "> <label for="witness_address_' + count + '" class="control-label">Address</label><div class="form-control"> <?php echo get_data("witness_address_$count") ?></div></div></div></div></div><div class="clearfix"></div>');
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


                $("#thirdp_div").append('<div id="thirdp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_thirdp_' + count + '" class="control-label"></label></h4></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="tp_driver_name_' + count + '" class="control-label">Driver Name</label><div class="form-control"> <?php echo get_data("tp_driver_name_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_license_no_' + count + '" class="control-label">Driver License No</label><div class="form-control"> <?php echo get_data("tp_license_no_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_phone_no_' + count + '" class="control-label">Phone No</label><div class="form-control"> <?php echo get_data("tp_phone_no_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_insurrance_name_' + count + '" class="control-label">Insurrance Name</label><div class="form-control"> <?php echo get_data("tp_insurrance_name_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_policy_no_' + count + '" class="control-label">Policy No#</label><div class="form-control"> <?php echo get_data("tp_policy_no_$count") ?></div></div></div><div class="col-md-3"><div class="form-group"> <label for="tp_insurrance_file_' + count + '" class="control-label">Insurrance File</label><div class="controls"> <?php if (get_data("tp_insurrance_file_$count",true) != ""): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url("collision/file_download")."/".basename(get_data("tp_insurrance_file_$count",true))."/Insurrance File"?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;">Download</span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="thirdp_company_' + count + '" class="control-label">Company Detail</label><div class="form-control"> <?php echo (get_data("thirdp_company_$count")=="on")?"Yes":"No"; ?></div></div></div><div class="clearfix"></div><div id="thirdp_hidden_div_' + count + '" style="display: none;"><div class="col-md-3"><div class="form-group "> <label for="tp_company_name_' + count + '" class="control-label">Company Name</label><div class="form-control"> <?php echo get_data("tp_company_name_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_phone_' + count + '" class="control-label">Contact Phone</label><div class="form-control"> <?php echo get_data("tp_c_phone_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_email_' + count + '" class="control-label">Email</label><div class="form-control"> <?php echo get_data("tp_email_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_fax_' + count + '" class="control-label">Fax No</label><div class="form-control"> <?php echo get_data("tp_fax_$count") ?></div></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_person_' + count + '" class="control-label">Contact Person</label><div class="form-control"> <?php echo get_data("tp_c_person_$count") ?></div></div></div></div></div><div class="clearfix"></div> <br /><div class="clearfix"></div></div>');
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
        $("#injuriedp_div").append('<div id="injuriedp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_' + count + '" class="control-label text-center"></label></div></div><div class="col-md-11"><div class="col-md-4"><div class="form-group "> <label for="injuries_name_' + count + '" class="control-label">Injuries Name</label> <input class=" form-control input-sm" id="injuries_name_' + count + '" name="injuries_name_' + count + '" type="text"  value="<?php echo get_data(" injuries_name") ?>"/></div></div><div class="col-md-3"><div class="form-group "> <label for="injuries_phone_' + count + '" class="control-label">Injuries Phone</label> <input class=" form-control input-sm" id="injuries_phone_' + count + '" name="injuries_phone_' + count + '" type="text"  value="<?php echo get_data(" injuries_phone ") ?>"/></div></div><div class="col-md-4"><div class="form-group "> <label for="injuries_type_' + count + '" class="control-label">Injuries Type</label> <input class=" form-control input-sm" id="injuries_type_' + count + '" name="injuries_type_' + count + '" type="text"  value="<?php echo get_data(" injuries_type ") ?>"/></div></div></div><div class="clearfix"></div></div>');
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
        $("#witness_div").append('<div id="witness_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_witness_' + count + '" class="control-label"></label></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="witness_type_' + count + '" class="control-label">Select Witness Type</label> <select class="form-control m-bot15" name="witness_type_' + count + '" id="witness_type_' + count + '"><option value="" disabled selected value>Select Type</option><option value="type_pass_veh" <?php echo (get_data('witness_type')=='type_pass_veh')?'selected':''; ?>>Passenger of Other Vehicle</option><option value="type_pass" <?php echo (get_data('witness_type')=='type_pass')?'selected':''; ?>>Passenger</option><option value="type_other" <?php echo (get_data('witness_type')=='type_other')?'selected':''; ?>>Other Driver</option><option value="type_wit" <?php echo (get_data('witness_type')=='type_wit')?'selected':''; ?>>Witness</option> </select></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_name_' + count + '" class="control-label">Name</label> <input class="form-control" id="witness_name_' + count + '" name="witness_name_' + count + '" type="text" value="<?php echo get_data('witness_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control" id="witness_phone_no_' + count + '" name="witness_phone_no_' + count + '" type="text" value="<?php echo get_data('witness_phone_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="witness_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="witness_email_' + count + '" name="witness_email_' + count + '" type="email" value="<?php echo get_data('witness_email') ?>" /></div></div><div class="col-md-6"><div class="form-group "> <label for="witness_address_' + count + '" class="control-label">Address</label> <input class="form-control" id="witness_address_' + count + '" name="witness_address_' + count + '" type="text" value="<?php echo get_data('witness_address') ?>" /></div></div></div></div><div class="clearfix"></div>');
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
        $("#thirdp_div").append('<div id="thirdp_count_' + count + '"><div class="col-xs-1" style="width:10px;"><div class="form-group "><h4><label id="count_thirdp_' + count + '" class="control-label"></label></h4></div></div><div class="col-md-11"><div class="col-md-3"><div class="form-group "> <label for="tp_driver_name_' + count + '" class="control-label">Driver Name</label> <input class="form-control" id="tp_driver_name_' + count + '" name="tp_driver_name_' + count + '" type="text" value="<?php echo get_data('tp_driver_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_license_no_' + count + '" class="control-label">Driver License No</label> <input class="form-control" id="tp_license_no_' + count + '" name="tp_license_no_' + count + '" type="text" value="<?php echo get_data('tp_license_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_phone_no_' + count + '" class="control-label">Phone No</label> <input class="form-control" id="tp_phone_no_' + count + '" name="tp_phone_no_' + count + '" type="text" value="<?php echo get_data('tp_phone_no') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_insurrance_name_' + count + '" class="control-label">Insurrance Name</label> <input class="form-control" id="tp_insurrance_name_' + count + '" name="tp_insurrance_name_' + count + '" type="text" value="<?php echo get_data('tp_insurrance_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_policy_no_' + count + '" class="control-label">Policy No#</label> <input class="form-control" id="tp_policy_no_' + count + '" name="tp_policy_no_' + count + '" type="text" value="<?php echo get_data('tp_policy_no') ?>" /></div></div><div class="col-md-3"><div class="form-group"> <label for="tp_insurrance_file_' + count + '" class="control-label">Insurrance File</label><div class="controls"><div class="fileupload <?php if(get_data('tp_insurrance_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'tp_insurrance_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="tp_insurrance_file_' + count + '" name="tp_insurrance_file_' + count + '"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('collision/file_download').'/'.basename(get_data('tp_insurrance_file',true)).'/Third Party Insurrance Company'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('tp_insurrance_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="thirdp_company_' + count + '" class="control-label">Company Detail</label><div class="form-group "><div class="second_switch_' + count + ' switch-square" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="thirdp_company_' + count + '" name="thirdp_company_' + count + '" <?php echo (get_data( 'thirdp_company')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="clearfix"></div><div id="thirdp_hidden_div_' + count + '" style="display: none;"><div class="col-md-3"><div class="form-group "> <label for="tp_company_name_' + count + '" class="control-label">Company Name</label> <input class="form-control" id="tp_company_name_' + count + '" name="tp_company_name_' + count + '" type="text" value="<?php echo get_data('tp_company_name') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_phone_' + count + '" class="control-label">Contact Phone</label> <input class="form-control" id="tp_c_phone_' + count + '" name="tp_c_phone_' + count + '" type="text" value="<?php echo get_data('tp_c_phone') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_email_' + count + '" class="control-label">Email</label> <input class="form-control" id="tp_email_' + count + '" name="tp_email_' + count + '" type="email" value="<?php echo get_data('tp_email') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_fax_' + count + '" class="control-label">Fax No</label> <input class="form-control" id="tp_fax_' + count + '" name="tp_fax_' + count + '" type="text" value="<?php echo get_data('tp_fax') ?>" /></div></div><div class="col-md-3"><div class="form-group "> <label for="tp_c_person_' + count + '" class="control-label">Contact Person</label> <input class="form-control" id="tp_c_person_' + count + '" name="tp_c_person_' + count + '" type="text" value="<?php echo get_data('tp_c_person') ?>" /></div></div></div></div><div class="clearfix"></div> <br /><div class="clearfix"></div></div>');
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
                    thirdp_company_func(this.checked == true,this.id.slice(-1));
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

