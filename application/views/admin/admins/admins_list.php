<div class="row">
    <div class="col-lg-12">
    
<!--  -->
      
<!--  -->        
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>Admin List</strong>
                <a href="<?php echo base_url('admin/admins/add')?>" class="btn btn-primary fa fa-user-plus pull-right" > Add New Admin</a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-5">
                        <label>Admin State</label>
                        <hr style="margin:5px 0px;" />
                        <input checked="checked" onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type0" value="0" type="radio"  /><label for="user_search_type0">&nbsp;Active Admins&nbsp;&nbsp;&nbsp;</label>
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type1" value="1" type="radio"  /><label for="user_search_type1">&nbsp;Deactive Admins&nbsp;&nbsp;&nbsp;</label>
                        <input onchange="datatableData($(this).val())" name="user_search_type" id="user_search_type2" value="all" type="radio"  /><label for="user_search_type2">&nbsp;All Admins&nbsp;&nbsp;&nbsp;</label>
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
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>


<script>


function datatableData(click = null){
    $.post('<?=base_url('admin/admins/search')?>',$('#user_search').serialize(),function(){
        $.post("<?=base_url().'admin/admins/datatable_json'?>",{'search':''},function(data){
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