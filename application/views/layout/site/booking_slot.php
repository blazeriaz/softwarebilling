<?php if(!isset($live_mock_exam)){ ?>
<?php $user_data = get_loggedin_user(); ?>
<?php if(isset($assesement_preparation)){
	$display = 'display:none';
}else{
	$display = '';
} ?>
<div class="online-setrgt3 col-md-6 col-sm-6 col-xs-12 booking_section_div" style="<?php echo $display; ?>">
	<h2><?php echo $booking_slot['title']; ?></h2>
	<div class="skypedatime-set">
		<form class="skypedatime" name="coaching_time_slot" id="book_time_slot" method="post" action="<?php echo base_url('book-timeslot'); ?>">
			<div class="form-row">	
				<ul>							
					<li>
						<span id="skype-span" class="numbers active">01</span>
						<div class="form-col colspan1 skypeid">
							<input type="text" name="skypeid" value="<?php echo $user_data['skype_id']; ?>" placeholder="Skype ID"/>
							<span class="error-msg"></span>
						</div> 
					</li>
					<li>
						<span id="date-span" class="numbers">02</span>
						<span class="booking-info-msg-1" style="display:none;">Please select Highlighted Date for ontime booking , otherwise proceed booking and after contact admin for suitable date & time</span>
						<div class="form-col colspan1 date">
							<input type="text" name="date" id="booking_timeslot_date" value="" placeholder="MM/DD/YYYY" readonly />
							<span class="booking-info-msg-2" style="display:none;"></span>
							<span class="error-msg"></span>
						</div>
					</li>
					<li>
						<span id="time-span" class="numbers">03</span>
						<div class="form-col colspan1 select time">	
							
							<select class="" name="time" id="booking_timeslot_time" value="">
								<option value=''>Select Time</option>
							</select>
							
							<span class="error-msg last"></span>
							<span id="time-span-info" class="central-time">Central Time (USA)</span>
						</div>								
					</li>
					
					
					
				</ul>
			</div>	
			<input type="hidden" name="product_id" id="custom_product_id" class="custom_product_id" value="<?php echo $booking_slot['id']; ?>" />
			<input type="hidden" name="product_type" id="custom_product_type" class="custom_product_type" value="" />
			<div class="form-row btn-row">								
				<h4><span class="buy_amount"><?php echo '$'.$booking_slot['price']; ?></span> 
					<a href="javascript:void(0)" class="<?php echo $booking_slot['class_name'];?>" title="Proceed To payment">
						<span class="buy_btn <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?>">Proceed To payment</span>
					</a>
				</h4>
			</div>
			
		</form>
	</div>					
</div>

<?php }else{ ?>

<div class="online-setrgt3 col-md-6 col-sm-6 col-xs-12 booking_section_div">
	<h2><?php echo $booking_slot['title']; ?></h2>
	<div class="skypedatime-set">
		<form class="skypedatime live_mock_booking" name="book_time_slot" id="book_time_slot" action="<?php echo base_url('book-livemock'); ?>">
			<div class="form-row">	
				<ul>							
					<li>
						<?php
							$start_time = get_site_settings('live_mock_exam.start_time','value');
							$end_time = get_site_settings('live_mock_exam.end_time','value');

							$time = $start_time.' to '.$end_time;
							//$time = '8 AM to 5 PM';
						?>
						<span class="numbers time-span active">01</span>
						<div class="form-col colspan1 time">
							
							<input type="text" name="livemock_time" id="livemock_time" value="<?php echo $time; ?>" placeholder="" readonly disabled/>
							<span class="error-msg"></span>
							<span class="time-info info central-time">Local Time</span>
						</div>
					</li>
					<li>
						<span class="numbers location-span">02</span>
						<div class="form-col colspan1 location">										
							<select name="city" id="booking_slot_city" class="select2">
								<option value=''>Select City</option>
									<?php
										foreach($booking_slot['cities_list'] as $id => $city){
											echo "<option value='".$id."'>".$city."</option>";
										}
									?>
							</select>
							<span class="error-msg"></span>
						</div> 								
					</li>
					<li>
						<span class="numbers date-span">03</span>
						<div class="form-col colspan1 location city">
							<select name="date" id="booking_slot_date">
								<option id='slotdate_def_opt' value=''>Select City first</option>
							</select>
							<span class="error-msg last"></span>
						</div>																
					</li>
				</ul>
			</div>
			<input type="hidden" name="product_id" id="custom_product_id" class="custom_product_id" value="<?php echo $booking_slot['id']; ?>" />
			<input type="hidden" name="product_type" id="custom_product_type" class="custom_product_type" value="" />
			<div class="form-row btn-row">
				<h4><span class="buy_amount"><?php echo '$'.$booking_slot['price']; ?></span>
					<a href="javascript:void(0)" class="<?php echo $booking_slot['class_name'];?>" title="Proceed To payment">
						<span class="buy_btn <?php if(is_loggedin()){ echo 'loggedin';}else{ echo 'notlogged';} ?>">Proceed To payment</span>
					</a>
				</h4>
			</div>
		</form>
	</div>					
</div>

<?php } ?>

<style>
.highlight {
    background-color: #42B373 !important;
}
</style>

<script>

