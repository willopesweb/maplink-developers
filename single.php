<?php
get_header();
?>

<main class="l-page-single" id="content">
  <section class="l-page-single__content">
    <header class="l-page-single__header">
      <h1 class='l-page-single__title'><?= the_title() ?></h1>
      <p class='l-page-single__subtitle'><?= get_the_date() . ' - Regiane Silva' ?></p>
    </header>
    <div class="l-page-single__post-content">
      <?= the_content(); ?>
    </div>
    <article class="l-page-single__share">
      <h1 class="l-page-single__share__title">Compartilhe essa postagem</h1>
      <ul class="c-social">
        <li><a target='_blank' class='icon-whatsapp' href="https://api.whatsapp.com/send?text=<?= get_permalink() ?>"></a></li>
        <li><a target='_blank' class='icon-twitter' href="https://twitter.com/intent/tweet?text=<?= get_permalink() ?>"></a></li>
        <li><a target='_blank' class='icon-facebook' href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink() ?>"></a></li>
      </ul>
    </article>
    <article class="l-page-single__author">
      <h1 class="l-page-single__author__title">Postagem feita por:</h1>
      <div class="l-page-single__author__content">
        <img class="l-page-single__author__image" loading="lazy" width="100px" height="125px" src="<?= the_field('foto', 10) ?>" alt="Foto Regiane Silva" title="Regiane Silva" />
        <span><?php $author =  (get_the_author() == '' ? 'Regiane Silva' : get_the_author());
              echo $author;
              ?>
        </span>
      </div>
    </article>
  </section>
  <div class="l-page-single__comments">
    <?php
    if (comments_open()) {
      comments_template();
    }
    ?>
  </div>
</main>
<?php
get_footer();
