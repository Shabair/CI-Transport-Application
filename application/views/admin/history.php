<div class="row">
    <div class="col-lg-12">       
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>History</strong> </h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-5">
                       
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
                                <th>User</th>
                                <th>E-Mail</th>
                                <th>Action</th>
                                <th>Action Place</th>
                                <th>Action On</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>

<script type="text/javascript">
//---------------------------------------------------
var table =	$('#mv_datatable').DataTable( {
		"processing": true,
		"serverSide": true,
        "lengthMenu": [[200,500,900], [200,500,900]],
        "bPaginate": true,
        "responsive": true,
		"ajax": "<?=base_url('admin/history/datatable_json')?>",
		"order": [[6,'desc']],
		"columnDefs": [
			{ "targets": 0, "name": "", 'searchable':false, 'orderable':false},
			{ "targets": 1, "name": "u.first_name", 'searchable':true, 'orderable':true},
			{ "targets": 2, "name": "u.email", 'searchable':true, 'orderable':true},
            { "targets": 3, "name": "h.action", 'searchable':true, 'orderable':true},
			{ "targets": 4, "name": "h.action_place", 'searchable':true, 'orderable':true},
			{ "targets": 5, "name": "CONCAT(u2.first_name,' ',u2.middle_name,' ',u2.last_name)", 'searchable':true, 'orderable':true},
			{ "targets": 6, "name": "h.action_date", 'searchable':true, 'orderable':true}
		]
	});
//---------------------------------------------------
function user_filter()
{
	$.post('<?=base_url('admin/history/search')?>',$('#user_search').serialize(),function(){
		table.ajax.reload( null, false );
	});
}
	



</script>