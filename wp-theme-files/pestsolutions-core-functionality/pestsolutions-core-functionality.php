<?php
/**
 * Plugin Name: Pest Solutions Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated.</strong>
 * Author: Childress Agency
 * Author URI: https://childressagency.com
 * Version: 1.0
 * Text Domain: pestsolutions
 */
if(!defined('ABSPATH')){ exit; }

define('PESTSOLUTIONS_PLUGIN_DIR', dirname(__FILE__));
define('PESTSOLUTIONS_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * LOad ACF if not already loaded
 */
if(!class_exists('acf')){
  require_once PESTSOLUTIONS_PLUGIN_DIR . '/vendors/advanced-custom-fields-pro/acf.php';
  add_filter('acf/settings/path', 'pestsolutions_acf_settings_path');
  add_filter('acf/settings/dir', 'pestsolutions_acf_settings_dir');
}

function pestsolutions_acf_settings_path($path){
  $path = plugin_dir_path(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $path;
}

function pestsolutions_acf_settings_dir($dir){
  $dir = plugin_dir_url(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $dir;
}

add_action('plugins_loaded', 'pestsolutions_load_textdomain');
function pestsolutions_load_textdomain(){
  load_plugin_textdomain('pestsolutions', false, basename(PESTSOLUTIONS_PLUGIN_DIR) . '/languages');
}

add_action('acf/init', 'pestsolutions_acf_options_page');
function pestsolutions_acf_options_page(){
  acf_add_options_page(array(
    'page_title' => esc_html__('General Settings', 'pestsolutions'),
    'menu_title' => esc_html__('General Settings', 'pestsolutions'),
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}