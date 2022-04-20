<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package making-memories-box
 */
$logo = get_field('logo', 'option');
$instagram = get_field('instagram_link', 'option');
$facebook = get_field('facebook_link', 'option');
?>


<footer class="site-footer bg-light py-5">
    <div class="container py-5">
        <div class="row justify-content-center mb-3">
            <div class="col-12 col-lg-3">
                <div class="logo footer-logo text-center">
                    <a class="mb-3 d-block" href="<?php echo site_url(); ?>">
                        <img class="img-fluid" src="<?php echo esc_url($logo['url']); ?>">
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-12 col-lg-6">
                <ul class="nav footer-links justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/shop">Boxes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">Resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0"
                            href="<?php echo site_url(); ?>/my-account"><?php echo (is_user_logged_in() ? 'My Account' : 'Login'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-12 col-lg-6">
                <p class="text-center">Signup for our newsletter to get the latest news, updates and special offers in
                    your inbox.</p>
                <?php echo gravity_form( 1, false, false, false, '', true, 12 ); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">

                <ul class="nav social-icons justify-content-center">
                    <?php if($instagram ) : ?>
                    <li class="nav-item mr-3">
                        <a class="text-dark" style="font-size: 30px;" href="<?php echo esc_url($facebook ); ?>"><i
                                class="bi bi-instagram"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if($facebook ) : ?>
                    <li class="nav-item">
                        <a class="text-dark" style="font-size: 30px;" href="<?php echo esc_url($instagram ); ?>"><i
                                class="bi bi-facebook"></i></a>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
    <div class="copyright py-3">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <p class="mb-0 small text-center text-black-50">&copy; Making Memories Box
                        <?php echo date( 'Y' ); ?> | <a class="text-black-50"
                            href="<?php echo site_url(); ?>/privacy">Privacy</a> | <a class="text-black-50"
                            href="<?php echo site_url(); ?>/terms">Terms</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<?php the_field('footer_embed', 'option'); ?>
</body>

</html>