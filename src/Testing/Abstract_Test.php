<?php

namespace JWWS\WPPF\Testing;

use JWWS\WPPF\Security\Security;

Security::stop_direct_access();

/**
 */
abstract class Abstract_Test {
    /**
     * Do not instatiate.
     *
     * @return void
     */
    protected function __construct() {
    }

    /**
     * Prints test passing to error log.
     *
     * @param string $test use __METHOD__
     *
     * @return array
     */
    protected static function log_passed(): void {
        self::log(grade: 'PASSED');
    }

    /**
     * Prints test failing to error log.
     *
     * @param string $test use __METHOD__
     *
     * @return array
     */
    protected static function log_failed(): void {
        self::log(grade: 'FAILED');
    }

    /**
     * @param string $grade
     * @param string $test
     *
     * @return void
     */
    private static function log(string $grade): void {
        $backtrace = debug_backtrace()[2];
        error_log(message: "TEST {$grade} - {$backtrace['class']}::{$backtrace['function']}");
    }
}
