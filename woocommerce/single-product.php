<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
$featured_product = get_field('featured_product', 'option');
?>

<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
?>

<div class="container py-5">

    <?php while ( have_posts() ) : ?>
    <?php the_post(); ?>

    <?php wc_get_template_part( 'content', 'single-product' ); ?>

    <?php endwhile; // end of the loop. ?>

</div>
<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
<?php if ($featured_product) : 
	$featured_product_id = $featured_product->ID;
	$featured_product_image = get_the_post_thumbnail_url($featured_product_id,'full'); 
	$product = wc_get_product( $featured_product_id );
?>
<section class="subscription-hero">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h2 class="text-center text-primary mb-5">Want to save $10 and guarantee your box each month?</h2>
                <div class="card shadow p-3 border-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-5">
                            <a href="<?php the_permalink($featured_product_id); ?>">
                                <img class="img-fluid" src="<?php echo esc_url($featured_product_image); ?>">
                            </a>
                        </div>
                        <div class="col-12 col-lg-7">
                            <h2><?php echo esc_attr($featured_product->post_title); ?></h2>
                            <div class="text-center text-lg-left">

                                <a href="<?php the_permalink($featured_product_id); ?>"
                                    class="btn btn-primary btn-rounded d-block d-lg-inline-block mr-0 mr-lg-3 mb-3 mb-lg-0">Subscribe
                                    Today and
                                    Save!</a>
                                <span class="text-primary font-weight-bold">Staring at just
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
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */