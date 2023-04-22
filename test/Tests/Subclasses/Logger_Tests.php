<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Logger_Tests extends Tests {
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
        Logger\Error_Logger\Error_Logger_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function console_logger(): void {
        Logger\Console_Logger\Console_Logger_Test::run();
    }
}
