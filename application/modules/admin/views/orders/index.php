<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY); ?>
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
										Manage Orders
									</h3>
									
									 <span class="create_new pull-right "><?php echo anchor(base_url().SITE_ADMIN_URI.'/orders/export?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Export',array('class'=>'btn btn-suc glyphicon pull-right','title'=>'Export')); ?></span>
									<span class="create_new pull-right">
										<a href="<?php echo base_url('admin/orders/add'); ?>" class="btn btn-suc glyphicon glyphicon-plus  pull-right" title="Add New Blog"> Add New Order</a>
									</span>
									<span class="create_new pull-right">
									<?php echo form_open(base_url().SITE_ADMIN_URI.'/orders/setyear','class="search_single"'); ?>
										<select name="academic_year" onchange="this.form.submit()">
										<?php foreach($academic_year as $year){ ?>
											<option <?= ($current_year_selected == $year['id']) ?'selected':''; ?> value="<?= $year['id']; ?>"><?= $year['label']; ?></option>
										<?php } ?>
										</select>
										<?php echo form_close(); ?>	
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
							<?php echo form_open(base_url().SITE_ADMIN_URI.'/orders','class="search_single"'); ?>
								<div class="form-group" id="order_cus_form">
									<div class="col-sm-2">
										<?php echo form_input('search_name',$keyword_name,'placeholder= "Store name" class="form-control" id="search_name"'); ?>
									</div>
									
									<div class="col-sm-2">
										<?php 
											echo form_input('search_orderid',$keyword_orderid,'placeholder= "Order Id" class="form-control" id="search_name"'); 
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
		        					<a class="btn btn-default full-width-btn" title='Reset' href="<?php echo base_url().SITE_ADMIN_URI.'/orders/reset'; ?>">Reset</a>
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
											<th>Store Name</th>
											<th>GST No</th>											
											<th>Sub Total</th>
											<th>Grand Total<br> Inc Tax</th>											
                                          	<th>Created</th>
                                          	<th class="text-center">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S.No</th>
											<th>Order Id</th>
											<th>Store Name</th>
											<th>GST No</th>
											
											<th>Sub Total</th>
											<th>Grand Total <br> Inc Tax</th>											
                                          	<th>Created</th>
	                                        <th>Action</th>                                          
										</tr>
									</tfoot>
									<tbody>
										<?php if($total_rows > 0 ) {
											$i=1;
											
											
											foreach ($orders as $key=>$res) 
											{
																						
												$class="odd"; if($key% 2 ) $class="even"; ?>
												<tr class="<?php echo $class;?>">
													<td><?php echo ($limit_end+$key+1);?></td>
													<td><?php echo $res['order_id'];?></td>
													<td><?php echo $res['store_name'];?></td>
													<td><?php echo $res['gstin'];?></td>
													
													<td><?php echo $fmt->format($res['total']);?></td>
													<td><?php echo $fmt->format($res['grand_total']);?></td>
													
													
													<td><?php echo date( ADMIN_DATE_FORMAT, strtotime($res['created']));?></td>
													<td class="actions text-center ">
														<a class="view-con" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/view/<?php echo $res['id'];?>" title = "view"><span class="icon glyphicon glyphicon-eye-open"></span><span class="title">view</span></a>
														<a class="edit-con" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/edit/<?php echo $res['id'];?>" title = "Edit"><span class="icon glyphicon glyphicon-pencil"></span><span class="title">Edit</span></a>
														<a class="delete-con" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/delete/<?php echo $res['id'];?>" title = "Delete"><span class="icon glyphicon glyphicon-trash"></span><span class="title">Delete</span></a>

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
        
