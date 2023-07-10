<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Tests\Integration;

use JWWS\WPPF\Loader\{
    Loader,
    Plugin\Plugin,
    Tests\Integration\Fixtures\Basic_Plugin_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Loader
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Loader::class,
            actual: Loader::of(plugin: Basic_Plugin_Factory::create_and_get()),
        );
    }
}
