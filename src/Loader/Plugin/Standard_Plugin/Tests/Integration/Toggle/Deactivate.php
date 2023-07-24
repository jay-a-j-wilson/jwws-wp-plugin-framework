<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Toggle;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Deactivate extends \WP_UnitTestCase {
    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_is_active(): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename()->__toString());

        self::assertTrue(
            condition: is_plugin_active(
                plugin: self::$akismet_plugin->basename()->__toString(),
            ),
        );

        return self::$akismet_plugin;
    }

    /**
     * @test
     *
     * @depends pass_is_active
     */
    public function pass_is_inactivate(Plugin $plugin): void {
        self::assertFalse(
            condition: is_plugin_active(
                plugin: $plugin->deactivate()->basename()->__toString(),
            ),
        );
    }
}
