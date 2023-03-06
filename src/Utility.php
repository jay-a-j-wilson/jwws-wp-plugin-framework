<?php

namespace JWWS\WPPF;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
final class Utility {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Finds whether a variable is a function.
     *
     * @source https://stackoverflow.com/a/2835633
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function is_function($value): bool {
        return
            is_string(value: $value)    && function_exists(function: $value)
            || is_object(value: $value) && ($value instanceof \Closure)
        ;
    }

    /**
     * Flattens an array of objects containing nested objects to one level.
     *
     * @source https://stackoverflow.com/a/48084541
     *
     * @param array  $objects array of objects to flatten
     * @param string $key     object property by which to flatten e.g. 'children'
     *
     * @return array
     */
    public static function flatten(array $objects, string $key): array {
        $output = [];

        foreach ($objects as $object) {
            // separate its children
            $children = $object->$key ?? [];

            // delete its nested objects
            $object->$key = [];

            // and add it to the output array
            $output[] = $object;

            // Recursively flatten the array of children
            $children = self::flatten(objects: $children, key: $key);

            // and add the result to the output array
            foreach ($children as $child) {
                $output[] = $child;
            }
        }

        return $output;
    }
}
