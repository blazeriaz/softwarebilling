<?php
	$meta_keywords = get_site_settings('meta.keywords','value');
	$meta_description = get_site_settings('meta.description','value');
?>
<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?> - Home</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta name="format-detection" content="telephone=no">
  <meta name="Keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : $this->config->item('meta_keywords') ; ?>">
  <meta name="Description" content="<?php echo isset($meta_description) ? $meta_description : $this->config->item('meta_description') ; ?>">
 <?php $this->load->view('layout/site/common-header');  ?> 
 </head>
 <body>
  <?php $this->load->view('layout/site/header');   ?>
  <div class="inner-page-haeder">
	<?php $this->load->view('layout/site/menu'); ?>
  </div>
  
  <section class="step1-section">
			<div class="container">
				<h5><?php echo $step_name; ?></h5>
				<h1><span><?php echo $step_title; ?></span>
				
				<a target="_blank" href="<?php echo base_url('ebook/cs-handbook'); ?>" Title="CS Handbook">cs handbook</a></h1>
				
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- Left Section steps -->
					<?php $this->load->view('steps/side_menu');   ?>
					<!-- Main content -->
					<?php $this->load->view('layout/site/main_content');  ?>
					</div>
				</div>
			</div>
	</section>
	
	<?php
	if($this->uri->segment(2) == 'step6'){ 
		$this->load->view('steps/step_six_footer'); 
	}
	?>
	
	<?php $this->load->view('steps/bottom_content');  ?>
	 
 	<?php $this->load->view('layout/site/footer');  ?> 
 
  
 </body>
</html>
