<?php //pr($video_content); ?>
<div class="step1-section-right step6 col-md-9 col-sm-8 col-xs-12">
						<h3><span>Patient Note Videos<span></h3>
						<div class="top">
							<ul>
							<?php $k=1; foreach($video_content as $video){ ?>
								<li>
									<div class="imgs" style="position:relative">
										<?php echo $video['video_url']; ?>
										<a href="#inline<?php echo $k; ?>" class="overlay-custom step-video" ></a>
									</div>
									<h3><?php echo $video['title']; ?> </h3>
									
								</li>
								
							<?php $k++; } ?>
								
							</ul>
						</div>
						
						<div class="bot col-md-12 col-sm-12 col-xs-12">
							<ul>
							<?php foreach($step_six_content as $step_six){  ?>
								<li>
									<div class="bot-tps">
										<div class="imgs"><img src="<?php echo  base_url('appdata/online-video/step_category/'.$step_six['image']) ?>" alt="<?php echo $step_six['name']; ?>" /></div>
										<h3><?php echo $step_six['name']; ?></h3>
									</div>									
									<div class="bot-bts">
										<ul>
											<li>
												<a class="pdf-link" target="_blank" href="<?php echo base_url('pdf-view/ideal/'.$step_six['slug']); ?>" title="Pdf">&nbsp;</a>
												<h4><a target="_blank" href="<?php echo base_url('pdf-view/ideal/'.$step_six['slug']); ?>" title="<?php echo $step_six['ideal_pdf_name']; ?>"><?php echo $step_six['ideal_pdf_name']; ?></a></h4>
												<p>Ideal PN</p>												
											</li>
											<li>
												<a target="_blank" class="pdf-link" href="<?php echo base_url('pdf-view/corrected/'.$step_six['slug']); ?>" title="Pdf">&nbsp;</a>
												<h4><a target="_blank" href="<?php echo base_url('pdf-view/corrected/'.$step_six['slug']); ?>" title="<?php echo $step_six['corrected_pdf_name']; ?>"><?php echo $step_six['corrected_pdf_name']; ?></a></h4>
												<p>Corrected PN</p>
											</li>
										</ul>									
									</div>									
								</li>
							<?php } ?>
								
							</ul>
							<div class="step1-btns">
								
								<a href="<?php echo $prev_url; ?>" title="Back" class="back">Back</a>							
							</div>
						</div>
					</div>
					
	<?php $k=1; foreach($video_content as $video){ ?>
	<div style="display: none;">
		<div id="inline<?php echo $k; ?>" style="width:800px;height:450px;overflow:auto;"> <?php echo $video['video_url']; ?></div>	
	</div>
	<?php $k++; } ?>				
	<style>
	.overlay-custom.step-video {
   
    position: absolute;
    top: 1%;
    width: 100%;
    height: 100%;
}
	</style>