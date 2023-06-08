<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Init\Admin_Init,
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 */
final class Callback extends \WP_UnitTestCase {
    // protected static Admin_Init $object;

    // public static function setUpBeforeClass(): void {
    //     parent::setUpBeforeClass();

    //     self::$object = Admin_Init::of(
    //         plugin: Basic_Plugin::create_and_get(),
    //     );
    // }

    /**
     * @test
     */
    public function pass(): void {
        $plugin = Basic_Plugin::create_and_get()->add_dependencies(
            Akismet_Plugin::create_and_get()
        );
        $object = Admin_Init::of(
            plugin: $plugin,
        );
        $object->callback();

        self::assertTrue( $plugin->is_active());
    }
}
