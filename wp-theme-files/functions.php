<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'pestsolutions_scripts');
function pestsolutions_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'pestsolutions-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('pestsolutions-scripts');
}

add_filter('script_loader_tag', 'pestsolutions_add_script_meta', 10, 2);
function pestsolutions_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'pestsolutions_styles');
function pestsolutions_styles(){
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Lato:400,700,900,900i&display=swap'
  );

  wp_register_style(
    'pestsolutions-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('pestsolutions-css');
}

add_action('after_setup_theme', 'pestsolutions_setup');
function pestsolutions_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');

  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
  
  register_nav_menus(array(
    'left-header-nav' => 'Left Header Navigation',
    'right-header-nav' => 'Right Header Navigation',
    'footer-services-nav' => 'Footer Services Navigation',
  ));

  load_theme_textdomain('pestsolutions', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function pestsolutions_left_header_fallback_menu(){ ?>
  <?php
    $services_page = get_page_by_path('services');
    $services_page_id = $services_page->ID;
  ?>

  <ul id="left-header-nav" class="navbar-nav align-items-center">
    <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url()); ?>" class="nav-link"><?php echo esc_html__('Home', 'pestsolutions'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('pest-management')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('pest-management')); ?>" class="nav-link"><?php echo esc_html__('Pest Management', 'pestsolutions'); ?></a>
    </li>
    <li class="nav-item dropdown<?php if(is_page('services') || $post->post_parent == $services_page_id){ echo ' active'; } ?>">
      <a href="#" class="nav-link dropdown-toggle text-nowrap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo esc_html__('Services', 'pestsolutions'); ?></a>
      <ul class="dropdown-menu">
        <li class="nav-item<?php if(is_page('termites')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('termites')); ?>" class="dropdown-item"><?php echo esc_html__('Termites', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('mosquitoes')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('mosquitoes')); ?>" class="dropdown-item"><?php echo esc_html__('Mosquitoes', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('special-services')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('special-services')); ?>" class="dropdown-item"><?php echo esc_html__('Special Services', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('ipm-services')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('ipm-services')); ?>" class="dropdown-item"><?php echo esc_html__('IPM Services', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item">
          <div class="dropdown-divider"></div>
        </li>
        <li class="nav-item<?php if(is_page('leaf-defier')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('leaf-defier')); ?>" class="dropdown-item"><?php echo esc_html__('Leaf Defier', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('crawlspace-encapsulation')){ echo ' active'; }; ?>">
          <a href="<?php echo esc_url(home_url('crawlspace-encapsulation')); ?>" class="dropdown-item"><?php echo esc_html__('Crawlspace Encapsulation', 'pestsolutions'); ?></a>
        </li>
      </ul>
    </li>
  </ul>
<?php }

