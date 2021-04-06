
<div id="preloader"></div>
<div class="step1-section-right step4 col-md-9 col-sm-8 col-xs-12">						
						<h3><span><?php echo $current_heading; ?><span></h3>
						<p>Click on the Symptoms below for Differential Diagnosis</p>
						<?php if(count($step_four_content)> 0){ ?>
						<ul id="sub_category">
						<?php $j=1; foreach($step_four_content as $category){ ?>
							<li><a class="<?php /*if($j==1){ ?>active<?php } */?> sub-main-cat" data-tab="<?php echo $j; ?>" href="javascript:void(0);" title="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></a></li>
						<?php $j++; } ?>
							
						</ul>
						<?php } ?>
						
						<!--<a class="practice-exam-link" href="javascript:void(0);" Title="Practice Exam">Practice Exam</a>-->
						<div class="step4-block">
						<?php $k =1; foreach($step_four_content as $subcategory){ ?>
						<div class="step-four-tab-section" id="tabbing_<?php echo $k; ?>" style="display:none;">
							<div class="step4-left col-md-5 col-sm-12 col-xs-12">
								<div class="top">
									<h3><?php echo $subcategory['category_name']; ?></h3>
								</div>
								<div class="bot"> 
									<ul>
									<?php $l=1; foreach($subcategory['micro_category'] as $micro_category){ ?>
										<li class="<?php if(count($micro_category['mini_category']) > 0){ ?> has_mini_category <?php } ?>" >
											<a data-tab="<?php echo $l; ?>" data-catid="<?php echo $micro_category['id']; ?>" href="javascript:void(0);" title="<?php echo $micro_category['category_name']; ?>" class="<?php /*if($l==1){ ?> active <?php }*/ ?> sub-tab-sel subtab-cathd">
											<?php echo $micro_category['category_name']; ?>
											</a>
											<?php
											if(count($micro_category['mini_category']) > 0){ ?>
											<ul class="mini-category">
											<?php foreach($micro_category['mini_category'] as $mini_cateory){ ?>
												<li>
													<a data-tab="<?php echo $l; ?>" data-catid="<?php echo $mini_cateory['id']; ?>" href="javascript:void(0);" title="<?php echo $mini_cateory['category_name']; ?>" class="<?php if($l==1){ ?> active <?php } ?> sub-tab-sel">
														<?php echo $mini_cateory['category_name']; ?>
													</a>
												</li>
											<?php } ?>
											</ul>
											<?php } ?>
										</li>
										
									<?php $l++;} ?>
									</ul>
								</div>
							</div>
							<div class="step4-right col-md-7 col-sm-12 col-xs-12">
							
								<?php $m = 1; foreach($subcategory['micro_category'] as $micro_category){ ?>
								<div id="sub_tab_<?php echo $m; ?>_<?php echo $micro_category['id']; ?>" class="step4-right-normal sub_all_tabs" style="display:none;">
									<h4><?php echo $micro_category['category_name']; ?></h4>
									<div class="top">
										<table><thead><tr><th><h3>History</h3></th><th><h3>Physical Exam</h3></th></tr></thead></table>		
									</div>
									
									<?php echo $micro_category['description'];?>						
								</div>
								
								<?php if(count($micro_category['mini_category']) > 0){ ?>
								<?php foreach($micro_category['mini_category'] as $mini_cateory){ ?>
									<div id="sub_tab_<?php echo $m; ?>_<?php echo $mini_cateory['id']; ?>" class="step4-right-normal sub_all_tabs" style="display:none;">
									<h4><?php echo $mini_cateory['category_name']; ?></h4>
									<div class="top">
										<table><thead><tr><th><h3>History</h3></th><th><h3>Physical Exam</h3></th></tr></thead></table>		
									</div>
									
									<?php echo $mini_cateory['description'];?>						
								</div>
								<?php } ?>
								<?php } ?>
								
								<?php $m++;} ?>
								
								<a class="practice-exam-link" href="javascript:void(0);" Title="Practice Exam">Practice Exam</a>					
								
								<div class="step4-right-practice-exam">
									<div class="top">
										<table>
											<thead>
												<tr>
													<th><h3>History</h3></th>
													<th><h3>Physical Exam</h3></th>
												</tr>
											</thead>
										</table>		
									</div>
									<div class="bot"> 
										<table>
											<tbody>
												<tr>
													<td><textarea></textarea></td>
													<td><textarea></textarea></td>
												</tr>
												<tr>
													<td><textarea></textarea></td>
													<td><textarea></textarea></td>
												</tr>
												<tr>
													<td><textarea></textarea></td>
													<td><textarea></textarea></td>
												</tr>
												<tr>
													<td><textarea></textarea></td>
													<td><textarea></textarea></td>
												</tr>											
											</tbody>										
										</table>															
									</div>	
									<!--<div class="step1-btns">
										<a href="javascript:void(0);" title="Hide" class="hidebtn practice-exam-hide">Hide</a>																	
									</div>-->
								
								</div>
							</div>
							
							
							</div>
						<?php $k++; } ?>
							
							
							
							<div class="step1-btns" id="page-load-navigation" style="display:none;">
							<?php if($next_url!=""){ ?>
								<a href="<?php echo $next_url; ?>" title="Next" class="next">Next</a>
							<?php } ?>	
							<?php if($prev_url!=""){ ?>
								<a href="<?php echo $prev_url; ?>" title="Back" class="back">Back</a>
								<?php } ?>
							</div>
							
							<div class="step1-btns" id="script-navigation">
							<a href="javascript:void(0)" id="script_next" data-tab="1" title="Next" class="next">Next</a>
							<a href="<?php echo $prev_url; ?>" id="script_back" data-tab="0" title="Back" class="back">Back</a>
							</div>
							
						</div>
					</div>

