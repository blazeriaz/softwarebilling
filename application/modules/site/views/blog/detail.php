<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a1f94a531a4050013671129&product=inline-share-buttons"></script>
<?php
	$facebook_link = get_site_settings('social.facebook_link','value');
	$twitter_link = get_site_settings('social.twitter_link','value');
	$linkedin_link = get_site_settings('social.linkedin_link','value');
	$googleplus_link = get_site_settings('social.googleplus_link','value');
?>
		<section class="step1-section blog-section">
			
			<div class="container">	
				
					
			
				<h1><span class="full"><?php echo $page_title;?></span></h1>						
				<div class="row">
					<!-- Sider Bar -->
					<div class="blog-grid-left col-md-4 col-sm-12 col-xs-12 mobl-blog-grid-left">
					
						
						<!--<div class="blog-search">
							<div class="search-blk dets">
								<input type="text" title="Search" placeholder="Search" class="input">
								<input type="submit" title="Submit" class="input-btn">
							</div>								
						</div>-->	
						
						<div class="blog-categories">	
						
						
							<h2><a class="blg-catg-open" href="javascript:void(0);" title="">Categories</a></h2>
							<div class="blog-menu blog-catg">
								<ul>
									<?php foreach($blog_categories as $k=>$blog_cat){?>
									<?php 
										$class_active = "";
										if($blog_datas['cat_slug'] == $blog_cat['slug']){
											$class_active = "active";
										}
									?> 
									<li><a class="<?php echo $class_active;?>" href="<?php echo base_url("blogs/".$blog_cat['slug']);?>" title="<?php echo $blog_cat['name'];?>" data_cat_id="<?php echo $blog_cat['id'];?>" ><?php echo $blog_cat['name'];?></a></li>	
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="blog-archives">
							<h2><a class="blg-arch-open" href="javascript:void(0);" title="">Archives</a></h2>	
							<div class="blog-menu blg-menu blog-arch">
								<ul>
									<?php foreach($blog_archives as $year=>$months){?>
									<li>
										<a  class="opens blg-toggle" href="javascript:void(0);" title="<?php echo $year;?>"><?php echo $year;?></a>
										<ul class="blg-submenu <?php echo ($blog_datas['year']==$year) ? "show" : "";?>">
											<?php foreach($months as $month_no=>$month){?>
											<?php 
												$data =array('year' => $year,'month' => $month_no);
												$ym_query_string = http_build_query($data);
												if($ym_query_string){
													$ym_query_string = "?".$ym_query_string;
												}
											?>
											<li><a href="<?php echo base_url("blogs/index").$ym_query_string;?>" title="<?php echo $month;?>" class="<?php echo ($blog_datas['month']==$month_no) ? "active" : "";?>"><?php echo $month;?></a></li>
											<?php } ?>
										</ul>	
									</li>	
									<?php } ?>
								</ul>
							</div>
						</div>
						
						<?php 
						foreach($advertisement as $advert){
							if(file_exists(FCPATH.'appdata/ads/'.$advert['image']) && $advert['position_id']==2){
								 $image = base_url('appdata/ads/'.$advert['image']);
						?>
						
						<div class="blog-adds <?php if($advert['is_offer'] == 1){ echo 'has-offer';} ?>">
						<?php if($advert['url'] != ""){ ?>
							<a href="<?php echo $advert['url']; ?>">
								<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>">
							</a>
						<?php }else{ ?>
							<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>">
						<?php } ?>
						</div>
						<?php  } } ?>
						
					</div>
					<!-- Sider Bar -->
					<!-- 2 -->				
					<div class="blog-grid details col-md-8 col-sm-12 col-xs-12">
						<!-- Blog Adds -->
						<?php 
							//pr($advertisement);die;
							foreach($advertisement as $advert){
								if(file_exists(FCPATH.'appdata/ads/'.$advert['image']) && $advert['position_id']==3){
									 $image = base_url('appdata/ads/'.$advert['image']);
							?>
							
							<div class="row <?php if($advert['is_offer'] == 1){ echo 'has-offer';} ?>" >
							<?php if($advert['url'] != ""){ ?>
								<a href="<?php echo $advert['url']; ?>">
									<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>" style="padding-bottom:10px">
								</a>
							<?php }else{ ?>
								<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>">
							<?php } ?>
							</div>
						<?php  } } ?>					
						<!-- Blog Adds -->
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<div class="blog-prv-next desk-view">
								<?php 
									$cat_slug = ""; 
									if($this->uri->segment(4)){
										$cat_slug = "/".$this->uri->segment(4); 
									}
									$query_string = '';
								if($this->input->get('year') || $this->input->get('month')){
									$query_string .= '?';
									if($this->input->get('year')){
										$query_string .= 'year='.$this->input->get('year');
										if($this->input->get('month')){
											$query_string .= '&';
										}
									}
									if($this->input->get('month')){
										$query_string .= 'month='.$this->input->get('month');
									}
									
								}
								?>
								
								<?php if($previous_record){ ?>
								<a class="left-btn" href="<?php echo base_url("blogs/detail/".$previous_record['slug'].$cat_slug.$query_string);?>" title="Previous">Previous</a>
								<?php } ?>
								<?php if($next_record){ ?>
								<a class="right-btn active" href="<?php echo base_url("blogs/detail/".$next_record['slug'].$cat_slug.$query_string);?>" title="Next">Next</a>	
								<?php } ?>
								
								
							</div>
							<h2><?php echo  $blog_datas['title'];?></h2>
							<h3><i>by</i> <b><?php echo $blog_datas['display_name'];?></b> <span><?php echo date("d M Y", strtotime($blog_datas['created']));?></span></h3>							
							<div class="left col-md-12 col-sm-12 col-xs-12">
								<div class="imgs">
									<!--<img src="<?php echo base_url("appdata/blogs/".$blog_datas['image']);?>">-->
									<?php
									if($blog_datas['image']){
									$img_src = thumb(FCPATH.'appdata/blogs/'.$blog_datas['image'] ,'755', '444', 'thumb_755_444',$maintain_ratio = TRUE);
									$img_prp = array('src' => base_url().'appdata/blogs/'.'thumb_755_444/'.$img_src, 'alt' => $blog_datas['image'], 'title' => $blog_datas['image']);
									echo img($img_prp);
									}
									?>
								</div>
								<div class="listing">
									<a href="" class="likes blogs_like" data-blog_id="<?php echo $blog_datas['id'];?>" title="Like" id="like-<?php echo $blog_datas['id'];?>"><?php echo $blog_datas['user_blog_liked_count'];?></a>
									<i>&nbsp;</i>
									<a href="javascript:void(0);" class="views" title="Views"><?php echo  $blog_datas['view_count'];?></a>
								</div>	
							</div>
							<div class="right col-md-12 col-sm-12 col-xs-12">									
								<?php echo $blog_datas['description'];?>
							</div>
							<div class="blog-social">
								<div class="sharethis-inline-share-buttons"  data-url="<?php echo base_url("blogs/detail/".$blog_datas['slug']);?>" data-title="<?php echo  $blog_datas['title'];?>" data-image="<?php echo base_url("appdata/blogs/".$blog_datas['image']);?>" data-description="<?php echo $blog_datas['description'];?>"></div>
							</div>
							
							<div class="blog-prv-next mobs-view">
								<?php 
									$cat_slug = ""; 
									if($this->uri->segment(4)){
										$cat_slug = "/".$this->uri->segment(4); 
									}
									$query_string = '';
								if($this->input->get('year') || $this->input->get('month')){
									$query_string .= '?';
									if($this->input->get('year')){
										$query_string .= 'year='.$this->input->get('year');
										if($this->input->get('month')){
											$query_string .= '&';
										}
									}
									if($this->input->get('month')){
										$query_string .= 'month='.$this->input->get('month');
									}
									
								}
								?>
								
								<?php if($previous_record){ ?>
								<a class="left-btn" href="<?php echo base_url("blogs/detail/".$previous_record['slug'].$cat_slug.$query_string);?>" title="Previous">Previous</a>
								<?php } ?>
								<?php if($next_record){ ?>
								<a class="right-btn active" href="<?php echo base_url("blogs/detail/".$next_record['slug'].$cat_slug.$query_string);?>" title="Next">Next</a>	
								<?php } ?>
								
								
							</div>
						</div>			
					</div>	
					<!-- 2 -->
					<!-- Sider Bar -->
					<div class="blog-grid-left col-md-4 col-sm-12 col-xs-12 desk-blog-grid-left">
						<!--<div class="blog-search">
							<div class="search-blk dets">
								<input type="text" title="Search" placeholder="Search" class="input">
								<input type="submit" title="Submit" class="input-btn">
							</div>								
						</div>-->						
						<div class="blog-categories">
							<h2>Categories</h2>
							<div class="blog-menu">
								<ul>
									<?php foreach($blog_categories as $k=>$blog_cat){?>
									<?php 
										$class_active = "";
										if($blog_datas['cat_slug'] == $blog_cat['slug']){
											$class_active = "active";
										}
									?> 
									<li><a class="<?php echo $class_active;?>" href="<?php echo base_url("blogs/".$blog_cat['slug']);?>" title="<?php echo $blog_cat['name'];?>" data_cat_id="<?php echo $blog_cat['id'];?>" ><?php echo $blog_cat['name'];?></a></li>	
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="blog-archives">
							<h2>Archives</h2>
							<div class="blog-menu blg-menu">
								<ul>
									<?php foreach($blog_archives as $year=>$months){?>
									<li>
										<a  class="opens blg-toggle" href="javascript:void(0);" title="<?php echo $year;?>"><?php echo $year;?></a>
										<ul class="blg-submenu <?php echo ($blog_datas['year']==$year) ? "show" : "";?>">
											<?php foreach($months as $month_no=>$month){?>
											<?php 
												$data =array('year' => $year,'month' => $month_no);
												$ym_query_string = http_build_query($data);
												if($ym_query_string){
													$ym_query_string = "?".$ym_query_string;
												}
											?>
											<li><a href="<?php echo base_url("blogs/index").$ym_query_string;?>" title="<?php echo $month;?>" class="<?php echo ($blog_datas['month']==$month_no) ? "active" : "";?>"><?php echo $month;?></a></li>
											<?php } ?>
										</ul>	
									</li>	
									<?php } ?>
								</ul>
							</div>
						</div>
						
						<?php 
						foreach($advertisement as $advert){
							if(file_exists(FCPATH.'appdata/ads/'.$advert['image']) && $advert['position_id']==2){
								 $image = base_url('appdata/ads/'.$advert['image']);
						?>
						
						<div class="blog-adds <?php if($advert['is_offer'] == 1){ echo 'has-offer';} ?>">
						<?php if($advert['url'] != ""){ ?>
							<a href="<?php echo $advert['url']; ?>">
								<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>">
							</a>
						<?php }else{ ?>
							<img src="<?php echo $image; ?>" alt="<?php echo $advert['name']; ?>">
						<?php } ?>
						</div>
						<?php  } } ?>
						
					</div>
					<!-- Sider Bar -->
				</div>				
			</div>
		</section>	