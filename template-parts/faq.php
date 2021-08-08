<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */
?>

<?php if( have_rows('frequently_asked_questions') ): ?>
<section class="section faqs py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="accordion" id="faq-accordion">
                    <?php while( have_rows('frequently_asked_questions') ): the_row(); ?>

                    <div class="card">
                        <div class="card-header" id="heading-<?php echo get_row_index(); ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left text-dark" style="font-size: 1.2rem;"
                                    type="button" data-toggle="collapse"
                                    data-target="#collapse-<?php echo get_row_index(); ?>"
                                    aria-controls="collapse-<?php echo get_row_index(); ?>">
                                    <?php echo esc_attr(get_sub_field('question')); ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse-<?php echo get_row_index(); ?>" class="collapse"
                            aria-labelledby="heading-<?php echo get_row_index(); ?>" data-parent="#faq-accordion">
                            <div class="card-body">
                                <?php echo esc_attr(get_sub_field('answer')); ?>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>