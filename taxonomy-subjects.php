<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">

  	<?php get_template_part('parts/lessons-subnav'); ?>

		<div class="row content-section">
			<ul id="content" data-equalizer="vidpanel" class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'lesson' ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'content', 'none-lesson' ); ?>

				<?php endif; // end have_posts() check ?>
			</ul>

		<?php /* Display navigation to next/previous pages when applicable. COMMENTED OUT FOR INFINITE SCROLL */ ?>

		<?php //if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
			<!--<nav id="post-nav">
				<div class="post-previous"><?php// next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
				<div class="post-next"><?php //previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
			</nav> -->
		<?php //} ?>
		</div>

	</div> <!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
