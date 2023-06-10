<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Base_Value_Object\Base_Value_Object
};

// Security::stop_direct_access();

/**
 * Represents the WordPress plugin directory.
 */
final class Dir extends Base_Value_Object {
    /**
     * Factory method.
     */
    public static function create(): self {
        return new self(
            value: WP_PLUGIN_DIR . DIRECTORY_SEPARATOR,
        );
    }
}
