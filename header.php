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
    $logo = get_field('logo', 'option');
?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="header py-3">
            <div class="container">
                <nav class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <img class="img-fluid" src="<?php echo esc_url($logo['url']); ?>">
                    </div>
                    <div class="d-none d-lg-block ml-lg-auto">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">How it works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="ml-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="d-none d-md-inline-block btn btn-primary btn-rounded">Sign up Today</a>
                            <a href="#mobile-menu" class="d-inline-block d-lg-none nav-button ml-3 mb-0 p-2 h4"
                                data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"
                                role="button"><i class="las la-bars"></i></a>
                        </div>
                    </div>
                </nav>
                <div class="collapse" id="mobile-menu">
                    <div class="d-flex">
                        <div class="col-12">
                            <ul class="nav flex-column">
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">How it works</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </header>


        <div id="content" class="site-content">