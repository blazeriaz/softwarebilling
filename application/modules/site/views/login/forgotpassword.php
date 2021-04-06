<section class="login-blocks login_forgot col-md-12 col-sm-10 col-xs-10 centered">
	<!--<a class="popup-close close-btn" title="Close"></a>-->
	<div class="login-left col-md-6 col-sm-12">
		<img src="<?php echo base_url();?>assets/site/images/login-left-img.png" title="Target USMLE" />
		<h1 class="logo"><a href="index.php" title="Target USMLE"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt=""></a></h1>
	</div>
	<div class="login-right col-md-6 col-sm-12">				
		<h2>Forgot Password</h2>
		<?php  
			$attributes = array('class' => 'normal popup_forgot','id' => 'forgot_form');				
			echo form_open('login/actionforgotpassword', $attributes, array('login'=>true)); 
		?>
			<div id="error_msg"></div>
			<div class="input name">
				<?php echo form_input('email', '' ,'placeholder="Your Email ID" id="email"'); ?>
				<!--<span>The field is required.</span>-->
				<span class="email"></span>
			</div>
			<div class="input submit">
				<?php echo form_submit('Submit', 'Submit', 'title="Submit" class="ajax-login" '); ?>
			</div>					
		<?php echo form_close();  ?>
		<div><a href="<?php echo base_url('success_forgot'); ?>" class="success_forgot"></a></div>
	</div>	
</section>


<script>
$(document).ready(function(){ 

		$('#forgot_form').livequery('submit',function(){
			valid_forgot();
			return false;
		});
		function valid_forgot(){
			var email = $("#email").val();
			$(".login-error").remove();
			$(".green").remove();
			if(email=='')
			{
				$(".email").append("<span class='login-error'>Please enter the Email ID.</span>");
			}
			else
			{
				var url = base_url + "login/actionforgotpassword";
				 
				$.ajax({
					type: "POST",
					url: url + "?email=" +  email,
					cache: false,
					DataType:"JSON",
					success: function(result){
						if(result != ''){
							 var obj=$.parseJSON(result);
							 var valid_email = obj.valid_email;
							 var email_sent = obj.email_sent;
							 if(valid_email == 0){
								$(".email").append("<span class='login-error'>Email ID not registered with us. Please enter valid Email ID.</span>");
							 }
							 else{
								if(email_sent == 1){
											//window.open(base_url+'success_forgot','_self');
											$(".trigger-btn").attr("href",base_url+"success_forgot");
											$(".trigger-btn").trigger("click");
											/*$(".login-btn").attr("href",base_url+"success_forgot");
											$(".login-btn").trigger("click");
											$(".user-login").attr("href",base_url+"home/login");
											$(".register").attr("href",base_url+"home/register");*/
								 }
								 else{
									$(".email").append("<span class='login-error'>Email not successfully sent.</span>");
								 }
							 }
						}
					}
				});
			}
			return false;
		}
		
	});
</script>