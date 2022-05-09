<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

?>
<section class="product py-md-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-center mb-lg-0 order-1 order-lg-0">
                <?php if (have_rows('box_information_images')) : ?>
                <div class="box-information-slider">
                    <?php while( have_rows('box_information_images') ): the_row(); 
                            $image = get_sub_field('box_image');
                ?>
                    <div>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
                            class="img-fluid px-lg-5" loading="lazy">
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-5 order-0 order-lg-1">
                <h2 class="text-center text-lg-start"><?php echo esc_attr(get_field('box_information_title')); ?></h2>
                <p class="text-black-50 text-center text-lg-start">
                    <?php echo esc_attr(get_field('box_information_description')); ?></p>

                <?php if (have_rows('box_information_features')) : ?>
                <div class="d-flex justify-content-center justify-content-lg-start mb-4 mb-md-0">
                    <div class="col-auto">
                        <?php while( have_rows('box_information_features') ): the_row(); 
                $feature = get_sub_field('feature');
                ?>
                        <p class="fw-bold mb-2" style="font-size: 1.25rem;"><?php echo $feature; ?></p>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (get_field('box_information_button_text')) : ?>
                <p class="text-center text-lg-start mt-3 mb-5 mb-md-0"><a
                        href="<?php echo esc_url(get_field('box_information_button_link')); ?>"
                        class="btn btn-primary btn-rounded d-block d-lg-inline-block mt-3 mt-lg-4"><?php echo esc_attr(get_field('box_information_button_text')); ?></a>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>