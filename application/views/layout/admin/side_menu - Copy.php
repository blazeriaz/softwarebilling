<div class="side-menu sidebar-inverse">
	<nav class="navbar navbar-default" role="navigation">
		<div class="side-menu-container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url().SITE_ADMIN_URI?>">
					<div class="logo">
						<img src="<?php echo base_url().'assets/images/w_logo.png';?>">
					</div>
				</a>
				<button type="button" class="navbar-expand-toggle pull-right visible-xs">
					<i class="fa fa-times icon"></i>
				</button>
			</div>
			<?php 
			$admin_id = $this->session->userdata('admin_is_logged_in');
			$this->load->helper('function_helper');
			?>
			<ul class="nav navbar-nav" id="panel-parent">
				<li class="<?php if($this->uri->segment(2)=='dashboard')  echo 'active'; ?>">
					<?php echo anchor(base_url().SITE_ADMIN_URI.'/dashboard','<span class="icon fa fa-tachometer"></span><span class="title" title="Dashboard">Dashboard</span>'); ?>
				</li>
				
				
				<li class="panel panel-default dropdown <?php if($this->uri->segment(2)=='admin_timeslot' || $this->uri->segment(2)=='user_timeslot' || $this->uri->segment(2)=='admin_calendar')  echo 'active'; ?>">
					<?php echo anchor('#dropdown-admin_availability','<span class="icon fa fa-bell"></span><span class="title" title="Admin Availability">Calendar</span>', array('data-toggle'=>'collapse','data-parent'=>'#panel-parent') ); ?>
					<div id="dropdown-admin_availability" class="panel-collapse collapse <?php if($this->uri->segment(2)=='admin_timeslot' || $this->uri->segment(2)=='user_timeslot' || $this->uri->segment(2)=='admin_calendar')  echo 'in'; ?>">
						<div class="panel-body">							 
							<ul class="nav navbar-nav">
								<li class="<?php if($this->uri->segment(2)=='admin_calendar') echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/admin_calendar', '<span title="Timeslot Calendar">Timeslot Calendar</span>'); ?></li>
								<li class="<?php if($this->uri->segment(2)=='admin_timeslot') echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/admin_timeslot', '<span title="Manage Admin Timeslot">Manage Admin Timeslot</span>'); ?></li>
								
							</ul>
						</div>
					</div>
				</li>

				<li class="<?php if($this->uri->segment(2)=='assesment_preparation')  echo 'active'; ?>">
					<?php echo anchor(base_url().SITE_ADMIN_URI.'/assesment_preparation','<span class="icon fa fa-arrows"></span><span class="title" title="Assessment Preparation">Assessment Preparation</span>'); ?>
				</li>
				
				
				
				<li class="panel panel-default dropdown <?php if($this->uri->segment(2)=='orders')  echo 'active'; ?>">
					<?php echo anchor('#dropdown-orders','<span class="icon fa fa-file-text"></span><span class="title" title="Orders">Orders</span>', array('data-toggle'=>'collapse','data-parent'=>'#panel-parent') ); ?>
					<div id="dropdown-orders" class="panel-collapse collapse <?php if($this->uri->segment(2)=='orders')  echo 'in'; ?>">
						<div class="panel-body">							 
							<ul class="nav navbar-nav">
								<li class="<?php if($this->uri->segment(2)=='orders' && ($this->uri->segment(3)=='index' || $this->uri->segment(3)=='')) echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/orders/index', '<span title="Manage Orders">Manage Orders</span>'); ?></li>
								<li class="<?php if($this->uri->segment(2)=='orders' && $this->uri->segment(3)=='add') echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/orders/add', '<span title="Add Orders">Add Orders</span>'); ?></li>
							</ul>
						</div>
					</div>
				</li>
				<li class="panel panel-default dropdown <?php if($this->uri->segment(2)=='reports' || $this->uri->segment(2)=='user_report')  echo 'active'; ?>">
					<?php echo anchor('#dropdown-reports','<span class="icon fa fa-file-text"></span><span class="title" title="Reports">Reports</span>', array('data-toggle'=>'collapse','data-parent'=>'#panel-parent') ); ?>
					<div id="dropdown-reports" class="panel-collapse collapse <?php if($this->uri->segment(2)=='reports' || $this->uri->segment(2)=='user_report')  echo 'in'; ?>">
						<div class="panel-body">							 
							<ul class="nav navbar-nav">
								<li class="<?php if($this->uri->segment(2)=='reports' && $this->uri->segment(3)=='index') echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/reports/index', '<span title="Sales Report">Sales Report</span>'); ?></li>
								
							</ul>
						</div>
					</div>
				</li>
				
				<li class="panel panel-default dropdown <?php if($this->uri->segment(2)=='webinar' || $this->uri->segment(2)=='webinar_group' || $this->uri->segment(2)=='webinar_users')  echo 'active'; ?>">
					<?php echo anchor('#dropdown-webinar','<span class="icon fa fa-connectdevelop"></span><span class="title" title="Webinar">Products</span>', array('data-toggle'=>'collapse','data-parent'=>'#panel-parent') ); ?>
					<div id="dropdown-webinar" class="panel-collapse collapse <?php if($this->uri->segment(2)=='webinar' || $this->uri->segment(2)=='webinar_group' || $this->uri->segment(2)=='webinar_users')  echo 'in'; ?>">
						<div class="panel-body">							 
							<ul class="nav navbar-nav">
								<li class="<?php if($this->uri->segment(2)=='webinar') echo 'subactive';?>" ><?php echo anchor(base_url().SITE_ADMIN_URI.'/webinar', '<span title="Webinar List">Product List</span>'); ?></li>
								
							</ul>
						</div>
					</div>
				</li>

				

				<li class="<?php if($this->uri->segment(2)=='users')  echo 'active'; ?>">
					<?php echo anchor(base_url().SITE_ADMIN_URI.'/users','<span class="icon fa fa-user"></span><span class="title" title="Users">Users</span>'); ?>
				</li>
			</ul>
		</div>
	</nav>
</div>
