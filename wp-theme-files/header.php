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
                <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook">
                  <svg class="social-icon">
                    <use xlink:href="#icon-facebook" />
                  </svg>
                </a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter">
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

<?php if(is_front_page()): ?>
  <section id="hero" class="hero" data-hero_images='["C:/Users/JohnCampbell/OneDrive - Childress Agency/ChildressAgency/pestsolutionsva/wp-theme-files/images/hero-squirrel.jpg", "C:/Users/JohnCampbell/OneDrive - Childress Agency/ChildressAgency/pestsolutionsva/wp-theme-files/images/hero-superkid.jpg", "C:/Users/JohnCampbell/OneDrive - Childress Agency/ChildressAgency/pestsolutionsva/wp-theme-files/images/hero-ants.jpg"]' style="background-image:url(../wp-theme-files/images/hero-squirrel.jpg);">
    <div class="container">
      <div class="hero-caption">
        <div class="row">
          <div class="col-md-7 col-lg-8 d-flex align-items-center justify-content-end">
            <h1 class="hero-title" data-aos="fade-right" data-aos-easing="ease-out" data-aos-duration="1000">Safe and Effective<span>Pest Control</span></h1>
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="hero-contact-form" data-aos="fade-left" data-aos-easing="ease-out" data-aos-duration="1000" data-aos-delay="50">
              <header>
                <h3>Contact Us Now</h3>
                <p>Let's get your house pest free today.</p>
              </header>
              <div class="form-group">
                <label for="hero-your-name" class="sr-only">Name*</label>
                <input type="text" id="hero-your-name" class="form-control" placeholder="NAME*" />
              </div>
              <div class="form-group">
                <label for="hero-your-email" class="sr-only">Email*</label>
                <input type="email" id="hero-your-email" class="form-control" placeholder="EMAIL*" />
              </div>
              <div class="form-group">
                <label for="hero-phone" class="sr-only">Phone*</label>
                <input type="text" id="hero-phone" class="form-control" placeholder="PHONE*" />
              </div>
              <div class="form-group">
                <label for="hero-comment" class="sr-only">Comment</label>
                <textarea id="hero-comment" class="form-control" placeholder="COMMENT"></textarea>
              </div>
              <div class="form-group text-right">
                <input type="submit" class="btn-main" value="SEND" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <section id="hero" class="hero d-flex align-items-end" style="background-image:url(../wp-theme-files/images/ants-on-plate.jpg); background-position:center center;">
    <div class="container">
      <div class="hero-caption">
        <p class="hero-title" data-aos="fade-left">Solutions to your ant problem</p>
      </div>
    </div>
  </section>
  <div class="free-inspection-banner">
    <div class="container-fluid">
      <h2>Get a Free Inspection</h2>
      <p>Call your nearest location today</p>
      <ul class="free-inspection-locations">
        <li><a href="tel:540.288.8585">Stafford / Fredericksburg 540.288.8585</a></li>
        <li><a href="tel:804.448.1170">Caroline 804.448.1170</a></li>
        <li><a href="tel:804.550.9005">N. Richmond 804.550.9005</a></li>
      </ul>
    </div>
  </div>
<?php endif; ?>