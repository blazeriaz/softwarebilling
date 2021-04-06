<section class="online-exam-section1">
	<div class="container">
		<h1>Mock Exam</h1>
		<div class="row">
			<div class="online-menu col-md-12 col-sm-12 col-xs-12">
				<ul>
					<?php $uri_seg =  $this->uri->segment(1); ?>
					<li><a class="<?php echo (($uri_seg == 'mock-exam') || ($uri_seg == 'online-mock-exam'))?'active':''; ?>" href="<?php echo base_url('online-mock-exam'); ?>" title="Online Mock Exam">Online Mock Exam</a></li>
					<li><a class="<?php echo (($uri_seg == 'live-mock-exam'))?'active':''; ?>" href="<?php echo base_url('live-mock-exam'); ?>" title="Live Mock Exam">Live Mock Exam</a></li>
				</ul>
			</div>			
		</div>
	</div>
</section>