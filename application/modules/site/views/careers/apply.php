		<section class="step1-section">
			<div class="container">	
				<h1><span>work at target</span></h1>	
				<div class="career-inn career-applys">
					<!--<h2 class="head">Current Opening</h2>-->
					<div class="signup_inner">
						<!--<form class="signup-blks apply_job" id="apply_job" action="<?php echo base_url("careers/apply_job")?>" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault();">-->
						<form class="signup-blks apply_job" id="apply_job" action="<?php echo base_url("careers/apply_job")?>" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault();">
							<div class="form-row">
								<div class="input first-name col-md-6 col-sm-12 col-xs-12">                            
									<input type="text" id="name" name="name" value="<?php echo $username; ?>" placeholder="Name"/>
									<span class="error-msg"></span>
								</div>
								<div class="select col-md-6 col-sm-12 col-xs-12">
									<?php 
										$carrier_id = array();
										$carrier_id[''] = "Please Select";
										foreach($carrier_all_datas as $k=>$carrier_all){
											$carrier_id[$carrier_all['id']] = $carrier_all['title'];
										}								
									?>
									<?php echo form_dropdown('carrier_id',$carrier_id,$carr_id,'class="form-select" id="carrier_id" readonly'); ?>
									<span class="carrier_error error-msg"></span>																
								</div>				
								<div class="input qualification col-md-6 col-sm-12 col-xs-12">                            
									<input type="text" id="qualification" name="qualification" value="" placeholder="Qualification"/>
									<span class="error-msg"></span>
								</div>	
								<div class="input experience col-md-6 col-sm-12 col-xs-12">
									<input type="text" id="experience" name="experience" value="" placeholder="Experience"/>
									<span class="error-msg"></span>
								</div>  
								<div class="input emailid col-md-6 col-sm-12 col-xs-12">                            
									<input type="text" id="email_id" name="email_id" value="<?php echo $email_id; ?>" placeholder="Email ID"/>
									<span class="error-msg"></span>
								</div>	
								<div class="input contact-no col-md-6 col-sm-12 col-xs-12">
									<input type="text" id="phone_no" name="phone_no" value="<?php echo $phone_no; ?>" placeholder="Contact No"/>
									<span class="error-msg"></span>
								</div>     													
								<div class="input textarea skills col-md-12 col-sm-12 col-xs-12">
									<textarea placeholder="Skills" id="skills" name="skills"></textarea>
									<span class="error-msg"></span>
								</div>
								<div class="input resume col-md-6 col-sm-12 col-xs-12">
									<input type="file" id="upload-resume-file" name="resume" placeholder="Please Attach Your Resume" />
									<span class="error-msg"></span>
									<span class='file_msg'>Allowed Types : Doc , Docx , PDF  Max: 5 MB
								</div>
								
								<div class="btn-row col-md-6 col-sm-12 col-xs-12">
									<input class="submit_btn" type="submit" value="Submit" title="Submit"/>
								</div>						
							</div>						
						</form>
					</div>
					</div>
			</div>
		</section>	
		
		<script>
		$(document).ready(function() {			
			$('#apply_job').livequery("submit",function(e){
				e.preventDefault();
				$('.error-msg').html("");
				var url = $('#apply_job').attr('action');
				var data = $('#apply_job').serialize();
				var formData = new FormData();
				formData.append('resume', $('#upload-resume-file')[0].files[0]);
				formData.append('name',$('#name').val());
				formData.append('qualification',$('#qualification').val());
				formData.append('email_id',$('#email_id').val());
				formData.append('skills',$('#skills').val());
				formData.append('phone_no',$('#phone_no').val());
				formData.append('experience',$('#experience').val());
				formData.append('carrier_id',$('#carrier_id').val());
			
				$.ajax({
					type: 'POST',
					url: url,
					data : formData,
					//enctype: 'multipart/form-data',
					processData: false,
					contentType: false,
					success: function(res){
						var result = JSON.parse(res);
						console.log(result);
						if(result.status == 'success'){
							window.location = base_url+'careers';
						}else{
							$.each(result.errorfields,function(key, value){
								$('#apply_job').find("[name="+key+"]").parent().children(".error-msg").text(value);
								if(key=='carrier_id'){
									$('.carrier_error').text(value);
								}
								//console.log(key+" "+value);
							});
						}
					}
				});
			});
		});
		</script>