<?php
//Formulário de pesquisa
function renderSearchForm()
{
  if (!isset($current_language)) {
    $current_language = get_locale();
  }

  $placeholder = "Digite aqui o que você procura";
  $label = "Pesquisar por:";

  if ($current_language === 'en_US') {
    $placeholder = "Enter what you're looking for";
    $label = "Search for:";
  } elseif ($current_language === 'es_ES') {
    $placeholder = "Ingrese lo que está buscando";
    $label = "Buscar por:";
  }

  $html = '<form role="search" method="get" class="l-header__search-form">';
  $html .= '<label>';
  $html .= '<span class="screen-reader-text">' . $label . '</span>';
  $html .= '<input required type="search" class="search-field" placeholder="' . $placeholder . '" value="' . get_search_query() . '" name="s" />';
  $html .= '</label>';
  $html .= '<button class="l-header__search-button icon-search" type="submit"></button>';
  $html .= '</form>';

  return $html;
}

//Resumir texto
function summarizeText($text, $charactersLimit = 180)
{
  if (mb_strlen($text, 'UTF-8') > $charactersLimit) {
    $text = str_replace(array("<strong>", "</strong>"), '', mb_substr($text, 0, $charactersLimit, 'UTF-8')) . ' [...]';
  }

  return $text;
}


//Retorna todas as categoria
function list_categories()
{
  $args = array(
    'taxonomy' => 'category',
    'hide_empty' => false,
  );

  $categories_query = new WP_Term_Query($args);
  $categorias_completas = array();

  if ($categories_query->terms) {
    foreach ($categories_query->terms as $categoria_translated) {
      $ordem_raw = get_field('ordem', 'category_' . $categoria_translated->term_id);

      // Se o valor for nulo, substitui por 99
      $ordem = is_numeric($ordem_raw) ? intval($ordem_raw) : 99;

      $categoria_completa = array(
        'id' => $categoria_translated->term_id,
        'nome' => $categoria_translated->name,
        'link' => get_category_link($categoria_translated),
        'descricao' => $categoria_translated->description,
        'icone' => get_field('icone', 'category_' . $categoria_translated->term_id),
        'ordem' => $ordem,
      );

      if (
        $categoria_completa["nome"] !== "Uncategorized" &&
        $categoria_completa["nome"] !== "Sem categoria" &&
        $categoria_completa["nome"] !== "Sin categoría"
      ) {
        $categorias_completas[] = $categoria_completa;
      }
    }
  }

  usort($categorias_completas, function ($a, $b) {
    return intval($a['ordem']) - intval($b['ordem']);
  });

  return $categorias_completas;
}

//Retorna todos os posts pelo ID da categoria
function get_posts_by_category($category_id)
{
  $args = array(
    'cat' => $category_id,
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
  );

  $query = new WP_Query($args);
  $posts_array = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $post_title = get_the_title();
      $post_link = get_permalink();

      $posts_array[] = array(
        'id' => $post_id,
        'title' => $post_title,
        'link' => $post_link,
      );
    }

    wp_reset_query();
    wp_reset_postdata();
    rewind_posts(); // Restaura o loop global
  }


  return $posts_array;
}



// Retorna redes sociais
function theme_social_networks()
{

  if (!isset($page_home_id)) :
    $page_home_id = get_option('page_on_front');
  endif;

  $html = '';
  $html .= '<ul class="c-social">';
  if (get_field("whatsapp", $page_home_id)) {
    $html .= '<li><a href="https://api.whatsapp.com/send?phone=5519' . str_replace(' ', '', get_field("whatsapp", $page_home_id)) . '" class="icon-whatsapp" target="_blank"></a></li>';
  }
  if (get_field("instagram", $page_home_id)) {
    $html .= '<li><a class="icon-instagram" href="' . get_field("instagram", $page_home_id) . '" title="Nos Siga no Instagram" target="_blank" rel="_nofollow"></a></li>';
  }
  if (get_field("facebook", $page_home_id)) {
    $html .= '<li><a class="icon-facebook" href="' . get_field("facebook", $page_home_id) . '" title="Curta nossa página no Facebook" target="_blank" rel="_nofollow"></a></li>';
  }
  if (get_field("linkedin", $page_home_id)) {
    $html .= '<li><a class="icon-linkedin" href="' . get_field("linkedin", $page_home_id) . '" title="Curta nossa página no Linkedin" target="_blank" rel="_nofollow"></a></li>';
  }
  if (get_field("youtube", $page_home_id)) {
    $html .= '<li><a class="icon-youtube" href="' . get_field("youtube", $page_home_id) . '" title="Se inscreve no nosso canal no YouTube" target="_blank" rel="_nofollow"></a></li>';
  }
  $html .= '</ul>';

  return $html;
}

function theme_custom_pagination($query = null)
{
  global $wp_query;
  if ($query == null) {
    $query = $wp_query;
  }

  $current = get_query_var('page') ? get_query_var('page') : get_query_var('paged');

  if (!isset($current_language)) {
    $current_language = get_locale();
  }

  $next = "Próximo";
  $previous = "Anterior";

  if ($current_language === 'en_US') {
    $next = "Next";
    $previous = "Previous";
  }




  echo paginate_links(array(
    'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'total'        => $query->max_num_pages,
    'current'      => max(1, $current),
    'format'       => '?page=%#%',
    'show_all'     => false,
    'type'         => 'plain',
    'end_size'     => 2,
    'mid_size'     => 1,
    'prev_next'    => true,
    'prev_text'    => sprintf('<i></i> %1$s', $next),
    'next_text'    => sprintf('%1$s <i></i>', $previous),
    'add_args'     => false,
    'add_fragment' => '',
  ));
}
