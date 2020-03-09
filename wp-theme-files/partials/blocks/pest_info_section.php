<section id="midlo-species">
  <?php
    $pests_to_show = get_field('pests_to_show');
    if($pests_to_show): ?>
      <ul id="species-tabs" class="nav nav-pills d-flex justify-content-center services-tabs" role="tablist">
        <?php $i = 0; foreach($pests_to_show as $pest): ?>
          <li class="nav-item">
            <a href="#<?php echo $pest['value']; ?>" id="<?php echo $pest['value']; ?>-tab" class="nav-link<?php if($i == 0){ echo ' active'; } ?>" data-toggle="pill" role="tab" aria-controls="<?php echo $pest['value']; ?>" aria-selected="<?php echo $i == 0 ? 'true' : 'false'; ?>" title="<?php echo $pest['label']; ?>"></a>
          </li>
        <?php $i++; endforeach; reset($pests_to_show) ?>
      </ul>

      <div id="species-content" class="tab-content services-content">
        <?php $i = 0; foreach($pests_to_show as $pest): ?>
          <div id="<?php echo $pest['value']; ?>" class="tab-pane fade<?php if($i == 0){ echo ' show active'; } ?>" role="tabpanel" aria-labelledby="<?php echo $pest['value']; ?>-tab">
            <div class="card">
              <div id="<?php echo $pest['value']; ?>-img" class="card-img"></div>
              <div class="card-body">
                <h3><?php echo $pest['label']; ?></h3>
                <?php $pest_info = get_field($pest['value'] . '_info'); ?>
                <?php echo apply_filters('the_content', wp_kses_post($pest_info)); ?>
              </div>
            </div>
          </div>
        <?php $i++; endforeach; ?>
      </div>
  <?php endif; ?>
</section>