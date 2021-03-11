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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'studentnet_com' );

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
define( 'AUTH_KEY',         'A*O-b|iF0}^id<xy2i9$n1?w!R>mkUnlbh6Ba<R~jG)?Y~2]T}T;&3AC{:ori>eV' );
define( 'SECURE_AUTH_KEY',  'd[KM(:`Vd1&9^gw)u63+14J% {KoAreP[VQh_:7o_g;wNfD1)ay68Zabn.yhD}BD' );
define( 'LOGGED_IN_KEY',    ';Lw.?z]IoThY#}#o??N^d9CzN@^>eZohLP%DH2`cQ`+{DJSw-ZLpU)]pH!P$HXc/' );
define( 'NONCE_KEY',        'L=t wT uG88KSPnRDl4HqAf<|5K^KkSM@Cq7%V{6Rn-_5;mxiA I}%xC%%As]y;~' );
define( 'AUTH_SALT',        '6%NnkjA9zbg4T&,TNl:W%QZu(q-vg=YS^h}~:0I}ivk2)ur@uZOBf!cGQwee]7H#' );
define( 'SECURE_AUTH_SALT', 'D.iYJ7}K!1tsx5DU9atHa<P~x|A+dMS!IL_l4RP7is }jqD /lJYJpm@;EP=y$C9' );
define( 'LOGGED_IN_SALT',   '# sOe >&cY2m ICO=_s,UM8eQ*Mk}U|W7;(!pJhzI7l)7/@B>aQ%-CF7$5k@?@&|' );
define( 'NONCE_SALT',       '0S/^<Hee=dT>ecAltp$bH+Ga`<P6RInrRoLuP$!O24z:^]`1`<}IZz+%JQ~[2[w{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bs_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
