
<!-- page start-->
<div class="row">
  <div class="col-md-12">
	 <?php if ($this->session->flashdata('success')) :?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?=$this->session->flashdata('success')?></strong> 
        </div>
        <?php endif;?>
  </div>	
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<h4>Staff</h4>
				</div><div class="col-md-6">
					<a class="btn btn-primary pull-right fa fa-plus" href="<?php echo site_url('staff/add')?>"> Add Staff</a>
				</div>
			</div>
          </header>
          <div class="panel-body">
                <div class="adv-table">
                   
                    <table  class="display table table-bordered table-striped" id="example">
                      <thead>
                      <tr>
                          <th>Name </th>
                          <th>Email</th>
                          <th>Role</th>
						  <th>Permissions</th>
                          <th class="text-right">Option</th>
                         
                      </tr>
                      </thead>
                      
                      
                      <tbody>
                      
                       <?php  
					   
						if(isset($staff_detail) && $staff_detail != '')
						{
							foreach($staff_detail as $row):?>
        
        
                        <tr class="gradeX" id="">
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><button class="btn btn-success btn-xs" type="button"><?php echo getrolename($row['role_id']);?></button></td>
							<td><?php 
							foreach(unserialize($row['permission_id']) as $permission){
								echo '<button type="button" class="permission btn btn-info btn-xs">'.getpermissionname($permission).'</button>';
							}
							?></td>
                            <td >
								<div class="btn-group pull-right">
                                  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle btn-xs" type="button">Action <span class="caret"></span></button>
                                  <ul role="menu" class="dropdown-menu">
									  <li><a href="<?php echo site_url('staff/view/'.$row['id'])?>">View</a></li>
                                      <?php if(check_permission(32)||is_admin()){?>
									  <li><a href="<?php echo site_url('staff/edit/'.$row['id'])?>">Edit</a></li>
									  <?php } ?>
									  <li class="divider"></li>
                                      <?php if(check_permission(33)&& is_admin()){?><li><a href="#">Delete</a></li>
									  <?php } ?>
                                  </ul>
								</div>
							</td>
                     
                        </tr>	
                            
                        <?php  endforeach; } ?>		
						
						</tbody>
                    
					</table>
                </div>
          </div>
      </section>
  </div>
</div>
<!-- page end-->
          