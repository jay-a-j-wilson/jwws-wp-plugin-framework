<?php

namespace JWWS\WPPF\Common\Utility;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Generic {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Flattens an array of objects containing nested objects to one level.
     *
     * @source https://stackoverflow.com/a/48084541
     *
     * @param array  $objects array of objects to flatten
     * @param string $key     object property by which to flatten e.g. 'children'
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
