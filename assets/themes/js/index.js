//Scroll to DIV
	function scrollTo_div(div){
		if($(div).length!==0){
			$('html, body').animate({
				scrollTop: $(div).offset().top - 300
			}, 1000);
		}
	}

	function scrollToTop() {
		$('html, body').animate({scrollTop: 0}, 1000);
	}
	
	var timeset = function(){
	};
	
	function show_custom_msg(msg,type){
		
		clearTimeout(timeset);
		
		$(".custom_msg").attr('id','custom_msg');
		var parent_class = '';
		
		if(type=='succ'){
			$(parent_class+" .custom_msg").removeClass('cuss_error');
			$(parent_class+" .custom_msg").addClass('cuss_succ');
		}else{
			$(parent_class+" .custom_msg").removeClass('cuss_succ');
			$(parent_class+" .custom_msg").addClass('cuss_error');
		}
		
		
		$(parent_class+" .custom_msg span").html(msg);
		$(parent_class+" .custom_msg").show();
		
		
		scrollTo_div('#custom_msg');

		timeset =	setTimeout(function(){
							//hide_custom_msg(parent_class);
					},8000);
	}
	
	function hide_custom_msg(parent_class){
		$(".custom_msg").hide();
		$('.custom_msg').removeClass('cuss_succ');
		$('.custom_msg').removeClass('cuss_error');
		$('.custom_msg span').html('');
		$(parent_class+" .error").each(function() { $(this).remove(); });
	}

$(document).ready(function() {

	$(".custom_msg .delete-icon").livequery('click',function(){
		hide_custom_msg('');
	});
	
 	tinymce.init({
         selector: ".editor",
         plugins: [
             "advlist autolink lists link image charmap print preview anchor",
             "searchreplace visualblocks code",
             "insertdatetime media table contextmenu paste"
         ],
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect",
         fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt"
     });
      

  
 function delete_row(r){
 			$(".template"+r).remove();
		 $(".extra-name"+r).remove();
		 $(".delete"+r).remove();
		 $("#name-error"+r).remove(); 
	}
  if($(".email_content").size() > 0) {
				  CKEDITOR.replace( 'email_content',{ 
            		height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 400,  
			extraPlugins: 'justify'
					});
				}
	if($("#contact_address").size() > 0) {
				  CKEDITOR.replace( 'contact_address',{ 
            		height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 400,  
			extraPlugins: 'justify'
					});
			
				}
	if($("#description").size() > 0) {
				  CKEDITOR.replace( 'description',{ 
            		height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 400,  
			extraPlugins: 'justify'
					});
			
				}
	if($("#short_description").size() > 0) {
				  CKEDITOR.replace( 'short_description',{ 
            		height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 400,  
			extraPlugins: 'justify'
					});
			
				}

	if($("#answer").size() > 0) {
				  CKEDITOR.replace( 'answer',{ 
            		height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 400,  
			extraPlugins: 'justify'
					});
			
				}
	CKEDITOR.on("instanceReady", function(event) {   // to set source as default in editor
		event.editor.commands.source.exec();
	});
// for radio button
$(".col-sm-4 label").click(function(){
 $(this).prev("input").trigger("click")
 return false
});

$("#facebook_link,#twitter_link,#google_link,#url,#video_url,.video_url").livequery('click',function(){
	var vals=$(this).val();
	if(vals==""){
		$(this).val("http://");
	}	
});
$(".pagination li a").each(function(){
var titles=$(this).text();
  $(this).attr("title",titles);
});

$(".select-all").livequery('click',function(){
	if($(this).text()=="Select All"){
		if(($(this).next().find("option").length)>1){
			var htmls=$(this).next().find("option");
			$(htmls).each(function(){
				if($(this).val()!=""){
				 $(this).prop("selected", true);
				}
			});
			$(this).text("Unselect All");
		}
	}else{
		var htmls=$(this).next().find("option");
		$(htmls).each(function(){
		 $(this).prop("selected", false);
		});		
	$(this).text("Select All");
	}
});

if(document.forms[0] != undefined){
 	var elm=document.forms[0].elements[0];
 	if(elm != undefined){
  		if($(elm).attr("name")!="search_from_date"&& $(elm).attr("name")!="search_date"){
	  		document.forms[0].elements[0].focus();
  		}
	}
}

	

$( "#user_key" ).click(function(){
	var inp_val = $('#user_key').val();
	if(inp_val == "Select"){
	$('#user_key').val("");}
	$("#user_name").css("display","block");
	$("option:selected").removeAttr("selected");
	
});
$( "#user_key" ).keyup(function(){
	$("#user_name").css("display","block");
	var keyword = $("#user_key").val();
	var url = base_url + "admin/offline_subscription/search";
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: "keyword=" + keyword,
	    success: function (result) {
	        if(result != ''){
	        	var obj = jQuery.parseJSON(result);
	        	$("#user_name").html("");
	        	if(obj.suggest != ""){
			    	$.each( obj.suggest, function( key, value ) {
						$("#user_name").append("<option value="+key+">"+value+"</option>");
					});
				} else {
					$("#user_name").append("<option value='' disabled='disabled'>No Records Found</option>");
				}
			
	        }				
	    }
	});
});


