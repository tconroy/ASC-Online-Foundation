<?php
/**
 * The template for displaying custom "Episode" post type
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

  <?php
    $vid_url        = get_field('episode_video_url');
    $vid_code       = explode('=', $vid_url)[1];
    $json_output    = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vid_code."?v=2&alt=json&prettyprint=true");
    $json           = json_decode($json_output, true);
    $placeholderimg = get_template_directory_uri() . '/assets/img/ajax/youtube-placeholder.png';
    $vid_title      = get_the_title();
    $vid_date       = get_the_date();
    $vid_desc       = get_field('episode_video_description');
    $vid_views      = $json['entry']['yt$statistics']['viewCount'];
    $vid_length     = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
  ?>

  <li class="vid-panel wow fadeInDown highlighted">
    <a href="<?= the_permalink(); ?>">
      <div class="vid-thumbnail">
        <?= "<img src='http://img.youtube.com/vi/{$vid_code}/mqdefault.jpg' />"?>
        <span class="overlay"><i class="fa fa-play-circle"></i></span>
        <h5>
          <span><?= $vid_length ?></span>
          <span class="right"><?= $vid_views ?> Views</span>
        </h5>
      </div>
    </a>
    <div class="vid-body">
      <a href="<?= the_permalink(); ?>"><h4><?= $vid_title ?></h4></a>
    </div>
  </li>
