
		<section class="login-blocks col-md-12 col-sm-10 col-xs-10 centered">
			<!--<a class="popup-close close-btn" title="Close"></a>-->
			<div class="login-left col-md-6 col-sm-12">
				<img src="<?php echo base_url();?>assets/site/images/login-left-img.png" title="Target USMLE" />
				<h1 class="logo"><a href="index.php" title="Target USMLE"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt=""></a></h1>
			</div>
			<div class="login-right col-md-6 col-sm-12">	
			
				<div class="account-creation">
					<h2>Reset Password</h2>
					<p>Please refer your registered mail id to get the link to reset your password.</p>				
					
					<?php  $attributes = array('class' => 'normal popuplogin','id' => 'login_form');				
					echo form_open('', $attributes, array('login'=>true)); ?>
						<div class="input text new_pass password">
							<?php echo form_password('new_password', (!isset($_POST['new_password'])?"":$_POST['new_password']) ,'placeholder="New Password" id="new_password"'); ?>
							<span class="password-icon input-icon"></span>
						</div>
						<div class="input text confirm_pass password">
							<?php echo form_password('confirm_password', (!isset($_POST['confirm_password'])?"":$_POST['confirm_password']) ,'placeholder="Confirm Password" id="confirm_password"'); ?>
							<span class="password-icon input-icon"></span>
						</div>
						<div class="input submit">
							<input type="button" onclick="valid_reset()" id="submit"  title="Submit" value="Submit" name="submit">
						</div>
					<?php echo form_close();  ?>
				</div>
				
			</div>
		</section>
		
		<script>
		function valid_reset(){
			$('.login-error').remove();
			$('.error-msg').remove(); 
			var new_pass = $("#new_password").val();
			var confirm_pass = $("#confirm_password").val();
			var ref_id = $("#fancy_popup_ref_id").val();
			$(".login-error").remove();
			$(".green").remove();
			if(new_pass=='' && confirm_pass==''){
				$(".new_pass").append("<span class='login-error'>Please enter the New Password.</span>");
				$(".confirm_pass").append("<span class='login-error'>Please enter the Confirm Password.</span>");
			}
			else if(new_pass=='')
			{
				$(".new_pass").append("<span class='login-error'>Please enter the New Password.</span>");
				
			}
			else if(confirm_pass=='')
				{
					$(".confirm_pass").append("<span class='login-error'>Please enter the Confirm Password.</span>");
				}
			else if(new_pass != confirm_pass){
				$(".confirm_pass").append("<span class='login-error'>New Password does not match with Confirm Password.</span>");
			}
			else if(new_pass.length < 6){
				$(".new_pass").append("<span class='login-error'>Password should be greater than or equal to 6 characters.</span>");
			}
			
			else
			{
			var url = base_url + "action_reset_password";
			$.ajax({
				type: "POST",
				url: url,
				cache: false,
				data:{new_password:new_pass,confirm_password:confirm_pass,id:ref_id},
				DataType:"JSON",
				success: function(result){
					if(result != ''){
						 var obj = $.parseJSON(result);
						 var valid_user = obj.valid_user;
						 var reset_pass = obj.reset;
						 
						
						 
						 if(valid_user == 0){
							 $.each(obj.message,function(key, value){
							var field = key;
							var selector = '#'+field+'-error';
							
							if($(selector).length == 0){
								
							
							var span = "<span id='"+field+"-error' class='error-msg custom'>"+value+"</span>";
							
							$("[name='"+field+"']").after(span);
							
							}
		
						});
						 } else{
							if(reset_pass == 1){
								if(!$(".green").is(":visible")){
									$(".new_pass").before("<span class='green'>Password changed successfully.</span>");					}
									$(".green").css("color", "green");
									$(".green").css("text-align", "center");
									$('#submit').prop('disabled', true);
									$('#new_password-error').hide();
									$('#confirm_password-error').hide();
									setTimeout(function(){
										$(".login-btn").attr("href",base_url+"login");
										$(".login-btn").trigger("click");
									},2000);
							 }
							 else{
								$(".new_pass").before("<span class='login-error'>Password reset not successfull.</span>");
							 }
						 }
					}
				}
			});
			}
			return false;
		}
	</script>