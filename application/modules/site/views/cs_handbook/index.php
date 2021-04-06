
	<section class="cs-handbook-section1" >
			<div class="container">
				<h1><?php echo $cs_product['content_one'];?></h1>
				<div class="row">
					<div class="cs-handbook-image col-md-5 col-sm-12 col-xs-12">
						<?php

						$img_src = thumb(FCPATH.'appdata/cs_handbook/' .$cs_product['image'] ,'380', '462', 'thumb_front_img',$maintain_ratio = TRUE);
						$img_prp = array('src' => base_url().'appdata/cs_handbook/thumb_front_img/'.$img_src, 'alt' => $cs_product['image'], 'title' => $cs_product['image']);
						echo img($img_prp);
						?>


						<h4>
						<span class="buy_amount">$<?php echo $cs_product['price'];?></span>
						<?php if(!is_loggedin()){ ?>
						<a href="javascript:void(0);" class="buy_now_cart" data-href="<?php echo 'payment/'.$cs_product['id']; ?>" title="Buy Now"><span class="buy_btn">Buy Now</span></a>
						<?php }else{ ?>	
						<a href="<?php echo base_url('payment/'.$cs_product['id']); ?>" title="Buy Now"><span class="buy_btn">Buy Now</span></a>
						<?php } ?>
						<!--<a class="amazon" href="<?php //echo $amazon_url; ?>" title="Buy Now" target="_new"><img src="<?php //echo base_url("assets/site/images/amazon.png");?>" alt="" /></a>-->
												
						<div class="cs-amazon">							
							<a class="amazon" href="<?php echo $amazon_url; ?>" title="Buy Now" target="_new"><img src="<?php echo base_url("assets/site/images/amazon.png");?>" alt="" /></a>
							<a class="print" target="_blank" href="<?php echo $hard_copy_url;?>" title="Hard Copy">Hard Copy</a>
						</div>
						</h4>
					</div>
					<div class="cs-handbook-description col-md-7 col-sm-12 col-xs-12">
						<?php echo $cs_product['content_two'];?>
					</div>
				</div>
			</div>
		</section>
		
		<section class="cs-handbook-section2">
			<div class="container">
				<div class="row">
					<div class="section2-inner-image col-md-8 col-sm-12 col-xs-12">
						<?php 
							$url_id ='';
							 if($cs_product['video_url']!=""){
								$rr =  explode("/",$cs_product['video_url']);
								$url_id = end($rr);										
							 }
						?>
						<a id="video1" class="popup_iframe iframe" href="<?php echo $cs_product['video_url'];?>">
							<?php
								if($url_id){
									$thumb_name = "hqdefault";
							?>
								<img src="https://img.youtube.com/vi/<?php echo $url_id.'/'.$thumb_name; ?>.jpg">
							<?php
								}else{
							?>
								<img src="<?php echo base_url();?>assets/site/images/csbook-testmonialimg.png">
							<?php
								}
							?>
						</a>
					</div>
					<div class="cs-book-section2-inner-desc col-md-6 col-sm-12 col-xs-12">
						<div class="cs-book-section2-inner-desc-inner">
							<?php echo $cs_product['content_three'];?>
						</div>
					</div>
				</div>
			</div>
		</section>	
		
		<section id="cs-handbook-section3">
			<div class="container">
			<h2>What Do Previous Students Say<br>
			<span>About The Handbook</span></h2>
			<div class="row">
			<div class="handbook-slider">
					<div class="owl-carousel owl-theme">
						<?php
					//	pr($testimonial_text);
							foreach($testimonial_text as $val){
						?>
						<div class="item">
							<div class="abt-handbook-slicont">
								<p><?php echo $val['description'];?></p>
								<h3><?php echo $val['name'];?></h3>
								<h5><?php echo ($val['location'])?$val['location']:'N/A';?></h5>
							</div>
						</div>						
						<?php
							}
						?>
					</div>
			    </div>
			</div>
			<?php if($advertisements['image']){ ?>
			<div class="cs-book-adsimg">
					<?php $ad_url = (isset($advertisements['url']) && $advertisements['url'])?$advertisements['url']:'javascript:void(0);'; ?>
					<a href="<?php echo $ad_url; ?>" target="_new">
						<img src="<?php echo base_url("appdata/ads/".$advertisements['image']);?>" alt="">
					</a>
			</div>
			<?php } ?>
			</div>
		</section>
		
		<?php if($testimonial_video){ ?>
		<section class="cs-handbook-section4">
			<div class="container">
				<div class="row">
					<h2 class="cs-testtitle">Testimonials</h2>				
					<div class="section4-inner-image col-md-8 col-sm-12 col-xs-12">
						<?php 
							$url_id ='';
							 if($testimonial_video['youtube_link']!=""){
								$rr =  explode("/",$testimonial_video['youtube_link']);
								$url_id = end($rr);										
							 }
						?>
						<a id="video2" class="popup_iframe iframe" href="<?php echo $testimonial_video['youtube_link'];?>">
						<?php
							if($url_id){
						?>
							<img src="http://img.youtube.com/vi/<?php echo $url_id;?>/hqdefault.jpg">
						<?php
							}else{
						?>
							<img src="<?php echo base_url();?>assets/site/images/csbook-testmonialimg.png">
						<?php
							}
						?>
						</a>						
					</div>
					<div class="cs-book-section4-inner-desc col-md-6 col-sm-12 col-xs-12">
						<div class="cs-book-section4-inner-desc-inner">
							<p><?php echo $testimonial_video['description'];?></p>
							<h3><?php echo $testimonial_video['name'];?></h3>
							<h4><?php echo $testimonial_video['location'];?></h4>
						</div>
					</div>
				</div>
			</div>
		</section>	
		<?php } ?>