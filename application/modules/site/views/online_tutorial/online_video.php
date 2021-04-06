<div class="wrapper row">
	<div class="wrapper-inn">
		<div class="six_step_flex">
		<div class="six_step">
			<h2><?php echo $online_tutorial['step.title']; ?></h2>	
			<p><?php echo $online_tutorial['step.title_description']; ?></p>
			<ul class="online_steps">
				<?php foreach($online_step_list as $step){ ?>
				<li>
					<a href="javascript:void(0);" title="<?php echo $step['name']; ?>" data-id="<?php echo $step['slug']; ?>" class='scroll_step'><h5 class="round"><?php echo $step['name']; ?></h5>
						<?php $stepname = str_replace(' ','',$step['name']); ?>
					<h3><?php echo $online_tutorial['step.'.strtolower($stepname).'_content']; ?></h3></a>
				</li>
				<?php } ?>
			</ul>
			<h6>Access All Steps 1 - 6</h6>
			<h4>
			<?php foreach($combo_packages as $package){
				echo "<span class='radio-bx'><input type='radio' id='radiobox".$package['id']."' name='combo_package' value='".$package['id']."' tabindex=''> <label for='radiobox".$package['id']."'> <b>".$package['name']."</b> <i>$".$package['price']."</i></label></span>";
			} ?>
			
			<?php if(!is_loggedin()){ ?>
			<a href="javascript:void(0)" id="" title="Buy Now" class="buy_btn online_video_tutorial_before">Buy Now</a>						
			<?php }else{ ?>
				<a href="javascript:void(0)" id="" title="Buy Now" class="buy_btn online_video_tutorial">Buy Now</a>						
			<?php } ?>
			</h4>
			<div class="error online-tutorial-error"></div>
		</div>
		<div class="seventhstep">
			<h2><?php echo $assesement_preparation['content_one']; ?></h2>
			<p><?php echo $assesement_preparation['content_two']; ?></p>
			<div class="seventhstep_inner">
				<div class="step7-left row">
					<a href="javascript:void(0);" title="Step7"><h5 class="round">Step 7</h5></a>
					<?php echo $assesement_preparation['content_three']; ?>
					
				</div>
				<h4><span class="buy_amount">$<?php echo $assesement_preparation['price']; ?></span><a href="javascript:void(0);" title="Buy Now" id="buy_assesment"><span class="buy_btn <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?>">Buy Now</span></a></h4>
			</div>
		</div>
		</div>
	</div>
</div>
