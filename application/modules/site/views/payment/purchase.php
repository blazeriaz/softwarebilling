<div class="payment-redirect"> 
	<p>Please Wait while we redirect you to payment gateway do not press refresh</p>
	<img src="<?php echo base_url('assets/images/targetusm.gif'); ?>" title="payment" Alt="payment" />
	

<?php
	if(!isset($timeslot_id)){
		$timeslot_id = 'NIL';
	}
	if(!isset($ts_date_time)){
		$ts_date_time = 'NIL';
	}

	if(!isset($mock_id)){
		$mock_id = 'NIL';
	}

	/* Format: user_id --- timeslot_id --- selected_date_time --- live_mock_exam_id */
	if($user_details['user_id'] == 0){
		$name = $this->session->userdata("webinar_name");
		$email = $this->session->userdata("webinar_email");
		$skype = $this->session->userdata("webinar_skype");
	$custom = $user_details['user_id'].'---'.$name.'---'.$email.'---'.$skype;
	}else{
	$custom = $user_details['user_id'].'---'.$timeslot_id.'---'.$ts_date_time.'---'.$mock_id;
	}
?>

<form id="target-payment" action='<?php echo $paypal_url; ?>' method='post' name='form'>
<input type='hidden' name='business' value='<?php echo $paypal_id; ?>'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='item_name' value='<?php echo $product['content_one'];?>'>
<input type='hidden' name='item_number' value='<?php echo $product['id'];?>'>
<input type='hidden' name='amount' value='<?php echo (isset($product['special_price']) && $product['special_price']) ?$product['special_price']:$product['price'];?>'>
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='currency_code' value='USD'>
<input type='hidden' name='custom' value='<?php echo $custom; ?>'>

<input type='hidden' name='cancel_return' value="<?php echo base_url('payment/cancel'); ?>?user_id=<?php echo $custom; ?>&pid=<?php echo $product['id']; ?>&title=<?php echo urlencode($product['content_one']); ?>&price=<?php echo $product['price'];?>&currency=USD">
<input type='hidden' name='return' value='<?php echo base_url('payment/process_payment'); ?>'>
<input type='hidden' name='notify_url' value='<?php echo base_url('payment/ipin_process_payment'); ?>'>
<input type='hidden' name='rm' value='2'>
<input type="image" style="display:none" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">
</form> 
<script type="text/javascript">
setTimeout(function(){ document.getElementById('target-payment').submit(); }, 1000);

</script>
