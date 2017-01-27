<?php 

// global $wp_rewrite; $wp_rewrite->flush_rules();

// CUSTOM POST

function codex_custom_init() {
	$labelsEmpresas = array(
		'name' => _x('Empresas', 'nome plural do tipo de post'),
		'singular_name' => _x('Empresa', 'nome singular do tipo de post'),
		'add_new' => _x('Adicionar Empresa', 'empresas'),
		'add_new_item' => __('Adicionar Empresa'),
		'edit_item' => __('Editar Empresa'),
		'new_item' => __('Nova Empresa'),
		'all_items' => __('Todas as Empresas'),
		'view_item' => __('Ver Empresa'),
		'search_items' => __('Procurar por Empresa'),
		'not_found' =>  __('Nenhuma Empresa foi encontrada'),
		'not_found_in_trash' => __('Não há Empresas na lixeira'), 
		'parent_item_colon' => '',
		'menu_name' => 'Empresas'

	);
	$argsEmpresas = array(
		'labels' => $labelsEmpresas,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'onde-encontrar'),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array( 'title' ),
		'taxonomies' => array('onde-encontrar-tags', 'onde-encontrar', 'onde-encontrar-regioes', 'onde-encontrar-bairros')
	); 
	register_post_type('empresas',$argsEmpresas);




	$labelsEdicoes = array(
		'name' => _x('Edições', 'nome plural do tipo de post'),
		'singular_name' => _x('Edição', 'nome singular do tipo de post'),
		'add_new' => _x('Adicionar Edição', 'edicoes'),
		'add_new_item' => __('Adicionar Edição'),
		'edit_item' => __('Editar Edição'),
		'new_item' => __('Nova Edição'),
		'all_items' => __('Todas as Edições'),
		'view_item' => __('Ver Edição'),
		'search_items' => __('Procurar por Edição'),
		'not_found' =>  __('Nenhuma Edição foi encontrada'),
		'not_found_in_trash' => __('Não há Edições na lixeira'), 
		'parent_item_colon' => '',
		'menu_name' => 'Edições'

	);
	$argsEdicoes = array(
		'labels' => $labelsEdicoes,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array( 'title' )
	); 
	register_post_type('edicoes',$argsEdicoes);




	$labelsArtigos = array(
		'name' => _x('Artigos', 'nome plural do tipo de post'),
		'singular_name' => _x('Artigo', 'nome singular do tipo de post'),
		'add_new' => _x('Adicionar Artigo', 'artigos'),
		'add_new_item' => __('Adicionar Artigo'),
		'edit_item' => __('Editar Artigo'),
		'new_item' => __('Novo Artigo'),
		'all_items' => __('Todos os Artigos'),
		'view_item' => __('Ver Artigo'),
		'search_items' => __('Procurar por Artigo'),
		'not_found' =>  __('Nenhum Artigo foi encontrado'),
		'not_found_in_trash' => __('Não há Artigos na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Artigos'

	);
	$argsArtigos = array(
		'labels' => $labelsArtigos,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array( 'title' ),
		'taxonomies' => array('cat-artigos', 'book-artigos', 'tag-artigos')
	); 
	register_post_type('artigos',$argsArtigos);
}
add_action( 'init', 'codex_custom_init' );





