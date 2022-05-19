<?php
/**
 * The main template file 
 *	
 *	Resources page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

get_header();
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <header class="page-header">
                <h1 class="page-title text-center">Resources</h1>
                <p class="text-center mb-0">Discover all kinds of fun activities to do with your family!</p>
            </header><!-- .page-header -->
        </div>
    </div>
</div>
<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main pb-5">

            <?php
				if ( have_posts() ) :
				
				echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 py-5 g-3 g-md-5 justify-content-center">';
				
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				echo '</div>';
				
				bootstrap_pagination();

				else :
					get_template_part( 'template-parts/content', 'none' );
				
				endif;
			?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<div class="bg-white py-5 border-top border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3>
                    Start making your own memories
                </h3>
                <p class="mb-4">Each Making Memories Box comes packed and prepped with everything you need to celebrate
                    all
                    life&apos;s little moments. </p>
                <a class="btn btn-primary btn-rounded btn-lg" href="<?php echo site_url(); ?>/shop">Sign up today</a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();