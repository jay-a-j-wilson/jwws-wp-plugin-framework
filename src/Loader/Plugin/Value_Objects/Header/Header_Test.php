<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 */
final class Header_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::value();
    }

    /**
     * @return void
     */
    private static function value(): void {
        Error_Logger::log(
            output: Header::of(basename: 'elementor/elementor.php')
                ->value(),
        );
    }
}
