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
								<a title="Back" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/user_timeslot">Back</a>
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'user_timeslot_form');				
							echo form_open('', $attributes); ?>							
                            
                            <div class="form-group">
                                <?php echo form_label('User Email : ','user_email',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="user_email" style="border:none;"><?php echo $user_timeslot['email_id']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                            	<?php echo form_label('Timeslot Name : ','timeslotname',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<p class="form-control" id="timeslotname" style="border:none;"><?php echo $user_timeslot['timeslot_name']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Batch Name : ','batchname',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                <?php
                                    $batchname = !empty($user_timeslot['batch_name'])?$user_timeslot['batch_name']:'';
                                ?>
                                    <p class="form-control" id="batchname" style="border:none;"><?php echo $batchname; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Product Type : ','product_type',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="product_type" style="border:none;"><?php echo $user_timeslot['product_type']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Order ID : ','order_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="order_id" style="border:none;"><?php echo $user_timeslot['order_id']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Batch Slot : ','batchslot',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    
                                    <table width="800px">
                                    <?php
                                        ksort($batch_details);
                                        $class = array_keys($batch_details);
                                        echo "<tr>";
                                        foreach($class as $class){
                                            echo "<th>";
                                                echo 'Class '.$class;
                                            echo "</th>";
                                        }
                                        echo "</tr>";
                                        echo "<tr>";
                                        $date_time = array_values($batch_details);
                                        foreach($date_time as $date_time){
                                            echo "<td>";
                                                echo date('d-m-Y h:i A',strtotime($date_time));
                                            echo "</td>";
                                        }
                                        echo "</tr>";
                                    ?>
                                    </table>
                                </div>
                            </div>                            
                            
                            <div class="form-group">
                                <?php echo form_label('First name : ','first_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="first_name" style="border:none;"><?php echo $user_timeslot['first_name']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Last Name : ','last_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="last_name" style="border:none;"><?php echo $user_timeslot['last_name']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Skype id : ','skype_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="skype_id" style="border:none;"><?php echo $user_timeslot['skype_id']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Contact no : ','phone_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="phone_no" style="border:none;"><?php echo $user_timeslot['phone_no']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Payment Method : ','payment_method_status',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <p class="form-control" id="payment_method_status" style="border:none;">
                                    <?php 
                                        $payment_status = $this->config->item('payment_status');
                                        echo ($user_timeslot['payment_method_status']==1)?$payment_status[$user_timeslot['payment_method_status']]:$payment_status[$user_timeslot['payment_method_status']]; 
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


