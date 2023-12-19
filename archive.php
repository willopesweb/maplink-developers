<?php
get_header();
?>

<div class="l-page__grid">
  <?php categoriesMenu(); ?>
  <main class="l-single" id='content'>
    <header class="l-page__header">
      <h1 class="l-page__title"><?= single_cat_title() ?></h1>
    </header>
    <section class="l-page__archive">
      <h1 class="screen-readers-only">Posts</h1>
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $current_category = get_queried_object();

      query_posts(array(
        'posts_per_page' => 12,
        'order'          => 'ASC',
        'paged'          => $paged,
        'orderby'        => 'post_date',
        'category__in'   => array($current_category->term_id),
      ));

      if (have_posts()) :
        while (have_posts()) :
          the_post();
          get_template_part('template-parts/post', 'card');
        endwhile;
      ?>
        <div class="c-pagination">
          <?php
          theme_custom_pagination();
          ?>
        </div>
      <?php
        wp_reset_query();
      else :
      ?>
        <p><?php esc_html_e('No posts found', 'text-domain'); ?></p>
      <?php
      endif;
      ?>
    </section>
  </main>
</div>

<?php
get_footer();
?>