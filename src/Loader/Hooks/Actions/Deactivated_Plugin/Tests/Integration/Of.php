<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Action\Deactivated_Plugin\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Deactivated_Plugin::class,
            actual: Deactivated_Plugin::of(
                plugin: Basic_Plugin::create_and_get(),
            ),
        );
    }
}
