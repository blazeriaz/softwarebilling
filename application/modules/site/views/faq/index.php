		<section class="step1-section">
			<div class="container">				
				<h1><span class="full"><?php echo $page_title;?></span></h1>		
				<div class="row">			
					<?php if($this->session->flashdata('flash_message')){ ?>
						<div class="form-sucess"><p><?php echo $this->session->flashdata('flash_message'); ?></p></div>
					<?php } ?>
				</div>
				<div class="row">					
					<div class="faq-left col-md-5 col-sm-12 col-xs-12">
						<h2>Categories</h2>
						<div class="faq-menu-lnks"><a href="javascript:void(0);" title="">Menu</a></div>
						<div class="faq-menu">
							<ul>
							<?php foreach($faq_categories as $k=>$faq_cat){?>
								<?php 
									$url_slug = $this->uri->segment(2);
									$class_active = "";
									if($url_slug){
										if($url_slug == $faq_cat['slug']){
											$class_active = "active";
										}
										if($url_slug == "index" && $k==0){
											$class_active = "active";
										}
									}else{
										if($k==0){
											$class_active = "active";
										}
									}
								?> 
								<li><a class="<?php echo $class_active;?>" href="<?php echo base_url("faq/".$faq_cat['slug']);?>" title="<?php echo $faq_cat['name'];?>" data_cat_id="<?php echo $faq_cat['id'];?>" ><?php echo $faq_cat['name'];?></a></li>	
							<?php } ?>
							</ul>
						</div>
					</div>						
					<div class="faq-right col-md-7 col-sm-12 col-xs-12">
						<h2><span>Common Questions & Answers</span> <a class="faq-btn <?php echo is_loggedin() ? "faq_loggedin_user" : ""?>" href="javascript:void(0);" title="Post your Questions">Post your Questions</a></h2>						
						<div class="faq-righ-inn">
							<ul>
								<?php foreach($faq_categorie_datas as $k=>$faq_datas){?>
								<li class="<?php echo ($k==0)?"first":"";?>">								
									<a class="faq-toggle" href="#" title="Step 01"><?php echo $faq_datas['question'];?></a>
									<div class="faq-rgt-blks">
										<p><?php echo $faq_datas['answer'];?></p>
									</div>								
								</li>	
								<?php } ?>
							</ul>
							<?php if(count($faq_categorie_datas) == 0){ ?>
							<div>
								<div class="no-record">No Record Found</div>
							</div>
							<?php } ?>		
						</div>
					</div>	
						<div class="pagination-blks">
							<?php if(count($faq_categorie_datas) > 0){ ?>
							<?php echo $this->pagination->create_links(); ?>
							<?php } ?>
						</div>				
				</div>				
			</div>
		</section>	
		
		<!-- Popup Block -->
		<div class="popup-overlap faq-questions">
		<section class="popup-blocks career-popup faq-popup">
			<a class="popup-close close-btn" title="Close"></a>
			<div class="career-inn">
			<h2 class="head">Post your questions?</h2>
			<div class="signup_inner">
				<form class="signup-blks">
					<div class="form-row">						     													
						<div class="input textarea skills col-md-12 col-sm-12 col-xs-12">
							<textarea placeholder="" name="queries" class="queries"></textarea>
							<span class="error-msg"></span>
						</div>						
						<div class="btn-row col-md-12 col-sm-12 col-xs-12">
							<input class="submit_btn" type="submit" value="Submit" title="Submit"/>
						</div>						
					</div>						
				</form>
			</div>
			</div>
		</section>
		</div>
		<!-- Popup Block -->
		<script>
			function faq_per_cate(id){
				alert(id);
				var url = base_url+'faq/frequently_asked_question/'+id;
				$.ajax({
					type: "GET",
					url: url,
					processData: false,
					contentType: false,
					success: function (data) {
						/*var result = JSON.parse(data);
						if(result.status == 'success'){
							$('#profile-avatar').attr('src',result.image_url);
						}else{
							alert(result.message);
						}*/
					}
				});
			}
			
			$(document).ready(function() {
				$(".faq-btn").click(function() {	
					/*$.ajax({
						type: "POST",
						url: base_url+'faq/check_logged_user',
						//data: {queries: queries},
						success: function (data, status) {
							var result = jQuery.parseJSON(data);
							if(result.status == 'success'){								
							}else{								
							}
						},
						error: function (xhr, desc, err){							
						}
					});*/					
					if($(this).hasClass('faq_loggedin_user')){						
						$('.career-popup').addClass('show');
						$('.popup-overlap').addClass('show');	
						$('body').addClass('overflow');	
					}else{						
						 var url = "<?php echo rtrim(implode('/',$this->uri->segment_array()),'/'); ?>";
						$('.login-btn').trigger('click');
						setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
					}
				});					
				$(".faq-questions").submit(function(e) {							
					e.preventDefault(); // avoid to execute the actual submit of the form.
					$('.faq-questions .error-msg').text("");
					var queries = $('.queries').val();
					if(!queries){
						$('.faq-questions .error-msg').text("Please type your question");
						return false;
					}
					var url = base_url+'faq/faq_enquery';
					$.ajax({
						type: "POST",
						url: url,
						data: {
							queries: queries,
						},
						success: function (data, status) {
							var result = jQuery.parseJSON(data);
							if(result.status == 'success'){
								$("html, body").animate({
									scrollTop: $('.step1-section').offset().top
								}, 2000);								
								window.location.reload();								
							}else{
								$('.faq-questions .error-msg').text(result.msg);
								//window.location.reload();
							}
						},
						error: function (xhr, desc, err){
							$('.faq-questions.error-msg').text(err);
							//window.location.reload();
						}
					});
				});	
			});
		</script>