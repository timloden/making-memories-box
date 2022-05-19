AOS.init();

jQuery(document).ready(function($) {
    $('.ajax_add_to_cart').on('click', function() {
        $(this).addClass('loading').text('Adding to Your Cart...');
    });
});