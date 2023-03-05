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
        Logger::to_error_log(output: 'hello world');
        Logger::to_error_log(output: get_post(post: 6487));

        Logger::to_console(output: 'hello world');
        Logger::to_console(output: 'hello world', message: 'test message');
        Logger::to_console(output: get_post(post: 6487));
        Logger::to_console(output: get_post(post: 6487), message: 'test message');
    }
}
