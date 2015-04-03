var ASCOContact = (function($){
  // var MY_CONSTANT = 123;

  // var _myPrivateVariable = 'TEST MEH';
  // var _$myPrivateJqueryObject = $('div.content');

  // var _myPrivateMethod = function(){
  //   alert('I am private!');
  // };

  var _initPlugins = function() {
    new WOW().init();
  };

  // called by script in footer
  var _onCorrectCaptcha = function(field) {
    console.log(field);
      $('input[type="submit"]').removeAttr('disabled');
  };

  var init = function(){
    console.log('ASCOContact::init() fired.');
    _initPlugins();
  };

  return {
      init: init,
      onCorrectCaptcha: _onCorrectCaptcha
  };

})(jQuery);