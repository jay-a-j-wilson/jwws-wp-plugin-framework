<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Filepath\Sub_Value_Objects\Dir\Dir,
    Filepath\Sub_Value_Objects\File\File
};

// Security::stop_direct_access();

/**
 * Will always return a directory and a file.
 */
abstract class Filepath extends Value_Object {
    /**
     * Factory method.
     */
    final public static function of(Dir $dir, File $file): static {
        return new static(
            value: static::validate(
                filepath: "{$dir}{$file}",
            ),
        );
    }

    /**
     * Undocumented function.
     */
    protected static function validate(string $filepath): string {
        return $filepath;
    }
}
