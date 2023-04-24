<?php

namespace JWWS\WPPF\Common\Testing;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class Tests {
    /**
     * Do not instantiate.
     *
     * @return void
     */
    protected function __construct() {
    }

    /**
     * Undocumented function.
     */
    abstract public static function run(): void;

    /**
     * Prints test passing to error log.
     */
    protected static function log_passed(): void {
        self::log(grade: 'PASSED');
    }

    /**
     * Prints test failing to error log.
     */
    protected static function log_failed(): void {
        self::log(grade: 'FAILED');
    }

    /**
     * Undocumented function.
     */
    private static function log(string $grade): void {
        $backtrace = debug_backtrace()[2];
        error_log(message: "TEST {$grade} - {$backtrace['class']}::{$backtrace['function']}");
    }
}
