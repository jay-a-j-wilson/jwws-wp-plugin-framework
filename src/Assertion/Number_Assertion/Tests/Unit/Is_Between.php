<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Between extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 between $arg_2 & $arg_3
     */
    public function pass(
        int|float $arg_1,
        int|float $arg_2,
        int|float $arg_3,
    ): void {
        self::expectNotToPerformAssertions();
        Number_Assertion::of(number: $arg_1)->is_between(
            min: $arg_2,
            max: $arg_3,
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'positive (int)' => [5, 1, 10];

        yield 'positive (float)' => [5.0, 1.0, 10.0];

        yield 'negative (int)' => [-5, -10, -1];

        yield 'negative (float)' => [-5.0, -10.0, -1.0];

        yield 'inclusive positive (int)' => [1, 1, 10];

        yield 'inclusive positive (float)' => [1.0, 1.0, 10.0];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg not between $min & $max. throws e $message
     */
    public function throw(
        int|float $arg,
        int|float $min,
        int|float $max,
        string $message,
    ): void {
        self::expectException(exception: \InvalidArgumentException::class);
        self::expectExceptionMessageMatches(regularExpression: "/{$message}/");
        Number_Assertion::of(number: $arg)->is_between(min: $min, max: $max);
    }

    public static function throw_data_provider(): iterable {
        yield 'max < min: positive (int)' => [
            11,
            1,
            0,
            'max: 0 cannot be less than min: 1',
        ];

        yield 'max < min: negative (int)' => [
            -5,
            -1,
            -10,
            'max: -10 cannot be less than min: -1',
        ];

        yield 'positive (int)' => [
            11,
            1,
            10,
            '11 cannot be greater than max: 10',
        ];

        yield 'positive (float)' => [
            11.0,
            1.0,
            10.0,
            '11 cannot be greater than max: 10',
        ];
    }
}
