var ASCOHome = (function($){
  // var MY_CONSTANT = 123;

  // var _myPrivateVariable = 'TEST MEH';
  // var _$myPrivateJqueryObject = $('div.content');

  // var _myPrivateMethod = function(){
  //   alert('I am private!');
  // };

  var _moveOffCanvasLink = function(){
    $('a.exit-off-canvas').appendTo('div.inner-wrap');
  };

  var _initHomeCarousel = function(){
    $('.inner-carousel').slick({
      lazyLoad:      'ondemand',
      accessibility: false,
      autoplay:      true,
      autoplaySpeed: 2500,
      arrows:        false,
      draggable:     false,
      slide:         '.slide'
    });
  };

  var _initYouTubeLazyLoad = function() {
    // load plugins
    jQuery('.lazyYT').lazyYT();
  }

  var init = function(){
    console.log('ASCOHome::init() fired.');
    _moveOffCanvasLink();
    _initHomeCarousel();
    _initYouTubeLazyLoad();
  };

  return {
      init: init
  };

})(jQuery);