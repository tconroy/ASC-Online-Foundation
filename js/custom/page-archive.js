var ASCOArchivePage = (function($){

  // var _bindCopyToClipboard = function() {
  //   $('body').on('click', 'a.share', function(e) {
  //     e.preventDefault();
  //     var linktext = $(this).data('target');
  //   $shareElem = "<h3>Copy link to Share: <input onClick='this.setSelectionRange(0, this.value.length)' type='text' value='"+linktext+"'></h3>"
  //   alertify.alert($shareElem).set('label', 'close');
  //   });
  // };

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

  // var _bindLazyThumbLoad = function() {
  //   $('body').on( 'post-load', function () {
  //     // New posts have been added to the page.
  //     $("img.lazy-thumb").unveil(null,function(){
  //       $(this).load(function() {
  //         this.style.opacity = 1;
  //         // remove event binding
  //         $(this).off('scroll.unveil resize.unveil lookup.unveil');
  //       });
  //     });
  //   });
  //   // $("img.lazy-thumb").unveil();
  // };

  /**
   * Force Foundation Equalizer to paint a reflow on new lessons loaded via ajax infinite-scroll
   */
  // var _bindEqualizerReflowOnNewPosts = function() {
  //   $('body').on('post-load', function(){
  //     $(document).foundation('equalizer', 'reflow');
  //   });
  // }

  /**
   * Watches for JetPack Infinite-Scroll spinners, moves them outside the container
   * to prevent weird appearrance in middle of page... kinda hacky but it works.
   */
  var _moveSpinnersToBottomOfPage = function() {
    $('#content').on('DOMNodeInserted', function(e) {
      if ($(e.target).is('.infinite-loader')) {
         $(e.target).insertAfter('#content');
      }
    });
  };

  /**
   * Bind page plugins
   */
  var _bindPlugin = function() {
    new WOW().init();
  };

  var init = function(){
    console.log('ASCOLessonIndex::init() fired.');
    // _bindLazyThumbLoad();
    _bindPlugin();
    // _bindCopyToClipboard();
    _bindBackToTop();
    _moveSpinnersToBottomOfPage();
    // _bindEqualizerReflowOnNewPosts();
  };

  return {
      init: init
  };

})(jQuery);