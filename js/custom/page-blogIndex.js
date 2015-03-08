var ASCOBlogIndex = (function($){
  // var MY_CONSTANT = 123;

  // var _myPrivateVariable = 'TEST MEH';
  // var _$myPrivateJqueryObject = $('div.content');

  // var _myPrivateMethod = function(){
  //   alert('I am private!');
  // };

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

  var init = function(){
    console.log('ASCOBlogIndex::init() fired.');
    _bindRevealLinks();
  };

  return {
      init: init
  };

})(jQuery);