<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion
 *
 * @internal
 *
 * @small
 */
final class Contains_Key extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 contains $arg_2
     */
    public function pass(array $arg_1, int|string $arg_2): void {
        self::expectNotToPerformAssertions();
        Array_Assertion::of(array: $arg_1)->contains_key(key: $arg_2);
    }

    public static function pass_data_provider(): iterable {
        yield 'array (int)' => [[1, 2, 3], 0];

        yield 'array (string)' => [['a', 'b', 'c'], 0];

        yield 'assoc array (int)' => [[0 => 'a', 1 => 'b', 2 => 'c'], 0];

        yield 'assoc array (string)' => [['a' => 0, 'b' => 1, 'c' => 2], 'a'];
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
        Array_Assertion::of(array: $arg_1)->contains_key(key: $arg_2);
    }

    public static function throw_data_provider(): iterable {
        yield 'array (int)' => [[1, 2, 3], 3];

        yield 'array (string)' => [['a', 'b', 'c'], 3];

        yield 'assoc array (int)' => [[0 => 'a', 1 => 'b', 2 => 'c'], 3];

        yield 'assoc array (string)' => [['a' => 0, 'b' => 1, 'c' => 2], 'd'];
    }
}
