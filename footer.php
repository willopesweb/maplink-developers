<?php
if (!isset($page_home_id)) :
  $page_home_id = get_option('page_on_front');
endif;
?>

<footer class="l-footer">
  <div class="l-footer__content">
    <p>© Maplink Cloud - <?php echo date("Y"); ?></p>
    <div class="l-footer__social">
      <?= theme_social_networks() ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>