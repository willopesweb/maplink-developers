<?php
get_header();
?>

<div class="l-page__grid">
  <?php
  require 'template-parts/post-menu.php';
  ?>
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <h1 class="l-page__title"><?= the_title(); ?></h1>
    </header>
    <section class="l-single__content">
      <?= the_content(); ?>
    </section>
  </main>
</div>

<?php
get_footer();
