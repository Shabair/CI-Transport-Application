<?php 
$cur_tab = $this->uri->segment(1)==''?'dashboard':$this->uri->segment(1);  
$cur_tab2 = $this->uri->segment(2)==''?'dashboard':$this->uri->segment(2);  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=isset($title)?$title:'TDMA - Admin Panel' ?></title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap-reset.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_page.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_table.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/data-tables/DT_bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/owl.carousel.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/table-responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style-responsive.css" />

        <script src="<?php echo base_url(); ?>public/js/jquery-1.12.4.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	</head>
	<body>
		<section id="container" class="">
			<!--header start-->
			<header class="header white-bg">
				<?php include('include/navbar.php');?>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<?php include('include/sidebar.php');?>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper site-min-height">
					<!-- page start-->
<!--  -->
        <?php if ($this->session->flashdata('success')) :?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?=$this->session->flashdata('success')?></strong> 
        </div>
        <?php endif;?>

        <?php if ($this->session->flashdata('error')) :?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?=$this->session->flashdata('error')?></strong> 
        </div>
        <?php endif;?>
        <!-- validation error -->
        <?php  if(validation_errors()){ ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo validation_errors(); ?>
            </div>
        <?php    }   ?>

<!--  -->
					<?php if(isset($driver) && $driver->num_rows() > 0){
						//var_dump($driver->row_array());
						$data['driver'] = $driver->row_array();
						$data['driver_update'] = $driver_id;
						} else{
							$data = '';
						}

					?>
					
					<?php if(isset($driver_view) && $driver_view->num_rows()>0){
						$data['driver'] =  $driver_view->row_array();
					} ?>

					<?php $this->load->view($view,$data);?>
					<!-- page end-->
				</section>
			</section>
			<!--main content end-->
			<!--footer start-->
			<footer class="site-footer">
				<div class="text-center">
					<?php echo date("Y");?> &copy; by TDMA.
					<a href="#" class="go-top">
					<i class="fa fa-angle-up"></i>
					</a>
				</div>
			</footer>
			<!--footer end-->
		</section>
		
		
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>

        
		<script src="<?php echo base_url(); ?>public/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


	        <script type="text/javascript">

			$(document).ready(function(){


				$("input.datepickeryear").datepicker( {
					autoclose: true
					});				
				
			});
        </script>
        <script>
			$(document).on('focus', ".default-date-picker", function() {
                        $(this).datepicker({
                        	autoclose:true	
                        });
                    });


        </script>
	
		
	</body>
</html>