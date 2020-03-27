<?php get_header(); ?>
<main id="main">
  <section class="main-content">
    <div class="container">
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
    </div>
  </section>

  <section class="gradient-img-text" style="background-image:url(<?php the_field('background_image_with_gradient'); ?>); background-position:right center;">
    <div class="container">
      <div class="col-md-6 offset-md-6">
        <div class="gradient-img-text-content" data-aos="fade-left">
          <h2><?php the_field('gradient_background_section_title'); ?></h2>
          <?php if(have_rows('gradient_bg_section_content_blocks')): while(have_rows('gradient_bg_section_content_blocks')): the_row(); ?>

            <p><strong><?php the_sub_field('content_block_title'); ?>: </strong><?php the_sub_field('content_block_content'); ?> <a href="#termite-modal" class="read-more-modal" data-toggle="modal" data-target="#termite-modal" data-termite_modal_title="<?php echo esc_attr(get_sub_field('content_block_read_more_title')); ?>" data-termite_modal_content="<?php echo apply_filters('the_content', wp_kses_post(get_sub_field('content_block_read_more_content'))); ?>">Read more</a></p>

          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="borate-treatment">
    <div class="container">
      <article>
        <?php the_field('construction_pre_treatment_content'); ?>

        <div class="row">
          <div class="col-lg-6">
            <div class="borate-features">
              <?php the_field('borate_treatment_features'); ?>
            </div>
            <div class="borate-downloads">
              <?php
                $doc_1 = get_field('borate_document_1');
                $doc_1_img = get_field('borate_document_1_image');
                $doc_1_caption = get_field('borate_document_1_caption');
              
                if($doc_1): ?>
                  <div class="borate-download">
                    <a href="<?php echo esc_url($doc_1['url']); ?>"><img src="<?php echo esc_url($doc_1_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($doc_1_img['alt']); ?>" /></a>
                    <?php echo wp_kses_post($doc_1_caption); ?>
                  </div>
              <?php endif; ?>

              <?php
                $doc_2 = get_field('borate_document_2');
                $doc_2_img = get_field('borate_document_2_image');
                $doc_2_caption = get_field('borate_document_2_caption');
            
                if($doc_2): ?>
                  <div class="borate-download">
                    <a href="<?php echo esc_url($doc_2['url']); ?>"><img src="<?php echo esc_url($doc_2_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($doc_2_img['alt']); ?>" /></a>
                    <?php echo wp_kses_post($doc_2_caption); ?>
                  </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="video embed-responsive embed-responsive-16by9">
              <iframe src="https://www.youtube.com/embed/722S4Dz7fpE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item"></iframe>			
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>

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

</main>
  <div id="termite-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="termite-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="termite-modal-title" class="modal-title"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="termite-modal-content" class="modal-body">
          
        </div>
      </div>
    </div>
  </div>

<?php get_footer();
