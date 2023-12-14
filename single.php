<?php
get_header();

if (!isset($current_language)) {
  $current_language = get_locale();
}

?>

<div class="l-page__grid">
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <?php
      $main_category = get_the_category();
      if (!empty($main_category)) {
      ?>
        <span class="l-single__categorie"><?= esc_html($main_category[0]->name); ?></span>
      <?php } ?>

      <h1 class="l-page__title"><?= the_title(); ?></h1>
    </header>
    <section class="l-single__content">
      <?= the_content(); ?>
    </section>
    <div class="l-single__posts">
      <?php
      $previous_post = get_previous_post();
      $next_post = get_next_post();
      if ($previous_post) {
        $prev_title = "Artigo anterior";
        if ($current_language === 'en_US') {
          $prev_title = "Previous article";
        } elseif ($current_language === 'es_ES') {
          $prev_title = "Artículo anterior";
        }
      ?>
        <article>

          <a class="c-post l-single__related" href="<?= get_permalink($previous_post->ID) ?>" title="<?= get_the_title($previous_post->ID) ?>">
            <header class="c-post__header">
              <span class="l-single__related__prev"><?= $prev_title ?></span>
              <?php
              $prev_category = get_the_category($previous_post->ID);
              if (!empty($prev_category)) {
              ?>
                <span class="c-post__categorie"><?= esc_html($prev_category[0]->name); ?></span>
              <?php } ?>
              <h2 class="c-post__title">
                <?= get_the_title($previous_post->ID) ?>
              </h2>
            </header>
          </a>
        </article>
      <?php
      }

      if ($next_post) {
        $next_title = "Próximo artigo";
        if ($current_language === 'en_US') {
          $next_title = "Next article";
        } elseif ($current_language === 'es_ES') {
          $next_title = "Próximo artículo";
        }
      ?>
        <article>
          <a class="c-post l-single__related next" href="<?= get_permalink($next_post->ID) ?>" title="<?= get_the_title($previous_post->ID) ?>">
            <header class="c-post__header">
              <span class="l-single__related__next"><?= $next_title ?></span>
              <?php
              $next_category = get_the_category($next_post->ID);
              if (!empty($next_category)) {
              ?>
                <span class="c-post__categorie"><?= esc_html($next_category[0]->name); ?></span>
              <?php } ?>
              <h2 class="c-post__title">
                <?= get_the_title($next_post->ID) ?>
              </h2>
            </header>
          </a>
        </article>
      <?php
      } ?>
    </div>
  </main>
  <?php
  categoriesMenu();
  ?>
</div>

<?php
get_footer();
