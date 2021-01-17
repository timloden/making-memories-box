<?php
// remove categories
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add class to dropdown
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
  $args['class'] = 'form-control';
  return $args;
}, 2 );