<style type="text/css" media="screen">
	.infinite-loader {
    display: inline !important;
	}
</style>

<?php get_header(); ?>
<?php get_template_part('parts/community-subnav'); ?>
<div class="row">
	<div class="small-12 medium-9 columns" id="content" role="main">
	<hr>
	<?php if ( have_posts() ) : ?>

		<?php do_action('foundationPress_before_content'); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php

				// TODO: figure out why we had this if clause...
				// keep an eye on blog index to ensure only text posts are
				// showing
				// if( in_array("Blog", get_the_category()) ) {
				//     get_template_part( 'content', get_post_format() );
				//   }

			  get_template_part( 'content', get_post_format() );
			?>
			<?php //get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php do_action('foundationPress_before_pagination'); ?>

	<?php endif;?>



	<?php
	/*
	if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } */ ?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
