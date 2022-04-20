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
<section class="section faqs pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <div class="accordion" id="faq-accordion">
                    <?php while( have_rows('frequently_asked_questions') ): the_row(); 
                    $row_index = get_row_index();
                    ?>

                    <div class="accordion-item" id="faq-accordion">
                        <h2 class="accordion-header" id="heading-<?php echo $row_index; ?>">
                            <button class="accordion-button <?php echo $row_index == 1 ? "" : "collapsed"; ?>"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-<?php echo $row_index; ?>"
                                aria-expanded="<?php echo $row_index == 1 ? "true" : "false"; ?>"
                                aria-controls="collapse-<?php echo $row_index; ?>">
                                <?php echo esc_attr(get_sub_field('question')); ?>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $row_index; ?>"
                            class="accordion-collapse collapse <?php echo $row_index == "1" ? "show" : ""; ?>"
                            aria-labelledby="heading-<?php echo $row_index; ?>" data-bs-parent="#faq-accordion">
                            <div class="accordion-body">
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