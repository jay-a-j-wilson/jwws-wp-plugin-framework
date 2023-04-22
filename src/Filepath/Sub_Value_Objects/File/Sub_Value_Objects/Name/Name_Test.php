<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Name_Test extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::of();
        // self::of_no_ext();
        // self::of_no_filename();
        self::of_valid_file_path_chars_pass();
        self::of_valid_file_path_chars_fail();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Error_Logger::log(
            output: Name::of(path: 'dir/subdir/filename.ext')
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_valid_file_path_chars_pass(): void {
        Error_Logger::log(
            output: Name::of(path: 'dir/subdir/filename')
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_valid_file_path_chars_fail(): void {
        Error_Logger::log(
            output: Name::of(path: 'dir/subdir/#filename')
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_ext(): void {
        Error_Logger::log(
            output: Name::of(path: 'dir/subdir/filename')
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_filename(): void {
        Error_Logger::log(
            output: Name::of(path: 'dir/subdir/.ext')
                ->value(),
        );
    }
}
