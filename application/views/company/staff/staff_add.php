<!-- page start-->

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
      <div class="row">
        
		<?php isset($staff_detail)?$id=$staff_detail[0]['id']:$id='';?>	

		<?php if($id == ''){?>
        <div class="col-md-6"><h4>Add Staff</h4></div>
		<?php }else{?>
		<div class="col-md-6"><h4>Edit Staff</h4></div>
		<?php } ?>
  
      </div>
      </header>
      <div class="panel-body">
		<div class="alert alert-success" id="success" style="display:none;"></div>
		<div class="form">
	
		  <form class="cmxform tasi-form " id="add_form" method="post" action="<?php echo site_url('staff/add_staff/'.$id)?>">
			<div class="col-lg-6">

				<div class="col-md-12">
				  <div class="form-group">
					<label for="">Name</label>
						<?php isset($staff_detail)?$name=$staff_detail[0]['name']:$name='';?>
						<input type="text" id="username" name="username" class="form-control" placeholder="" value="<?php echo $name; ?>" required>
				  </div>
				</div>
				<div class="col-md-12">
				  <div class="form-group ">
					<label for="">Account Role</label>

						<select name="role_id" class="form-control">
							<?php isset($staff_detail)?$role_id=$staff_detail[0]['role_id']:$role_id='';?>
							<?php if($role_id != '') {?>
							<option value="<?php echo $role_id;?>" selected><?php echo getrolename($role_id); ?></option>
							<?php } ?>
							<option value="">-select role-</option>
							<?php foreach($staff_roles as $role): ?>
								
								<option value="<?php echo $role['id']?>"><?php echo $role['role_name']?></option>
							<?php endforeach; ?>
						</select>
				  </div>
				</div>
				<div class="col-md-12">
				  <div class="form-group ">
					<label for="">Email</label>
						<?php isset($staff_detail)?$email=$staff_detail[0]['email']:$email='';?>
						<input type="email" id="email" name="email" class="form-control" placeholder="" value="<?php echo $email; ?>" required>
				  </div>
				</div>
				
				<div class="col-md-12">
				  <div class="form-group ">
					<label for="">Password</label>
						<?php isset($staff_detail)?$password=$staff_detail[0]['password']:$password='';?>
						<input type="text" id="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="" required>
				  </div>
				</div>
				<?php if($id == ''){?>
				<div class="col-md-12">
				  <div class="form-group ">
					<label for="">Confirm Password</label>

						<input type="text" id="confirm_password" name="confirm_password" class="form-control" placeholder="" required>
				  </div>
				</div>
				<?php } ?>
				<div class="col-md-12">
				  <div class="form-group ">
					<label for="">Skype Id</label>

						<input type="text" id="skype_id" name="skype_id" class="form-control" placeholder="" >
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
				 <strong> Users Permissions </strong>
				 <?php isset($staff_detail)?$permissionselect = unserialize($staff_detail[0]['permission_id']): $permissionselect=''; ?>
				 <?php foreach($staff_permissions as $permission):?>
					<div class="checkbox">
					<label>
					  <?php $checked=''; if($permissionselect != ''){ if(in_array($permission['id'],$permissionselect))$checked="checked"; }?>
					  <input type="checkbox" name="permission_id[]" value="<?php echo $permission['id']; ?>" <?php echo $checked;?>> <?php echo $permission['permissions']; ?>
					</label>
				  </div>
				 <?php endforeach; ?>
				
				</div>
			</div>
			<div class="col-md-12">
			  <?php if($id != '')?>
			  
			  <?php if($id == ''){
				 echo '<input type="submit" class="btn btn-primary pull-right" id="btn_add" name="add_submit"  value="add" />
'; 			  
			  }
				else{
					echo '<input type="submit" class="btn btn-primary pull-right" id="btn_update" name="update_submit" value="update" />';
				}
			  ?>
			 
			</div>
			</form>
		 </div>	
      </div>
    </section>
  </div>
</div>
<!-- page end--> 

<script>


  /*$(document).ready(function(){
	  
	 var URL = $('#add_form').attr('action'); 
	
	 $("#btn_add").on('click', function() {
		 		 
		var formData = new FormData($('#add_form')[0]);
		 
		$.ajax({
			url: URL,
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$("#btn_add").attr('disabled', true);
				$("#btn_add").html('<i class="fa fa-spinner fa-pulse"></i>');
				
			},
			success: function(response) {
				alert(response);
				
				if(response == 'success'){
					
					alert(response);
					
					$("form").trigger('reset');
					$("#btn_add").attr('disabled', false);
					$("#btn_add").html('Submit');
					$("html, body").animate({ scrollTop: 0 }, "slow"); 
					$('#success').show().html('Request Submit Successfully !');
					setTimeout(function() {$('#success').hide();},3000);
					
				}else{
					$("html, body").animate({ scrollTop: 0 }, "slow"); 
					$('#success').show().html('Some error occur while editing !');
				}
				
			}
		});	   
	});

 
 
 
 
	  
  });*/
</script>







