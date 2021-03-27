"use strict";

console.log('custom js');
"use strict";

document.addEventListener('om.Scripts.init', function (event) {
  event.detail.Scripts.enabled.fonts = false;
});