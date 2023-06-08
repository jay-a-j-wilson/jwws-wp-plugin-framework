<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion
 *
 * @internal
 */
final class Contains_Value extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 contains $arg_2
     */
    public function pass(array $arg_1, int|string $arg_2): void {
        $this->expectNotToPerformAssertions();
        Array_Assertion::of(array: $arg_1)->contains_value(value: $arg_2);
    }

    public static function pass_data_provider(): iterable {
        yield [[1, 2, 3, 4], 3];

        yield [['a', 'b', 'c', 'd'], 'b'];

        yield [[0 => 'a', 1 => 'b', 2 => 'c', 3 => 'd'], 'c'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg_1 not contains $arg_2
     */
    public function throw(array $arg_1, int|string $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Array_Assertion::of(array: $arg_1)->contains_value(value: $arg_2);
    }

    public static function throw_data_provider(): iterable {
        yield [[1, 2, 3, 4], 5];

        yield [['a', 'b', 'c', 'd'], 'e'];

        yield [[0 => 'a', 1 => 'b', 2 => 'c', 3 => 'd'], 'e'];
    }
}
