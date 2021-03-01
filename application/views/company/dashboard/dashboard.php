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




/*pulsate circle start*/
.pulsate-circle {
    background: #ff6c60;
    position: absolute;
    color: #ff6c60;
    top: 7px;
    right:10px;
}

.pulsate-circle .pulse {
  width: 6px;
  height: 6px;
  border: 3px solid #ff6c60;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  background-color: #ff6c60;
  z-index: 10;
  position: absolute;
}

.pulsate-circle .dot {
  border: 5px solid #ff6c60;
  background: transparent;
  -webkit-border-radius: 60px;
  -moz-border-radius: 60px;
  border-radius: 60px;
  height: 20px;
  width: 20px;
  -webkit-animation: pulse 1s ease-out;
  -moz-animation: pulse 1s ease-out;
  animation: pulse 1s ease-out;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  position: absolute;
  top: -7px;
  left: -7px;
  z-index: 1;
  opacity: 0;
}

@-moz-keyframes pulse {
 0% {
    -moz-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -moz-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -moz-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -moz-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -moz-transform: scale(1);
    opacity: 0.0;
 }
}

@-webkit-keyframes "pulse" {
 0% {
    -webkit-transform: scale(0);
    opacity: 0.0;
 }
 25% {
    -webkit-transform: scale(0);
    opacity: 0.1;
 }
 50% {
    -webkit-transform: scale(0.1);
    opacity: 0.3;
 }
 75% {
    -webkit-transform: scale(0.5);
    opacity: 0.5;
 }
 100% {
    -webkit-transform: scale(1);
    opacity: 0.0;
 }
/*pulsate circle star endt*/
</style>

<style type="text/css">
    .heading_style{
        background: #8e8e8e;
        padding: 8px;
        font-size: 21px;
        font-weight: 700;
        color: #fff;
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
    .perdrugcontainer{
        border-bottom: 1px solid #FF5C5C;
        padding-bottom: 15px;
        padding-top: 15px;
    }
    .disabledstyle{
        background: #ff827d !important; 
        color: #ffffff !important;
    }
    .fileupload-new
,.fileupload-exists
    {
        color: #000;
    }
</style>
<div class="row state-overview">
    <?php 
        $CI = &get_instance();
        if($CI->get_user_type() === 'admin')
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
        <div class="panel-group" id="mto-graph-container" role="tablist" aria-multiselectable="true" style="background-color: #585353;">
          <div class="panel panel-default" style="margin-bottom: 5px;background-color: #585353;">
            <div class="panel-heading" role="tab" id="headingOne" data-collapse="asd" style="padding: 0 15px;background-color: #585353;">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#mto-graph-container" href="#MTO-Graph" aria-expanded="true" aria-controls="collapse">
                 
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
                    <div class="col-xs-12" style="padding: 0px;"> 
                        <div id="chartdiv" style="width: 100%; height: 400px;background-color: #fff"></div>
                        <div style="margin-left:35px;text-align: center;">
                            <input type="radio" checked="true" name="group" id="rb2" onclick="setPanSelect()">Pan
                            <input type="radio"  name="group" id="rb1" onclick="setPanSelect()">Select
                            
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
                                    <input type="text" class="form-control mm-yyyy-date-picker" name="graph_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Value</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <input type="number" step="0.1" min="0" max="100"  class="form-control" name="graph_value">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="reset">Close</button>
                        <?php 
                            echo '<button type="submit" name="submit" value="add"  class="btn btn-success" > Save</button>';
                            
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
                <form class="cmxform tasi-form" method="post" action="<?php echo site_url('dashboard/edit_graph_data'); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Custom Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control mm-yyyy-date-picker" name="graph_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Old Value</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <div  class="form-control old-date-edit-model"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group ">
                                <label for="cname" class="control-label">New Value</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <input type="number" step="0.1" min="0" max="100"  class="form-control" name="graph_value">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="reset">Close</button>
                        <?php 
                            echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                            
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
                <form class="cmxform tasi-form" method="post" action="<?php echo site_url('dashboard/delete_graph_data'); ?>">
                    <div class="modal-body">
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Custom Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control mm-yyyy-date-picker" name="graph_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ">
                                <label for="cname" class="control-label">Old Value</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <div  class="form-control old-date-edit-model"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="clear:both">
                        
                        <button data-dismiss="modal" class="btn btn-default" type="reset">Close</button>
                        <?php 
                            echo '<button type="submit" name="update" value="update"  class="btn btn-danger" > Delete</button>';
                            
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
        .updated_date{
            position: absolute;
            margin-top: 10px;
            font-size: 9px;
            font-style: italic;
            bottom: 0px;
            color: #888888;
        }
        .pending_work_tbl td{
            position: relative;
        }
    </style>
    <!-- pending works -->

    <!-- pending works End-->
    <?php
    $license = $medical_expiry = $truck_annual_due = $trailer_annual_due = $driver_annual_review = $drug_test = array();
    
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
            }else if($value['p_type']=='driver_annual_review'){
                $driver_annual_review[] = getPWorkArr($value);
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
        content: "Empty";
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
    a[data-emptytext*="No Certificate"]:empty:before
    {
        content: "No Certificate";
        font-style: italic;
        color: red;
        /*display: none;*/
    }
    a[data-emptytext*="No Received"]:empty:before
    {
        content: "No Received";
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
    <?php 
        // function getDateFromDB($date){
        //     if(!empty($date)){
        //         $date = date_create_from_format('Y-m-d',$date );
        //         return date_format($date, 'd/M/Y') ;
        //     }
        // }
    ?>
    <div class="col-xs-12 text-center">
        <div class="panel panel-default">
          <div class="panel-body text-center" style="padding:5px;background-color:#ff6c60;color:#fff;">
            <h4>Pending Work</h4>
          </div>
        </div>
        <div class="">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#default-tab-1" data-toggle="tab" aria-expanded="false">LICENSE EXPIRIES <?php if(count($license)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#default-tab-2" data-toggle="tab" aria-expanded="false">DRUG TEST FOLLOW UP TESTS DUE <?php if(!empty($current_drug_test)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#sapof_followup" data-toggle="tab" aria-expanded="false">Sap Of And Follow Ups <?php if(count($S_FUIds['sapOfIds']) != 0){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#default-tab-3" data-toggle="tab" aria-expanded="true">MEDICAL EXPIRIES <?php if(count($medical_expiry)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#default-tab-4" data-toggle="tab" aria-expanded="true">TRUCK ANNUAL SAFETIES DUE <?php if(count($truck_annual_due)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#default-tab-5" data-toggle="tab" aria-expanded="true">TRAILER ANNUAL SAFETIES DUE <?php if(count($trailer_annual_due)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

                <li class=""><a href="#driver_annual_review" data-toggle="tab" aria-expanded="true">DRIVER ANNUAL REVIEWS <?php if(count($driver_annual_review)){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></a></li>

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
                                      <td><?php echo $value['phonenumber'];?></td>
                                      <td><?php echo getDateFromDB($value['expiry_date']);?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_1'] ?></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_1_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nds Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_2'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_2_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder"  data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="license" class="pending_works"><?php echo $value['reminder_3'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_3_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                          <a  data-name="extra_data" data-emptytext="Not Received"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-value="<?php echo $value['extra_data']?>" data-p_type="license" class="temp_received"></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','extra_data_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                          <a  data-name="completed_date" data-emptytext="Not Completed" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="Update License Expiry" data-p_type="license" class="pending_works"><?php echo getDateFromDB($value['completed_date']) ?></a>
                                          <div class="updated_date"><?php 
                                          $updated_date = getDateFromDB(get_rec_meta_data(['tbl_name'=>'pending_works','tbl_col'=>'license_completed_date_time','tbl_item_id'=>$value['action_on_id']]));
                                          
                                          if(!empty($updated_date)){
                                                echo $updated_date;}else{
                                                    echo getDateFromDB(meta_data('pending_works','license_completed_date_time',$value['id']));
                                                } ?>
                                                
                                            </div>
                                      </td>
                                      <td>
                                          <a  data-name="is_completed" data-emptytext="Empty"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="license" class="temp_received"></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','is_completed_time',$value['id'])); ?></div>

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
                            <?php 
                                function disableArray($arr,$id){
                                    foreach ($arr as $key => $value) {
                                        if(strpos($key, $id) !== false){
                                            if(empty($value))
                                                return 'disabled';
                                        }
                                    }
                                }


                            ?>
                            <?php if(!empty($current_drug_test)): ?>
                            <?php $drugTestDriverIds = unserialize($current_drug_test['driver_id']); ?>
                            <?php $drugTestDTestData = unserialize($current_drug_test['dtestdata']); ?>
                            <table id="drug_test_pending_table" style="width:100%;">
                            <?php for($i = 0; $i<count($drugTestDriverIds);$i++){ ?>
                                <tr <?php echo disableArray($drugTestDTestData,$drugTestDriverIds[$i]); ?>>
                                    <td>
                                <form method="post" action="<?php base_url()?>" class="driver_drug_test" style="border-bottom: 1px solid #FF5C5C;margin-bottom:30px;" >
                                    <input type="hidden" name="drug_test_id" value="<?php echo $current_drug_test['id'];?>">
                                    <input type="hidden" name="driver_id" value="<?php echo $drugTestDriverIds[$i];?>">
                                    <div id="drug_test_driver_div_<?php echo $drugTestDriverIds[$i]?>" >
                                    </div>
                                    <div class="row" >
                                        <div class="form-group" class="pull-right" style="text-align: right;margin-right: 30px;"> 
                                            <input type="submit" name="submit" class="btn btn-success">
                                            <!-- <input type="button" name="Finalize"  class="btn btn-primary" value="Finalize"> -->
                                        </div>
                                    </div>
                                </form>
                                </td>
                                </tr>
                            <?php } ?>
                            </table>
                        <?php endif;//end of (!empty($current_drug_test)) ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="sapof_followup">
                    <div class="table-users">
                        <?php 
                            if(!empty($S_FUIds['sapOfIds'])){
                                $sapOfIds = unserialize($S_FUIds['sapOfIds']);
                                // $sapOfIds = implode(',', array_keys($sapOfIds));
                            }
                            if(!empty($S_FUIds['followUpIds'])){
                                $followUpIds = unserialize($S_FUIds['followUpIds']);
                                // $followUpIds = implode(',', array_keys($followUpIds));
                            }

                         ?>
                        <table id="sapof_followup_pending_table" style="width:100%;">
                        <?php foreach($sapOfIds as $driverId => $drugTestId){ ?>
                            <tr>
                                <td>
                            <form method="post" action="<?php base_url()?>" class="driver_drug_test_sapOf_andFollowUp" style="border-bottom: 1px solid #FF5C5C;margin-bottom:30px;" >
                                <input type="hidden" name="drug_test_id" value="<?php echo $drugTestId;?>">
                                <input type="hidden" name="driver_id" value="<?php echo $driverId;?>">
                                <div id="sapof_followup_div_<?php echo $driverId?>" >
                                </div>
                                <div class="row" >
                                    <div class="form-group" class="pull-right" style="text-align: right;margin-right: 30px;"> 
                                        <input type="submit" name="submit" class="btn btn-success">
                                        <!-- <input type="button" name="Finalize"  class="btn btn-primary" value="Finalize"> -->
                                    </div>
                                </div>
                            </form>
                                </td>
                            </tr>
                        <?php } ?>
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
                                      <td><?php echo $value['phonenumber'];?></td>
                                      <td><?php echo getDateFromDB($value['expiry_date']);?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_1'] ?></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_1_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_2'] ?></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_2_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="medical_expiry" class="pending_works empty_medical_r1"><?php echo $value['reminder_3'] ?></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_3_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                          <a  data-name="extra_data" data-emptytext="No CVOR PULLED"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="CVOR PULLED" data-value="<?php echo $value['extra_data']?>" data-p_type="medical_expiry" class="temp_received cvorpulled"></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','extra_data_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="completed_date" data-emptytext="Not Completed" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="Update Medical Expiry" data-p_type="medical_expiry" class="pending_works"><?php echo getDateFromDB($value['completed_date']) ?></a>
                                        <div class="updated_date">
                                            <?php 
                                          $updated_date = getDateFromDB(get_rec_meta_data(['tbl_name'=>'pending_works','tbl_col'=>'medical_expiry_completed_date_time','tbl_item_id'=>$value['action_on_id']]));
                                          
                                          if(!empty($updated_date)){
                                                echo $updated_date;}else{
                                                    echo getDateFromDB(meta_data('pending_works','medical_expiry_completed_date_time',$value['id']));
                                                } ?>
                                        </div>

                                      </td>
                                      <td>
                                          <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="medical_expiry" class="temp_received"></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','is_completed_time',$value['id'])); ?></div>
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
                              <th scope="col">STATUS</th>
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
                                      <td><?php echo getDateFromDB($value['expiry_date']);?></td>
                                      <td><?php echo $value['o_op_name'] ?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_1'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_1_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_2'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_2_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="truck_annual_due" class="pending_works"><?php echo $value['reminder_3'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_3_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-type="address" data-name="completed_date" data-pk="<?php echo $value['id']?>" data-title="Receive Certificate" class="date_select" data-emptytext="No Certificate" data-p_type="truck_annual_due" data-conform="receive_certificate" <?php if(!empty($value['completed_date'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['completed_date']) ?>", conform: "<?php echo meta_data('pending_works','receive_certificate',$value['id']);?>"}' <?php } ?> ></a>
                                          
                                        <div class="updated_date">
                                            
                                            <?php 
                                          $updated_date = getDateFromDB(get_rec_meta_data(['tbl_name'=>'pending_works','tbl_col'=>'truck_annual_due_completed_date_time','tbl_item_id'=>$value['action_on_id']]));
                                          
                                          if(!empty($updated_date)){
                                                echo $updated_date;}else{
                                                    echo getDateFromDB(meta_data('pending_works','truck_annual_due_completed_date_time',$value['id']));
                                                } ?>
                                        </div>
                                      </td>
                                      <td>
                                        <a data-type="address"  data-name="received_pm_sheet" data-pk="<?php echo $value['id']?>" data-title="Received PM Sheet"  class="date_select" data-emptytext="No Received" data-p_type="truck_annual_due" data-conform="received_pm_sheet" <?php if(!empty($value['received_pm_sheet'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['received_pm_sheet']) ?>", conform: "<?php echo meta_data('pending_works','received_pm_sheet',$value['id']);?>"}' <?php } ?> ></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','truck_annual_due_received_pm_sheet_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a data-type="address"  data-name="received_mechinic_invoice" data-pk="<?php echo $value['id']?>" data-title="Received Mechinic Invoice"  class="date_select" data-emptytext="No Received" data-p_type="truck_annual_due" data-conform="received_mechinic_invoice" <?php if(!empty($value['received_mechinic_invoice'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['received_mechinic_invoice']) ?>", conform: "<?php echo meta_data('pending_works','received_mechinic_invoice',$value['id']);?>"}' <?php } ?> ></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','truck_annual_due_received_mechinic_invoice_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="is_completed" data-emptytext="Empty"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="truck_annual_due" class="temp_received"></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','is_completed_time',$value['id'])); ?></div>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="11"><h4 class="text-center">No Pending Work</h4></td>
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
                              <th scope="col">STATUS</th>
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
                                      <td><?php echo getDateFromDB($value['expiry_date']);?></td>
                                      <td><?php echo $value['o_op_name'] ?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_1'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_1_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_2'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_2_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="trailer_annual_due" class="pending_works"><?php echo $value['reminder_3'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_3_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-type="address" data-name="completed_date" data-pk="<?php echo $value['id']?>" data-title="Receive Certificate" class="date_select" data-emptytext="No Certificate" data-p_type="trailer_annual_due" data-conform="receive_certificate" <?php if(!empty($value['completed_date'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['completed_date']) ?>", conform: "<?php echo meta_data('pending_works','receive_certificate',$value['id']);?>"}' <?php } ?> ></a>
    
                                      <div class="updated_date">
                                          
                                          <?php 
                                        $updated_date = getDateFromDB(get_rec_meta_data(['tbl_name'=>'pending_works','tbl_col'=>'trailer_annual_due_completed_date_time','tbl_item_id'=>$value['action_on_id']]));
                                        
                                        if(!empty($updated_date)){
                                              echo $updated_date;}else{
                                                  echo getDateFromDB(meta_data('pending_works','trailer_annual_due_completed_date_time',$value['id']));
                                              } ?>
                                      </div>
                                      </td>
                                      <td>
                                        <a data-type="address"  data-name="received_pm_sheet" data-pk="<?php echo $value['id']?>" data-title="Received PM Sheet"  class="date_select" data-emptytext="No Received" data-p_type="trailer_annual_due" data-conform="received_pm_sheet" <?php if(!empty($value['received_pm_sheet'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['received_pm_sheet']) ?>", conform: "<?php echo meta_data('pending_works','received_pm_sheet',$value['id']);?>"}' <?php } ?> ></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','trailer_annual_due_received_pm_sheet_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a data-type="address"  data-name="received_mechinic_invoice" data-pk="<?php echo $value['id']?>" data-title="Received Mechinic Invoice"  class="date_select" data-emptytext="No Received" data-p_type="trailer_annual_due" data-conform="received_mechinic_invoice" <?php if(!empty($value['received_mechinic_invoice'])){ ?> data-value='{date: "<?php echo getDateFromDB($value['received_mechinic_invoice']) ?>", conform: "<?php echo meta_data('pending_works','received_mechinic_invoice',$value['id']);?>"}' <?php } ?> ></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','trailer_annual_due_received_mechinic_invoice_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="is_completed" data-emptytext="Empty"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="trailer_annual_due" class="temp_received"></a>
                                          <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','is_completed_time',$value['id'])); ?></div>
                                      </td>
                                    </tr>
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td colspan="11"><h4 class="text-center">No Pending Work</h4></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade " id="driver_annual_review">
                    <div class="table-users">
                       <table class="table table-bordered pending_work_tbl">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Driver Name</th>
                              <th scope="col">Phone No#</th>
                              <th scope="col">ANNUAL SAFETY EXPIRY</th>
                              <th scope="col">1ST REMINDER</th>
                              <th scope="col">2nd REMINDER</th>
                              <th scope="col">3rd REMINDER</th>
                              <th scope="col">COMPLETE</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php if(count($driver_annual_review)){ ?>
                            <?php $count = 1; ?>
                                <?php foreach ($driver_annual_review as $value) { ?>
                                
                                    <tr>
                                      <th scope="row"><?php //echo $count++;?></th>
                                      <td><?php echo $value['name_of_action'];?></td>
                                      <td><?php echo $value['phonenumber'];?></td>
                                      <td><?php echo getDateFromDB($value['expiry_date']);?></td>
                                      <td>
                                        <a  data-name="reminder_1" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 1st Reminder" data-p_type="driver_annual_review" class="pending_works"><?php echo $value['reminder_1'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_1_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_2" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 2nd Reminder" data-p_type="driver_annual_review" class="pending_works"><?php echo $value['reminder_2'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_2_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="reminder_3" data-emptytext="No Reminder" data-type="textarea" data-pk="<?php echo $value['id']?>" data-title="Enter 3rd Reminder" data-p_type="driver_annual_review" class="pending_works"><?php echo $value['reminder_3'] ?></a><div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','reminder_3_time',$value['id'])); ?></div>
                                      </td>
                                      <td>
                                        <a  data-name="completed_date" data-emptytext="Not Completed" data-inputclass='default-date-picker' data-type="text" data-pk="<?php echo $value['id']?>" data-title="Update Driver Annual Review" data-p_type="driver_annual_review" class="pending_works"><?php echo getDateFromDB($value['completed_date']) ?></a>
                                        <div class="updated_date">

                                            <?php 
                                          $updated_date = getDateFromDB(get_rec_meta_data(['tbl_name'=>'pending_works','tbl_col'=>'driver_annual_review_completed_date_time','tbl_item_id'=>$value['action_on_id']]));
                                          
                                          if(!empty($updated_date)){
                                                echo $updated_date;}else{
                                                    echo getDateFromDB(meta_data('pending_works','driver_annual_review_completed_date_time',$value['id']));
                                                } ?>
                                        </div>

                                      </td>
                                      <td>
                                          <a  data-name="is_completed" data-emptytext="Done"  data-type="select" data-pk="<?php echo $value['id']?>" data-title="Is Completed" data-value="<?php echo $value['is_completed']?>" data-p_type="driver_annual_review" class="temp_received"></a>
                                        <div class="updated_date"><?php echo getDateFromDB(meta_data('pending_works','is_completed_time',$value['id'])); ?></div>
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
                    "minPeriod": "mm",
                    "parseDates": true,
                    "gridAlpha": 0.15,
                    "minorGridEnabled": true,
                    "axisColor": "#DADADA",
                    "labelFrequency":1
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
                    "categoryBalloonDateFormat": "MMM/YYYY",
                    "fullWidth": true,
                    "pan": true,
                    "valueLineEnabled": true,
                    "valueLineBalloonEnabled": true,
                    "cursorAlpha":1,
                    "cursorColor":"#41cac0",
                    "limitToGraph":"g1",
                    "valueLineAlpha":0.2,
                    "valueZoomable":true
                },
                "chartScrollbar": {
                    "scrollbarHeight": 40,
                    "color": "#FFFFFF",
                    "autoGridCount": false,
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
            for (var i = 0; i < data.length; i++) {
                chartData.push({
                    date: data[i].date,
                    visits: data[i].value
                });
            }
        }


        function zoomChart() {

            chart.zoomToIndexes(chartData.length - 24, chartData.length - 1);
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
    $(document).ready(function(){
        $(".mm-yyyy-date-picker").change(function(){
            date = $(this).val();
            $this = $(this);
            $.ajax({
                type:'post',
                data: {'date':date},
                dataType: 'json',
                url: '<?=base_url('dashboard/ajax_date_data')?>',
                success: function(data, textStatus, jqXHR) {
                    // When AJAX call is successfuly
                    console.log(data);
                    $this.parentsUntil('.modal-content').find('.old-date-edit-model').html("<h4 style='margin-top: 1px;'>"+data+"</h4>");
                    
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // When AJAX call has failed
                    console.log('AJAX call failed.');
                    console.log(textStatus + ': ' + errorThrown);
                },
                complete: function() {
                    // When AJAX call is complete, will fire upon success or when error is thrown
                    console.log('AJAX call completed');
                }
            });
        });
    });

    $(document).ready(function(){
        $(".panel-heading").click(function(){
            var $this = $(this);
            var id = $this.find('a').attr("href");
            $this.find('i').toggleClass(function() {
              if ( $( this ).is( ".glyphicon-rotate" ) ) {
                $( this ).removeClass("glyphicon-rotate");
                $(id).slideUp(10);

                var getdata = JSON.parse($.cookie('ispanelhideDashboard'));
                var index = getdata.indexOf(id);
                if (index > -1) {
                  getdata.splice(index, 1);
                }

                if(getdata.length == 0 ){
                $.removeCookie('ispanelhideDashboard', { path: '/' });
                }else{
                arr = JSON.stringify(getdata);
                $.cookie('ispanelhideDashboard', arr, { expires: 30, path: '/' });

                }

                return "";
              } else {
                $(id).slideDown(10);
                if($.cookie('ispanelhideDashboard') != undefined){
                    var getdata = JSON.parse($.cookie('ispanelhideDashboard'));
                    getdata.push(id);
                    arr = JSON.stringify(getdata);
                    $.cookie('ispanelhideDashboard', arr, { expires: 30, path: '/' });
                }else{
                    $.cookie('ispanelhideDashboard', JSON.stringify([id]), { expires: 30, path: '/' });
                }
                return "glyphicon-rotate";
              }
            });
        });
        
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        if($.cookie('ispanelhideDashboard') != undefined){
            var getdata = JSON.parse($.cookie('ispanelhideDashboard'));
            for(var i=0;i < getdata.length;i++){
                $this = $(getdata[i]);
                $this.slideDown(10);
                $this.parents('.panel-group').find('i').addClass("glyphicon-rotate");
            }
        }
    });
</script>
<!-- Drug Test -->

<?php //require __dir__."\..\include\drugTestJsFunc.php"; ?>
<script type="text/javascript">
    <?php 
    $value = $drugTestDriverIds;
    set_data($drugTestDTestData);
                for($i =0; $i< count($value);$i++){ 
                    $driver_name = get_from('drivers','first_name,middle_name,last_name',['id'=>$value[$i]]);
                    $driverName = $driver_name['first_name'].' '.$driver_name['middle_name'].' '.$driver_name['last_name'];
                        ?> 
                    var value = <?php echo $value[$i]?>;
                    $("#drug_test_driver_div_"+value).append('<div id="driver_div_'+<?php echo $value[$i]?>+'"><div class="col-md-2"><div class="form-group "> <label for="location" class="control-label ">Driver Name#<span class="driver_count"></span> </label><h4><?php echo $driverName?></h4></div></div><div class="col-md-2"><div class="form-group "> <label for="is_dna_'+<?php echo $value[$i]?>+'" class="control-label">Drug/Alcohol</label> <select class="form-control m-bot15" name="is_dna_'+<?php echo $value[$i]?>+'" id="is_dna_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div id="drug_alcohol_selected_'+<?php echo $value[$i]?>+'"></div><div class="clearfix"></div></div>');
                    $(".driver_count").each(function(i, selected){
                        $(selected).text(i+1);
                    });
                         
                    <?php if(get_data('is_dna_'.$value[$i]) != ''): ?>

                        $('#drug_alcohol_selected_'+<?php echo $value[$i]?>).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square second_switch_'+<?php echo $value[$i]?>+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="dtest_cmplt_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_'+<?php echo $value[$i]?>+'" <?php echo (get_data( 'dtest_cmplt_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="dtest_cmplt_div_'+<?php echo $value[$i]?>+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+<?php echo $value[$i]?>+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('dtest_cmplt_date_'.$value[$i]) ?>" name="dtest_cmplt_date_'+<?php echo $value[$i]?>+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" class="control-label">Result</label> <select class="form-control m-bot15" name="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" id="dtest_cmplt_r_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_file_'+<?php echo $value[$i]?>+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file_'.$value[$i],true)).'/'.$driverName.' Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div><div class="clearfix"></div>');

                        //$('.second_switch_'+<?php echo $value[$i]?>)['bootstrapSwitch']();

                    <?php endif; ?>
                    <?php 
                        if(get_data('dtest_cmplt_'.$value[$i]) == 'on'){
                    ?>
                    
                            dtest_cmplt_func(true,<?php echo $value[$i]?>);
 
                    <?php
                        }
                    
                            
                        
                }//dtest_cmplt_ 
                    ?>



function dtest_cmplt_func(value,num){
    if(value){
        $("#dtest_cmplt_div_"+num).fadeIn(200);
        //$('#sap_row_'+num).fadeIn(200);
        
    }else{
        $("#dtest_cmplt_div_"+num).fadeOut(200);
        $('#sap_row_'+num).remove();
        // re set the Date and result also file
        // console.log('asd');
        $('input[name="dtest_cmplt_date_'+num+'"]').val('');
        $('select[name="dtest_cmplt_r_'+num+'"] option:selected').removeAttr("selected");
        $('select[name="dtest_cmplt_r_'+num+'"] option:first').attr("selected", true);
    }
}



    $(document).on('change','input[type=checkbox]',function(){
                 
        if(this.id.slice(0,11) == 'dtest_cmplt'){
            arr = this.id.split('_');
            dtest_cmplt_func(this.checked == true,arr[arr.length - 1]);
        }

        if(this.id.slice(0,12) == 'sap_appoint_'){
            arr = this.id.split('_');
            sap_app_func(this.checked == true,arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,11) == 'sap_letter_'){
            arr = this.id.split('_');
            sap_letter_func(this.checked == true,arr[arr.length - 1]);
            rtd_func(this.checked == true,arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,10) == 'rtd_cmplt_'){
            arr = this.id.split('_');
            rtd_switch_func(this.checked == true,arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,12) == 'fup_dtcmplt_'){
            arr = this.id.split('_');
            fup_dtcmplt_func(this.checked == true,arr[arr.length - 2],arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,10) == 'sap_finst_'){
            arr = this.id.split('_');
            sap_finst_func(this.checked == true,arr[arr.length - 1]);
            
        }
                
    });


    $(document).on('change','select',function(){
                 // console.log(this.id.slice(0,14));

        if(this.id.slice(0,7) == 'is_dna_'){//console.log(this.id.slice(0,11));

            arr = this.id.split('_');

            drug_alcohol_selected($(this).val(),arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,14) == 'dtest_cmplt_r_'){//console.log(this.id.slice(0,11));

            arr = this.id.split('_');

            dtest_cmplt_r_func($(this).val(),arr[arr.length - 1]);
            
        }

        if(this.id.slice(0,12) == 'rtd_cmplt_r_'){//console.log(this.id.slice(0,11));

            arr = this.id.split('_');

            follow_up_func($(this).val(),arr[arr.length - 1]);
            
        }
                
    });

    function sap_app_func(value,num){
        if(value){
            $("#sap_app_div_"+num).fadeIn(200);
        }else{
            $("#sap_app_div_"+num).fadeOut(200);
        }
    }

    function sap_letter_func(value,num){
        if(value){
            $("#sap_letter_file_div_"+num).fadeIn(200);
        }else{
            $("#sap_letter_file_div_"+num).fadeOut(200);
        }
    }

    function rtd_switch_func(value,num){
        if(value){
            $("#rtd_cmplt_div_"+num).fadeIn(200);
        }else{
            $('#follow_up_div_'+num).empty();
            $("#rtd_cmplt_div_"+num).fadeOut(200);
            //these things to reset if switch is off
            $('input[name="rtd_cmplt_date_'+num+'"]').val('');
            $('select[name="rtd_cmplt_r_'+num+'"] option:selected').removeAttr("selected");
            $('select[name="rtd_cmplt_r_'+num+'"] option:first').attr("selected", true);
        }
    }

    function sap_finst_func(value,num){
        if(value){
            $("#sap_fi_nite_div_"+num).fadeIn(200);
        }else{
            $("#sap_fi_nite_div_"+num).fadeOut(200);
        }
    }

    function fup_dtcmplt_func(value,num,count){
        if(value){
            $('#fup_dcom_div_'+num+'_'+count).fadeIn(200);
        }else{

            $('#fup_dcom_div_'+num+'_'+count).fadeOut(200);

            //these things to reset if switch is off
            // $('input[name="fup_dt_date_'+num+'_'+count+'"]').val('');
            // $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:selected').removeAttr("selected");
            $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:selected').prop('selected', false);
            check_follow_ups_result(num);
        }
    }

    function check_follow_ups_result(num){

        totalFollowUps = $("#fup_no_"+num).val();
        var showIsComplete = true;
        var OrAnyValuePositive = false;
        for(var i = 1 ; i <= totalFollowUps ; i++){
            if($("#fup_dt_cr_"+num+"_"+i).length != 0){
                value = $("select[id='fup_dt_cr_"+num+"_"+i+"'] option:selected").val();
                if(value == ''){
                    showIsComplete =  false;
                    // break;
                }
                if(value == 'pos'){
                    OrAnyValuePositive =  true;
                    // break;
                }
            }else{
                showIsComplete =  false;
                    // break;
            }
        }
        if(totalFollowUps == 0){
            showIsComplete =  false;
        }
        if(showIsComplete || OrAnyValuePositive){
            $("#is_follow_up_completed_div_"+num).fadeIn();
        }else{
            $("#is_follow_up_completed_div_"+num).fadeOut();
        }
    }

    function drug_alcohol_selected(result,id){

        if(result != ''){
            
            if($('#sap_row_'+id).length !=0)
            $('#sap_row_'+id).remove();

            $('#drug_alcohol_selected_'+id).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+id+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square second_switch_'+id+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="dtest_cmplt_'+id+'" name="dtest_cmplt_'+id+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="dtest_cmplt_div_'+id+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+id+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('dtest_cmplt_date') ?>" name="dtest_cmplt_date_'+id+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+id+'" class="control-label">Result</label> <select class="form-control m-bot15" name="dtest_cmplt_r_'+id+'" id="dtest_cmplt_r_'+id+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'dtest_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'dtest_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+id+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file_') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file_') !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="dtest_cmplt_file_'+id+'" name="dtest_cmplt_file_'+id+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file_')).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_') != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div><div class="clearfix"></div>');
        }
        $('.second_switch_'+id)['bootstrapSwitch']();
    }

    function dtest_cmplt_r_func(result,value){

        if(result == 'pos'){
            
            

            $("#sap_div_"+value).append('<div id="sap_row_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">'+driver_name+' ( SAP OF )</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_appoint_'+value+'" name="sap_appoint_'+value+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="sap_app_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('dtest_cmplt_date') ?>" name="sap_app_date_'+value+'"></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_note_'+value+'" name="sap_note_'+value+'"><?php echo get_data( 'acci_des_detail');?></textarea></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_letter_'+value+'" name="sap_letter_'+value+'" <?php echo (get_data( 'sap_appoint')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+value+'" style="display: none;"> <label for="sap_letter_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="sap_letter_file_'+value+'" name="sap_letter_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+value+'" class="control-label">Further Instructions</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_finst_'+value+'" name="sap_finst_'+value+'" <?php echo (get_data( 'sap_finst')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+value+'" style="display: none;"> <label for="sap_fi_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_fi_note_'+value+'" name="sap_fi_note_'+value+'"><?php echo get_data( 'acci_des_detail');?></textarea></div></div><div id="rtd_div_'+value+'"></div></div>');
            
                $('.third_switch_'+value)['bootstrapSwitch']();

        }else{
            $('#sap_row_'+value).remove();
        }


    }


    function follow_up_func(result,value){

        if(result == 'neg'){
            $("#is_sap_completed_div_"+value).fadeOut(100);

            $("#follow_up_div_"+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">'+driver_name+' ( Follow Up )</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+value+'" name="fup_no_'+value+'"><div id="fup_div_'+value+'" style="margin-bottom: 15px;"></div><div class="form-group"><div class="col-sm-12"><div style="text-align: center">             <div class="col-md-12"  id="is_follow_up_completed_div_'+value+'" style="display:none;text-align:center"><div><div class="form-group "> <label for="is_follow_up_completed_'+value+'" class="control-label">Are Follow Ups Completed?</label><div class="form-group "><div class="is_follow_up_completed_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_follow_up_completed_'+value+'" name="is_follow_up_completed_'+value+'" /></div></div></div></div></div>               <button type="button" id="fup_add_btn_'+value+'" onclick="fup_add_func('+value+')" class="btn btn-primary multi-button" >Add Follow Up Details</button> <button type="button" id="fup_dlt_btn_'+value+'"  onclick="fup_dlt_func('+value+')" class="btn btn-primary multi-button" style="display: none;">Delete Follow Up Details</button></div></div></div></div>');
                $('.fup_switch_'+value)['bootstrapSwitch']();
                $('.is_follow_up_completed_'+value)['bootstrapSwitch']();

        }else{
            $("#is_sap_completed_div_"+value).fadeIn(100);
            $('#follow_up_div_'+value).empty();
        }


    }

    function fup_add_func(value){

            $(this).attr("disabled", true);
            var count = $("#fup_no_"+value).val();
            if (count === "" || count === null) {
                count = 0;
            }
            count = ++count;
            $("#fup_div_"+value).append('<div id="injuriedp_count_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_'+value+'_'+count+'" class="control-label text-center"></label></div></div><div class="col-md-11"> <span id="fup_row_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_cmplt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+value+'_'+count+'" class="control-label">Schedule Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_sche_c_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square fup_switch_'+value+'_'+count+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="fup_dtcmplt_'+value+'_'+count+'" name="fup_dtcmplt_'+value+'_'+count+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?> onchange="check_follow_ups_result('+value+');"/></div></div></div></div><div id="fup_dcom_div_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_dt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+value+'_'+count+'" class="control-label">Result</label> <select class="form-control m-bot15" name="fup_dt_cr_'+value+'_'+count+'" id="fup_dt_cr_'+value+'_'+count+'" onchange="check_follow_ups_result('+value+');"><option value="">Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="fup_cmplt_file_'+value+'_'+count+'" name="fup_cmplt_file_'+value+'_'+count+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div> </span></div><div class="clearfix"></div></div>');
                $('.fup_switch_'+value+'_'+count)['bootstrapSwitch']();

            $('#count_injp_'+value+'_'+count ).text(count);
            if (count >= 1) {
                $("#fup_dlt_btn_"+value).show();
            }
            if (count == 1) {
                $("#fup_div"+value).fadeIn(100);
            }
            $("#fup_no_"+value).val(count);
            $(this).attr("disabled", false);
     
        check_follow_ups_result(value);
    }

    function fup_dlt_func(value){
        //Delete Provide your employment history for last 3 to 7 years (if any)

            var count = $("#fup_no_"+value).val();
            if (count === "" || count === null) {
                count = 0;
            }

            $('#injuriedp_count_'+value+'_'+count ).remove();

            count = --count;

            if (count <= 0) {
                $("#fup_dlt_btn_"+value).hide();
                $("#fup_div"+value).fadeOut(100);
            }
            $("#fup_no_"+value).val(count);
            //$(this).attr("disabled", false);
            $("#fup_add_btn_"+value).attr("disabled", false);
        check_follow_ups_result(value);
        
    }


    function rtd_func(result,value){

        if(result == true){
            
            $("#rtd_div_"+value).append('<span id="rtd_row_'+value+'"><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+value+'" class="control-label">Return to Duty</label> <select class="form-control m-bot15" name="rtd_switch_'+value+'" id="rtd_switch_'+value+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna')=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna')=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna')=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+value+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="rtd_cmplt_'+value+'" name="rtd_cmplt_'+value+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="rtd_cmplt_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="rtd_cmplt_date_'+value+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+value+'" class="control-label">Result</label> <select class="form-control m-bot15" name="rtd_cmplt_r_'+value+'" id="rtd_cmplt_r_'+value+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="rtd_cmplt_file_'+value+'" name="rtd_cmplt_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div>                <div class="col-md-12" id="is_sap_completed_div_'+value+'" style="display:none;"><div class="pull-right"><div class="form-group "> <label for="is_sap_completed_'+value+'" class="control-label">Is Sap Of Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_sap_completed_'+value+'" name="is_sap_completed_'+value+'" /></div></div></div></div></div>           </div><div id="follow_up_div_'+value+'"></div></span>');
                $('.rtd_switch_'+value)['bootstrapSwitch']();
                $('#is_sap_completed_'+value)['bootstrapSwitch']();

        }else{
            $('#rtd_row_'+value).remove();
        }


    }


</script>
<!-- Drug Test End -->
<script type="text/javascript">
$(document).ready(function(){

        <?php 
    foreach($sapOfIds as $driverId => $drugTestId):
        $value = array();
        $value[] = $driverId;
        $drug_detail = $CI->getDrugTestDataById($drugTestId);


        if(isset($drug_detail['id'])){
            //var_dump($drug_detail['driver_id']);
            if(isset($drug_detail['driver_id'])){
                $temp_arr = unserialize($drug_detail['driver_id']);
                if(is_array($temp_arr)){
                    $drug_detail['driver_id'] =  $temp_arr;
                }
            }
            
            $dbfields=[

                        'dtestdata',
                        'sapdata',
                        'rtddata',
                        'fupdata',
                        'is_sap_completed',
                        'is_follow_up_completed',

            ];

            for($i =0 ; $i<count($dbfields);$i++):
                if(isset($drug_detail[$dbfields[$i]])){

                    $temp_arr = unserialize($drug_detail[$dbfields[$i]]);
                    if(is_array($temp_arr)){
                        unset($drug_detail[$dbfields[$i]]);
                        $drug_detail=array_merge($drug_detail,$temp_arr);
                    }
                
                }
            endfor;

            set_data($drug_detail);
            $id=$drug_detail['id'];

            
        }else{
            $id='';
        }

        for($i =0; $i< count($value);$i++){
            $driverName = getDriverFullName($value[$i]);
                ?> 
            driver_name = "<?php echo $driverName?>";
            var value = <?php echo $value[$i]?>;
            console.log('asasx');
            $("#sapof_followup_div_"+value).append('<div  id="sap_row_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">'+driver_name+'  ( SAP OF )</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_appoint_'+value+'" name="sap_appoint_'+value+'" <?php echo (get_data( 'sap_appoint_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="sap_app_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('sap_app_date_'.$value[$i]) ?>" name="sap_app_date_'+value+'"></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_note_'+value+'" name="sap_note_'+value+'"><?php echo get_data('sap_note_'.$value[$i]);?></textarea></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_letter_'+value+'" name="sap_letter_'+value+'" <?php echo (get_data('sap_letter_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+value+'" style="display: none;"> <label for="sap_letter_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('sap_letter_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('sap_letter_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="sap_letter_file_'+value+'" name="sap_letter_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('sap_letter_file_'.$value[$i],true)).'/'.getDriverFullName($value[$i]).' Authorization File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('sap_letter_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+value+'" class="control-label">Further Instructions</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_finst_'+value+'" name="sap_finst_'+value+'" <?php echo (get_data('sap_finst_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+value+'" style="display: none;"> <label for="sap_fi_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_fi_note_'+value+'" name="sap_fi_note_'+value+'"><?php echo get_data('sap_fi_note_'.$value[$i]);?></textarea></div></div><div id="rtd_div_'+value+'"></div></div>');
            
            <?php
                if(get_data('sap_appoint_'.$value[$i]) == 'on'):
            ?>
                    sap_app_func(true,<?php echo $value[$i]?>);
            <?php
                endif;
                

                if(get_data('sap_finst_'.$value[$i]) == 'on'):
            ?>
                    sap_finst_func(true,<?php echo $value[$i]?>);
            <?php
                endif;   


                if(get_data('sap_letter_'.$value[$i]) == 'on'){
            ?>
                sap_letter_func(true,<?php echo $value[$i]?>);

                

                $("#rtd_div_"+value).append('<div class="clearfix"></div><span id="rtd_row_'+value+'"><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+value+'" class="control-label">Return to Duty</label> <select class="form-control m-bot15" name="rtd_switch_'+value+'" id="rtd_switch_'+value+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data('rtd_switch_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data('rtd_switch_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data('rtd_switch_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+value+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="rtd_cmplt_'+value+'" name="rtd_cmplt_'+value+'" <?php echo (get_data('rtd_cmplt_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="rtd_cmplt_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date_'.$value[$i]) ?>" name="rtd_cmplt_date_'+value+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+value+'" class="control-label">Result</label> <select class="form-control m-bot15" name="rtd_cmplt_r_'+value+'" id="rtd_cmplt_r_'+value+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('rtd_cmplt_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="rtd_cmplt_file_'+value+'" name="rtd_cmplt_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file_'.$value[$i],true)).'/'.getDriverFullName($value[$i]).' Return to Duty Test File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div>                <div class="col-md-12" id="is_sap_completed_div_'+value+'" style="display:none;"><div class="pull-right"><div class="form-group "> <label for="is_sap_completed_'+value+'" class="control-label">Is Sap Of Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_sap_completed_'+value+'" name="is_sap_completed_'+value+'" <?php echo (get_data('is_sap_completed_'.$value[$i])=='on' )? 'checked': ''; ?> /></div></div></div></div></div>               </div><div id="follow_up_div_'+value+'"></div></span>');
            <?php
                            

                if(get_data('rtd_cmplt_'.$value[$i]) == 'on'):
            ?>
                    rtd_switch_func(true,<?php echo $value[$i]?>);
            <?php
                   
                if(get_data('rtd_cmplt_r_'.$value[$i]) == 'neg'){

            ?>  

                    $("#follow_up_div_"+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">'+driver_name+' ( Follow Up )</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+value+'" name="fup_no_'+value+'" value="<?php echo get_data('fup_no_'.$value[$i]) ?>"><div id="fup_div_'+value+'" style="margin-bottom: 15px;"></div><div class="form-group"><div class="col-sm-12"><div style="text-align: center">        <div class="col-md-12"  id="is_follow_up_completed_div_'+value+'" style="display:none;text-align:center"><div><div class="form-group "> <label for="is_follow_up_completed_'+value+'" class="control-label">Are Follow Ups Completed?</label><div class="form-group "><div class=" is_follow_up_completed_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_follow_up_completed_'+value+'" name="is_follow_up_completed_'+value+'" <?php echo (get_data('is_follow_up_completed_'.$value[$i])=='on' )? 'checked': ''; ?> /></div></div></div></div></div>          <button type="button" id="fup_add_btn_'+value+'" onclick="fup_add_func('+value+')" class="btn btn-primary multi-button" >Add Follow Up Details</button> <button type="button" id="fup_dlt_btn_'+value+'"  onclick="fup_dlt_func('+value+')" class="btn btn-primary multi-button" style="display: none;">Delete Follow Up Details</button></div></div></div></div>');
                                $('.is_follow_up_completed_'+value)['bootstrapSwitch']();

            <?php
                for($fupi=1;$fupi<=get_data('fup_no_'.$value[$i]);$fupi++)://fup_no_  
            ?>

                count = <?php echo $fupi;?>;
                $("#fup_div_"+value).append('<div id="injuriedp_count_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_'+value+'_'+count+'" class="control-label text-center"></label></div></div><div class="col-md-11"> <span id="fup_row_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_cmplt_date_'.$value[$i].'_'.$fupi) ?>" name="fup_cmplt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+value+'_'+count+'" class="control-label">Schedule Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_sche_c_date_'.$value[$i].'_'.$fupi) ?>" name="fup_sche_c_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="fup_dtcmplt_'+value+'_'+count+'" name="fup_dtcmplt_'+value+'_'+count+'" <?php echo (get_data( 'fup_dtcmplt_'.$value[$i].'_'.$fupi)=='on' )? 'checked': ''; ?> onchange="check_follow_ups_result('+value+');" /></div></div></div></div><div id="fup_dcom_div_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_dt_date_'.$value[$i].'_'.$fupi) ?>" name="fup_dt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+value+'_'+count+'" class="control-label">Result</label> <select class="form-control m-bot15" name="fup_dt_cr_'+value+'_'+count+'" id="fup_dt_cr_'+value+'_'+count+'" onchange="check_follow_ups_result('+value+');"><option value="">Select Option</option><option value="pos" <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="fup_cmplt_file_'+value+'_'+count+'" name="fup_cmplt_file_'+value+'_'+count+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true)).'/'.getDriverFullName($value[$i]).' Follow Up Test File '?>'+count+'" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div> </span></div><div class="clearfix"></div></div>');
    

                    $('#count_injp_'+value+'_'+count ).text(count);

                    if (count >= 1) {
                        $("#fup_dlt_btn_"+value).show();
                    }

            <?php          
                if(get_data('fup_dtcmplt_'.$value[$i].'_'.$fupi) == 'on'):
            ?>
                    fup_dtcmplt_func(true,<?php echo $value[$i]?>,<?php echo $fupi?>);
                                        
            <?php
                endif;
                            // fup_dtcmplt_func
            endfor; ?>
                check_follow_ups_result(<?php echo $value[$i]?>);
                            
            <?php }// rtd_cmplt_r_
                else{?>
                $('#is_sap_completed_div_'+<?php echo $value[$i]; ?>).fadeIn(); 
            <?php }

                endif;
            }
                
        }//dtest_cmplt_ 
    endforeach;
                    ?>


});

</script>

<script>
  $(function () {

    $('form.driver_drug_test').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('drug/dtestdataUpdate'); ?>',
        data: $(this).serialize(),
        success: function (data) {
          alert(data);
        }
      });

    });

  });
</script>

<script>
  $(function () {

    $('form.driver_drug_test_sapOf_andFollowUp').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('drug/sapAndFollowUp'); ?>',
        data: $(this).serialize(),
        success: function (data) {
          alert(data);
        }
      });

    });

  });
</script>