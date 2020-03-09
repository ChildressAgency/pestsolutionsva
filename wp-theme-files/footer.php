    <section id="lets-talk">
      <h2 class="banner-title"><?php the_field('contact_section_title', 'option'); ?></h2>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7 col-md-5">
            <?php echo do_shortcode(get_field('contact_section_form_shortcode', 'option')); ?>
          </div>
        </div>
      </div>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ants-crawling.png" id="crawling-bugs" class="" alt="" />
    </section>

  <footer id="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <a href="<?php echo esc_url(home_url()); ?>">
            <?php $logo = get_field('logo', 'option'); ?>
            <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($logo['alt']); ?>" />
            <span class="sr-only"><?php echo esc_html(bloginfo('name')); ?></span>
          </a>
          <?php the_field('footer_about_us_content', 'option'); ?>
        </div>
        <div class="col-md-3">
          <h3><?php echo esc_html__('OUR SERVICES', 'pestsolutions'); ?></h3>
          <?php 
            $footer_services_nav = array(
              'theme_location' => 'footer-services-nav',
              'menu' => '',
              'container' => '',
              'container_id' => '',
              'container_class' => '',
              'menu_id' => '',
              'menu_class' => 'footer-services',
              'echo' => true,
              'fallback_cb' => 'pestsolutions_footer_services_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 1,
              'walker' => new WP_Bootstrap_Navwalker()
            );
            wp_nav_menu($footer_services_nav); 
          ?>
          <h4><a href="<?php echo esc_url(home_url('privacy-policy')); ?>" class="privacy-policy"><?php echo esc_html__('Privacy Policy', 'pestsolutions'); ?></a></h4>
        </div>
        <div class="col-md-5">
          <?php if(have_rows('locations', 'option')): ?>
            <h3><?php echo esc_html__('CONTACT US', 'pestsolutions'); ?></h3>
            <?php while(have_rows('locations', 'option')): the_row(); ?>
              <?php $location_number = get_sub_field('location_phone_number'); ?>
              <p class="marker"><?php the_sub_field('location_title'); ?> <a href="tel:<?php echo esc_attr($location_number); ?>"><?php echo esc_html($location_number); ?></a></p>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <p class="copyright">&copy;<?php echo date('Y'); ?> <?php echo esc_html(bloginfo('name')); ?><br />website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a></p>
    </div>
  </footer>

  <?php if(have_rows('locations', 'option')): ?>
    <div id="callus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="modal-label" class="modal-title"><?php echo esc_html__('Select number to call', 'pestsolutions'); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aira-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php while(have_rows('locations', 'option')): the_row(); ?>
              <div class="callus-modal-number">
                <h5><?php the_sub_field('location_title'); ?></h5>
                <?php $location_number = get_sub_field('location_phone_number'); ?>
                <a href="tel:<?php echo esc_attr($location_number); ?>"><?php echo esc_html($location_number); ?></a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>