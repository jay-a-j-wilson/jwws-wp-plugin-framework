<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Basename;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,};
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Immediate_Directory,
    Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory,
    Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath,
};

Security::stop_direct_access();

/**
 * Represents a WordPress Plugin's basename.
 */
final class Basename extends String_Value_Object {
    /**
     * @param string $path the plugin's basename "plugin-folder/plugin-file.php"
     *
     * @return self
     */
    public static function of(string $basename): self {
        return new self(
            value: Unconfirmed_Filepath::of(
                directory: Immediate_Directory::of(path: $basename),
                file: PHP_Factory::of(path: $basename)
            ),
        );
    }
}
