<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */


?>
<section class="section instagram-feed py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-3">Follow us on Instagram</h2>
                <p class="text-center">We love seeing all the memories you create, be sure to tag us @makingmemoriesbox
                    or use hashtag #makingmemoriesbox</p>
                <?php echo do_shortcode(get_field('instagram_shortcode', 'option')); ?>
            </div>
        </div>
    </div>
</section>