<?php

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Version_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Sub_Value_Objects\Header\Header,
    Loader\Plugin\Sub_Value_Objects\Header\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents the plugin's version header value object.
 */
final class Version_Header extends Header {
    /**
     * Undocumented function.
     */
    protected static function type(): Type {
        return Type::VERSION;
    }
}