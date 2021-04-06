<?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY); ?>
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
									<?php echo anchor(base_url().SITE_ADMIN_URI.'/webinar/add?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Add New Product',array('class'=>'btn btn-suc glyphicon glyphicon-plus  pull-right','title'=>'Add New Product')); ?>
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
						<?php $this->load->view('layout/admin/error_msg_element'); ?>
						<?php echo form_open(base_url().SITE_ADMIN_URI.'/webinar','class="search_single "'); ?>
								<div class="form-group">
									<div class="col-sm-3">
										<?php echo form_input('search_name',$keyword_name,'placeholder= "Search Product Name or Hsn Code" class="form-control" id="search_name"'); ?>
									</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<?php $submit_val = array('name' => 'submit-search', 'class' => 'btn btn-default full-width-btn', 'value' => 'Search', 'title' => 'Search');
		        					echo form_submit($submit_val);?>
		        					</div>
		        					<div class="col-sm-2  col-lg-2">
		        					<a title="Reset" class="btn btn-default full-width-btn" href="<?php echo base_url().SITE_ADMIN_URI.'/webinar/reset'; ?>">Reset</a>
		        					</div>
								</div>
							<?php echo form_close(); ?>						
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<?php echo form_open(base_url().SITE_ADMIN_URI.'/webinar/bulkactions/'.$pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort); ?>
							<table class="datatable table table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>										
										<th>S.No</th>
										<th>Product Name</th>
										<th>HSN Code</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>status</th>
										<th>Created</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($total_rows > 0 )
									{
										foreach ($webinar as $key=>$res) 
										{   
											$class="odd"; if($key% 2 ) $class="even"; ?>
											<tr class="<?php echo $class;?>">
												<?php /* <td><?php echo form_checkbox(array('name'=>'checkall_box[]','class'=>'js-checkbox-all'),$res['id']); ?></td> */ ?>

												<td><?php echo ($limit_end+$key+1);?></td>

												<td><?php echo $res['name'];?></td>
												<td><?php echo $res['hsn_code'];?></td>

												<td> <?php echo $fmt->format($res['price']);?></td>
												
												<td><?php echo $res['qty'];?></td>
												<td><?php if($res['status'] == 1){ ?>
												<a href="javasript:void(0)" class="change_status"><span class="icon glyphicon glyphicon glyphicon-ok"></span></a>
												<?php }else{ ?>
												<a href="javasript:void(0)" class="change_status"><span class="icon glyphicon glyphicon glyphicon-remove"></span></a>
												<?php } ?>
												</td>

												<td><?php	echo $res['created']; ?></td>
												
												<td class="actions text-center">

											
														
													<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/webinar/edit/<?php echo $res['id'];?>" title = "Edit"><span class="icon glyphicon glyphicon-pencil"></span><span class="title">Edit</span></a>

													

													
													<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/webinar/delete/<?php echo $res['id'];?>/<?php echo $pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort;?>" title = "Delete" class="delete-con"><span class="icon glyphicon glyphicon-trash"></span><span class="title">Delete</span>
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

