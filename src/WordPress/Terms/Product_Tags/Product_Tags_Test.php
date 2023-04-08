<?php

namespace JWWS\WPPF\WordPress\Terms\Product_Tags;

use JWWS\WPPF\{
    Security\Security,
    Testing\Abstract_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Product_Tags_Test extends Abstract_Test {
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
        // self::find_by_id_fail();
        self::find_by_id_pass();
        self::list_all();
    }

    /**
     * @return void
     */
    public static function list_all(): void {
        Error_Logger::log(
            output: Product_Tags::create()->list_all(),
        );
    }

        /**
     * @return void
     */
    public static function find_by_id_fail(): void {
        Error_Logger::log(
            output: Product_Tags::create()->find_by_id(id: 111111111),
        );
    }

    /**
     * @return void
     */
    public static function find_by_id_pass(): void {
        Error_Logger::log(
            output: Product_Tags::create()->find_by_id(id: 35987),
        );
    }
}
