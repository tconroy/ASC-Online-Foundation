<?php
if(!function_exists('FoundationPress_entry_meta')) :
    function FoundationPress_entry_meta() {
      echo '<div class="meta-container">';

        echo '<p class="byline author"> '. __('Posted by', 'FoundationPress') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
        echo '<time class="updated" datetime="'. get_the_time('c') .'">'. sprintf(__(' on %s', 'FoundationPress'), get_the_date(), get_the_time()) .'</time>';

        echo "<span class='divider'> | </span>";
        echo '<a href="'.get_comments_link().'">';
        echo comments_number();
        echo '</a>';

        echo '</div>';
    }
endif;
?>
