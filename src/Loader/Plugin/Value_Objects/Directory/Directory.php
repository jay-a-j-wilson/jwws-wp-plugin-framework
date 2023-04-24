<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Directory;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object
};

// Security::stop_direct_access();

/**
 * Represents the WordPress plugin directory.
 */
final class Directory extends Value_Object {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self(
            value: trailingslashit(string: WP_PLUGIN_DIR),
        );
    }
}
