<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'orangejuice_new');

/** MySQL database username */
define('DB_USER', 'orangejuice_new');

/** MySQL database password */
define('DB_PASSWORD', 'Gavin2015!');

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
define('AUTH_KEY',         ',L-#m~Vu9cGabN!glk>+.drD||w%#qB&fWHav/EvcpH7019@m|&K!c=![gI;of@K');
define('SECURE_AUTH_KEY',  '.D@h;)|RP.]DvDyzLeDq*<cm@jDc(R^nMoSw (sREQV|g|Xf>emy)JQs_are<I^z');
define('LOGGED_IN_KEY',    '0}.f_O[dPg{`3cTQ%t|},69i@ekJ4Hc^th1Xso#tf.JV_T0@j^@kK+FR`,b<5wy{');
define('NONCE_KEY',        '[^wG#<J29>FM*&)h(y%I5x@F4p;}o#,zx,I/p2X`sT;eFeW%H4GL}qAtx/84GRPx');
define('AUTH_SALT',        'nkn!n+|kC<5QcK-8ujs[Zn*[WZ}3<D}?ZPhGa+A]hW%y_}N{F&DN((k^PM>ms=))');
define('SECURE_AUTH_SALT', '<h8]U]kY^!$eyJvyi|NH|!Cv(v`4{^11Vab)yLTL9XuJD,mjlVXY|:RmwTOQmr L');
define('LOGGED_IN_SALT',   '-!,E0cM +ud-n>!d-6j.!iM`Y%(-T`#+sC;]U!|,^7p,F:7-F}t&%1.Y i$;HylI');
define('NONCE_SALT',       '/cQ^iGS24=HrEfH7=1YXHW{|?cb{54QJ@RxtM?DyArz{dp1nyF2$=+@s3Vs|q;Ex');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
