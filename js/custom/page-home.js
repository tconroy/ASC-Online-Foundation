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
      lazyLoad:       'ondemand',
      slide:          '.slide',
      accessibility:  false,
      autoplay:       true,
      autoplaySpeed:  2500,
      arrows:         false,
      draggable:      false,
      slidesToShow:   1,
      slidesToScroll: 1
    });
  };

  var _initPlugins = function() {
    jQuery('.lazyYT').lazyYT();
    new WOW().init();
  };

  var _bindLessonMenuToScroll = function() {

    // todo

  };

  var init = function(){
    console.log('ASCOHome::init() fired.');
    _moveOffCanvasLink();
    _initHomeCarousel();
    _bindLessonMenuToScroll();
    _initPlugins();
  };

  return {
      init: init
  };

})(jQuery);