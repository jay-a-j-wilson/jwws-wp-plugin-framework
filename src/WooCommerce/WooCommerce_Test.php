<?php

namespace JWWS\WPPF\WooCommerce;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class WooCommerce_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'hook'],
        );
    }

    /**
     * @return void
     */
    public static function hook(): void {
        Error_Logger::log(
            output: WooCommerce::get_product_categories(),
        );
    }
}
