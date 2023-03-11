<?php

namespace JWWS\WPPF\Tests\Loader\Plugin;

use \JWWS\WPPF\{
    Loader\Plugin\Plugin,
    Log\Error_Log
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
        // self::has_dependencies();
        // self::append_dependencies_to_listing();
        // self::create();
        // self::get_name();
        // self::is_active();
        // self::add_dependencies();
        // self::includes_dependecy();
    }

    /**
     */
    private static function has_dependencies(): void {
        $plugin_1 = Plugin::create_with_slug(slug: 'jwws-wp-open-row-actions')
            ->has_dependencies()
        ;

        Error_Log::print(output: $plugin_1);

        $plugin_2 = Plugin::create_with_slug(slug: 'jwws-wp-open-row-actions')
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'airplane-mode', fallback_name: 'Airplane Mode'),
                Plugin::create_with_slug(slug: 'block-bad-queries', fallback_name: 'BBQ Firewall'),
            )->has_dependencies()
        ;

        Error_Log::print(output: $plugin_2);
    }

    /**
     */
    private static function append_dependencies_to_listing(): void {
        Plugin::create_with_slug(slug: 'jwws-wp-open-row-actions')
            ->add_dependencies(
                Plugin::create_with_slug(slug: 'airplane-mode', fallback_name: 'Airplane Mode'),
                // Plugin::create_with_slug(slug: 'block-bad-queries', fallback_name: 'BBQ Firewall'),
            )

        ;
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

        Error_Log::print(output: $plugin->get_name());
    }

    /**
     */
    private static function is_active(): void {
        Error_Log::print(
            output: Plugin::create_with_slug(slug: 'block-bad-queries')
                ->is_active(),
        );

        Error_Log::print(
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

        Error_Log::print(
            output: $plugin->includes_dependecy('elementor/elementor.php'),
        );

        Error_Log::print(
            output: $plugin->includes_dependecy('wp-sweep/wp-sweep.php'),
        );
    }
}
