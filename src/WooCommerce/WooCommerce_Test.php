<?php

namespace JWWS\WPPF\WooCommerce;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WooCommerce_Test extends Test {
    public static function run(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'hook'],
        );
    }

    /**
     * Undocumented function.
     */
    public static function hook(): void {
        Error_Logger::log(
            output: WooCommerce::get_product_categories(),
        );
    }
}
