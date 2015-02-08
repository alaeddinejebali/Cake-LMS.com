<?php
/**
 * Shortcode Title: Icon 6
 * Shortcode: icon_6
 * Usage: [icon_6 type="icon-bullhorn" title=""]Your content here...[/icon_6]

 */
add_shortcode('icon_6', 'ts_icon_6_func');

function ts_icon_6_func( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'icon' => 'icon-circle-blank',
		'icon_upload' => '',
		'link_name' => '',
		'title' => '',
		'url' => '',
		'target' => '_self'
	),
	$atts));
	
	$icon_html = '';
	if (!empty($icon_upload)) {
		$icon_html = '<span><img src="'.$icon_upload.'" /></span>';
	} else {
		$icon_html = '<span class="'.$icon.'"></span>';
	}
	
	$html = '
		<div class="sc-icon sc-icon-style4">
			'.$icon_html.'
			<h2>'.$title.'</h2>
			'.$content.'
			<a href="'.$url.'" target="'.$target.'">'.$link_name.'</a>
		</div>';
	return $html;

}