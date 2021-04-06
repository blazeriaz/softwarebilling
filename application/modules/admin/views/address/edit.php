 <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
		<div class="page-title"></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="card custom-card">
						<div class="card-header">
							<div class="card-title">
								<div class="title"><?php echo $page_title;  ?></div>
							</div>
							<div class="back pull-right">
								<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/testimonial" title="Back">Back</a>
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'testimonial_form');				
							echo form_open_multipart('', $attributes); ?>

							

                            <div class="form-group">
                            	<?php echo form_label('Address Line 1 <span class="required">*</span>','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('address_line1', isset($_POST['address_line1'])?$_POST['address_line1']: (isset($testimonial['address_line1']) ? $testimonial['address_line1'] : '')  ,'placeholder= "Name" class="form-control" id="name"'); 
		               				if(form_error('address_line1')) echo form_label(form_error('address_line1'), 'name', array("id"=>"address_line1-error" , "class"=>"error")); ?>
                                </div>
                            </div>
							
							<div class="form-group">
                            	<?php echo form_label('Address Line 2 <span class="required">*</span>','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('address_line2', isset($_POST['address_line2'])?$_POST['address_line2']: (isset($testimonial['address_line2']) ? $testimonial['address_line2'] : '')  ,'placeholder= "Name" class="form-control" id="address_line2"'); 
		               				if(form_error('address_line2')) echo form_label(form_error('address_line2'), 'name', array("id"=>"address_line2-error" , "class"=>"error")); ?>
                                </div>
                            </div>
							
							<div class="form-group">
                            	<?php echo form_label('Address Line 3','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('address_line3', isset($_POST['address_line3'])?$_POST['address_line3']: (isset($testimonial['address_line3']) ? $testimonial['address_line3'] : '')  ,'placeholder= "Name" class="form-control" id="address_line3"'); 
		               				if(form_error('address_line3')) echo form_label(form_error('address_line3'), 'name', array("id"=>"address_line3-error" , "class"=>"error")); ?>
                                </div>
                            </div>
							
							<div class="form-group">
                            	<?php echo form_label('Address Line 4','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('address_line4', isset($_POST['address_line4'])?$_POST['address_line4']: (isset($testimonial['address_line4']) ? $testimonial['address_line4'] : '')  ,'placeholder= "Name" class="form-control" id="address_line4"'); 
		               				if(form_error('address_line4')) echo form_label(form_error('address_line4'), 'name', array("id"=>"address_line4-error" , "class"=>"error")); ?>
                                </div>
                            </div>
							
							
			 				<div class="form-group">
                            	<?php echo form_label('Status <span class="required">*</span>','',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8 topspace">
		                            <?php if($testimonial['status'] ==1){?>
										<?php echo form_radio('status', '1',TRUE,'class="align_radio" id="active"'); ?> 
										<?php echo form_label('Active','active',array('class'=>'align_label')); ?>
										<?php echo form_radio('status', '0','','class="align_radio" id="inactive"'); ?> 
										<?php echo form_label('Inactive','inactive',array('class'=>'align_label')); ?>
									<?php }else{?>
									<?php echo form_radio('status', '1','','class="align_radio"  id="active"'); ?> 
										<?php echo form_label('Active','active',array('class'=>'align_label')); ?>
										<?php echo form_radio('status', '0',TRUE,'class="align_radio" id="inactive"'); ?> 
										<?php echo form_label('Inactive','inactive',array('class'=>'align_label')); ?>
									<?php } ?>
                                 </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" title="Save">Save</button>
                                </div>
                            </div>
							<?php echo form_hidden('user_id',$testimonial['user_id'],'id="hidden_user_id"');  ?>
						<?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(window).load(function(){
		$('.testimonial_type').trigger('change');
	});
</script>

