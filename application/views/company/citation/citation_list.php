<style type="text/css">
#DataTables_Table_0{
    margin-left:  0px;
    margin-right:  0px;
}
.col-lg-12 {
    padding-left: 5px;
    padding-right: 5px;
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
                <h4 class=""> <strong>Citation List</strong><a href="<?php echo site_url('citation/add')?>" class="btn btn-primary pull-right" > Add New Citation</a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-5">
                        <span class="filter-radio">
                        <label>Inspection State</label>
                        </span>
                        <hr style="margin:5px 0px;clear: both;" />
                        <span class="filter-radio">
                            <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type0" value="all" type="radio"  /><label for="user_search_type0">&nbsp;All Citation&nbsp;</label>(<?php echo $all; ?>)&nbsp;&nbsp;&nbsp;
                        </span>
                        <span class="filter-radio">
                            <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type1" value="can" type="radio"  /><label for="user_search_type1">&nbsp;Canadian Citation&nbsp;</label>(<?php echo $can; ?>)&nbsp;&nbsp;&nbsp;
                        </span>
                        <span class="filter-radio">
                            <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type2" value="us" type="radio"  /><label for="user_search_type2">&nbsp;US Citation&nbsp;</label>(<?php echo $us; ?>)&nbsp;&nbsp;&nbsp;
                        </span>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table" style="font-size:11px;">
                    <table  class="mv_datatable display table table-bordered table-striped table-responsive" style=" width: 100%; ">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Offense Date</th>
                                <th>Driver's Name</th>
                                <th>Offence</th>
                                <th>Location</th>
                                <th>State</th>
                                <th>Amount</th>
                                <th>Court Date</th>
                                <th>Fine Date</th>
                                <th>Status</th>
                                <th>Remarks</th>
								<th>Option</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
<!-- <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
<script>
//---------------------------------------------------
var table =	$('.mv_datatable').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": "<?=base_url('citation/datatable_json')?>",
        "bPaginate": false,
		"order": [[0,'desc']],
		"columnDefs": [
			{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
			{ "targets": 1, "name": "insp_date", 'searchable':true, 'orderable':true},
			{ "targets": 2, "name": "driver_id", 'searchable':true, 'orderable':true},
			{ "targets": 3, "name": "offence", 'searchable':true, 'orderable':true},
			{ "targets": 4, "name": "Location", 'searchable':true, 'orderable':true},
			{ "targets": 5, "name": "cita_loc", 'searchable':true, 'orderable':true},
            { "targets": 6, "name": "Plenty", 'searchable':true, 'orderable':true},
            { "targets": 7, "name": "court_date", 'searchable':true, 'orderable':true},
            { "targets": 8, "name": "fu_date", 'searchable':true, 'orderable':true},
            { "targets": 9, "name": "status", 'searchable':true, 'orderable':true},
			{ "targets": 10, "name": "remarks", 'searchable':false, 'orderable':false},
            { "targets": 11, "name": "Option", 'searchable':false, 'orderable':false}
		]
	});

//---------------------------------------------------
function user_filter()
{
	$.post('<?=base_url('citation/search')?>',$('#user_search').serialize(),function(){
		table.ajax.reload( null, false );
	});
}
	
</script>

<script type="text/javascript">
$(document).ready(function(){
   
   user_filter(); 

});

</script> -->

<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
<script type="text/javascript">

function datatableData(click = null){
    $.post('<?=base_url('citation/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'citation/datatable_json'?>",{'search':''},function(data){
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

</script>
