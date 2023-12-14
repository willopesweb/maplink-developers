<?php
get_header();

if (!isset($current_language)) {
  $current_language = get_locale();
}

$title_404 = "Página não encontrada";;
$subtitle_404 = "Desculpe, mas a página que você procura não existe";

if ($current_language === 'en_US') {
  $title_404 = "Page not found";;
  $subtitle_404 = "Sorry, but the page you are looking for does not exist";
} elseif ($current_language === 'es_ES') {
  $title_404 = "Página no encontrada";;
  $subtitle_404 = "Lo sentimos, pero la página que estás buscando no existe";
}
?>

<div class="l-page__grid">
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <h1 class="l-page__title"><?= $title_404 ?></h1>
      <p class="l-page__subtitle"><?= $subtitle_404 ?></p>
    </header>
  </main>
  <?php
  categoriesMenu();
  ?>
</div>

<?php
get_footer();
