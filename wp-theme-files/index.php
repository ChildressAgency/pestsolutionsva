<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-content">
      <article>
        <?php $page_title = get_field('page_title'); ?>
        <h1 class="page-title"><?php echo $page_title ? esc_html($page_title) : get_the_title(); ?></h1>
        <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            
            if(is_singular()){
              get_template_part('partials/page_title');
              the_content();
            }
            else{
              echo '<div class="loop-item mb-5">';
                echo '<h3>' . esc_html(get_the_title()) . '</h3>';
                the_excerpt();
                echo '<a href="' . esc_url(get_permalink()) . '" class="read-more">Read more</a>';
              echo '</div>';
            }
          }
        }
        ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();