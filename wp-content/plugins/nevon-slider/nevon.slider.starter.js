jQuery(document).ready(function(){
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				jQuery( '#jms-slideshow' ).jmslideshow( jQuery.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: true
				}));

});