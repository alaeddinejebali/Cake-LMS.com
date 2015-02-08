<?php
/**
 * Shortcode Title: Form
 * Shortcode: form
 * Usage: [form email="test@test.com" from="Website" subject="Form"][field name="Your name" type="text" required="yes" icon="icon-glass"][/form]
 * Options: action="url/open"
 */
add_shortcode('form', 'ts_form_func');

function ts_form_func( $atts, $content = null ) {

	//[tabs ]
	extract(shortcode_atts(array(
	    'success_message' => '',
		'button_text' => __('Send message','circles')
    ), $atts));
	
	wp_enqueue_script( 'jquery-validate' );
	
	global $shortcode_fields, $shortcode_form_email_sent;
    $shortcode_fields = array(); // clear the array
    do_shortcode($content); // execute the '[tab]' shortcode first to get the title and content

	$fields_content = '';
	$i = 0;
	foreach ($shortcode_fields as $field) {
		
		$required = '';
		$required_sign = '';
		if ($field['required'] == 'yes') {
			$required = 'required';
			$required_sign = '*';
		}
		
		$no_border = '';
		if ($i > 0) {
			$no_border = 'sc-form-no-top-border';
		}
		
		//sc-form-no-top-border
		
		$form_field = '';
		switch ($field['type']) {
			case 'email':
				$form_field = '<input type="text" placeholder="'.esc_attr($field['name']).$required_sign.'" name="shortcode_form_'.sanitize_text_field($field['name']).'" id="shortcode_form_'.sanitize_text_field($field['name']).'" class="email '.$required.'" />';
				break;
			
			case 'textarea':
				$form_field = '<textarea placeholder="'.esc_attr($field['name']).$required_sign.'" name="shortcode_form_'.sanitize_text_field($field['name']).'" id="shortcode_form_'.sanitize_text_field($field['name']).'" class="'.$required.'"></textarea>';
				
				break;
			case 'text':
				$form_field = '<input type="text" placeholder="'.esc_attr($field['name']).$required_sign.'" name="shortcode_form_'.sanitize_text_field($field['name']).'" id="shortcode_form_'.sanitize_text_field($field['name']).'" class="'.$required.'" />';
				break;
		}
		if (!empty($form_field)) {
			$fields_content .= '
				<div class="sc-form-row sc-form-'.$field['type'].($i == 0 ? ' sc-form-first' : '').' '.$no_border.'">
					<span class="sc-form-icon '.$field['icon'].'"></span>
					'.$form_field.'
				</div>';
			$i++;
		}
	}
    $shortcode_fields = array();

	if (empty($fields_content)) {
		return '';
	}
	
	$content = '
		<form class="sc-form" method="post" data-required="'.__('This field is required.','circles').'" data-email="'.__('Please check your email.','circles').'">
			'.(isset($shortcode_form_email_sent) && $shortcode_form_email_sent === true ? '<div class="sc-form-success">'.$success_message.'</div>' : '').'
			<div class="sc-form-error"></div>
			'.wp_nonce_field( 'shortcode-form_', '_wpnonce', true, false ).'
			'.$fields_content.'
			<div class="sc-form-row sc-form-submit">
				<input type="submit" name="submit" value="'.$button_text.'" />
				<span class="sc-form-clear">'.__('Clear','circles').' <span class="icon-remove-sign"></span></span>
			</div>
		</form>
	';
	return $content;
}

/**
 * Shortcode Title: Field - can be used only with form shortcode
 * Shortcode: field
 * Usage: [field name="Your name" type="text" required="yes" icon="icon-glass"]
 */
add_shortcode('field', 'ts_field_func');
function ts_field_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'name' => '',
	    'type' => '',
	    'icon' => 'no',
	    'required' => 'no',
    ), $atts));
    global $shortcode_fields;
    $shortcode_fields[] = array(
		'name' => $name, 
		'type' => $type, 
		'icon' => $icon, 
		'required' => $required, 
	);
    return $shortcode_fields;
}