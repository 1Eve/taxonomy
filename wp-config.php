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
define( 'DB_NAME', 'assessment5' );

/** Database username */
define( 'DB_USER', 'admin11' );

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
define( 'AUTH_KEY',         'gYM4E=7$L(a)Rn&o/4aIeKDd:q3?rv&6BRmL7Q_SN*YX/ws_O=a4WU+@5mx0^?lk' );
define( 'SECURE_AUTH_KEY',  '@Yo+IM*1XU>R)7[s%]D2Y%Pe6mw<{Uq3x5y^tqK`x)|37O$:{!U-a9,sYze:hrJK' );
define( 'LOGGED_IN_KEY',    'DU+Y@`qXNc{-R32OVC>.mMGcF=L5[.a)`_e{$#JHPw2lgmwQU@xj(u~~voId9rFZ' );
define( 'NONCE_KEY',        'y978@ZbP#vp9$^M%d=YTA@lxecuc}B*vJv0:X6~cTp-2VZon59JomrDk)>E;-}3a' );
define( 'AUTH_SALT',        '}Fi+O{NX5!}8BJ}N.m8Py^YKtB;A{R#wTnE; 4l?;W5=[d:Is)OmY~%.F1UJY2K.' );
define( 'SECURE_AUTH_SALT', 'K6aFRbs`3#@4lnr}8+ffA=Ln~<:U4nzp#IK.|=}u__Ycd*EH|LvE?hKQcqC/8|n$' );
define( 'LOGGED_IN_SALT',   '7_QZfxO=HHA(0,lTLV73U$<N]/q:&Nxnwj{LY+x0/l)qE0n)SBb-j[!w(OKLH%/V' );
define( 'NONCE_SALT',       'iq(TXzf<aYA1b9rm0,:Gu039(y[7SCFNW!fwLxw(K$[Y*Oh&3DCQ|a}mJ3`im;~=' );

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