$(window).load(function(){

<?php if(!isset($live_mock_exam)){ ?>

		var highlight_dates 	= [];
		var highlight_dates_ccc = [];
		var highlight_dates_rrc = [];

		<?php 
			if(isset($highlight_dates_ccc)){
				foreach($highlight_dates_ccc as $k => $date){ 
		?>
	    			highlight_dates_ccc["<?php echo $k; ?>"] = "<?php echo $date; ?>";
	    <?php 
				}
			}
		?>
	    
		<?php 
			if(isset($highlight_dates_rrc)){
				foreach($highlight_dates_rrc as $k => $date){ 
		?>
	    			highlight_dates_rrc["<?php echo $k; ?>"] = "<?php echo $date; ?>";
	    <?php 
				}
			}
		?>

		<?php 
			if(isset($highlight_dates)){
				foreach($highlight_dates as $k => $date){ 
		?>
	    			highlight_dates["<?php echo $k; ?>"] = "<?php echo $date; ?>";
	    <?php 
				}
			}
		?>

		console.log(highlight_dates);

		$("#booking_timeslot_date").datetimepicker({
			format:'m/d/Y',
			minDate:0,
			scrollinput:false,
			scrollMonth:false,
			scrollTime:false,
			timepicker:false,
			defaultSelect:false,
			lazyInit:true,
			beforeShowDay:function(date){
				var month = date.getMonth()+1;
			   	var year = date.getFullYear();
			   	var day = date.getDate();
			   	day 	= day+'';
			   	month 	= month+'';
			   	if(day.length == 1){
			   		day = "0"+day;
			   	}
			   	if(month.length == 1){
			   		month = "0"+month;
			   	}			   	
			   	var newdate = month+'/'+day+'/'+year;

			   	if($("#custom_product_type").val() == 'ccc'){
					highlight_dates = highlight_dates_ccc;
				}else if($("#custom_product_type").val() == 'rrc'){
					highlight_dates = highlight_dates_rrc;
				}

				console.log(newdate);
				//console.log(highlight_dates);

		   		// Check date in Array
		   		if(jQuery.inArray(newdate, highlight_dates) != -1){
		    		return ['highlight'];
		   		}else{
		   			return [true];
		   		}
					
			},
			onSelectDate:function(dp,$input){
				$(".date .error-msg").remove();
				$("#date-span").addClass('active');
				$(".booking-info-msg-1").hide();
				$(".booking-info-msg-1").parent('li').removeClass('custom-li-info-msg-1');
				setTimeout(function(){
					var prod_id = $("#custom_product_id").val();
					var selected_date = $("#booking_timeslot_date").val();
					$.ajax({
						method: 'POST',
						url: base_url+'site/book_timeslot/get_slot_timing',
						data:{'product_id':prod_id,'selected_date':selected_date},
						success:function(res){
							var data = JSON.parse(res);

							$(".booking-info-msg-2").html(data.msg);
							$(".booking-info-msg-2").show();
							$(".booking-info-msg-2").parent('div').parent('li').addClass('custom-li-info-msg-2');
							if(data.status == 'success'){
								$("#booking_timeslot_time").html(data.time_list);
							}else{
								$("#booking_timeslot_time").html(data.time_list);
							}
						},
					});
				},500);
			},
			onChangeDateTime:function(dp,$input){
				
			},
			onShow:function(ct,inp){
				$(".booking-info-msg-1").show();
				$(".booking-info-msg-1").parent('li').addClass('custom-li-info-msg-1');
				$(".booking-info-msg-2").hide();
				$(".booking-info-msg-2").parent('div').parent('li').removeClass('custom-li-info-msg-2');
			}
		});

		$("#booking_timeslot_time").livequery('change',function(){
			if($(this).val() != ''){
				$(".time .error-msg").remove();
				$(".booking-info-msg-2").hide();
				$(".booking-info-msg-2").parent('div').parent('li').removeClass('custom-li-info-msg-2');
				$("#time-span").addClass('active');
			}else{
				$(".booking-info-msg-2").show();
				$(".booking-info-msg-2").parent('div').parent('li').addClass('custom-li-info-msg-2');
				$("#time-span").removeClass('active');
			}
		});

<?php }else{ ?>

		$("#booking_slot_city").livequery('change',function(){

			if($(this).val() != ''){
				$(".location-span").addClass('active');

				var city_id = $(this).val();

				setTimeout(function(){
					$.ajax({
						method: 'POST',
						url: base_url+'site/live_mock_exam/get_date_list',
						data:{'city_id':city_id},
						success:function(res){
							$("#booking_slot_date").html(res);
						},
					});
				},500);


			}else{
				var option = "<option value=''>Select City First</option>"
				$("#booking_slot_date").html(option);
				$(".location-span").removeClass('active');
				$(".date-span").removeClass('active');
				$(".buy_amount").html('$899');
			}
		});

		$("#booking_slot_date").livequery('change',function(e){
			var $this = $(this);
			if($this.val() != ''){
				$(".date-span").addClass('active');
				var price = $("#booking_slot_date :selected").attr('data-price');
				$(".buy_amount").html('$'+price);
			}else{
				$(".date-span").removeClass('active');
				$(".buy_amount").html('$899');
			}
			$(".error-msg.last").html('');
		});

<?php } ?>


});

</script>
<style>
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_today.highlight{color:#ffffff;}
</style>
