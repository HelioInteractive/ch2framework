<?php
/**
 * Helio Blueprint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ch2
 */

if ( ! function_exists( 'ch2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ch2_sandbox_setup() {
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

		// Register nav menus
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main menu', 'ch2' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Quick links', 'ch2' ),
		) );
		register_nav_menus( array(
			'menu-3' => esc_html__( 'Footer', 'ch2' ),
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
add_action( 'after_setup_theme', 'ch2_sandbox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ch2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ch2_content_width', 640 );
}

add_action( 'after_setup_theme', 'ch2_content_width', 0 );

/**
 * Register widget area..
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ch2_widgets_init() {
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

add_action( 'widgets_init', 'ch2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ch2_scripts() {
	wp_enqueue_style( 'ch2-style', get_stylesheet_uri() );


	//Swap these for Live
	//wp_enqueue_style( 'ch2-theme-style', get_template_directory_uri() . '/assets/sass/style.css' );
//the next two lines update the stylesheet version with the time of day, forcing the browser to fetch it fresh.
	$cache_bust = '?' . filemtime( get_stylesheet_directory() . '/assets/sass/style.css' );

	wp_enqueue_style( 'ch2-theme-style', get_template_directory_uri() . '/assets/sass/style.css' . $cache_bust );


	wp_enqueue_script( 'ch2-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20170303', true );

	wp_enqueue_script( 'fade-in-blocks', get_template_directory_uri() . '/assets/js/fade-in-blocks-min.js', array( 'jquery' ), '1', false );

	wp_enqueue_script( 'ch2-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20170303', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'debug-grid', get_template_directory_uri() . '/assets/js/grid-debug-min.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'ch2_scripts' );

function google_fonts() {
	$query_args = array(
		'family' => 'Muli:400,700',
		'subset' => 'latin,latin-ext'
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action( 'wp_enqueue_scripts', 'google_fonts' );

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
//require get_template_directory() . '/inc/customizer.php';


// Move Yoast to bottom of post/page editor
//need to test if this requires a conditional (though we always use yoast safety is nice to have)
function yoasttobottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );

//adds an options page to house header and footer options.
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( 'Global Options' );
}


/**
 * Body Class stuff
 */

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );

//adds a contents of the bodyclass field to the list of body classes


function acf_body_class( $classes ) {

	if ( $bodyclass = get_field( 'body_class', get_queried_object_id() ) ) {

		$bodyclass = esc_attr( trim( $bodyclass ) );

		$classes[] = $bodyclass;
	}

	return $classes;
}


/**
 * Add an options page to each Custom Post type. This page appears within the custom post type menu in the admin allowing the user to  find it more naturally
 *
 * taken from Tusko Trush's plugin to perform the same function see https://github.com/Tusko/ACF-CPT-Options-Pages#usage for usage.
 *
 *
 * The default functions of ACF plugin (get_field, the_field, etc.) can be used to load values from a CPT Options Pages, but second parameter is required to target the CPT options.
 *
 * This is similar to passing through a $post_id parameter to target a specific post object.
 *
 * The $post_id parameter needed is a string containing the cpt_ and CPT name in the following format: "cpt_{CPT_NAME}"
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
					'page_title'  => sprintf( __( '%s Page', 'cpt-acf' ), ucfirst( $cptname ) ),
					'menu_title'  => sprintf( __( '%s Page', 'cpt-acf' ), ucfirst( $cptname ) ),
					'parent_slug' => 'edit.php?post_type=' . $cpt,
					'menu_slug'   => $cpt . '-Page',
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
/*
Hide The gallery short code from the editor, they are ugly and we probably want a better solution anyway.

uncomment the add action to use
*/


// add_action( 'admin_head_media_upload_gallery_form', 'ch2_remove_gallery_setting_div' );
if ( ! function_exists( 'ch2_remove_gallery_setting_div' ) ) {
	function ch2_remove_gallery_setting_div() {
		print '
 <style type="text/css">
 #gallery-settings *{
 display:none;
 }
 </style>';
	}
}

