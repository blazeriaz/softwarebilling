<section class="personal-coaching-section1">
	<div class="container">
		<h1><?php echo $personal_coaching_settings['personal_coaching.title']; ?></h1>
		<div class="row">
			<div class="section2-inner-image col-md-8 col-sm-12 col-xs-12">
					<?php 
						$url_id ='';
						 if($personal_coaching_settings['personal_coaching.video_url']!=""){
							$rr =  explode("/",$personal_coaching_settings['personal_coaching.video_url']);
							$url_id = end($rr);										
						 }
					?>
					<a id="video1" class="popup_iframe iframe" href="<?php echo $personal_coaching_settings['personal_coaching.video_url'];?>">
						<?php
							if($url_id){
								$thumb_name = "hqdefault";
						?>
							<img src="https://img.youtube.com/vi/<?php echo $url_id.'/'.$thumb_name; ?>.jpg">
						<?php
							}else{
						?>
							<img src="<?php echo base_url();?>assets/site/images/personal-coaching-left-img1.png">
						<?php
							}
						?>
				</a>
			</div>
			<div class="cs-book-section2-inner-desc col-md-6 col-sm-12 col-xs-12">
				<div class="cs-book-section2-inner-desc-inner">
					<?php echo $personal_coaching_settings['personal_coaching.description']; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="coaching" class="onltorials coaching2">
	<div class="container">				
		<div class="row">
			<?php 
			//pr($personal_coaching_list);
			foreach($personal_coaching_list as $per_coach){ ?>
			<div class="onltorials-list col-md-6 col-sm-12 col-xs-12">
				<div class="img">
					<?php
					$img_src = thumb(FCPATH.$this->config->item('course_img_only').$per_coach['image'] ,'590', '228', 'thumb_front_img',$maintain_ratio = TRUE);
					$img_prp = array('src' => base_url().$this->config->item('course_img_only').'thumb_front_img/'.$img_src, 'alt' => $per_coach['image'], 'title' => $per_coach['image']);
					echo img($img_prp);
					?>
				</div>
				<div class="desp">
					<?php echo $per_coach['content_one']; ?>
					<?php echo $per_coach['content_two']; ?>
					<h4>
						<span class="buy_amount">
							<span class='price'><?php echo '$'.$per_coach['price']; ?></span>
							<a href="javascript:void(0);" data-productid="<?php echo $per_coach['id']; ?>" data-href="payment/<?php echo $per_coach['id']; ?>" title="Buy Now" class="buy_btn active <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?> pers_coach_buy_btn <?php echo ($per_coach['slug'] == 'complete-comprehensive-course')?'ccc':'rrc'; ?>">Buy Now</a>
						</span>
					</h4>
					<?php echo $per_coach['content_three']; ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<section id="booking_slot_section" class="online-exam-section3 coaching3 pers_coach_booking_div" style="display:none;">
	<div class="online-setlft3 col-md-6 col-sm-6 col-xs-12">
		<?php echo $personal_coaching_settings['personal_coaching.timeslot_content']; ?>
	</div>
	<?php $this->load->view('layout/site/booking_slot'); ?>			
</section>

<section class="coaching4">
	<div class="container">				
		<div class="row">
			<div class="coaching4-inn col-md-12 col-sm-12 col-xs-12">

				<?php echo $personal_coaching_settings['personal_coaching.similarities_title']; ?>

				<div class="coaching-blk">
					<?php echo $personal_coaching_settings['personal_coaching.similarities_description']; ?>
				</div>
			</div>
			<div class="coaching4-inn last col-md-12 col-sm-12 col-xs-12">
				<h2><?php echo $personal_coaching_settings['personal_coaching.difference_title']; ?></h2>
				<?php echo $personal_coaching_settings['personal_coaching.difference_description']; ?>					
			</div>					
		</div>
	</div>
</section>