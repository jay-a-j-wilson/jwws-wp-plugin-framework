<?php declare(strict_types=1);

namespace JWWS\WPPF\Tests\PHPUnit;

use JWWS\WPPF\Tests\PHPUnit\WordPress\Configuration\Configuration;

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