<style>
	#preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #0c0c0c00 url('<?php echo base_url('assets/images/targetusm.gif'); ?>') no-repeat center center; }
</style>
<script>
jQuery(document).ready(function($) {  

$(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).hide();});
});
$('html, body').animate({
        scrollTop: $(".step-menu").offset().top
  }, 1000);

$('.practice-exam-link').click(function(){
	var main_tab_id = $('#sub_category li a.active').data('tab');
	var left_menu_tab = $('#tabbing_'+main_tab_id+' .bot li a.active').attr('data-tab');
	var left_menu_tab_id = $('#tabbing_'+main_tab_id+' .bot li a.active').attr('data-catid');
	
	//$('#sub_tab_'+left_menu_tab+'_'+left_menu_tab_id).hide();
	$('.step4-right-practice-exam textarea').val('');
	$('#tabbing_'+main_tab_id+' .step4-right .step4-right-practice-exam').show();
	
});

$('.practice-exam-hide').click(function(){
	
	$('.step4-right-practice-exam .bot textarea').val('');
	
	var main_tab_id = $('#sub_category li a.active').data('tab');
	var left_menu_tab = $('#tabbing_'+main_tab_id+' .bot li a.active').attr('data-tab');
	var left_menu_tab_id = $('#tabbing_'+main_tab_id+' .bot li a.active').attr('data-catid');
	
	var micro_selector = '#sub_tab_'+left_menu_tab+'_'+left_menu_tab_id;
	$(micro_selector).show();
	
	$('#tabbing_'+main_tab_id+' .step4-right .step4-right-practice-exam').hide();
});	

