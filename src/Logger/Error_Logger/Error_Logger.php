<?php

namespace JWWS\WPPF\Logger\Error_Logger;

use JWWS\WPPF\{
    Security\Security,
    Logger\Abstract_Logger,
    Logger\Logger,
    Traits\Variable_Handler,
};

Security::stop_direct_access();

/**
 */
final class Error_Logger extends Abstract_Logger implements Logger {
    use Variable_Handler;

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
     * @return mixed
     */
    public static function log(mixed $output, int $depth = 1): mixed {
        error_log(
            message: self::generate_message(
                contents: print_r(
                    value: self::get_backtrace(depth: $depth)['args'][0],
                    return: true,
                ),
            ),
        );

        return $output;
    }

    /**
     * @param mixed $output
     * @param int   $depth
     *
     * @return mixed
     */
    public static function log_verbose(mixed $output, int $depth = 1): mixed {
        error_log(
            message: self::generate_message(
                contents: self::pretty_var_dump_r(
                    value: self::get_backtrace(depth: $depth)['args'][0],
                    return: true,
                ),
            ),
        );

        return $output;
    }

    /**
     * @param string $contents
     * @param int    $depth
     *
     * @return string
     */
    private static function generate_message(
        string $contents,
        int $depth = 1,
    ): string {
        $separator       = str_repeat(string: '=', times: 210);
        $separator_light = str_repeat(string: '.', times: 210);

        $message = "\n";
        $message .= $separator;
        $message .= "\n";
        $message .= 'FILE: ' . self::get_backtrace(depth: $depth)['file'];
        $message .= "\n";
        $message .= 'LINE: ' . self::get_backtrace(depth: $depth)['line'];
        $message .= "\n";
        $message .= $separator_light;
        $message .= "\n\n";
        $message .= $contents;
        $message .= "\n";
        $message .= $separator;

        return $message;
    }
}
