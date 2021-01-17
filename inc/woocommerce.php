<?php
// redirect to checkout after add to cart
add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_checkout_add_cart' );
 
function redirect_checkout_add_cart() {
   return wc_get_checkout_url();
}

// add form control to checkout forms
add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);

function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
} 