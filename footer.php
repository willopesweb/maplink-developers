<?php
wp_footer();

if (!isset($page_home_id)) :
  $page_home_id = get_option('page_on_front');
endif;

if (!isset($image_dir)) :
  $image_dir = get_stylesheet_directory_uri() . '/' . ASSETS_DIR . '/img';
endif;
?>

<footer class="l-footer">
  <div class="l-footer__content">
    <p>© Maplink Copyright <?php echo date("Y"); ?></p>
    <div class="l-footer__social">
      <?= theme_social_networks() ?>
    </div>
  </div>
</footer>
<script src="<?= get_stylesheet_directory_uri() . '/' . ASSETS_DIR ?>/js/main.js"></script>