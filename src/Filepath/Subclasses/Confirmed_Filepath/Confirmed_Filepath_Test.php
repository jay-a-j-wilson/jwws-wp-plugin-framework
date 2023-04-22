<?php

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger
};
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory,
    Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Immediate_Directory,
    Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory
};

Security::stop_direct_access();

/**
 */
final class Confirmed_Filepath_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        $filepath = trailingslashit(string: WP_PLUGIN_DIR) . 'invalid/plugin.php';
        // self::of_entire(path: $filepath);
        // self::of_immediate(path: $filepath);

        $filename = 'plugin.php';
        self::of_entire(path: $filename);
        self::of_immediate(path: $filename);
    }

    /**
     * @param string $path
     *
     * @return void
     */
    private static function of_entire(string $path): void {
        Error_Logger::log(
            output: Confirmed_Filepath::of(
                directory: Entire_Directory::of(path: $path),
                file: PHP_Factory::of(path: $path),
            ),
        );
    }

    /**
     * @param string $path
     *
     * @return void
     */
    private static function of_immediate(string $path): void {
        Error_Logger::log(
            output: Confirmed_Filepath::of(
                directory: Immediate_Directory::of(path: $path),
                file: PHP_Factory::of(path: $path),
            ),
        );
    }
}
