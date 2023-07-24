<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Object_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Object_Assertion\Object_Assertion;
use JWWS\WPPF\Assertion\Object_Assertion\Tests\Unit\Test_Classes\Class_1;
use JWWS\WPPF\Assertion\Object_Assertion\Tests\Unit\Test_Classes\Class_2;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Object_Assertion\Object_Assertion
 *
 * @link https://www.php.net/manual/en/function.is-string.php
 *
 * @internal
 *
 * @small
 */
final class Is_Instance_Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 is a $arg_2
     */
    public function pass(object $arg_1, string $arg_2): void {
        self::expectNotToPerformAssertions();
        Object_Assertion::of(object: $arg_1)->Is_Instance_Of(class: $arg_2);
    }

    public static function pass_data_provider(): iterable {
        yield [new Class_1(), Class_1::class];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg_1 is not a $arg_2
     */
    public function throw(object $arg_1, string $arg_2): void {
        self::expectException(exception: \InvalidArgumentException::class);
        Object_Assertion::of(object: $arg_1)->Is_Instance_Of(class: $arg_2);
    }

    public static function throw_data_provider(): iterable {
        yield [new Class_1(), Class_2::class];
    }
}
