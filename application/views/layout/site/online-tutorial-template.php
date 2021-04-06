<?php
	$meta_keywords = get_site_settings('meta.keywords','value');
	$meta_description = get_site_settings('meta.description','value');
?>
<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta charset="UTF-8">
  <meta name="Keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : $this->config->item('meta_keywords') ; ?>">
  <meta name="Description" content="<?php echo isset($meta_description) ? $meta_description : $this->config->item('meta_description') ; ?>">
 <?php $this->load->view('layout/site/common-header');  ?> 
 </head>
 <body>

  <?php $this->load->view('layout/site/header');  ?> 
		
		<div class="inner-page-haeder">
			<?php  $this->load->view('layout/site/menu');  ?> 
	    </div>

		<section class="onltour-banner-section">
			<?php  $this->load->view('site/online_tutorial/banner');  ?>
		</section>

		<section class="onltourstp">
			<?php  $this->load->view('site/online_tutorial/online_video');  ?>
		</section>

		<section id="booking_slot_section" class="online-exam-section3 coaching3 asses_prep_booking_div" style="display:none;">
			<div class="online-setlft3 col-md-6 col-sm-6 col-xs-12">
				<?php echo $assesement_preparation['content_four']; ?>
			</div>
				<?php $this->load->view('layout/site/booking_slot'); ?>			
		</section>

		<section class="onltorials" >
			<?php  $this->load->view('site/online_tutorial/online_step_list');  ?>
		</section>
	
	
  <?php $this->load->view('layout/site/footer');  ?> 

  	

<script type="text/javascript">
            
</script>
  
</body>
</html>
