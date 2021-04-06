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
										Sales Report
									</h3>
									<span class="create_new pull-right">
										<a href="<?php echo base_url('admin/reports/export'); ?>" class="btn btn-suc glyphicon glyphicon-plus  pull-right" title="Export Sales Report">Export Report</a>
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
							<?php echo form_open(base_url().SITE_ADMIN_URI.'/reports','class="search_single"'); ?>
								<div class="form-group" id="order_cus_form">
								<div class="row">
									<div class="col-sm-2">
										<?php echo form_input('report_search_name',$keyword_name,'placeholder= "Product name" class="form-control" id="search_name"'); ?>
									</div>
									<div class="col-sm-2">
										<?php 
											echo form_input('report_search_email',$keyword_email,'placeholder= "Email Id" class="form-control" id="search_name"'); 
										?>
									</div>
									<div class="col-sm-2">
										<?php 
											echo form_input('report_search_orderid',$keyword_orderid,'placeholder= "Order/Transaction Id" class="form-control" id="search_name"'); 
										?>
									</div>
									<div class="col-sm-2">
									<?php echo form_dropdown('report_search_product_type',$product_type,$keyword_product_type,'class="form-control" id="product_type"'); ?>
									</div>
									
									<div class="col-sm-2">
										<?php echo form_input('report_search_from_date',$keyword_from_date,'placeholder= "From Date" class="form-control fromdate" id="o_search_from_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
									
									<div class="col-sm-2">
										<?php echo form_input('report_search_to_date',$keyword_to_date,'placeholder= "To Date" class="form-control todate" id="o_search_to_date" autocomplete="off" readonly="readonly"'); ?>
									</div>
								</div>
								<div class="row" style="#float:right;">
									<div class="col-sm-2">
										<?php echo form_dropdown('report_search_order_status',$order_status,$keyword_order_status,'class="form-control" id="product_type"'); ?>
									</div>
									<div class="col-sm-1">
									</div>
		        					<div class="col-sm-3  col-lg-3">
										<?php $submit_val = array('name' => 'submit-search', 'class' => 'btn btn-default full-width-btn form-control', 'value' => 'Search', 'title' => 'Search');
										echo form_submit($submit_val);?>
		        					</div>
		        					<div class="col-sm-3  col-lg-3">
										<a class="btn btn-default full-width-btn" title='Reset' href="<?php echo base_url().SITE_ADMIN_URI.'/reports/reset'; ?>">Reset</a>
		        					</div>
								</div>
								</div>
							<?php echo form_close(); ?>							
							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<?php echo form_open(base_url().SITE_ADMIN_URI.'/banners/bulkactions/'.$pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort); ?>
								<table class="datatable table table-striped" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>s.no</th>
												                                      
											<th>Order Id</th>
											<th>Email Id</th>
											
											<th>Contact Number</th>
											<th>Product Name</th>
											<th>Amount</th>
											<th>Valid Date</th>
											<th>Transaction Id</th>
											<th>Order Status</th>
                                          	<th>Ordered Date</th>
                                          	
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S.No</th>
											<th>Order Id</th>
											<th>Email Id</th>
											
											<th>Contact Number</th>
											<th>Product Name</th>
											<th>Amount</th>
											<th>Valid Date</th>
											<th>Transaction Id</th>
											<th>Order Status</th>
                                          	<th>Created</th>
	                                                                           
										</tr>
									</tfoot>
									<tbody>
										<?php if($total_rows > 0 ) {
											$i=1;
											//pr($orders);
											
											foreach ($orders as $key=>$res) 
											{   
												$class="odd"; if($key% 2 ) $class="even"; ?>
												<tr class="<?php echo $class;?>">
													<td><?php echo ($limit_end+$key+1);?></td>
													<td><?php echo $res['order_id'];?></td>
													<td><?php echo $res['user_email'];?></td>
												
													<td><?php echo ($res['user_phone'])?$res['user_phone']:'N/A';?></td>
													<td><?php echo $res['product_name'];?></td>
													<td><?php echo '$ '.$res['amount'];?></td>
													<?php 
													
													switch($res['product_type']){
														case 6: $expiry_or_venue_date = date( ADMIN_DATE_FORMAT.'  '.'H:i', strtotime($res['prod_attr_location_date']));break;
														case 4: $expiry_or_venue_date = date( ADMIN_DATE_FORMAT.'  '.'H:i', strtotime($res['prod_attr_location_date']));break;
														case 12: $expiry_or_venue_date = 'N/A';break;
														default: $expiry_or_venue_date = date( ADMIN_DATE_FORMAT.'  '.'H:i', strtotime($res['expiry_date']));break;
													}
													?>
													<td><?php echo $expiry_or_venue_date;?></td>
													
													<td><?php echo $res['transcation_id'];?></td>
													<td>
														<?php 
														switch($res['status']){
																case 1 : $transcation_status = 'Completed';break;
																case 2 : $transcation_status = 'Cancelled';break;
																case 3 : $transcation_status = 'Failed';break;
																case 4 : $transcation_status = 'Placed';break;
																case 5 : $transcation_status = 'Processing';break;
																case 6 : $transcation_status = 'Refunded';break;
																case 7 : $transcation_status = 'Refused';break;
																case 8 : $transcation_status = 'Removed';break;
																case 9 : $transcation_status = 'Returned';break;
																case 10 : $transcation_status = 'Reversed';break;
																case 11 : $transcation_status = 'Unclaimed';break;
																case 12 : $transcation_status = 'On hold';break;
																case 13 : $transcation_status = 'Held';break;
																case 14 : $transcation_status = 'Denied';break;
																case 15 : $transcation_status = 'default';break;
															}
														echo $transcation_status;

														?>
													</td>
													<td><?php //echo date( ADMIN_DATE_FORMAT, strtotime($res['created']));?></td>
													
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
       
<style>
input#o_search_from_date, input#o_search_to_date {
    background-color: white;
}
</style>
