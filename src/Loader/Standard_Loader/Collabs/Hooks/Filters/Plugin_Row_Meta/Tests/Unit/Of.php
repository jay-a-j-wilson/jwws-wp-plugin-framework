<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta
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
            expected: Plugin_Row_Meta::class,
            actual: Plugin_Row_Meta::of(
                plugin: self::createStub(originalClassName: Plugin::class),
            ),
        );
    }
}
