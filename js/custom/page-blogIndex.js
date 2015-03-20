var ASCOBlogIndex = (function($){

  var _bindRevealLinks = function() {
    $('section.container').on('click', 'a.expand-excerpt', function(e){
      e.preventDefault();
      $(this).parents('.post-excerpt')
             .css('display', 'none')
             .next('.post-content')
             .slideDown('slow');
    });
    $('section.container').on('click', 'a.collapse-excerpt', function(e){
      e.preventDefault();
      $(this).parents('.post-content')
             .slideUp('slow')
             .prev('.post-excerpt')
             .css('display', 'block');
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

  var _bindPlugins = function() {
    new WOW().init();
  }

  var _moveSpinnersToBottomOfPage = function() {
    $('#content').on('DOMNodeInserted', function(e) {
      if ($(e.target).is('.infinite-loader')) {
         $(e.target).insertAfter('#content');
      }
    });
  };

  var init = function(){
    console.log('ASCOBlogIndex::init() fired.');
    _bindPlugins();
    //_moveSpinnersToBottomOfPage();
    _bindRevealLinks();
    _bindBackToTop();
  };

  return {
      init: init
  };

})(jQuery);