$('#user_name').on('click',function(){
	$('#user_key_hidden').val($(this).val());
	$('#user_key').val($('#user_name option:selected').html());
	$("#user_name").css("display","none");
	$('#user_name option:selected').prop('false');
});

$('#map_banners_form select#page_id, #map_banners_form_id select#page_id').on('change', function() {
	if($(this).val()==1){
		$('#ban_img_size').html('Allowed Types: gif,jpg,jpeg,png | 1800*700 px');
	}else{
		$('#ban_img_size').html('Allowed Types: gif,jpg,jpeg,png | 1800*350 px');
	}
});

$('#position_id_classes').on('change', function() {
	if($('#page_id_classes').val()==2){
		var val = $(this).val();		
		if(val == 3){
			$('#ad_img_size').html('| Prefered Dimensions: 1200 * 150');
		}else if(val == 2){
			$('#ad_img_size').html('| Prefered Dimensions: 330 * 275');
		}
	}
});

$('#page_id_classes').on('change', function() {
		if($(this).val() == ""){
			$('#ad_img_size').html('');
			$("#position_id_classes").html("");
			$("#position_id_classes").append("<option value=''>Select</option>");
			return false;
		}

		var val = $(this).val();

		if(val == 1){
			$('#ad_img_size').html('| Prefered Dimensions: 1200 * 150');
		}else{
			//$('#ad_img_size').html('| Prefered Dimensions: 330 * 275');
			$('#ad_img_size').html('');
		}

		var url = base_url + "admin/advertisements/request";
		$.ajax({
			type: "POST",
            url: url,
            data: "page_id=" +  val,
            success: function (result) {
                if(result != ''){
                	var obj = jQuery.parseJSON(result);
                	$("#position_id_classes").html("");
                	$("#position_id_classes").append("<option value=''>Select</option>");
                	$.each( obj.position_list, function( key, value ) {
						if(value != 'Select'){
						$("#position_id_classes").append("<option value="+key+">"+value+"</option>");
						}
					});
                }
            }
		
		});
	});

/* New codings */

	//Phone Number only
	$('.phoneOnly').livequery('keyup',function (){
		this.value = this.value.replace(/[^ +0-9\.]/g,'');
	});
	
	//Allow Numbers only
	$('.numbersOnly').livequery('keyup',function () {
    	this.value = this.value.replace(/[^0-9\.]/g,'');
	});
	
	//Allow Alphabets only
	$('.alphaOnly').livequery('keyup',function () {
    	this.value = this.value.replace(/[^a-zA-Z\s\.]/g,'');
	});

/*----- Testimonial ------*/

$('.testimonial_type').livequery('change', function() {
	var type = $(this).val();
	if(type=='TEXT'){
		$(".youtube_link").hide();
		$(".description .required").show();
	}else if(type=='VIDEO'){
		$(".youtube_link").show();
		$(".description .required").hide();
	}
});

/*-------- User Time Slot -----------*/

