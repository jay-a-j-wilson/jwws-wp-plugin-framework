<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Description_Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 */
final class Description_Header_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::value();
    }

    /**
     * @return void
     */
    private static function value(): void {
        Error_Logger::log(
            output: Description_Header::of(basename: 'elementor/elementor.php')
                ->value(),
        );
    }
}
