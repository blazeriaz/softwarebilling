		<section class="step1-section testls-section testimonials-section">
			<div class="container">				
				<h1><span class="full"><?php echo $page_title;?></span></h1>						
				<div class="row">
					<div class="testls-nav col-md-12 col-sm-12 col-xs-12">
						<ul>
							<li class="<?php echo ($this->uri->segment(2)=="text" || !$this->uri->segment(2)) ? "current" : ""?>"><a href="<?php echo base_url('testimonial/text');?>" title="Text">TEXT</a></li>
							<li class="<?php echo $this->uri->segment(2)=="video" ? "current" : ""?>"><a href="<?php echo base_url('testimonial/video');?>" title="Video">VIDEO</a></li>
						</ul>
					</div>
					<div class="testls-left col-md-4 col-sm-12 col-xs-12">
						<h2>Categories</h2>
						<div class="testls-menu-lnks"><a href="javascript:void(0);" title="">Menu</a></div>
						<div class="testls-menu">
							<ul>
								<?php
								foreach($testimonial_categories as $k=>$test_cat){?>
									<?php 
										$url_slug = $this->uri->segment(3);
										$class_active = "";
										if($url_slug){
											if($url_slug == $test_cat['slug']){
												$class_active = "active";
											}
											if($url_slug == "index" && $k==0){
												$class_active = "active";
											}
										}else{
											if($k==0){
												$class_active = "active";
											}
										}
									?> 
									<li><a class="<?php echo $class_active;?>" href="<?php echo base_url("testimonial/".$type."/".$test_cat['slug']);?>" title="<?php echo $test_cat['name'];?>" data_cat_id="<?php echo $test_cat['id'];?>" ><?php echo $test_cat['name'];?></a></li>	
								<?php } ?>								
							</ul>
						</div>
					</div>
					
					
					
					<!-- 1 -->
					<?php if($type=="text"){ ?>
					<div class="testls-tab testls-listing col-md-8 col-sm-12 col-xs-12">
						<?php
						//pr($testimonial_categorie_datas);
						foreach($testimonial_categorie_datas as $k=>$test_datas){?>
						<div class="list-block col-md-6 col-sm-12 col-xs-12">	
							<div class="list">
								<h2><?php echo $test_datas['name'];?></h2>
								<h3><?php echo ($test_datas['location'])?$test_datas['location']:'N/A';?></h3>
								
								<?php 
								$min_disc= (strlen($test_datas['description']) > 130) ? substr($test_datas['description'],0,130).'...' : $test_datas['description']; 
								$max_disc= $test_datas['description']; 
								?>
								<div class="min_disc"><?php echo strip_tags($min_disc);?></div>
								<div class="max_disc display_none"><?php echo strip_tags($max_disc);?></div>
								<?php if(strlen($test_datas['description']) > 130){ ?>
								<span class="read_more">Read More</span>
								<span class="read_less display_none">Read Less</span>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<?php if(count($testimonial_categorie_datas) == 0){ ?>
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<div class="no-record">No Record Found</div>
						</div>
						<?php } ?>		
						<!-- Pagination -->
						<div class="pagination-blks">
							<?php if(count($testimonial_categorie_datas) > 0){ ?>
							<?php echo $this->pagination->create_links(); ?>
							<?php } ?>											
						</div>
						<!-- Pagination -->
					</div>
					<?php } ?>
					<!-- 1 -->
					<!-- 2 -->	
					<?php if($type=="video"){ ?>					
					<div class="testls-tab testls-grid col-md-8 col-sm-12 col-xs-12">
						<?php foreach($testimonial_categorie_datas as $k=>$test_datas){?>
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<?php 
								$url_id ='';
								 if($test_datas['youtube_link']!=""){
									$rr =  explode("/",$test_datas['youtube_link']);
									$url_id = end($rr);										
								 }
							?>
							<div class="left col-md-5 col-sm-12 col-xs-12">
								<a href="<?php echo $test_datas['youtube_link'];?>" class="imgs popup_iframe iframe"><img src="https://img.youtube.com/vi/<?php echo $url_id; ?>/hqdefault.jpg"></a>
							</div>
							<div class="right col-md-7 col-sm-12 col-xs-12">									
								<h3><span><?php echo $test_datas['location'];?></span> <i><?php echo date("d M Y", strtotime($test_datas['created']));?></i></h3>
								<?php echo $test_datas['description'];?>
								<h2>- <?php echo $test_datas['name'];?> <span><?php echo $test_datas['designation'];?></span></h2>									
							</div>
						</div>	
						<?php } ?>
						<?php if(count($testimonial_categorie_datas) == 0){ ?>
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<div class="no-record">No Record Found</div>
						</div>
						<?php } ?>		
						<!-- Pagination -->
						<div class="pagination-blks">
							<?php if(count($testimonial_categorie_datas) > 0){ ?>
							<?php echo $this->pagination->create_links(); ?>
							<?php } ?>											
						</div>
						<!-- Pagination -->
					</div>	
					<?php } ?>
					<!-- 2 -->
					
				</div>				
			</div>
		</section>
<style>
.display_none{
	display : none;
}
</style>