<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory;

use JWWS\WPPF\{
    Assertion\Assertion,
    Collection\Collection,
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object};

Security::stop_direct_access();

/**
 * Represents a directory.
 */
abstract class Directory extends String_Value_Object {
    /**
     * Returns the parent directory level to return.
     *
     * @param int $levels 0 for all
     */
    abstract protected static function levels(): int;

    /**
     * Undocumented function.
     */
    final public static function of(string $path): static {
        Assertion::of(value: $path)->not_empty();

        $directory = self::format(
            path: self::directory(path: $path),
        );

        Assertion::of(value: $directory)
            ->not_empty(message: 'Directory must not be empty')
        ;

        return new static(
            value: $directory,
        );
    }

    /**
     * Undocumented function.
     */
    private static function directory(string $path): string {
        return Collection::of(...explode(
            separator: DIRECTORY_SEPARATOR,
            string: dirname(path: $path),
        ))
            ->slice(offset: -static::levels())
            ->to_string(separator: DIRECTORY_SEPARATOR)
        ;
    }

    /**
     * Undocumented function.
     */
    private static function format(string $path): string {
        return $path === '.'
            ? ''
            : $path . DIRECTORY_SEPARATOR;
    }
}
