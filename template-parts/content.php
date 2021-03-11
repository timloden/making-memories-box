<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restoration-performance
 */

?>
<div class="col mb-4">
    <div class="card h-100 shadow border-0 post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>">
            <div class="rounded-top loop-card-image"
                style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>);">

            </div>
        </a>
        <div class="card-body">
            <h5 class="card-title"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
            <?php the_excerpt(); ?>
            <p class="mb-0 text-right"><a href="<?php the_permalink(); ?>">Continue reading <i
                        class="las la-angle-right"></i></a></p>
        </div>
    </div>
</div>