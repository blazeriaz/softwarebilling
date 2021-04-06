<div class="wrapper">
				<div class="wrapper-inn row">
					<h2 class="title">Our Combo Packages</h2>
					<div class="home_combopack-main row">
						<div class="container1 row">
							<div class="home_combopack-flex">
							<?php
							$i = 1;
							foreach($combo_plans as $plan){ ?>
								<div class="home_combopack <?php if($i == 2){ echo 'active';} ?>">
									<h2><?php echo $plan['content_one']; ?></h2>
									<h3>$<?php echo $plan['price']; ?></h3>
									<div class="divider"></div>
									<?php echo $plan['content_two']; ?>
									<a href="#" class="buy_btn" title="Buy Now">Buy Now</a>
								</div>
							<?php $i++; } ?>
								
							</div>	
						</div>
					</div>
				</div>	
			</div>