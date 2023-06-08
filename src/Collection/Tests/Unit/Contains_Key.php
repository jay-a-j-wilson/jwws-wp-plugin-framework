<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class Contains_Key extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pluck[$_dataName] => $arg contains $key is $expected
     */
    public function pass(array $arg, mixed $key, bool $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Collection::of(...$arg)->contains_key(key: $key),
        );
    }

    public static function pass_data_provider(): iterable {
        $items = [0 => 'a', 2 => 'b', 3 => 'c', 4 => 'd', 5 => 'e'];

        yield 'true' => [
            $items,
            0,
            true,
        ];

        yield 'false' => [
            $items,
            6,
            false,
        ];
    }
}
