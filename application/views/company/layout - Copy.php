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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/bootstrap-timepicker/compiled/timepicker.css" /> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_page.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/advanced-datatable/media/css/demo_table.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/data-tables/DT_bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/owl.carousel.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/table-responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style-responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-fileupload/bootstrap-fileupload.css" />

        <?php if(($cur_tab == 'drug' || $cur_tab == 'citation' || $cur_tab == 'collision')  && ($cur_tab2 == 'add' || $cur_tab2 == 'edit')): ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-select/css/bootstrap-select.min.css" />
        <?php endif; ?>

        <?php if(($cur_tab == 'driver' && $cur_tab2 == 'view') || $cur_tab == 'dashboard'): ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap3-editable/css/bootstrap-editable.css" />
        <?php endif; ?>

        <script src="<?php echo base_url(); ?>public/js/jquery-1.12.4.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	</head>
	<body>
    	<?php
			$Which_login = $this->session->userdata['which_login']; 
		?>
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
        <script src="<?php echo base_url(); ?>public/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.nicescroll.js" type="text/javascript"></script>
		
        <script src="<?php echo base_url(); ?>public/js/jquery.dcjqaccordion.2.7.js"></script>
        
        <!--custom switch-->
        <script src="<?php echo base_url(); ?>public/js/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
  		<script src="<?php echo base_url(); ?>public/js/jquery.tagsinput.js"></script>
        <!-- FOR Form Validation -->
		<script src="<?php echo base_url(); ?>public/js/form-validation-script.js"></script>
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>public/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> -->
        <script src="<?php echo base_url(); ?>public/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/ckeditor/ckeditor.js"></script>
        
        <?php if(($cur_tab == 'drug' || $cur_tab == 'citation' || $cur_tab == 'collision') && ($cur_tab2 == 'add' || $cur_tab2 == 'edit')): ?>
        <script src="<?php echo base_url(); ?>public/assets/bootstrap-select/js/bootstrap-select.min.js"></script>
        <?php endif; ?>

        <?php if(($cur_tab == 'driver' && $cur_tab2 == 'view') || $cur_tab == 'dashboard'): ?>c
	        <script src="<?php echo base_url(); ?>public/assets/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	        <script src="<?php echo base_url();?>public/assets/masked-input/masked-input.min.js"></script>
	        <script src="<?php echo base_url();?>public/assets/jquery-cookie/jquery.cookie.js"></script>
	        <script type="text/javascript">
	        	var action_table;
	        	var action_tr;
	        	<?php if($cur_tab == 'dashboard'): ?>
	        	$(document).ready(function(){
	        		$('.pending_works').editable({
	        			emptytext: 'Empty',
				    	url:'<?php echo base_url('dashboard/pending_works')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	success: function(response, newValue) {
    						$(this).editable('toggleDisabled');
    						var d = new Date();
    						getmonth = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    						date = d.getDate()+"/"+(getmonth[d.getMonth()])+"/"+d.getFullYear();
    						$(this).parent().find('.updated_date').html(date);
    						
						},
				    	params: function(params) {
					        // add additional params from data-attributes of trigger element
					        params.p_type = $(this).editable().data('p_type');
					        return params;
					    }
				    });

			        $(document).on('click','.pending_work_tbl td a',function(){
			        	
			            $(this).editable('toggleDisabled');
			            $(this).editable('toggle');
			            action_tr = $(this).closest('tr');
						$(this).closest('table').children('thead').find('th').each(function(){
							if($(this).text() == 'ACTION'){
								action_table = $(this).index();
							}
						});
						
			        });
			        <?php 
			        	$CI =&get_instance();
			        ?>
			        $('.temp_received').editable({
			        	emptytext: 'Not Received',
				   		url:'<?php echo base_url('dashboard/pending_works')?>',
				    	placeholder:'Not Received',
				    	// mode:'inline',
				    	disabled:true,
				    	success: function(response, newValue) {
				    		
				    		// $('.pending_work_tbl').find('tr').filter(function(){
				    		// 	console.log($(this));
				    		// }).css('display','none');

    						$(this).editable('toggleDisabled');
    						var d = new Date();
    						getmonth = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    						date = d.getDate()+"/"+(getmonth[d.getMonth()])+"/"+d.getFullYear();
    						$(this).parent().find('.updated_date').html(date);
    						// action_tr.fadeOut(500);
    						setTimeout(function() {
								value = action_tr.children('td:nth-child('+(action_table+1)+')').text();
								if($.trim(value) == 'Yes'){
									action_tr.fadeOut(500,function(){
										tbody = action_tr.closest('tbody');
										tdCount = action_tr.children('td').length;
										action_tr.remove();
										var count = tbody.children('tr').length;
										if(count == 0){
											emptydata = '<tr><td colspan="'+(tdCount+1)+'"><h4 class="text-center">No Pending Work</h4></td></tr>';
											tbody.html(emptydata);
										}
									});

									// action_tr.closest('table').fadeOut(500);
								}
							    // $('.pending_work_tbl').find('tr').children('td:nth-child('+(action_table+1)+')').filter(function(){
				    			// $this = $(this);
				    			// // console.log($.trim($(this).text()).length);
				    			// if($.trim($(this).text()) == 'Yes'){
				    			// 	$this.parent('tr').fadeOut(700);
				    			// 	// console.log('dasdasdd');
				    			// 	return true;
				    			// }
				    		// });

							}, 500);
    						
						},
			    		params: function(params) {
				        	// add additional params from data-attributes of trigger element
					        params.p_type = $(this).editable().data('p_type');
					        return params;
					    },
				        source: [
							{value: 'yes', text: 'Yes'},
							{value: 'no', text: 'No'}
			            ]
				    });
			        // $(document).on('focusout','td a',function(){
			        //     $(this).editable('toggleDisabled');
			        // });


				    $('#pending_works_editable').click(function() {
				       // enableFunc('.editable3',$(this));
				       $(".pending_works").editable('toggleDisabled');

				   	});

	        	});

	        	<?php endif; ?>
		   
		
		    function enableFunc(classes,obj = null){

				   $(classes).each(function(){

			       	if($(this).text() == 'Empty' && !$(this).hasClass('editable-empty')){
			       		$(this).editable('setValue','');
			       	}
			       	
			       	if($(this).text() == 'Empty' && $(this).hasClass('editable-empty')){
			       		$(this).editable('setValue',"Empty",true);
			       		$(this).html('<i class="text-danger">Empty</i>');
			       		//console.log('asda');
			       	}

			       });

			       $(classes).editable('toggleDisabled') ;

					       obj.find("i").toggleClass(function() {
							  if ( $( this ).hasClass( "fa-pencil-square-o" ) ) {
							  	//$(this).parent().hasClass()
							  	$( this ).removeClass('fa-pencil-square-o').parent().removeClass('btn-primary').addClass('btn-danger');
							    return "fa-times";
							  } else {
							    $( this ).removeClass('fa-times').parent().removeClass('btn-danger').addClass('btn-primary');
							    return "fa-pencil-square-o";
							  }
							});
		    }
			$(document).ready(function() {
				    $('.editable1, .editable2, .editable3, .editable4').editable({
				    	url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    });
				    $("#dob").editable();

					$('#enable1').click(function() {
				       enableFunc('.editable1',$(this));
				       $("#state").editable('toggleDisabled');
				   	});

					$('#enable2').click(function() {
				       enableFunc('.editable2',$(this));
				       $("#license_issue").editable('toggleDisabled');
				   	});

					$('#enable3').click(function() {
				       enableFunc('.editable3',$(this));
				       $("#mateial_status").editable('toggleDisabled');
				   	});

					$('#enable4').click(function() {
				       enableFunc('.editable4',$(this));
				       $('#selectposition').editable('toggleDisabled');
				       $('#cvor_points').editable('toggleDisabled');
				   	});

				   	$('#selectposition').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (isset($data['driver']['position_applied'])?$data['driver']['position_applied']:'')?>",
				        source: [
				              {value: 'local', text: 'City Driver'},
				              {value: 'long_haul', text: 'long haul'},
				              {value: 'owner_operator', text: 'Owner Operator'},
				              {value: 'driver_of_owner', text: 'Driver Of Owner Operator'}
				           ]
				    });
				   	$('#cvor_points').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (isset($data['driver']['cvor_date'])?$data['driver']['cvor_date']:'')?>",
				        source: [
				              {value: '1', text: '1'},
				              {value: '2', text: '2'},
				              {value: '3', text: '3'},
				              {value: '4', text: '4'},
				              {value: '5', text: '5'},
				              {value: '6', text: '6'},
				              {value: '7', text: '7'},
				              {value: '8', text: '8'},
				              {value: '9', text: '9'},
				              {value: '10', text: '10'},
				           ]
				    });
				   	$('#state').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (isset($data['driver']['province'])?$data['driver']['province']:'')?>",
				        source: [

				            {value: 'AB' , text: 'Alberta'},
		                    {value: 'BC' , text: 'British'},
		                    {value: 'MB' , text: 'Manitoba'},
		                    {value: 'NB' , text: 'New'},
		                    {value: 'NL' , text: 'Newfoundland'},
		                    {value: 'NT' , text: 'Northwest'},
		                    {value: 'NS' , text: 'Nova'},
		                    {value: 'NU' , text: 'Nunavut'},
		                    {value: 'ON' , text: 'Ontario'},
		                    {value: 'PE' , text: 'Prince'},
		                    {value: 'QC' , text: 'Quebec'},
		                    {value: 'SK' , text: 'Saskatchewan'},
		                    {value: 'YT' , text: 'Yukon'}
				           ]
				    });
				   	$('#license_issue').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (isset($data['driver']['emp_license_state'])?$data['driver']['emp_license_state']:'')?>",
				        source: [

				            {value: 'AB' , text: 'Alberta'},
		                    {value: 'BC' , text: 'British'},
		                    {value: 'MB' , text: 'Manitoba'},
		                    {value: 'NB' , text: 'New'},
		                    {value: 'NL' , text: 'Newfoundland'},
		                    {value: 'NT' , text: 'Northwest'},
		                    {value: 'NS' , text: 'Nova'},
		                    {value: 'NU' , text: 'Nunavut'},
		                    {value: 'ON' , text: 'Ontario'},
		                    {value: 'PE' , text: 'Prince'},
		                    {value: 'QC' , text: 'Quebec'},
		                    {value: 'SK' , text: 'Saskatchewan'},
		                    {value: 'YT' , text: 'Yukon'}
				           ]
				    });
				   	$('#mateial_status').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (isset($data['driver']['mateial_status'])?$data['driver']['mateial_status']:'select')?>",
				        source: [
				            {value: 'select' , text: 'Select Option '},
				            {value: 'm' , text: 'married '},
		                    {value: 'um' , text: 'unmarried'}
				           ]
				    });

				            //$(document).ready(function(){
					        	
					        //});
				});
				$(document).on('focus', ".postal_code", function() {
			    	$(".postal_code").mask("***-***?***");
		        });
				$(document).on('focus', ".phone_number", function() {
			    	$(".phone_number").mask("(999) 999-9999");
		        });
				$(document).on('focus', ".home_no", function() {
			    	$(".home_no").mask("(999) 999-9999");
		        });
				$(document).on('focus', ".em_con_no", function() {
			    	$(".em_con_no").mask("(999) 999-9999");
		        });
				$(document).on('focus', ".ss_no", function() {
			    	$(".ss_no").mask("999-999-999");
		        });
        	</script>
        <?php endif; ?>
		
        
        <script src="<?php echo base_url(); ?>public/js/common-scripts.js"></script>
		 
        <script src="<?php echo base_url(); ?>public/js/form-component.js"></script>
		<script src="<?php echo base_url(); ?>public/js/advanced-form-components.js"></script>

		<script src="<?php echo base_url(); ?>public/js/pulsate.js"></script>
        
        <script>
			$(document).ready(function(){
				$(".pulsate-pending").pulsate({
					reach: 10,                              // how far the pulse goes in px
				});

				$("input.datepickeryear").datepicker( {
					autoclose: true
					});

				$("input.mm-yyyy-date-picker").datepicker( {
					autoclose: 		true,
					format: 		"yyyy-mm",
				    viewMode: 		"months", 
				    minViewMode: 	"months"
					});

				 $(".form-group > #h_s").click(function() {
					 $(this).parentsUntil(".row").next().find(".fileupload").toggle(250);
				});
				
				$("#owner_leased").change(function() {
					if($("#owner_leased").val() == "Leased")
					{
						$(".leased").show(250);
						$(".own").show(250);
					}
					if($("#owner_leased").val() == "Own")
					{
						$(".leased").hide(250);
						$(".own").show(250);
						
					}
				});
				$("#status").change(function() {
					if($("#status").val() == "COMPANY")
					{
						$(".owner").css({ opacity: 0.5 });
						$(".owner>input").prop('readonly', true);
						$(".owner>input").prop('required', false);
						$(".owner>input").val("");
						$(".cont_owner").hide();
					}
					if($("#status").val() == "OWNER")
					{
						$(".owner").css({ opacity: 1 });
						$(".owner>input").prop('readonly', false);
						$(".owner>input").prop('required', true);
						$(".cont_owner").show();
						
					}
				});
				if($("#status").val() == "OWNER")
				{
					$(".owner").css({ opacity: 1 });
					$(".owner>input").prop('readonly', false);
					$(".owner>input").prop('required', true);
				}
				
				
			});
        </script>
        <script>
			$(document).on('focus', ".default-date-picker", function() {
	            $(this).datepicker({
	            	// format:'yyyy-mm-dd',
	            	autoclose:true	
	            });
            });
			$(document).on('click', "#thirdp_add", function() {
                        // console.log();
                num = $("#thirdp_no").val();
				$('.second_switch_'+num)['bootstrapSwitch']();
            });


        </script>
	
		
	</body>
</html>