//CUSTOM TAXONOMY
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() 
{

	register_taxonomy(
	    'onde-encontrar',
	    'empresas',
	    array(
	        'hierarchical' => true,
	        'label' => 'Categorias',
	        'query_var' => true,
	        'rewrite' => false
	    )
	);

	register_taxonomy(
	    'onde-encontrar-regioes',
	    'empresas',
	    array(
	        'hierarchical' => true,
	        'label' => 'Região Administrativa',
	        'query_var' => true,
	        'rewrite' => false
	    )
	);

	register_taxonomy(
	    'onde-encontrar-bairros',
	    'empresas',
	    array(
	        'hierarchical' => true,
	        'label' => 'Bairro',
	        'query_var' => true,
	        'rewrite' => false
	    )
	);

	register_taxonomy(
	    'onde-encontrar-tags',
	    'empresas',
	    array(
	        'hierarchical' => false,
	        'label' => 'Tags',
	        'query_var' => true,
	        'rewrite' => true
	    )
	);




	register_taxonomy(
	    'cat-artigos',
	    'artigos',
	    array(
	        'hierarchical' => true,
	        'label' => 'Categorias',
	        'query_var' => true,
	        'rewrite' => true
	    )
	);

	register_taxonomy(
	    'book-artigos',
	    'artigos',
	    array(
	        'hierarchical' => true,
	        'label' => 'Cadernos',
	        'query_var' => true,
	        'rewrite' => true
	    )
	);

	register_taxonomy(
	    'tag-artigos',
	    'artigos',
	    array(
	        'hierarchical' => false,
	        'label' => 'Tags',
	        'query_var' => true,
	        'rewrite' => true
	    )
	);

}



// ADICIONA O ACF OPTIONS PAGE

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
	'page_title' 	=> 'Artigos em destaque',
	'menu_title' 	=> 'Artigos em destaque',
	'menu_slug' 	=> 'artigos_destaque',
	'capability' 	=> 'edit_posts', 
	'parent_slug'	=> 'edit.php?post_type=artigos',
	'position'	=> false,
	'icon_url' 	=> 'dashicons-images-alt2',
	'redirect'	=> false,
	));	
}




// Auto-populate post title with ACF.
function my_update_postdata( $value, $post_id, $field )
{
	
	$numero = get_field('numero', $post_id);
	
    $title = 'Ed. nº ' . $numero;

	$slug = sanitize_title( $title );
  
	$postdata = array(
	     'ID'          => $post_id,
         'post_title'  => $title,
	     'post_type'   => 'edicoes',
	     'post_name'   => $slug
  	);
  
	wp_update_post( $postdata );
	
	return $value;
	
}
add_filter('acf/update_value/key=field_575440b1c6fa0', 'my_update_postdata', 10, 3);




// CUSTOM IMAGE SIZE

if ( function_exists( 'add_image_size' ) ) 
{
	add_image_size( 'logo-perfil-empresa', 166, 166, true );
	add_image_size( 'artigo-destaque-home', 1920, 850, true );
	add_image_size( 'artigos-img-g', 555, 350, true );
	add_image_size( 'artigos-img-m', 263, 190, true );
	add_image_size( 'artigos-img-p', 165, 165, true );
	add_image_size( 'header-artigo', 1170, 500, true );
	add_image_size( 'ilustrativa-artigo', 460, 615, false );
	add_image_size( 'bloco-imagem-artigo', 780, 345, false );
	add_image_size( 'capa-revista', 200, 267, true );
	add_image_size( 'capa-cat-onde-encontrar', 1920, 550, true );
	add_image_size( 'artigo-saude-cartao', 350, 250, true );
}


