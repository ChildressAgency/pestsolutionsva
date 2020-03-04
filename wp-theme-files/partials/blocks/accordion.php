<?php if(have_rows('accordion')): ?>
<div id="block-accordion" class="accordion">
  <?php $i = 0; while(have_rows('accordion')): the_row(); ?>
    <div class="card">
      <div id="accordion-title-<?php echo $i; ?>" class="card-header">
        <h4>
          <button class="open collapsed" data-toggle="collapse" data-target="#accordion-content-<?php echo $i; ?>" aria-expanded="false" aria-controls="accordion-content-<?php echo $i; ?>"><?php the_sub_field('accordion_title'); ?></button>
        </h4>
      </div>
      <div id="accordion-content-<?php echo $i; ?>" class="collapse" aria-labelledby="accordion-title-<?php echo $i; ?>" data-parent="#block-accordion">
        <div class="card-body">
          <div class="accordion-panel">
            <?php the_sub_field('accordion_title'); ?>
            <div class="accordion-panel-body">
              <?php the_sub_field('accordion_content'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $i++; endwhile; ?>
</div>
<?php endif; ?>