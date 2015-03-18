<header>

<div class="contain-to-grid" id="banner">
    <?php
      $uri = get_template_directory_uri() . '/assets/img/banners/new/';

      if ( is_front_page() ) {
        $uri .= 'home.png';
      }
      else if ( is_page('Lessons') || is_tax('subjects') ) {
        $uri .= get_lessons_page_header();
      }
      else if ( is_page('Series') ) {
        $uri .= 'series-realdeal.png';
      }
      else if ( is_page('Contact') || is_page('Community') ) {
        $uri .= 'contact.png';
      }
      else {
        $uri .= 'contact.png'; // everything else?
      }

      if ( is_front_page() ) {
        get_template_part('parts/front-page-carousel');
      } else {
        echo "<img src='{$uri}'>";
      }
     ?>
  </div>
  <div class="panel" id="banner-caption">
    <div class="row small-collapse medium-uncollapse">
      <div class="small-12 medium-7 columns">
        ASC Online is a resource for students, faculty, and staff to access academic support 24/7. College is hard… we are here to help!
      </div>
      <div class="small-12 medium-5 columns">
        <ul class="inline-list social show-for-medium-up">
          <li class="hvr-grow">
            <a href="https://www.facebook.com/RITAcademicSupportCenter"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/facebook.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://twitter.com/ASCatRIT"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/twitter.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://instagram.com/ascatrit/"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/instagram.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://www.youtube.com/user/ASCatRIT"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/youtube.png'?>"></a>
          </li>
        </ul>

        <ul class="small-block-grid-4 show-for-small-only">
          <li class="hvr-grow">
            <a href="https://www.facebook.com/RITAcademicSupportCenter"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/facebook.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://twitter.com/ASCatRIT"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/twitter.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://instagram.com/ascatrit/"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/instagram.png'?>"></a>
          </li>
          <li class="hvr-grow">
            <a href="https://www.youtube.com/user/ASCatRIT"><img src="<?= get_template_directory_uri().'/assets/img/social-icons/white/youtube.png'?>"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>

</header><!-- /header -->