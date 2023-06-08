<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Fixture\Subclasses\Methods\Toggle;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
};


/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Deactivate extends \WP_UnitTestCase {
    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$akismet_plugin = Akismet_Plugin::create_and_get();
    }


    /**
     * @test
     */
    public function pass_is_active(): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename->__toString());

        self::assertTrue(
            condition: is_plugin_active(
                plugin: self::$akismet_plugin->basename->__toString(),
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
                plugin: $plugin->deactivate()->basename->__toString(),
            ),
        );
    }
}
