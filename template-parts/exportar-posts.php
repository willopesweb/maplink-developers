<?php
/*
Template Name: Exportar URLs por Categoria
*/

get_header();

// Se o usuário NÃO estiver logado, mostra a página 404
if (!is_user_logged_in()) {
  status_header(404);
  nocache_headers();
  include get_404_template();
  exit;
}

// Continua com a exportação
$categories = get_categories();
$result = [];

foreach ($categories as $category) {
  $args = [
    'category' => $category->term_id,
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'date',
    'order'   => 'ASC'
  ];

  $posts = get_posts($args);

  $urls = [];
  foreach ($posts as $post) {
    $urls[] = get_permalink($post);
  }

  $result[$category->slug] = $urls;
}
echo '<div class="l-page__content" style="padding-top:100px">';
echo '<pre>';
echo 'URLS_DOCS = ' . json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ';';
echo '</pre>';
echo '</div>';

get_footer();
