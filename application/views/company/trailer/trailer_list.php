<style type="text/css">
#DataTables_Table_0{
    width: 1140px;
}
.col-lg-12 {
    padding-left: 5px;
    padding-right: 5px;
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
.filter-radio{
    display: block;
    float: left;
}
</style>

<div class="row">
    <div class="col-lg-12">
        
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>Trailer List</strong>
                <a href="<?php echo site_url('Trailer/add')?>" class="btn btn-primary fa fa-plus pull-right" > Add New Trailer</a>
                <button type="button" class="btn btn-success fa fa-file-excel-o pull-right" id="excel_file_import"  data-toggle="popover" title="Import Excel File <i class='fa fa-times pull-right popover_close' id='excel_file_import_close' title='Close'></i>" data-content="<form action='<?php echo base_url().'Trailer/import'?>' method='post' enctype='multipart/form-data' class='form-inline'><div class='form-group mb-2'> <input type='file' class='form-control' name='excel_file' required></div><div class='form-group mx-sm-3 mb-2'> <input type='submit' class='btn btn-sm btn-info pull-right fa fa-clone' style='margin-left: 10px;' name='submit'></div></form><div class='text-danger' style='margin-top: 7px;font-size: 11px;'><a href='<?php echo base_url();?>uploads/excel_files/samples/Trailer_sample.xlsx'>Download a sample of Excel</a></div>" data-placement="bottom"> Import Trailers</button></h4>
                <hr style="margin:2px0px;" />
                <form id="user_search">
                    <div class="col-md-5">
                        <label>Trailer State</label>
                        <hr style="margin:5px 0px;" />
                        <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type2" value="0" type="radio"  /><label for="user_search_type2">&nbsp;Active Trailers &nbsp;</label>(<?php echo $active; ?>)&nbsp;&nbsp;&nbsp;
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type3" value="1" type="radio"  /><label for="user_search_type3">&nbsp;Inactive Trailers&nbsp;</label>(<?php echo $deactive; ?>)&nbsp;&nbsp;&nbsp;
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type1" value="all" type="radio"  /><label for="user_search_type1">&nbsp;All Trailers&nbsp;</label> (<?php echo $all; ?>)&nbsp;&nbsp;&nbsp;
                    </div>
                </form>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table" style="font-size:11px;">
                    <table  class="mv_datatable display table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Unit</th>
                                <th>VIN</th>
                                <th>Year</th>
                                <th>Licence plate</th>
                                <th>Make</th>
                                <th id="changea-ble-th-1">Annual <br>Safety Due</th>
                                <th id="changea-ble-th-2">Name on Ownership</th>
                                <th id="changea-ble-th-3">Addition</th>
                                <th id="changea-ble-th-4">Status</th>
                                <th id="changea-ble-th-5">Reefer<br>Dryvan</th>
								<th>Option</th>
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
                <form action="<?php echo base_url().'trailer/delete'?>" class="form-horizontal" method="get">
                    <input type="hidden" id="deleted-trailer-id" value="" name="id">
                    <textarea name="remark" id="remark" cols="30" rows="7"></textarea>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" name="deactivate" class="btn btn-danger">De-Activate</button>
                </form>
            </div>
        </div>
      </div>
    </div>
<!-- Delete mode -->
<!-- page end-->
<!-- <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
<script>
//---------------------------------------------------
//var act = "{ 'targets': 6, 'name': 'annual_safety_due', 'searchable':true, 'orderable':true}";
var table =	$('.mv_datatable').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": "<?=base_url('Trailer/datatable_json')?>",
        //"lengthMenu": [[200,500,900], [200,500,900]],
        "bPaginate": false,
		"order": [[0,'desc']],
		"columnDefs": [
			{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
			{ "targets": 1, "name": "unit_no", 'searchable':true, 'orderable':true},
			{ "targets": 2, "name": "vin_no", 'searchable':true, 'orderable':true},
			{ "targets": 3, "name": "year", 'searchable':true, 'orderable':true},
			{ "targets": 4, "name": "plate_no", 'searchable':true, 'orderable':true},
			{ "targets": 5, "name": "make", 'searchable':true, 'orderable':true},
            { "targets": 6, "name": "annual_safety_due", 'searchable':true, 'orderable':true},
			{ "targets": 7, "name": "ownership_name", 'searchable':true, 'orderable':true},
			{ "targets": 8, "name": "addition", 'searchable':true, 'orderable':true},
            { "targets": 9, "name": "status", 'searchable':true, 'orderable':true},
            { "targets": 10, "name": "reefer_dryvan", 'searchable':true, 'orderable':true},
			{ "targets": 11, "name": "Option", 'searchable':false, 'orderable':false}
		]
	});
