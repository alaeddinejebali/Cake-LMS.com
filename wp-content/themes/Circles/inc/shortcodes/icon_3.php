<?php
/**
 * Shortcode Title: Icon 3
 * Shortcode: icon_3
 * Usage: [icon_3 type="icon-bullhorn" title=""]Your content here...[/icon_3]

 */
add_shortcode('icon_3', 'ts_icon_3_func');

function ts_icon_3_func( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'icon' => '',
		'icon_upload' => '',
		'title' => ''
	),
	$atts));
	
	$icon_upload_html = '';
	if (!empty($icon_upload)) {
		$icon_upload_html = '<img src="'.$icon_upload.'" />';
	}
	
	$html = '
		<div class="sc-icon sc-icon-style2">
            '.(!empty($icon_upload_html) ? '<span>'.$icon_upload_html.'</span>' : '<span class="'.$icon.'"></span>').'
			<h2>'.$title.'</h2>
            '.$content.'
		</div>';
	return $html;
}