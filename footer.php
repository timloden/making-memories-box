<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */
$logo = get_field('logo', 'option');
$instagram = get_field('instagram_link', 'option');
$facebook = get_field('facebook_link', 'option');
?>

</div><!-- #content -->

<footer class="site-footer">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="footer-logo pr-3">
                    <a class="mb-3 d-block" href="<?php echo site_url(); ?>"><img class="img-fluid"
                            src="<?php echo esc_url($logo['url']); ?>"></a>
                    <?php if(get_field('footer_sub_logo_text', 'option')) : ?>
                    <p><?php echo esc_attr(get_field('footer_sub_logo_text', 'option')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="text-dark text-center text-lg-left">About</h6>
                <ul class="nav flex-column footer-links text-center text-lg-left">
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/shop">Order</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">How it works</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">FAQ</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="text-dark text-center text-lg-left">Account</h6>
                <ul class="nav flex-column footer-links text-center text-lg-left">
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0"
                            href="<?php echo site_url(); ?>"><?php echo (is_user_logged_in() ? 'My Account' : 'Login'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/privacy">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-lg-0" href="<?php echo site_url(); ?>/terms">Terms</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-4">
                <h6 class="text-dark">Newsletter</h6>
                <p>Signup for our newsletter to get the latest news, updates and special offers in your inbox.</p>
                <?php echo gravity_form( 1, false, false, false, '', true, 12 ); ?>
            </div>
        </div>
    </div>
    <div class="copyright py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-0">&copy; Making Memories Box <?php echo date( 'Y' ); ?></p>
                </div>
                <div>
                    <ul class="nav social-icons justify-content-end">
                        <?php if($instagram ) : ?>
                        <li class="nav-item bg-primary rounded-circle mr-3">
                            <a class="text-white" href="<?php echo esc_url($instagram ); ?>"><i
                                    class="lab la-facebook-f"></i></a>
                        </li>
                        <?php endif; ?>
                        <?php if($facebook ) : ?>
                        <li class="nav-item bg-primary rounded-circle">
                            <a class="text-white" href="<?php echo esc_url($facebook ); ?>"><i
                                    class="lab la-instagram"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>