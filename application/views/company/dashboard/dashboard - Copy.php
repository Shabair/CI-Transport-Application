<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/graph/style.css" type="text/css">
<script src="<?php echo base_url() ?>/public/assets/graph/amcharts.js" type="text/javascript" ></script>
<script src="<?php echo base_url() ?>/public/assets/graph/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/graph/plugins/export/export.min.js" type="text/javascript" ></script>
<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/graph/plugins/export/export.css" type="text/css">
<!--state overview start-->
<style>
.col-7 .col-xs-2 {
    width: 14.255555%;
}
.col-7 .follower h4 {
    margin: 10px 0 0 0;
    font-size: 15px;
    font-weight: 300;
}
.col-7 .follower {
    min-height: 160px;
}
.glyphicon-plus{
            transition: 0.5s;
}
.glyphicon-rotate{
    -webkit-transform: rotate(225deg);
    -moz-transform: rotate(225deg);
    -o-transform: rotate(225deg);
    -ms-transform: rotate(225deg);
    transform: rotate(225deg);
    color: #ff6c60;
}
</style>
<div class="row state-overview">
    <?php 
        if($Which_login === 'admin')
        {
    ?>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-building-o"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_companys;?>
                </h1>
                <p>Total Companies</p>
            </div>
        </section>
    </div>
    <?php
        }
    ?>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-users"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php 
                        echo $total_drivers;
                    ?>
                </h1>
                <p>Total Drivers</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-truck"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_trucks;?>
                </h1>
                <p>Total Trucks</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-external-link"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_trailers;?>
                </h1>
                <p>Total Trailers</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_inspections;?>
                </h1>
                <p>Total Inspections</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-ticket"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_citations;?>
                </h1>
                <p>Total Citations</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-paste"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?php echo $total_collisions;?>
                </h1>
                <p>Total Claims</p>
            </div>
        </section>
    </div>
