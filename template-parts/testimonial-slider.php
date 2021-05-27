<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

 //rgba(233,230,226,1)  
 $testimonials_background = get_field('testimonials_background');
?>
<section class="section py-5 testimonial-section"
    style="background-color: #f4ddda; background-size: cover; <?php if ($testimonials_background) { echo 'background: url(' . $testimonials_background . ')'; } ?> ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4">
                <h2 class="text-center text-lg-left mb-3">See what other moms are saying</h2>
                <?php if ( !is_product() ) : ?>
                <a class=" text-dark text-center text-lg-left d-block font-weight-bold"
                    href="<?php echo site_url(); ?>/shop"><u>Start
                        making
                        memories today <i class="las la-arrow-right"></u></i></a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-8 px-0 px-lg-3">
                <div class="position-absolute h-100 left-slider-grad d-none d-lg-inline-block"
                    style="background: linear-gradient(-90deg, rgba(255,255,255,0) 0%, rgba(244, 221, 218, 1) 100%); width: 120px; top: 0; left: 0; z-index: 999;">
                </div>
                <div class="position-absolute h-100 right-slider-grad d-none d-lg-inline-block"
                    style="background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(244, 221, 218, 1) 100%); width: 120px; top: 0; right: 0; z-index: 999;">
                </div>
                <div class="testimonial-slider">
                    <?php while( have_rows('testimonials') ): the_row(); 
                        $testimonial_post = get_sub_field('testimonial_post');
                        $author = get_field('author_name', $testimonial_post->ID);
                    ?>
                    <div>
                        <div class="card h-100 shadow border-0 m-3 testimonial-card">
                            <div class="d-flex flex-column card-body justify-content-between">
                                <div class="testimonial-content">
                                    <?php echo get_the_content(null, false, $testimonial_post->ID); ?>
                                </div>
                                <p class="text-right font-weight-bold" style="font-size: 18px;">
                                    <?php echo esc_attr($author); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>