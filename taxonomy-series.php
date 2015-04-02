<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
		<div class="row">
			<header class="small-12 medium-7 large-5 medium-centered text-center columns">
			<?php
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$child_term = get_term( $term->term_id, 'series' );
				$parent_term = get_term( $child_term->parent, 'series' );
			?>
			<h1 class='text-center header'>
				<?= $parent_term->name ?> - <?= $child_term->name ?>
			</h1>
			</header><!-- /header -->
		</div>
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
