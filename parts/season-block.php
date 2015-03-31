
<?php
  // SEASON
  $seasonTitle       = "Real Deal " . ucfirst(str_replace('-', ' ', $season));
  $seasonPermalink   = get_term_link($season, 'series');
  // TOP EPISODE
  $newestEp          = array_shift($episode);
  $newestEpTitle     = get_the_title( $newestEp->ID );
  $newestEpDesc      = get_field( 'episode_video_description', $newestEp->ID );
  $newestEpVidUrl    = get_field('episode_video_url', $newestEp->ID);
  $newestEpPermalink = get_the_permalink($newestEp->ID);
  $newestEpPubDate   = get_the_date('', $newestEp->ID);
  $newestEpISODate   = get_the_date('c', $newestEp->ID);
  $newestEpCode       = explode('=', $newestEpVidUrl)[1];
  $json_output    = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$newestEpCode."?v=2&alt=json&prettyprint=true");
  $json = json_decode($json_output, true);
  $newestEpViews = $json['entry']['yt$statistics']['viewCount'];
  $newestEpLength = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
  $newestEpThumb = "http://img.youtube.com/vi/{$newestEpCode}/maxresdefault.jpg";

 ?>

<section class="row series season">

  <header class="small-12 medium-5 medium-centered text-center columns">
    <h2><a title="<?= 'Watch '.$seasonTitle ?>" href="<?= $seasonPermalink ?>"><?= $seasonTitle ?></a></h2>
  </header>

  <div class="body boxshadow"  style="padding-left:0;" data-equalizer="<?= $season.'-cnt' ?>">
    <!--
    <div class="small-12 large-6 columns thumbcontainer">
      <img class="thumb-bg" src="<?= $newestEpThumb ?>">
    </div> -->

    <div class="small-12 large-6 columns cover-bg-container">
    <a href="<?= $newestEpPermalink ?>" title="<?= 'Watch ' . $newestEpTitle ?>">
      <div class="cover-bg" data-equalizer-watch="<?= $season.'-cnt' ?>" style="background: url('<?= $newestEpThumb ?>') 25% 50% no-repeat; background-size: cover;"></div>
    </a>
    </div>

    <div class="small-12 large-6 columns content" data-equalizer-watch="<?= $season.'-cnt' ?>">
      <div class="" style="margin: 2rem 1rem;">
        <a title="<?= 'Watch ' . $newestEpTitle ?>" class="title" href="<?= $newestEpPermalink ?>"><h3><?= $newestEpTitle ?></h3></a>
          <ul class="vidstats">
            <li><?= $newestEpViews ?> Views</li>
            <li>Posted <span class="timeago" title="<?= $newestEpISODate ?>"><?= $newestEpPubDate ?></span></li>
          </ul>
          <p>
            <?= $newestEpDesc ?>
          </p>
          <a class="btn-holo" href="<?= $newestEpPermalink ?>" title="<?= 'Watch ' . $newestEpTitle ?>">Watch Episode</a>
      </div>
    </div>
  </div> <!-- /.body -->

 <?php if( $episode ) : ?>
  <div class="small-12 columns">
    <div class="episodes-header">
      <h3>Recent Episodes</h3>
      <a href="<?= $seasonPermalink ?>" class="viewall">+View All</a>
    </div>
    <div class="episodes">
      <ul class="small-block-grid-1 medium-block-grid-3" data-equalizer="<?= $season.'-eps' ?>">
        <?php foreach ($episode as $post) : ?>
          <?php
            $vid_title      = get_the_title($post->id);
            $vid_url        = get_field('episode_video_url', $post->id);
            $vid_permalink  = get_the_permalink($post->id);
            $vid_code       = explode('=', $vid_url)[1];
            $json_output    = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vid_code."?v=2&alt=json&prettyprint=true");
            $json = json_decode($json_output, true);
            $placeholderimg = get_template_directory_uri() . '/assets/img/ajax/youtube-placeholder.png';
            $vid_date       = get_the_date($post->id);
            $vid_views = $json['entry']['yt$statistics']['viewCount'];
            $vid_length = date('i:s', mktime(0,0, $json['entry']['media$group']['media$content'][0]['duration']));
           ?>

          <li class="vid-panel boxshadow" data-equalizer-watch="<?= $season.'-eps' ?>">
            <a href="<?= $vid_permalink ?>">
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
              <a href="<?= $vid_permalink ?>"><h4><?= $vid_title ?></h4></a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
 <?php endif; ?>

</section>
