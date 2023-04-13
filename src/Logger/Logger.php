<?php

namespace JWWS\WPPF\Logger;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
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
     * @param mixed $output
     *
     * @return mixed $output lets orginal variable pass through
     */
    abstract public static function log(mixed $output): mixed;

    /**
     * Gets stack trace frame data.
     *
     * @param int $depth
     *
     * @return array
     */
    protected static function get_backtrace(int $depth): array {
        $backtrace = debug_backtrace()[$depth];
        unset(
            $backtrace['class'],
            $backtrace['function'],
            $backtrace['type'],
        );

        return $backtrace;
    }
}
