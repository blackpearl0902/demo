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
define( 'DB_NAME', 'bhagwanji' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'j3Y/T/mmI!VCD@(#J]U18thKUt66;BS|m_FDCo9~66yKJ.-djo*CVM`{81*6h**3' );
define( 'SECURE_AUTH_KEY',  'Bg+YFD4[&oIMD sVPZl%4*7qsvY@sV;Q!c?G{SX{O%:ey2n|@}9c(/.},ctB8e=T' );
define( 'LOGGED_IN_KEY',    'UQ]F+kQBZ7rsQbT4i29l1T_5u^?.>tq)xt){^me/W^GAPbUg/a.$R->0{KT[#2S$' );
define( 'NONCE_KEY',        '_6sGYqNJgCU4`nReL,^%NrrA1/h0+0[K,ra0l0l[mn(hEb[T-J5dU7-98sq2bYE/' );
define( 'AUTH_SALT',        'p|5;sCA6jOM3rEtpv!1+9T$(bQZowu Dc7Lz!chXOJx.V+<op=6uC]6G<sY;cjJT' );
define( 'SECURE_AUTH_SALT', '7qHtPL{?{ohox5W/v~YE9GT)T:%3mPxq0c~9`N7XFxujgc9Z$Cxt[Xz}Fq9.lCta' );
define( 'LOGGED_IN_SALT',   'mqM|DiXX{YAbYs~t37#>udM>tO2RNqZWcn6[rtbWLYujD;k4dN_FE$h|{6`Jf{W(' );
define( 'NONCE_SALT',       'dC}8Y*he,F_)?zf,u@*&o`_$#k&UVvKrWaofx{Zh0d;Lu- }qV)NE8$Os#`C8p[H' );

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
