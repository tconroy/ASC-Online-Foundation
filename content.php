<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<header>
			<div class="small-1 columns">
				<h3>
					<?= get_avatar(get_the_author_meta('ID'),50) ?>
				</h3>
			</div>
			<div class="small-11 columns">
				<h3><a href="<?= the_permalink()?>"><?= the_title()?></a></h3>
			<?= FoundationPress_entry_meta() ?>
			</div>
		</header>
	</div> <!-- .header-row -->

	<div class="row">
		<div class="small-offset-1 small-11 columns">
			<div class="post-excerpt">
				<?php the_excerpt(__('Continue reading...', 'FoundationPress')); ?>
			</div>
			<a href="#" class="expand-excerpt">(more)</a>
			<div class="post-content" style="display: none;">
				<?php the_content(__('Continue reading...', 'FoundationPress')); ?>
			</div>
		</div>
	</div> <!-- .content-row -->


<!-- 	<header class="small-12 columns">
		<div class="avatar small-1 columns">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ) ?>
		</div>
		<div class="metacontent small-11 columns">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php FoundationPress_entry_meta(); ?>
		</div>
	</header> -->


	<footer class="row">
		<div class="small-offset-1 small-11  columns">
		<?php
			$tag = get_the_tags();
			if (!$tag) { }
			else { ?><p><?php the_tags(); ?></p><?php } ?>
		</div>
	</footer>
	<hr />
</article>
