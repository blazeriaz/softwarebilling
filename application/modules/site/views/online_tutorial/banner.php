<?php 
	if(isset($slider[0])){
	$slider = $slider[0];

	echo "<img src='".base_url().'appdata/banners/'.$slider['file_name']."'>";	
?>

	<h2><a class="popup_iframe iframe onltour-banner-btn" href="https://www.youtube.com/embed/G31GpHcFRps" title="Play">Play</a> <?php echo $page_title; ?></h2>
	
<?php } ?>