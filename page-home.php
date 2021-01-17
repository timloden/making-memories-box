<?php
/**
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package making-memories-box
 */

get_header();
?>
<section class="home-hero">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-12 col-lg-5 pb-5 pb-lg-0">
                <h1 class="text-center text-lg-left">Family activities delivered every month</h1>
                <p class="my-3 text-black-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor
                    incididunt. Ut enim ad
                    minim veniam.</p>
                <p class="font-weight-bolder pt-3 h5 text-center text-lg-left pb-3" style="text-decoration: underline;">
                    LIMITED: SAVE
                    $10 ON YOUR FIRST KIT
                </p>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started Today</a>
                    <a class="ml-3" href="#how-it-works">See how it works <i class="las la-arrow-down"></i></a>
                </div>

            </div>
            <div class="col-12 col-lg-7 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-box-placeholder.png"
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section id="how-it-works" class="home-how-it-works py-5"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-circle-right.png) center top / cover;">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <p class="subtitle text-center text-primary mb-0 font-weight-bold mb-1">It&apos;s Simple</p>
                <h2 class="text-center">How Making Memories Box works</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 order-1 order-lg-0">
                <div class="d-flex">
                    <div class="col-6 px-0">
                        <div class="d-flex flex-column">
                            <div class="col pb-4">
                                <img class="img-fluid shadow"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/how-it-works-1.jpg"
                                    data-aos="fade-down" data-aos-delay="100" data-aos-once="true">
                            </div>
                            <div class="col">
                                <img class="img-fluid shadow"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/how-it-works-3.jpg"
                                    data-aos="fade-down" data-aos-delay="300" data-aos-once="true">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="col pt-5 pb-4">
                                <img class="img-fluid shadow"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/how-it-works-2.jpg"
                                    data-aos="fade-down" data-aos-delay="200" data-aos-once="true">
                            </div>
                            <div class="col">
                                <img class="img-fluid shadow"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/how-it-works-4.jpg"
                                    data-aos="fade-down" data-aos-delay="400" data-aos-once="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 h-100 order-0 order-lg-1">
                <div class="pl-lg-3 pb-5 pb-lg-0">


                    <h3>New activities every month</h3>
                    <div class="text-black-50 mb-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dignissim
                            dignissim sem, et pharetra
                            justo finibus sit amet. Praesent at convallis dolor.</p>
                    </div>
                    <h3>Everything you need included</h3>
                    <div class="text-black-50 mb-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dignissim
                            dignissim sem, et pharetra
                            justo finibus sit amet. Praesent at convallis dolor.</p>
                    </div>
                    <h3>Give your kids wonderful memories</h3>
                    <div class="text-black-50 mb-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dignissim
                            dignissim sem, et pharetra
                            justo finibus sit amet. Praesent at convallis dolor.</p>
                    </div>
                    <a href="#" class="btn btn-primary btn-rounded btn-lg btn-block d-block d-lg-inline-block">Get
                        Started Today</a>
                </div>


            </div>
        </div>
    </div>
</section>

<section class="home-box-contents py-5"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/yellow-circle-left.png) center top / cover;">
    <div class="container">
        <div class="row pb-3">
            <div class="col-12">
                <p class="subtitle text-center text-primary mb-0 font-weight-bold mb-1">The fun stuff</p>
                <h2 class="text-center">What comes in the box?</h2>
                <p class="text-center text-black-50">Each month your box will contain multiple activities, here are a
                    few examples from February:</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">I love you to pieces</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">Showered with love</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">I love you to pieces</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">Friendship rocks</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">Conversation heart jar</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-once="true">
                <div class="media">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-activity-example.jpg"
                        class="rounded mr-3" style="width: 100px;">
                    <div class="media-body">
                        <h5 class="mt-0">Hide and seek kisses</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p class="h2 text-center">And much more! </p>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12">
                <p class="h3 text-center"><a href="#" class="text-primary">Signup today and save $10 on your first
                        order!</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-box-placeholder.png"
                    class="img-fluid">
            </div>
        </div>
    </div>
</section>

<?php
get_footer();