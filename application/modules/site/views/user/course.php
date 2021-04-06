<!-- My Cource -->
<div class="col-md-8 col-sm-12 col-xs-12">
<div class="my_acc_content">
	<h2 class="sub_page_title"><?php echo $page_sub_heading; ?></h2>
	<div class="content_inner my_course_sec col-md-10 col-sm-12 col-xs-12">
		<?php if(count($my_courses) > 0){ ?>
		<ul>
		<?php
		//pr($my_courses);
		foreach($my_courses as $customer_course){ 
			
		?>
			<li>
				<div class="course_details">
					
					<?php 
					
						if($customer_course['product_type']==1){	
							$courses_icons = "step".$customer_course['products'].".png";			
							echo "<h6 class='step_count'><img src=".base_url()."assets/site/images/courses-icons/".$courses_icons."></h6>";
						}elseif($customer_course['product_type']==7){	
							$courses_icons = $customer_course['product_table_slug'].".png";
							echo "<h6 class='step_count'><img src=".base_url()."assets/site/images/courses-icons/".$courses_icons."></h6>";
						}elseif($customer_course['product_type']==8){		
							echo "<h6 class='step_count'>".$customer_course['product_table_name']."</h6>";							
						}else{	
							$courses_icons = $customer_course['product_type'].".png";
							echo "<h6 class='step_count'><img src=".base_url()."assets/site/images/courses-icons/".$courses_icons."></h6>";
						}
					?>
					<h4><?php $name = explode("-",$customer_course['product_name']);  $name = str_replace("_"," ",trim(end($name))); echo $final_name = ucfirst($name); ?></h4>
					<p>You've purchased <?php echo $final_name; ?>. Get started to learn more of what you want.</p>
					
					<!-- Steps & hand -->
					<?
					$current_date = date('Y-m-d h:i:s');
					if($customer_course['expiry_date'] == '0000-00-00 00:00:00'){
						
					}else{
					if(strtotime($customer_course['expiry_date']) > strtotime($current_date)){ ?>
					<?php
					$order_id =  urlencode(base64_encode($customer_course['id']));
					$default = 0;
					$url="javascript:void(0)";
					switch($customer_course['product_slug']){
						case 'cs-handbook': $url = base_url('ebook/cs-handbook'); break;
						case 'silver-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'gold-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'diamond-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'platinum-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'step1': $url = base_url('cs-steps/step1'); break;
						case 'step2': $url = base_url('cs-steps/step2'); break;
						case 'step3': $url = base_url('cs-steps/step3'); break;
						case 'step4': $url = base_url('cs-steps/step4'); break;
						case 'step5': $url = base_url('cs-steps/step5'); break;
						case 'step6': $url = base_url('cs-steps/step6'); break;
						case 'combo-package': $url = base_url('cs-steps/step1'); break;
						default : $default = 1;break;
					}
					if($default == 0){
					?>
					<!--<a target="_blank" href="<?php echo $url; ?>" title="Get Started">Get Started </a>-->
					<?php }else if($customer_course['product_slug'] == 'silver' || $customer_course['product_slug'] == 'gold' || $customer_course['product_slug'] == 'diamond' || $customer_course['product_slug'] == 'platinum' || $customer_course['product_slug'] == 'complete-comprehensive-course' || $customer_course['product_slug'] == 'rapid-review-course'){ ?>
						<p class="steps-link"><a target="_blank" href="<?php echo base_url('cs-steps/step1'); ?>" title="Get Started">Steps </a></p>
						<p class="steps-link"><a target="_blank" href="<?php echo base_url('ebook/cs-handbook'); ?>" title="Cs handbook">Handbook </a></p>
					<?php 
					}						
					}else{ ?>
					<!--<span>Expired</span>-->
					<?php } } ?>
					
					<!-- Steps & hand -->
					<?php
						$join_tables = array();
						$where = array();
						$where[] = array( TRUE,"uts.user_id",$customer_course['user_id']); 
						$where[] = array( TRUE,"uts.order_id",$customer_course['id']); 
						$join_tables[] = array('users_batch_time_slot ubts','ubts.user_time_slot_id=uts.id','left');
						$fields = "ubts.class_id,ubts.date_time";
						$users_time_slot = $this->base_model->get_advance_list('users_time_slot uts', $join_tables, $fields, $where, 'result_array', 'ubts.class_id', 'asc', 'ubts.id');
						//echo $this->db->last_query();						
						//pr($users_time_slot);
						if($users_time_slot){
						echo "<h4 class='my-cours-cls-hd'>Time Slot</h4>"; 
						echo "<p class='my-cours-cls'>"; 
						foreach($users_time_slot as $val){
							echo "<span>Class ".$val['class_id']." : ".$val['date_time']."</span>";
						}
						echo "</p>"; 
						}
					?>
				</div>
				<div class="duration-info">
					<p>Start Date: <span><?php echo date('d/m/Y',strtotime($customer_course['created'])); ?></span></p>
					
					<p>Valid Till: <span>
					<?php if($customer_course['expiry_date'] == '0000-00-00 00:00:00'){ echo 'N/A'; }else{ ?>
					<?php if($customer_course['expiry_date']!=""){ echo date('d/m/Y',strtotime($customer_course['expiry_date'])); }else{ echo 'N/A';}?></span></p>
					<?php 
					}
					$current_date = date('Y-m-d h:i:s');
					if($customer_course['expiry_date'] == '0000-00-00 00:00:00'){
						
					}else{
					if(strtotime($customer_course['expiry_date']) > strtotime($current_date)){ ?>
					<?php
					$order_id =  urlencode(base64_encode($customer_course['id']));
					$default = 0;
					$url="javascript:void(0)";
					switch($customer_course['product_slug']){
						case 'cs-handbook': $url = base_url('ebook/cs-handbook'); break;
						case 'silver-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'gold-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'diamond-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'platinum-plan': $url = base_url('cs-steps/step1'); $default = 1; break;
						case 'step1': $url = base_url('cs-steps/step1'); break;
						case 'step2': $url = base_url('cs-steps/step2'); break;
						case 'step3': $url = base_url('cs-steps/step3'); break;
						case 'step4': $url = base_url('cs-steps/step4'); break;
						case 'step5': $url = base_url('cs-steps/step5'); break;
						case 'step6': $url = base_url('cs-steps/step6'); break;
						case 'combo-package': $url = base_url('cs-steps/step1'); break;
						default : $default = 1;break;
					}
					if($default == 0){
					?>
					<a target="_blank" href="<?php echo $url; ?>" title="Get Started">Get Started </a>
					<?php }else if($customer_course['product_slug'] == 'silver' || $customer_course['product_slug'] == 'gold' || $customer_course['product_slug'] == 'diamond' || $customer_course['product_slug'] == 'platinum' || $customer_course['product_slug'] == 'complete-comprehensive-course' || $customer_course['product_slug'] == 'rapid-review-course'){ ?>
						<!--<a target="_blank" href="<?php echo base_url('cs-steps/step1'); ?>" title="Get Started">Steps </a> |
						<a target="_blank" href="<?php echo base_url('ebook/cs-handbook'); ?>" title="Cs handbook">Handbook </a>-->
					<?php 
					}						
					}else{ ?>
					<span>Expired</span>
					<?php } } ?>
				</div>
			</li>
		<?php } ?>
			
		</ul>
		<?php }else{ ?>
		<div class="list-block col-md-12 col-sm-12 col-xs-12">
			<div class="left col-md-5 col-sm-12 col-xs-12 no-record">No Courses Found.</div>
		</div>
		<?php } ?>
	</div>
	<div class="pagination-blks">
			
			<?php if(count($my_courses) > 0){ ?>
			<?php echo $this->pagination->create_links(); ?> 
			<?php } ?>
			
		</div>
  </div>
 </div>
<!-- My Cource -->