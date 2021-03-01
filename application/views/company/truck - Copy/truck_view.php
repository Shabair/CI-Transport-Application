<!-- page start-->

<!-- page start-->


<?php isset($truck_detail['id'])? $id=$truck_detail['id']:  $id='';  ?>



<style>
	.fileupload, .cont_owner{
		display:none;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">

			<h4 class="head3" style="display:inline-block">Truck &nbsp;&nbsp;<?php echo isset($truck_detail['unit_no'])?$truck_detail['unit_no']: '';  ?></h4>
			
				<a href="<?php echo site_url('trucks') ?>" class="btn btn-primary pull-right">View Truck List</a>

			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('trucks/add/'.$id); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Unit #</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['unit_no'])?$truck_detail['unit_no']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">VIN #</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['vin_no'])?$truck_detail['vin_no']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Year</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['year'])?$truck_detail['year']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Addition</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['addition'])?$truck_detail['addition']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Make</label>
                                     <div class="form-control">
                                        <?php echo isset($truck_detail['make'])?$truck_detail['make']: '';  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Licence plate #</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['license_plate'])?$truck_detail['license_plate']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Old Licence plate #</label>
                                    <div class="form-control"  style="height: 100%;min-height:34px;">
                                                    
                                        <?php //echo  $truck_detail['remarks'];
                                        if(isset($truck_detail['o_lic_plate'])){
                                    
                                          $oldPlates =  explode(',', $truck_detail['o_lic_plate']);
                                          echo "<ul>";
                                          foreach ($oldPlates as $oldPlate) {
                                              echo "<li>$oldPlate</li>";
                                          }
                                          echo "</ul>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Name On Ownership</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['ownership_name'])?$truck_detail['ownership_name']: '';  ?>
                                    </div>
                                </div>
                            </div>
                        	<div class="col-md-2">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Owner Ship</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['owner_ship_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['owner_ship_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                    <label for="cname" class="control-label">Annual Safe Due</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['annual_safety_due'])?$truck_detail['annual_safety_due']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Annual Safety Paper</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['annual_safety_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['annual_safety_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                        <?php if($truck_detail['status'] == 'COMPANY')echo 'COMPANY'?>
                                        <?php if($truck_detail['status'] == 'OWNER')echo 'OWNER OPERATOR'?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php if($truck_detail['status'] != 'COMPANY'){?>
                                    <label for="cname" class="control-label">Driver/Other</label>
                                	<div class="form-control">
                                            <?php if($truck_detail['owner'] == 'driver')echo 'DRIVER'?>
                                            <?php if($truck_detail['owner'] == 'other')echo 'OTHER'?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-2 driver_name nc_show">
                            <?php if($truck_detail['status'] != 'COMPANY'){?>
                            <label for="cname" class="control-label">Owner Name</label>
                                <div class="form-control">
                                    <?php if($truck_detail['owner'] == 'driver'){ ?>
                                        <?php foreach ($getDriver as $value) {
                                            if($truck_detail['owner_name'] == $value->id){
                                                echo $value->first_name;
                                            }
                                        } ?>
                                    <?php }else if($truck_detail['owner'] == 'other'){
                                        echo $truck_detail['owner_name'];
                                        } ?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group cont_owner">
                                    <?php if($truck_detail['status'] != 'COMPANY'){?>
                                    <label for="cname" class="control-label">Contract</label>
                                    <div class="form-control">
                                        <?php if($truck_detail['contract_pdf'] != '')
                                            {echo 'Yes';}
                                            else{
                                                echo "No";
                                            }
                                        ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <?php if($truck_detail['status'] != 'COMPANY'){?>
                                <div class="form-group">
                                    <label for="cname" class="control-label">Contract Paper</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['contract_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['contract_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                            <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Own/Leased</label>
                                    <div class="form-control">
                                        <?php if($truck_detail['owner_leased'] == 'Own')echo 'Own'?>
                                        <?php if($truck_detail['owner_leased'] == 'Leased')echo 'Leased'?>
                                    </div>
                                </div>
                            </div>
                            <?php if($truck_detail['owner_leased'] == 'Leased'){ ?>
                            <div class="col-md-2 leased" <?php echo ($truck_detail['owner_leased'] == 'Leased')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Lease End Date</label>
                                    <div class="form-control">
                                        <?php echo isset($truck_detail['lease_end_date'])?$truck_detail['lease_end_date']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-4 own" <?php echo ($truck_detail['owner_leased'] != '')?'style="display:block;"':'style="display:none;"'; ?> >
                                <div class="form-group">
                                    <label for="cname" class="control-label">Own/Leased Paper</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['owner_leased_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['owner_leased_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                    <label for="cname" class="control-label">Ambassador Brige</label>
                                    <div class="form-control">
                                        <?php if($truck_detail['ambassadorbrige'] != '')
                                            {echo 'Yes';}
                                            else{
                                                echo "No";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group fileupload" id="rfid_tag_no_parent">
                                    <label for="cname" class="control-label">RFID Tag No</label>
                                    <div class="form-control" id="rfid_tag_no">
                                        <?php echo isset($truck_detail['rfid_tag_no'])?$truck_detail['rfid_tag_no']: '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Kenty Key</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php if($truck_detail['kentykey'] != '')
                                                {echo 'Yes';}
                                                else{
                                                    echo "No";
                                                }
                                            ?>
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
                                        <div class="form-control">
                                            <?php if($truck_detail['orgen_permit_pdf'] != '')
                                                {echo 'Yes';}
                                                else{
                                                    echo "No";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Orgen Permit Document</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['orgen_permit_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['orgen_permit_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                    <label for="cname" class="control-label">New Maxico Permit</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php if($truck_detail['maxico_permit_pdf'] != '')
                                                {echo 'Yes';}
                                                else{
                                                    echo "No";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">New Maxico Permit</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['maxico_permit_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['maxico_permit_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                    <label for="cname" class="control-label">New York</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php if($truck_detail['newyork_pdf'] != '')
                                                {echo 'Yes';}
                                                else{
                                                    echo "No";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">New York Document</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['newyork_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['newyork_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                                    <label for="cname" class="control-label">Transponder</label>
                                    <div class="form-group ">
                                        <div class="form-control">
                                            <?php if($truck_detail['transponder_pdf'] != '')
                                                {echo 'Yes';}
                                                else{
                                                    echo "No";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Transponder Paper</label>
                                    <div class="controls">
                                    <?php if(!empty($truck_detail['transponder_pdf'])): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('trucks/file_download').'/'.basename($truck_detail['transponder_pdf']).'/'.$truck_detail['unit_no'];?>" id="download-a">
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
                        	<div class="col-md-12">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Remark</label>
                                    <div class="form-control" style="height: 100%;min-height:34px;">
                                        <?php //echo  $trailer_detail['remarks'];

                                          $remarks =  explode(',', $truck_detail['remark']);
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
<script>
    
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
            $('#owner_name_other').val('');
            
        }
}
	
    $("#status").on('change',function(){
        var value = $(this).val();
                status_div(value);
    });



    $(document).on('change', "input[name=owner]:radio", function() {
        var value = $(this).val();
        driver_div(value);
    });

$("#ambassadorbrige").change(function(){
    $(rfid_tag_no).val(null);
});

$(document).ready(function(){


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