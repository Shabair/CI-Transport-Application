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
            <header class="panel-heading">
            <?php if($id == ''){?>
                <h4 class="head3" style="display:inline-block">Add New Drug</h4>
            <?php } else {?>
                <h4 class="head3" style="display:inline-block">Update Drug</h4>
            <?php }?>
            
                <a href="<?php echo site_url('drug') ?>" class="btn btn-primary pull-right">View Drug List</a>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" method="post" enctype="multipart/form-data" action="<?php echo site_url('drug/add/'.$id); ?>">
                        <?php 
                            if(!empty($this->input->get('quarter'))){
                                echo '<input type="hidden" name="quarter" value="'.$this->input->get('quarter').'">';
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="driver_id" class="control-label">Drivers Name</label>
                                    <?php 
                                        $driver_id = get_data('driver_id');
                                        $disabledDriverIds = array();
                                    ?>

                                    <select name="driver_id[]" class="selectpicker form-control text-capitalize" data-style="btn-primary" id="driver_id" data-width="fit" multiple="1" data-live-search="true">
                                        <?php 
                                            foreach($getDriver as $row)
                                            { 
                                                $selected = (@in_array($row->id, $driver_id)==true)?'selected':'';
                                                $disabled = '';
                                                if($row->deactive == 1){
                                                    $disabled = 'data-subtext="<span style=\'color: #fff;\';>Deactivated</span>" class="disabledstyle"';
                                                    $disabledDriverIds[] = $row->id;
                                                }

                                                echo "<option  ".$selected."  value='".$row->id."' ".$disabled.">".$row->first_name.' '.$row->middle_name.' '.$row->last_name."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="driver_id_div">
                            
                        </div>
                        <!-- <div id="sap_div" style="border-top: 1px solid #FF5C5C;border-top: 1px solid #FF5C5C;padding-bottom: 15px;padding-top: 10px;margin-bottom: 15px;">
                        </div> -->
                        <div class="row">
                            <div class="col-md-12 text-right" style="margin-top: 15px;">
                                
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

<script type="text/javascript">






</script>

<?php //require __dir__.".\..\include\drugTestJsFunc.php"; ?>
<?php $this->load->view('company/include/drugTestJsFunc'); ?>

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

                            ?>
                        var value = <?php echo $value[$i]?>;
                        childDiv = $("#driver_id_div").children("#driver_div_"+<?php echo $value[$i]?>).length;
                        if(childDiv != 1){
                            // driver_name = $("#driver_id option[value='"+<?php echo $value[$i]?>+"']").text();
                            driver_name = "<?php echo getDriverFullName($value[$i]);?>";
                            $("#driver_id_div").append('<div id="driver_div_'+<?php echo $value[$i]?>+'" class="perdrugcontainer <?php echo (in_array($value[$i], $disabledDriverIds))?'disabledstyle':''; ?>"><?php echo (in_array($value[$i], $disabledDriverIds))?'<div class=" col-md-12"><h3 class=" pull-right"><i>Deactivated</i></h3></div>':''; ?><div class="col-md-2"><div class="form-group "> <label for="location" class="control-label ">Driver No#<span class="driver_count"></span> </label><h4>'+driver_name+'</h4></div></div><div class="col-md-2"><div class="form-group "> <label for="is_dna_'+<?php echo $value[$i]?>+'" class="control-label">Drug/Alcohol</label> <select class="form-control m-bot15" name="is_dna_'+<?php echo $value[$i]?>+'" id="is_dna_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div id="drug_alcohol_selected_'+<?php echo $value[$i]?>+'"></div><div class="clearfix"></div></div>');
                        $(".driver_count").each(function(i, selected){
                            $(selected).text(i+1);
                        });
                            
                            
                        }
                        <?php if(get_data('is_dna_'.$value[$i]) != ''): ?>

                        $('#drug_alcohol_selected_'+<?php echo $value[$i]?>).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square second_switch_'+<?php echo $value[$i]?>+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="dtest_cmplt_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_'+<?php echo $value[$i]?>+'" <?php echo (get_data( 'dtest_cmplt_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="dtest_cmplt_div_'+<?php echo $value[$i]?>+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+<?php echo $value[$i]?>+'" class="control-label">Date</label> <input type="text"  class="form-control quarter_wise_date" value="<?php echo get_data('dtest_cmplt_date_'.$value[$i]) ?>" name="dtest_cmplt_date_'+<?php echo $value[$i]?>+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" class="control-label">Result</label> <select class="form-control m-bot15" name="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" id="dtest_cmplt_r_'+<?php echo $value[$i]?>+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file_'.$value[$i],true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new" ><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" name="dtest_cmplt_file_'+<?php echo $value[$i]?>+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div><div class="clearfix"></div><div id="sap_div_1_'+<?php echo $value[$i]?>+'"></div>');

                            //$('.second_switch_'+<?php echo $value[$i]?>)['bootstrapSwitch']();

                        <?php endif; ?>
                        <?php 
                            if(get_data('dtest_cmplt_'.$value[$i]) == 'on'){
                        ?>
                        
                            dtest_cmplt_func(true,<?php echo $value[$i]?>);

                        <?php
                            if(get_data('dtest_cmplt_r_'.$value[$i]) == 'pos'): 
                                $CI = &get_instance(); 
                                $totalSapOfNo = $CI->getTotalNoFromArray($drug_detail,'sap_appoint_');
                                for($sapOfCount = 1; $sapOfCount <= $totalSapOfNo; $sapOfCount++){
                        ?>
                                var SapCount = <?php echo $sapOfCount ?>;
                                var value = <?php echo $value[$i] ?>;
                                driver_name = "<?php echo getDriverFullName($value[$i]);?>"; 
                                // +<?php echo $sapOfCount;?>+"_"

                                $("#sap_div_"+<?php echo $sapOfCount;?>+"_"+<?php echo $value[$i]?>).append('<div id="sap_row_'+SapCount+'_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">SAP OF ( No# '+SapCount+' )</h4></div><div class="col-md-5"><h4>'+driver_name+'</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+SapCount+'_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_appoint_'+SapCount+'_'+value+'" name="sap_appoint_'+SapCount+'_'+value+'" <?php echo (get_data( 'sap_appoint_'.$sapOfCount.'_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="sap_app_div_'+SapCount+'_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+SapCount+'_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data( 'sap_app_date_'.$sapOfCount.'_'.$value[$i]) ?>" name="sap_app_date_'+SapCount+'_'+value+'"></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+SapCount+'_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_note_'+SapCount+'_'+value+'" name="sap_note_'+SapCount+'_'+value+'"><?php echo get_data( 'sap_note_'.$sapOfCount.'_'.$value[$i]);?></textarea></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+SapCount+'_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_letter_'+SapCount+'_'+value+'" name="sap_letter_'+SapCount+'_'+value+'" <?php echo (get_data( 'sap_letter_'.$sapOfCount.'_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+SapCount+'_'+value+'" style="display: none;"> <label for="sap_letter_file_'+SapCount+'_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="sap_letter_file_'+SapCount+'_'+value+'" name="sap_letter_file_'+SapCount+'_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+SapCount+'_'+value+'" class="control-label">Further Instructions</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_finst_'+SapCount+'_'+value+'" name="sap_finst_'+SapCount+'_'+value+'" <?php echo (get_data( 'sap_finst_'.$sapOfCount.'_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+SapCount+'_'+value+'" style="display: none;"> <label for="sap_fi_note_'+SapCount+'_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_fi_note_'+SapCount+'_'+value+'" name="sap_fi_note_'+SapCount+'_'+value+'"><?php echo get_data( 'acci_des_detail');?></textarea></div></div><div id="rtd_div_'+SapCount+'_'+value+'"></div></div>');


                        <?php  

                            if(get_data('sap_appoint_'.$sapOfCount.'_'.$value[$i]) == 'on'):
                        ?>
                                sap_app_func(true,<?php echo $value[$i]?>,SapCount);
                        <?php
                            endif;


                            if(get_data('sap_finst_'.$sapOfCount.'_'.$value[$i]) == 'on'):
                        ?>
                                sap_finst_func(true,<?php echo $value[$i]?>,SapCount);
                        <?php
                            endif;

                            if(get_data('sap_letter_'.$sapOfCount.'_'.$value[$i]) == 'on'){
                        ?>
                                sap_letter_func(true,<?php echo $value[$i]?>,SapCount);

                                driver_name = $("#driver_id option[value='"+value+"']").text();

                                $("#rtd_div_"+SapCount+"_"+value).append('<div class="clearfix"></div><span id="rtd_row_'+SapCount+'_'+value+'"><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+SapCount+'_'+value+'" class="control-label">Return to Duty</label> <select class="form-control m-bot15" name="rtd_switch_'+SapCount+'_'+value+'" id="rtd_switch_'+SapCount+'_'+value+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'rtd_switch_'.$sapOfCount.'_'.$value[$i])=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'rtd_switch_'.$sapOfCount.'_'.$value[$i])=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'rtd_switch_'.$sapOfCount.'_'.$value[$i])=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+SapCount+'_'+value+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="rtd_cmplt_'+SapCount+'_'+value+'" name="rtd_cmplt_'+SapCount+'_'+value+'" <?php echo (get_data( 'rtd_cmplt_'.$sapOfCount.'_'.$value[$i])=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="rtd_cmplt_div_'+SapCount+'_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+SapCount+'_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date_'.$sapOfCount."_".$value[$i]) ?>" name="rtd_cmplt_date_'+SapCount+'_'+value+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+SapCount+'_'+value+'" class="control-label">Result</label> <select class="form-control m-bot15" name="rtd_cmplt_r_'+SapCount+'_'+value+'" id="rtd_cmplt_r_'+SapCount+'_'+value+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r_'.$sapOfCount."_".$value[$i])=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r_'.$sapOfCount."_".$value[$i])=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+SapCount+'_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="rtd_cmplt_file_'+SapCount+'_'+value+'" name="rtd_cmplt_file_'+SapCount+'_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-12" id="is_sap_completed_div_'+SapCount+'_'+value+'" style="display:<?php echo (get_data('is_sap_completed_'.$sapOfCount."_".$value[$i]) !== null)?'block':'none';?>;"><div class="pull-right"><div class="form-group "> <label for="is_sap_completed_'+SapCount+'_'+value+'" class="control-label">Is Sap Of Completed</label><div class="form-group "> <select id="is_sap_completed_'+SapCount+'_'+value+'" name="is_sap_completed_'+SapCount+'_'+value+'" class="selectpicker form-control" data-style="btn-success" onchange="is_sap_completed(this,'+value+','+SapCount+')"><option value="" >Select</option><option value="pos" <?php echo (get_data( 'is_sap_completed_'.$sapOfCount."_".$value[$i])=='pos' )? 'selected': ''; ?>>Yes</option><option value="neg" <?php echo (get_data( 'is_sap_completed_'.$sapOfCount."_".$value[$i])=='neg' )? 'selected': ''; ?>>No, Again Sap Of</option> </select></div></div></div></div></div><div id="follow_up_div_'+SapCount+'_'+value+'"></div> <div class="clearfix"></div><div id="sap_div_'+(parseInt(SapCount)+1)+'_'+value+'"></div></span>');
                        <?php
                            

                                if(get_data('rtd_cmplt_'.$sapOfCount.'_'.$value[$i]) == 'on'):
                        ?>
                                    rtd_switch_func(true,<?php echo $value[$i]?>,<?php echo $sapOfCount?>);
                        <?php
                               
                                    if(get_data('rtd_cmplt_r_'.$sapOfCount.'_'.$value[$i]) == 'neg'){
                                        $totalFollowUpsNo = $CI->getTotalNoFromArray($drug_detail,'fup_cmplt_date_');
                                        $FollowUpsCount = 1;
                                        do{
                                    ?>  
                                        console.log(<?php echo $totalFollowUpsNo; ?>);
                                        driver_name = $("#driver_id option[value='"+value+"']").text();
                                    
                                        var followUpCount = <?php echo $FollowUpsCount; ?>;
                                        $("#follow_up_div_"+SapCount+'_'+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">Follow Up ( No# '+followUpCount+' )</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+followUpCount+"_"+value+'" name="fup_no_'+followUpCount+"_"+value+'"><div id="fup_div_'+followUpCount+"_"+value+'" style="margin-bottom: 15px;"></div><div class="form-group"><div class="col-sm-12"><div style="text-align: center"><div class="col-md-12" id="is_follow_up_completed_div_'+followUpCount+"_"+value+'" style="display:none;text-align:center"><div><div class="form-group "> <label for="is_follow_up_completed_'+followUpCount+"_"+value+'" class="control-label">Are Follow Ups Completed?</label><div class="form-group "> <select id="is_follow_up_completed_'+followUpCount+"_"+value+'" name="is_follow_up_completed_'+followUpCount+"_"+value+'" class="selectpicker" onchange="is_follow_up_completed(this,'+value+','+followUpCount+')"><option value="" disabled selected>Select</option><option value="pos">Yes</option><option value="neg">No, Again Follow Ups</option> </select></div></div></div></div> <button type="button" id="fup_add_btn_'+followUpCount+"_"+value+'" onclick="fup_add_func('+value+','+followUpCount+')" class="btn btn-primary multi-button">Add Follow Up Details</button> <button type="button" id="fup_dlt_btn_'+followUpCount+"_"+value+'" onclick="fup_dlt_func('+value+','+followUpCount+')" class="btn btn-primary multi-button" style="display: none;">Delete Follow Up Details</button></div></div></div></div><div id="follow_up_div_'+(parseInt(followUpCount)+1)+'_'+value+'"></div>');

                                        <?php
                                        for($fupi=1;$fupi<=get_data('fup_no_'.$FollowUpsCount.'_'.$value[$i]);$fupi++)://fup_no_  
                                        ?>

                                            count = <?php echo $fupi;?>;
                                            $("#fup_div_"+followUpCount+"_"+value).append('<div id="injuriedp_count_'+followUpCount+'_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_'+followUpCount+'_'+value+'_'+count+'" class="control-label text-center"></label></div></div><div class="col-md-11"> <span id="fup_row_'+followUpCount+'_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_cmplt_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Schedule Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_sche_c_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square fup_switch_'+followUpCount+'_'+value+'_'+count+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" name="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?> onchange="check_follow_ups_result('+value+','+followUpCount+');"/></div></div></div></div><div id="fup_dcom_div_'+followUpCount+'_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_dt_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Result</label> <select class="form-control m-bot15" name="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" id="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" onchange="check_follow_ups_result('+value+','+followUpCount+');"><option value="">Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'" name="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div> </span></div><div class="clearfix"></div></div>');
                

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
                                        
                                    <?php 
                                        
                                        
                                            $FollowUpsCount++;
                                        }while($FollowUpsCount <= $totalFollowUpsNo && $totalFollowUpsNo != 0);//do
                                    }// rtd_cmplt_r_
                                    else{?>
                                        $('#is_sap_completed_div_'+<?php echo $value[$i]; ?>).fadeIn(); 
                                    <?php }

                                endif;
                            }





                                }//for($sapOfCount = 1; $sapOfCount <= $totalSapOfNo; $sapOfCount++)
                            endif;



                        }//dtest_cmplt_ 
                        ?>

              
    <?php

                    }

                }

            }

        ?>


    });

    $("#driver_id").on('change',function(){
            num = $(this).val();
            driver_id_func(num);
            
    });
    // 
    <?php 

    if($this->input->get('quarter') !== null){
        $getStartDate = $this->input->get('quarter').'-01';
    }else{
        $getStartDate = $this->current_quarter.'-01';
    }
        $endDate = DateTime::createFromFormat('Y-m-d', $getStartDate)->add(new DateInterval('P3M'))->sub(new DateInterval('P1D'))->format('d-M-Y');
        $startDate = DateTime::createFromFormat('Y-m-d', $getStartDate)->format('d-M-Y');
     
    ?>
    // /$("#driver_id option[value='"+value[i]+"']").text();

    $(document).on('focus', ".quarter_wise_date", function() {
        $(this).datepicker({
            format:'dd-M-yyyy',
            autoclose:true,
           startDate:'<?php echo $startDate;?>',
           endDate:'<?php echo $endDate;?>'

        });
    });

</script>