<?php

namespace JWWS\WPPF\Tests\Loader;

use \JWWS\WPPF\{
    Loader\Plugin,
    Loader\Plugin_Collection,
    Logger
};

class Plugin_Collection_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        self::add();
        // self::count();
        // self::get_all();
    }

    /**
     */
    private static function add(): void {
        $plugin_collection = Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'query-monitor'),
            Plugin::create_with_slug(slug: 'shortcoder'),
        )
            ->add(plugin: Plugin::create_with_slug(slug: 'block-bad-queries'))
            ->add(
                Plugin::create_with_slug(slug: 'woocommerce'),
                Plugin::create_with_slug(slug: 'wp-sweep'),
            )
        ;

        Logger::error_log(output: $plugin_collection);
    }

    /**
     */
    private static function count(): void {
        $plugin_collection = Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'block-bad-queries'),
            Plugin::create_with_path(path: 'post-cloner/wp-post-cloner.php'),
        );

        Logger::error_log(output: $plugin_collection->count());

        $plugin_collection->add(
            plugin: Plugin::create_with_slug(slug: 'perfmatters'),
        );

        Logger::error_log(output: $plugin_collection->count());
    }

    /**
     */
    private static function get_all(): void {
        $plugin_collection = Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'query-monitor'),
            Plugin::create_with_slug(slug: 'shortcoder'),
        )
            ->add(plugin: Plugin::create_with_slug(slug: 'block-bad-queries'))
            ->add(plugin: Plugin::create_with_slug(slug: 'woocommerce'))
        ;

        Logger::error_log(output: $plugin_collection);
        Logger::error_log(output: $plugin_collection->get_all());
    }
}
