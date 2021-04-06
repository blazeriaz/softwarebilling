<!-- My Purchases -->
<?php $date_format = $this->config->item('front_date_format'); ?>
<div class="col-md-8 col-sm-12 col-xs-12">
<div class="my_acc_content order-history-section">
	<h2 class="sub_page_title"><?php echo $page_sub_heading; ?></h2>
	<div class="content_inner col-md-12 col-sm-12 col-xs-12">
		<div class="order-history-blks">						
			<div class="top">
				<table>
					<thead>
						<tr>
							<th class="ord-1"><h3>Order ID</h3></th>
							<th class="ord-2"><h3>Order Date</h3></th>
							<th class="ord-3"><h3>Product Name</h3></th>
							<th class="ord-4"><h3>Amount</h3></th>
							<th class="ord-5"><h3>Start Date</h3></th>
							<th class="ord-6"><h3>Valid Upto</h3></th>
							<th class="ord-7"><h3>Status</h3></th>
						</tr>
					</thead>							
					<tbody>	
					<?php if(count($orders) > 0){ ?>
						<?php foreach($orders as $customer_order){ ?>
						<tr>
							<td><p><?php echo $customer_order['order_id']; ?></p></td>
							<td><p><?php echo date($date_format,strtotime($customer_order['created'])); ?></p></td>
							<td><p><?php if($customer_order['product_name'] !=""){ echo $customer_order['product_name']; }else{ echo 'N/A'; } ?></p></td>
							<td><p><?php echo '$'.$customer_order['amount']; ?></p></td>
							<td><p><?php echo date($date_format,strtotime($customer_order['created'])); ?></p></td>
							<td><p><?php echo ($customer_order['expiry_date'] && $customer_order['expiry_date']!="0000-00-00 00:00:00" && strtotime($customer_order['expiry_date']))?date($date_format,strtotime($customer_order['expiry_date'])):'N/A'; ?></p></td>
							<td><p><?php echo order_status_text($customer_order['status']);  ?></p></td>
						</tr>
					<?php } }else{ ?>
					<tr>
						<td colspan="7">
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<div class="left col-md-5 col-sm-12 col-xs-12 no-record">You have not Purchased any courses</div>
						</div>
						</td>
					</tr>
					<?php } ?>
						
					</tbody>										
				</table>															
			</div>	
		</div>
		
		<div class="pagination-blks">
			
			<?php if(count($orders) > 0){ ?>
			<?php echo $this->pagination->create_links(); ?> 
			<?php } ?>
			
		</div>
		
	</div>
  </div>
  </div>
<!-- My Purchases -->