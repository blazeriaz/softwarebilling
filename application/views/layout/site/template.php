<?php
	$meta_keywords = get_site_settings('meta.keywords','value');
	$meta_description_config = get_site_settings('meta.description','value');
?>
<!doctype html>
<html lang="en">
 <head>
  <title><?php  if(isset($page_tab_title)){ echo $page_tab_title.' -'.SITE_NAME;}else{ echo SITE_NAME; } ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta property="og:image" content="<?php echo isset($meta_image) ? $meta_image : SITE_NAME; ?>" />
  <meta name="format-detection" content="telephone=no">
  <meta property="og:title" content="<?php echo isset($meta_title) ? $meta_title : SITE_NAME; ?>" />
  <meta property="og:type" content='article' />
  <meta property="og:url" content="<?php echo isset($meta_url) ? $meta_url : base_url(); ?> " />
  <meta name="Keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : $this->config->item('meta_keywords') ; ?>">
  <meta name="Description" content="<?php echo isset($meta_description) ? $meta_description : $meta_description_config ; ?>">
  <meta property="og:description" content="<?php echo isset($meta_description) ? $meta_description : $meta_description_config ; ?>" />
  <meta property="og:image" content="<?php echo isset($meta_image) ? $meta_image : SITE_NAME; ?>" />
 <?php $this->load->view('layout/site/common-header');  ?> 
 </head>
 <body>
  <?php $this->load->view('layout/site/header');   ?>
  <div class="inner-page-haeder">
	<?php $this->load->view('layout/site/menu'); ?>
  </div>
	<?php  $this->load->view('layout/site/main_content');  ?>
 	<?php $this->load->view('layout/site/footer');  ?> 
 
  
 </body>
</html>
