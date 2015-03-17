/* move infinite-loader icon outside of the content container
for infinite-scroll sections -- need to place it here before doc ready */
$('#content').on('DOMNodeInserted', function(e) {
  if ($(e.target).is('.infinite-loader')) {
     $(e.target).insertAfter('#content');
  }
});

$(document).ready(function(){

  // load Foundation
  $(document).foundation({
    equalizer: {
      equalize_on_stack: true
    }
  });

  // load page-specific modules
  switch ( page_title ) {
    case "Home": ASCOHome.init(); break;
    case "Facebook": ASCOFacebook.init(); break;

    // case "Contact":
    //   ASCOContact.init();
    // break;
  }
  // load class-specific modules
  $body = $('body');
  if( $body.hasClass('blog') ) {
    ASCOBlogIndex.init();
  }
  // Lessons Index Page
  if( $body.hasClass('post-type-archive-lesson') || $body.hasClass('tax-subjects') ) {
    ASCOLessonsIndex.init();
  }
  // single lessons page
  if ( $body.hasClass('single-lesson') ) {
    ASCOLessonsIndex.initShareBtn();
  }
});