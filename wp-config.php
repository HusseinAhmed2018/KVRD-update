<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/srv/disk2/2707513/www/kvrd.onlinewebshop.net/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'KVRD');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[G<}g(nhUo^nj9O[ov`Jj-,Bm(Lw{#})SLAQdp&qFC?4Ld.x)eY>=]sD_*Ql1T j');
define('SECURE_AUTH_KEY',  '7DP02F4f%J}e)#dUSda@Vw>eCE/Hw1@2wP`O@4CJA_Ug=eE}U*t>cOkt[sUIt:O8');
define('LOGGED_IN_KEY',    'IhA>:av]3SX*~gw3-IW66wCxQ*ibqPaD?~?PdDXU7*/V`w~qxLe46s*|JiH79$^#');
define('NONCE_KEY',        '-Ha:s/gVZnv@V8(?fj$UoO#L;R_0vm6@0|4}Q&m%R%SE@Znfzp>gIEeDT8i#N6CO');
define('AUTH_SALT',        'YCef|eIqo()Od5HBf5S15<^$!<Zc5}eMybgv#`nG[gsFv 1a|Z<r,!:1kqKaa(+n');
define('SECURE_AUTH_SALT', '9cmgD|0*y5JTQi[Ju-n0^$hb6o?xnU{9)Z154T%G+$TlXX9m5/e0l*z~f:U<[,_h');
define('LOGGED_IN_SALT',   '<G;r(K.bbs<|MUappUgDEWFytfo*+-*a%%g<If]D0<sz[h;i]c[M0;F4p$*mezE|');
define('NONCE_SALT',       '{>au**XOe1,rL2g>uGCrg~c~p*%a8D4I?hx:|2yI ]UuIe2@*`)BVh6Ar}dRoK0-');
//define(‘ALLOW_UNFILTERED_UPLOADS’, true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
