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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wp_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_pass' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PR5T|mOr2k:~39LM7k`-!-O`Yf(k0YB%EKYu,h|#*4lEJ<J_GRHW#=qd|dg|:6cq');
define('SECURE_AUTH_KEY',  'DpoASoA3J8|~M%=cirhh)K0zl420hr)mRS[en-If.t4if}C1xOv&qg (}I)(*c,&');
define('LOGGED_IN_KEY',    '0sLj:?M}~No-$VdOrh~P9^:q4+64n_?#-,;8g){57! }eDcSJUbig%2IWb7qKOT}');
define('NONCE_KEY',        'PmZ KAeZ7u/dU9hBjO-9$j=_hLN6P!vF~o!QnlY1^9gP=Y.phOdlK|RVz.#$}0q<');
define('AUTH_SALT',        'mr&:qW:VXU~e;p]c=h)-8RolZ+K=;(%Z2=U,4J@)arXroY+XHpJt| lq5,Y0oCVG');
define('SECURE_AUTH_SALT', '-^5x1v9/0K~[_2gANn+*=G,,B7~Rs^[|xF=~/koX{^|s`|v`1hQblj#7Lyz+3s]e');
define('LOGGED_IN_SALT',   'Jozr]r#KX-<<6^ [oP{%bhK/Q996(7FihiI 5l/+/!<+gFh(WK(`+s5:u-D:9]-V');
define('NONCE_SALT',       '*^?azg{FC|Bz9y7s[kuv|k]rbV=y0Q;rXPKD7uK4jByjH>XGzwOjv2<wpwyMM7we');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
