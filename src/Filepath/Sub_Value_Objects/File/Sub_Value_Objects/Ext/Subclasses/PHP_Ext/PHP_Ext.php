<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext};

Security::stop_direct_access();

/**
 * Represents a php file's extension.
 */
final class PHP_Ext extends Ext {
    /**
     * Undocumented function.
     */
    protected static function ext(): string {
        return 'php';
    }
}
