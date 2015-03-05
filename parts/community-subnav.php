<?php
  $twitter=""; $facebook=""; $blog="";
  switch(get_the_title()) {
    case "Twitter":  $twitter  = 'active'; break;
    case "Facebook": $facebook = 'active'; break;
    case "Blog":     $blog     = 'active'; break;
    default:         $blog     = 'active'; break;
  }
?>

<div class="row text-center community-subnav">
  <div class="section-title" id="offset">
    <h2>What's New <small>ASC Sneak Peek</small></h2>
  </div> <!-- .section-title -->
  <div class="row">
    <div class="small-12 medium-4 columns">
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'Blog')));?>#offset" class="button  expand <?= $blog ?>">ASC Blog</a>
    </div>
    <div class="small-12 medium-4 columns">
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'Twitter')));?>#offset" class="button  expand <?= $twitter ?>">Twitter</a>
    </div>
    <div class="small-12 medium-4 columns">
      <a href="<?= esc_url( get_permalink( get_page_by_title( 'Facebook')));?>#offset" class="button  expand <?= $facebook ?>">Facebook</a>
    </div>
  </div>
</div>