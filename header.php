<?php
if (!isset($page_home_id)) :
  $page_home_id = get_option('page_on_front');
endif;

if (!isset($image_dir)) :
  $image_dir = get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img';
endif;

if (!isset($current_language)) {
  $current_language = get_locale();
}

$skip = "Pular para o conteúdo";
$home_link = ["Institucional", "Página Institucional da Maplink Cloud"];
$support_link = ["Suporte", "Tire suas dúvidas ou fale conosco"];
$collection_link = ["Collection", "Confira a collection com exemplos para testar"];
$status_link = ["Status", "Confira o status de nossos serviços"];


if ($current_language === 'en_US') {
  $skip = "Skip for the content";
  $home_link = ["Institutional", "Maplink Cloud Institutional Page"];
  $support_link = ["Support", "Contact us about any problem or question"];
  $collection_link = ["Collection", "Check out our collection with examples to test"];
  $status_link = ["Status", "Check the status of our services"];
} elseif ($current_language === 'es_ES') {
  $skip = "Saltar al contenido";
  $home_link = ["Institucional", "Página institucional de Maplink Cloud"];
  $support_link = ["Soporte", "Contáctanos para cualquier problema o pregunta."];
  $collection_link = ["Collection", "Consulte la colleciton con ejemplos para probar."];
  $status_link = ["Status", "Confira el estado de nuestros servicios"];
}

$search_query = get_search_query();
if (isset($search_query) && !empty($search_query)) {
  $title = 'Pesquisa por: "' . esc_html(get_search_query()) . '"';
} else if (is_archive()) {
  $title = get_the_category()[0]->name;
} else {
  $title = get_the_title();
}

$lang_bcp47 = 'pt-BR';
if ($current_language === 'en_US') $lang_bcp47 = 'en';
elseif ($current_language === 'es_ES') $lang_bcp47 = 'es';

?>
<!DOCTYPE html>
<html lang="<?= esc_attr($lang_bcp47) ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title><?= $title ?> | <?php bloginfo('name'); ?></title>
  <meta property="og:title" content="<?= $title ?> | <?php bloginfo('name'); ?>" />
  <meta property="og:description" content="<?= bloginfo('description'); ?>" />
  <meta property="og:image" content="<?= $image_dir ?>/thumb.png" />
  <meta property="og:url" content="<?= get_permalink(); ?>" />
  <meta property="og:type" content="website" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="bg-lights" aria-hidden="true">
    <span class="bg-lights__orb bg-lights__orb--1"></span>
    <span class="bg-lights__orb bg-lights__orb--2"></span>
    <span class="bg-lights__orb bg-lights__orb--3"></span>
  </div>
  <div id="skip"><a href="#content"><?= $skip ?></a></div>
  <?php
  if (function_exists('icl_get_languages')) {
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if (!empty($languages)) {
      echo '<div class="l-header__languages-mobile">';
      echo '<div class="l-page__content">';
      echo '<ul id="language-selector">';
      foreach ($languages as $language) {
        echo '<li>';
        echo '<a title="' . $language['native_name'] . '" href="' . esc_url($language['url']) . '">';
        echo esc_html($language['native_name']);
        echo '</a>';
        echo '</li>';
      }
      echo '</ul>';
      echo '</div>';
      echo '</div>';
    }
  }
  ?>
  <header id="header" class="l-header" role="banner">
    <div class="l-header__content">
      <a class="l-header__logo" href="<?= home_url() ?>" aria-label="Maplink Developers — página inicial">
        <img src="<?= get_stylesheet_directory_uri() . '/' . ASSETS_DIR ?>/img/logo.webp" alt="Maplink Developers" fetchpriority="high" width="160" height="40">
      </a>

      <div class="l-header__search" id="search">
        <?= renderSearchForm() ?>
      </div>

      <nav id="nav" class="c-nav js-mobile-menu" role="navigation" aria-label="Menu principal">
        <ul>
          <li class="c-nav__link" title="<?= $home_link[0] ?>">
            <a target="_blank" href="https://maplink.global/" title="<?= $home_link[1] ?>">
              <?= $home_link[0] ?></a>
          </li>
          <li class="c-nav__categories-wrapper">
            <?php categoriesMenu(false); ?>
          </li>
          <li class="c-nav__link" title="<?= $support_link[1] ?>">
            <a target="_blank" rel="nofollow" href="<?= get_field("link_suporte", $page_home_id) ?>" title="<?= $support_link[1] ?>">
              <?= $support_link[0] ?>
            </a>
          </li>
          <li class="c-nav__link " title="<?= $support_link[1] ?>">
            <a target="_blank" rel="nofollow" class="icon-github" href="<?= get_field("link_collection", $page_home_id) ?>" title="<?= $collection_link[1] ?>">
              <?= $collection_link[0] ?>
            </a>
          </li>
          <li class="c-nav__link " title="<?= $status_link[1] ?>">
            <a target="_blank" rel="nofollow" href="<?= get_field("link_status", $page_home_id) ?>" title="<?= $status_link[1] ?>">
              <?= $status_link[0] ?>
            </a>
          </li>
        </ul>
      </nav>

      <div class="l-header__buttons">
        <?php
        if (function_exists('icl_get_languages')) {
          $languages = icl_get_languages('skip_missing=0&orderby=code');
          if (count($languages) > 1) {
            echo '<div class="l-header__languages">';
            echo '<select onchange="location = this.value;" name="language" aria-label="' . esc_attr__('Selecionar idioma', 'maplink-developers') . '">';
            foreach ($languages as $language) {
              echo '<option value="' . esc_url($language['url']) . '" ';
              echo selected($language['active'], 1, false);
              echo '>';
              echo esc_html($language['native_name']);
              echo '</option>';
            }
            echo '</select>';
            echo '</div>';
          }
        }

        $support_url = get_field("link_suporte", $page_home_id);
        if ($support_url) :
          $cta_label = $current_language === 'en_US' ? 'Contact us' : ($current_language === 'es_ES' ? 'Contáctenos' : 'Fale conosco');
        ?>
          <a class="c-button c-button--primary l-header__cta" href="<?= esc_url($support_url) ?>" target="_blank" rel="nofollow noopener">
            <?= esc_html($cta_label) ?>
          </a>
        <?php endif; ?>

        <button type="button" class="icon-search js-search-button l-header__search-icon" aria-label="<?= $current_language === 'en_US' ? 'Open search' : ($current_language === 'es_ES' ? 'Abrir búsqueda' : 'Abrir busca') ?>" aria-expanded="false" aria-controls="searchMobile"></button>
        <button type="button" class="icon-menu js-mobile-btn mobile-icon" aria-label="<?= $current_language === 'en_US' ? 'Open menu' : ($current_language === 'es_ES' ? 'Abrir menú' : 'Abrir menu') ?>" aria-expanded="false" aria-controls="nav"></button>
      </div>
    </div>
    <div class="l-header__search-mobile" id="searchMobile" aria-hidden="true">
      <div class="l-page__content">
        <?= renderSearchForm() ?>
      </div>
    </div>
  </header>

  <button id="js-back-to-top" class="c-backtotop" aria-label="Voltar ao topo"><span>↑</span></button>

  <?php
  if (shortcode_exists('aion-chat')) {
    echo do_shortcode('[aion-chat]');
  }
  ?>