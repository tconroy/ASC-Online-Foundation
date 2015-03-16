var ASCOLessonsIndex = (function($){

  var _bindCopyToClipboard = function() {
    $('ul#lessons').on('click', 'a.share', function(e) {
      e.preventDefault();
      var linktext = $(this).data('target');
    $shareElem = "<h3>Copy link to Share: <input onClick='this.setSelectionRange(0, this.value.length)' type='text' value='"+linktext+"'></h3>"
    alertify.alert($shareElem).set('label', 'close');
    });
  };

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

  var _bindLazyThumbLoad = function() {
    $("img.lazy-thumb").unveil();
    $('body').on( 'post-load', function () {
        // New posts have been added to the page.
        console.log('post-load fired');
        $("img.lazy-thumb").unveil();
    } );
  };

  var init = function(){
    console.log('ASCOLessonIndex::init() fired.');
    _bindLazyThumbLoad();
    _bindCopyToClipboard();
    _bindBackToTop();
  };

  return {
      init: init
  };

})(jQuery);