//---------------------------------------------------


//---------------------------------------------------
function user_filter()
{
    $.post('<?=base_url('trailer/search')?>',$('#user_search').serialize(),function(){
        table.ajax.reload( null, false );
    });
}



$("input[name=user_search_type]:radio").on('change',function(){

    var value = $(this).val();
    get_user_search_type(value);

});


function get_user_search_type(value){

    if(value == '1'){
        $("#changea-ble-th-1").empty().append('Name on Ownership');
        $("#changea-ble-th-2").empty().append('Addition');
        $("#changea-ble-th-3").empty().append('Status');
        $("#changea-ble-th-4").empty().append('Reefer<br>Dryvan');
        $("#changea-ble-th-5").empty().append('Deactivation Remark');
        
    }else{
        $("#changea-ble-th-1").empty().append('Annual <br>Safety Due');
        $("#changea-ble-th-2").empty().append('Name on Ownership');
        $("#changea-ble-th-3").empty().append('Addition');
        $("#changea-ble-th-4").empty().append('Status');
        $("#changea-ble-th-5").empty().append('Reefer<br>Dryvan');
    }
}


$(document).ready(function(){

get_user_search_type($('input[name=user_search_type]:checked').val());

user_filter();



$('.bs-example-modal-sm').on('hidden.bs.modal', function () {
   
  document.getElementById("remark").value = "";
});



});

	
</script> -->



<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
<script type="text/javascript">

function datatableData(click = null){
    $.post('<?=base_url('trailer/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'trailer/datatable_json'?>",{'search':''},function(data){
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
                                    columns: [0,1,2,3,4,5,6,7,8,9,10]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7,8,9,10]
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
});

function showDetails(DT_Id) {
    var deleted_trailer_id = DT_Id.getAttribute("data-deleted-id");
    document.getElementById("deleted-trailer-id").setAttribute("value", deleted_trailer_id);
}


$("input[name=user_search_type]:radio").on('change',function(){

    var value = $(this).val();
    get_user_search_type(value);

});


function get_user_search_type(value){

    if(value == '1'){
        $("#changea-ble-th-1").empty().append('Name on Ownership');
        $("#changea-ble-th-2").empty().append('Addition');
        $("#changea-ble-th-3").empty().append('Status');
        $("#changea-ble-th-4").empty().append('Reefer<br>Dryvan');
        $("#changea-ble-th-5").empty().append('Deactivation Remark');
        
    }else{
        $("#changea-ble-th-1").empty().append('Annual <br>Safety Due');
        $("#changea-ble-th-2").empty().append('Name on Ownership');
        $("#changea-ble-th-3").empty().append('Addition');
        $("#changea-ble-th-4").empty().append('Status');
        $("#changea-ble-th-5").empty().append('Reefer<br>Dryvan');
    }
}


$(document).ready(function(){

get_user_search_type($('input[name=user_search_type]:checked').val());

// user_filter();



$('.bs-example-modal-sm').on('hidden.bs.modal', function () {
   
  document.getElementById("remark").value = "";
});



});

</script>
