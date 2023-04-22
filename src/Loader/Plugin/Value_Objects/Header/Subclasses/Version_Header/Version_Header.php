<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Version_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Value_Objects\Header\Header};

Security::stop_direct_access();

/**
 * Represents the plugin's version header value object.
 */
final class Version_Header extends Header {
    /**
     * Undocumented function.
     */
    protected static function type(): string {
        return 'Version';
    }
}