<?php
// remove categories
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add class to dropdown
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
  $args['class'] = 'form-control';
  return $args;
}, 2 );

add_action('woocommerce_before_add_to_cart_form', 'order_cutoff');

function order_cutoff() {
  global $product; 
  
  if( class_exists( 'WC_Subscriptions_Product' ) && WC_Subscriptions_Product::is_subscription( $product ) ) {
    //echo 'is subscription';

    $date = new DateTime('now');
    $date->modify('last day of this month');
    date_sub($date, date_interval_create_from_date_string('6 days'));

    $todays_date = new DateTime('now');


    echo '<p class="text-primary h4 mt-3 pt-3 border-top">Order cutoff this month: ' . $date->format('F j, Y') . '</p><p class="mb-3" style="font-size: 12px;">Orders placed after this date will ship the following month.</p>';
    
  } elseif (class_exists( 'WC_Subscriptions_Product' ) && !WC_Subscriptions_Product::is_subscription( $product ) && $product->is_in_stock()) {
    $start_date = get_field('month_start', $product->get_id());
    
    $date = new DateTime($start_date);
    $date->modify('last day of this month');
    date_sub($date, date_interval_create_from_date_string('6 days'));
    
    echo '<p class="text-primary h4 my-3 pt-3 border-top">Last day to purchase: ' . $date->format('F j, Y') . '</p>';
  }
}


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