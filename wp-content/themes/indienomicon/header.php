<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Indienomicon
 * @since Indienomicon 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta property="og:image" content="http://indienomicon.com/<?php bloginfo('template_directory'); ?>/images/fb-preview.png" />
	<meta property="article:publisher" content="https://www.facebook.com/IndieNomicon" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans|Josefin+Sans' rel='stylesheet' type='text/css'>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
	<script>
		// Init Zurb Foundation
		jQuery(document).ready(function ($) {
		    jQuery(document).foundation();
		});
	</script>
</head>

<body <?php body_class(); ?>>

		<header>
			<div class="grid-container">
				<div class="grid-x grid-margin-x">
					<div class="small-12 cell">
						<div class="top-bar">
							<div class="top-bar-title">
								<span data-responsive-toggle="top-level-navigation" data-hide-for="medium">
									<a class="button responsive-nav-button" data-toggle><i class="fi-list"></i></a>
								</span>
								<h1 class="site-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/indienomicon-logo.svg" alt="Indienomicon Logo">Indienomicon</a>
								</h1>
							</div>
							<div class="top-bar-right">
								<nav id="top-level-navigation">
									<?php
										wp_nav_menu(array(
						            'container' => false,
						            'menu' => __( 'Top Bar Menu', 'textdomain' ),
						            'menu_class' => 'dropdown menu align-center vertical medium-horizontal',
						            'theme_location' => 'top-level-navigation',
						            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>'
						        ));
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
