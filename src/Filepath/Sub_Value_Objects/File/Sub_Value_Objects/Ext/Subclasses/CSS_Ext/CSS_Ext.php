<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext};

Security::stop_direct_access();

/**
 * Represents a css file's extension.
 */
final class CSS_Ext extends Ext {
    /**
     * @return string
     */
    protected static function ext(): string {
        return 'css';
    }
}
