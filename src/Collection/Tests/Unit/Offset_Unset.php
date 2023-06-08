<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class Offset_Unset extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $object = Collection::of('foo', 'bar', 'baz');

        $object->offsetUnset(key: 1);

        self::assertEquals(
            expected: [0 => 'foo', 2 => 'baz'],
            actual: $object->to_array(),
        );
    }
}
