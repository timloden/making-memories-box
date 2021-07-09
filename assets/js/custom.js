"use strict";

console.log('custom js');
jQuery(document).ready(function ($) {
  $('button.single_add_to_cart_button').on('click', function () {
    $(this).addClass('loading').text('Adding to Cart');
  });
});
"use strict";

document.addEventListener('om.Scripts.init', function (event) {
  event.detail.Scripts.enabled.fonts = false;
});