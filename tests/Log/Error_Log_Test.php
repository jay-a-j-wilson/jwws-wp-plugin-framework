<?php

namespace JWWS\WPPF\Tests\Log;

use \JWWS\WPPF\Log\Error_Log;

/**
 */
final class Error_Log_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        Error_Log::print(output: 'test');
    }
}
