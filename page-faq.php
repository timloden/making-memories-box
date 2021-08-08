<?php
/**
 * Template Name: FAQ
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
                <h1 class="text-center"><?php the_title(); ?></h1>
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
        <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

        <?php if( get_field('frequently_asked_questions') ) {
        get_template_part( 'template-parts/faq' ); 
        } ?>
    </div><!-- #primary -->
</section>


<?php
get_footer();