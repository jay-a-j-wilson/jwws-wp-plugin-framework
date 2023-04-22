<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Subclasses\String_Value_Object,
    Loader\Plugin\Value_Objects\Path\Path};
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory,
    Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory,
    Subclasses\Confirmed_Filepath\Confirmed_Filepath,};

Security::stop_direct_access();

/**
 * Represents the plugin's header value object.
 */
abstract class Header extends String_Value_Object {
    /**
     * Returns the header type.
     *
     * @return string
     */
    abstract protected static function type(): string;

    /**
     * @param string $basename the plugin's basename
     *
     * @return static
     */
    final public static function of(string $basename): static {
        return new static(
            value: self::header(
                path: Path::of(basename: $basename),
            )[static::type()],
        );
    }

    /**
     * Returns the plugin header.
     *
     * @param string $path
     *
     * @return array
     */
    private static function header(string $path): array {
        return self::plugin_data(
            path: Confirmed_Filepath::of(
                directory: Entire_Directory::of(path: $path),
                file: PHP_Factory::of(path: $path),
            ),
        );
    }

    /**
     * @param Confirmed_Filepath $path
     *
     * @return array
     */
    private static function plugin_data(Confirmed_Filepath $path): array {
        self::ensure_get_plugin_data_func_is_available();

        // https://developer.wordpress.org/reference/functions/get_plugin_data/
        return get_plugin_data(
            plugin_file: $path->value(),
        );
    }

    /**
     * Ensures function get_plugin_data() is available.
     * get_plugin_data() is NOT available by default (not even in admin).
     *
     * @return void
     */
    private static function ensure_get_plugin_data_func_is_available(): void {
        if (! function_exists(function: 'get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
    }
}
