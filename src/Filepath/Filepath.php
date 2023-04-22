<?php

namespace JWWS\WPPF\Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,
    Filepath\Sub_Value_Objects\Directory\Directory,
    Filepath\Sub_Value_Objects\File\File};

Security::stop_direct_access();

/**
 * Represents a filepath.
 *
 * Will always return a directory and a file
 */
abstract class Filepath extends String_Value_Object {
    /**
     * @param Directory $directory
     * @param File      $file
     *
     * @return self
     */
    final public static function of(Directory $directory, File $file): static {
        return new static(
            value: static::validate(
                path: "{$directory}{$file}",
            ),
        );
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected static function validate(string $path): string {
        return $path;
    }
}
