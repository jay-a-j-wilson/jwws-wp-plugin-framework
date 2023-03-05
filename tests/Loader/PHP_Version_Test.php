<?php

namespace JWWS\WPPF\Tests\Loader;

use \JWWS\WPPF\{
    Loader\PHP_Version,
    Logger
};

/**
 * PHP_Version test.
 */
class PHP_Version_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        $php_version = (new PHP_Version(
            min: '7',
            max: '8',
        ));

        Logger::to_error_log(output: $php_version->get_min());
        Logger::to_error_log(output: $php_version->get_max());
    }
}
