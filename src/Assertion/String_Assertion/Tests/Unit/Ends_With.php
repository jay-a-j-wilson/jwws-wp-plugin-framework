<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 */
final class Ends_With extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $string ends with $suffix
     */
    public function pass(string $string, mixed $suffix): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)->ends_with(suffix: $suffix);
    }

    public static function pass_data_provider(): iterable {
        yield ['hello world', 'ld'];

        yield ['hello world', 'rld'];

        yield ['hello world', 'o world'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $string not ends with $suffix
     */
    public function throw(string $string, mixed $suffix): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)->ends_with(suffix: $suffix);
    }

    public static function throw_data_provider(): iterable {
        yield ['hello world', 'foo'];

        yield ['hello world', 'hello '];

        yield ['hello world', 'world '];
    }
}
