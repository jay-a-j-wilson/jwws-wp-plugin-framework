<?php

namespace JWWS\WPPF\Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Filepath\Sub_Value_Objects\Directory\Directory,
    Filepath\Sub_Value_Objects\File\File
};

// Security::stop_direct_access();

/**
 * Will always return a directory and a file
 */
abstract class Filepath extends Value_Object {
    /**
     * Undocumented function.
     */
    final public static function of(Directory $directory, File $file): static {
        return new static(
            value: static::validate(
                path: "{$directory}{$file}",
            ),
        );
    }

    /**
     * Undocumented function.
     */
    protected static function validate(string $path): string {
        return $path;
    }
}
