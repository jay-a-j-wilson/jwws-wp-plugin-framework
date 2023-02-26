<?php

namespace JWWS\WP_Plugin_Framework\Tests\Functions\Debug;

use function JWWS\WP_Plugin_Framework\Functions\Debug\{
    log_var,
    console_log
};

require __DIR__ . '/../../vendor/autoload.php';

console_log('Test');

$array = [1, 2, 3, 4, 5];

// log_var($array);
