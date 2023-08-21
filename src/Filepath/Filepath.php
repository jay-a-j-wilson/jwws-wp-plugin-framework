<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\File;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Will always return a directory and a file.
 */
abstract class Filepath extends Base_Value_Object {
    final public static function of(Dir $dir, File $file): static {
        return new static(
            value: static::validate(
                filepath: "{$dir}{$file}",
            ),
        );
    }

    protected static function validate(string $filepath): string {
        return $filepath;
    }
}
