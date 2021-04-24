$(document).ready(function() {
//alert($(window).height());
//alert($(window).width());
if( typeof disable_right_click !== 'undefined' ) {


}else{
document.oncontextmenu = document.body.oncontextmenu = function() {return false;};
}
$(window).load(function(){
$('.loader_wrap').fadeOut();
});
$('.handbook-slider > .owl-carousel').owlCarousel({
	loop: false,
	margin: 10,
	responsiveClass: true,
	dots:true,
	nav: true,
	responsive: {
		0: {
		items: 1,
		nav: false
		},
		600: {
		items: 2,
		nav: false
		},
		1000: {
		items: 3,
		dots: true,
		margin: 20
		}
	}
})

if($("#step_one_exam_date").length !=0 || $("#step_two_exam_date").length !=0){	
	$("#step_one_exam_date,#step_two_exam_date").datetimepicker({
	maxDate: '0',
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


$(".has_mini_category  .subtab-cathd").css('pointer-events','none');

$("#register #know_about_us").change(function(){
	if($("#register #know_about_us").val() == 5){
		$('#register .other').show();
	}else{
		$('#register .other').hide();
	}
 });

if($("#register #know_about_us").hasClass("know_about_us")){
	if($("#register #know_about_us").val() == 5){
		$('#register .other').show();
	}else{
		$('#register .other').hide();
	}
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
 
 $('#my_profile').validate({
			ignore: '',
			errorPlacement: function(error, element) {
        
			var data = element.data('selectric');
			error.appendTo( data ? element.closest( '.' + data.classes.wrapper ).parent() : element.parent() );
			},
			rules: {
				first_name: {
					required: true,
					check_name_rules: "^[a-zA-Z \s]+$",
					check_not_space_rules: true
				},				
				last_name: {
					required: true,
					check_name_rules: "^[a-zA-Z \s]+$",
					check_not_space_rules: true
				},
				email_id: {
					required: true,
					email: true
				},		
				skype_id: {
					required: true,
					check_skype_rules: "^[a-zA-Z0-9.\s]+$"
				},
				country:"required",
				city:{
					required:true,
					check_name_rules: "^[a-zA-Z \s]+$",
				},
				phone_no: {
					required: true,
					check_phone_rules: "^[0-9/-/+/(/)/ \s]+$"
				}
				
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				email: "Please enter a valid email address",
				country:"Please select the Country",
				city:"Please enter the City or select from autocomplete",
				phone_no:"Please enter the phone no"
				
			},
			submitHandler: function(form) {
			    if(!($("#submit_btn").hasClass('disabled'))){
			    	form[0].submit();
			    }
			    //return false;
			}
		});
 
$.validator.addMethod("check_name_rules", function(value, element, param) {
  return value.match(new RegExp(param));
}, "Please enter only alphabets with space");

$.validator.addMethod("check_not_space_rules", function(value, element) {
	if(value.match(new RegExp("^[ \s]+$"))){
		var return_name = false;
	}else{
		var return_name = true;
	}
  return this.optional(element) || return_name ;
}, "Please enter only alphabets");

$.validator.addMethod("check_skype_rules", function(value, element, param) {
  return value.match(new RegExp(param));
}, "Please enter only alphabets, numeric with dot");
 
$.validator.addMethod("check_phone_rules", function(value, element, param) {
  return value.match(new RegExp(param));
}, "Please enter only numeric");

$.validator.addMethod("check_amount_rules", function(value, element, param) {
  return value.match(new RegExp(param));
}, "Please enter valid amount");


$.validator.addMethod("validpass", function(value, element) {
	if(value){
		if (/\d/.test(value) && /[a-zA-Z]/.test(value)) {
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
    /*return this.optional(element) ||
			/^[a-z0-9]+$/i.test(value);*/
             }, "Password must contain atleast one alphabet and one number.");

$.validator.addMethod("validemail", function(value, element) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  	return emailReg.test(value);
  }, "Please enter valid Email Address.");

 
 $("#register").validate({
			//errorClass: 'error-msg',
			ignore: ".ignore",
			errorPlacement: function(error, element) {
        
			var data = element.data('selectric');
			error.appendTo( data ? element.closest( '.' + data.classes.wrapper ).parent() : element.parent() );
			},
			rules: {
				first_name: {
					required: true,
					check_name_rules: "^[a-zA-Z \s]+$",
					check_not_space_rules: true
				},
				last_name: {
					required: true,
					check_name_rules: "^[a-zA-Z \s]+$",
					check_not_space_rules: true
				},
				email_id: {
					required: true,
					email: true,
					validemail: "#email_id",
				},				
				skype_id: {
					required: true,
					check_skype_rules: "^[a-zA-Z0-9.\s]+$"
				},
				password: {
					required: true,
					minlength: 6,
					validpass: "#password",
				},
				hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
				},
				step_one_exam_date:{
					 required: {
						depends: function(element) {
						//return $("#took_step_one_exam_yes:checked");
						if($('#took_step_one_exam_yes').is(':checked')) { return true; }else{ return false; }
						
						}
					}
				},
				step_two_exam_date:{
					 required: {
						depends: function(element) {
						if($('#took_step_two_exam_yes').is(':checked')) { return true; }else{ return false; }
						
						}
					}
				},
				other:{
					 required: {
						depends: function(element) {
							if($('#know_about_us').val()==5) { return true; }else{ return false; }						
						}
					}
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				},
				
				country:"required",
				know_about_us:"required",
				exam_date:"required",
				city:"required",
				agree: "required",
				phone_no: {
					required: true,
					check_phone_rules: "^[0-9/-/+/(/)/ \s]+$"
				}
				
			},
			messages: {
				first_name:{					
				 required: "Please enter your First Name",
				 check_name_rules: "Please enter only alphabets",
				},
				last_name: {
					required: "Please enter your Last Name",
					check_name_rules : "Please enter only alphabets",
				},
				password: {
					required: "Please provide a Password",
					minlength: "Your Password must be at least 6 characters long"
				},
				confirm_password: {
					required: "Please provide a Password",
					minlength: "Your Password must be at least 6 characters long",
					equalTo: "Please enter the same Password as above"
				},
				email_id: "Please enter a valid Email Address",
				hiddenRecaptcha:"Please check the Captcha",
				agree: "Please Accept our policy",
				country:"Please select the Country",
				know_about_us:"Please Select know About us",
				skype_id: "Please enter valid Skype ID",
				city: "Please enter City",
				phone_no: "Please enter valid Contact No",
				exam_date: "Please select valid Exam Date",
				step_one_exam_date:{
					required: "Please select Exam Date"
				},
				step_two_exam_date:{
					required: "Please select Exam Date"
				},
				other:{
					required: "Please enter Other"
				},
			},
			submitHandler: function(form) {
			    if(!($("#submit_btn").hasClass('disabled'))){
			    	form[0].submit();
			    }
			    //return false;
			}
		});

 $("#my_profile #country").livequery('change',function(){
 	$('#City').val('');
 });

 $("#my_profile #City").livequery('change',function(){
 	//$('#city_id').val('');
 });

 $('#my_profile input,#register input').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    //alert('Please click save button to submit');
    return false;
  }
});
 
 $( "#City").autocomplete({
		source: function(request, response) {			
			var link_url = base_url+'get_cities';
			$("#submit_btn").addClass('disabled');
			$("#submit_btn").css('opacity','0.5');
        $.ajax({
            url: link_url,
            dataType: "json",
            data: {
                term : request.term,
                country_id : $("#country").val()
            },
            success: function(data) {
            	
            	$("#first_city_id").val('');
				$("#first_city_text").val('');
				$("#city_clicked").val('');

				if(data.status){
					alert("Please Select Country First");
					$("#City").val("");
					setTimeout(function(){
						$("#submit_btn").removeClass('disabled');
						$("#submit_btn").css('opacity','1');
					},100);
				}else{
					response(data);
					if(data.length==0){
						$("#city_id").val("");	
					}else{
						var city_id = data[0].id;
						var city_text = data[0].value;
						if(city_id){
							$("#first_city_id").val(city_id);
							$("#first_city_text").val(city_text);
						}
					}
					setTimeout(function(){
						$("#submit_btn").removeClass('disabled');
						$("#submit_btn").css('opacity','1');
					},100);
				}
            }
        });
    },
		minLength: 2,
		select: function( event, ui ) {
			$("#city_clicked").val(1);
			$('#city_id').val(ui.item.id);
		}
	});

 $("#City").livequery('blur',function(){
 	setTimeout(function(){
 		var first_city_id = $("#first_city_id").val();
 		var first_city_text = $("#first_city_text").val();
 		var city_clicked = $("#city_clicked").val();

 		if(first_city_id && city_clicked == ''){
 			$("#city_id").val(first_city_id);
 			$("#City").val(first_city_text);
 		}
 	},150);
 });
	
	$("#change_password").validate({
	//errorClass: 'error-msg',
	ignore: [],
	errorPlacement: function(error, element) {
		//var data = element.data('selectric');
		//error.appendTo( data ? element.closest( '.' + data.classes.wrapper ).parent() : element.parent() );
		element.parents(".form-col").find("span").append(error);
	},
	rules: {
		current_password: {
			required: true,
			minlength: 6,
			validpass: "#current_password",
		},
		new_password: {
			required: true,
			minlength: 6,
			validpass: "#new_password",
		},
		confirm_password: {
			required: true,
			minlength: 6,
			equalTo: "#new_password"
		}		
	},
	messages: {
		current_password: {
			required: "Please provide a current password",
			minlength: "Your password must be at least 6 characters long"
		},
		new_password: {
			required: "Please provide a new password",
			minlength: "Your password must be at least 6 characters long"
		},
		confirm_password: {
			required: "Please provide a confirm password",
			minlength: "Your password must be at least 6 characters long",
			equalTo: "Please enter the same password as above"
		}		
	}
});

$("#change_password").validate({
	//errorClass: 'error-msg',
	ignore: [],
	errorPlacement: function(error, element) {
		//var data = element.data('selectric');
		//error.appendTo( data ? element.closest( '.' + data.classes.wrapper ).parent() : element.parent() );
		element.parents(".form-col").find("span").append(error);
	},
	rules: {
		current_password: {
			required: true,
			minlength: 5
		},
		new_password: {
			required: true,
			minlength: 5
		},
		confirm_password: {
			required: true,
			minlength: 5,
			equalTo: "#new_password"
		}		
	},
	messages: {
		current_password: {
			required: "Please provide a current password",
			minlength: "Your password must be at least 5 characters long"
		},
		new_password: {
			required: "Please provide a new password",
			minlength: "Your password must be at least 5 characters long"
		},
		confirm_password: {
			required: "Please provide a confirm password",
			minlength: "Your password must be at least 5 characters long",
			equalTo: "Please enter the same password as above"
		}		
	}
});

$("#contact_us").validate({
	//errorClass: 'error-msg',
	ignore: [],
	errorPlacement: function(error, element) {
		element.parents(".input").find("span").append(error);
	},
	rules: {
		name: {
			required: true,
			check_name_rules: "^[a-zA-Z \s]+$",
			check_not_space_rules: true
		},
		email_id: {
			required: true,
			email: true,
			validemail: "#email_id",
		},	
		phone_number: {
			required: true,
			check_phone_rules: "^[0-9/-/+/(/)/ \s]+$"
		},	
		comments: {
			required: true,
			minlength: 10
		},
		hiddenRecaptcha: {
			required: function () {
				if (grecaptcha.getResponse() == '') {
					return true;					
				} else {
					return false;
				}
			}
		},
		
	},
	messages: {
		name:{					
			required: "Please enter your Name",
			check_name_rules: "Please enter only alphabets",
			check_not_space_rules: "Please enter only alphabets",
		},
		email_id: "Please enter a valid Email Address",
		phone_number: "Please enter valid Contact No",
		comments: {					
			required: "Please enter your Comments",
			required: "Please enter a text greater than or equal to 10."
		},
		hiddenRecaptcha:"Please check the Captcha",
	}
});


$("#order_offline").validate({
	//errorClass: 'error-msg',
	ignore: [],
	errorPlacement: function(error, element) {
		element.parents(".input").find("span").append(error);
	},
	rules: {
		name: {
			required: true,
			check_name_rules: "^[a-zA-Z \s]+$",
			check_not_space_rules: true
		},
		
		email_id: {
			required: true,
			email: true,
			validemail: "#email_id",
		},	
		phone_number: {
			required: true,
			check_phone_rules: "^[0-9/-/+/(/)/ \s]+$"
		},
		
		amount: {
			required: true,
			check_amount_rules: "^[0-9/./+/(/)/\s]+$",
			check_not_space_rules: true
		},	
		comments: {
			required: true,
			minlength: 5
		},
		hiddenRecaptcha: {
			required: function () {
				if (grecaptcha.getResponse() == '') {
					return true;					
				} else {
					return false;
				}
			}
		},
		
	},
	messages: {
		name:{					
			required: "Please enter your Name",
			check_name_rules: "Please enter only alphabets",
			check_not_space_rules: "Please enter only alphabets",
		},
		email_id: "Please enter a valid Email Address",
		phone_number: "Please enter valid Contact No",
		amount:{					
			required: "Please enter amount",
			check_amount_rules: "Please enter valid amount",
			check_not_space_rules: "Please enter valid amount",
		},
		comments: {					
			required: "Please enter your Comments",
			required: "Please enter a text greater than or equal to 5."
		},
		hiddenRecaptcha:"Please check the Captcha",
	}
});


if($("div").hasClass("form-sucess")){
	setTimeout(function(){ 
		$(".form-sucess").not(".register-msg").fadeOut();
	}, 5000);
}

$(".blogs_like").livequery('click',function(e){
		e.preventDefault();
		var blog_id = $(this).data('blog_id');
		var url = base_url+'site/blogs/likeBlog';
		var data = {'blog_id':blog_id};
		//var like_counts = $(".blogs_like").html();
		$.ajax({
			type: 'POST',
			url: url,
			data : data,
			success: function(res){
				var data = JSON.parse(res);
				if(data.status == 'success'){
					$("#like-"+blog_id).html(data.blog_like_count);
					//like_counts = parseInt(like_counts);
					//$("#like-"+blog_id).html(like_counts + 1);
					//$("#like-"+blog_id).addClass("already_liked");
					//$("#like-"+blog_id).removeClass('steps_like');
				}else{
					//alert(data.msg);
				}				
			}
		});
});

	/* Blog Left Menu */
	$('.blg-toggle').click(function(e) {
		e.preventDefault();
  
		var $this = $(this);
		$('.blg-menu ul li').removeClass('expand');
		$this.parent('.blg-menu ul li').removeClass('showss');
		if ($this.next().hasClass('show')) {
			$this.next().removeClass('show');
			$this.next().slideUp(350);			
		} else {
			$this.parent('.blg-menu ul li').addClass('expand');
			$this.parent().parent().find('li .blg-submenu').removeClass('show');
			$this.parent().parent().find('li .blg-submenu').slideUp(350);
			$this.next().toggleClass('show');			
			$this.next().slideToggle(350);
		}
	});

	/* Read More / Less */
	jQuery('.read_more_link').not('.online_step_list').on('click', function(){
		jQuery(this).siblings('.trimmed_content').toggleClass('hide');
		if (jQuery(this).siblings('.full-content').hasClass('hide')) {
			jQuery(this).text('Readless...').attr('title', 'Readless...');
		} else {
			jQuery(this).text('Readmore...').attr('title', 'Readmore...');
		}
		jQuery(this).siblings('.full-content').toggleClass('hide');
		return false;
	});	
	 
	jQuery('.view_more_link').not('.online_step_list').on('click', function(){
		jQuery(this).siblings('.trimmed_content').toggleClass('hide');
		if (jQuery(this).siblings('.full-content').hasClass('hide')) {
				jQuery(this).text('View Less...').attr('title', 'View Less...');
		} else {
				jQuery(this).text('View More...').attr('title', 'View More...');
		}
		jQuery(this).siblings('.full-content').toggleClass('hide');
		return false;
	});

$(".testimonials-section .read_more").livequery('click',function(e){
	$(this).parent().children(".read_more").addClass("display_none");	
	$(this).parent().children(".read_less").removeClass("display_none");	
	$(this).parent().children(".min_disc").addClass("display_none");	
	$(this).parent().children(".max_disc").removeClass("display_none");	
});

$(".testimonials-section .read_less").livequery('click',function(e){
	$(this).parent().children(".read_more").removeClass("display_none");	
	$(this).parent().children(".read_less").addClass("display_none");	
	$(this).parent().children(".min_disc").removeClass("display_none");	
	$(this).parent().children(".max_disc").addClass("display_none");	
});

$("#contact_us .reset-btn").livequery('click',function(e){
	 $("#contact_us span.error-msg").text("");
});

$(".popup_iframe.iframe").each(function(){
	$(this).attr("href", $(this).attr("href")+"?&controls=0&showinfo=0&rel=0");
	//$(this).attr("href", $(this).attr("href")+"?&rel=0");
});

$(".popup_iframe.iframe").fancybox({
	'width'			: '75%',
	'height'			: '75%',
	'type'			: 'iframe'
});



$(".step-video").fancybox({
				'width'	: '500px',
				'height': '500px',
				
			});

$('#profile-uploader').change(function(){
	$('#profile-image').submit();
});

$('#profile-image').submit(function(event){
	event.preventDefault();
	var formdata = new FormData($('#profile-image')[0]);
	var link_url = base_url+'site/profile/change_profile_image';
	$.ajax({
		type: "POST",
		url: link_url,
		data: new FormData($('#profile-image')[0]),
		processData: false,
		contentType: false,
		success: function (data) {
			var result = JSON.parse(data);
			if(result.status == 'success'){
				$('#profile-avatar').attr('src',result.image_url);
			}else{
				alert(result.message);
			}
		}
	});
});


$(".scroll_step").livequery('click',function(){
	var id = $(this).data('id');
	$("html, body").delay(10).animate({
        scrollTop: $('#'+id).offset().top
    }, 2000);
});

$(".online_step_list.read_more_link").livequery('click',function(){
	$(this).prev().prev().hide();
	$(this).prev().show();
	$(this).hide();
	$(this).next().show();
});

$(".online_step_list.read_less_link").livequery('click',function(){
	$(this).prev().prev().hide();
	$(this).prev().prev().prev().show();
	$(this).hide();
	$(this).prev().show();
});

$(".steps_like").livequery('click',function(e){
		e.preventDefault();
		var vid_id = $(this).data('video_id');
		var url = base_url+'site/steps/likeVideo';
		var data = {'video_id':vid_id};
		var like_counts = $(".steps_like").html();
		$.ajax({
			type: 'POST',
			url: url,
			data : data,
			success: function(res){
				if(res == 1){
						like_counts = parseInt(like_counts);
						$("#like-"+vid_id).html(like_counts + 1);
						$("#like-"+vid_id).addClass("already_liked");
						$("#like-"+vid_id).removeClass('steps_like');
				}else{
					//alert(result.msg);
				}
			}
		});
});

/* Patient Note Correction Tab Section */
$(".patnote-section1 .patnote-menu li a").click(function(event) {
    event.preventDefault();
    $(this).parent().addClass("current");		
    $(this).parent().siblings().removeClass("current");		
    var tabright = $(this).attr("href");
    $(".patient-tab").not(tabright).css("display", "none");
    $(tabright).fadeIn();
	 return false;
});


$(".faq-menu-lnks").livequery("click",function(){
	$('.faq-menu').toggleClass('show');
	$('.faq-menu-lnks').toggleClass('active');
});

$(".step-menu-lnks").livequery("click",function(){
	$('.step-menu').toggleClass('show');
	$('.step-menu-lnks').toggleClass('active');
});

$(".testls-menu-lnks").livequery("click",function(){
	$('.testls-menu').toggleClass('show');
	$('.testls-menu-lnks').toggleClass('active');
});


$(".blg-catg-open").livequery("click",function(){
	$('.blog-catg').toggleClass('show')	
	$('.blg-catg-open').toggleClass('active');	
});

$(".blg-arch-open").livequery("click",function(){
	$('.blog-arch').toggleClass('show');	
	$('.blg-arch-open').toggleClass('active');	
});

$(".blg-poplr-open").livequery("click",function(){
	$('.blog-poplr').toggleClass('show');	
	$('.blg-poplr-open').toggleClass('active');	
});

// blog-poplr

/*$(".step-submenu li a").livequery("click",function(){
	alert();
		//var tabright = $(this).attr("href");
		$("html, body").animate({
			scrollTop: $('.step1-section-right').offset().top
		}, 2000);
	});*/
	
	
	
	/*$('.faq-toggle').click(function(e) {
		e.preventDefault();  
		var $this = $(this);
		$this.parent('.faq-righ-inn ul li').toggleClass('expand');		
		$this.next().toggleClass('show');
	});	*/

});

$(window).load(function(){
	
	$('#text_hc,#text_pe,.diag_title,.his_fin,.phy_ex').livequery("keyup",function(e){
		var keyCode = e.keyCode || e.which; 
		//console.log(keyCode);
		if(keyCode != 9 && keyCode != 20 && keyCode != 16 &&  keyCode != 36 && keyCode != 145 && keyCode != 44 && keyCode != 45 && keyCode != 33 && keyCode != 34 && keyCode != 144 && keyCode != 27){
		// 9  Tab
		// 20 CAPS
		// 16 SHIFT
		// 17 CTRL
		// 36 HOME
		// 145 SCROLL LOCK
		// 44 PRIN SCREEN
		//45 INSERT
		// 33 PAGE UP
		// 34 PAGE GOWN
		// 144 NUM LOCK
		// 27 ESCAPE
		if($('#timer_started').val() == 0){
		if($('#countdown-time').length != 0 ){
	var count_dwn_time_min = count_dwn_timeout.length?count_dwn_timeout:'10';
	$('#countdown-time').countdowntimer({
    	minutes :count_dwn_time_min,
    	seconds :0,
    	size : "mg",
    	timeUp : function(){
    		patient_note_submit();
    	},
    	onTime : function(){
    		$("#countdown-msg").html("Hurry only 2 minutes left");
    		$("#countdown-msg").css("color",'white');
    		$("#countdown-time").css("color",'red');
    	},
    	onTimeVal: 2,
    	onTimeType:2,
    	stopButton:'stopTimer',
	});
	$('#timer_started').val(1);
	}
	}
		}
	});

	


	if($("#text_hc").length != 0){
	$("#text_hc").textareaCounter({
		txtElem:'text_hc',
        charElem:'charCount_hc',
        lineElem:'lineCount_hc',
        progElem:'progress-percent_hc',
        txtCount:'951',
        lineCount:'15',
        charPerLine:'63',
	});
	}

	if($("#text_pe").length != 0){
	$("#text_pe").textareaCounter({
		txtElem:'text_pe',
        charElem:'charCount_pe',
        lineElem:'lineCount_pe',
        progElem:'progress-percent_pe',
        txtCount:'951',
        lineCount:'15',
        charPerLine:'63',
	});
	}

	/*$( "#dialog-box" ).dialog({
       autoOpen: false, 
       modal: true,
       buttons: {
          OK: function(){
          		$(this).dialog("close");
          		$("#patient_note_correction_form #form_submitted").val('2');
				patient_note_submit();
				
				
          	},
          Close:function(){
          			$(this).dialog("close");
          			return false;
          	},
       },
    });

	function patient_note_submit(){

		var val_exists = 0;

		setTimeout(function(){
			$("#stopTimer").trigger('click');
			$("#countdown-time").html('00:00');
        	$("#countdown-msg").html('');
        	$(".clockTimer").hide();
		},1000);

		var form_submitted = $("#patient_note_correction_form #form_submitted").val();

		$("#patient_note_correction_form input[type=text]").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});

		$("#patient_note_correction_form textarea").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});
		

		if(val_exists != 0 && ((form_submitted == 0) || (form_submitted == 2))){

	    	var $this = $('#patient_note_correction_form');

	    	var addBtn_1 = $('.addBtn_1').attr('data-rowcount');
	    	var addBtn_2 = $('.addBtn_2').attr('data-rowcount');
	    	var addBtn_3 = $('.addBtn_3').attr('data-rowcount');
	    	var addDiag = $('.addDiag').attr('data-rowcount');

			var url = $this.attr('action');
			var data = $this.serialize();

			data = data+'&rowCnt1='+addBtn_1+'&rowCnt2='+addBtn_2+'&rowCnt3='+addBtn_3+'&rowCnt4='+addDiag;

			$.ajax({
				type:'POST',
				url:url,
				data:data,
				success:function(res){
					var data = JSON.parse(res);
					if(data.status == 'success'){
						$(".patient-note-practise-div").fadeOut(500);
						$(".tab2_content").html(data.msg);
	    				$(".patient-note-timeout-div").fadeIn(500);
						
						
					}else{
						$(".patient-note-practise-div").fadeOut(500);
						$(".tab2_content").html(data.msg);
	    				$(".patient-note-timeout-div").fadeIn(500);
					}
					
					setTimeout(function(){  }, 1000);
					$('html,body').animate({
					scrollTop: $("#patient_note_correction_form").offset().top},'slow');
					},
			});

		}else{
			$(".patient-note-practise-div").fadeOut(500);
			$(".tab2_content").html('Details Submitted Successfully');
	    	$(".patient-note-timeout-div").fadeIn(500);
		}
    }*/

});

$(document).ready(function(){

$(".pers_coach_buy_btn").livequery('click',function(){
	
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
		var url = "personal-coaching/#coaching";
		setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
		return false;
	}
	var price = $(this).prev('.price').html();
	var href = $(this).data('href');
	var productid = $(this).data('productid');
	var product_type = $(this).hasClass('ccc')?'ccc':'rrc';
	$('.custom_product_id').val(productid);
	$('#custom_product_type').val(product_type);
	$(".skypedatime span.buy_amount").html(price);
	$(".pers_coach_booking_div").fadeIn(2000);
	$("html, body").delay(10).animate({
        scrollTop: $('.booking_section_div').offset().top
    }, 2000);
});

$(".booking_scroll").livequery('click',function(){
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "personal-coaching/#coaching";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}
	$("html, body").animate({
        scrollTop: $('.booking_section_div').offset().top
    }, 2000);
});

$('.personal_coaching_submit span').livequery("click",function(e){
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "personal-coaching/#coaching";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}
});

