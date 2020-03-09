<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <article>
      <?php get_template_part('partials/page_title'); ?>

      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();

            the_content(); 
          }
        }
      ?>
    </article>

    <section id="the-process">
      <h2 class="text-center">The Process</h2>
      <ul class="step-process">
        <li class="step step-1">
          <div class="step-inner">
            <h3>Step 1</h3>
            <p><?php the_field('step_1_description'); ?></p>
          </div>
        </li>
        <li class="step step-2">
          <div class="step-inner">
            <h3>Step 2</h3>
            <p><?php the_field('step_2_description'); ?></p>
          </div>
        </li>
        <li class="step step-3">
          <div class="step-inner">
            <h3>Step 3</h3>
            <p><?php the_field('step_3_description'); ?></p>
          </div>
        </li>
        <li class="step step-4">
          <div class="step-inner">
            <h3>Step 4</h3>
            <p><?php the_field('step_4_description'); ?></p>
          </div>
        </li>
      </ul>
    </section>

    <section id="improved-conditions">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checked-house.png" class="img-fluid d-block mx-auto" alt="" />
        </div>
        <div class="col-md-8">
          <?php the_field('improved_conditions_section_content'); ?>
        </div>
      </div>
    </section>

    <section id="before-after-gallery">
      <?php the_field('gallery_intro'); ?>
      <div class="row gallery">
        <?php $gallery_images = get_field('gallery_images'); ?>
        <div class="col-md-5">
          <div id="gallery-image">
            <img src="<?php echo esc_url($gallery_images[0]['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($gallery_images[0]['alt']); ?>" />
          </div>
        </div>
        <div class="col-md-7">
          <div id="gallery-thumbs">
            <div id="gallery-thumbs-pages" class="tab-content">
              <?php
                $images_paged = array_chunk($gallery_images, 8);
                for($i = 0; $i < count($images_paged); $i++): ?>
                  <div id="gallery-thumbs-page-<?php echo $i; ?>" class="tab-pane fade<?php if($i == 0){ echo ' show active'; } ?>" role="tabpanel" aria-labelledby="gallery-thumbs-pager-<?php echo $i; ?>">
                    <div class="gallery-thumb-list d-flex flex-wrap justify-content-around">
                      <?php foreach($images_paged[$i] as $image): ?>
                        <div class="gallery-thumb" data-gallery_thumb="<?php echo esc_url($image['url']); ?>" class="gallery-thumb" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
                      <?php endforeach; ?>
                    </div>
                  </div>
              <?php endfor; ?>
            </div>

            <nav class="gallery-thumbs-pagination">
              <div class="nav nav-pills" role="tablist">PAGES
                <?php for($c = 0; $c < count($images_paged); $c++): ?>
                  <a href="#gallery-thumbs-page-<?php echo $c; ?>" id="gallery-thumbs-pager-<?php echo $c; ?>" class="nav-item nav-link<?php if($c == 0){ echo ' active'; } ?>" data-toggle="pill" role="tab" aria-controls="gallery-thumbs-page-<?php echo $c; ?>" aria-selected="true"><?php echo $c + 1; ?></a>
                <?php endfor; ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer();
