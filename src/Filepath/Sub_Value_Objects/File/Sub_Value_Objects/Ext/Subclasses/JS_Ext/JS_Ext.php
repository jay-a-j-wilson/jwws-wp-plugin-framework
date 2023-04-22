<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\JS_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext};

Security::stop_direct_access();

/**
 * Represents a js file's extension.
 */
final class JS_Ext extends Ext {
    /**
     * Undocumented function.
     */
    protected static function ext(): string {
        return 'js';
    }
}
