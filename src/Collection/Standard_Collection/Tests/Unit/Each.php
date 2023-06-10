<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Each extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $called = 0;

        Standard_Collection::of(1, 2, 3)
            ->each(function() use (&$called): void {
                $called++;
            })
        ;

        self::assertEquals(expected: 3, actual: $called);
    }

    /**
     * @test
     */
    public function pass_empty(): void {
        $called = false;

        Standard_Collection::of()
            ->each(function() use (&$called): void {
                $called = true;
            })
        ;

        self::assertFalse(condition: $called);
    }
}
