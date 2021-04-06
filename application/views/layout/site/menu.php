<div class="wrapper-inn">
	<div class="bottom_header">
		<h1 class="logo"><a href="<?php echo base_url(); ?>" title="Noor Steel"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt=""></a></h1>
		<div class="main_menu">
			<div class="menu-icon collapse normal-view"> <span class="bar child1"></span> <span class="bar child2"></span> <span class="bar child3"></span> </div>
			
			<div class="main_nav col-md-12 col-sm-12 col-xs-12">					
					<div class="header-menu desk-header-menu">
						<div class="menu-icon collapse"> <span class="bar child1"></span> <span class="bar child2"></span> <span class="bar child3"></span> </div>
						<ul class="nav-subs">
		
				<?php $uri_seg =  $this->uri->segment(1); ?>
				<li class="<?php echo (($uri_seg == 'cs-handbook'))?'active':''; ?>"><a href="<?php echo base_url().'cs-handbook'; ?>" title="Cs Handbook">Cs Handbook</a></li>
				<li class="<?php echo (($uri_seg == 'online-tutorials'))?'active':''; ?>"><a href="<?php echo base_url().'online-tutorials'; ?>" title="Online Tutorial">Online Tutorial</a></li>
				<li class="<?php echo (($uri_seg == 'personal-coaching'))?'active':''; ?>"><a href="<?php echo base_url('personal-coaching');?>" title="Personal Coaching">Personal Coaching</a></li>
				<li class="<?php echo (($uri_seg == 'patient-note-correction'))?'active':''; ?>"><a href="<?php echo base_url('patient-note-correction');?>" title="Patient Note">Patient Note</a></li>
				<li class="<?php echo (($uri_seg == 'mock-exam') || ($uri_seg == 'online-mock-exam') || ($uri_seg == 'live-mock-exam'))?'active':''; ?>"><a href="<?php echo base_url('mock-exam');?>" title="Mock Exam">Mock Exam</a></li>
				<li class="has-submenu <?php echo (($uri_seg == 'useful-resources') || ($uri_seg == 'blogs') || ($uri_seg == 'patient-note-practise') || ($uri_seg == 'faq') || ($uri_seg == 'webinar') || ($uri_seg == 'careers') || ($uri_seg == 'youtube-channel') || ($uri_seg == 'cms') || ($uri_seg == 'testimonial') )?'active':''; ?>">				
					<a href="javascript:void(0);" title="Useful Resources">Useful Resources</a>
					<ul class="submenu">
					<li>
							<?php if(is_loggedin()){ ?>
							<a class="<?php echo ($this->uri->segment(1) == 'patient-note-practise')?'active':''?>" href="<?php echo base_url('patient-note-practise');?>" title="Patient Note Practise">Patient Note Practice</a>
							<?php }else{ ?>
							<a class="trigger-btn fancybox.ajax <?php echo ($this->uri->segment(1) == 'patient-note-practise')?'active':''?>" href="<?php echo base_url('login');?>?redirect_url=<? echo urldecode('patient-note-practise'); ?>" title="Patient Note Practise">Patient Note Practice</a>
							<?php } ?>
						</li>
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'blogs')?'active':''?>" href="<?php echo base_url('blogs');?>" title="Blog">Blog</a>
						</li>
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'webinar')?'active':''?>" href="<?php echo base_url('webinar');?>" title="Webinar">Webinar</a>
						</li>
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'youtube-channel')?'active':''?>" href="<?php echo base_url('youtube-channel');?>" title="Youtube Channel">Youtube Channel</a>
						</li>
						
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'cms' && $this->uri->segment(2) == 'areas-match' )?'active':''?>" href="<?php echo base_url('cms/areas-match');?>" title="Areas Match">Areas Match</a>
						</li>
						
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'testimonial')?'active':''?>" href="<?php echo base_url('testimonial');?>" title="Testimonial">Testimonial</a>
						</li>
						
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'faq')?'active':''?>"  href="<?php echo base_url('faq');?>" title="Faq">Faq</a>
						</li>
						
						<li>
							<a class="<?php echo ($this->uri->segment(1) == 'careers')?'active':''?>"  href="<?php echo base_url('careers');?>" title="Careers">Careers</a>
						</li>
						
						
						<?php /*<li>
							<a class="<?php echo ($this->uri->segment(1) == 'cms' && $this->uri->segment(2) == 'work-ups' )?'active':''?>" href="<?php echo base_url('cms/work-ups');?>" title="Work Ups">Work Ups</a>
						</li>*/ ?>
						
					</ul>
				</li>
				
				<!--
				<li class="has-submenu"><a href="javascript:void(0);" title="Useful Resources">Useful Resources</a>
					<ul class="submenu">
						<li><a href="about-us.html" title="About Us">About Us</a></li>
						<li><a href="our-clients.html" title="Client">Client</a></li>
					</ul>
				</li>-->
			</ul>
			</div>
			</div>
			</div>
		</div>		
	</div>
</div>