if($(".select2").length){

	$(".select2").not('#user_id').select2();

	$(".select2#user_id").select2({
		
	});

	$('.select2').on("select2:selecting", function(e) {
		var id = $(this).attr('id');
		setTimeout(function(){
			if(id){
				correct_select2_text(id);
			}
   		},100);
	});
	function correct_select2_text(id){
		if(id){
			var val = $('#'+id).val();
	   		var text = $('#'+id+' option:selected').text();
	   		text_arr = text.split('(');
	   		var selected_text = text_arr[0];
	   		$("#select2-"+id+"-container").text(selected_text);
	   	}
	}
	correct_select2_text();
}

$("#time_slot_id").livequery('change',function(){
	var val = $(this).val();
	if(val){
		get_usertimeslot_details_ajax(val);
	}
});

function get_usertimeslot_details_ajax(timeslot_id){
	$(".loader").show();
	var url = base_url + "admin/user_timeslot/get_timeslot_details";

 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {
	    		'timeslot_id':timeslot_id,
	   		},
	    success: function (result) {
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='success'){
	        		$(".timeslot_date_time").datetimepicker('destroy');
	        		$(".ajax_details_div").html('');

	        		var content_div = obj.content_div;

	        		if(content_div){
	        			$(".ajax_details_div").html(content_div);
	        			$(".timeslot_date_time").not('.nodatetimepicker').each(function(){
	        				var id = $(this).attr('id');
	        				$("#"+id).datetimepicker({
								minDate:0,
								format:'d-m-Y H:i',
								scrollinput:false,
								scrollMonth:false,
								scrollTime:false,
								step:60,
								allowTimes: allowedTimes,
								onSelectDate:function(){
									get_timeslot_name();
								},
								onSelectTime:function(){
									get_timeslot_name();
								},
								onChangeDateTime:function(dp,$input){
    								var newdate = $input.val();
    								if(newdate.length==0){
    									$('#timeslot_name').val('');
    								}
  								},
								onShow:function(ct,inp){
									
								}
							});
						});
	        		}

	        	}else{
	        		$(".loader").hide();
	        		$(".ajax_details_div").hide();
	        		alert(obj.msg);
	        	}
	        	setTimeout(function(){
	        		$(".loader").hide();
	        	},250);
	    }
	});

}

$(".timeslot_user_id").livequery('change',function(){

	var user_id = $(this).val();

	$.ajax({
	    type: "POST",
	    url: base_url+'admin/user_timeslot/get_user_order_list',
	    data: {'user_id':user_id},
	    success: function (result) {
			$("#order_id").html(result);
		}
	});
	
});

/*--------- Admin Time Slot -----------*/

$(".timeslot_date_time").not('.nodatetimepicker').each(function(){
	var id = $(this).attr('id');
	$("#"+id).datetimepicker({
		minDate:0,
		format:'d-m-Y H:i',
		scrollinput:false,
		scrollMonth:false,
		scrollTime:false,
		step:60,
		allowTimes: allowedTimes,
		onSelectDate:function(){
			get_timeslot_name();
		},
		onSelectTime:function(){
			get_timeslot_name();
		},
		onChangeDateTime:function(dp,$input){
			var newdate = $input.val();
			if(newdate.length==0){
				$('#timeslot_name').val('');
			}
		},
		onShow:function(ct,inp){
			
		}
	});
});


if($("#search_from_date").length!=0){
$("#search_from_date").datetimepicker({
	format:'d-m-Y H:i',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	step:60,
	allowTimes: allowedTimes,
	onSelectDate:function(){
		
	},
	onSelectTime:function(){
		
	},
	onChangeDateTime:function(dp,$input){
		if(dp){
			$("#search_to_date").datetimepicker('setOptions',{minDate:dp});
		}
	},
	onShow:function(ct,inp){
		
	}
});
}

