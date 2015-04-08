/* move infinite-loader icon outside of the content container
for infinite-scroll sections -- need to place it here before doc ready */
$('#content').on('DOMNodeInserted', function(e) {
  if ($(e.target).is('.infinite-loader')) {
     $(e.target).insertAfter('#content');
  }
});

$(document).ready(function(){

  // load Foundation
  $(document).foundation({equalizer: {equalize_on_stack: true}});

  // load timeago plugin
  jQuery("span.timeago").timeago();

  // load class-specific modules
  $body = $('body');

  /**
   * HOME PAGE
   */
  if( $body.hasClass('home') ) {
    ASCOHome.init();
  }

  /**
   * CONTACT PAGE
   */
  if ( $body.hasClass('page-id-15') || page_title == 'Contact' ) {
    ASCOContact.init();
  }

  /**
   * FACEBOOK PAGE
   */
  if ( $body.hasClass('page-id-33') || page_title == 'Facebook' ) {
    ASCOFacebook.init();
  }

  /**
   * BLOG
   */
  // Blog Index
  if( $body.hasClass('blog') ) {
    ASCOBlogIndex.init();
  }
  // Blog Archive
  if ( $body.hasClass('archive') ) {
    ASCOArchivePage.init();
  }

  /**
   * LESSONS
   */
  // Lesson Index
  if( $body.hasClass('post-type-archive-lesson') || $body.hasClass('tax-subjects') ) {
    ASCOLessonsIndex.init();
  }
  // Lesson Single
  if ( $body.hasClass('single-lesson') ) {
    ASCOLessonsIndex.initShareBtn();
    ASCOLessonsIndex.initFavoriteBtn();
    ASCOLessonsIndex.initPlugins();
  }

  /**
   * SERIES
   */
   // Series Index
  if ( $body.hasClass('page-template-page-series') ) {
    // *****TODO*****
  }
  if ( $body.hasClass('single-episode') ) {
    ASCOLessonsIndex.initShareBtn();
    ASCOLessonsIndex.initFavoriteBtn();
    ASCOLessonsIndex.initPlugins();
  }

  /**
   * SEARCH
   */
  if ( $body.hasClass('search') ) {
    ASCOSearchPage.init();
    ASCOLessonsIndex.initShareBtn();
    ASCOLessonsIndex.initFavoriteBtn();
    ASCOLessonsIndex.initPlugins();
  }
});