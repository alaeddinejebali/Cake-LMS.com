<?php
/**
 * Shortcode Title: Icon Box
 * Shortcode: icon_box
 * Usage: [icon type="icon-bullhorn" size="icon-large" color="" title=""]Your content here...[/icon]

 */
add_shortcode('icon_box', 'ts_icon_box_func');

function ts_icon_box_func( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'icon' => '',
		'icon_upload' => '',
		'title' => '',
		'url' => '',
		'target' => '_self',
		'animation' => '',
		'effect' => 'no'
	),
	$atts));
	$animation_class = '';
	if (!empty($animation) && $animation != 'no') {
		$animation_class = ' animated '.$animation;
	}
	
	$effect_class = '';
	if (!empty($effect) && $effect != 'no') {
		switch ($effect) {
			case 'float':
			default:
				$effect_class = ' floating-element';
		}
	}
	
	$icon_html = '';
	if (!empty($icon_upload)) {
		$icon_html = '<span><img src="'.$icon_upload.'" /></span>';
	} else {
		$icon_html = '<span class="'.$icon.'"></span>';
	}
	
	$html = '
		<article class="service service-style2">
           <div class="service-icon'.$animation_class.$effect_class.'">
              <a '.(empty($url) ? 'href="#"' : 'href="'.$url.'" target="'.$target.'"').'>'.$icon_html.'</a>
              <div></div>
            </div>
			<h2 class="tran03slinear">'.$title.'</h2>
            '.$content.'
            <a class="read-more" '.(empty($url) ? 'href="#"' : 'href="'.$url.'" target="'.$target.'"').'>'.__('More info','circles').'</a>
        </article>';
	return $html;

}