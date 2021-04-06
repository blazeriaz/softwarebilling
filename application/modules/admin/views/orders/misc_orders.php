<div class="container-fluid">
	<div class="side-body">
		<div class="page-title"></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="card">
						<div class="card-header">
							<?php 
							$pagestatus = $this->uri->segment(3) ? $this->uri->segment(3) : 'misc_orders';
							$pagingstatus = $this->uri->segment(4) ? $this->uri->segment(4) : '1';
							$fieldssort = $this->uri->segment(5) ? $this->uri->segment(5) : 'id';
							$ordersort = $this->uri->segment(6) ? $this->uri->segment(6) : 'desc';
							?>
							<div class="card-title col-sm-12">
								<div class="title">
									<h3 style="display:inline-block">
										Manage Miscellaneous orders
									</h3>
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
							<?php echo form_open(base_url().SITE_ADMIN_URI.'/orders/misc_orders','class="search_single"'); ?>
								<div class="form-group" id="order_cus_form">
									
									<div class="col-sm-2">
										<?php 
											echo form_input('search_email',$keyword_email,'placeholder= "Email Id" class="form-control" id="search_email"'); 
										?>
									</div>
									<div class="col-sm-2">
										<?php echo form_input('search_from_date',$keyword_from_date,'placeholder= "From Date" class="form-control fromdate" id="o_search_from_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
									
									<div class="col-sm-2">
										<?php echo form_input('search_to_date',$keyword_to_date,'placeholder= "To Date" class="form-control todate" id="o_search_to_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<?php $submit_val = array('name' => 'submit-search', 'class' => 'btn btn-default full-width-btn', 'value' => 'Search', 'title' => 'Search');
		        					echo form_submit($submit_val);?>
		        					</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<a class="btn btn-default full-width-btn" title='Reset' href="<?php echo base_url().SITE_ADMIN_URI.'/orders/reset_misc_orders'; ?>">Reset</a>
		        					</div>
								</div>
							<?php echo form_close(); ?>							
							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<?php echo form_open(base_url().SITE_ADMIN_URI.'/banners/bulkactions/'.$pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort); ?>
								<table class="datatable table table-striped" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>s.no</th>
											<th>Created Date</th>
											<th>Name</th>
											<th>Email Id</th>
											<th>Phone Number</th>
											<th>Amount</th>
											<th>Status</th>
                                          	<th class="text-center">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>s.no</th>
											<th>Created Date</th>
											<th>Name</th>
											<th>Email Id</th>
											<th>Phone Number</th>
											<th>Amount</th>
											<th>Status</th>
                                          	<th>Action</th>                                          
										</tr>
									</tfoot>
									<tbody>
										<?php if($total_rows > 0 ) {
											$i=1;
											
											
											foreach ($order_offline as $key=>$res) 
											{   
												$class="odd"; if($key% 2 ) $class="even"; ?>
												<tr class="<?php echo $class;?>">
													<td><?php echo ($limit_end+$key+1);?></td>
													<td><?php echo date( ADMIN_DATE_FORMAT, strtotime($res['created']));?></td>
													<td><?php echo $res['name'];?></td>
													<td><?php echo $res['email_id'];?></td>
													<td><?php echo $res['phone_number'];?></td>
													<td><?php echo '$ '.$res['amount'];?></td>
													
													<td>
														<?php 
														switch($res['status']){
																case 0 : $order_status = 'Inprogress';break;
																case 1 : $order_status = 'Cancelled';break;
																
																case 2 : $order_status = 'Completed';break;
																
															}
														echo $order_status;

														?>
													</td>
													
													<td class="actions text-center ">
														<a class="view-con" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/view_misc_order/<?php echo $res['id'];?>" title = "View"><span class="icon glyphicon glyphicon-eye-open"></span><span class="title">view</span></a>
													
													</td>
												</tr>
												<?php
												$i++;
											}
										} else {
										echo '<tr><td colspan="10" style="text-align:center;"> No records found</td></tr>'; 
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
        
