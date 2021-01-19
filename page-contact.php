<?php
/**
 * Template Name: Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

get_header();
?>

<section class="page-header py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (get_field('page_title')) : ?>
                <h1 class="text-center"><?php echo esc_attr(get_field('page_title')); ?></h1>
                <?php else : ?>
                <h1 class="text-center">Contact us</h1>
                <?php endif; ?>
                <?php if (get_field('page_subtitle')) : ?>
                <p class="text-center text-black-50"><?php echo esc_attr(get_field('page_subtitle')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="page-content pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();