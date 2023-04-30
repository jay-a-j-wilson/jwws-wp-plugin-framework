<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext;

use JWWS\WPPF\{
    Assertion\Assertion,
    Assertion\Path_Assertion\Path_Assertion,
    Assertion\String_Assertion\String_Assertion,
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
     * Factory method.
     */
    final public static function of(string $path): self {
        String_Assertion::of(string: $path)->not_empty();

        return new static(
            value: self::validate(
                ext: self::extension(path: $path),
            ),
        );
    }

    /**
     * Returns the specified path's extension.
     */
    private static function extension(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_EXTENSION);
    }

    /**
     * @throws \InvalidArgumentException
     */
    private static function validate(string $ext): string {
        String_Assertion::of(string: $ext)
            ->equals(string: static::type()->value)
        ;

        return $ext;
    }
}
