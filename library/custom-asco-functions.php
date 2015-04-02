<?php
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'mobile-off-canvas' ) {

      $action = home_url('/');
      $value = get_search_query();

      return "
      <li class='mobile-menu-search'>
        <form action='{$action}' method='get'>
            <input type='text' name='s' id='s' placeholder='Search'
                  value='{$value}'>
        </form>
      </li>".$items;

    }

    return $items;
}
/**
 * Redirects user to browser update page if older than IE9.
 */
if(!function_exists('redirect_ie')) :
  function redirect_ie() {
      if( is_ie() && get_browser_version() < 9 ) {
        $path = get_template_directory_uri() .'/outdatedbrowser.php';
        $browser = get_browser_name();
        $version = get_browser_version();
        header('Location: ' . $path.'?browser='.$browser.'&version='.$version);
      }
  }
  add_action( 'init', 'redirect_ie' );
endif;

/**
 * returns string representing active lessons video page header image
 */
if( !function_exists('get_lessons_page_header') ) :
  function get_lessons_page_header() {
    $out = "lesson-";

    if ( is_archive('lesson') ) {
      $out .= 'all';
    }
    if ( is_tax('subjects') || is_singular('lesson') ) {
      $out = 'lesson-';
      global $post;
      $terms = @wp_get_post_terms($post->ID, 'subjects');
      $slug = ( isset($_GET['subjects']) ? $_GET['subjects'] : $terms[0]->slug );

      switch( $slug ) {
        case "math":            $out .= "math"; break;
        case "online-learning": $out .= "onlineLearning"; break;
        case "reading":         $out .= "reading"; break;
        case "study-skills":    $out .= "studySkills"; break;
        case "time-management": $out .= "timeManagement"; break;
        case "tutoring":        $out .= "tutoring"; break;
      }

    }
    return $out.'.png';
  }
  add_action('before_setup_theme', 'get_lessons_page_header');
endif;

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
 * allows custom definition of post count per page type
 * ( archive, search, etc. )
 */
if ( !function_exists('postsperpage') ) :
  function postsperpage($limits) {
    if (is_search()) {
      global $wp_query;
      $wp_query->query_vars['posts_per_page'] = 100;
    }
    return $limits;
  }
  add_filter('post_limits', 'postsperpage');
endif;


/**
 * Add lazy-loading infinite scroll support
 */
if( !function_exists('init_infinite_scroll') ) :

  function asc_render_infinite_scroll() {
    while ( have_posts() ) : the_post();
        if ( 'lesson' == get_post_type() ) {
          get_template_part('content', 'lesson');
        } else {
          get_template_part( 'content', get_post_format() );
        }
    endwhile;
  }

  function init_infinite_scroll() {

    add_theme_support( 'infinite-scroll', array(
      'type'           => 'scroll',
      'container'      => 'content',
      'posts_per_page' => 4,
      'footer_widgets' => false,
      'footer'         => false,
      'wrapper'        => false,
      'render'         => 'asc_render_infinite_scroll'
    ));
  }
  add_action( 'after_setup_theme', 'init_infinite_scroll' );
endif;

/**
 * add custom post type (lessons) to main menu
 */
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

function wpclean_add_metabox_menu_posttype_archive() {
add_meta_box('wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');

if ($post_types) :
    $items = array();
    $loop_index = 999999;

    foreach ($post_types as $post_type) {
        $item = new stdClass();
        $loop_index++;

        $item->object_id = $loop_index;
        $item->db_id = 0;
        $item->object = 'post_type_' . $post_type->query_var;
        $item->menu_item_parent = 0;
        $item->type = 'custom';
        $item->title = $post_type->labels->name;
        $item->url = get_post_type_archive_link($post_type->query_var);
        $item->target = '';
        $item->attr_title = '';
        $item->classes = array();
        $item->xfn = '';

        $items[] = $item;
    }

    $walker = new Walker_Nav_Menu_Checklist(array());

    echo '<div id="posttype-archive" class="posttypediv">';
    echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
    echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
    echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
    echo '</ul>';
    echo '</div>';
    echo '</div>';

    echo '<p class="button-controls">';
    echo '<span class="add-to-menu">';
    echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'andromedamedia') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
    echo '<span class="spinner"></span>';
    echo '</span>';
    echo '</p>';

endif;
}


/**
 * Style custom login screen
 */
if ( !function_exists('custom_login_logo') ) :
  function custom_login_logo() { ?>
      <style type="text/css">
        body.login {
          background-image: url(<?= get_template_directory_uri();?>/assets/img/admin/login-bg.png);
        }
        body.login div#login h1 a {
          background-image: url(<?= get_template_directory_uri();?>/assets/img/nav/asco-logo.png);
          background-size: cover;
          width: 300px;
          height: 300px;
          }
      </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'custom_login_logo' );
endif;


 ?>