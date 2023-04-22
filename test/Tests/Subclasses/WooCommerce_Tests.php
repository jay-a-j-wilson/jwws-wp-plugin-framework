<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    WooCommerce\WooCommerce_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented function.
 */
final class WooCommerce_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::woocommerce();
    }

    /**
     * Undocumented function.
     */
    private static function woocommerce(): void {
        WooCommerce_Test::run();
    }
}
