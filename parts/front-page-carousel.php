<?php

$uri = get_template_directory_uri() . '/assets/img/banners/new/home.png';

  $base = get_template_directory_uri() . '/assets/img/lesson-slides/';
  $lessons = [
    'math'            => $base.'math.png',
    'onlineLearning'  => $base.'onlineLearning.png',
    'reading'         => $base.'reading.png',
    'studySkills'     => $base.'studySkills.png',
    'timeManagement'  => $base.'timeManagement.png',
    'tutoring'        => $base.'tutoring.png'
  ];

  $output = <<<HTML
<div class="inner-carousel-wrapper">
  <div class="inner-carousel">
      <div class="slide yellow">
          <img class="" src="{$lessons['math']}" alt="">
      </div>
      <div class="slide purple">
          <img class="" src="{$lessons['onlineLearning']}" alt="">
      </div>
      <div class="slide red">
          <img class="" src="{$lessons['reading']}" alt="">
      </div>
      <div class="slide blue">
          <img class="" src="{$lessons['studySkills']}" alt="">
      </div>
      <div class="slide green">
          <img class="" src="{$lessons['timeManagement']}" alt="">
      </div>
      <div class="slide orange">
          <img class="" src="{$lessons['tutoring']}" alt="">
      </div>
  </div> <!-- .inner-carousel -->
  <img src="{$uri}">
</div> <!-- .inner-carousel-wrapper -->
HTML;
echo $output;

?>