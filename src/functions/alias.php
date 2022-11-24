<?php

namespace JWWS\WP_Plugin_Framework\Functions\Alias;

/**
 * Alias of isset.
 *
 * @param mixed $var
 * @param array $vars
 *
 * @return bool
 */
function is_set(mixed $var, mixed ...$vars): bool {
    return isset($var, $vars);
}

/**
 * Alias of empty.
 *
 * @param mixed $var
 *
 * @return bool
 */
function is_empty(mixed $var): bool {
    return empty($var);
}

/**
 * Finds whether a variable is a function.
 *
 * @param mixed $f
 *
 * @return bool
 */
function is_function($f): bool {
    return
        is_string(value: $f)    && function_exists(function: $f)
        || is_object(value: $f) && ($f instanceof \Closure)
    ;
}