<form class="form-horizontal" id="driver_add_form" action="<?php echo base_url('external/driver/add')?>" method="post" novalidate enctype="multipart/form-data">
	<input type="hidden" name="token" id="token" value="<?php echo $driver['token'];?>">
	<input type="checkbox" name="is_agree" id="is_agree">
	<label for="is_agree">Do You Agree With All Terms And Conditions.</label>

	
	<input type="submit" name="isAgreeSubmit" class="submit-style">
</form>