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
            <div class="col-12 col-lg-5 pb-5 pb-lg-0">
                <h1 class="text-center text-lg-start"><?php echo esc_attr(the_field('hero_title')); ?></h1>

                <p class="my-3 text-black-50"><?php echo esc_attr(the_field('hero_description')); ?></p>

                <a href="<?php echo esc_url(the_field('hero_cta_button_link')); ?>"
                    class="btn btn-primary btn-rounded"><?php echo esc_attr(the_field('hero_cta_button_text')); ?></a>

                <a class="ms-3 btn btn-outline-dark btn-rounded text-dark"
                    href="<?php echo esc_url(the_field('hero_secondary_button_link')); ?>"><?php echo esc_attr(the_field('hero_secondary_button_text')); ?>
                </a>
            </div>
            <div class="col-12 col-lg-7">

            </div>
        </div>
    </div>
</section>

<section class="product py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 order-1 order-lg-0 text-center">
                <img src="https://makingmemories.local/wp-content/uploads/2021/03/home-slider-1.jpg"
                    class="img-fluid px-5" loading="lazy">
            </div>
            <div class="col-12 col-lg-5 order-0 order-lg-1">
                <h2>Fun and creative activities delivered each month</h2>
                <p class="text-black-50">You will get a NEW themed box at the start of each month. We take care of all
                    the planning & prep
                    work for you.</p>
                <p class="fw-bold mb-2"><i class="bi bi-palette"></i> All supplies included</p>
                <p class="fw-bold mb-2"><i class="bi bi-truck"></i> Free shipping</p>
                <p class="fw-bold"><i class="bi bi-pause-circle"></i> Pause or cancel anytime</p>
                <a href="#" class="btn btn-primary btn-rounded">Choose your box</a>
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

<section id="choose-your-box" class="boxes bg-light py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Choose your box</h2>
                <p>Starting at $34.95. Pre-pay and save!</p>
            </div>
        </div>
        <?php echo do_shortcode('[products category="subscriptions"]'); ?>
        <div class="row">
            <div class="col-12">
                <p class="text-center mb-0 mt-4"><a class="text-dark" href="<?php echo site_url(); ?>/shop">Browse all
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
<section class="recent-posts py-5">
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
            <div class="col">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_img_url); ?>"
                        class="img-fluid" alt="" loading="lazy"></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Continue reading <i class="bi bi-arrow-right"></i></a>
            </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-center mb-0 mt-4"><a href="<?php echo site_url(); ?>/resources">Browse all our helpful
                        kids
                        activity articles</a></p>
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