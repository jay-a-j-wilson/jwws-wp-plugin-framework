<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Standard_Loader\Tests\Integration;

use JWWS\WPPF\Loader\Standard_Loader\Standard_Loader;
use JWWS\WPPF\Loader\Standard_Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Standard_Loader\Standard_Loader
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Standard_Loader::class,
            actual: Standard_Loader::of(
                plugin: Basic_Plugin_Factory::create_and_get()
            ),
        );
    }
}
