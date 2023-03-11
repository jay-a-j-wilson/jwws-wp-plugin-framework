<?php

namespace JWWS\WPPF\Tests\Log\Console_Log;

use \JWWS\WPPF\Log\Console_Log\Console_Log;

/**
 */
final class Console_Log_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        Console_Log::print(output: 'test');
        Console_Log::print(output: 'test2', message: 'message');
    }
}
