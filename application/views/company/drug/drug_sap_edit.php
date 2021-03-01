<!-- page start-->
<!-- page start-->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<?php 

    if(isset($drug_detail['id'])){
        //var_dump($drug_detail['driver_id']);
        if(isset($drug_detail['driver_id'])){
            $temp_arr = unserialize($drug_detail['driver_id']);
            if(is_array($temp_arr)){
                $drug_detail['driver_id'] =  $temp_arr;
            }
        }
        //var_dump($drug_detail);
        
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

if(!isset($driver_name)){
    $driver_name = '';
}


// $query  = $this->db->query("SELECT `driver_id`,`dtestdata` FROm `drug` WHERE `id` = '".$id."'")->row_array();
// $datata = unserialize($query['dtestdata']);
// // var_dump($datata['is_dna_732']);
// var_dump($datata);

?>

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
        <?php if($this->router->fetch_class() == 'drug'): ?>
            <header class="panel-heading">
            <?php if($id !== ''){?>
                <h4 class="head3" style="display:inline-block">Update Sap Of <?php echo getDriverName($driver_id); ?></h4>
            <?php }?>
                <a href="<?php echo site_url('drug') ?>" class="btn btn-primary pull-right">View Drug List</a>
            </header>
        <?php endif; ?>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" method="post" enctype="multipart/form-data" action="<?php echo site_url('drug/add_single_drug/'); ?>">
                    	<input type="hidden" name="drug_id" value="<?php echo $id;?>">
                    	<input type="hidden" name="driver_id" value="<?php echo $driver_id;?>">
                        <?php 
                            if(!empty($this->input->get('quarter'))){
                                echo '<input type="hidden" name="quarter" value="'.$this->input->get('quarter').'">';
                            }
                        ?>
                        <div class="row" id="driver_id_div">
                            
                        </div>
                        <!-- <div id="sap_div" style="border-top: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 10px;margin-bottom: 15px;">
                        </div> -->
                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                 <?php if($id == ''){
                                     echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>';             
                                  }
                                    else{
                                        echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                                    }
                                  ?>
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

<?php require __dir__.".\..\include\drugTestJsFunc.php"; ?>
<script type="text/javascript">


$(document).ready(function(){


    <?php 

        function js_str($s)
        {
            return '"' . addcslashes($s, "\0..\37\"\\") . '"';
        }

        function js_array($array)
        {
            $temp = array_map('js_str', $array);
            return '[' . implode(',', $temp) . ']';
        }

        if (get_data('driver_id') != '') {

            //$("#driver_id_div").empty();
            $value = get_data('driver_id');
            $divs= [];
            //console.log(value);
            if($value != null){
                for($i =0; $i< count($value);$i++){
                  $divs[$i] = "#driver_div_".$value[$i];  
                }
                for($i =0; $i< count($value);$i++){
                	if($value[$i] == $driver_id):
                        ?>
                    var value = <?php echo $value[$i]?>;
                    childDiv = $("#driver_id_div").children("#driver_div_"+<?php echo $value[$i]?>).length;
                    if(childDiv != 1){
                        driver_name = $("#driver_id option[value='"+<?php echo $value[$i]?>+"']").text();
                        $("#driver_id_div").append('<div id="driver_div_'+<?php echo $value[$i]?>+'" style="<?php echo ($this->router->fetch_class() == 'drug')?' border-bottom: 1px solid #FF5C5C':''; ?>;margin-bottom:30px;"><div class="col-md-2"><div class="form-group "> <label for="location" class="control-label ">Driver Name </label><h4><?php echo getDriverName($driver_id); ?></h4></div></div><div class="col-md-2"><div class="form-group "> <label for="is_dna_'+<?php echo $value[$i]?>+'" class="control-label">Drug/Alcohol</label> <select class="form-control m-bot15" name="is_dna_'+<?php echo $value[$i]?>+'" id="is_dna_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div id="drug_alcohol_selected_'+<?php echo $value[$i]?>+'"></div><div class="clearfix"></div></div>');
                    $(".driver_count").each(function(i, selected){
                        $(selected).text(i+1);
                    });
                        
                        
                    }
                    <?php if(get_data('is_dna_'.$value[$i]) != ''): ?>

                    $('#drug_alcohol_selected_'+<?php echo $value[$i]?>).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square second_switch_'+<?php echo $value[$i]?>+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="dtest_cmplt_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_'+<?php echo $value[$i]?>+'" <?php echo (get_data( 'dtest_cmplt_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="dtest_cmplt_div_'+<?php echo $value[$i]?>+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+<?php echo $value[$i]?>+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('dtest_cmplt_date_'.$value[$i]) ?>" name="dtest_cmplt_date_'+<?php echo $value[$i]?>+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" class="control-label">Result</label> <select class="form-control m-bot15" name="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" id="dtest_cmplt_r_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_file_'+<?php echo $value[$i]?>+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div><div class="clearfix"></div><div id="sap_div_'+<?php echo $value[$i]?>+'"></div>');

                        //$('.second_switch_'+<?php echo $value[$i]?>)['bootstrapSwitch']();

                    <?php endif; ?>
                    <?php 
                        if(get_data('dtest_cmplt_'.$value[$i]) == 'on'){
                    ?>
                    
                        dtest_cmplt_func(true,<?php echo $value[$i]?>);

                    <?php
                        if(get_data('dtest_cmplt_r_'.$value[$i]) == 'pos'): 
                    ?>
                            
                            driver_name = "<?php echo getDriverFullName($value[$i]);?>";

                            $("#sap_div_"+<?php echo $value[$i]?>).append('<div  id="sap_row_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">SAP OF</h4></div><div class="col-md-5"><h4>'+driver_name+'</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_appoint_'+value+'" name="sap_appoint_'+value+'" <?php echo (get_data( 'sap_appoint_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="sap_app_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('sap_app_date_'.$value[$i]) ?>" name="sap_app_date_'+value+'"></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_note_'+value+'" name="sap_note_'+value+'"><?php echo get_data('sap_note_'.$value[$i]);?></textarea></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_letter_'+value+'" name="sap_letter_'+value+'" <?php echo (get_data('sap_letter_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+value+'" style="display: none;"> <label for="sap_letter_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('sap_letter_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('sap_letter_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="sap_letter_file_'+value+'" name="sap_letter_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('sap_letter_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Authorization File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('sap_letter_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+value+'" class="control-label">Further Instructions</label><div class="form-group "><div class="switch switch-square third_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_finst_'+value+'" name="sap_finst_'+value+'" <?php echo (get_data('sap_finst_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+value+'" style="display: none;"> <label for="sap_fi_note_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_fi_note_'+value+'" name="sap_fi_note_'+value+'"><?php echo get_data('sap_fi_note_'.$value[$i]);?></textarea></div></div><div id="rtd_div_'+value+'"></div></div>');


                    <?php  
                        endif;

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

                            driver_name = $("#driver_id option[value='"+value+"']").text();

                                    $("#rtd_div_"+value).append('<div class="clearfix"></div><span id="rtd_row_'+value+'"><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+value+'" class="control-label">Return to Duty</label> <select class="form-control m-bot15" name="rtd_switch_'+value+'" id="rtd_switch_'+value+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data('rtd_switch_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data('rtd_switch_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data('rtd_switch_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+value+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="rtd_cmplt_'+value+'" name="rtd_cmplt_'+value+'" <?php echo (get_data('rtd_cmplt_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="rtd_cmplt_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date_'.$value[$i]) ?>" name="rtd_cmplt_date_'+value+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+value+'" class="control-label">Result</label> <select class="form-control m-bot15" name="rtd_cmplt_r_'+value+'" id="rtd_cmplt_r_'+value+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('rtd_cmplt_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="rtd_cmplt_file_'+value+'" name="rtd_cmplt_file_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Return to Duty Test File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div>              <div class="col-md-12" id="is_sap_completed_div_'+value+'" style="display:none;"><div class="pull-right"><div class="form-group "> <label for="is_sap_completed_'+value+'" class="control-label">Is Sap Of Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_sap_completed_'+value+'" name="is_sap_completed_'+value+'" <?php echo (get_data('is_sap_completed_'.$value[$i])=='on' )? 'checked': ''; ?> /></div></div></div></div></div>            </div><div id="follow_up_div_'+value+'"></div></span>');
                    <?php
                        

                            if(get_data('rtd_cmplt_'.$value[$i]) == 'on'):
                    ?>
                                rtd_switch_func(true,<?php echo $value[$i]?>);
                    <?php
                                if(get_data('rtd_cmplt_r_'.$value[$i]) == 'neg'){

                                ?>
                                    driver_name = $("#driver_id option[value='"+value+"']").text();

                                    $("#follow_up_div_"+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">Follow Up</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+value+'" name="fup_no_'+value+'" value="<?php echo get_data('fup_no_'.$value[$i]) ?>"><div id="fup_div_'+value+'" style="margin-bottom: 15px;"></div><div class="form-group"><div class="col-sm-12"><div style="text-align: center">         <div class="col-md-12"  id="is_follow_up_completed_div_'+value+'" style="display:none;text-align:center"><div><div class="form-group "> <label for="is_follow_up_completed_'+value+'" class="control-label">Are Follow Ups Completed?</label><div class="form-group "><div class=" is_follow_up_completed_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="is_follow_up_completed_'+value+'" name="is_follow_up_completed_'+value+'" <?php echo (get_data('is_follow_up_completed_'.$value[$i])=='on' )? 'checked': ''; ?> /></div></div></div></div></div>           <button type="button" id="fup_add_btn_'+value+'" onclick="fup_add_func('+value+')" class="btn btn-primary multi-button" >Add Follow Up Details</button> <button type="button" id="fup_dlt_btn_'+value+'"  onclick="fup_dlt_func('+value+')" class="btn btn-primary multi-button" style="display: none;">Delete Follow Up Details</button></div></div></div></div>');
                                    $('.is_follow_up_completed_'+value)['bootstrapSwitch']();

                                    <?php
                                    for($fupi=1;$fupi<=get_data('fup_no_'.$value[$i]);$fupi++)://fup_no_  
                                    ?>
                                        count = <?php echo $fupi;?>;
                                        $("#fup_div_"+value).append('<div id="injuriedp_count_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_'+value+'_'+count+'" class="control-label text-center"></label></div></div><div class="col-md-11"> <span id="fup_row_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_cmplt_date_'.$value[$i].'_'.$fupi) ?>" name="fup_cmplt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+value+'_'+count+'" class="control-label">Schedule Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_sche_c_date_'.$value[$i].'_'.$fupi) ?>" name="fup_sche_c_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="fup_dtcmplt_'+value+'_'+count+'" name="fup_dtcmplt_'+value+'_'+count+'" <?php echo (get_data( 'fup_dtcmplt_'.$value[$i].'_'.$fupi)=='on' )? 'checked': ''; ?> onchange="check_follow_ups_result('+value+');" /></div></div></div></div><div id="fup_dcom_div_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('fup_dt_date_'.$value[$i].'_'.$fupi) ?>" name="fup_dt_date_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+value+'_'+count+'" class="control-label">Result</label> <select class="form-control m-bot15" name="fup_dt_cr_'+value+'_'+count+'" id="fup_dt_cr_'+value+'_'+count+'" onchange="check_follow_ups_result('+value+');"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="fup_cmplt_file_'+value+'_'+count+'" name="fup_cmplt_file_'+value+'_'+count+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true)).'/'.getDriverName($value[$i]).' Follow Up Test File '?>'+count+'" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div> </span></div><div class="clearfix"></div></div>');
            

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
                    ?>

/*



*/           
<?php
endif;

                }

            }

        }

    ?>


});



    // $("#match_log").change(function(){
    //     dtest_cmplt_func(this.checked == true);
    // });

    $("#driver_id").on('change',function(){
            num = $(this).val();

            driver_id_func(num);
            
    });
// 

// /$("#driver_id option[value='"+value[i]+"']").text();

</script>