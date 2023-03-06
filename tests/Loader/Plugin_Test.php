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
        // self::get_name();
        // self::is_active();
        // self::add_dependencies();
        self::has_dependecy();
    }

    /**
     */
    private static function get_name(): void {
        $plugin = Plugin::create_with_slug(slug: 'block-bad-queries');

        Logger::error_log(output: $plugin->get_name());
    }

    /**
     */
    private static function is_active(): void {
        Logger::error_log(
            output: Plugin::create_with_slug(slug: 'block-bad-queries')
                ->is_active(),
        );

        Logger::error_log(
            output: Plugin::create_with_slug(slug: 'wp-sweep')
                ->is_active(),
        );
    }

    /**
     */
    private static function add_dependencies(): void {
        $plugin = Plugin::create_with_slug(slug: 'block-bad-queries');
        Logger::error_log(output: $plugin);

        $plugin
            ->add_dependencies(Plugin::create_with_slug(slug: 'wp-sweep'))
            ->add_dependencies(Plugin::create_with_slug(slug: 'woocommerce'))
        ;
        Logger::error_log(output: $plugin);

        $plugin
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'elementor'),
                Plugin::create_with_slug(slug: 'shortcoder'),
            )
        ;
        Logger::error_log(output: $plugin);
    }

    /**
     */
    private static function has_dependecy(): void {
        $plugin = Plugin::create_with_slug(slug: 'block-bad-queries')
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'elementor'),
                Plugin::create_with_slug(slug: 'shortcoder'),
            )
        ;

        Logger::error_log(
            output: $plugin->has_dependecy('elementor/elementor.php'),
        );

        Logger::error_log(
            output: $plugin->has_dependecy('wp-sweep/wp-sweep.php'),
        );
    }
}
