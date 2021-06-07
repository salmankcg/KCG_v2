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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
@ini_set( 'upload_max_filesize' , '1024M' );
@ini_set( 'post_max_size', '512M');
@ini_set( 'memory_limit', '1024M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kcg' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'OL<fll~y-.0yK4bmr}q`*w_TUaL<2BaHg<5 _&-*v[^A BZ9B6Z m>ejO8m=9aoX' );
define( 'SECURE_AUTH_KEY',  'u]ss)A2TBp{2fo[H]n*/<V>[&;f*ls9L~o5^iKr{]{,Mn(u.3}Z $)t8xpa<FfBx' );
define( 'LOGGED_IN_KEY',    ';m7ouDRk>.P-WCeY_^&v=fSHPkhyWN&ihPQgHA/#=u{^(H8O3P9-FM8^]!872ua<' );
define( 'NONCE_KEY',        'teIetoU+KUrsPvrjjdwpj94kNH}5].f~a]:: T)]-$aQ&#7x~0}d((,]<<o]<DsJ' );
define( 'AUTH_SALT',        'E-^fpA[nEP&p~>*_|z+`B m6}{lac.LYa#D8${%Q9XQ)c{1xSKo~<cYwLs,p9tL/' );
define( 'SECURE_AUTH_SALT', '<tlJ_JWrB? rNq=[1dc%h}Rjtb3cv9&dWBr_=+evIzTuy<$TZ>~dbEyk0:YejAwZ' );
define( 'LOGGED_IN_SALT',   ')RC_F,UpAzRza]WLEM{$B;>Y1ba}>/8e]9DVS^rBKcg>2n`)$MHe0cD/XQPMqlu$' );
define( 'NONCE_SALT',       '@@h/pLxadSKF+tmy7L_m#f&?a5fRy7k.sZ%p*`XZ8r<Kdn+{&: ,?G9X=hjbu WU' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kcg_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_LOG', '/tmp/wp-errors.log' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
