<?php
get_header();
?>
<div class="l-page__grid">
  <?php
  categoriesMenu();
  ?>
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <h1 class="l-page__title"><?= single_cat_title() ?></h1>
    </header>
    <section class="l-page__archive">
      <h1 class="screen-readers-only">Posts</h1>
      <?php
      wp_reset_query();
      $paged = get_query_var('page', 1);
      $current_category = get_queried_object();

      $args = array(
        'posts_per_page' => '12',
        'order' => 'DESC',
        'paged' => $paged,
        'order' => 'ASC',
        'orderby' => 'post-date',
        'category__in' => array($current_category->term_id)
      );
      $the_query = new WP_Query($args);
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
      <?php endif; ?>
    </section>
  </main>
</div>

<?php
get_footer();
?>