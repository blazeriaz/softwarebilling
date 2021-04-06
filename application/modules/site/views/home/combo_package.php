<div class="wrapper">
				<div class="wrapper-inn row">
					<h2 class="title">Our Combo Packages</h2>
					<div class="home_combopack-main row">
						<div class="container1 row">
							<div class="home_combopack-flex">
							<?php
							//pr($combo_plans);
							$i = 1;
							foreach($combo_plans as $plan){ ?>
								<div class="home_combopack <?php if($i == 2){ echo 'active';} ?>">
									<h2><?php echo $plan['content_one']; ?></h2>
									<?php
										if($plan['special_price']){
									?>
										<h3 style="text-decoration: line-through;">$<?php echo $plan['price']; ?></h3>
										<h4 style="color: #333;text-align: center;font: 30px 'latolight';">$<?php echo $plan['special_price']; ?></h4>
									<?php
										}else{
									?>
										<h3>$<?php echo $plan['price']; ?></h3>
									<?php
										}
									?>
									<div class="divider"></div>
									<?php echo $plan['content_two']; ?>
									<?php if(!is_loggedin()){ ?>
									<a href="javascript:void(0);" class="buy_now_cart buy_btn" data-href="<?php echo 'payment/'.$plan['product_id']; ?>"  title="Buy Now">Buy Now</a>
									<?php }else{ ?>
									<a href="<?php echo 'payment/'.$plan['product_id']; ?>" class="buy_btn" title="Buy Now">Buy Now</a>
									<?php } ?>
								</div>
							<?php $i++; } ?>
								
							</div>	
						</div>
					</div>
				</div>	
			</div>