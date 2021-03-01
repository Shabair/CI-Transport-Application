<div class="row">
    <div class="col-lg-12">
    
<!--  -->
      
<!--  -->        
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>Users List</strong>
                <a href="<?php echo site_url('companyusers/add')?>" class="btn btn-primary fa fa-user-plus pull-right" > Add New User</a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-5">
                        <label>Admin State</label>
                        <hr style="margin:5px 0px;" />
                        <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type0" value="0" type="radio"  /><label for="user_search_type0">&nbsp;Active Users&nbsp;</label>(<?php echo $active; ?>)&nbsp;&nbsp;&nbsp;
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type1" value="1" type="radio"  /><label for="user_search_type1">&nbsp;Deactivated Users&nbsp;</label>(<?php echo $deactive; ?>)&nbsp;&nbsp;&nbsp;
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type2" value="all" type="radio"  /><label for="user_search_type2">&nbsp;All Users&nbsp;</label>(<?php echo $all; ?>)&nbsp;&nbsp;&nbsp;
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
                                <th>Last Nmae</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->

<!-- Delete mode -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deactivation Remark</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url().'companyusers/delete'?>" class="form-horizontal" method="post">
                    <input type="hidden" id="deleted-user-id" value="" name="id">
                    <textarea name="remark" id="remark" cols="30" rows="7"></textarea>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" name="deactivate" class="btn btn-danger">De-Activate</button>
                </form>
            </div>
        </div>
      </div>
    </div>
<!-- Delete mode -->

<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>


<script>

function showDetails(DT_Id) {
    var deleted_user_id = DT_Id.getAttribute("data-deleted-id");
    document.getElementById("deleted-user-id").setAttribute("value", deleted_user_id);
}

function datatableData(click = null){
    $.post('<?=base_url('companyusers/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'companyusers/datatable_json'?>",{'search':''},function(data){
            if(data != ''){
                if(click == null){
                    var table = $('.mv_datatable').dataTable({
                        "bPaginate": false,
                        "fixedHeader": true,
                        "stateSave": true,
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