<?php
/**
 * Template Name: Pests Template
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<main id="main">
  <div class="container">
    <?php get_template_part('partials/page_title'); ?>
    <?php if(have_posts() && $post->post_content !== ''): ?>
      <section class="main-content">
        <article>
          <?php
            while(have_posts()){
              the_post();
              the_content();
            }
          ?>
        </article>
      </section>
    <?php endif; ?>
  </div>

<?php
  if(have_rows('section_layout')){
    while(have_rows('section_layout')){
      the_row();

      $layout_style = get_row_layout();

      switch($layout_style){
        case 'gradient_background_with_text': ?>

          <section class="gradient-img-text" style="background-image:url(<?php the_sub_field('background_image_with_gradient'); ?>);">
            <div class="container">
              <div class="col-md-6 offset-md-6">
                <div class="gradient-img-text-content" data-aos="fade-left">
                  <?php the_sub_field('gradient_image_section_content'); ?>
                </div>
              </div>
            </div>
          </section>

        <?php break;

        case 'species_info_section': ?>

          <section id="species-info">
            <div class="container-fluid">
              <?php if(have_rows('species_info')): ?>
                <ul id="species-info-tabs" class="nav nav-pills d-flex justify-content-center species-info-tabs">
                  <?php $s = 0; while(have_rows('species_info')): the_row(); ?>
                    <li class="nav-item">
                      <?php
                        $species_name = get_sub_field('species_name');
                        $species_slug = sanitize_title($species_name);
                      ?>
                      <a href="#<?php echo $species_slug; ?>" id="<?php echo $species_slug; ?>-tab" class="nav-link<?php if($s == 0){ echo ' active'; } ?>" data-toggle="pill" role="tab" aria-controls="<?php echo $species_slug; ?>" aria-selected="<?php echo ($s == 0) ? 'true' : 'false'; ?>" title="<?php echo esc_attr($species_name); ?>"><?php echo esc_html($species_name); ?></a>
                    </li>
                  <?php $s++; endwhile; ?>
                </ul>

                <div id="species-info-content" class="tab-content">
                  <?php $c = 0; while(have_rows('species_info')): the_row(); ?>
                    <?php
                      $species_name = get_sub_field('species_name');
                      $species_slug = sanitize_title($species_name);
                    ?>
                    <div id="<?php echo $species_slug; ?>" class="tab-pane fade<?php if($c == 0){ echo ' show active'; } ?>" role="tabpanel" aria-labelledby="<?php echo $species_slug; ?>-tab">
                      <div class="card">
                        <div class="card-body">
                          <h2><?php echo esc_html($species_name); ?></h2>
                          <table class="table table-responsive table-borderless">
                            <tbody>
                              <tr>
                                <th scope="row">Color</th>
                                <td><?php the_sub_field('species_color'); ?></td>
                                <th scope="row">Legs</th>
                                <td><?php the_sub_field('species_legs'); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Shape</th>
                                <td><?php the_sub_field('species_shape'); ?></td>
                                <th scope="row">Size</th>
                                <td><?php the_sub_field('species_size'); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Antennae</th>
                                <td><?php the_sub_field('species_antennae'); ?></td>
                                <th scope="row">Flying</th>
                                <td><?php the_sub_field('species_flying'); ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Region</th>
                                <td colspan="3"><?php the_sub_field('species_region'); ?></td>
                              </tr>
                            </tbody>
                          </table>
                          <?php the_sub_field('species_other_information'); ?>
                        </div>
                      </div>
                    </div>
                  <?php $c++; endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </section>

        <?php break;

        case 'image_content_with_background': ?>

          <section class="section-with-bg" style="background-image:url(<?php the_sub_field('image_content_section_background_image'); ?>); <?php the_sub_field('image_content_section_background_image_css'); ?>">
            <div class="container">
              <div class="section-with-bg-content">
                <div class="row">
                  <div class="col-md-4">
                    <?php $section_image = get_sub_field('image_content_section_image'); ?>
                    <img src="<?php echo esc_url($section_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($section_image['alt']); ?>" />
                  </div>
                  <div class="col-md-8">
                    <?php the_sub_field('image_content_section_content'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="white-overlay"></div>
          </section>

        <?php break;

        default: // regular content section ?>

          <div class="container">
            <section class="main-content">
              <article>
                <?php the_sub_field('regular_content'); ?>
              </article>
            </section>
          </div>

        <?php
      }
    }
  }
?>

</main>
<?php get_footer();