<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir;

use JWWS\WPPF\{
    Assertion\String_Assertion\String_Assertion,
    Collection\Collection,
    Common\Security\Security,
    Common\Value_Object\Value_Object
};

// Security::stop_direct_access();

/**
 * Represents a directory.
 */
abstract class Dir extends Value_Object {
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
        String_Assertion::of(string: $path)->not_empty();

        $dir = self::format(
            path: self::dir(path: $path),
        );

        String_Assertion::of(string: $dir)
            ->not_empty(message: 'Directory must not be empty.')
        ;

        return new static(
            value: $dir,
        );
    }

    /**
     * Returns directory from the path.
     */
    private static function dir(string $path): string {
        return Collection::of(...explode(
            separator: DIRECTORY_SEPARATOR,
            string: dirname(path: $path),
        ))
            ->slice(offset: -static::levels())
            ->implode(separator: DIRECTORY_SEPARATOR)
        ;
    }

    /**
     * Removes the period (.) from empty directories for cleaner filepath
     * building.
     */
    private static function format(string $path): string {
        return $path === '.'
            ? ''
            : $path . DIRECTORY_SEPARATOR;
    }
}
