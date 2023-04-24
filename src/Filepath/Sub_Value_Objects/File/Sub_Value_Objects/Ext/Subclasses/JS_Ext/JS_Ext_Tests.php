<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\JS_Ext;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Tests};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class JS_Ext_Tests extends WP_Tests {
    /**
     * Undocumented function.
     */
    public static function hook(): void {
        self::of();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Error_Logger::log(
            output: JS_Ext::of(path: 'filename.js')
                ->value,
        );
    }
}
