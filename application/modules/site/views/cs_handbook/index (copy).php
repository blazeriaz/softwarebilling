<section class="cs-handbook-section1" >
			<div class="container">
				<h1><?php echo $cs_product['content_one'];?></h1>
				<div class="row">
					<div class="cs-handbook-image">
						<img src="<?php echo base_url("appdata/cs_handbook/".$cs_product['image']);?>" alt="">
						<h4><span class="buy_amount">$<?php echo $cs_product['price'];?></span><a href="#" title="Buy Now"><span class="buy_btn">Buy Now</span></a></h4>
					</div>
					<div class="cs-handbook-description">
						<?php echo $cs_product['content_two'];?>
					</div>
				</div>
			</div>
		</section>
		<section class="cs-handbook-section2">
			<div class="container">
			<div class="cs-book-section2-inner-desc">
				<div class="cs-book-section2-inner-desc-inner">
					<?php echo $cs_product['content_three'];?>
				</div>
			</div>
			<div class="section2-inner-image">
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
							foreach($testimonial_text as $val){
						?>
							<div class="item">
								<div class="abt-handbook-slicont">
									<p><?php echo $val['description'];?></p>
									<h3><?php echo $val['name'];?></h3>
									<h5><?php echo $val['designation'];?></h5>
								</div>
							</div>
						<?php
							}
						?>
					</div>
			    </div>
			</div>
			<?php if($testimonial_video){ ?>
			<div class="cs-book-adsimg">
					<!--<img src="<?php echo base_url();?>assets/site/images/ads.png" alt="">-->
					<img src="<?php echo base_url("appdata/ads/".$advertisements['image']);?>" alt="">
			</div>
			<?php } ?>
			</div>
		</section>	
		<?php if($testimonial_video){ ?>
		<section class="cs-handbook-section4">
			<div class="container">
				<h2 class="cs-testtitle">Testimonials</h2>
				<div class="cs-book-section4-inner-desc">
					<div class="cs-book-section4-inner-desc-inner">
						<p><?php echo $testimonial_video['description'];?></p>
						<h3><?php echo $testimonial_video['name'];?></h3>
						<h4><?php echo $testimonial_video['designation'];?></h4>
					</div>
				</div>
				<div class="section4-inner-image">				
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
			</div>
		</section>	
		<?php } ?>