<div class="row">
    <div class="col-lg-12">
    
        <?php if ($this->session->flashdata('success')) :?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?=$this->session->flashdata('success')?></strong> 
        </div>
        <?php endif;?>
        <section class="panel">
            <div class="panel-body">
            	<ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#menu1">Schedule Service</a></li>
                  <li><a data-toggle="tab" href="#menu2">Service Log</a></li>
                  <li><a data-toggle="tab" href="#menu3">Parts / Materials</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                    	<div class="adv-table" style="min-height:100px">
                        <div><p style="    width: 10%;float: left;"><span>Filter By Status</span></p>
                        <p class="customSeachTruck"></p></div>
                            <table  class="mv_trailers display table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Service Item</th>
                                        <th>Last Performed</th>
                                        <th>Frequency</th>
                                        <th>Next Due Date</th>
                                        <th>Next Due Odometer</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <form id="serviceForm">
                        	<div class="row">
                             	<h4>Set Reminder</h4>
                             </div>
                        	<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label">Service Name</label>
                                        <select class="form-control input-sm text-capitalize " data-live-search="true" id="serviceName" name="serviceName">
                                            <option selected>select service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label">Repeat Every</label>
                                        <input class=" form-control input-sm" name="rDays" id="rDays" minlength="2" type="number" required/>
                                    </div>
                                </div>
                                <div class="col-md-4" style="    margin-top: 20px;">
                                	<div class="form-group ">
                                        <div class="btn-row">
                                            <div class="btn-group" data-toggle="buttons">
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="rdayType" name="rdayType" value="days">Days
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="rdayType" name="rdayType" value="months">Months
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="rdayType" name="rdayType" value="weeks">Weeks
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="rdayType" name="rdayType" value="years">Years
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-3" style="    margin-top: 20px;">
                                	<div style="width: 20%;float: left;margin-top: 5px;">OR</div>
                                    <div class="form-group" style="    width: 60%;float: left;">
                                        <input class=" form-control input-sm" name="rMiles" id="rMiles" minlength="2" type="number"/>
                                    </div>
                                    <div style="    width: 20%;float: left;text-align:center;margin-top: 5px;">Miles</div>
                                </div>
                             </div>
                             <div class="row">
                             	<h4>Set Reminder</h4>
                             </div>
                             <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label">Set Time</label>
                                        <input class=" form-control input-sm" id="remDays" name="remDays" minlength="2" type="number" required/>
                                    </div>
                                </div>
                                <div class="col-md-4" style="    margin-top: 20px;">
                                	<div class="form-group ">
                                        <div class="btn-row">
                                            <div class="btn-group" data-toggle="buttons">
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="remDayType"  name="remDayType">Days
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="remDayType" name="remDayType">Months
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="remDayType" name="remDayType">Weeks
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" id="remDayType" name="remDayType">Years
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-3" style="    margin-top: 20px;">
                                	<div style="width: 20%;float: left;margin-top: 5px;">OR</div>
                                    <div class="form-group" style="    width: 60%;float: left;">
                                        <input class=" form-control input-sm" name="remMiles" id="remMiles" minlength="2" type="number" required/>
                                    </div>
                                    <div style="    width: 20%;float: left;text-align:center;margin-top: 5px;">Miles</div>
                                </div>
                             </div>
                             <div class="row">
                             	<div class="col-md-6">
                                	<div class="form-group" style="    width: 60%;float: left;">
                                    	<label for="cname" class="control-label">Notes</label>
                                		<textarea  class=" form-control input-sm" id="serviceNotes" name="serviceNotes"></textarea>
                                    </div>
								</div>
                                <div class="col-md-6">
                                	<div class="form-group" style="    width: 60%;float: left;">
                                    	<label for="cname" class="control-label">Attach File</label>
                                		<input type="file" id="serviceFile">
                                    </div>
								</div>
                             </div>
                             <div class="row" style="text-align:center">
                             	<button type="submit" name="submit" value="Save"  class="btn btn-primary" > Save</button>
                             </div>
                        </form>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                    	<h1>Services Log</h1>
					</div>
                    <div id="menu3" class="tab-pane fade">
                    	<h1>Parts and Materials</h1>
					</div>
				</div>
        </section>
    </div>
</div>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
<script>
$('#serviceForm').submit(function(e) {
    e.preventDefault();
	var serviceData = 'serviceName='+$('#serviceName').val()+'&repeatDay='+$('#rDays').val()+
	'&repeatDayType='+$("input[name='rdayType']:checked").val();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('maintenance/schedule_service'); ?>",
        data: serviceData, // <--- THIS IS THE CHANGE
        success: function(data){
            alert(data);
        },
        error: function() { alert("Error posting feed."); }
   });

});
</script>