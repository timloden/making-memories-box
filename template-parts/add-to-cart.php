<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

$featured_product = get_field('featured_product', 'option');
if ($featured_product) : 
	$featured_product_id = $featured_product->ID;
	$featured_product_image = get_the_post_thumbnail_url($featured_product_id,'full'); 
	$product = wc_get_product( $featured_product_id );
?>
<section class="subscription-hero mb-5 bg-mmb-gray">
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

                                <div class="d-flex justify-content-center">
                                    <div class="col-12 col-lg-10">
                                        <?php echo do_shortcode('[add_to_cart_form id="' . $featured_product_id . '"]'); ?>
                                    </div>
                                </div>
                                <script type="text/template" id="tmpl-variation-template">
                                    <div class="d-flex align-items-center justify-content-center">
									<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
									<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
									<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
									</div>
								
								</script>
                                <script type="text/template" id="tmpl-unavailable-variation-template">
                                    <p>Sorry, this product is unavailable. Please choose a different combination.</p>
								</script>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>