<?php
  $document = get_field('document');
  $doc_image = get_field('document_placeholder_image');
  $doc_caption = get_field('document_caption');
?>

<div class="document-download">
  <a href="<?php echo esc_url($document['url']); ?>" title="<?php echo esc_attr($document['title']); ?>">
    <img src="<?php echo esc_url($doc_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($doc_image['alt']); ?>" />
  </a>
  <?php echo wp_kses_post($doc_caption); ?>
</div>