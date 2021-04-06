<?php $admin_mail = get_site_settings('site.admin_email','value'); ?>

<?php $this->load->view('layout/site/mock_exam_menu'); ?>

<section class="online-exam-section1 tps">
	<div class="container">		
		<div class="row">			
			<div class="online-setlft1 col-md-6 col-sm-12 col-xs-12">						
				<?php echo $online_mock_exam['content_two']; ?>
			</div>
			<div class="online-setrgt1 col-md-6 col-sm-12 col-xs-12">
				<?php 
					$url_id ='';
					 if($online_mock_exam['video_url']!=""){
						$rr =  explode("/",$online_mock_exam['video_url']);
						$url_id = end($rr);										
					 }
				?>
				<a id="video1" class="popup_iframe iframe" href="<?php echo $online_mock_exam['video_url'];?>">
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

<section class="online-exam-section2">
	<div class="container">				
		<div class="row">									
			<div class="online-setlft2 col-md-6 col-sm-12 col-xs-12">	
				<div class="online-setlft2-bg">
				<?php echo $online_mock_exam['content_three']; ?>
				</div>
			</div>					
			<div class="online-setrgt2 col-md-6 col-sm-12 col-xs-12">
				<?php echo $online_mock_exam['content_four']; ?>
				<h4><span class="buy_amount"><?php echo '$'.$online_mock_exam['price']; ?></span> <a href="javascript:void(0);" title="Buy Now">
					<span  class="buy_btn booking_scroll <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?>">Buy Now</span>
					</a>
				</h4>
			</div>
		</div>
	</div>
</section>		
<section class="online-exam-anyqa1">
	<div class="anyqa-set col-md-12 col-sm-12 col-xs-12">
		<h6>Any Questions? Ask for this mail. <a href="mailto:<?php echo $admin_mail; ?>" title="<?php echo $admin_mail; ?>"><?php echo $admin_mail; ?></a></h6>
	</div>
</section>		
<section id="online-timeslot" class="online-exam-section3">
	<div class="online-setlft3 col-md-6 col-sm-6 col-xs-12">						
		<?php echo $online_mock_exam['content_five']; ?>
	</div>
	<?php $this->load->view('layout/site/booking_slot'); ?>			
</section>