<?php

namespace JWWS\WPPF\Logger\Error_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Logger,
    Template\Template\Template,
    Traits\Variable_Handler,
};

Security::stop_direct_access();

/**
 */
final class Error_Logger extends Logger {
    use Variable_Handler;

    /**
     * Prints to error log.
     *
     * @param mixed $output
     * @param int   $depth
     *
     * @return mixed
     */
    public static function log(mixed $output, int $depth = 1): mixed {
        error_log(message: self::generate_message(
            contents: print_r(
                value: self::get_backtrace(depth: $depth)['args'][0],
                return: true,
            ),
            depth: $depth,
        ));

        return $output;
    }

    /**
     * Prints to error log with variable types.
     *
     * @param mixed $output
     * @param int   $depth
     *
     * @return mixed
     */
    public static function log_verbose(mixed $output, int $depth = 1): mixed {
        error_log(message: self::generate_message(
            contents: self::pretty_var_dump_r(
                value: self::get_backtrace(depth: $depth)['args'][0],
                return: true,
            ),
            depth: $depth,
        ));

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
        int $depth,
    ): string {
        return Template::of(filename: __DIR__ . '/templates/template')
            ->assign(names: 'newline_char', value: "\n")
            ->assign(names: 'separator_length', value: 210)
            ->assign(names: 'contents', value: $contents)
            ->assign(
                names: 'backtrace',
                value: self::get_backtrace(depth: $depth + 1),
            )
            ->output()
        ;
    }
}
