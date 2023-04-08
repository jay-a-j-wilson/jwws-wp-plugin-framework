<?php
/**
 * Plugin Name:  WP Plugin Framework
 * Description:  Dependencies for JWWS plugins.
 * Version:      3.0.0b
 * Requires PHP: 8.0
 * Author:       Jay Wilson
 * Author URI:   https://jaywilsonwebsolutions.com
 * License:      GPL2.
 */

namespace JWWS\WPPF;

use JWWS\WPPF\{
    Logger\Error_Logger\Error_Logger_Test,
    Logger\Console_Logger\Console_Logger_Test,
    Logger\Backtrace\Backtrace_Test,
    Template\Template\Template_Test\Template_Test,
    Template\Template_File\Template_File_Test\Template_File_Test,
    Loader\Plugin\Plugin\Plugin_Test,
    Loader\Plugin\Plugin_Collection\Plugin_Collection_Test,
    WordPress\WordPress_Test,
    WooCommerce\WooCommerce_Test,
    Collection\Collection_Test,
    Traits\Var_Dump_R\Var_Dump_R_Test,
    Traits\Var_Export_R\Var_Export_R_Test,
    Traits\Log\Log_Test,
    Common\Security\Security,
    WordPress\Terms\Product,
    WordPress\Terms\Post,
    WordPress\Utilities\Generic_Test
};

require __DIR__ . '/vendor/autoload.php';

Security::stop_direct_access();

Post\Categories\Categories_Test::run();
Post\Tags\Tags_Test::run();

Product\Categories\Categories_Test::run();
Product\Tags\Tags_Test::run();

Log_Test::run();
Collection_Test::run();
Var_Dump_R_Test::run();
Var_Export_R_Test::run();
Console_Logger_Test::run();
Error_Logger_Test::run();
Template_File_Test::run();
Template_Test::run();
Plugin_Test::run();
Plugin_Collection_Test::run();
Generic_Test::run();
WooCommerce_Test::run();
Backtrace_Test::run();
