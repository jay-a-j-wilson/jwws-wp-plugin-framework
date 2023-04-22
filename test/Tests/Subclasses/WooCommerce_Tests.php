<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    WooCommerce\WooCommerce_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class WooCommerce_Tests extends Tests {
    /**
     * @return void
     */
    public static function run(): void {
        self::woocommerce();
    }

    /**
     * @return void
     */
    private static function woocommerce(): void {
        WooCommerce_Test::run();
    }
}
