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
});