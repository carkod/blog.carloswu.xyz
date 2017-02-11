<?php

//define('WP_HOME','http://blog.carloswu.xyz');
//define('WP_SITEURL','http://blog.carloswu.xyz');
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
define('DB_NAME', 'carkod_com');

/** MySQL database username */
define('DB_USER', 'carkodcom');

/** MySQL database password */
define('DB_PASSWORD', '3:j/.aUP:6[gUEZu');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

define('AUTH_KEY',         '(KD1+{q0L;M7iX;wX|;AkhG{UQr<^/D>-LrQ7...5<_13){XYpi-3I4y=^ct-A(o');
define('SECURE_AUTH_KEY',  '22*lnlp#BOQuZV;@-@WR$$X?KlmJ]3!]WPQ61TSIlWWrz*+Nf61yCb$dK3L]+J3H');
define('LOGGED_IN_KEY',    's.?|@#zCBJ=jidBf@B:4{M1CcGHw:eVOqHOi+$Dk=)CE#*N_d[!pYf|+LuR512u+');
define('NONCE_KEY',        '7~~u-n|w??~,ghg|[r4-i_|B<0g+g,S&2G/u=#sJ_E[uIFX=FLgX@~-CpVtFs(uR');
define('AUTH_SALT',        'Lg?1Ciy|Mg0L|S+jq/FM!/Xwq_Ke/dYge%aJ2UE6u.xG]*efXf U>;dT6+,{~ES|');
define('SECURE_AUTH_SALT', ',[,I$!>SeNwZmJ .q>3`2% y-Q!/.Cp[ZFT+sQZ:$/[40k]*2&w8^([849WppqN2');
define('LOGGED_IN_SALT',   'hkg6dc8+:@)`u(^+tYKA~M )k<PT#VFl!5IZ{]cyewJD[<>SNUF4s#GbOEt(,Kob');
define('NONCE_SALT',       '8DP$C~3NqX?A)XF4|9>1WcqIkv([iI[Z(%m+g-h#6mr.|rPNgYfGm`?T9|)8S(&S');

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
