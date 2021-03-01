<!-- page start-->

<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
      <div class="row">
        
        <div class="col-md-6"><h4>Edit Staff</h4></div>
  
      </div>
      </header>
      <div class="panel-body">
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class="form">
          <form class="cmxform tasi-form " id="update_staff_form" method="post">
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>

                    <input type="text" id="" name="username" class="form-control" placeholder="" required>
              </div>
            </div>
			<div class="col-md-6">
              <div class="form-group ">
                <label for="">Account Role</label>

                    <select name="role" class="form-control">
						<option value="">data entry operator</option>
					</select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="">Email</label>

                    <input type="email" id="" name="email" class="form-control" placeholder="" required>
              </div>
            </div>
			
			 <div class="col-md-6">
              <div class="form-group ">
                <label for="">Password</label>

                    <input type="text" id="" name="password" class="form-control" placeholder="" required>
              </div>
            </div>

           
            <div class="col-md-12">
              <input type="button" class="btn btn-primary pull-right btn_update_staff" name="submit_customer" value="update" />
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- page end--> 

<script>


  $(document).ready(function(){
	  
	  
	 $(".btn_update_staff").on('click', function() {
		//alert('before send');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url();?>/staff/edit',
			data: $(".update_staff_form").serialize(),
			
			beforeSend: function(){
				$(".btn_update_staff").attr('disabled', true);
				$(".btn_update_staff").html('<i class="fa fa-spinner fa-pulse"></i>');
				
			},
			
			success: function(response) {
				alert(response);
				
				if(response == 'success'){
					
					alert(response);
					
					$("form").trigger('reset');
					$(".btn_update_staff").attr('disabled', false);
					$(".btn_update_staff").html('Submit');
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

 
 
 
 
	  
  });
</script>







