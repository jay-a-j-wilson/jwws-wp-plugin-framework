<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums\Type;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Header;

// Security::stop_direct_access();

/**
 * Represents the plugin's name header value object.
 */
final class Name_Header extends Header {
    protected static function type(): Type {
        return Type::NAME;
    }
}
