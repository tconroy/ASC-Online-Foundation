<?php get_header(); ?>
<div class="row">
  <div class="small-12 large-12 columns front-page" role="main">

    <div class="row content-section sneakpeek hide-for-small-only">

      <div class="section-title">
        <h2>
          ASC Online
          <small>Sneak Peek</small>
        </h2>
      </div> <!-- .section-title -->

      <div class="row vidrow">
        <div class="medium-12 columns">
        <!--
          <div class="vidwrapper">
            <div class="framewrapper flex-video">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/DAYDZBD3pT8" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        -->
          <div class="vidwrapper wow bounceInUp">
            <div class="framewrapper">
              <div class="lazyYT" data-youtube-id="DAYDZBD3pT8" data-parameters="rel=0">loading...</div>
            </div>
          </div>
        </div>
      </div> <!-- .row -->

    </div> <!-- .content-section -->

    <!-- ======================================= -->

    <div class="row content-section classroom">

      <div class="section-title" id="classroom">
        <h2>
          ASC Online Classroom
          <small>Lessons worth Learning</small>
        </h2>
      </div> <!-- .section-title -->

      <div class="row" data-equalizer>

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('study-skills', 'subjects') ?>" class="lesson-panel-link">
            <div class="panel-header blue">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_StudySkills.png'?>" alt="Study Skills">
            </div>
            <div class="panel" data-equalizer-watch>
                <h3>Study Skills</h3>
                <p>
                  Wondering what studying truly involves?  Identify what to study, how to study, and when to study.
                </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('time-management', 'subjects')?>" class="lesson-panel-link">
            <div class="panel-header green">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_TimeManagement.png'?>" alt="Time Management">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Time Management</h3>
              <p>
                Time management and organizational skills are the foundation to academic success.
              </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('tutoring', 'subjects')?>" class="lesson-panel-link">
            <div class="panel-header orange">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Tutoring.png'?>" alt="Tutoring">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Tutoring</h3>
              <p>
                Being a successful tutor is as important as using a tutor successfully.
              </p>
            </div>
          </a>
        </div>

      </div> <!-- .row -->

      <div class="row" data-equalizer>

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('math', 'subjects')?>" class="lesson-panel-link">
            <div class="panel-header yellow">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Math.png'?>" alt="Math">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Math</h3>
              <p>
                Success in math relies on preparation, good note-taking, and working effectively with class material.
              </p>
            </div>
          </a>
        </div> <!-- /lesson-container -->

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('reading', 'subjects')?>" class="lesson-panel-link">
            <div class="panel-header red">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Reading.png'?>" alt="Reading">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Reading</h3>
              <p>
                It’s not a door stop!  Effective textbook reading strategies are essential to college success.
              </p>
            </div>
          </a>
        </div> <!-- /lesson-container -->

        <div class="small-12 medium-4 columns lesson-container wow bounceIn">
          <a href="<?= get_term_link('online-learning', 'subjects')?>" class="lesson-panel-link">
            <div class="panel-header purple">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_OnlineLearning.png'?>" alt="Online Learning">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Online Learning</h3>
              <p>
                Beyond the bricks - Learning how to learn online.
              </p>
            </div>
          </a>
        </div> <!-- /lesson-container -->

      </div> <!-- .row -->

    </div> <!-- .home-section-2 -->
  </div>
</div>

<?php get_footer(); ?>
