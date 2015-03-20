<?php get_header(); ?>
<?php get_template_part('parts/lessons-subnav'); ?>

<div class="row">
	<div class="small-12 medium-9 columns lesson-single" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php
			$vid_url      = get_field('lesson_video_url');
  		$vid_code     = explode('=', $vid_url)[1];
			$json_output  = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vid_code."?v=2&alt=json&prettyprint=true");
			$json         = json_decode($json_output, true);
			$vid_title    = get_the_title();
			$vid_date     = get_the_date();
			$vid_desc     = get_field('lesson_video_description');
			$vid_views    = $json['entry']['yt$statistics']['viewCount'];
			$vid_length   = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
			$vid_tips     = get_field('lesson_video_tips');
		 ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<!-- article header -->
			<section class="title">
				<h3><?= $vid_title ?></h3>
				<span title="lesson length">
					<i class='fa fa-clock-o'></i> <?= $vid_length ?>
				</span>
				<span> | </span>
				<span title="lesson views"><?= $vid_views ?> Views</span>
			</section>
			<!-- /article header -->

			<!-- YouTube Video Container -->
			<section class="embedded-content">
				<div class="embed-container">
					<iframe src='https://www.youtube.com/embed/<?= $vid_code; ?>' frameborder='0' allowfullscreen></iframe>
				</div>
	      <ul class="inline-list vid-actions">
	        <li><a href="#"><i class="fa fa-heart"><span>Favorite</span></i></a></li>
	        <li><a class="share" href="#" data-target="<?= the_permalink(); ?>"><i class="fa fa-share-alt"><span>Share</span></i></a></li>
	        <li><a href="#"><i class="fa fa-download"><span>Lesson Files</span></i></a></li>
	      </ul>
			</section>
			 <!-- /YouTube Video Container -->

			<section class="lesson-content">
				<h3>Video Overview</h3>
				<p><?= $vid_desc ?></p>

				<?php
					if( $vid_tips ) {
						echo "<h3>Video Takeaways</h3>";
						echo "<p>{$vid_tips}</p>";
					}
				 ?>
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
