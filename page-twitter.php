<?php get_header(); ?>
<?php get_template_part('parts/community-subnav'); ?>

<div class="row twitter-page">
  <div class="small-12 large-9 columns center-text" role="main">
    <?php do_action('foundationPress_before_content'); ?>
    <hr>
    <a class="twitter-timeline"
        height="1000"
        href="https://twitter.com/ASCatRIT"
        data-chrome="noheader nofooter transparent"
        data-widget-id="571019594631217152">Tweets by @ASCatRIT</a>
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    </script>

    <?php do_action('foundationPress_after_content'); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
