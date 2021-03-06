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
    <div id="page" class="site">
        <header class="header py-3 border-bottom">
            <div class="container">
                <nav class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>"><img class="img-fluid"
                                src="<?php echo esc_url($logo['url']); ?>"></a>
                    </div>
                    <div class="d-none d-lg-block ml-lg-auto">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold"
                                    href="<?php echo site_url(); ?>/shop">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold"
                                    href="<?php echo site_url(); ?>#how-it-works">How it works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold"
                                    href="<?php echo site_url(); ?>#previous-boxes">Previous Boxes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold" href="/blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle nav-link font-weight-bold" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Resources
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo site_url(); ?>/about">About</a>
                                        <a class="dropdown-item" href="<?php echo site_url(); ?>/contact">Contact</a>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url(); ?>/my-account"><?php echo (is_user_logged_in() ? 'My Account' : 'Login'); ?></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ml-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="d-inline-block nav-button mr-lg-3 mb-0 p-2 h3"
                                href="<?php echo site_url(); ?>/cart"><i class="las la-shopping-cart"></i></a>

                            <a href="<?php echo esc_url($cta_link); ?>"
                                class="d-none d-lg-inline-block btn btn-primary btn-rounded"><?php echo esc_attr($cta_text); ?></a>

                            <a href="#mobile-menu" class="d-inline-block d-lg-none nav-button mb-0 p-2 h3"
                                data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"
                                role="button"><i class="las la-bars"></i></a>
                        </div>
                    </div>
                </nav>
                <div class="collapse" id="mobile-menu">
                    <div class="d-flex">
                        <div class="col-12 px-0">
                            <ul class="nav flex-column">

                                <li class="nav-item mt-3">
                                    <a href="<?php echo esc_url($cta_link); ?>"
                                        class="d-block w-100 btn btn-primary btn-rounded"><?php echo esc_attr($cta_text); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>/shop">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>#how-it-works">How it works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>#previous-boxes">Previous Boxes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center" href="/blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>/about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>/contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark font-weight-bold text-center"
                                        href="<?php echo site_url(); ?>/my-account"><?php echo (is_user_logged_in() ? 'My Account' : 'Login'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </header>


        <div id="content" class="site-content">