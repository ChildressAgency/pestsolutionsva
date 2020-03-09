<?php $link = get_field('prestyled_button_link'); ?>

<a href="<?php echo esc_url($link['url']); ?>" class="btn-main" target="<?php echo $link['target'] ? esc_attr($link['target']) : '_self'; ?>"><?php echo esc_html($link['title']); ?></a>