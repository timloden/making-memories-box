<?php

/**
 *  functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package making-memories-box
 */

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
'https://github.com/timloden/making-memories-box/',
__FILE__,
'making-memories-box'
);

if ( ! function_exists( 'theme_setup' ) ) :

	function theme_setup() {

		// title tag
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-primary' => esc_html__( 'Header Primary', 'starter-theme' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// bootstrap - custom nav walker
		include_once get_template_directory() . '/vendor/class-wp-bootstrap-navwalker.php';

		// bootstrap - category walker
		include_once get_template_directory() . '/vendor/class-wp-category-walker.php';

		// woocommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support('wc-product-gallery-zoom');
		//add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// add block css
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );

		// remove emojis
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	}
endif;

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Registers an editor stylesheet for the theme.
 */
function theme_add_editor_styles() {
	
    add_editor_style( get_template_directory_uri() . '/assets/css/editor-styles.css' );
}

add_action( 'admin_init', 'theme_add_editor_styles' );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => 'Site Options',
			'menu_title' => 'Site Options',
			'menu_slug'  => 'site-options',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);


}

//svg support

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
   }

   add_filter('upload_mimes', 'cc_mime_types');

// disable comments for posts
function my_prefix_comments_open( $open, $post_id ) {
	$post_type = get_post_type( $post_id );
	// allow comments for built-in "post" post type
	if ( $post_type == 'post' || $post_type == 'page' ) {
		return false;
	}
	// disable comments for any other post types
	return true;
}
add_filter( 'comments_open', 'my_prefix_comments_open', 10, 2 );

// hide edit page link
add_filter( 'edit_post_link', '__return_false' );

// order items in shop admin

function wc_new_order_column( $columns ) {
    $columns['order_products'] = 'Order Products';
    return $columns;
}
add_filter( 'manage_edit-shop_order_columns', 'wc_new_order_column' );

add_action( 'manage_shop_order_posts_custom_column' , 'custom_orders_list_column_content', 20, 2 );
function custom_orders_list_column_content( $column, $post_id ) {
    global $the_order, $post;

    if ( 'order_products' === $column ) {
        $products_names = []; // Initializing

        // Loop through order items
        foreach ( $the_order->get_items() as $item ) {
            $product = $item->get_product(); // Get the WC_Product object
            $products_names[]  = $item->get_name(); // Store in an array
        }
        // Display
        echo '<ul style="list-style: none;"><li>' . implode('</li><li>', $products_names) . '</li></ul>';
    }
}


/**
 * Load includes
 */

function includes_autoload() {
	$function_path = pathinfo( __FILE__ );

	foreach ( glob( $function_path['dirname'] . '/inc/*.php' ) as $file ) {
		include_once $file;
	}
}

add_action( 'after_setup_theme', 'includes_autoload' );