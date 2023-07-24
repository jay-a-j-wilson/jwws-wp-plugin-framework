<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Starts_With extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $string starts with $prefix
     */
    public function pass(string $string, mixed $prefix): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)->starts_with(prefix: $prefix);
    }

    public static function pass_data_provider(): iterable {
        yield ['hello world', 'he'];

        yield ['hello world', 'hello'];

        yield ['hello world', 'hello w'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $string not starts with $prefix
     */
    public function throw(string $string, string $prefix): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)->starts_with(prefix: $prefix);
    }

    public static function throw_data_provider(): iterable {
        yield ['hello world', 'foo'];

        yield ['hello world', 'world'];

        yield ['hello world', ' hello w'];
    }
}
