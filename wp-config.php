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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'kU48O9L+DEd+1ToJx8Xdi85Qdq4O+PAUYF8A5B/qW3avOVLdUKfi9W1obumXs0RsQtwlXcFcjc1e4EbprMJFwg==');
define('SECURE_AUTH_KEY',  '2+7Y5hOIIxsg/vROmmMoB4v/LiteIFR3/AyKfqq+PzzBwwb+EAL1ZrlSbwtxQsOk/EdO5CySPIxbvEGYZueV3w==');
define('LOGGED_IN_KEY',    'eAS/cjBqftfpmYoNz6Fgcx5Pk4I6EYWJVwfasbKVK+XzKIpPI84abd3KvegtGznVY/5oXgvBvrcTIe0pgdjwJw==');
define('NONCE_KEY',        'eAgljImMRh+row1aGlJskDI+dCyvBY1UDcMwGAsWeXr1TOgS90boah0GPpdw3wDUSZrJ/HbEj8z57fDcJPBUUA==');
define('AUTH_SALT',        'EFM+gDjdGrsQZNcJof354hBYw7Q4+syxo9DiUFsB2+GFU3KnV7gRkxEKJfquQ8oD8k1XYavkaK6/yric8iLvJA==');
define('SECURE_AUTH_SALT', 'WOppIpoAxx1GgHO4p9glMjEP73179wesxnZm+d8DOwd0Av4osTG81keUJl3Vl+SXUZ+7nYd6Q+Dvua8qmjb9Fw==');
define('LOGGED_IN_SALT',   '3uFs1j2P0VpsrE2RD1eeIV2JLzQkhizuAkyT0ZHACVmSv6ndHREZhRTtdZ3F9/y61h2zXyK01//5sOzFJiJuRw==');
define('NONCE_SALT',       'q4j/lzdroFOW/yKDAV3+87IEYHgWAyt3wvJAudxJx8m5BHouKZjsIM9zmDCEuJ30RQ3cH8fT4WM3t17/Jnpmfw==');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
