<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
 *
 * @internal
 */
final class Callback extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $plugin = Basic_Plugin::create_and_get()
            ->add_dependencies(Akismet_Plugin::create_and_get())
        ;

        is_plugin_active();

        $object = Deactivated_Plugin::of(
            plugin: $plugin,
        );

        $object->callback(plugin: $plugin->name->value);

        self::assertTrue($plugin->is_active());
    }
}
