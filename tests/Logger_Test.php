<?php

namespace JWWS\WPPF\Tests;

use \JWWS\WPPF\Logger;

/**
 */
class Logger_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        Logger::error_log(output: 'hello world');
        Logger::error_log(output: get_post(post: 6487));

        Logger::console_log(output: 'hello world');
        Logger::console_log(output: 'hello world', message: 'test message');
        Logger::console_log(output: get_post(post: 6487));
        Logger::console_log(output: get_post(post: 6487), message: 'test message');
    }
}
