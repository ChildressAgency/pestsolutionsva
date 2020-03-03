<?php $page_title = get_field('page_title'); ?>
<h1 class="page-title"><?php echo $page_title ? esc_html($page_title) : get_the_title(); ?></h1>