<?php
/**
 * russbrown functions and definitions
 *
 * @package russbrown
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'russbrown_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function russbrown_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on russbrown, use a find and replace
	 * to change 'russbrown' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'russbrown', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'russbrown' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'russbrown_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // russbrown_setup
add_action( 'after_setup_theme', 'russbrown_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function russbrown_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'russbrown' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'russbrown_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function russbrown_scripts() {
	wp_enqueue_style( 'russbrown-style', get_stylesheet_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'russbrown-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20120206', true );

	wp_enqueue_script( 'russbrown-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'russbrown_scripts' );


/**
* Create our custom post types
*/
function my_custom_post_link() {
  $labels = array(
    'name'               => _x( 'links', 'post type general name' ),
    'singular_name'      => _x( 'link', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'link' ),
    'add_new_item'       => __( 'Add New link' ),
    'edit_item'          => __( 'Edit link' ),
    'new_item'           => __( 'New link' ),
    'all_items'          => __( 'All links' ),
    'view_item'          => __( 'View link' ),
    'search_items'       => __( 'Search links' ),
    'not_found'          => __( 'No links found' ),
    'not_found_in_trash' => __( 'No links found in the Trash' ), 
    'parent'             => __( 'Parent'),
    'parent_item_colon'  => '',
    'menu_name'          => 'links'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our links and link specific data',
    'menu_icon' => 'dashicons-groups',
    'public'        => true,
    'menu_position' => 5,
    'hierarchical'  => true,
    'taxonomies' => array('category'), 
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
    'has_archive'   => true,
    'map_meta_cap' => true
  );
  register_post_type( 'link', $args ); 
}
add_action( 'init', 'my_custom_post_link' );


function my_custom_post_portfolio() {
  $labels = array(
    'name'               => _x( 'portfolio', 'post type general name' ),
    'singular_name'      => _x( 'portfolio', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'portfolio' ),
    'add_new_item'       => __( 'Add New portfolio' ),
    'edit_item'          => __( 'Edit portfolio' ),
    'new_item'           => __( 'New portfolio' ),
    'all_items'          => __( 'All portfolio' ),
    'view_item'          => __( 'View portfolio' ),
    'search_items'       => __( 'Search portfolio' ),
    'not_found'          => __( 'No portfolio found' ),
    'not_found_in_trash' => __( 'No portfolio found in the Trash' ), 
    'parent'             => __( 'Parent'),
    'parent_item_colon'  => '',
    'menu_name'          => 'portfolio'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our portfolio and portfolio specific data',
    'menu_icon' => 'dashicons-groups',
    'public'        => true,
    'menu_position' => 5,
    'hierarchical'  => true,
    'taxonomies' => array('category'), 
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
    'has_archive'   => true,
    'map_meta_cap' => true
  );
  register_post_type( 'portfolio', $args ); 
}
add_action( 'init', 'my_custom_post_portfolio' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
