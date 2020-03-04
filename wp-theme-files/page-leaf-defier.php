<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
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

    <section id="proven-lightweight">
      <div class="row">
        <div class="col-md-6">
          <div id="proven-card" class="icon-card" data-aos="fade-up">
            <h3><?php the_field('card_1_title'); ?></h3>
            <?php the_field('card_1_description'); ?>
          </div> 
        </div> 
        <div class="col-md-6">
          <div id="lightweight-card" class="icon-card" data-aos="fade-up">
            <h3><?php the_field('card_2_title'); ?></h3>
            <?php the_field('card_2_description'); ?>
          </div> 
        </div> 
      </div> 
    </section> 
    
    <section id="video">
      <?php the_field('video_section_content'); ?>
    </section>
  </div>
</main>
<?php get_footer();
