<?php
	$admin_mail = get_site_settings('site.admin_email','value');
	$support_mail = get_site_settings('site.support_email','value');
	$facebook_link = get_site_settings('social.facebook_link','value');
	$twitter_link = get_site_settings('social.twitter_link','value');
	$linkedin_link = get_site_settings('social.linkedin_link','value');
	$googleplus_link = get_site_settings('social.googleplus_link','value');
	$primary_usa = get_site_settings('site.primary_usa','value');
	$secondary_usa = get_site_settings('site.secondary_usa','value');
	$primary_india = get_site_settings('site.primary_india','value');
	$secondary_india = get_site_settings('site.secondary_india','value');
	$skypeid = get_site_settings('site.skypeid','value');
	$footer_content = get_site_settings('site.footer_content','value');
	$copyright_content = get_site_settings('site.copyright_content','value');
?>
<div class="footer_content">
	<div class="container">
		<div class="row footer-content-inner-main">
			<div class="foo-sec1 footer-content-inner col-md-3 col-sm-6 col-xs-6">
				<h2>Quick Links</h2>
				<ul>
					<li class="<?php echo ($this->uri->segment(1) == 'home')?'active':''?>" ><a href="<?php echo base_url().'home'; ?>" title="Home">Home</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'about-us')?'active':''?>" ><a href="<?php echo base_url('about-us'); ?>" title="About Us">About Us</a></li>
					<?php /*<li class="<?php echo ($this->uri->segment(1) == 'why-target-usmle')?'active':''?>"><a href="<?php echo base_url('why-target-usmle'); ?>" title="Why TargetUSMLE">Why TargetUSMLE</a></li>*/ ?>
					<li class="<?php echo ($this->uri->segment(1) == 'testimonial')?'active':''?>" ><a href="<?php echo base_url('testimonial'); ?>" title="Testimonials">Testimonials</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'blogs')?'active':''?>" ><a href="<?php echo base_url('blogs'); ?>" title="BLog">BLog</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'contact-us')?'active':''?>" ><a href="<?php echo base_url('contact-us'); ?>" title="Contact US">Contact US</a></li>
				</ul>
			</div>
			<div class="foo-sec2 footer-content-inner col-md-3 col-sm-6 col-xs-6">
				<h2>&nbsp;</h2>
				<ul>
					<li class="<?php echo ($this->uri->segment(1) == 'cs-handbook')?'active':''?>"><a  href="<?php echo base_url().'cs-handbook'; ?>" title="CS Handbook">CS Handbook</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'online-tutorials')?'active':''?>"><a  href="<?php echo base_url().'online-tutorials'; ?>" title="Online Tutorial">Online Tutorial</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'patient-note-correction')?'active':''?>"><a  href="<?php echo base_url('patient-note-correction'); ?>" title="Patient Note">Patient Note</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'personal-coaching')?'active':''?>"><a  href="<?php echo base_url('personal-coaching'); ?>" title="Personal Coaching">Personal Coaching</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'mock-exam')?'active':''?>"><a  href="<?php echo base_url('mock-exam'); ?>" title="Mock Exam">Mock Exam</a></li>
					<li class="<?php echo ($this->uri->segment(1) == 'faq')?'active':''?>"><a  href="<?php echo base_url('faq'); ?>" title="FAQ">FAQ</a></li>
				</ul>
			</div>
			<div class="foo-sec3 footer-content-inner col-md-3 col-sm-6 col-xs-6">
				<h2>Connect</h2>
				<ul>
					<li class="facebook"><a href="<?php echo $facebook_link; ?>" title="Facebook" target="_blank">Facebook</a></li>
					<li class="twitter"><a href="<?php echo $twitter_link; ?>" title="Twitter" target="_blank">Twitter</a></li>
					<li class="linkedin"><a href="<?php echo $linkedin_link; ?>" title="Linkedin" target="_blank">Linkedin</a></li>
					<li class="gplus"><a href="<?php echo $googleplus_link; ?>" title="Google+" target="_blank">Google+</a></li>
				</ul>
			</div>
			<div class="foo-sec4 footer-content-inner col-md-3 col-sm-6 col-xs-6">
				<h2>Contact</h2>
				<div class="conts-blks">
					<p><i>USA:</i> <span><a href="tel:<?php echo $primary_usa; ?>" title="<?php echo $primary_usa; ?>"><?php echo $primary_usa; ?></a> <a href="tel:<?php echo $secondary_usa; ?>" title="<?php echo $secondary_usa; ?>"><?php echo $secondary_usa; ?></a></span></p>
					<p><i>India</i> <span><a href="tel:<?php echo $primary_india; ?>" title="<?php echo $primary_india; ?>"><?php echo $primary_india; ?></a> <a href="tel:<?php echo $secondary_india; ?>" title="<?php echo $secondary_india; ?>"><?php echo $secondary_india; ?></a></span></p>
					<p><i>Skype :</i> <span><a href="skype:<?php echo $skypeid; ?>" title="<?php echo $skypeid; ?>"><?php echo $skypeid; ?></a></span></p>
				</div>
			</div>
		</div>	
		<div class="divider"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p><?php echo $footer_content; ?> </p>
			</div>
		</div>
	</div>
</div>	
<div class="footer_bottom">
	<div class="container">
		<div class="copyright col-md-5 col-sm-12 col-xs-12">
			<p>Copyright <a href="<?php echo base_url().'home'; ?>"><?php echo strtoupper(SITE_NAME); ?></a>,<?php echo $copyright_content; ?></p>
		</div>
		<div class="reach_us col-md-7 col-sm-12 col-xs-12">
			<ul>
				<li>Reach Us: <a href="mailto:<?php echo $admin_mail; ?>" title="<?php echo $admin_mail; ?>"><?php echo $admin_mail; ?></a></li>
				<li><a href="mailto:<?php echo $support_mail; ?>" title="<?php echo $support_mail; ?>"><?php echo $support_mail; ?></a></li>
			</ul>
		</div>
	</div>
</div>

<div id = "dialog-box" title = ""></div>

<div class="loader_wrap">
		<div class="windows8">
			<div class="wBall" id="wBall_1">
				<div class="wInnerBall"></div>
			</div>
			<div class="wBall" id="wBall_2">
				<div class="wInnerBall"></div>
			</div>
			<div class="wBall" id="wBall_3">
				<div class="wInnerBall"></div>
			</div>
			<div class="wBall" id="wBall_4">
				<div class="wInnerBall"></div>
			</div>
			<div class="wBall" id="wBall_5">
				<div class="wInnerBall"></div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.livequery.js"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.selectBox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.validate.js"></script>





<?php
  	if(isset($js)&&!empty($js)){
  		foreach($js as $js){
  			echo "<script type='text/javascript' src='".base_url().$js."'></script>";
  		}
  	}?>
	<?php if($this->router->fetch_class() == 'home'){ ?>
		<script src="<?php echo base_url();?>assets/site/js/videopopup.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/home.js"></script>
	<?php }else{ ?>

	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/home.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/main.js"></script>
	
	<?php } ?>
	<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?2d59AzLcxb1fj8L8VNgUDwVKuWAX5p6n";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
