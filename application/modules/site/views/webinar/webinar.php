<section class="personal-coaching-section1 webinar1">
<?php //pr($webinar); ?>
	<div class="container">
				<h1>webinar series</h1>
				<?php if(count($webinar_products) == 0 && count($webinar) == 0 /*&& $display_webinar == 0*/){ ?>
		
		<div class="list-block col-md-12 col-sm-12 col-xs-12">
			<div class="left col-md-5 col-sm-12 col-xs-12 no-record">Webinar Coming soon</div>
		</div>
		<?php } ?>
				
	</div>
		</section>
		
		<?php
		
		//pr($webinar);
		//pr($webinar_products);
		
		//if($display_webinar){
		foreach($webinar as $webinar_group){ ?>

		<?php if($webinar_group['show_webinar_group']){ ?>
		<section class="onltorials webinar2">
			<div class="container">	
			<?php if($webinar_group['show_webinar_group']){ ?>
				<h2><?php echo $webinar_group['content_one']; ?></h2>
				<?php } ?>
				<div class="row">	

					<?php foreach($webinar_group['group_product'] as $grouped_product){ ?>

					<?php if(strtotime($grouped_product['date_time']) > strtotime(date('Y-m-d H:i:s'))){ ?>

					<div class="onltorials-list col-md-6 col-sm-12 col-xs-12">
						<div class="img">	
							<?php
							
							$img_src = thumb(FCPATH.'appdata/webinar/' .$grouped_product['image'] ,'570', '220', 'thumb_online_img',$maintain_ratio = TRUE);
		                    $img_prp = array('style'=>'', 'src' => base_url() . 'appdata/webinar/thumb_online_img/'.$img_src, 'alt' => $grouped_product['image'], 'title' => $grouped_product['title']);
							$img_path = base_url() . 'appdata/webinar/thumb_online_img/'.$img_src;
                            
							?>
							<img src="<?php echo $img_path; ?>" alt="<?php echo $grouped_product['title']; ?>">	
						</div>
						<div class="desp">
							<h2><?php echo $grouped_product['title']; ?></h2>
							<div class="trimmed_content"><?php echo substr($grouped_product['description'],0,200); ?></div>
							<div class="full-content hide"><?php echo $grouped_product['description']; ?></div>
							<?php if(strlen($grouped_product['description']) > 200){ ?>
								<a class="view_more_link" href="javascript:void(0);" title="View More...">View More...</a>
							<?php } ?>
							<h4>
								<span class="buy_amount"><?php echo '$ '.$grouped_product['price']; ?>
									<a href="javascript:void(0)" data-webinarid="<?php echo $grouped_product['id']; ?>" data-productid="<?php echo $grouped_product['product_id']; ?>" title="Buy Now" class="buy_btn active webinar-btn webinar_purchase">Buy Now</a> 
								</span>													
							</h4>
							<h5><span class="date"><?php echo date('d M, Y',strtotime($grouped_product['date_time'])); ?></span> <span class="time"><?php echo date('h:i a', strtotime($grouped_product['date_time'])); ?>, Central Time</span></h5>
						</div>
					</div>

					<?php } ?>

					<?php } ?>
					
				</div>
				<?php if($webinar_group['show_webinar_group']){ ?>
				<h5><?php echo $webinar_group['content_two']; ?></span></h5>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

		<?php if($webinar_group['show_webinar_group']){ ?>
		<section class="steps-botms">
			<div class="container">
				<h6 class="capnone">
				<?php echo $webinar_group['content_three'].' $'.$webinar_group['price'].' Only'; ?>
				</h6>
				<a class="webinar_purchase webinar-btn" data-webinarid="<?php echo $webinar_group['id']; ?>" data-productid="<?php echo $webinar_group['id']; ?>" href="javascript:void(0)" title="Buy Now">Buy Now</a>
			</div>
		</section>
		<?php } ?>

		<?php 
			} 
		//} 
		?>	
<!-- Popup Block -->
		<?php if(count($webinar_products) > 0){ ?>
		<section class="onltorials webinar2">
			<div class="container">				
				<!--<h2><?php echo $webinar_group['content_one']; ?></h2>-->
				<div class="row">
				<?php foreach($webinar_products as $webinar_product){ ?>

				<?php if(strtotime($webinar_product['date_time']) > strtotime(date('Y-m-d H:i:s'))){ ?>

					<div class="onltorials-list col-md-6 col-sm-12 col-xs-12">
						<div class="img">	
							<?php
							
							$img_src = thumb(FCPATH.'appdata/webinar/' .$webinar_product['image'] ,'570', '220', 'thumb_online_img',$maintain_ratio = TRUE);
		                    $img_prp = array('style'=>'', 'src' => base_url() . 'appdata/webinar/thumb_online_img/'.$img_src, 'alt' => $webinar_product['image'], 'title' => $webinar_product['title']);
							$img_path = base_url() . 'appdata/webinar/thumb_online_img/'.$img_src;
		                    
							?>
							<img src="<?php echo $img_path; ?>" alt="<?php echo $webinar_product['title']; ?>">	
						</div>
						<div class="desp">
							<h2><?php echo $webinar_product['title']; ?></h2>
							<div class="trimmed_content"><?php echo substr($webinar_product['description'],0,200); ?></div>
							<div class="full-content hide"><?php echo $webinar_product['description']; ?></div>
							<?php if(strlen($webinar_product['description']) > 200){ ?>
								<a class="view_more_link" href="javascript:void(0);" title="View More...">View More...</a>
							<?php } ?>
							
							
							<?php if($webinar_product['price'] > 0 && $webinar_product['price'] != ''){?>
							<h4>
								<span class="buy_amount"><?php echo '$ '.$webinar_product['price']; ?>
									<a href="javascript:void(0)" data-webinarid="<?php echo $webinar_product['id']; ?>" data-productid="<?php echo $webinar_product['product_id']; ?>" data-webinarfree="0" title="Buy Now" class="buy_btn active webinar-btn webinar_purchase">Buy Now</a> 
								</span>													
							</h4>
							<?php }else{?>
							<h4>
								<span class="buy_amount">
									<a href="javascript:void(0)" data-webinarid="<?php echo $webinar_product['id']; ?>" data-productid="<?php echo $webinar_product['product_id']; ?>" data-webinarfree="1" title="Buy Now" class="buy_btn active webinar-btn webinar_purchase">Buy Now</a> 
								</span>													
							</h4>
							<?php }?>
							<h5><span class="date"><?php echo date('d M, Y',strtotime($webinar_product['date_time'])); ?></span> <span class="time"><?php echo date('h:i a', strtotime($webinar_product['date_time'])); ?>, Central Time</span></h5>
						</div>
					</div>
					
				<?php } ?>

				<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>
		
		<div class="popup-overlap">
		<section class="popup-blocks webinar-popup">
			<a class="popup-close close-btn" title="Close"></a>
			<div class="login-left col-md-6 col-sm-12">
				<img src="<?php echo base_url("assets/site/images/webinar-left-img.png"); ?>" title="Target USMLE" />
				<h2>1st webinar <span>Registration free</span></h2>				
			</div>
			<div class="login-right col-md-6 col-sm-12">				
				<h2 class="">Want to sign up for a webinar with Dr. Mary June</h2>
				<form method="post" action="<?php echo base_url('webinar/register'); ?>" class="webinar_register" id="webinar_register">			<div id="name" class="input first-name">
						<input type="text" value="<?php echo $first_name; ?>" name="name" placeholder="Name">
						
					</div>
					<div id="email" class="input emailid">
						<input name="email"  type="text" value="<?php echo $email_id; ?>" placeholder="Email ID">
						
					</div>
					<div id="skype_id"  class="input skypeid ">
						<input name="skype_id" value="<?php echo $skype_id; ?>"  type="text" placeholder="Skype ID">
						
					</div>	
					<div class="input submit">
						<input type="hidden" id="productid" name="product_id" value=""/>
						<input type="hidden" id="webinarid" name="webinar_id" value=""/>
				
						<input type="hidden" id="webinarfree" name="webinarfree" value=""/>
						
 
						<input type="submit" value="Submit" title="Submit">
					</div>					
				</form>
			</div>
		</section>
		</div>
		<!-- Popup Block -->		
