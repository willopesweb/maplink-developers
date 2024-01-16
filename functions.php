<?php
const ASSETS_DIR = 'assets/public';

function custom_archive_query($query)
{
  if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
    $query->set('posts_per_page', 1);
    $query->set('orderby', 'post_date');
    $query->set('order', 'DESC');
  }
}
add_action('pre_get_posts', 'custom_archive_query');


function theme_css()
{
  wp_register_style('theme-style', get_template_directory_uri() . '/' . ASSETS_DIR . '/css/main.css', [], '1.5.2', false);
  wp_register_style('theme-icons', get_template_directory_uri() . '/' . ASSETS_DIR . '/fonts/icons.css', [], '1.0.0', false);
  wp_enqueue_style('theme-style');
  wp_enqueue_style('theme-icons');
}
add_action('wp_enqueue_scripts', 'theme_css');


require "inc/custom-admin-login.php";
//require "inc/performance.php";
require "inc/custom-theme-functions.php";
require "inc/menu-categories.php";
