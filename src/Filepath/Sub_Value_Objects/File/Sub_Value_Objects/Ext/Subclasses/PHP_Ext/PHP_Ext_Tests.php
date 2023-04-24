<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    Common\Testing\Tests
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class PHP_Ext_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::of();
        self::of_two_ext();
        self::of_bad_ext();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.php')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_two_ext(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.html.php')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_bad_ext(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.html')
                ->value,
        );
    }
}
