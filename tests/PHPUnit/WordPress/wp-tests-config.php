<?php declare(strict_types=1);

// change the next line to points to your wordpress dir
define('ABSPATH', '/Users/jaywilson/Sites/WordPress/wptest/wordpress/');
// CREATE A SYMBOLIC LINK OF wp-simple-plugin FOLDER AND PLACE IT IN THE
// WORDPRESS PLUGIN DIRECTORY.

define('WP_DEBUG', false);

// WARNING WARNING WARNING!
// tests DROPS ALL TABLES in the database. DO NOT use a production database

define('DB_NAME', 'wordpress_test');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$table_prefix = 'wptests_'; // Only numbers, letters, and underscores please!

define('WP_TESTS_DOMAIN', 'localhost');
define('WP_TESTS_EMAIL', 'admin@example.org');
define('WP_TESTS_TITLE', 'Test Blog');

define('WP_PHP_BINARY', 'php');

define('WPLANG', '');
