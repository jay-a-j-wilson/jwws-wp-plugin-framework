<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\Common\Value_Object\Value_Object;
// Security::stop_direct_access();

/**
 * Represents a filename.
 */
interface Name extends Value_Object {
    public static function of(string $path): self;
}
