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

                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-5">
                    <a href="<?php echo esc_url(the_field('hero_cta_button_link')); ?>"
                        class="btn btn-primary btn-rounded btn-lg"><?php echo esc_attr(the_field('hero_cta_button_text')); ?></a>
                    <?php if(the_field('hero_secondary_button_text')) : ?>
                    <a class="ml-3"
                        href="<?php echo esc_url(the_field('hero_secondary_button_link')); ?>"><?php echo esc_attr(the_field('hero_secondary_button_text')); ?>
                        <i class="las la-arrow-down"></i></a>
                    <?php endif; ?>
                </div>

                <?php if(get_field('show_guarantee', 'option')) : ?>
                <div class="d-flex align-items-center justify-content-center pt-lg-5">
                    <div class="col-3">
                        <img class="img-fluid"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/satisfaction-badge.png">
                    </div>
                    <div class="col-9 px-0">
                        <p class="font-weight-bold mb-1 h4">Satisfaction guaranteed!</p>
                        <p class="mb-0" style="font-size: 14px;">We guarantee you will love your box or your money back!
                        </p>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <div class="col-12 col-lg-7 text-center">
                <?php 
                $hero_images = get_field('hero_images');
                if( !empty( $hero_images ) ): ?>
                <div class="hero-slider">
                    <?php while( have_rows('hero_images') ): the_row(); 
                    $hero_image = get_sub_field('image');
                ?>

                    <div>
                        <img src="<?php echo esc_url($hero_image['url']); ?>" class="img-fluid shadow"
                            alt="<?php echo esc_url($hero_image['alt']); ?>">
                    </div>


                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="how-it-works" class="home-how-it-works py-5 bg-mmb-gray">
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
                <div class="card shadow p-3 border-0 text-center mb-3 p-lg-4">
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
            <div class="col-6 col-lg-3 mb-3">
                <?php 
                            $image_1 = get_field('how_it_works_image_1');
                            if( !empty( $image_1 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_1['url']); ?>" data-aos="fade-down"
                    data-aos-delay="100" data-aos-once="true" alt="<?php echo esc_attr($image_1['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <?php 
                            $image_2 = get_field('how_it_works_image_2');
                            if( !empty( $image_2 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_2['url']); ?>" data-aos="fade-down"
                    data-aos-delay="200" data-aos-once="true" alt="<?php echo esc_attr($image_2['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3 mb-3">
                <?php 
                            $image_3 = get_field('how_it_works_image_3');
                            if( !empty( $image_3 ) ): ?>
                <img class="img-fluid shadow" src="<?php echo esc_url($image_3['url']); ?>" data-aos="fade-down"
                    data-aos-delay="300" data-aos-once="true" alt="<?php echo esc_attr($image_3['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 col-lg-3 mb-3">
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


<?php if (have_rows('previous_boxes')) : ?>
<section id="previous-boxes" class="section previous-boxes">
    <h2 class="text-center mt-5 mb-3"><?php echo esc_attr(the_field('previous_boxes_title')); ?></h2>
    <p class="text-center"><?php echo esc_attr(the_field('previous_boxes_subtitle')); ?></p>
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
        <div class="row">
            <div class="col-12 text-center">
                <a href="<?php echo esc_url(the_field('previous_boxes_button_link')); ?>"
                    class="btn btn-primary btn-rounded btn-lg d-block d-lg-inline-block"><?php echo esc_attr(the_field('previous_boxes_button_text')); ?></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


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



<?php if(get_field('sign_up_for_coupon')) : ?>
<section class="home-box-contents">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <?php echo get_field('sign_up_for_coupon'); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php
get_footer(); 
?>

<script>
var slider = tns({
    container: '.hero-slider',
    items: 1,
    autoplay: true,
    autoplayButtonOutput: false,
    controls: false,
    nav: false,
    autoplayTimeout: 4000
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