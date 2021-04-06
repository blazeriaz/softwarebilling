 <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
	<div class="page-title"></div>
		<div class="row">
			<div class="col-xs-12">
				<div class="card custom-card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"><?php echo 'Add Purchase'  ?></div>
						</div>
						<div class="back pull-right">
							<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/purchase" title="Back">Back</a>
						</div>
                    </div>
                    <div class="card-body">
                    	<?php if(isset($upload_error)&&$upload_error){ ?>
						<div class="alert alert-danger" role="alert">
							 <strong>Warning!</strong> <?php echo $upload_error; ?>
						</div>
						<?php } ?>
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
                		<?php $attributes = array('class' => 'form-horizontal','id' => 'add_new_purchase');				
						echo form_open_multipart('', $attributes); ?>
						
							<div class="form-group">
							<div class="col-sm-12">
                            		<?php echo form_label('Select User','seller_name',array('class'=>'col-sm-2 control-label')); ?>							
								<div class="col-sm-4">
									<?php 
									$js = 'id="user_list" class="form-control select2"';
									echo form_dropdown('user_id', $users_list, isset($_POST['user_id'])?$_POST['user_id']:'',$js); 
                   					if(form_error('user_id')) echo form_label(form_error('user_id'), 'user_id', array("id"=>"user_id-error" , "class"=>"error")); ?>
                                </div>
								
								
								<?php echo form_label('Seller Name <span class="required">*</span>','seller_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('seller_name',set_value('seller_name'),'placeholder= "Seller Name" class="form-control" id="seller_name"'); 
                   					if(form_error('seller_name')) echo form_label(form_error('seller_name'), 'first_name', array("id"=>"seller_name-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>				
							
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('Seller GST <span class="required">*</span>','seller_gst',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('seller_gst',set_value('seller_gst'),'placeholder= "Seller GST No" class="form-control" id="seller_gst"'); 
                   					if(form_error('seller_gst')) echo form_label(form_error('seller_gst'), 'seller_gst', array("id"=>"seller_gst-error" , "class"=>"error")); ?>
                                </div>
								<?php echo form_label('Invoice No <span class="required">*</span>','invoice_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									
									echo form_input('invoice_no',set_value('invoice_no'),'placeholder= "Invoice No" class="form-control" id="invoice_no"'); 
                   					if(form_error('invoice_no')) echo form_label(form_error('invoice_no'), 'invoice_no', array("id"=>"invoice_no-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>
							
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('Commodity Code <span class="required">*</span>','commodity_code',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('commodity_code','2041','placeholder= "Commodity Code" class="form-control" id="commodity_code"'); 
                   					if(form_error('commodity_code')) echo form_label(form_error('commodity_code'), 'commodity_code', array("id"=>"commodity_code-error" , "class"=>"error")); ?>
                                </div>
								
								<?php echo form_label('HSN Code <span class="required">*</span>','hsn_code',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('hsn_code',set_value('hsn_code'),'placeholder= "HSN Code" class="form-control" id="hsn_code"'); 
                   					if(form_error('hsn_code')) echo form_label(form_error('hsn_code'), 'hsn_code', array("id"=>"hsn_code-error" , "class"=>"error")); ?>
                                </div>
								
								</div>
							</div>						
							
							
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('Tonage <span class="required">*</span>','tonage',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('tonage',set_value('tonage'),'placeholder= "Tonage" class="form-control" id="tonage"'); 
                   					if(form_error('tonage')) echo form_label(form_error('tonage'), 'tonage', array("id"=>"tonage-error" , "class"=>"error")); ?>
                                </div>
								<?php echo form_label('Sales Value <span class="required">*</span>','sales_value',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('sales_value',set_value('sales_value'),'placeholder= "Sales Value" class="form-control" id="sales_value"'); 
                   					if(form_error('sales_value')) echo form_label(form_error('sales_value'), 'sales_value', array("id"=>"sales_value-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>						
							

							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('Invoice Date <span class="required">*</span>','invoice_date',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									
									echo form_input('invoice_date',set_value('invoice_date'),'placeholder= "Invoice Date" class="form-control" id="o_search_from_date" readonly'); 
                   					if(form_error('invoice_date')) echo form_label(form_error('invoice_date'), 'invoice_date', array("id"=>"invoice_date-error" , "class"=>"error")); ?>
                                </div>
								<?php echo form_label('Rate of Tax <span class="required">*</span>','rate_of_tax',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('rate_of_tax','18%','placeholder= "Rate of Tax" class="form-control" id="rate_of_tax"'); 
                   					if(form_error('rate_of_tax')) echo form_label(form_error('rate_of_tax'), 'rate_of_tax', array("id"=>"rate_of_tax-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>
							
							
							
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('SGST <span class="required">*</span>','sgst',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('sgst',set_value('sgst'),'placeholder= "SGST Amount" class="form-control" id="sgst"'); 
                   					if(form_error('sgst')) echo form_label(form_error('sgst'), 'sgst', array("id"=>"sgst-error" , "class"=>"error")); ?>
                                </div>
								<?php echo form_label('CGST <span class="required">*</span>','cgst',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('cgst',set_value('cgst'),'placeholder= "CGST Amount" class="form-control" id="sgst"'); 
                   					if(form_error('cgst')) echo form_label(form_error('cgst'), 'cgst', array("id"=>"sgst-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>
							
							
							
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('Total Value <span class="required">*</span>','total_value',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('total_value',set_value('total_value'),'placeholder= "Total Amount" class="form-control" id="sgst"'); 
                   					if(form_error('total_value')) echo form_label(form_error('total_value'), 'total_value', array("id"=>"sgst-error" , "class"=>"error")); ?>
                                </div>
								
								<?php echo form_label('Tcs Percentage','tcs_tax_percent',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php
									$tcs_tax_settings = get_site_settings(array('site.tcs_tax_percent'));
									$tcs_percent = $tcs_tax_settings[0]['value'];
									echo form_input('tcs_tax_percent',$tcs_percent.'%','placeholder= "TCS Percentage" class="form-control" id="tcs_tax_percent"'); 
                   					if(form_error('tcs_tax_percent')) echo form_label(form_error('tcs_tax_percent'), 'tcs_tax_percent', array("id"=>"tcs_tax_percent-error" , "class"=>"error")); ?>
                                </div>
								</div>
							</div>
							<div class="form-group">
							<div class="col-sm-12">
                            	<?php echo form_label('TCS amount <span class="required">*</span>','tcs_amount',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php									
									echo form_input('tcs_amount',set_value('tcs_amount'),'placeholder= "TCS Amount" class="form-control" id="tcs_amount"'); 
                   					if(form_error('tcs_amount')) echo form_label(form_error('tcs_amount'), 'tcs_amount', array("id"=>"tcs_amount-error" , "class"=>"error")); ?>
                                </div>						
								
								</div>
							</div>
							
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                   <center> <button type="submit" class="btn btn-primary" title="Save">Save</button></center>
								   
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
jQuery(window).load(function(){
	var div = ".error:first";
	if($(div).length!==0){
		$('html, body').animate({
			scrollTop: $(div).offset().top - 300
		}, 1000);
	}
	if($("#country").val()){
		$('#city').prop("disabled", false);
	}
});
jQuery( document ).ready(function() {
   $('#user_list').livequery("change",function(){
		if($(this).val() != ''){
			$(".loader").show();			
			var url = base_url + "admin/purchase/getpurchaseusers"
				$.ajax({
					type: "POST",
					url: url,
					data: {'id': $(this).val()},
					success: function (result) {
						var obj = $.parseJSON(result);			
						
						$('#seller_name').val(obj.store_details.store_name);						
						
						$('#seller_gst').val(obj.store_details.gstin);
						
						$(".loader").hide();
						
					}
				});
				$(".loader").hide();
		}
	});
});
</script>
