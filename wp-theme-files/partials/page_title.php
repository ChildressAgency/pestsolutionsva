<?php
$page_title = get_field('page_title');
if($page_title){
  echo '<h1 class="page-title">' . wp_kses_post($page_title) . '</h1>';
}