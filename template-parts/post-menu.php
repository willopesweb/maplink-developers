<?php

$categories = list_categories();

echo '<nav id="menu-apis" class="l-menu">';
echo "<ul>";
foreach ($categories as $categoria_completa) {
?>
  <li class="js-submenu-item">
    <span class="l-menu__category js-submenu-link <?= (get_the_category() && get_the_category()[0]->cat_ID === $categoria_completa['id']) ? "is-active" : "" ?>" title="<?= $categoria_completa['nome'] ?>">
      <?php if (isset($categoria_completa['icone'])) { ?>
        <span class="l-menu__icon">
          <img src="<?= $categoria_completa['icone'] ?>" alt="<?= $categoria_completa['nome'] ?>" title="<?= $categoria_completa['nome'] ?>" class="l-home__api-icon" loading="lazy" width="30" height="30">
        </span>
      <?php } ?>
      <p> <?= $categoria_completa['nome'] ?></p>
    </span>
    <ul class="l-menu__submenu js-submenu">
      <?php
      $posts = get_posts_by_category($categoria_completa['id']);
      foreach ($posts as $post) {
        echo '<li><a href="' . $post["link"] . '" title="' . $post["title"] . '">' . $post["title"] . '</a></li>';
      }
      ?>
    </ul>
  </li>
<?php
}
echo '</ul>';
echo '</nav>';
?>