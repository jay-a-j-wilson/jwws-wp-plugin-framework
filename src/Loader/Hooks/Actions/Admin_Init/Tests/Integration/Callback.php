<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Init\Admin_Init,
    Tests\Integration\Fixtures\Akismet_Plugin_Factory,
    Tests\Integration\Fixtures\Basic_Plugin_Factory,
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 */
final class Callback extends \WP_UnitTestCase {
    /**
     * @xtest
     */
    public function pass(): void {
        $dependency = Basic_Plugin_Factory::create_and_get()
            ->add_dependencies(
                Akismet_Plugin_Factory::create_and_get(),
            )
        ;

        $sut = Admin_Init::of(
            plugin: $dependency,
        );

        $sut->callback();

        self::assertTrue($dependency->is_active());
    }
}
