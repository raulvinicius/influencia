<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'influencia');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '1234');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'JO*BO|#?gtxm6mwc[cHzTLEm{oQ#)H#Sb*AY)LdF-r[:4C60eyGr-*tPHpo$~*B:');
define('SECURE_AUTH_KEY',  '{xR1_e;6TyJ^H0fl2$|?b1l?%N}5f-~T^]R4m0N_ne^l1c<<D>[hSwu8&hU]2}mL');
define('LOGGED_IN_KEY',    'L.70Oe~ndFLZq%*$OAK2;xwo`XjH][k~rUz9Aq!}$9=_2< nBSg_;<|72MQ12J?q');
define('NONCE_KEY',        '#/kbrI?bN[*6`w)]Wsafs6IS7jgLk,L8y;OaC2~FL=cDV37z))bTPXHZ/#B;`[{C');
define('AUTH_SALT',        't>d_Zrm(A6m%qc(K!*`q$[W8pqa@1F].C)h{Uul5K3*d~f~*vP)HG?y`-pey lyh');
define('SECURE_AUTH_SALT', '_ ( #nER2>{HaEzcw^AY>^ob:r;N~<{YoL6 Ek^[q&lYYPNzkeqGM*K}OlPljqs*');
define('LOGGED_IN_SALT',   ':|UB)~z%.:zjx#o]RU!|%v.u$hs7LI?(a8M9<}^g;hZ2hF:v;H-iM[-v!{<$+wA)');
define('NONCE_SALT',       'VgnnQz@lQ; ya|K;rZ,8Z_6vWra-CN%{c{g>Ut0_I,yd$XddH5e4h*fvf)SaXT@*');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
