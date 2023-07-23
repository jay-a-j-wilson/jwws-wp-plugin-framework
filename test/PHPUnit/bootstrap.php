<?php //declare(strict_types=1);

namespace JWWS\WPPF\Test\PHPUnit;

use JWWS\WPPF\Test\PHPUnit\WordPress\Configuration\Configuration;

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once __DIR__ . '/../../vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

Configuration::of(
    file: getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php',
    // file: __DIR__ . '/WordPress/includes/bootstrap.php',
    // options: [
    //     'active_plugins' => [
    //         'akismet/akismet.php',
    //     ],
    // ],
)
    ->init()
;