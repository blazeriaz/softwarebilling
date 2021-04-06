 <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
	<div class="page-title"></div>
		<div class="row">
			<div class="col-xs-12">
				<div class="card custom-card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"><?php echo 'Edit User'  ?></div>
						</div>
						<div class="back pull-right">
							<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/users" title="Back">Back</a>
						</div>
                    </div>
                    <div class="card-body">
                    	<?php if(isset($upload_error)&&$upload_error){ ?>
						<div class="alert alert-danger" role="alert">
							 <strong>Warning!</strong> <?php echo $upload_error; ?>
						</div>
						<?php } ?>
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
                		<?php $attributes = array('class' => 'form-horizontal','id' => 'edit_new_user');				
						
						echo form_open_multipart(base_url().SITE_ADMIN_URI.'/users/edit/'.$id, $attributes); 
						?>
						
						
							
							<div class="form-group">
                            	<?php echo form_label('Store Name <span class="required">*</span>','first_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									if($this->input->post('first_name')){ $f_name = $this->input->post('first_name'); }else if($users['first_name']){ $f_name = $users['first_name']; }else{ $f_name =''; }
									echo form_input('first_name', $f_name,'placeholder= "First Name" class="form-control alphaOnly" id="first_name"'); 
                   					if(form_error('first_name')) echo form_label(form_error('first_name'), 'first_name', array("id"=>"first_name-error" , "class"=>"error")); ?>
                                </div>
							</div>
							
							<div class="form-group">
                            	<?php echo form_label('Name <span class="required">*</span>','last_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php 
									if($this->input->post('last_name')){ $l_name = $this->input->post('last_name'); }else if($users['last_name']){ $l_name = $users['last_name']; }else{ $l_name =''; }
									echo form_input('last_name',$l_name,'placeholder= "Last Name" class="form-control alphaOnly" id="last_name"');
									if(form_error('last_name')) echo form_label(form_error('last_name'), 'last_name', array("id"=>"last_name-error" , "class"=>"error")); ?>
                                </div>
							</div>						
							
							
							<div class="form-group">
                            	<?php echo form_label('GSTIN <span class="required">*</span>','skype_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									if($this->input->post('skype_id')){ $skype_id = $this->input->post('skype_id'); }else if($users['skype_id']){ $skype_id = $users['skype_id']; }else{ $email_id =''; }
									echo form_input('skype_id',$skype_id,'placeholder= "skype id" class="form-control" id="skype_id"'); 
                   					if(form_error('skype_id')) echo form_label(form_error('skype_id'), 'skype_id', array("id"=>"skype_id-error" , "class"=>"error")); ?>
                                </div>
							</div>
							
							<div class="form-group">
                            	<?php echo form_label('Contact Number <span class="required">*</span>','phone_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									if($this->input->post('phone_no')){ $phone_no = $this->input->post('phone_no'); }else if($users['phone_no']){ $phone_no = $users['phone_no']; }else{ $phone_no =''; }
									echo form_input('phone_no',$phone_no,'placeholder= "Contact Number" class="form-control phoneOnly" id="phone_no"'); 
                   					if(form_error('phone_no')) echo form_label(form_error('phone_no'), 'phone_no', array("id"=>"phone_no-error" , "class"=>"error")); ?>
                                </div>
							</div>
							
														
							
							
							<div class="form-group">
                            	<?php echo form_label('Additional Info','address',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									if($this->input->post('address')){ $address = $this->input->post('address'); }else if($users['address']){ $address = $users['address']; }else{ $address =''; }
									echo form_textarea('address',$address,'class="form-control" id="address"'); 
                   					if(form_error('address')) echo form_label(form_error('address'), 'address', array("id"=>"address-error" , "class"=>"error")); ?>
                                </div>
							</div>				
							
									
							
							
							
							
			 				<div class="form-group">
                            	<?php echo form_label('Status <span class="required">*</span>','',array('class'=>'col-sm-2 control-label')); ?>
                            	<div class="col-sm-4 topspace">
									<?php if($this->input->post('status') && $this->input->post('status') == 0){ ?>
										<?php echo form_radio('status', '1','','class="align_radio" id="active"'); ?> 
										<?php echo form_label('Active','active',array('class'=>'align_label')); ?>
										<?php echo form_radio('status', '0',TRUE,'class="align_radio" id="inactive"'); ?> 
										<?php echo form_label('Inactive','inactive',array('class'=>'align_label')); ?>
									<?php }else{?>
										<?php echo form_radio('status', '1',TRUE,'class="align_radio" id="active"'); ?> 
										<?php echo form_label('Active','active',array('class'=>'align_label')); ?>
										<?php echo form_radio('status', '0','','class="align_radio" id="inactive"'); ?> 
										<?php echo form_label('Inactive','inactive',array('class'=>'align_label')); ?>
									<?php } ?>
                            	</div>
                            </div>
                            
                           
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" title="Save">Save</button>
                                </div>
                            </div>
						<?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(window).load(function(){
	var div = ".error:first";
	if($(div).length!==0){
		$('html, body').animate({
			scrollTop: $(div).offset().top - 300
		}, 1000);
	}
	if($("#country").val()){
		$('#city').prop("disabled", false);
	}
});
</script>
