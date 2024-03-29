<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Add_Dependencies extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass_zero(): Plugin {
        $sut = Basic_Plugin_Factory::create_and_get();

        self::assertCount(
            expectedCount: 0,
            haystack: $sut->dependencies(),
        );

        return $sut;
    }

    /**
     * @test
     *
     * @depends pass_zero
     */
    public function pass_add_two(Plugin $plugin): void {
        self::assertCount(
            expectedCount: 1,
            haystack: $plugin->add_dependencies(
                plugins: Akismet_Plugin_Factory::create_and_get(),
            )->dependencies(),
        );
    }

    /**
     * ! Finish.
     */
    public function pass_add_duplicate_dependency(Plugin $plugin): void {}
}
