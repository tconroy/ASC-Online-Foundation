var ASCOSearchPage = (function($){

  var _bindBackToTop = function() {
    var offset = 100;
    var speed = 250;
    var duration = 500;
    $(window).scroll(function(){
      if ($(this).scrollTop() < offset) {
       $('.topbutton') .fadeOut(duration);
      } else {
       $('.topbutton') .fadeIn(duration);
      }
    });
    $('.topbutton').on('click', function(){
      $('html, body').animate({scrollTop:0}, speed);
      return false;
    });
  };

  /**
   * Bind page plugins
   */
  var _bindPlugin = function() {
    new WOW().init();
  };

  var init = function(){
    console.log('ASCOSearchPage::init() fired.');
    _bindPlugin();
    _bindBackToTop();
  };

  return {
      init: init
  };

})(jQuery);