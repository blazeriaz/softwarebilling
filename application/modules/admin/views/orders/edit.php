 <!-- Main Content -->
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
								<a href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/orders/index" title="Back">Back</a>
							</div>
							
                                <div  class="pull-right  add_order_submit">
                                    <button type="button" class="btn btn-default" title="Save">Save</button>
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'add_order');				
							echo form_open_multipart('', $attributes); ?>
							

							
							<div class="form-group">
                            	<?php echo form_label('Store Name <span class="required">*</span>','store_name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('store_name',(isset($_POST['store_name'])?$_POST['store_name']:(isset($edit_order['store_name'])?$edit_order['store_name']:'')),'placeholder= "Store Name" class="form-control required" id="store_name"');
                   					if(form_error('store_name')) echo form_label(form_error('store_name'), 'name', array("id"=>"store_name-error" , "class"=>"error")); ?>
                                </div>
								
								<?php echo form_label('Name <span class="required">*</span>','name',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('last_name',(isset($_POST['last_name'])?$_POST['last_name']:(isset($edit_order['customer_name'])?$edit_order['customer_name']:'')),'placeholder= "Customer Name" class="form-control required" id="last_name"');
                   					if(form_error('last_name')) echo form_label(form_error('last_name'), 'name', array("id"=>"last_name-error" , "class"=>"error")); ?>
                                </div>
							</div>
							
							
							
							<div class="form-group">
							
							<?php echo form_label('Address <span class="required">*</span>','address_line1',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_textarea('address_line1',(isset($_POST['address_line1'])?$_POST['address_line1']:(isset($edit_order['address_line1'])?$edit_order['address_line1']:'')),'placeholder= "Address Line 1" class="form-control required" style="height:100px;" id="address_line1"');
                   					if(form_error('address_line1')) echo form_label(form_error('address_line1'), 'name', array("id"=>"address_line1-error" , "class"=>"error")); ?>
                                </div>
								
								<?php echo form_label('Delivery At','delivery_at',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_textarea('delivery_at',(isset($_POST['delivery_at'])?$_POST['delivery_at']:(isset($edit_order['delivery_at'])?$edit_order['delivery_at']:'')),'placeholder= "Address Line 1" class="form-control required" style="height:100px;" id="address_line1"');
                   					if(form_error('delivery_at')) echo form_label(form_error('delivery_at'), 'name', array("id"=>"delivery_at-error" , "class"=>"error")); ?>
                                </div>
								
								
                            	
								
								
							</div>
							
							
							
							<div class="form-group">
                            	<?php echo form_label('Contact Number','phone_no',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('phone_no',(isset($_POST['phone_no'])?$_POST['phone_no']:(isset($edit_order['phone_no'])?$edit_order['phone_no']:'')),'placeholder= "Contact Number" class="form-control required" id="phone_no"');
                   					if(form_error('phone_no')) echo form_label(form_error('phone_no'), 'name', array("id"=>"phone_no-error" , "class"=>"error")); ?>
                                </div>
								
								<?php echo form_label('GSTIN ','gstin',array('class'=>'col-sm-2 control-label')); ?>
                                <div class="col-sm-4">
									<?php echo form_input('gstin',(isset($_POST['gstin'])?$_POST['gstin']:(isset($edit_order['gstin'])?$edit_order['gstin']:'')),'placeholder= "GSTIN" class="form-control" id="gstin"');
                   					if(form_error('gstin')) echo form_label(form_error('gstin'), 'name', array("id"=>"gstin-error" , "class"=>"error")); ?>
                                </div>
							</div>
							
							
							
							
							
							<div class="card-header">
								<div class="card-title">
									<div class="title">Select Product</div>
								</div>
								
								<?php 
								if(form_error('product')) echo form_label(form_error('product'), 'name', array("id"=>"product_name".$i."-error" , "class"=>"error")); ?> 
							
							</div>
							
							<section class="product-section">
							<table class="datatable table table-striped" width="100%" cellspacing="0">
                          <thead>
                              <tr>								
                              	<th>Product Name</th>
								<th >options</th>
								<th>HSN <br> Code</th>  
                               <th>Weight <br>in Kg</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>                               
                                <th class="text-center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
						  <?php
							//pr($edit_orderitems);
							?>
						  <?php for($i=0;$i < 20;$i++){ ?>
							<tr class="odd">
										<td style="width:30%">
										<div class="col-sm-12">
										
									
									<?php 
									$js = 'id="product_list'.$i.'" data-loopid="'.$i.'" class="form-control select2 product-change"';
									$product_id = isset($edit_orderitems[$i]['product_id'])?$edit_orderitems[$i]['product_id']:'';
									echo form_dropdown('product['.$i.'][name]', $products, isset($_POST['product['.$i.'][name]'])?$_POST['product['.$i.'][name]']:$product_id,$js); 
                   					if(form_error('product['.$i.'][name]')) echo form_label(form_error('product['.$i.'][name]'), 'user_id', array("id"=>"user_id".$i."-error" , "class"=>"error")); ?>
									
									<div style="display:none">
									<?php
									$product_name = isset($edit_orderitems[$i]['product_name'])?$edit_orderitems[$i]['product_name']:'';
									$product_name_value = set_value('product['.$i.'][product_name]') == false ? $product_name : set_value('product['.$i.'][product_name]');									
									echo form_input('product['.$i.'][product_name]',$product_name,'placeholder= "" class="form-control" id="product_name'.$i.'" readonly'); 
									
									$item_id = isset($edit_orderitems[$i]['id'])?$edit_orderitems[$i]['id']:'';
									echo form_hidden('product['.$i.'][item_id]',$item_id,'placeholder= "" class="form-control" id="item_id'.$i.'"'); 
												 ?> 
												 </div>
									
									</div>
										</td>
										<td style="width:15%">
										<div class="col-sm-12">
										<?php
										$options = isset($edit_orderitems[$i]['product_options'])?$edit_orderitems[$i]['product_options']:'';
												$product_addition = set_value('product['.$i.'][product_addition]') == false ? $options : set_value('product['.$i.'][product_addition]');
										echo form_input('product['.$i.'][product_addition]',$product_addition,'placeholder= "" class="form-control" id="product_addition'.$i.'"'); 
												 ?> 
												 </div>
												 </td>
                                           <td style="width:10%">
											<div class="col-sm-16">
												<?php
												$hsn = isset($edit_orderitems[$i]['hsn_code'])?$edit_orderitems[$i]['hsn_code']:'';
												$hsn_code = set_value('product['.$i.'][hsn_code]') == false ? $hsn : set_value('product['.$i.'][hsn_code]');
												echo form_input('product['.$i.'][hsn_code]',$hsn_code,'placeholder= "" class="form-control" id="hsn_code'.$i.'" readonly'); 
												if(form_error('product['.$i.'][hsn_code]')) echo form_label(form_error('product['.$i.'][hsn_code]'), 'name', array("id"=>"hsn_code".$i."-error" , "class"=>"error")); ?> 
											</div> 
										</td>
										<td style="width:10%">
											<div class="col-sm-16">
											
											
												<?php
												$data_qty = array(
												  'name' => 'product['.$i.'][qty]',
												  'placeholder' => "Qty",
												  'id'   => 'product_qty'.$i,
												  'class'=> 'form-control qty-change',
												  'data-loopid' => $i,
												  'type' => 'text'
												);
												
												
												$qty = isset($edit_orderitems[$i]['qty'])?$edit_orderitems[$i]['qty']:'';
												$quantity = set_value('product['.$i.'][qty]') == false ? $qty : set_value('product['.$i.'][qty]');
												
												
												
												echo form_input($data_qty,$quantity); 
												
												if(form_error('product['.$i.'][qty]')) echo form_label(form_error('product['.$i.'][qty]'), 'name', array("id"=>"product_qty".$i."-error" , "class"=>"error")); ?> 
											</div> 
										</td>
										<td style="width:10%"><div class="col-sm-12">
												<?php
												$unit_price = isset($edit_orderitems[$i]['unit_price'])?$edit_orderitems[$i]['unit_price']:'';
												$unit_price_value = set_value('product['.$i.'][unit_price]') == false ? $unit_price : set_value('product['.$i.'][unit_price]');
												echo form_input('product['.$i.'][unit_price]',$unit_price_value,'placeholder= "0.00" class="form-control unit-price" data-loopid="'.$i.'" id="unit_price'.$i.'" '); 
												if(form_error('product['.$i.'][unit_price]')) echo form_label(form_error('product['.$i.'][unit_price]'), 'name', array("id"=>"unit_price".$i."-error" , "class"=>"error")); ?> 
											</div> </td>
										<td style="width:15%"><div class="col-sm-16">
												<?php 
												$total_price = isset($edit_orderitems[$i]['total_price'])?$edit_orderitems[$i]['total_price']:'';
												$total_price_value = set_value('product['.$i.'][total_price]') == false ? $total_price : set_value('product['.$i.'][total_price]');
												echo form_input('product['.$i.'][total_price]',$total_price_value,'placeholder= "0.00" class="form-control" id="total_price'.$i.'" readonly'); 
												if(form_error('product['.$i.'][total_price]')) echo form_label(form_error('product['.$i.'][total_price]'), 'name', array("id"=>"total_price".$i."-error" , "class"=>"error")); ?> 
											</div> </td>									
										
										<td ><a data-loopid ="<?php echo $i; ?>" data-itemid="<?php echo $item_id; ?>" class="reset_product" id="remove_product<?php echo $i; ?>" href="javascript:void(0)" class=""><span class="icon glyphicon glyphicon glyphicon-remove"></span></a></td>		
										</tr>
						  <?php } ?>		

						    
						</tbody>
                              	</table>
							</section>
							
                            
							
							<div class="append_details">
							</div>
							
							
                            <div class="form-group">
                                <div  class="col-sm-offset-2 col-sm-10 add_order_submit">
                                    <button type="button" class="btn btn-default" title="Save">Save</button>
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
$(document).ready(function(){
	
	function calculatetotal(){
		var tax_percentage = <?php echo $total_tax_percentage; ?>;
		var total = 0;
		for(var i=0;i<20;i++){
			var selector = '#total_price'+i;
			if($(selector).val() != "" && $(selector).val() > 0){
				
				total = parseFloat(total) + parseFloat($(selector).val());
			}
		}
		var tax_per = ((total * tax_percentage)/100);
		$('.total_with_out_tax > span').html(total.toFixed(2));
		$('.tax_amount > span').html(tax_per.toFixed(2));
		var grand_total = total + tax_per;
		$('.grand_total > span').html(grand_total.toFixed(2));
		
		//alert(total);
	}
	
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
			//alert("Quantity should be greater than 0");
			$(unit_price).val(0);
			$(total_price).val(0);
			//getproductdetail(product_selector,loop_id);
			
			return false;
		}
			var pid = $(product_selector).val();
			
			var unit_price_val = $(unit_price).val();
			
			var total_price_val = unit_price_val * qty;
			
			$(total_price).val(total_price_val);
			
			calculatetotal();
			//getproductdetail(pid,qty,loop_id);
		}
	});
	
	$('.reset_product').livequery("click",function(){
		//alert($(this).data('loopid'));
		var loop_id = $(this).data('loopid');
		var itemid = $(this).data('itemid');
		 if(confirm("Are you Sure you want to clear this row ?")){
			 
			 $(".loader").show();			
			var url = base_url + "admin/orders/deleteorderItem"
				$.ajax({
					type: "POST",
					url: url,
					data: {'item_id': itemid,'order_id':<?php echo $edit_order['id']; ?>},
					success: function (result) {
						location.reload();
						$(".loader").hide();	
					}
				});
			 
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
	
		$('.unit-price').livequery("keyup",function(){
		
		var loop_id = $(this).data('loopid');
		var item_selector = '#product_list'+loop_id;
		var product_qty = "#product_qty"+loop_id;		
		var total_price = "#total_price"+loop_id;
		var unit_price = $(this).val();
		
		var total_price_val = unit_price * $(product_qty).val();
		
		$(total_price).val(total_price_val);
		
		calculatetotal();
		
		
	});
	
	$('.qty-change').livequery("keyup",function(){
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
			//alert("Quantity should be greater than 0");
			$(unit_price).val(0);
			$(total_price).val(0);
			//getproductdetail(product_selector,loop_id);
			
			return false;
		}
			var pid = $(product_selector).val();
			
			var unit_price_val = $(unit_price).val();
			
			var total_price_val = unit_price_val * qty;
			
			$(total_price).val(total_price_val);
			
			calculatetotal();
			//getproductdetail(pid,qty,loop_id);
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
						var hsn_code = obj.hsn_code;
						var unit_price_selector = '#unit_price'+loop_id;
						var total_price_selector = '#total_price'+loop_id;
						var hsn_code_selector = '#hsn_code'+loop_id;
						
						$(unit_price_selector).val(obj.price);
						$(total_price_selector).val(total_price);
						$(hsn_code_selector).val(hsn_code);
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
						var hsn_code_selector = '#hsn_code'+loop_id;
						
						$(quantity_selector).val(1);
						$(unit_price_selector).val(obj.price);
						$(total_price_selector).val(obj.price);
						$(product_name_selector).val(obj.name);
						$(hsn_code_selector).val(obj.hsn_code);
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

