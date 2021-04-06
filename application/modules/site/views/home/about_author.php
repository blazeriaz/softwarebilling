<div class="container">
	<div id="tab_cshandbook" class="tab_cshandbook-blk">
		<div class="row" id="home_section2_inner1">
			<div class="home_cshandbook">
				<!--<h2><?php //echo $cs_product['content_one']; ?></h2>
				<h3><?php //echo $cs_product['content_two']; ?></h3>-->
				<h2><?php echo $about_author['cs_handbook.book_name']; ?></h2>
				<h3><?php //echo $about_author['cs_handbook.author_name']; ?></h3>
			</div>
			<ul class="home_author_list">
				<li class="current"><a href="#about_author" class="abt_author">About Author</a></li>
				<li><a href="#author_description" class="abt_author">Description</a></li>
				<li><a href="#author_review" class="abt_author">Reviews</a></li>
			</ul>
		</div>
		<div class="row" id="home_section2_inner2">
			<div class="img_cashbook">			
				<img src="<?php echo base_url();?>appdata/settings/<?php echo $about_author['cs_handbook.home_image']; ?>" alt="">
				<h4><span class="buy_amount">$<?php echo $cs_product['price']; ?></span><a href="<?php echo base_url('cs-handbook'); ?>" title="Buy Now"><span class="buy_btn">Buy Now</span></a></h4>
			</div>
			<div id="about_author" class="cshandbook-tabs">
				<?php
				$image_dir_path = FCPATH.'appdata/settings/'.$about_author['cs_handbook.author_image'];
				$img_src = thumb($image_dir_path ,'315', '395', 'thumb_img',$maintain_ratio = TRUE);
				$resized_image = base_url() . 'appdata/settings/thumb_img/'.$img_src;
				?>
				<img src="<?php echo base_url();?>appdata/settings/<?php echo $about_author['cs_handbook.author_image']; ?>" alt="author image">
				
				<?php /* <img src="<?php echo $resized_image; ?>" alt="author image target usmle">*/ ?>
				<h2><?php echo $about_author['cs_handbook.author_name']; ?></h2>
				<?php echo $about_author['cs_handbook.about_author']; ?>
				
				<div class="home_email">
					<form name="sample_email_form" class="sample_email_form" id="sample_email_form" action="<?php echo base_url().'site/home/send_sample_email'; ?>" >
						<input type="text" name="sample_email_id" id="sample_email_id" class="sample_email_id mail-css"  placeholder="Enter Email ID (Download free samples)" />
						<input type="submit" name="sample_submit" id="sample_submit" class="sample_submit mail-btn" value="submit" />
						<span class="sample_msg"></span>
					</form>
				</div>		
			</div>
			<div id="author_description" class="cshandbook-tabs">							
				<?php echo $about_author['cs_handbook.description']; ?>							
			</div>
			<div id="author_review" class="cshandbook-tabs">						
				<?php echo $about_author['cs_handbook.reviews']; ?>							
			</div>
		</div>
	</div>
</div>	