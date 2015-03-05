var ASCOBlogIndex = (function($){
  // var MY_CONSTANT = 123;

  // var _myPrivateVariable = 'TEST MEH';
  // var _$myPrivateJqueryObject = $('div.content');

  // var _myPrivateMethod = function(){
  //   alert('I am private!');
  // };

  var _bindExpandLink = function() {
      $('a.expand-excerpt').click(function(e){
        e.preventDefault();
        $(this).prev('div.post-excerpt').toggle('fast');
         $(this).next('div.post-content').toggle('fast');
         if ( $(this).text() === '(more)' ) {
          $(this).text('(less)');
         } else {
          $(this).text('(more)');
         }
      });
  };

  var init = function(){
    console.log('ASCOBlogIndex::init() fired.');
    _bindExpandLink();
  };

  return {
      init: init
  };

})(jQuery);