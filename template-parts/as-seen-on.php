<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

$as_seen_title = get_field('as_seen_on_title', 'option');
$as_seen_link = get_field('as_seen_on_link', 'option');
$as_seen_desc = get_field('as_seen_on_description', 'option');
$as_seen_image = get_field('as_seen_on_image', 'option');
$as_seen_embed = get_field('as_seen_on_embed', 'option');
?>
<section class="section as-seen-on py-5">
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-4 text-center text-lg-left">
                        <div class="pr-lg-3">
                            <?php if ($as_seen_title) : ?><h2 class="text-center text-lg-left pb-3">
                                <?php echo esc_attr($as_seen_title); ?></h2><?php endif; ?>
                            <?php if ($as_seen_link) : ?><a href="<?php echo esc_url($as_seen_link); ?>"><?php endif; ?>
                                <?php if ($as_seen_image) : ?>
                                <img src="<?php echo esc_url($as_seen_image['url']); ?>"
                                    alt="<?php echo esc_attr($as_seen_image['alt']); ?>" class="img-fluid">
                                <?php endif; ?>
                                <?php if ($as_seen_link) : ?></a><?php endif; ?>
                            <?php if ($as_seen_desc) : ?>
                            <p class="pt-4"><?php echo esc_attr($as_seen_desc); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($as_seen_embed) : ?>
                    <div class="col-12 col-lg-8">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php echo $as_seen_embed; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>