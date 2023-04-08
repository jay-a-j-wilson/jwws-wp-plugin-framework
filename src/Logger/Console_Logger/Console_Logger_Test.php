<?php

namespace JWWS\WPPF\Logger\Console_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test
};

Security::stop_direct_access();

/**
 */
final class Console_Logger_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::log();
        self::log_as_argument();
    }

    /**
     * @return void
     */
    public static function log(): void {
        Console_Logger::log(output: self::log_passed());
    }

    /**
     * @return void
     */
    public static function log_as_argument(): void {
        $var = 'variable';
        strlen(string: $var) === strlen(string: Console_Logger::log(output: $var))
            ? self::log_passed()
            : self::log_failed();
    }
}
