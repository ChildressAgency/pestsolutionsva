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

  </div>
    <?php if(get_field('show_did_you_know_section')): ?>
      <?php $bg_image = get_field('did_you_know_section_background_image'); ?>
      <section id="did-you-know" style="background-image:url(<?php echo esc_url($bg_image['url']); ?>); background-position:center center;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <h2><?php the_field('did_you_know_section_title'); ?></h2>
            </div>
            <div class="col-md-6">

              <?php if(have_rows('did_you_know_section_slides')): ?>
                <div id="did-you-know-carousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php $i = 0; while(have_rows('did_you_know_section_slides')): the_row(); ?>
                      <li data-target="#did-you-know-carousel" data-slide-to="<?php echo $i; ?>"<?php if($i == 0){ echo ' class="active"'; } ?>></li>
                    <?php $i++; endwhile; ?>
                  </ol>

                  <div class="carousel-inner">
                    <?php $s = 0; while(have_rows('did_you_know_section_slides')): the_row(); ?>
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
              <?php endif; ?>

            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

</main>
<?php get_footer(); ?>