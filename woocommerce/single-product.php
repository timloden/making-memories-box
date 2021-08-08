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

global $product;
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

<div class="container pt-5">

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
<?php if ($featured_product && $featured_product->ID !== $product->get_id()) : 
	$featured_product_id = $featured_product->ID;
	$featured_product_image = get_the_post_thumbnail_url($featured_product_id,'full'); 
	$featured = wc_get_product( $featured_product_id );
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
                                    $<?php echo $featured->get_price(); ?>!</span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(get_field('whats_in_the_box_items')) {
    get_template_part( 'template-parts/whats-in-the-box' ); 
}
?>

<?php if( have_rows('testimonials') ) {
    get_template_part( 'template-parts/testimonial-slider' ); 
} 
?>

<?php 
$show_as_seen = get_field('show_on_homepage_as_seen', 'option');
if ( $show_as_seen ) {
    get_template_part( 'template-parts/as-seen-on' ); 
}
?>

<?php if( get_field('frequently_asked_questions') ) {
    echo '<h2 class="text-center mt-5 mb-3">Frequently Asked Questions</h2>';
    get_template_part( 'template-parts/faq' ); 
} ?>

<?php if (have_rows('previous_boxes')) : ?>
<section class="section previous-boxes">
    <h2 class="text-center mt-5 mb-3">Here are some of our previous boxes!</h2>
    <p class="text-center">Each month's box is packed with fun, creative and easy ways to enjoy time as a family.</p>
    <div class="container py-5">
        <?php while( have_rows('previous_boxes') ): the_row(); 
        $box_post = get_sub_field('box_product');
        
        $post_id = $box_post->ID;
        $box_featured_image = get_the_post_thumbnail_url($post_id,'full');
        ?>
        <div class="row align-items-center mb-5">
            <div class="col-12 col-lg-4">
                <img src="<?php echo $box_featured_image; ?>" class="img-fluid">
            </div>
            <div class="col-12 col-lg-8">

                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="mb-4 text-center text-lg-left"><?php echo get_the_title($post_id); ?></h3>
                    </div>
                    <?php while( have_rows('example_box_content', $post_id) ): the_row(); 
                    $activity_image = get_sub_field('image');
                    ?>
                    <div class="col-12 col-lg-6 mb-3">

                        <div class="media align-items-center">
                            <img src="<?php echo esc_url($activity_image['url']); ?>" class="rounded mr-3"
                                style="width: 100px;">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo esc_attr(the_sub_field('title')); ?></h5>
                                <?php //echo esc_attr(the_sub_field('description')); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</section>
<?php endif; ?>

<?php
get_footer( 'shop' );
$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) :
?>
<script>
var slider = tns({
    container: '.product-gallery',
    items: 1,
    slideBy: 'page',
    autoplay: false,
    controls: false,
    navContainer: '.product-gallery-thumbs',
    navAsThumbnails: true,
    navPosition: 'bottom',
});

var testimonial_slider = tns({
    container: '.testimonial-slider',
    items: 1,
    center: true,
    edgePadding: 50,
    autoplay: true,
    autoplayButtonOutput: false,
    controls: false,
    nav: false,
    autoplayTimeout: 5000
});
</script>
<?php endif;