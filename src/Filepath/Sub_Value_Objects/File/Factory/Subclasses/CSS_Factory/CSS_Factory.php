<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Factory\Subclasses\CSS_Factory;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\File\Factory\Factory,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext\CSS_Ext
};

Security::stop_direct_access();

/**
 * CSS File factory.
 */
final class CSS_Factory extends Factory {
    /**
     * Undocumented function.
     */
    protected static function ext_type(string $path): CSS_Ext {
        return CSS_Ext::of(path: $path);
    }
}
