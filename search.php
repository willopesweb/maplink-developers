<?php
get_header();

global $wp_query;

if (!isset($current_language)) {
  $current_language = get_locale();
}

$query_term = esc_html(get_search_query());
$title = $wp_query->found_posts . ' resultados para &ldquo;' . $query_term . '&rdquo;';
$titleNoResults = 'Nenhum resultado encontrado para &ldquo;' . $query_term . '&rdquo;';
$subtitleNoResults = "Tente refazer a pesquisa usando outros termos";

if ($current_language === 'en_US') {
  $title = $wp_query->found_posts . ' results for &ldquo;' . $query_term . '&rdquo;';
  $titleNoResults = 'No results found for &ldquo;' . $query_term . '&rdquo;';
  $subtitleNoResults = "Try refining your search using different terms";
} elseif ($current_language === 'es_ES') {
  $title = $wp_query->found_posts . ' resultados para &ldquo;' . $query_term . '&rdquo;';
  $titleNoResults = 'Ningún resultado encontrado para &ldquo;' . $query_term . '&rdquo;';
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
        echo '<p class="l-page__subtitle">' . $subtitleNoResults . '</p>';
      } else {
        echo '<h1 class="l-page__title">' . $title . '</h1>';
      }
      ?>
    </header>
    <section class="l-page__archive">
      <h1 class="screen-readers-only">Posts</h1>
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          get_template_part('template-parts/post', 'card');
        endwhile;
      ?>
        <div class="c-pagination">
          <?php
          theme_custom_pagination();
          ?>
        </div>
      <?php endif; ?>
    </section>
  </main>
</div>

<?php
get_footer();
?>