<?php
$trucks = $this->Maintenance_model->get_trucks();
$trailers = $this->Maintenance_model->get_trailers();
?>
<div class="row">
    <div class="col-lg-12">
    
        <?php if ($this->session->flashdata('success')) :?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?=$this->session->flashdata('success')?></strong> 
        </div>
        <?php endif;?>
        <section class="panel">
            <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Trucks</a></li>
                  <li><a data-toggle="tab" href="#menu1">Trailers</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                    <h1 style="text-align:center">List Of Trucks</h1>
                    <div class="adv-table">
                        <div><p style="    width: 10%;float: left;"><span>Filter By Status</span></p>
                        <p class="customSeachTruck"></p></div>
                        <table  class="mv_trucks display table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Unit</th>
                                    <th>VIN</th>
                                    <th>Make</th>
                                    <th>Year</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <?php
                            foreach($trucks as $oneTruck)
                            {
                            ?>
                            <tr>
                                    <td><?php echo $oneTruck->id?></td>
                                    <td><?php echo $oneTruck->unit_no?></td>
                                    <td><?php echo $oneTruck->vin_no?></td>
                                    <td><?php echo $oneTruck->make?></td>
                                    <td><?php echo $oneTruck->year?></td>
                                    <td>Truck</td>
                                    <td>active</td>
                                    <td><a class="btn btn-xs btn-success" href="<?php echo base_url('maintenance/vehicle').'/truck/'.$oneTruck->id?>"> Do Maintenance</a></td>
                                </tr>
                            <?php 
                            }
                            ?>
                        </table>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                    <h1 style="text-align:center">List Of Trailers</h1>
                    	<div class="adv-table">
                        <div><p style="    width: 10%;float: left;"><span>Filter By Status</span></p>
                        <p class="customSeachTruck"></p></div>
                        <table  class="mv_trailers display table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Unit</th>
                                    <th>VIN</th>
                                    <th>Make</th>
                                    <th>Year</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <?php
                            foreach($trailers as $oneTrailer)
                            {
                            ?>
                            <tr>
                                    <td><?php echo $oneTrailer->id?></td>
                                    <td><?php echo $oneTrailer->unit_no?></td>
                                    <td><?php echo $oneTrailer->vin_no?></td>
                                    <td><?php echo $oneTrailer->make?></td>
                                    <td><?php echo $oneTrailer->year?></td>
                                    <td>Trailer</td>
                                    <td>active</td>
                                    <td><a class="btn btn-xs btn-success" href="<?php echo base_url('maintenance/vehicle').'/trailer/'.$oneTrailer->id?>"> Do Maintenance</a></td>
                                </tr>
                            <?php 
                            }
                            ?>
                        </table>
                        </div>

                    </div>
                </div><!-- tab content div end-->
            </div>
        </section>
    </div>
</div>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
<script>
var table =	$('.mv_trailers').DataTable( {
		"processing": false,
		"serverSide": false,
		"lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
		"order": [[0,'desc']],
		"columnDefs": [
			{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
			{ "targets": 1, "name": "unit_no", 'searchable':true, 'orderable':true},
			{ "targets": 2, "name": "vin_no", 'searchable':true, 'orderable':true},
			{ "targets": 3, "name": "make", 'searchable':true, 'orderable':true},
			{ "targets": 4, "name": "year", 'searchable':true, 'orderable':true},
			{ "targets": 5, "name": "type", 'searchable':false, 'orderable':true},
			{ "targets": 6, "name": "status", 'searchable':false, 'orderable':true},
			{ "targets": 7, "name": "Option", 'searchable':false, 'orderable':false}
		],
initComplete: function () {
            this.api().columns(6).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $('.customSeachTruck').empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
	});
</script>