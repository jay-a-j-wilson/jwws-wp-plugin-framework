<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Iterator_Aggregate;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Iterator extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $collection = Collection_Factory::create_and_get();

        $i = 0;

        foreach ($collection as $key => $value) {
            self::assertEquals(
                expected: $collection[$key],
                actual: $value,
            );

            $i++;
        }

        self::assertEquals(expected: 5, actual: $i);
    }
}
