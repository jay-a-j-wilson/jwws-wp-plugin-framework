<?php

namespace JWWS\WPPF\Logger;

use JWWS\WPPF\Security\Security;

Security::stop_direct_access();

/**
 */
abstract class Abstract_Logger {
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
