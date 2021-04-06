<section class="online-exam-section1">
	<div class="container">
		<h1><?php echo $patient_note_correction['content_one']; ?></h1>
		<div class="row">
			<div class="online-setlft1 col-md-6 col-sm-12 col-xs-12">						
				<?php echo $patient_note_correction['content_two']; ?>
				<div class="form-row btn-row">								
					<h4>
						<span class="buy_amount">
							<?php echo '$'.$patient_note_correction['price']; ?>
						</span>
						<a href="javascript:void(0);" class="" title="Buy Now">
							<span class="buy_btn booking_scroll <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?>">Buy Now</span>
						</a>
					</h4>
				</div>
			</div>
			<div class="online-setrgt1 col-md-6 col-sm-12 col-xs-12">
				<?php 
					$url_id ='';
					 if($patient_note_correction['video_url']!=""){
						$rr =  explode("/",$patient_note_correction['video_url']);
						$url_id = end($rr);										
					 }
				?>
				<a id="video1" class="popup_iframe iframe" href="<?php echo $patient_note_correction['video_url'];?>">
					<?php
						if($url_id){
							$thumb_name = "hqdefault";
					?>
						<img src="https://img.youtube.com/vi/<?php echo $url_id.'/'.$thumb_name; ?>.jpg">
					<?php
						}else{
					?>
						<img src="<?php echo base_url();?>assets/site/images/patient-note-right1.png">
					<?php
						}
					?>
				</a>
			</div>
		</div>
	</div>
	</section>
	<section id="patient-slot" class="online-exam-section3">
	<div class="online-setlft3 col-md-6 col-sm-6 col-xs-12">						
		<?php echo $patient_note_correction['content_three']; ?>
	</div>
	
	<?php $this->load->view('layout/site/booking_slot'); ?>

</section>
		