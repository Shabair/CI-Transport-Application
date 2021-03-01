<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=isset($title)?$title:'Admin Panel' ?></title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <link rel="shortcut icon" href="img/favicon.png">
        <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-datepicker/css/datepicker.css" />
        <link href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/data-tables/DT_bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/owl.carousel.css" type="text/css">
        <link href="<?php echo base_url() ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/css/style-responsive.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>public/js/jquery-1.12.4.js"></script>
	</head>
    <body class="login-body">
    	<div class="container">
        	<!-- <div class="col-md-6">
            	<div class="form-signin">
				<?php echo form_open('company/login_check'); ?>
                    <h2 class="form-signin-heading">sign in for admin</h2>
    				<div class="login-wrap">
					<?php if(isset($login_error_admin)): ?>
						<div class="alert alert-danger">
							<?php echo $login_error_admin; ?>
                        </div>
					<?php endif; ?>
                        <input type="email" name="email" class="form-control" placeholder="Email"  required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
    					<label class="checkbox">
    						<input type="checkbox" value="remember-me" name="rememberme"> Remember me
    						<span class="pull-right">
    							<a data-toggle="modal" href="#myModal"> Forgot Password?</a>
    						</span>
    					</label>
    					<button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
    					<div class="registration">
    						Don't have an account yet?
    						<a class="" href="registration.html">
    							Create an account
    						</a>
        				</div>
                    </div>
				<?php echo form_close(); ?>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Forgot Password ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Enter your e-mail address below to reset your password.</p>
                                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-success" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
        	   </div>
            </div> -->
            <div class="col-md-12">
            	<div class="form-signin">
				<?php echo form_open(current_url()); ?>
                <h2 class="form-signin-heading">sign in for company</h2>
    				<div class="login-wrap">
    					<?php if(isset($login_error_company)): ?>
    						<div class="alert alert-danger">
    							<?php echo $login_error_company; ?>
                            </div>
    					<?php endif; ?>
                        <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>"  required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
    					<label class="checkbox">
    						<input type="checkbox" value="remember-me" name="rememberme"> Remember me
    						<span class="pull-right">
    							<a data-toggle="modal" href="#myModal"> Forgot Password?</a>
    						</span>
    					</label>
    					<button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
    				</div>
				<?php echo form_close(); ?>
				<!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Forgot Password ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Enter your e-mail address below to reset your password.</p>
                                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-success" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
            	<!-- modal -->
        	   </div>
            </div>
        </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url() ?>public/js/jquery.js"></script>
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
    </body>
</html>
