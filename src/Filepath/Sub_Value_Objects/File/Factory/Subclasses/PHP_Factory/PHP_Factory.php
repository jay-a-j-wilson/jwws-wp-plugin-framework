<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\File\Factory\Factory,
    Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\PHP_Ext
};

Security::stop_direct_access();

/**
 * PHP File factory.
 */
final class PHP_Factory extends Factory {
    /**
     * Undocumented function.
     */
    protected static function ext_type(string $path): PHP_Ext {
        return PHP_Ext::of(path: $path);
    }
}
