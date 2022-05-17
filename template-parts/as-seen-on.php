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
<section class="section as-seen-on bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-muted text-center"> As seen on:</p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <?php while( have_rows('as_seen_on_logos', 'option') ): the_row(); 
                $logo_image = get_sub_field('as_seen_on_logo_image');
                $logo_link = get_sub_field('as_seen_on_logo_link');
                ?>
            <div class="col-6 col-lg mb-3 mb-lg-0 text-center">
                <?php echo ($logo_link) ? '<a href="' . esc_url($logo_link) . '"/>' : '' ?>
                <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_url($logo_image['alt']); ?>"
                    class="logo">
                <?php echo ($logo_link) ? '</a>' : '' ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>