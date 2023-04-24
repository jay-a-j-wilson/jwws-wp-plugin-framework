<?php

namespace JWWS\WPPF\Logger\Error_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Logger,
    Template\Template,
    Traits\Variable_Handler,
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Error_Logger extends Logger {
    use Variable_Handler;

    /**
     * Prints to error log.
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
     * Undocumented function.
     */
    private static function generate_message(
        string $contents,
        int $depth,
    ): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(names: 'newline_char', value: "\n")
            ->assign(names: 'separator_length', value: 210)
            ->assign(names: 'contents', value: $contents)
            ->assign(
                names: 'class',
                value: self::get_backtrace(depth: $depth + 2)['class'],
            )
            ->assign(
                names: 'function',
                value: self::get_backtrace(depth: $depth + 2)['function'],
            )
            ->assign(
                names: 'file',
                value: self::get_backtrace(depth: $depth + 1)['file'],
            )
            ->assign(
                names: 'line',
                value: self::get_backtrace(depth: $depth + 1)['line'],
            )
            ->output()
        ;
    }
}
