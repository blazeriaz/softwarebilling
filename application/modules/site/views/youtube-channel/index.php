		<section class="step1-section">
			<div class="container">				
				<h1 class="ytb-hd"><span>Youtube channel</span> <a class="h1-btns" href="<?php echo base_url("testimonial/video");?>" Title="CS Handbook">Click here to see video testimonials</a></h1>				
				<div class="row">					
					<div class="youtube-list">						
						<div class="top">
							<ul>
								<?php foreach($youtube_channels_datas as $k=>$youtube_channel){?>
								<li class="col-md-4 col-sm-6 col-xs-6">
									<div class="imgs">										
										<?php 
											$url_id ='';
											 if($youtube_channel['youtube_link']!=""){
												$rr =  explode("/",$youtube_channel['youtube_link']);
												$url_id = end($rr);										
											 }
										?>
										<a id="video1" class="popup_iframe iframe" href="<?php echo $youtube_channel['youtube_link'];?>">
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
									<p><a href="" title=""><?php echo $youtube_channel['title'];?></a></p>
								</li>
								<?php } ?>
							</ul>
							<?php if(count($youtube_channels_datas) == 0){ ?>
							<div>
								<div class="no-record">No Record Found</div>
							</div>
							<?php } ?>		
						</div>
					</div>
				</div>
				<div class="row">	
					<div class="pagination-blks">
						<?php if(count($youtube_channels_datas) > 0){ ?>
						<?php echo $this->pagination->create_links(); ?>
						<?php } ?>
					</div>		
				</div>
			</div>
		</section>