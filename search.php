<?php get_header(); ?>


<?php if( !empty(get_search_query()) ) :  ?>


<div class="row">
    <div class="small-8 small-centered columns">
        <h2 style='display:inline;'>Search Results</h2><?php get_template_part('searchform'); ?>
    </div>
</div>
<div class="row">
    <div class="small-12 columns" role="main" id="content" >
        <?php do_action('foundationPress_before_content'); ?>
        <?php
            if( have_posts() ){
                // get results count
                $types = wp_list_pluck($wp_query->posts,'post_type');
                $types_count = array_count_values($types);

                $count = [
                    'post'   => ( isset($types_count['post'])   ? (int)$types_count['post'] : 0 ),
                    'lesson' => ( isset($types_count['lesson']) ? (int)$types_count['lesson'] : 0 ),
                    'episode' => ( isset($types_count['episode']) ? (int)$types_count['episode'] : 0 )
                ];

                // set active class to tab with most results
                $maxs = array_keys($count, max($count));
                $actives = [ 'post' => '', 'lesson' => '', 'episode' => ''];
                $actives[ $maxs[0] ] = 'active';

                echo "<ul class='tabs' data-tab>
                    <li class='tab-title {$actives['post']}'><a href='#post-panel'>Blog ({$count['post']})</a></li>
                    <li class='tab-title {$actives['lesson']}'><a href='#lesson-panel'>Lessons ({$count['lesson']})</a></li>
                    <li class='tab-title {$actives['episode']}'><a href='#episode-panel'>Series Episodes ({$count['episode']})</a></li>
                </ul>
                <div class='tabs-content'>";


                $types = ['post', 'lesson', 'episode'];
                foreach( $types as $type ){

                    // open inner container
                    // $active = ( $type == 'post' ? 'active' : '' );
                    echo "<div class='content {$actives[$type]}' id='{$type}-panel'>";

                    // add UL container for videos
                    if ( $type == 'lesson' || $type == 'episode' ) {
                        echo '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-equalizer="vidpanel">';
                    }

                    // insert post content template
                    while( have_posts() ){
                        the_post();

                        if ( $count[$type] == 0 ) {
                            echo "<h2 class='text-center'>No results found.</h2>";
                            break;
                        } elseif ($type == get_post_type()) {
                            get_template_part('content', $type);
                        }
                    }
                    rewind_posts();

                    // close inner container
                    if ( $type == 'lesson' || $type == 'episode' ) {
                        echo '</ul></div>';
                    } else {
                        echo '</div>';
                    }
                }
            } else {
                // no results found for query
                get_template_part('content', 'none-lesson');
            }
            echo '</div>';
        ?>

    <?php do_action('foundationPress_before_pagination'); ?>

    <?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>

        <nav id="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
        </nav>
    <?php } ?>


<?php else: ?>
    <?php get_template_part('content', 'none-lesson'); ?>
<?php endif; ?>

    <?php do_action('foundationPress_after_content'); ?>

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
