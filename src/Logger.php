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
        $backtrace_json = json_encode(value: self::get_backtrace());
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
     *
     * @return void
     */
    public static function error_log(mixed $output = ''): void {
        $backtrace = print_r(value: self::get_backtrace(), return: true);
        $separator = str_repeat(string: '=', times: 200);

        error_log(message: "\n{$separator}\n\n{$backtrace}\n{$separator}");
    }

    /**
     * Gets stack trace frame data.
     */
    private static function get_backtrace(): array {
        $backtrace = debug_backtrace()[1];
        unset(
            $backtrace['class'],
            $backtrace['function'],
            $backtrace['type'],
        );

        return $backtrace;
    }
}