$('.patient_note_submit span').livequery("click",function(e){
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "patient-note-correction/#patient-slot";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}
});

$('.online_mock_submit span').livequery("click",function(e){
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "online-mock-exam/#online-timeslot";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}
});

$('.live_mock_submit span').livequery("click",function(e){
	if($(this).hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "live-mock-exam/#live-timeslot";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}
});

$('#buy_assesment').livequery("click",function(e){
	if($('#buy_assesment span').hasClass('notlogged')){
		$('.login-btn').trigger('click');
			
			var url = "online-tutorials/#online-tutorials";
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
			return false;
	}else{
		$(".asses_prep_booking_div").fadeIn(1500);
		$(".booking_section_div").show();
		$("html, body").animate({
        	scrollTop: $('.booking_section_div').offset().top
    	}, 2000);
	}
});



$('.personal_coaching_submit,.patient_note_submit,.online_mock_submit,.live_mock_submit,.assesement_preparation_submit').livequery("click",function(e){
		
		
		$("#book_time_slot").submit();
		
		
		
	});
	
	$('#book_time_slot').livequery("submit",function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: url,
			data : data,
			success: function(res){
				$('.error-msg.custom').remove();
				var result = JSON.parse(res);
				if(result.status == 'success'){
					if(result.is_timeslot == 1){
						window.location = base_url+'payment/'+result.product_id+'/'+result.timeslot_id+'/'+result.date_time;
					}else if(result.is_livemock == 1){
						window.location = base_url+'payment/'+result.product_id+'/'+result.mock_id;
					}else{
						window.location = base_url+'payment/'+result.product_id;
					}
				}else{

					if(result.message){
						$(".error-msg.last").html(result.message);
					}

					if(result.error){
					$.each(result.error,function(key, value){
							var field = key;
							var span = "<span id='"+field+"-error' class='error-msg custom''>"+value+"</span>";
							if($("[name='"+field+"']").hasClass('select2')){
								$("[name='"+field+"']").next('span').after(span);
							}else{
								$("[name='"+field+"']").after(span);
							}
						});
					}
				}
			}
		});
	});

	/* Sigin Left Menu */
	/*$('.faq-toggle').click(function(e) {
		e.preventDefault();  
		var $this = $(this);
		$('.faq-righ-inn ul li').removeClass('expand');
		//$this.parent('.faq-righ-inn ul li').removeClass('expand');	
		if ($this.next().hasClass('show')) {
			$this.next().slideUp(350);			
		} else {
			$this.parent('.faq-righ-inn ul li').addClass('expand');	
			$this.next().slideToggle(350);
		}
	});*/
	
	/* Faq Toogle Block */
	$('.faq-toggle').click(function(e) {
		e.preventDefault();  
		var $this = $(this);
		$this.parent('.faq-righ-inn ul li').toggleClass('expand');		
		$this.next().toggleClass('show');
	});	


