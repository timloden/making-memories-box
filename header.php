<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package making-memories-box
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();
    the_field('header_embed', 'option');
    $logo = get_field('logo', 'option');
    
    $cta_text = get_field('header_cta_button_text', 'option');
    if (!$cta_text) {
        $cta_text = 'Subscribe Now!';
    }
    $cta_link = get_field('header_cta_button_link', 'option');
    if (!$cta_link) {
        $cta_link = site_url() . '/shop';
    }
?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header py-3 sticky-top bg-white">
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center">
                <div class="d-none d-lg-block">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="<?php echo site_url(); ?>/shop">Boxes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold"
                                href="<?php echo site_url(); ?>/frequently-asked-questions">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold"
                                href="<?php echo site_url(); ?>/resources">Resources</a>
                        </li>
                    </ul>
                </div>
                <div class="logo">
                    <a href="<?php echo site_url(); ?>"><img class="img-fluid"
                            src="<?php echo esc_url($logo['url']); ?>"></a>
                </div>
                <div>
                    <div class="d-flex justify-content-between align-items-center">

                        <a class="d-none d-lg-inline-block h3 mb-0 text-dark"
                            href="<?php echo site_url(); ?>/my-account"><i class="bi bi-person"></i>
                        </a>

                        <a id="header-cart" class="d-inline-block h4 mx-lg-3 mb-0 text-dark position-relative"
                            href="<?php echo site_url(); ?>/cart"><i class="bi bi-cart3"></i>
                            <span
                                class="d-none position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
                                style="font-size: 12px;">

                                <span class="visually-hidden">items in cart</span>
                            </span>
                        </a>

                        <a class="d-inline-block d-lg-none h3 mb-0 ms-3 text-dark" data-bs-toggle="offcanvas"
                            href="#mobile-menu" role="button" aria-controls="mobile-menu">
                            <i class="bi bi-list"></i>
                        </a>

                        <a href="<?php echo esc_url($cta_link); ?>"
                            class="btn btn-primary btn-rounded btn-sm ms-lg-2 d-none d-lg-inline-block"><?php echo esc_attr($cta_text); ?>
                        </a>

                    </div>
                </div>
            </nav>
        </div>

    </header>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobile-menu" aria-labelledby="mobile-menu-label">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobile-menu-label">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/shop">Boxes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/frequently-asked-questions">Frequently Asked
                        Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/resources">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/about">About</a>
                </li>
            </ul>

            <ul class="nav flex-column mb-5">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url(); ?>/my-account">My Account</a>
                </li>
            </ul>
        </div>
    </div>