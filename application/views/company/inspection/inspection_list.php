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
                <h4 class=""> <strong>Inspection List</strong><a href="<?php echo site_url('inspection/add')?>" class="btn btn-primary pull-right" > Add New Inspection</a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-12">
                        <label>Inspection State</label>
                        <hr style="margin:5px 0px;" />
                        <span class="filter-radio">
                        <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type0" value="all" type="radio"  /><label for="user_search_type0">&nbsp;All Inspections&nbsp;</label>(<?php echo $all; ?>)&nbsp;&nbsp;&nbsp;
                        </span>
                        <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type1" value="can" type="radio"  /><label for="user_search_type1">&nbsp;Canadian Inspections&nbsp;</label>(<?php echo $can; ?>)&nbsp;&nbsp;&nbsp;
                        </span>
                        <span class="filter-radio">
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type2" value="us" type="radio"  /><label for="user_search_type2">&nbsp;US Inspections&nbsp;</label>(<?php echo $us; ?>)&nbsp;&nbsp;&nbsp;
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
                                <th>Date</th>
                                <th>Driver</th>
                                <th>Defects</th>
                                <th>Level</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Truck</th>
                                <th>Trailer</th>
                                <th>Status</th>
                                <th>Remarks</th>
								<th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
<script type="text/javascript">

function datatableData(click = null){
    $.post('<?=base_url('inspection/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'Inspection/datatable_json'?>",{'search':''},function(data){
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
