<div id="preloader"></div>
<div class="step1-section-right col-md-9 col-sm-8 col-xs-12">
						<div class="step1-sect-list col-md-10 col-sm-12 col-xs-12">
						<?php if(count($video_content) > 0){ ?>
						<?php /* <h3><span><?php echo $video_content[0]['title']; ?></span></h3> */ ?>
							<ul>
							<?php 
							
							$k=1;foreach($video_content as $video){ ?>
								<li>	
									<h3><span><?php echo $video['title']; ?></span></h3>
									<div class="clearfix"></div>
									<div class="imgs video-wrapper">
									<div class="row" style="position:relative">
										<?php echo $video['video_url']; ?>
										<!--<a href="#inline<?php echo $k; ?>" class="overlay-custom step-video" ></a>-->
									</div>
									</div>
									<div class="listing row">
										<?php 
											if($video['liked']){
												$like_class = 'already_liked';
												$like_content = "Already Liked";
											}else{
												$like_class = 'steps_like';
												$like_content = "Like";
											}
											$like_count = $video['count_like'];
											$view_count = $video['view_cnt'];
										?>
										<a href="javascript:void(0);" class="likes <?php echo $like_class; ?>" data-video_id = "<?php echo $video['id']; ?>" title="<?php echo $like_content; ?>" id="<?php echo 'like-'.$video['id']; ?>"><?php echo $like_count; ?></a>
										<i>&nbsp;</i>
										<span class="views video_views" title="Views"><?php echo $view_count; ?></span>
									</div>
									
								</li>
							<?php $k++;} ?>
							</ul>
							
							<?php }else{ ?>
						<div class="no-record">No Record Found</div>
						<?php } ?>
							
							<div class="step1-btns">
							<?php if($next_url!=""){ ?>
								<a href="<?php echo $next_url; ?>" title="Next" class="next">Next</a>
							<?php } ?>	
							<?php if($prev_url!=""){ ?>
								<a href="<?php echo $prev_url; ?>" title="Back" class="back">Back</a>
								<?php } ?>
							</div>
							
						
						</div>
</div>

<style>
	#preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #0c0c0c00 url('<?php echo base_url('assets/images/targetusm.gif'); ?>') no-repeat center center; }
</style>
<script>
jQuery(document).ready(function($) {  

$(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
});
$('html, body').animate({
        scrollTop: $(".step-menu").offset().top
  }, 1000);

var width = $(window).width();
 if(width < 1023){
  $('html, body').animate({
        scrollTop: $(".step-menu").offset().top
    }, 2000);
  }
});		
</script>	