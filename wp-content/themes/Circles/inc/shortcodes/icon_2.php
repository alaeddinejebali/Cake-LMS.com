<?php
/**
 * Shortcode Title: Icon 2
 * Shortcode: icon_2
 * Usage: [icon_2 type="icon-bullhorn" title=""]Your content here...[/icon_2]

 */
add_shortcode('icon_2', 'ts_icon_2_func');

function ts_icon_2_func( $atts, $_content = null ) {

	extract(shortcode_atts(array(
		'icon' => 'icon-circle-blank',
		'icon_upload' => '',
		'title' => '',
		'content' => '',
		'url' => '',
		'target' => '_self'
	),
	$atts));
	
	$animation_class = '';
	switch ($animation) {
		case 'showup':
			$animation_class = 'animated';
			break;
	}
	
	$icon_upload_html = '';
	if (!empty($icon_upload)) {
		$icon_upload_html = '<img src="'.$icon_upload.'" />';
	}
	
	$html = '<article class="service">';
	
	if (!empty($icon_upload_html)) {
		$html .= '
			<div class="service-icon ">
				<a '.(empty($url) ? '' : 'href="'.$url.'" target="'.$target.'"').'>
					'.$icon_upload_html.'
				</a>
				<div></div>
			</div>';
	} else {
		$html .= '
			<a '.(empty($url) ? '' : 'href="'.$url.'" target="'.$target.'"').'>
				<div class="service-icon ">
					<span class="'.$icon.'"></span>
					<div></div>
				</div>
			</a>';
	}
	
	$html .= '
			<h2 class="tran03slinear">'.$title.'</h2>
			'.$content.'
		</article>';
	return $html;

}