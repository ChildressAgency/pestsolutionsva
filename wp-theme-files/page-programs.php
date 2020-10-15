<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <section class="main-content">
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
        <hr />
        
        <?php if(have_rows('programs')): ?>
          <div class="programs">
            <?php while(have_rows('programs')): the_row(); ?>
              
              <div class="program">
                <h3><?php the_sub_field('program_title'); ?></h3>
                <div class="price">
                  <span>Starting at</span>
                  <span class="price-per-month"><?php the_sub_field('program_price'); ?></span>
                  <?php $crossed_out_price = get_sub_field('crossed_out_price'); ?>
                  <span class="initial-service">
                    <?php if($crossed_out_price): ?>
                      <del><?php echo esc_html($crossed_out_price); ?></del>&nbsp;&nbsp;&nbsp;
                    <?php endif; ?>
                    <?php the_sub_field('initial_service'); ?>
                  </span>
                </div>
                <?php $program_link = get_sub_field('program_link'); ?>
                <a href="<?php echo esc_url($program_link['url']); ?>" class="btn-main btn-round"><?php echo esc_html($program_link['title']); ?></a>
                <div class="program-details">
                  <?php the_sub_field('program_details'); ?>
                </div>
              </div>

            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </article>
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
  </div>

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
</main>
<?php get_footer();