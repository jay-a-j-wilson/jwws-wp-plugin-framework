<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Array_Access;

use JWWS\WPPF\{
    Collection\Collection,
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Offset_Set extends TestCase {
    private Collection $collection;

    protected function setUp(): void {
        parent::setUp();

        $this->collection = Collection_Factory::create_and_get();
    }

    /**
     * @test
     */
    public function pass_end(): void {
        $this->collection[] = 'six';

        self::assertSame(
            expected: ['one', 'two', 'three', 'four', 'five', 'six'],
            actual: $this->collection->to_array(),
        );
    }

    /**
     * @test
     */
    public function pass_n(): void {
        $this->collection[2] = 'UPDATED';

        self::assertSame(
            expected: ['one', 'two', 'UPDATED', 'four', 'five'],
            actual: $this->collection->to_array(),
        );
    }
}
