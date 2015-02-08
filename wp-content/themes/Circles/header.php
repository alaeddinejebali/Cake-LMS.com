<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @package circles
 * @since circles 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0'>
		<title><?php
		/*
		* Print the <title> tag based on what is being viewed.
		*/
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'circles' ), max( $paged, $page ) );

		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if (ot_get_option('favicon')) :?>
			<link rel="shortcut icon" href="<?php echo ot_get_option('favicon') ?>" type="image/x-icon" />
		<?php endif;?>
		<?php echo ot_get_option('scripts_header'); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		if (ot_get_option('control_panel') == 'enabled_admin' && current_user_can('manage_options') || ot_get_option('control_panel') == 'enabled_all'): ?>
			<?php get_template_part('framework/control-panel'); ?>
		<?php endif; ?>
		<?php
		switch (ts_get_main_menu_style())
		{
			case 'style2':
				get_template_part('inc/headerstyle2');
				break;

			case 'style3':
				get_template_part('inc/headerstyle3');
				break;
			
			case 'style4':
				get_template_part('inc/headerstyle4');
				break;
			
			case 'style5':
				get_template_part('inc/headerstyle5');
				break;
			
			case 'style6':
				get_template_part('inc/headerstyle6');
				break;
			
			default:
				get_template_part('inc/headerstyle1');
				break;
		}
		?>
