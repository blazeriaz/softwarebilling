<div class="step1-section-left col-md-3 col-sm-4 col-xs-12">
						
						<div class="step-menu-lnks"><a href="javascript:void(0);" title="">Menu</a></div>
						<div class="step-menu">
							<ul>
						<?php 
							foreach($left_sub_category as $left_menu){ ?>
							<?php 
							if($left_menu['slug']== $this->uri->segment(2) && $left_menu['slug']!='step6'){  
							$class = 'class="expand"'; 
							}else{
								$class = '';
							}
							
							if($left_menu['slug']!='step6'){
								
							}
							
							?>
								<li <?php echo $class; ?> >								
									<a class="<?php echo ($left_menu['slug']!='step6') ? 'opens' : '';?>" href="<?php echo base_url('cs-steps/'.$left_menu['slug']); ?>" title="<?php echo $left_menu['name']; ?>"><?php echo $left_menu['name']; ?></a>	
									<a class="icons <?php echo ($left_menu['slug']!='step6') ? 'toggle' : '';?>" href="javascript:void(0);" title="" class="active">Icons</a>												
									
									<?php
									if(count($left_menu['sub_menu']) > 0){ 
									if($left_menu['slug']!='step6'){
									?>
									<ul class="step-submenu <?php if($left_menu['slug']== $this->uri->segment(2)){?> show <?php } ?>" >
										<?php foreach($left_menu['sub_menu'] as $sub_menu){ ?>
										<li <?php if($left_menu['slug'] == 'step6'){ ?> style="display:none;" <?php } ?>>
											<a <?php if($sub_menu['slug']== $custom_slug){?> class="active"  <?php } ?> href="<?php echo base_url('cs-steps/'.$left_menu['slug'].'/'.$sub_menu['slug']) ?>" title="<?php echo $sub_menu['name']; ?>"><?php echo $sub_menu['name']; ?></a>
										</li>
										<?php } ?>
										
									</ul>
									<?php }} ?>
								</li>
						<?php } ?>
								
								
							</ul>
						</div>
					</div>
<?php 
if($this->uri->segment(2) == '' && $this->uri->segment(3) == ''){ ?> 
<script>
$('.step-menu ul li:first .step-submenu').addClass('show');
$('.step-menu ul li:first .step-submenu li:first a').addClass('active');
$('.step-menu ul li:first').addClass('expand');
</script>
<?php } ?>