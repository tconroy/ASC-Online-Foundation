<?php get_header(); ?>
<?php get_template_part('parts/community-subnav'); ?>
<style>
	.community-subnav {
		margin-bottom: 0;
	}
</style>
<div class="row">
	<div class="section-title">
		<?php
			$msg = ""; $cat = single_cat_title("", false);
			if ( $cat === "Blog" ) { $msg = "All"; }
			else { $msg = "Blog"; }

			echo "<h2>{$cat}<small>{$msg} Posts</small></h2>";
		 ?>
	</div>
</div>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php //if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<!--
		<nav id="post-nav">
			<div class="post-previous"><?php// next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php// previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav> -->
	<?php// } ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
