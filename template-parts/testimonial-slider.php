<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

?>
<section class="section bg-mmb-gray py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4">
                <h2 class="text-center text-lg-left">See what other moms are saying</h2>
                <p class="text-center text-lg-left">We love hearing the feedback from parents and kids about how Making
                    Memories Box has touched their
                    lives!</p>
                <a class="text-dark text-center text-lg-left d-block font-weight-bold"
                    href="<?php echo site_url(); ?>/shop"><u>Start
                        making
                        memories today <i class="las la-arrow-right"></u></i></a>
            </div>
            <div class="col-12 col-lg-8">
                <div class="position-absolute w-100 pt-3"
                    style="background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(233,230,226,1) 100%); height: 225px; top: 0; left: 0; z-index: 999;">
                </div>
                <div class="position-absolute w-100 pb-3"
                    style="background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(233,230,226,1) 100%); height: 225px; bottom: 0; left: 0; z-index: 999;">
                </div>
                <div class="testimonial-slider">
                    <?php while( have_rows('testimonials') ): the_row(); 
                        $testimonial_post = get_sub_field('testimonial_post');
                        $author = get_field('author_name', $testimonial_post->ID);
                    ?>
                    <div>
                        <div class="card shadow p-3 border-0 m-3">
                            <h3></h3>

                            <div class="testimonial-content">
                                <?php echo get_the_content(null, false, $testimonial_post->ID); ?></div>
                            <p class="text-right font-weight-bold" style="font-size: 18px;">
                                <?php echo esc_attr($author); ?></p>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>