<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Flatten extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg is $expected
     */
    public function pass(array $arg, array $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Standard_Collection::of(...$arg)
                ->flatten()
                ->to_array(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            [1, [2, [3, 4]], 5],
            [1, 2, 3, 4, 5],
        ];

        yield 'assoc' => [
            [0 => 'a', [1 => 'b', [2 => 'c', 3 => 'd']], 4 => 'e'],
            [0 => 'a', 1 => 'b', 2 => 'c', 3 => 'd', 4 => 'e'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider pass_levels_data_provider
     *
     * @testdox pass_levels[$_dataName] => $arg, levels $levels is $expected
     */
    public function pass_levels(array $arg, int $levels, array $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Standard_Collection::of(
                $arg,
            )->flatten(levels: $levels)->to_array(),
        );
    }

    public static function pass_levels_data_provider(): iterable {
        $array = [1, [2, [3, 4]], 5];

        yield 'basic 1' => [
            $array,
            1,
            [1, [2, [3, 4]], 5],
        ];

        yield 'basic 2' => [
            $array,
            2,
            [1, 2, [3, 4], 5],
        ];

        yield 'basic 3' => [
            $array,
            3,
            [1, 2, 3, 4, 5],
        ];

        yield 'basic 4' => [
            $array,
            4,
            [1, 2, 3, 4, 5],
        ];
    }
}
