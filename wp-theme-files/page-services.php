<?php get_header(); ?>
<main id="main">
  <?php $pricing_bg = get_field('pricing_section_background_image'); ?>
  <section id="pricing" style="background-image:url(<?php echo esc_url($pricing_bg['url']); ?>);">
    <div class="container">
      <?php if(get_field('page_intro')): ?>
        <div class="page-intro">
          <h2 class="banner-title"><?php the_field('page_intro_title'); ?></h2>
          <div class="page-intro-body">
            <?php the_field('page_intro'); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div id="price-card-pro" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_1_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_1_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_1_description'); ?>

              <?php if(have_rows('package_1_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_1_logos')): the_row(); ?>
                    <?php 
                      $package_1_logo_img = get_sub_field('logo_image');
                      $package_1_logo_link = get_sub_field('logo_link');
                      if($package_1_logo_link): ?>
                        <a href="<?php echo esc_url($package_1_logo_link); ?>">
                          <img src="<?php echo esc_url($package_1_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_1_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_1_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_1_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div id="price-card-plus" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_2_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_2_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_2_description'); ?>

              <?php if(have_rows('package_2_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_2_logos')): the_row(); ?>
                    <?php
                      $package_2_logo_img = get_sub_field('logo_image');
                      $package_2_logo_link = get_sub_field('logo_link');
                      if($package_2_logo_link): ?>
                        <a href="<?php echo esc_url($package_2_logo_link); ?>">
                          <img src="<?php echo esc_url($package_2_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_2_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_2_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_2_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div id="price-card-premier" class="price-card">
            <div class="price-card-title">
              <h3><?php the_field('package_3_title'); ?></h3>
              <p>Starting at</p>
            </div>
            <div class="price-card-price">
              <h4>$<?php the_field('package_3_price'); ?><small>/month</small></h4>
            </div>
            <div class="price-card-content">
              <?php the_field('package_3_description'); ?>

              <?php if(have_rows('package_3_logos')): ?>
                <div class="logos">
                  <?php while(have_rows('package_3_logos')): the_row(); ?>
                    <?php
                      $package_3_logo_img = get_sub_field('logo_image');
                      $package_3_logo_link = get_sub_field('logo_link');
                      if($package_3_logo_link): ?>
                        <a href="<?php echo esc_url($package_3_logo_link); ?>">
                          <img src="<?php echo esc_url($package_3_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_3_logo_img['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo esc_url($package_3_logo_img['url']); ?>" class="img-fluid d-block ml-auto mb-3" alt="<?php echo esc_attr($package_3_logo_img['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();
