<?php 
$cur_tab = $this->uri->segment(1)==''?'dashboard':$this->uri->segment(1);  
?>






<div id="sidebar"  class="nav-collapse ">
<!-- sidebar menu start-->
	<ul class="sidebar-menu" id="nav-accordion">
		<li id="dashboard">
			<span><a href="<?php echo site_url('dashboard'); ?>" ><span><i class="fa fa-dashboard"></i>Dashboard</span></a></span>
		</li>
        <li id="company">
			<span><a href="<?php echo site_url('company'); ?>" ><span><i class="fa fa-building-o"></i>Company Detail</span></a></span>
		</li>
		<?php if($this->user_type == 'company'){ ?>
		<li id="companyusers">
			<span><a href="<?php echo site_url('companyusers'); ?>" ><span><i class="fa fa-users"></i>Users</span></a></span>
		</li>
		<?php }else if($this->user_type == 'user'){ ?>
		<li id="companyusers">
			<span><a href="<?php echo site_url('companyusers/profile'); ?>" ><span><i class="fa fa-user"></i>Profile</span></a></span>
		</li>
		<?php } ?>
        <li id="history">
			<span><a href="<?php echo site_url('history'); ?>" ><span><i class="fa fa-file"></i>History</span></a></span>
		</li>
        <li id="driver">
			<span><a href="<?php echo site_url('driver'); ?>" ><span><i class="fa fa-users"></i>Drivers</span></a></span>
		</li>
        <li id="trucks">
			<span><a href="<?php echo site_url('trucks'); ?>" ><span><i class="fa fa-truck"></i>Truck</span></a></span>
		</li>
        <li id="trailer">
			<span><a href="<?php echo site_url('trailer'); ?>" ><span><i class="fa  fa-external-link"></i>Trailer</span></a></span>
		</li>
        <li id="maintenance">
			<span><a href="<?php echo site_url('maintenance'); ?>" ><span><i class="fa  fa-database"></i>Maintenance</span></a></span>
		</li>
        <li id="inspection">
			<span><a href="<?php echo site_url('inspection'); ?>" ><span><i class="fa fa-list-alt"></i>Inspection</span></a></span>
		</li>
        <li id="citation">
			<span><a href="<?php echo site_url('citation'); ?>" ><span><i class="fa fa-ticket"></i>Citation</span></a></span>
		</li>
        <li id="collision">
			<span><a href="<?php echo site_url('collision'); ?>" ><span><i class="fa fa-paste"></i>Collisions/Claims</span></a></span>
		</li>
        <li id="drug">
			<span><a href="<?php echo site_url('drug'); ?>" ><span><i class="fa fa-medkit"></i>Drug Test</span></a></span>
		</li><!-- 
        <li id="drug_test" class="sub-menu">
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
		</li>  -->
	</ul>
	<!-- sidebar menu end-->
</div>
<script>
$('li#<?=$cur_tab?> a').addClass('active');
</script>