<?php get_header(); ?>
<style type="text/css" media="screen">
	section.container[role="document"] {
    margin-top: 0 ;
	}
</style>
<div class="row">
	<div class="small-12 columns lesson-single" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php
			// SEASON INFO
		  // get the link to the season episodes
			$terms = get_the_terms( $post->ID, 'series' );
			$term = array_pop($terms);
			$seasonPermalink   = get_term_link($term->slug, 'series');

			// EPISODE INFO
			$vid_url      = get_field('episode_video_url');
  		$vid_code     = explode('=', $vid_url)[1];
			$json_output  = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vid_code."?v=2&alt=json&prettyprint=true");
			$json         = json_decode($json_output, true);
			$vid_title    = get_the_title();
			$vid_date     = get_the_date();
			$vid_desc     = get_field('episode_video_description');
			$vid_views    = $json['entry']['yt$statistics']['viewCount'];
			$vid_length   = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
		 ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<!-- article header -->
			<section class="title">
				<h3><?= $vid_title ?></h3>
				<span title="episode length">
					<i class='fa fa-clock-o'></i> <?= $vid_length ?>
				</span>
				<span> | </span>
				<span title="episode views"><?= $vid_views ?> Views</span>
				<span> | </span>
				<span title="episode comments"><?= comments_number(); ?></span>
			</section>
			<!-- /article header -->

			<!-- YouTube Video Container -->
			<section class="embedded-content">
				<div class="embed-container">
					<iframe src='https://www.youtube.com/embed/<?= $vid_code; ?>' frameborder='0' allowfullscreen></iframe>
				</div>
	      <ul class="inline-list vid-actions">
	        <li><a class="favorite disabled" href="#"><i class="fa fa-heart"><span>Favorite</span></i></a></li>
	        <li><a class="share" href="#" data-target="<?= the_permalink(); ?>"><i class="fa fa-share-alt"><span>Share</span></i></a></li>
	      </ul>
			</section> <!-- /YouTube Video Container -->

			<!-- tags container -->
			<?php
				$tag = get_the_tags();
				if ($tag) {
					echo '<section class="tags">';
					echo the_tags('<p class="tag-lead">Tagged:</p>', ' ');
					echo '</section>';
				}
			?> <!-- /tags container -->

			<section class="lesson-content">
				<h3>Episode Overview</h3>
				<p><?= $vid_desc ?></p>
			</section>
		</article>
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	<section class="season-episodes">
		<h3>Up Next <?php echo "<a class='right' href='{$seasonPermalink}' title=''>+View All</a>";?></h3>

		<?php
			$post_object = get_queried_object();
			// Set fields to get only term ID's to make this more effient
			$terms = wp_get_post_terms( $post_object->ID, 'series', array( 'fields' => 'ids' ) );
			$args = [
			    'post_type' => $post_object->post_type,
			    'tax_query' => [
			       [
			        'taxonomy' => 'series',
			        'terms'    => $terms[1],
			      ]
			    ],
			    'posts_per_page' => 2,
			    'order' => 'DESC',
			    'no_found_rows' => true,
			    'suppress_filters' => true,
			    'date_query' => [
			      [
			        'before'    => $post_object->post_date,
			        'inclusive' => false
			      ],
			    ]
			];
			$args1 = [
			    'post_type' => $post_object->post_type,
			    'tax_query' => [
			       [
			        'taxonomy' => 'series',
			        'terms'    => $terms[1],
			      ]
			    ],
			    'posts_per_page' => 3,
			    'order' => 'ASC', // CHANDE TO ASC IF NOT CORRECT
			    /* make query more efficient */
			    'no_found_rows' => true,
			    /* dont let filters/pre_get_posts modify query */
			    'suppress_filters' => true,
			    'date_query' => [
			      [
			        'after'    => $post_object->post_date,
			        'inclusive' => false
			      ],
			    ]
			];
			$q1 = new WP_Query( $args );
			$q2 = new WP_Query( $args1 );

		 ?>

		 <ul id="content" data-equalizer="vidpanel" class="small-block-grid-1 medium-block-grid-4 large-block-grid-6 text-center">
			<?php
				$q2->posts = array_reverse($q2->posts);
				foreach($q2->posts as $post) {
					get_template_part('content', 'episode-nocap');
				}
				if ($post_object) {
					$post = $post_object;
					get_template_part('content','episode-highlighted-nocap');
				}
				foreach($q1->posts as $post) {
					get_template_part('content', 'episode-nocap');
				}
			 ?>
		 </ul>

	</section>

	</div>
	<?php get_sidebar(); ?>
	<div class="small-12 columns">
			<?php do_action('foundationPress_post_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('foundationPress_post_after_comments'); ?>
	</div>
</div>
<?php get_footer(); ?>
