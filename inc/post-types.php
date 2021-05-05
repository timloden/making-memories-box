<?php
/**
 * Custom post types
 */

// Register Custom Post Type

function custom_post_type() {

	$args = [
		'label'  => esc_html__( 'Testimonials', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Testimonials', 'making-memories-box' ),
			'name_admin_bar'     => esc_html__( 'Testimonial', 'making-memories-box' ),
			'add_new'            => esc_html__( 'Add Testimonial', 'making-memories-box' ),
			'add_new_item'       => esc_html__( 'Add new Testimonial', 'making-memories-box' ),
			'new_item'           => esc_html__( 'New Testimonial', 'making-memories-box' ),
			'edit_item'          => esc_html__( 'Edit Testimonial', 'making-memories-box' ),
			'view_item'          => esc_html__( 'View Testimonial', 'making-memories-box' ),
			'update_item'        => esc_html__( 'View Testimonial', 'making-memories-box' ),
			'all_items'          => esc_html__( 'All Testimonials', 'making-memories-box' ),
			'search_items'       => esc_html__( 'Search Testimonials', 'making-memories-box' ),
			'parent_item_colon'  => esc_html__( 'Parent Testimonial', 'making-memories-box' ),
			'not_found'          => esc_html__( 'No Testimonials found', 'making-memories-box' ),
			'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'making-memories-box' ),
			'name'               => esc_html__( 'Testimonials', 'making-memories-box' ),
			'singular_name'      => esc_html__( 'Testimonial', 'making-memories-box' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-quote',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'custom_post_type', 0 );