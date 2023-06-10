<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Pluck extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pluck[$_dataName] => $arg $key equals $expected
     */
    public function pass(array $arg, string $key, array $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Standard_Collection::of(...$arg)
                ->pluck(key: $key)
                ->to_array(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'name (array collection)' => [
            [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
                ['name' => 'Bob', 'age' => 40],
            ],
            'name',
            ['John', 'Jane', 'Bob'],
        ];

        yield 'age (array collection)' => [
            [
                ['name' => 'John', 'age' => 30],
                ['name' => 'Jane', 'age' => 25],
                ['name' => 'Bob', 'age' => 40],
            ],
            'age',
            [30, 25, 40],
        ];

        yield 'age (object collection)' => [
            [
                (object) ['name' => 'John', 'age' => 30],
                (object) ['name' => 'Jane', 'age' => 25],
                (object) ['name' => 'Bob', 'age' => 40],
            ],
            'age',
            [30, 25, 40],
        ];
    }
}
