<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers Collection
 */
final class Unit extends TestCase {
    private Collection $collection;

    protected function setUp(): void {
        parent::setUp();
        $this->collection = Collection::of(
            'one',
            'two',
            'three',
            'four',
            'five',
        );
    }

    /**
     * @test
     */
    public function create(): void {
        $this->assertInstanceOf(
            expected: Collection::class,
            actual: Collection::create(),
        );
    }

    /**
     * @test
     */
    public function of(): void {
        $this->assertInstanceOf(
            expected: Collection::class,
            actual: Collection::of('a', 'b', 'c'),
        );
    }

    /**
     * @test
     */
    public function add(): void {
        $collection = $this->collection->add('six', 'seven');
        $this->assertCount(expectedCount: 7, haystack: $collection);
        $this->assertTrue(
            condition: $collection->contains_value(value: 'six'),
        );
    }

    /**
     * @test
     */
    public function clear(): void {
        $collection = $this->collection->clear();
        $this->assertCount(expectedCount: 0, haystack: $collection);
        $this->assertTrue(condition: $collection->is_empty());
    }

    /**
     * @test
     */
    public function map(): void {
        $collection = $this->collection->map(
            callback: fn (string $item): string => strtoupper(string: $item),
        );
        $this->assertEquals(
            expected: ['ONE', 'TWO', 'THREE', 'FOUR', 'FIVE'],
            actual: $collection->to_array(),
        );
    }

    /**
     * @test
     */
    public function filter(): void {
        $collection = $this->collection->filter_by_value(
            fn (string $item): bool => strlen(string: $item) > 3,
        );
        $this->assertEquals(
            expected: ['three', 'four', 'five'],
            actual: $collection->to_array(),
        );
    }

    /**
     * @test
     *
     * @dataProvider slice_data_provider
     *
     * @testdox slice: $arg $_dataName equals $expected
     */
    public function slice(int $arg, array $expected): void {
        $this->assertEquals(
            expected: $expected,
            actual: $this->collection->slice(offset: $arg)->to_array(),
        );
    }

    public static function slice_data_provider(): array {
        return [
            'extract all but last' => [-1, ['five']],
            'extract first'        => [1, ['two', 'three', 'four', 'five']],
        ];
    }

    /**
     * @test
     */
    public function count_(): void {
        $this->assertEquals(expected: 5, actual: $this->collection->count());
        $this->collection->add('six');
        $this->assertEquals(expected: 6, actual: $this->collection->count());
    }

    /**
     * @test
     */
    public function implode(): void {
        $this->assertEquals(
            expected: 'one, two, three, four, five',
            actual: $this->collection->implode(),
        );
    }

    /**
     * @test
     */
    public function is_empty(): void {
        $this->assertFalse(condition: $this->collection->is_empty());
    }

    /**
     * @test
     */
    public function reverse(): void {
        $this->assertEquals(
            expected: ['five', 'four', 'three', 'two', 'one'],
            actual: $this->collection->reverse()->to_array(),
        );
    }

    /**
     * @test
     */
    public function to_array(): void {
        $this->assertEquals(
            expected: ['one', 'two', 'three', 'four', 'five'],
            actual: $this->collection->to_array(),
        );
    }

    /**
     * @test
     */
    public function contains_value(): void {
        $this->assertTrue(
            condition: $this->collection->contains_value(value: 'one'),
        );
        $this->assertFalse(
            condition: $this->collection->contains_value(value: 'zero'),
        );
    }

    /**
     * @test
     */
    public function iterator(): void {
        $i = 0;

        foreach ($this->collection as $key => $value) {
            $this->assertEquals(
                expected: $this->collection[$key],
                actual: $value,
            );

            $i++;
        }

        $this->assertEquals(expected: 5, actual: $i);
    }

    /**
     * @test
     */
    public function offset_exists(): void {
        // Test that an index exists
        foreach (range(0, 4) as $offset) {
            $this->assertTrue(
                condition: $this->collection->offsetExists(key: $offset),
            );
        }

        // Test that a non-existent index does not exist
        $this->assertFalse(condition: $this->collection->offsetExists(key: 5));
    }

    /**
     * @test
     */
    public function offset_get(): void {
        foreach ($this->collection as $key => $value) {
            $this->assertEquals(
                expected: $value,
                actual: $this->collection[$key],
            );
        }
    }

    /**
     * @test
     */
    public function offset_set(): void {
        $this->collection[] = 'six';

        $this->assertEquals(
            expected: ['one', 'two', 'three', 'four', 'five', 'six'],
            actual: $this->collection->to_array(),
        );

        $this->collection[2] = 'UPDATED';

        $this->assertEquals(
            expected: ['one', 'two', 'UPDATED', 'four', 'five', 'six'],
            actual: $this->collection->to_array(),
        );
    }

    /**
     * @test
     */
    public function to_string(): void {
        $this->expectOutputString(
            expectedString: 'one, two, three, four, five',
        );

        echo $this->collection;
    }
}
