<?php
/**
 * Plugin Name:  WP Plugin Framework
 * Description:  Dependencies for JWWS plugins.
 * Version:      2.0.0b
 * Requires PHP: 8.0
 * Author:       Jay Wilson
 * Author URI:   https://jaywilsonwebsolutions.com
 * License:      GPL2.
 */

namespace JWWS\WPPF;

use JWWS\WPPF\Tests\{
    Logger_Test,
    Template_Engine,
    Loader,
    WordPress_Test,
    WooCommerce_Test
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require __DIR__ . '/vendor/autoload.php';

// Logger_Test::test();
// Template_Engine\File_Test::test();
// Template_Engine\Template_Test::test();
Loader\Plugin_Test::test();
// Loader\Plugin_Collection_Test::test();
// WordPress_Test::hook();
// WooCommerce_Test::hook();
