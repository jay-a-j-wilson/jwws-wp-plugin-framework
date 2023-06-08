<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class Filter_By_Value extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertEquals(
            expected: ['three', 'four', 'five'],
            actual: Collection::of('one', 'two', 'three', 'four', 'five')
                ->filter_by_value(
                    fn (string $item): bool => strlen(string: $item) > 3,
                )
                ->to_array(),
        );
    }
}
