<div class="top-bar-container primNavContainer contain-to-grid show-for-medium-up">
    <div class="sticky" data-options="sticky_on: [medium,large]">
        <nav class="top-bar" id="primary-nav" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="hvr-grow">
                        <img alt="<?php bloginfo('name');?>" src="<?= get_template_directory_uri().'/assets/img/nav/asco-logo.png' ?>" style="width: 6em; height: 6em;">
                    </a>
                </li>
            </ul>
            <section class="top-bar-section">
                <?php foundationPress_top_bar_l(); ?>
                <?php foundationPress_top_bar_r(); ?>
            </section>
        </nav>
    </div>
</div>
