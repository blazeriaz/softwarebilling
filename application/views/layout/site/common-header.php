<?php
include 'mobile_detect.php';
$detect = new Mobile_Detect();
$is_thank_you =false;
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no" />
<?php
if ($detect->isMobile() && !$detect->isTablet()) { ?>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta name="viewport" content="initial-scale = 1.0, user-scalable = no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<?php } ?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/reset.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery.selectBox.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/fonts/fonts.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/css/videopopup.css" media="screen" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery.fancybox.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/responsive.css">

<!-- Custom CSS -->
  <?php
  	if(isset($css)&&!empty($css)){
  		foreach($css as $css){
  			echo "<link rel='stylesheet' type='text/css' href='".base_url().$css."'>";
  		}
  	}
  ?>

<script type="text/javascript">
	var base_url = '<?php echo base_url();?>';
	var current_date = '<?php echo date("Y-m-d-H-i-s");?>';
	
</script>


<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/bootstrap.min.js"></script>

