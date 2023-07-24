<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Action\Admin_Init\Tests\Integration;

use JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;
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
            actual: Admin_Init::of(plugin: Basic_Plugin_Factory::create_and_get()),
        );
    }
}
