<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 */
final class Name_Header_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::value();
        self::equals();
    }

    /**
     * @return void
     */
    private static function value(): void {
        Error_Logger::log(
            output: Name_Header::of(basename: 'elementor/elementor.php')
                ->value(),
        );
    }

    /**
     * @return void
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
