<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

?>
<section class="section py-5 testimonial-section bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="display-1 text-center" style="font-size: 3rem;"><i class="bi bi-chat-square-quote"></i></p>
            </div>
            <div class="col-12 col-lg-10">
                <div class="testimonial-slider">
                    <?php while( have_rows('testimonials') ): the_row(); 
                        $testimonial_post = get_sub_field('testimonial');
                        $author = get_field('author_name', $testimonial_post->ID);
                    ?>
                    <div class="text-center">
                        <div class="testimonial-content">
                            <?php echo get_the_content(null, false, $testimonial_post->ID); ?>
                        </div>
                        <p class="text-uppercase text-black-50">- <?php echo esc_attr($author); ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>