<?php
/**
 * Shortcode Title: Images slider
 * Shortcode: our_clients
 * Usage: [our_clients][our_clients_item url="http://test.com" target="_blank"]image.png[/our_clients_item][/our_clients]
 * Options: action="url/open"
 */
add_shortcode('our_clients_2', 'ts_our_clients_2_func');

function ts_our_clients_2_func( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'fullwidth' => 'yes',
		'color' => '',
		'border_color' => '',
		'min_height' => '',
		'first_page' => '',
		'last_page' => ''
		), 
	$atts));
	
	$classes = array();
	$styles = array();
	
	if ($fullwidth == 'yes')
	{
		$classes[] = 'sc-highlight-full-width';
	}
	else
	{
		$classes[] = 'sc-highlight-standard';
	}
	
	if (!empty($color)) {
		$styles[] = 'background-color: '.$color.';'; 
	}
	
	if (!empty($border_color)) {
		$styles[] = 'border: 1px solid '.$border_color.';'; 
	}
	
	if ($first_page == 'yes') {
		$styles[] = 'margin-top: -30px;';
	}
	if ($last_page == 'yes') {
		$styles[] = 'margin-bottom: -30px;';
	}
	
	global $our_clients_2_items;
	
	if (!isset($our_clients_2_items)) {
		$our_clients_2_items = 0;
	}
	
	$html = '					
		<div class="'.implode(' ',$classes).' sc-our-clients-2" style="'.implode(' ',$styles).'">
		  <div class="sc-highlight">
			'.do_shortcode(shortcode_unautop($content)).'
		  </div>
		  <div class="clear"></div>
		</div>';
	
	$our_clients_2_items = 0;
	
	return $html;
}

/**
 * Shortcode Title: Image item - can be used only with our_clients shortcode
 * Shortcode: our_clients_2_item
 */
add_shortcode('our_clients_2_item', 'ts_our_clients_2_item_func');
function ts_our_clients_2_item_func( $atts, $content = null )
{
	global $our_clients_2_items;
	
	$our_clients_2_items ++;
	
	extract(shortcode_atts(array(
	    'url' => '',
	    'target' => '',
    ), $atts));

	//wordpress is replacing "x" with special character in strings like 1920x1080
	//we have to bring back our "x"
	$content = str_replace('&#215;','x',$content);
	
	$item = '<div class="theme-one-fifth'.($our_clients_2_items == 5 ? ' theme-column-last' : '').'">';
	$image = '<img class="animated bottom-to-top pale-on-hover" src="'.$content.'">';
	if (!empty($url))
	{
		$item .= '<a href="'.$url.'" '.(!empty($target) ? 'target="'.$target.'"':'').'>'.$image.'</a>';
	}
	else
	{
		$item .= $image;
	}
	$item .= '</div>';
	return $item;
}