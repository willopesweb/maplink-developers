<?php
// Template Name: Home
get_header();

if (!isset($page_home_id)) :
  $page_home_id = get_option('page_on_front');
endif;

if (!isset($image_dir)) :
  $image_dir = get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img';
endif;
?>

<main class="l-home__about">
  <header class="l-home__header">
    <h1 class="l-home__title"><?= get_field("titulo", $page_home_id) ?></h1>
    <p class="l-home__subtitle"><?= get_field("subtitulo", $page_home_id) ?></p>
  </header>
  <div class="l-home__video">
    <video autoplay="" muted="" playsinline="" loop="">
      <source src="<?= get_field("video", $page_home_id) ?>">
      Your browser does not support the video tag.
    </video>
  </div>
</main>

<section class="l-home__apis">
  <h1 class="screen-readers-only">Nossas APIs</h1>
  <?php
  $categories = list_categories();
  foreach ($categories as $categoria_completa) {
  ?>
    <article class="l-home__api">
      <header class="l-home__api-header">
        <?php if (isset($categoria_completa['icone'])) { ?>
          <img src="<?= $categoria_completa['icone'] ?>" alt="<?= $categoria_completa['nome'] ?>" title="<?= $categoria_completa['nome'] ?>" class="l-home__api-icon" loading="lazy" width="60" height="60">
        <?php } ?>
        <h1 class="l-home__api-title"><?= $categoria_completa['nome'] ?></h1>
      </header>
      <p class="l-home__api-description"><?= $categoria_completa['descricao'] ?></p>
      <a class="l-home__api-link" href="<?= $categoria_completa['link'] ?>" title="Acessar a documentação da <?= $categoria_completa['nome'] ?>">
        Acessar documentação
      </a>
    </article>
  <?php
  }
  ?>
</section>
<?php
get_footer();
