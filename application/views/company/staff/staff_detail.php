
<!-- page start-->
<div class="row">
<div class="alert alert-success" id="success" style="display:none; position:fixed; z-index:999; right:0; margin-right:20px;"></div>
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Staf Jobs Detail
          </header>
          <div class="panel-body">
               <section class="panel">
				  <div class="panel-body">
					  <ul class="summary-list">
						  <li>
							  <a href="javascript:;">
								  <i class=" fa fa-plus-square fa-2x text-primary"></i>
								  <?php echo $total_posted_jobs ;?> Total
							  </a>
						  </li>
						  <li>
							  <a href="javascript:;">
								  <i class="fa fa-hourglass-start fa-2x text-info"></i>
								  <?php echo $pending_jobs ;?> Pending
							  </a>
						  </li>
						  <li>
							  <a href="javascript:;">
								  <i class=" fa fa-star fa-2x text-muted"></i>
								  <?php echo $approved_jobs ;?> approved
							  </a>
						  </li>
						  <li>
							  <a href="javascript:;">
								  <i class="fa fa-ban fa-2x text-success"></i>
								  <?php echo $declined_jobs ;?> declined
							  </a>
						  </li>
						 
					  </ul>
				  </div>
			  </section>
          </div>
      </section>
  </div>
</div>
<!-- page end-->
          