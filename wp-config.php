<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ticketing-system' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@Dap^Z1F{H{M_/FL&0WelYP^bhtju>}.WiFXM(!<bT/NaBr}.RHD64eO}abtzYIO' );
define( 'SECURE_AUTH_KEY',  'lI+k8GQ~>h2$[~,0Y`X?7mIDL6I1}Xf/[2k*7zn{w7R1 YH1!_z%(z(X1<@)jSlg' );
define( 'LOGGED_IN_KEY',    'R{1diZY`w^I^LHdJ)<`o;7Xas~rk{0tA2Pn@%F&yj o_*lSA?bqB4HD=[:YV.24_' );
define( 'NONCE_KEY',        '+:]MOIsNEX`Rt)RnyzWz-mR/txL~wqF/^bVk;7JeD)J P%J%=yP^ng_`qv)XtmPg' );
define( 'AUTH_SALT',        'AGo &*%vW^R<?F8(1?H(Quf|L5kZW{B)),-J]V|h*;{|>WAPD`I;J[ZVhEjF5.Nk' );
define( 'SECURE_AUTH_SALT', '_.Xiewc[2|.Z4Rh}z]3sla1y||c?k7(|;-!=*c.v$Y)RLx>X(WdOwwVt#5S~}2J]' );
define( 'LOGGED_IN_SALT',   '?PNrCy..U%1*7z^Ktm[,u}O`pA./m03(+|aqDs`WIU)}&;`,o[p<?$.k(tQ;$DUJ' );
define( 'NONCE_SALT',       '|ZX=-8L[WH|l2_x^Rsd{p)=0}NU!/$_49r#T_FvVl-I@YM+I>WuVT 3dt@62fc9P' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
