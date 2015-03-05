// load Foundation
jQuery(document).foundation();

$(document).ready(function(){
  // load plugins
  jQuery('.lazyYT').lazyYT();

  // load page-specific modules
  switch ( page_title ) {
    case "Home":
      ASCOHome.init();
      break;
    case "Facebook":
      ASCOFacebook.init();
      break;
    // case "Contact":
    //   ASCOContact.init();
    // break;
  }
  // load class-specific modules
  if( $('body').hasClass('blog') ) {
    ASCOBlogIndex.init();
  }
});