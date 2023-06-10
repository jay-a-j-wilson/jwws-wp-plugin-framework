<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Add extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $collection = Collection_Factory::create_and_get();

        $collection->add('six', 'seven');
        self::assertCount(expectedCount: 7, haystack: $collection);
        self::assertTrue(
            condition: $collection->contains_value(value: 'six'),
        );
    }
}
