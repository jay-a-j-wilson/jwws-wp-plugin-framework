<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Unit;

use JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\WPPF\Loader\Plugin\Plugin;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
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
            expected: Admin_Init::class,
            actual: Admin_Init::of(
                plugin: self::createStub(originalClassName: Plugin::class),
            ),
        );
    }
}
