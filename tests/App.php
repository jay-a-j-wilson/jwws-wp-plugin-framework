<?php

namespace JWWS\WP_Plugin_Framework\Tests;

use function JWWS\WP_Plugin_Framework\Functions\Debug\console_log;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * App.
 */
class App {
    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'register'],
        );
    }

    /**
     * @return void
     */
    public static function register(): void {
        (new self())->load_entry_point();
    }

    /**
     * @return void
     */
    public function load_entry_point(): void {
        console_log(1);
        console_log(Template_Engine\Template::test());
    }
}
