<?php
const ASSETS_DIR = 'assets/public';


function theme_css()
{
  wp_register_style('theme-style', get_template_directory_uri() . '/' . ASSETS_DIR . '/css/main.css', [], '1.5.0', false);
  wp_register_style('theme-icons', get_template_directory_uri() . '/' . ASSETS_DIR . '/fonts/icons1.css', [], '1.0.0', false);
  wp_enqueue_style('theme-style');
  wp_enqueue_style('theme-icons');
}
add_action('wp_enqueue_scripts', 'theme_css');


require "inc/custom-admin-login.php";
//require "inc/performance.php";
require "inc/custom-theme-functions.php";
