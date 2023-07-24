<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion
 *
 * @link https://www.php.net/manual/en/function.is-string.php
 *
 * @internal
 *
 * @small
 */
final class Is_String extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Type_Assertion::of(type: $arg)->is_string();
    }

    public static function pass_data_provider(): iterable {
        yield 'string' => ['a'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Type_Assertion::of(type: $arg)->is_string();
    }

    public static function throw_data_provider(): iterable {
        yield 'int' => [0];

        yield 'boolean' => [false];

        yield 'array' => [[]];

        yield 'null' => [null];
    }
}
