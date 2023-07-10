<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies\Has\Status;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin_Factory,
    Tests\Integration\Fixtures\Basic_Plugin_Factory,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 */
final class Has_No_Inactive_Dependencies extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin_Factory::create_and_get();
        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_no_dependencies(): Plugin {
        self::assertTrue(
            condition: self::$basic_plugin->has_no_inactive_dependencies(),
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_no_dependencies
     */
    public function pass_inactive_dependencies(Plugin $plugin): Plugin {
        activate_plugin(plugin: self::$akismet_plugin->basename());

        self::assertTrue(
            condition: $plugin
                ->add_dependencies(plugins: self::$akismet_plugin)
                ->has_no_inactive_dependencies(),
        );

        return $plugin;
    }

    /**
     * @test
     *
     * @depends pass_inactive_dependencies
     */
    public function pass_deactivate_dependencies(Plugin $plugin): void {
        deactivate_plugins(plugins: self::$akismet_plugin->basename());

        self::assertFalse(condition: $plugin->has_no_inactive_dependencies());
    }
}
