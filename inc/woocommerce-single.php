<?php
// remove categories
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add class to dropdown
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
  $args['class'] = 'form-control';
  return $args;
}, 2 );

add_filter('woocommerce_available_variation', 'variation_price_custom_suffix', 10, 3 );

function variation_price_custom_suffix( $variation_data, $product, $variation ) {
  //print_r($variation_data);  
  //$variation_data['price_html'] .= ' <span class="price-suffix">' . __("each", "woocommerce") . '</span>';
  
  if (WC_Subscriptions_Product::is_subscription( $product )) {
    $variation_data['price_html'] = '<p class="h3"><del class="text-black-50">$' . $variation_data['display_regular_price'] . '</del> <span class="text-primary">$' . $variation_data['display_price'] . '</span></p>';
    $variation_data['price_html'] .= '<p>$' . $variation_data['display_price'] . ' /month after</p>';
    
  } else {
    $variation_data['price_html'] = '<p class="h3"><span class="text-primary">$' . $variation_data['display_price'] . '</span></p>';

  }

  return $variation_data;
}

add_action('woocommerce_single_product_summary', 'move_single_product_price', 1);

function move_single_product_price() {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 29);
}