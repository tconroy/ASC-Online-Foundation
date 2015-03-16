<?php
  /*
  Template Name: Lessons
  */
 ?>
<?php get_header(); ?>

<!-- <style type="text/css" media="screen">
  #lesson-subnav {
    margin-top: 0 !important;
  }
</style> -->

<div class="row" style="display:none;">

  <div class="small-12 large-12 columns" role="main">
    <h1 class="text-center"><small>select below to filter by subject</small></h1>
    <?php get_template_part('parts/lessons-subnav'); ?>

    <div class="row lessons content-section">
      <ul id="lessons" data-equalizer="vidpanel" class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
        <?php do_action('foundationPress_before_content'); ?>

        <?php
          $terms = ['study-skills', 'time-management', 'math', 'tutoring', 'reading', 'online-learning'];
          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $args = [
              'post-type'   => 'lesson',
              'post-status' => 'publish',
              'posts_per_page' => 8,
              'paged'       => $paged,
              'tax_query'   => [
                  [
                      'taxonomy' => 'subjects',
                      'field'    => 'slug',
                      'terms'    => $terms
                  ]
              ]
          ];
         ?>

        <?php $lessons = new WP_Query($args); ?>
        <?php if( $lessons->have_posts() ) :  ?>
          <?php while($lessons->have_posts()) : $lessons->the_post(); ?>
            <?php get_template_part( 'content', 'lesson'); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <?php get_template_part('content', 'none') ?>
          <?php do_action('foundationPress_before_pagination') ?>
        <?php endif; ?>
      </ul>
      <?php //previous_posts_link( "prev" , $lessons->max_num_pages ); ?>
      <?php //next_posts_link( "next" , $lessons->max_num_pages ); ?>

      <?php //FoundationPress_pagination(); ?>

      <?php // if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
        <!--<nav id="post-nav">
          <div class="post-previous"><?php // next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
          <div class="post-next"><?php // previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
        </nav> -->
      <?php// } ?>

      <?php //do_action('foundationPress_after_content'); ?>
    </div> <!-- .row -->

  </div> <!-- .home-section-2 -->
</div>

<?php //get_footer(); ?>
