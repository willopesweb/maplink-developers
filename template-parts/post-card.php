<?php
$cats = get_the_category();
?>
<article>
  <a class="c-post" href="<?= esc_url(get_permalink()) ?>" title="<?= esc_attr(get_the_title()) ?>">
    <header class="c-post__header">
      <?php if (!empty($cats)) : ?>
        <span class="c-post__categorie"><?= esc_html($cats[0]->name) ?></span>
      <?php endif; ?>
      <h2 class="c-post__title">
        <?= esc_html(get_the_title()) ?>
      </h2>
      <p class="c-post__subtitle">
        <?= esc_html(summarizeText(get_the_excerpt())) ?>
      </p>
    </header>
  </a>
</article>
