<?php
/**
 * adds expandable link to the end of the excerpt text, toggles content
 */

if(!function_exists('new_excerpt_more')) :
  function new_excerpt_more($more) {
    if( is_home() ) {
      global $post;
      return '... <a class="expand-excerpt" href="#">(more)</a>';
    }
  }
  add_filter('excerpt_more', 'new_excerpt_more');
endif;

/**
 * adds collapsable link to the end of the content text, toggles excerpt
 */

if(!function_exists('insert_index_content_collapse')) :
  function insert_index_content_collapse($content) {
    global $post;
    if( is_home()  ) {
      // only add collapse link if content length > max excerpt length
      $word_count = str_word_count( strip_tags( $content ) );
      if ( $word_count > 55 ) {
        $content .= " <a class='collapse-excerpt' href='#'>(less)</a>";
      }
    }
    return $content;
  }
  add_filter('the_content', 'insert_index_content_collapse', 0);
endif;

/**
 * gets the URI for the author's avatar.
 */
if( !function_exists('get_avatar_url') ) :
  function get_avatar_url($get_avatar){
      preg_match("/src='(.*?)'/i", $get_avatar, $matches);
      return $matches[1];
  }
endif;


/**
 * Add lazy-loading infinite scroll support
 */
if( !function_exists('init_infinite_scroll') ) :
  function init_infinite_scroll() {
    add_theme_support( 'infinite-scroll', array(
      'type'           => 'scroll',
      'container'      => 'content',
      'posts_per_page' => 5,
      'footer_widgets' => false,
      'footer'         => false
    ));
  }
  add_action( 'after_setup_theme', 'init_infinite_scroll' );
endif;

 ?>