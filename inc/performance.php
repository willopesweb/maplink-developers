<?php

function theme_remove_unnecessary_css_js()
{
  // wp_dequeue_style('wp-block-library'); // Remove o CSS WP Block, usado para estilizar os blocos do Gutenberg
  wp_deregister_script('wp-embed'); // Remove o JS para embedar Vídeos no Wordpress
  wp_dequeue_style('classic-theme-styles');
  wp_dequeue_script('jquery'); // Remove o jQuery

  global $wp_scripts, $wp_styles;

  $scripts_to_keep = array(
    'my-custom-script',
  );

  $styles_to_keep = array(
    'theme-style',
    'theme-icons'
  );

  foreach ($wp_scripts->queue as $script) {
    if (!in_array($script, $scripts_to_keep)) {
      wp_dequeue_script($script);
      wp_deregister_script($script);
    }
  }

  foreach ($wp_styles->queue as $style) {
    if (!in_array($style, $styles_to_keep)) {
      wp_dequeue_style($style);
      wp_deregister_style($style);
    }
  }
}

add_action('wp_enqueue_scripts', 'theme_remove_unnecessary_css_js', 999);
