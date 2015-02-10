// JavaScript Document

jQuery(window).load(function(){  
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() > 180) {
				jQuery('#toTop').fadeIn();	
			} else {
				jQuery('#toTop').fadeOut();
			}
		});
	 
		jQuery('#toTop').click(function() {
			jQuery('body,html').animate({scrollTop:0},800);
		});	

});

