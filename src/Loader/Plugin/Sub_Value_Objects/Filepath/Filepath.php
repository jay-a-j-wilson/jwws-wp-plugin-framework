<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Base_Value_Object\Base_Value_Object,
    Loader\Plugin\Sub_Value_Objects\Basename\Basename,
    Loader\Plugin\Sub_Value_Objects\Dir\Dir
};

// Security::stop_direct_access();

/**
 * Represents a plugin's filepath.
 */
final class Filepath extends Base_Value_Object {
    /**
     * @param string $basename example plugin-folder/plugin-file.php
     */
    public static function of(string $basename): self {
        return new self(
            value: Dir::create() . Basename::of(basename: $basename),
        );
    }
}
