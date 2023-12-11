<?php
apply_filters('excerpt_length', 10); // Diminui o tamanho do resumo
?>
<article>
  <a class="c-post" href="<?= the_permalink() ?>" title="<?= the_title(); ?>">
    <header class="c-post__header">
      <span class="c-post__categorie"><?= get_the_category()[0]->name ?></span>
      <h2 class="c-post__title">
        <?= the_title(); ?>
      </h2>
      <p class="c-post__subtitle">
        <?= summarizeText(get_the_excerpt()) ?>
      </p>
    </header>
  </a>
</article>