<?php
if (!isset($image_dir)) :
  $image_dir = get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img';
endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
  <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="skip"><a href="#content">Pular para o Conteúdo</a></div>

  <header id="header" class="l-header" role="banner">
    <div class="l-header__content">
      <h1 class="screen-readers-only"><?php wp_title('|'); ?></h1>

      <a class="l-header__logo" href="<?= get_site_url() ?>">
        <img src="<?= get_stylesheet_directory_uri() . '/' . ASSETS_DIR ?>/img/logo.svg" alt="<?php wp_title('|'); ?>">
      </a>

      <nav id="nav" class="c-nav js-mobile-menu" role="navigation">
        <h1 class="screen-readers-only">Menu Principal</h1>
        <ul>
          <li class="c-nav__link js-link-scroll"><a href="#">Documentação</a></li>
          <li class="c-nav__link js-link-scroll"><a href="#">Suporte</a></li>
        </ul>
      </nav>

      <div class="l-header__buttons">
        <span class="icon-menu js-mobile-btn mobile-icon"></span>
      </div>
    </div>
  </header>