if($("#o_search_from_date").length!=0){
	$("#o_search_from_date").datetimepicker({format:'d-m-Y',timepicker:false,scrollMonth : false,scrollInput : false});
}
if($("#o_search_to_date").length!=0){
	
	$("#o_search_to_date").datetimepicker({format:'d-m-Y',timepicker:false,scrollMonth : false,	scrollInput : false});
}
if($("#search_from_date").length!=0){
$("#search_to_date").datetimepicker({
	format:'d-m-Y H:i',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	step:60,
	allowTimes: allowedTimes,
	onSelectDate:function(){
		
	},
	onSelectTime:function(){
		
	},
	onChangeDateTime:function(dp,$input){
		if(dp){
			$("#search_from_date").datetimepicker('setOptions',{maxDate:dp});
		}
	},
	onShow:function(ct,inp){
		
	}
});
}
if($("#step_one_exam_date").length!=0){
$("#step_one_exam_date,#step_two_exam_date").datetimepicker({
	
	format:'d-m-Y',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	step:60,
	timepicker:false
	
});
}
if($("#exam_date").length!=0){
$("#exam_date").datetimepicker({
	minDate:0,
	format:'d-m-Y',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	step:60,
	timepicker:false
	
});
}
 $("input[name='took_step_one_exam']").click(function(){
	var selected = $("input[name='took_step_one_exam']:checked").val();
	if(selected == 0){
		$('#step_one_exam_date').hide();
		$('#step_one_exam_date').val('');
	}else{
		$('#step_one_exam_date').show();
	}
 });
 $("input[name='took_step_two_exam']").click(function(){
	var selected = $("input[name='took_step_two_exam']:checked").val();
	if(selected == 0){
		$('#step_two_exam_date').hide();
		$('#step_two_exam_date').val('');
	}else{
		$('#step_two_exam_date').show();
	}
 });
 

$("#product_type_id").livequery('change',function(){
	$val = $(this).val();
	$(".ajax_details_div").show();
	if($('#product_id_hidden').length!=0){
		var product_id = $('#product_id_hidden').val();
	}else{
		var product_id = $('#product_id').val();
	}
	var batch_details = $('#batch_details_hidden').val();
	var class_count = $('#class_count').val();
	var timeslot_date_time_1 = $("#timeslot_date_time_1").val();

	if($val){
		get_timeslot_details_ajax($val,product_id,batch_details,timeslot_date_time_1);
	}else{
		$(".ajax_details_div").hide();
		$('#timeslot_name').val('');
	}
	return false;
});

$("#admin_timeslot_form , #user_timeslot_form").livequery('submit',function(e){
	e.preventDefault();
	$(".cust_submit_button").attr('disabled',true);
	var url = $(this).attr('action');
	var data = $(this).serialize();
	$(".loader").show();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: data,
	    success: function (result) {
	    		$('.error').remove();
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='error'){
	        		$.each(obj.error,function(key, value){
							var field = key;
							var span = "<label id='"+field+"-error' class='error' for='"+field+"'><p>"+value+"</p></span>";
							if($("[name='"+field+"']").hasClass('select2')){
								$("[name='"+field+"']").next('span').after(span);
							}else{
								$("[name='"+field+"']").after(span);
							}
						});

	        	}else{
	        		if(obj.url!=''){
	        			//alert('reload1');
	        			window.location.href = obj.url;
	        		}else{
	        			//alert('reload2');
	        			location.reload( true );
	        		}
	        	}
	        	setTimeout(function(){
	        		$(".loader").hide();
	        		$(".cust_submit_button").attr('disabled',false);
	        	},500);
	    }
	});
});
/*--------------------------------*/
$('#product_id').livequery("change",function(){
	//$(".loader").show();
	if($(this).hasClass('step_video')){
		var url = base_url + "admin/step_video/display_selected_category";
	}else{
		var url = base_url + "admin/step_category/display_selected_category";	
	}
	var id = $(this).val();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {product_id:id},
	    success: function (result) {
			
			//$(".loader").hide();
			
			$('#parent_category #parent').html(result);
			if(id == 6){
			$('#step-six-fields').show();
			}else{
				$('#step-six-fields').hide();
			}
			
		}
	});
});

