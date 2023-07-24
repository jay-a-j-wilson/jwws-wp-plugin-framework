<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Contains_Value extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pluck[$_dataName] => $arg contains $value is $expected
     */
    public function pass(array $arg, mixed $value, bool $expected): void {
        self::assertSame(
            expected: $expected,
            actual: Standard_Collection::of(...$arg)
                ->contains_value(value: $value),
        );
    }

    public static function pass_data_provider(): iterable {
        $items = [0 => 'a', 2 => 'b', 3 => 'c', 4 => 'd', 5 => 'e'];

        yield 'true' => [
            $items,
            'a',
            true,
        ];

        yield 'false' => [
            $items,
            'z',
            false,
        ];
    }
}
