<?php
//Retorna todas as categoria
function list_categories()
{
  $idioma_atual = pll_current_language();

  global $wpdb;

  $term_taxonomy_table = $wpdb->prefix . 'term_taxonomy';

  $categorias_ids = $wpdb->get_col(
    "SELECT term_taxonomy_id FROM $term_taxonomy_table WHERE taxonomy = 'category'"
  );

  $categorias_completas = array();
  $categorias_adicionadas = array();

  foreach ($categorias_ids as $categoria_id) {
    $categoria_translated_id = pll_get_term($categoria_id, $idioma_atual);

    if ($categoria_translated_id && !in_array($categoria_translated_id, $categorias_adicionadas)) {
      $categoria_translated = get_term($categoria_translated_id);
      $categoria_completa = array(
        'nome'       => $categoria_translated->name,
        'link'       => get_category_link($categoria_translated_id),
        'descricao'  => $categoria_translated->description,
        'icone'      => get_field('icone', 'category_' . $categoria_translated->term_id),
      );

      if (($categoria_completa["nome"] !== "Uncategorized") && ($categoria_completa["nome"] !== "Sem categoria")) {
        $categorias_completas[] = $categoria_completa;
        $categorias_adicionadas[] = $categoria_translated_id;
      }
    }
  }

  return $categorias_completas;
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
    'prev_text'    => sprintf('<i></i> %1$s', __('Anterior', 'text-domain')),
    'next_text'    => sprintf('%1$s <i></i>', __('Próximo', 'text-domain')),
    'add_args'     => false,
    'add_fragment' => '',
  ));
}
