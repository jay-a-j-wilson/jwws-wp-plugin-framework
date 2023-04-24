<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Tests};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Header_Tests extends WP_Tests {
    /**
     * Undocumented function.
     */
    public static function hook(): void {
        self::value();
    }

    /**
     * Undocumented function.
     */
    private static function value(): void {
        Error_Logger::log(
            output: Header::of(basename: 'elementor/elementor.php')
                ->value,
        );
    }
}