function busca_onde_encontrar( $type, $argsBusca = NULL, $order = 'DESC', $per_page = -1, $paged = NULL )
{

	$arTermsOE = array();
	$arTermsOEA = array();
	$strTermsOE = "";
	$strTermsOEA = "";
	$argsDB = array();


	//cria STRING com todas as TAGS que batam com a busca
	if ( isset( $argsBusca['b'] ) ) 
	{
		$tag = get_terms('onde-encontrar-tags', 'name__like=' . $argsBusca['b']);

		foreach ($tag as $key)
		{
			$arTermsOEA[] = $key->term_id;
		}

		$strTermsOEA = join(',', $arTermsOEA);
	}

	//cria STRING com todas as CATEGORIAS que batam com a categoria buscada
	if( isset($argsBusca['c']) )
	{
		$category = get_terms('onde-encontrar', 'name__like=' . $argsBusca['c']);

		foreach ($category as $key) 
		{
			$arTermsOE[] = $key->term_id;
		}

		$strTermsOE = join(',', $arTermsOE);
	};
	

	//inclui termo BUSCA
	if ( isset( $argsBusca['b'] ) )
	{
		$argsDB[] = " wp.post_title LIKE '%" . $argsBusca['b'] . "%' ";
	};


	//inclui termo TAXONOMY

	if( isset($argsBusca['c']) )
	{
		$argsDB[] = "
		wtr.term_taxonomy_id IN (" . $strTermsOE . ")
		";
	};		

	/*
	if($strTermsOEA != '' && $strTermsOE != '')
	{
		$argsDB[] = "
		(
			wtr.term_taxonomy_id IN (" . $strTermsOEA . ")
			OR
			wtr.term_taxonomy_id IN (" . $strTermsOE . ")
		)
		";
	}
	if($strTermsOEA != '' && $strTermsOE == '')
	{
		$argsDB[] = "
		(
			wtr.term_taxonomy_id IN (" . $strTermsOEA . ")
		)
		";
	}
	if($strTermsOEA == '' && $strTermsOE != '')
	{
		$argsDB[] = "
		(
			wtr.term_taxonomy_id IN (" . $strTermsOE . ")
		)
		";
	}
	*/


	//inclui termo POST_TYPE e STATUS
	$argsDB[] = 	"wp.post_type = '" . $type . "'
					AND
					wp.post_status = 'publish'
					";


	//inclui termo REGIAO
	if( isset($argsBusca['r']) )
	{
		$argsDB[] =		"
						( 
							wpm.meta_key = 'regiao_administrativa'
							AND
							CAST(wpm.meta_value AS CHAR) = '" . $argsBusca['r'] . "' 
						) 
						";
	}

	$qr = "SELECT wp.* FROM wp_posts AS wp
			
			INNER JOIN wp_term_relationships AS wtr
				ON (wp.ID = wtr.object_id)

			INNER JOIN wp_postmeta AS wpm
				ON ( wp.ID = wpm.post_id )
				
			WHERE

			";

	$qr .= join(" AND ", $argsDB);

	$qr .=			" GROUP BY wp.ID
					ORDER BY wp.post_title ASC, wp.post_date ASC 
					";
	// var_dump($qr);

	global $wpdb;
	return $wpdb->get_results($qr, OBJECT);

}

function get_post_by_type($type, $order = 'DESC', $per_page = -1, $paged = NULL, $s = NULL, $r = NULL, $eArgs = NULL)
{

	if (!isset( $paged ) )
	{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$args = array(
		'post_type' => $type,
		'posts_per_page' => $per_page,
		'paged' => $paged,
		'order' => $order
	);

	if (isset( $eArgs ))
	{
		$args = array_merge($args, $eArgs);
	}

/*

	if (isset( $s ))
	{
		$args['s'] = $s;
	}

	$category = get_terms('onde-encontrar', 'name__like=' . $s);
	$tag = get_terms('onde-encontrar-tags', 'name__like=' . $s);
	$arTermsOE = array();
	$arTermsOEA = array();

	foreach ($category as $key) 
	{
		$arTermsOE[] = $key->slug;
	}

	foreach ($tag as $key)
	{
		$arTermsOEA[] = $key->slug;
	}
	
	$args['tax_query'] = array(
		'relation' => 'OR',
		array(
			'operator' => 'IN',
			'taxonomy' => 'onde-encontrar',
			'field'    => 'slug',
			'terms'    => $arTermsOE
		),
		array(
			'operator' => 'IN',
			'taxonomy' => 'onde-encontrar-tags',
			'field'    => 'slug',
			'terms'    => $arTermsOEA
		)
	);

	if ( isset( $r ) || $r != '' )
	{

		$args['meta_key'] = 'regiao_administrativa';
		$args['meta_value'] = $r;
	}

*/
	return new WP_Query( $args );

}


// ALTERA O COMPORTAMENTO DO TITLE FIELD
function change_default_title( $title ){

    $screen = get_current_screen();

	// ALTERAR O PLACEHOLDER DO TITLE FIELD
    if ( 'empresas' == $screen->post_type )
    {
        $title = 'Nome fantasia da empresa';
    }

    if ( 'artigos' == $screen->post_type )
    {
        $title = 'Titulo do artigo';
    }


    // ESCONDE O TITLE FIELD DE POST EDITS DO TIPO EDICOES
    if ( 'edicoes' == $screen->post_type )
    {
    ?>
	    <style class="euquero" type="text/css">
	    <!--
	    #post-body-content
	    {
	    	margin-bottom: 0;
	    }
	    #titlediv
	    {
	        display: none;
	    }
	    -->
	    </style>
    <?php
    }

    return $title;
}

add_filter( 'enter_title_here', 'change_default_title' );


function wp_path_to_js()
{
	echo "
	    <script class='segredo' type=\"text/javascript\">

	        templateUrl = '" . get_bloginfo('template_url') . "/';
	        blogUrl = '" . get_bloginfo('url') . "/';

	    </script>
	";
}

function pluralize ($num, $plural = 's', $single = '')
{ 
    if ($num == 1) :
    	return $single; 
 	else :
 		return $plural; 
 	endif;
}

function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}


