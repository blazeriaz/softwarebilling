 <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
		<div class="page-title"></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="card custom-card">
						<div class="card-header">
							<div class="card-title">
								<div class="title"><?php echo $page_title; ?></div>
							</div>
							<div class="back pull-right">
								<a title="Back" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/contact_us/">Back</a>
							</div>
						</div>
                    	<div class="card-body">
                    		<!-- Flash Message -->
							<?php if($this->session->flashdata('flash_failure_message')){ ?>
							<div class="alert alert-danger" role="alert">
								 <strong>Warning!</strong> <?php echo $this->session->flashdata('flash_failure_message'); ?>
								 <?php $this->session->unmark_flash('flash_failure_message'); ?>
							</div> 
							<?php } if($this->session->flashdata('flash_success_message')){ ?>
							<div class="alert alert-success" role="alert">
								 <strong>Done!</strong> <?php echo $this->session->flashdata('flash_success_message'); ?>
								 <?php $this->session->unmark_flash('flash_success_message'); ?>
							</div> 
							<?php } ?>
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'admin_timeslot_form');				
							echo form_open('', $attributes); 


 

?>

							<div class="form-group">
                            	<?php echo form_label('Name : ','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="name" style="border:none;"><?php echo !empty($contact_us[0]['name'])?$contact_us[0]['name']:'N/A'; ?></p>
                                </div>
                            </div>

			<div class="form-group">
                            	<?php echo form_label('Email : ','email_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="email_id" style="border:none;"><?php echo !empty($contact_us[0]['email'])?$contact_us[0]['email']:'N/A'; ?></p>
                                </div>
                            </div>

		 
                                           			        
                            <div class="form-group">
                            	<?php echo form_label('Phone No : ','phone_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="phone_no" style="border:none;"><?php echo !empty($contact_us[0]['phone_number'])?$contact_us[0]['phone_number']:'N/A'; ?></p>
                                </div>
                            </div>



				 <div class="form-group">
                            	<?php echo form_label('Comments : ','comments',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="comments" style="border:none;"><?php echo !empty($contact_us[0]['comments'])?nl2br($contact_us[0]['comments']):'N/A'; ?></p>
                                </div>
                            </div>


				<!-- <div class="form-group">
                            	<?php echo form_label('Status : ','status',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
					<p class="form-control" id="status" style="border:none;">
		<?php 

echo ($contact_us[0]['is_read'] == 1 ? "Read" : 'Unread');

?>

					</p>
                                </div>
                            </div>-->


<?php
 

 if(!empty($contact_us[0]['user_id'])){?>
 <div class="form-group">
                            	<?php echo form_label('User email : ','user_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="user_id" style="border:none;">
		<?php 

echo !empty($contact_us[0]['email_id'])?$contact_us[0]['email_id']:'N/A';

?>

					</p>
                                </div>
                            </div>
                        
                            <?php }?>
                            
                            
						<?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
