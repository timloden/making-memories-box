<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

?>
<?php if( have_rows('as_seen_on_logos', 'option') ): ?>
<section class="section as-seen-on bg-light pb-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-auto">
                <p class="text-muted mb-0 text-center text-lg-start"> As seen on:</p>
            </div>
            <?php while( have_rows('as_seen_on_logos', 'option') ): the_row(); 
                $logo_image = get_sub_field('as_seen_on_logo_image');
                $logo_link = get_sub_field('as_seen_on_logo_link');
                ?>
            <div class="col-6 col-lg">
                <?php echo ($logo_link) ? '<a href="' . esc_url($logo_link) . '"/>' : '' ?>
                <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_url($logo_image['alt']); ?>"
                    class="img-fluid">
                <?php echo ($logo_link) ? '</a>' : '' ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>