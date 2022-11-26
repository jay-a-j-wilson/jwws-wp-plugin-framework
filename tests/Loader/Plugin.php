<?php

namespace JWWS\WP_Plugin_Framework\Tests\Loader;

require __DIR__ . '/../../vendor/autoload.php';

/**
 *
 */
class Plugin {
    /**
     * @return void
     */
    public static function test(): void {
        $plugin = \JWWS\WP_Plugin_Framework\Loader\Plugin::create_with_slug(
            name: 'name',
            slug: 'slug',
        );

        echo $plugin->get_name();
        echo $plugin->get_filename();
    }
}

Plugin::test();
