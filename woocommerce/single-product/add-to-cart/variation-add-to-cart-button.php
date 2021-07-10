<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
if ($product->is_in_stock()) :
?>
<div class="woocommerce-variation-add-to-cart variations_button">
    <div class="d-flex align-items-center justify-content-center">


        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

        <?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'classes'      => apply_filters( 'woocommerce_quantity_input_classes', array( 'form-control' ), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
        <button type="submit"
            class="single_add_to_cart_button btn btn-primary btn-lg btn-rounded d-block d-md-inline-block alt ml-3 text-white">Add
            to Cart</button>


        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
    </div>

    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
<?php endif; ?>