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
define( 'DB_NAME', 'wordpress_aibang');

/** MySQL database username */
define( 'DB_USER', 'root');

/** MySQL database password */
define( 'DB_PASSWORD', 'qwer1234@');

/** MySQL hostname */
define( 'DB_HOST', 'db-mariadb');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

define('ENABLE_CACHE', TRUE);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9+E0;!_-+UL[Lyh@=^V57O!VzquwDa3+&W>g$e*oOdR!Tv1vR5sZy7=*{j8uD]sV' );
define( 'SECURE_AUTH_KEY',  '5rA,CgD2~_ft?K,TBje_Mi2LSz}sRN2,WA,V7*/N?ZUQV_7/7QqR.?(5osg1U]d|' );
define( 'LOGGED_IN_KEY',    '}aq(4C@r )do:.RldjQ=<mUg3@%Ea;O+|jR?eCyv1mbmzRvre?^VckXU!OT]cB<b' );
define( 'NONCE_KEY',        '4g#<2b!(*1aaK{ji46e$lMV~Fq_.f{NDs!n$3)_<PvE5:.R!)c8x4B#4M5gg0|r`' );
define( 'AUTH_SALT',        'bUqJy9tKt]*KmJ{%7No^^- gY_.KOqRA0KF-?d]W)-xn6g$^_Q5}SEr=#[PiZGwJ' );
define( 'SECURE_AUTH_SALT', 'e=59KxOLd5SMtWm:Yvo%hRh~ q/l@vz/BvDmQQ{8e]_W86vu*sd4bWn8|LHGkPTT' );
define( 'LOGGED_IN_SALT',   'A=V>UlRteSIm3{{%V&$cLKplUcJA[#V<21l@L3{uleo7q NFrcBi1Uo5r`FIj{-(' );
define( 'NONCE_SALT',       'bQ-BwP-j)1%=|6XdNFA34T>|V=fqlMRg*<ph5.@@Yrb*|&k%gm,LCQH;>xS3u&h;' );

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
