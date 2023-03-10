<?php

namespace JWWS\WPPF;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
final class Logger {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Prints to console.
     *
     * @source https://stackify.com/how-to-log-to-console-in-php/
     *
     * @param mixed  $output
     * @param string $message
     *
     * @return void
     */
    public static function console_log(
        mixed $output,
        string $message = '',
    ): void {
        $backtrace_json = json_encode(value: self::get_backtrace(depth: 1));
        $output_json    = json_encode(value: $output, flags: JSON_HEX_TAG);

        $message_code = empty($message)
            ? ''
            : "console.log('{$message}');";

        echo "<script>{$message_code}console.log({$backtrace_json});console.log({$output_json});console.log('');</script>";
    }

    /**
     * Prints to error log.
     *
     * @param mixed $output
     * @param int   $depth
     *
     * @return void
     */
    public static function error_log(mixed $output = '', int $depth = 1): void {
        $backtrace = print_r(
            value: self::get_backtrace(depth: $depth),
            return: true,
        );

        $separator = str_repeat(string: '=', times: 200);

        error_log(message: "\n{$separator}\n\n{$backtrace}\n{$separator}");
    }

    /**
     * Gets stack trace frame data.
     *
     * @param int $depth
     * 
     * @return array
     */
    private static function get_backtrace(int $depth): array {
        $backtrace = debug_backtrace()[$depth];
        unset(
            $backtrace['class'],
            $backtrace['function'],
            $backtrace['type'],
        );

        return $backtrace;
    }
}
