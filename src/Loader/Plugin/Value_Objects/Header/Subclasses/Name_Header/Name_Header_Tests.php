<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
    Logger\Error_Logger\Error_Logger};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Name_Header_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::value();
        self::equals();
    }

    /**
     * Undocumented function.
     */
    private static function value(): void {
        Error_Logger::log(
            output: Name_Header::of(basename: 'elementor/elementor.php')
                ->value,
        );
    }

    /**
     * Undocumented function.
     */
    private static function equals(): void {
        Error_Logger::log(
            output: Name_Header::of(basename: 'elementor/elementor.php')
                ->equals(
                    other: Name_Header::of(
                        basename: 'elementor/elementor.php',
                    ),
                ),
        );
    }
}