$('.add-more-course').on('click',function(event){
		event.preventDefault();
		var tot=parseInt($(".add-more-controllers").length)+1;

		 
		var html = $.parseHTML($('.extra-class-subjects').html());
		var num=parseInt($("#class_counts").val())+1;
		$("#class_counts").val(parseInt($("#class_counts").val())+1);
		$(html).find('.video_title').attr('name','video_title_'+$("#class_counts").val());
		$(html).find('.video_title').attr('id','video_title_'+$("#class_counts").val());
$(html).find('.video_url').attr('name','video_url_'+$("#class_counts").val());
		$(html).find('.video_url').attr('id','video_url_'+$("#class_counts").val());
		$(html).find('.video_title').val('');
		$(html).find('.video_url').val('');
		
		$(html).find('.video_url').parent().parent().closest('div').addClass('remove_class'+num);
		$(html).find('.video_title').parent().parent().closest('div').addClass('remove_class'+num);
		var str = 'remove_class'+num;
		$(html).find('.video_url').after("<a style='color:#F90202;' class='delete_relevant_class delete_relevant_class1' href='javascript:delete_relevant_class(\""+str+"\",this);'><span class='icon glyphicon glyphicon-trash'></span>Remove</a>");
		$('.add-more-controllers').append(html);
		
		/*$('.video_title').change(function(event){
			var change_value = $(this).val();
			var error = 0;
			$(this).next("span").remove();
	 		$('.video_title').each(function(i, selected){ 
					if(change_value == $(selected).val()){
						error = parseInt(error)+1;
					}
			});
			if(parseInt(error)>1){
				$(this).val("");
			   	$(this).next("span").remove();
			  	$(this).after("<span class='red'>Name must be unique</span>");
			  	$(".red").css("color", "red");
				return false;
			}
			$(this).closest('div .relevent_class').next().find('#video_url').attr('name','video_url'+$(this).val()+'[]')
		});*/
		
	});

/*--------------------------------*/





function get_timeslot_details_ajax(product_type_id,product_id,batch_details,timeslot_date_time_1){
	$(".loader").show();
	var url = base_url + "admin/admin_timeslot/get_timeslot_details";

 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {
	    		'product_type_id':product_type_id,
	    		'product_id':product_id,
	    		'batch_details':batch_details,
	    		'date_time':timeslot_date_time_1
	   		},
	    success: function (result) {
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='success'){
	        		$(".timeslot_date_time").datetimepicker('destroy');
	        		$(".ajax_details_div").html('');
					$('#timeslot_name').val('');

	        		var hide_date_time = obj.hide_date_time;
	        		var content_div = obj.content_div;
	        		var timeslot_name = obj.timeslot_name;
	        		var noProductHide = obj.noProductHide;

	        		if(timeslot_name){
	        			$('#timeslot_name').val(timeslot_name);
	        		}

	        		if(content_div){
	        			$(".ajax_details_div").html(content_div);

	        			$(".timeslot_date_time").not('.nodatetimepicker').each(function(){
	        				var id = $(this).attr('id');
	        				$("#"+id).datetimepicker({
								minDate:0,
								format:'d-m-Y H:i',
								scrollinput:false,
								scrollMonth:false,
								scrollTime:false,
								step:60,
								allowTimes: allowedTimes,
								onSelectDate:function(){
									get_timeslot_name();
								},
								onSelectTime:function(){
									get_timeslot_name();
								},
								onChangeDateTime:function(dp,$input){
    								var newdate = $input.val();
    								if(newdate.length==0){
    									$('#timeslot_name').val('');
    								}
  								},
								onShow:function(ct,inp){
									
								}
							});
						});

						if(noProductHide == '1'){
	        				$(".noProductHide").hide();
	        			}

	        			$("#noProductHide_hidden").val(noProductHide);

	        		}

	        	}else{
	        		$(".loader").hide();
	        		$(".ajax_details_div").hide();
					$('#timeslot_name').val('');
	        		alert(obj.msg);
	        	}
				$('input:text').each(function () { 
					$(this).attr( 'autocomplete', 'off' );
				});
	        	setTimeout(function(){
	        		$(".loader").hide();
	        	},250);
	    }
	});

}

$('#country').livequery("change",function(){
	$(".loader").show();
	var url = base_url + "admin/users/get_cities/"+$(this).val();
	$.ajax({
	    type: "POST",
	    url: url,
	    success: function (result) {
	        	var obj = jQuery.parseJSON(result);
				$('#append-city').html(obj);
				$(".loader").hide();
		}
	});
});


function get_timeslot_name(){
	var product_type_id = $("#product_type_id").val();
	var timeslot_date_time = $("#timeslot_date_time_1").val();

	if(product_type_id && timeslot_date_time){
	var url = base_url + "admin/admin_timeslot/get_timeslot_name";

 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {
	    		'product_type_id':product_type_id,
	    		'timeslot_date_time':timeslot_date_time,
	    	},
	    success: function (result) {
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='success'){
	        		$("#timeslot_name").val(obj.timeslot_name);
	        	}else{
	        		alert(obj.msg);
	        	}
	    }
	});

 	}

}

