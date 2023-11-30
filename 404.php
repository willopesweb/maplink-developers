<?php
get_header();
?>
<main class="l-page" id="content">
  <section class="l-page-single__content l-page-single__content--404">
    <header class="l-page__header">
      <h1 class="l-page__title">Página não encontrada</h1>
    </header>
    <div class="l-page-single__post-content ">
      <p>Desculpe, mas a página que você procura não existe ou foi excluída.</p>
      <p>Tente procurar o que você precisa abaixo.</p>
      <form role="search" method="get" id="searchform" class="c-search" action="<?php echo home_url(); ?>">
        <label class="screen-reader-text" for="s">Pesquisar por:</label>
        <input type="text" value="" name="s" id="s" class="c-search__input">
        <button id="searchsubmit" class="c-search__button icon-search"></button>
      </form>

    </div>
  </section>
  <aside class="l-page-single__content l-page-single__instagram">
    <p class="l-page-single__instagram__text">Você pode me seguir no Instagram para
      saber sobre meu dia a dia e meu processo de escrita.</p>
    <h1 class='c-instagram__name icon-instagram'>@regianecassiadasilva</h1>
    <div class="c-instagram__feed">
      <?= do_shortcode('[instagram-feed showbutton=false showfollow=false showheader=false followtext="Me Siga no Instagram"]'); ?>
      <a href="https://www.instagram.com/regianecassiadasilva/" class="c-button c-button--outline">Me Siga no Instagram</a>
    </div>
  </aside>
</main>


<?php
get_footer();
?>