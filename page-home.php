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
                <?php if(get_field('hero_offer')) : ?>
                <p style="font-size: 16px;" class="mb-1 text-primary font-weight-bold pt-3">LIMITED OFFER:</p>
                <p class="font-weight-bolder h4 text-center text-lg-left pb-3" style="text-decoration: underline;">
                    <?php echo esc_attr(the_field('hero_offer')); ?>
                </p>
                <?php endif; ?>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <a href="<?php echo esc_url(the_field('hero_cta_button_link')); ?>"
                        class="btn btn-primary btn-rounded btn-lg"><?php echo esc_attr(the_field('hero_cta_button_text')); ?></a>
                    <?php if(the_field('hero_secondary_button_text')) : ?>
                    <a class="ml-3"
                        href="<?php echo esc_url(the_field('hero_secondary_button_link')); ?>"><?php echo esc_attr(the_field('hero_secondary_button_text')); ?>
                        <i class="las la-arrow-down"></i></a>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-12 col-lg-7 text-center">
                <?php 
                    //echo do_shortcode('[products ids="169"]');
                    
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

        <div class="row pb-3">
            <div class="col-12">
                <h2 class="text-center pb-3"><?php echo esc_attr(the_field('how_it_works_title')); ?></h2>
            </div>
        </div>

        <div class="row mb-5">
            <?php if( have_rows('how_it_works_steps') ): ?>
            <?php while( have_rows('how_it_works_steps') ): the_row(); ?>
            <div class="col-12 col-lg-4">
                <div class="card shadow p-3 border-0 text-center">
                    <h4 class="pb-2"><?php echo esc_attr(the_sub_field('how_it_works_step_title')); ?></h4>
                    <div class="text-black-50">
                        <p class="mb-0"><?php echo esc_attr(the_sub_field('how_is_works_step_description')); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="row mb-5">
            <div class="col-6 col-lg-3">
                <?php 
                            $image_1 = get_field('how_it_works_image_1');
                            if( !empty( $image_1 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_1['url']); ?>" data-aos="fade-down"
                    data-aos-delay="100" data-aos-once="true" alt="<?php echo esc_attr($image_1['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3">
                <?php 
                            $image_2 = get_field('how_it_works_image_2');
                            if( !empty( $image_2 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_2['url']); ?>" data-aos="fade-down"
                    data-aos-delay="200" data-aos-once="true" alt="<?php echo esc_attr($image_2['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3">
                <?php 
                            $image_3 = get_field('how_it_works_image_3');
                            if( !empty( $image_3 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_3['url']); ?>" data-aos="fade-down"
                    data-aos-delay="300" data-aos-once="true" alt="<?php echo esc_attr($image_3['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3">
                <?php 
                            $image_4 = get_field('how_it_works_image_4');
                            if( !empty( $image_4 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_4['url']); ?>" data-aos="fade-down"
                    data-aos-delay="400" data-aos-once="true" alt="<?php echo esc_attr($image_4['alt']); ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="<?php echo esc_url(the_field('how_it_works_button_link')); ?>"
                    class="btn btn-primary btn-rounded btn-lg d-block d-lg-inline-block"><?php echo esc_attr(the_field('how_it_works_button_text')); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="home-box-contents py-5"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/yellow-circle-left.png) center top / cover;">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <p class="h3 text-center"><a href="<?php echo esc_url(the_field('bottom_special_offer_link')); ?>"
                        class="text-primary"><?php echo esc_attr(the_field('bottom_special_offer_text')); ?></a></p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();