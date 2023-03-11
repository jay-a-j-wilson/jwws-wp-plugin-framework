<?php

namespace JWWS\WPPF\Log\Console_Log;

use JWWS\WPPF\{
    Template\Template,
    Log\Abstract_Log,
    Log\Log
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Console_Log.
 */
final class Console_Log extends Abstract_Log implements Log {
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
    public static function print(
        mixed $output,
        string $message = '',
    ): void {
        echo Template::create(filename: __DIR__ . '/templates/template')
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
    }
}
