<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Dependencies\Has\Status;

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
final class Has_Inactive_Dependencies extends \WP_UnitTestCase {
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
    public function pass_no_dependencies(): Plugin {
        self::assertFalse(
            condition: self::$basic_plugin->has_inactive_dependencies(),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_no_dependencies
     */
    public function pass_active_dependencies(Plugin $plugin): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename);

        self::assertFalse(
            condition: $plugin
                ->add_dependencies(plugins: self::$akismet_plugin)
                ->has_inactive_dependencies(),
        );

        return $plugin;
    }

    /**
     * @test
     *
     * @depends pass_active_dependencies
     */
    public function pass_deactivate_dependencies(Plugin $plugin): void {
        deactivate_plugins(plugins: self::$akismet_plugin->basename);

        self::assertTrue(condition: $plugin->has_inactive_dependencies());
    }
}
