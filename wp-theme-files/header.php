<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <div id="masthead" class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <div class="collapse navbar-collapse navmenu">
          <a href="#callus-modal" id="callus" data-toggle="modal" data-target="#callus-modal">
            <svg class="cell-phone">
              <use xlink:href="#icon-cell-phone" />
            </svg>
            CALL US
          </a>

          <div class="social-search ml-auto d-flex">
            <?php 
              $client_login_link = get_field('client_login_link', 'option');
              if($client_login_link): ?>
                <a href="<?php echo esc_url($client_login_link['url']); ?>" class="btn-main btn-round bug-crawler mr-lg-4">Client Login</a>
            <?php endif; ?>

            <?php
              $facebook = get_field('facebook', 'option');
              $twitter = get_field('twitter', 'option');
            ?>
            <div class="social mr-3">
              <?php if($facebook): ?>
                <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook" target="_blank">
                  <svg class="social-icon">
                    <use xlink:href="#icon-facebook" />
                  </svg>
                </a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter" target="_blank">
                  <svg class="social-icon">
                    <use xlink:href="#icon-twitter" />
                  </svg>
                </a>
              <?php endif; ?>
            </div>

            <?php get_search_form(); ?>
          </div><!-- .social-search -->
        </div><!-- .navmenu -->
      </div><!-- .container-fluid -->
    </div><!-- #masthead -->

    <a href="<?php echo esc_url(home_url()); ?>" class="navbar-brand d-block d-xl-none mr-0">
      <?php $logo = get_field('logo', 'option'); ?>
      <img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($logo['alt']); ?>" />
      <span class="sr-only"><?php echo esc_html(bloginfo('name')); ?></span>
    </a>

    <nav class="navbar navbar-expand-lg pb-0">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle Navigation">
          <svg class="hamburger">
            <use xlink:href="#icon-bars" />
          </svg>
        </button>

        <div id="header-nav" class="collapse navbar-collapse navmenu">
          <?php
            $left_header_nav_args = array(
              'theme_location' => 'left-header-nav',
              'menu' => '',
              'container' => '',
              'container_id' => '',
              'container_class' => '',
              'menu_id' => 'left-header-nav',
              'menu_class' => 'navbar-nav align-items-center',
              'echo' => true,
              'fallback_cb' => 'pestsolutions_left_header_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new WP_Bootstrap_Navwalker()
            );
            wp_nav_menu($left_header_nav_args);
          ?>

          <a href="<?php echo esc_url(home_url()); ?>" class="navbar-brand d-none d-xl-flex">
            <img src="<?php echo esc_url($logo['url']); ?>" class="d-block" alt="<?php echo esc_attr($logo['alt']); ?>" />
            <span class="sr-only"><?php echo esc_html(bloginfo('name')); ?></span>
          </a>

          <?php
            $right_header_nav_args = array(
              'theme_location' => 'right-header-nav',
              'menu' => '',
              'container' => '',
              'container_id' => '',
              'container_class' => '',
              'menu_id' => 'right-header-nav',
              'menu_class' => 'navbar-nav align-items-center',
              'echo' => true,
              'fallback_cb' => 'pestsolutions_right_header_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new WP_Bootstrap_Navwalker()
            );
            wp_nav_menu($right_header_nav_args);
          ?>
          <a href="<?php echo esc_url(home_url('contact-us')); ?>" id="free-inspection" class="ml-auto">Get A Free<br />Inspection</a>
        </div><!-- #header-nav -->
      </div><!-- .container-fluid -->

    </nav>
  </header>

  <?php 
    $default_hero_image = get_field('default_hero_image', 'option'); 
    $default_hero_image_css = get_field('default_hero_image_css', 'option');
  ?>

<?php if(is_front_page()): ?>
  <?php 
    $hp_hero_images_urls = array();
    $hp_hero_images = '';
    $hp_hero_first_image = '';

    if(have_rows('hero_images')){
      while(have_rows('hero_images')){
        the_row();
        $hp_hero_image = get_sub_field('hero_image');
        $hp_hero_images_urls[] = esc_url($hp_hero_image['url']);
      }

      $hp_hero_images = json_encode($hp_hero_images_urls);
      $hp_hero_first_image = $hp_hero_images_urls[0];
    }
    else{
      $hp_hero_first_image = $default_hero_image['url'];
    }
  ?>

  <section id="hero" class="hero" data-hero_images='<?php echo $hp_hero_images; ?>' style="background-image:url(<?php echo esc_url($hp_hero_first_image); ?>);">
    <div class="container">
      <div class="hero-caption">
        <div class="row">
          <div class="col-md-7 col-lg-8 d-flex align-items-center justify-content-end">
            <h1 class="hero-title" data-aos="fade-right" data-aos-easing="ease-out" data-aos-duration="1000"><?php echo the_field('hero_caption'); ?></h1>
          </div>
          <div class="col-md-5 col-lg-4">
            <?php echo do_shortcode(get_field('hero_contact_form_shortcode')); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else: 
  if(!is_page('contact') && !is_page('pest-management')): ?>
  <?php
    $hero_image = get_field('hero_image');
    if($hero_image){
      $hero_image_url = $hero_image['url'];
      $hero_image_css = get_field('hero_image_css');
    }
    else{
      $hero_image_url = $default_hero_image['url'];
      $hero_image_css = $default_hero_image_css;
    }
  ?>
  <section id="hero" class="hero d-flex align-items-end" style="background-image:url(<?php echo esc_url($hero_image_url); ?>); <?php echo esc_attr($hero_image_css); ?>">
    <div class="container">
      <?php 
        $hero_caption = get_field('hero_caption');
        if($hero_caption): ?>
          <div class="hero-caption">
            <p class="hero-title" data-aos="fade-left"><?php echo esc_html($hero_caption); ?></p>
          </div>
      <?php endif; ?>
    </div>
  </section>

  <?php if(get_field('display_banner', 'option')): ?>
    <div class="free-inspection-banner">
      <div class="container-fluid">
        <h2><?php the_field('banner_title', 'option'); ?></h2>
        <p><?php the_field('banner_subtitle', 'option'); ?></p>

        <?php if(have_rows('locations', 'option')): ?>
          <ul class="free-inspection-locations">
            <?php while(have_rows('locations', 'option')): the_row(); ?>
              <?php $location_number = get_sub_field('location_phone_number'); ?>
              <li><a href="tel:<?php echo esc_attr($location_number); ?>"><?php the_sub_field('location_title'); ?>&nbsp;<?php echo $location_number; ?></a></li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; endif; ?>