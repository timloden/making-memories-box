<?php
// redirect to checkout after add to cart
// add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_checkout_add_cart' );
 
// function redirect_checkout_add_cart() {
// 	return wc_get_checkout_url();
// }

add_filter( 'woocommerce_add_to_cart_redirect', 'woo_redirect_checkout', 10, 2 );
function woo_redirect_checkout( $url, $product ) {

    //Define your categories here

    if ( $product->get_type() == 'subscription' ) {
		$url = wc_get_checkout_url();
    } else {
		$url = wc_get_cart_url();
	}

	return $url;
}

// add form control to checkout forms
add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);

function wc_form_field_args($args, $key, $value) {
	//$args['input_class'] = array( 'form-control' );
	switch ( $args['type'] ) {

		case "select" :  /* Targets all select input type elements, except the country and state select input types */
			$args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag  
			$args['input_class'] = array('form-select'); // Add a class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('form-label');
			//$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
		break;
	
		case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group single-country';
			$args['label_class'] = array('form-label');
		break;
	
		case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group'; // Add class to the field's html element wrapper 
			$args['input_class'] = array('form-control'); // add class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('form-label');
			//$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
		break;
	
	
		case "password" :
		case "text" :
		case "email" :
		case "tel" :
		case "number" :
			$args['class'][] = 'form-group';
			//$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
			$args['input_class'] = array('form-control');
			$args['label_class'] = array('form-label');
		break;
	
		case 'textarea' :
			$args['input_class'] = array('form-control');
			$args['label_class'] = array('form-label');
		break;
	
		case 'checkbox' :  
			$args['class'][] = 'form-check';
			$args['input_class'] = array('form-check-input');
			$args['label_class'] = array('form-check-label');
		break;
	
		case 'radio' :
			$args['class'][] = 'form-check';
			$args['input_class'] = array('form-check-input');
			$args['label_class'] = array('form-check-label');
		break;
	
		default :
			$args['class'][] = 'form-group';
			$args['input_class'] = array('form-control');
			$args['label_class'] = array('form-label');
		break;
		}
	
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

add_filter( 'woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment' );

function misha_add_to_cart_fragment( $fragments ) {
	$cart_count = WC()->cart->get_cart_contents_count();
	if ($cart_count == 0 ) {
		$cart_display = 'd-none';
	} else {
		$cart_display = '';
	}

	$fragments[ '#header-cart' ] = 
	'<a id="header-cart" class="d-inline-block h4 mx-lg-3 mb-0 text-dark position-relative"
	href="' . wc_get_cart_url() . '"><i class="bi bi-cart3"></i>
	<span
		class="' . $cart_display . ' position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
		style="font-size: 12px;">
		' . $cart_count . '
		<span class="visually-hidden">unread messages</span>
	</span>
	</a>';
 	
	
	return $fragments;

 }