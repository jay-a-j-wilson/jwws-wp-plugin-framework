<?php

namespace JWWS\WPPF\Logger\Error_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Common\Testing\Test_Data\Test_Primitive,
};

Security::stop_direct_access();

/**
 */
final class Error_Logger_Test extends Test {
    use Test_Primitive;

    /**
     * @return void
     */
    public static function run(): void {
        // self::log();
        self::log_int();
        // self::log_array_int();
        self::log_associate_array_mixed();
        // self::log_as_argument();
    }

    /**
     * @return void
     */
    public static function log_associate_array_mixed(): void {
        Error_Logger::log(output: self::associate_array_mixed());
        Error_Logger::log_verbose(output: self::associate_array_mixed());
    }

    /**
     * @return void
     */
    public static function log_int(): void {
        Error_Logger::log(output: self::int_1());
        Error_Logger::log_verbose(output: self::int_1());
    }

    /**
     * @return void
     */
    public static function log_array_int(): void {
        Error_Logger::log(output: self::array_int());
    }

    /**
     * @return void
     */
    public static function log(): void {
        Error_Logger::log(output: self::log_passed());
    }

    /**
     * @return void
     */
    public static function log_as_argument(): void {
        $var = 'variable';
        strlen(string: $var) === strlen(string: Error_Logger::log(output: $var))
            ? self::log_passed()
            : self::log_failed();
    }
}
