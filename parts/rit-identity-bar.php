<div class="contain-to-grid rit-identity-bar show-for-medium-up">
    <nav class="top-bar" data-topbar="" role="navigation">
        <!-- Title -->
        <ul class="title-area">
            <li class="name">
                <a href="">
                <span id="metaritlogo"></span>
                </a>
            </li>
        </ul>
        <!-- Top Bar Section -->
        <section class="top-bar-section">
            <!-- Top Bar Right Nav Elements -->
            <ul class="right">
                <!-- Anchor -->
                <li><a href="#">Directories</a></li>
                <!-- Search | has-form wrapper -->
                <li class="has-form">
                    <form action="<?= get_site_url(); ?>" method="GET" role="search">
                        <row class="collapse">
                            <div class="row">
                              <div class="small-12 columns">
                                <div class="row collapse postfix-round">
                                  <div class="small-9 columns">
                                    <input type="text" name="s" id="s" placeholder="Search" value="<?php if ( isset($_GET['s']) ) { echo $_GET['s']; } else { echo ""; }?>"/>
                                  </div>
                                  <div class="small-3 columns">
                                    <button type="submit" class="button postfix">
                                        <i class="fa fa-search"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </row>
                    </form>
                </li>
            </ul>
        </section>
    </nav>
</div>