<?php

namespace JWWS\WPPF\Logger\Console_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Console_Logger_Test extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::log();
        self::log_as_argument();
    }

    /**
     * Undocumented function.
     */
    public static function log(): void {
        Console_Logger::log(output: self::log_passed());
    }

    /**
     * Undocumented function.
     */
    public static function log_as_argument(): void {
        $var = 'variable';
        strlen(string: $var) === strlen(string: Console_Logger::log(output: $var))
            ? self::log_passed()
            : self::log_failed();
    }
}
