<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Version_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
    Logger\Error_Logger\Error_Logger};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Version_Header_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::value();
    }

    /**
     * Undocumented function.
     */
    private static function value(): void {
        Error_Logger::log(
            output: Version_Header::of(basename: 'elementor/elementor.php')
                ->value,
        );
    }
}
