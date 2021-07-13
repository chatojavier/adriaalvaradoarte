<?php
/**
 * adria functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adria
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( 'AA_DIR_PATH' ) ) {
	define( 'AA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'AA_DIR_URI' ) ) {
	define( 'AA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'AA_BUILD_URI' ) ) {
	define( 'AA_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'AA_BUILD_PATH' ) ) {
	define( 'AA_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'AA_BUILD_JS_URI' ) ) {
	define( 'AA_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'AA_BUILD_JS_DIR_PATH' ) ) {
	define( 'AA_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'AA_BUILD_IMG_URI' ) ) {
	define( 'AA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/img' );
}

if ( ! defined( 'AA_BUILD_CSS_URI' ) ) {
	define( 'AA_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'AA_BUILD_CSS_DIR_PATH' ) ) {
	define( 'AA_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'AA_BUILD_LIB_URI' ) ) {
	define( 'AA_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
}

if ( ! function_exists( 'adria_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adria_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on adria, use a find and replace
		 * to change 'adria' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adria', get_template_directory() . '/languages' );

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
				'aa-header-menu' => esc_html__( 'Primary', 'adria' ),
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
				'adria_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'adria_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adria_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adria_content_width', 640 );
}
add_action( 'after_setup_theme', 'adria_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adria_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adria' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adria' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adria_widgets_init' );


/**
 * Get the menu id by menu location.
 *
 * @param string $location
 *
 * @return integer
 */
function get_menu_id( $location ) {

	// Get all locations
	$locations = get_nav_menu_locations();

	// Get object id by location.
	$menu_id = $locations[$location];

	return ! empty( $menu_id ) ? $menu_id : '';

}

/**
 * Enqueue scripts and styles.
 */
function adria_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/build/css/main.css', array(), _S_VERSION );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/build/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adria_scripts' );


/**========================
 * Disable the emoji's
 ===========================*/
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

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**========================
 * Change the image size autosclaed
 ===========================*/

function new_autoscaled_size( $threshold, $imagesize, $file, $attachment_id ) {
    return 2880;
};
add_filter( 'big_image_size_threshold', 'new_autoscaled_size', 10, 4 );


/**========================
 * Register custom image sizes.
 ===========================*/
	add_image_size( 'aa_gallery', 0, 384, false );
	add_image_size( 'aa_gallery_retina', 0, 768, false );