//$("#tabbing_1").show();
//$("#sub_tab_1").show();
$('.sub-main-cat').click(function(){
	
	
	$('.sub-main-cat').removeClass('active');
	$(this).addClass('active');
	var current_tab = $(this).data('tab');
	var total_len = $('#sub_category li').length;
	
	if(current_tab == 1){
		$('#script_back').attr('href','<?php echo $prev_url; ?>');
	}else{
		$('#script_back').attr('href','javascript:void(0)');
	}
	
	if(total_len == current_tab){
		$('#script_next').attr('href','<?php echo $next_url; ?>');
	}else{
		$('#script_next').attr('href','javascript:void(0)');
	}
	$('#script_next').data('tab',current_tab)
	$('#script_back').data('tab',current_tab);
	
	var selector = '#tabbing_'+current_tab;
	$('.step-four-tab-section').hide();
	$(selector).show();
	var has_mini_cat = $(selector+' .step4-left .bot ul li:first').hasClass('has_mini_category');
	
	if(has_mini_cat){
		//$(selector+' .bot ul li:first ul li:first a').trigger('click');
	}else{
		//$(selector+' .bot ul li:first a').trigger('click');
	}
	$('.practice-exam-link').hide();
	
});
$('.sub-tab-sel').click(function(){
	//$('.step4-right-practice-exam').hide();
	$('.sub-tab-sel').removeClass('active');
	$(this).addClass('active');
	var current_tab = $(this).data('tab');
	var current_cat_id = $(this).data('catid');
	var selector = '#sub_tab_'+current_tab+'_'+current_cat_id;
	$('.sub_all_tabs').hide();
	$(selector).show();
	
	//$('#tabbing_'+current_tab+' .practice-exam-link').show();
	$('.step4-right .practice-exam-link').show();
	
});


//$('.step4-left .bot ul li:first a').trigger('click');

$('#script_next').click(function(){
	
	$('#preloader').show();
	$('.sub_all_tabs').hide();
	$('.step4-right-practice-exam').hide();
	$('html, body').animate({
        scrollTop: $(".step-menu").offset().top
	}, 1000);
	
	setTimeout(function(){ $('#preloader').hide(); }, 1000);
	
	var total_len = $('#sub_category li').length;
	
	var current_tab = $(this).data('tab') + parseInt(1);
	
	if(current_tab > total_len){
		window.location = '<?php echo $next_url; ?>';
	}
	
	if(current_tab == total_len){
		
		$('#script_next').attr('href','<?php echo $next_url; ?>');
		$('#script_next').data('tab',current_tab);
		$('#script_back').data('tab',$(this).data('tab'));
		$('.sub-main-cat').removeClass('active');
		$("#sub_category").find("[data-tab='" + current_tab + "']").addClass('active');
		$("#sub_category").find("[data-tab='" + current_tab + "']").trigger('click');
		
		return false;
	}else{
	
	$('#script_next').attr('href','javascript:void(0)');
	$('#script_next').data('tab',current_tab);
	$('#script_back').data('tab',$(this).data('tab'));
	$('#script_back').attr('href','javascript:void(0)');
	$('.sub-main-cat').removeClass('active');
	$("#sub_category").find("[data-tab='" + current_tab + "']").addClass('active');
	$("#sub_category").find("[data-tab='" + current_tab + "']").trigger('click');
	}
});

$('#script_back').click(function(){
	$('#preloader').show();
	$('.sub_all_tabs').hide();
	$('.step4-right-practice-exam').hide();
	$('html, body').animate({
        scrollTop: $(".step-menu").offset().top
	}, 1000);
	
	setTimeout(function(){ $('#preloader').hide(); }, 1000);
	//alert("hi");
	if($(this).data('tab') > 1){
		$('#script_next').attr('href','javascript:void(0)');
		var current_tab = $(this).data('tab') - parseInt(1);
		$('.sub-main-cat').removeClass('active');
		if(current_tab == 1){
			$('#script_back').attr('href','<?php echo $prev_url; ?>');
			$('#script_back').data('tab',0);
			$('#script_next').data('tab',current_tab);
			$("#sub_category").find("[data-tab='" + current_tab + "']").addClass('active');
			$("#sub_category").find("[data-tab='" + current_tab + "']").trigger('click');
			return false;
		}
		//alert($(this).data('tab'))
		$('#script_back').data('tab',current_tab);
		$('#script_next').data('tab',current_tab);
		$("#sub_category").find("[data-tab='" + current_tab + "']").addClass('active');
		$("#sub_category").find("[data-tab='" + current_tab + "']").trigger('click');
		//alert(current_tab);
	}
	
	
});


});		
</script>	