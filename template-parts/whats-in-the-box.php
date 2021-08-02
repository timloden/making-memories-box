<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

$background_image = get_field('whats_in_the_box_background_image');
?>
<section class="section whats-in-the-box py-5"
    style="<?php echo ($background_image) ? 'background:linear-gradient(90deg, rgba(255,255,255,0.5) 100%, rgba(255,255,255,0.5) 100%), url(' . $background_image . ');' : '' ?>">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="text-center mb-3"><?php echo esc_attr(the_field('whats_in_the_box_title')); ?></h2>
                <p class="text-center"><?php echo esc_attr(the_field('whats_in_the_box_description')); ?></p>
            </div>
        </div>
        <?php if( have_rows('whats_in_the_box_items') ): ?>
        <div class="row justify-content-center">
            <?php 
            $box_delay = 50;
            while( have_rows('whats_in_the_box_items') ): the_row(); 
                $icon_image= get_sub_field('box_item_icon');
                ?>
            <div class="col-12 col-lg-4">
                <div class="card shadow p-3 border-0 mb-4" data-aos="fade-down"
                    data-aos-delay="<?php echo $box_delay; ?>" data-aos-once="true">
                    <div class="d-flex">
                        <div class="col-3">
                            <img src="<?php echo esc_url($icon_image['url']); ?>" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <h3><?php echo esc_attr(get_sub_field('box_item_title')); ?></h3>
                            <p><?php echo esc_attr(get_sub_field('box_item_subtitle')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $box_delay = $box_delay + 50;
        endwhile; ?>
        </div>
        <?php if (get_field('whats_in_the_box_cta_text')) : ?>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <a class="btn btn-primary btn-lg btn-rounded"
                    href="<?php echo esc_url(get_field('whats_in_the_box_cta_link')); ?>"><?php echo esc_attr(get_field('whats_in_the_box_cta_text')); ?></a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>