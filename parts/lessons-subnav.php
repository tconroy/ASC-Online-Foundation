<?php

$baseurl = get_template_directory_uri().'/assets/img/lesson-icons/';

$math = $ol = $reading = $ss = $tm = $tutoring = "";

if ( isset($_GET['lc']) ) {
  switch( $_GET['lc'] ) {
    case "math":            $math     = "active"; break;
    case "online-learning": $ol       = "active"; break;
    case "reading":         $reading  = "active"; break;
    case "study-skills":    $ss       = "active"; break;
    case "time-management": $tm       = "active"; break;
    case "tutoring":        $tutoring = "active"; break;
  }
}

$img = [
  'studyskills'    => $baseurl.'Revised_StudySkills.png',
  'timemanagement' => $baseurl.'Revised_TimeManagement.png',
  'tutoring'       => $baseurl.'Revised_Tutoring.png',
  'math'           => $baseurl.'Revised_Math.png',
  'reading'        => $baseurl.'Revised_reading.png',
  'onlinelearning' => $baseurl.'Revised_OnlineLearning.png',
];

?>

<div class="icon-bar six-up lesson-icon-bar">
  <a href="<?= add_query_arg( ['lc' => 'study-skills'] ) ?>" class="item blue <?= $ss ?>">
    <img src="<?= $img['studyskills'] ?>" >
    <label class="show-for-medium-up">Study Skills</label>
  </a>
  <a href="<?= add_query_arg( ['lc' => 'time-management'] ) ?>" class="item green <?= $tm ?>">
    <img src="<?= $img['timemanagement'] ?>" >
    <label class="show-for-medium-up">Time Management</label>
  </a>
  <a href="<?= add_query_arg( ['lc' => 'tutoring'] ) ?>" class="item orange <?= $tutoring ?>">
    <img src="<?= $img['tutoring'] ?>" >
    <label class="show-for-medium-up">Tutoring</label>
  </a>
  <a href="<?= add_query_arg( ['lc' => 'math'] ) ?>" class="item yellow <?= $math ?>">
    <img src="<?= $img['math'] ?>" >
    <label class="show-for-medium-up">Math</label>
  </a>
  <a href="<?= add_query_arg( ['lc' => 'reading'] ) ?>" class="item red <?= $reading ?>">
    <img src="<?= $img['reading'] ?>" >
    <label class="show-for-medium-up">Reading</label>
  </a>
  <a href="<?= add_query_arg( ['lc' => 'online-learning'] ) ?>" class="item purple <?= $ol ?>">
    <img src="<?= $img['onlinelearning'] ?>" >
    <label class="show-for-medium-up">Online Learning</label>
  </a>
</div>