//Patient Note Examine

	$(".addNewRow").livequery('click',function(e){

		var rowId = $(this).attr('data-rowId');
		var rowCount = $(this).attr('data-rowCount');

		rowCount = parseInt(rowCount) + 1;

		if(rowCount > 8){
			if($(this).hasClass('disabled')){
				return false;
			}else{
				$(this).addClass('disabled');
				return false;
			}
		}

		var elem1 = "<input type='text' name='his_fin_"+rowId+"_"+rowCount+"' id='his_fin_"+rowId+"_"+rowCount+"' class='his_fin inpt-add' value='' />";
		var elem2 = "<input type='text' name='phy_ex_"+rowId+"_"+rowCount+"' id='phy_ex_"+rowId+"_"+rowCount+"' class='phy_ex inpt-add' value='' />";

		$(".his_fin_"+rowId).append(elem1);
		$(".phy_ex_"+rowId).append(elem2);
		
		$(this).attr('data-rowCount',rowCount);
	});

	$(".addDiag").livequery('click',function(){

		if($(this).hasClass('disabled')){
			return false;
		}

		var rowCount = $(this).attr('data-rowCount');
		rowCount = parseInt(rowCount) + 1;

		if(rowCount == 8){
			$(this).addClass('disabled');
		}

		var elem = "<input type='text' name='diag_stud_"+rowCount+"' id='diag_stud_"+rowCount+"' class='diag_stud  inpt-add' value='' />";
		$(".addDiag-div").append(elem);
		
		$(this).attr('data-rowCount',rowCount);
	});

	$(".list input").livequery('keypress keyup keydown',function(){
		var value = $(this).val();
		$(this).attr('value',value);
	});

	$(".moveType1").livequery('click',function(){
		interchange_positions(1,2);
	});

	$(".moveType2").livequery('click',function(){
		interchange_positions(2,3);
	});

	function interchange_positions(pos1,pos2){

		var content1 = $(".list_"+pos1).html();
		var content2 = $(".list_"+pos2).html();

		$(".list_"+pos1).html(content2);
		$(".list_"+pos2).html(content1);

		changePostionNumbers(pos1,pos2,'changebutton');
		changePostionNumbers(pos2,pos1,'');
		

	}

	function changePostionNumbers(pos1,pos2,changeButton){
		var parent = ".list_"+pos2;
		//Diag No
		$(parent+" .changeNo").html(pos2);

		//Diag Title
		$(parent+" .diag_title").attr('name',$(parent+" .diag_title").attr('name').replace(pos1,pos2));
		$(parent+" .diag_title").attr('id',$(parent+" .diag_title").attr('id').replace(pos1,pos2));

		//History Finding

		$(parent+" .his_fin_"+pos1).addClass("his_fin_"+pos2).removeClass("his_fin_"+pos1);

		$(parent+" .his_fin").each(function(){
			var hfName = $(this).attr('name');
			var hfNameArr = hfName.split('_');
			hfName = hfNameArr[0]+'_'+hfNameArr[1]+'_'+pos2+'_'+hfNameArr[3];
			$(this).attr('name',hfName);

			var hfId = $(this).attr('id');
			var hfIdArr = hfId.split('_');
			hfId = hfIdArr[0]+'_'+hfIdArr[1]+'_'+pos2+'_'+hfIdArr[3];
			$(this).attr('id',hfId);
		});

		//Physical Exam

		$(parent+" .phy_ex_"+pos1).addClass("phy_ex_"+pos2).removeClass("phy_ex_"+pos1);

		$(parent+" .phy_ex").each(function(){
			var peName = $(this).attr('name');
			var peNameArr = peName.split('_');
			peName = peNameArr[0]+'_'+peNameArr[1]+'_'+pos2+'_'+peNameArr[3];
			$(this).attr('name',peName);

			var peId = $(this).attr('id');
			var peIdArr = peId.split('_');
			peId = peIdArr[0]+'_'+peIdArr[1]+'_'+pos2+'_'+peIdArr[3];
			$(this).attr('id',peId);
		});

		if(changeButton == 'changebutton'){
			var btn1RowCount = $(".addBtn_"+pos1).attr('data-rowcount');
			var btn2RowCount = $(".addBtn_"+pos2).attr('data-rowcount');
			$(".addBtn_"+pos1).attr('data-rowcount',btn2RowCount);
			$(".addBtn_"+pos2).attr('data-rowcount',btn1RowCount);
			if($(".addBtn_"+pos1).hasClass('disabled')){
				if(!$(".addBtn_"+pos2).hasClass('disabled'))
					$(".addBtn_"+pos2).addClass('disabled');
			}else{
				$(".addBtn_"+pos2).removeClass('disabled');
			}
			if($(".addBtn_"+pos2).hasClass('disabled')){
				if(!$(".addBtn_"+pos1).hasClass('disabled'))
					$(".addBtn_"+pos1).addClass('disabled');
			}else{
				$(".addBtn_"+pos1).removeClass('disabled');
			}
		}

	}

	$("#patient_note_correction_form").livequery('submit',function(e){
		e.preventDefault();
		
		$("body").addClass("patient_note_fixed_dialog");
		
		var val_exists = 0;

		$("#patient_note_correction_form input[type=text]").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});

		$("#patient_note_correction_form textarea").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});

		if(val_exists != 0){
			$("#dialog-box").dialog("open");
			$('.up-timer').countimer('stop');
			$("#dialog-box").html("Are you sure you want to submit?");
			return false;
		}else{
			alert('Please Complete form before submit');
			return false;
		}
	});

	if($( "#booking_slot_city").length != 0){
		$( ".select2#booking_slot_city").select2({
			
		});
	}

	$("#booking_timeslot_date").livequery('focusout',function(){
			$(".booking-info-msg-1").hide();
			$(".booking-info-msg-1").parent('li').removeClass('custom-li-info-msg-1');
		if($("#booking_timeslot_date").val()){
			$(".booking-info-msg-2").show();
			$(".booking-info-msg-2").parent('div').parent('li').addClass('custom-li-info-msg-2');
		}
	});
	
	$(".webinar-btn").click(function() {		
		$('.webinar-popup').addClass('show');
		$('.popup-overlap').addClass('show');	
		$('body').addClass('overflow');	
	});
	
		$(".webinar_purchase").click(function(){
		var productid = $(this).data('productid');
		var webinarfree = $(this).data('webinarfree');
		$('#webinarfree').val(webinarfree);
		 
		$('#productid').val(productid);

	});
	
	$('#webinar_register').livequery("submit",function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var data = $(this).serialize();
		
		$.ajax({
			type:'POST',
			url:url,
			data:data,
			success:function(res){
				var result = JSON.parse(res);
				$(".error-msg").remove();
				if(result.status == 'success'){
					window.location = base_url+'webinar-pay/'+result.product_id;
				}else{
					$.each(result.error,function(key, value){
							var field = key;
							var span = "<span id='"+field+"-error' class='error-msg''>"+value+"</span>";
							
							$("[name='"+field+"']").after(span);
							
						});
				}
			}
		});
	});
	
	
	$('#yourdiv').click(function() {
		 $('#yourfield').focus();
	});

});
