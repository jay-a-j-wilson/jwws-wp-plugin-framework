<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class Filter_By_Key extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertEquals(
            expected: ['two', 'three', 'four'],
            actual: Collection::of('one', 'two', 'three', 'four')
                ->filter_by_key(fn (int $key): bool => $key !== 0)
                ->to_array(),
        );
    }
}
