<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory;

use JWWS\WPPF\{
	Common\Security\Security,
	Common\Testing\Test,
	Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 */
final class Entire_Directory_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::of();
        self::of_no_dir();
        self::of_no_ext();
        self::of_no_filename();
    }

    /**
     * @return void
     */
    private static function of(): void {
        Error_Logger::log(
            output: Entire_Directory::of(
                path: 'dir/subdir/subsubdir/filename.ext',
            )
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_no_dir(): void {
        Error_Logger::log(
            output: Entire_Directory::of(path: 'dir')
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_no_ext(): void {
        Error_Logger::log(
            output: Entire_Directory::of(path: 'dir/subdir/subsubdir/filename')
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_no_filename(): void {
        Error_Logger::log(
            output: Entire_Directory::of(path: 'dir/subdir/subsubdir/.ext')
                ->value(),
        );
    }
}