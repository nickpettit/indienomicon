<?php
/**
 * @package WordPress
 * @subpackage Indienomicon
 * @since Indienomicon 1.0
 */

/**
 * Let WordPress manage the document title.
 */
function indie_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'indie_setup' );


/**
 * Remove menus from admin that aren't needed.
 */
function indie_remove_menus() {

  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments

}
add_action( 'admin_menu', 'indie_remove_menus' );


/**
 * Register theme menus
 */
function indie_register_menu() {
  register_nav_menu('top-level-navigation',__( 'Top Level Navigation' ));
	register_nav_menu('about-sidebar-navigation',__( 'About Sidebar Navigation' ));
}
add_action( 'init', 'indie_register_menu' );


/**
 * Hide the toolbar on the frontend.
 */
add_filter('show_admin_bar', '__return_false');


/**
 * Remove extra items from the toolbar.
 */
add_action( 'admin_bar_menu', 'indie_modify_admin_menu', 999 );
function indie_modify_admin_menu( $wp_admin_bar ) {
	// Remove menu items
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'site-name' );
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'new-media' );
}


/**
 * Redirect all users from the Dashboard to the games listing
 */
function indie_dashboard_redirect() {
	wp_redirect(admin_url('edit.php?post_type=game'));
}
add_action('load-index.php', 'indie_dashboard_redirect', 999);


/**
 * Remove taxonomy meta boxes from game submission form
 */
function remove_custom_taxonomy() {
	remove_meta_box('tagsdiv-genres', 'game', 'side' );
	remove_meta_box('tagsdiv-engines', 'game', 'side' );
	remove_meta_box('tagsdiv-platforms', 'game', 'side' );
}
add_action( 'admin_menu', 'remove_custom_taxonomy' );


/**
 * Login customization: Logo linked URL
 */
function indie_change_wp_login_url() {
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'indie_change_wp_login_url');


/**
 * Register styles and scripts.
 */
function indie_register_styles_and_scripts() {

		wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
		wp_enqueue_style( 'normalize' );

		wp_register_style( 'foudation', get_template_directory_uri() . '/css/foundation.min.css' );
    wp_enqueue_style( 'foudation' );

    wp_register_script( 'slick', get_template_directory_uri() . '/slick/slick.js' );
    wp_enqueue_script( 'slick' );

		wp_register_style( 'slick', get_template_directory_uri() . '/slick/slick.css' );
    wp_enqueue_style( 'slick' );

		wp_register_style( 'slick-theme', get_template_directory_uri() . '/slick/slick-theme.css' );
    wp_enqueue_style( 'slick-theme' );

		wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

}
add_action( 'wp_enqueue_scripts', 'indie_register_styles_and_scripts' );


/**
 * Register the AFC filter to save games using the game submission form
 */
function indie_pre_save_game( $post_id ) {
    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    // Create a new post
    $post = array(
        'post_status'  => 'draft' ,
        'post_title'  => $_POST['acf']['project_title'] ,
        'post_type'  => 'game'
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}
add_filter('acf/pre_save_post' , 'indie_pre_save_game' );

?>
