<?php

namespace JWWS\WP_Plugin_Framework\Functions\Debug;

use \DateTimeImmutable;
use \DateTimeZone;
use function JWWS\WP_Plugin_Framework\Functions\Alias\is_empty;

/**
 * Prints variable data to a log file.
 *
 * @param mixed $var
 *
 * @return void
 */
function log_var(mixed $var): void {
    $datetime = (new DateTimeImmutable(
        datetime: 'now',
        timezone: new DateTimeZone(timezone: 'Australia/Brisbane'),
    ))->format('Y-m-d H:i:s');

    $backtrace = print_r(value: debug_backtrace()[0], return: true);
    $separator = str_repeat(string: '=', times: 200);
    $user      = posix_getpwuid(user_id: posix_getuid());

    file_force_contents(
        filename: "{$user['dir']}/Logs/var.log",
        data: "\n{$separator}\n[{$datetime}]\n\n{$backtrace}{$separator}" . PHP_EOL,
        flags: FILE_APPEND | LOCK_EX,
    );
}

/**
 * The file_put_contents functions fails if you try to put a file in a directory
 * that doesn't exist. This creates the directory.
 *
 * @source https://www.php.net/manual/en/function.file-put-contents.php#123657
 *
 * @param string $filename Full path directory and filename
 * @param mixed  $data
 * @param int    $flags
 */
function file_force_contents(
    string $filename,
    mixed $data,
    int $flags = 0,
): void {
    $parts = explode(separator: '/', string: $filename);
    array_pop(array: $parts);
    $dir = implode(separator: '/', array: $parts);

    if (! is_dir(filename: $dir)) {
        mkdir(
            directory: $dir,
            permissions: 0777,
            recursive: true,
        );
    }

    file_put_contents(
        filename: $filename,
        data: $data,
        flags: $flags,
    );
}

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
        function_to_add: function(): void {
            console_log(output: current_filter());
        },
    );
}
