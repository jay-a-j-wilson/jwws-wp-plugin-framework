<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Name;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,
    Loader\Plugin\Value_Objects\Basename\Basename,
    Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header\Name_Header};

Security::stop_direct_access();

/**
 */
final class Name extends String_Value_Object {
    /**
     * @param string $basename
     * @param string $fallback_name example "Plugin"
     *
     * @return self
     */
    public static function of(
        string $basename,
        string $fallback_name,
    ): self {
        return new self(
            value: self::name(
                basename: Basename::of(basename: $basename),
                fallback_name: $fallback_name,
            ),
        );
    }

    /**
     * Selects name.
     *
     * @param Basename $basename
     * @param string   $fallback_name
     *
     * @return string
     */
    private static function name(
        Basename $basename,
        string $fallback_name,
    ): string {
        try {
            return Name_Header::of(basename: $basename)->value();
        } catch (\Exception $e) {
            return $fallback_name;
        }
    }
}
