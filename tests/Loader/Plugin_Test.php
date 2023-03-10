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
        // self::create();
        // self::get_name();
        // self::is_active();
        self::add_dependencies();
        // self::includes_dependecy();
    }

    /**
     */
    private static function create(): void {
        Plugin::create_with_slug(slug: 'block-bad-queries')->log();
        Plugin::create_with_slug(slug: 'block-bad-queries', fallback_name: 'my name')->log();
        Plugin::create_with_slug(slug: 'a-plugin', fallback_name: 'Dep Plugin')->log();
        Plugin::create_with_slug(slug: 'plugin')->log();
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
        Plugin::create_with_slug(slug: 'block-bad-queries')
            ->log()
            ->add_dependencies(
                plugins: Plugin::create_with_slug(slug: 'wp-sweep', fallback_name: 'wp sweep'),
            )
            ->log()
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'elementor', fallback_name: 'elementor'),
                Plugin::create_with_slug(slug: 'a-plugin', fallback_name: 'A Plugin'),
            )
            ->log()
        ;
    }

    /**
     */
    private static function includes_dependecy(): void {
        $plugin = Plugin::create_with_slug(slug: 'block-bad-queries')
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'elementor'),
                Plugin::create_with_slug(slug: 'shortcoder'),
            )
        ;

        Logger::error_log(
            output: $plugin->includes_dependecy('elementor/elementor.php'),
        );

        Logger::error_log(
            output: $plugin->includes_dependecy('wp-sweep/wp-sweep.php'),
        );
    }
}