$('#add_new_category #parent').livequery("change",function(){
	
	var stepid = $('#product_id').val();
	var category_id = $(this).val();
	if(stepid == ''){
		alert('Please Select the Step First');
		return false;
	}
	var url = base_url+'admin/step_category/getsort_order';
	$.ajax({
	    type: "POST",
	    url: url,
	    data: {'step_id':stepid,'category_id':category_id},
	    success: function (result) {
			$('#sort_order').val(result);
		}
	});
});

/**** Live Mock ****/

$("#live_mock_locations_form").livequery('submit',function(e){
	e.preventDefault();

	var url = base_url+'admin/live_mock_locations/check_timeslot_exists';
	var data = $("#live_mock_locations_form").serialize();
	$(".loader").show();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: data,
	    success: function (result) {
	    		$('.error').remove();
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='form-error'){
	        		$(".loader").hide();
	        		$.each(obj.error,function(key, value){
							var field = key;
							var span = "<label id='"+field+"-error' class='error' for='"+field+"'><p>"+value+"</p></span>";
							if($("[name='"+field+"']").hasClass('select2')){
								$("[name='"+field+"']").next('span').after(span);
							}else{
								$("[name='"+field+"']").after(span);
							}
						});
	        	}else if(obj.status=='confirm'){
	        		$(".loader").hide();
	        		var msg = obj.msg;
	        		if(window.confirm(msg)){
	        			save_live_mock_location();
	        		}
	        		
	        	}else if(obj.status=='error'){
	        		$(".loader").hide();
	        		alert(obj.msg);
	        	}else{
	        		save_live_mock_location();
	        	}
	    },
	    error: function(res){
	    	$(".loader").hide();
	    	alert(res);
	    }
	});
	
});

function save_live_mock_location(){
	var url = $("#live_mock_locations_form").attr('action');
	var data = $("#live_mock_locations_form").serialize();
	$(".loader").show();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: data,
	    success: function (result) {
	    		$('.error').remove();
	        	var obj = jQuery.parseJSON(result);
	        	if(obj.status=='error'){
	        		$.each(obj.error,function(key, value){
							var field = key;
							var span = "<label id='"+field+"-error' class='error' for='"+field+"'><p>"+value+"</p></span>";
							if($("[name='"+field+"']").hasClass('select2')){
								$("[name='"+field+"']").next('span').after(span);
							}else{
								$("[name='"+field+"']").after(span);
							}
						});
	        	}else{
	        		if(obj.url!=''){
	        			//alert('reload1');
	        			window.location.href = obj.url;
	        		}else{
	        			//alert('reload2');
	        			location.reload( true );
	        		}
	        	}
	        	setTimeout(function(){
	        		$(".loader").hide();
	        	},500);
	    }
	});
}

if($("#location_date").length!=0){
$("#location_date").datetimepicker({
	minDate:0,
	format:'d-m-Y',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	timepicker:false,
	onSelectDate:function(){
		
	},	
	onChangeDateTime:function(dp,$input){
		
	},
	onShow:function(ct,inp){
		
	}
});
}

if($("#date_time").length!=0){
$("#date_time").datetimepicker({
	minDate:0,
	format:'d-m-Y H:i',
	scrollinput:false,
	scrollMonth:false,
	scrollTime:false,
	step:1,
	onSelectDate:function(){
		
	},	
	onChangeDateTime:function(dp,$input){
		
	},
	onShow:function(ct,inp){
		
	}
});
}

