<section class="cs-handbook-section1">
	<div class="container">				
		<div class="success-page col-md-12 col-sm-12 col-xs-12">
			<h6>Success</h6>
			<?php if($this->session->flashdata('guest_webinar')){ ?>
				<p>Your Order has been Completed Successfully Please check your Mail for Webinar Details</p>					
			<?php }else{ ?>
				<p>Your Order has been Completed Successfully click here<a href="<?php echo base_url('my-purchase'); ?>">#<?php echo $order_id; ?></a> to view the order</p>					
			<?php } ?>
		</div>
	</div>
</section>	