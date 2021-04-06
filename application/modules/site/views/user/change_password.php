<div class="col-md-8 col-sm-12 col-xs-12">
              <div class="my_acc_content">
                <h2 class="sub_page_title">Change Password</h2>
                <div class="content_inner col-md-10 col-sm-12 col-xs-12">
					<?php if($this->session->flashdata('flash_message')){ ?>
						<div class="form-sucess"><p><?php echo $this->session->flashdata('flash_message'); ?></p></div>
					<?php } ?>
					<?php if($this->session->flashdata('flash_error_message')){ ?>
						<div class="form-error"><p><?php echo $this->session->flashdata('flash_error_message'); ?></p></div>
					<?php } ?>
					<?php	
					$attributes = array('class' => 'change_password','id' => 'change_password','method'=>'post');
					echo form_open('change-password', $attributes); 
					?>
						<div class="form-row">
							<div class="form-col">
								<?php echo form_password('current_password', (!isset($_POST['current_password'])?"":$_POST['current_password']) ,'placeholder="Current Password" id="current_password"'); ?>
								<?php if(form_error('password')) echo form_label(form_error('password'), 'password', array("id"=>"password-error" , "class"=>"error")); ?>
								<?php //echo form_password('password',set_value('password'),'placeholder= "Old Password" class="" id="password"');  ?>
								<?php if(form_error('password')) echo form_label(form_error('password'), 'password', array("id"=>"password-error" , "class"=>"error")); ?>
								<span class="error-msg"></span>
							</div>
						</div>						
						<div class="form-row">
							<div class="form-col">
								<?php echo form_password('new_password', (!isset($_POST['new_password'])?"":$_POST['new_password']) ,'placeholder="New Password" id="new_password"'); ?>
								<?php if(form_error('new_password')) echo form_label(form_error('new_password'), 'new_password', array("id"=>"new_password-error" , "class"=>"error")); ?>
								<span class="error-msg"></span>
							</div>
						</div>
						<div class="form-row">
							<div class="form-col">
								<?php echo form_password('confirm_password', (!isset($_POST['confirm_password'])?"":$_POST['confirm_password']) ,'placeholder="Confirm Password" id="confirm_password"'); ?>
								<?php if(form_error('confirm_password')) echo form_label(form_error('confirm_password'), 'confirm_password', array("id"=>"confirm_password-error" , "class"=>"error")); ?>
								<span class="error-msg"></span>
							</div>
						</div>
						<div class="form-row btn-row">
							<?php echo form_submit('submit', 'Submit', 'title="Submit" class="submit_btn" id="submit"'); ?>
							<input class="submit_btn reset-btn" id="change-password" type="button" value="Reset" title="Reset" />
						</div>
					<?php echo form_close();  ?>
                </div>
              </div>
              </div>
<script>
			$(document).ready(function() {
				//$('#name').focus();
				$('#change-password').livequery("click",function(){
					$('#current_password').val('');
					$('#new_password').val('');
					$('#confirm_password').val('');
					
				});
			});
		</script>