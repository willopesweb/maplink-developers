<?php
get_header();

global $wp_query;

if (!isset($current_language)) {
  $current_language = get_locale();
}

$title = $wp_query->found_posts . ' resultados para "' . get_search_query();
$titleNoResults = 'Nenhum resultado encontrado para "' . get_search_query() . '"';;
$subtitleNoResults = "Tente refazer a pesquisa usando outros termos";

if ($current_language === 'en_US') {
  $title = $wp_query->found_posts . ' results for "' . get_search_query();
  $titleNoResults = 'No results found for "' . get_search_query() . '"';
  $subtitleNoResults = "Try refining your search using different terms";
} elseif ($current_language === 'es_ES') {
  $title = $wp_query->found_posts . ' resultados para "' . get_search_query();
  $titleNoResults = 'Ningún resultado encontrado para "' . get_search_query() . '"';
  $subtitleNoResults = "Intenta refinar tu búsqueda usando otros términos";
}

?>
<div class="l-page__grid">
  <?php
  categoriesMenu();
  ?>
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <?php
      if ($wp_query->found_posts == 0) {
        echo '<h1 class="l-page__title">' . $titleNoResults . '</h1>';
        echo '<p class=s"l-page__subtitle">' . $subtitleNoResults . '</p>';
      } else {
        echo '<h1 class="l-page__title">' . $title . '"</h1>';
      }
      ?>
    </header>
    <section class="l-page__archive">
      <h1 class="screen-readers-only">Posts</h1>
      <?php
      wp_reset_query();
      $paged = get_query_var('paged', 1);
      $s = get_search_query();

      $args = array(
        's' => $s,
        'post_type' => 'post',
        'posts_per_page' => '10',
        'paged' => $paged,
        'order' => 'DESC',
        'orderby' => 'post-date'
      );

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :

        while ($the_query->have_posts()) :
          $the_query->the_post();
          require 'template-parts/post-card.php';
        endwhile;
      ?>
        <div class="c-pagination">
          <?php
          theme_custom_pagination($the_query);
          ?>
        </div>
      <?php endif; ?>
    </section>
  </main>
</div>

<?php
get_footer();
