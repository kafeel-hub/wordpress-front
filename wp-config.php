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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'theme' );
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
define( 'AUTH_KEY',         'i$b7g6iB(Q3WSO%t|;mf3y]BDbbBabm{jmm/0:%<Cx-KBauz m19+U`q!+BQmqgA' );
define( 'SECURE_AUTH_KEY',  'oJ7x(StbQIdNmN.v#X6 unu_hr8J{v@I+{;G%us.RvZ7~)=S{7afLg~]|=5t{U>e' );
define( 'LOGGED_IN_KEY',    'o{[#5oTuLtSX`lI.->pEyc2WuW2F;DoP~EVdqxY:i]#I8DnN:e;E{(:$5jLHGzQX' );
define( 'NONCE_KEY',        '*%@+6_^tIoJ= F1&?>DW%z[@W^U7ve36jnasAf(~%qHI.`:&X1j?0C=lDm4_.0<-' );
define( 'AUTH_SALT',        'Ae_{my((<-1P,NE+uQweJL1[,w3L[%{a5[*fWHuc>bVA&igh[Uq8.$lFwKlz?fYw' );
define( 'SECURE_AUTH_SALT', '{.i3?!Y(RP i}gFe^K2DO:}URTo.#e@M M5 r}k):lns|{M,-r + 1@[+~!;DRrT' );
define( 'LOGGED_IN_SALT',   'XX{YUi:CV60RC],%*Hamt_7..-=P})v| qG(r4fR%$KJb!D^.L?[&h,hvHj.|8N=' );
define( 'NONCE_SALT',       'nb%SjtKV1&{3om]UB28rap.ZuP,hi]B_t/,*UeOb@.+]vU`-t21;0T RQ;NgOHkZ' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_theme';
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
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';