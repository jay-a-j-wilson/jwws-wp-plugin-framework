<?php

namespace JWWS\WPPF\Log;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Error_Log
 */
final class Error_Log extends Abstract_Log implements Log {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Prints to error log.
     *
     * @param mixed $output
     * @param int   $depth
     *
     * @return void
     */
    public static function print(mixed $output, int $depth = 1): void {
        $backtrace = print_r(
            value: self::get_backtrace(depth: $depth),
            return: true,
        );

        $separator = str_repeat(string: '=', times: 200);

        error_log(message: "\n{$separator}\n\n{$backtrace}\n{$separator}");
    }
}
