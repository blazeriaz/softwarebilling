<?php
	$phone = get_site_settings('site.phone','value');
	$phoneus = get_site_settings('site.phoneus','value');
	$primary_india = get_site_settings('site.primary_india','value');
	$secondary_india = get_site_settings('site.secondary_india','value');
	$primary_usa = get_site_settings('site.primary_usa','value');
	$secondary_usa = get_site_settings('site.secondary_usa','value');
	$admin_mail = get_site_settings('site.admin_email','value');
	$support_mail = get_site_settings('site.support_email','value');
	$admin_mail_us = get_site_settings('site.admin_email_us','value');
	$support_mail_us = get_site_settings('site.support_email_us','value');
	$site_address = get_site_settings('site.address','value');
	$site_addressus = get_site_settings('site.addressus','value');
?>
<script>
var disable_right_click = 1;
</script>
		<section class="innpage-section" >
			<div class="container">
				<h1 class="mrg"><?php echo $page_title;?></h1>
				<div class="signup_inner contact-inner col-md-11 col-sm-11 col-xs-11 centered">
					 			
					<!--<div class="form-error"><p>Error</p></div>-->
					<?php if($this->session->flashdata('flash_message')){ ?>
						<div class="form-sucess"><p><?php echo $this->session->flashdata('flash_message'); ?></p></div>
					<?php } ?>
					<?php if($this->session->flashdata('flash_error_message')){ ?>
						<div class="form-error"><p><?php echo $this->session->flashdata('flash_error_message'); ?></p></div>
					<?php } ?>
					<?php  
						$attributes = array('class' => 'signup-blks order_offline', 'id' => 'order_offline');
						echo form_open('', $attributes); 
					?>                  						
						<div class="form-row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="input first-name col-md-12">	
									<?php echo form_input('name',(isset($_POST['name'])&&$_POST['name'])?$_POST['name']:$name,'placeholder= "Enter Name" class="" id="name"'); ?>
									<?php if(form_error('name')) echo form_label(form_error('name'), 'name', array("id"=>"name-error" , "class"=>"error")); ?>
									<span class="error-msg"></span>
								</div>								
								<div class="input emailid col-md-12">			
									<?php echo form_input('email_id',(isset($_POST['email_id'])&&$_POST['email_id'])?$_POST['email_id']:$email_id,'placeholder= "Enter Email" class="form-control" id="email_id"');  ?>
									<?php if(form_error('email_id')) echo form_label(form_error('email_id'), 'email_id', array("id"=>"email_id-error" , "class"=>"error")); ?>
									<span class="error-msg"></span>
								</div>								
								<div class="input contact-no col-md-12">  
									<?php echo form_input('phone_number',set_value('phone_number'),'placeholder= "Enter Contact No" class="form-control phoneOnly" id="phone_number"'); ?>
									<?php if(form_error('phone_number')) echo form_label(form_error('phone_number'), 'phone_number', array("id"=>"phone_number-error" , "class"=>"error")); ?>
									<span class="error-msg"></span>
								</div>
								<div class="input  col-md-12">  
									<?php echo form_input('amount',set_value('amount'),'placeholder= "Enter Amount" class="form-control phoneOnly" id="amount"'); ?>
									<?php if(form_error('amount')) echo form_label(form_error('amount'), 'amount', array("id"=>"amount-error" , "class"=>"error")); ?>
									<span class="error-msg"></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="input textarea comments col-md-12">
									<?php echo form_textarea('comments',set_value('comments'),'class="" placeholder="Enter Comments" id="comments"');  ?>
									<?php if(form_error('comments')) echo form_label(form_error('comments'), 'comments', array("id"=>"comments-error" , "class"=>"error")); ?>
									<span class="error-msg"></span>
								</div>
							</div>											
						</div>

						<!--<div class="form-row">
							<script src='https://www.google.com/recaptcha/api.js'></script>
							<div class="signup-captcha">
								<div class="g-recaptcha" data-sitekey="6LcG8DcUAAAAABwZyLBZvQYFhhLuiMEkd0OaNg29" data-callback="recaptchaCallback" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
								<?php if(form_error('g-recaptcha-response')) echo form_label(form_error('g-recaptcha-response'), 'g-recaptcha-response', array("id"=>"g-recaptcha-response-error" , "class"=>"error")); ?>
								<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
								
							</div>
						</div>-->

                        <div class="form-row btn-row">
							<input class="submit_btn" type="submit" value="Submit" title="Submit"/>
							<input class="submit_btn reset-btn" id="contact-reset" type="button" value="Clear" title="Clear"/>
                        </div>
					<?php echo form_close();  ?>
                </div>				
				 
		</section>
		<script>
			$(document).ready(function() {
				$('#name').focus();
				$('#contact-reset').livequery("click",function(){
					$('#order_offline input[type="text"]').val('');
					$('#order_offline textarea').val('');
				});
			});
		</script>
		<style>
		#contact-reset {  padding-right: 0;}
		</style>
