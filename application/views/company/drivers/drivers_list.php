<style type="text/css">

    .pulsate-circle {
        background: #ff6c60;
        position: relative;
        color: #ff6c60;
        top: -1px;
        left:4px;
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
    }

    .popover{    
    max-width:unset !important;
    left:unset !important;
    right:15% !important;
    }

    .popover.bottom>.arrow{
        left:92% !important;
    }

    .popover.left{
        right: 34% !important;
    }

    .popover-content{
        padding-bottom: 12px;
        padding-top: 15px;
    }

    #driver_url_container{
        width:370px;
    }    
.filter-radio{
    display: block;
    float: left;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/jquery-tooltip/css/mb.balloon.css">
<div class="row">
    <div class="col-lg-12">
    
<!--  -->

<!--  -->        
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>Drivers List</strong>
                <a href="<?php echo site_url('driver/add')?>" class="btn btn-primary fa fa-plus pull-right" > Add New Driver</a>
                <button type="button" class="btn btn-success fa fa-file-excel-o pull-right" id="excel_file_import"  data-toggle="popover" title="Import Excel File <i class='fa fa-times pull-right popover_close' id='excel_file_import_close' title='Close'></i>" data-content="<form action='<?php echo base_url().'driver/import'?>' method='post' enctype='multipart/form-data' class='form-inline'><div class='form-group mb-2'> <input type='file' class='form-control' name='excel_file' required></div><div class='form-group mx-sm-3 mb-2'> <input type='submit' class='btn btn-sm btn-info pull-right fa fa-clone' style='margin-left: 10px;' name='submit'></div></form><div class='text-danger' style='margin-top: 7px;font-size: 11px;'><a href='<?php echo base_url();?>uploads/excel_files/samples/Driver_sample.xlsx'>Download a sample of Excel</a></div>" data-placement="bottom"> Import Drivers</button>
                <button type="button" class="btn btn-warning fa fa-external-link pull-right" id='url_generator' data-toggle="popover" title="Get Driver URL<i class='fa fa-times pull-right popover_close' id='url_generator_close' title='Close'></i>" data-content="<div class='form-inline'><div class='form-group mb-2'><div id='driver_url_container' class='form-control'></div></div><div class='form-group mx-sm-3 mb-2'> <button class='btn btn-sm btn-info pull-right' onclick='copyToClipboard()' style='margin-left: 10px;'> <i class='fa fa-clone' title='Copy'></i></button></div></div><div class='text-danger' style='margin-top: 7px;font-size: 12px;'>This URL Expire After 24 Hours</div>" data-placement="left"> Get Url</button></h4>
                <hr />
                <form id="user_search">
                    <div class="col-md-5">
                      <span class="filter-radio">
                        <label>Driver Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      </span>
                      <span class="filter-radio">
                        <input checked="checked" onchange="datatableData($(this).val())" name="activation_status" value="0" type="radio" id="aDriver" /><label for="aDriver">Active Drivers&nbsp;</label>(<?php echo $active; ?>)&nbsp;&nbsp;&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="activation_status" value="1" type="radio"  id="iADriver" /> <label for="iADriver">Inactive Drivers&nbsp;</label>(<?php echo $deactive; ?>)&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="activation_status" value="all" type="radio" id="allfDriver" /> <label for="allfDriver">ALL Drivers&nbsp;</label>(<?php echo $all; ?>)&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="activation_status" value="is_proved" type="radio" id="is_proved" /> <label for="is_proved">Sign Up Requests<?php if(get_from('drivers','id,company_id',['is_proved'=>0]) !== null){?><span class="pulsate-circle"><span class="dot"></span><span class="pulse"></span></span><?php }?></label>&nbsp;&nbsp;&nbsp;
                      </span>
                        <hr style="margin:5px 0px;clear: both;" />
                      <span class="filter-radio">
                        <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" value="" type="radio" id="allDriver" /> <label for="allDriver">ALL Drivers&nbsp;</label>(<?php echo $all; ?>)&nbsp;&nbsp;&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" value="local" type="radio"  id="cityDriver" /> <label for="cityDriver">City Drivers&nbsp;</label>(<?php echo $local; ?>)&nbsp;&nbsp;&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" value="long_haul" type="radio"  id="lgDriver" /> <label for="lgDriver">Long Haul&nbsp;</label>(<?php echo $long_haul; ?>)&nbsp;&nbsp;&nbsp;
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" value="owner_operator" type="radio"  id="ooDriver" /> <label for="ooDriver">Owner Operator&nbsp;</label>(<?php echo $owner_operator; ?>)<br />
                      </span>
                      <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" value="driver_of_owner" type="radio" id="dooDriver"  /> <label for="dooDriver">Driver Of Owner Operator&nbsp;</label>(<?php echo $driver_of_owner; ?>)
                      </span>
                    </div>
                    <div class="col-md-3">
                        <label>Date From:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy"  class="form-control default-date-picker" name="user_search_from">
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <label>Date To:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" data-plugin-datepicker data-date-format="mm/dd/yyyy"  class="form-control default-date-picker" name="user_search_to">
                        </div>
                    </div>
                    <div class="col-md-1"> 
                        <button type="button" style="margin-top:20px;" onclick="user_filter()" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table">
                    <table id="mv_datatable"  class="mv_datatable display table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>City</th>
                                <th>Address Street</th>
                                <th>Postal Code</th>
                                <th>Email address</th>
                                <th>SIN #</th>
                                <th>Medical Expiry</th>
                                <th>Date of Application</th>
                                <th>CVOR Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Delete mode -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deactivation Remark</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url().'driver/del'?>" class="form-horizontal" method="post">
                    <input type="hidden" id="deleted-driver-id" value="" name="id">
                    <textarea name="remark" id="remark" cols="30" rows="7"></textarea>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" name="deactivate" class="btn btn-danger">De-Activate</button>
                </form>
            </div>
        </div>
      </div>
    </div>
<!-- Delete mode -->
<script type="text/javascript">
    function showDetails(DT_Id) {
        var deleted_driver_id = DT_Id.getAttribute("data-deleted-id");
        document.getElementById("deleted-driver-id").setAttribute("value", deleted_driver_id);
    }
</script>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>public/js/pulsate.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/jquery-tooltip/js/jquery.mb.balloon.js"></script>

<script type="text/javascript">
    // $(document).ready(function(){
    //     // $(".pulsate-pending").pulsate({
    //     //             reach: 10,                              // how far the pulse goes in px
    //     //         });
    // });
</script>
<!-- <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script> -->
<script>
//---------------------------------------------------
// var table =	$('#mv_datatable').DataTable( {
// 		"processing": true,
// 		"serverSide": true,
//         //"lengthMenu": [[200,500,900], [200,500,900]],
//         "bPaginate": false,
//         "responsive": true,
// 		"ajax": "<?=base_url('driver/datatable_json')?>",
// 		"order": [[0,'desc']],
// 		"columnDefs": [
// 			{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
// 			{ "targets": 1, "name": "first_name", 'searchable':true, 'orderable':true},
// 			{ "targets": 2, "name": "last_name", 'searchable':true, 'orderable':true},
// 			{ "targets": 3, "name": "email", 'searchable':true, 'orderable':true},
// 			{ "targets": 4, "name": "phonenumber", 'searchable':true, 'orderable':true},
// 			{ "targets": 5, "name": "city", 'searchable':true, 'orderable':true},
// 			{ "targets": 6, "name": "province", 'searchable':true, 'orderable':true}
// 		]
// 	});
//---------------------------------------------------
// function user_filter()
// {
// 	$.post('<?=base_url('driver/search')?>',$('#user_search').serialize(),function(){
// 		table.ajax.reload( null, false );
// 	});
// }
	
var table = null;

function datatableData(click = null){
    $.post('<?=base_url('driver/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'driver/datatable_json'?>",{'search':''},function(data){
            if(data != ''){
                if(click == null){
                      table = $('.mv_datatable').dataTable({
                        "bPaginate": false,
                        "fixedHeader": true,
                        "dom": 'Bfrtip',
                        "fnDrawCallback": function( oSettings ) {
                              $(".pulsate-table").pulsate({
                                    reach: 5,                             
                                });
                         },
                        // "stateSave": true,
                        "buttons": [
                            // 'copyHtml5',
                            // 'excelHtml5',
                            //'csvHtml5',
                            // 'pdfHtml5',
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
                                }
                            },
                            'colvis'
                        ],
                        "order": [[0,'asc']],
                        columnDefs: [
                            { targets: [0,1,2,3,4,5,6,14], visible: true},
                            { targets: '_all', visible: false }
                        ]
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
        datatableData();
        
        $(document).on('click','.balloon',function(){
            $(this).showBalloon();
        });
    });

    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($("#driver_url_container").text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
</script>