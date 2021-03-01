<!-- page start-->
<!-- page start-->
<?php 
    if(isset($citation_detail['id'])){
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
                <h4 class="head3" style="display:inline-block">Citation Details</h4>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Citation Location</label>
                                    <div class="form-control">
                                        <?php echo (get_data('cita_loc')=='can')?'Canadian':''; ?>
                                        <?php echo (get_data('cita_loc')=='us')?'US':''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Driver Name</label>
                                    <div class="form-control">
                                        <?php echo $driver_name; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="offence" class="control-label">offence</label>
                                    <div class="form-control">
                                        <?php echo get_data('offence') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group " style="display: none;" id="outcome_div">
                                    <label for="outcome" class="control-label">Outcome</label>
                                    <div class="form-control">
                                        <?php echo get_data('outcome') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Date</label>
                                    <div class="form-control">
                                        <?php echo get_data('insp_date') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Time</label>
                                    <div class="form-control">
                                        <?php echo get_data('offence_time') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Location</label>
                                    <div class="form-control">
                                        <?php echo get_data('Location') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="city" class="control-label">City</label>
                                    <div class="form-control">
                                        <?php echo get_data('city') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="state" class="control-label">State</label>
                                    <div class="form-control">
                                        <?php 
                                            if(get_data('cita_loc')=='can'):
                                                echo getState(get_data('state'));
                                            else:
                                                echo getUSState(get_data('state'));
                                            endif;

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="other_state_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="other_state" class="control-label">Other State</label>
                                    <div class="form-control">
                                        <?php echo get_data('other_state') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Plenty</label>
                                    <div class="form-control">
                                        <?php echo get_data('Plenty') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" id="cvor_point_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="cvor_point" class="control-label">cvor point</label>
                                    <div class="form-control">
                                        <?php echo get_data('cvor_point') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" id="save_stat_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="save_stat" class="control-label">Save Stat</label>
                                    <div class="form-control">
                                        <?php echo get_data('save_stat') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" id="demerit_div" style="display: none;">
                                <div class="form-group ">
                                    <label for="demerit" class="control-label">Demerit</label>
                                    <div class="form-control">
                                        <?php echo get_data('demerit') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label class="control-label">Moving Voilation</label>
                                    <div class="form-control">
                                        <?php echo (get_data('moving_voilation')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Log Book Match</label>
                                    <div class="form-control">
                                        <?php echo (get_data('match_logbook')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Statement</label>
                                    <div class="form-control">
                                        <?php echo (get_data('statement')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cname" class="control-label">Statement File</label>
                                    <div class="controls">
                                    <?php if (get_data('statement_file') != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('citation/file_download').'/'.basename(get_data('statement_file')).'/'.$driver_name;?>" id="download-a">
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
                            <div class="col-md-2">
                                <div class="form-group" id="training_file_div" style="display:none">
                                    <label for="training_file" class="control-label">Training File</label>
                                    <div class="controls">
                                    <?php if (get_data('training_file') != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('citation/file_download').'/'.basename(get_data('training_file')).'/'.$driver_name;?>" id="download-a">
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
                            <div class="col-md-2" style="display: none;" id="training_completed_div">
                                <div class="form-group ">
                                    <label for="training_completed" class="control-label">Training Completed</label>
                                    <div class="form-control">
                                        <?php echo (get_data('training_completed')=='on')?'Yes':'No'; ?>
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
                                    <label for="cname" class="control-label">Warning Letter File</label>
                                    <div class="controls">
                                    <?php if (get_data('warning_letter_file') != ''): ?>
                                        <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                                        <a href="<?php echo base_url('citation/file_download').'/'.basename(get_data('warning_letter_file')).'/'.$driver_name;?>" id="download-a">
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
                        <div class="row" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px;">
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Ticket Fight</label>
                                    <div class="form-control ">
                                        <?php echo (get_data('ticket_fight')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" id="fu_date_div_1">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Fine Due Date</label>
                                    <div class="form-control">
                                        <?php echo get_data('fu_date') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="laywer_div" style="border-bottom: 1px solid #FF5C5C;padding-bottom: 15px;margin-bottom: 15px; display: none;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_name" class="control-label">Lawyer Name</label>
                                    <div class="form-control">
                                        <?php echo get_data('lawyer_name') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_phone" class="control-label">Lawyer Phone No</label>
                                    <div class="form-control">
                                        <?php echo get_data('lawyer_phone') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_email" class="control-label">Lawyer Email</label>
                                    <div class="form-control">
                                        <?php echo get_data('lawyer_email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="lawyer_fee" class="control-label">Lawyer Fee</label>
                                    <div class="form-control">
                                        <?php echo get_data('lawyer_fee') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="court_date" class="control-label">Court Date</label>
                                    <div class="form-control">
                                        <?php echo get_data('court_date') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="control-label">Lawyer Requested  To  Attend Court</label>
                                    <div class="form-control ">
                                        <?php echo (get_data('lawyer_rtc')=='on')?'Yes':'No'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="lawyer_as_per_div" style="display: none;">
                                <div class="form-group ">
                                    <label class="control-label">As Per</label>
                                    <div class="form-control">
                                        <?php echo get_data('lawyer_as_per') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" id="fu_date_div_2">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="control-label">Comment</label>
                                    <div class="form-control" style="height: 100%;min-height:34px;">
                                        <?php 

                                          $remarks =  explode(',', get_date_taginput(get_data('comment',false,false)));
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Status</label>
                                    <div class="form-control">
                                    <?php echo (get_data('status')=='pending')?'Pending':''; ?>
                                    <?php echo (get_data('status')=='filed')?'Filed':''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="cname" class="control-label">Paid/Unpaid</label>
                                    <div class="form-control">
                                        <?php echo (get_data('p_unp')=='paid')?'Paid':''; ?>
                                        <?php echo (get_data('p_unp')=='unpaid')?'Unpaid':''; ?>
                                    </div>
                                </div>
                            </div> 
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
                $("#fu_date_div_2").append('<div class="form-group "><label for="cname" class="control-label">Fine Due Date</label><div class="form-control"><?php echo get_data('fu_date') ?></div></div>');



            
        }else{
            $("#laywer_div").fadeOut(200);
            $("#outcome_div").fadeOut(200);

            $("#fu_date_div_1").empty('');
            $("#fu_date_div_1").append('<div class="form-group "><label for="cname" class="control-label">Fine Due Date</label><div class="form-control"><?php echo get_data('fu_date') ?></div></div>');

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


    function cita_loc_func(value){
        if(value == 'can'){
            $("#cvor_point_div").fadeIn(200);
            $("#demerit_div").fadeIn(200);
            $("#state_div").fadeIn(200);
            $("#other_state_div").fadeOut(200);
            $("#save_stat_div").fadeOut(200);
            
            
            
        }else{
            $("#cvor_point_div").fadeOut(200);
            $("#demerit_div").fadeOut(200);
            $("#state_div").fadeIn(200);
            
            $("#save_stat_div").fadeIn(200);    
        }
    }

</script>
<script type="text/javascript">

$(document).ready(function(){

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





$('#offence_time').timepicker({
        defaultTime: "<?php echo get_data('offence_time') ?>",
});

</script>