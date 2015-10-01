// FIXME: This should be modular. Just doing it this way for deadline
//        reasons.

var Remarks = (function() {
  var DOM = {
    'chosen': '.js-chosen'
  };

  var init = function() {
    $( DOM.chosen ).chosen();
  };

  return { init: init };
}());

$(function() {
  Remarks.init();
});
