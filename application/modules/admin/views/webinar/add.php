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
								<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/webinar" title="Back">Back</a>
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
                			<?php  $attributes = array('class' => 'form-horizontal','id' => 'webinar_form','enctype'=>'multipart/form-data');				
							echo form_open('', $attributes); ?>

							<div class="form-group">
                            	<?php echo form_label('Name <span class="required">*</span>','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('name',set_value('name'),'placeholder= "" class="form-control" id="name"'); ?>
									<?php if(form_error('name')) echo form_label(form_error('name'), 'name', array("id"=>"name-error" , "class"=>"error")); ?>
                                 </div>
							</div>
                                        
                                        <div class="form-group">
                            	<?php echo form_label('HSN Code <span class="required">*</span>','HSN Code',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('hsn_code',set_value('hsn_code'),'placeholder= "" class="form-control" id="name"'); ?>
									<?php if(form_error('name')) echo form_label(form_error('hsn_code'), 'hsn_code', array("id"=>"name-error" , "class"=>"error")); ?>
                                 </div>
							</div>

							

							<div class="form-group">
                            	<?php echo form_label('Price ($) <span class="required">*</span>','price',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('price',set_value('price'),'placeholder= "" class="form-control" id="price"'); ?>
									<?php if(form_error('price')) echo form_label(form_error('price'), 'price', array("id"=>"price-error" , "class"=>"error")); ?>
                                 </div>
							</div>
							
							<div class="form-group">
                            	<?php echo form_label('Quantity <span class="required">*</span>','qty',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('qty',set_value('qty'),'placeholder= "" class="form-control" id="price"'); ?>
									<?php if(form_error('qty')) echo form_label(form_error('qty'), 'qty', array("id"=>"qty-error" , "class"=>"error")); ?>
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
<style>
	input[type="file"] {
		padding: 0 !important;
	}
	.image-upload-section{
		padding-bottom: 10px;
	}
</style>
<script>
$(document).ready(function(){
		
});
</script>

