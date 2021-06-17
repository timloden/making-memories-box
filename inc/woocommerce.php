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
    $non_allowed_us_states = array( 'AK', 'HI', 'AA', 'AE', 'AP'); 

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

// add to cart c=variation shortcode

function add_to_cart_form_shortcode( $atts ) {
  if ( empty( $atts ) ) {
      return '';
  }

  if ( ! isset( $atts['id'] ) && ! isset( $atts['sku'] ) ) {
      return '';
  }

  $args = array(
      'posts_per_page'      => 1,
      'post_type'           => 'product',
      'post_status'         => 'publish',
      'ignore_sticky_posts' => 1,
      'no_found_rows'       => 1,
  );

  if ( isset( $atts['sku'] ) ) {
      $args['meta_query'][] = array(
          'key'     => '_sku',
          'value'   => sanitize_text_field( $atts['sku'] ),
          'compare' => '=',
      );

      $args['post_type'] = array( 'product', 'product_variation' );
  }

  if ( isset( $atts['id'] ) ) {
      $args['p'] = absint( $atts['id'] );
  }

  $single_product = new WP_Query( $args );

  $preselected_id = '0';


  if ( isset( $atts['sku'] ) && $single_product->have_posts() && 'product_variation' === $single_product->post->post_type ) {

      $variation = new WC_Product_Variation( $single_product->post->ID );
      $attributes = $variation->get_attributes();


      $preselected_id = $single_product->post->ID;


      $args = array(
          'posts_per_page'      => 1,
          'post_type'           => 'product',
          'post_status'         => 'publish',
          'ignore_sticky_posts' => 1,
          'no_found_rows'       => 1,
          'p'                   => $single_product->post->post_parent,
      );

      $single_product = new WP_Query( $args );
  ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    var $variations_form = $('[data-product-page-preselected-id="<?php echo esc_attr( $preselected_id ); ?>"]')
        .find('form.variations_form');
    <?php foreach ( $attributes as $attr => $value ) { ?>
    $variations_form.find('select[name="<?php echo esc_attr( $attr ); ?>"]').val(
        '<?php echo esc_js( $value ); ?>');
    <?php } ?>
});
</script>
<?php
  }

  $single_product->is_single = true;
  ob_start();
  global $wp_query;

  $previous_wp_query = $wp_query;

  $wp_query          = $single_product;

  wp_enqueue_script( 'wc-single-product' );
  while ( $single_product->have_posts() ) {
      $single_product->the_post()
      ?>
<div class="single-product" data-product-page-preselected-id="<?php echo esc_attr( $preselected_id ); ?>">
    <?php woocommerce_template_single_add_to_cart(); ?>
</div>
<?php
  }

  $wp_query = $previous_wp_query;

  wp_reset_postdata();
  return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}
add_shortcode( 'add_to_cart_form', 'add_to_cart_form_shortcode' );