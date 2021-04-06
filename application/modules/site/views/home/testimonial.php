<div class="wrapper">
			    <div class="wrapper-inn">
					<h2 class="title">A few words from our students</h2>
					<div class="tab-wrapper afewwords-blk">
						<div id="tabs">
							<ul class="list-tabs">
							<?php 
							$i = 1;
							foreach($testimonials as $testimonial){ ?>
								<li class="<?php if($i==1){ ?>current <?php } ?>"><a href="#tabs-<?php echo $i; ?>" class="tab-clks tab-img<?php echo $i; ?>"><img src="<?php echo base_url();?>appdata/testimonial/<?php echo $testimonial['image']; ?>" alt=""/></a></li>
							<?php $i++; } ?>
								
							</ul>
							<div class="tab-content">
								<?php 
							$k=1;
							//pr($testimonials);
							foreach($testimonials as $testimonial){ ?>
								<div id="tabs-<?php echo $k; ?>" class="afewwords-tabs">
									<h2><?php echo $testimonial['name']; ?></h2>
									<h3><?php echo $testimonial['location']; ?></h3>
									
									<?php 
									$url_id ='';
									 if($testimonial['youtube_link']!=""){
										$rr =  explode("/",$testimonial['youtube_link']);
										$url_id = end($rr);										
									 }						
									
									?>
									<a id="video<?php echo $k; ?>" class="iframe" href="https://www.youtube.com/embed/<?php echo $url_id; ?>"><img src="https://img.youtube.com/vi/<?php echo $url_id;?>/hqdefault.jpg"></a>
									<p>	
									<?php 
									if($testimonial['description']!=""){
									if(strlen(strip_tags($testimonial['description'])) > 150){
										echo substr(strip_tags($testimonial['description']),0,150).'...';
									}else{
										echo substr(strip_tags($testimonial['description']),0,150);
									}
									}
									?>
									</p>
									<a href="<?php echo base_url('testimonial/video'); ?>" class="view-all" title="View All">View All Testimonials</a>
								</div>
							<?php $k++; } ?>
								
							</div>
						</div>
					</div>	
				</div>
			</div>
			<script>
			$(document).ready(function(){
				
				$(".iframe").fancybox({
					'width'				: '75%',
					'height'			: '75%',
					'type'				: 'iframe'
			});
			});
			
			
			</script>