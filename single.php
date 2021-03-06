<?php get_header(); ?>
<?php get_template_part('parts/community-subnav'); ?>
<div class="row">
	<div class="small-12 medium-9 columns" role="main">
	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<hr>

		  <div class="media">
		    <a class="left media-thumb" href="<?= get_author_posts_url('ID') ?>" rel="author">
		      <!--<img class="media-object" src="<?= get_avatar_url(get_avatar(get_the_author_meta('ID'), 52 )) ?>" alt="...">-->
		      <img class="media-object" src="<?= get_wp_user_avatar_src(get_the_author_meta('ID'), 'thumbnail') ?>" width="52" alt="<?= get_author_name() ?>">
		    </a>
		    <div class="media-body">
		      <h2 class="media-heading">
		      	<?= the_title(); ?>
		      	<small><?= FoundationPress_entry_meta(); ?></small>
	      	</h2>
	      	<?php do_action('foundationPress_post_before_entry_content'); ?>
  				<?php if ( has_post_thumbnail() ): ?>
						<div class="row">
							<div class="column">
								<?php the_post_thumbnail('', array('class' => 'th')); ?>
							</div>
						</div>
					<?php endif; ?>
		      <?= the_content(); ?>
		    </div>
		  </div>
			<footer>
				<div>
					<?php
						$tag = get_the_tags();
						if ($tag) {
							echo "<p>".the_tags('<p class="tag-lead">Tagged:</p>', ' ')."</p>";
						}
					?>
				</div>
				<div>
					<?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>
				</div>
				<div>
        <?php
					if ( function_exists( "get_yuzo_related_posts" ) ) { get_yuzo_related_posts();
        	}
         ?>
				</div>
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
