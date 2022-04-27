<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

?>
<?php if( have_rows('what_to_expect_boxes') ): ?>
<section class="section py-5 what-to-expect-section">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4">
                <div class="ms-md-5 mb-4 mb-md-0 mx-3 mx-md-0">
                    <h2>What you can expect</h2>
                    <p class="text-black-50 mb-4">Fun seasonal activities that range from crafts to games to family
                        activities.</p>
                    <a href="#" class="btn btn-primary btn-rounded">Get started today</a>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="d-flex flex-wrap flex-lg-nowrap">
                    <?php 
                    $delay = 0;
                    while( have_rows('what_to_expect_boxes') ): the_row(); 
                    $image = get_sub_field('what_to_expect_box');
                    ?>
                    <div class="col-12 col-md-5 ms-md-5 mb-3 mb-md-0">
                        <img class="img-fluid" src="<?php echo esc_url($image['url']) ?>" loading="lazy"
                            alt="<?php echo esc_attr($image['alt']); ?>" data-aos="fade-left"
                            data-aos-delay="<?php echo $delay; ?>" data-aos-once="true">
                    </div>
                    <?php 
                    $delay = $delay + 500;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>