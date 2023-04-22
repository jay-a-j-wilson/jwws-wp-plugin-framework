<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Directory;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object};

Security::stop_direct_access();

/**
 * Represents the plugin directory.
 */
final class Directory extends String_Value_Object {
    /**
     * @return self
     */
    public static function create(): self {
        return new self(
            value: trailingslashit(string: WP_PLUGIN_DIR)
        );
    }
}
