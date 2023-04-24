<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Enums\Type
};

// Security::stop_direct_access();

/**
 * Represents a file's extension.
 */
abstract class Ext extends Value_Object {
    /**
     * Returns the extension type.
     */
    abstract protected static function type(): Type;

    /**
     * Undocumented function.
     */
    final public static function of(string $path): self {
        return new static(
            value: self::validate(
                ext: self::extension(path: $path),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function extension(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_EXTENSION);
    }

    /**
     * @throws \InvalidArgumentException if blank
     */
    private static function validate(string $ext): string {
        Assertion::of(value: $ext)
            ->not_empty()
            ->extension(ext: static::type()->value)
        ;

        return $ext;
    }
}
