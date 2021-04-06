<div class="slider">
					<div class="owl-carousel owl-theme">
					<?php foreach($slider as $slider){ ?>
						<div class="item">
							<?php if($slider['url']!=""){ $url = $slider['url']; } else{ $url = 'javascript:void(0)';} ?>
							<a href="<?php echo $url; ?>" title="Lets Get Started" target="_new">
							<div class="banner-opt"></div>
							<img src="<?php echo base_url();?>appdata/banners/<?php echo $slider['file_name']; ?>" alt="" /></a>
							<!--<div class="item-content">
								<h4><?php echo $slider['content_one']; ?> <span><?php echo $slider['content_two']; ?></span></h4>
								<?php if($slider['url']!=""){ $url = $slider['url']; } else{ $url = 'javascript:void(0)';} ?>
								<a href="<?php echo $url; ?>" title="Lets Get Started" target="_new">Lets Get Started</a>
							</div>-->						
						</div>
					<?php } ?>
						
					</div>
			    </div>