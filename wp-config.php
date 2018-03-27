<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'luxuryexperiences');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'a^nA<mRn|cvQX]ijh2[Zn;M@Q -c@<xRUllpp:5&e12/~#rZizWWTm[8~xV{mUq(');
define('SECURE_AUTH_KEY', 'IkLZKK4(qI|U272mXX,(6Ez/@*8tuZ}I|H~)2b#;e&pU5gHSMmUtw8KCLI;{oO~O');
define('LOGGED_IN_KEY', 'x2VBNip(J HWKu!SZouhmxH2~:9r<K10)O+wF !=,/AV>ZZ[t+S]Y2aEo:o*HO-E');
define('NONCE_KEY', ':O`AvS2^@FTBU9p[nBN1{Dc7OPFT6<%(%em!6lm1n!PWi+bLwP@?bF&h{5Yjc-o!');
define('AUTH_SALT', '%?=gN2~OI,8S_/*TH{GU*#BL@j`Syd(mafUHxKI+_3U2zE#A}7=_#xgn;~Vwqmkt');
define('SECURE_AUTH_SALT', 'qWIIf/v1rEpHvX5`M(g;WRyvEzbZLc5#R`iQrmfDZQB~]]&cTO<eKhG@o:M?Y@a8');
define('LOGGED_IN_SALT', ',xexygFj={S?T4<( )Q!%OXXU<&@Rrb*i-hW7`vHwCd++j&M:Qt#.S[<9YZd~Ppa');
define('NONCE_SALT', 'LA|lX]!6F+dy*i?nwA!9l<1fgaUG7PycAx8]%mf+)rTJY.XOky2S{odWNN /NR~/');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

