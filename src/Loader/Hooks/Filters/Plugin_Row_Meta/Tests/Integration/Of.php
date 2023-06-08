<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta,
    Plugin\Plugin,
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta
 *
 * @internal
 */
final class Of extends TestCase {
    private Plugin $dependency;

    protected function setUp(): void {
        parent::setUp();
        $this->dependency = self::createStub(originalClassName: Plugin::class);
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Plugin_Row_Meta::class,
            actual: Plugin_Row_Meta::of(plugin: $this->dependency),
        );
    }
}
