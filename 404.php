<?php
get_header();

if (!isset($current_language)) {
  $current_language = get_locale();
}

$title_404 = "Página não encontrada";
$subtitle_404 = "Desculpe, mas a página que você procura não existe";
$home_label = "Voltar à página inicial";
$search_label = "Ou pesquise por um conteúdo:";

if ($current_language === 'en_US') {
  $title_404 = "Page not found";
  $subtitle_404 = "Sorry, but the page you are looking for does not exist";
  $home_label = "Back to home";
  $search_label = "Or search for content:";
} elseif ($current_language === 'es_ES') {
  $title_404 = "Página no encontrada";
  $subtitle_404 = "Lo sentimos, pero la página que estás buscando no existe";
  $home_label = "Volver al inicio";
  $search_label = "O busca un contenido:";
}
?>

<div class="l-page__grid">
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <h1 class="l-page__title"><?= esc_html($title_404) ?></h1>
      <p class="l-page__subtitle"><?= esc_html($subtitle_404) ?></p>
      <a class="c-button" href="<?= esc_url(home_url('/')) ?>" style="margin-top:1.5rem">
        <?= esc_html($home_label) ?>
      </a>
    </header>
    <section class="l-single__content" style="padding-top:2rem">
      <p><?= esc_html($search_label) ?></p>
      <?= renderSearchForm() ?>
    </section>
  </main>
  <?php categoriesMenu(); ?>
</div>

<?php get_footer(); ?>
