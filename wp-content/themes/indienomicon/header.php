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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.min.js"></script>
</head>

<body <?php body_class(); ?>>

		<header>
			<div class="row collapse">
				<h1 class="small-12 medium-6 columns">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo"><img src="<?php bloginfo('template_directory'); ?>/images/indienomicon-logo.svg" alt="Indienomicon Logo">Indienomicon</a>
				</h1>
				<nav class="small-12 medium-6 columns">
					<?php wp_nav_menu( array( 'theme_location' => 'top-level-navigation' ) ); ?>
				</nav>
			</div>
		</header>
