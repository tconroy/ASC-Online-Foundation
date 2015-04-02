<aside id="sidebar" class="small-12 medium-3 columns">
  <script>
    if ( $('body').hasClass('single-lesson') ) {
      $('#sidebar').toggleClass('medium-3').toggleClass('large-3');
    }
  </script>
	<?php do_action('foundationPress_before_sidebar'); ?>
	<?php dynamic_sidebar("sidebar-widgets"); ?>
	<?php do_action('foundationPress_after_sidebar'); ?>
</aside>
