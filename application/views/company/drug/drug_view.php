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
                    'is_followups_completed',

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
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="driver_id" class="control-label">Drivers Name</label>
                                    <div style="height: 100%;min-height:34px;vertical-align: middle;">
                                        <?php 

                                          $driver_id = get_data('driver_id');
                                          echo "<ol>";
                                          for ($i=0; $i < count($driver_id); $i++) {
                                              echo "<li style='border-bottom: 1px solid #BDC3C7;'>".getDriverName($driver_id[$i])."</li>";
                                          }
                                          echo "</ol>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row" id="driver_id_div">
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


<script type="text/javascript">

// var x = new MutationObserver(function (e) {
//     //e.forEach(function(mutation) {
//     console.log(e.type);
//   //});    
//   //if (e[0].removedNodes) console.log(e[0].removedNodes.id);
// });

// x.observe(document.getElementById('sap_div'), { childList: true });


/**/
// select the target node
var target = document.getElementById('driver_id_div');
 
// create an observer instance
var observer = new MutationObserver(function(mutations) {
    var removedNodes = [];
  mutations.forEach(function(mutation) {
    // console.log(mutation.target.id);
    for(var i = 0; i < mutation.removedNodes.length; i++){
            removedNodes.push(mutation.removedNodes[i]);
    }
    if( removedNodes.length > 0){
        var r_div = removedNodes[0].id;
        check_r_div = r_div.substr(0,11);
        if(check_r_div  == 'driver_div_'){
            arr = r_div.split('_');
            var remove_id = arr[arr.length - 1];
            if($('#sap_row_'+remove_id).length == 1){
                $('#sap_row_'+remove_id).remove();
            }
        }
    }
    // console.log(removedNodes[0].id);


  });    
});


// configuration of the observer:,attributeFilter : ['style', 'id']
var config = { attributes: true, childList: true, characterData: true ,attributeFilter : ['style', 'id']};
 
