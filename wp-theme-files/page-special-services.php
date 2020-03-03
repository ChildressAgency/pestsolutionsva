<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <?php get_template_part('partials/page_title'); ?>

    <section id="special-services">
      <ul id="special-tabs" class="nav nav-pills d-flex justify-content-center services-tabs" role="tablist">
        <li class="nav-item">
          <a href="#raccoons" id="raccoons-tab" class="nav-link active" data-toggle="pill" role="tab" aria-controls="raccoons" aria-selected="true" title="Raccoons"></a>
        </li>
        <li class="nav-item">
          <a href="#bees" id="bees-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="bees" aria-selected="false" title="Bees"></a>
        </li>
        <li class="nav-item">
          <a href="#birds" id="birds-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="birds" aria-selected="false" title="Birds"></a>
        </li>
        <li class="nav-item">
          <a href="#fleas" id="fleas-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="fleas" aria-selected="false" title="Fleas"></a>
        </li>
      </ul>

      <div id="special-content" class="tab-content services-content">
        <div id="raccoons" class="tab-pane fade show active" role="tabpanel" aria-labelledby="raccoons-tab">
          <div class="card">
            <div id="raccoons-img" class="card-img"></div>
            <div class="card-body">
              <h3><?php the_field('wildlife_service_title'); ?></h3>
              <?php the_field('wildlife_service_description'); ?>
            </div>
          </div>
        </div>
        <div id="bees" class="tab-pane fade" role="tabpanel" aria-labelledby="bees-tab">
          <div class="card">
            <div id="bees-img" class="card-img"></div>
            <div class="card-body">
              <h3><?php the_field('bees_service_title'); ?></h3>
              <?php the_field('bees_service_description'); ?>
            </div>
          </div>
        </div>
        <div id="birds" class="tab-pane fade" role="tabpanel" aria-labelledby="birds-tab">
          <div class="card">
            <div id="birds-img" class="card-img"></div>
            <div class="card-body">
              <h3><?php the_field('birds_service_title'); ?></h3>
              <?php the_field('birds_service_description'); ?>
            </div>
          </div>
        </div>
        <div id="fleas" class="tab-pane fade" role="tabpanel" aria-labelledby="fleas-tab">
          <div class="card">
            <div id="fleas-img" class="card-img"></div>
            <div class="card-body">
              <h3><?php the_field('flea_service_title'); ?></h3>
              <?php the_field('flea_service_description'); ?>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
</main>
<?php get_footer();
