<!-- page start-->
<?php isset($trailer_detail['id'])? $id=$trailer_detail['id']:  $id='';  ?>
<style>
	.fileupload{
		display:none;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">

				<h4 class="head3" style="display:inline-block">Trailer Details</h4>
			
				<a href="<?php echo site_url('trailer') ?>" class="btn btn-primary pull-right">View Trailer List</a>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
				<div class=" form">
                	<form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('trailer/add/'.$id); ?>">
                        <header class="panel-heading tab-bg-dark-navy-blue " <?php echo  ($trailer_detail['deactive']==1)?"style='background:#ED5252;'":'';?> >
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
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['unit_no'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">VIN #</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['vin_no'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Year</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['year'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Addition</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['addition'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Status</label>
                                                
                                                    <div class="form-control">
                                                    <?php if($trailer_detail['status'] == 'COMPANY')echo 'COMPANY'?>
                                                    <?php if($trailer_detail['status'] == 'OWNER')echo 'OWNER'?>
                                                    </div>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        <?php if($trailer_detail['status'] == 'OWNER'): ?>
                                            <div class="form-group owner">
                                                <label for="cname" class="control-label">Owner Name</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['owner_name'];?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                                	</div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Make</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['make'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Reefer/Dryvan</label>
                                                <div class="form-control">
                                                    <?php echo  $trailer_detail['reefer_dryvan'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Own/Leased</label>
                                                <div class="form-control">
                                                    <?php if($trailer_detail['owner_leased'] == 'Own')echo 'Own'?>
                                                    <?php if($trailer_detail['owner_leased'] == 'Leased')echo 'Leased'?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($trailer_detail['owner_leased'] == 'Leased'):?>
                                        <div class="col-md-2 leased">
                                            <div class="form-group ">
                                            
                                                <label for="cname" class="control-label">Lease End Date</label>
                                                <div class="form-control">
                                                    <?php echo  $trailer_detail['lease_end_date'];?>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-4 own">
                                            <div class="form-group">
                                                <label for="cname" class="control-label">Own/Leased Paper</label>
                                                <div class="controls">
                                                <?php if(!empty($trailer_detail['owner_leased_pdf']) && $trailer_detail['owner_leased_pdf'] == 'Leased'): ?>
                                                    <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                                        <a href="<?php echo base_url('trailer/file_download').'/'.basename($trailer_detail['owner_leased_pdf']).'/'.$trailer_detail['unit_no'];?>" id="download-a">
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
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Name On Ownership</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['ownership_name'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cname" class="control-label">Owner Ship Paper</label>
                                                <div class="controls">
                                                <?php if(!empty($trailer_detail['owner_ship_pdf'])): ?>
                                                    <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                                        <a href="<?php echo base_url('trailer/file_download').'/'.basename($trailer_detail['owner_ship_pdf']).'/'.$trailer_detail['unit_no'];?>" id="download-a">
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
                                                <label for="cname" class="control-label">Annual Safety Due</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['annual_safety_due'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cname" class="control-label">Annual Safety</label>
                                                <div class="controls">
                                                <?php if(!empty($trailer_detail['annual_safety_pdf'])): ?>
                                                    <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                                    <a href="<?php echo base_url('trailer/file_download').'/'.basename($trailer_detail['annual_safety_pdf']).'/'.$trailer_detail['unit_no'];?>" id="download-a">
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
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Licence plate #</label>
                                                <div class="form-control">
                                                	<?php echo  $trailer_detail['plate_no'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Old Licence plate #</label>
                                                <div class="form-control"  style="height: 100%;min-height:34px;">
                                                	
                                                    <?php //echo  $trailer_detail['remarks'];

                                                      $oldPlates =  explode(',', $trailer_detail['o_plate_no']);
                                                      echo "<ul>";
                                                      foreach ($oldPlates as $oldPlate) {
                                                          echo "<li>$oldPlate</li>";
                                                      }
                                                      echo "</ul>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="cname" class="control-label">Remark</label>
                                                <div class="form-control" style="height: 100%;min-height:34px;">
                                                	<?php //echo  $trailer_detail['remarks'];

                                                      $remarks =  explode(',', $trailer_detail['remarks']);
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