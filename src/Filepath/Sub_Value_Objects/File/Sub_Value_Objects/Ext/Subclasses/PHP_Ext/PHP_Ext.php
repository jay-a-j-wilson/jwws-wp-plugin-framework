<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents a php file extension.
 */
final class PHP_Ext extends Ext {
    /**
     * Returns a PHP extension type.
     */
    protected static function type(): Type {
        return Type::PHP;
    }
}
