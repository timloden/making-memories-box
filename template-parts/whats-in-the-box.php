<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */


?>
<section class="section whats-in-the-box py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-3"><?php echo esc_attr(the_field('whats_in_the_box_title')); ?></h2>
                <p class="text-center"><?php echo esc_attr(the_field('whats_in_the_box_description')); ?></p>
            </div>
        </div>
        <?php if( have_rows('whats_in_the_box_items') ): ?>
        <div class="row justify-content-center">
            <?php while( have_rows('whats_in_the_box_items') ): the_row(); 
                $icon_image= get_sub_field('box_item_icon');
                ?>
            <div class="col-12 col-lg-4">
                <div class="d-flex p-3">
                    <div class="col-3">
                        <img src="<?php echo esc_url($icon_image['url']); ?>" class="img-fluid">
                    </div>
                    <div class="col-9">
                        <h3><?php echo esc_attr(get_sub_field('box_item_title')); ?></h3>
                        <p><?php echo esc_attr(get_sub_field('box_item_subtitle')); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">

            </div>
        </div>
        <?php endif; ?>
    </div>
</section>