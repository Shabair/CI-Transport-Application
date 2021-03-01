
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
		
		<aside class="profile-nav col-lg-3">
		  <section class="panel">
			  <div class="user-heading round">
				  <a href="#">
					  <img src="<?php if(!empty($user_detail->picture)){echo 'http://hrgulf.com/'.$user_detail->picture;} else{echo 'http://hrgulf.com/documents/avatar.png';} ?>" alt="">
				  </a>
				  <h1><?php echo $user_detail->first_name.' '.$user_detail->last_name;?></h1>
				  <p><i class="fa fa-message"> </i><?php echo $user_detail->email; ?></p>
			  </div>

			  <ul class="nav nav-pills nav-stacked">
				  <li class="active"><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
			  </ul>

		  </section>
		</aside>
	  
	  
	  <aside class="profile-info col-lg-9">
	
		  <section class="panel">
			  <div class="bio-graph-heading">
				  Complete User Profile <a style="margin-right:0px;" href="<?php echo site_url('user')?>" class="btn btn-danger pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
			  </div>
			  <div class="panel-body bio-graph-info">
				  <h1>Basic Detail</h1>
				  <div class="row">
					  <div class="bio-row">
						  <p><span>First Name </span>: <?php echo $user_detail->first_name; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Last Name </span>: <?php echo $user_detail->last_name; ?></p>
					  </div>
					   <div class="bio-row">
						  <p><span>Gender </span>: <?php echo $user_detail->gender; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Birthday</span>: <?php echo $user_detail->dob; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Country </span>: <?php echo $user_detail->country; ?></p>
					  </div>
					   <div class="bio-row">
						  <p><span>Nationality </span>: <?php echo $user_detail->nationality; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Occupation </span>: <?php echo $user_detail->industry; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Mobile No </span>: <?php echo $user_detail->mobile_number; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Alternet No </span>: <?php echo $user_detail->alternate_number; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Martial Status </span>: <?php echo $user_detail->martial_status; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Driving License </span>: <?php echo $user_detail->driving_license; ?></p>
					  </div>
					  <div class="bio-row">
						  <p><span>Visa Status </span>: <?php echo $user_detail->visa_status; ?></p>
					  </div>
					   <div class="bio-row">
						  <p><span>Current Salary </span>: <?php echo $user_detail->current_salary; ?></p>
					  </div>
					   <div class="bio-row">
						  <p><span>Expected Salary </span>: <?php echo $user_detail->excepted_salary; ?></p>
					  </div>
                      <div class="bio-row">
						  <p><span>Registration Date </span>: <?php echo $user_detail->date; ?></p>
					  </div>
					
				  </div>
			  </div>
		  </section>
		
	  </aside>
	  	
  </div>
  
  
  <div class="row">
	<div class="col-md-12">
		<div class="panel">
		  <header class="panel-heading tab-bg-dark-navy-blue ">
			  <ul class="nav nav-tabs">
				  <li class="active">
					  <a data-toggle="tab" href="#personal_summary">Personal Summary</a>
				  </li>
				  <li>
					  <a data-toggle="tab" href="#activity_log">Activity Log</a>
				  </li>
				  <li class="">
					  <a data-toggle="tab" href="#services">Services</a>
				  </li>
				  <li class="">
					  <a data-toggle="tab" href="#payment">Payment Detail</a>
				  </li>
				  <li class="">
					  <a data-toggle="tab" href="#email">Email</a>
				  </li>
				 
			  </ul>
		  </header>
		  <div class="panel-body">
			  <div class="tab-content">
			  
				<!-- Personal Summary Tab -->
				 <div id="personal_summary" class="tab-pane active">
					<div class="col-lg-10">
						<section class="panel">
							<header class="panel-heading">
								Personal Summary
								
							</header>
							<div class="panel-body">
							
							
								 <ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#experience" data-toggle="tab">Experience</a></li>
									<li><a href="#education" data-toggle="tab">Education</a></li>
									<li><a href="#documents" data-toggle="tab">Documents</a></li>
								  </ul>

								  <!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="experience">
										<br>
										<?php if(isset($user_experience) && $user_experience > 0){
											
												foreach($user_experience as $experience){ ?>
												
												
												<p><strong>Job Title: </strong><?php echo $experience['job_title']; ?></p>
												<p><strong>Company: </strong><?php echo $experience['company']; ?></p>
												<p><strong>Location: </strong><?php echo $experience['city'].', '.$experience['country']; ?></p>
												<p><strong>Date: </strong><?php echo $experience['start_date'].' to '.$experience['end_date']; ?></p>
												<p><strong>Description: </strong><?php echo $experience['job_description']; ?></p>
												<hr>
													
										<?php			
												}
												
										}	
										else{
												echo 'record not found';
											}
										?>
									</div>
									<div role="tabpanel" class="tab-pane" id="education">
										<br>
										<?php if(isset($user_education) && $user_education > 0){
											
												foreach($user_education as $education){ ?>
												
												
												<p><strong>Degree Title: </strong><?php echo $education['degree_title']; ?></p>
												<p><strong>Degree Level: </strong><?php echo $education['degree_level']; ?></p>
												<p><strong>Location: </strong><?php echo $education['city'].', '.$education['country']; ?></p>
												<p><strong>Institute: </strong><?php echo $education['institute']; ?></p>
												<p><strong>Date: </strong><?php echo $education['completion_year']; ?></p>
												<p><strong>Major Subjects: </strong><?php echo $education['major_subjects']; ?></p>
												<hr>
													
										<?php			
												}
											
										}	
										else{
												echo 'record not found';
											}	
										?>
									</div>
									<div role="tabpanel" class="tab-pane" id="documents">
										
										<div class="col-md-12"><br>
											<p><strong>Resume:</strong></p>
											<?php if(!empty($user_detail->resume)){ ?>
											<p><a href="<?php if(!empty($user_detail->resume)){echo 'http://hrgulf.com/'.$user_detail->resume;}?>" target="_blank"  class="fa fa-file-word-o ">Click to Download</a></p>
											<?php }?>
										</div>
										<div class="col-md-12">
											<p><strong>Cover Letter:</strong></p>
											<?php if(!empty($user_detail->cover_letter)){ ?>
											<p><a href="<?php if(!empty($user_detail->cover_letter)){echo 'http://hrgulf.com/'.$user_detail->cover_letter;} ?>" target="_blank" class="fa fa-file-text-o ">Click to Download</a></p>
											<?php }?>
										</div>
										<div class="col-md-12">
											<p><strong>Passport:</strong></p>
											<?php if(!empty($user_detail->cover_letter)){ ?>
											<p><a href="<?php if(!empty($user_detail->passport)){echo 'http://hrgulf.com/'.$user_detail->passport;} ?>" target="_blank" class="fa fa-file-image-o ">Click to Download</a></p>
											<?php }?>
										</div>
										
									</div>
								</div>
								
								
								
							</div>
						</section>
					</div>		
				</div>
				<!-- end personal summary Tab -->
			  
			  
			      <!-- User Activity log -->
				  <div id="activity_log" class="tab-pane ">
					  <div class="col-lg-6">
						  <section class="panel">
							  <header class="panel-heading">
								  Chats
								
							  </header>
							  <div class="panel-body">
								  <div class="timeline-messages">
									  <!-- Comment -->
									    <?php foreach($user_activity_log as $log): ?>
										<?php
											$this->db->where('id', $log['admin_id']); 
											$query = $this->db->get('admin');
											$admin_name = $query->row()->username;
										?>	
										
										  <div class="msg-time-chat">
											  <a href="#" class="message-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
											  <div class="message-body msg-in">
												  <span class="arrow"></span>
												  <div class="text">
													  <p class="attribution"><a href="#"><?php echo $admin_name; ?></a> <?php echo $log['date']; ?></p>
													  <p><?php echo $log['message']; ?></p>
												  </div>
											  </div>
										  </div>
										<?php endforeach; ?>
									  <!-- /comment -->
								  </div>
								  <div class="chat-form">
									<form name="activity_form" id="activity_form" method="post">
										<div class="input-cont ">
											<input type="text" class="form-control col-lg-12" name="message" placeholder="Type a message here...">
											<input type="hidden" class="form-control col-lg-12" name="user_id" value="<?php echo $user_detail->user_id; ?>">
										</div>
										<div class="form-group">
											<div class="pull-right chat-features">
												<br>	
												<button type="button" class="btn btn-danger" id="btn_activity_log">Send</button>
											</div>
										</div>
									</form>  
								  </div>
							  </div>
						  </section>
					</div>
				  </div><!-- User Activity log -->
				  
				  <!-- Service Tab-->
				  <div id="services" class="tab-pane">
						
						<div class="col-lg-6">
						  <section class="panel">
							  <header class="panel-heading services">
								  Services
								
							  </header>
							  <div class="panel-body">
								
								
							  </div>
						  </section>
						</div>  
						
						<div class="col-md-12">
						
							<?php if(!empty($user_service)){
								
									foreach($user_service as $service){?>
								
									<div class="col-md-4 col-sm-4">
									  <div class="pricing-table">
										  <div class="pricing-head">
											  <h1><?php echo $service['plan_name']; ?></h1>
											  <h2>
												  <span class="note">AED</span><?php echo $service['price']; ?></h2>
										  </div>
										  <ul class="list-unstyled">
											  <li>Duration: <?php echo $service['duration']; ?></li>
											  <li>Unlimited Jobs all Over the UAE</li>
										  </ul>
										  <div class="price-actions">
											  <a class="btn" href="javascript:;">Activated</a>
										  </div>
									  </div>
								  </div>
								
							<?php } }
							
							
								else
								{
									'no service found';
								}
							?>
						</div>
						
				  </div><!-- End Service tab-->
				
				
				
				<!-- User Payment Detail -->
				<div id="payment" class="tab-pane">
					<div class="col-md-12">
						<section class="panel">
							<header class="panel-heading ">
								 Payment Detail
								
							</header>
							
						    <div class="panel-body">
								<?php if(isset($paypal_payment) && $paypal_payment > 0){ ?>
								 <div class="adv-table">
									<table  class="display table table-bordered table-striped" id="">
										<thead>
											<tr>
												<th>InvoiceNo.</th>
												<th>Txn ID</th>
												<th>Payer Email</th>
												<th>Plan ID</th>
												<th>Service</th>
												<th>Amount</th>
												<th class="hidden-phone">Payment Date</th>
												<th style="width:90px;">Option</th>
											</tr>
										</thead>
										
										<tbody>
										
											<?php foreach($paypal_payment as $payment):?>
												<tr class="gradeX" id="">
													<td>P-INV-100<?php echo $payment['t_id']; ?></td>
													<td><?php echo $payment['txn_id']; ?></td>
													<td><?php echo $payment['payer_email']; ?></td>
													<td><?php echo $payment['item_number']; ?></td>
													<td class="hidden-phone"><?php echo $payment['item_name']; ?></td>
													<td class=""><?php echo $payment['amount']; ?><?php echo $payment['currency']; ?></td>
													<td><?php echo $payment['payment_date']; ?></td>
													<td><a target="_blank" href="<?php echo site_url().'/user/viewPdfInvoice/'.$user_detail->user_id; ?>">view</a></td>
												</tr>	
												
												
											<?php endforeach ?>	
										</tbody>
									 
									</table>
								</div>
								<?php }

								?>
									
								
								<?php if(isset($custom_invoice) && $custom_invoice > 0){ ?>
								 <div class="adv-table">
									<table  class="display table table-bordered table-striped" id="">
										<thead>
											<tr>
												<th>Invoice #</th>
												<th>Name</th>
												<th>Email</th>
												<th>Service</th>
												<th>Method</th>
												<th>Total</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
										
											<?php foreach($custom_invoice as $payment):?>
												<tr class="gradeX" id="">
													<td><a target="_blank" href="<?php echo site_url().'/payment/invoice_details/'.$payment['id']; ?>"><?php echo $payment['invoice_no']; ?></a></td>
													<td><?php echo $payment['first_name'].' '.$payment['last_name']; ?></td>
													<td><?php echo $payment['email']; ?></td>
													<td><?php echo $payment['service']; ?></td>
													<td class="hidden-phone"><?php echo $payment['method']; ?></td>
													<td class=""><?php echo $payment['total']; ?></td>
													<td class=""><?php echo $payment['payment_status']; ?></td>
													<td><?php echo $payment['date']; ?></td>
													<td><form class="form-inline" role="form" id="user_service_form" method="post">
														
														<input type="hidden" name="service_id" value="<?php echo $payment['service_id']; ?>">
														<input type="hidden" name="user_id" value="<?php echo $user_detail->user_id; ?>">
														
														<?php if($user_service == '') { ?><button type="button" class="btn btn-success" id="btn_service">Active</button><?php } else { echo '<p>activated</p>'; }?>
													
														</form>
													</td>
												</tr>	
												
												
											<?php endforeach ?>	
										</tbody>
									 
									</table>
								</div>
								<?php }
								else{
									echo 'No record found';
								}

								?>
								

							</div>
						<section>	
													
					</div>
					
					
					
				</div>
				<!-- end User Payment Detail -->
				 
				 
				 
				 <!-- Email Tab -->
				 <div id="email" class="tab-pane">
					<div class="col-lg-6">
						  <section class="panel">
							  <header class="panel-heading">
								  Email
								
							  </header>
							  <div class="panel-body">
								<form class="form-horizontal" role="form" id="email_from" method="post" action="<?php echo site_url()?>/user/send_email">
									  <div class="form-group">
										  <label class="col-lg-2 control-label">To</label>
										  <div class="col-lg-10">
											  <input type="text" class="form-control" name="email" id="inputEmail1" value="<?php echo $user_detail->email;?>" placeholder="">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="col-lg-2 control-label">Cc / Bcc</label>
										  <div class="col-lg-10">
											  <input type="text" class="form-control" name="cc" id="cc" placeholder="">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="col-lg-2 control-label">Subject</label>
										  <div class="col-lg-10">
											  <input type="text" class="form-control" name="subject" id="inputPassword1" placeholder="">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="col-lg-2 control-label">Message</label>
										  <div class="col-lg-10">
											  <textarea id="" class="form-control" name="message" cols="30" rows="3"></textarea>
										  </div>
									  </div>
									   <div class="form-group">
										  <label class="col-lg-2 control-label">Attachment</label>
										  <div class="col-lg-10">
											<span class="btn green fileinput-button">
												<i class="fa fa-plus fa fa-white"></i>
												<input type="file" name="file">
											</span>
										  </div>
									  </div>
									  <input type="hidden" name="user_id" value="<?php echo $user_detail->user_id; ?>">
									  <div class="form-group">
										  <div class="col-lg-offset-2 col-lg-10">
											 
											  <button type="button" class="btn btn-success" id="btn_send_email">Send</button>
										  </div>
									  </div>
								  </form>
								</div>
							</section>
						</div>		
				</div>
				<!-- Email Tab -->
			  </div>
		  </div>
		</div>
	</div>
  </div>
  
  <!-- page end-->

	 
  </div>


	
	<script>	
  
		$("#btn_activity_log").on('click', function() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url();?>/user/insert_user_activity',
			data: $("#activity_form").serialize(),
			
			beforeSend: function(){
				$("#btn_activity_log").attr('disabled', true);
				$("#btn_activity_log").html('<i class="fa fa-spinner fa-pulse"></i>');
				
			},
			
			success: function(response) {
								
				if(response == 'success'){
					
					$("form").trigger('reset');
					$("#btn_activity_log").attr('disabled', false);
					$("#btn_activity_log").html('Submit');
					location.reload();
					$("html, body").animate({ scrollTop: 200 }, "slow"); 
					$('#activity_log').show().html('Request Submit Successfully !');
					setTimeout(function() {$('#success').hide();},3000);
					
				}else{
					$("#btn_activity_log").attr('disabled', false);
					$("#btn_activity_log").html('Submit');
				}
				
			}
		});	   
	});
	
	
	
	/*   Ajax function for user services  */
	
	$("#btn_service").on('click', function() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url();?>/user/insert_user_service',
			data: $("#user_service_form").serialize(),
			
			beforeSend: function(){
				$("#btn_service").attr('disabled', true);
				$("#btn_service").html('<i class="fa fa-spinner fa-pulse"></i>');
				
			},
			
			success: function(response) {
								
				alert(response);				
								
				if(response == 'success'){
					
					$("form").trigger('reset');
					$("#btn_service").attr('disabled', false);
					$("#btn_service").html('Submit');
					$('.services').show().html('Request Submit Successfully !');
					setTimeout(function() {$('#success').hide();},3000);
					location.reload();	
				}else{
					$('.services').show().html(response);
					$("#btn_service").attr('disabled', false);
					$("#btn_service").html('Active');
				}
				
			}
		});	   
	});

	
	
	$(document).ready(function(){
		
		var URI= $('#email_from').attr('action');
		
		$('#btn_send_email').click(function(e) {
		  
		   var form = $('#email_from');			
		   var formData =   new FormData($('#email_from')[0]);
		   
		  
			$.ajax({
					type: 'POST',
					url: URI,
					data: formData,
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(){
						$("#b tn_send_email").attr('disabled', true);
						$("#btn_send_email").html('<i class="fa fa-spinner fa-pulse"></i>');
					},
					success: function (response) {
						alert(response);
						if(response == 'success'){
							$("#btn_send_email").attr('disabled', false);
							$("#btn_send_email").html('Send');
							$("#email_from-from").trigger('reset');
							
						}
					}
					
				});	   
			});
		

	});
	</script>