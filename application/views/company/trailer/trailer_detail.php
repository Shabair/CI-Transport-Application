
    <section class="panel">
        <header class="panel-heading">
        	Trailer Details
        	<span class="pull-right">
        		<a style="margin-right:0px;" href="<?php echo site_url('trailer')?>" class="btn btn-danger btn-xs">
        			<i class="fa fa-reply"></i> Back
        		</a>
        	</span>
        </header>
    </section>
  	<div class="row">
        <div class="col-md-12">
			<?php if ($this->session->flashdata('success')) :?>
                <div class="alert alert-success">
                	<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                	<strong><?=$this->session->flashdata('success')?></strong> 
                </div>
            <?php endif;?>
        </div>
        <aside class="col-lg-12">
        	<section class="panel">
                <div class="bio-graph-heading">
                  Complete Trailer Profile 
                </div>
                <div class="panel-body bio-graph-info">
                	<section id="flip-scroll" style="overflow:auto;margin-bottom:25px;">
                    	<table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <style>
								th{
									min-width:9pc;
								}
								.col-md-3>div {
    background: #c1c1c1;
    color: blue;
    padding: 4px 10px;
    margin-bottom: 10px;
	background: rgba(241,231,103,1);
background: -moz-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
background: -webkit-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -o-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: -ms-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
background: linear-gradient(to bottom, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=0 );
}
.col-md-3>div {
    /* background: #c1c1c1; */
    border-radius: 5px;
    color: #CEE914;
    padding: 4px 10px;
    margin-bottom: 10px;
    /* background: rgba(241,231,103,1); */
    background: -moz-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
    /* background: -webkit-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%); */
    background: -o-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
    background: -ms-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
    background: linear-gradient(to bottom, rgb(107, 103, 103) 0%, rgb(76,76,76) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=0 );
}
.col-md-3>div>p {
    margin: 0;
}
.col-md-3>div>p>span {
    font-weight: bold;
}
                            </style>
                              <tr>
                                  <th>Unit No</th>
                                  <th>Vin No</th>
                                  <th>Year</th>
                                  <th>Plate No</th>
                                  <th>Old Plate No</th>
                                  <th>Make</th>
                                  <th>A.Safety Due</th>
                                  <th>A.Safety PDF</th>
                                  <th>Owner/Leased</th>
                                  <th>Lease End Date</th>
                                  <th>Owner/Leased PDF</th>
                                  <th>Addition</th>
                                  <th>Status</th>
                                  <th>Owner Name</th>
                                  <th>Reefer/Dry Van</th>
                                  <th>Ownership Name</th>
                                  <th>Ownership PDF</th>
                                  <th>Remarks</th>
                                  <th>Maintance</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <td><?php echo $trailer_detail['unit_no']; ?></td>
                                  <td><?php echo $trailer_detail['vin_no']; ?></td>
                                  <td><?php echo $trailer_detail['year']; ?></td>
                                  <td><?php echo $trailer_detail['plate_no']; ?></td>
                                  <td><?php echo $trailer_detail['o_plate_no']; ?></td>
                                  <td><?php echo $trailer_detail['make']; ?></td>
                                  <td><?php echo $trailer_detail['annual_safety_due']; ?></td>
                                  <td><?php echo basename($trailer_detail['annual_safety_pdf']); ?></td>
                                  <td><?php echo $trailer_detail['owner_leased']; ?></td>
                                  <td><?php echo $trailer_detail['lease_end_date']; ?></td>
                                  <td><?php echo basename($trailer_detail['owner_leased_pdf']); ?></td>
                                  <td><?php echo $trailer_detail['addition']; ?></td>
                                  <td><?php echo $trailer_detail['status']; ?></td>
                                  <td><?php echo $trailer_detail['owner_name']; ?></td>
                                  <td><?php echo $trailer_detail['reefer_dryvan']; ?></td>
                                  <td><?php echo $trailer_detail['ownership_name']; ?></td>
                                  <td><?php echo basename($trailer_detail['owner_ship_pdf']); ?></td>
                                  <td><?php echo $trailer_detail['remarks']; ?></td>
                                  <td><?php echo $trailer_detail['maintance']; ?></td>
                              </tr>
                            </tbody>
                        </table>
                    </section>
                  	<div class="row">
                    		<div class="col-md-3">
                            	<div class="">
                                        <strong>Unit No :</strong>
                                        <span class="pull-right"><?php echo $trailer_detail['unit_no']; ?></span>
                                </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Vin No :</span><?php echo $trailer_detail['vin_no']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Year :</span><?php echo $trailer_detail['year']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Addition :</span><?php echo $trailer_detail['addition']; ?>
                                    </p>
                            </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                        			<p>
                                    	<span>Owner/Leased :</span><?php echo $trailer_detail['owner_leased']; ?>
                                    </p>
                        		</div>
                        	</div>
                    		<div class="col-md-3">
                            	<div class="">
                        			<p>
                                    	<span>Lease End Date :</span><?php echo $trailer_detail['lease_end_date'];?></p>
                        		</div>
                        	</div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Status :</span><?php echo $trailer_detail['status']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                	<p>
                                    	<span>Owner Name :</span><?php echo $trailer_detail['owner_name']; ?>
                                    </p>
                                </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Make :</span><?php echo $trailer_detail['make']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                	<p>
                                    	<span>Reefer/Dryvan :</span><?php echo $trailer_detail['reefer_dryvan']; ?>
                                    </p>
                                </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Ownership Name :</span><?php echo $trailer_detail['ownership_name']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Ownership PDF :</span><?php echo basename($trailer_detail['owner_ship_pdf']); ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                	<p>
                                    	<span>Owner/Leased PDF :</span><?php echo basename($trailer_detail['owner_leased_pdf']); ?>
                                    </p>
                                </div>
                        	</div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Annual Safety Due :</span><?php echo $trailer_detail['annual_safety_due']; ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                            		<p>
                                    	<span>Annual Safety PDF :</span><?php echo basename($trailer_detail['annual_safety_pdf']); ?></p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                	<p>
                                    	<span>Plate No :</span><?php echo $trailer_detail['plate_no']; ?>
                                    </p>
                                </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                	<p>
                                    	<span>Old Plate No :</span><?php echo $trailer_detail['o_plate_no']; ?>
                                    </p>
                                </div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">
                                    <p>
                                        <span>Remarks </span>: 
                                        <?php 
                                            $data   =  $trailer_detail['remarks'];
                                            $ids    =   explode(',',$data);
                                            unset($data);
                                            
                                            foreach($ids as $id)
                                            {
                                                echo "<div>".$id."</div>";    // tag_id is table column
                                                unset($data);
                                            }  ?>
                                    </p>
                            	</div>
                            </div>
                    		<div class="col-md-3">
                            	<div class="">   
                        			<p>
                                    	<span>Maintance :</span><?php echo $trailer_detail['maintance']; ?>
                                    </p>
                        		</div>
                        	</div>
                            <div class="col-md-3">
                            	<div class="">
                              <p><span>Registration Date :</span><?php echo $trailer_detail['created_date']; ?></p>
                            </div>
                            </div>
                            
                            
                        	
                            
                    </div>
              	</div>
          	</section>
        </aside>
  	</div>
    <?php /*?><div class="row">
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
                                                    <?php if(!empty($trailer_detail->resume)){ ?>
                                                    <p><a href="<?php if(!empty($trailer_detail->resume)){echo 'http://hrgulf.com/'.$trailer_detail->resume;}?>" target="_blank"  class="fa fa-file-word-o ">Click to Download</a></p>
                                                    <?php }?>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Cover Letter:</strong></p>
                                                    <?php if(!empty($trailer_detail->cover_letter)){ ?>
                                                    <p><a href="<?php if(!empty($trailer_detail->cover_letter)){echo 'http://hrgulf.com/'.$trailer_detail->cover_letter;} ?>" target="_blank" class="fa fa-file-text-o ">Click to Download</a></p>
                                                    <?php }?>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Passport:</strong></p>
                                                    <?php if(!empty($trailer_detail->cover_letter)){ ?>
                                                    <p><a href="<?php if(!empty($trailer_detail->passport)){echo 'http://hrgulf.com/'.$trailer_detail->passport;} ?>" target="_blank" class="fa fa-file-image-o ">Click to Download</a></p>
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
                                                <input type="hidden" class="form-control col-lg-12" name="user_id" value="<?php echo $trailer_detail->user_id; ?>">
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
                        </div>
                        <!-- User Activity log -->
                        
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
                            
                        </div>
                        <!-- End Service tab-->
                        
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
                                                        <td><a target="_blank" href="<?php echo site_url().'/user/viewPdfInvoice/'.$trailer_detail->user_id; ?>">view</a></td>
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
                                                            <input type="hidden" name="user_id" value="<?php echo $trailer_detail->user_id; ?>">
                                                            
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
                                                  <input type="text" class="form-control" name="email" id="inputEmail1" value="<?php echo $trailer_detail->email;?>" placeholder="">
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
                                          <input type="hidden" name="user_id" value="<?php echo $trailer_detail->user_id; ?>">
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
  	</div><?php */?>
  
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