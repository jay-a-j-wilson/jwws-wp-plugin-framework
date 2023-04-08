<?php

namespace JWWS\WPPF\WordPress\Terms\Tags;

use JWWS\WPPF\{
    Security\Security,
    Testing\Abstract_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Tags_Test extends Abstract_Test {
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
        // self::find_by_id();
        self::list_all();
    }

    /**
     * @return void
     */
    public static function list_all(): void {
        Error_Logger::log(
            output: Tags::create()->list_all(),
        );
    }

    /**
     * @return void
     */
    public static function find_by_id(): void {
        // Uncategorized
        Error_Logger::log(
            output: Tags::create()->find_by_id(id: 97),
        );
    }
}
