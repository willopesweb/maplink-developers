<?php
// Template Name: Home
get_header();

if (!isset($page_home_id)) :
  $page_home_id = get_option('page_on_front');
endif;

if (!isset($image_dir)) :
  $image_dir = get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img';
endif;

if (!isset($current_language)) {
  $current_language = get_locale();
}
?>

<main class="l-home__main" id="content">
  <header class="l-home__header">
    <span class="c-section-label">Maplink Cloud</span>
    <h1 class="l-home__title"><?= esc_html(get_field("titulo", $page_home_id)) ?></h1>
    <p class="l-home__subtitle"><?= esc_html(get_field("subtitulo", $page_home_id)) ?></p>
    <div class="l-home__cta">
      <a class="c-button" href="#apis"><?php
                                        if ($current_language === 'en_US') {
                                          echo esc_html('Explore APIs');
                                        } elseif ($current_language === 'es_ES') {
                                          echo esc_html('Explorar APIs');
                                        } else {
                                          echo esc_html('Explorar APIs');
                                        }
                                        ?></a>
      <?php
      $link_collection = get_field("link_collection", $page_home_id);
      if ($link_collection) : ?>
        <a class="c-button c-button--secondary" href="<?= esc_url($link_collection) ?>" target="_blank" rel="nofollow noopener">Collection</a>
      <?php endif; ?>
    </div>
  </header>
  <div class="l-home__video">
    <img src="<?= esc_url(get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img/platform.webp') ?>" alt="Platform APIs" loading="lazy">
  </div>
</main>

<section class="l-home__apis" id="apis">
  <div class="l-home__apis-header">
    <span class="c-section-label"><?php
                                  if ($current_language === 'en_US') {
                                    echo esc_html('Platform APIs');
                                  } elseif ($current_language === 'es_ES') {
                                    echo esc_html('APIs de Platform');
                                  } else {
                                    echo esc_html('APIs da Platform');
                                  }
                                  ?></span>
    <h2 class="l-home__apis-title"><?php
                                    if ($current_language === 'en_US') {
                                      echo esc_html('Explore our APIs');
                                    } elseif ($current_language === 'es_ES') {
                                      echo esc_html('Explore nuestras APIs');
                                    } else {
                                      echo esc_html('Explore nossas APIs');
                                    }
                                    ?></h2>
  </div>
  <?php
  $access_text = "Acessar documentação";
  if ($current_language === 'en_US') {
    $access_text = "Access documentation";
  } elseif ($current_language === 'es_ES') {
    $access_text = "Acceder a la documentación";
  }
  $categories = list_categories();
  foreach ($categories as $categoria_completa) {
  ?>
    <article class="l-home__api">
      <header class="l-home__api-header">
        <?php if (isset($categoria_completa['icone'])) { ?>
          <span class="l-home__api-icon-wrap" aria-hidden="true">
            <img src="<?= esc_url($categoria_completa['icone']) ?>" alt="" class="l-home__api-icon" loading="lazy">
          </span>
        <?php } ?>
        <h3 class="l-home__api-title"><?= esc_html($categoria_completa['nome']) ?></h3>
      </header>
      <p class="l-home__api-description"><?= esc_html($categoria_completa['descricao']) ?></p>
      <a class="l-home__api-link" href="<?= esc_url($categoria_completa['link']) ?>" title="<?= esc_attr('Acessar a documentação da ' . $categoria_completa['nome']) ?>">
        <?= esc_html($access_text) ?>
      </a>
    </article>
  <?php
  }
  ?>
</section>

<section class="l-home__about">
  <div class="l-home__about-inner">
    <div class="l-home__about-content">
      <span class="c-section-label"><?php
                                    if ($current_language === 'en_US') {
                                      echo esc_html('Platform');
                                    } elseif ($current_language === 'es_ES') {
                                      echo esc_html('Platform');
                                    } else {
                                      echo esc_html('Platform');
                                    }
                                    ?></span>
      <h2 class="l-page__title"><?= esc_html(get_field("titulo_apresentacao", $page_home_id)) ?></h2>
      <?= wp_kses_post(get_field("apresentacao", $page_home_id)) ?>
    </div>
    <div class="l-home__about-visual" aria-hidden="true">
      <img
        src="<?= esc_url(get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img/icon.webp') ?>"
        alt=""
        class="icon-float"
        loading="lazy">
    </div>
  </div>
</section>
<?php
get_footer();
