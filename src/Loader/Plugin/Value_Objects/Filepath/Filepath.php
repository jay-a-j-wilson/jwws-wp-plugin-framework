<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Loader\Plugin\Value_Objects\Basename\Basename,
    Loader\Plugin\Value_Objects\Dir\Dir
};

// Security::stop_direct_access();

/**
 * Represents a plugin's filepath.
 */
final class Filepath extends Value_Object {
    /**
     * @param string $basename example plugin-folder/plugin-file.php
     */
    public static function of(string $basename): self {
        return new self(
            value: Dir::create() . Basename::of(basename: $basename),
        );
    }
}
