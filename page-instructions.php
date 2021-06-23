<?php
/**
 * Template Name: Instructions
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
                <h1 class="text-center">Instructions for this month</h1>
                <?php endif; ?>
                <?php if (get_field('page_subtitle')) : ?>
                <p class="text-center text-black-50"><?php echo esc_attr(get_field('page_subtitle')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="page-content pb-5 restricted-page">
    <div class="container">
        <?php if (!is_user_logged_in() && get_field('password_required')) { echo '<p class="text-black-50 text-center">Please login to access your box instructions</p>'; } ?>
        <div class="row justify-content-center">
            <?php
                if (!is_user_logged_in() && get_field('password_required')) {
                    echo '<div class="col-10 col-lg-5 pb-5">';
                    wp_login_form();
                } else {
                    echo '<div class="col-12">';
                    while ( have_posts() ) :
                        the_post();
    
                        get_template_part( 'template-parts/content', 'page-instructions' );
    
                    endwhile; // End of the loop.
                }
               
                ?>
        </div>
    </div>
    </div>
</section>

<?php
get_footer(); ?>

<script type="text/javascript">
var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '#instructions-container',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: 20,
    bottomSpacing: 20
});
</script>