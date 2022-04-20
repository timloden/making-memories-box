<?php
// redirect to checkout after add to cart
// add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_checkout_add_cart' );
 
// function redirect_checkout_add_cart() {
// 	$checkout_url = WC()->cart->get_checkout_url();
// 	wp_redirect( $checkout_url );
// }

// add form control to checkout forms
add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);

function wc_form_field_args($args, $key, $value) {
	$args['input_class'] = array( 'form-control' );
	return $args;
} 


// redirect to home page after logout

add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){

	wp_redirect( home_url() );
	exit();

}

// remove subscription category from shop page 

function custom_pre_get_posts_query( $q ) {

	$tax_query = (array) $q->get( 'tax_query' );

	$tax_query[] = array(
				 'taxonomy' => 'product_cat',
				 'field' => 'slug',
				 'terms' => array( 'subscriptions' ), // Don't display products in the clothing category on the shop page.
				 'operator' => 'NOT IN',
				 'orderby'    => 'date',
				 'order'    => 'ASC',

	);


	$q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );  


// Remove breadcrumbs from shop & categories

add_filter( 'woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs() {
		if(!is_product()) {
				remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
		}
}

// remove hawaii and alaska from shipping options

add_filter( 'woocommerce_states', 'custom_us_states', 10, 1 );

function custom_us_states( $states ) {
		$non_allowed_us_states = array('AA', 'AE', 'AP'); 

		// Loop through your non allowed us states and remove them
		foreach( $non_allowed_us_states as $state_code ) {
				if( isset($states['US'][$state_code]) )
						unset( $states['US'][$state_code] );
		}
		return $states;
}

add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );

function md_custom_woocommerce_checkout_fields( $fields ) 
{
		$fields['order']['order_comments']['placeholder'] = '';
		$fields['order']['order_comments']['label'] = 'Delivery Instructions';

		return $fields;
}