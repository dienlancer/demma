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
define('DB_NAME', 'demma');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'zV=-nMt(JCP3;:{caQpuz&9(&4w9@5M3peN3}T3%n5NkHxj7_(.[nX1Nj@&f`X&O');
define('SECURE_AUTH_KEY',  'Mkw0eOssFmIO!QN!&wzp,<@Se+S:>ZTu$X[A/-uey{L/[~FFg_;>{Ixf~#MLo+AR');
define('LOGGED_IN_KEY',    ',An[n[MlJjwK/B0BM~L/K2B%9m/9-773Yu(V]_KhvXlW^XKw8x@okN_{zbD9@pcC');
define('NONCE_KEY',        '%R]rlhl%*4SS&Tc2=r7vA/T6!I?./ Rp_EnkDhkal3UvO*E?W$<+VZ/I^1?]Pd5~');
define('AUTH_SALT',        'L%;I~I^lAYv,(2Qw*UsTn@@bMd+!-b)cl<O92U:3y].`JyUO{Ki0SrI4k<UB`BF,');
define('SECURE_AUTH_SALT', 'o8V<}/a *!o3PV2idx#Z^ g]R0Zb8pHv[s#p2L%Myh[73, Z_B1z5uK.gz92Xx4{');
define('LOGGED_IN_SALT',   ']_ #y~AF,ZAoM&+D7WqoNu_w*XbB{0E6S7er*+gpD3:_%U@BAO)UkwLo*fHTbU9N');
define('NONCE_SALT',       '>Voy84n,Ey[b?|yn(0Gei|q:<=7nd2g6&|<jbm?*-:_-Ky[KwnLE?zCpLu+fn,xU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'zsqw_';

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
