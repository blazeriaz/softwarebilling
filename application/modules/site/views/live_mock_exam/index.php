<?php $admin_mail = get_site_settings('site.admin_email','value'); ?>

<?php $this->load->view('layout/site/mock_exam_menu'); ?>

<section class="online-exam-section1 tps">
	<div class="container">		
		<div class="row">			
			<div class="online-setlft1 col-md-6 col-sm-12 col-xs-12">						
				<?php echo $live_mock_exam['live_mock_exam.description1']; ?>
			</div>
			<div class="online-setrgt1 col-md-6 col-sm-12 col-xs-12">
				<?php 
					$url_id ='';
					 if($live_mock_exam['live_mock_exam.video_url']!=""){
						$rr =  explode("/",$live_mock_exam['live_mock_exam.video_url']);
						$url_id = end($rr);										
					 }
				?>
				<a id="video1" class="popup_iframe iframe" href="<?php echo $live_mock_exam['live_mock_exam.video_url'];?>">
					<?php
						if($url_id){
							$thumb_name = "hqdefault";
					?>
						<img src="https://img.youtube.com/vi/<?php echo $url_id.'/'.$thumb_name; ?>.jpg">
					<?php
						}else{
					?>
						<img src="<?php echo base_url();?>assets/site/images/online-exam-right1.png">
					<?php
						}
					?>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="online-exam-section3 live">
	<div class="online-setlft3 col-md-6 col-sm-6 col-xs-12">						
		<div class="setleft3">
			<?php echo $live_mock_exam['live_mock_exam.description2']; ?>
		</div>
	</div>
	
	<?php $this->load->view('layout/site/booking_slot'); ?>
	
</section>

<section class="online-exam-anyqa2">
	<div class="anyqa-set col-md-12 col-sm-12 col-xs-12">
		<h6><?php echo $live_mock_exam['live_mock_exam.bottom_content']; ?> <a href="mailto:<?php echo $admin_mail; ?>" title="<?php echo $admin_mail; ?>"><?php echo $admin_mail; ?></a></h6>
	</div>
</section>