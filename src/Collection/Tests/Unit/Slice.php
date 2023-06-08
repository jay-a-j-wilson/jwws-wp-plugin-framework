<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests\Unit;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Collection
 *
 * @internal
 */
final class Slice extends TestCase {
    /**
     * @test
     *
     * @dataProvider slice_data_provider
     *
     * @testdox pass[$_dataName] => $arg equals $expected
     */
    public function slice(int $arg, array $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Collection::of('one', 'two', 'three', 'four', 'five')
                ->slice(offset: $arg)
                ->to_array(),
        );
    }

    public static function slice_data_provider(): iterable {
        yield 'extract all but last' => [-1, ['five']];

        yield 'extract first' => [1, ['two', 'three', 'four', 'five']];
    }
}
