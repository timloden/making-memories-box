<?php
/**
 * Template part for displaying page content in instructions-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

?>
<div class="row justify-content-center mb-5">
    <div class="col-12 col-lg-10 text-center">
        <h2><?php echo esc_attr(the_field('month')); ?></h2>
        <p class="mb-0 text-black-50"><?php echo esc_attr(the_field('month_description')); ?></p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-3 position-relative mb-5">
        <div class="list-group sidebar" id="sidebar">
            <div class="sidebar__inner list-group">
                <?php if( have_rows('activities') ): ?>
                <?php while( have_rows('activities') ): the_row(); ?>
                <a class="list-group-item list-group-item-action"
                    href="#list-item-<?php echo get_row_index(); ?>"><?php echo esc_attr(the_sub_field('activity_name')); ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-9">
        <div id="instructions-container">
            <?php if( have_rows('activities') ): ?>
            <?php while( have_rows('activities') ): the_row(); 
                $image = get_sub_field('activity_image');
            ?>
            <div class="mb-5 pb-5 border-bottom activity-instruction" id="list-item-<?php echo get_row_index(); ?>">
                <h4 class="mb-4 text-center text-lg-left">
                    <?php echo esc_attr(the_sub_field('activity_name')); ?></h4>
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-lg-3 text-center mb-4 mb-lg-0">
                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-9">
                        <?php the_sub_field('activity_instructions'); ?>
                    </div>
                </div>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <p class="text-center">If you have an questions, please feel free to email us at: <a
                href="mailto:sales@makingmemoriesbox.com">sales@makingmemoriesbox.com</a></p>
    </div>
</div>