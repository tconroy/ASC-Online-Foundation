<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">

		<div class="row content-section lessons">
			<ul id="content" data-equalizer="vidpanel" class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'episode' ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'content', 'none-lesson' ); ?>

				<?php endif; // end have_posts() check ?>
			</ul>
		</div>

	</div> <!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
