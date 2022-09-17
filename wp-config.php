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
define( 'DB_NAME', 'testwork763' );

/** Database username */
define( 'DB_USER', 'testwork763' );

/** Database password */
define( 'DB_PASSWORD', 'GErG2mp9Kt_1]5T2' );

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
define( 'AUTH_KEY',         '46+=GGlit&RM|H=)oSnWYGiQNSku{BK4Z9]=*$q~X( 4coodPKDf&bgo.$+Ppd&o' );
define( 'SECURE_AUTH_KEY',  'b$CR2 4}P;qML)d|?ttQxsS/4vu)}T=]6{m|oOcZOt9&=}DkDVRBMoIi/UWuiE_{' );
define( 'LOGGED_IN_KEY',    '2CKF7aFw[[()=!PO:~x8b9eB>Z_AT?- !=iS.xc/cY>5UNj.G+2.|Hi(sZLfdd$K' );
define( 'NONCE_KEY',        'glW4L$lxTkSf+]RqRj.Ulgq-@R&/Lq?V[Y2bYbZ*O=|)?W Y4,/]k@i2h.nhA*w5' );
define( 'AUTH_SALT',        'S,jd>M}.9T?y] ((EjY{NaoPV]q%Q(jhvZCY-k#NUk`zQ:t3G9BZ5a)2*M!o/o1k' );
define( 'SECURE_AUTH_SALT', 'W<1=*$qgf)pzWa&0QFsd#dW#da LX@P-`xj}H?YO5)*8jplYj*1g!H/Qpu; ul_7' );
define( 'LOGGED_IN_SALT',   '$X[O3t>}E{QCLj&y*2>yvxPTaTbW:0$b19I47b;K<U|XMl?<?s.mQfWvfY>P;l0V' );
define( 'NONCE_SALT',       '0bVbTn{U.Q~K<4$kC4$954ZC%$wNuONH%:1n0x?5)YWX6&Jk~Y8a;--K~Tj>kZV0' );


define('WPSITEURL','https://ms-studio.tk/testwork_763');
define('WPHOME','https://ms-studio.tk/testwork_763');
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
