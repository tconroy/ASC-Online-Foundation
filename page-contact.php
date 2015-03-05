<?php get_header(); ?>
<div class="row">
  <div class="small-12 large-12 columns contact-page" role="main">

    <div class="row content-section">

      <div class="section-title">
        <h2>
          Send a Message
          <small class="show-for-medium-up">Or Drop By</small>
        </h2>
      </div> <!-- .section-title -->

      <div class="small-12 medium-10 medium-offset-1">
        <div class="small-12 medium-5 medium-push-7 columns">
          <figure>
            <a href="http://maps.rit.edu/embed.php?zoom=21&lat=43.084790235380794&lng=-77.67410930290224&open=p-24&start=0&rows=10">
              <img class="th" src="<?= bloginfo('template_directory').'/assets/img/contact/map.png'?>">
            </a>
            <figcaption class="medium-offset-1">
              <div class="row">
                <div class="small-3 medium-3 columns">Location</div>
                <div class="small-9 medium-9 columns">Monroe Hall, Room 2080</div>
              </div>
              <div class="row">
                <div class="small-3 medium-3 columns">Phone</div>
                <div class="small-9 medium-9 columns">585-475-6682</div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="small-12 medium-7 medium-pull-5 columns">
          <form name="" data-abide>
            <div class="small-12 columns">
              <input type="text" name="name" placeholder="YOUR NAME" required pattern="[a-zA-Z ]+">
              <small class="error">Name is required.</small>
            </div>
            <div class="small-12 columns">
              <input type="email" name="email" placeholder="EMAIL ADDRESS" required pattern="email">
              <small class="error">An email address is required.</small>
            </div>
            <div class="small-12 columns">
              <small class="error">Message subject is required.</small>
            </div>
            <div class="small-12 columns">
              <textarea name="message" placeholder="YOUR MESSAGE" required></textarea>
              <small class="error">Message body is required.</small>
            </div>
            <div class="small-12 columns">

              <a href="#" data-reveal-id="myModal">Click Me For A Modal</a>

              <div id="myModal" class="reveal-modal" data-reveal>

                <h2 class="text-center">Wait!<br><small>We need to make sure you're human first</small></h2>
                <div class="small-6 small-centered">
                  <p>
                    <div class="g-recaptcha" data-sitekey="6LegnAITAAAAAPI89BqNpuMxXmqGnSBHDrFw-RKW"></div>
                  </p>
                </div>

                <a class="close-reveal-modal">&#215;</a>
              </div>

            </div>
            <div class="small-12 columns">
              <input type="submit" value="Submit" class="button small">
            </div>
          </form>
        </div>
      </div> <!-- .row -->

    </div> <!-- .content-section -->

    <!-- ======================================= -->

    <div class="row content-section">

      <div class="section-title">
        <h2>
          Academic Coaching Appointment Request
          <small class="show-for-medium-up">* Denotes required field</small>
        </h2>
      </div>

      <div class="row">
        <form data-abide class="small-10 small-offset-1 columns">
            <div class="row">
              <div class="small-12 medium-6 columns">
                <label for="fname" class="required">
                  First Name
                  <input type="text" name="fname" id="fname" required pattern="alpha">
                </label>
                <small class="error">First name required (letters only)</small>
              </div>
              <div class="small-12 medium-3 columns">
                <label for="lname" class="required">
                  Last Name
                  <input type="text" name="lname" id="lname" required pattern="alpha">
                </label>
                <small class="error">Last name required (letters only)</small>
              </div>
              <div class="small-12 medium-3 columns">
                <label for="uid" class="required">
                  University ID
                  <input type="text" name="uid" id="uid" required pattern="number">
                </label>
                <small class="error">UID required (numbers only)</small>
              </div>
            </div>
            <div class="row">
              <div class="small-12 medium-4 columns">
                <label for="ritemail" class="required">
                  RIT Email
                  <input type="email" name="ritemail" id="ritemail" required pattern="email">
                </label>
                <small class="error">RIT Email required</small>
              </div>
              <div class="small-12 medium-8 columns">
                <label for="yearlevel" class="required">
                  Year at RIT
                  <select name="yearlevel" id="yearlevel" required>
                    <option value="" disabled selected></option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6+ / Grad">6+ / Grad</option>
                  </select>
                </label>
                <small class="error">Year Level required.</small>
              </div>
            </div>
            <div class="row">
              <div class="small-12 medium-6 columns">
                <label for="college" class="required">
                  College
                  <select name="college" id="college" required>
                    <option value="" disabled selected></option>
                    <option value="CAST">College of Applied Science and Technology</option>
                    <option value="SCOB">Saunders College of Business</option>
                    <option value="GCCIS">B. Thomas Golisano College of Computing and Information Sciences</option>
                    <option value="KGCOE">Kate Gleason College of Engineering</option>
                    <option value="COHSAT">College of Health Sciences and Technology</option>
                    <option value="CIAS">College of Imaging Arts and Sciences</option>
                    <option value="COLA">College of Liberal Arts</option>
                    <option value="NTID">National Technical Institute for the Deaf</option>
                    <option value="COS">College of Science</option>
                  </select>
                </label>
                <small class="error">College required</small>
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <label for="apptreason" class="required">
                  What is your primary reason for making this appointment?
                  <textarea name="apptreason" id="apptreason" required></textarea>
                </label>
                <small class="error">Appointment reason required</small>
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <label for="availtable">Select the days and times you are typically available to meet:</label>
                <table class="responsive" id="availtable">
                  <thead>
                    <tr>
                      <th>Day</th>
                      <th>9am</th>
                      <th>10am</th>
                      <th>11pm</th>
                      <th>12pm</th>
                      <th>1pm</th>
                      <th>2pm</th>
                      <th>3pm</th>
                      <th>4pm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Tuesday</th>
                      <td><input type="checkbox" name="Tuesday[]" value="9am"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="10am"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="11am"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="12pm"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="1pm"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="2pm"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="3pm"></td>
                      <td><input type="checkbox" name="Tuesday[]" value="4pm"></td>
                    </tr>
                    <tr>
                      <th>Wednesday</th>
                      <td><input type="checkbox" name="Wednesday[]" value="9am"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="10am"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="11am"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="12pm"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="1pm"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="2pm"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="3pm"></td>
                      <td><input type="checkbox" name="Wednesday[]" value="4pm"></td>
                    </tr>
                    <tr>
                      <th>Thursday</th>
                      <td><input type="checkbox" name="Thursday[]" value="9am"></td>
                      <td><input type="checkbox" name="Thursday[]" value="10am"></td>
                      <td><input type="checkbox" name="Thursday[]" value="11am"></td>
                      <td><input type="checkbox" name="Thursday[]" value="12pm"></td>
                      <td><input type="checkbox" name="Thursday[]" value="1pm"></td>
                      <td><input type="checkbox" name="Thursday[]" value="2pm"></td>
                      <td><input type="checkbox" name="Thursday[]" value="3pm"></td>
                      <td><input type="checkbox" name="Thursday[]" value="4pm"></td>
                    </tr>
                    <tr>
                      <th>Friday</th>
                      <td><input type="checkbox" name="Friday[]" value="9am"></td>
                      <td><input type="checkbox" name="Friday[]" value="10am"></td>
                      <td><input type="checkbox" name="Friday[]" value="11am"></td>
                      <td><input type="checkbox" name="Friday[]" value="12pm"></td>
                      <td><input type="checkbox" name="Friday[]" value="1pm"></td>
                      <td><input type="checkbox" name="Friday[]" value="2pm"></td>
                      <td><input type="checkbox" name="Friday[]" value="3pm"></td>
                      <td><input type="checkbox" name="Friday[]" value="4pm"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="small-12 columns text-center">
                <div style="padding-top: 2rem;">
                  <input type="submit" value="Submit" class="button">
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>
