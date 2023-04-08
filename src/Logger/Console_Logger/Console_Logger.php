<?php

namespace JWWS\WPPF\Logger\Console_Logger;

use JWWS\WPPF\{
    Security\Security,
    Template\Template\Template,
    Logger\Abstract_Logger,
    Logger\Logger
};

Security::stop_direct_access();

/**
 */
final class Console_Logger extends Abstract_Logger implements Logger {
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
     * @return mixed
     */
    public static function log(
        mixed $output,
        string $message = '',
    ): mixed {
        echo Template::create_from(filename: __DIR__ . '/templates/template')
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
