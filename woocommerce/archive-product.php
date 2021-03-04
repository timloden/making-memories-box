<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$featured_product = get_field('featured_product', 'option');
?>

<?php if ($featured_product) : 
	$featured_product_id = $featured_product->ID;
	$featured_product_image = get_the_post_thumbnail_url($featured_product_id,'full'); 
	$product = wc_get_product( $featured_product_id );
?>
<section class="subscription-hero mb-5" style="background-color: #f5f9fd;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow p-3 border-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4">
                            <a href="<?php the_permalink($featured_product_id); ?>">
                                <img class="img-fluid" src="<?php echo esc_url($featured_product_image); ?>">
                            </a>
                        </div>
                        <div class="col-12 col-lg-8">
                            <h2><?php echo esc_attr($featured_product->post_title); ?></h2>
                            <?php
								echo apply_filters( 'the_content', $product->short_description )
							?>
                            <div class="text-center text-lg-left">

                                <a href="<?php the_permalink($featured_product_id); ?>"
                                    class="btn btn-primary btn-rounded d-block d-lg-inline-block mr-0 mr-lg-3 mb-3 mb-lg-0">Subscribe
                                    Today and
                                    Save!</a>
                                <span class="text-primary font-weight-bold">Starting at just
                                    $<?php echo $product->get_price(); ?>!</span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="container">
    <h2 class="text-center">Individual boxes</h2>
    <?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

    <header class="woocommerce-products-header">

        <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
    </header>
    <?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>
</div>
<?php
get_footer( 'shop' );