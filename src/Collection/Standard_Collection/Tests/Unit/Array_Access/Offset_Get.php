<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Array_Access;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Offset_Get extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $collection = Collection_Factory::create_and_get();

        foreach ($collection as $key => $value) {
            self::assertEquals(
                expected: $value,
                actual: $collection[$key],
            );
        }
    }
}