<!doctype html>
<html lang="en">
 <head>
	<meta charset="UTF-8">
	<title>Target USMLE</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />

	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery.selectBox.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/fonts/fonts.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/css/videopopup.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/responsive.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/site/css/jquery.fancybox.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/owl.carousel.js"></script>
	<script src="<?php echo base_url();?>assets/site/js/jquery-ui.js"></script>
	<script src="<?php echo base_url();?>assets/site/js/videopopup.js"></script>
	<script src="<?php echo base_url();?>assets/site/js/jquery.selectBox.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/main.js"></script>
	
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jquery-ui1.css">
<link rel="stylesheet" href="css/jquery.selectBox.css">
<link rel="stylesheet" href="fonts/fonts.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/videopopup.css" media="screen" />
<link rel="stylesheet" href="css/responsive.css">


<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/videopopup.js"></script>
<script src="js/jquery.selectBox.js"></script>

<script type="text/javascript" src="js/main.js"></script>
	
</head>
	<body class="login-overlap">
	
		<section class="login-blocks">
			<a class="popup-close" title="Close"></a>
			<div class="login-left">
				<img src="<?php echo base_url();?>assets/site/images/login-left-img.png" title="Target USMLE" />
				<h1 class="logo"><a href="index.php" title="Target USMLE"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt=""></a></h1>
			</div>
			<div class="login-right">	
			
				<div class="account-creation">
					<h3>Reset Password</h3>
					<p>Please refer your registered <br />mail id to get the link to <br />reset your password.</p>
				</div>
				<div class="popup-login-section">
					<h2 class="popup-logo">Target USMLE</h2>
					<?php  $attributes = array('class' => 'normal popuplogin','id' => 'login_form');				
					echo form_open('', $attributes, array('login'=>true)); ?>
						<div class="input text new_pass">
							<?php echo form_password('new_password', (!isset($_POST['new_password'])?"":$_POST['new_password']) ,'placeholder="New Password" id="new_password"'); ?>
							<span class="password-icon input-icon"></span>
						</div>
						<div class="input text confirm_pass">
							<?php echo form_password('confirm_password', (!isset($_POST['confirm_password'])?"":$_POST['confirm_password']) ,'placeholder="Confirm Password" id="confirm_password"'); ?>
							<span class="password-icon input-icon"></span>
						</div>
						<div class="input submit">
							<input type="button" onclick="valid_reset()" id="submit" class="btn btn-primary click" title="Submit" value="Submit" name="submit">
						</div>
					<?php echo form_close();  ?>
				</div>
				
			</div>
		</section>
		<style>
			.login-blocks {
				margin: 50px auto 0;
			}
		</style>
		
	</body>
</html>
