<div class="wrapper row">
	<div class="wrapper-inn">
		<h2 class="title">Online Video Tutorial</h2>
		<div class="home_seven_step_flex">
		<div class="home_six_step">
			<h3 class="title-step"><?php echo $online_tutorial['step.title']; ?></h3>	
			<p><?php echo $online_tutorial['step.title_description']; ?></p>
			<ul>
				<?php foreach($online_step_list as $step){ ?>
				<li>
					<a href="<?php echo base_url().'online-tutorials/#'.$step['slug']; ?>" title="<?php echo $step['name']; ?>" data-id="<?php echo $step['slug']; ?>" class='scroll_step'><h5 class="round"><?php echo $step['name']; ?></h5>
						<?php $stepname = str_replace(' ','',$step['name']); ?>
					<h3><?php echo $online_tutorial['step.'.strtolower($stepname).'_content']; ?></h3></a>
				</li>
				<?php } ?>
				
			</ul>
			<h4>Starting @ <span class="buy_amount"><?php echo "$".$combo_packages['price']; ?></span><a href="<?php echo base_url().'online-tutorials'; ?>" title="Buy Now"><span class="buy_btn">Buy Now</span></a></h4>
		</div>
		<div class="home_seventhstep">
			<h3 class="title-step"><?php echo $assesement_preparation['content_one']; ?></h3>	
			<p><?php echo $assesement_preparation['content_two']; ?></p>
			<div class="home_seventhstep_inner">
				<div class="home-step7-left row">
					<a href="<?php echo base_url().'online-tutorials'; ?>" title="Step7"><h5 class="round">Step 7</h5></a>
					<?php echo $assesement_preparation['content_three']; ?>
					
				</div>
				<h4><span class="buy_amount">$<?php echo $assesement_preparation['price']; ?></span><a href="<?php echo base_url().'online-tutorials'; ?>" title="Buy Now"><span class="buy_btn">Buy Now</span></a></h4>
			</div>
		</div>
		</div>
	</div>
</div>