<?php
/* assign subject button active class based on provided query value */
// $math = $ol = $reading = $ss = $tm = $tutoring = "";
$active = [ 'math' => '', 'online-learning' =>'', 'reading'=>'', 'study-skills'=>'', 'time-management'=>'', 'tutoring'=>'' ];
if ( isset($_GET['subjects']) ) {
  $active[ $_GET['subjects'] ] = "active";
} else {
  foreach($active as $key => $value) {
    $active[$key] = 'active';
  }
}

// store subject icons into a map to make our lives easier
$baseurl = get_template_directory_uri().'/assets/img/lesson-icons/';
$img = [
  'studyskills'    => $baseurl.'Revised_StudySkills.png',
  'timemanagement' => $baseurl.'Revised_TimeManagement.png',
  'tutoring'       => $baseurl.'Revised_Tutoring.png',
  'math'           => $baseurl.'Revised_Math.png',
  'reading'        => $baseurl.'Revised_reading.png',
  'onlinelearning' => $baseurl.'Revised_OnlineLearning.png',
];
?>

<div class="row">
  <div class="small-12 medium-9 medium-centered columns">
    <ul id="lesson-subnav" class="button-group even-6" style="text-align: center;">
      <li class="blue hvr-float <?= $active['study-skills'] ?>">
        <a href="<?= get_term_link('study-skills', 'subjects') ?>"><img src="<?= $img['studyskills'] ?>">
        <label class="show-for-large-up">Study Skills</label></a>
      </li>
      <li class="green hvr-float <?= $active['time-management'] ?>">
        <a href="<?= get_term_link('time-management', 'subjects') ?>"><img src="<?= $img['timemanagement'] ?>" >
        <label class="show-for-large-up">Time Management</label></a>
      </li>
      <li class="orange hvr-float <?= $active['tutoring'] ?>">
        <a href="<?= get_term_link('tutoring', 'subjects') ?>"><img src="<?= $img['tutoring'] ?>" >
        <label class="show-for-large-up">Tutoring</label></a>
      </li>
      <li class="yellow hvr-float <?= $active['math'] ?>">
        <a href="<?= get_term_link('math', 'subjects') ?>"><img src="<?= $img['math'] ?>" >
        <label class="show-for-large-up">Math</label></a>
      </li>
      <li class="red hvr-float <?= $active['reading'] ?>">
        <a href="<?= get_term_link('reading', 'subjects') ?>"><img src="<?= $img['reading'] ?>" >
        <label class="show-for-large-up">Reading</label></a>
      </li>
      <li class="purple hvr-float <?= $active['online-learning'] ?>">
        <a href="<?= get_term_link('online-learning', 'subjects') ?>"><img src="<?= $img['onlinelearning'] ?>" >
        <label class="show-for-large-up">Online Learning</label></a>
      </li>
    </ul>
  </div>
</div>