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
									<?php echo form_label('Selected User <span class="required">*</span>','user_id',array('class'=>'col-sm-2 control-label')); ?>
									<div class="col-sm-8">
										<?php
											$js = 'id="user_id" class="form-control" readonly';
											echo form_input('user_id', (isset($_POST['user_id'])?$user_detail[$_POST['user_id']]:(isset($data['user_id'])?$user_detail[$data['user_id']]:'')), $js);
											if(form_error('user_id')) echo form_label(form_error('user_id'), 'user_id',array("id"=>"user_id-error" , "class"=>"error"));
										?>
									</div>
							 </div>

                             <div class="form-group">
								<?php echo form_label('Product Type <span class="required">*</span>','product_type_id',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="product_type_id" class="form-control" readonly';
									echo form_input('product_type_id', (isset($_POST['product_type_id'])?$product_type_list[$_POST['product_type_id']]:(isset($data['product_type_id'])?$product_type_list[$data['product_type_id']]:'')), $js); 
									if(form_error('product_type_id')) echo form_label(form_error('product_type_id'), 'product_type_id',array("id"=>"product_type_id-error" , "class"=>"error"));
									?>
								</div>
							</div>
							
							<?php if(isset($data['product_id']) && $data['product_id']){ ?>

							<div class='form-group'>
			                   	<label class='col-sm-2 control-label' for='product_id'>Product<span class='required'> *</span></label>
			                	<div class='col-sm-8'>
			                		<?php echo form_input('product_id',$product_list[$data['product_type_id']],'id = "product_id" class="form-control product_id" readonly');
			                		?>
								</div>
							</div>

							<?php } ?>

							<div class="form-group">
                            	<?php echo form_label('Timeslot Name <span class="required">*</span>','timeslot_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('timeslot_name',(isset($_POST['timeslot_name'])?$_POST['timeslot_name']:(isset($data['timeslot_name'])?$data['timeslot_name']:'')),'placeholder= "Timeslot Name" class="form-control" id="timeslot_name" readonly'); ?>
                                 </div>
							</div>

							<div class="form-group">
                            	<?php echo form_label('Batch Name','batch_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">
									<?php echo form_input('batch_name',(isset($_POST['batch_name'])?$_POST['batch_name']:(isset($data['batch_name'])?$data['batch_name']:'')),'placeholder= "Batch Name" class="form-control" id="batch_name" maxlength="'.$this->config->item('batch_length').'" readonly'); ?>
                                 </div>
							</div>

							<div class="form-group">
                            	<?php echo form_label('Order ID','order_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-8">

                                	<?php if(!isset($order_list)){ ?>

									<?php echo form_input('order_id_label',(isset($_POST['order_id'])?$_POST['order_id']:(isset($data['order_id'])?$data['order_id']:'')),'placeholder= "Order ID" class="form-control" id="order_id_label" readonly'); ?>
										<input type="hidden" name="order_id" id="order_id" value="<?php echo $data['order_primary_id']; ?>" />
									<?php }else{ ?>
										<select name='order_id' id='order_id' class="form-control">
											<option value=''>Select Order</option>
											<?php foreach($order_list as $id=>$v){
												echo "<option value='".$id."'>".$v['order_id'].'('.$v['product_name'].')'."</option>";
											} ?>
										</select>
									<?php } ?>
                                 </div>
							</div>

							<div class="form-group">
								<?php echo form_label('Payment Status <span class="required">*</span>','payment_status',array('class'=>'col-sm-2 control-label')); ?>
								<div class="col-sm-8">
									<?php
									$js = 'id="payment_status" class="form-control"';
									echo form_dropdown('payment_status', $payment_status,  isset($_POST['payment_status'])?$_POST['payment_status']:(isset($data['payment_method_status'])?$data['payment_method_status']:''), $js);
									if(form_error('payment_status')) echo form_label(form_error('payment_status'), 'payment_status',array("id"=>"payment_status-error" , "class"=>"error"));
									?>
								</div>
							</div>

							<?php

									if(isset($batch_details) && !empty($batch_details)){

										$count = 0;
										ksort($batch_details);
										foreach($batch_details as $id => $batch){

											$count++;
											$date_time_expired = '';
											$date_time_expired_class = '';
											$timeslot_date_time = isset($_POST['timeslot_date_time_'.$id])?$_POST['timeslot_date_time_'.$id]:(!empty($batch)?$batch:'');
											if($timeslot_date_time){
												if(strtotime(date('d-m-Y H:i'))>strtotime($timeslot_date_time)){
													$date_time_expired = 'readonly="true"';
													$date_time_expired_class = 'nodatetimepicker';
												}
												$timeslot_date_time = date('d-m-Y H:i',strtotime($timeslot_date_time));
											}

											?>

											<fieldset>
												<legend>Class <?php echo $id; ?></legend>

												<div class='form-group'>
							                       	<label class='col-sm-2 control-label' for='timeslot_date_time_<?php echo $id; ?>'>Timeslot Date & Time <span class='required'>*</span></label>
							                        <div class='col-sm-8'>
							                           	<select type='text' name='timeslot_date_time_<?php echo $id; ?>' id='timeslot_date_time_<?php echo $id; ?>' class='form-control timeslot_date_time_select'>
							                           		<option value=''>Select Timeslot</option>
							                           		
							                           		<?php
							                           			$possible_timeslots[strtotime($timeslot_date_time)] = $timeslot_date_time;
							                           			$possible_timeslots = array_filter($possible_timeslots);
																//pr($possible_timeslots);
																krsort($possible_timeslots);
																//pr($possible_timeslots);
							                           		?>
							                           		<?php foreach($possible_timeslots as $k=>$v){
							                           			if($k == strtotime($timeslot_date_time)){
							                           				echo "<option value='".$k."' selected>".$v."</option>";
							                           			}else{
							                           				echo "<option value='".$k."'>".$v."</option>";	
							                           			}
							                           			
							                           		} ?>
							                           	</select>
							                        </div>
												</div>

											</fieldset>
											
										<?php
										}

										if($count){
											echo "<input type='hidden' name='class_count' id='class_count' value='".$count."' />";
										}

										echo "<input type='hidden' name='batch_details_hidden' id='batch_details_hidden' value='".serialize($batch_details)."' />";

									}
								?>
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


