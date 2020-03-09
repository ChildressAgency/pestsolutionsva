<?php get_header(); ?>
  <main id="main">
    <section id="hp-about-cards">
      <div class="container">
        <p class="slogan"><?php the_field('about_section_title'); ?></p>
        <div class="row">
          <div class="col-md-4">
            <div id="about-card-1" class="about-card" data-aos="fade-up">
              <h3 data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_1_title'); ?></h3>
              <p data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_1_content'); ?></p>
            </div>
          </div>
          <div class="col-md-4">
            <div id="about-card-2" class="about-card" data-aos="fade-up">
              <h3 data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_2_title'); ?></h3>
              <p data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_2_content'); ?></p>
            </div>
          </div>
          <div class="col-md-4">
            <div id="about-card-3" class="about-card" data-aos="fade-up">
              <h3 data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_3_title'); ?></h3>
              <p data-aos="fade" data-aos-delay="500"><?php the_field('about_section_card_3_content'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      $experience_section_bg = get_field('experience_section_background_image');
      $experience_section_css = get_field('experience_section_background_image_css');
    ?>
    <section id="years" style="background-image:url(<?php echo esc_url($experience_section_bg['url']); ?>); <?php echo esc_attr($experience_section_css); ?>">
      <div class="container">
        <div class="col-md-6 offset-md-6">
          <div class="years-content">
            <?php the_field('experience_section_content'); ?>
          </div>
        </div>
      </div>
    </section>

      <section id="pest-management-links">
        <div class="container">
          <div class="pest-links d-flex justify-content-around flex-wrap" data-aos="fade-up">
            <a href="<?php echo esc_url(home_url('mosquitoes')); ?>" id="mosquito-link" class="pest-link" aria-label="Mosquitoes" title="Mosquitoes"></a>
            <a href="<?php echo esc_url(home_url('stingers')); ?>" id="bees-link" class="pest-link" aria-label="Bees" title="Bees"></a>
            <a href="<?php echo esc_url(home_url('rodents')); ?>" id="mice-link" class="pest-link" aria-label="Mice" title="Mice"></a>
            <a href="<?php echo esc_url(home_url('ants')); ?>" id="ants-link" class="pest-link" aria-label="Ants" title="Ants"></a>
          </div>
          <?php the_field('pest_control_services_section_content'); ?>
        </div>
      </section>

  <?php if(have_rows('testimonials', 'option')): ?>
    <section id="hp-testimonials">
      <div class="container-fluid">
        <h2><?php the_field('testimonials_section_title', 'option'); ?></h2>
        <div class="swiper-container">
          <div class="swiper-wrapper">

            <?php while(have_rows('testimonials', 'option')): the_row(); ?>
              <div class="testimonial swiper-slide">
                <h4><?php the_sub_field('testimonial_author'); ?></h4>
                <?php
                  $star_review = get_sub_field('star_review');
                  if($star_review): ?>
                    <span class="star-rating <?php echo esc_attr($star_review); ?>"></span>
                <?php endif; ?>
                <?php the_sub_field('testimonial'); ?>
              </div>
            <?php endwhile; ?>

          </div>
        </div>

          <div class="swiper-arrow-prev">
            <svg class="swiper-arrow">
              <use xlink:href="#arrow-prev" />
            </svg>
          </div>
          <div class="swiper-arrow-next">
            <svg class="swiper-arrow">
              <use xlink:href="#arrow-next" />
            </svg>
          </div>

          <div class="swiper-pagination"></div>
      </div>
    </section>
  <?php endif; ?>

  <?php if(have_rows('affiliations', 'option')): ?>
    <section id="hp-affiliations">
      <div class="container">
        <h2><?php the_field('affiliations_section_title', 'option'); ?></h2>
        <div class="affiliations">
          <?php while(have_rows('affiliations', 'option')): the_row(); ?>
            <?php 
              $affiliate_link = get_sub_field('affiliate_link'); 
              $affiliate_img = get_sub_field('affiliate_image');
            ?>
            <a href="<?php echo esc_url($affiliate_link); ?>"><img src="<?php echo esc_url($affiliate_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($affiliate_img['alt']); ?>" /></a>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  </main>
<?php get_footer();