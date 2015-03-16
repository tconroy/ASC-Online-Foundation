<?php get_header(); ?>

<div class="row">
  <div class="small-12 medium-10 medium-offset-1">
    <?php get_template_part('parts/lessons-subnav'); ?>
  </div>
</div>

<div class="row">
	<div class="small-12 medium-9 columns lesson-single" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php
			$vid_url  = get_field('lesson_video_url');
  		$vid_code = explode('=', $vid_url)[1];
		 ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<!-- article header -->
			<section class="title">
				<h3><?= the_title(); ?></h3>
				<span>Length</span>
				<span>Views</span>
			</section>
			<!-- /article header -->

			<!-- YouTube Video Container -->
			<section class="embedded-content">
				<div class="embed-container">
					<iframe src='https://www.youtube.com/embed/<?= $vid_code; ?>' frameborder='0' allowfullscreen></iframe>
				</div>
	      <ul class="inline-list vid-actions">
	        <li><a href="#"><i class="fa fa-heart"><span>Favorite</span></i></a></li>
	        <li><a href="#"><i class="fa fa-envelope"><span>Share</span></i></a></li>
	        <li><a href="#"><i class="fa fa-download"><span>Download Attachments</span></i></a></li>
	      </ul>
			</section>
			 <!-- /YouTube Video Container -->

			<section class="lesson-content">
				<h3>Video Overview</h3>
				<p><?= get_field('lesson_video_description'); ?></p>

				<?php
					if( get_fields('lesson_video_tips') ) {
						echo "<h3>Video Takeaways</h3>";
						echo "<p>".get_field('lesson_video_tips')."</p>";
					}
				 ?>
				<!-- <h3>Video Takeaways</h3>
				<p><?= get_field('lesson_video_tips'); ?></p> -->
			</section>

			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p>
					<?php
						$tag = get_the_tags();
						if ($tag) {
							echo "<p>".the_tags('<p class="tag-lead">Tagged:</p>', ' ')."</p>";
						}
					?>
				</p>
			</footer>
			<?php do_action('foundationPress_post_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('foundationPress_post_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
