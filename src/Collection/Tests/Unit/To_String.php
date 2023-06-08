<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class To_String extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg is $expected
     */
    public function pass(array $arg, string $expected): void {
        $this->expectOutputString(
            expectedString: $expected,
        );

        echo Collection::of(...$arg);
    }

    public static function pass_data_provider(): iterable {
        yield 'single (int)' => [
            [1, 2, 3, 4, 5],
            '1, 2, 3, 4, 5',
        ];

        yield 'single (string)' => [
            ['one', 'two', 'three', 'four', 'five'],
            'one, two, three, four, five',
        ];

        yield 'multi (int)' => [
            [1, [2, [3, 4]], 5],
            '1, 2, 3, 4, 5',
        ];

        yield 'multi' => [
            ['one', ['two', ['three', 'four']], 'five'],
            'one, two, three, four, five',
        ];
    }
}
