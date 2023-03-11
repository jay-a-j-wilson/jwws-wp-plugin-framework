<?php

namespace JWWS\WPPF\Tests;

use \JWWS\WPPF\{
    WooCommerce,
    Log\Error_Log
};

/**
 */
class WooCommerce_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'test'],
        );
    }

    /**
     * @return void
     */
    public static function test(): void {
        Error_Log::print(
            output: WooCommerce::get_product_categories(),
        );
    }
}
