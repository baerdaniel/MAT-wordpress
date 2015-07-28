<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'mate');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '#L5Mx+&?:OfU+/kuuz,P}%Fwo;?<wiku_d.e+1[=+8<r5+>&8>n3=nKGsA7JT#k:');
define('SECURE_AUTH_KEY',  '-|X5?Y=yq7~Ff]v9SN6}X(zP<>)>VG:7s>XEG~pb^B<XpK58ZO4gs,Q/dUSi#iFy');
define('LOGGED_IN_KEY',    '<|-Awycr;JjC.GWvWnBOTHy-R.vxS(c+Q[jb&lm5.2-&wdgLeE%kWg-+{n(+=.?%');
define('NONCE_KEY',        'e`aGG|(AoX2WT-4{>Z~-Y=k7+_J50y VLG!krhg+gAPG-j::<%AU2W$,6;>8$v+.');
define('AUTH_SALT',        'Q%rzLM-[u/bHv?!vazQ}tdkT36D{YS2|[(3|6#sDW32#yy{:+~5UB@N=Z5Mru#F4');
define('SECURE_AUTH_SALT', '?Aa|v(wW}Q-**<p!,d9A`+|)9,to{_ZgLnsd1il|LDPqL~O1z:/7t!+-$%Fjs/he');
define('LOGGED_IN_SALT',   '$a:>2]W4E0SOkN]&-!iGSWb3yGfe.6 ,)C&6YE61#OQpM(mG?+5;VE:vxMprl.L{');
define('NONCE_SALT',       'W#+>X^j1R47C|Jw*<pkvgB{gdI)]$e`,.P-rhs@,el|A$*8OOVen;,ai7t&qZ[lt');

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
