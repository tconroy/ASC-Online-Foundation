<?php
  /*
  Template Name: Series
  */
 ?>
<?php get_header(); ?>
<?php

$taxonomy = 'series';

$seasons = get_terms( $taxonomy, array(
    'parent' => 22, // TERM ID OF THE SERIES
    'fields' => 'id=>slug'
) );

$season_episodes = array();

if ( ! empty( $seasons ) && ! is_wp_error( $seasons ) ) {

    foreach ( array_values( $seasons ) as $season ) {

				// Placeholder in-case there's no episodes found.
        $season_episodes[ $season ] = array();

        $args = array(
            'post-type'      => 'episode',
            'post-status'    => 'publish',
            'posts_per_page' => 4,
            'tax_query'      => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'slug',
                    /* Name of the "series" (in slug format) */
                    'terms'    => array( 'real-deal' ),
                ),
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'slug',
                    /* Name of the "seasons" (in slug format) DYNAMIC */
                    'terms'    => array( $season ),
                )
            )
        );

        $episodes = new WP_Query( $args );

        if ( ! empty( $episodes->posts ) ) {
    			// Add all episodes found in this season.
          $season_episodes[ $season ] = $episodes->posts;
        }
    }
    // reverse the array
    $season_episodes = array_reverse($season_episodes);
}
 ?>




<div class="row">
	<div class="small-12 columns" role="main">
	<?php do_action('foundationPress_before_content'); ?>

	<?php
		if ( ! empty( $season_episodes ) ) {

				foreach ($season_episodes as $season => $episode) {
					include(locate_template('parts/season-block.php'));
				}

		} else {
			get_template_part( 'content', 'none-lesson' );
		}
	?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
</div>
<?php get_footer(); ?>
