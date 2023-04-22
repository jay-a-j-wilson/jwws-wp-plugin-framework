<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,};

Security::stop_direct_access();

/**
 * Represents a filename.
 */
final class Name extends String_Value_Object {
    /**
     * @param string $path
     *
     * @return self
     */
    public static function of(string $path): self {
        // Assertion::of(value: $path)->valid_chars();

        return new self(
            value: self::validate(
                filename: pathinfo(path: $path, flags: PATHINFO_FILENAME),
            ),
        );
    }

    /**
     * @param string $filename
     *
     * @throws \InvalidArgumentException if blank
     *
     * @return string
     */
    private static function validate(string $filename): string {
        Assertion::of(value: $filename)
            ->not_empty(message: 'Filename cannot be empty.')
        ;

        return $filename;
    }
}
