<?php get_header(); ?>
<?php get_template_part('parts/community-subnav'); ?>

<div class="row facebook-page small-collapse medium-uncollapse">
  <div class="small-12 large-8 columns center-text" role="main">
  <?php do_action('foundationPress_before_content'); ?>
  <hr>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div id="likebox-wrapper">

    <div class="fb-like-box" data-href="https://www.facebook.com/RITAcademicSupportCenter" data-width="" data-height="1000" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>

  </div>


  <?php do_action('foundationPress_after_content'); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
