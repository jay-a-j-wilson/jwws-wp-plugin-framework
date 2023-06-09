<?php

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object,
    Loader\Plugin\Sub_Value_Objects\Filepath\Filepath,
    Loader\Plugin\Sub_Value_Objects\Header\Enums\Type
};
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Dir\Subclasses\Full_Dir\Full_Dir,
    Sub_Value_Objects\File\Subclasses\PHP_File\PHP_File,
    Subclasses\Confirmed_Filepath\Confirmed_Filepath
};

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents the plugin's header value object.
 */
abstract class Header extends Value_Object {
    /**
     * Returns the header type.
     */
    abstract protected static function type(): Type;

    /**
     * @param string $basename the plugin's basename
     */
    final public static function of(string $basename): static {
        return new static(
            value: self::header(
                path: Filepath::of(basename: $basename),
            ),
        );
    }

    /**
     * Returns the plugin header.
     */
    private static function header(string $path): string {
        return self::plugin_data(
            path: Confirmed_Filepath::of(
                dir: Full_Dir::of(path: $path),
                file: PHP_File::of(path: $path),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function plugin_data(Confirmed_Filepath $path): string {
        self::ensure_get_plugin_data_func_is_available();

        // https://developer.wordpress.org/reference/functions/get_plugin_data/
        return get_plugin_data(
            plugin_file: $path->value,
        )[static::type()->value];
    }

    /**
     * Ensures function get_plugin_data() is available.
     * get_plugin_data() is NOT available by default (not even in admin).
     */
    private static function ensure_get_plugin_data_func_is_available(): void {
        if (! function_exists(function: 'get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
    }
}