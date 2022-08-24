(function ($) {
 "use strict";
    
/*----------------------
    WOW active 
------------------------- */
	new WOW().init();
    
/*-------------------------
    Notification 
---------------------------*/
$('.notification-close button').on('click', function() {
    $('.notification-section').slideUp();
});  
/*-----------------------
    jQuery MeanMenu
------------------------- */
$('#mobile-menu-active').meanmenu({
    meanScreenWidth: "991",
    meanMenuContainer: ".mobile-menu-area .mobile-menu",
});  

/*-------------------------
    stickey menu
------------------------- */
$(window).on('scroll',function() {    
   var scroll = $(window).scrollTop();
   if (scroll < 265) {
    $(".sticky-header").removeClass("sticky");
   }else{
    $(".sticky-header").addClass("sticky");
   }
});
    
/*---------------------------------
    Header Top Dropdown Menu 
-----------------------------------*/
$( '.drodown-show > a,.shopping-cart li > a' ).on('click', function(e) {
    e.preventDefault();
    if($(this).hasClass('active')) {
        $( '.drodown-show > a,.shopping-cart li > a' ).removeClass('active').siblings('.open-dropdown').slideUp()
        $(this).removeClass('active').siblings('.open-dropdown').slideUp();
    } else {
        $( '.drodown-show > a , .shopping-cart li > a' ).removeClass('active').siblings('.open-dropdown').slideUp()
        $(this).addClass('active').siblings('.open-dropdown').slideDown();
    }
}); 
    
/*-------------------------
    owl active
--------------------------- */    
$('.slider-active').owlCarousel({
    loop:true,
    items:1,
    autoplay: false,
    dots:true,
    nav:false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1},
        1200:{items:1}
    }
}); 
    
/*-------------------------
    owl active
--------------------------- */    
$('.product-active').owlCarousel({
    loop:true,
    items:5,
    autoplay: false,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        480:{items:2},
        767:{items:3},
        992:{items:4},
        1200:{items:5}
    }
}); 
    
/*-------------------------
    owl active
--------------------------- */    
$('.product-active-2').owlCarousel({
    loop:true,
    items:6,
    autoplay: false,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        480:{items:2},
        767:{items:3},
        992:{items:4},
        1200:{items:5},
        1800:{items:6}
    }
}); 
    
/*-------------------------
    owl active
--------------------------- */    
$('.product-active-3').owlCarousel({
    loop:true,
    items:6,
    autoplay: false,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        480:{items:2},
        767:{items:3},
        992:{items:3},
        1200:{items:4},
        1800:{items:6}
    }
});  
    
/*--------------------------
 owl active
------------------------------ */    
$('.single-product-active').owlCarousel({
    loop:true,
    items:4,
    margin:15,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:2},
        480:{items:3},
        768:{items:3},
        992:{items:3},
        1200:{items:3}
    }
});  
    
/*--------------------------
 owl active
------------------------------ */    
$('.pos-product-active').owlCarousel({
    loop:true,
    items:2,
    margin:15,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        480:{items:1},
        767:{items:2},
        992:{items:1},
        1200:{items:2},
        1800:{items:2}
    }
});      
/*--------------------------
 owl active
------------------------------ */    
$('.latest-blog-active').owlCarousel({
    loop:true,
    items:2,
    margin:15,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        480:{items:2},
        767:{items:2},
        992:{items:3},
        1200:{items:4},
        1800:{items:4}
    }
}); 
    
/*----------------------------
 owl active
------------------------------ */
    
$('.testimonials-active').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1},
        1200:{items:1}
    }
});
    
/*---------------------------
	Count Down Timer
----------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>mins</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>secs</p></span>'));
	});
}); 
    
/*-------------------------
    Nice Select
----------------------------*/	
$('.nice-select').niceSelect(); 
    
    
/*-----------------------------
    elevateZoom
-------------------------------*/	
$("#zoom1").elevateZoom({
    gallery:'gallery_01', 
    responsive : true,
    zoomType : 'inner',
    cursor: 'crosshair'
}); 
/*-------------------------------
  showlogin toggle function
--------------------------------*/
$( '#showlogin' ).on('click', function() {
    $( '#checkout-login' ).slideToggle(500);
}); 
    
/*-------------------------------
  showcoupon toggle function
---------------------------------*/
$( '#showcoupon' ).on('click', function() {
    $( '#checkout-coupon' ).slideToggle(500);
});
    
/*--- Checkout ---*/
$("#chekout-box").on("change",function(){
    $(".account-create").slideToggle("100");
});
    
/*-- Checkout -----*/
$("#chekout-box-2").on("change",function(){
    $(".ship-box-info").slideToggle("100");
}); 
    
/*-----------------------
    Accordion
-------------------------*/
$(".faequently-accordion").collapse({
    accordion:true,
    open: function() {
    this.slideDown(300);
  },
  close: function() {
    this.slideUp(300);
  }		
});	  
    
    
/*------------------------------ 
    10. Cart Plus Minus Button
---------------------------------*/
$(".cart-plus-minus").append('<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>');
$(".qtybutton").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 0;
      }
      }
    $button.parent().find("input").val(newVal);
  }); 
    
/*------------------------------
    Category menu Activation
------------------------------*/
$('.category-sub-menu li.has-sub > a').on('click', function () {
    $(this).removeAttr('href');
    var element = $(this).parent('li');
    if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp();
    } else {
        element.addClass('open');
        element.children('ul').slideDown();
        element.siblings('li').children('ul').slideUp();
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp();
    }
}); 
/* ---------------------------------
    counterUp 
-----------------------------*/
$('.count').counterUp({
    delay: 10,
    time: 1000
});
    
/*------------------------------
    ScrollUp Active
--------------------------------*/
$.scrollUp({
    scrollText: '<i class="fa fa-angle-double-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
    
/*-------------------------------
    Instafeed
---------------------------------*/   
if($('#instagram-feed').length) {
var feed = new Instafeed({
    get: 'user',
    userId: 6665768655,
    accessToken: '6665768655.1677ed0.313e6c96807c45d8900b4f680650dee5',
    target: 'instagram-feed',
    resolution: 'thumbnail',
    limit: 6,
    template: '<li><a href="{{link}}" target="_new"><img src="{{image}}" /></a></li>',
});
feed.run();
}  
    
    
    
    
    
    
    
    
    
    
    
})(jQuery); 