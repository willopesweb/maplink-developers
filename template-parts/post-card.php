<?php
if (has_post_thumbnail()) {
  $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail')[0];
} else {
  $image = ''; // Defina uma imagem padrão ou uma string vazia, dependendo do seu caso.
}

apply_filters('excerpt_length', 10); // Diminui o tamanho do resumo
?>
<article>
  <a class="c-post" href="<?= the_permalink() ?>" title="<?= the_title(); ?>">
    <?php if (!empty($image)) : ?>
      <div class="c-post__image">
        <img loading="lazy" height="400" src="<?= $image ?>" alt="" />
      </div>
    <?php endif; ?>

    <header class="c-post__header">
      <h2 class="c-post__title">
        <?php echo the_title(); ?>
      </h2>
      <p class="c-post__subtitle">
        <?php echo get_field("subtitulo"); ?>
      </p>
    </header>
  </a>
</article>