$('.add_stepvid').livequery('click',function(){
	var count_stepvid = $('#count_stepvid').val();
	var nextcount = parseInt(count_stepvid) + 1;
	var element = "<div class='form-group vid_count_"+nextcount+"'>"+
					"<label for='step_video_1' class='col-sm-2 control-label'>Video Script "+nextcount+"<span class='required'>*</span></label>"+
					"<div class='col-sm-4'>"+
					"<textarea name ='step_video_"+nextcount+"' id='step_video_"+nextcount+"' "+
					"class='form-control step_video ' ></textarea>"+
					"</div>"+
					"</div>"+
					"<div class='form-group vid_count_"+nextcount+"'>"+
					"<label for='sort_order_1' class='col-sm-2 control-label'>Sort Order "+nextcount+"<span class='required'>*</span></label>"+
					"<div class='col-sm-4'>"+
					"<input type ='text' name ='sort_order_"+nextcount+"' id='sort_order_"+nextcount+"' "+
					"class='form-control sort_order' />"+
					"</div>"+
					"</div>"
					;
	$("#step_videos_div").append(element);
	$('#count_stepvid').val(nextcount);
	$(".remove_stepvid").show();
});

$('.remove_stepvid').livequery('click',function(){
	var count_stepvid = $('#count_stepvid').val();
	$(".vid_count_"+count_stepvid).remove();
	var prevcount = parseInt(count_stepvid) - 1;
	if(prevcount == 1){
		$(".remove_stepvid").hide();
	}
	$('#count_stepvid').val(prevcount);
});

$('#user_list').livequery('change',function(){
	$('#product_type').val('');
	var html_val = '<select name="product_id" id="product_id" class="form-control"><option value="" selected="selected">Select</option></select>';
	$('#product_type_listed').html(html_val);
	$('.append_details').html('');
});

$('.add_orders #product_type').livequery('change',function(){
	var type_id = $(this).val();
	var url = base_url + "admin/orders/getproductByType";
	var userid = $('#user_list').val();
	if(userid == ''){
		alert("Please Select User First");
		$('#product_type').val('');
		return false;
	}
	$(".loader").show();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {type_id:type_id,userid:userid},
	    success: function (result) { 
			$('#product_type_listed').html(result);
			$('.append_details').html('');
			$(".loader").hide();
		}
	});
});

$('#product_type_listed #product_id').livequery("change",function(){
	var product_id = $(this).val();
	var userid = $('#user_list').val();
	var product_type = $('#product_type').val();
	if(userid == ''){
		alert("Please Select User First");
		$('#product_type').val('');
		return false;
	}
	var url = base_url + "admin/orders/getproductdetails";
	$(".loader").show();
 	$.ajax({
	    type: "POST",
	    url: url,
	    data: {product_id:product_id,userid:userid,product_type:product_type},
	    success: function (result) {
			
			$('.append_details').html(result);
			$(".loader").hide();
		}
	});
});

	$('input:text').each(function () { 
		$(this).attr( 'autocomplete', 'off' );
	});

	$("#submit_order_STOPPED").livequery('click',function(){
		var sts = $("#order_status").val();
		if(sts != ''){
			$(".loader").show();
			$.ajax({
			    type: "POST",
			    url: url,
			    data: {order_status:sts},
			    success: function (result) {
			    	var obj = jQuery.parseJSON(result);
			    	if(obj.status == 'error'){
						$("#order_status-error").html(obj.msg);    		
			    	}else{
			    		window.location.href = obj.url;
			    	}
					setTimeout(function(){
						$(".loader").hide();
					},1000);
				}
			});
		}else{
			$("#order_status-error").html('Please select Order Status');
		}
	});

});


function delete_relevant_class(str,t){
	 $("."+str).remove();
	 
	 $(t).remove();
	 
 	  	var j=1;
 		$('.add-more-controllers .video_title').each(function () { 
		 	$(this).attr('name','video_title_'+j);
		 	$(this).attr('id','video_title_'+j);
		 	j++;
	 	});
	 	var k=1;
	 	$('.add-more-controllers .delete_relevant_class1').each(function () { 
	 		var str1 = 'remove_class'+k;
	 		$(this).attr('href','javascript:delete_relevant_class("'+str1+'",this);'); 
			$(this).parent().parent().closest('div').removeAttr('class');
			$(this).parent().parent().closest('div').addClass('form-group relevent_subject remove_class'+k);
			$(this).parent().parent().closest('div').prev("div").removeAttr('class');
			$(this).parent().parent().closest('div').prev("div").addClass('form-group  relevent_class remove_class'+k);
	 		k++;
	 	});
 	  $("#class_counts").val(j-1);
	
 }


