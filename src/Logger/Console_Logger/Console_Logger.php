<?php declare(strict_types=1);

namespace JWWS\WPPF\Logger\Console_Logger;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Logger,
    Template\Template,
};

// Security::stop_direct_access();

/**
 * Web browser console logger.
 */
final class Console_Logger extends Logger {
    /**
     * Prints to console.
     *
     * @source https://stackify.com/how-to-log-to-console-in-php/
     */
    public static function log(
        mixed $output,
        string $message = '',
    ): mixed {
        echo Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(key: 'message', value: $message)
            ->assign(
                key: 'backtrace',
                value: json_encode(
                    value: self::get_backtrace(depth: 1),
                ),
            )
            ->assign(
                key: 'output',
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
