<?php get_header(); ?>
<?php global $wp_query; ?>
<div class="row">
    <div class="small-12 columns" role="main">

        <?php do_action('foundationPress_before_content'); ?>

        <h2 class='text-center'>Searching For <span style='color: orange;'><?= get_search_query(); ?></span><br> <small><?= $wp_query->found_posts; ?> Results </small></h2>

<?php
// query_posts($query_string . '&showposts=10');
if( have_posts() ){
echo "<ul class='accordion' data-accordion>";
    $types = array('post', 'lesson', 'series');

    $count = ['post' => 0, 'lesson' => 0, 'series' => 0];

    /* for each post type, */
    foreach( $types as $type ){
        $title;
        $active = [ $type => '' ];

        // determine what post types we have for setting accordion open/closed state
        while( have_posts() ) {
            the_post();
            $pt = get_post_type();
            $active[$pt] = 'active';

            if ( in_array($pt, $types) ) {
                $count[$pt] += 1;
            }
        }

        switch($type) {
            case "post":   $title = 'Blog Posts';    break;
            case "lesson": $title = 'Video Lessons'; break;
            case "series": $title = 'Video Series';  break;
        }

        /* create a section container + title */
        echo "<li class='accordion-navigation {$type}'>";
        echo "<a class='text-center' href='#panel-{$type}'><h3>{$title} ( {$count[$type]} results)</h3></a>";
        echo "<div id='panel-{$type}' class='content {$active[$type]}'>";
        /* if lesson section, open UL */
        if ( $type == 'lesson' ){
           echo '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">';
        }
        /* Actual post loop */
        while( have_posts() ){
            the_post();
            if( $type == get_post_type() ){
                get_template_part('content', $type);
            }
        }

        /* closing lesson UL container */
        if ($type == 'lesson') {
           echo '<ul>';
        }
        echo "</div>";
        /* closing base section container */
        echo "</li>";

        /* go back to top of post stack */
        rewind_posts();
    }
echo "</ul>";
} else {
    // no results found
    get_template_part('content-none-lesson');
}

 ?>


    <?php do_action('foundationPress_before_pagination'); ?>

    <?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>

        <nav class="row" id="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
        </nav>
    <?php } ?>

    <?php do_action('foundationPress_after_content'); ?>

    </div>
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
