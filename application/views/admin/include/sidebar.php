<?php 
$cur_tab = $this->uri->segment(1)==''?'dashboard':$this->uri->segment(1);  
$CI = &get_instance();
?>






<div id="sidebar"  class="nav-collapse ">
<!-- sidebar menu start-->
	<ul class="sidebar-menu" id="nav-accordion">
		<li id="dashboard">
			<span><a href="<?php echo site_url('admin/dashboard'); ?>" ><span><i class="fa fa-dashboard"></i>Dashboard</span></a></span>
		</li>
		<li id="company">
			<span><a href="<?php echo site_url('admin/companies'); ?>" ><span><i class="fa fa-dashboard"></i>Companies</span></a></span>
		</li>
		<li id="profile">
			<span><a href="<?php echo site_url('admin/admins/view/'.$CI->get_user_id()); ?>" ><span><i class="fa fa-user"></i>Profile</span></a></span>
		</li>
		<li id="history">
			<span><a href="<?php echo site_url('admin/history'); ?>" ><span><i class="fa fa-dashboard"></i>History</span></a></span>
		</li>
		<?php if($this->user_id === 'BGIKTYP'): ?>
		<li id="Admins">
			<span><a href="<?php echo site_url('admin/admins'); ?>" ><span><i class="fa fa-dashboard"></i>Admins</span></a></span>
		</li>
	<?php endif; ?>
       <!--  <li id="drug_test" class="sub-menu">
			<a href="javascript:;" >
                <i class="fa fa-medkit"></i>
                <span>Drug Test</span>
			</a>
			<ul class="sub">
				<li>
					<a href="<?php echo site_url('drug'); ?>" ><span>Random</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('sap'); ?>" ><span>SAP</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('rtd'); ?>" ><span>Return To Duty</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('fut'); ?>" ><span>Follow Up Testing</span></a>
				</li>
			</ul>
		</li> -->
	</ul>
	<!-- sidebar menu end-->
</div>
<script>
$('li#<?=$cur_tab?> a').addClass('active');
</script>