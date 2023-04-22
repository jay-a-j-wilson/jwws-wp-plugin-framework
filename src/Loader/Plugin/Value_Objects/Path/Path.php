<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Path;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,
    Loader\Plugin\Value_Objects\Basename\Basename,
    Loader\Plugin\Value_Objects\Directory\Directory};

Security::stop_direct_access();

/**
 * Represents a plugin's filepath.
 */
final class Path extends String_Value_Object {
    /**
     * @param string $basename example plugin-folder/plugin-file.php
     */
    public static function of(string $basename): self {
        return new self(
            value: Directory::create() . Basename::of(basename: $basename),
        );
    }
}
