<?php
/**
 * Helio Blueprint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CH2_Sandbox
 */

if ( ! function_exists( 'CH2_Sandbox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function CH2_Sandbox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Helio Blueprint, use a find and replace
	 * to change 'ch2' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ch2', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'ch2' ),
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
add_action( 'after_setup_theme', 'CH2_Sandbox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function CH2_Sandbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'CH2_Sandbox_content_width', 640 );
}
add_action( 'after_setup_theme', 'CH2_Sandbox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function CH2_Sandbox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ch2' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ch2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'CH2_Sandbox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function CH2_Sandbox_scripts() {
	wp_enqueue_style( 'ch2-style', get_stylesheet_uri() );


	//Swap these for Live
	//wp_enqueue_style( 'ch2-theme-style', get_template_directory_uri() . '/assets/sass/style.css' );
//the next two lines update the stylesheet version with the time of day, forcing the browser to fetch it fresh.
	$cache_bust = '?' . filemtime( get_stylesheet_directory() . '/assets/sass/style.css' );

	wp_enqueue_style( 'ch2-theme-style', get_template_directory_uri() . '/assets/sass/style.css'.$cache_bust );



	wp_enqueue_script( 'ch2-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20170303', true );

	wp_enqueue_script( 'ch2-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20170303', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	}
add_action( 'wp_enqueue_scripts', 'CH2_Sandbox_scripts' );

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




/**
* Add an options page to each Custom Post type. This page appears within the custom post type menu in the admin allowing the user to  find it more naturally
 *
 * taken from Tusko Trush's plugin to perform the same function see https://github.com/Tusko/ACF-CPT-Options-Pages#usage for usage.
 *
 */


function ctpacf_admin_error_notice() {
	echo '<div class="update-nag"><p>' . __( 'Please make sure ACF is installed and activated', 'cpt-acf' ) . '</p></div>';
}
function ctpacf_options_pages() {
	if ( function_exists( 'acf_add_options_page' ) ) { //Check if installed acf
		$ctpacf_post_types = get_post_types( array(
			'_builtin'    => false,
			'has_archive' => true
		) ); //get post types
		foreach ( $ctpacf_post_types as $cpt ) {
			if ( post_type_exists( $cpt ) ) {
				$cptname     = get_post_type_object( $cpt )->labels->name;
				$cpt_post_id = 'cpt_' . $cpt;
				if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
					$cpt_post_id = $cpt_post_id . '_' . ICL_LANGUAGE_CODE;
				}
				$cpt_acf_page = array(
					'page_title'  => sprintf( __( '%s Archive', 'cpt-acf' ), ucfirst( $cptname ) ),
					'menu_title'  => sprintf( __( '%s Archive', 'cpt-acf' ), ucfirst( $cptname ) ),
					'parent_slug' => 'edit.php?post_type=' . $cpt,
					'menu_slug'   => $cpt . '-archive',
					'capability'  => 'edit_posts',
					'post_id'     => $cpt_post_id,
					'position'    => false,
					'icon_url'    => false,
					'redirect'    => false
				);
				acf_add_options_page( $cpt_acf_page );
			} // end if
		}
	} else { //activation warning
		add_action( 'admin_notices', 'ctpacf_admin_error_notice' );
	}
}
add_action( 'init', 'ctpacf_options_pages', 99 );