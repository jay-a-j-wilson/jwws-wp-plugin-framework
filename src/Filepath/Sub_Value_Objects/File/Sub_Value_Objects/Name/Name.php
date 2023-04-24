<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security,
    Common\Value_Object\Value_Object
};

// Security::stop_direct_access();

/**
 * Represents a filename.
 */
final class Name extends Value_Object {
    /**
     * Undocumented function.
     */
    public static function of(string $path): self {
        // Assertion::of(value: $path)->valid_chars();

        return new self(
            value: self::validate(
                filename: self::filename(path: $path),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function filename(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_FILENAME);
    }

    /**
     * @throws \InvalidArgumentException if blank
     */
    private static function validate(string $filename): string {
        Assertion::of(value: $filename)
            ->not_empty(message: 'Filename cannot be empty.')
        ;

        return $filename;
    }
}
