<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">

		<title>
		<?php
		if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		}
		elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		}
		elseif ( is_archive() ) {
			wp_title(''); echo ' Archive | '; bloginfo( 'name' );
		}
		elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
		}
		elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}
		elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_singular('lesson') || is_singular('episode') ) {
			wp_title(''); echo ' | '; echo get_post_type( $post ); echo ' | '; bloginfo('name');
		}
		elseif ( is_single() ) {
			wp_title('');
		}
		else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>

		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/foundation.css" />

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon.png">


		<!-- Custom script for storing page data into gvar -->
		<script>
		  <?php $pageDetails = get_post(); ?>
  		var page_title = <?php echo ( isset($pageDetails->post_title) ? json_encode( $pageDetails->post_title ) : 'null' ); ?>;
  		var page_slug  = <?php echo ( isset($pageDetails->post_name) ? json_encode($pageDetails->post_name) : 'null' ); ?>;
		</script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action('foundationPress_after_body'); ?>

	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

	<?php do_action('foundationPress_layout_start'); ?>

	<nav class="tab-bar show-for-small-only">
		<section class="right-small">
			<a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
		</section>
		<section class="middle tab-bar-section">

			<h1 class="title"><?php bloginfo( 'name' ); ?></h1>

		</section>
	</nav>

	<?php get_template_part('parts/rit-identity-bar'); ?>
	<?php get_template_part('parts/off-canvas-menu'); ?>
	<?php get_template_part('parts/top-bar'); ?>
	<?php get_template_part('parts/asc-header'); ?>

<section class="container" role="document">
	<?php do_action('foundationPress_after_header'); ?>