<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <?php get_template_part('partials/page_title'); ?>

    <section id="special-services">
      <ul id="special-tabs" class="nav nav-pills d-flex justify-content-center services-tabs" role="tablist">
        <?php if(get_field('display_wildlife_tab')): ?>
          <li class="nav-item">
            <a href="#raccoons" id="raccoons-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="raccoons" aria-selected="false" title="Raccoons"></a>
          </li>
        <?php endif; if(get_field('display_bat_tab')): ?>
          <li class="nav-item">
            <a href="#bats" id="bats-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="bats" aria-selected="false" title="Bats"></a>
          </li>
        <?php endif; if(get_field('display_tick_tab')): ?>
          <li class="nav-item">
            <a href="#ticks" id="ticks-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="ticks" aria-selected="false" title="Ticks"></a>
          </li>
        <?php endif; if(get_field('display_bees_tab')): ?>
          <li class="nav-item">
            <a href="#bees" id="bees-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="bees" aria-selected="false" title="Bees"></a>
          </li>
        <?php endif; if(get_field('display_birds_tab')): ?>
          <li class="nav-item">
            <a href="#birds" id="birds-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="birds" aria-selected="false" title="Birds"></a>
          </li>
        <?php endif; if(get_field('display_flea_tab')): ?>
          <li class="nav-item">
            <a href="#fleas" id="fleas-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="fleas" aria-selected="false" title="Fleas"></a>
          </li>
        <?php endif; ?>
      </ul>

      <div id="special-content" class="tab-content services-content">
        <?php if(get_field('display_wildlife_tab')): ?>
          <div id="raccoons" class="tab-pane fade" role="tabpanel" aria-labelledby="raccoons-tab">
            <div class="card">
              <div id="raccoons-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('wildlife_service_title'); ?></h3>
                <?php the_field('wildlife_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; if(get_field('display_bat_tab')): ?>
          <div id="bats" class="tab-pane fade" role="tabpanel" aria-labelledby="bats-tab">
            <div class="card">
              <div id="bats-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('bat_service_title'); ?></h3>
                <?php the_field('bat_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; if(get_field('display_tick_tab')): ?>
          <div id="ticks" class="tab-pane fade" role="tabpanel" aria-labelledby="ticks-tab">
            <div class="card">
              <div id="ticks-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('tick_service_title'); ?></h3>
                <?php the_field('tick_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; if(get_field('display_bees_tab')): ?>
          <div id="bees" class="tab-pane fade" role="tabpanel" aria-labelledby="bees-tab">
            <div class="card">
              <div id="bees-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('bees_service_title'); ?></h3>
                <?php the_field('bees_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; if(get_field('display_birds_tab')): ?>
          <div id="birds" class="tab-pane fade" role="tabpanel" aria-labelledby="birds-tab">
            <div class="card">
              <div id="birds-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('birds_service_title'); ?></h3>
                <?php the_field('birds_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; if(get_field('display_flea_tab')): ?>
          <div id="fleas" class="tab-pane fade" role="tabpanel" aria-labelledby="fleas-tab">
            <div class="card">
              <div id="fleas-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php the_field('flea_service_title'); ?></h3>
                <?php the_field('flea_service_description'); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </section>
  </div>
</main>
<?php get_footer();
