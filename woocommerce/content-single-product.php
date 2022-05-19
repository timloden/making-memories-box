<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$product_id = $product->get_id();
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="row">
        <div class="col-12 col-lg-6">
            <?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
        </div>
        <div class="col-12 col-lg-6">
            <div class="summary entry-summary ps-lg-3">
                <?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
            </div>
        </div>
    </div>
    <?php if( have_rows('example_box_content') ): ?>
    <section class="activity-examples mt-5">
        <h2 class="text-center mb-5">Some example activities from <?php echo $product->get_name(); ?></h2>
        <div class="row justify-content-center">
            <?php while( have_rows('example_box_content') ): the_row(); 
            $activity_image = get_sub_field('image');
            ?>
            <div class="col-12 col-md-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="d-flex align-items-center">
                    <?php if ($activity_image) : ?>
                    <div class="flex-shrink-0">
                        <img src="<?php echo esc_url($activity_image['url']); ?>" class="rounded mr-3"
                            style="width: 100px;">
                    </div>
                    <?php endif; ?>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mt-0"><?php echo esc_attr(the_sub_field('title')); ?></h5>
                        <?php echo esc_attr(the_sub_field('description')); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>


    <?php do_action( 'woocommerce_after_single_product' ); ?>

</div>