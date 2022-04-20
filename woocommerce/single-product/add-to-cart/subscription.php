<?php
/**
 * Subscription Product Add to Cart
 *
 * @author  Prospress
 * @package WooCommerce-Subscriptions/Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Bail if the product isn't purchasable and that's not because it's limited.
if ( ! $product->is_purchasable() && ( ! is_user_logged_in() || 'no' === wcs_get_product_limitation( $product ) ) ) {
	return;
}

$user_id = get_current_user_id();

echo wp_kses_post( wc_get_stock_html( $product ) );

if ( $product->is_in_stock() ) : ?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<?php if ( ! $product->is_purchasable() && 0 !== $user_id && 'no' !== wcs_get_product_limitation( $product ) && wcs_is_product_limited_for_user( $product, $user_id ) ) : ?>
<?php $resubscribe_link = wcs_get_users_resubscribe_link_for_product( $product->get_id() ); ?>
<?php if ( ! empty( $resubscribe_link ) && 'any' === wcs_get_product_limitation( $product ) && wcs_user_has_subscription( $user_id, $product->get_id(), wcs_get_product_limitation( $product ) ) && ! wcs_user_has_subscription( $user_id, $product->get_id(), 'active' ) && ! wcs_user_has_subscription( $user_id, $product->get_id(), 'on-hold' ) ) : // customer has an inactive subscription, maybe offer the renewal button. ?>
<a href="<?php echo esc_url( $resubscribe_link ); ?>"
    class="button product-resubscribe-link"><?php esc_html_e( 'Resubscribe', 'woocommerce-subscriptions' ); ?></a>
<?php else : ?>
<p class="limited-subscription-notice notice">
    <?php esc_html_e( 'You have an active subscription to this product already.', 'woocommerce-subscriptions' ); ?></p>
<?php endif; ?>
<?php else : ?>
<form class="cart mt-4"
    action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
    method="post" enctype='multipart/form-data'>

    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
    <div class="row g-3 align-items-center">
        <?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		) );

		do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-rounded btn-lg single_add_to_cart_button button alt"
                name="add-to-cart"
                value="<?php echo esc_attr( $product->get_id() ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        </div>
    </div>

    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

</form>
<?php endif; ?>

<div class="d-flex justify-content-between justify-content-md-start mt-5">
    <div class="col-auto pe-md-4">
        <p class="fw-bold mb-0 d-flex align-items-center product-page-value-prop"><i class="bi bi-palette pe-2"></i> All
            Supplies <br>Included</p>
    </div>
    <div class="col-auto pe-md-4">
        <p class="fw-bold mb-0 d-flex align-items-center product-page-value-prop"><i class="bi bi-truck pe-2"></i> Free
            <br>Shipping
        </p>
    </div>
    <div class="col-auto pe-md-4">
        <p class="fw-bold d-flex align-items-center product-page-value-prop"><i class="bi bi-pause-circle pe-2"></i>
            Pause or
            <br>Cancel Anytime
        </p>
    </div>
</div>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>