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
    WooCommerce\WooCommerce_Test,
    Collection\Collection_Test,
    Common\Security\Security,
};
use JWWS\WPPF\Traits\{
    Var_Dump_R\Var_Dump_R_Test,
    Var_Export_R\Var_Export_R_Test,
    Log\Log_Test,
};
use JWWS\WPPF\Loader\{
    Plugin\Plugin\Plugin_Test,
    Plugin\Plugin_Collection\Plugin_Collection_Test
};
use JWWS\WPPF\Template\{
    Template\Template_Test\Template_Test,
    Template_File\Template_File_Test\Template_File_Test
};
use JWWS\WPPF\Logger\{
    Error_Logger\Error_Logger_Test,
    Console_Logger\Console_Logger_Test,
    Backtrace\Backtrace_Test,
};
use JWWS\WPPF\WordPress\Repo\{
    User_Repo\WP_User_Repo\WP_User_Repo_Test,
    Term_Repo\WP_Term_Repo\WP_Term_Repo_Test,
    Post_Repo\WP_Post_Repo\WP_Post_Repo_Test,
    Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo_Test,
    Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo_Test,
};
use JWWS\WPPF\WordPress\Utility\Generic_Test;

require __DIR__ . '/vendor/autoload.php';

Security::stop_direct_access();

WP_Post_Type_Repo_Test::run();
WP_Post_Repo_Test::run();
WP_User_Repo_Test::run();
WP_Term_Repo_Test::run();
WP_Taxonomy_Repo_Test::run();
Log_Test::run();
Collection_Test::run();
Var_Dump_R_Test::run();
Var_Export_R_Test::run();
Backtrace_Test::run();
Error_Logger_Test::run();
Template_File_Test::run();
Template_Test::run();
Plugin_Test::run();
Plugin_Collection_Test::run();
Generic_Test::run();
WooCommerce_Test::run();
Backtrace_Test::run();
