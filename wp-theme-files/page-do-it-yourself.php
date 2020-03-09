<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <article>
      <?php get_template_part('partials/page_title'); ?>

      <ul id="diy-kits">
        <li>
          <div class="diy-kit">
            <div id="diy-ant" class="diy-icon"><span class="sr-only">Ant Kit</span></div>
            <h4>Ant Kit $<?php the_field('ant_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('ant_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-spider" class="diy-icon"><span class="sr-only">Spider Kit</span></div>
            <h4>Spider Kit $<?php the_field('spider_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('spider_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-roach" class="diy-icon"><span class="sr-only">Roach Kit</span></div>
            <h4>Roach Kit $<?php the_field('roach_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('roach_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-mouse" class="diy-icon"><span class="sr-only">Mouse Kit</span></div>
            <h4>Mouse Kit $<?php the_field('mouse_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('mouse_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-cricket" class="diy-icon"><span class="sr-only">Cricket Kit</span></div>
            <h4>Cricket Kit $<?php the_field('cricket_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('cricket_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-silverfish" class="diy-icon"><span class="sr-only">Silverfish Kit</span></div>
            <h4>Silverfish Kit $<?php the_field('silverfish_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('silverfish_kit_includes'); ?></p>
        </li>
        <li>
          <div class="diy-kit">
            <div id="diy-snake" class="diy-icon"><span class="sr-only">Snake Kit</span></div>
            <h4>Snake Kit $<?php the_field('snake_kit_price'); ?></h4>
          </div>
          <p class="kit-contents"><strong>Kit includes: </strong><?php the_field('snake_kit_includes'); ?></p>
        </li>
      </ul>

    <?php if(have_rows('view_more_table')): ?>
      <div id="diy-accordion" class="accordion">
        <div class="card">
          <div id="diy-view-more" class="card-header">
            <h4>
              <button class="opener collapsed" data-toggle="collapse" data-target="#diy-accordion-1" aria-expanded="false" aria-controls="diy-accordion-1"><?php echo esc_html__('View More', 'pestsolutions'); ?></button>
            </h4>
          </div>
          <div id="diy-accordion-1" class="collapse" aria-labelledby="diy-view-more" data-parent="#diy-accordion">
            <div class="card-body">
              <table class="table table-borderless table-sm">
                <tbody>
                  <?php while(have_rows('view_more_table')): the_row(); ?>
                    <tr>
                      <th scope="row"><strong><?php the_sub_field('product_name'); ?>: </strong><?php the_sub_field('product_description'); ?></th>
                      <td>$<?php the_sub_field('product_price'); ?></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
      <?php the_field('purchasing_message'); ?>
    </article>

  </div>
</main>
<?php get_footer();