// ADICIONA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		echo get_bloginfo('url') . $urlAdicional;
	}
}

// RETORNA URL ABSOLUTO NO AMBIENTE DE DESENVOLVIMENTO
function get_completaUrl ($urlAdicional = "")
{
	if($_SERVER['HTTP_HOST'] == "localhost")
	{
		return get_bloginfo('url') . $urlAdicional;
	}
}


$GLOBALS["vRegiao"] = array();
$GLOBALS["vRegiao"]['aguas-claras'] = 'Águas Claras';
$GLOBALS["vRegiao"]['brazlandia'] = 'Brazlândia';
$GLOBALS["vRegiao"]['candangolandia'] = 'Candangolândia';
$GLOBALS["vRegiao"]['ceilandia'] = 'Ceilândia';
$GLOBALS["vRegiao"]['cruzeiro'] = 'Cruzeiro';
$GLOBALS["vRegiao"]['fercal'] = 'Fercal';
$GLOBALS["vRegiao"]['gama'] = 'Gama';
$GLOBALS["vRegiao"]['guara'] = 'Guará';
$GLOBALS["vRegiao"]['itapoa'] = 'Itapoã';
$GLOBALS["vRegiao"]['jardim-botanico'] = 'Jardim Botânico';
$GLOBALS["vRegiao"]['lago-norte'] = 'Lago Norte';
$GLOBALS["vRegiao"]['lago-sul'] = 'Lago Sul';
$GLOBALS["vRegiao"]['nucleo-bandeirante'] = 'Núcleo Bandeirante';
$GLOBALS["vRegiao"]['paranoa'] = 'Paranoá';
$GLOBALS["vRegiao"]['park-way'] = 'Park Way';
$GLOBALS["vRegiao"]['planaltina'] = 'Planaltina';
$GLOBALS["vRegiao"]['plano-piloto'] = 'Plano Piloto';
$GLOBALS["vRegiao"]['recanto-das-emas'] = 'Recanto das Emas';
$GLOBALS["vRegiao"]['riacho-fundo'] = 'Riacho Fundo';
$GLOBALS["vRegiao"]['riacho-fundo-ii'] = 'Riacho Fundo II';
$GLOBALS["vRegiao"]['samambaia'] = 'Samambaia';
$GLOBALS["vRegiao"]['santa-maria'] = 'Santa Maria';
$GLOBALS["vRegiao"]['sao-sebastiao'] = 'São Sebastião';
$GLOBALS["vRegiao"]['sia'] = 'SIA';
$GLOBALS["vRegiao"]['sobradinho'] = 'Sobradinho';
$GLOBALS["vRegiao"]['sudoeste-octogonal'] = 'Sudoeste/Octogonal';
$GLOBALS["vRegiao"]['taguatinga'] = 'Taguatinga';
$GLOBALS["vRegiao"]['varjao'] = 'Varjão';
$GLOBALS["vRegiao"]['vicente-pires'] = 'Vicente Pires';