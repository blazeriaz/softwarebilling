<div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                        	<div class='logo_img'>
                        		<img id="logo_img" class="logo_img" src="<?php echo base_url().'assets/images/logo.png';?>">
                        	</div>
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
         						<!-- Flash Message -->
 									<?php if($this->session->flashdata('flash_failure_message')){ ?>
									 <div class="alert alert-danger" role="alert">
										 <strong>Warning!</strong> <?php echo $this->session->flashdata('flash_failure_message'); ?>
										  <?php $this->session->unmark_flash('flash_failure_message'); ?>
									</div> 
									<?php } ?>
									<?php if($this->session->flashdata('flash_success_message')){ ?>
									 <div class="alert alert-success" role="alert">
										<?php echo $this->session->flashdata('flash_success_message'); ?>
										  <?php $this->session->unmark_flash('flash_success_message'); ?>
									</div> 
									<?php } ?>
									<?php  $attributes = array('class' => 'normal','id' => 'login_form');				
									echo form_open('', $attributes, array('login'=>true)); ?>
                              <div class="control">
                                		<?php echo form_input('username', (!isset($_POST['username'])?"":$_POST['username']) ,'placeholder="Username / Email" class="form-control" id="username"'); 
                               			if(form_error('username')) echo form_label(form_error('username'), 'username', array("id"=>"username-error" , "class"=>"error")); ?>
                                </div>
                                <div class="login-button text-center">
              								<?php echo form_submit('submit', 'Submit', 'title="Submit" class="btn btn-primary"'); ?>
                                </div>
									<?php echo form_close();  ?>
                        </div>
 <div class="login-footer">
                            <span class="text-right"><a href="<?php echo base_url().'admin'; ?>" class="color-white">Back to Login</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
