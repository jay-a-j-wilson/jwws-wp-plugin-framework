<?php

namespace JWWS\WPPF\Logger;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class Logger {
    /**
     * Do not instantiate.
     */
    protected function __construct() {
    }

    /**
     * Logs the output.
     *
     * @return mixed $output lets original variable pass through
     */
    abstract public static function log(mixed $output): mixed;

    /**
     * Gets stack trace frame data.
     */
    protected static function get_backtrace(int $depth): array {
        $backtrace = debug_backtrace()[$depth];
        unset(
            // $backtrace['class'],
            // $backtrace['function'],
            $backtrace['type'],
        );

        return $backtrace;
    }
}
