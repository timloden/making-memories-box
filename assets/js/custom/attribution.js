console.log('custom js');

AOS.init();

jQuery(document).ready(function($) {
    $('button.single_add_to_cart_button').on('click', function() {
        $(this).addClass('loading').text('Adding to Your Cart');
    });
});