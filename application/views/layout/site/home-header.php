<!--  modified for session mismacth alert starts -->
<header>
		<div class="success-error-msg <?php echo (isset($_COOKIE['multilogin_alert']))?'open':''; ?>">
				<p><?php echo (isset($_COOKIE['multilogin_alert']))?$_COOKIE['multilogin_alert']:''; 
					 setcookie('multilogin_alert', '',time()-100);
				?></p>
				<span class="close-btn"></span>
			</div>
	<script>		
	function createCookie(name,value,days) {
		 if (days) {
		     var date = new Date();
		     date.setTime(date.getTime()+(days*24*60*60*1000));
		     var expires = "; expires="+date.toGMTString();
		 }
		 else var expires = "";
		 document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		 var nameEQ = name + "=";
		 var ca = document.cookie.split(';');
		 for(var i=0;i < ca.length;i++) {
		     var c = ca[i];
		     while (c.charAt(0)==' ') c = c.substring(1,c.length);
		     if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		 }
		 return null;
	}
	function eraseCookie(name) {
		 createCookie(name,"",-1);
	}
	var myCookie = readCookie('myCookie');
	if (myCookie != null){		
		$('.success-error-msg p').html(myCookie);
		$('.success-error-msg').addClass('open');
		eraseCookie('myCookie');
	}	
	</script>
<!--  modified for session mismacth alert end -->
	<div id="loading"></div>
	<div class="wrapper">
		<h1 class="logo"><a href="<?php echo base_url(); ?>" title="<?php echo SITE_TITLE; ?>"><?php echo SITE_TITLE; ?></a></h1>
		<?php if($this->session->has_userdata('user_is_logged_in')){ $class = 'inner-page-header'; }else{ $class=""; } ?>
		<div class="menu-section <?php echo $class; ?>">
			<?php if($this->session->has_userdata('user_is_logged_in')){ ?>
			<a class="head_profile" href="javascript:void(0);">
				<?php  
				if($this->session->has_userdata('user_is_logged_in')){ 
					 $this->load->helper('profile_helper');
					 $user = user_data();
					 if($user[0]->profile_image!=""){
		        	 $img_src = thumb($this->config->item('profile_image_url') .$user[0]->profile_image ,'50', '50', 'thumb_profile_img',$maintain_ratio = TRUE);
                     $img_prp = array('src' => base_url() . 'appdata/profile/thumb_profile_img/'.$img_src, 'alt' => 'Profile', 'title' =>strlen($user[0]->first_name." ".$user[0]->last_name)>16?substr(($user[0]->first_name." ".$user[0]->last_name),0,16):$user[0]->first_name." ".$user[0]->last_name);
					 }else{
					 	if($user[0]->gender == 2)
					 	{
							$img_src = 'assets/site/images/no-image.png';
							
					 	}
					 	else
					 	{
							$img_src = 'assets/site/images/no-image-men.png';
							 
					 	}
					 	//$img_src="assets/site/images/no-image-men.png";
						$class_added="no_img";
					  	$img_prp=array('src' => base_url() .$img_src, 'alt' => 'Profile', 'title'=>strlen($user[0]->first_name." ".$user[0]->last_name)>16?substr(($user[0]->first_name." ".$user[0]->last_name),0,16):$user[0]->first_name." ".$user[0]->last_name,'class'=>$class_added);
					 }
					 ?>
					<?php echo img($img_prp);?>
					<label id="profile_user_name"><?php echo (strlen($user[0]->first_name." ".$user[0]->last_name)>16?substr(($user[0]->first_name." ".$user[0]->last_name),0,16):$user[0]->first_name." ".$user[0]->last_name);?></label>
				<?php }?>
			</a>
			<ul class="head_profile_list">
				<li><a href="<?php echo base_url().'dashboard/'; ?>" title="Dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url().'home/logout'; ?>" title="Logout">Logout</a></li>
			</ul>
			<?php } ?>
			<?php if(!$this->session->has_userdata('user_is_logged_in')){ ?>
			<div class="header-btn">
				<a class="user-login login-btn fancybox.ajax" href="<?php echo base_url().'home/login'; ?>" title="Login">Login</a>
				<a class="login-btn register fancybox.ajax registeration-home" href="<?php echo base_url().'home/register'; ?>" title="Register">Register</a>
			</div>
			<?php } ?>
			<a href="javascript:void(0)" class="mobi_menu icon-sprite">Mobile Menu</a>
			<ul class="nav-menu">
				<li><a class="<?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''){ echo 'active'; }?>" href="<?php echo base_url(); ?>" title="Home">Home</a></li>
				<?php if($this->session->has_userdata('user_is_logged_in')){ 
					$user_arr=$this->session->userdata('user_is_logged_in');
					$this->load->helper('surprise_test_helper');
					$surprise_test = surprise_test();
				 
					 	$style="";?>
						<?php if($surprise_test[0] != 0 && $surprise_test[1]==0){
						  	$style="block";
						  }else{ 
						  	$style="none";
						  }?>
				<li style="display:<?php echo $style;?>"><a class="<?php if($this->uri->segment(2) == 'surprise' || $this->uri->segment(2) == 'surprise_detail' || ($this->uri->segment(2) == 'view_result' && $this->uri->segment(5) == '2')){ echo 'active'; }?>" href="<?php echo base_url()?>tests/surprise" title="Surprise Test">Surprise Test</a></li>
				<?php } ?>
				
				<?php 
					if(!$this->session->has_userdata('user_is_logged_in')){
						$href=base_url().'home/login';
						$class = "login-btn fancybox.ajax";
					}else{
						$href=base_url().'home/downloads';
						$class = "download fancybox fancybox.ajax";
					} ?>
				<li><a class="<?php echo $class;?> download_popup" id="download_menu" href="<?php echo $href; ?>" title="Downloads">Downloads</a></li>
				<li><a class="<?php if($this->uri->segment(1) == 'contact_us' || $this->uri->segment(2) == 'enquiry_success'){ echo 'active'; }?>" href="<?php echo base_url();?>contact_us" title="Contact">Contact</a></li>
			</ul>
		</div>
	</div>
	<?php if(($this->uri->segment(1) == "home" || $this->uri->segment(1) == "")&& $this->uri->segment(2) == ""){
	$this->load->view("layout/site/home-banner"); 
	} ?>
</header>
<script>
	var global_path="";
	$('.download_popup').click(function(e){ 
 		global_path="home/index/downloads"; 
		e.preventDefault();
	});
	$('.user-login').click(function(e){  
 global_path=""; 
	});
	
	$(function() {
		
	});
	
</script>
