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
								<a title="Back" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/misc_orders">Back</a>
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'admin_view_misc_order');				
							echo form_open('', $attributes); ?>							
                            
							
							<div class="form-group">
                                <?php echo form_label('Name : ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo $misc_order_detail['name']; ?></p>
                                </div>
                            </div>
							<div class="form-group">
							 <?php echo form_label('Email ID : ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo $misc_order_detail['email_id']; ?></p>
                                </div>
							</div>
							<div class="form-group">
								 <?php echo form_label('Phone Number : ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo $misc_order_detail['phone_number']; ?></p>
                                </div>
							</div>
							<div class="form-group">
								 <?php echo form_label('Date: ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo date( ADMIN_DATE_FORMAT, strtotime($misc_order_detail['created']));?></p>
                                </div>
							</div>
							<div class="form-group">
								 <?php echo form_label('Comments: ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo $misc_order_detail['comments']; ?></p>
                                </div>
							</div>
							<div class="form-group">
								 <?php echo form_label('Amount: ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo '$ '.$misc_order_detail['amount']; ?></p>
                                </div>
							</div>
							
							<div class="form-group">
                                <?php echo form_label('Status : ','address',array('class'=>'col-sm-3 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;">
									
									<?php 
									switch($misc_order_detail['status']){
										case 0 : $status = 'Inprogress';break;
										case 1 : $status = 'Cancelled';break;
										case 2 : $status = 'Completed';break;
										
										
									}
									echo $status;
									?>
									</p>
                                </div>
                            </div>                   
                            
                        <?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


