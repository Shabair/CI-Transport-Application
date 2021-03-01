<!-- page start-->
<?php 
    if(isset($citation_detail['id'])){

        if(isset($citation_detail['training_type'])){
            $temp_arr = unserialize($citation_detail['training_type']);
            if(is_array($temp_arr)){
                $citation_detail['training_type'] =  $temp_arr;
            }
        }


        set_data($citation_detail);
        $id=$citation_detail['id'];
    }else{
        $id='';
    }

    if(!isset($driver_name)){
        $driver_name = '';
    }
?>
<style type="text/css">
    div#back_result{
        
        width:100%;
        margin: 0 auto;
        border: 2px solid #dce4ec;
        border-radius: 5px;
        display: none;
    }

    .suggesions{
        list-style: none;
    }

    

/*.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    background-color: #FF5C5C;
    border-color: #39b2a9;
    color: #FFFFFF;
}*/
.fa-close{
    color: #FF0000;
    font-size: 13px;

}

.form-control {
    height: 34px;

</style>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            <?php if($id == ''){?>
                <h4 class="head3" style="display:inline-block">Add New Citation</h4>
            <?php } else {?>
                <h4 class="head3" style="display:inline-block">Update Citation</h4>
            <?php }?>
            
                <a href="<?php echo site_url('citation') ?>" class="btn btn-primary pull-right">View Citation List</a>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" method="post" enctype="multipart/form-data" action="<?php echo site_url('citation/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
                        <input type="hidden" name="action_token" value="<?php echo $action_token; ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Citation Location</label>
                                    <select class="form-control  m-bot15" name="cita_loc" id="cita_loc">
                                        <option value="" disabled selected value>Select State</option>
                                        <option value="can" <?php echo (get_data('cita_loc')=='can')?'selected':''; ?>>Canadian Citation</option>
                                        <option value="us" <?php echo (get_data('cita_loc')=='us')?'selected':''; ?>>US Citation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Driver Name</label>
                                    <select class="form-control text-capitalize" data-live-search="true" name="driver_id" required>
                                        <option disabled selected value>Select driver name</option>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="offence" class="control-label">Offence</label>
                                    <input class="form-control input-sm" id="offence" name="offence" minlength="2" type="text" required value="<?php echo get_data('offence') ?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="display: none;" id="outcome_div">
                                    <label for="outcome" class="control-label">Outcome</label>
                                    <input class="form-control input-sm" id="outcome" name="outcome" minlength="2" type="text" value="<?php echo get_data('outcome') ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Date</label>
                                    <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('insp_date') ?>" name="insp_date" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="offence_time" class="control-label">Time</label>
                                    <input class=" form-control input-sm" id="offence_time" name="offence_time" minlength="2" type="text" required value="<?php echo get_data('offence_time') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="Location" class="control-label">Location</label>
                                    <input class="form-control input-sm" id="Location" name="Location" minlength="2" type="text" required value="<?php echo get_data('Location') ?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="other_state" class="control-label">Other State</label>
                                    <input class=" form-control input-sm" id="other_state" name="other_state"  type="text" value="<?php echo get_data('other_state') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Plenty" class="control-label">Plenty</label>
                                    <input class=" form-control input-sm" id="Plenty" name="Plenty" minlength="2" type="text" required value="<?php echo get_data('Plenty') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-1" id="cvor_point_div" style="display: none;">
                                <div class="form-group">
                                    <label for="cvor_point" class="control-label">cvor point</label>
                                    <input class=" form-control input-sm" id="cvor_point" name="cvor_point"  type="text" value="<?php echo get_data('cvor_point') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-1" id="save_stat_div" style="display: none;">
                                <div class="form-group">
                                    <label for="save_stat" class="control-label">Save Stat</label>
                                    <input class=" form-control input-sm" id="save_stat" name="save_stat"  type="text" value="<?php echo get_data('save_stat') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-1" id="demerit_div" style="display: none;">
                                <div class="form-group">
                                    <label for="demerit" class="control-label">Demerit</label>
                                    <input class=" form-control input-sm" id="demerit" name="demerit"  type="text" value="<?php echo get_data('demerit') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="moving_voilation" class="control-label">Moving Voilation</label>
                                    <div class="form-group">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  name="moving_voilation" <?php echo (get_data('moving_voilation')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Log Book Match</label>
                                    <div class="form-group">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  name="match_logbook" <?php echo (get_data('match_logbook')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Statement</label>
                                    <div class="form-group">
                                    <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                        <input type="checkbox" id="statement" name="statement" <?php echo (get_data('statement')=='on')?'checked':''; ?> />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="statement_file" style="display: none;">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('statement_file') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('statement_file') != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="statement_file" name="statement_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('statement_file')).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('statement_file') != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="training_req" class="control-label">Training Required</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  id="training_req" name="training_req" <?php echo (get_data('training_req')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <?php 
                                    if(is_array(get_data('training_type'))){
                                       $training_type = get_data('training_type');
                                    }else{
                                        $training_type = [];
                                    }

                                ?>
                                <div class="form-group" id="training_type_div" style="display:none">
                                    <label for="cname" class="control-label">Training Type</label>
                                    <select class="selectpicker form-control text-capitalize" data-style="btn-primary" data-selected-text-format="count" data-live-search="true" name="training_type[]" id="training_type" multiple>
                                        <!-- <option disabled selected value>Select Training</option> -->
                                        <option value="def_driv" <?php echo (in_array('def_driv', $training_type))?'selected':''; ?> >Defensive Driving</option>
                                        <option value="road_eva" <?php echo (in_array('road_eva', $training_type))?'selected':''; ?>>Road Evalution</option>
                                        <option value="log_book_train"  <?php echo (in_array('log_book_train', $training_type))?'selected':''; ?>>Log Book Traning</option>
                                        <option value="Haz_dang" <?php echo (in_array('Haz_dang', $training_type))?'selected':''; ?>>Hazmat / Dangerous Goods</option>
                                        <option value="wint_drive" <?php echo (in_array('wint_drive', $training_type))?'selected':''; ?>>Winter Driving</option>
                                        <option value="other" <?php echo (in_array('other', $training_type))?'selected':''; ?>>other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="training_text_div"  style="display:none">
                                <div class="form-group " >
                                    <label for="train_text" class="control-label">Name</label>
                                    <input class="form-control" id="train_text" name="train_text" minlength="2" type="text" value="<?php echo get_data('train_text') ?>" />
                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="training_file_div" style="display:none">
                                    <label for="training_file" class="control-label">Training File</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('training_file') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('training_file') != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="training_file" name="training_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('training_file')).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('training_file') != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: none;" id="training_completed_div">
                                <div class="form-group ">
                                    <label for="training_completed" class="control-label">Training Completed</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox"  id="training_completed" name="training_completed" <?php echo (get_data('training_completed')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Warning letter</label>
                                    <input class=" form-control input-sm" id="warning_letter" name="warning_letter" minlength="2" type="text" value="<?php echo get_data('warning_letter') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">&nbsp;</label>
                                    <div class="controls">
                                        <div class="fileupload <?php if(get_data('warning_letter_file') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload"  <?php if(get_data('warning_letter_file') != ''){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?> >
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" id="warning_letter_file" name="warning_letter_file">
                                            </span>
                                            <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('warning_letter_file')).'/'.$driver_name;?>" id="download-a">
                                            <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('warning_letter_file') != '')echo "Download"; ?></span>
                                        </a></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Ticket Fight</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="ticket_fight"  name="ticket_fight" <?php echo (get_data('ticket_fight')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" id="fu_date_div_1">
                                <div class="form-group "><label for="fu_date" class="control-label">Fine Due Date</label><input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fu_date') ?>" name="fu_date" required></div>
                            </div>
                        </div>
                        <div class="row" id="laywer_div" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px; display: none;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_name" class="control-label">Lawyer Name</label>
                                    <input class="form-control" id="lawyer_name" name="lawyer_name" minlength="2" type="text" value="<?php echo get_data('lawyer_name') ?>" />
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_phone" class="control-label">Lawyer Phone No</label>
                                    <input class="form-control" id="lawyer_phone" name="lawyer_phone" minlength="2" type="text" value="<?php echo get_data('lawyer_phone') ?>" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_email" class="control-label">Lawyer Email</label>
                                    <input class="form-control" id="lawyer_email" name="lawyer_email" minlength="2" type="text" value="<?php echo get_data('lawyer_email') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_fee" class="control-label">Lawyer Fee</label>
                                    <input class="form-control" id="lawyer_fee" name="lawyer_fee" minlength="2" type="text" value="<?php echo get_data('lawyer_fee') ?>" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="court_date" class="control-label">Court Date</label>
                                    <input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('court_date') ?>" name="court_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_rtc" class="control-label">Lawyer Requested  To  Attend Court</label>
                                    <div class="form-group ">
                                        <div class="switch switch-square" data-on-label="YES" data-off-label="NO">
                                            <input type="checkbox" id="lawyer_rtc"  name="lawyer_rtc" <?php echo (get_data('lawyer_rtc')=='on')?'checked':''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="lawyer_as_per_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="lawyer_as_per" class="control-label">As Per</label>
                                    <input class="form-control" id="lawyer_as_per" name="lawyer_as_per" type="text" value="<?php echo get_data('lawyer_as_per') ?>" />
                                </div>
                            </div>
                            <div class="col-md-2" id="fu_date_div_2">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="control-label">Comment</label>
                                    <input class=" form-control tagsinput" id="comment" name="comment" type="text" value="<?php echo (get_data('submit'))?get_data('comment'):get_date_taginput(get_data('comment',false,false)) ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Status</label>
                                    <select class="form-control m-bot15" name="status" required>
                                        <option value disabled selected>Select Status</option>
                                        <option value="pending" <?php echo (get_data('status')=='pending')?'selected':''; ?>>Pending</option>
                                        <option value="filed" <?php echo (get_data('status')=='filed')?'selected':''; ?>>Filed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Paid/Unpaid</label>
                                    <select class="form-control m-bot15" name="p_unp" required>
                                        <option value disabled selected>Select Option</option>
                                        <option value="paid" <?php echo (get_data('p_unp')=='paid')?'selected':''; ?>>Paid</option>
                                        <option value="unpaid" <?php echo (get_data('p_unp')=='unpaid')?'selected':''; ?>>Unpaid</option>
                                    </select>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="remarks" class="control-label">Remarks</label>
                                    <input class=" form-control tagsinput" id="remarks" name="remarks" minlength="2" type="text" value="<?php echo (get_data('submit'))?get_data('remarks'):get_date_taginput(get_data('remarks',false,false)) ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" name="submit" value="add" class="btn btn-primary" > 
                                    <?php echo ($id == '')?'Save':'Update'; ?>
                                </button>
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
        }else{
            $("#training_type_div").fadeOut(200);
            $("#training_completed_div").fadeOut(200);
            $("#training_text_div").fadeOut(200);
            $("#training_file_div").fadeOut(200);

        }
    }

    function ticket_fight_func(value){
        if(value){
        $("#laywer_div").fadeIn(200);
        $("#outcome_div").fadeIn(200);

        $("#fu_date_div_1").empty('');

                $("#fu_date_div_2").empty('');
                $("#fu_date_div_2").append('<div class="form-group "><label for="fu_date" class="control-label">Fine Due Date</label><input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo (get_data('fu_date')!='')?get_data('fu_date'):date("m/d/Y"); ?>" name="fu_date" ></div>');



            
        }else{
            $("#laywer_div").fadeOut(200);
            $("#outcome_div").fadeOut(200);

            $("#fu_date_div_1").empty('');
            $("#fu_date_div_2").empty('');
            $("#fu_date_div_1").append('<div class="form-group "><label for="fu_date" class="control-label">Fine Due Date</label><input type="text" data-plugin-datepicker="" data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fu_date') ?>" name="fu_date" required></div>');

        }
    }

    function lawyer_rtc_func(value){
        if(value){
            $("#lawyer_as_per_div").fadeIn(200);
        }else{
            $("#lawyer_as_per_div").fadeOut(200);

        }
    }

    function training_type_func(value){

        if(value.includes('other')){
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
</script>
<script type="text/javascript">

$(document).ready(function(){

    // ticket_fight_func(true);

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

    if (get_data('ticket_fight') == 'on') {

        ?>
            ticket_fight_func(true);
        <?php 
    }
    if(!empty(get_data('training_type'))){
        if (is_array(get_data('training_type')) && in_array('other',get_data('training_type'))) {

            ?>
                training_type_func(['other']);
            <?php 
        }
    }


    if (get_data('cita_loc') != '') {

        ?>
            cita_loc_func("<?php echo get_data('cita_loc'); ?>");
        <?php 
    }

    if (get_data('state') != '') {

        ?>
            state_func("<?php echo get_data('state'); ?>");
        <?php 
    }

    if (get_data('lawyer_rtc') == 'on') {

        ?>
            lawyer_rtc_func(true);
        <?php 
    }

?>


});

$("#training_req").change(function(){
    training_req_func(this.checked == true);

});



$("#statement").change(function(){

    statement_func(this.checked);

});

$("#ticket_fight").change(function(){
    ticket_fight_func(this.checked == true);

});

$('#offence_time').timepicker({
        defaultTime: "<?php echo get_data('offence_time') ?>",
});


$("#training_type").on('change',function(){

        training_type_func($(this).val());

});

$("#cita_loc").on('change',function(){
        cita_loc_func($(this).val());

});

$("#lawyer_rtc").on('change',function(){
        lawyer_rtc_func(this.checked == true);

});
// 
$(document).on('click','#state', function(e){

        state_func($(this).val());

});


</script>

<script type="text/javascript">
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

