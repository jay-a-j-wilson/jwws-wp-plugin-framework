<?php

namespace JWWS\WPPF\Logger\Console_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Template\Template\Template,
    Logger\Logger,
};

Security::stop_direct_access();

/**
 */
final class Console_Logger extends Logger {
    /**
     * Prints to console.
     *
     * @source https://stackify.com/how-to-log-to-console-in-php/
     *
     * @param mixed  $output
     * @param string $message
     *
     * @return mixed
     */
    public static function log(
        mixed $output,
        string $message = '',
    ): mixed {
        echo Template::of(filename: __DIR__ . '/templates/template')
            ->assign(names: 'message', value: $message)
            ->assign(
                names: 'backtrace',
                value: json_encode(
                    value: self::get_backtrace(depth: 1),
                ),
            )
            ->assign(
                names: 'output',
                value: json_encode(
                    value: $output,
                    flags: JSON_HEX_TAG,
                ),
            )
            ->output()
        ;

        return $output;
    }
}
