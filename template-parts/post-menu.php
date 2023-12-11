<?php

$categories = list_categories();
$activeCategory = (!is_search() && get_the_category()) ? get_the_category()[0]->cat_ID : 0;
$activePost = (is_single() ? get_the_ID() : 0);

if (!empty($categories)) {
  echo '<nav class="l-menu">';
  echo '<ul>';

  foreach ($categories as $categoria_completa) {
    $categoryId = $categoria_completa['id'];
    $categoryName = esc_html($categoria_completa['nome']);
    $categoryIcon = isset($categoria_completa['icone']) ? esc_url($categoria_completa['icone']) : '';

    echo '<li class="js-submenu-item">';
    echo '<span class="l-menu__category js-submenu-link ' . ($activeCategory === $categoryId ? "is-active" : "") . '" title="' . $categoryName . '">';

    if ($categoryIcon) {
      echo '<span class="l-menu__icon">';
      echo '<img src="' . $categoryIcon . '" alt="' . $categoryName . '" title="' . $categoryName . '" class="l-home__api-icon" loading="lazy" width="30" height="30">';
      echo '</span>';
    }

    echo '<p>' . $categoryName . '</p>';
    echo '</span>';

    echo '<ul class="l-menu__submenu js-submenu ' . ($activeCategory === $categoryId ? "is-submenu-open" : "") . '">';

    $posts = get_posts_by_category($categoryId);
    foreach ($posts as $post) {
      $postId = $post['id'];
      $postLink = esc_url($post['link']);
      $postTitle = esc_html($post['title']);

      echo '<li><a class="' . ($activePost === $postId ? 'is-active' : '') . '" href="' . $postLink . '" title="' . $postTitle . '">' . $postTitle . '</a></li>';
    }

    echo '</ul>';
    echo '</li>';
  }

  echo '</ul>';
  echo '</nav>';
}
