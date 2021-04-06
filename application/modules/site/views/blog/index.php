		
		<section class="step1-section blog-section">
			<div class="container">				
				<h1><span class="full"><?php echo $page_title;?></span></h1>						
				<div class="row">
				
					<!-- Sider Bar -->
					<div class="blog-grid-left col-md-4 col-sm-12 col-xs-12 mobl-blog-grid-left">
						<div class="blog-search">
							<div class="search-blk">
							<?php
								$search_slug = $this->uri->segment(2) ? $this->uri->segment(2) : "index";								
							?>
							<!--<form action="<?php echo base_url("blogs/".$search_slug);?>" class="blog_search" method="post">-->	
							<form action="<?php echo base_url("blogs");?>" class="blog_search" method="post">
								<input type="text" title="Search" placeholder="Search" name="search" class="input" value="<?php echo $get_blog_search;?>">
								<input type="submit" title="Submit" class="input-btn">
							</form> 
							</div>								
						</div>
						<?php if($blog_most_liked){ ?>
						<div class="blog-popular">
							<h2><a class="blg-poplr-open" href="javascript:void(0);" title="">Popular Post</a></h2>
							<div class="blog-menu blog-poplr">
								<ul>
									<?php foreach($blog_most_liked as $k=>$most_liked){?>
									<li>
										<div class="imgs">
											<a href="javascript:void(0)">
												<!--<img src="<?php echo base_url("appdata/blogs/".$most_liked['image']);?>">-->
												<?php
												$file_exist = file_exists(FCPATH.'appdata/blogs/'.$most_liked['image']);
												if($file_exist && $most_liked['image']){
												$img_src = thumb(FCPATH.'appdata/blogs/'.$most_liked['image'] ,'88', '77', 'thumb_88_77',$maintain_ratio = TRUE);
												$img_prp = array('src' => base_url().'appdata/blogs/'.'thumb_88_77/'.$img_src, 'alt' => $most_liked['image'], 'title' => $most_liked['image']);
												echo img($img_prp);
												}
												?>
											</a>
										</div>
										<div class="txt">
											<h3><a href="<?php echo base_url("blogs/detail/".$most_liked['id']);?>" title=""><?php echo $most_liked['title'];?></a></h3>
											<p><?php echo $most_liked['category_name'];?></p>
										</div>
									</li>
									<?php } ?>	
								</ul>
							</div>
						</div>
						<?php } ?>
						<div class="blog-categories">							
							<h2><a class="blg-catg-open" href="javascript:void(0);" title="">Categories</a></h2>
							<div class="blog-menu blog-catg">
								<ul>
									<?php foreach($blog_categories as $k=>$blog_cat){?>
									<?php 
										$url_slug = $this->uri->segment(2);
										$class_active = "";
										if($url_slug && $url_slug == $blog_cat['slug']){
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
										<ul class="blg-submenu <?php echo ($this->input->get("year")==$year) ? "show" : "";?>">
											<?php foreach($months as $month_no=>$month){?>
											<?php 
												$data =array('year' => $year,'month' => $month_no);
												$ym_query_string = http_build_query($data);
												if($ym_query_string){
													$ym_query_string = "?".$ym_query_string;
												}
											?>
											<li><a href="<?php echo base_url("blogs/index").$ym_query_string;?>" title="<?php echo $month;?>" class="<?php echo ($this->input->get("month")==$month_no) ? "active" : "";?>"><?php echo $month;?></a></li>
											<?php } ?>
										</ul>	
									</li>	
									<?php } ?>
								</ul>
							</div> 
						</div>
					</div>
					<!-- Sider Bar -->
					<!-- 2 -->				
					<div class="blog-grid col-md-8 col-sm-12 col-xs-12">
						
						<!-- Blog Adds -->
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
						<!-- Blog Adds -->
						
						<?php 
						
						foreach($blog_categorie_datas as $k=>$blog_datas){?>
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<?php 
								$cat_slug = ""; 
								if($this->uri->segment(2)){
									$cat_slug = "/".$this->uri->segment(2); 
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
							<h2><a href="<?php echo base_url("blogs/detail/".$blog_datas['slug'].$cat_slug.$query_string);?>" title="<?php echo $blog_datas['title'];?>"><?php echo  $blog_datas['title'];?></a></h2>
							<h3><i>by</i> <b><?php echo $blog_datas['display_name'];?></b> <span><?php echo date("d M Y", strtotime($blog_datas['created']));?></span></h3>	
							<?php
							if($blog_datas['image']){ 
							?>						
							<div class="left col-md-5 col-sm-12 col-xs-12">		
								<div class="imgs">
									<a href="<?php echo base_url("blogs/detail/".$blog_datas['slug'].$cat_slug.$query_string);?>">
										<!--<img src="<?php echo base_url("appdata/blogs/".$blog_datas['image']);?>">-->
										<?php											
											$file_exist = file_exists(FCPATH.'appdata/blogs/'.$blog_datas['image']);
											if($file_exist && $blog_datas['image']){
											$img_src = thumb(FCPATH.'appdata/blogs/'.$blog_datas['image'] ,'306', '231', 'thumb_306_231',$maintain_ratio = TRUE);
											$img_prp = array('src' => base_url().'appdata/blogs/'.'thumb_306_231/'.$img_src, 'alt' => $blog_datas['image'], 'title' => $blog_datas['image']);
											echo img($img_prp);
											}
										?>
									</a>
								</div>
								<div class="listing">
									<a href="javascript:void(0);" class="likes blogs_like" data-blog_id="<?php echo $blog_datas['id'];?>" title="Like" id="like-<?php echo $blog_datas['id'];?>"><?php echo $blog_datas['user_blog_liked_count'];?></a>
									<i>&nbsp;</i>
									<a href="" class="views" title="Views"><?php echo  $blog_datas['view_count'];?></a>
								</div>		
							</div>
							<div class="right col-md-7 col-sm-12 col-xs-12">									
								<!--<p class="trimmed_content"><?php //echo substr($blog_datas['description'],0,130);?></p>-->
								<!--<div class="trimmed_content"><?php echo $blog_datas['short_description'];?></div>
								<div class="full-content hide"><?php echo $blog_datas['description'];?></div>
								<a class="read_more_link" href="javascript:void(0);" title="Readmore...">Readmore...</a>-->
								<div class="trimmed_content"><?php echo $blog_datas['short_description'];?></div>
								<a class="read_more" href="<?php echo base_url("blogs/detail/".$blog_datas['slug'].$cat_slug.$query_string);?>" title="Readmore...">Readmore...</a>
							</div>							
							<?php }else{ ?>
							<div class="right blog-txts col-md-12 col-sm-12 col-xs-12">									
								
								
								
								
								<div class="trimmed_content"><?php echo $blog_datas['short_description'];?></div>
								
								<a class="read_more" href="<?php echo base_url("blogs/detail/".$blog_datas['slug'].$cat_slug.$query_string);?>" title="Readmore...">Readmore...</a>
								
								<div class="left">
								<div class="listing">
									<a href="javascript:void(0);" class="likes blogs_like" data-blog_id="<?php echo $blog_datas['id'];?>" title="Like" id="like-<?php echo $blog_datas['id'];?>"><?php echo $blog_datas['user_blog_liked_count'];?></a>
									<i>&nbsp;</i>
									<a href="" class="views" title="Views"><?php echo  $blog_datas['view_count'];?></a>
								</div>
								</div>
								
							</div>							
							<?php } ?>
						</div>	
						<?php } ?>
						
						<?php if(count($blog_categorie_datas) == 0){ ?>
						<div class="list-block col-md-12 col-sm-12 col-xs-12">
							<div class="left col-md-5 col-sm-12 col-xs-12 no-record">No Blogs Found</div>
						</div>
						<?php } ?>		
						
						<!-- Pagination -->
						<div class="pagination-blks">
							<?php if(count($blog_categorie_datas) > 0){ ?>
							<?php echo $this->pagination->create_links(); ?>
							<?php } ?>												
						</div>
						<!-- Pagination -->						
					</div>	
					<!-- 2 -->
					<!-- Sider Bar -->
					<div class="blog-grid-left col-md-4 col-sm-12 col-xs-12 desk-blog-grid-left">
						<div class="blog-search">
							<div class="search-blk">
							<?php
								$search_slug = $this->uri->segment(2) ? $this->uri->segment(2) : "index";								
							?>
							<!--<form action="<?php echo base_url("blogs/".$search_slug);?>" class="blog_search" method="post">-->	
							<form action="<?php echo base_url("blogs");?>" class="blog_search" method="post">
								<input type="text" title="Search" placeholder="Search" name="search" class="input" value="<?php echo $get_blog_search;?>">
								<input type="submit" title="Submit" class="input-btn">
							</form> 
							</div>								
						</div>
						<?php if($blog_most_liked){ ?>
						<div class="blog-popular">
							<h2>Popular Post</h2>
							<div class="blog-menu">
								<ul>
									<?php foreach($blog_most_liked as $k=>$most_liked){?>
									<li>
										<div class="imgs">
											<a href="javascript:void(0)">
												<!--<img src="<?php echo base_url("appdata/blogs/".$most_liked['image']);?>">-->
												<?php
												$file_exist = file_exists(FCPATH.'appdata/blogs/'.$most_liked['image']);
												if($file_exist && $most_liked['image']){
												$img_src = thumb(FCPATH.'appdata/blogs/'.$most_liked['image'] ,'88', '77', 'thumb_88_77',$maintain_ratio = TRUE);
												$img_prp = array('src' => base_url().'appdata/blogs/'.'thumb_88_77/'.$img_src, 'alt' => $most_liked['image'], 'title' => $most_liked['image']);
												echo img($img_prp);
												}
												?>
											</a>
										</div>
										<div class="txt">
											<h3><a href="<?php echo base_url("blogs/detail/".$most_liked['id']);?>" title=""><?php echo $most_liked['title'];?></a></h3>
											<p><?php echo $most_liked['category_name'];?></p>
										</div>
									</li>
									<?php } ?>	
								</ul>
							</div>
						</div>
						<?php } ?>
						<div class="blog-categories">
							<h2>Categories</h2>
							<div class="blog-menu">
								<ul>
									<?php foreach($blog_categories as $k=>$blog_cat){?>
									<?php 
										$url_slug = $this->uri->segment(2);
										$class_active = "";
										if($url_slug && $url_slug == $blog_cat['slug']){
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
										<ul class="blg-submenu <?php echo ($this->input->get("year")==$year) ? "show" : "";?>">
											<?php foreach($months as $month_no=>$month){?>
											<?php 
												$data =array('year' => $year,'month' => $month_no);
												$ym_query_string = http_build_query($data);
												if($ym_query_string){
													$ym_query_string = "?".$ym_query_string;
												}
											?>
											<li><a href="<?php echo base_url("blogs/index").$ym_query_string;?>" title="<?php echo $month;?>" class="<?php echo ($this->input->get("month")==$month_no) ? "active" : "";?>"><?php echo $month;?></a></li>
											<?php } ?>
										</ul>	
									</li>	
									<?php } ?>
								</ul>
							</div> 
						</div>
					</div>
					<!-- Sider Bar -->
				</div>				
			</div>
		</section>
		<!--<style>
			.hide {
				display: none !important;
			}
		</style>-->