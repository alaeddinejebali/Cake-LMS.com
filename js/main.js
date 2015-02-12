/*global jQuery:false */
jQuery(document).ready(function ($) {
    "use strict";
    
/*-----------------------------------------------------------------------------------*/
/*  01. FITVIDS
/*-----------------------------------------------------------------------------------*/

    $(".fitvid").fitVids();

/*-----------------------------------------------------------------------------------*/
/*	02. FLEXSLIDER SETTINGS
/*-----------------------------------------------------------------------------------*/

    $(".flexslider-blockquote").flexslider({
        animation: 'fade',
        touch: true,
        slideshow: true,
        controlNav: true,
        directionNav: false,
        smoothHeight: true,
	start: function(){
         $('.flexslider .slides > li, .flexslider-small .slides > li, .flexslider-blockquote .slides > li').fadeIn(); 
    	}
    });
    
    $(".flexslider").flexslider({
        animation: 'fade',
        touch: true,
        slideshow: true,
	controlNav: true,
        directionNav: false,
        smoothHeight: true,
	start: function(){
         $('.flexslider .slides > li, .flexslider-small .slides > li, .flexslider-blockquote .slides > li').fadeIn(); 
    	}
    });

    $(".flexslider-small").flexslider({
        animation: 'fade',
        touch: true,
        slideshow: true,
        controlNav: true,
        directionNav: false,
        smoothHeight: true,
	start: function(){
         $('.flexslider .slides > li, .flexslider-small .slides > li, .flexslider-blockquote .slides > li').fadeIn(); 
    	}
    });

/*-----------------------------------------------------------------------------------*/
/*	03. RESPONSIVE MENU
/*-----------------------------------------------------------------------------------*/

		$("#collapse").hide();
		$("#collapse-menu").toggle(function () {
		
			jQuery("#collapse").slideToggle(300);
			return false;

		}, function () {

			$("#collapse").slideToggle(300);
			return false;
		});

/*-----------------------------------------------------------------------------------*/
/*  04. NAVIGATION
/*-----------------------------------------------------------------------------------*/
       
		$('.nav a, #downed').click(function() {
			$.scrollTo($(this).attr('href'), {duration: 500, offset:-80});
			return false;
		});

/*-----------------------------------------------------------------------------------*/
/*  05. NAVIGATION EFFECT FADE IN ON SCROLL
/*-----------------------------------------------------------------------------------*/
       
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 400) {
            $(".header-shrink").fadeIn("fast");
        } else {
            $(".header-shrink").fadeOut("fast");
        }
    });

/*-----------------------------------------------------------------------------------*/
/*  06. SLIDE IN ELEMENTS EFFECT
/*-----------------------------------------------------------------------------------*/
       
    new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );

/*-----------------------------------------------------------------------------------*/
/*  07. NAVIGATION WAYPOINTS
/*-----------------------------------------------------------------------------------*/
       
    var sections = jQuery("section");
    var navigation_links = jQuery(".nav a");
    
    sections.waypoint({
        handler: function(event, direction) {
        
            var active_section;
            active_section = jQuery(this);
            if (direction === "up") { active_section = active_section.prev(); }

            var active_link = jQuery('.nav a[href="#' + active_section.attr("id") + '"]');
            navigation_links.removeClass("selected");
            active_link.addClass("selected");

        },
        offset: '30'
    });

/*-----------------------------------------------------------------------------------*/
/*  08. SCROLL TO TOP BUTTON ON NAVIGATION HEADER
/*-----------------------------------------------------------------------------------*/
     
    $('.totop').click(function () { 
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

/*-----------------------------------------------------------------------------------*/
/*  09. LIGHTBOX POPUP FOR GALLERY
/*-----------------------------------------------------------------------------------*/

    $('.gallery-item a').magnificPopup({
        type:'image',
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });


/*-----------------------------------------------------------------------------------*/
/*  09. SCROLLING OPACITY OF INTRO TEXT
/*-----------------------------------------------------------------------------------*/
 
    var divs = $('#fadeOut');
    $(window).on('scroll', function() {
        var st = $(this).scrollTop();
    divs.css({ 'opacity' : (1 - st/350) });
    });

/*-----------------------------------------------------------------------------------*/
/*  10. ANIMATION OF GALLERY
/*-----------------------------------------------------------------------------------*/
 
    $( ".gallery-size-thumbnail" ).addClass( " cbp-so-side-bottom" ); 

/*-----------------------------------------------------------------------------------*/
/*  11. PARALLAX EFFECT HEADER & FOOTER
/*-----------------------------------------------------------------------------------*/
 
if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $('#header').parallax("0%", -0.5); 
    $('#footer').parallax("0%", -0.5); 
} 

});
