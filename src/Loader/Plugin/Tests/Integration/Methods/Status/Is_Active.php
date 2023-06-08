<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Status;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Is_Active extends \WP_UnitTestCase {
    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet_plugin = Akismet_Plugin::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): Plugin {
        self::assertFalse(condition: self::$akismet_plugin->is_active());

        return self::$akismet_plugin;
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_activate(Plugin $plugin): Plugin {
        activate_plugin(plugin: $plugin->basename);

        self::assertTrue(condition: $plugin->is_active());

        return $plugin;
    }

    /**
     * @test
     *
     * @depends pass_activate
     */
    public function pass_deactivate(Plugin $plugin): void {
        deactivate_plugins(plugins: $plugin->basename);

        self::assertFalse(condition: $plugin->is_active());
    }
}
