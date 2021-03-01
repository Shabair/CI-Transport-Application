<!-- page start-->
<?php isset($inspection_detail['id'])? $id=$inspection_detail['id']:  $id='';  ?>


<style type="text/css">
    
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    background-color: #FF5C5C;
    border-color: #39b2a9;
    color: #FFFFFF;

}
.disabled{
    background-color: #7D8387;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">

            <h4 class="head3" style="display:inline-block"><?php echo $driver_name ?> &nbsp;Inspection</h4>
            
                <!-- <a href="<?php echo site_url('inspection') ?>" class="btn btn-primary pull-right">View Inspection List</a> -->
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('inspection/add/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Driver Name</label>
                                    <div class="form-control">
                                    <?php echo $driver_name ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Defects</label>
                                    <div class="btn-row">
                                        <div class="btn-group" data-toggle="buttons">
                                        <?php 
                                            $allDefects=unserialize($inspection_detail['defects']);

                                        ?>
                                          <label class="btn btn-<?php echo (in_array('driver', $allDefects))?'primary active':'basic disabled'; ?> ">
                                              <input type="checkbox" name="defects[]" <?php echo (in_array('driver', $allDefects))?'checked':''; ?> value="driver">Driver
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('truck', $allDefects))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" name="defects[]" value="truck" <?php echo (in_array('truck', $allDefects))?'checked':''; ?>>Truck
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('trailer', $allDefects))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" name="defects[]" value="trailer" <?php echo (in_array('trailer', $allDefects))?'checked':''; ?>>Trailer
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('other', $allDefects))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" id="defects_check" name="defects[]" value="other" <?php echo (in_array('other', $allDefects))?'checked':''; ?>>Other
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
                                        <?php 
                                            $allVoil=unserialize($inspection_detail['type_of_voil']);

                                        ?>
                                          <label class="btn btn-<?php echo (in_array('maintinance', $allVoil))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" id="maintinance_check" value="maintinance" name="type_of_voil[]" <?php echo (in_array('maintinance', $allVoil))?'checked':''; ?>>Maintinance
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('hos', $allVoil))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" id="hos_check" value="hos" name="type_of_voil[]" <?php echo (in_array('hos', $allVoil))?'checked':''; ?>>Hour Of Service
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('unsafe', $allVoil))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" id="unsafe_check" value="unsafe" name="type_of_voil[]" <?php echo (in_array('unsafe', $allVoil))?'checked':''; ?>>Unsafe
                                          </label>
                                          <label class="btn btn-<?php echo (in_array('CTPAT', $allVoil))?'primary active':'basic disabled'; ?>">
                                              <input type="checkbox" id="CTPAT_check" value="CTPAT" name="type_of_voil[]" <?php echo (in_array('CTPAT', $allVoil))?'checked':''; ?>>CTPAT
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
                                    <div class="form-control">
                                    <?php if($inspection_detail['Insp_loc']=='can') echo 'Canadian'; ?>
                                    <?php if($inspection_detail['Insp_loc']=='us') echo 'US'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Level</label>
                                    <div class="form-control">
                                    <?php if($inspection_detail['level']=='1') echo 'Level 1'; ?>
                                    <?php if($inspection_detail['level']=='2') echo 'Level 2'; ?>
                                    <?php if($inspection_detail['level']=='3') echo 'Level 3'; ?>
                                    <?php if($inspection_detail['level']=='warning') echo 'Warning'; ?>
                                    <?php if($inspection_detail['level']=='other') echo 'Other'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cname" class="control-label">Date</label>
                                <div class="form-control">
                                <?php echo $inspection_detail['insp_date']; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Time</label>
                                    <div class="form-control">
                                        <?php echo $inspection_detail['time_insp']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Location</label>
                                    <div class="form-control">
                                        <?php echo $inspection_detail['location']; ?>
                                    </div>
                                </div>
                            </div>
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
                                        <?php if($inspection_detail['trailer']=='other'){
                                            echo 'Other';
                                        }else{
                                            echo $trailer_unit;
                                        } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="trailer_div"></div>
                        </div>
                        <div class="row" >      

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Warning letter</label>
                                    <div class="form-control">
                                        <?php echo $inspection_detail['warning_letter']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Warning Letter</label>
                                    <div class="controls">
                                    <?php if(!empty($inspection_detail['warning_letter_file'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('inspection/file_download').'/'.basename($inspection_detail['warning_letter_file']).'/'.$driver_name;?>" id="download-a">
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
                                    <label for="cname" class="control-label">Status</label>
                                    <div class="form-control">
                                    <?php if($inspection_detail['status']=='pending') echo 'Pending'; ?>
                                    <?php if($inspection_detail['status']=='filed') echo 'Filed'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Repair Bill</label>
                                    <div class="form-group " >
                                    
                                        <div class="form-control">
                                            <?php 
                                                    if($inspection_detail['repair_bill']=='on'){ echo 'Yes'; }
                                                    else{echo 'No';}
                                            ?>
                                    
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div id="repair_bill_box"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Repair Bill Fill</label>
                                    <div class="controls">
                                    <?php if(!empty($inspection_detail['repair_bill_file'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('inspection/file_download').'/'.basename($inspection_detail['repair_bill_file']).'/'.$driver_name;?>" id="download-a">
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
                                    <div class="form-group " >
                                    
                                        <div class="form-control">
                                            <?php 
                                                    if($inspection_detail['statement']=='on'){ echo 'Yes'; }
                                                    else{echo 'No';}
                                            ?>
                                    
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                    <?php if(!empty($inspection_detail['statement_file'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('inspection/file_download').'/'.basename($inspection_detail['statement_file']).'/'.$driver_name;?>" id="download-a">
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
                        <div class="row" style="border-bottom: 1px solid #eff2f7;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Out Of Service</label>
                                    <div class="form-group " >
                                    
                                        <div class="form-control">
                                            <?php 
                                                    if($inspection_detail['out_of_service']=='on'){ echo 'Yes'; }
                                                    else{echo 'No';}
                                            ?>
                                    
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Match With Log Book</label>
                                    <div class="form-group " >
                                    
                                        <div class="form-control">
                                            <?php 
                                                    if($inspection_detail['match_logbook']=='on'){ echo 'Yes'; }
                                                    else{echo 'No';}
                                            ?>
                                    
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Remarks</label>
                                    
                                    <div class="form-control" style="height: 100%;min-height:34px;">
                                        <?php 

                                          $remarks =  explode(',', $inspection_detail['remarks']);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script> 
<script src="<?php echo base_url(); ?>public/js/bootstrap-timepicker.js"></script>

<script type="text/javascript">

    function defectCheck(value){
        if(value== true){
        $("#other_div").append('<div class="col-md-6"><div class="form-group "><label for="cname" class="control-label">Detail of Vehicul</label><input class=" form-control input-sm" id="other_detail" name="other_detail" minlength="2" type="text" required value="<?php echo isset($inspection_detail['other_detail'])?$inspection_detail['other_detail']: '';  ?>"/></div></div>');
        }else{
            $("#other_div").empty();
        }
    }

    function trailerSelect(value){
        if(value == 'other'){
        $("#trailer_div").append('<div class="col-md-4" style="padding-left:0px;"><div class="form-group "><label for="cname" class="control-label">Details</label><div class="form-control"><?php echo isset($inspection_detail['trailer_detail'])?$inspection_detail['trailer_detail']: '';  ?></div></div></div>');
        }else{
            $("#trailer_div").empty();
            $("#trailer_detail").val(null);
        }
    }

    function repairBill(value){
        if(value== true){
        $("#repair_bill_box").append('<div class="col-md-2" style="padding-left:0px;"><div class="form-group "><label for="cname" class="control-label">Details</label><div class="form-control"><?php echo isset($inspection_detail['repair_bill_detail'])?$inspection_detail['repair_bill_detail']: '';  ?></div></div></div>');
    }else{
        $("#repair_bill_box").empty();
    }
    }

</script>

<script type="text/javascript">
$(document).ready(function(){
    <?php if(in_array('other', $allDefects)): ?>
        defectCheck(true);
    <?php endif; ?>

    <?php if($inspection_detail['trailer'] == 'other'): ?>
        trailerSelect('other');
    <?php endif; ?>

    <?php if($inspection_detail['repair_bill'] == 'on'): ?>
        repairBill(true);
    <?php endif; ?>
});

</script>
<script>
<?php
 $currentLink = $this->uri->segment(2); 
 $controller = $this->uri->segment(1); 

 if($controller != 'driver' && $currentLink != 'view'){ ?>
    $(".btn").click(function() { return false; });
    <?php } ?>

$('#time_insp').timepicker({
        defaultTime: "<?php echo $driver['emp_last_reliev_from']?>",
});

</script>