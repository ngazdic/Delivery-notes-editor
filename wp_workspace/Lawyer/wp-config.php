<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'lawyer' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Theprow10#' );

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
define( 'AUTH_KEY',         '}gdc0z0x:ZPFj<LBc7{$_Sx>s-,!.|oq=vy>6g_&6vc#T5[r WCkTc<=fS(M^lWl' );
define( 'SECURE_AUTH_KEY',  'v#5`nc:/h!%XrB2~ZTYG?,.`%Utc+6BI`W>feUWJ8[F 6iMT(A2Ru%h#&Ua]3~B`' );
define( 'LOGGED_IN_KEY',    '_EBmA9vJanE]+avjO_[*Qk k&L$Y%}cPfvR{Q[OM{5c3)Y$I;R%O,)[,{/0b-{Th' );
define( 'NONCE_KEY',        '`8~xNT.];@xMOk.ZeS.vXpI9DMbl4,%GU?(IUy^*+oS-o+EoD:UjrPF_?,+MMR8}' );
define( 'AUTH_SALT',        'JBFgo%AB%=?D5nP+YI]t1YAwZ&-bm`)-Zo4wJ6A+6}%E3UmfFahoe_X^~AS!0M;Z' );
define( 'SECURE_AUTH_SALT', 'J-`19JN,3}L.x_ler<;/$l#9 t8`~oQ^uW*cU*U=RK}j8pSD::,I{Se|~!N*SNHp' );
define( 'LOGGED_IN_SALT',   '%UWi^L<2i6[rYa(>Zo~zI#%;D-,}0RVj`{YqQs2HxqnSw6@<pUKe8WKT~:EP;WiN' );
define( 'NONCE_SALT',       'C)#mCmp6TeFE{VHKR]^)-!j5 ]zj|Uf<ryuX-5ZgU:%H[[GT@^-}f`VOeSg:-|No' );

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
