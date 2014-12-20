<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jl_loudenart');

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
define('AUTH_KEY',         '1#n 3<vD<QYahAw$@f)Sft}h=XYkXmvsALH YHTP.14,*&|rRuI|Xy+DK4?~O`|c');
define('SECURE_AUTH_KEY',  '!@gag-=;S&x.%dUvyg=k{6nj+)C(-W-<0x6_H_=871a8-7nukC&cFDUY|h~Hyg@=');
define('LOGGED_IN_KEY',    'y+2ql{|0G*vF;`.c+qRe?W^RbLd7%|0<%~&9+h/JO`/:RxMUEtZIbZiar^:)`4<6');
define('NONCE_KEY',        'wj2pU+(,FdUn:~ZOM}sE[8A}`N~mn,YtiABrSZ.Y6RnJ`4C|}c%-{n00c Q+Kvx1');
define('AUTH_SALT',        '7I_CBgV^yRwaSpT_+hjtgQ2ht*gw3`_I+*Kxa_,$Xj?_ hOpn:VTSLJvd{t.hB7C');
define('SECURE_AUTH_SALT', 'Go,OEj?j<M_9K+Z]PpViORI ?.4j-S+IahgsfKit!CtkhyIq!2(`x|Oso}Jcp`G/');
define('LOGGED_IN_SALT',   '}7hw]k]eEvC(Scz|l!FQbqydorb/a;968]YxRTt;PXR3V}gosQT#O(g-k,-G{8eH');
define('NONCE_SALT',       '+[5<Oai[=.BLba,BKsKdLApI`2-0*D@~Ybz$^tNF^;mL:8>G>?VvKy4n`-Q+Xsv^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jl_';

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
