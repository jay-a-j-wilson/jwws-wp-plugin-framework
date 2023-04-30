<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{
    Test,
    TestDox,
    CoversClass
};

/**
 * @covers Collection
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Collection::class,
            actual: Collection::of('a', 'b', 'c', 'd'),
        );
    }
}
