<?php

namespace JWWS\WPPF\Log;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Abstract_Log
 */
abstract class Abstract_Log {
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
