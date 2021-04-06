<section class="login-blocks col-md-12 col-sm-10 col-xs-10 centered">
	<!--<a class="popup-close close-btn" title="Close"></a>-->
	<div class="login-left col-md-6 col-sm-12">
		<img src="<?php echo base_url();?>assets/site/images/login-left-img.png" title="Target USMLE" />
		<h1 class="logo"><a href="index.php" title="Target USMLE"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt=""></a></h1>
	</div>
	<div class="login-right col-md-6 col-sm-12">				
		<h2>Login<?php //echo $this->session->flashdata('flash_failure_message'); ?></h2>
		
		<?php if($this->session->flashdata('flash_success_message')){ ?>
			<div class="form-sucess"><p><?php echo $this->session->flashdata('flash_success_message'); ?></p></div>
		<?php } ?>
		<?php if($this->session->flashdata('flash_failure_message')){ ?>
			<div class="form-error"><p><?php echo $this->session->flashdata('flash_failure_message'); ?></p></div>
		<?php } ?>
		
		
		<?php  
			$attributes = array('class' => 'normal popuplogin','id' => 'login-form');
			echo form_open('', $attributes, array('login'=>true)); 
		?>
			<div id="error_msg"></div>
			<div class="input name">
				<?php echo form_input('email', '' ,'placeholder="Email ID" id="email"'); ?>
				<!--<span>The field is required.</span>-->
			</div>
			<div class="input password">
				<?php echo form_password('password', '' ,'placeholder="Password" id="password"'); ?>
				<!--<span>The field is required.</span>-->
			</div>
			<p class="forgot"><a class="login-btn fancybox.ajax" href="<?php echo base_url();?>login/forgotpassword" title="Forgot Your Password?">Forgot Your Password?</a></p>
			
			<input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo (isset($_GET['redirect_url']) && $_GET['redirect_url'] ) ? $_GET['redirect_url'] : '' ;?>" />
			<div class="input submit">
				<?php echo form_submit('Signin', 'Sign in', 'title="Sign in" class="ajax-login" '); ?>
			</div>
			<p class="craccount"><a href="<?php echo base_url();?>register" title="Create an account">Create an account</a></p>
		<?php echo form_close();  ?>
	</div>
</section>


<script>
$(document).ready(function(){ 
	$("#error_msg").css("text-align", "center");
	//$("#error_msg").css("padding-bottom", "15px");
	$("#login-form").on('submit',function(e){ 
			e.preventDefault()
		 	var url=$("#login-form").attr('action');
		 	var $this=$(this);
		 	$.ajax({
		        type: "POST",
		        url: url,
		        datatype:"json",
		        data: $("#login-form").serialize(), 
		        success:function(data)
		        {
		        	var data=jQuery.parseJSON(data);
		        	$("#login-form input").each(function() {
						$(this).next('.login-error').remove();
					});
		        	$(this).next('.login-error').remove();
		        	$("#error_msg").find('span.login-error').remove();
		        	if(data.status=="error") {
		        		$.each(data.errorfields,function(key, value){
		        			var error="<span style='color:red;' class='login-error'>"+value.error+"</span>";
		        			$this.find("[name="+value.field+"]").after(error);
		        		});
		        	}else if(data.status=="error-login") {
		        		var error="<span style='color:red;' class='login-error'>"+data.msg+"</span>";
		        		$("#error_msg").append(error);
		        		$("#error_msg").find('span.login-error').css('position','relative');
		        	}else{	
						/*if(global_path!=""){
							window.open(base_url+global_path,'_self');
						}else{
							window.open(base_url+data.url,'_self');
						}*/
						window.open(base_url+data.url,'_self');
		        	}
		        }
		    });
		    return false;
		});
		
		if($('.fancy_popup_failure_message').length && ($('.fancy_popup_failure_message').val()!='')){
			$('#error_msg').append("<span style='color:red;' class='login-error'>"+$('.fancy_popup_failure_message').val()+"</span>");
			$('.fancy_popup_failure_message').val('');
		}

		if($('.fancy_popup_success_message').length && ($('.fancy_popup_success_message').val()!='')){
			$('#error_msg').append("<span style='color:green;' class='login-success'>"+$('.fancy_popup_success_message').val()+"</span>");
			$('.fancy_popup_success_message').val('');
		}
		
		//$(".popup-close.close-btn").livequery(function() {
			//$("#error_msg").find('span.login-error').remove();
		//});
		
	});
</script>
