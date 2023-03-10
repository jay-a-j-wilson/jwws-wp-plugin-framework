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
     * Data.
     */
    private static function get_plugin_collection(): Plugin_Collection {
        return Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'query-monitor'),
            Plugin::create_with_slug(slug: 'airplane-mode'),
        )
            ->add(plugin: Plugin::create_with_slug(slug: 'block-bad-queries'))
            ->add(
                Plugin::create_with_slug(slug: 'afterpay-gateway-for-woocommerce'),
                Plugin::create_with_slug(slug: 'wp-sweep'),
            )
        ;
    }

    /**
     * @return void
     */
    public static function test(): void {
        self::has_inactive();
        // self::log();
        // self::get_inactive();
        // self::getIterator();
        // self::get_by_key();
        // self::get_by_filename();
        // self::includes();
        // self::add();
        // self::count();
    }

    /**
     */
    private static function has_inactive(): void {
        $plugin_collection2 = Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'query-monitor'),
        );

        Logger::error_log(output: $plugin_collection2->has_inactive());

        $plugin_collection = self::get_plugin_collection();

        Logger::error_log(output: $plugin_collection->has_inactive());
    }

    /**
     */
    private static function get_inactive(): void {
        $plugin_collection = self::get_plugin_collection();

        Logger::error_log(output: $plugin_collection->get_inactive());
    }

    /**
     */
    private static function log(): void {
        self::get_plugin_collection()->log();
    }

    /**
     */
    private static function add(): void {
        $plugin_collection = Plugin_Collection::create(
            Plugin::create_with_slug(slug: 'query-monitor'),
            Plugin::create_with_slug(slug: 'shortcoder'),
        )
            ->log()
            ->add(
                Plugin::create_with_slug(slug: 'woocommerce'),
                Plugin::create_with_slug(slug: 'wp-sweep'),
            )
            ->log()
            ->add(plugin: Plugin::create_with_slug(slug: 'block-bad-queries'))
            ->log()
        ;
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
    private static function includes(): void {
        $plugin_collection = self::get_plugin_collection();

        Logger::error_log(
            output: $plugin_collection->includes(plugin: 'woocommerce/woocommerce.php'),
        );

        Logger::error_log(
            output: $plugin_collection->includes(plugin: 'airplane-mode/airplane-mode.php'),
        );
    }

    /**
     */
    private static function get_by_filename(): void {
        $plugin_collection = self::get_plugin_collection();

        Logger::error_log(
            output: $plugin_collection->get_by_filename(filename: 'woocommerce/woocommerce.php'),
        );

        Logger::error_log(
            output: $plugin_collection->get_by_filename(filename: 'invalid/filename.php'),
        );
    }

    /**
     */
    private static function get_by_key(): void {
        $plugin_collection = self::get_plugin_collection();

        Logger::error_log(output: $plugin_collection);
        Logger::error_log(output: $plugin_collection->get_by_key(key: 1));
    }

    /**
     */
    private static function getIterator(): void {
        $iterator = self::get_plugin_collection()->getIterator();

        // Logger::error_log(output: $iterator);

        foreach (self::get_plugin_collection() as $plugin) {
            Logger::error_log(output: $plugin);
        }

        while ($iterator->valid()) {
            Logger::error_log(output: $iterator->current());
            $iterator->current();
            $iterator->next();
        }
    }
}
