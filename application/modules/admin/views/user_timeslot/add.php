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
								<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/user_timeslot" title="Back">Back</a>
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
                			<?php  $attributes = array('class' => 'form-horizontal','id' => 'user_timeslot_form','enctype'=>'multipart/form-data');				
							echo form_open('', $attributes); ?>

							<div class="form-group">
								<?php echo form_label('Select Timeslot <span class="required">*</span>','time_slot_id',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="time_slot_id" class="form-control select2"';
									echo form_dropdown('time_slot_id', $timeslot_list,  isset($_POST['time_slot_id'])?$_POST['time_slot_id']:'', $js);
									if(form_error('time_slot_id')) echo form_label(form_error('time_slot_id'), 'time_slot_id',array("id"=>"time_slot_id-error" , "class"=>"error"));
									?>
								</div>
							</div>

							<div class="ajax_details_div">
							</div>

							<div class="form-group">
								<?php echo form_label('Select Users <span class="required">*</span>','user_id',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="user_id" class="form-control select2 timeslot_user_id" placeholder="select users"';
									echo form_dropdown('user_id', $get_users,  isset($_POST['user_id'])?$_POST['user_id']:'', $js);
									if(form_error('user_id')) echo form_label(form_error('user_id'), 'user_id',array("id"=>"user_id-error" , "class"=>"error"));
									?>
								</div>
							</div>

							<div class="ajax_details_div_1">
							</div>

							<div class="form-group">
								<?php echo form_label('Select Order <span class="required">*</span>','order_id',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="order_id" class="form-control" placeholder="select order"';
									echo form_dropdown('order_id', $get_orders,  isset($_POST['order_id'])?$_POST['order_id']:'', $js);
									if(form_error('order_id')) echo form_label(form_error('order_id'), 'order_id',array("id"=>"order_id-error" , "class"=>"error"));
									?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Payment Method <span class="required">*</span>','payment_status',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="payment_status" class="form-control"';
									echo form_dropdown('payment_status', $payment_status,  isset($_POST['payment_status'])?$_POST['payment_status']:'', $js);
									if(form_error('payment_status')) echo form_label(form_error('payment_status'), 'payment_status',array("id"=>"payment_status-error" , "class"=>"error"));
									?>
								</div>
							</div>
										 				
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default cust_submit_button" title="Save">Save</button>
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
$(document).ready(function(){
		
});
</script>

