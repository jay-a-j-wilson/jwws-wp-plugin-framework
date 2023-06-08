<?php

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
};
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Dir\Subclasses\Immediate_Dir\Immediate_Dir,
    Sub_Value_Objects\File\Subclasses\PHP_File\PHP_File,
    Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath,
};

// Security::stop_direct_access();

/**
 * Represents a WordPress Plugin's basename.
 */
final class Basename extends Value_Object {
    /**
     * @param string $path the plugin's basename "plugin-folder/plugin-file.php"
     */
    public static function of(string $basename): self {
        return new self(
            value: Unconfirmed_Filepath::of(
                dir: Immediate_Dir::of(path: $basename),
                file: PHP_File::of(path: $basename),
            ),
        );
    }
}