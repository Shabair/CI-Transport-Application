<script type="text/javascript">
    var totalSapOfs = new Array();
    var totalFollowUps = new Array();
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
                        $('#sap_row_'+totalSapOfs[remove_id]+'_'+remove_id).remove();
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



    function driver_id_func(value){

        //$("#driver_id_div").empty();
        var divs= [];
        //console.log(value);
        if(value != null){
            for(i =0; i< value.length;i++){
              divs[i] = "#driver_div_"+value[i];  
            }
            for(i =0; i< value.length;i++){

                childDiv = $("#driver_id_div").children("#driver_div_"+value[i]).length;
                if(childDiv != 1){

                    driver_name = $("#driver_id option[value='"+value[i]+"']").text();
                    $("#driver_id_div").append('<div id="driver_div_'+value[i]+'" class="perdrugcontainer"><div class="col-md-2"><div class="form-group "> <label for="location" class="control-label ">Driver No#<span class="driver_count"></span> </label><h4>'+driver_name+'</h4></div></div><div class="col-md-2"><div class="form-group "> <label for="is_dna_'+value[i]+'" class="control-label">Drug/Alcohol</label> <select class="form-control m-bot15" name="is_dna_'+value[i]+'" id="is_dna_'+value[i]+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna')=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna')=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna')=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div id="drug_alcohol_selected_'+value[i]+'"></div><div class="clearfix"></div></div>');

                    
                    //$('.second_switch_'+value[i])['bootstrapSwitch']();
                    
                    
                }else{
                    // $('#driver_id_div > div').not(divs.join(',')).remove();
                    $('#driver_id_div > div').not(divs.join(',')).remove();


 
            // later, you can stop observing
            //observer.disconnect();

                    // $(document).on('DOMNodeRemoved', function(e) {

                    //     arr = e.target.id.split('_');
                    //     re_di = arr[arr.length - 1];
                    //     if($("#sap_row_"+re_di).length == 1){
                    //         console.log($("#sap_row_"+re_di).length);
                    //     //$("#sap_row_"+re_di).remove();
                    //     }
                        
                    //     //console.log(e.target.id, ' was removed');

                    // });
                    //console.log(divs);
                    //console.log('asd');
                }

                
            }

        
        }else{
            $('#driver_id_div > div').remove();
        }
        // console.log($(".driver_count").last().text());

        $(".driver_count").each(function(i, selected){
            $(selected).text(i+1);
        });
        
    }

    function dtest_cmplt_func(value,num){
        if(value){
            $("#dtest_cmplt_div_"+num).fadeIn(200);
            //$('#sap_row_'+num).fadeIn(200);
            
        }else{
            $("#dtest_cmplt_div_"+num).fadeOut(200);
            $('#sap_row_'+totalSapOfs[num]+'_'+num).remove();
            // re set the Date and result also file
            // console.log('asd');
            $('input[name="dtest_cmplt_date_'+num+'"]').val('');
            $('select[name="dtest_cmplt_r_'+num+'"] option:selected').removeAttr("selected");
            $('select[name="dtest_cmplt_r_'+num+'"] option:first').attr("selected", true);
        }
    }

    function sap_app_func(value,num,SapCount){
        if(value){
            $("#sap_app_div_"+SapCount+"_"+num).fadeIn(200);
        }else{
            $("#sap_app_div_"+SapCount+"_"+num).fadeOut(200);
        }
    }

    function sap_letter_func(value,num,SapCount){
        if(value){
            $("#sap_letter_file_div_"+SapCount+"_"+num).fadeIn(200);
        }else{
            $("#sap_letter_file_div_"+SapCount+"_"+num).fadeOut(200);
            $("#sap_div_"+(parseInt(SapCount)+1)+"_"+num).remove();
            totalSapOfs[num]=SapCount;
        }
    }

    function rtd_switch_func(value,num,SapCount){

        if(value){
            $("#rtd_cmplt_div_"+SapCount+"_"+num).fadeIn(200);
        }else{
            $("#is_sap_completed_div_"+SapCount+"_"+num).fadeOut(100);

            is_sap_completed('pos',num,SapCount);
            $('#follow_up_div_'+SapCount+'_'+num).remove();
            $("#rtd_cmplt_div_"+SapCount+"_"+num).fadeOut(200);
            //these things to reset if switch is off
            $('input[name="rtd_cmplt_date_'+SapCount+'_'+num+'"]').val('');
            $('select[name="rtd_cmplt_r_'+SapCount+'_'+num+'"] option:selected').removeAttr("selected");
            $('select[name="rtd_cmplt_r_'+SapCount+'_'+num+'"] option:first').attr("selected", true);
        }
    }

    function sap_finst_func(value,num,SapCount){
        if(value){
            $("#sap_fi_nite_div_"+SapCount+"_"+num).fadeIn(200);
        }else{
            $("#sap_fi_nite_div_"+SapCount+"_"+num).fadeOut(200);
        }
    }

    function fup_dtcmplt_func(value,num,count,followUpCount){
        if(value){
            $('#fup_dcom_div_'+followUpCount+'_'+num+'_'+count).fadeIn(200);
        }else{
            deSelectIsSapCom(num,count);
            $('#fup_dcom_div_'+followUpCount+'_'+num+'_'+count).fadeOut(200);

            //these things to reset if switch is off
            // $('input[name="fup_dt_date_'+num+'_'+count+'"]').val('');
            // $('select[name="fup_dt_cr_'+num+'_'+count+'"] option:selected').removeAttr("selected");
            $('select[name="fup_dt_cr_'+followUpCount+'_'+num+'_'+count+'"] option:selected').prop('selected', false);
            check_follow_ups_result(num,followUpCount);
        }
    }

    function check_follow_ups_result(num,followUpCount){

        totalFollowUpsInPerSection = $("#fup_no_"+followUpCount+"_"+num).val();
        var showIsComplete = true;
        var OrAnyValuePositive = false;
        for(var i = 1 ; i <= totalFollowUpsInPerSection ; i++){
            if($("#fup_dt_cr_"+followUpCount+"_"+num+"_"+i).length != 0){
                value = $("select[id='fup_dt_cr_"+followUpCount+"_"+num+"_"+i+"'] option:selected").val();
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
        if(totalFollowUpsInPerSection == 0){
            showIsComplete =  false;
        }
        if(showIsComplete || OrAnyValuePositive){
            $("#is_follow_up_completed_div_"+followUpCount+"_"+num).fadeIn();
            $("#is_follow_up_completed_"+followUpCount+"_"+num).selectpicker();
        }else{
            $("#is_follow_up_completed_div_"+followUpCount+"_"+num).fadeOut();
        }
    }

    function is_sap_completed(value,driverId,SapCount){
        // var value = obj.value;
        SapCount = parseInt(SapCount);
        
        SapCount += 1;
        if(value == 'neg'){
            totalSapOfs[driverId] = SapCount;
            passValue = 'pos';    
            SelectStyle = 'btn-warning';
            $( 'button[data-id="is_sap_completed_'+(SapCount -1)+'_'+driverId+'"]' ).addClass( "btn-warning" );
        }else{
            $( 'button[data-id="is_sap_completed_'+(SapCount -1)+'_'+driverId+'"]' ).removeClass( "btn-warning" );
            SelectStyle = 'btn-success';
            passValue = 'neg';    
        }


        dtest_cmplt_r_func(passValue,driverId,SapCount);
    }

    function is_follow_up_completed(value,driverId,followUpCount){
        // var value = obj.value;
        followUpCount = parseInt(followUpCount);
        
        if(value == 'neg'){
            $( 'button[data-id="is_follow_up_completed_'+(followUpCount)+'_'+driverId+'"]' ).addClass( "btn-warning" );
            $( 'button[data-id="is_follow_up_completed_'+(followUpCount)+'_'+driverId+'"]' ).removeClass( "btn-success" );
            followUpCount += 1

            
            follow_up_func(value,driverId,followUpCount);

        }else{
            $( 'button[data-id="is_follow_up_completed_'+(followUpCount)+'_'+driverId+'"]' ).removeClass( "btn-warning" );
            $( 'button[data-id="is_follow_up_completed_'+(followUpCount)+'_'+driverId+'"]' ).addClass( "btn-success" );
            $('#follow_row_'+(followUpCount+1)+'_'+driverId).empty();
        }
    }

    function drug_alcohol_selected(result,id){

        if(result != ''){
            totalSapOfs[id] = 1;
            if($('#sap_div_'+totalSapOfs[id]+'_'+id).length !=0)
            $('#sap_div_'+totalSapOfs[id]+'_'+id).empty();

            $('#drug_alcohol_selected_'+id).html('<div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_'+id+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square second_switch_'+id+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="dtest_cmplt_'+id+'" name="dtest_cmplt_'+id+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="dtest_cmplt_div_'+id+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_date_'+id+'" class="control-label">Date</label> <input type="text"  class="form-control quarter_wise_date" value="<?php echo get_data('dtest_cmplt_date') ?>" name="dtest_cmplt_date_'+id+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="dtest_cmplt_r_'+id+'" class="control-label">Result</label> <select class="form-control m-bot15" name="dtest_cmplt_r_'+id+'" id="dtest_cmplt_r_'+id+'"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'dtest_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'dtest_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="dtest_cmplt_file_'+id+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file_') != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file_') !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="dtest_cmplt_file_'+id+'" name="dtest_cmplt_file_'+id+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file_')).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file_') != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div><div class="clearfix"></div><div id="sap_div_'+totalSapOfs[id]+'_'+id+'"></div>');
        }
        $('.second_switch_'+id)['bootstrapSwitch']();
    }

    function dtest_cmplt_r_func(result,value,SapCount = 1){

        if(result == 'pos'){
            
            driver_name = $("#driver_id option[value='"+value+"']").text();

            $("#sap_div_"+SapCount+"_"+value).append('<div id="sap_row_'+SapCount+'_'+value+'"><div class="form-group "><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">SAP OF ( No# '+SapCount+' )</h4></div><div class="col-md-5"><h4>'+driver_name+'</h4></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_appoint_'+SapCount+'_'+value+'" class="control-label">Appointment</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_appoint_'+SapCount+'_'+value+'" name="sap_appoint_'+SapCount+'_'+value+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="sap_app_div_'+SapCount+'_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="sap_app_date_'+SapCount+'_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('dtest_cmplt_date') ?>" name="sap_app_date_'+SapCount+'_'+value+'"></div></div><div class="col-md-8"><div class="form-group "> <label for="sap_note_'+SapCount+'_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_note_'+SapCount+'_'+value+'" name="sap_note_'+SapCount+'_'+value+'"><?php echo get_data( 'acci_des_detail');?></textarea></div></div></div><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="sap_letter_'+SapCount+'_'+value+'" class="control-label">Authorization Letter For Return To Duty</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_letter_'+SapCount+'_'+value+'" name="sap_letter_'+SapCount+'_'+value+'" <?php echo (get_data( 'sap_appoint')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-3"><div class="form-group" id="sap_letter_file_div_'+SapCount+'_'+value+'" style="display: none;"> <label for="sap_letter_file_'+SapCount+'_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('dtest_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'dtest_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="sap_letter_file_'+SapCount+'_'+value+'" name="sap_letter_file_'+SapCount+'_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('dtest_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('dtest_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-2"><div class="form-group "> <label for="sap_finst_'+SapCount+'_'+value+'" class="control-label">Further Instructions</label><div class="form-group "><div class="switch switch-square third_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="sap_finst_'+SapCount+'_'+value+'" name="sap_finst_'+SapCount+'_'+value+'" <?php echo (get_data( 'sap_finst')=='on' )? 'checked': ''; ?>/></div></div></div></div><div class="col-md-5"><div class="form-group" id="sap_fi_nite_div_'+SapCount+'_'+value+'" style="display: none;"> <label for="sap_fi_note_'+SapCount+'_'+value+'" class="control-label">Note</label><textarea class="form-control input-sm" id="sap_fi_note_'+SapCount+'_'+value+'" name="sap_fi_note_'+SapCount+'_'+value+'"><?php echo get_data( 'acci_des_detail');?></textarea></div></div><div id="rtd_div_'+SapCount+'_'+value+'"></div></div>');
            
                $('.third_switch_'+SapCount+'_'+value)['bootstrapSwitch']();

        }else{
            $("#sap_div_"+SapCount+"_"+value).empty();
        }


    }


    function follow_up_func(result,value,followUpCount){
            totalFollowUps[value] = followUpCount;
            driver_name = $("#driver_id option[value='"+value+"']").text();

            $("#follow_row_"+followUpCount+"_"+value).append('<div class="clearfix"></div><div style="padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class=" heading_style">Follow Up ( No# '+followUpCount+' )</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_'+followUpCount+"_"+value+'" name="fup_no_'+followUpCount+"_"+value+'"><div id="fup_div_'+followUpCount+"_"+value+'" style="margin-bottom: 15px;"></div><div class="form-group"><div class="col-sm-12"><div style="text-align: center"><div class="col-md-12" id="is_follow_up_completed_div_'+followUpCount+"_"+value+'" style="display:none;text-align:center"><div><div class="form-group "> <label for="is_follow_up_completed_'+followUpCount+"_"+value+'" class="control-label">Are Follow Ups Completed?</label><div class="form-group "> <select id="is_follow_up_completed_'+followUpCount+"_"+value+'" name="is_follow_up_completed_'+followUpCount+"_"+value+'" class="selectpicker" onchange="is_follow_up_completed(this.value,'+value+','+followUpCount+')"><option value="" disabled selected>Select</option><option value="pos">Yes</option><option value="neg">No, Again Follow Ups</option> </select></div></div></div></div> <button type="button" id="fup_add_btn_'+followUpCount+"_"+value+'" onclick="fup_add_func('+value+','+followUpCount+')" class="btn btn-primary multi-button">Add Follow Up Details</button> <button type="button" id="fup_dlt_btn_'+followUpCount+"_"+value+'" onclick="fup_dlt_func('+value+','+followUpCount+')" class="btn btn-primary multi-button" style="display: none;">Delete Follow Up Details</button></div></div></div></div><div id="follow_row_'+(parseInt(followUpCount)+1)+'_'+value+'"></div>');
                $('.fup_switch_'+followUpCount+"_"+value)['bootstrapSwitch']();
                $('.is_follow_up_completed_'+followUpCount+"_"+value)['bootstrapSwitch']();

    }

    function fup_add_func(value,followUpCount){

            $(this).attr("disabled", true);
            var count = $("#fup_no_"+followUpCount+"_"+value).val();
            if (count === "" || count === null) {
                count = 0;
            }
            count = ++count; 
            $("#fup_div_"+followUpCount+"_"+value).append('<div id="injuriedp_count_'+followUpCount+'_'+value+'_'+count+'"><div class="col-xs-1" style="width:10px;"><div class="form-group "> <label id="count_injp_'+followUpCount+'_'+value+'_'+count+'" class="control-label text-center"></label></div></div><div class="col-md-11"> <span id="fup_row_'+followUpCount+'_'+value+'_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_cmplt_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Schedule Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_sche_c_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square fup_switch_'+followUpCount+'_'+value+'_'+count+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" name="fup_dtcmplt_'+followUpCount+'_'+value+'_'+count+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?> onchange="check_follow_ups_result('+value+','+followUpCount+');"/></div></div></div></div><div id="fup_dcom_div_'+followUpCount+'_'+value+'_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="fup_dt_date_'+followUpCount+'_'+value+'_'+count+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Result</label> <select class="form-control m-bot15" name="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" id="fup_dt_cr_'+followUpCount+'_'+value+'_'+count+'" onchange="check_follow_ups_result('+value+','+followUpCount+');"><option value="">Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'" name="fup_cmplt_file_'+followUpCount+'_'+value+'_'+count+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div></div> </span></div><div class="clearfix"></div></div>');
                $('.fup_switch_'+followUpCount+'_'+value+'_'+count)['bootstrapSwitch']();

            $('#count_injp_'+followUpCount+'_'+value+'_'+count ).text(count);
            if (count >= 1) {
                $("#fup_dlt_btn_"+followUpCount+'_'+value).show();
            }
            if (count == 1) {
                $("#fup_div"+followUpCount+'_'+value).fadeIn(100);
            }
            $("#fup_no_"+followUpCount+'_'+value).val(count);
            $(this).attr("disabled", false);
     
        check_follow_ups_result(value,followUpCount);
    }

    function fup_dlt_func(value,followUpCount){
    //Delete Provide your employment history for last 3 to 7 years (if any)

            var count = $("#fup_no_"+followUpCount+'_'+value).val();
            if (count === "" || count === null) {
                count = 0;
            }

            $('#injuriedp_count_'+followUpCount+'_'+value+'_'+count ).remove();

            count = --count;

            if (count <= 0) {
                $("#fup_dlt_btn_"+followUpCount+'_'+value).hide();
                $("#fup_div"+followUpCount+'_'+value).fadeOut(100);
            }
            $("#fup_no_"+followUpCount+'_'+value).val(count);
            //$(this).attr("disabled", false);
            $("#fup_add_btn_"+followUpCount+'_'+value).attr("disabled", false);
    check_follow_ups_result(value,followUpCount);
        
    }


    function rtd_func(result,value,SapCount){

        if(result == true){
            
            driver_name = $("#driver_id option[value='"+value+"']").text();

            $("#rtd_div_"+SapCount+"_"+value).append('<span id="rtd_row_'+SapCount+'_'+value+'"><div class="clearfix"></div><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_'+SapCount+'_'+value+'" class="control-label">Return to Duty</label> <select class="form-control m-bot15" name="rtd_switch_'+SapCount+'_'+value+'" id="rtd_switch_'+SapCount+'_'+value+'"><option value="" disabled selected value>Select Option</option><option value="drug" <?php echo (get_data( 'is_dna')=='drug' )? 'selected': ''; ?>>Drug</option><option value="alcohol" <?php echo (get_data( 'is_dna')=='alcohol' )? 'selected': ''; ?>>Alcohol</option><option value="both" <?php echo (get_data( 'is_dna')=='both' )? 'selected': ''; ?>>Drug & Alcohol</option> </select></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_'+SapCount+'_'+value+'" class="control-label">Drug Test Completed</label><div class="form-group "><div class="switch switch-square rtd_switch_'+SapCount+'_'+value+'" data-on-label="YES" data-off-label="NO"> <input type="checkbox" id="rtd_cmplt_'+SapCount+'_'+value+'" name="rtd_cmplt_'+SapCount+'_'+value+'" <?php echo (get_data( 'dtest_cmplt')=='on' )? 'checked': ''; ?>/></div></div></div></div><div id="rtd_cmplt_div_'+SapCount+'_'+value+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_'+SapCount+'_'+value+'" class="control-label">Date</label> <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy" class="form-control default-date-picker" value="<?php echo get_data('rtd_cmplt_date') ?>" name="rtd_cmplt_date_'+SapCount+'_'+value+'"></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_'+SapCount+'_'+value+'" class="control-label">Result</label> <select class="form-control m-bot15" name="rtd_cmplt_r_'+SapCount+'_'+value+'" id="rtd_cmplt_r_'+SapCount+'_'+value+'" onchange="isSapOrFollowups(this,'+value+','+SapCount+');"><option value="" disabled selected value>Select Option</option><option value="pos" <?php echo (get_data( 'rtd_cmplt_r')=='pos' )? 'selected': ''; ?>>Positive</option><option value="neg" <?php echo (get_data( 'rtd_cmplt_r')=='neg' )? 'selected': ''; ?>>Negative</option> </select></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_'+SapCount+'_'+value+'" class="control-label">Drug Test File</label><div class="controls"><div class="fileupload <?php if(get_data('rtd_cmplt_file',true) != ''){echo 'fileupload-exists';}else{echo 'fileupload-new';}?>" data-provides="fileupload" <?php if(get_data( 'rtd_cmplt_file',true) !='' ){echo 'style="display:block !important;"'; }else{echo 'style="display:block" !important;';}?>> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" id="rtd_cmplt_file_'+SapCount+'_'+value+'" name="rtd_cmplt_file_'+SapCount+'_'+value+'"> </span> <span class="fileupload-preview" style="margin-left:5px;"><a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file',true)).'/Drug Test'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file',true) != '')echo "Download"; ?></span> </a> </span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"><i class="fa fa-close" id="delete_file"></i></a></div></div></div></div><div class="col-md-12" id="is_sap_completed_div_'+SapCount+'_'+value+'" style="display:none;"><div class="pull-right"><div class="form-group "> <label for="is_sap_completed_'+SapCount+'_'+value+'" class="control-label">Is Sap Of Completed</label><div class="form-group "> <select id="is_sap_completed_'+SapCount+'_'+value+'" name="is_sap_completed_'+SapCount+'_'+value+'" class="selectpicker form-control" data-style="btn-success" onchange="is_sap_completed(this.value,'+value+','+SapCount+')"><option value="" >Select</option><option value="pos">Yes</option><option value="neg">No, Again Sap Of</option> </select></div></div></div></div></div></span>');
                $('.rtd_switch_'+SapCount+'_'+value)['bootstrapSwitch']();

                $("#is_sap_completed_"+SapCount+"_"+value).selectpicker();


        }else{
            $('#rtd_row_'+SapCount+'_'+value).remove();
        }


    }



     


    $(document).on('change','input[type=checkbox]',function(){
                 
        if(this.id.slice(0,11) == 'dtest_cmplt'){
            arr = this.id.split('_');
            dtest_cmplt_func(this.checked == true,arr[arr.length - 1]);
        }

        if(this.id.slice(0,12) == 'sap_appoint_'){
            arr = this.id.split('_');
            sap_app_func(this.checked == true,arr[arr.length - 1],arr[arr.length - 2]);
            
        }

        if(this.id.slice(0,11) == 'sap_letter_'){
            arr = this.id.split('_');
            sap_letter_func(this.checked == true,arr[arr.length - 1],arr[arr.length - 2]);
            rtd_func(this.checked == true,arr[arr.length - 1],arr[arr.length - 2]);
            
        }

        if(this.id.slice(0,10) == 'rtd_cmplt_'){
            arr = this.id.split('_');
            rtd_switch_func(this.checked == true,arr[arr.length - 1],arr[arr.length - 2]);
            
        }

        if(this.id.slice(0,12) == 'fup_dtcmplt_'){
            arr = this.id.split('_');
            fup_dtcmplt_func(this.checked == true,arr[arr.length - 2],arr[arr.length - 1],arr[arr.length - 3]);
            
        }

        if(this.id.slice(0,10) == 'sap_finst_'){
            arr = this.id.split('_');
            sap_finst_func(this.checked == true,arr[arr.length - 1],arr[arr.length - 2]);
            
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

            dtest_cmplt_r_func($(this).val(),arr[arr.length - 1],1);
            
        }

        // if(this.id.slice(0,12) == 'rtd_cmplt_r_'){//console.log(this.id.slice(0,11));
        //     arr = this.id.split('_');
        //     if($(this).val() == 'neg'){
        //         totalFollowUps[arr[arr.length - 1]] = 1;
        //         $("#rtd_div_"+arr[arr.length - 2]+"_"+arr[arr.length - 1]).append('<div id="follow_up_div_'+arr[arr.length - 2]+'_'+arr[arr.length - 1]+'"></div> <div class="clearfix"></div>');
        //         if($('#sap_div_'+(parseInt(arr[arr.length - 2])+1)+'_'+arr[arr.length - 1]).length != 0)
        //             $('#sap_div_'+(parseInt(arr[arr.length - 2])+1)+'_'+arr[arr.length - 1]).remove();

        //     }else /*if(totalFollowUps[arr[arr.length - 1]] != undefined)*/{
        //         totalFollowUps[arr[arr.length - 1]] -=1;
        //         $("#rtd_div_"+arr[arr.length - 2]+"_"+arr[arr.length - 1]).append('<div class="clearfix"></div><div id="sap_div_'+(parseInt(arr[arr.length - 2])+1)+'_'+arr[arr.length - 1]+'"></div>');
        //         if($('#follow_up_div_'+arr[arr.length - 2]+'_'+arr[arr.length - 1]).length != 0)
        //             $('#follow_up_div_'+arr[arr.length - 2]+'_'+arr[arr.length - 1]).remove();
        //     }

        //     follow_up_func($(this).val(),arr[arr.length - 1],arr[arr.length - 2]);
        //     is_sap_completed($(this).val(),arr[arr.length - 1],arr[arr.length - 2]);
        //     deSelectIsSapCom(arr[arr.length - 1],arr[arr.length - 2]);
        // }

    });


    function isSapOrFollowups(obj,driverId,SapCount){
        if(obj.value == 'neg'){

            $("#is_sap_completed_div_"+SapCount+"_"+driverId).fadeOut(100);
            totalFollowUps[driverId] = 0;
            $("#rtd_div_"+SapCount+"_"+driverId).append('<div id="follow_up_div_'+SapCount+'_'+driverId+'"><div id="follow_row_'+(totalFollowUps[driverId]+1)+'_'+driverId+'"></div></div> <div class="clearfix"></div>');
            if($('#sap_div_'+(parseInt(SapCount)+1)+'_'+driverId).length != 0){
                $('#sap_div_'+(parseInt(SapCount)+1)+'_'+driverId).remove();
            }

            follow_up_func(obj.value,driverId,(totalFollowUps[driverId]+1));

        }else /*if(totalFollowUps[driverId] != undefined)*/{

            $("#rtd_div_"+SapCount+"_"+driverId).append('<div class="clearfix"></div><div id="sap_div_'+(parseInt(SapCount)+1)+'_'+driverId+'"></div>');
            if($('#follow_up_div_'+SapCount+'_'+driverId).length != 0)
                $('#follow_up_div_'+SapCount+'_'+driverId).remove();
            is_sap_completed(obj.value,driverId,SapCount);
            totalFollowUps[driverId] = 0;
            $("#is_sap_completed_div_"+SapCount+"_"+driverId).fadeIn(100);

        }

        
        deSelectIsSapCom(driverId,SapCount);
    }
    function deSelectIsSapCom(driverId,count){
         $('select[id="is_sap_completed_'+count+'_'+driverId+'"]').selectpicker('deselectAll');
    }
</script>