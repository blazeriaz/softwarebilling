
 <div class="col-md-8 col-sm-12 col-xs-12">
  <div class="my_acc_content">
  <?php if($this->session->flashdata('flash_message')){ ?>
	<div class="form-sucess"><p><?php echo $this->session->flashdata('flash_message'); ?></p></div>
  <?php } ?>
	<h2 class="sub_page_title"><?php echo $page_sub_heading; ?></h2>
	<div class="content_inner col-md-12 col-sm-12 col-xs-12">
	<?php
		$attributes = array('class' => 'change_password','id' => 'my_profile','method'=>'post');				
			echo form_open_multipart('my-profile', $attributes); ?>
			<div class="form-row">
			
				<div class="form-col colspan2">                            
					<?php
					if(set_value('first_name')){ $first_name = set_value('first_name'); }else{ $first_name = $user_data['first_name']; }
					
					echo form_input('first_name',$first_name,'placeholder= "First Name" class="" id="first_name"'); 
					?>
					<?php if(form_error('first_name')) echo form_label(form_error('first_name'), 'first_name', array("id"=>"first_name-error" , "class"=>"error")); ?>
				</div>
				
				<div class="form-col colspan2">
				<?php
				if(set_value('last_name')){ $last_name = set_value('last_name'); }else{ $last_name = $user_data['last_name']; }
				echo form_input('last_name',$last_name,'placeholder= "Last Name" class="alphaOnly" id="last_name"'); ?>
					<?php if(form_error('last_name')) echo form_label(form_error('last_name'), 'last_name', array("id"=>"last_name-error" , "class"=>"error")); ?>
				</div>							
			</div>
			<div class="form-row">
			<div class="form-col colspan2">
				
					<?php
					if(set_value('email_id')){ $email_id = set_value('email_id'); }else{ $email_id = $user_data['email_id']; }
					echo form_input('email_id1',$email_id,'placeholder= "example@gmail.com" class="form-control" id="email_id" disabled');  
					echo form_hidden('email_id',$email_id,'placeholder= "example@gmail.com" class="form-control" id="email_id" ');  ?>
					<?php if(form_error('email_id')) echo form_label(form_error('email_id'), 'email_id', array("id"=>"email_id-error" , "class"=>"error")); ?>
				</div>
				
			<div class="form-col colspan2">
				<?php
				if(set_value('skype_id')){ $skype_id = set_value('skype_id'); }else{ $skype_id = $user_data['skype_id']; }
				echo form_input('skype_id',$skype_id,'placeholder= "skype id" class="" id="skype_id"'); ?>
					<?php if(form_error('skype_id')) echo form_label(form_error('skype_id'), 'skype_id', array("id"=>"skype_id-error" , "class"=>"error")); ?>
			</div>
			</div>
			
			
			<div class="form-row halfrow">
				<div class="form-col colspan2 select">
					<?php 
					if(set_value('country')){ $country = set_value('country'); }else{ $country = $user_data['country']; }
					$js = 'id="country" class="form-select"';
					echo form_dropdown('country', $countries, $country, $js);
						?>
					<?php if(form_error('country')) echo form_label(form_error('country'), 'country',array("id"=>"country-error" , "class"=>"error")); ?>
					
					
				</div>  
				<div class="form-col colspan2">
					<?php
					if(set_value('city')){ $city = set_value('city'); }else{ $city = $cities[$user_data['city']]; }
					echo form_input('city',$city,'placeholder= "City" class="form-control" id="City"'); ?>
					
					<?php if(form_error('city')) echo form_label(form_error('city'), 'city',array("id"=>"city-error" , "class"=>"error")); ?>
				</div>
				
				<div class="form-col colspan2"> 
					<?php
					if(set_value('phone_no')){ $phone_no = set_value('phone_no'); }else{ $phone_no = $user_data['phone_no']; }
					echo form_input('phone_no',$phone_no,'placeholder= "Contact No" class="form-control phoneOnly" id="phone_no"'); ?>
					<?php if(form_error('phone_no')) echo form_label(form_error('phone_no'), 'phone_no', array("id"=>"phone_no-error" , "class"=>"error")); ?>
					
				</div>						  
										
			</div>
			<div class="form-row halfrow address-field">
				<div class="form-col colspan2">
					<?php
					if(set_value('address')){ $address = set_value('address'); }else{ $address = $user_data['address']; }
					echo form_textarea('address',$address,'class="" placeholder="Address" id="address"');  ?>
					<?php if(form_error('address')) echo form_label(form_error('address'), 'address', array("id"=>"address-error" , "class"=>"error")); ?>
				</div>
				<div class="form-col colspan2 colspan3 ">
				<?php
				if(set_value('designation')){ $designation = set_value('designation'); }else{ $designation = $user_data['designation']; }
				echo form_input('designation',$designation,'placeholder= "Designation" class="" id="designation"'); ?>
					<?php if(form_error('designation')) echo form_label(form_error('designation'), 'designation', array("id"=>"designation-error" , "class"=>"error")); ?>
				</div>
			</div> 
			<div class="form-row btn-row">
				<?php if(set_value('city_id')){ $city_id = set_value('city_id'); }else{ $city_id = $user_data['city']; } ?>
				<input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id; ?>">
				<input type="hidden"  id="first_city_id" value="">
				<input type="hidden"  id="first_city_text" value="">
				<input type="hidden"  id="city_clicked" value="">
				<input class="submit_btn" id="submit_btn" value="Save" title="Save" type="submit">
				<input class="submit_btn reset-btn" value="Cancel" id="profile-reset" title="Cancel" type="button">
			</div>	
	   <?php echo form_close();  ?>
	</div>
  </div>
</div>
<script>
			$(document).ready(function() {
				
				$('#profile-reset').livequery("click",function(){
					$('#first_name').val('');
					$('#last_name').val('');
					$('#skype_id').val('');
					$('#country').val('');
					$('#City').val('');
					$('#phone_no').val('');
					$('#designation').val('');
					$('#address').val('');
					$('#country').selectric('refresh');
				});
			});
		</script>