// pass in the target node, as well as the observer options
observer.observe(target, config);
 

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
    //console.log('#fup_dcom_div_'+value+'_'+count);
    if(value){
        $('#fup_dcom_div_'+num+'_'+count).fadeIn(200);
    }else{

        $('#fup_dcom_div_'+num+'_'+count).fadeOut(200);

        //these things to reset if switch is off
        $('input[name="fup_dt_date_'+num+'_'+count+'"]').val('');
        $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:selected').removeAttr("selected");
        $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:first').attr("selected", true);
    }
}





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
                        driver_name = "<?php echo getDriverName($value[$i])?>";
                        $("#driver_id_div").append('<div id="driver_div_'+<?php echo $value[$i]?>+'" style="border-bottom: 1px solid #FF5C5C;margin-bottom:30px;"><div class="col-md-2"><div class="form-group "> <label for="location" class="control-label ">Driver No#<span class="driver_count"></span> </label><h4>'+driver_name+'</h4></div></div><div class="col-md-2"><div class="form-group "> <label for="is_dna_'+<?php echo $value[$i]?>+'" class="control-label">Drug/Alcohol</label><div class="form-control"> <?php echo (empty(get_data( 'is_dna_'.$value[$i])) )? 'Empty': ''; ?> <?php echo (get_data( 'is_dna_'.$value[$i])=='drug' )? 'Drug': ''; ?> <?php echo (get_data( 'is_dna_'.$value[$i])=='alcohol' )? 'Alcohol': ''; ?> <?php echo (get_data( 'is_dna_'.$value[$i])=='both' )? 'Drug & Alcohol': ''; ?></div></div></div><div id="drug_alcohol_selected_'+<?php echo $value[$i]?>+'"></div><div class="clearfix"></div></div>');
                    $(".driver_count").each(function(i, selected){
                        $(selected).text(i+1);
                    });
                        
                        
                    }

                    <?php if(get_data('is_dna_'.$value[$i]) != ''): ?>

                    $('#drug_alcohol_selected_'+<?php echo $value[$i]?>).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+<?php echo $value[$i]?>+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="form-control"> <?php echo (get_data( 'dtest_cmplt_'.$value[$i])=='on' )? 'Yes': 'No'; ?></div></div></div></div><div id="dtest_cmplt_div_'+<?php echo $value[$i]?>+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+<?php echo $value[$i]?>+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data( 'dtest_cmplt_date_'.$value[$i]) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+<?php echo $value[$i]?>+'" class="control-label">Result</label><div class="form-control"> <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='pos' )? 'Positive': ''; ?> <?php echo (get_data( 'dtest_cmplt_r_'.$value[$i])=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+<?php echo $value[$i]?>+'" class="control-label">Bill Of Lading</label><div class="controls"> <?php if (get_data( 'dtest_cmplt_file_'.$value[$i],true) !='' ): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('drug/file_download').'/'.basename(get_data('dtest_cmplt_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div><div class="clearfix"></div><div id="sap_div_'+<?php echo $value[$i]?>+'"></div>');

                        //$('.second_switch_'+<?php echo $value[$i]?>)['bootstrapSwitch']();

                    <?php endif; ?>

                    <?php 
                        if(get_data('dtest_cmplt_'.$value[$i]) == 'on'){
                    ?>
                    
                        dtest_cmplt_func(true,<?php echo $value[$i]?>);

                    <?php
                        if(get_data('dtest_cmplt_r_'.$value[$i]) == 'pos'): 
                    ?>
                            
                            driver_name = "<?php echo getDriverName($value[$i])?>";

                            $("#sap_div_"+<?php echo $value[$i]?>).append('<div id="sap_location"></div><div id="sap_row_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class="heading_style">SAP OF</h4></div><div class="col-md-5"><h4>'+driver_name+'</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="form-control"> <?php echo (get_data( 'sap_appoint_'.$value[$i])=='on')?'Yes':'No'; ?></div></div></div></div><div id="sap_app_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+value+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('sap_app_date_'.$value[$i]) ?></div></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+value+'" class="control-label">Note</label><div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;"> <?php echo get_data( 'sap_note_'.$value[$i]) ?></div></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-control"> <?php echo (get_data( 'sap_letter_'.$value[$i])=='on')?'Yes':'No'; ?></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+value+'" style="display: none;"> <label for="sap_letter_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('sap_letter_file_'.$value[$i],true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('sap_letter_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Authorization File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('sap_letter_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+value+'" class="control-label">Further Instructions</label><div class="form-control"> <?php echo (get_data( 'sap_finst_'.$value[$i])=='on')?'Yes':'No'; ?></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+value+'" style="display: none;"> <label for="sap_fi_note_'+value+'" class="control-label">Note</label><div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;"> <?php echo get_data( 'sap_fi_note_'.$value[$i]); ?></div></div></div><div id="rtd_div_'+value+'"></div></div>');


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

                            driver_name = "<?php echo getDriverName($value[$i])?>";

                                    $("#rtd_div_"+value).append('<div class="clearfix"></div> <span id="rtd_row_'+value+'"><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+value+'" class="control-label">Return to Duty</label><div class="form-control"> <?php echo (get_data('rtd_switch_'.$value[$i])=='drug' )? 'Drug': ''; ?> <?php echo (get_data('rtd_switch_'.$value[$i])=='alcohol' )? 'Alcohol': ''; ?> <?php echo (get_data('rtd_switch_'.$value[$i])=='both' )? 'Drug & Alcohol': ''; ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+value+'" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_'.$value[$i])=='on')?'Yes':'No'; ?></div></div></div><div id="rtd_cmplt_div_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+value+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('rtd_cmplt_date_'.$value[$i]) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+value+'" class="control-label">Result</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='pos')? 'Positive': ''; ?> <?php echo (get_data('rtd_cmplt_r_'.$value[$i])=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+value+'" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('rtd_cmplt_file_'.$value[$i],true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file_'.$value[$i],true)).'/'.getDriverName($value[$i]).' Return to Duty Test File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file_'.$value[$i],true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div><div id="follow_up_div_'+value+'"></div> </span>');
                    <?php
                        

                            if(get_data('rtd_cmplt_'.$value[$i]) == 'on'):
                    ?>
                                rtd_switch_func(true,<?php echo $value[$i]?>);
                    <?php
                                if(get_data('rtd_cmplt_r_'.$value[$i]) == 'neg' && (get_data('fup_no_'.$value[$i]) != '')){

                                ?>
                                    driver_name = "<?php echo getDriverName($value[$i])?>";

                                    $("#follow_up_div_"+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class="heading_style">Follow Up</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+value+'" name="fup_no_'+value+'" value="<?php echo get_data('fup_no_'.$value[$i]) ?>"><div id="fup_div_'+value+'" style="margin-bottom: 15px;"></div></div>');

                                    <?php
                                    for($fupi=1;$fupi<=get_data('fup_no_'.$value[$i]);$fupi++)://fup_no_  
                                    ?>
                                        count = <?php echo $fupi;?>;
                                        $("#fup_div_"+value).append('<div id="injuriedp_count_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;vertical-align: middle;"><div class="form-group "><h4> <label id="count_injp_'+value+'_'+count+'" class="control-label text-center"></label></h4></div></div><div class="col-md-11"> <span id="fup_row_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+value+'_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_cmplt_date_'.$value[$i].'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+value+'_'+count+'" class="control-label">Schedule Date</label><div class="form-control"> <?php echo get_data('fup_sche_c_date_'.$value[$i].'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data( 'fup_dtcmplt_'.$value[$i].'_'.$fupi)=='on')?'Yes':'No'; ?></div></div></div><div id="fup_dcom_div_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+value+'_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_dt_date_'.$value[$i].'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+value+'_'+count+'" class="control-label">Result</label><div class="form-control"> <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='pos' )? 'Positive': ''; ?> <?php echo (get_data( 'fup_dt_cr_'.$value[$i].'_'.$fupi)=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true)).'/'.getDriverName($value[$i]).' Follow Up Test File '?>'+count+'" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('fup_cmplt_file_'.$value[$i].'_'.$fupi,true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div> </span></div><div class="clearfix"></div></div>');
            

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
                                    endfor;
                                }// rtd_cmplt_r_

                            endif;
                        }
                    }//dtest_cmplt_ 
                    ?>

/*



*/           
<?php

                }

            }

        }

    ?>


});


</script>