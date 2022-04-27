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
<section class="home-hero py-5"
    style="background-image: url(<?php echo site_url(); ?>/wp-content/themes/making-memories-box/assets/images/placeholder-hero-bg.jpg); background-size: cover;">
    <div class="container py-5">
        <div class="row align-items-center py-5">
            <div class="col-12 col-lg-5 pb-5 pb-md-0 text-center text-lg-start">
                <h1><?php echo esc_attr(get_field('hero_title')); ?></h1>

                <p class="mt-3 mb-4 text-black-50"><?php echo esc_attr(get_field('hero_description')); ?></p>
                <?php if (get_field('hero_cta_button_text')) : ?>
                <a href="<?php echo esc_url(get_field('hero_cta_button_link')); ?>"
                    class="btn btn-primary btn-rounded"><?php echo esc_attr(get_field('hero_cta_button_text')); ?></a>
                <?php endif; ?>
                <?php if (get_field('hero_secondary_button_text')) : ?>
                <a class="ms-2 btn btn-outline-primary btn-rounded"
                    href="<?php echo esc_url(get_field('hero_secondary_button_link')); ?>"><?php echo esc_attr(get_field('hero_secondary_button_text')); ?>
                </a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-7">

            </div>
        </div>
    </div>
</section>

<section class="product py-md-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-center mb-lg-0 order-1 order-lg-0">
                <img src="https://makingmemories.local/wp-content/uploads/2021/03/home-slider-1.jpg"
                    class="img-fluid px-lg-5" loading="lazy" data-aos="fade-up" data-aos-once="true">
            </div>
            <div class="col-12 col-lg-5 order-0 order-lg-1">
                <h2 class="text-center text-lg-start"><?php echo esc_attr(get_field('box_information_title')); ?></h2>
                <p class="text-black-50 text-center text-lg-start">
                    <?php echo esc_attr(get_field('box_information_description')); ?></p>

                <?php if (have_rows('box_information_features')) : ?>
                <div class="d-flex justify-content-center justify-content-lg-start mb-4 mb-md-0">
                    <div class="col-auto">
                        <?php while( have_rows('box_information_features') ): the_row(); 
                $feature = get_sub_field('feature');
                ?>
                        <p class="fw-bold mb-2" style="font-size: 1.25rem;"><?php echo $feature; ?></p>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (get_field('box_information_button_text')) : ?>
                <p class="text-center text-lg-start mt-3 mb-5 mb-md-0"><a
                        href="<?php echo esc_url(get_field('box_information_button_link')); ?>"
                        class="btn btn-primary btn-rounded d-block d-lg-inline-block mt-3 mt-lg-4"><?php echo esc_attr(get_field('box_information_button_text')); ?></a>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if ( have_rows('testimonials') ) {
    get_template_part( 'template-parts/testimonial-slider' ); 
} 
?>

<?php get_template_part( 'template-parts/what-to-expect' ); ?>


<?php if (get_field('instagram_shortcode', 'option')) {
    get_template_part( 'template-parts/instagram-feed' ); 
}
?>

<section id="choose-your-box" class="boxes bg-light py-md-5">
    <div class="container py-5">
        <div class="row mb-3 mb-md-4">
            <div class="col-12 text-center">
                <h2>Choose your box</h2>
                <p>Starting at $34.95. Pre-pay and save!</p>
            </div>
        </div>
        <div class="card shadow p-3 border-0 mb-md-3">
            <?php echo do_shortcode('[products category="subscriptions"]'); ?>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-center mb-0 mt-4"><a style="font-size: 1.25rem;"
                        class="text-dark text-decoration-underline" href="<?php echo site_url(); ?>/shop">Browse all
                        Making Memory Boxes</a></p>
            </div>
        </div>
    </div>
</section>

<?php 
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>
<section class="recent-posts py-md-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 text-center">
                <h2>Some of our latest articles</h2>
                <p>The latest activities, crafts, and helpful articles for sparking your kids creativity. </p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-3">
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            ?>
            <div class="col text-center">
                <a href="<?php the_permalink(); ?>">
                    <div class="featured-image"
                        style="background-image: url(<?php echo esc_url($featured_img_url); ?>); background-size: cover;">

                    </div>
                </a>
                <h3 class="mt-3 mt-md-4"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Continue reading <i class="bi bi-arrow-right"></i></a>
            </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-center mb-0 mt-4 mt-lg-5">
                    <a style="font-size: 1.25rem;" class="text-dark text-decoration-underline"
                        href="<?php echo site_url(); ?>/resources">Browse all our helpful kids activity articles</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer(); 
?>

<script>
var testimonial_slider = tns({
    container: '.testimonial-slider',
    items: 1,
    center: true,
    edgePadding: 0,
    autoplay: true,
    autoplayButtonOutput: false,
    controls: false,
    nav: true,
    navPosition: 'bottom',
    autoplayTimeout: 5000
});
</script>