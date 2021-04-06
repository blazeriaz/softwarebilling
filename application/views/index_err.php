<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta name="format-detection" content="telephone=no">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 <?php $this->load->view('layout/site/common-header');  ?> 
 </head>
 <body>
  <?php $this->load->view('layout/site/header');   ?>
  <div class="inner-page-haeder">
	<?php $this->load->view('layout/site/menu'); ?>
  </div>
	<?php  $this->load->view('layout/site/404');  ?>
 	<?php $this->load->view('layout/site/footer');  ?> 
 
  
 </body>
</html>
