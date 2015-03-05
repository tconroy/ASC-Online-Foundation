var ASCOFacebook = (function($){

  _preventIframeScrollingWindow = function() {

    // $('iframe').load(function(){
    //   $('iframe').mouseenter(function(event) {
    //     console.log('mouse entered iframe');
    //     $(window).bind("scroll", function(e){
    //       e.preventDefault();
    //     });
    //   });
    // });

  };

  var init = function(){
    console.log('ASCOFacebook::init() fired.');
    _preventIframeScrollingWindow();
  };

  return {
      init: init
  };

})(jQuery);