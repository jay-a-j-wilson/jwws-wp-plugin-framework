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
    Log,
    Template,
    Loader,
    WordPress_Test,
    WooCommerce_Test
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require __DIR__ . '/vendor/autoload.php';

Log\Error_Log_Test::test();
Log\Console_Log\Console_Log_Test::test();
Template\Template_File_Test::test();
Template\Template_Test::test();
Loader\Plugin\Plugin_Test::test();
Loader\Plugin\Plugin_Collection_Test::test();
WordPress_Test::hook();
WooCommerce_Test::hook();