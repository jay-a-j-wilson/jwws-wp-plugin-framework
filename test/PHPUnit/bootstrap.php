<?php declare(strict_types=1);

namespace JWWS\WPPF\Test\PHPUnit;

use JWWS\WPPF\Test\PHPUnit\WordPress\Configuration\Configuration;

require __DIR__ . '/../../vendor/autoload.php';

Configuration::of(
    file: __DIR__ . '/WordPress/includes/bootstrap.php',
    // options: [
    //     'active_plugins' => [
    //         'akismet/akismet.php',
    //     ],
    // ],
)
    ->init()
;