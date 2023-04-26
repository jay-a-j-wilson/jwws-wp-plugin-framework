<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Logger_Tests extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::error_logger();
        self::console_logger();
    }

    /**
     * Undocumented function.
     */
    private static function error_logger(): void {
        Logger\Error_Logger\Error_Logger_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function console_logger(): void {
        Logger\Console_Logger\Console_Logger_Tests::run();
    }
}
