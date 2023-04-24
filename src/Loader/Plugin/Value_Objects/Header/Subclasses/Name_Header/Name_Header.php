<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Value_Objects\Header\Header,
    Loader\Plugin\Value_Objects\Header\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents the plugin's name header value object.
 */
final class Name_Header extends Header {
    /**
     * Undocumented function.
     */
    protected static function type(): Type {
        return Type::NAME;
    }
}
