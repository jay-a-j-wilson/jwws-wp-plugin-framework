<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Enums\Ext;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name_Factory;

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

    final public static function of(Name_Factory $factory): static {
        return new static(
            value: $factory->create() . '.' . static::type()->value,
        );
    }
}
