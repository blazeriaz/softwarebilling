<?php
	$meta_keywords = get_site_settings('meta.keywords','value');
	$meta_description = get_site_settings('meta.description','value');
?>
<!doctype html>
<html lang="en">
 <head>
  <title><?php echo SITE_NAME; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/site/" ?>favicon.ico" />
  <meta name="format-detection" content="telephone=no">
  <meta name="Keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : $this->config->item('meta_keywords') ; ?>">
  <meta name="Description" content="<?php echo isset($meta_description) ? $meta_description : $this->config->item('meta_description') ; ?>">
 <?php $this->load->view('layout/site/common-header');  ?> 
 </head>
 <body>
  <?php $this->load->view('layout/site/header');  ?> 
		<section id="home_section1">
			<div class="wrapper">
				
				<?php  $this->load->view('layout/site/menu');  ?> 
				
				<?php  $this->load->view('site/home/slider');  ?> 
				
			</div>
		</section>
		
		<section id="home_section2">
			<?php  $this->load->view('site/home/about_author');  ?> 
		</section>
		
		<section class="section3">
			<?php  $this->load->view('site/home/online_video');  ?> 
		</section>
		
		<section class="section4">
			<?php  $this->load->view('site/home/combo_package');  ?>
			
		</section>
		<section class="section5">
			<?php  $this->load->view('site/home/testimonial');  ?>
			
		</section>
	
	
  <?php $this->load->view('layout/site/footer');  ?> 

  	<div id="dialog" title="" style="display:none;">
  		<p><?php echo $this->session->flashdata('flash_success_message'); ?></p>
	</div>

 <script type="text/javascript">
            $(function () {
               $('#vidBox').VideoPopUp({
                	backgroundColor: "#17212a",
                	opener: "video1",
                    maxweight: "340",
                    idvideo: "v1"
				});
				$('#vidBox2').VideoPopUp({
                	backgroundColor: "#17212a",
                	opener: "video2",
                    maxweight: "340",
                    idvideo: "v2",
				});
				$('#vidBox3').VideoPopUp({
                	backgroundColor: "#17212a",
                	opener: "video3",
                    maxweight: "340",
                    idvideo: "v3",
				});
				$('#vidBox4').VideoPopUp({
                	backgroundColor: "#17212a",
                	opener: "video4",
                    maxweight: "340",
                    idvideo: "v4",
				});
				$('#vidBox5').VideoPopUp({
                	backgroundColor: "#17212a",
                	opener: "video5",
                    maxweight: "340",
                    idvideo: "v5"
				});
            });
    </script>
  
 </body>
</html>
