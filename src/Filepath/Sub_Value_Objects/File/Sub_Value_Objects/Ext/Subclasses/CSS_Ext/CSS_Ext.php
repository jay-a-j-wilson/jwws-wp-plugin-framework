<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents a css file extension.
 */
final class CSS_Ext extends Ext {
    /**
     * Undocumented function.
     */
    protected static function type(): Type {
        return Type::CSS;
    }
}
