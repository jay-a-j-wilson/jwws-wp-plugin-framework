<?php
/*
Plugin Name: WP Plugin Framework
description: Dependencies for JWWS plugins.
Version:     2.0.0b
Author:      Jay Wilson
Author URI:  https://jaywilsonwebsolutions.com
License:     GPL2
*/

namespace JWWS\WPPF;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require __DIR__ . '/vendor/autoload.php';

// Tests\Logger_Test::test();
// Tests\Template_Engine\Template_Test::test();
// Tests\Loader\Plugin_Test::test();
// Tests\Loader\PHP_Version_Test::test();
Tests\WordPress_Test::hook();
// Tests\WooCommerce_Test::hook();

