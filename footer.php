</section>

<a href="#" alt="to top" title="to top of page" class="topbutton"><span><i class="fa fa-chevron-up"></i></span></a>

<footer class="pagefooter">
	<?php do_action('foundationPress_before_footer'); ?>
	<?php dynamic_sidebar("footer-widgets"); ?>
	<?php do_action('foundationPress_after_footer'); ?>

  <div class="learn-more text-center">
    <div class="row">
      <div class="small-12 medium-9 small-centered columns">
        <h2>Learn More</h2>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-9 small-centered columns">
        <ul class="small-block-grid-3" data-equalizer-watch>
          <li>
            <a href="http://www.rit.edu/studentaffairs/asc">
              <figure data-equalizer>
                <img src="<?= bloginfo('template_directory').'/assets/img/footer-icons/browser.png'?>" alt="">
                <figcaption>Website</figcaption>
              </figure>
            </a>
          </li>
          <li>
            <a href="http://www.rit.edu/studentaffairs/asc/schedules.php">
              <figure data-equalizer>
                <img src="<?= bloginfo('template_directory').'/assets/img/footer-icons/schedule.png'?>" alt="">
                <figcaption>Schedules</figcaption>
              </figure>
            </a>
          </li>
          <li>
            <a href="<?= get_page_link(15); ?>">
              <figure data-equalizer>
                <img src="<?= bloginfo('template_directory').'/assets/img/footer-icons/email.png'?>" alt="">
                <figcaption>Contact</figcaption>
              </figure>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div> <!-- .learn-more -->

  <div class="stay-connected text-center">
    <div class="row">
      <div class="small-12 small-centered columns">
        <!-- <h2>Visit <a href="">ASC</a> and Stay Connected</h2> -->
        <h2>CONNECT WITH US</h2>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-6 small-centered columns">
        <ul class="small-block-grid-4 social">
          <li><a href="https://www.facebook.com/RITAcademicSupportCenter"><img src="<?= bloginfo('template_directory').'/assets/img/social-icons/circle/facebook.png'?>" alt="Facebook"></a></li>
          <li><a href="https://instagram.com/ascatrit/"><img src="<?= bloginfo('template_directory').'/assets/img/social-icons/circle/instagram.png'?>" alt="Instagram"></a></li>
          <li><a href="https://twitter.com/ASCatRIT"><img src="<?= bloginfo('template_directory').'/assets/img/social-icons/circle/twitter.png'?>" alt="Twitter"></a></li>
          <li><a href="https://www.youtube.com/user/ASCatRIT"><img src="<?= bloginfo('template_directory').'/assets/img/social-icons/circle/youtube.png'?>" alt="YouTube"></a></li>
      </ul>
      </div>

    </div>
    <div class="row copywrite">
      <div class="small-12 medium-9 small-centered columns">
<!--         <ul class="small-block-grid-7">
          <li>&copy; 2015 <a href="http://www.rit.edu">RIT</a></li>
          <li><a href="http://www.rit.edu/studentaffairs/">Student Affairs</a></li>
          <li><a href="http://www.rit.edu/studentaffairs/asc/">Academic Support Center</a></li>
          <li>All Rights Reserved.</li>
        </ul> -->
        <ul>
          <li>&copy; <?= Date('Y'); ?> <a href="http://www.rit.edu">Rochester Institute of Technology</a></li>
          <li>|</li>
          <li><a href="http://www.rit.edu/studentaffairs/">Student Affairs</a></li>
          <li>|</li>
          <li><a href="http://www.rit.edu/studentaffairs/asc/">Academic Support Center</a></li>
          <li>|</li>
          <li>All Rights Reserved.</li>
        </ul>
      </div>
    </div>
  </div> <!-- .stay-connected -->

  <div class="rit-black">
    <div class="row">
      <div class="small-12 medium-9 columns">
        <a href="http://www.rit.edu">
          <img src="//rit.edu/framework/v0/images/idbar-black.gif" alt="RIT">
        </a>
      </div>
      <div class="small-12 medium-3 columns">
        <p>1 Lomb Memorial Drive, Rochester, NY 14623</p>
      </div>
    </div>
  </div> <!-- .rit-black -->
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action('foundationPress_layout_end'); ?>
	</div>
</div>

<?php
  if ( is_page('contact') ) {
    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
  }
?>

<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>

</body>
</html>
