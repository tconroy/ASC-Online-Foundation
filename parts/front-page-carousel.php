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
          <img data-lazy="{$lessons['math']}">
      </div>
      <div class="slide purple">
          <img data-lazy="{$lessons['onlineLearning']}">
      </div>
      <div class="slide red">
          <img data-lazy="{$lessons['reading']}">
      </div>
      <div class="slide blue">
          <img data-lazy="{$lessons['studySkills']}">
      </div>
      <div class="slide green">
          <img data-lazy="{$lessons['timeManagement']}">
      </div>
      <div class="slide orange">
          <img data-lazy="{$lessons['tutoring']}">
      </div>
  </div> <!-- .inner-carousel -->
  <img src="{$uri}">
</div> <!-- .inner-carousel-wrapper -->
HTML;
echo $output;

?>