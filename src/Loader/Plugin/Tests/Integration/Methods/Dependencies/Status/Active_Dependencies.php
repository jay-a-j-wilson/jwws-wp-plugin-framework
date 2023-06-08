<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Dependencies\Status;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Active_Dependencies extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin::create_and_get();
        self::$akismet_plugin = Akismet_Plugin::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): Plugin {
        self::assertCount(
            expectedCount: 0,
            haystack: self::$basic_plugin
                ->add_dependencies(
                    self::$akismet_plugin,
                    Plugin::of_slug(
                        slug: 'plugin-dependency',
                        fallback_name: 'Plugin Dependency',
                    ),
                )
                ->active_dependencies(),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_activate(Plugin $plugin): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename);

        self::assertCount(
            expectedCount: 1,
            haystack: $plugin->active_dependencies(),
        );

        return $plugin;
    }

    /**
     * @test
     *
     * @depends pass_activate
     */
    public function pass_deactivate(Plugin $plugin): void {
        deactivate_plugins(plugins: self::$akismet_plugin->basename);

        self::assertCount(
            expectedCount: 0,
            haystack: $plugin->active_dependencies(),
        );
    }
}
