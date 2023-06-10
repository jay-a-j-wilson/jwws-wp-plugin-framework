<?php

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Base_Value_Object\Base_Value_Object,
    Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Name_Header
};

// Security::stop_direct_access();

/**
 * The plugin name.
 */
final class Name extends Base_Value_Object {
    /**
     * @param string $fallback_name example "Plugin"
     */
    public static function of(
        string $basename,
        string $fallback_name,
    ): self {
        return new self(
            value: self::name(
                basename: $basename,
                fallback_name: $fallback_name,
            ),
        );
    }

    /**
     * Retrieves the plugin name from its header comment or defaults to the
     * specified fallback name.
     */
    private static function name(
        string $basename,
        string $fallback_name,
    ): string {
        try {
            return Name_Header::of(basename: $basename)->value;
        } catch (\Exception $e) {
            return $fallback_name;
        }
    }
}