</div>
<!--state overview start-->
<div class="row col-7">

    <section class="light_section">
      <div class="col-lg-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="background-color: #585353;">
          <div class="panel panel-default" style="margin-bottom: 5px;background-color: #585353;">
            <div class="panel-heading" role="tab" id="headingOne" data-collapse="asd" style="padding: 0 15px;background-color: #585353;">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#ratings-panel" aria-expanded="true" aria-controls="collapse">
                 
                  <h4 style="color: #ffffff;">Ratings
                  <div class="pull-right">
                    <i class="glyphicon glyphicon-plus" ></i>
                  </div>
                  </h4>
                </a>
              </h4>
            </div>
            <div id="ratings-panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="background-color: #fff;">
                <div class="panel-body">
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/UnsafeDriving.png'); ?>" alt="">
                                    </div>
                                    <h4>Unsafe Driving</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center ">
                                <?php
                                    $unsafedriving          = $rating_detail['unsafedriving'];
                                    if($unsafedriving > 65)
                                        {
                                ?>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular">
                                        <?php echo $unsafedriving; ?>%
                                    </a>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success">
                                        <?php echo $unsafedriving; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/CrashIndicator.png'); ?>" alt="">
                                    </div>
                                    <h4>Crash Indicator</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                                <?php
                                    $crashindicator         = $rating_detail['crashindicator'];
                                    if($crashindicator > 65)
                                        {
                                ?>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular1">
                                        <?php echo $crashindicator; ?>%
                                    </a>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success">
                                        <?php echo $crashindicator; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/HOSCompliance.png'); ?>" alt="">
                                    </div>
                                    <h4>Hours-of-Service Compliance</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                                <?php
                                    $hours_of_service       = $rating_detail['hours_of_service'];
                                    if($hours_of_service > 65)
                                        {
                                ?>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular2">
                                        <?php echo $hours_of_service; ?>%
                                    </a>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success" >
                                        <?php echo $hours_of_service; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/VehicleMaint.png'); ?>" alt="">
                                    </div>
                                    <h4>Vehicle Maintenance</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                                <?php
                                    $vehicle_maintenance    = $rating_detail['vehicle_maintenance'];
                                    if($vehicle_maintenance > 65)
                                        {
                                ?>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular3">
                                        <?php echo $vehicle_maintenance; ?>%
                                    </a>
                                </footer>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success">
                                        <?php echo $vehicle_maintenance; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/DrugsAlcohol.png'); ?>" alt="">
                                    </div>
                                    <h4>Controlled Substances and Alcohol</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                                <?php
                                    $control_sa             = $rating_detail['control_sa'];
                                    if($control_sa > 65)
                                        {
                                ?>
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular4">
                                        <?php echo $control_sa; ?>%
                                    </a>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success">
                                        <?php echo $control_sa; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/HMCompliance.png'); ?>" alt="">
                                    </div>
                                    <h4>Hazardous Materials Compliance</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                                <?php
                                    $hazardousmaterials     = $rating_detail['hazardousmaterials'];
                                    if($hazardousmaterials > 65)
                                        {
                                ?>
                                    
                                    <a href="javascript:;" class="btn btn-danger" id="pulsate-regular4">
                                        <?php echo $hazardousmaterials; ?>%
                                    </a>
                                <?php
                                        }
                                    else
                                    {
                                ?>
                                    <a href="javascript:;" class="btn btn-success" >
                                        <?php echo $hazardousmaterials; ?>%
                                    </a>
                                <?php 
                                    } 
                                ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-2">
                        <!--follower start-->
                        <section class="panel">
                            <div class="follower">
                                <div class="panel-body">
                                    <div class="follow-ava">
                                        <img src="<?php echo site_url('public/img/sms/DriverFitness.png'); ?>" alt="">
                                    </div>
                                    <h4>Driver Fitness</h4>
                                </div>
                            </div>
                            <footer class="follower-foot text-center">
                            <?php
                                $driverfitness          = $rating_detail['driverfitness'];
                                if($driverfitness > 65)
                                    {
                            ?>
                                
                                <a href="javascript:;" class="btn btn-danger" id="pulsate-regular5">
                                    <?php echo $driverfitness; ?>%
                                </a>
                            <?php
                                    }
                                else
                                {
                            ?>
                                <a href="javascript:;" class="btn btn-success">
                                    <?php echo $driverfitness; ?>%
                                </a>
                            <?php 
                                } 
                            ?>
                            </footer>
                        </section>
                        <!--follower end-->
                    </div>
                    <div class="col-xs-12 text-center">
                        <a class="btn btn-warning" data-toggle="modal" href="#myModal">Rating</a>
                    </div>
                </div>
            </div>
          </div>                   
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <?php $company_id = $rating_detail['company_id']; ?>
                <form class="cmxform tasi-form" id="frmvalidate" method="post" action="<?php echo site_url('dashboard/add/'.$company_id); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Unsafe Driving</label>
                                <input class="form-control input-sm" id="unsafedriving" name="unsafedriving" type="number" value="<?php echo isset($rating_detail['unsafedriving'])?$rating_detail['unsafedriving']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Crash Indicator</label>
                                <input class="form-control input-sm" id="crashindicator" name="crashindicator" type="number" value="<?php echo isset($rating_detail['crashindicator'])?$rating_detail['crashindicator']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hours-of-Service Compliance</label>
                                <input class="form-control input-sm" id="hours_of_service" name="hours_of_service" type="number" value="<?php echo isset($rating_detail['hours_of_service'])?$rating_detail['hours_of_service']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Vehicle Maintenance</label>
                                <input class="form-control input-sm" id="vehicle_maintenance" name="vehicle_maintenance" type="number" value="<?php echo isset($rating_detail['vehicle_maintenance'])?$rating_detail['vehicle_maintenance']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Controlled Substances and Alcohol</label>
                                <input class="form-control input-sm" id="control_sa" name="control_sa" type="number" value="<?php echo isset($rating_detail['control_sa'])?$rating_detail['control_sa']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hazardous Materials Compliance</label>
                                <input class="form-control input-sm" id="hazardousmaterials" name="hazardousmaterials" type="number" value="<?php echo isset($rating_detail['hazardousmaterials'])?$rating_detail['hazardousmaterials']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Driver Fitness</label>
                                <input class="form-control input-sm" id="driverfitness" name="driverfitness" minlength="2" type="number" value="<?php echo isset($rating_detail['driverfitness'])?$rating_detail['driverfitness']: '';  ?>" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <?php 
                            if($rating_detail['company_id'] == "")
                            {
                             echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 
                            }
                            else
                            {
                                echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                            }
                          ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--rate modal end -->
    <!-- MTO-Graph -->
    <section class="light_section">
      <div class="col-lg-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="background-color: #585353;">
          <div class="panel panel-default" style="margin-bottom: 5px;background-color: #585353;">
            <div class="panel-heading" role="tab" id="headingOne" data-collapse="asd" style="padding: 0 15px;background-color: #585353;">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                 
                  <h4 style="color: #ffffff;">MTO-Graph
                  <div class="pull-right">
                    <i class="glyphicon glyphicon-plus" ></i>
                  </div>
                  </h4>
                </a>
              </h4>
            </div>
            <div id="MTO-Graph" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="background-color: #fff;">
                <div class="panel-body">
                    <div class="col-xs-12"> 
                        <div id="chartdiv" style="width: 100%; height: 400px;background-color: #fff"></div>
                        <div style="margin-left:35px;text-align: center;">
                            <input type="radio" checked="true" name="group" id="rb1" onclick="setPanSelect()">Select
                            <input type="radio" name="group" id="rb2" onclick="setPanSelect()">Pan
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div style="margin-left:35px;text-align: center;">
                            <input type="button" value="Add Value" style="margin-top:20px;" class="btn btn-success" data-toggle="modal" href="#mto-graph-add-val">
                            <input type="button" value="Edit Value" style="margin-top:20px;" class="btn btn-primary" data-toggle="modal" href="#mto-graph-edit-val">
                            <input type="button" value="Remover Value" style="margin-top:20px;" class="btn btn-danger" data-toggle="modal" href="#mto-graph-remove-val">
                        </div>
                    </div>
                </div>
            </div>
          </div>                   
        </div>
      </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="mto-graph-add-val" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #78cd51;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <form class="cmxform tasi-form" method="post" action="<?php echo site_url('dashboard/add_graph_data'); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" name="graph_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">value</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <input type="text"  class="form-control" name="graph_value">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <?php 
                            if($rating_detail['company_id'] == "")
                            {
                             echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 
                            }
                            else
                            {
                                echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                            }
                          ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!-- Modal -->
    <div class="modal fade" id="mto-graph-edit-val" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #41cac0;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <?php $company_id = $rating_detail['company_id']; ?>
                <form class="cmxform tasi-form" id="frmvalidate" method="post" action="<?php echo site_url('dashboard/add/'.$company_id); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Unsafe Driving</label>
                                <input class="form-control input-sm" id="unsafedriving" name="unsafedriving" type="number" value="<?php echo isset($rating_detail['unsafedriving'])?$rating_detail['unsafedriving']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Crash Indicator</label>
                                <input class="form-control input-sm" id="crashindicator" name="crashindicator" type="number" value="<?php echo isset($rating_detail['crashindicator'])?$rating_detail['crashindicator']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hours-of-Service Compliance</label>
                                <input class="form-control input-sm" id="hours_of_service" name="hours_of_service" type="number" value="<?php echo isset($rating_detail['hours_of_service'])?$rating_detail['hours_of_service']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Vehicle Maintenance</label>
                                <input class="form-control input-sm" id="vehicle_maintenance" name="vehicle_maintenance" type="number" value="<?php echo isset($rating_detail['vehicle_maintenance'])?$rating_detail['vehicle_maintenance']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Controlled Substances and Alcohol</label>
                                <input class="form-control input-sm" id="control_sa" name="control_sa" type="number" value="<?php echo isset($rating_detail['control_sa'])?$rating_detail['control_sa']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hazardous Materials Compliance</label>
                                <input class="form-control input-sm" id="hazardousmaterials" name="hazardousmaterials" type="number" value="<?php echo isset($rating_detail['hazardousmaterials'])?$rating_detail['hazardousmaterials']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Driver Fitness</label>
                                <input class="form-control input-sm" id="driverfitness" name="driverfitness" minlength="2" type="number" value="<?php echo isset($rating_detail['driverfitness'])?$rating_detail['driverfitness']: '';  ?>" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <?php 
                            if($rating_detail['company_id'] == "")
                            {
                             echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 
                            }
                            else
                            {
                                echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                            }
                          ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!-- Modal -->
    <div class="modal fade" id="mto-graph-remove-val" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #ff6c60;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <?php $company_id = $rating_detail['company_id']; ?>
                <form class="cmxform tasi-form" id="frmvalidate" method="post" action="<?php echo site_url('dashboard/add/'.$company_id); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Unsafe Driving</label>
                                <input class="form-control input-sm" id="unsafedriving" name="unsafedriving" type="number" value="<?php echo isset($rating_detail['unsafedriving'])?$rating_detail['unsafedriving']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Crash Indicator</label>
                                <input class="form-control input-sm" id="crashindicator" name="crashindicator" type="number" value="<?php echo isset($rating_detail['crashindicator'])?$rating_detail['crashindicator']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hours-of-Service Compliance</label>
                                <input class="form-control input-sm" id="hours_of_service" name="hours_of_service" type="number" value="<?php echo isset($rating_detail['hours_of_service'])?$rating_detail['hours_of_service']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Vehicle Maintenance</label>
                                <input class="form-control input-sm" id="vehicle_maintenance" name="vehicle_maintenance" type="number" value="<?php echo isset($rating_detail['vehicle_maintenance'])?$rating_detail['vehicle_maintenance']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Controlled Substances and Alcohol</label>
                                <input class="form-control input-sm" id="control_sa" name="control_sa" type="number" value="<?php echo isset($rating_detail['control_sa'])?$rating_detail['control_sa']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Hazardous Materials Compliance</label>
                                <input class="form-control input-sm" id="hazardousmaterials" name="hazardousmaterials" type="number" value="<?php echo isset($rating_detail['hazardousmaterials'])?$rating_detail['hazardousmaterials']: '';  ?>" required="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Driver Fitness</label>
                                <input class="form-control input-sm" id="driverfitness" name="driverfitness" minlength="2" type="number" value="<?php echo isset($rating_detail['driverfitness'])?$rating_detail['driverfitness']: '';  ?>" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <?php 
                            if($rating_detail['company_id'] == "")
                            {
                             echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 
                            }
                            else
                            {
                                echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                            }
                          ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!-- Graph END -->
    <style type="text/css">
        .nav-tabs {
            border-bottom: 1px solid #ddd;
            background-color: #585353;
            color:#fff;
        }
        .tab-content {
            padding: 10px;
            background-color: #fff;
        }
        .nav-tabs li a:hover{
            background-color:#6a6a6a;
        }
        .nav-tabs li a{
            color:#fff;
                 border-radius: 0px 0px 0 0; 
        }

        .fa-circle{
            color: #ff6c60;
            position: relative;
            top: -7px;
            left:3px;
            font-size: 6px;
        }
    </style>
    <!-- pending works -->

    <!-- pending works End-->
    <!--  -->
    <?php //var_dump($pending_works); ?>
    <?php //var_dump($graph_data); ?>
    <?php

    function getPWorkArr($arr){
        $temp = array();
        foreach ($arr as $key => $value) {
            $temp[$key] = $value;
        }
        return $temp;
    }

    if(count($pending_works)){
        foreach ($pending_works as $value) {
            if($value['p_type'] == 'license'){
                $license[] = getPWorkArr($value);
            }else if($value['p_type']=='medical_expiry'){
                $medical_expiry[] = getPWorkArr($value);
            }else if($value['p_type']=='truck_annual_due'){
                $truck_annual_due[] = getPWorkArr($value);
            }else if($value['p_type']=='trailer_annual_due'){
                $trailer_annual_due[] = getPWorkArr($value);
            }
        }
    }
    // var_dump($license);
    ?>
    <style type="text/css">
        
    tbody{
        counter-reset: section;
    }
    tbody tr th:before {
        counter-increment: section;
        content: counter(section) ;
    }
    a[data-name*="reminder"]:empty:before
    {
        content: "No Reminder";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    a[data-name*="is_completed"]:empty:before
    {
        content: "DONE";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    a[data-name*="completed_date"]:empty:before
    {
        content: "Not Completed";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    .temp_received:empty:before
    {
        content: "Not RECEIVED";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    .cvorpulled:empty:before
    {
        content: "Not CVOR PULLED";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    </style>
    <!-- <button class="btn btn-primary " id="pending_works_editable" value="sdc">scdc</button> -->
    <!-- <div class="content"> -->
    <div class="col-xs-12 text-center">
        <div class="panel panel-default">
          <div class="panel-body text-center" style="padding:5px;background-color:#ff6c60;color:#fff;">
            <h4>Pending Works</h4>
          </div>
        </div>
        <div class="">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#default-tab-1" data-toggle="tab" aria-expanded="false">LICENSE EXPIRIES <?php if(count($license)){?><i class="fa fa-circle " aria-hidden="true"></i><?php }?></a></li>
                <li class=""><a href="#default-tab-2" data-toggle="tab" aria-expanded="false">DRUG TEST FOLLOW UP TESTS DUE <?php if(count($licenses)){?><i class="fa fa-circle " aria-hidden="true"></i><?php }?></a></li>
                <li class=""><a href="#default-tab-3" data-toggle="tab" aria-expanded="true">MEDICAL EXPIRIES <?php if(count($medical_expiry)){?><i class="fa fa-circle " aria-hidden="true"></i><?php }?></a></li>
                <li class=""><a href="#default-tab-4" data-toggle="tab" aria-expanded="true">TRUCK ANNUAL SAFETIES DUE <?php if(count($truck_annual_due)){?><i class="fa fa-circle " aria-hidden="true"></i><?php }?></a></li>
                <li class=""><a href="#default-tab-5" data-toggle="tab" aria-expanded="true">TRAILER ANNUAL SAFETIES DUE <?php if(count($trailer_annual_due)){?><i class="fa fa-circle " aria-hidden="true"></i><?php }?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="default-tab-1">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">DRIVER NAME</th>
                              <th scope="col">Phone No#</th>
                              <th scope="col">LICENSE EXPIRY</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">TEMP REC'VD</th>
                              <th scope="col">CARD COPY REC'VD</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php if(count($license)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($license as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo '1234-567-890';?></td>
                                      <td><?php echo date("m/d/Y",strtotime($value['expiry_date']));?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nds Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_2'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_3'] ?></a>
                                      </td>
                                      <td>
                                          <a  data-name="extra_data" data-emptytext="No Reminder"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-value="<?php echo $value['extra_data']?>" data-p_type="license" class="temp_received"></a>
                                      </td>
                                      <td>
                                          <a  data-name="completed_date" data-emptytext="Not Completed" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="Update License Expiry" data-p_type="license" class="pending_works"><?php echo $value['completed_date'] ?></a>
                                      </td>
                                      <td>
                                          <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="license" class="temp_received"></a>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="10"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="default-tab-2">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">DRIVER NAME</th>
                              <th scope="col">LICENSE EXPIRY</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">TEMP REC'VD</th>
                              <th scope="col">CARD COPY REC'VD</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php if(count($license)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($license as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"><?php //echo $count++;?></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo $value['expiry_date'] ?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_work_title="license" class="pending_works empty_follow_r1"></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="license" class="pending_works empty_follow_r1"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="license" class="pending_works empty_follow_r1"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>@mdo</td>
                                      <td>@mdo</td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="8"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade " id="default-tab-3">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">DRIVER NAME</th>
                              <th scope="col">Phone No#</th>
                              <th scope="col">MEDICAL EXPIRY</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">CVOR PULLED</th>
                              <th scope="col">COMPLETE</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(count($medical_expiry)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($medical_expiry as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"><?php //echo $count++;?></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo '1234-567-890';?></td>
                                      <td><?php echo date("m/d/Y",strtotime($value['expiry_date']));?></td>
                                      <td>
                                        12/11/2012<br />
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_2'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_3'] ?></a>
                                      </td>
                                      <td>
                                          <a  data-name="extra_data" data-emptytext="No CVOR PULLED"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="CVOR PULLED" data-value="<?php echo $value['extra_data']?>" data-p_type="medical_expiry" class="temp_received cvorpulled"></a>
                                      </td>
                                      <td>
                                        <a  data-name="completed_date" data-emptytext="Not Completed" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="Update Medical Expiry" data-p_type="medical_expiry" class="pending_works"><?php echo $value['completed_date'] ?></a>

                                      </td>
                                      <td>
                                          <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="medical_expiry" class="temp_received"></a>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="10"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade " id="default-tab-4">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">UNIT NO</th>
                              <th scope="col">ANNUAL SAFETY EXPIRY</th>
                              <th scope="col">O-OP NAME</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">RECEIVED CERTIFICATE</th>
                              <th scope="col">RECEIVED PM SHEET</th>
                              <th scope="col">RECEIVED MECHANIC INVOICE</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php if(count($truck_annual_due)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($truck_annual_due as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"><?php //echo $count++;?></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo $value['expiry_date'] ?></td>
                                      <td><?php echo $value['o_op_name'] ?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_2'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_3'] ?></a>
                                      </td>
                                      <td>
                                          <a  data-name="extra_data" data-emptytext="No RECEIVED CERTIFICATE" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="RECEIVED CERTIFICATE" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['extra_data'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="received_pm_sheet" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="truck_annual_due" class="temp_received"></a>
                                      </td>
                                      <td>
                                        <a  data-name="received_mechinic_invoice" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="truck_annual_due" class="temp_received"></a>
                                      </td>
                                      <td>
                                        <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="truck_annual_due" class="temp_received"></a>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="8"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade " id="default-tab-5">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">UNIT NO</th>
                              <th scope="col">ANNUAL SAFETY EXPIRY</th>
                              <th scope="col">O-OP NAME</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">RECEIVED CERTIFICATE</th>
                              <th scope="col">RECEIVED PM SHEET</th>
                              <th scope="col">RECEIVED MECHANIC INVOICE</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php if(count($trailer_annual_due)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($trailer_annual_due as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"><?php //echo $count++;?></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo $value['expiry_date'] ?></td>
                                      <td><?php echo $value['o_op_name'] ?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_1'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_2'] ?></a>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_3'] ?></a>
                                      </td>
                                      <td>@mdo</td>
                                      <td>@mdo</td>
                                      <td>@mdo</td>
                                      <td>
                                        <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="trailer_annual_due" class="temp_received"></a>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="8"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!--  -->
</div>
<!-- Graph -->
    <script>


        var chartData = [];
        generateChartData();

        var chart = AmCharts.makeChart( "chartdiv", {
                "type": "serial",
                "marginTop": 30,
                "dataProvider": chartData,
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true,
                    "gridAlpha": 0.15,
                    "minorGridEnabled": true,
                    "axisColor": "#DADADA"
                },
                "valueAxes": [ {
                    "axisAlpha": 0.2,
                    "id": "v1"
                } ],
                "graphs": [ {
                    "title": "red line",
                    "id": "g1",
                    "valueAxis": "v1",
                    "valueField": "visits",
                    "bullet": "round",
                    "bulletBorderColor": "#FFFFFF",
                    "bulletBorderAlpha": 1,
                    "lineThickness": 2,
                    "lineColor": "#b5030d",
                    "negativeLineColor": "#0352b5",
                    "balloonText": "[[category]]<br><b><span style='font-size:14px;'>value: [[value]]</span></b>"
                } ],
                "chartCursor": {
                    "fullWidth": true,
                    "cursorAlpha": 0.1
                },
                "chartScrollbar": {
                    "scrollbarHeight": 40,
                    "color": "#FFFFFF",
                    "autoGridCount": true,
                    "graph": "g1"
                },
                "mouseWheelZoomEnabled": false,
                "export": {
                    "enabled": true
                }
            } );

        chart.addListener("dataUpdated", zoomChart);


        // generate some random data, quite different range
        function generateChartData() {
            var firstDate = new Date();
            firstDate.setDate(firstDate.getDate() - 500);
            // var data = new Array();
            // for (var i = 0; i < 500; i++) {
            //     data[i] = new Array();
            //     var newDate = new Date(firstDate);
            //     data[i][0] = newDate.setDate(newDate.getDate() + (i*30));

            //     data[i][1]  = Math.round(Math.random() * 40);

            // }

            var data = '<?php echo json_encode($graph_data); ?>';
            data = JSON.parse(data);
            console.log(data);
            for (var i = 0; i < data.length; i++) {
                console.log(data[i]);
                chartData.push({
                    date: data[i].date,
                    visits: data[i].value
                });
            }
        }


        function zoomChart() {

            chart.zoomToIndexes(chartData.length - 40, chartData.length - 1);
        }

        function setPanSelect() {
            var chartCursor = chart.chartCursor;

            if (document.getElementById("rb1").checked) {
                chartCursor.pan = false;
                chartCursor.zoomable = true;

            } else {
                chartCursor.pan = true;
            }
            chart.validateNow();
        }


    </script>

<!--     <script type="text/javascript">
        $(document).on('submit','#graph_form',function(e){
            e.preventDefault();
            $.ajax({
               url: '<?=base_url('dashboard/add_graph_data')?>',
               data: $('#graph_form').serialize(),
               type: 'post',
               error: function() {
                  $('#info').html('<p>An error has occurred</p>');
               },
               success: function(data, textStatus, xhr) {
                    console.log(xhr.status);
                },
                complete: function(xhr, textStatus) {
                    console.log(xhr.status);
                }
            });
        });
    </script> -->
<!-- Graph END -->



<script>
// MTO-Graph collapse hide and show
    // $(document).ready(function(){
    //     $(".panel-heading").click(function(){
    //         var $this = $(this);
    //         $this.find('i').toggleClass(function() {
    //           if ( $( this ).is( ".glyphicon-rotate" ) ) {
    //             $( this ).removeClass("glyphicon-rotate");
    //             $('#MTO-Graph').slideUp();
    //             return "";
    //           } else {
    //             $('#MTO-Graph').slideDown();
    //             return "glyphicon-rotate";
    //           }
    //         });
    //     });
        
    // });

    $(document).ready(function(){
        $(".panel-heading").click(function(){
            var $this = $(this);
            var id = $this.find('a').attr("href");
            $this.find('i').toggleClass(function() {
              if ( $( this ).is( ".glyphicon-rotate" ) ) {
                $( this ).removeClass("glyphicon-rotate");
                $(id).slideUp();
                return "";
              } else {
                $(id).slideDown();
                return "glyphicon-rotate";
              }
            });
        });
        
    });
</script>