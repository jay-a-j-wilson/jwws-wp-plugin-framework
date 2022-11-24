<?php

namespace JWWS\WP_Plugin_Framework\Functions\Debug;

use function JWWS\WP_Plugin_Framework\Functions\Alias\is_empty;

/**
 * Prints to console.
 *
 * @source https://stackify.com/how-to-log-to-console-in-php/
 *
 * @param mixed  $output
 * @param string $message
 * @param bool   $with_script_tags
 *
 * @return void
 */
function console_log(
    mixed $output,
    string $message = '',
    bool $with_script_tags = true,
): void {
    $backtrace_json = json_encode(value: debug_backtrace()[0]);
    $output_json    = json_encode(value: $output, flags: JSON_HEX_TAG);
    $js_code        = is_empty(var: $message)
        ? "console.log({$backtrace_json});console.log({$output_json});console.log('');"
        : "console.log({$backtrace_json});console.log('{$message}');console.log({$output_json});console.log('');";

    echo $with_script_tags
        ? "<script>{$js_code}</script>"
        : $js_code;
}

/**
 * Logs an error message.
 *
 * @param mixed  $message
 * @param string $separator_char
 *
 * @return mixed
 */
function log_error(mixed $message, string $separator_char = '='): mixed {
    $backtrace     = print_r(value: debug_backtrace()[0], return: true);
    $valid_message = print_r(value: $message, return: true);
    $separator     = str_repeat(string: $separator_char, times: 210);

    error_log(message: "\n{$separator}\n\n{$backtrace}\n{$separator}");
    //error_log("\n{$separator}\n\n{$backtrace}\n\n{$valid_message}\n{$separator}");

    return $message;
}

/**
 * Debugs hook.
 *
 * @param string $hook
 *
 * @return void
 */
function debug_hook(string $hook = 'all'): void {
    add_action(
        tag: $hook,
        function_to_add: function (): void {
            console_log(output: current_filter());
        },
    );
}
