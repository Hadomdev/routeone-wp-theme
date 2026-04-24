<?php
/**
 * RouteOne functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RouteOne
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( 'TDU' ) ) {
	define( 'TDU', get_template_directory_uri() );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function routeone_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RouteOne, use a find and replace
		* to change 'routeone' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'routeone', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'footer-first-column' => esc_html__( 'Footer 1 column', 'routeone' ),
			'footer-second-column' => esc_html__( 'Footer 2 column', 'routeone' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'routeone_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'routeone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function routeone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'routeone_content_width', 640 );
}
add_action( 'after_setup_theme', 'routeone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function routeone_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'routeone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'routeone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'routeone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function routeone_scripts() {
	wp_enqueue_style( 'routeone-base', get_stylesheet_uri(), array(), time() );
    wp_enqueue_style( 'routeone-style', TDU . '/assets/dist/css/style.bundle.css', array(), _S_VERSION );
	wp_style_add_data( 'routeone-style', 'rtl', 'replace' );

	wp_enqueue_script( 'routeone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'routeone-bundle-script', TDU . '/assets/dist/js/bundle.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'routeone-theme-scripts', TDU . '/js/scripts.js', array('jquery'), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_localize_script( 'routeone-bundle-script', 'transfer_load_more', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'routeone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * ACF Options Pages Register
 */
require get_template_directory() . '/inc/acf-option-page.php';

/**
 * ACF Blocks Register
 */
require get_template_directory() . '/inc/acf-register-blocks.php';

/**
 * Fix Functions
 */
require get_template_directory() . '/inc/fix-functions.php';

/**
 * Common Functions
 */
require get_template_directory() . '/inc/common-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Ajax
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * Legacy URL redirects.
 *
 * Maps old slugs to new CPT-based permalinks (e.g. when migrating
 * flat pages to /transfer/{slug}/ or /service/{slug}/).
 *
 * Replace the example pairs with your own mapping.
 */
function routeone_legacy_redirects() {
	$map = array(
		'old-slug-one/'   => '/new-slug-one/',
		'old-slug-two/'   => '/new-slug-two/',
		'old-slug-three/' => '/new-slug-three/',
	);

	$current_url = ltrim( $_SERVER['REQUEST_URI'], '/' );

	if ( isset( $map[ $current_url ] ) ) {
		wp_safe_redirect( home_url( $map[ $current_url ] ), 301 );
		exit;
	}
}
add_action( 'init', 'routeone_legacy_redirects' );

add_image_size( 'services-description', 390 );
