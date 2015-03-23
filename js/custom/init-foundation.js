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

  // load class-specific modules
  $body = $('body');

  // HOME PAGE
  if( $body.hasClass('home') ) {
    ASCOHome.init();
  }
  // CONTACT PAGE
  else if ( $body.hasClass('page-id-15') || page_title == 'Contact' ) {
    ASCOContact.init();
  }
  // FACEBOOK PAGE
  else if ( $body.hasClass('page-id-33') || page_title == 'Facebook' ) {
    ASCOFacebook.init();
  }
  // BLOG POST INDEX PAGE
  else if( $body.hasClass('blog') ) {
    ASCOBlogIndex.init();
  }
  // LESSON POST INDEX PAGE
  else if( $body.hasClass('post-type-archive-lesson') || $body.hasClass('tax-subjects') ) {
    ASCOLessonsIndex.init();
  }
  // SINGLE LESSON PAGE
  else if ( $body.hasClass('single-lesson') ) {
    ASCOLessonsIndex.initShareBtn();
  }
  // ARCHIVE PAGE
  else if ( $body.hasClass('archive') ) {
    ASCOArchivePage.init();
  }
  // SEARCH PAGE
  else if ( $body.hasClass('search') ) {
    ASCOSearchPage.init();
    ASCOLessonsIndex.initShareBtn();
    ASCOLessonsIndex.initFavoriteBtn();
  }
});