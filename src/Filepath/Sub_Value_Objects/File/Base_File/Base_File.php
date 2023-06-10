<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Base_Value_Object\Base_Value_Object,
    Common\Value_Object\Value_Object,
    Filepath\Sub_Value_Objects\File\Base_File\Enums\Ext,
    Filepath\Sub_Value_Objects\File\File,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name
};

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents a file basename.
 */
abstract class Base_File extends Base_Value_Object implements File {
    /**
     * Returns file extension type.
     */
    abstract protected static function type(): Ext;

    /**
     * Static factory method.
     */
    final public static function of(string $path): static {
        return new static(
            value: Name::of(path: $path) . '.' . static::type()->value,
        );
    }
}
