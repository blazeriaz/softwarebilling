 <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                    
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
						<?php 
							$pagestatus = $this->uri->segment(3) ? $this->uri->segment(3) : 'index';
							$pagingstatus = $this->uri->segment(4) ? $this->uri->segment(4) : '1';
							$fieldssort = $this->uri->segment(5) ? $this->uri->segment(5) : $sorting_field;
							$ordersort = $this->uri->segment(6) ? $this->uri->segment(6) : $sorting_order;
						?>
                    <div class="card-title col-sm-12">
                    <div class="title"><h3 style="display:inline-block"><?php echo $page_title; ?></h3>
                    <span class="create_new pull-right"><?php echo anchor(base_url().SITE_ADMIN_URI.'/purchase_users/add?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Add New User',array('class'=>'btn btn-suc glyphicon glyphicon-plus  pull-right','title'=>'Add New User')); ?></span>
                    
                    <span class="create_new pull-right display_none"><?php echo anchor(base_url().SITE_ADMIN_URI.'/purchase_users/export?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Export',array('class'=>'btn btn-suc glyphicon pull-right','title'=>'Export')); ?></span>
                    
                    <span class="create_new pull-right display_none"><?php echo anchor(base_url().SITE_ADMIN_URI.'/purchase_users/import?pagemode='.$pagestatus.'&modestatus='.$pagingstatus.'&sortingfied='.$fieldssort.'&sortype='.$ordersort,' Import',array('class'=>'btn btn-suc glyphicon pull-right','title'=>'Import')); ?></span>
                		
                    </div>
                    </div>
                </div>

                <div class="card-body">
                	<!-- Flash Message -->
						<?php if($this->session->flashdata('flash_message')){ ?>
						 <div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 <?php echo $this->session->flashdata('flash_message'); ?>
							 <?php $this->session->unmark_flash('flash_failure_message'); ?>
						</div> 
						<?php } ?>
						<?php echo form_open(base_url().SITE_ADMIN_URI.'/purchase_users','class="search_user"'); ?>
						<div class="form-group">
				            
				            <div class="col-sm-4">
				            	<?php echo form_input('search_name',$keyword_name,'placeholder= "Search Name / Contact no " class="form-control" id="search_name"'); ?>
							</div>
							<div class="col-sm-2" style="display:none;">
								<?php 
								$sort_array = array(0=>'Select Sort Type','asc'=>'Ascending','desc'=>'Descending');
								echo form_dropdown('sorting_order',$sort_array,$sorting_order,'id="sorting" class="form-control"'); ?>
				            </div>
        					<div class="col-sm-2 col-lg-2">
        					<?php $submit_val = array('name' => 'submit-search', 'class' => 'btn btn-default full-width-btn', 'value' => 'Search', 'title' => 'Search');
        					echo form_submit($submit_val);?>
        					</div>
        					<div class="col-sm-2 col-lg-2">
        					<a class="btn btn-default full-width-btn" href="<?php echo base_url().SITE_ADMIN_URI.'/purchase_users/reset'; ?>" title="Reset">Reset</a>
        					</div>
   
						</div>
						<?php echo form_close(); ?>
						
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  		
						<?php echo form_open(base_url().SITE_ADMIN_URI.'/purchase_users/bulkactions/'.$pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort); ?>
                      <table class="datatable table table-striped" cellspacing="0" width="100%">
                          <thead>
                              <tr>
								<th><?php echo form_checkbox(array('id'=>'selecctall','name'=>'selecctall')); ?></th>
                              	<th>S.No</th>
                               <th>Created</th>
                                <th>Store Name</th>
                                                              
                                <th>Contact No</th>                                
                                <th>Address</th>                              
								
								<th>Status</th>

                                <th class="text-center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php if($total_rows > 0 ) {
								 
								
                             		foreach ($users as $key=>$res) 
                             		{
	   									$class="odd"; if($key% 2 ) $class="even"; ?>
                             			<tr class="<?php echo $class;?>">

										<td><?php echo form_checkbox(array('name'=>'checkall_box[]','class'=>'js-checkbox-all'),$res['id']); ?></td>
										<td><?php echo ($limit_end+$key+1);?></td>
										<td><?php echo date( ADMIN_DATE_FORMAT, strtotime($res['created']));?></td>
										<td><?php $firstname= $res['first_name']; echo (strlen($firstname)>30?substr($firstname,0,30)."...":$firstname) ;?></td>
										
										
										<td><?php echo $res['phone_no'];?></td>
										<td><?php echo $res['address'];?></td>
										
										
										
										<td>
											<?php if($res['status'] ==1){?>
												<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/purchase_users/update_status/<?php echo $res['id'];?>/<?php echo $res['status'];?>/<?php echo $pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort;?>" class="change_status"><span class="icon glyphicon glyphicon glyphicon-ok"></span></a>
											<?php }else{?>
												<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/purchase_users/update_status/<?php echo $res['id'];?>/<?php echo $res['status'];?>/<?php echo $pagestatus.'/'.$pagingstatus.'?sortingfied='.$fieldssort.'&sortype='.$ordersort;?>" class="change_status"><span class="icon glyphicon glyphicon glyphicon-remove"></span></a> 
											<?php }?>
										</td>
										
														                                     							
										<td class="actions text-center"><a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/purchase_users/edit/<?php echo $res['id'];?>" title = "Edit"><span class="icon glyphicon glyphicon-pencil"></span><span class="title">Edit</span></a> 
										
										
										<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/purchase_users/delete/<?php echo $res['id'];?>" title = "Delete"><span class="icon glyphicon glyphicon-trash"></span><span class="title">Delete</span></a> 
										
										
										
										</td>
             							</tr>

								<?php
                             		}
                             	}else {
                             		echo '<tr><td colspan="11" style="text-align:center;"> No records found</td></tr>'; 
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
<div class="multi-actions ">
							<?php
							if($this->uri->segment(3)!="deactivate"){
							$bulkactions = $this->config->item('bulkactions');
							//unset($bulkactions[3]);
							echo form_dropdown('more_action_id',$bulkactions,$this->input->post('offer_type'),'id="MoreActionId" class="span2 js-more-action form-control"'); 
							}
							?>
							</div>
						<?php echo form_close(); ?>
				                         </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <style>
			.table th, .table td {
				text-align: center;
			}
		</style>
