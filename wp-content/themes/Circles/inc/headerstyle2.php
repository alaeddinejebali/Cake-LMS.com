<?php
/**
 * Header style 2
 *
 * @package circles
 * @since circles 1.0
 */
?>
<header class='page-header'>
	<?php $active_social_items = ot_get_option('active_social_items');
	if (!is_array($active_social_items))
	{
		$active_social_items = array();
	}
	
	$show_preheader = ot_get_option('show_preheader');
	if (is_singular()) {
		$show_post_preheader = get_post_meta(get_the_ID(),'show_preheader',true);
		if (in_array($show_post_preheader,array('yes','no'))) {
			$show_preheader = $show_post_preheader;
		}
	}
	
	?>
	<?php if ($show_preheader != 'no'): ?>
		<div class="wrapper  preheader">
			<div class="container">
				<ul class="socials no-bg-icon">
				<?php if (in_array('facebook',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='facebook tran02slinear' href='<?php echo ot_get_option('facebook_url'); ?>' title="Facebook" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('twitter',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='twitter tran02slinear' href='<?php echo ot_get_option('twitter_url'); ?>' title="Twitter" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('skype',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='skype tran02slinear' href='skype:<?php echo ot_get_option('skype_url'); ?>?call'></a>
					</li>
				<?php endif;?>
				<?php if (in_array('dribble',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='dribbble tran02slinear' href='<?php echo ot_get_option('dribble_url'); ?>' title="Dribble" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('youtube',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='youtube tran02slinear' href='<?php echo ot_get_option('youtube_url'); ?>' title="Youtube" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('pinterest',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='pinterest tran02slinear' href='<?php echo ot_get_option('pinterest_url'); ?>' title="Pinterest" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('tumblr',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='tumblr tran02slinear' href='<?php echo ot_get_option('tumblr_url'); ?>' title="Tumblr" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('google_plus',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='google-plus tran02slinear' href='<?php echo ot_get_option('google_plus_url'); ?>' title="Google+" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('linkedin',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='linkedin tran02slinear' href='<?php echo ot_get_option('linkedin_url'); ?>' title="LinkedIn" target="_blank"></a>
					</li>
				<?php endif;?>
				</ul>
				<?php if (ot_get_option('header_phone')): ?>
					<a class="phone contact" href="#"><?php echo ot_get_option('header_phone'); ?></a>
				<?php endif; ?>		
			</div>
		</div>
	<?php endif; ?> 	

	<div class='wrapper menu-bg <?php echo get_post_meta(get_the_ID(), 'transparent_header', true) == 'yes' ? 'transparent' : '' ?> border-bottom-white'>
		<div class='container'>
			<div class='grid_12'>
				<div class='logo'>
					<?php if (ot_get_option('logo_url')): ?>
						<?php $logo = ts_get_image(ot_get_option('logo_url'), '' , esc_attr( get_bloginfo( 'name', 'display' ) )); ?>
					<?php else: ?>
						<?php $logo = '<img src="'.get_bloginfo('template_directory').'/images/logo.png" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'; ?>
					<?php endif;?>
					<a href='<?php echo home_url( '/' ); ?>' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo $logo; ?></a>
				</div>
				<a id="menu-btn" href="#"></a>

				<?php if (ot_get_option('show_search_nav') != 'no'): ?>
					<div id="search-icon">
						<i></i>
						<form role="search" method="get" id="searchform" action="<?php bloginfo('url')?>">
							<input type="text" value="" name="s" placeholder="Search" id="s">
						</form>
					</div>
				<?php endif;
				$defaults = array(
					'container'       => 'nav',
					'theme_location' 	=> 'primary',
					'depth' 			=> 3,
					'walker'			=> new ts_walker_nav_menu
				);
				wp_nav_menu( $defaults ); ?>
				<ul class='socials mobile-socials'>
				<?php if (in_array('facebook',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='facebook tran02slinear' href='<?php echo ot_get_option('facebook_url'); ?>' title="Facebook" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('twitter',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='twitter tran02slinear' href='<?php echo ot_get_option('twitter_url'); ?>' title="Twitter" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('skype',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='skype tran02slinear' href='skype:<?php echo ot_get_option('skype_url'); ?>?call'></a>
					</li>
				<?php endif;?>
				<?php if (in_array('dribble',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='dribbble tran02slinear' href='<?php echo ot_get_option('dribble_url'); ?>' title="Dribble" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('youtube',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='youtube tran02slinear' href='<?php echo ot_get_option('youtube_url'); ?>' title="Youtube" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('pinterest',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='pinterest tran02slinear' href='<?php echo ot_get_option('pinterest_url'); ?>' title="Pinterest" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('tumblr',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='tumblr tran02slinear' href='<?php echo ot_get_option('tumblr_url'); ?>' title="Tumblr" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('google_plus',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='google-plus tran02slinear' href='<?php echo ot_get_option('google_plus_url'); ?>' title="Google+" target="_blank"></a>
					</li>
				<?php endif;?>
				<?php if (in_array('linkedin',$active_social_items)): ?>
					<li>
						<span class="tran02slinear"></span>
						<a class='linkedin tran02slinear' href='<?php echo ot_get_option('linkedin_url'); ?>' title="LinkedIn" target="_blank"></a>
					</li>
				<?php endif;?>
			</ul>
			</div>
		</div>
	</div>
	<div class='absolute'>
		<?php  if (!get_post_meta(get_the_ID(), 'post_slider',true)/* && !get_post_meta(get_the_ID(),'header_background',true)*/):
			get_template_part( 'inc/top' );
		endif; ?>
	</div>
</header>