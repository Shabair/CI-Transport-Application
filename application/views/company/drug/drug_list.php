<?php //var_dump($quarters); ?>
<style type="text/css">
  #DataTables_Table_0{
      margin-left:  0px;
      margin-right:  0px;
  }
  .col-lg-12 {
      padding-left: 5px;
      padding-right: 5px;
  }


  #DataTables_Table_0 td:nth-child(1),#DataTables_Table_0 td:last-child{
      text-align: center;
      vertical-align: middle;
  }

  #DataTables_Table_0 td > hr{
      margin: 5px;
  }
  .panel-heading {
      padding-bottom: 20px;
      margin-bottom: 0px; 
  }

  .quarter-sidebar ul li {
    position: relative;
  }

  .quarter-sidebar .sub-menu > .sub li {
    padding-left: 32px;
  }
</style>
<script type="text/javascript">
  
function sap_app_func(value,num){
    if(value){
        $("#sap_app_div_"+num).fadeIn(200);
    }else{
        $("#sap_app_div_"+num).fadeOut(200);
    }
}

function sap_finst_func(value,num){
    if(value){
        $("#sap_fi_nite_div_"+num).fadeIn(200);
    }else{
        $("#sap_fi_nite_div_"+num).fadeOut(200);
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
</script>

<?php $incomming_quarter_date = (!empty($latest_quarter))?$latest_quarter['quarter']:null; ?>

<div class="row">
    <div class="col-lg-10">
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
              <?php if($incomming_quarter_date != $current_quarter): ?>
                <h4 class=""> <strong>Drug List</strong><a href="<?php echo site_url('drug/add')?>" class="btn btn-primary pull-right" > Add New drug</a></h4>
                <hr style="margin:5px0px;" />
              <?php else: ?>
                <h4 class=""> <strong>Current Quarter</strong><a href="<?php echo site_url('drug/edit/'.$latest_quarter['id'])?>" class="btn btn-primary pull-right" > Edit Current Quarter</a></h4>
                <hr style="margin:5px0px;" />
              <?php endif; ?>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table" style="font-size:11px;">
                    <table  class="mv_datatable display table table-bordered table-striped table-responsive" style=" width: 100%; ">
                        <thead>
                            <tr>
                <th>ID</th>
                                <th>Drivers Name</th>
                                <th>Drug/Alcohol</th>
                                <th>Drug Test Completed</th>
                                <th>Date</th>
                                <th>Result</th>
                                <th width="10%">Sap Result</th>
                                <th>Drug Test File</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>


<?php if(count($getsapof) > 0 ): ?>
<div class="row">
  <div class="form-group ">
    <div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;">
     <h4 class="head3">SAP OF</h4>
    </div>
  </div>
</div>
<div class="row">
    <section class="light_section">
      <div class="col-lg-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php for($i = 0 ; $i < count($getsapof) ; $i++): ?>
          <?php $driver_id = $getsapof[$i]['fupDriverId']; ?>
          <?php $sapid = $getsapof[$i]['id']; ?>
          <?php $fupQuery =  $this->db->query("SELECT `id`,`driver_id`,`sapdata`,`rtddata`,`fupdata` FROM `drug` WHERE `id` = '".$sapid."'")->row_array(); ?>

          <?php 
                  $dbfields=[

                              'sapdata',
                              'rtddata',
                              'fupdata',

                  ];

                  for($itemp = 0 ; $itemp<count($dbfields);$itemp++)://echo $itemp;
                      if(isset($fupQuery[$dbfields[$itemp]])){

                          $temp_arr = unserialize($fupQuery[$dbfields[$itemp]]);
                          if(is_array($temp_arr)){
                              unset($fupQuery[$dbfields[$itemp]]);
                              $fupQuery=array_merge($fupQuery,$temp_arr);
                          }
                      
                      }
                  endfor;

                  set_data($fupQuery);
          ?>
          <div class="panel panel-default" style="margin-bottom: 5px;">
            <div class="panel-heading" role="tab" id="headingOne" data-collapse="<?php echo $i; ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse1">
                 
                  <?php echo getDriverName($driver_id); ?>
                  <div class="pull-right">
                     <a class="btn btn-xs btn-success" href="<?php echo base_url('drug/view/'.$fupQuery['id'])?>/#sap_location"> <i class="fa fa-eye"></i></a>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url('drug/edit_sapof/'.$fupQuery['id'].'/'.$driver_id)?>"> <i class="fa fa-pencil-square-o"></i></a>
                    <i class="glyphicon glyphicon-plus"></i>
                  </div>
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <?php //var_dump($fupQuery); ?>
                <div class="col-md-2">
                  <div class="form-group ">
                    <label for="sap_appoint_<?php echo $driver_id.'_'.$i;?>" class="control-label">Appointment</label>
                    <div class="form-group ">
                      <div class="form-control">
                        <?php echo (get_data( 'sap_appoint_'.$driver_id)=='on' )? 'Yes': 'No'; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="sap_app_div_<?php echo $driver_id.'_'.$i;?>" style="display: none;">
                  <div class="col-md-2">
                    <div class="form-group ">
                      <label for="sap_app_date_<?php echo $driver_id.'_'.$i;?>" class="control-label">Date</label>
                      <div class="form-control">
                        <?php echo get_data( 'sap_app_date_'.$driver_id) ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group ">
                      <label for="sap_note_<?php echo $driver_id.'_'.$i;?>" class="control-label">Note</label>
                      <div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;">
                        <?php echo get_data( 'sap_note_'.$driver_id) ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-2">
                  <div class="form-group ">
                    <label for="sap_letter_<?php echo $driver_id.'_'.$i;?>" class="control-label">Authorization Letter For Return To Duty</label>
                    <div class="form-control">
                      <?php echo (get_data( 'sap_letter_'.$driver_id)=='on' )? 'Yes': 'No'; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" id="sap_letter_file_div_<?php echo $driver_id.'_'.$i;?>" style="display: none;">
                    <label for="sap_letter_file_<?php echo $driver_id.'_'.$i;?>" class="control-label">Drug Test File</label>
                    <div class="controls">
                      <?php if (get_data( 'sap_letter_file_'.$driver_id,true) !='' ): ?>
                      <div class="fileupload" data-provides="fileupload" style="display:block !important;">
                        <a href="<?php echo base_url('drug/file_download').'/'.basename(get_data('sap_letter_file_'.$driver_id,true)).'/'.getDriverName($driver_id).' Authorization File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('sap_letter_file_'.$driver_id,true) != '')echo "Download"; ?></span> 
                        </a>
                      </div>
                      <?php else: ?>
                      <div class="form-control" readonly>
                        <p><i>No Documents</i>
                        </p>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group ">
                    <label for="sap_finst_<?php echo $driver_id.'_'.$i;?>" class="control-label">Further Instructions</label>
                    <div class="form-control">
                      <?php echo (get_data( 'sap_finst_'.$driver_id)=='on' )? 'Yes': 'No'; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group" id="sap_fi_nite_div_<?php echo $driver_id.'_'.$i;?>" style="display: none;">
                    <label for="sap_fi_note_<?php echo $driver_id.'_'.$i;?>" class="control-label">Note</label>
                    <div class="form-control" style="height: 100%;min-height:48px;vertical-align: middle;">
                      <?php echo get_data( 'sap_fi_note_'.$driver_id); ?>
                    </div>
                  </div>
                </div>
                <div id="rtd_div_<?php echo $driver_id.'_'.$i;?>"></div>
              </div>
            </div>
          </div>
          <?php 
            if(get_data('sap_appoint_'.$driver_id) == 'on'):
          ?>
              <script type="text/javascript"> sap_app_func(true,"<?php echo $driver_id.'_'.$i;?>");</script>
          <?php
              endif; 

            if(get_data('sap_finst_'.$driver_id) == 'on'):
          ?>
              <script type="text/javascript"> sap_finst_func(true,"<?php echo $driver_id.'_'.$i;?>");</script>
          <?php
              endif; 

              if(get_data('sap_letter_'.$driver_id) == 'on'){
                    ?>
                          <script type="text/javascript">  sap_letter_func(true,"<?php echo $driver_id.'_'.$i;?>");

                            driver_name = "<?php echo getDriverName($driver_id)?>";
                          

                           

                                    $("#rtd_div_<?php echo $driver_id.'_'.$i;?>").append('<div class="clearfix"></div> <span id="rtd_row_<?php echo $driver_id."_".$i;?>"><div class="col-md-2"><div class="form-group "> <label for="rtd_switch_<?php echo $driver_id."_".$i;?>" class="control-label">Return to Duty</label><div class="form-control"> <?php echo (get_data('rtd_switch_'.$driver_id)=='drug' )? 'Drug': ''; ?> <?php echo (get_data('rtd_switch_'.$driver_id)=='alcohol' )? 'Alcohol': ''; ?> <?php echo (get_data('rtd_switch_'.$driver_id)=='both' )? 'Drug & Alcohol': ''; ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_<?php echo $driver_id."_".$i;?>" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_'.$driver_id)=='on')?'Yes':'No'; ?></div></div></div><div id="rtd_cmplt_div_<?php echo $driver_id."_".$i;?>" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_date_<?php echo $driver_id."_".$i;?>" class="control-label">Date</label><div class="form-control"> <?php echo get_data('rtd_cmplt_date_'.$driver_id) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="rtd_cmplt_r_<?php echo $driver_id."_".$i;?>" class="control-label">Result</label><div class="form-control"> <?php echo (get_data('rtd_cmplt_r_'.$driver_id)=='pos')? 'Positive': ''; ?> <?php echo (get_data('rtd_cmplt_r_'.$driver_id)=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-3"><div class="form-group"> <label for="rtd_cmplt_file_<?php echo $driver_id."_".$i;?>" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('rtd_cmplt_file_'.$driver_id,true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('rtd_cmplt_file_'.$driver_id,true)).'/'.getDriverName($driver_id).' Return to Duty Test File'?>" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('rtd_cmplt_file_'.$driver_id,true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div><div id="follow_up_div_<?php echo $driver_id."_".$i;?>"></div> </span>');
                          </script>
                          <?php

                           if(get_data('rtd_cmplt_'.$driver_id) == 'on'):
                    ?>
                                <script type="text/javascript">
                                  rtd_switch_func(true,"<?php echo $driver_id."_".$i;?>");
                    <?php
                                if(get_data('rtd_cmplt_r_'.$driver_id) == 'neg' && (get_data('fup_no_'.$driver_id) !='')){

                                ?>
                                    driver_name = "<?php echo getDriverName($driver_id)?>";

                                    $("#follow_up_div_<?php echo $driver_id."_".$i;?>").append('<div class="clearfix"></div><div style="border-top: 1px solid #FF5C5C;border-bottom: 1px solid #FF5C5C;padding-bottom: 40px;"><div class="panel-heading text-center" style="border-bottom:0px; padding-bottom:0px;"><h4 class="head3">Follow Up</h4></div><div class="clearfix"></div> <input type="hidden" id="fup_no_<?php echo $driver_id."_".$i;?>" name="fup_no_<?php echo $driver_id."_".$i;?>" value="<?php echo get_data('fup_no_'.$driver_id) ?>"><div id="fup_div_<?php echo $driver_id."_".$i;?>" style="margin-bottom: 15px;"></div></div>');

                                    <?php
                                    for($fupi=1;$fupi<=get_data('fup_no_'.$driver_id);$fupi++)://fup_no_  
                                    ?>
                                        count = <?php echo $fupi;?>;
                                        $("#fup_div_<?php echo $driver_id."_".$i;?>").append('<div id="injuriedp_count_<?php echo $driver_id."_".$i;?>_'+count+'"><div class="col-xs-1" style="width:10px;vertical-align: middle;"><div class="form-group "><h4> <label id="count_injp_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label text-center"></label></h4></div></div><div class="col-md-11"> <span id="fup_row_<?php echo $driver_id."_".$i;?>_'+count+'"><div class="col-md-2"><div class="form-group "> <label for="fup_cmplt_date_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_cmplt_date_'.$driver_id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_sche_c_date_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Schedule Date</label><div class="form-control"> <?php echo get_data('fup_sche_c_date_'.$driver_id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dtcmplt_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Drug Test Completed</label><div class="form-control"> <?php echo (get_data( 'fup_dtcmplt_'.$driver_id.'_'.$fupi)=='on')?'Yes':'No'; ?></div></div></div><div id="fup_dcom_div_<?php echo $driver_id."_".$i;?>_'+count+'" style="display: none;"><div class="col-md-2"><div class="form-group "> <label for="fup_dt_date_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Date</label><div class="form-control"> <?php echo get_data('fup_dt_date_'.$driver_id.'_'.$fupi) ?></div></div></div><div class="col-md-2"><div class="form-group "> <label for="fup_dt_cr_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Result</label><div class="form-control"> <?php echo (get_data( 'fup_dt_cr_'.$driver_id.'_'.$fupi)=='pos' )? 'Positive': ''; ?> <?php echo (get_data( 'fup_dt_cr_'.$driver_id.'_'.$fupi)=='neg' )? 'Negative': ''; ?></div></div></div><div class="col-md-2"><div class="form-group"> <label for="fup_cmplt_file_<?php echo $driver_id."_".$i;?>_'+count+'" class="control-label">Drug Test File</label><div class="controls"> <?php if (get_data('fup_cmplt_file_'.$driver_id.'_'.$fupi,true) != ''): ?><div class="fileupload" data-provides="fileupload" style="display:block !important;"> <a href="<?php echo base_url('inspection/file_download').'/'.basename(get_data('fup_cmplt_file_'.$driver_id.'_'.$fupi,true)).'/'.getDriverName($value[$i]).' Follow Up Test File '?>'+count+'" id="download-a"> <span class="fileupload-preview" style="margin-left:5px;"><?php if(get_data('fup_cmplt_file_'.$driver_id.'_'.$fupi,true) != '')echo "Download"; ?></span> </a></div> <?php else: ?><div class="form-control" readonly><p><i>No Documents</i></p></div> <?php endif; ?></div></div></div></div> </span></div><div class="clearfix"></div></div>');
            

                                          $('#count_injp_<?php echo $driver_id."_".$i;?>_'+count ).text(count);

                                          if (count >= 1) {
                                              $("#fup_dlt_btn_<?php echo $driver_id."_".$i;?>").show();
                                          }

                                        <?php          
                                            if(get_data('fup_dtcmplt_'.$driver_id.'_'.$fupi) == 'on'):
                                        ?>
                                                fup_dtcmplt_func(true,"<?php echo $driver_id."_".$i;?>",<?php echo $fupi?>);
                                        <?php
                                            endif;
                                    // fup_dtcmplt_func
                                    endfor;
                                }// rtd_cmplt_r_
                               ?> 
                               </script> 
                               <?php
                          endif;
                } ?>
        <?php endfor; ?>
        </div>
      </div>
    </section>
</div>
<?php endif;//end of sap of ?>
    </div>
    <style type="text/css">
      .quarter-container.col-lg-2{
        padding-left: 5px;
        padding-right: 5px;margin-top:-85px;
      }
      .quarter-sidebar{
        overflow: hidden;
        outline: none;
        width: 220px;
        height: 100%;
        position: fixed;
        background: #2a3542;
        right: 0;
        top:0;

      }
    </style>

    <?php function func_to_find_key($value,$arr){
      foreach ($arr as $arrValue) {
        if($arrValue['quarter'] == $value){
          return $arrValue['id'];
        }
      }
    } ?>
</div>



    <div class="quarter-container">
      <div class="quarter-sidebar">
        <ul class="sidebar-menu" id="quarter-accordion">
        <?php 
        // var_dump($quarters);
          $currentTime = date("Y-m-d");

          $date = date_create('2016-01-01');
          $quarter = 1;

          if(empty($quarters)){  // this to pass the array in array_column
            $quarters = [];
          }

          for(
            $displayDate = date_format($date, 'Y-m');
            $displayDate < $currentTime;
            date_add($date, date_interval_create_from_date_string('3 months')),
              $displayDate = date_format($date, 'Y-m')){


            if(date_format($date, 'm') == 01){
              $quarter = 1;
              echo '
              <li id="drug_test" class="sub-menu">
                <a href="javascript:;" >
                  <i class="fa fa-medkit"></i>
                  <span>'.date_format($date, 'Y').'</span>
                </a>
                <ul class="sub">';
            }
              echo '
                  <li>
                    '.
                    (
                      $displayDate.
                      (
                        (in_array($displayDate, array_column($quarters, 'quarter'))?
                          // func_to_find_key($displayDate,$quarters)
                          '<a href="'.site_url('drug/edit/'.func_to_find_key($displayDate,$quarters)).'"><span>'.$quarter++.") ".$displayDate.'</span></a>'
                          :'<a href="'.site_url('drug/add?quarter=').$displayDate.'"><span>'.$quarter++.") ".$displayDate.' Add</span></a>')
                      )



                    ).'</li>';
            if(date_format($date, 'm') == 10){
                echo '
                </ul>
              </li>';
            }
            //echo "Quarter : ".$quarter++."=>".$displayDate = date_format($date, 'Y-m-d')."<br />";
          } 
        ?>
        </ul>
      </div>
    </div>


<!-- page end-->
<!-- <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script> -->

            <script>
                $(document).ready(function(){
                    $(".panel-heading").click(function(){
                        var $this = $(this);
                        var id = $this.attr("data-collapse");
                        $this.find('i').toggleClass(function() {
                          if ( $( this ).is( ".glyphicon-plus" ) ) {
                            $( this ).removeClass("glyphicon-plus");
                            $('#collapse'+id).slideDown();
                            return "glyphicon-minus";
                          } else {
                            $( this ).removeClass("glyphicon-minus");
                            $('#collapse'+id).slideUp();
                            return "glyphicon-plus";
                          }
                        });
                    });
                    
                });
            </script>
<!-- <script>
//---------------------------------------------------



var table = $('.mv_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
        "searching": false,
    "ajax": "<?=base_url('drug/datatable_json')?>",
        "bPaginate": false,
    "order": [[0,'desc']],
    "columnDefs": [
      { "targets": 0, "name": "id", 'searchable':false, 'orderable':false},
      { "targets": 1, "name": "drivers_name", 'searchable':false, 'orderable':false},
      { "targets": 2, "name": "drug_alcohal", 'searchable':false, 'orderable':false},
      { "targets": 3, "name": "drug_test", 'searchable':false, 'orderable':false},
      { "targets": 4, "name": "date", 'searchable':false, 'orderable':false},
      { "targets": 5, "name": "result", 'searchable':false, 'orderable':false},
      { "targets": 5, "name": "sap", 'searchable':false, 'orderable':false},
      { "targets": 6, "name": "drugtestfile", 'searchable':false, 'orderable':false},
      { "targets": 7, "name": "Option", 'searchable':false, 'orderable':false}
    ]
  });

//---------------------------------------------------
function user_filter()
{
  $.post('<?=base_url('drug/search')?>',$('#user_search').serialize(),function(){
    table.ajax.reload( null, false );
  });
}
  
</script>

<script type="text/javascript">
$(document).ready(function(){
   
   user_filter(); 

});




</script> -->


<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
<script type="text/javascript">

function datatableData(click = null){
    $.post('<?=base_url('drug/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'drug/datatable_json'?>",{'search':''},function(data){
            if(data != ''){
                if(click == null){
                    var table = $('.mv_datatable').dataTable({
                        "bPaginate": false,
                        "fixedHeader": true,
                        "dom": 'Bfrtip',
                        "stateSave": true,
                        "buttons": [
                            // 'copyHtml5',
                            // 'excelHtml5',
                            //'csvHtml5',
                            // 'pdfHtml5',
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6]
                                }
                            },
                            'colvis'
                        ],
                        "order": [[0,'asc']]
                    });
                }else{
                    $('.mv_datatable').DataTable().rows().remove().draw();
                }
                if(data != '[]'){
                    var jsdata = JSON.parse(data);

                    $('.mv_datatable').dataTable().fnAddData(jsdata);
                }
                //$('#table-body').html(data);
            }else{
                console.log("Ajax console Error");
                $('#table-body').html('');
                //$("#hs_reult").css({'display':'none'});
            }
        });
    });
}
$(document).ready(function(){
    //var val = $("input[name=user_search_type]").val();
    datatableData();

$(".quarter-sidebar").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});
});

$('.quarter-sidebar .sub-menu > a').click(function () {
    var o = ($(this).offset());
    diff = 250 - o.top;
    if(diff>0)
        $(".quarter-sidebar").scrollTo("-="+Math.abs(diff),500);
    else
        $(".quarter-sidebar").scrollTo("+="+Math.abs(diff),500);
});

$(function() {
    $('#quarter-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
        //cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });
});
</script>
