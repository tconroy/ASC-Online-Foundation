<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="media">
    <a class="left media-thumb" href="<?= get_author_posts_url('ID') ?>" rel="author">
    	<img class="media-object" src="<?= get_avatar_url(get_avatar( get_the_author_meta('ID'), 52 )) ?>" alt="">
    </a>
    <div class="media-body">
    	<h5 class="media-heading">
    		<a href="<?= the_permalink()?>"><?= the_title()?></a>
      	<small><?= FoundationPress_entry_meta(); ?></small>
    	</h5>
			<div class="post-excerpt">
				<?php the_excerpt(__('Continue reading...', 'FoundationPress')); ?>
			</div>
			<div class="post-content" style="display: none;">
				<?php the_content(__('Continue reading...', 'FoundationPress')); ?>
			</div>
  	</div>
  </div>
	<footer class="row">
		<div class="small-11 small-offset-1 columns">
		<?php
      $tag = get_the_tags();
      if ($tag) {
        echo "<div class='row'>".the_tags('<p class="tag-lead">Tagged:</p>', ' ')."</div>";
      }

        echo "<div class='row'>";
        echo "<ul class='breadcrumbs categories'>";
        echo "<li class='current'>Posted in:</li>";
        $baseuri = get_template_directory_uri() . '/assets/img/lesson-icons/mini/';
        foreach((get_the_category()) as $category) {
          $catname = $category->cat_name;
          if ( $catname !== 'Uncategorized' && $catname !== 'Blog' ) {
            $moddedName = str_replace(' ', '_', $catname);
            $imguri = $baseuri . $moddedName . '.png';
            $catlink = get_category_link( $category->cat_ID );
            $img = '<img width="16" height="16" class="'.$moddedName.'" title="'.$catname.'" alt="'.$catname.'" src="'.$imguri.'"/>';
            echo "<li><a href='{$catlink}'>{$img}</a></li>";
          }
        }
        echo "</ul>";
        echo "</div>";
		?>
		</div>
	</footer>
	<hr />
</article>
