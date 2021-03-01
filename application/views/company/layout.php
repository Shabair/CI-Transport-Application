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
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/img/truck.png')?>"/>
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
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style-responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css" />

        <?php if(($cur_tab == 'drug' || $cur_tab == 'citation' || $cur_tab == 'collision' || $cur_tab == 'trucks')  && ($cur_tab2 == 'add' || $cur_tab2 == 'edit')): ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap-select/css/bootstrap-select.min.css" />
        <?php endif; ?>

        <?php if(($cur_tab == 'driver' && $cur_tab2 == 'view') || $cur_tab == 'dashboard'): ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap3-editable/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/bootstrap3-editable/css/address.css" />
        <?php endif; ?>

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
        <?php  if(isset($this->errors) && count(array_filter($this->errors)) > 0){ ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
            		<?php foreach($this->errors as $error): ?>
            		<li><?php echo $error; ?></li>
            		<?php endforeach; ?>
            	</ul>
            </div>
        <?php    }   ?>

					<?php $this->load->view($view);?>
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
		



		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
        
        <?php if(($cur_tab == 'drug' || $cur_tab == 'citation' || $cur_tab == 'collision' || $cur_tab == 'trucks') && ($cur_tab2 == 'add' || $cur_tab2 == 'edit')): ?>
        <script src="<?php echo base_url(); ?>public/assets/bootstrap-select/js/bootstrap-select.min.js"></script>
        <?php endif; ?>

        <?php if(($cur_tab == 'driver' && $cur_tab2 == 'view') || $cur_tab == 'dashboard'): ?>c
	        <script src="<?php echo base_url(); ?>public/assets/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	        <script src="<?php echo base_url(); ?>public/assets/bootstrap3-editable/js/address.js"></script>
	        <script src="<?php echo base_url();?>public/assets/masked-input/masked-input.min.js"></script>
	        <script src="<?php echo base_url();?>public/assets/jquery-cookie/jquery.cookie.js"></script>
	        <script type="text/javascript">
	        	var action_table;
	        	var action_tr;
	        	var action_td;
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
    						// getmonth = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    						// date = d.getDate()+"-"+(getmonth[d.getMonth()])+"-"+d.getFullYear();
    						$(this).parent().find('.updated_date').html(response);
						},
				    	params: function(params) {
					        // add additional params from data-attributes of trigger element
					        params.p_type = $(this).editable().data('p_type');
					        return params;
					    }
				    });

			        $(document).on('click','.pending_work_tbl td a',function(){
			        	action_td = $(this);
			            $(this).editable('toggleDisabled');
			            $(this).editable('toggle');
			            action_tr = $(this).closest('tr');
						$(this).closest('table').children('thead').find('th').each(function(){
							if($(this).text() == 'ACTION'){
								action_table = $(this).index();
							}
						});
						
			        });
			        /*to disable the editable when click outside the editable popup */
			        $(function(){				
				
						var $win = $(document); // or $box parent container
						var $box = $(".editable-container,.editable-container *");
					
						$win.on("click", function(event){		
							if ($(event.target).is('.editable-container,.editable-container *')){
								// console.log("you clicked inside the box");
							} else {
								// console.log("you clicked outside the box");
								// console.log(action_td.context);

								if(action_td != undefined && event.target != action_td.context){
									if(action_td.editable()){
										action_td.editable('toggleDisabled');
										action_td = undefined;

									}
									
								}
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
    						// getmonth = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    						// date = d.getDate()+"/"+(getmonth[d.getMonth()])+"/"+d.getFullYear();
    						$(this).parent().find('.updated_date').html(response);
    						// action_tr.fadeOut(500);
    						setTimeout(function() {
								value = action_tr.children('td:nth-child('+(action_table+1)+')').text();
								// console.log(($.trim(value)).substr(0, 2));
								if(($.trim(value)).substr(0, 3) == 'Yes'){
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

				    	

	   			    $('.date_select').editable({
	   			    	placeholder:'Empty',
				        url: '<?php echo base_url('dashboard/pending_works')?>',
				        disabled:true,
				        // value: {
				        //     city: "Moscow", 
				        //     street: "Lenina", 
				        //     building: "12"
				        // },
				        validate: function(value) {
				            if(value.date == '') return 'city is required!'; 
				            if(value.conform == '') return 'Conform is required!'; 
				        },
				        success: function(response, newValue) {
    						$(this).editable('toggleDisabled');
    						var d = new Date();
    						// getmonth = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    						// date = d.getDate()+"-"+(getmonth[d.getMonth()])+"-"+d.getFullYear();
    						$(this).parent().find('.updated_date').html(response);
						},
				        display: function(value) {
				            if(!value) {
				                $(this).empty();
				                return; 
				            }
				            var html =  $('<div>').text(value.date).html() + ', ' + $('<div>').text(value.conform).html();
				            $(this).html(html); 
				        },
				        params: function(params) {
					        // add additional params from data-attributes of trigger element
					        params.p_type = $(this).editable().data('p_type');
					        params.conform = $(this).editable().data('conform');
					        return params;
					    }         
		    		});

	        	});

	        	<?php endif; ?>
		   
		
		    function enableFunc(classes,obj = null){

		    		action_td = classes;
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
				       $('#abstract_points').editable('toggleDisabled');
				       $('#convictions_abstract').editable('toggleDisabled');
				   	});

				   	$('#selectposition').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (get_data('position_applied')?get_data('position_applied'):'')?>",
				        source: [
				              {value: 'local', text: 'City Driver'},
				              {value: 'long_haul', text: 'long haul'},
				              {value: 'owner_operator', text: 'Owner Operator'},
				              {value: 'driver_of_owner', text: 'Driver Of Owner Operator'}
				           ]
				    });
				   	$('#abstract_points').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (get_data('abstract_points')?get_data('abstract_points'):'')?>",
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
				   	$('#convictions_abstract').editable({
				   		url:'<?php echo base_url('driver/view_edit')?>',
				    	placeholder:'Empty',
				    	disabled:true,
				    	value: "<?php echo (get_data('convictions_abstract')?get_data('convictions_abstract'):'')?>",
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
				    	value: "<?php echo get_data('current_province');?>",
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
				    	value: "<?php echo get_data('emp_license_state');?>",
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
				    	value: "<?php echo ((get_data('mateial_status')!== null)?get_data('mateial_status'):'select')?>",
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
    			$('.My-switch')['bootstrapSwitch']();

				$(".pulsate-pending").pulsate({
					reach: 10,                              // how far the pulse goes in px
				});

				// $("input.datepickeryear").datepicker( {
				// 	autoclose: true,
				//     format: " yyyy",
				//     viewMode: "years", 
				//     minViewMode: "years"
				// 	});

				$("input.datepickeryear").datepicker( {
				    format: " yyyy",
				    autoclose: true,
				    viewMode: "years", 
				    minViewMode: "years"
				})/*.on('changeDate', function (ev) {
			            $(this).datepicker('hide');
			        })*/;
				$("input.mm-yyyy-date-picker").datepicker( {
					autoclose: 		true,
					format: 		"yyyy-mm",
				    viewMode: 		"months", 
				    minViewMode: 	"months"
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
				
				    /*popover start*/
			        $(function () {
			            $(document).on('click','[data-toggle="popover"]',function(event){
			            	console.log('hhfdr');
			                var id=event.target.id;
			                $('#'+id).popover({ html : true});
			                $('#'+id).popover('toggle');
			                if(id == 'url_generator'){
			                    $.ajax({
			                        type:'POST',
			                        url: "<?php echo base_url('driver/url_generator')?>",
			                        success:function(data){
			                            $('#driver_url_container').text(data);
			                        },
			                        error: function(data){
			                        }
			                    });
			                }
			            });
			            $(document).on('click','.popover_close',function(event){
			                id = event.target.id.replace('_close','');
			                $('#'+id).popover('hide');

			            });
			        });
			        /*popover start end*/
				
			});
        </script>
        <script>
			$(document).on('focus', ".default-date-picker", function() {
	            $(this).datepicker({
	            	format:'dd-M-yyyy',
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