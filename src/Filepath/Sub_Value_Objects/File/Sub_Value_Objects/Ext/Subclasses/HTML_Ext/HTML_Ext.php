<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\HTML_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents a html file extension.
 */
final class HTML_Ext extends Ext {
    /**
     * Undocumented function.
     */
    protected static function type(): Type {
        return Type::HTML;
    }
}
