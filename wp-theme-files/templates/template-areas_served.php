<?php

/**
 * Template Name: Areas Served Template
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-content">
      <article>
        <?php get_template_part('partials/page_title'); ?>
        <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            the_content();
          }
        }
        ?>
      </article>
    </section>

    <?php if (get_field('show_pest_info_section')) : ?>
      <section id="midlo-species">
        <ul id="species-tabs" class="nav nav-pills d-flex justify-content-center services-tabs" role="tablist">
          <li class="nav-item">
            <a href="#ants" id="ants-tab" class="nav-link active" data-toggle="pill" role="tab" aria-controls="ants" aria-selected="true" title="Ants"></a>
          </li>
          <li class="nav-item">
            <a href="#bees-wasps" id="bees-wasps-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="bees-wasps" aria-selected="false" title="Bees/Wasps"></a>
          </li>
          <li class="nav-item">
            <a href="#termites" id="termites-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="termites" aria-selected="false" title="Termites"></a>
          </li>
          <li class="nav-item">
            <a href="#mice-rodents" id="mice-rodents-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="mice-rodents" aria-selected="false" title="Mice/Rodents"></a>
          </li>
          <li class="nav-item">
            <a href="#mosquitoes" id="mosquitoes-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="mosquitoes" aria-selected="false" title="Mosquitoes"></a>
          </li>
        </ul>

        <div id="species-content" class="tab-content services-content">
          <div id="ants" class="tab-pane fade show active" role="tabpanel" aria-labelledby="ants-tab">
            <div class="card">
              <div id="ant-img" class="card-img"></div>
              <div class="card-body">
                <?php the_field('ants_info'); ?>
              </div>
            </div>
          </div>
          <div id="bees-wasps" class="tab-pane fade" role="tabpanel" aria-labelledby="bees-wasps-tab">
            <div class="card">
              <div id="bees-wasps-img" class="card-img"></div>
              <div class="card-body">
                <?php the_field('bees_info'); ?>
              </div>
            </div>
          </div>
          <div id="termites" class="tab-pane fade" role="tabpanel" aria-labelledby="termites-tab">
            <div class="card">
              <div id="termites-img" class="card-img"></div>
              <div class="card-body">
                <?php the_field('termites_info'); ?>
              </div>
            </div>
          </div>
          <div id="mice-rodents" class="tab-pane fade" role="tabpanel" aria-labelledby="mice-rodents-tab">
            <div class="card">
              <div id="mice-rodents-img" class="card-img"></div>
              <div class="card-body">
                <?php the_field('mice_rodents_info'); ?>
              </div>
            </div>
          </div>
          <div id="mosquitoes" class="tab-pane fade" role="tabpanel" aria-labelledby="mosquitoes-tab">
            <div class="card">
              <div id="mosquitoes-img" class="card-img"></div>
              <div class="card-body">
                <?php the_field('mosquitoes_info'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if(get_field('show_did_you_know_section')): ?>
      <?php $bg_image = get_field('did_you_know_section_background_image'); ?>
      <section id="did-you-know" style="background-image:url(<?php echo esc_url($bg_image['url']); ?>); background-position:center center;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <h2><?php the_field('did_you_know_section_title'); ?></h2>
            </div>
            <div class="col-md-6">

              <?php if(have_rows('did_you_know_slides')): ?>
                <div id="did-you-know-carousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php $i = 0; while(have_rows('did_you_know_slides')): the_row(); ?>
                      <li data-target="#did-you-know-carousel" data-slide-to="<?php echo $i; ?>"<?php if($i == 0){ echo ' class="active"'; } ?>></li>
                    <?php $i++; endwhile; ?>
                </ol>

                <div class="carousel-inner">
                  <?php $s = 0; while(have_rows('did_you_know_slides')): the_row(); ?>
                    <div class="carousel-item<?php if($s == 0){ echo ' active'; } ?>">
                      <?php $slide_img = get_sub_field('slide_background_image'); ?>
                      <?php if($slide_img): ?>
                        <img src="<?php echo esc_url($slide_img['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($slide_img['alt']); ?>" />
                      <?php endif; ?>
                      <div class="carousel-caption">
                        <p><?php the_sub_field('slide_caption'); ?></p>
                      </div>
                    </div>
                  <?php $s++; endwhile; ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  </div>
</main>
<?php get_footer(); ?>