/*
Remove adminbar links

*/

add_action( 'wp_before_admin_bar_render', 'ch2_remove_admin_bar_links' );
function ch2_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'w3tc-faq' );
	$wp_admin_bar->remove_menu( 'w3tc-support' );
}

/**
 * NOTE:  Hide WordPress News
 *
 */

add_action( 'admin_init', 'ch2_disable_dashboard_widgets' );
function ch2_disable_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
}

/*
Disable file editor in the editor online
*/

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}


/*
Get a custom menu order going, reorganize closer to live and uncomment the  proper appropiate lines
*/


function custom_menu_order( $menu_ord ) {
	if ( ! $menu_ord ) {
		return true;
	}

	return array(
		//come back to this near end to get all menus in order

		'wpengine-common', // WPENGINE
		'index.php', // Dashboard
		'edit.php?post_type=page', // Pages
		'edit.php', // Posts
		'edit.php?post_type=tribe_events', // Events
		'edit.php?post_type=team_member', // Team

		'separator1', // First separator
		'gf_edit_forms', // Gravity Forms
		'wpengine-common', // WPENGINE
		'acf-options-global-options', // Global Options
		//	'admin.php?page=specific page',


		'upload.php', // Media

		'separator2', // First separator
		'separator3', // First separator
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
	);

}

add_filter( 'custom_menu_order', 'custom_menu_order' ); // Activate custom_menu_order
add_filter( 'menu_order', 'custom_menu_order' );


function ch2_remove_posts_menu_item() {

	/* remove the sub menu item */
	remove_menu_page(
		'edit.php' // parent slug
	);
}

add_action( 'admin_menu', 'ch2_remove_posts_menu_item' );

/*
 * Disable all comment functionality
 */

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}

add_action( 'admin_init', 'df_disable_comments_post_types_support' );

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}

add_filter( 'comments_open', 'df_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'df_disable_comments_status', 20, 2 );

// Hide existing comments
function df_disable_comments_hide_existing_comments( $comments ) {
	$comments = array();

	return $comments;
}

add_filter( 'comments_array', 'df_disable_comments_hide_existing_comments', 10, 2 );

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'df_disable_comments_admin_menu' );

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ( $pagenow === 'edit-comments.php' ) {
		wp_redirect( admin_url() );
		exit;
	}
}

add_action( 'admin_init', 'df_disable_comments_admin_menu_redirect' );

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}

add_action( 'admin_init', 'df_disable_comments_dashboard' );

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}
}

add_action( 'init', 'df_disable_comments_admin_bar' );


//login logo to sue HDH logo instead
function ch2_custom_login_logo() {
	echo '<style type="text/css">
        .login.login h1 a {background-size: contain;
    width: 100%; height: 150px ; background-position: center center; background-image:url(' . get_stylesheet_directory_uri() . '/assets/images/logo.png); }
    </style>';
}

add_action( 'login_head', 'ch2_custom_login_logo' );

function ch2_login_logo_url() {
	return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'ch2_login_logo_url' );

function ch2_login_logo_url_title() {
	return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'ch2_login_logo_url_title' );


add_action( 'init', 'ch_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function ch_add_editor_styles() {
//find the globals stylesheet instead
	add_editor_style( get_stylesheet_uri() );
}

/*
 * attempt to fix the events calendar ACF conflict
 * */


if ( function_exists( 'acf_get_dir' ) ) {

	function wpdocs_dequeue_script() {
		wp_dequeue_script( 'tribe-select2' );
		wp_deregister_script( 'tribe-select2' );
	}

	add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 99999999 );


}


/*
 * Fixes tab index issues with multiple gforms ina  single page.
 *
 */

add_filter( 'gform_tabindex', '__return_false' );


/**
 * Disable Emoji Support
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

add_action( 'init', 'disable_emojis' );