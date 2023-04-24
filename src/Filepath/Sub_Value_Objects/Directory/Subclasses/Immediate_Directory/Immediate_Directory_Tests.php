<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
    Logger\Error_Logger\Error_Logger};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Immediate_Directory_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::of();
        self::of_no_ext();
        self::of_no_filename();
        self::of_no_dir();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Error_Logger::log(
            output: Immediate_Directory::of(path: 'dir/subdir/subsubdir/filename.ext')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_dir(): void {
        Error_Logger::log(
            output: Immediate_Directory::of(path: 'dir')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_ext(): void {
        Error_Logger::log(
            output: Immediate_Directory::of(path: 'dir/subdir/subsubdir/filename')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_filename(): void {
        Error_Logger::log(
            output: Immediate_Directory::of(path: 'dir/subdir/subsubdir/.ext')
                ->value,
        );
    }
}
