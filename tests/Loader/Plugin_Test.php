<?php

namespace JWWS\WPPF\Tests\Loader;

use \JWWS\WPPF\{
    Loader\Plugin,
    Logger
};

/**
 * Plugin test.
 */
class Plugin_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        $plugin = Plugin::create_with_slug(
            name: 'name',
            slug: 'slug',
        );

        Logger::to_error_log(output: $plugin->get_name());
        Logger::to_error_log(output: $plugin->get_filename());
    }
}
