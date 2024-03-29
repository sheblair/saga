<?php
/**
 * SAGA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saga
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saga_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on saga, use a find and replace
		* to change 'saga' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'saga', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'header-menu' => __( 'Header', 'saga' ),
			'footer-menu' => __( 'Footer', 'saga' )
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
			'saga_custom_background_args',
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
add_action( 'after_setup_theme', 'saga_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saga_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saga_content_width', 640 );
}
add_action( 'after_setup_theme', 'saga_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saga_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'saga' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'saga' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'saga_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saga_scripts() {
	wp_enqueue_style( 'saga-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'saga-style', 'rtl', 'replace' );

	wp_enqueue_script( 'saga-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'saga-index', get_template_directory_uri() . '/js/index.js', array(), _S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saga_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Above this comment is everything that came included with _s,
* (except for edits I made to the enqueue scripts and styles function).
* Below this comment is everything I added.
**/

/* Register Artist Page post type */
function create_custom_post_types() {
    register_post_type( 'artist',
        array(
            'labels' => array(
                'name' => __( 'Artist Pages' ),
                'singular_name' => __( 'Artist Page' )
            ),
            'public' => true,
            'has_archive' => false,
			'show_in_rest' => true,
            'rewrite' => array( 'slug' => 'artists' ),
			'menu_position' => 5,
			'supports' => array( 'title', 'editor' ),
        )
    );
}
add_action( 'init', 'create_custom_post_types' );

/* Re-order Single Artist title as First name, Last name (necessary to override Last name, First name
set-up that ensures correct alphabetical order in the query loop) */
function custom_artist_title($title) {
    // Check if it's the 'artist' custom post type (singular name)
    if (is_singular('artist')) {
        // Get the custom field value for "name"
        $artist_name = get_post_meta(get_the_ID(), 'name', true);

        if ($artist_name) {
            // Replace the title with the artist name
            $title = $artist_name . ' - Society of American Graphic Artists';
        }
    }

    return $title;
}

add_filter('pre_get_document_title', 'custom_artist_title');

/* Re-order admin menu items */
function dgtlnk_custom_menu_order( $menu_ord ) {

     if ( !$menu_ord ) return true;

     return array(

          'index.php', // Dashboard

          'separator1', // First separator

          'edit.php', // Posts

          'edit.php?post_type=page', // Pages

		  'edit.php?post_type=artist', // Artist Pages

		  'upload.php', // Media

		  'separator2', // Second separator

		  'users.php', // Users

		  'tools.php', // Tools

		  'options-general.php', // Settings

		  'themes.php', // Appearance

		  'separator-last', // Last separator

		  'plugins.php', // Plugins

		  'admin.php?page=fonts-plugin', // Fonts Plugin

		  'edit.php?post_type=acf-field-group', // ACF

		  'admin.php?page=metaslider', // MetaSlider

		  'admin.php?page=sbi-feed-builder', // Instagram Feed

		  'admin.php?page=cool-plugins-timeline-addon', // Cool Timeline - Timeline Addon

     );

}

add_filter( 'custom_menu_order', 'dgtlnk_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'dgtlnk_custom_menu_order', 10, 1 );


/* Remove Comments and Links from admin menu */
function dgtlnk_remove_menus() {
     remove_menu_page( 'edit-comments.php' );
	 remove_menu_page( 'link-manager.php' );
}

add_action( 'admin_menu', 'dgtlnk_remove_menus' );

/**
* Remove support for Comments and Excerpt on all Posts and Pages,
* remove support for Page Attributes on all Pages
*/
function remove_support_from_posts() {
    // Remove support for comments/discussion
    remove_post_type_support('post', 'comments');
	remove_post_type_support('post', 'trackbacks');
	remove_post_type_support('page', 'comments');

    // Remove support for excerpts
    remove_post_type_support('post', 'excerpt');
	remove_post_type_support('page', 'excerpt');

	// Remove support for page attributes
	remove_post_type_support('page', 'page-attributes');

}
add_action('init', 'remove_support_from_posts');

