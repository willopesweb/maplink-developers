<?php
get_header();

global $wp_query;

?>

<main class="l-single" id='content'>
  <header class="l-single__header">
    <?php
    if ($wp_query->found_posts == 0) {
      echo '<h1 class="l-single__title"> Nenhum resultado encontrado para "' . get_search_query() . '"</h1>';
      echo '<p class=s"l-single__subtitle">Tente refazer a pesquisa usando outros termos</p>';
    } else {
      echo '<h1 class="l-single__title">' . $wp_query->found_posts . ' resultados para "' . get_search_query() . '"</h1>';
    }
    ?>
  </header>

  <div class="l-page__archive">
    <section class="l-page-home__posts">
      <h1 class="screen-readers-only">Posts</h1>
      <?php
      wp_reset_query();
      $paged = get_query_var('paged', 1);
      $s = get_search_query();

      $args = array(
        's' => $s,
        'post_type' => 'post',
        'posts_per_page' => '10',
        'paged' => $paged,
        'order' => 'DESC',
        'orderby' => 'post-date'
      );

      $the_query = new WP_Query($args); //Create our new custom query
      if ($the_query->have_posts()) :

        while ($the_query->have_posts()) :
          $the_query->the_post();
          require 'template-parts/post-card.php';
        endwhile;
      ?>



        <div class="c-pagination">
          <?php
          theme_custom_pagination($the_query);
          ?>
        </div>

      <?php
      else : ?>
        <div class="c-trigger">
          <p>Desculpe, nenhum post foi encontrado.</p>
        </div>
      <?php endif; ?>
    </section>
  </div>
</main>

<?php
get_footer();
