<?php $block_image = get_field('block_image'); ?>

<div class="img-title-desc">
  <h4><?php echo esc_html($block_image['title']); ?></h4>
  <img src="<?php echo esc_url($block_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($block_image['alt']); ?>" />
  <p><?php echo esc_html($block_image['caption']); ?></p>
</div>