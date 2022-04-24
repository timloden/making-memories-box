<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */
?>
<section class="subscription-hero mb-5 bg-mmb-gray">
    <div class="container py-lg-5">
        <div class="row py-5">
            <div class="col-12">
                <div class="card shadow p-3 border-0">

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <h1 class="text-center">Fun and creative activities delivered to you each month</h1>
                            <p class="text-center">Save time and money with a NEW themed box at the start of each month.
                                We take
                                care of all the
                                planning & prep work for you.</p>
                        </div>
                    </div>

                    <?php echo do_shortcode('[products category="subscriptions"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>