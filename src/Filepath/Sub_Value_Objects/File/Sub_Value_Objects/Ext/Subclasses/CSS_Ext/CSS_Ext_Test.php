<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 */
final class CSS_Ext_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::of();
    }

    /**
     * @return void
     */
    private static function of(): void {
        Error_Logger::log(
            output: CSS_Ext::of(path: 'filename.css')
                ->value(),
        );
    }
}