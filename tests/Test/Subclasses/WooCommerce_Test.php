<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    WooCommerce,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 * Undocumented function.
 */
final class WooCommerce_Tests extends Test {
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
        WooCommerce\WooCommerce_Tests::run();
    }
}
