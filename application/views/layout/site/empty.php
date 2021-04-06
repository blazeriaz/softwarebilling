<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta name="format-detection" content="telephone=no">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/style.css">
 
 </head>
 <body>
	<?php  $this->load->view('layout/site/main_content');  ?>
 </body>
</html>
