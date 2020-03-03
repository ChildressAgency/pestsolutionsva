<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-content">
      <article>
        <?php $page_title = get_field('page_title'); ?>
        <h1 class="page-title"><?php echo $page_title ? esc_html($page_title) : get_the_title(); ?></h1>
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();