function pestsolutions_right_header_fallback_menu(){ ?>
  <ul id="right-header-nav" class="navbar-nav align-items-center">
    <li class="nav-item<?php if(is_page('do-it-yourself')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('do-it-yourself')); ?>" class="nav-link"><?php echo esc_html__('Do-It-Yourself', 'pestsolutions'); ?></a>
    </li>
    <li class="nav-item dropdown<?php if(is_page_template('template/template-pests.php')){ echo ' active'; } ?>">
      <a href="#" class="nav-link dropdown-toggle text-nowrap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo esc_html__('Pests', 'pestsolutions'); ?></a>
      <ul class="dropdown-menu">
        <li class="nav-item<?php if(is_page('ants')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('ants')); ?>" class="dropdown-item"><?php echo esc_html__('ants', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('mosquitoes')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('mosquitoes')); ?>" class="dropdown-item"><?php echo esc_html__('mosquitoes', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('roaches')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('roaches')); ?>" class="dropdown-item"><?php echo esc_html__('roaches', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('rodents')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('rodents')); ?>" class="dropdown-item"><?php echo esc_html__('rodents', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('spiders')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('spiders')); ?>" class="dropdown-item"><?php echo esc_html__('spiders', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('stingers')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('stingers')); ?>" class="dropdown-item"><?php echo esc_html__('stingers', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('termites')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('termites')); ?>" class="dropdown-item"><?php echo esc_html__('termites', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('ticks')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('ticks')); ?>" class="dropdown-item"><?php echo esc_html__('ticks', 'pestsolutions'); ?></a>
        </li>
      </ul>
    </li>
    <li class="nav-item dropdown<?php if(is_page('areas-served')){ echo ' active'; } ?>">
      <a href="#" class="nav-link dropdown-toggle text-nowrap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo esc_html__('Areas Served', 'pestsolutions'); ?></a>
      <ul class="dropdown-menu">
        <li class="nav-item<?php if(is_page('full-service-pest-control-midlothian-va')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('full-service-pest-control-midlothian-va')); ?>" class="dropdown-item"><?php echo esc_html__('Midlothian VA', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('pest-control-company-southside-richmond-va')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('pest-control-company-southside-richmond-va')); ?>" class="dropdown-item"><?php echo esc_html__('Southside Richmond VA', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('pest-control-midtown-richmond-va')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('pest-control-midtown-richmond-va')); ?>" class="dropdown-item"><?php echo esc_html__('Midtown Richmond VA', 'pestsolutions'); ?></a>
        </li>
        <li class="nav-item<?php if(is_page('pest-control-east-end-richmond-va')){ echo ' active'; } ?>">
          <a href="<?php echo esc_url(home_url('pest-control-east-end-richmond-va')); ?>" class="dropdown-item"><?php echo esc_html__('East End Richmond VA', 'pestsolutions'); ?></a>
        </li>
      </ul>
    </li>
    <li class="nav-item<?php if(is_page('contact-us')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('contact-us')); ?>" class="nav-link"><?php echo esc_html__('Contact Us', 'pestsolutions'); ?></a>
    </li>
  </ul>
<?php }

function pestsolutions_footer_services_fallback_menu(){ ?>
  <ul class="footer-services">
    <li><a href="<?php echo esc_url(home_url('services')); ?>"><?php echo esc_html__('Services', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('pest-management')); ?>"><?php echo esc_html__('Pest Management', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('special-services')); ?>"><?php echo esc_html__('Special Services', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('ipm-services')); ?>"><?php echo esc_html__('IPM Services', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('termites')); ?>"><?php echo esc_html__('Termites', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('mosquitoes')); ?>"><?php echo esc_html__('Mosquitoes', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('leaf-defier')); ?>"><?php echo esc_html__('Leaf Defier', 'pestsolutions'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('crawlspace-encapsulation'));?>"><?php echo esc_html__('Crawlspace Encapsulation', 'pestsolutions'); ?></a></li>
  </ul>
<?php }

add_filter('block_categories', 'pestsolutions_custom_block_category', 10, 2);
function pestsolutions_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => esc_html__('Custom Blocks', 'pestsolutions'),
        'icon' => 'wordpress'
      )
    )
  );
}

add_action('acf/init', 'pestsolutions_register_blocks');
function pestsolutions_register_blocks(){
  if(function_exists('acf_register_block_type')){
    acf_register_block_type(array(
      'name' => 'prestyled_button',
      'title' => esc_html__('Pre-Styled Button', 'pestsolutions'),
      'description' => esc_html__('Add a pre-styled button', 'pestsolutions'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/prestyled_button.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/prestyled_button.css'
    ));

    acf_register_block_type(array(
      'name' => 'accordion',
      'title' => esc_html__('Accordion', 'pestsolutions'),
      'description' => esc_html__('Add an accordion section', 'pestsolutions'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/accordion.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/accordion.css'
    ));

    acf_register_block_type(array(
      'name' => 'callout_section',
      'title' => esc_html__('Callout Section', 'pestsolutions'),
      'description' => esc_html__('Callout Section with grey background', 'pestsolutions'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/callout_section.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/callout_section.css'
    ));

    acf_register_block_type(array(
      'name' => 'document_download',
      'title' => esc_html__('Document download', 'pestsolutions'),
      'description' => esc_html__('A document download block', 'pestsolutions'),
      'category' => 'custom-blocks',
      'mode' => 'auto', 
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/document_download.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/document_download.css'
    ));

    acf_register_block_type(array(
      'name' => 'image_title_description',
      'title' => esc_html__('Image with Title and Description', 'pestsolutions'),
      'description' => esc_html__('Display and image block with a title and description', 'pestsolutions'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'algin' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/image_title_description.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/image_title_description.css'
    ));
  }
}