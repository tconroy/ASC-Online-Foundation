<?php get_header(); ?>
<div class="row">
  <div class="small-12 large-12 columns front-page" role="main">

    <div class="row content-section sneakpeek hide-for-small-only">

      <div class="section-title">
        <h2>ASC Online Sneak Peek</h2>
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
          <div class="vidwrapper">
            <div class="framewrapper">
              <div class="lazyYT" data-youtube-id="DAYDZBD3pT8" data-parameters="rel=0">loading...</div>
            </div>
          </div>
        </div>
      </div> <!-- .row -->

    </div> <!-- .content-section -->

    <!-- ======================================= -->

    <div class="row content-section classroom">

      <div class="section-title">
        <h2>
          ASC Online Classroom
          <small>Lessons worth Learning</small>
        </h2>
      </div> <!-- .section-title -->

      <div class="row" data-equalizer>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header blue">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_StudySkills.png'?>" alt="Study Skills">
            </div>
            <div class="panel" data-equalizer-watch>
                <h3>Study Skills</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header green">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_TimeManagement.png'?>" alt="Time Management">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Time Management</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header orange">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Tutoring.png'?>" alt="Tutoring">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Tutoring</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </a>
        </div>

      </div> <!-- .row -->

      <div class="row" data-equalizer>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header yellow">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Math.png'?>" alt="Math">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Math</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header red">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_Reading.png'?>" alt="Reading">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Reading</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </a>
        </div>

        <div class="small-12 medium-4 columns lesson-container">
          <a href="#" class="lesson-panel-link">
            <div class="panel-header purple">
              <img src="<?= bloginfo('template_directory').'/assets/img/lesson-icons/Revised_OnlineLearning.png'?>" alt="Online Learning">
            </div>
            <div class="panel" data-equalizer-watch>
              <h3>Online Learning</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </a>
        </div>
      </div>

      </div> <!-- .row -->

    </div> <!-- .home-section-2 -->
  </div>
</div>

<?php get_footer(); ?>
