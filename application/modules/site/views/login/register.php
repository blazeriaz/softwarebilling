<section class="innpage-section" >
			<div class="container">
				<h1 class="mrg"> Register NOW!  <i class="register_small">Access Free Tips and Videos. Buy the best tools to ace Step 2 CS</i></h1>				
				<div class="col-md-11 col-sm-12 col-xs-12 centered">
				<div class="signup_inner">
					
					<!--<div class="form-error"><p>Error</p></div>-->
                  
					<?php if($this->session->flashdata('flash_message')){ ?>
						<div class="form-sucess register-msg"><p><?php echo $this->session->flashdata('flash_message'); ?></p></div>
					<?php } ?>
					
					<?php $attributes = array('class' => 'signup-blks','id' => 'register','method'=>'post');				
						echo form_open_multipart('register', $attributes); ?>
                        <div class="form-row">
							<div class="form-col colspan2 first-name">                            
								
								<?php echo form_input('first_name',set_value('first_name'),'placeholder= "First Name *" class="" id="first_name"'); ?>
								<?php if(form_error('first_name')) echo form_label(form_error('first_name'), 'first_name', array("id"=>"first_name-error" , "class"=>"error")); ?>
								
							</div>
							<div class="form-col colspan2 last-name">
								
								<?php echo form_input('last_name',set_value('last_name'),'placeholder= "Last Name *" class="alphaOnly" id="last_name"'); ?>
								<?php if(form_error('last_name')) echo form_label(form_error('last_name'), 'last_name', array("id"=>"last_name-error" , "class"=>"error")); ?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-col colspan2 emailid">                            
								
								<?php echo form_input('email_id',set_value('email_id'),'placeholder= "example@gmail.com *" class="form-control" id="email_id"');  ?>
								<?php if(form_error('email_id')) echo form_label(form_error('email_id'), 'email_id', array("id"=>"email_id-error" , "class"=>"error")); ?>
							</div>	
							<div class="form-col colspan2 skypeid">
								
								<?php echo form_input('skype_id',set_value('skype_id'),'placeholder= "Skype id *" class="" id="skype_id"'); ?>
								<?php if(form_error('skype_id')) echo form_label(form_error('skype_id'), 'skype_id', array("id"=>"skype_id-error" , "class"=>"error")); ?>
							</div>                    
						</div>
						<div class="form-row">
							<div class="form-col colspan2 password">                            
								
								<?php echo form_password('password',set_value('password'),'placeholder= "Password *" class="" id="password"');  ?>
								<?php if(form_error('password')) echo form_label(form_error('password'), 'password', array("id"=>"password-error" , "class"=>"error")); ?>
							</div>
							<div class="form-col colspan2 password">
								
								<?php echo form_password('confirm_password',set_value('confirm_password'),'placeholder= "Re - Type Password *" class=" " id="confirm_password"');  ?>
								<?php if(form_error('confirm_password')) echo form_label(form_error('confirm_password'), 'confirm_password', array("id"=>"confirm_password-error" , "class"=>"error")); ?>
							</div>
						</div>						
						<div class="form-row">
							<div class="form-col colspan2 select location-overlap-con">
								<div class="select">
								<?php
								$js = 'id="know_about_us" class="form-select know_about_us""';
									echo form_dropdown('know_about_us', $options, set_value('know_about_us'), $js);
								?>
								
								<?php if(form_error('know_about_us')) echo form_label(form_error('know_about_us'), 'know_about_us',array("id"=>"know_about_us-error" , "class"=>"error")); ?>
								</div>
								<div class="form-col colspan2 other">
									<?php echo form_input('other',set_value('other'),'placeholder= "Other *" class="" id="other"'); ?>
									<?php if(form_error('other')) echo form_label(form_error('other'), 'other', array("id"=>"other-error" , "class"=>"error")); ?>
								</div>
								<div class="radio-bx-blks">
									<p>Have you taken Step 1 exam before ?</p>
									<div class="radio-bx">
										<?php 
									if(set_value('took_step_one_exam')){ ?>
									<div class="radio-bx-left">
									<?php
									 echo form_radio('took_step_one_exam', '1',true,'class="align_radio" id="took_step_one_exam_yes"'); 
									 echo form_label('Yes','took_step_one_exam_yes',array('class'=>'align_label')); 
									 
									 echo form_radio('took_step_one_exam', '0','','class="align_radio" id="took_step_one_exam_no"');
									 echo form_label('No','took_step_one_exam_no',array('class'=>'align_label')); 
									 ?>
									 </div>
										<div class="radio-bx-right">
									 <?php 
									 echo form_input('step_one_exam_date',set_value('step_one_exam_date'),'placeholder= "Exam Date *" class="from-date1" id="step_one_exam_date" style="display:none;" readonly'); 
                   					 if(form_error('step_one_exam_date')) echo form_label(form_error('step_one_exam_date'), 'step_one_exam_date', array("id"=>"step_one_exam_date-error" , "class"=>"error")); ?>
                   					 </div>
                   					 <?php
										
									}else{ ?>
									<div class="radio-bx-left">
									<?php 
									 echo form_radio('took_step_one_exam', '1','','class="align_radio" id="took_step_one_exam_yes"'); 
									 echo form_label('Yes','took_step_one_exam_yes',array('class'=>'align_label')); 
									
									 echo form_radio('took_step_one_exam', '0',True,'class="align_radio" id="took_step_one_exam_no"');
									 echo form_label('No','took_step_one_exam_no',array('class'=>'align_label')); ?>
									  </div>
										<div class="radio-bx-right">
									 <?php
									  echo form_input('step_one_exam_date',set_value('step_one_exam_date'),'placeholder= "Exam Date *" class="from-date1 hide_textbox" id="step_one_exam_date" style="display:none;" readonly'); 
                   					if(form_error('step_one_exam_date')) echo form_label(form_error('step_one_exam_date'), 'step_one_exam_date', array("id"=>"step_one_exam_date-error" , "class"=>"error")); ?>
                   					</div>
                   					<?php
									}
									 ?>
										
									</div>
								</div>									
								<div class="radio-bx-blks">
									<p>Have you taken Step 2 CK exam before ?</p>
									<div class="radio-bx">
										
										
										
										<?php 
										if(set_value('took_step_two_exam')){ ?>
										<div class="radio-bx-left">
										<?php
									echo form_radio('took_step_two_exam', '1',true,'class="align_radio" id="took_step_two_exam_yes"'); 
									echo form_label('Yes','took_step_two_exam_yes',array('class'=>'align_label'));
									
									echo form_radio('took_step_two_exam', '0','','class="align_radio" id="took_step_two_exam_no"'); 
									echo form_label('No','took_step_two_exam_no',array('class'=>'align_label'));?>
									</div>
										<div class="radio-bx-right">
									<?php
									echo form_input('step_two_exam_date',set_value('step_two_exam_date'),'placeholder= "Exam Date *" class="from-date1" id="step_two_exam_date" style="display:none;" readonly'); 
                   					if(form_error('step_two_exam_date')) echo form_label(form_error('step_two_exam_date'), 'step_two_exam_date', array("id"=>"step_two_exam_date-error" , "class"=>"error")); ?>
                   					</div>
                   					<?php
									}else{?>
									<div class="radio-bx-left">
									<?php
									
									echo form_radio('took_step_two_exam', '1','','class="align_radio" id="took_step_two_exam_yes"'); 
									echo form_label('Yes','took_step_two_exam_yes',array('class'=>'align_label'));
									
									echo form_radio('took_step_two_exam', '0',TRUE,'class="align_radio" id="took_step_two_exam_no"'); 
									echo form_label('No','took_step_two_exam_no',array('class'=>'align_label'));?>
									</div>
										<div class="radio-bx-right">
									<?php 
									echo form_input('step_two_exam_date',set_value('step_two_exam_date'),'placeholder= "Exam Date *" class="from-date1 hide_textbox" id="step_two_exam_date" style="display:none;" readonly'); 
                   					if(form_error('step_two_exam_date')) echo form_label(form_error('step_two_exam_date'), 'step_two_exam_date', array("id"=>"step_two_exam_date-error" , "class"=>"error")); ?>
                   					</div>
                   					<?php
									}
										?>
									</div>
								</div>									
							</div>							
							<div class="form-col colspan2 textarea area-map">
								<?php echo form_textarea('address',set_value('address'),'class="" placeholder="Address" id="address"');  ?>
								<?php if(form_error('address')) echo form_label(form_error('address'), 'address', array("id"=>"address-error" , "class"=>"error")); ?>
							</div>
							
							<div class="form-col colspan2 select right">
								
								<?php 
								$countries[''] = 'Select Country';
								$js = 'id="country" class="form-select"';
								$countries[''] = "Select Country *";
								echo form_dropdown('country', $countries, set_value('country'), $js);
									?>
								<?php if(form_error('country')) echo form_label(form_error('country'), 'country',array("id"=>"country-error" , "class"=>"error")); ?>
							</div>	
							
						</div>
						<div class="form-row">
							<div class="form-col colspan2 exam-date">
							<?php echo form_input('exam_date',set_value('exam_date'),'placeholder= "Upcoming Exam Date *" class="form-control" id="exam_date" readonly'); ?>
								
								<?php if(form_error('exam_date')) echo form_label(form_error('exam_date'), 'exam_date', array("id"=>"exam_date-error" , "class"=>"error")); ?>
							</div>
							<div class="form-col colspan2 city">
								<?php echo form_input('city',set_value('city'),'placeholder= "City *" class="form-control" id="City"'); ?>
								
								<?php if(form_error('city')) echo form_label(form_error('city'), 'city',array("id"=>"city-error" , "class"=>"error")); ?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-col colspan2 exam-center">
								
								<?php /*echo form_input('exam_center',set_value('exam_center'),'placeholder= "Exam Center" class="form-control" id="exam_center"');  ?>
								<?php if(form_error('exam_center')) echo form_label(form_error('exam_center'), 'exam_center', array("id"=>"exam_center-error" , "class"=>"error")); */ ?>
								
								
								<div class="select">
								<?php
								$js = 'id="exam_center" class="form-select exam_center""';
									echo form_dropdown('exam_center', $exam_centers, set_value('exam_center'), $js);
								?>
								
								<?php if(form_error('exam_center')) echo form_label(form_error('exam_center'), 'exam_center',array("id"=>"exam_center-error" , "class"=>"error")); ?>
								</div>
								
								
							</div>
							<div class="form-col colspan2 contact-no">
								
								<?php echo form_input('phone_no',set_value('phone_no'),'placeholder= "Contact No *" class="form-control phoneOnly" id="phone_no"'); ?>
								<?php if(form_error('phone_no')) echo form_label(form_error('phone_no'), 'phone_no', array("id"=>"phone_no-error" , "class"=>"error")); ?>
							</div>
						</div>	
						<script src='https://www.google.com/recaptcha/api.js'></script>
						<div class="signup-captcha">
							<div class="g-recaptcha" data-sitekey="6LcdFUIUAAAAAP0wRHZKXrzPFI-lvJ2h3PdS6beg" data-callback="recaptchaCallback" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
							<?php if(form_error('g-recaptcha-response')) echo form_label(form_error('g-recaptcha-response'), 'g-recaptcha-response', array("id"=>"g-recaptcha-response-error" , "class"=>"error")); ?>
							<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
							
						</div>
						<div class="signup-terms">
							<div class="check-bx">
								<input type="checkbox" id="agree" name="agree" value="1"  />
								<label for="agree">I have read and agreed with <a target="_blank" href="<?php echo base_url('terms-and-conditions'); ?>" title="Terms & Conditions">Terms & Conditions</a></label>
								<?php if(form_error('agree')) echo form_label(form_error('agree'), 'agree', array("id"=>"agree-error" , "class"=>"error")); ?>
							</div>
						</div>	
                        <div class="form-row btn-row">
							<?php if(set_value('city_id')){ $city_id = set_value('city_id'); }else{ $city_id = ''; } ?>
								<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id; ?>">
								<input type="hidden"  id="first_city_id" value="">
								<input type="hidden"  id="first_city_text" value="">
								<input type="hidden"  id="city_clicked" value="">
							<input class="submit_btn" id="submit_btn" type="submit" value="Submit" title="Submit"/>
                        </div>
                    <?php echo form_close();  ?>
                </div>
                </div>
			</div>
		</section>
<script>
function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};
</script>
