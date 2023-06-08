<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
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

    protected function tearDown(): void {
        unset($this->collection);
        parent::tearDown();
    }

    /**
     * @test
     */
    public function create(): void {
        self::assertInstanceOf(
            expected: Collection::class,
            actual: Collection::create(),
        );
    }

    /**
     * @test
     */
    public function of(): void {
        self::assertInstanceOf(
            expected: Collection::class,
            actual: Collection::of(),
        );
    }

    /**
     * @test
     */
    public function add(): void {
        $this->collection->add('six', 'seven');
        self::assertCount(expectedCount: 7, haystack: $this->collection);
        self::assertTrue(
            condition: $this->collection->contains_value(value: 'six'),
        );
    }

    /**
     * @test
     */
    public function clear(): void {
        self::assertEmpty(actual: $this->collection->clear());
    }

    /**
     * @test
     */
    public function map(): void {
        self::assertEquals(
            expected: ['ONE', 'TWO', 'THREE', 'FOUR', 'FIVE'],
            actual: $this->collection
                ->map(
                    callback: fn (string $item): string => strtoupper(string: $item),
                )
                ->to_array(),
        );
    }

    /**
     * @test
     */
    public function count_(): void {
        self::assertEquals(expected: 5, actual: $this->collection->count());
        $this->collection->add(items: 'six');
        self::assertEquals(expected: 6, actual: $this->collection->count());
    }

    /**
     * @test
     */
    public function implode(): void {
        self::assertEquals(
            expected: 'one, two, three, four, five',
            actual: $this->collection->implode(),
        );
    }

    /**
     * @test
     */
    public function is_empty(): void {
        self::assertFalse(condition: $this->collection->is_empty());
    }

    /**
     * @test
     */
    public function reverse(): void {
        self::assertEquals(
            expected: ['five', 'four', 'three', 'two', 'one'],
            actual: $this->collection->reverse()->to_array(),
        );
    }

    /**
     * @test
     */
    public function to_array(): void {
        self::assertEquals(
            expected: ['one', 'two', 'three', 'four', 'five'],
            actual: $this->collection->to_array(),
        );
    }

    /**
     * @test
     */
    public function iterator(): void {
        $i = 0;

        foreach ($this->collection as $key => $value) {
            self::assertEquals(
                expected: $this->collection[$key],
                actual: $value,
            );

            $i++;
        }

        self::assertEquals(expected: 5, actual: $i);
    }

    /**
     * @test
     */
    public function offset_exists(): void {
        // Test that an index exists
        foreach (range(0, 4) as $offset) {
            self::assertTrue(
                condition: $this->collection->offsetExists(key: $offset),
            );
        }

        // Test that a non-existent index does not exist
        self::assertFalse(condition: $this->collection->offsetExists(key: 5));
    }

    /**
     * @test
     */
    public function offset_get(): void {
        foreach ($this->collection as $key => $value) {
            self::assertEquals(
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

        self::assertEquals(
            expected: ['one', 'two', 'three', 'four', 'five', 'six'],
            actual: $this->collection->to_array(),
        );

        $this->collection[2] = 'UPDATED';

        self::assertEquals(
            expected: ['one', 'two', 'UPDATED', 'four', 'five', 'six'],
            actual: $this->collection->to_array(),
        );
    }
}
