<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Value_Objects\Header\Header};

Security::stop_direct_access();

/**
 * Represents the plugin's name header value object.
 */
final class Name_Header extends Header {
    /**
     * @return self
     */
    protected static function type(): string {
        return 'Name';
    }
}
