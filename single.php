<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package making-memories-box
 */

get_header();
$post_date = get_the_date( 'F j, Y' );
$categories = get_the_category();
?>

<div id="primary" class="content-area article-single">
    <main id="main" class="site-main pb-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 bg-white rounded-bottom">
                    <div class="px-3">
                        <div class="py-3">
                            <p class="text-black-50 mb-1"><?php echo $categories[0]->name; ?></p>
                            <h1><?php the_title(); ?></h1>
                            <p class="text-black-50" style="font-size: 14px;">Posted on <?php echo $post_date ?></p>
                        </div>
                        <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content-single', get_post_type() );

                    endwhile; // End of the loop.
                    ?>
                    </div>
                </div>
            </div>

        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<div class="post-cta bg-white border-top border-bottom"
    style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/post-detail-cta-bg-800-light.jpg)">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Let us do the prep work for you</h2>
                <p class="mb-4">Each Making Memories Box comes packed and prepped with everything you need to celebrate
                    all
                    life&apos;s little moments. </p>
                <a class="btn btn-primary btn-rounded btn-lg" href="<?php echo site_url(); ?>/shop">Sign up today</a>
            </div>
        </div>
    </div>
</div>


<?php
//get_sidebar();
get_footer();