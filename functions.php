<?php
/**
 * DHL functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage DHL
 * @since DHL 1.0
 */


define('THEME_DIR', get_template_directory_uri());

if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require THEME_DIR . '/inc/back-compat.php';
}


if(!function_exists(dhl_setup)):
function dhl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dhl', THEME_DIR. '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	// add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'dhl' ),
		'social'  => __( 'Social Links Menu', 'dhl' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// add_theme_support( 'html5', array(
	// 	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	// ) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	// $color_scheme  = twentyfifteen_get_color_scheme();
	// $default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dhl_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );


	add_action( 'widgets_init', 'theme_widgets_init' );
	function theme_widgets_init() {
	    register_sidebar( array(
	        'name' => __( 'Home Sidebar', 'home-sidebar' ),
	        'id' => 'sidebar-home',
	        'description' => __( 'Widgets in this area will be shown on front-page.', 'theme-dhl' ),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
	    ) );

        register_sidebar( array(
            'name' => __( 'Service Sidebar', 'service-sidebar' ),
            'id' => 'sidebar-service',
            'description' => __( 'Widgets in this area will be shown on front-page.', 'theme-dhl' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widgettitle">',
    		'after_title'   => '</h2>',
        ) );
	}

}
endif; // dhl_setup
add_action( 'after_setup_theme', 'dhl_setup' );

function dhl_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'dhl-style', get_stylesheet_uri() );

	wp_deregister_script('jquery');
	wp_register_script('jquery', "http://upcdn.b0.upaiyun.com/libs/jquery/jquery-1.7.2.min.js", false, null);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'main', THEME_DIR. '/js/main.js','jquery' );
}
add_action( 'wp_enqueue_scripts', 'dhl_scripts' );








