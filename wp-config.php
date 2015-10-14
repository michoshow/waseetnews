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
define('DB_NAME', 'waseetnews');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         'j7#z>6;]il=0!~zbB-;5E|uyM1T=R}uoI3=&/ wmfOh]hIuW5`~C=+uk}.,ZDH[/');
define('SECURE_AUTH_KEY',  'fgoioA&K|~Q2+b!r/]NvWeo5GS`;72ZR`?Bh]C3<uiQMMzo_}07ZE|Y};1VNxM}t');
define('LOGGED_IN_KEY',    '2]QXtU}`oi=_+={4WwC`Yk}~!3O#~QET(0*F#6V=|N,hmP{)kGH:2=b-u3/:*t)_');
define('NONCE_KEY',        'alib`FqGZG e@VaZ#8Dh)8B0YSrxJuR0k[ld1,wM$NBZT5mHt~lYn(yhE|7z_m6,');
define('AUTH_SALT',        '= 7*CGCiH>$!&5^b2bR:I)pV1{8M#!@EZ|Ur-_Y4ZiYB5MB8I<Nwh!% VJ0/BW7A');
define('SECURE_AUTH_SALT', '2IT^`+aHD8M[.^25`f/DhH(]D+Ce;*er@L*95US~Q`72@RvK&UeBhR}r#t&#MF ~');
define('LOGGED_IN_SALT',   'R2+Qx%VoZC*VOK>;i:tZsmiTjZRuX2Wgc#y VDylq~Y!#GrKVu(Pcb53&qr=C- y');
define('NONCE_SALT',       'UXfCOir_!=2GD](S7b~_mgjj9Z>3L=9whv&^Zb9H._3^&y<eO*f6AA>`Xj@a$X,Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wn_';

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
