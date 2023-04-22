<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Factory;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\{
    File,
    Sub_Value_Objects\Name\Name,
    Sub_Value_Objects\Ext\Ext
};

Security::stop_direct_access();

/**
 * File factory.
 */
abstract class Factory {
    /**
     * Returns file ext type.
     */
    abstract protected static function ext_type(string $path): Ext;

    /**
     * Creates File object.
     */
    final public static function of(string $path): File {
        return File::of(
            name: Name::of(path: $path),
            ext: static::ext_type(path: $path),
        );
    }
}
