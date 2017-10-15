<?php
/**
 * Helio Blueprint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Helio_Blueprint
 */

if ( ! function_exists( 'helio_blueprint_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function helio_blueprint_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Helio Blueprint, use a find and replace
	 * to change 'helio-blueprint' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'helio-blueprint', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'helio-blueprint' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'helio_blueprint_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function helio_blueprint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'helio_blueprint_content_width', 640 );
}
add_action( 'after_setup_theme', 'helio_blueprint_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function helio_blueprint_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'helio-blueprint' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'helio-blueprint' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'helio_blueprint_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function helio_blueprint_scripts() {
	wp_enqueue_style( 'helio-blueprint-style', get_stylesheet_uri() );
		
	wp_enqueue_style( 'helio-blueprint-theme-style', get_template_directory_uri() . '/assets/sass/style.css' );
	
	wp_enqueue_script( 'helio-blueprint-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20170303', true );

	wp_enqueue_script( 'helio-blueprint-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20170303', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	}
add_action( 'wp_enqueue_scripts', 'helio_blueprint_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Page Slug Body Class
 * adds the page post type and slug "type-slug" as a class to the body element, A quick way to target styles that exist on a specific page to prevent collateral damage
 */

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Move Yoast to bottom of post/page editor
//need to test if this requires a conditional (though we always use yoast safety is nice to have)
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
