<!-- Main Content -->
<div class="container-fluid">
	<div class="side-body">
		<div class="page-title"></div>
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<?php 
						$pagestatus = $this->uri->segment(3) ? $this->uri->segment(3) : 'index';
						$pagingstatus = $this->uri->segment(4) ? $this->uri->segment(4) : '1';
						$fieldssort = $this->uri->segment(5) ? $this->uri->segment(5) : 'id';
						$ordersort = $this->uri->segment(6) ? $this->uri->segment(6) : 'desc';
						?>
						<div class="card-title col-sm-12">
							<div class="title">
								<h3 style="display:inline-block">
									<?php echo $page_title; ?>
								</h3>
								<span class="create_new pull-right" >
									<?php echo anchor(base_url().SITE_ADMIN_URI.'/user_timeslot/add?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Add User Timeslot',array('class'=>'btn btn-suc glyphicon glyphicon-plus  pull-right','title'=>'Add User Timeslot')); ?>
								</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<!-- Flash Message -->
						<?php
						if($this->session->flashdata('flash_message')){ ?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('flash_message'); ?>
							<?php $this->session->unmark_flash('flash_failure_message'); ?>
						</div> 
						<?php } ?>
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
						<?php $this->load->view('layout/admin/error_msg_element'); ?>
						<?php echo form_open(base_url().SITE_ADMIN_URI.'/user_timeslot','class="search_single"'); ?>

								<div class="form-group">
									<div class="col-sm-12">
										<?php	
											echo form_label('Search Timeslot name / Batch name / User email / First name / Last name / Order ID / Skype id / Contact no','search_name',array('class'=>' control-label'));
										?>
									</div>
									<div class="col-sm-3">
										<?php 
											echo form_input('search_name',$keyword_name,'placeholder= "Enter Keyword" class="form-control" id="search_name"'); 
										?>
									</div>
									<div class="col-sm-2">
										<?php echo form_input('search_from_date',$keyword_from_date,'placeholder= "From Date & Time" class="form-control fromdate" id="search_from_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
									
									<div class="col-sm-2">
										<?php echo form_input('search_to_date',$keyword_to_date,'placeholder= "To Date & Time" class="form-control todate" id="search_to_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<?php $submit_val = array('name' => 'submit-search', 'class' => 'btn btn-default full-width-btn', 'value' => 'Search', 'title' => 'Search');
		        					echo form_submit($submit_val);?>
		        					</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<a title="Reset" class="btn btn-default full-width-btn" href="<?php echo base_url().SITE_ADMIN_URI.'/user_timeslot/reset'; ?>">Reset</a>
		        					</div>
								</div>
							<?php echo form_close(); ?>						
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<?php echo form_open(base_url().SITE_ADMIN_URI.'/user_timeslot/bulkactions/'.$pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort); ?>
							<table class="datatable table table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>
										<?php echo form_checkbox(array('id'=>'selecctall','name'=>'
selecctall')); ?>
										</th>
										<th>S.No</th>
										<th>User email</th>
										<th>Order ID</th>
										<th>Timeslot Name</th>
										<th>Batch Name</th>
										<th>User name</th>
										<th>Skype id</th>
										<th>Contact no</th>
										<th class='date_time_slot_list'>Date & Time Slot</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($total_rows > 0 )
									{
										foreach ($user_timeslot as $key=>$res) 
										{   
											$class="odd"; if($key% 2 ) $class="even"; ?>
											<tr class="<?php echo $class;?>">
												<td><?php echo form_checkbox(array('name'=>'checkall_box[]','class'=>'js-checkbox-all'),$res['id']); ?></td>
												<td><?php echo ($limit_end+$key+1);?></td>

												<td><?php echo $res['email_id'];?></td>

												<td><?php echo ($res['order_id'])?$res['order_id']:'N/A';?></td>

												<td><?php echo $res['timeslot_name'];?></td>

												<td><?php echo ($res['batch_name'])?$res['batch_name']:'N/A';?></td>

												<td><?php echo $res['first_name'].' '.$res['last_name'];?></td>

												<td><?php echo $res['skype_id'];?></td>

												<td><?php echo $res['phone_no'];?></td>

												<td class='date_time_slot_list'>
												<?php
													if(count($slot_details[$res['id']])==1){
														echo date( ADMIN_DATE_FORMAT.'  '.'H:i', strtotime($res['date_time']));
													}else{
														foreach($slot_details[$res['id']] as $class => $date_time){
															echo 'C'.$class.': '.date( ADMIN_DATE_FORMAT.'  '.'H:i', strtotime($date_time)).'<br />';
														}
													}
												?>
												</td>

												<td class="actions text-center">
												
													<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/user_timeslot/edit/<?php echo $res['id'];?>" title = "Edit"><span class="icon glyphicon glyphicon-pencil"></span><span class="title">Edit</span></a> 
													/ 
													<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/user_timeslot/view/<?php echo $res['id'].'?sortingfied='.$fieldssort.'&sortype='.$ordersort;?>" title = "View" class="view-con"><span class="icon glyphicon glyphicon-eye-open"></span><span class="title">View</span>
													</a>

												</td>
											</tr>
										<?php }
									} else {
									echo '<tr><td colspan="8" style="text-align:center;"> No records found</td></tr>'; 
									} ?>
								</tbody>
							</table>
							<?php 
							if($total_rows > 0 ) {  ?>
								<div class="bottom">
								<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"><?php echo page_results($total_rows,$per_page,$this->uri->segment(3),$limit_end); ?></div>
								<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
								<?php echo $this->pagination->create_links(); ?>
								</div>
								<div class="clear"></div>
								</div>
							<?php } ?>
							
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

