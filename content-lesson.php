<?php
/**
 * The template for displaying custom "Lesson" post type
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

  <?php
    $vid_url        = get_field('lesson_video_url');
    $vid_code       = explode('=', $vid_url)[1];

    $json_output = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vid_code."?v=2&alt=json&prettyprint=true");
    $json = json_decode($json_output, true);
    $placeholderimg = get_template_directory_uri() . '/assets/img/ajax/youtube-placeholder.png';
    $vid_title      = get_the_title();
    $vid_date       = get_the_date();
    $vid_desc       = get_field('lesson_video_description');
    $vid_views = $json['entry']['yt$statistics']['viewCount'];
    $vid_length = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
    $vid_desc_short = substr($vid_desc, 0, strrpos(substr($vid_desc, 0, 90), ' ')) . '...';
  ?>

  <li class="vid-panel wow fadeInDown">
    <a href="<?= the_permalink(); ?>">
      <div class="vid-thumbnail">
        <?= "<img src='http://img.youtube.com/vi/{$vid_code}/hqdefault.jpg' />"?>
        <span class="overlay"><i class="fa fa-play-circle"></i></span>
        <h5>
          <span><?= $vid_length ?></span>
          <span class="right"><?= $vid_views ?> Views</span>
        </h5>
      </div>
    </a>
    <div class="vid-body">
      <a href="<?= the_permalink(); ?>"><h4><?= $vid_title ?></h4></a>
      <p data-equalizer-watch="vidpanel"><?= $vid_desc_short ?></p>
      <ul class="inline-list center-text vid-actions">
        <li><a class="favorite" href="#"><i class="fa fa-heart"><span>Favorite</span></i></a></li>
        <li><a class="share" data-target="<?= the_permalink(); ?>" href="#"><i class="fa fa-share-alt"><span>Share</span></i></a></li>
        <li><a href="#"><i class="fa fa-download"><span>PDF</span></i></a></li>
      </ul>
    </div>
  </li>
