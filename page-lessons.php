<?php
  /*
  Template Name: Lessons
  */
 ?>

<?php get_header(); ?>
<div class="row">
  <div class="small-12 large-12 columns" role="main">
    <div class="row">
      <div class="small-12 medium-10 medium-offset-1">
        <?php get_template_part('parts/lessons-subnav'); ?>
      </div>
    </div>

    <div class="row content-section">
      <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
        <?php do_action('foundationPress_before_content'); ?>

        <?php
          $args = ["post-type"=>"lesson"];

          $validCats = ['study-skills','time-management','math','tutoring','reading','online-learning'];
          if ( isset($_GET['lc']) && in_array($_GET['lc'], $validCats) ) {
            $args["subject"] = $_GET['lc'];
          }
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
      <?php do_action('foundationPress_after_content'); ?>
    </div> <!-- .row -->

  </div> <!-- .home-section-2 -->
</div>

<?php get_footer(); ?>
