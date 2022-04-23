"use strict";

console.log('custom js');
jQuery(document).ready(function ($) {
  $('button.single_add_to_cart_button').on('click', function () {
    $(this).addClass('loading').text('Adding to Your Cart');
  });
});
"use strict";

document.addEventListener('om.Scripts.init', function (event) {
  event.detail.Scripts.enabled.fonts = false;
});
"use strict";

(function ($) {
  $('.woocommerce').on('change', 'input.qty', function () {
    var timeout;

    if (timeout !== undefined) {
      clearTimeout(timeout);
    }

    timeout = setTimeout(function () {
      $("[name='update_cart']").trigger("click");
    }, 500); // 1 second delay, half a second (500) seems comfortable too
  });
})(jQuery);