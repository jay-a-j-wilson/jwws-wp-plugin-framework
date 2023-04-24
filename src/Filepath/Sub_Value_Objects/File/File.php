<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name
};

// Security::stop_direct_access();

/**
 * Represents a file basename.
 */
final class File extends Value_Object {
    /**
     * Undocumented function.
     */
    public static function of(Name $name, Ext $ext): self {
        return new self(
            value: "{$name}.{$ext}",
        );
    }
}
