<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext\CSS_Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\PHP_Ext,
    Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name,
    Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class File_Test extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::of();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        $path = 'dir/subdir/filename.php';
        Error_Logger::log(
            output: File::of(
                name: Name::of(path: $path),
                ext: PHP_Ext::of(path: $path),
            )
                ->value(),
        );

        Error_Logger::log(
            output: File::of(
                name: Name::of(path: $path),
                ext: CSS_Ext::of(path: $path),
            )
                ->value(),
        );
    }
}
