<div class="container">				
	<div class="row">
		<h2>Online Tutorials</h2>

		<?php foreach($online_step_list as $step){ ?>

		<div class="onltorials-list col-md-6 col-sm-12 col-xs-12" id="<?php echo $step['slug']; ?>">
			<div class="img">
				<span><?php echo $step['name']; ?></span>

				<?php

				if($step['image']){

					/*$img_src = thumb(FCPATH.$this->config->item('steps_pathonly').$step['image'] ,'591', '256', 'thumb_front_img',$maintain_ratio = TRUE);
					$img_prp = array('src' => base_url().$this->config->item('steps_pathonly').'thumb_front_img/'.$img_src, 'alt' => $step['image'], 'title' => $step['image']);
					echo img($img_prp);*/

					echo "<img src='".base_url()."assets/site/images/onltorials-img.png' alt=''>";

				}else{
					echo "<img src='".base_url()."assets/site/images/onltorials-img.png' alt=''>";
				}

				?>
				<h2> <!-- iframe -->
					<a id="<?php echo 'vid-'.$step['slug']; ?>" class="popup_iframe iframe onltour-banner-btn" href="<?php echo $step['video_url'];?>">Play</a>
						<?php echo $step['content_one']; ?>

				</h2>
			</div>
			<div class="desp">							 
				<p class="trimmed_content"><?php echo mb_strimwidth($step['content_two'], 0, 200, "..."); ?></p>
				<p class="full-content" style="display:none;"><?php echo $step['content_two']; ?></p>
				<a class="read_more_link online_step_list" href="javascript:void(0);" title="Readmore...">Readmore...</a>
				<a class="read_less_link online_step_list" style="display:none;" href="javascript:void(0);" title="Readless...">Readless...</a>
				<h4>
					<span class="buy_amount"><?php echo "$".$step['price']; ?> <i>/ <?php echo $step['valid_days']; ?> days</i> 
					<?php if(!is_loggedin()){ ?>
					<a href="javascript:void(0)" data-href="payment/<?php echo $step['id']; ?>" title="Buy Now" class="buy_btn active buy_now_cart">Buy Now</a> </span>													
					<?php }else{ ?>
					<a href="<?php echo base_url('payment/'.$step['id']); ?>" title="Buy Now" class="buy_btn">Buy Now</a> </span>													
					<?php } ?>
				</h4>
			</div>
		</div>

		<?php
			}
		?>
	</div>
</div>