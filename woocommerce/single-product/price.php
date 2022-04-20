<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="row justify-content-lg-between align-items-center mt-3">

    <div class="col-12 col-lg">
        <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price h4 text-dark' ) ); ?>">
            <?php echo $product->get_price_html(); ?></p>
    </div>
    <?php if( class_exists( 'WC_Subscriptions_Product' ) && WC_Subscriptions_Product::is_subscription( $product ) ) : ?>
    <div class="col-12 col-lg">
        <p>Rating: <i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i
                class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill"></i></p>
    </div>
    <?php endif; ?>
</div>