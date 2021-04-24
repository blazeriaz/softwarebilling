$(document).ready(function() {
if( typeof disable_right_click !== 'undefined' ) {
 
document.oncontextmenu=null;

}else{
document.oncontextmenu = document.body.oncontextmenu = function() {return false;};
}

$(window).load(function(){
$('.loader_wrap').fadeOut();
});



//alert(jQuery(window).width() );

document.oncontextmenu = document.body.oncontextmenu = function() {return false;};

var width = $(window).width();
$('.menu-icon').click(function () {			
	if ($(this).hasClass('expand')) {
		$('body').addClass("menuclose");	
		$('body').removeClass("menuopen");
		$('.pagewrapper').addClass("normal");	
		$('.pagewrapper').removeClass("leftside");
		$('body,html').removeAttr("style");
		setTimeout(function () {
			$('.menu-icon').removeClass('expand');
			$('.menu-icon').addClass('collapse');
		}, 100);			
	}
	if ($(this).hasClass('collapse')) {
		$('body').removeClass("menuclose");
		$('body').addClass("menuopen");
		$('.pagewrapper').removeClass("normal");
		$('.pagewrapper').addClass("leftside");
		$('body,html').css({"overflow":"hidden"});
		setTimeout(function () {
			$('.menu-icon').removeClass('collapse');
			$('.menu-icon').addClass('expand');
		}, 100);
	}		
	return false;
});

//sub menu click
if(width < 1023){
	$(".nav-subs li > a").click(function(e){
		$(this).toggleClass("active");
		$(this).next(".submenu").slideToggle();			
	});		
}



    /*$('.slider > .owl-carousel').owlCarousel({
		autoplay:true,
		autoplayTimeout:2000,
        loop: true,
        margin: 0,
        responsiveClass: true,
		dots:true,
		nav: false,
        responsive: {
			0: {
			items: 1,
			nav: false
			},
			600: {
			items: 1,
			nav: false
			},
			1000: {
			items: 1,
			dots: true,
			margin: 0
			}
        }
    })*/
	
	/*$( function() {
		$("#tabs").tabs();
		$("#tab_cshandbook").tabs();
	});*/
  
  /*$( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );*/
  
	$('.form-select').selectric({
		disableOnMobile: false,
		nativeOnMobile: false
	});
	
	/* Sigin Left Menu */
	$('.toggle').click(function(e) {
		e.preventDefault();
  
		var $this = $(this);
		$('.step-menu ul li').removeClass('expand');
		$this.parent('.step-menu ul li').removeClass('showss');
		if ($this.next().hasClass('show')) {
			//alert();
			$this.next().removeClass('show');
			//if(width < 1023){
				//alert(width);
			$this.next().slideUp(350);	
			//}			
		} else {
			$this.parent('.step-menu ul li').addClass('expand');
			
			$this.parent().parent().find('li .step-submenu').removeClass('show');
			//$this.parent().parent().find('li .step-submenu').slideUp(350);
			$this.next().toggleClass('show');			
			//$this.next().slideToggle('slow');
		}
	});
	
	/* Careers */
	$(".learn-btn").click(function() {		
		$('.career-popup').addClass('show');
		$('.popup-overlap').addClass('show');	
		$('body').addClass('overflow');	
		$("#carrier_id option").attr("selected", false);		
		$("#carrier_id option[value="+$(this).attr('data-id')+"]").attr("selected", true);	
		$("div.selectric p.label").text($("#carrier_id option[value="+$(this).attr('data-id')+"]").text());	
		//$('#carrier_id').selectBox('value', $(this).attr('data-id'));
	});	
	$(".popup-close.close-btn").click(function() {
        $('.career-popup').removeClass('show');
		$('.popup-overlap').removeClass('show');
		$('body').removeClass('overflow');	
    });
	
	
	//Login Fancybox script
	$('.login-btn').fancybox({
		wrapCSS : 'loginblocks',
		//maxWidth : '100%',
		//maxHeight : '100%',
		//autoSize : false,
		padding: 0,
		title   : null,		
		//wrapCSS : 'login-fbox',
		autoCenter:true,
		closeClick  : false, // prevents closing when clicking INSIDE fancybox
		helpers     : { 
        overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
		}		
	});
	
	$('.trigger-btn').fancybox({		
		//maxWidth : '20%',
		//maxHeight : '20%',
		//autoSize : true,
		wrapCSS : 'loginblocks',
		title   : null,
		padding : 0,		
		autoCenter:true,
		closeClick  : false, // prevents closing when clicking INSIDE fancybox
		helpers     : { 
        overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
		}		
	});

	
	$('.fancy_popup_url_btn').fancybox({
		wrapCSS : 'loginblocks',
		title   : null,
		padding : 0,
		//wrapCSS : 'login-fbox',
		autoCenter:true,
		closeClick  : false, // prevents closing when clicking INSIDE fancybox
		helpers     : { 
			overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
		}
	});
	
	$(window).load(function() {
		if($("a").hasClass('fancy_popup_url_btn')){
			$(".fancy_popup_url_btn").trigger("click");
		}
	});
	
	$(".popup-close.close-btn").livequery("click",function(){
        $('.fancybox-overlay').hide();
        $('section.login-blocks').hide();
    });
	
	
	/* home author Tab Section */
	$("ul.home_author_list li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");		
        $(this).parent().siblings().removeClass("current");		
        var tabright = $(this).attr("href");
        $(".cshandbook-tabs").not(tabright).css("display", "none");
        $(tabright).fadeIn();   
		
		if (jQuery(window).width() <= 960) {
			$("html, body").animate({
				scrollTop: $(tabright).offset().top -40
			}, 2000);
		};
		 return false;
    });
	
	/*$(".abt_author").livequery("click",function(){
		var tabright = $(this).attr("href");
		$("html, body").animate({
			scrollTop: $(tabright).offset().top
		}, 2000);
	});*/
	
	/* home afewwords Tab Section */
	$(".afewwords-blk ul.list-tabs li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");		
        $(this).parent().siblings().removeClass("current");		
        var tabright = $(this).attr("href");
        $(".afewwords-tabs").not(tabright).css("display", "none");
        $(tabright).fadeIn();
		 return false;
    });	
	
	$(".tab-clks").livequery("click",function(){
		var tabright = $(this).attr("href");
		$("html, body").animate({
			scrollTop: $('.tab-content').offset().top
		}, 2000);
	});

    $("#sample_email_form").livequery('submit',function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: url,
			data : data,
			success: function(res){
				var result = JSON.parse(res);
				if(result.status == 'success'){	
					$(".sample_msg").removeClass('error');
					$(".sample_msg").addClass('sucess_msg');
					$(".sample_msg").html(result.msg);
					$("#sample_email_id").val('');
				}else{
					$(".sample_msg").removeClass('sucess_msg');
					$(".sample_msg").addClass('error');
					$(".sample_msg").html(result.msg);
				}
				setTimeout(function(){
					$(".sample_msg").removeClass('error');
					$(".sample_msg").html('');
					$("#sample_email_id").val('');
				},8000);
			}

		});
	});

	$('.buy_now_cart').livequery("click",function(){
		var redirect_link = $(this).data('href');
	
		$('.login-btn').trigger('click');
		setTimeout(function(){ $('#redirect_url').val(redirect_link); }, 2000);
		
	});
	
	$("input:radio[name=combo_package]").livequery("click",function(){
		 if ($("input:radio[name=combo_package]").is(":checked")){
			 $('.online-tutorial-error').html('');
		 }
	});
	
	
	$('.online_video_tutorial').livequery("click",function(){
		 if ($("input:radio[name=combo_package]").is(":checked")){
			$('.online-tutorial-error').html('');
		 }else{
			$('.online-tutorial-error').html('Please select any one of the Option Above');
			return false;
		 }
		 
		  if ($("input:radio[name=combo_package]").is(":checked")){
			  
			  var product_id = $("input:radio[name=combo_package]:checked").val();
		  }
		 
		 $url = base_url+"payment/"+product_id;
		 window.location = $url;
	});
	
	$('.online_video_tutorial_before').livequery("click",function(){
		if ($("input:radio[name=combo_package]").is(":checked")){
			$('.online-tutorial-error').html('');
		 }else{
			$('.online-tutorial-error').html('Please select any one of the Option Above');
			return false;
		 }
		 if ($("input:radio[name=combo_package]").is(":checked")){
			 
			 var product_id = $("input:radio[name=combo_package]:checked").val();
			$('.login-btn').trigger('click');
			
			var url = "payment/"+product_id;
			setTimeout(function(){ $('#redirect_url').val(url); }, 2000);
		 }
		
	});
	
	$('.home_combopack').hover(function(){
		$('.home_combopack').removeClass('active');
		$(this).addClass('active');
	});
	
	$('.login-btn').livequery("click",function(){
		$('body').addClass('fancybx-active');		
	});
		
	$('.fancybox-close').livequery("click",function(){
		$('body').removeClass('fancybx-active');		
	});
  
})



 $(window).load(function(){
	 $('.slider > .owl-carousel').owlCarousel({
        autoplay:true,
		autoplayTimeout:5000,
        loop: true,
        margin: 0,
        responsiveClass: true,
		dots:true,
		nav: false,
        responsive: {
			0: {
			items: 1,
			nav: false
			},
			600: {
			items: 1,
			nav: false
			},
			1000: {
			items: 1,
			dots: true,
			margin: 0
			}
        }
    });
});
