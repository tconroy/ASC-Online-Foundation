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
			$nicename = get_the_author_meta('first_name') . " " . get_the_author_meta('last_name');
			$screenname = get_the_author_meta('display_name');
			$desc = get_the_author_meta('description');
			echo "<h2><small>Profile for </small>{$nicename}</h2>";
			echo "<img src='".get_avatar_url(get_avatar( get_the_author_meta('ID'), 200 ))."' />";
			echo "<h3>({$screenname})</h3>";
			echo "<p>{$desc}</p>";
			$social = [
				'Twitter' => get_the_author_meta('twitter'),
				'Google+' => get_the_author_meta('googleplus'),
				'Jabber'  => get_the_author_meta('jabber'),
				'AIM'     => get_the_author_meta('aim'),
				'YIM'     => get_the_author_meta('yim')
			];
			echo "<ul class='inline-list' style='display:inline-block; margin: 0 auto;'>";
			foreach ($social as $service => $value) {
				if ( $value ) {
					echo "<li><a href='".$value."'>".$service."</a></li>";
				}
			}
			echo "</ul>";
		?>
	</div>
</div>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" id="content" role="main">
	<h3>Submission History</h3>
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
