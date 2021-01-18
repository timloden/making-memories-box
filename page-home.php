<?php
/**
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

get_header();
?>
<section class="home-hero">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-12 col-lg-5 pb-5 pb-lg-0">
                <h1 class="text-center text-lg-left"><?php echo esc_attr(the_field('hero_title')); ?></h1>
                <p class="my-3 text-black-50"><?php echo esc_attr(the_field('hero_description')); ?></p>
                <p class="font-weight-bolder pt-3 h5 text-center text-lg-left pb-3" style="text-decoration: underline;">
                    <?php echo esc_attr(the_field('hero_offer')); ?>
                </p>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <a href="<?php echo esc_url(the_field('hero_cta_button_link')); ?>"
                        class="btn btn-primary btn-rounded btn-lg"><?php echo esc_attr(the_field('hero_cta_button_text')); ?></a>
                    <a class="ml-3"
                        href="<?php echo esc_url(the_field('hero_secondary_button_link')); ?>"><?php echo esc_attr(the_field('hero_secondary_button_text')); ?>
                        <i class="las la-arrow-down"></i></a>
                </div>

            </div>
            <div class="col-12 col-lg-7 text-center">
                <?php 
                    $hero_image = get_field('hero_image');
                    if( !empty( $hero_image ) ): ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" class="img-fluid"
                    alt="<?php echo esc_url($hero_image['alt']); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="how-it-works" class="home-how-it-works py-5"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-circle-right.png) center top / cover;">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <p class="subtitle text-center text-primary mb-0 font-weight-bold mb-1">
                    <?php echo esc_attr(the_field('how_it_works_subtitle')); ?></p>
                <h2 class="text-center"><?php echo esc_attr(the_field('how_it_works_title')); ?></h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 order-1 order-lg-0">
                <div class="d-flex">
                    <div class="col-6 px-0">
                        <div class="d-flex flex-column">
                            <div class="col pb-4">
                                <?php 
                            $image_1 = get_field('how_it_works_image_1');
                            if( !empty( $image_1 ) ): ?>
                                <img class="img-fluid shadow" src="<?php echo esc_url($image_1['url']); ?>"
                                    data-aos="fade-down" data-aos-delay="100" data-aos-once="true"
                                    alt="<?php echo esc_attr($image_1['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <?php 
                            $image_3 = get_field('how_it_works_image_3');
                            if( !empty( $image_3 ) ): ?>
                                <img class="img-fluid shadow" src="<?php echo esc_url($image_3['url']); ?>"
                                    data-aos="fade-down" data-aos-delay="300" data-aos-once="true"
                                    alt="<?php echo esc_attr($image_3['alt']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="col pt-5 pb-4">
                                <?php 
                            $image_2 = get_field('how_it_works_image_2');
                            if( !empty( $image_2 ) ): ?>
                                <img class="img-fluid shadow" src="<?php echo esc_url($image_2['url']); ?>"
                                    data-aos="fade-down" data-aos-delay="200" data-aos-once="true"
                                    alt="<?php echo esc_url($image_2['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <?php 
                            $image_4 = get_field('how_it_works_image_4');
                            if( !empty( $image_4 ) ): ?>
                                <img class="img-fluid shadow" src="<?php echo esc_url($image_4['url']); ?>"
                                    data-aos="fade-down" data-aos-delay="400" data-aos-once="true"
                                    alt="<?php echo esc_url($image_4['alt']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 h-100 order-0 order-lg-1">
                <div class="pl-lg-3 pb-5 pb-lg-0">
                    <?php if( have_rows('how_it_works_steps') ): ?>
                    <?php while( have_rows('how_it_works_steps') ): the_row(); ?>
                    <h3><?php echo esc_attr(the_sub_field('how_it_works_step_title')); ?></h3>
                    <div class="text-black-50 mb-4">
                        <p><?php echo esc_attr(the_sub_field('how_is_works_step_description')); ?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(the_field('how_it_works_button_link')); ?>"
                        class="btn btn-primary btn-rounded btn-lg btn-block d-block d-lg-inline-block"><?php echo esc_attr(the_field('how_it_works_button_text')); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-box-contents py-5"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/yellow-circle-left.png) center top / cover;">
    <div class="container">
        <div class="row pb-3">
            <div class="col-12">
                <p class="subtitle text-center text-primary mb-0 font-weight-bold mb-1">
                    <?php echo esc_attr(the_field('whats_in_the_box_subtitle')); ?></p>
                <h2 class="text-center"><?php echo esc_attr(the_field('whats_in_the_box_title')); ?></h2>
                <p class="text-center text-black-50"><?php echo esc_attr(the_field('whats_in_the_box_description')); ?>
                </p>
            </div>
        </div>

        <?php if( have_rows('whats_in_the_box_contents') ): ?>
        <div class="row">
            <?php while( have_rows('whats_in_the_box_contents') ): the_row(); 
            $activity_image = get_sub_field('box_content_image');
            ?>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo esc_url($activity_image['url']); ?>" class="rounded mr-3"
                        style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo esc_attr(the_sub_field('box_content_title')); ?></h5>
                        <?php echo esc_attr(the_sub_field('box_content_description')); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <div class="row pb-3">
            <div class="col-12">
                <p class="h2 text-center"><?php echo esc_attr(the_field('whats_in_the_box_after_content')); ?></p>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12">
                <p class="h3 text-center"><a href="<?php echo esc_url(the_field('bottom_special_offer_link')); ?>"
                        class="text-primary"><?php echo esc_attr(the_field('bottom_special_offer_text')); ?></a></p>
            </div>
        </div>
        <?php 
        $bottom_box_image = get_field('bottom_box_image');
        if( !empty( $bottom_box_image ) ): ?>

        <div class="row">
            <div class="col-12 text-center">
                <img src="<?php echo esc_url($bottom_box_image['url']); ?>" class="img-fluid"
                    alt="<?php echo esc_url($bottom_box_image['alt']); ?>">
            </div>
        </div>

        <?php endif; ?>
    </div>
</section>

<?php
get_footer();