<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object};

Security::stop_direct_access();

/**
 * Represents a file's extension.
 */
abstract class Ext extends String_Value_Object {
    /**
     * Returns the string of the subclass' extension type.
     *
     * @return string
     */
    abstract protected static function ext(): string;

    /**
     * @param string $path
     *
     * @return self
     */
    final public static function of(string $path): self {
        return new static(
            value: self::validate(
                ext: self::extension(path: $path),
            ),
        );
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private static function extension(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_EXTENSION);
    }

    /**
     * @param string $ext
     *
     * @throws \InvalidArgumentException if blank
     *
     * @return string
     */
    private static function validate(string $ext): string {
        Assertion::of(value: $ext)
            ->not_empty()
            ->extension(ext: static::ext())
        ;

        return $ext;
    }
}
