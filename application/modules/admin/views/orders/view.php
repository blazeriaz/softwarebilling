 <!-- Main Content -->
 <?php $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY); ?>
<div class="container-fluid">
    <div class="side-body">

		<div class="page-title"></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="card custom-card">
						<div class="card-header">
							<div class="card-title">
								<div class="title"><?php echo $page_title?></div>
							</div>
							<div class="back pull-right"> 
                                                            
                                                        <a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/printpdf/<?php echo $edit_order['id']; ?>" title="Back">Print</a>    
                                                        <a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/edit/<?php echo $edit_order['id']; ?>" title="Back">Edit</a>
                                                        <a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/index" title="Back">Back</a>
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'add_discount');				
							echo form_open_multipart('admin/orders/discount', $attributes); ?>
							

							
							<div class="form-group">
                            	<?php echo form_label('Store Name <span class="required">*</span>','store_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo $edit_order['store_name']; ?>
                                </div>
								
								<?php echo form_label('Name <span class="required">*</span>','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo $edit_order['customer_name']; ?>
                                </div>
							</div>
							
							
							
							<div class="form-group">
                            	<?php echo form_label('Contact Number <span class="required">*</span>','phone_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo isset($edit_order['phone_no'])?$edit_order['phone_no']:''; ?>
                                </div>
								
								<?php echo form_label('Address <span class="required">*</span>','address_line1',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo isset($edit_order['address_line1'])?$edit_order['address_line1']:''; ?>
                                </div>
							</div>
							
							
							
							
							
							
							
							<div class="form-group">
                            	<?php echo form_label('Vehicle No:','address_line2',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php $vehicle_no = isset($edit_order['address_line2'])?$edit_order['address_line2']:''; ?>
									<input type="text" name="vehicle_no" value="<?php echo $vehicle_no; ?>">
                                </div>
								
								<?php echo form_label('GSTIN ','gstin',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo isset($edit_order['gstin'])?$edit_order['gstin']:''; ?>
                                </div>								
								
							</div>
                                
                                <div class="form-group">
								<?php echo form_label('Way Bill No ','way_bill',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php $way_bill_no = isset($edit_order['address_line3'])?$edit_order['address_line3']:''; ?>
									<input type="text" name="way_bill" value="<?php echo $way_bill_no; ?>">
                                </div>
                            	<?php echo form_label('Invoice No','order_id',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									
                                    <input type="text" name="invoice_no" value="<?php echo isset($edit_order['order_id'])?$edit_order['order_id']:''; ?>">
                                </div>							
								
							</div>
							
							<div class="form-group">
							<?php echo form_label('Add TCS Tax','display_tcs',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php  ($edit_order['display_tcs'])?$checked = "checked":$checked = ''; ?>
                                    <input type="checkbox" value="1" name="display_tcs" <?php echo $checked; ?> />
									
                                </div>
							
								
								<?php echo form_label('IGST display ','display_igst',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php  ($edit_order['display_igst'])?$checked = "checked":$checked = ''; ?>
                                    <input type="checkbox" value="1" name="display_igst" <?php echo $checked; ?> />
									
                                </div>
							</div>	
							<div class="form-group">
							<?php echo form_label('Delivery At ','delivery_at',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
                                    <textarea name="delivery_at" rows="5" cols="40"><?php echo isset($edit_order['delivery_at'])?$edit_order['delivery_at']:''; ?></textarea>
                                </div>
							</div>
							
								
							<div class="card-header">
								<div class="card-title">
									<div class="title">Ordered Products</div>
								</div>
								
								<?php 
								if(form_error('product')) echo form_label(form_error('product'), 'name', array("id"=>"product_name".$i."-error" , "class"=>"error")); ?> 
							
							</div>
							
							<section class="product-section">
							<table class="datatable table table-striped" width="100%" cellspacing="0">
                          <thead>
                              <tr>
								
                              	<th>Product Name</th>
                              	<th>HSN Code</th>
                               <th>Weight / Unit</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                              </tr>
                          </thead>
                          <tbody>
						  <?php
							//pr($edit_orderitems);
							?>
						  <?php for($i=0;$i < count($edit_orderitems);$i++){ ?>
							<tr class="odd">
										<td style="width:35%">
										<div class="col-sm-12">
									<?php 
									 $product_name = isset($edit_orderitems[$i]['product_name'])?$edit_orderitems[$i]['product_name']:'';
									
									 $product_options = isset($edit_orderitems[$i]['product_options'])?$edit_orderitems[$i]['product_options']:'';
									 
									 echo $product_name. ' - ' .$product_options;
									?>
									</div>
										</td>
										<td style="width:15%">
											<div class="col-sm-8">
												<?php
												echo $qty = isset($edit_orderitems[$i]['hsn_code'])?$edit_orderitems[$i]['hsn_code']:'';
												?> 
											</div> 
										</td>
										<td style="width:15%">
											<div class="col-sm-8">
												<?php
												echo $qty = isset($edit_orderitems[$i]['qty'])?$edit_orderitems[$i]['qty']:'';
												?> 
											</div> 
										</td>
										<td style="width:20%"><div class="col-sm-12">
												<?php
												 $unit_price = isset($edit_orderitems[$i]['unit_price'])?$edit_orderitems[$i]['unit_price']:'';
												//echo number_format($unit_price , 2);
												
												echo $fmt->format($unit_price);
												?> 
											</div> </td>
										<td style="width:30%"><div class="col-sm-12">
												<?php 
												$total_price = isset($edit_orderitems[$i]['total_price'])?$edit_orderitems[$i]['total_price']:'';
												
												echo $fmt->format($total_price);
												 ?> 
											</div> </td>
										</tr>
						  <?php } ?>	
							<tr class="odd">
								<td colspan="4"></td>
								
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>Sub Total</strong></div></td>
								<td><div class="col-sm-12"><strong>
								<?php
								
								echo $fmt->format($edit_order['total']);

								?>
								</strong></div></td>
							</tr>
							
                                                        <tr>
								<td></td>
								<td></td>
								<td></td>
								<!--<td><div class="col-sm-12"><strong>Discount</strong></div></td>
								<td><div class="col-sm-12">
                                                                        <?php if($edit_order['discount'] > 0){ ?>
                                                                        <div class="visible_discount">
                                                                        <strong><?php 
								$dis_val = $edit_order['discount'];
                                                                echo '- '. number_format($dis_val , 2); ?> </strong><small><a class="show_discount_field" href="javascript:void(0)">Edit</a></small>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="input_discount_field" <?php if($edit_order['discount'] == 0){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
                                                                        <div class="col-sm-6">                                                                            
                                                                        <input value="<?php echo $edit_order['discount']; ?>" class="class_discount" type="text" name="discount" id="order_discount" />
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="button" name="order_dis" class="order_dis" value="Update" />                                                                            
                                                                        </div>
                                                                        </div>
                                                                       </div></td>-->
							</tr>
                                                        <tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>Handling Charge</strong></div></td>
								<td><div class="col-sm-12">
                                                                        <?php if($edit_order['handling_charge'] > 0){ ?>
                                                                        <div class="visible_handling">
                                                                        <strong><?php 
								$dis_val3 = $edit_order['handling_charge'];
                                                                echo '+ '. number_format($dis_val3 , 2); ?> </strong><small><a class="show_handling_field" href="javascript:void(0)">Edit</a></small>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="input_handling_field" <?php if($edit_order['handling_charge'] == 0){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
                                                                        <div class="col-sm-6">                                                                            
                                                                        <input value="<?php echo $edit_order['handling_charge']; ?>" class="class_handling" type="text" name="handling" id="order_handling" />
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="button" name="order_dis" class="order_dis" value="Update" />                                                                            
                                                                        </div>
                                                                        </div>
                                                                       </div></td>
							</tr>
                                                        <tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>Transportation Charge</strong></div></td>
								<td><div class="col-sm-12">
                                                                        <?php if($edit_order['transport_charge'] > 0){ ?>
                                                                        <div class="visible_transport">
                                                                        <strong><?php 
								$dis_val2 = $edit_order['transport_charge'];
                                                                echo '+ '. number_format($dis_val2 , 2); ?> </strong><small><a class="show_transport_field" href="javascript:void(0)">Edit</a></small>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="input_transport_field" <?php if($edit_order['transport_charge'] == 0){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
                                                                        <div class="col-sm-6">                                                                            
                                                                        <input value="<?php echo $edit_order['transport_charge']; ?>" class="class_transport" type="text" name="transport" id="order_transport" />
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="button" name="order_dis" class="order_dis" value="Update" />
                                                                            <input type="hidden" name="order_id" value="<?php echo $edit_order['id']; ?>">
                                                                        </div>
                                                                        </div>
                                                                       </div></td>
							</tr>
                                                        <tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>Tax</strong></div></td>
								<td><div class="col-sm-12"><strong><?php 
								$total_tax = $edit_order['c_tax_amount'] + $edit_order['s_tax_amount'] +$edit_order['transport_charge_tax'] + $edit_order['handling_charge_tax']+$edit_order['transport_charge_stax']+$edit_order['handling_charge_stax'] ;
								echo $fmt->format($total_tax);
															
								?>
								
								</strong></div></td>
							</tr>
							<?php if($edit_order['display_tcs'] == 1){ ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>TCS Tax</strong></div></td>
                                <td><div class="col-sm-12">
								<strong>
								<span id="grand_total">
									<?php															
									
									echo $fmt->format($edit_order['tcs_amount']);

									?>
								</span></strong></div></td>
							</tr>
							<?php } ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><div class="col-sm-12"><strong>Grand Total</strong></div></td>
                                <td><div class="col-sm-12">
								<strong>
								<span id="grand_total">
									<?php					
									
									
									echo $fmt->format(round($edit_order['grand_total']));

									?>
								</span></strong></div></td>
							</tr>
						    
						</tbody>
                              	</table>
							</section>
							<div class="append_details">
							</div>
							
                                <center><input type="submit" name="update" value="Update Sales"/></center>		
                            
						<?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
   
   $('.show_discount_field').livequery("click",function(){
       $('.visible_discount').hide();
       $('.input_discount_field').show();
   });
   $('.show_handling_field').livequery("click",function(){
       $('.visible_handling').hide();
       $('.input_handling_field').show();
   });
   $('.show_transport_field').livequery("click",function(){
       $('.visible_transport').hide();
       $('.input_transport_field').show();
   });
   
   
   
   jQuery('.class_discount').keyup(function(event){ 
      var discount_amt = $(this).val();
      var total_amount = "<?php echo $edit_order['grand_total']; ?>";
      var total_amount_n = parseFloat(total_amount);
      var discount_amt_n = parseFloat(discount_amt);
      if(discount_amt_n > total_amount_n){
          alert("Discount amount is greater than order Amount");
          $('.class_discount').val(0);
          return false;
      }
      var final_amount = total_amount - discount_amt;
      
      $('#grand_total').html(final_amount.toFixed(2));
    
    });
    
    $(".order_dis").livequery("click",function(){
        
       var discount_amt = parseFloat($('.class_discount').val());
       var total_amount = "<?php echo $edit_order['total_with_tax']; ?>";
       var total_amount_n = parseFloat(total_amount);
       var discount_amt_n = parseFloat(discount_amt);
        if(discount_amt_n > total_amount_n){
          alert("Discount amount is greater than order Amount");
          $('.class_discount').val(0);
          return false;
      }
       /*if(discount_amt_n == 0){
           alert("please enter the order discount amount");
           return false;
       }*/
       if(confirm('Are you Sure to Update?')){
        $('#add_discount').submit();
       }
       
        
    });
	
	function calculatetotal(){
		var total = 0;
		for(var i=1;i<=20;i++){
			var selector = '#total_price'+i;
			if($(selector).val() != "" && $(selector).val() > 0){
				
				total = parseFloat(total) + parseFloat($(selector).val());
			}
		}
		$('.total_with_out_tax > span').html(total.toFixed(2));
		//alert(total);
	}
	
	$('.reset_product').livequery("click",function(){
		//alert($(this).data('loopid'));
		var loop_id = $(this).data('loopid');
		 if(confirm("Are you Sure you want to clear this row ?")){
			var item_selector = '#product_list'+loop_id;
			var product_qty = "#product_qty"+loop_id;
			var unit_price = "#unit_price"+loop_id;
			var total_price = "#total_price"+loop_id;
			$(item_selector).val("");
			$(item_selector).select2("destroy").select2();
			$(product_qty).val('');
			$(unit_price).val('');
			$(total_price).val('');
			calculatetotal();
			
		}
	});
	
	$('.qty-change').livequery("change",function(){
		var loop_id = $(this).data('loopid');
		var qty = $(this).val();
		
		var product_selector = "#product_list"+loop_id;
		var product_qty = "#product_qty"+loop_id;
		var unit_price = "#unit_price"+loop_id;
		var total_price = "#total_price"+loop_id;
		if($(product_selector).val() == ''){
			alert('Please select the Product');
			$(this).val('');			
			$(product_selector).select2('open');
			return false;
		}else{
			if(qty < 1){
			alert("Quantity should be greater than 0");
			getproductdetail(product_selector,loop_id);
			
			return false;
		}
			var pid = $(product_selector).val();
			getproductdetail(pid,qty,loop_id);
			
			
			
		}
	});
	
	function getproductdetail(pid,qty,loop_id){
		
		$(".loader").show();			
			var url = base_url + "admin/orders/getproduct"
				$.ajax({
					type: "POST",
					url: url,
					data: {'pid': pid},
					success: function (result) {
						$(".loader").hide();
						var obj = $.parseJSON(result);	
						var total_price = qty * obj.price;
						unit_price_selector = '#unit_price'+loop_id;
						total_price_selector = '#total_price'+loop_id;
						
						$(unit_price_selector).val(obj.price);
						$(total_price_selector).val(total_price);
						calculatetotal();
						
					}
				})
	}
	
	$('.product-change').livequery("change",function(){
		
		var loop_id = $(this).data('loopid');
		
		if($(this).val() != ''){
			
			$(".loader").show();			
			var url = base_url + "admin/orders/getproduct"
				$.ajax({
					type: "POST",
					url: url,
					data: {'pid': $(this).val()},
					success: function (result) {
						$(".loader").hide();
						var obj = $.parseJSON(result);	
						quantity_selector = '#product_qty'+loop_id;
						unit_price_selector = '#unit_price'+loop_id;
						total_price_selector = '#total_price'+loop_id;
						product_name_selector = '#product_name'+loop_id;
						$(quantity_selector).val(1);
						$(unit_price_selector).val(obj.price);
						$(total_price_selector).val(obj.price);
						$(product_name_selector).val(obj.name);
						calculatetotal();
						
					}
				})
		}
	});
	
	$('#user_address').livequery("change",function(){
		
		if($(this).val() != ''){
			$(".loader").show();			
			var url = base_url + "admin/orders/getuseraddress"
				$.ajax({
					type: "POST",
					url: url,
					data: {'id': $(this).val()},
					success: function (result) {
						var obj = $.parseJSON(result);			
						
						if(obj.phone_no){
							
							
							$('#store_name').val(obj.store_name);
							$('#last_name').val(obj.name);
							$('#phone_no').val(obj.phone_no);
							$('#address_line1').val(obj.address_line1);
							$('#address_line2').val(obj.address_line2);
							$('#address_line3').val(obj.address_line3);
							$('#address_line4').val(obj.address_line4);
							$('#gstin').val(obj.gstin);
						}
						
						$(".loader").hide();
						
					}
				});
				$(".loader").hide();
		}else{
			$('#address_line1').val('');
			$('#address_line2').val('');
			$('#address_line3').val('');
			$('#address_line4').val('');
			
		}
		
	});
	
	$('#user_list').livequery("change",function(){
		if($(this).val() != ''){
			$(".loader").show();			
			var url = base_url + "admin/orders/getaddress"
				$.ajax({
					type: "POST",
					url: url,
					data: {'user_id': $(this).val()},
					success: function (result) {
						var obj = $.parseJSON(result);
						
						
						//alert(obj.store_details.store_name);
						$('#user_address').html('');
						
						var add_list = obj.address_list;
						add_list.forEach(function(address){		
							$('#user_address').append('<option value="'+ address.id +'">'+ address.value +'</option>');
							
						});
						$("#user_address").select2("destroy").select2();
						
						
						
						if(add_list.length > 1){
							
							$('#user_address').val(obj.address_list[1].id);
							$('#user_address').select2().trigger('change');
							$('#store_name').val(obj.store_details.store_name);
							$('#last_name').val(obj.store_details.name);
							$('#phone_no').val(obj.store_details.phone_no);
							$('#address_line1').val(obj.address_list[1].address_line1);
							$('#address_line2').val(obj.address_list[1].address_line2);
							$('#address_line3').val(obj.address_list[1].address_line3);
							$('#address_line4').val(obj.address_list[1].address_line4);
							$('#gstin').val(obj.store_details.gstin);
						}else{
						
						   $('#store_name').val(obj.store_details.store_name);
							$('#last_name').val(obj.store_details.name);
							$('#phone_no').val(obj.store_details.phone_no);
							$('#gstin').val(obj.store_details.gstin);
							$('#address_line1').val('');
							$('#address_line2').val('');
							$('#address_line3').val('');
							$('#address_line4').val('');
						}
						
						$(".loader").hide();
						
					}
				});
				$(".loader").hide();
		}
	});
	$('.add_order_submit').livequery("click",function(){
		
		$('#add_order').submit();
	});
});
</script>
 <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

