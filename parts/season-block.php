
  <section class="row series season">

    <header class="small-4 small-centered text-center columns">
      <h2>Real Deal <?= $season ?></h2>
    </header>

    <div class="small-12 columns body" style="outline: 1px solid blue;">
      <ul class="small-block-grid-2">
        <!-- screenshot -->
        <li class="screenshot"></li>
        <!-- description -->
        <li class="content">
          <div>
            <h3>Episode Title</h3>
            <span>views</span>
            <span>Post Date</span>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <button type="button">Watch Episode</button>
        </li>
      </ul>
    </div> <!-- /.body -->
    <div class="episodes">
      <h3>Episodes</h3>
      <ul>
      <?php
        foreach ($episode as $post) {
          echo "<li>" . get_the_title($post->id) . "</li>";
        }
       ?>
      </ul>
    </div>
  </section>
