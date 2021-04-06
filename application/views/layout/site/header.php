<?php 
	$skype_name = get_site_settings('site.skypeid','value');
	$tel_no = get_site_settings('site.phoneus','value');
	$primary_usa = get_site_settings('site.primary_usa','value');
	$secondary_usa = get_site_settings('site.secondary_usa','value');
	$get_loggedin_user = get_loggedin_user();
?>
<header class="header">
<div class="wrapper">
	<div class="wrapper-inn">
		<div class="top_header">
			<div class="head_inner1">
				<ul>
					<li class="skpe"><a href="skype:<?php echo $skype_name; ?>" title="Skpe <?php echo $skype_name ?>">Skpe <?php echo $skype_name; ?></a></li>
					 <li class="phone">
						<i></i>
						<span>
							<a href="tel:<?php echo $tel_no; ?>" title="<?php echo $tel_no; ?>" ><?php echo $tel_no; ?></a>
							<!--<a href="tel:<?php echo $primary_usa; ?>" title="<?php echo $primary_usa; ?>" ><?php echo $primary_usa; ?></a>-->
							<?php /* <a href="tel:<?php echo $secondary_usa; ?>" title="<?php echo $secondary_usa; ?>" ><?php echo $secondary_usa; ?></a> */ ?>
						</span>
					</li>
				</ul>
			</div>
			<div class="head_inner2">
				<p><i></i><span class="">In  Him I Trust</span></p>
			</div>
			<div class="head_inner3">
				<ul>
					<?php 
						if($this->session->userdata("user_is_logged_in")){
					?>
					<!--<li><a href="<?php //echo base_url('my-profile'); ?>" title="My Profile">My Profile</a></li>
					<li><a class="logout-btn" href="<?php //echo base_url();?>logout" title="Logout">Logout</a></li>-->
					<li class="has-submenu"><a href="javascript:void(0);" title="My Profile">Hi <?php echo $get_loggedin_user['username']; ?></a>
						<ul class="submenu">
							<li><a class="myprofile-icon" href="<?php echo base_url('my-profile'); ?>" title="My Profile">My Profile</a></li>
							<li><a class="logout-icon" href="<?php echo base_url();?>logout" title="Logout">Logout</a></li>
						</ul>
					</li>					
					<?php 
						}else{
					?>
					<li><a href="<?php echo base_url('register'); ?>" title="Sign Up" class="<?php echo ($this->uri->segment(1) == 'register')?'active':''?>">Sign Up</a></li>
					<li><a class="login-btn fancybox.ajax" href="<?php echo base_url();?>login" title="Login">Login</a></li>
					<?php 					
						}
					?>
					<li><a class="<?php echo ($this->uri->segment(1) == 'contact-us')?'active':''?>" href="<?php echo base_url('contact-us');?>" title="Contact Us">Contact Us</a></li>					
				</ul>
			</div>
		</div>
	</div>
</div>
</header>
				
				<?php if($this->session->flashdata("fancy_popup_url")){ ?>
					<a href="<?php echo $this->session->flashdata("fancy_popup_url");?>" class="fancy_popup_url_btn fancybox.ajax"></a>
					<?php echo $this->session->unmark_flash("fancy_popup_url");?>
					<?php if($this->session->flashdata("fancy_popup_ref_id")){ ?>
						<input type="hidden" name="fancy_popup_ref_id" value="<?php echo $this->session->flashdata("fancy_popup_ref_id");?>" class="fancy_popup_ref_id" id="fancy_popup_ref_id">
						<?php echo $this->session->unmark_flash("fancy_popup_ref_id");?>
					<?php } ?>

					<?php if($this->session->flashdata("flash_failure_message")){ ?>
						<input type="hidden" name="fancy_popup_failure_message" value="<?php echo $this->session->flashdata("flash_failure_message");?>" class="fancy_popup_failure_message" id="fancy_popup_failure_message">
						<?php echo $this->session->unmark_flash("flash_failure_message");?>
					<?php } ?>
					
					<?php if($this->session->flashdata("flash_success_message")){ ?>
						<input type="hidden" name="fancy_popup_success_message" value="<?php echo $this->session->flashdata("flash_success_message");?>" class="fancy_popup_success_message" id="fancy_popup_success_message">
						<?php echo $this->session->unmark_flash("flash_success_message");?>
					<?php } ?>
				<?php } ?>
				<a href="#" class="trigger-btn fancybox.ajax"></a>