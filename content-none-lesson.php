<?php
/**
 * The template for displaying a "No posts found" message on the Lessons page.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<header class="page-header">
	<h1 class="page-title text-center">Oh No!</h1>
</header>

<div class="page-content">
		<img style="height: 25rem; width: auto; display: block; margin: 0 auto;" src="<?= get_template_directory_uri().'/assets/img/misc/asco_still_clutter.png' ?>">
		<p class="text-center">We searched everywhere but couldn't find what you're looking for. Maybe a search below will help you find what you need!</p>
		<div class="medium-6 medium-centered columns">
			<?php get_search_form(); ?>
		</div>
</div>
