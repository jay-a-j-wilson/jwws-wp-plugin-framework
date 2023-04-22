<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 */
final class PHP_Ext_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::of();
        self::of_two_ext();
        self::of_bad_ext();
    }

    /**
     * @return void
     */
    private static function of(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.php')
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_two_ext(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.html.php')
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_bad_ext(): void {
        Error_Logger::log(
            output: PHP_Ext::of(path: 'filename.html')
                ->value(),
        );
    }
}
