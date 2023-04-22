<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\HTML_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext
};

Security::stop_direct_access();

/**
 * Represents a html file's extension.
 */
final class HTML_Ext extends Ext {
    /**
     * Undocumented function.
     */
    protected static function ext(): string {
        return 'html';
    }
}
