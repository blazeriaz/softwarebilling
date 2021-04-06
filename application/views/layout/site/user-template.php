<?php
	$meta_keywords = get_site_settings('meta.keywords','value');
	$meta_description = get_site_settings('meta.description','value');
?>
<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?></title>
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
  
  <section class="my_acc_section" >
			<div class="wrapper">
				<h1 class="main-page-title"><?php echo $page_heading; ?></h1>
				<div class="row">
				<div class="col-md-12 col-sm-11 col-xs-11 centered">
				
					<?php $this->load->view('layout/site/side_menu');   ?>
					
					<?php  $this->load->view('layout/site/main_content');  ?>
				</div>
			</div>
		</div>
	</section>
	
	
 	<?php $this->load->view('layout/site/footer');  ?> 
 
  
 </body>
</html>
