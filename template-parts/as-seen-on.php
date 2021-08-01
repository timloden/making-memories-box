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

$as_seen_title_2 = get_field('as_seen_on_title_2', 'option');
$as_seen_link_2 = get_field('as_seen_on_link_2', 'option');
$as_seen_desc_2 = get_field('as_seen_on_description_2', 'option');
$as_seen_image_2 = get_field('as_seen_on_image_2', 'option');
$as_seen_embed_2 = get_field('as_seen_on_embed_2', 'option');
?>
<section class="section as-seen-on py-5">


    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-3">Featured on</h2>
                <p class="text-center">See just some of the featured segments Making Memories Box has been on!</p>
            </div>
        </div>
        <div class="row">
            <?php if ($as_seen_embed) : ?>
            <div class="col-12 <?php echo ($as_seen_embed_2) ? 'col-lg-6' : '' ?>">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <div class="px-lg-3">
                            <?php if ($as_seen_title) : ?><h3 class="text-center">
                                <?php echo esc_attr($as_seen_title); ?></h3><?php endif; ?>
                            <?php if ($as_seen_link) : ?><a href="<?php echo esc_url($as_seen_link); ?>"><?php endif; ?>
                                <?php if ($as_seen_embed) : ?>
                                <div class="d-block">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php echo $as_seen_embed; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($as_seen_image) : ?>
                                <img src="<?php echo esc_url($as_seen_image['url']); ?>"
                                    alt="<?php echo esc_attr($as_seen_image['alt']); ?>" class="img-fluid">
                                <?php endif; ?>
                                <?php if ($as_seen_link) : ?>
                            </a><?php endif; ?>
                            <?php if ($as_seen_desc) : ?>
                            <p class="pt-4"><?php echo esc_attr($as_seen_desc); ?></p>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>
            <?php if ($as_seen_embed_2) : ?>
            <div class="col-12 <?php echo ($as_seen_embed) ? 'col-lg-6' : '' ?>">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <div class="px-lg-3">
                            <?php if ($as_seen_title_2) : ?><h3 class="text-center">
                                <?php echo esc_attr($as_seen_title_2); ?></h3><?php endif; ?>
                            <?php if ($as_seen_link_2) : ?><a
                                href="<?php echo esc_url($as_seen_link); ?>"><?php endif; ?>
                                <?php if ($as_seen_embed_2) : ?>
                                <div class="d-block">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php echo $as_seen_embed_2; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($as_seen_image_2) : ?>
                                <img src="<?php echo esc_url($as_seen_image_2['url']); ?>"
                                    alt="<?php echo esc_attr($as_seen_image_2['alt']); ?>" class="img-fluid">
                                <?php endif; ?>
                                <?php if ($as_seen_link_2) : ?>
                            </a><?php endif; ?>
                            <?php if ($as_seen_desc_2) : ?>
                            <p class="pt-4"><?php echo esc_attr($as_seen_desc_2); ?></p>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
    <?php if( have_rows('as_seen_on_logos', 'option') ): ?>
    <div class="py-3" style="background-color: #f4f4f4;">
        <div class="container">
            <div class="row justify-content-center">
                <?php while( have_rows('as_seen_on_logos', 'option') ): the_row(); 
                $logo_image = get_sub_field('as_seen_on_logo_image');
                $logo_link = get_sub_field('as_seen_on_logo_link');
                ?>
                <div class="col-6 col-lg-3">
                    <?php echo ($logo_link) ? '<a href="' . esc_url($logo_link) . '"/>' : '' ?>
                    <img src="<?php echo esc_url($logo_image['url']); ?>"
                        alt="<?php echo esc_url($logo_image['alt']); ?>" class="img-fluid">
                    <?php echo ($logo_link) ? '</a>' : '' ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>