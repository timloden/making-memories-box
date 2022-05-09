<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */
?>
<section class="subscription-hero mb-5 bg-light border-bottom">
    <div class="container py-lg-5">
        <div class="row py-5">
            <div class="col-12">
                <div class="card shadow p-3 border-0">

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <h1 class="text-center">Fun and creative activities delivered to you each month</h1>
                            <p class="text-center mb-3 mb-lg-4 text-muted">Save time and money with a NEW themed box at
                                the start
                                of each month.
                                We take
                                care of all the
                                planning & prep work for you.</p>
                        </div>
                    </div>

                    <?php echo do_shortcode('[products category="subscriptions" orderby="id" order="ASC"]'); ?>

                    <div class="row justify-content-center g-4">
                        <div class="col-auto pe-md-4">
                            <p class="fw-bold mb-0 d-flex align-items-center product-page-value-prop"><i
                                    class="bi bi-palette pe-2"></i> All
                                Supplies Included</p>
                        </div>
                        <div class="col-auto pe-md-4">
                            <p class="fw-bold mb-0 d-flex align-items-center product-page-value-prop"><i
                                    class="bi bi-truck pe-2"></i> Free
                                Shipping
                            </p>
                        </div>
                        <div class="col-auto pe-md-4">
                            <p class="fw-bold d-flex align-items-center product-page-value-prop"><i
                                    class="bi bi-pause-circle pe-2"></i>
                                Pause or
                                Cancel Anytime
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>