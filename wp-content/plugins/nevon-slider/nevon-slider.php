<?php

/*
Plugin Name: Nevon Slider
Plugin URI: 
Description: Nevon Slider is a powerful slider!
Author: Xander Rock
Version: 0.5
Author URI: http://activeden.net/user/XanderRock/portfolio
*/

/*Some Set-up*/
define('NSLIDER_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('NSLIDER_NAME', "Nevon Slider");
define ("NSLIDER_VERSION", "0.5");

/*Files to Include*/
require_once('slider-img-type.php');


/*Add the Javascript/CSS Files!*/
wp_enqueue_script('nevonslider', NSLIDER_PATH.'nevon.slider.1.0.js', array('jquery'));
wp_enqueue_style('nevonslider_css', NSLIDER_PATH.'nevon-slider.css');
wp_enqueue_script('nevonslider-starter', NSLIDER_PATH.'nevon.slider.starter.js', array('jquery'));



/*Add the Hooks to place the javascript in the header*/

function nslider_script(){
$hasNevon = false;

$efs_query= "post_type=slider-image&posts_per_page=99";

	query_posts($efs_query);

	

	

	if (have_posts()) : while (have_posts()) : the_post(); 
	$hasNevon = true;
	endwhile;
	endif;
	wp_reset_query();

if($hasNevon):
/*
print "<script type='text/javascript' charset='utf-8'>
		jQuery(document).ready(function() {
			
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				jQuery( '#jms-slideshow' ).jmslideshow( jQuery.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: true
				}));
				
			});
            </script>";
			*/
endif;
}

add_action('wp_head', 'nslider_script');

function nslider_get_slider(){
	
	$slider= '<section id="jms-slideshow" class="jms-slideshow">';

	$steptags = array(0 => '<div class="step" data-color="color-3" data-x="1500" data-y="100" data-z="1000" data-rotate="45">',
					  1 => '<div class="step" data-color="color-5" data-x="1000" data-y="1500" data-z="1000" data-rotate="-20">',
					  2 => '<div class="step" data-color="color-3" data-x="2000" data-y="1500" data-z="1000" data-rotate="20">',
					  3 => '<div class="step" data-color="color-4" data-x="3000" data-y="2000">',
					  4 => '<div class="step" data-color="color-5" data-x="4000" data-y="1500" data-z="1000" data-rotate="-20">',
					  5 => '<div class="step" data-color="color-4" data-x="-100" data-z="1500" data-rotate="170">');
					  
	$counter = 0;
	
	$efs_query= "post_type=slider-image&posts_per_page=99";
	query_posts($efs_query);
	
	
	if (have_posts()) : while (have_posts()) : the_post(); 
		$img= get_the_post_thumbnail( $post->ID, 'large' );
		
		$slider.=$steptags[$counter]."<div class='jms-content'><h3>".get_the_title()."</h3><p>".strip_images(100,false)."</p>";
		
		$linkDesc = get_extra_btn();
		
		if(isset($linkDesc[0]) && is_string($linkDesc[0]) && strlen($linkDesc[0]) > 7){
			$slider .= "<a class='jms-link' href='".$linkDesc[0]."'>".$linkDesc[1]."</a></div>
							".$img."</div>";
		}else{
			$slider .= "</div>".$img."</div>";
		}
		
						
		$counter++;
		if($counter >= count($steptags)) $counter = 0;
			
	endwhile; endif; wp_reset_query();


	$slider.= '</div>';
	
	return $slider;
}


/**add the shortcode for the slider- for use in editor**/

function nslider_insert_slider($atts, $content=null){

$slider= nslider_get_slider();

return '<div class="nevon-slider-container">'.$slider.'</div><div class="clearFix"></div>';

}


add_shortcode('nevonSlider', 'nslider_insert_slider');



/**add template tag- for use in themes**/

function nslider_slider(){

	print nslider_get_slider();
}


?>